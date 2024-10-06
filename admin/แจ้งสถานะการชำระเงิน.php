<?php include('h.php'); ?>
<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <?php include('menutop.php'); ?>
    <?php include('menu_l.php'); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1><i class="fa fa-home"></i> <span class="hidden-xs">แจ้งสถานะการชำระเงิน</span></h1>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-body">
                <div class="col-sm-12">
                  <h3 align="center">รายการสั่งซื้อของลูกค้า</h3>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>เลขใบสั่งซื้อ</th>
                        <th>ชื่อลูกค้า</th>
                        <th>ที่อยู่จัดส่ง</th>
                        <th>เบอร์โทร</th>
                        <th>ราคา</th>
                        <th>วันที่สั่งซื้อ</th>
                        <th>สถานะการสั่งซื้อ</th>
                        <th>รหัส EMS</th>
                        <th>ปรับสถานะ</th>
                        <th>ยกเลิกการสั่งซื้อ</th>
                        <th>ดูรายละเอียด</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // รวมการจัดการฐานข้อมูล
                      include('../condb.php');

                      // ตรวจสอบการอัปเดตสถานะและรหัส EMS
                      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $order_id = $_POST['order_id'];
                        $order_status = $_POST['order_status']; // รับค่าสถานะที่ส่งมา
                        $ems_code = $_POST['ems_code'] ?? ''; // รับค่ารหัส EMS (ถ้ามี)

                        // อัปเดตสถานะในฐานข้อมูล
                        $sql_update = "UPDATE tb_order SET order_status = ?, ems_code = ? WHERE orderID = ?";
                        $stmt = mysqli_prepare($con, $sql_update);
                        mysqli_stmt_bind_param($stmt, 'isi', $order_status, $ems_code, $order_id);
                        mysqli_stmt_execute($stmt);

                        if ($order_status == 0) {
                          echo "<script>alert('ยกเลิกคำสั่งซื้อเรียบร้อย');</script>";
                        } else {
                          echo "<script>alert('อัปเดตสถานะเรียบร้อย');</script>";
                        }
                      }

                      // กำหนดจำนวนรายการที่จะแสดงต่อหน้า
                      $limit = 10; 
                      // รับหน้าที่ต้องการแสดงจาก URL หรือกำหนดเป็นหน้าแรก
                      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                      $start = ($page - 1) * $limit;

                      // Query ข้อมูลการสั่งซื้อ
                      $sql = "SELECT * FROM tb_order LIMIT $start, $limit";
                      $result = mysqli_query($con, $sql);

                      while ($row = mysqli_fetch_array($result)) {
                        switch ($row['order_status']) {
                          case 0:
                            $status_text = "ยกเลิก";
                            break;
                          case 1:
                            $status_text = "กำลังตรวจสอบ";
                            break;
                          case 2:
                            $status_text = "ชำระเงินแล้ว";
                            break;
                          case 3:
                            $status_text = "จัดส่งสินค้า";
                            break;
                          default:
                            $status_text = "ไม่ทราบสถานะ";
                        }
                        ?>
                        <tr>
                          <td><?php echo $row['orderID']; ?></td>
                          <td><?php echo $row['cus_name']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo $row['telephone']; ?></td>
                          <td><?php echo $row['total_price']; ?> บาท</td>
                          <td><?php echo $row['reg_date']; ?></td>
                          <td><?php echo $status_text; ?></td>
                          <td><?php echo $row['ems_code'] ? $row['ems_code'] : 'ยังไม่มี'; ?></td>
                          <td>
                            <form method="post">
                              <input type="hidden" name="order_id" value="<?php echo $row['orderID']; ?>">
                              <input type="hidden" name="ems_code" value="<?php echo $row['ems_code']; ?>">
                              <select name="order_status" class="form-control">
                                <option value="1" <?php if ($row['order_status'] == 1) echo 'selected'; ?>>กำลังตรวจสอบ</option>
                                <option value="2" <?php if ($row['order_status'] == 2) echo 'selected'; ?>>ชำระเงินแล้ว</option>
                                <option value="3" <?php if ($row['order_status'] == 3) echo 'selected'; ?>>จัดส่งสินค้า</option>
                              </select>
                              <input type="text" name="ems_code" placeholder="กรอกรหัส EMS" class="form-control" value="<?php echo $row['ems_code']; ?>" />
                              <button type="submit" class="btn btn-success btn-sm">อัปเดต</button>
                            </form>
                          </td>
                          <td>
                            <form method="post" onsubmit="return confirm('คุณต้องการยกเลิกการสั่งซื้อนี้หรือไม่?');">
                              <input type="hidden" name="order_id" value="<?php echo $row['orderID']; ?>">
                              <input type="hidden" name="order_status" value="0"> <!-- สถานะ 0 หมายถึงยกเลิก -->
                              <button type="submit" class="btn btn-danger btn-sm">ยกเลิก</button>
                            </form>
                          </td>
                          <td>
                            <a href="order_details.php?order_id=<?php echo $row['orderID']; ?>" class="btn btn-info btn-sm">ดูรายละเอียด</a> 
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>

                  <?php
                  // คำนวณจำนวนสมาชิกทั้งหมด
                  $total_result = mysqli_query($con, "SELECT COUNT(*) AS total FROM tb_order");
                  $total_row = mysqli_fetch_assoc($total_result);
                  $total_orders = $total_row['total'];

                  // คำนวณจำนวนหน้าทั้งหมด
                  $total_pages = ceil($total_orders / $limit);
                  ?>

                  <!-- แสดงการแบ่งหน้า -->
                  <div style="text-align: center; margin-top: 20px;">
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <?php if ($page > 1): ?>
                          <li>
                            <a href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                          <li class="<?php echo $i == $page ? 'active' : ''; ?>">
                            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                          </li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages): ?>
                          <li>
                            <a href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>
                        <?php endif; ?>
                      </ul>
                    </nav>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>
<?php include('footerjs.php'); ?>

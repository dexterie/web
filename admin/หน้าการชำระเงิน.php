<?php include('h.php'); ?>
<body class="hold-transition skin-purple sidebar-mini">

      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-body">
                <div class="col-sm-12">
                  <h3 align="center">ข้อมูลการสั่งซื้อของลูกค้า</h3>

                  <!-- จำนวนรายการต่อหน้า -->
                  <form method="GET" class="mb-3">
                    <label for="entries_per_page">แสดงจำนวนรายการต่อหน้า:</label>
                    <select name="entries_per_page" id="entries_per_page" onchange="this.form.submit()">
                      <option value="5" <?php echo (isset($_GET['entries_per_page']) && $_GET['entries_per_page'] == 5) ? 'selected' : ''; ?>>5</option>
                      <option value="10" <?php echo (isset($_GET['entries_per_page']) && $_GET['entries_per_page'] == 10) ? 'selected' : ''; ?>>10</option>
                      <option value="20" <?php echo (isset($_GET['entries_per_page']) && $_GET['entries_per_page'] == 20) ? 'selected' : ''; ?>>20</option>
                    </select>
                  </form>

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
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include('../condb.php');

                      // กำหนดค่าพื้นฐานสำหรับ pagination
                      $entries_per_page = isset($_GET['entries_per_page']) ? (int)$_GET['entries_per_page'] : 5; // จำนวนรายการต่อหน้า
                      $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // หน้าเริ่มต้น
                      $offset = ($current_page - 1) * $entries_per_page; // คำนวณตำแหน่งเริ่มต้น

                      // Query ข้อมูลการสั่งซื้อ
                      $sql = "SELECT * FROM tb_order LIMIT ?, ?";
                      $stmt = mysqli_prepare($con, $sql);
                      mysqli_stmt_bind_param($stmt, 'ii', $offset, $entries_per_page);
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);

                      while ($row = mysqli_fetch_array($result)) {
                        // กำหนดสถานะและสีตามสถานะการสั่งซื้อ
                        switch ($row['order_status']) {
                          case 0:
                            $status_text = "ยกเลิก";
                            $status_color = "red";
                            break;
                          case 1:
                            $status_text = "ยังไม่ชำระเงิน";
                            $status_color = "black";
                            break;
                          case 2:
                            $status_text = "ชำระเงินแล้ว";
                            $status_color = "green"; 
                            break;
                          case 3:
                            $status_text = "จัดส่งสินค้า";
                            $status_color = "blue";
                            break;
                          default:
                            $status_text = "ไม่ทราบสถานะ";
                            $status_color = "gray"; 
                        }
                        ?>
                        <tr>
                          <td><?php echo $row['orderID']; ?></td>
                          <td><?php echo $row['cus_name']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo $row['telephone']; ?></td>
                          <td><?php echo $row['total_price']; ?> บาท</td>
                          <td><?php echo $row['reg_date']; ?></td>
                          <td style="color: <?php echo $status_color; ?>;"><?php echo $status_text; ?></td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>

                  <?php
                  // คำนวณจำนวนหน้าทั้งหมด
                  $sql_count = "SELECT COUNT(*) AS total FROM tb_order";
                  $result_count = mysqli_query($con, $sql_count);
                  $total_rows = mysqli_fetch_assoc($result_count)['total'];
                  $total_pages = ceil($total_rows / $entries_per_page);
                  ?>

                  <!-- Pagination -->
                  <nav aria-label="Page navigation" class="text-right"> <!-- เพิ่ม class "text-right" -->
                    <ul class="pagination justify-content-end"> <!-- เปลี่ยน justify-content-center เป็น justify-content-end -->
                      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                          <a class="page-link" href="?page=<?php echo $i; ?>&entries_per_page=<?php echo $entries_per_page; ?>"><?php echo $i; ?></a>
                        </li>
                      <?php endfor; ?>
                    </ul>
                  </nav>
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

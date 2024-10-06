<?php include('h.php'); ?>
<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <?php include('menutop.php'); ?>
    <?php include('menu_l.php'); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1><i class="fa fa-home"></i> <span class="hidden-xs">แสดงรายละเอียดการสั่งซื้อ</span></h1>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-body">
                <div class="col-sm-12">
                  <?php
                  // เชื่อมต่อฐานข้อมูล
                  include('../condb.php');

                  // รับเลขที่ใบสั่งซื้อจาก URL
                  $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 0;

                  // ตรวจสอบว่ามีเลขที่ใบสั่งซื้อหรือไม่
                  if ($order_id) {
                  ?>
                    <h3 align="center">รายละเอียดการสั่งซื้อ</h3>
                    <h4 align="center">เลขใบสั่งซื้อ: <?php echo htmlspecialchars($order_id); ?></h4> <!-- แสดงเลขใบสั่งซื้อ -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>รหัสสินค้า</th>
                          <th>ชื่อสินค้า</th>
                          <th>ราคา</th>
                          <th>จำนวน</th>
                          <th>ราคารวม</th>
                          <th>สลิปการชำระเงิน</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Query ข้อมูลการสั่งซื้อ
                        $sql_items = "SELECT od.pro_id, p.p_name, p.p_price, od.orderQty, p.p_img
                                      FROM order_detail od
                                      JOIN tbl_product p ON od.pro_id = p.p_id
                                      WHERE od.orderID = ?";
                        $stmt_items = mysqli_prepare($con, $sql_items);
                        mysqli_stmt_bind_param($stmt_items, 'i', $order_id);
                        mysqli_stmt_execute($stmt_items);
                        $result_items = mysqli_stmt_get_result($stmt_items);

                        while ($item = mysqli_fetch_assoc($result_items)) {
                            // คำนวณราคารวม
                            $total_price = $item['p_price'] * $item['orderQty'];
                        ?>
                            <tr>
                                <td><?php echo $item['pro_id']; ?></td>
                                <td><?php echo $item['p_name']; ?></td>
                                <td><?php echo $item['p_price']; ?> บาท</td>
                                <td><?php echo $item['orderQty']; ?></td>
                                <td><?php echo $total_price; ?> บาท</td> <!-- แสดงราคารวมที่คำนวณ -->
                                <td>
                                    <?php if (!empty($item['p_img'])) { ?>
                                        <img src="../p_img/<?php echo $item['p_img']; ?>" alt="Product Image" width="100">
                                    <?php } else { ?>
                                        ไม่มีภาพ
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <a href="แจ้งสถานะการชำระเงิน.php" class="btn btn-primary">กลับ</a>
                  <?php
                  } else {
                      echo "<h4 align='center'>ไม่พบเลขที่ใบสั่งซื้อ</h4>";
                  }
                  ?>
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

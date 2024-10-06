<?php include('h.php'); ?>
<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <?php include('menutop.php'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include('menu_l.php'); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1><i class="fa fa-chart-line"></i> <span class="hidden-xs">รายงานยอดขาย</span></h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="col-sm-12">
                                    <h3 align="center">ข้อมูลการขาย</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>เลขที่ใบสั่งซื้อ</th>
                                                <th>วันที่สั่งซื้อ</th>
                                                <th>ชื่อลูกค้า</th>
                                                <th>ที่อยู่จัดส่ง</th>
                                                <th>เบอร์โทรศัพท์</th>
                                                <th>ราคา</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Query ข้อมูลการขายจากฐานข้อมูล
                                            include('../condb.php');

                                            $sql = "SELECT orderID, reg_date, cus_name, address, telephone, total_price FROM tb_order"; 
                                            $result = mysqli_query($con, $sql);
                                            
                                            // ตัวแปรสำหรับเก็บยอดรวม
                                            $total_sales = 0;

                                            // ตรวจสอบว่ามีข้อมูลหรือไม่
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['orderID']; ?></td>
                                                        <td><?php echo $row['reg_date']; ?></td>
                                                        <td><?php echo $row['cus_name']; ?></td>
                                                        <td><?php echo $row['address']; ?></td>
                                                        <td><?php echo $row['telephone']; ?></td>
                                                        <td><?php echo $row['total_price']; ?> บาท</td>
                                                    </tr>
                                                    <?php
                                                    // เพิ่มยอดรวม
                                                    $total_sales += $row['total_price'];
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' align='center'>ไม่มีข้อมูลการขาย</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- แสดงยอดรวม -->
                                    <div style="text-align: right; margin-top: 10px;">
                                        <strong>ยอดรวม: <?php echo $total_sales; ?> บาท</strong>
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

<?php include('h.php'); ?>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <?php include('menutop.php'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include('menu_l.php'); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1><i class="fa fa-home"></i> <span class="hidden-xs">เพิ่มสต็อกสินค้า</span></h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <h3>รายการสินค้าที่มีอยู่</h3>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>รหัสสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>รายละเอียด</th>
                                            <th>ราคา</th>
                                            <th>จำนวนในสต็อก</th>
                                            <th>เพิ่มสต็อก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../condb.php');
                                        $sql = "SELECT * FROM tbl_product"; // เลือกข้อมูลจากตารางสินค้าที่มีอยู่
                                        $result = mysqli_query($con, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['p_id']; ?></td>
                                                <td><?php echo $row['p_name']; ?></td>
                                                <td><?php echo $row['p_detail']; ?></td>
                                                <td><?php echo $row['p_price']; ?> บาท</td>
                                                <td><?php echo $row['p_qty']; ?></td>
                                                <td>
                                                    <form action="update_stock.php" method="post">
                                                        <input type="hidden" name="product_id" value="<?php echo $row['p_id']; ?>">
                                                        <input type="number" name="product_stock" required>
                                                        <button type="submit" class="btn btn-success">เพิ่มสต็อก</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php include('footerjs.php'); ?>
</body>
</html>

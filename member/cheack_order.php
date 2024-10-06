<?php
include('h.php');
include("../condb.php");
$id=$row['member_id']; // ดึง ID ของลูกค้า
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('../boot4.php');?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" > 
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
 include('banner.php');
 include('navbar.php');
?>
<br>

<div class="container">
    <div class="alert alert-primary h4 mt-4 text-center" role="alert">
        เช็คสถานะการสั่งซื้อ
    </div>

    <table class="table table-hover">
        <tr>
            <th>เลขที่การสั่งซื้อ</th>
            <th>ชื่อ-นามสกุล</th>
            <th>ราคารวม</th>
            <th>วันที่สั่งซื้อ</th>
            <th>สถานะการสั่งซื้อ</th>
            <th>รหัส EMS ขนส่ง</th> <!-- เพิ่มคอลัมน์สำหรับรหัส EMS -->
        </tr>

        <?php
        // ดึงข้อมูลการสั่งซื้อของลูกค้าจากฐานข้อมูล
        $sql = "SELECT * FROM tb_order WHERE cus_id = $id";
        $hand = mysqli_query($con, $sql);
        while ($roww = mysqli_fetch_array($hand)) {
            $status = $roww['order_status'];
            $ems_code = $roww['ems_code']; // ดึงรหัส EMS จากฐานข้อมูล
        ?>
        <tr>
            <td><?= $roww['orderID']; ?></td>
            <td><?= $roww['cus_name']; ?></td>
            <td><?= $roww['total_price']; ?> บาท</td>
            <td><?= $roww['reg_date']; ?></td>
            <td>    
                <?php   
                // แสดงสถานะของคำสั่งซื้อ
                if ($status == 1) {
                    echo "<p class='text-primary'>กำลังตรวจสอบการชำระเงิน</p>";
                } elseif ($status == 2) {
                    echo "<p class='text-success'>กำลังดำเนินการจัดส่งสินค้า</p>";
                } elseif ($status == 3) {
                    echo "<p class='text-success'>จัดส่งสินค้าเรียบร้อย</p>";
                }
                ?>
            </td>
            <td>
                <?= !empty($ems_code) ? $ems_code : '-'; ?> 
            </td>
        </tr>
        <?php    
        }
        mysqli_close($con);    
        ?>
    </table>
</div>
</body>
</html>

<?php
include('../condb.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $product_stock = $_POST['product_stock'];

    // ตรวจสอบว่าสินค้ามีอยู่หรือไม่
    $sql_check = "SELECT * FROM tbl_product WHERE p_id = '$product_id'";
    $result = mysqli_query($con, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $new_qty = $row['p_qty'] + $product_stock; // เพิ่มสต็อกที่ต้องการเข้าไป

        // อัปเดตข้อมูลในฐานข้อมูล
        $sql_update = "UPDATE tbl_product SET p_qty = '$new_qty' WHERE p_id = '$product_id'";
        mysqli_query($con, $sql_update);
        
        // หลังจากอัปเดตเสร็จ redirect ไปยังหน้าที่คุณต้องการ
        header("Location: เพิ่มสต็อก.php");
        exit();
    } else {
        echo "สินค้าที่เลือกไม่พบในระบบ";
    }
}
?>

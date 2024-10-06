<?php
// เรียกไฟล์เชื่อมต่อฐานข้อมูล
include('../condb.php');

// ตรวจสอบว่ามีการส่ง order_id มาหรือไม่
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // ลบข้อมูลการสั่งซื้อออกจากฐานข้อมูล
    $sql_delete = "DELETE FROM tb_order WHERE orderID = ?";
    $stmt = mysqli_prepare($con, $sql_delete);
    mysqli_stmt_bind_param($stmt, 'i', $order_id);
    mysqli_stmt_execute($stmt);

    // ลบข้อมูลในตาราง order_details ด้วยถ้ามีการจัดเก็บในตารางนี้
    $sql_delete_details = "DELETE FROM tb_order_details WHERE order_id = ?";
    $stmt_details = mysqli_prepare($con, $sql_delete_details);
    mysqli_stmt_bind_param($stmt_details, 'i', $order_id);
    mysqli_stmt_execute($stmt_details);

    // ตรวจสอบว่าลบข้อมูลสำเร็จหรือไม่
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>alert('ลบรายการสั่งซื้อเรียบร้อย');</script>";
        echo "<script>window.location='index.php';</script>"; // กลับไปยังหน้าแสดงรายการ
    } else {
        echo "<script>alert('ไม่สามารถลบรายการได้');</script>";
    }
} else {
    echo "<script>alert('ไม่พบรายการสั่งซื้อที่ต้องการลบ');</script>";
}
?>

<?php
include("../condb.php");

// ตรวจสอบว่ามีคีย์ 'q' ในอาเรย์ $_GET หรือไม่
if (isset($_GET['q'])) {
    $q = $_GET['q']; // รับค่า search query
} else {
    $q = ''; // ตั้งค่าเริ่มต้นถ้า 'q' ไม่ได้ถูกตั้งค่า
}

// เตรียมคำสั่ง SQL
$sql = "SELECT * FROM tbl_product as p 
INNER JOIN tbl_type as t ON p.type_id=t.type_id
WHERE p.p_name LIKE ? 
ORDER BY p.p_id DESC"; // เตรียมคำสั่ง SQL พร้อม placeholder

$stmt = mysqli_prepare($con, $sql); // เตรียมคำสั่ง SQL
$like_query = '%' . $q . '%'; // เตรียม LIKE query
mysqli_stmt_bind_param($stmt, "s", $like_query); // ผูกพารามิเตอร์
mysqli_stmt_execute($stmt); // ดำเนินการตามคำสั่งที่เตรียมไว้
$result = mysqli_stmt_get_result($stmt); // รับผลลัพธ์

// ตรวจสอบว่ามีผลลัพธ์หรือไม่
if (mysqli_num_rows($result) > 0) {
    while ($row_prd = mysqli_fetch_array($result)) {
        $p_qty = $row_prd['p_qty'];
?>

<div class="col-sm-3" align="center">
    <div class="card border-Light mb-1" style="width: 16.5rem;">
        <br>
        <a href=""> <?php echo "<img src='../p_img/".$row_prd['p_img']."' width='200' height='200'>"; ?></a>
       
        <div class="card-body">
            <a href="prd.php?id=<?php echo $row_prd['p_id']; ?>"><b><?php echo $row_prd["p_name"]; ?></b></a>
            <br>
            ราคา <font color=""><?php echo $row_prd["p_price"]; ?></font> บาท
            <br>
            คงเหลือ <?php echo $row_prd["p_qty"]; ?> <?php echo $row_prd["p_unit"]; ?>

            <div class="text-center">
                <br><a href="prd.php?id=<?php echo $row_prd['p_id']; ?>">
                <button type="button" class="btn btn-primary">รายละเอียด</button> </a> 
            </div>

            <?php if ($p_qty <= 0) { ?>
                <br>
                <div class="text-center">
                    <button type="button" class="btn btn-danger">สินค้าหมด</button>   
                </div>
            <?php } else { ?>
                <br>
                <div class="text-center">
                    <a href="order.php?id=<?=$row_prd['p_id']?>">
                        <button type="button" class="btn btn-success">เพิ่มลงตะกร้าสินค้า</button>
                    </a> 
                </div>
            <?php } ?>
        </div>
        <br>
    </div>
</div>

<?php 
    }
} else {
    echo "ไม่พบสินค้าที่ตรงตามคำค้นหา"; // ข้อความถ้าไม่พบสินค้า
}
?>

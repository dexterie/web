<?php

include('h.php');
include("../condb.php");
 
$cusName = $_POST['m_name'];
$cusAddress =  $_POST['m_address'];
$cusTel = $_POST['m_tel'];
$id = $row['member_id'];

// Insert order data
$sql = "INSERT INTO tb_order (cus_id, cus_name, address, telephone, total_price, order_status)
        VALUES ('$id', '$cusName', '$cusAddress', '$cusTel', '" . $_SESSION["sum_price"] . "', '1')";
mysqli_query($con, $sql);

$orderID = mysqli_insert_id($con);
$_SESSION["order_id"] = $orderID;

for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
    if (($_SESSION["strProductID"][$i]) != "") {
        // Get product data
        $sql1 = "SELECT * FROM tbl_product WHERE p_id = '" . $_SESSION["strProductID"][$i] . "' ";
        $result1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $price = $row1['p_price'];
        $total = $_SESSION["strQty"][$i] * $price;

        // Insert order details
        $sql2 = "INSERT INTO order_detail (orderID, pro_id, orderPrice, orderQty, Total) 
                 VALUES ('$orderID', '" . $_SESSION["strProductID"][$i] ."', '$price', '" . $_SESSION["strQty"][$i] ."', '$total' )";

        if (mysqli_query($con, $sql2)) {
            // Update product quantity
            $sql3 = "UPDATE tbl_product SET p_qty = p_qty - '" . $_SESSION["strQty"][$i] . "'  
                     WHERE p_id = '" . $_SESSION["strProductID"][$i] . "' ";
            mysqli_query($con, $sql3);
        }
    }
}

// Redirect to the payment confirmation page
echo "<script> window.location='payment.php'; </script> ";

mysqli_close($con);
unset($_SESSION["intLine"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);
unset($_SESSION["sum_price"]);

?>

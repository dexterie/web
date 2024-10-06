<?php 
include('h.php');
include("../condb.php");

$orderID = $_POST['order_id'];
 $name = $_POST['Account_Name'];


if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
     $image_upload_path = "../payment/".$new_image_name;
         move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }
    // ,Account_Name ,' $name'

    $sql = "insert into payment(orderID,Account_Name,pay_image) values('$orderID',' $name','$new_image_name')";

          $hand =   mysqli_query($con,$sql);

      if($hand ){
        echo " <script> alert('ยืนยันการสั่งซื้อเรียบร้อย'); </script> ";
        echo " <script> window.location ='cheack_order.php'; </script> ";
        

      }
        mysqli_close($con);


  
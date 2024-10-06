<?php
include('h.php');
include("../condb.php");
$sql = "select * from tb_order where orderID= '" . $_SESSION["order_id"] . "' ";
$result = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs[ 'total_price' ];


?> 

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('../boot4.php');?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>รายการสั่งซื้อ</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" > 
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>







</head>

<body class="hold-transition skin-purple sidebar-mini">
    
<?php
 include('banner.php');
 


  ?>



ิ<br>

<div class="container">
  <div class="row">
    <div class="col-md-15">
    <div class="alert alert-success h4 text-center mt-4" role="alert">
ยืนยันการสั่งซื้อ
</div>


<br>
เลขที่การสั่งซื้อ : <?= $rs['orderID'];  ?> <br>
ชื่อขนามสกุล (ลูกค้า) : <?= $rs['cus_name']; ?><br>
ที่อยู่การจัดส่ง : <?=  $rs['address'];?><br>
เบอร์โทรศัพท์ :     <?=  $rs['telephone'];?><br>

<br>
<!-- 
<table class="table table-success table-striped"> -->
<div  class ="card mb-4 mt-4">
  <div  class ="card-body" >
<table class="table table-bordered border-primary ">
  <thead>
    <tr>
      <th >รหัสสินค้า</th>
      <th >ชื่อสินค้า</th>
      <th >ราคา</th>
      <th >จำนวน</th>
      <th >ราคารวม</th>

    </tr>
  </thead>
  <tbody>
<?php

$sql1 = "select * from order_detail d,tbl_product p where d.pro_id = p.p_id and d.orderID= '" . $_SESSION["order_id"] . "' ";
// $sql1 = "select * from tbl_product  where  pro_id = p.p_id  ";
$result1 = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result1)){
 



?>

    <tr>
      <td><?= $row['pro_id'] ?> </td>
      <td><?= $row['p_name'] ?></td>
      <td><?= $row['orderPrice'] ?></td>
      <td><?= $row['orderQty'] ?></td>
      <td><?= $row['Total'] ?></td>
    </tr>
  </tbody>
<?php
}
?>

</table>
<h6 class ="text-end"> รวมเป็นเงิน <?= number_format($total_price)?> บาท </h6>

</div>
</div>


<!-- <div class="container"> 
<div class="row">
<div class="col-md-4"> -->

    <form method = "POST"  action = "insertPayment.php"  enctype="multipart/form-data">

    <div  class="text-center">
        <label class="mt-4"> เลขที่ใบสั่งซื้อ</label>
        <input type = "text" name="order_id"    value= "<?= $rs['orderID'];  ?>" required >
      </div>


            <br>
            <div  class="text-center">
        <label class="mt-4"> ชื่อบัญชีที่โอนชำระเงิน</label>
        <input type="text" name="Account_Name" required class="form-control"  value= "<?= $rs['cus_name']; ?>" >
        </div>

        <div  class="text-center">
        <label class="mt-4"> หลักฐานการชำระเงิน</label>
        <div class="form-group" >
        <input type="file" name="file1"  class="form-control" accept="image/*" onchange="readURL(this);"/ required>

      <img id="blah" width="250" class="img-rounded"/ style="margin-top: 10px;">

    </div>
    </div>

      

   
                <br>
    <div  class="text-center">
    &nbsp;&nbsp;&nbsp;<font color="red">!!ก่อนกดยืนยันกการสั่งซื้อ!! </font>
   <br>
<a href="cart.php" class="btn btn-success">  Back  </a>
<button type="submit"  name="btn2"  class="btn btn-success">ยืนยันการสั่งซื้อ</button> 

</div>

    </form>



<!-- </div>
</div> -->







              


<div  class="text-center">
                           <!-- <h> !!ก่อนกดยืนยันกการสั่งซื้อ!!</h><br> -->
            &nbsp;&nbsp;&nbsp;<font color="red">!!ลูกค้าสามารถกด  Print  หน้าจอไว้เป็นเพื่อหลักฐานได้!! </font>
             <br>
    <button  onclick="window.print()" class="btn btn-success"> Print  </button>
    </div>













    </div>
  </div>
</div>
<br><br>
</body>
</html>
<?php include('script4.php');?> 
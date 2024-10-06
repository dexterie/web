

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งชำระเงิน</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" > 
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

    <?php include('../boot4.php');?>

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

<body  class="hold-transition skin-purple sidebar-mini">




<div class="container"> 
<div class="row">
<div class="col-md-4">
    <form method = "POST"  action = "insertPayment.php"  enctype="multipart/form-data">

        <label class="mt-4"> เลขที่ใบสั่งซื้อ</label>
        <input type = "text" name="order_id" required >

            <br>
        <label class="mt-4"> ชื่อบัญชีที่โอนชำระเงิน</label>
        <!-- <textarea  class="form-control"   name="cusName"  required rows="1" >       </textarea> -->
        <input type="text" name="Account_Name" required class="form-control" >

        





        <label class="mt-4"> หลักฐานการชำระเงิน</label>


        <div class="form-group" >


        <input type="file" name="file1"  class="form-control" accept="image/*" onchange="readURL(this);"/>
      <img id="blah" src="#" alt="" width="250" class="img-rounded"/ style="margin-top: 10px;">

    </div>

        <button type="submit"  name="btn2"  class="btn btn-outline-success">ยืนยันการสั่งซื้อ</button> 







    </form>



</div>
</div>


</div>
</body>
</html>
<?php include('script4.php');?> 
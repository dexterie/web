<?php
include('h.php');
include("condb.php");
?>
<!DOCTYPE html>
<head>
  <?php include('boot4.php');?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="styles.css"> 
    <!-- <title>Sidebar Example</title> -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" > 
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php include('boot4.php');?>

</head>
<body>


<?php
  include('banner.php');
  ?>
     
 <?php
  include('navbar.php');
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin-top: 10px">
        <div class="row">
        <!-- <div class="content"> -->
        <br><br>
            <?php
            $act = (isset($_GET['act']) ? $_GET['act'] : '');
            //  $q = $_GET['q'];
            // if($act=='showbytype'){
            // include('list_prd_by_type.php');
            // }else 
            // โค้ดส่วนนี้ไม่ใช้เพราะทำต่อไม่เป็น
            // if($q!=''){
            // include("show_product_q.php");
            // }else 
           
            if($act=='add'){  ?>
             
              <?php    include("member_form_add.php"); ?>
         


             <?php  }else{   ?>
           
             
              <?php  include('show_product.php');   ?>
         
            <?php    } ?>
          
          </div>
          


        </div>
      </div>
    </div>
</body>
</html>
<?php include('script4.php');?>
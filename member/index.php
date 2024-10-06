<?php
include('h.php');
include("../condb.php");
?>
<!DOCTYPE html>
<head>
  <?php include('../boot4.php');?>
  
 

</head>
<body class="hold-transition skin-purple sidebar-mini">
<!-- <body > -->
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
            <?php
           $act = (isset($_GET['act']) ? $_GET['act'] : '');
            // $q = $_GET['q'];
            // if($act=='showbytype'){
            // include('list_prd_by_type.php');
            // }else 
            // โค้ดส่วนนี้ไม่ใช้เพราะทำต่อไม่เป็น
            // if($q!=''){
            // include("show_product_q.php");
            // }else

             if($act=='add'){
            include("แก้ไขโปรไฟล์.php");
            }else{
            include('show_product.php');
            }
            ?>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
<?php include('script4.php');?> 
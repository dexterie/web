<?php
include('h.php');
include("condb.php");
?>
<!DOCTYPE html>
<head>
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
            <?php
           
            include("member_form_add.php");
           
            
            ?>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
<?php include('script4.php');?>
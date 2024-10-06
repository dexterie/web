<?php 
if(@$_GET['do']=='finish'){
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=index.php" />';

  }

$sql = "SELECT * FROM tbl_member WHERE member_id=$member_id";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
?>

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

<form action="ไฟล์การแก้ไขโปรไฟล์.php" method="post" class="form-horizontal" enctype="multipart/form-data">





  <div class="form-group"   >
    <div class="col-sm-0 control-label">
      ชื่อ-นามสกุล :
    </div>
    <div class="col-sm-7">
      <input type="text" name="m_name" required class="form-control" value="<?php echo $row['m_name'];?>">
    </div>
  </div>

 
  <div class="form-group">
    <div class="col-sm-0 control-label">
      เบอร์โทร :
    </div>
    <div class="col-sm-6"> 
      <input type="text" name="m_tel" required class="form-control" value="<?php echo $row['m_tel'];?>">
    </div>
  </div>

   <div class="form-group">
    <div class="col-sm-0 control-label">
      อีเมล์ :
    </div>
    <div class="col-sm-9">
      <input type="email" name="m_email" required class="form-control" value="<?php echo $row['m_email'];?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-0 control-label">
    Line id :
    </div>
    <div class="col-sm-6">
      <input type="lineid" name="lineid"  class="form-control" value="<?php echo $row['lineid'];?>">
    </div>
  </div>



    <div class="form-group">
    <div class="col-sm-0" align=""> ที่อยู่ : </div>

    &nbsp;&nbsp;&nbsp;<font color="red">** หมายเหตุ: กรุณากรอกที่อยู่จริง ** </font>
    <div class="col-sm-20" align="left">
      <textarea name="m_address" class="form-control" id="m_address" type="text" class="form-control" value="<?php echo $row['m_address'];?>"     required><?php echo $row['m_address'];?></textarea>
    </div>
  </div>
  




  <div class="form-group" >

    <div class="col-sm-0 control-label">
      รูปภาพ :
    </div>
    <div class="col-sm-15">
      ภาพเก่า <br>
      <img src="../m_img/<?php echo $row['m_img'];?>" width="200px">
      
      <input type="file" name="m_img"  class="form-control"  accept="image/*" onchange="readURL(this);" >
      <img id="blah"  width="250" class="img-rounded" style="margin-top: 10px;"  >
    </div>
  </div>


  


  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
      <input type="hidden" name="m_img2" value="<?php echo $row['m_img'];?>">

      <input type="hidden" name="member_id" value="<?php echo $member_id; ?>" />    



  
    </div>
  </div>

  <button type="button" class="btn btn-danger">ยกเลิก</button> </a>
  <button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
  <a href="index.php" > 
     
      
      <br> <br> <br>

</form>
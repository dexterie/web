<?php
//    session มันทับกันกับของ ไฟล์ h.php แต่ไม่ลบเพราะเผื่อไว้
// session_start();
include('h.php');
include("../condb.php");


?> 
 
 
 <!DOCTYPE html>
<html lang="en">
<head>
<?php include('../boot4.php');?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" > 
     <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

     <style>
    .my-div {
        float: right;
    }
</style>

<div class="my-div"></div>


 
</head>



<body>
    
<?php
 include('banner.php');
  include('navbar.php');
  ?>
 









   <br>
   </br>

<div class= "container">  

 <form  action="insert_cart.php" id="form1" method = "POST"  > 
 
        <div  class = "row">
            <div  class = "col-md-10"  >

            <div class="alert alert-info h4" role="alert">
                ตะกร้าการสั่งซื้อสินค้า
            </div>

    
            <table  class = "table table-hover ">        
            <tr>
                    
                <th>ลำดับที่</th>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>ราคารวม</th>
                <th>เพิ่ม-ลด จำนวนสินค้า</th>
                <th>ลบรายการ</th>
            
                </tr>


              <?php
              
              $Total = 0;
              $sumPrice=0;
              $m= 1 ;
              $sumTotal=0;

              if(isset($_SESSION["intLine"])) {   // ถ้าว่างให้ทำงานใน {}
               for ($i=0; $i <= ( int)$_SESSION["intLine"]; $i++ ) {
                    if(  ($_SESSION["strProductID"][$i]) != ""   ){
                        $sql1=" SELECT * FROM  tbl_product  WHERE p_id = '" . $_SESSION["strProductID"][$i] . "'    ";
                        $result1 = mysqli_query($con,$sql1);
                        $row_pro = mysqli_fetch_array($result1);
                        $p_qty =  $row_pro['p_qty'];
                       
                       

                        $_SESSION["price"] = $row_pro['p_price'];
                        $Total = $_SESSION["strQty"][$i];
                        $sum = $Total * $row_pro['p_price'] ;
                        $sumPrice =  $sumPrice + $sum;
                        $_SESSION["sum_price"] = $sumPrice;
                        $sumTotal= $sumTotal +  $Total;

              ?>
                <tr> 
                 
                <td> <?=$m?> </td>

                <td>

                <img src="../p_img/<?=$row_pro['p_img'] ?> "  width="80" height="100" class="border" >
                     <?=$row_pro['p_name']  ?> 
                    
                    </td>
                <td> <?=$row_pro['p_price'] ?> </td>
                <td> <?=$_SESSION["strQty"][$i] ?> </td>
                <td> <?=$sum?> </td>

                
                <td>
                
                <?php if(   $p_qty  > 1 &&    $_SESSION["strQty"][$i]  !=  $p_qty ){   ?>  
                  
                  
                  <a href="order.php?id=<?=$row_pro['p_id']?>" class="btn btn-outline-primary" >+</a>
                 
                  
                
                  
                 
                  <?php    }else{  ?>

                    <a   >สินค้าเหลือชิ้นสุดท้าย</a>
                    <?php          } ?>
                    
                  
                      

                      <?php if($_SESSION["strQty"][$i] > 1){   ?>  
                        <a href="order_del.php?id=<?=$row_pro['p_id']?>" class="btn btn-outline-danger">-</a>
                        <?php }?>
                </td>

                <td> <a  href="pro_delete.php?Line=<?=$i?>" > <img  src="../ลบ/ลบ.img.jpeg" width="30"> </a></td>
                </tr>
                
        <?php
             $m=$m+1;    




                }  
               }  
              }
        ?>
        <tr>
        <!-- <p>จำนวนสินค้ารวมที่ต้องการสั่งซื้อ  <?=  $sumTotal  ?>  ชิ้น </p> -->
        <td class="text-end" colspan="4" >  <p>จำนวนสินค้าทั้งหมดที่ต้องการสั่งซื้อ </p> </td>
        <td class="text-center"> <?=  $sumTotal  ?> </td>
        <td> ชิ้น</td>


            <td class="text-end" colspan="4" >  ยอดชำระรวม </td>
            <td class="text-center"><?=$sumPrice?> </td>
            <td>บาท</td>

            </tr>


            
            
            </table>

               <!-- <p>จำนวนสินค้าที่ต้องการสั่งซื้อ  <?=  $sumTotal  ?>  ชิ้น </p> -->
               <div  style="text-align:right">   
            <a href="index.php" > 
            <button type="button" class="btn btn-outline-primary">เลือกสินค้าเพิ่ม</button> </a>
            
            <!-- <button type="submit" class="btn btn-outline-success">ยืนยันการสั่งซื้อ</button>  -->

        <?php   if($Total> 0){  ?> 
         
          <button type="submit" class="btn btn-outline-success"> ไปที่หน้าชำระเงินเพื่อยืนยันการสั่งซื้อ</button> 

            <?php     }else{   ?>

              <button  type="button"  class="btn btn-outline-success">กรุณาเลือกสินค้าก่อนยืนยันการสั่งซื้อ</button> 

              <?php   }  ?>


              <br>  

            </div> 
            

            </div>


            
            
            <div class="row">
        <div class="col-md-5">
        <br>     
        <div class="alert alert-info"  h4  role="alert">
                ข้อมูลการจัดส่งสินค้า
    </div>

    <h>  *ข้อมูลการจัดส่งสามารถแก้ไขได้*</h>
   <br><br>

  


 
               
  
         ชื่อ-นามสกุล :
    <div class="col-sm-5">
      <input type="text" name="m_name" required class="form-control" value="<?php echo $row['m_name'];?>">
    </div>
               
    <br> 


    <!-- <div class="my-div"> -->
      เบอร์โทร :
    <div class="col-sm-6" > 
      <input type="text" name="m_tel" required class="form-control" value="<?php echo $row['m_tel'];?>">
    </div>
    <!-- </div> -->


    <br> 

  <div class="form-group">
    <div class="col-sm-0" align=""> ที่อยู่ : </div>
    
    <div class="col-sm-20" align="left">
      <textarea name="m_address" class="form-control" id="m_address" type="text" class="form-control" value="<?php echo $row['m_address'];?>"     required><?php echo $row['m_address'];?></textarea>
    </div>
  </div>

        </div>
        </div>
      

        </div> 
 </form>    

</div>





<br> <br> 


</body>
</html>
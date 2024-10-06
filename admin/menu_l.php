 <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../m_img/<?php echo $m_img; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>คุณ <?php echo $m_name; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
        <li>
        <a href="index.php"><i class="fa fa-home"></i>
          <span> หน้าหลัก </span>
        </a>
      </li>

    

     

      <li>
        <a href="แจ้งสถานะการชำระเงิน.php">
          <span> แจ้งสถานะการชำระเงิน </span>
        </a>
      </li>

      <li>
        <a href="เพิ่มสต็อก.php">
          <span> เพิ่มสต็อก </span>
        </a>
      </li>


      
      
           <li class="active">
        <a href=""><i class="fa fa-cogs"></i> <span>จัดการข้อมูลระบบ</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-down pull-right"></i>
        </span>
      </a>
    </li>
    
      <li>
        <a href="member.php"><i class="glyphicon glyphicon-record"></i>
          <span> จัดการสมาชิก</span>
        </a>
      </li>

      <li>
        <a href="type.php"><i class="glyphicon glyphicon-record"></i>
          <span> จัดการประเภท </span>
        </a>
      </li>
      <li>
        <a href="product.php"><i class="glyphicon glyphicon-record"></i>
          <span> จัดการสินค้า </span>
        </a>
      </li>
        <li>
        <a href="member_profile.php"><i class="glyphicon glyphicon-record"></i>
          <span> แก้ไขข้อมูลส่วนตัว </span>
        </a>
      </li>

           <li class="active">
        <a href=""><i class="fa fa-cogs"></i> <span>จัดการข้อมูลรายงาน</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-down pull-right"></i>
        </span>
      </a>
        
      <a href="รายยอดขายสินค้า.php"><i class="glyphicon glyphicon-record"></i>
          <span> รายยอดขายสินค้า  ตัวอย่าง </span>
        </a>
      </li>

      
      <li>
        <a href="../logout.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');"><i class="glyphicon glyphicon-off"></i>
          <span> ออกจากระบบ</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
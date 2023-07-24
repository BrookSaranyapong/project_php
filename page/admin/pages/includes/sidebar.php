<?php 
$uri = $_SERVER['REQUEST_URI'];
$array = explode('/',$uri); 
$key = array_search("pages",$array);
$name = $array[$key+1];
?>

<nav class="main-header navbar navbar-expand border-bottom navbar-dark bg-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          Last login: <?= date_format(new DateTime($_SESSION['last_login']), "j F Y H:i:s" );?>
          <i class="fa fa-th-large"></i>
        </a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light text-center d-block">Admin Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="../../../assets/images/imageMember/<?//= $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image"> -->
          <img src="../../../../assets/image/imageMember/<?= $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['first_name'] .' '.$_SESSION['last_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item">
              <a href="../dashboard" class="nav-link <?php echo $name == 'dashboard' ? 'active': '' ?>">
                <i class="fas fa-chart-line nav-icon"></i>
                <p>Dashboard</p>
              </a>
          </li>
  
          <li class="nav-item">
            <a href="../information" class="nav-link <?php echo $name == 'information' ? 'active': '' ?>">
              <i class="fas fa-user nav-icon"></i>
              <p>ข้อมูลส่วนตัว</p>
            </a>
          </li>
        <?php if($_SESSION['role'] == 'admin') { ?>
          <li class="nav-item">
            <a href="../admin" class="nav-link <?php echo $name == 'admin' ? 'active': '' ?>">
              <i class="fas fa-users-cog nav-icon"></i>
              <p>ระบบจัดการข้อมูลผู้ใช้งาน</p>
            </a>
          </li>
        <?php } ?>
        <?php if($_SESSION['role'] == 'admin') { ?>
          <li class="nav-item">
            <a href="../car" class="nav-link <?php echo $name == 'car' ? 'active': '' ?>">
              <i class="fas fa-wrench nav-icon"></i>
              <p>ระบบจัดการรถยนต์</p>
            </a>
          </li>
        <?php } ?>

        <?php if($_SESSION['role'] == 'admin') { ?>
          <li class="nav-item">
            <a href="../product" class="nav-link <?php echo $name == 'product' ? 'active': '' ?>">
              <i class="fas fa-shopping-cart nav-icon"></i>
              <p>ระบบขายการรถยนต์</p>
            </a>
          </li>
        <?php } ?>

        <?php if($_SESSION['role'] == 'admin') { ?>
          <li class="nav-item">
            <a href="../appoint" class="nav-link <?php echo $name == 'appoint' ? 'active': '' ?>">
            <i class="fas fa-check-circle nav-icon"></i>
              <p>ข้อมูลนัดหมาย</p>
            </a>
          </li>
        <?php } ?>


        <?php if($_SESSION['role'] != 'user') { ?>
          <li class="nav-item">
            <a href="../contact_car" class="nav-link <?php echo $name == 'contact_car' ? 'active': '' ?>">
            <i class="fas fa-id-card-alt nav-icon"></i>
              <!-- <i class="fas fa-phone nav-icon"></i> -->
              <p>ข้อมูลทำสัญญา</p>
            </a>
          </li>
        <?php } ?>


          <li class="nav-header">Account Settings</li>
          <li class="nav-item">
            <a href="/project_car2hand/page/home" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>กลับหน้าหลัก</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

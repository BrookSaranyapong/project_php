<?php 
    include_once('../authen.php'); 

    // $sql = "SELECT * FROM `admin` ";
    // $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="../../../assets/images/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../../assets/images/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/images/favicons/favicon-16x16.png">
  <link rel="manifest" href="../../../assets/images/favicons/site.webmanifest">
  <link rel="mask-icon" href="../../../assets/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="../../../assets/images/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="../../../assets/images/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include_once('../includes/sidebar.php') ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
               <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info-active text-center">
                <h3 class="widget-user-username">Page All Views</h3>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../../../assets/images/logo/it.png" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  
                  <div class="col-sm-12">
                    <div class="description-block">
                      <h5 class="description-header">10<?php // echo $res; ?></h5>
                      <span class="description-text">All Views</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>

          <div class="col-lg-6 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>30<?php // echo $rowsadmin;?></h3>
                <p>Member</p>
              </div>

              <div class="icon">
                  <i class="my-3 fas fa-address-book"></i>
              </div>

              <?php if($_SESSION['role'] != 'user') { ?>
                <a href="../admin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3> 30<?php // echo $res; ?></h3>
                <p>ผู้เข้าชมเว็บไซต์</p>
              </div>

              <div class="icon">
                <i class="my-2 fas fa-chart-bar"></i>
              </div>

              <?php if($_SESSION['role'] != 'user') { ?>
                <a href="../logs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
        

          <div class="col-lg-6 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>30<?php // echo $rowsarticles; ?></h3>
                <p>ข่าวสาร/ล่าสุด</p>
              </div>
              <div class="icon">
                <i class="my-2 fas fa-images"></i>
              </div>
              <?php if($_SESSION['role'] != 'user') { ?>
              <a href="../articles" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>40<?php // echo $rowscontacts; ?></h3>

                <p>ติดต่อเรา</p>
              </div>
              <div class="icon">
                <i class="my-3 fas fa-phone"></i>
                <!-- <i class="fas fa-phone"></i> -->
              </div>
              <?php if($_SESSION['role'] != 'user') { ?>
              <a href="../contacts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <!-- /.row -->


        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- footer -->
  <?php include_once('../includes/footer.php') ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

</body>
</html>

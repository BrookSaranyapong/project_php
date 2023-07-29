<?php include_once('../authen.php');
// $USER_SQL = "SELECT first_name,last_name,cus_id FROM `auth_cars`";
// $result_USER_SQL = $conn->query($USER_SQL);

$CAR_INFO_SQL = "SELECT * FROM `information_cars`
INNER JOIN `type_cars` ON `type_cars`.`Ty_id` = `information_cars`.`Ty_id`
INNER JOIN `model_cars` ON `model_cars`.`m_id` = `information_cars`.`m_id`
INNER JOIN `brand_cars` ON `brand_cars`.`b_id` = `information_cars`.`b_id`
WHERE `Type_data` = 'รถเก๋ง'";
$result_CAR_INFO_SQL = $conn->query($CAR_INFO_SQL);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar & Main Sidebar Container -->
  <?php include_once('../includes/sidebar.php') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>ระบบการขายรถยนต์</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="../product">ระบบการขายรถยนต์  </a></li>
                <li class="breadcrumb-item active">เพิ่มสินค้า</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">เพิ่มสินค้า</h3>
        </div>
        <!-- /.card-header -->

        

        <!-- form start -->
        <form role="form" action="create.php" method="post">
          <div class="card-body">

            <div class="form-group">
              <label for="carOwner">ชื่อเจ้าของรถ</label>
              <!-- <select class="form-control" name="carbrand" required>
                <option value="" disabled selected>-- เลือก USER --</option>
                <?php
                //while ($row_USER_SQL = $result_USER_SQL->fetch(PDO::FETCH_ASSOC)) {?>
                <option value="<?php //echo $row_USER_SQL['cus_id'];?>"><?php //echo $row_USER_SQL['first_name']. ' ' .$row_USER_SQL['last_name'];?></option>
                <?php //} ?>
              </select> -->
              <input type="text" class="form-control" name="carOwner" id="carOwner" placeholder="ชื่อเจ้าของรถ" required>
            </div>

            <div class="form-group">
              <label for="cusidOwner">รหัสบัตรประชาชนเจ้าของรถ</label>
              <input type="number" class="form-control" name="cusidOwner" id="cusidOwner" placeholder="รหัสบัตรประชาชนเจ้าของรถ" required>
            </div>

            <div class="form-group">
              <label>รุ่นรถยนต์</label>
              <select class="form-control" name="carmodel">
                <option value="" disabled selected>-- เลือกรุ่นรถ --</option>
                <?php
                while ($row_CAR_INFO_SQL = $result_CAR_INFO_SQL->fetch(PDO::FETCH_ASSOC)) {?>
                <option value="<?php echo $row_CAR_INFO_SQL['Car_id'];?>">CarID <?php echo $row_CAR_INFO_SQL['Car_id'] . ' | ยื่ห้อ '. $row_CAR_INFO_SQL['b_brand']
                . ' | รุ่น ' .$row_CAR_INFO_SQL['m_model']
                . ' | เลขทะเบียน ' .$row_CAR_INFO_SQL['Car_regisnum']
                . ' | ความจุเครื่องยนต์ '.$row_CAR_INFO_SQL['Car_cappaci'] . ' CC'
                . ' | ประเภท'.$row_CAR_INFO_SQL['Type_data']
                . ' | สี'.$row_CAR_INFO_SQL['Ty_color']
                . ' | ระบบเกียร์ '.$row_CAR_INFO_SQL['Ty_gear']
                
                ;?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="sale_price">ราคาขาย</label>
              <input type="number" class="form-control" name="sale_price" id="sale_price" placeholder="ราคาขาย" required>
            </div>

          </div>
          <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<!-- DataTables -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.min.js"></script>

<script>
  $(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>

</body>
</html>

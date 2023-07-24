<?php 
  include_once('../authen.php');
  $sql = "SELECT * FROM `auth_cars` WHERE u_id = :id ";
  $result = $conn->prepare($sql);
  $result->execute(array(':id' => $_SESSION['authen_id']));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ข้อมูลส่วนตัว</title>
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
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">ข้อมูลส่วนตัว</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">ข้อมูลส่วนตัว</h3>
        </div>
        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <!-- <img src="../../../assets/images/imageMember/<?php // echo $row['a_image']; ?>" width="250px" class="mx-auto img-profile rounded-circle img-thumbnail" > -->
        <img src="<?php echo $row['image']; ?>" width="250px" class="mx-auto img-profile rounded-circle img-thumbnail" >

        <form role="form" action="update.php" method="post">
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                  <label for="username">ชื่อผู้ใช้งาน</label>
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" disabled>
              </div>
              <div class="form-group col-md-4">
                  <label for="firstName">ชื่อ</label>
                  <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $row['first_name']; ?>" disabled>
              </div>
              <div class="form-group col-md-4">
                  <label for="lastName">นามสกุล</label>
                  <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $row['last_name']; ?>" disabled>
              </div>
              <div class="form-group col-md-6">
                  <label for="email">อีเมลล์</label>
                  <input type="email" class="form-control" id="email" name="email"  value="<?php echo $row['email']; ?>" disabled>
              </div>

              <div class="form-group col-md-6">
                  <label for="phone">เบอร์โทรศัพท์</label>
                  <input type="text" class="form-control" id="phone"  name="phone" value="<?php echo $row['phone']; ?>" disabled>
              </div>
            </div>

            <div class="form-group">
                <label for="address">ที่อยู่</label>
                <textarea class="form-control" id="address" name="address"  rows="5" disabled><?php echo $row['address']; ?></textarea>
            </div>
          <?php } ?>
          </div>
          <div class="card-footer">
              <a href="profile-edit.php" class="btn btn-warning float-right">แก้ไขข้อมูล</a>
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
  $('.custom-file-input').on('change', function(){
    var fileName = $(this).val().split('\\').pop()
    $(this).siblings('.custom-file-label').html(fileName)
    if (this.files[0]) {
        var reader = new FileReader()
        $('.figure').addClass('d-block')
        reader.onload = function (e) {
            $('#imgUpload').attr('src', e.target.result)
        }
        reader.readAsDataURL(this.files[0])
    }
  })
</script>

</body>
</html>

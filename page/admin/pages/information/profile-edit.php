<?php include_once('../authen.php') ?>
<?php 
  $sql = "SELECT * FROM `admin` AS a INNER JOIN `profile` AS pr ON a.profile_id = pr.p_id WHERE a.id = '".$_SESSION['authen_id']."' ";
  $result = $conn->query($sql);
  
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
        <?php while($row = $result->fetch_assoc()) { ?>        
        

        <div class="card-body">
            <form role="form" action="update.php" method="post" enctype="multipart/form-data">
            <div class="form-row">

                <div class="form-group text-center col-md-12">        
                    <figure class="figure text-center d-block mt-2">
                        <input type="hidden" name="data_file" value="<?= $row['a_image']; ?>">
                        <img id="imgUpload" src="../../../assets/images/imageMember/<?= $row['a_image']; ?>" width="20%" class="figure-img mx-auto img-profile rounded-circle img-thumbnail" alt="">
                    </figure>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="customFile">
                        <label class="custom-file-label" for="customFile">แก้ไขรูปภาพ</label>
                    </div>
                </div>


                <div class="form-group col-md-4">
                    <label for="username">ชื่อผู้ใช้งาน</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="firstName">ชื่อ</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="lastName">นามสกุล</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" >
                </div>
                <div class="form-group col-md-6">
                    <label for="email">อีเมลล์</label>
                    <input type="email" class="form-control" id="Email" name="Email"  value="<?php echo $row['p_Email']; ?>" >
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" id="Phone"  name="Phone" value="<?php echo $row['p_Phone']; ?>" >
                </div>
                </div>

                <div class="form-group">
                    <label for="address">ที่อยู่</label>
                    <textarea class="form-control" id="address" name="Address"  rows="5" ><?php echo $row['p_Address']; ?></textarea>
                </div>

            <input type="hidden" name="id" value="<?php echo $_SESSION['authen_id'] ?>">
          </div>
          <?php } ?>

          <div class="card-footer">
              <a href="index.php" class="btn btn-warning float-left">ย้อนกลับ</a>
              <button name="submit" type="submit" class="btn btn-primary float-right">บันทึกข้อมูล</button>
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
  $('.custom-file-input').on('change',function(){
    var fileName = $(this).val().split('\\').pop()
    $(this).siblings('.custom-file-label').html(fileName)
    if(this.files[0]){
          var reader = new FileReader()
          $('.figure').addClass('d-block')
          reader.onload = function (e){
              $('#imgUpload').attr('src', e.target.result).width(350)
          }
          reader.readAsDataURL(this.files[0])
      }
  })
</script>

</body>
</html>

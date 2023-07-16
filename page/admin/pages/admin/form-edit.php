<?php include_once('../authen.php');
  $id = $_GET['id'];
  if(!isset($id)){
    header('Location: index.php');
  }


  $sql = "SELECT * FROM `admin` AS a INNER JOIN `profile` AS pr ON a.profile_id = pr.p_id WHERE a.id = '".$id."' ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

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
            <h1>Admin Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="../admin">Admin Management</a></li>
              <li class="breadcrumb-item active">Edit Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Edit Data</h3>
        </div>
        <!-- /.card-header -->

        
        <!-- form start -->
        <form role="form" action="update.php" method="post" enctype="multipart/form-data">
          <div class="card-body">

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

                  <div class="form-group col-md-2">
                    <label for="username">Username</label>
                    <input type="text" disabled class="form-control" name="username" id="username" placeholder="Username" value="<?= $row['username'];?>" required>
                  </div>
                  
                  <div class="form-group col-md-2">
                      <label for="password">Password</label>
                      <input class="form-control" name="password" id="password" placeholder="Password" value="<?= $row['password']; ?>" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="firstName">ชื่อ</label>
                    <input type="text" class="form-control" name="first_name" id="firstName" placeholder="FirstName" value="<?= $row['first_name'];?>" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="lastName">นามสกุล</label>
                    <input type="text" class="form-control" name="last_name" id="lastName" placeholder="LastName" value="<?= $row['last_name'];?>" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="firstName">Email</label>
                    <input type="text" class="form-control" name="Email" id="Email" placeholder="Email" value="<?= $row['p_Email'];?>" required>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="lastName">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" name="Phone" id="Phone" placeholder="Phone" value="<?= $row['p_Phone'];?>" required>
                  </div>
              </div>

                  <div class="form-group">
                      <label for="address">ที่อยู่</label>
                      <textarea class="form-control" name="Address" id="Address"  rows="5"><?= $row['p_Address'];?></textarea>
                  </div>

                  <div class="form-group">
                    <label>Select Permission</label>
                    <select class="form-control" name="status" required>
                      <option value="" disabled selected>--Select Permission--</option>
                      <option value="superadmin" <?= $row['status'] == 'superadmin' ? 'selected' : '' ?>>Super Admin</option>
                      <option value="admin" <?= $row['status'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                      <option value="user" <?= $row['status'] == 'user' ? 'selected' : '' ?>>User</option>
                    </select>
                  </div>

            <input type="hidden" name="id" value="<?= $id ?>">

          </div>
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
    $('.custom-file-input').on('change', function(){
        var size = this.files[0].size / 1024 / 1024
        console.log(size.toFixed(2))

        if(size.toFixed(2) > 2){
          alert('to big, maximum is 2MB')
        }else{
            var fileName = $(this).val().split('\\').pop()
            $(this).siblings('.custom-file-label').html(fileName)
            if (this.files[0]) {
                var reader = new FileReader()
                $('.figure').addClass('d-block')
                reader.onload = function (e) {
                    $('#imgUpload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0])
              }
        }
    })
</script>

</body>
</html>

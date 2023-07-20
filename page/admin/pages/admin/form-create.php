<?php include_once('../authen.php');?>
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
              <li class="breadcrumb-item active">Create Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Create Data</h3>
        </div>
        <!-- /.card-header -->

        

        <!-- form start -->
        <form role="form" action="create.php" method="post" enctype="multipart/form-data">
          <div class="card-body">

            <div class="form-group">
              <label>Upload Image</label>
              <div class="custom-file">
                  <input type="file" class="custom-file-input" name="file" id="customFile" required>
                  <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <figure class="figure text-center d-none mt-2">
                  <img id="imgUpload" class="figure-img img-fluid rounded" alt="" width="128" height="128">
              </figure>
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>

            <div class="form-group">
              <label for="firstName">ชื่อ</label>
              <input type="text" class="form-control" name="first_name" id="firstName" placeholder="FirstName" required>
            </div>
            <div class="form-group">
              <label for="lastName">นามสกุล</label>
              <input type="text" class="form-control" name="last_name" id="lastName" placeholder="LastName" required>
            </div>
            <div class="form-group">
              <label for="lastName">รหัสบัตรประชาชน</label>
              <input type="text" class="form-control" name="cus_id" id="customerID" placeholder="รหัสบัตรประชาชน" required>
            </div>

            <div class="form-group">
              <label for="firstName">Email</label>
              <input type="text" class="form-control" name="email" id="Email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label for="lastName">เบอร์โทรศัพท์</label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
            </div>

            <div class="form-group">
                <label for="address">ที่อยู่</label>
                <textarea class="form-control" name="address" id="Address"   rows="10"></textarea>
            </div>

            

            <div class="form-group">
              <label>Select Permission</label>
              <select class="form-control" name="status" required>
                <option value="" disabled selected>--Select Permission--</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
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

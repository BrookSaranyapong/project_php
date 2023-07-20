<?php include_once('../authen.php');
$sql = "SELECT * FROM `sale_car`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ข้อมูลนัดหมาย</title>
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
              <h1>ข้อมูลนัดหมาย</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">ข้อมูลนัดหมาย</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title d-inline-block">Admin List</h3>
            <a href="form-create.php" class="btn btn-primary float-right ">Add +</a href="">
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>ยี่ห้อ</th>
                  <th>เลขทะเบียน</th>
                  <th>Chassis_Number</th>
                  <th>สี</th>
                  <th>รุ่น</th>
                  <th>เลขไมล์</th>
                  <th>วันที่จดทะเบียนรถยน</th>
                  <th>ปีที่ผลิต</th>
                  <th>ราคาที่รับมา</th>
                  <th>ระบบเกียร์</th>
                  <th>ความจุเครื่องยนต์</th>
                  <th>รหัสประเภทรถยนต์</th>
                  <th>รหัสรายการรับรถยนต์</th>
                  <th>Edit</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $num = 0;
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $num += 1;
                ?>
                  <tr>
                    <!-- <td><?php // echo $num; 
                              ?></td>
                <td><img class="img-fluid d-block mx-auto" src="../../../assets/images/imageMember/<?php // echo $row['a_image'] 
                                                                                                    ?>" width="100px" alt=""></td>
                <td><?php // echo $row['username']; 
                    ?></td>
                <td><?php // echo $row['password']; 
                    ?></td>
                <td><span class="badge badge-primary"><?php // echo $row['status']; 
                                                      ?></span></td>
                <td><?php // echo $row['first_name']; 
                    ?></td>
                <td><?php // echo $row['last_name']; 
                    ?></td>
                <td><?php // echo $row['p_Address']; 
                    ?></td>
                <td><?php // echo $row['p_Phone']; 
                    ?></td>
                <td><?php // echo $row['p_Email']; 
                    ?></td> -->

                    <td><?php echo $num; ?></td>
                    <td>ยี่ห้อ</td>
                    <td>เลขทะเบียน</td>
                    <td>Chassis_Number</td>
                    <td>สี</td>
                    <td>รุ่น</td>
                    <td>เลขไมล์</td>
                    <td>วันที่จดทะเบียนรถยน</td>
                    <td>ปีที่ผลิต</td>
                    <td>ราคาที่รับมา</td>
                    <td>ระบบเกียร์</td>
                    <td>ความจุเครื่องยนต์</td>
                    <td>รหัสประเภทรถยนต์</td>
                    <td>รหัสรายการรับรถยนต์</td>
                    <td>
                      <a href="form-edit.php?id=<?php echo $row['Sale_id']; ?>" class="btn btn-sm btn-warning text-white">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" onclick="deleteItem(<?php echo $row['Sale_id']; ?>);" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

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
    $(function() {
      $('#dataTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
      });
    });

    function deleteItem(id) {
      if (confirm('Are you sure, you want to delete this item?') == true) {
        window.location = `delete.php?id=${id}`;
        // window.location='delete.php?id='+id;
      }
    };
  </script>

</body>

</html>
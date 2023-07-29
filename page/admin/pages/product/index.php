<?php include_once('../authen.php');
$sql = "SELECT *
FROM `sale_cars`
RIGHT JOIN `information_cars` ON `information_cars`.`Car_id` = `sale_cars`.`Car_id`
INNER JOIN `type_cars` ON `type_cars`.`Ty_id` = `information_cars`.`Ty_id`
INNER JOIN `model_cars` ON `model_cars`.`m_id` = `information_cars`.`m_id`
INNER JOIN `brand_cars` ON `brand_cars`.`b_id` = `information_cars`.`b_id`
INNER JOIN `year_cars` ON `year_cars`.`y_id` = `information_cars`.`y_id`";
// INNER JOIN type_car ON sale_car.Ty_id = type_car.Ty_id
$result = $conn->query($sql);
function getThaiMonthName($monthNumber) {
  $months = array(1 => 'มกราคม',2 => 'กุมภาพันธ์',3 => 'มีนาคม',4 => 'เมษายน',5 => 'พฤษภาคม',6 => 'มิถุนายน',7 => 'กรกฎาคม',8 => 'สิงหาคม',9 => 'กันยายน',10 => 'ตุลาคม',11 => 'พฤศจิกายน',12 => 'ธันวาคม');
  return isset($months[$monthNumber]) ? $months[$monthNumber] : '';
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบขายจัดการรถยนต์</title>
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
                <li class="breadcrumb-item active">ระบบการขายรถยนต์</li>
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
                  <th>ชื่อเจ้าของรถ</th>
                  <th>เลขบัตรประชาชน</th>
                  <th>วันที่ประกาศขาย</th>
                  <th>ราคาขาย</th>
                  <th>ยี่ห้อรถยนต์</th>
                  <th>รุ่นรถยนต์</th>
                  <th>สี</th>
                  <th>ประเภทรถยนต์</th>
                  <th>ระบบเกียร์</th>
                  <th>วันที่จดทะเบียนรถยนต์</th>
                  <th>ปีที่ผลิต</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $num = 0;
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $num += 1;
                
                //get month from database
                $databaseDatetime = $row['Sale_time'];
                $databaseDatetime_CarTime = $row['Car_time'];
                $ymdconvert = strtotime($databaseDatetime);
                $ymdconvert_CarTime = strtotime($databaseDatetime_CarTime);
                //convert to thai
                $monthNumber = date('n', $ymdconvert);
                $monthNumber_CarTime = date('n', $ymdconvert_CarTime);
                $thaiMonthName = getThaiMonthName($monthNumber);
                $thaiMonthName_CarTime = getThaiMonthName($monthNumber_CarTime);
                //display
                $displaydate = date('d', $ymdconvert) . ' ' . $thaiMonthName . ' ' . date('Y',$ymdconvert)+543;
                $displaydate_CarTime = date('d', $ymdconvert_CarTime) . ' ' . $thaiMonthName_CarTime . ' ' . date('Y',$ymdconvert_CarTime)+543;

                ?>
                  <tr>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $row['Sale_name']; ?></td>
                    <td><?php echo $row['Cus_id'];?></td>
                    <td><?php echo $displaydate; ?></td>
                    <td><?php echo number_format($row['Sale_price']); ?> บาท</td>
                    <td><?php echo $row['b_brand'];?></td>
                    <td><?php echo $row['m_model'];?></td>
                    <td><?php echo $row['Ty_color']; ?></td>
                    <td><?php echo $row['Type_data'];?></td>
                    <td><?php echo $row['Ty_gear'];?></td>
                    <td><?php echo $displaydate_CarTime; ?></td>
                    <td><?php echo $row['y_fac']+543; ?></td>

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
<?php
require_once('authen.php');

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM `user` WHERE username = :username");
  $stmt->execute(array(
    ':username' => $username
  ));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!empty($row) && password_verify($password, $row['password'])) {
    echo '<script> alert("ชื่อผู้ใช้ และ รหัสผ่านถูกต้อง") </script>';
    $_SESSION['authen_id'] = $row['u_id'];
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['last_name'] = $row['last_name'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['image'] = $row['image'];
    $_SESSION['last_login'] = $row['last_login'];

    $update = "UPDATE `user` SET last_login = :last_login WHERE u_id = :u_id";
    $stmt_update = $conn->prepare($update);
    $result_update = $stmt_update->execute(array(":last_login" => date("Y-m-d H:i:s"), ":u_id" => $row['u_id']));
    if ($result_update) {
      header('Location: /project_car2hand/page/home');
    } else {
      echo '<script> alert("Error!!!") </script>';
    }
  } else {
    echo '<script> alert("ชื่อผู้ใช้ และ รหัสผ่านไม่ถูกต้อง") </script>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <!-- <link rel="stylesheet" href="/project_car2hand/node_modules/bootstrap/dist/css/bootstrap.min.css" class="rel"> -->

  <!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
  rel="stylesheet"
/>
</head>

<body>
  <?php include('./includes/navbar.php'); ?>
  <div class="d-flex align-items-center min-vh-100">
    <div class="container">
      <row class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card">
            <h4 class="card-header text-center">เข้าสู่ระบบ</h4>
            <div class="card-body">
              <form method="POST">
                <div class="row g-3">
                  <div class="col-12">
                    <label for="username" class="col-form-label">ชื่อผู้ใช้งาน : </label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                  </div>
                  <div class="col-12">
                    <label for="password" class="col-form-label">รหัสผ่าน : </label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="col-12 text-center">
                    <button type="submit" name="submit" class="btn btn-primary mx-auto d-block w-75">เข้าสู่ระบบ</button>
                    <a class="btn btn-warning my-2" href="/project_car2hand/page/home">กลับหน้าหลัก</a>
                    <a class="btn btn-success my-2" href="register.php">สมัครสมาชิก</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </row>
    </div>
  </div>

 <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
</body>

</html>
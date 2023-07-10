<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('./config/connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql_check_username = "SELECT * FROM `user` WHERE `username` = :username";
    $check_username = $conn->prepare($sql_check_username);
    $check_username->execute(array(':username' => $username));

    $hashed = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = $conn->prepare("INSERT INTO `user` (first_name, last_name, username, password, role, last_login, updated_at, created_at)
                       VALUES (:first_name, :last_name, :username, :password, :role, :last_login, :updated_at, :created_at)");
    $result_insert = $sql->execute(array(
        ":first_name" => $_POST['first_name'],
        ":last_name" => $_POST['last_name'],
        ":username" => $_POST['username'],
        ":password" => $hashed,
        ":role" => "user",
        ":last_login" => date("Y-m-d H:i:s"),
        ":updated_at" => date("Y-m-d H:i:s"),
        ":created_at" => date("Y-m-d H:i:s"),
    ));
    if ($result_insert) {
        echo '<script> alert("ลงทะเบียนเรียบร้อยแล้ว") </script>';
        header('Refresh:0; url=login.php');
    } else {
        echo '<script> alert("ลงทะเบียนผิดพลาด!")</script>'; 
        header('Refresh:0; url=index.php');
    }
    echo '<pre>', print_r($_POST), '</pre>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include('./includes/theme.php'); ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">car2hand</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="login.php" class="btn btn-primary">เข้าสู่ระบบ</a>
                        <a href="register.php" class="btn btn-warning">สมัครสมาชิก</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex align-items-center min-vh-100">
        <div class="container">
            <row class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <h4 class="card-header text-center">สมัครสมาชิก</h4>
                        <div class="card-body">
                            <form method="POST">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="name" class="col-form-label">ชื่อ : </label>
                                        <input type="text" id="name" name="first_name" class="form-control" placeholder="name" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="surname" class="col-form-label">นามสกุล : </label>
                                        <input type="text" id="surname" name="last_name" class="form-control" placeholder="surname" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="username" class="col-form-label">ชื่อผู้ใช้งาน : </label>
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="col-form-label">รหัสผ่าน : </label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="confirm_password" class="col-form-label">ยืนยันรหัสผ่าน : </label>
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" name="submit" class="btn btn-primary mx-auto d-block w-75">สมัครสมาชิก</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </row>
        </div>
    </div>
    <?php include('./includes/script.php'); ?>

</body>

</html>
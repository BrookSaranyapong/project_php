<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('authen.php');

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
        header('Refresh:0; url=home.php');
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

    <?php require_once("./includes/theme.php"); ?>
    <!-- <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" class="rel"> -->

</head>

<body>
    <?php include('./includes/navbar.php'); ?>

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
                                        <input type="text" id="name" name="first_name" class="form-control" placeholder="Name" required>
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
                                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="number" class="col-form-label">รหัสบัตรประชาชน : </label>
                                        <input type="text" id="cus_id" name="cus_id" class="form-control" placeholder="13 หลัก" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="email" class="col-form-label">อีเมล : </label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="phone" class="col-form-label">เบอร์โทรศัพท์ : </label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="address">ที่อยู่</label>
                                        <textarea class="form-control" name="address" id="Address" rows="10" placeholder="Address" required></textarea>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" name="submit" class="btn btn-primary mx-auto d-block w-75">สมัครสมาชิก</button>
                                    </div>
                                </div>
                            </form>
                            <a href="/project_car2hand/page/login.php" type="submit" name="submit" class="my-2 btn btn-success mx-auto d-block w-75">กลับไปหน้าล็อกอิน</a>

                        </div>
                    </div>
                </div>
            </row>
        </div>
    </div>
    <?php require_once("./includes/script.php"); ?>

    <!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>
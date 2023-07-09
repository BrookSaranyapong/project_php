<?php
// session_start();
// require_once('./config/connection.php');
// if (isset($_POST['submit'])) {
// $username = $_POST['username'];
// $password = $_POST['password'];

// $sql = "SELECT * FROM `admin` WHERE `admin`.`username` = '" . $username . "' ";
// $result = $conn->query($sql);
// $row = $result->fetch_assoc();

// if (!empty($row) && password_verify($password, $row['password'])) {

//     $_SESSION['authen_id'] = $row['id'];
//     $_SESSION['first_name'] = $row['first_name'];
//     $_SESSION['last_name'] = $row['last_name'];
//     $_SESSION['status'] = $row['status'];
//     $_SESSION['last_login'] = $row['last_login'];
//     $_SESSION['image'] = $row['a_image'];

//     $update = "UPDATE `admin` SET `last_login` = '" . date("Y-m-d H:i:s") . "' WHERE `id` = '" . $row['id'] . "' ";
//     $result_update = $conn->query($update);
//     if ($result_update) {
//         header('Location: pages/dashboard');
//     } else {
//         echo '<script> alert("Error!!!") </script>';
//     }
//     echo '<script> alert("ชื่อผู้ใช้ และ รหัสผ่านไม่ถูกต้อง") </script>';
// } else {
//     echo '<script> alert("ชื่อผู้ใช้ และ รหัสผ่านถูกต้อง") </script>';
// }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>

<body>
 <?php  include('../includes/navbar.php') ?>

 <h1>login</h1>

</body>

</html>
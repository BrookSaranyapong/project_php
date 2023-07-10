<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <?php include('theme.php'); ?>
</head>

<body>
    <!-- Section Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">car2hand</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['authen_id'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo 'name : ' . $_SESSION['first_name']; echo '  ' . $_SESSION['last_name'] ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- <li><a class="dropdown-item" href="profile.php">ประวัติส่วนตัว</a></li> -->
                                <!-- <li><a class="dropdown-item" href="password.php">เปลี่ยนรหัสผ่าน</a></li> -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./page/logout.php">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="./page/login.php" class="btn btn-primary">เข้าสู่ระบบ</a>
                            <a href="./page/register.php" class="btn btn-warning">สมัครสมาชิก</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php include('script.php') ?>
</body>

</html>
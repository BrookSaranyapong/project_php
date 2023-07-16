<?php $current_path = trim($_SERVER['REQUEST_URI'], '/'); ?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark sticky-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/project_car2hand/page/home">car2hand</a>

        <div class="navbar-nav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_path == trim('/project_car2hand/page/home', '/') ? 'active' : '' ?>" aria-current="page" href="/project_car2hand/page/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_path == trim('/project_car2hand/page/about', '/') ? 'active' : '' ?>" href="/project_car2hand/page/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_path == trim('/project_car2hand/page/product', '/') ? 'active' : '' ?>" href="/project_car2hand/page/product">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_path == trim('/project_car2hand/page/contract', '/') ? 'active' : '' ?>" href="/project_car2hand/page/contract">Contract</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['authen_id'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <?php echo 'name : ' . $_SESSION['first_name'];echo '  ' . $_SESSION['last_name'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/project_car2hand/page/profile/">Profile</a></li>
                            <li><a class="dropdown-item" href="/project_car2hand/page/admin/">Dashboard</a></li>
                            <!-- <li><a class="dropdown-item" href="/project_car2hand/page/password.php">เปลี่ยนรหัสผ่าน</a></li> -->
                            <!-- <li><hr class="dropdown-divider" /></li> -->
                            <li><a class="dropdown-item" href="/project_car2hand/page/logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="/project_car2hand/page/login.php" class="btn btn-primary">เข้าสู่ระบบ</a>
                        <a href="/project_car2hand/page/register.php" class="btn btn-warning">สมัครสมาชิก</a>
                    </li>
                <?php } ?>
            </ul>

        </div>

    </div>
</nav>
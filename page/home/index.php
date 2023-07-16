<?php session_start() ?>
<!-- check ไม่ให้ไปหน้า login หรือ register ได้เมื่อ มี session -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <?php require_once('../includes/theme.php') ?>
</head>

<body>
    <?php include('../includes/navbar.php'); ?>
    <!-- Section Carousel -->
    <div id="carouselExampleIndicators" class="carousel" data-bs-ride="carousel">
        <div class="carousel-inner" style="max-height: 75vh;">
            <div class="carousel-item active">
                <img src="../../assets/image/Banner.jpg" class="d-block w-100" alt="AppzStory">
            </div>
        </div>
    </div>

    <main class="container-fuild">
        <h1 class="text-center">Home</h1>
    </main>
    <?php require_once('../includes/script.php') ?>
</body>

</html>
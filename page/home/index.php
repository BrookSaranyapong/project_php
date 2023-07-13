<?php session_start() ?>
<!-- check ไม่ให้ไปหน้า login หรือ register ได้เมื่อ มี session -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" class="rel">
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

    <main class="container my-5">
        <h1>Home</h1>
    </main>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
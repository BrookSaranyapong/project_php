<?php include_once('../authen.php') ?>
<?php
if (isset($_POST['submit'])) {

    $sql = $conn->prepare("INSERT INTO `sale_cars` (Sale_time, 	Sale_price, Sale_name, 	Cus_id, Car_id)
                       VALUES (:Sale_time, :Sale_price, :Sale_name, :Cus_id, :Car_id)");
    $result_insert = $sql->execute(array(
        ":Sale_time" => date("Y-m-d H:i:s"),
        ":Sale_price" => $_POST['sale_price'],
        ":Sale_name" => $_POST['carOwner'],
        ":Cus_id" => $_POST['cusidOwner'],
        ":Car_id" => $_POST['carmodel']
    ));
    if ($result_insert) {
        echo '<script> alert("เพิ่มข้อมูลเรียบร้อยแล้ว") </script>';
        header('Refresh:0; url=index.php');
    } else {
        echo '<script> alert("เพิ่มข้อมูลผิดพลาด!")</script>';
        header('Refresh:0; url=index.php');
    }
    // echo '<pre>', print_r($_POST), '</pre>';
}
?>
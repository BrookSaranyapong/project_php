<?php include_once('../authen.php') ?>
<?php

    $id = $_GET['id'];
    if (isset($id) && $id != 1) {
        $sql = "DELETE FROM `auth_cars` WHERE `auth_cars`.`u_id` = ? ";
        $result = $conn->prepare($sql);
        $result->execute([$id]);
        
        if($conn->$result->rowCount() > 0){
            echo '<script> alert("Finished Deleting!")</script>'; 
            header('Refresh:0; url=index.php');
        } else {
            echo '<script> alert("No Data!")</script>'; 
            header('Refresh:0; url=index.php');
        }
    } else {
        header('Refresh:0; url=index.php');
    }
?>
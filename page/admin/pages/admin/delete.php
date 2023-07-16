<?php include_once('../authen.php') ?>
<?php

    $id = $_GET['id'];
    if (isset($id) && $id != 1) {
        $sql = "DELETE FROM `admin` WHERE `admin`.`id` = '".$id."' ";
        $result = $conn->query($sql);
        $sql1 = "DELETE FROM `profile` WHERE `profile`.`p_id` = '".$id."' ";
        $result = $conn->query($sql1);
        if($conn->affected_rows){
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
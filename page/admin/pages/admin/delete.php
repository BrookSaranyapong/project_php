<?php include_once('../authen.php') ?>
<?php

    $id = $_GET['id'];
    if (isset($id) && $id != 1) {
        $sqlprofile = "SELECT image FROM `user` WHERE u_id = :id ";
        $stmt = $conn->prepare($sqlprofile);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $rowprofile = $stmt->fetch(PDO::FETCH_ASSOC);
        unlink('../../../../assets/image/imageMember/'.$rowprofile['image']);

        $sql = "DELETE FROM `user` WHERE u_id = :id ";
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        
        //if($conn->$result->rowCount() > 0){
        if($result->execute()){
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
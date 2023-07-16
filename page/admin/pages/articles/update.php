<?php include_once('../authen.php') ?>
<?php
    // echo '<script> alert("Finished Updating!")</script>'; 
    // header('Refresh:0; url=index.php');
    if (isset($_POST['submit'])){
        $image_name = $_POST['data_file'];
        if( $_FILES['file']['error'] == 0){
            if( !getimagesize($_FILES['file']['tmp_name'])){
                echo '<script> alert(" ต้องอัพโหลดเป็นไฟล์ภาพเท่านั้น! ")</script>';
                header('Refresh:0; url=index.php');
            }
            $temp = explode('.',$_FILES['file']['name']);
            $image_name = round(microtime(true)*9999) . '.' . end($temp);
            $url_upload = '../../../assets/images/blog/' . $image_name;
            if( !move_uploaded_file($_FILES['file']['tmp_name'], $url_upload)) {
                echo '<script> alert(" ไม่สามารถอัพโหลดรูปภาพใหม่ได้ โปรดลองอีกครั้ง! ")</script>';
                header('Refresh:0; url=index.php'); 
            }
        } 
        $detail = str_replace('../../../', './', $_POST['detail']) ;
        $tag = 'all,' . join(',',$_POST['tags']);
        $status = isset($_POST['status']) ? 'true' : 'false';
        $sql = "UPDATE `articles` 
                SET subject = '".$_POST['subject']."',
                    sub_title = '".$_POST['sub_title']."',
                    detail = '".$detail."',
                    image = '".$image_name."',
                    tag = '".$tag."',
                    status = '".$status."',
                    update_at = '".date("Y-m-d H:i:s")."'
                    WHERE ar_id = '".$_POST['id']."' ";
        $result = $conn->query($sql) or die($conn->error);
        if($result){
            echo '<script> alert(" แก้ไขข้อมูลสำเร็จ! ") </script>';
            header('Refresh:0; url=index.php'); 
        }
    }else {
        header('Location: index.php');
    } 
?>
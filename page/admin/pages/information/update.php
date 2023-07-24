<?php include_once('../authen.php') ?>
<?php
    $passwordold = $_POST['passwordold'];
    $passwordnew = $_POST['passwordnew'];
    $passwordconfirm = $_POST['passwordconfirm'];



    if(isset($_POST['submit'])){
        $image_name = $_POST['data_file'];
        if( $_FILES['file']['error'] == 0){
            if( !getimagesize($_FILES['file']['tmp_name'])){
                echo '<script> alert(" ต้องอัพโหลดเป็นไฟล์ภาพเท่านั้น! ")</script>';
                header('Refresh:0; url=index.php');
            }
            unlink('../../../../assets/image/imageMember/'.$image_name); //delete old image if has new

            $temp = explode('.',$_FILES['file']['name']);
            $image_name = round(microtime(true)*9999) . '.' . end($temp);
            $url_upload = '../../../../assets/image/imageMember/' . $image_name;
            if( !move_uploaded_file($_FILES['file']['tmp_name'], $url_upload)) {
                echo '<script> alert(" ไม่สามารถอัพโหลดรูปภาพใหม่ได้ โปรดลองอีกครั้ง! ")</script>';
                header('Refresh:0; url=index.php'); 
            }
        }

        if(!empty($passwordold)){
            $sql = "SELECT password FROM `user` WHERE u_id = '".$_POST['id']."'";
            $result = $conn->query($sql);
            $row = $result -> fetch(PDO::FETCH_ASSOC);
            if($passwordnew == $passwordconfirm){
                if(password_verify($passwordold,$row['password'])){
                    $hashed = password_hash($passwordnew, PASSWORD_BCRYPT);
                    $exec = "UPDATE `user`
                            SET password = '".$hashed."'
                            WHERE u_id = '".$_POST['id']."'";
                    if($conn->query($exec) or die($conn->error)){
                        //echo '<script> alert("เปลี่ยนรหัสสำเร็จ")</script>';
                    } else {
                        echo '<script> alert("เปลี่ยนรหัสไม่สำเร็จ")</script>';
                    }
                } else {
                    echo '<script> alert("ใส่รหัสเก่าไม่ตรง")</script>';
                }
            } else {
                echo '<script> alert("รหัสใหม่กับรหัสยืนยันไม่ตรงกัน")</script>';
            }
        }

            $sql = $sql = "UPDATE `user` 
                SET first_name =    '".$_POST['first_name']."',
                    last_name =     '".$_POST['last_name']."',
                    image =         '".$image_name."',
                    email =         '".$_POST['email']."',
                    phone =         '".$_POST['phone']."',
                    address =       '".$_POST['address']."',
                    updated_at =    '".date('Y-m-d H:i:s')."'
                    WHERE u_id =    '".$_POST['id']."' ";
                    
            $result = $conn->query($sql) or die($conn->error);
            if($result){
                $_SESSION['first_name'] = $_POST['first_name'];
                $_SESSION['last_name'] = $_POST['last_name'];
                echo '<script> alert("แก้ไขข้อมูลสำเร็จ ")</script>'; 
                header('Refresh:0; url=index.php');
            }else {
                echo '<script> alert("แก้ไขข้อมูลผิดพลาด!")</script>'; 
                header('Refresh:0; url=index.php');
            }
            
    }else{
        header('Refresh:0; url=index.php');
    }

?>
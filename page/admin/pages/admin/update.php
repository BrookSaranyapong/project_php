<?php include_once('../authen.php') ?>
<?php
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
        } $hashed = password_hash($_POST['password'], PASSWORD_BCRYPT);
            // $sql = "UPDATE `admin` AS a
            //         INNER JOIN `profile` AS pr
            //         ON  a.profile_id = pr.p_id
            //         SET a.first_name = '".$_POST['first_name']."'   ,
            //             a.last_name = '".$_POST['last_name']."'     ,
            //             a.password = '".$_POST['password']."'       ,
            //             a.a_image = '".$image_name."'               ,
            //             a.status = '".$_POST['status']."'           ,
            //             pr.p_Email = '".$_POST['Email']."'          ,
            //             pr.p_Phone = '".$_POST['Phone']."'          ,
            //             a.updated_at = '".date('Y-m-d H:i:s')."'    ,
            //             pr.p_Address = '".$_POST['Address']."' 
            //         WHERE a.id = '".$_POST['id']."' ";


            $sql = "UPDATE `user` 
                    SET cus_id =    ?,
                        first_name =    ?,
                        last_name =     ?,
                        password =      ?,
                        role =          ?,
                        updated_at =    ?,
                    WHERE u_id = ? ";
        $result = $conn->prepare($sql);
        
        // $params = array(":first_name" => $_POST['first_name'] ,
        //             ":last_name" => $_POST['last_name'],
        //             ":password" => $_POST['password'],
        //             ":role" => $_POST['status'],
        //             ":image" => $image_name,
        //             ":updated_at" => date("Y-m-d H:i:s"),
        //             ":cus_id" => $_POST['cus_id'],
        //             "phone" => $_POST['phone'],
        //             "email" => $_POST['email'],
        //             "address" => $_POST['address'],
        //             "u_id" => $_POST['id']);

        $result->execute([$_POST['first_name'],$_POST['last_name'],$_POST['password'],$image_name,date('Y-m-d H:i:s'),$_POST['role'],$_POST['id']]);        $result->execute();
            if($result){
                echo '<script> alert("แก้ไขข้อมูลสำเร็จ!")</script>'; 
                header('Refresh:0; url=index.php');
            } else {
                echo '<script> alert("แก้ไขข้อมูลผิดพลาด!")</script>'; 
                header('Refresh:0; url=index.php');
            }
        
    }else{
        header('Refresh:0; url=index.php');
    }

?>
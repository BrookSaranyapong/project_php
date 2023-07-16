<?php include_once('../authen.php') ?>
<?php
    if(isset($_POST['submit'])){
        $sql_check_username = "SELECT * FROM `admin` WHERE `username` = '".$_POST['username']."' ";
        $check_username = $conn->query($sql_check_username);
        $last_id = $conn->insert_id;
        
        $temp = explode('.',$_FILES['file']['name']); //explode ฟังค์ชั่นเป็น การแยก จุด ระหว่าง ชื่อไฟล์.นามสกุล ตาม index[0=ชื่อไฟล์][1=นามสกุล]
        $new_name = round(microtime(true)*9999) . '.' . end($temp); //ใช้ end() เป็นการเลือก index[] ตัวสุดท้าย เพื่อเลือกนามสกุล
        $url = '../../../assets/images/imageMember/'.$new_name;
            if(move_uploaded_file($_FILES['file']['tmp_name'], $url) && !$check_username->num_rows){

                $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
                

                $str_sql = $conn->query("SELECT * FROM `admin` WHERE status = 'superadmin' ");
                $int_rows = $str_sql->num_rows;

                
                if($int_rows <= 2){
                    $sql2 = "INSERT INTO `profile` (`p_Phone`,`p_Address`,`p_Email`) 
                            VALUES('".$_POST['p_Phone']."',
                                    '".$_POST['p_Address']."',
                                    '".$_POST['p_Email']."'); ";
                    $result2 = $conn->query($sql2) or die($conn->error);
                    $last_id = $conn->insert_id;

                
                    $sql = "INSERT INTO `admin` (`first_name`, `last_name`, `username`, `password`, `status`, `a_image`, profile_id, `last_login`, `updated_at`, `created_at`) 
                            VALUES ('".$_POST['first_name']."', 
                                    '".$_POST['last_name']."', 
                                    '".$_POST['username']."',
                                    '".$hashed."',
                                    '".$_POST['status']."',
                                    '".$new_name."',
                                    '".$last_id."',
                                    '".date("Y-m-d H:i:s")."', 
                                    '".date("Y-m-d H:i:s")."', 
                                    '".date("Y-m-d H:i:s")."'); ";
                    $result = $conn->query($sql) or die($conn->error);
                    
                        if($result && $result2){
                            echo '<script> alert("เพิ่มข้อมูลสำเร็จ!")</script>'; 
                            header('Refresh:0; url=index.php');
                        } else {
                            echo '<script> alert("เพิ่มข้อมูลผิดพลาด!")</script>'; 
                            header('Refresh:0; url=index.php');
                        }
                }else{
                        echo '<script> alert("เพิ่มข้อมูลได้ไม่เกิน 2 คนสำหรับ SuperAdmin!")</script>'; 
                        header('Refresh:0; url=index.php');
                }
            } else {
            echo '<script> alert("Username is aready exists!")</script>';
            header('Refresh:0; url=form-create.php');
        }
    } else {
        header('Refresh:0; url=index.php');
    }
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
?>
<?php include_once('../authen.php') ?>
<?php
    if(isset($_POST['submit'])){
        // $sql_check_username = "SELECT * FROM `admin` WHERE `username` = '".$_POST['username']."' ";
        $sql_check_username = "SELECT * FROM `user` WHERE `username` = :username ";
        $check_username = $conn->prepare($sql_check_username);
        $check_username->execute(array(":username" => $_POST['username']));
        // $check_username = $conn->query($sql_check_username);
        // $last_id = $conn->lastInsertId();
        
        $temp = explode('.',$_FILES['file']['name']); //explode ฟังค์ชั่นเป็น การแยก จุด ระหว่าง ชื่อไฟล์.นามสกุล ตาม index[0=ชื่อไฟล์][1=นามสกุล]
        $new_name = round(microtime(true)*9999) . '.' . end($temp); //ใช้ end() เป็นการเลือก index[] ตัวสุดท้าย เพื่อเลือกนามสกุล
        $url = '../../../assets/images/imageMember/'.$new_name;
            if(move_uploaded_file($_FILES['file']['tmp_name'], $url) && !$check_username->rowCount()){

                $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
                

                $str_sql = $conn->prepare("SELECT * FROM `user` WHERE role = :admin ");
                $str_sql->execute(array(":admin" => $_SESSION['role']));
                $int_rows = $str_sql->rowCount();

                
                if($int_rows <= 2){
                    $sql = "INSERT INTO `user` (`cus_id`,
                                                `first_name`, 
                                                `last_name`, 
                                                `username`, 
                                                `password`, 
                                                `role`, 
                                                `image`, 
                                                `email`, 
                                                `phone`, 
                                                `address`, 
                                                `last_login`, 
                                                `updated_at`, 
                                                `created_at`
                                                ) 
                            VALUES (:cus_id,
                                    :first_name, 
                                    :last_name, 
                                    :username,
                                    :password,
                                    :role,
                                    :image,
                                    :email,
                                    :phone,
                                    :address,
                                    :last_login, 
                                    :updated_at, 
                                    :created_at); ";

                    $result = $conn->prepare($sql);
                    $result->execute(array( ":cus_id" => $_POST['cus_id'],
                                            ":first_name" => $_POST['firstname'] ,
                                            ":last_name" => $_POST['last_name'],
                                            ":username" => $_POST['userpass'],
                                            ":password" => $_POST['password'],
                                            ":role" => $_POST['role'],
                                            ":image" => $new_name,
                                            ":email" => $_POST['email'],
                                            ":phone" => $_POST['phone'],
                                            ":address" => $_POST['address'],
                                            ":last_login" => date("Y-m-d H:i:s") ,
                                            ":updated_at" => date("Y-m-d H:i:s"),
                                            ":created_at" => date("Y-m-d H:i:s"))
                                    );
                    
                        if($result){
                            echo '<script> alert("เพิ่มข้อมูลสำเร็จ!")</script>'; 
                            header('Refresh:0; url=index.php');
                        } else {
                            echo '<script> alert("เพิ่มข้อมูลผิดพลาด!")</script>'; 
                            header('Refresh:0; url=index.php');
                        }
                }else{
                        echo '<script> alert("เพิ่มข้อมูลได้ไม่เกิน 2 คนสำหรับ Admin!")</script>'; 
                        header('Refresh:0; url=index.php');
                }
            } else {
            echo '<script> alert("Username is aready exists!")</script>';
            header('Refresh:0; url=form-create.php');
        }
    } else {
        header('Refresh:0; url=index.php');
    }

?>
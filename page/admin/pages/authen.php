<?php 
   session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "car_two_hand";
   
   try {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       // Set the PDO error mode to exception
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "Connected successfully";
   } catch(PDOException $e) {
       echo "Connection failed: " . $e->getMessage();
   }
   $uri = $_SERVER['REQUEST_URI'];
   $array = explode('/',$uri);
   $key = array_search("pages",$array);
   $name = $array[$key+1];

   if(!isset($_SESSION['authen_id'] ) ){
      header('Location: /project_car2hand/page/home');
   }else if( $name == 'admin' && $_SESSION['role'] == 'user') {
      header('Location: ../dashboard/');  
   }

?>
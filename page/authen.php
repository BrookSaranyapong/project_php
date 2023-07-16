<?php 
   require_once('../config/connection.php');
   $uri = $_SERVER['REQUEST_URI']; //page
   $array = explode('/',$uri); // ถอด / ออก
   $key = array_search("page",$array);
   $name = $array[$key+1]; // page/profile

   // if (!isset($_SESSION['authen_id'])) {
   //    header('Location: /project_car2hand/page/login.php');
   // }
   if (isset($_SESSION['authen_id'])) {
      header('Location: /project_car2hand/page/home'); // Change this to your desired page
      exit;
   }   

?>
<?php 
   // include("../../../config/connection.php");
   session_start();
   $uri = $_SERVER['REQUEST_URI'];
   $array = explode('/',$uri);
   $key = array_search("pages",$array);
   $name = $array[$key+1];

   if(!isset($_SESSION['authen_id'] ) ){
      header('Location: /project_car2hand/page/home');

   // }else if( $name == 'admin' && $_SESSION['role'] == 'admin') {
   //    header('Location: ../dashboard/');  
   // }else if( $name == 'admin' && $_SESSION['role'] == 'user') {
   //    header('Location: ../dashboard/');  
   }

?>
<?php 
   require_once('../config/connection.php');
   $uri = $_SERVER['REQUEST_URI'];
   $array = explode('/',$uri);
   $key = array_search("page",$array);
   $name = $array[$key+1];

   if (isset($_SESSION['authen_id'])) {
      header('Location: ./home/home.php'); // Change this to your desired page
      exit;
   }
   // if (isset($_SESSION['authen_id'])) {
   //    header('Location: ../home/home.php'); // Change this to your desired page
   //    exit;
   //  }
   // else{
   //    header('Location: ../page/home.php');
   // }
   // if(!isset($_SESSION['authen_id'] ) ){
   //    header('Location: ../register.php');
   // }else{
   //    header('Location: ../home.php');
   // }

?>
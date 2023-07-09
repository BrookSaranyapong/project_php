<?php 
   session_start();
   require_once('../../../php/connect.php');

   $uri = $_SERVER['REQUEST_URI'];
   $array = explode('/',$uri);
   $key = array_search("pages",$array);
   $name = $array[$key+1];

   if( !isset($_SESSION['authen_id'] ) ){
      header('Location: ../../login.php');

   }else if( $name == 'admin' && $_SESSION['status'] == 'admin') {
      header('Location: ../page/');
   }else if( $name == 'admin' && $_SESSION['status'] == 'user') {
      header('Location: ../page/');  
   }else if( $name == 'articles' && $_SESSION['status'] == 'user') {
      header('Location: ../page/');  
   }else if( $name == 'logs' && $_SESSION['status'] == 'user') {
      header('Location: ../page/');  
   }else if( $name == 'contacts' && $_SESSION['status'] == 'user') {
      header('Location: ../page/');  
   }else if( $name == 'personnel' && $_SESSION['status'] == 'user') {
      header('Location: ../page/');  
   }else if( $name == 'student' && $_SESSION['status'] == 'user') {
      header('Location: ../page/');  
   }

?>
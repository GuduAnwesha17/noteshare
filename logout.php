<?php 
   session_start();
   session_destroy();
   unset($_SESSION['email']);

   $_SESSION['message'] = "Logout sucessfull";
   header("location:index.php");

   ?>
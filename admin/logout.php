<?php
   session_start();

   session_unset();   //  delete data

   session_destroy();  //  delete session 

   header("location:index.php");

   exit();
?>
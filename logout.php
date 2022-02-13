<?php


// if(isset($_GET['logout'])) {
//     session_destroy();
//     unset($_SESSION['username']);
//     header('location:login.php');
// }
  
session_start(); 
session_destroy();
header("location:index.php");
exit();

?>
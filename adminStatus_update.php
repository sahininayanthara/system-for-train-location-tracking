<?php

if(!isset($_SESSION)){
  session_start();
 
}

if(!isset($_SESSION['userID'])){ 
  header('location: adminlogin.php#you_must_login_first'); 
}

include('connection/db.php');


$Status = $_POST['Status'];
$ID = $_POST['ID'];

 $sql = "UPDATE `user` SET status ='$Status' WHERE id='$ID'";
 $result=mysqli_query($con,$sql); 
?>
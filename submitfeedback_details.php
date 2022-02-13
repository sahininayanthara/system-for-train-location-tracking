<?php

if(!isset($_SESSION)){
  session_start();
 
}

if(!isset($_SESSION['newuserID'])){ 
  header('location: login.php#you_must_login_first'); 
}

include('connection/db.php');



  $customerName       = mysqli_real_escape_string($con,$_POST['customerName']);
  $customeraddres       = mysqli_real_escape_string($con,$_POST['customeraddres']);
  $customerEmail1  = mysqli_real_escape_string($con,$_POST['customerEmail1']);
  $customerComment         = mysqli_real_escape_string($con,$_POST['customerComment']);
  
            
      
    
   $sql_add = "INSERT INTO feedback (`name`, `address`, `email`, `feedback`) VALUES ('$customerName', '$customeraddres', '$customerEmail1', '$customerComment')";
   $res_add = mysqli_query($con,$sql_add);
  ?>
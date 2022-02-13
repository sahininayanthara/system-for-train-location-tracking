<?php  

include('connection/db.php'); 
// require_once('function.php');
// require_once('siteurl.php'); 
$username       = mysqli_real_escape_string($con, $_POST['username']);  
$userPassword         = mysqli_real_escape_string($con, $_POST['userPassword']);
$userEmail          = mysqli_real_escape_string($con, $_POST['userEmail']);



  $sql 	    = "INSERT INTO user ( name, email, password, role) 
                VALUES ('$username', '$userEmail', '$userPassword', 'User')"; 
  mysqli_query($con, $sql);
 
  
  $loginauth = "success"; 
  

echo json_encode(array("loginstate"=>$loginauth));

 
 
?>
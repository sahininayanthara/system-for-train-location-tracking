<?php
if(!isset($_SESSION)){
  session_start();
 
}


include('connection/db.php');


$username        = mysqli_real_escape_string($con,$_POST['username']);
$userEmail       = mysqli_real_escape_string($con,$_POST['userEmail']);
$userPassword    = mysqli_real_escape_string($con,$_POST['userPassword']);


$sql_checkEmail    = "SELECT * FROM user WHERE email = '$userEmail'";
$result_checkEmail = mysqli_query($con, $sql_checkEmail);
$numrow_checkEmail = mysqli_num_rows($result_checkEmail);

if($numrow_checkEmail>0){
  echo "Already Exists Email";
}else{
  

 $add_user_info = "INSERT INTO `user` (`name`, `email`, `password`, `role`) VALUES ('$username', '$userEmail', '$userPassword', 'User')";
 
 
mysqli_query($con, $add_user_info);
  

  



}


?>
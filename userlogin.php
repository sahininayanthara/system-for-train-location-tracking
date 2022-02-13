<?php

if (!isset($_SESSION)) {
  session_start();
}

include('connection/db.php');

if (isset($_POST['submit'])) {
	
$user = mysqli_real_escape_string($con, $_POST['adminemail']);
$pass = mysqli_real_escape_string($con, $_POST['adminpassword']);
	
$sql_user = "SELECT * FROM `user` WHERE email = '$user' AND password = '$pass' AND role = "Admin" LIMIT 1";
$result = mysqli_query($con, $sql_user);
$row = mysqli_fetch_assoc($result);
$totalrow = mysqli_num_rows($result);

if ($totalrow > 0) {
	
	$_SESSION['userID2']   =$row['id'];
	$_SESSION['userRole'] =$row['role'];
	$uname = $_SESSION['userID2'];
  
    
  header("Location:index.php");
  
  $sql_lastlogin = "UPDATE user SET lastLogin=now() WHERE id='$uname'";
  $res_lastlogin = mysqli_query($con,$sql_lastlogin);
  
}else {
	
	header("Location: adminlogin.php?status=error");
	
}

}

?>
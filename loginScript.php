<?php

if (!isset($_SESSION)) {
  session_start();
}

include('connection/db.php'); 

if (isset($_POST['login'])) {
	
 
  
$uname = mysqli_real_escape_string($con, $_POST['adminemail']); 
$pass  = mysqli_real_escape_string($con, $_POST['adminpassword']); 
 
$sql_login = "SELECT * FROM `user` WHERE email = '$uname' AND password = '$pass' AND status = 'Active' AND role = 'Admin' LIMIT 1";
 
  
$qry_login = mysqli_query($con, $sql_login); 
$row       = mysqli_fetch_assoc($qry_login);
$totalrow  = mysqli_num_rows($qry_login);  
  
if ($totalrow > 0) {
   
  $_SESSION['userID']   = $row['id']; 
  $_SESSION['admin_role'] = $row['role'];
  
	echo "SUCCESS";
 
 
  
 
           
}else{
	
	echo "ERROR";  
	
}

}

 

?>
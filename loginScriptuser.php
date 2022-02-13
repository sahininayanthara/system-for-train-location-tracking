<?php

if (!isset($_SESSION)) {
  session_start();
}

include('connection/db.php'); 

if (isset($_POST['usersubmit'])) {
	
 
  
$uname = mysqli_real_escape_string($con, $_POST['uloginEmail1']); 
$pass  = mysqli_real_escape_string($con, $_POST['uloginpassword']); 
 
$sql_login = "SELECT * FROM `user` WHERE email = '$uname' AND password = '$pass' AND status = 'Active' AND role = 'User' LIMIT 1";
 
  
$qry_login = mysqli_query($con, $sql_login); 
$row       = mysqli_fetch_assoc($qry_login);
$totalrow  = mysqli_num_rows($qry_login);  
  
if ($totalrow > 0) {
   
  $_SESSION['newuserID']   = $row['id']; 
  $_SESSION['admin_role'] = $row['role'];
  
	echo "SUCCESS";
 
 
  
 
           
}else{
	
	echo "ERROR";  
	
}

}

 

?>
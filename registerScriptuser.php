<?php

if (!isset($_SESSION)) {
  session_start();
}

include('connection/db.php'); 

if (isset($_POST['signupuser'])) {
	
 



  
$uname = mysqli_real_escape_string($con, $_POST['username']); 
$userEmail  = mysqli_real_escape_string($con, $_POST['userEmail']); 
$userPassword = mysqli_real_escape_string($con, $_POST['userPassword']); 
$userConPassword  = mysqli_real_escape_string($con, $_POST['userConPassword']); 
 
$sql_login = "SELECT * FROM `user` WHERE email = '$userEmail' LIMIT 1";
 
  
$qry_login = mysqli_query($con, $sql_login); 
$row       = mysqli_fetch_assoc($qry_login);
$totalrow  = mysqli_num_rows($qry_login);  
  
if ($totalrow == 1) {
   
 
 echo "ERROR";  
	
  
 
           
}else{
	
		echo "SUCCESS";
}

}

 

?>
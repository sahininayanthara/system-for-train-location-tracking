<?php  
include('connection/db.php'); 

 
$email  = mysqli_real_escape_string($con, $_POST['userEmail']); 
  
$sql_validation     = "SELECT * FROM `user` WHERE `email` = '$email' ";
$result_validation  = mysqli_query($con, $sql_validation);
$num_row_validation = mysqli_num_rows($result_validation);

if($num_row_validation <= 0){
   echo "true";
}else{
  echo "false";
}
 
?>
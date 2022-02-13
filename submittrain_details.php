<?php
if(!isset($_SESSION)){
  session_start();
 
}

if(!isset($_SESSION['userID'])){ 
 header('location: adminlogin.php#you_must_login_first'); 
}
 include('connection/db.php');


 $userID = $_SESSION['userID'];



  $adTrName       = mysqli_real_escape_string($con,$_POST['adTrName']);
  $adTrFrom       = mysqli_real_escape_string($con,$_POST['adTrFrom']);
  $adTrDeparture  = mysqli_real_escape_string($con,$_POST['adTrDeparture']);
  $adTrTo         = mysqli_real_escape_string($con,$_POST['adTrTo']);
  $adTrArrival    = mysqli_real_escape_string($con,$_POST['adTrArrival']);
  $adTrdate       = mysqli_real_escape_string($con,$_POST['adTrdate']);

            

    
   $sql_add = "INSERT INTO traindetails (`name`, `trfrom`, `departure`, `trto`, `arrival`, `date`) VALUES ('$adTrName', '$adTrFrom', '$adTrDeparture', '$adTrTo', '$adTrArrival', '$adTrdate')";
   $res_add = mysqli_query($con,$sql_add);
  ?>
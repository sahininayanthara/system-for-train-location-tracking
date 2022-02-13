<?php

if(!isset($_SESSION)){
  session_start();
 
}

if(!isset($_SESSION['userID'])){ 
  header('location: adminlogin.php#you_must_login_first'); 
}

include('connection/db.php');


$sql_feedback = "SELECT * FROM feedback ORDER BY id DESC";
$res_feedback = mysqli_query($con,$sql_feedback);
$row_feedback = mysqli_num_rows($res_feedback);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
    <link rel='shortcut icon' type='image/x-icon' href='images/logo.jpg' />
    <title>Train Location Tracking - View Feedback</title>

    <style>
.table td{
  border-top: 1px solid #2e4158;
}
.table thead th{
  border: 0;
}

    </style>
</head>
<body style="background-color: #66DAC7;">
<div id="layout-wrapper">
<div class="main-content" >
    <div class="page-content">
      
<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm" style="background-color: #455a73 !important;">
  <div class="container">
    <a href="#" class="navbar-brand">
      <!-- Logo Image -->
      <img src="/logo.jpg" width="45" alt="" class="d-inline-block align-middle mr-2">
      <!-- Logo Text -->
     
    </a>

    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="addtraindetails.php" class="nav-link">Add Train Details</a></li>
        <li class="nav-item"><a href="viewtraindet.php" class="nav-link">View Train Details</a></li>
        <li class="nav-item"><a href="viewuser.php" class="nav-link">View Users</a></li>
        <li class="nav-item"><a href="trlocationadmin.php" class="nav-link">Train Location</a></li>
        <li class="nav-item"><a href="viewfeedback.php" class="nav-link">View Feedback</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

        <div class="container-fluid" >








                <div class="row justify-content-md-center">
                <div class="col-md-12"  >
               
                  <h4 class="mb-5 mt-5 text-center" style="color:white;">View feedback</h4>




 <?php

if($row_feedback>0){
  


 ?>

<table cellpadding="7" cellspacing="7" class="table table-hover mt-4 " style="border: 1px solid #2e4158;">
  <thead>
    <tr style="background-color: #2E4158 !important;color: white">
     
       <th>Id</th>
      <th>Name</th>
      <th>Address</th>
      <th>Email</th>
      <th>Feedback</th>
    </tr>
  </thead>
  
 
  <tbody>
      
    <?php
while($fetch_feedback = mysqli_fetch_assoc($res_feedback)){
  $idu = $fetch_feedback['id'];
    $name = $fetch_feedback['name'];
    $traddress = $fetch_feedback['address'];
    $email = $fetch_feedback['email'];
    $trfeedback = $fetch_feedback['feedback'];
   
    ?>
    <tr>
      
        <td><?php echo $idu; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $traddress; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $trfeedback; ?></td>
                      
    </tr>       
  
<?php
}

?>
</tbody>
</table>
<?php
}else{
  ?>
<div class="alert alert-danger mt-4" style="color: white;background-color: #c12020;text-align: center;border-radius: 20px;">
    No Feedbacks
    </div>   

  <?php
}
?>


                </div>
                </div>
                </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</body>
</html>
<?php

if(!isset($_SESSION)){
  session_start();
 
}

if(!isset($_SESSION['newuserID'])){ 
  header('location: login.php#you_must_login_first'); 
}

include('connection/db.php');

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
    <title>Train Location Tracking - Customer Feedback</title>
</head>
<body>
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
        <li class="nav-item active"><a href="traindetails.php" class="nav-link">Train Details</a></li>
        <li class="nav-item"><a href="customer.php" class="nav-link">Customer Feedback</a></li>
        <li class="nav-item"><a href="trlocationuse.php" class="nav-link">Train Location</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        
      </ul>
    </div>
  </div>
</nav>


        <div class="container-fluid">
                <div class="row justify-content-md-center">
                <div class="col-md-6" style="background-color: #66DAC7;" ></div>
                <div class="col-md-6" style="width: 50%;background-color: #2E4158;padding: 25px 40px;overflow: auto;">
                  <h5 class="mb-5 mt-4" style="color:white;">Customer Feedback</h5>


                    <form name="frmcustomer" id="frmcustomer" method="POST">

                      <div class="form-group" style="color:white;">
                        <label for="exampleInputPassword1" class="mb-2">Name</label>
                        <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Enter Your Name">
                      </div>
                            
                      <div class="form-group" style="color:white;margin-top: 2.2rem">
                        <label for="exampleInputPassword1" class="mb-2">Address</label>
                        <input type="text" class="form-control" id="customeraddres" name="customeraddres" placeholder="Enter Your Address">
                      </div>

                      <div class="form-group" style="color:white;margin-top: 2.2rem">
                        <label for="exampleInputEmail1" class="mb-2">Email address</label>
                        <input type="email" class="form-control" id="customerEmail1" name="customerEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
    
                      </div>
                      <div class="form-group" style="color:white;margin-top: 2.2rem">
                        <label for="exampleInputPassword1" class="mb-2">Comment</label>
                        <input type="text" class="form-control" id="customerComment" name="customerComment" placeholder="Enter Your Comment">
                      </div>
                      <div class="row mt-5">
                        <div class="col-md-8 mt-1">
                          <button type="submit" class="btn btn-primary" name="frmsub" id="frmsub" style="color:white; background-color: #66dac7;border-color: #66dac7;border-radius: 34px;width: 100px;padding: 4px 20px;">Add</button>
                        </div>
                      
                      </div>
              
                    </form>

                    <script>
      $(document).ready(function() {
        
        $("form[name='frmcustomer']").validate({

  rules: {

  customerName: {
      required: true,  
    
    },
    customerComment: {
      required: true,  
    
    }
  },
  
 messages:{
  
  customerName: {
      required: "This is required!",
  
    },

    customerComment: {
      required: "This is required!",
  
    } 
},


 submitHandler: function(form) {

  $("#frmsub").html("Wait. . ");
  $("#frmsub").prop('disabled', true);
      
      $.post( "submitfeedback_details.php", $( "#frmcustomer" ).serialize())
       .done(function( data ) {
    //alert("lll");
      $("#frmsub").html('Add');
      $("#frmsub").prop('disabled', false);
      swal("Good job!", "Successfully Add Feedback!", "success");
                setTimeout(
                  function() 
                    {
                     window.location.replace('customer.php');
                    }, 3000);
     
  
           
    });
  }
});   
        
   });
    </script>
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
</body>
</html>
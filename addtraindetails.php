<?php

if(!isset($_SESSION)){
  session_start();
 
}

if(!isset($_SESSION['userID'])){ 
  header('location: adminlogin.php#you_must_login_first'); 
}
//Get Connection
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
    <title>Train Location Tracking - Add Train Details</title>
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


        <div class="container-fluid">
                <div class="row justify-content-md-center">
                <div class="col-md-6" style="background-color: #66DAC7;" ></div>
                <div class="col-md-6" style="width: 50%;background-color: #2E4158;padding: 25px 40px;overflow: auto;">
                  <h5 class="mb-5 mt-4" style="color:white;">Add Train Details</h5>
                    <form method="POST" name="adddetailsform" id="adddetailsform">

                      <div class="form-group" style="color:white;">
                        <label for="exampleInputPassword1" class="mb-2">Train Name</label>
                        <input type="text" class="form-control" id="adTrName" name="adTrName" placeholder="Enter Train Name">
                      </div>
                            
                      <div class="form-group " style="color:white;margin-top: 2.2rem!important;">
                        <label for="exampleInputPassword1" class="mb-2">From</label>
                        <input type="text" class="form-control" id="adTrFrom" name="adTrFrom" placeholder="From">
                      </div>

                      <div class="form-group " style="color:white;margin-top: 2.2rem!important;">
                        <label for="exampleInputEmail1" class="mb-2">Departure</label>
                        <input type="text" class="form-control" id="adTrDeparture" name="adTrDeparture" placeholder="Departure">
    
                      </div>
                      <div class="form-group " style="color:white;margin-top: 2.2rem!important;">
                        <label for="exampleInputPassword1" class="mb-2">To</label>
                        <input type="text" class="form-control" id="adTrTo" name="adTrTo" placeholder="To">
                      </div>

                       <div class="form-group " style="color:white;margin-top: 2.2rem!important;">
                        <label for="exampleInputPassword1" class="mb-2">Arrival</label>
                        <input type="text" class="form-control" id="adTrArrival" name="adTrArrival" placeholder="Arrival">
                      </div>

                       <div class="form-group" style="color:white;margin-top: 2.2rem!important;">
                        <label for="exampleInputPassword1" class="mb-2">Date</label>
                        <input type="date" class="form-control" id="adTrdate" name="adTrdate" placeholder="Date">
                      </div>

                      <div class="row mt-5">
                        <div class="col-md-8">
                          <button type="submit" class="btn btn-primary"  id="go" style="color:white; background-color: #66dac7;border-color: #66dac7;border-radius: 34px;width: 100px;padding: 4px 20px;">Add</button>
                        </div>
                      
                      </div>
              
                    </form>
                </div>
                </div>
        </div>
    </div>
</div>
</div>
<script>
      $(document).ready(function() {
        
        $("form[name='adddetailsform']").validate({

  rules: {

  adTrName: {
      required: true,  
    
    },
    adTrFrom: {
      required: true,  
    
    },
    adTrDeparture: {
      required: true,  
    
    },
    adTrTo: {
      required: true,  
    
    },
    adTrArrival: {
      required: true,  
    
    },
    adTrdate: {
      required: true,  
    
    } 
  },
  
 messages:{
  
  adTrName: {
      required: "This is required!",
  
    },

    adTrFrom: {
      required: "This is required!",
  
    },
    adTrDeparture: {
      required: "This is required!",
  
    },
    adTrTo: {
      required: "This is required!",
  
    },
    adTrArrival: {
      required: "This is required!",
  
    },
    adTrdate: {
      required: "This is required!",
  
    } 
},


 submitHandler: function(form) {

  $("#go").html("Wait. . ");
  $("#go").prop('disabled', true);
			
      $.post( "submittrain_details.php", $( "#adddetailsform" ).serialize())
       .done(function( data ) {
		//alert("lll");
      $("#go").html('Add');
      $("#go").prop('disabled', false);
      swal("Good job!", "Successfully Add Train Details!", "success");
                setTimeout(
                  function() 
                    {
                     window.location.replace('addtraindetails.php');
                    }, 3000);
     
  
           
    });
  }
});   
        
   });
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


</body>
</html>
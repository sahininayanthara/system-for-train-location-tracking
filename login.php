<?php

if (!isset($_SESSION)) {
  session_start();
}

include('connection/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link rel="stylesheet" href="/style.css"> -->

    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
      <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

    <link rel='shortcut icon' type='image/x-icon' href='images/logo.jpg' />
    <title>Train Location Tracking - User Login</title>
</head>
<body>
<div id="layout-wrapper">
<div class="main-content" >
    <div class="page-content">
        <div class="container-fluid">
                <div class="row justify-content-md-center" style="height: 625px;">
                <div class="col-md-6" style="background-color: #66DAC7;" ></div>
                <div class="col-md-6" style="width: 50%;background-color: #2E4158;padding: 25px 40px;overflow: auto;">
                  <h5 class="mb-5 mt-5" style="color:white;">User Sign In</h5>

                    <form method="POST" name="userloginForm" id="userloginForm">
                      <div class="form-group mb-4" style="color:white;">
                        <label for="exampleInputEmail1" class="mb-2">Email address</label>
                        <input type="email" class="form-control" id="uloginEmail1" name="uloginEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
    
                      </div>
                      <div class="form-group" style="color:white;">
                        <label for="exampleInputPassword1" class="mb-2">Password</label>
                        <input type="password" class="form-control" id="uloginpassword" name="uloginpassword" placeholder="Enter Your Password">
                      </div>
                      <div class="row mt-4">
                        <div class="col-md-8">
                          <button type="submit" name="usersubmit" id="usersubmit" class="btn btn-primary" style="color:white; background-color: #66dac7;border-color: #66dac7;border-radius: 34px;width: 100px;padding: 4px 20px;">Sign In</button>
                        </div>
                      <div class="col-md-4">
                        <a href="userregister.php" style="color:white;margin-left: -250px;text-decoration:none; ">Create an account</a>
                      </div>
                      </div>
              


    <div class="alert alert-danger mt-4" style="color: white;background-color: #c12020;text-align: center;border-radius: 20px;display: none;" id="ualert">
    Username / password is incorrect or Inactive User.
    </div> 
                    </form>
                    <script>
 
 
    $(document).ready(function() {


$("#uloginEmail1").keyup(function(){
   $("#ualert").hide();
});
$("#uloginpassword").keyup(function(){
   $("#ualert").hide();
});


        
        $("#userloginForm").validate({ 
            rules: { 
                uloginEmail1: {
                    required: true
                },
                uloginpassword: {
                    required: true
                } 
            },
            messages: {
               
                uloginEmail1: {
                    required: "Email Field Required"
                },
                uloginpassword: {
                    required: "Password Field Required"
                }
                 
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            },
            submitHandler: submitForm
        });

   
    });



 
    function submitForm() {     
        var data = $("#userloginForm").serialize(); 
        $("#usersubmit").html('<i class="fas fa-circle-notch fa-spin" ></i>');
        $.ajax({                
            type : 'POST',
            url  : 'loginScriptuser.php',
            data : data,
           
            success : function(response){ 
                         
                if($.trim(response) === "ERROR"){
                  // alert("Username or password is incorrect."); 
                  $("#ualert").show();
                  
                  $("#usersubmit").html('Sign In');
                       
                 }else if($.trim(response) === "SUCCESS"){ 
                    $("#usersubmit").html('Sign In'); 
                    window.location.href = "traindetails.php";
                 }
   
            }
        });
        return false;
    }
  
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
</html>
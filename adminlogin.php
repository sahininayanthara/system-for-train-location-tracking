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
    <title>Train Location Tracking - Admin Login</title>
</head>
<body> 
<div id="layout-wrapper">
<div class="main-content" >
    <div class="page-content">
        <div class="container-fluid">
                <div class="row justify-content-md-center" style="height: 625px;">
                <div class="col-md-6" style="background-color: #66DAC7;" ></div>
            <div class="col-md-6" style="width: 50%;background-color: #2E4158;padding: 25px 40px;overflow: auto;">
<h5 class="mb-5 mt-5" style="color:white;">Admin Login</h5>



        <form method="POST" name="loginForm" id="loginForm">
  <div class="form-group mb-4" style="color:white;">
    <label for="exampleInputEmail1" class="mb-2">Email address</label>
    <input type="email" class="form-control" id="adminemail" name="adminemail" aria-describedby="emailHelp" placeholder="Enter Your Email">
    
  </div>
  <div class="form-group" style="color:white;">
    <label for="exampleInputPassword1" class="mb-2">Password</label>
    <input type="password" class="form-control" id="adminpassword"  name="adminpassword" placeholder="Enter Your Password">
  </div>
  <div class="row mt-4">
<div class="col-md-12">
<button type="submit" name="login" id="login"  class="btn btn-primary btn-block" style="color:white; background-color: #66dac7;border-color: #66dac7;border-radius: 34px;width: 100px;padding: 4px 20px;">Sign In</button>

</div>
  </div>
    

    <div class="alert alert-danger mt-4" style="color: white;background-color: #c12020;text-align: center;border-radius: 20px;display: none;" id="ualert">
    Username or password is incorrect.
    </div>   


</form>


<script>
 
 
    $(document).ready(function() {


$("#adminemail").keyup(function(){
   $("#ualert").hide();
});
$("#adminpassword").keyup(function(){
   $("#ualert").hide();
});


        
        $("#loginForm").validate({ 
            rules: { 
                adminemail: {
                    required: true
                },
                adminpassword: {
                    required: true
                } 
            },
            messages: {
               
                adminemail: {
                    required: "Email Field Required"
                },
                adminpassword: {
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
        var data = $("#loginForm").serialize(); 
        $("#login").html('<i class="fas fa-circle-notch fa-spin" ></i>');
        $.ajax({                
            type : 'POST',
            url  : 'loginScript.php',
            data : data,
           
            success : function(response){ 
                         
                if($.trim(response) === "ERROR"){
                  // alert("Username or password is incorrect."); 
                  $("#ualert").show();
                  
                  $("#login").html('Sign In');
                       
                 }else if($.trim(response) === "SUCCESS"){ 
                    $("#login").html('Sign In'); 
                    window.location.href = "addtraindetails.php";
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


  


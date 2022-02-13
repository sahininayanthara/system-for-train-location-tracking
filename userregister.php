<?php
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

    <link rel='shortcut icon' type='image/x-icon' href='images/logo.jpg' />
    <title>Train Location Tracking - User Registration</title>
</head>
<body>
  <div id="layout-wrapper">
    <div class="main-content" >
      <div class="page-content">
        <div class="container-fluid">
          <div class="row justify-content-md-center " style="height: 625px;">
            <div class="col-md-6" style="background-color: #66DAC7;" ></div>
            <div class="col-md-6" style="width: 50%;background-color: #2E4158;padding: 25px 40px;overflow: auto;">
              <h5 class="mb-4" style="color:white;">User Sign Up</h5>

              <form name="userregisterfrm" id="userregisterfrm" method="POST">

              <div class="form-group mb-4" style="color:white;">
                <label for="exampleInputname" class="mb-2">Full Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Full Name">
    
              </div>
              <div class="form-group mb-4" style="color:white;margin-top: 2.2rem;">
                <label for="exampleInputEmail1" class="mb-2">Email address</label>
                <input type="email" class="form-control" id="userEmail" name="userEmail" aria-describedby="emailHelp" placeholder="Enter Your Email">
    
              </div>
              <div class="form-group mb-4" style="color:white;margin-top: 2.2rem;">
                <label for="exampleInputPassword1" class="mb-2">Password</label>
                <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Enter Your Password">
              </div>
              
              <div class="row mt-4">
                <div class="col-md-8 mt-5">
                  <button type="submit" name="signupuser" id="signupuser" class="btn btn-primary" style="color:white; background-color: #66dac7;border-color: #66dac7;border-radius: 34px;width: 100px;padding: 4px 20px;">Sign Up</button>
                </div>
                <div class="col-md-4 mt-5">
                  <a href="login.php" style="color:white;margin-left: -250px;text-decoration:none; ">I'm already member</a>
                </div>
              </div>
  
              </form>
              <!-- <div class="alert alert-danger mt-4" style="color: white;background-color: #c12020;text-align: center;border-radius: 20px;display: none;" id="ualert">
              Already Exist Email Address!.
              </div> 
 -->

 <script>
      $(document).ready(function() {
        
        $("form[name='userregisterfrm']").validate({

  rules: {

  username: {
      required: true,  
    
    },

  userPassword: {
      required: true,  
 
    },   

  userEmail: {
      required: true,  
       remote:{

url: "limit_email_admin_user.php",

type: "post"

},
}

    },
 
 messages:{
  
  username: {
      required: "This is required!",
  
    },
    
  userPassword: {
      required: "This is required!",
  
    },

  userEmail: {
       required: "This is required!",
      remote: "already exsist!"


    },
        
},


 submitHandler: function(form) {

  $("#signupuser").prop('disabled', true);
  $("#signupuser").html("Wait. . ");
      
               $.post( "model-add-client.php", $( "#userregisterfrm" ).serialize())
       .done(function( data ) {

      $("#signupuser").html('Done');
        swal("Good job!", "User Successfully Added!", "success");
      setTimeout(
        function() 
        {
             window.location.replace('login.php');
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
   
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>   
</body>
</html>
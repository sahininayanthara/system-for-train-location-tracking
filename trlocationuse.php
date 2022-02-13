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
<html>
<head>  
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <link rel='shortcut icon' type='image/x-icon' href='images/logo.jpg' />
    <title>Train Location Tracking - Train Location</title> 
  <meta charset="utf-8">
   <style> 
     /* Always set the map height explicitly to define the size of the div * element that contains the map. */
      #map { height: 100%; }
/* Optional: Makes the sample page fill the window. */ 
html, body { height: 100%; margin: 0; padding: 0; } 
</style>



</head>
<body> 
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

 <div id="result"></div>
  <div id="map-canvas" style="width: 1349px; height: 625px;"> 

  </div>
</body>
</html>

  
<script type="text/javascript">
var map;
var latlng;
var infowindow;

$(document).ready(function() { 
  //get data set from the backend in a json structure
   var data = [{
      "description": "Rajarata Rajini",
       
        "latitude": "6.822521",
         "longitude": "79.939307"
          }, 
          { "description": "Location B",
          
            "latitude": "6.810887",
             "longitude": "79.955666" 
             } 
             ]
// $.ajax({ //library for JS help front-end to talk back-end, without having to reload the page 
// url: "HelpMapperbackend.php", 
// async: true,
//  dataType: 'json', // is a language 
//  success: function (data) { 
//    console.log(data);
//     ViewCustInGoogleMap(data); 
//     } 
//     });
     // console.log(data); 


     ViewCustInGoogleMap(data);
     });
function ViewCustInGoogleMap(data) { 
  var gm = google.maps; 
  //create instance of google map //add initial map option 
  var mapOptions = { 
    center: new google.maps.LatLng(6.822521, 79.939307), // Coimbatore = (11.0168445, 76.9558321)
     zoom: 16,
      //mapTypeId: google.maps.MapTypeId.ROADMAP
       };
        //bine html tag to show the google map and bind mapoptions
         map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
          //create instance of google information windown
           infowindow = new google.maps.InfoWindow();
            var marker, i;
             // var MarkerImg = "https://maps.gstatic.com/intl/en_us/mapfiles/markers2/measle.png";
              // var MarkerImg2 = "https://maps.gstatic.com/intl/en_us/mapfiles/markers2/measle_blue.png";
//loop through all the locations and point the mark in the google map
 for (var i = 0; i < data.length; i++) { 
   marker = new gm.Marker({ 
     position: new gm.LatLng(data[i]['latitude'], data[i]['longitude']),
      map: map,
       // icon: MarkerImg
        });

//add info for popup tooltip
 google.maps.event.addListener(
    marker,
     'click',
      (
         function(marker, i) {
            return function() { 
              infowindow.setContent(data[i]['description']);
               infowindow.open(map, marker);
                };
                 }
                  )(marker, i)
); 
}
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsc-eYCYXboff2VC0_e4msslAa_c78UWM&sensor=true"
 type="text/javascript"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


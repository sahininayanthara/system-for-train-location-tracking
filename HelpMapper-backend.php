

<?php
header('Content-type: application/json'); 
// header('Content-Type: application/json');
include('connection/db.php');

$res_n = "SELECT name , longtitude,latitude `location`";

  $location = mysqli_query($con,$res_n);
  	while($current = mysqli_fetch_assoc($location)){
  		$locations[] =$current;


  	} 
  		echo json_encode( $locations ); // displays the data //json is like converter between php and JS


  ?>


  <?php
 
   // $res_n = "SELECT * FROM `location`";
   // $sql = mysqli_query($con, $res_n);
   // $row = mysqli_fetch_assoc($sql);
   // $name = $row['name'];
   // $longtitude = $row['longtitude'];
   // $latitude = $row['latitude'];

   //      $data = array(
   //          "amount"     => $name,
   //          "longtitude"     => $longtitude, 
   //          "latitude"     => $latitude 
   //      );
   //      echo json_encode($data);

      //   var data = [{
      // "description": "Rajarata Rajini",
       
      //   "latitude": "6.822521",
      //    "longitude": "79.939307"
      //     }, 
      //     { "description": "Location B",
          
      //       "latitude": "51.065453",
      //        "longitude": "-114.088841" 
      //        } 
      //        ]
    
?>
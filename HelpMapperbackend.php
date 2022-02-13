

<?php 
header('Content-Type: application/json');
include('connection/db.php');

  $location = mysqli_query($con,"SELECT name , longtitude,latitude FROM `location`");
  	while($current = mysqli_fetch_assoc($location)){
  		$locations[] =$current;


  	} 
  		echo json_encode( $locations ); // displays the data //json is like converter between php and JS 
  		?>
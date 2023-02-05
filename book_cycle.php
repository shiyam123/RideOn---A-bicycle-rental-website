<?php
  $conn = mysqli_connect("localhost", "root", "", "RideOn");

  // Check the connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $cycleno=$_POST['cycle_number'];
  $sql = "SELECT * FROM cycle WHERE Cycleno = '$cycleno'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $brand = $row["Cyclebrand"];
    $type=$row["Cycletype"];
    $rent = $row["Rent"];
    
  } else {
    echo "No account found.";
  }
  session_start();
  $email=$_SESSION['email'];
  $sql = "SELECT * FROM user WHERE email = '$email'";
  $result = $conn->query($sql);
   if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name= $row["name"];
    $phone=$row["phone"];
    $age = $row["age"];
    } else {
    echo "No account found.";
  }
  if($age <18)
  {
  	// Get the user's IP address
		$user_ip = $_SERVER['REMOTE_ADDR'];

		// Make a request to the IP Geolocation API
		$url = "https://ipapi.co/$user_ip/json/";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		// Decode the JSON response
		$location = json_decode($response, true);

		// Get the latitude and longitude from the response
		$latitude = $location['latitude'];
		$longitude = $location['longitude'];

		// Use the latitude and longitude to find the place
		// You can use a third-party API such as the Google Maps Geocoding API
		// Example: https://developers.google.com/maps/documentation/geocoding/start

		// Make a request to the Geocoding API
		$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitude,$longitude&key=API_KEY";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		// Decode the JSON response
		$geocode = json_decode($response, true);

		// Get the formatted address from the response
		$from_loc = $geocode['results'][0]['formatted_address'];

  }
  $currentTime = date("H:i:s");
  $sql = "INSERT INTO booked (name, age, email, phone, username, cycleno, brand, type, rent, from_loc, take_time) VALUES ('$name', '$age', '$email', '$phone', '$username', '$cycleno','$brand','$type','$rent','$from_loc','$currentTime')";

if (mysqli_query($conn, $sql)) {
    header("location:http://localhost/RideOn/successful_booking.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}








?>
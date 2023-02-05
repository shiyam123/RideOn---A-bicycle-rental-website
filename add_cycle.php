<?php
$user = $_POST["username"];
  $brand = $_POST["brand"];
  $type = $_POST["type"];
  $year = $_POST["year"];
  $bill = $_POST["bill"];
  $phone = $_POST["phone"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RideOn";

$yearOfPurchase = (int) $year;

// Calculate the current year
$currentYear = (int) date("Y");

// Initialize the price
$price = (int) $bill;

// Calculate the number of years since the year of purchase
$numberOfYears = $currentYear - $yearOfPurchase;

// Apply the depreciation percentage of 5% on each year
for ($i = 0; $i < $numberOfYears; $i++) {
  $price *= 0.80;
}


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO donate_cycle (username,Cycle_brand, Cycle_type, Year_of_Purchase, Bill_amount, Phone,Max_Assured_amt)
  VALUES ('$user', '$brand', '$type', '$year', '$bill', '$phone','$price')";

  if ($conn->query($sql) === TRUE) {
  header("location:http://localhost/RideOn/sell_success.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


mysqli_close($conn);
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RideOn";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Attempt insert query execution
$sql = "INSERT INTO user (name, age, email, phone, username, password) VALUES ('$name', '$age', '$email', '$phone', '$username', '$password')";
if (mysqli_query($conn, $sql)) {
    header("location:http://localhost/RideOn/successsignup.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>

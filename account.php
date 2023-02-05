<?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "RideOn";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  session_start();
  $email= $_SESSION['email'];
  // Get the account details from the database
  $sql = "SELECT * FROM user WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row["username"];
    $name=$row["name"];
    $email = $row["email"];
    
    $age = $row["age"];
    $phone=$row["phone"];
    $login=$row["login_date"];
  } else {
    echo "No account found.";
  }

?>
  
<!DOCTYPE html>
<html>
<head>
  <title>Account Details</title>
  <link rel="stylesheet" href="http://localhost/Blog%20website/account_style.css">
</head>
<body>
<div class="container">
  <div class="header">
    <h1>Account Details</h1>
    <a href="http://localhost/RideOn/home.html">Home</a>
  </div>
  <div class="profile-section">
    <h2>Profile</h2>
    <p><label>Name:</label> <?php echo $name; ?></p>
    <p><label>Age:</label><?php echo $age;?></p>    
    <p><label>Username:</label> <?php echo $username; ?></p>
    <p><label>Email:</label> <?php echo $email; ?></p>
    <p><label>Phone number:</label><?php echo $phone;?></p> 
    
   
  </div>
  <div class="history-section">
    <h2>History</h2>
    <table>
      <tr>
        <th>Date</th>
        <th>Activity</th>
      </tr>
      <tr>
        <td><?php echo $login;?></td>
        <td>Login</td>
      </tr>
      
    </table>
  </div>
</div>
</body>
</html>




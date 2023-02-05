<?php
  $conn = mysqli_connect("localhost", "root", "", "RideOn");

  // Check the connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  session_start();
  $email=$_SESSION['email'];
  $sql = "SELECT * FROM booked WHERE email = '$email'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $reference_id= $row["id"];
    
    } ?>

<!DOCTYPE html>
<head>
  <title> Success </title>
  <style>
      .success-message {
        text-align: center;
        font-size: 36px;
        font-weight: bold;
        margin-top: 100px;
      }
      .reference-id {
        text-align: center;
        font-size: 18px;
        margin-top: 20px;
      }
  </style>
</head>
<body>
  <div class="success-message">
      Booking Successful!
    </div>
    <div class="reference-id">
      Your reference ID: 
      <?php
        
        echo $reference_id;
      ?>
    </div>
  </body>
  </html>

<!DOCTYPE html>
<html>
<head>
  <title>Cycle Booking</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/RideOn/cycle_booking.css"/>
</head>
<body>
  <h1>Available Cycles</h1>
  <table border="5 px">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Cycle Number</th>
        <th>Brand</th>
        <th>Type</th>
        <th>Availability</th>
        <th>Rent/Hour (INR)</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "RideOn");

        // Fetch the available cycles
        $result = mysqli_query($conn, "SELECT Sno, Cycleno, Cyclebrand, Cycletype, Availability, Rent FROM cycle WHERE Availability = 'yes'");
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr id='cycle-" . $row['Sno'] . "'>";
          echo "<td>" . $row['Sno'] . "</td>";
          echo "<td>" . $row['Cycleno'] . "</td>";
          echo "<td>" . $row['Cyclebrand'] . "</td>";
          echo "<td>" . $row['Cycletype'] . "</td>";
          echo "<td>" . $row['Availability'] . "</td>";
          echo "<td>" . $row['Rent'] . "</td>";
          
          echo "<td><form action='book_cycle.php' method='post'><input type='hidden' name='cycle_number' value='" . $row['Cycleno'] . "'><input type='submit' name='book' value='Book'></form></td>";
          echo "</tr>";
        }

        // Close the database connection
        mysqli_close($conn);
      ?>
    </tbody>
  </table>

  
</body>
</html>
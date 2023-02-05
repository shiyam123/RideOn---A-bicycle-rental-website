<?php
     $conn=mysqli_connect("localhost","root","");
     mysqli_select_db($conn,"RideOn");


     $err = "Sorry Wrong Password or Username";
     $user=$_POST["email"];
     $pass=$_POST["pass"];
     $query=mysqli_query($conn,"select * from user where email='$user' && password='$pass'");
     if (mysqli_num_rows($query) > 0) 
       {
            // Get the user's information
            $user = mysqli_fetch_assoc($query);

                    // Update the user's login date
                    $login_date = date("Y-m-d H:i:s");
                    $sql = "UPDATE user SET login_date='$login_date' WHERE password='$pass' " ;
                    mysqli_query($conn, $sql);

                    // Start a session and store the user's information
                    session_start();
                    $email=$_POST["email"];
                    $_SESSION['email'] = $email;
                    

                    // Redirect the user to the dashboard
                    header("Location: http://localhost/RideOn/home.html");
                    exit;
        }



            else
            {
                $err="sorry wrong username or password";
            }




     

     
    
     

?>

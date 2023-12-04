<?php
require 'db.php';

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the username as a valid email address
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        // Username is a valid email address
    } else {
        echo "<script>alert('Username is not a valid email address.')</script>";
        exit; // Stop further processing if the email is invalid
    }

    // Retrieve the user's information from the database
    $query = "SELECT * FROM users WHERE Email = '$username'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Database query error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {
        // User found, check the password
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row["Password"]; // Check the column name in your database

        if (password_verify($password, $hashedPassword)) {
            // Password is correct, log the user in
            session_start();
            $_SESSION["user_id"] = $row["user_id"]; // Assuming 'user_id' is the column name in your database
            $_SESSION["username"] = $row["Email"];
            $_SESSION["first_name"] = $row["First Name"];
            $_SESSION["role"] = $row["Role"]; // Assuming 'Role' is the column name in your database
            if ($_SESSION["role"] == "admin") {
                // Redirect to admin dashboard or perform admin-specific actions
                header("Location: ../admin/admin-dashboard.php");
            } else {
                // Redirect to user dashboard or perform user-specific actions
                header("Location: dashboard.php");
            }
            exit;
        } else {
            echo "<script>alert('Incorrect password.')</script>";
        }
    } else {
        echo "<script>alert('User not found. Please register.')</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MediFlowHub</title>


    <link rel="icon" href="images/Logo.png" type="image/png">



    <link rel="stylesheet" type="text/css" href="style/Login.css">
    <link rel="stylesheet" href="style/transitions.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FOR ICONS-->
     <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">


</head>

<body>
   


    <div class="login-container">

    

        <form action="login.php" method="post">

          <h1>Login</h1>
                
                <div class="input-box">
                    <input type="text" id="username" name="username" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>  
                </div>
                
                <div class="input-box">
                        
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="fa fa-eye-slash toggle" id="eye-password" onclick="togglePasswordVisibility('password', 'eye-password')"></i>
                </div>
            
       
             

                <div class="Forgot-btn">
                  
                    <a href="#">Forgot password?</a>
                  </div>
                
 
       
   
            <button name="submit" class="login-button" type="submit"><span>Login</span></button>
            <p class="Signup-btn"> Don't have an account yet? <a href="signup.php"><span>Register</span></a></p>
        
    </form>
        
    


        </div>



<div class="buttons-links">

 
            <a class="btn1" href="../doctor/doctor-login.php">
                <span>Employee</span>
                <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                    <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="white"></path>
                </svg>
            </a>

            <a class="btn1" href="../admin/adminlogin.php">
                
                <span>Admin</span>
                <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                    <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="white"></path>
                </svg>
            </a>



            <!--


            <a href="../admin/adminlogin.php" class="btn"> Admin
            </a>

            <a href="../doctor/doctor-login.php" class="btn"> Doctor 
            </a>

            -->


</div>



        <script>
          function togglePasswordVisibility(inputId, eyeId) {
              const passwordInput = document.getElementById(inputId);
              const eyeIcon = document.getElementById(eyeId);
  
              if (passwordInput.type === "password") {
                  passwordInput.type = "text";
                  eyeIcon.classList.remove("fa-eye-slash");
                  eyeIcon.classList.add("fa-eye");
              } else {
                  passwordInput.type = "password";
                  eyeIcon.classList.remove("fa-eye");
                  eyeIcon.classList.add("fa-eye-slash");
              }
          }
      </script>

<script src="script/script.js"></script>

</body>




</html>
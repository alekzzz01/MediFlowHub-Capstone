<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';





?>

<?php
include 'db.php'; // Include your database connection file

if (isset($_POST["submit"])) {
    $last_name = $_POST["Last-name"];
    $first_name = $_POST["First-name"];
    $phonenumber = $_POST["phone-number"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confpassword = $_POST["confirm-password"];

    // Check if the checkbox is checked
    if (isset($_POST["agree-terms"]) && $_POST["agree-terms"] == "on") {
        $agreeTerms = true;
    } else {
        $agreeTerms = false;
    }

    // Check if the user has agreed to the terms
    if (!$agreeTerms) {
        echo "<script>alert('Please agree to the Terms and Conditions.')</script>";
    } else {
        // Check if the user already exists
        $query = "SELECT * FROM users WHERE Email = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            // Validate the username as a valid email address
            if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                // Username is a valid email address
            } else {
                echo "<script>alert('Username is not a valid email address.')</script>";
                exit; // Stop further processing if the email is invalid
            }

            // Remove spaces and non-numeric characters from the phone number
            $phonenumber = preg_replace('/[^0-9]/', '', $phonenumber);

            // Check if the phone number is exactly 11 digits long and starts with "09"
            if (strlen($phonenumber) == 11 && substr($phonenumber, 0, 2) == '09') {
                // Phone number is valid
            } else {
                echo "<script>alert('Phone number is not a valid mobile number.')</script>";
                exit; // Stop further processing if the phone number is invalid
            }


            $first_name = mb_convert_case($first_name, MB_CASE_TITLE);
            $last_name = mb_convert_case($last_name, MB_CASE_TITLE);
            $username = strtolower($username);

            if ($password == $confpassword) {
                // Hash the password for security (you should use a proper hashing method)
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert data into the database
                $query = "INSERT INTO users (`Last Name`, `First Name`, Email, password, `Phone Number`) VALUES ('$last_name', '$first_name', '$username', '$hashedPassword', '$phonenumber')";
                mysqli_query($conn, $query);
                echo "<script>alert('Registration Successful');</script>";


                $otp = mt_rand(100000, 999999);

                // Send the OTP via email
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Your SMTP server
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    $mail->Username = 'tatsuki.ryota01@gmail.com';
                    $mail->Password = 'pazq ktqa mbfi ljzi';

    
                    $mail->setFrom('tatsuki.ryota01@gmail.com', 'OTP Verification');
                    $mail->addAddress($username); 

                    

            
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'OTP for Registration';
                    $mail->Body    = 'Your OTP is: ' . $otp;
            
                    $mail->send();
                    echo "<script>alert('OTP sent to your email.');</script>";
            
                    $lastInsertedUserId = mysqli_insert_id($conn); // Get the ID of the last inserted user
                    $query = "UPDATE users SET OTP = '$otp' WHERE user_id = $lastInsertedUserId";
                    mysqli_query($conn, $query);
                } catch (Exception $e) {
                    echo "<script>alert('Error sending OTP. Please try again. Error: " . $e->getMessage() . "');</script>";
                }


            } else {
                echo "<script>alert('Password Does Not Match');</script>";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | MediFlowHub</title>
    <link rel="icon" href="images/Logo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="style/Signup.css">
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
        <form action="signup.php" method="post">
            <h1>Signup</h1>

            <div class="full-name">
                <div class="full-name-box">
                    <input class="input-field" type="text" id="Last-name" name="Last-name" placeholder="Last Name" required>
                
                </div>
                <div class="full-name-box">
                    <input class="input-field" type="text" id="First-name" name="First-name" placeholder="First Name" required>
              
                </div>
                
            </div>
         
            <div class="input-box">
                <input class="input-field" type="phone" id="phone-number" name="phone-number" placeholder="Phone Number" required>
                <i class='bx bxs-phone' ></i>
            </div>

            <div class="input-box">
                <input class="input-field" type="text" id="username" name="username" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>  
            </div>

            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class="fa fa-eye-slash toggle" id="eye-password" onclick="togglePasswordVisibility('password', 'eye-password')"></i>
            </div>

            <div class="input-box">
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                <i class="fa fa-eye-slash toggle" id="eye-confirm-password" onclick="togglePasswordVisibility('confirm-password', 'eye-confirm-password')"></i>
            </div>

          






            <div class="agree-terms">
                <input type="checkbox" name="agree-terms">
                <label for="agree-terms">I agree to the <a href="#">Terms and Conditions</a></label>
            </div>
            
            
            <button name="submit" class="Signup-btn" type="submit"><span>Signup</span></button>
            <p class="Login-btn"> Already have an Account? <a href="login.php"><span>Login</span></a></p>
        </form>
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
</body>
</html>


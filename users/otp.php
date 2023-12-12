<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../session/session_manager.php';
require '../session/db.php';
require '../config/config.php';

start_secure_session();

if (!isset($_SESSION["user_id"])) {
    // If the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit;
}


if (isset($_POST["verify"])) {
    // Set $userId based on the user session
    $userId = $_SESSION["user_id"];

    // Retrieve the user's OTP from the database
    $query = "SELECT OTP FROM users WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Database query error: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    // Check if the 'OTP' key exists in the $row array
    if (isset($row["OTP"])) {
        $storedOTP = $row["OTP"];

        // Concatenate individual OTP digits
        $enteredOTP = $_POST["otp1"] . $_POST["otp2"] . $_POST["otp3"] . $_POST["otp4"] . $_POST["otp5"] . $_POST["otp6"];

               
        if ($_SESSION["role"] == "Admin") {
            // Redirect to admin dashboard or perform admin-specific actions
            header("Location: ../admin/admin-dashboard.php");
        } else {
            // Redirect to user dashboard or perform user-specific actions
            header("Location: dashboard.php");
        }
        exit;

    } else {
        // Handle the case where 'OTP' key is not present in the array
        echo "<script>alert('Error: OTP not found for the user.');</script>";
    }

    
} 


elseif (isset($_POST["resendOTP"])) {
  // Resend OTP logic

  // Generate a new OTP
  $newOTP = mt_rand(100000, 999999);

  // Set $userId based on the user session
  $userId = $_SESSION["user_id"];

  // Update the user's OTP in the database
  $updateQuery = "UPDATE users SET OTP = $newOTP WHERE user_id = $userId";
  $updateResult = mysqli_query($conn, $updateQuery);

  if (!$updateResult) {
      die("Database query error: " . mysqli_error($conn));
  }

  
  $to = $_SESSION["username"]; 
  $subject = "Your New OTP";
  $message = "Your new OTP is: $newOTP";
  

  require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';

  require '../vendor/phpmailer/phpmailer/src/SMTP.php';
  require '../vendor/phpmailer/phpmailer/src/Exception.php';

  $mail = new PHPMailer(true);

  try {
     //Server settings
     $mail->isSMTP();
     $mail->Host = 'smtp.gmail.com'; // Your SMTP server
     $mail->SMTPAuth = true;
     $mail->SMTPSecure = 'tls';
     $mail->Port = 587;
     $mail->Username = SMTP_USERNAME; // Use the constant
     $mail->Password = SMTP_PASSWORD; // Use the constant

     $mail->setFrom(SMTP_USERNAME, 'MediflowHub | OTP Verification');
     $mail->addAddress($to); 

      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = $message;

      $mail->send();

      echo "<script>alert('OTP has been resent. Check your email.'); window.onload = function() { startCountdown(); }</script>";


  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP | MediFlowHub </title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <link rel="icon" href="images/Logo.png" type="image/png">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FOR ICONS-->
     <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

   



    
    <link rel="stylesheet" href="otp.css">

    <script src="otp.js" defer></script>

  

    <script>
    function startCountdown() {
        let seconds = 30;
        const countdownElement = document.getElementById('countdown');
        const resendButton = document.getElementById('resendOTPButton');

        const countdownInterval = setInterval(function () {
            countdownElement.innerHTML = `Resend OTP in ${seconds} seconds`;

            if (seconds === 0) {
                clearInterval(countdownInterval);
                countdownElement.innerHTML = '';
                resendButton.disabled = false;
            }

            seconds--;
        }, 1000);

        resendButton.disabled = true;
    }
</script>





</head>
<body>

    <div class="container">
       
          

            <h4>We emailed you the six digit code </h4>



<form action="" method="post" id="otpForm">


            <div class="otp-input-fields">
    <input type="number" name="otp1" class="otp__digit otp__field__1">
    <input type="number" name="otp2" class="otp__digit otp__field__2">
    <input type="number" name="otp3" class="otp__digit otp__field__3">
    <input type="number" name="otp4" class="otp__digit otp__field__4">
    <input type="number" name="otp5" class="otp__digit otp__field__5">
    <input type="number" name="otp6" class="otp__digit otp__field__6">
        </div>



    <button type="submit" name="verify" class="Verify-btn">Verify OTP</button>
</form>

<form action="" method="post" id="resendOTPForm">

    <div class="container-resend">
    <p>Didn't receive OTP?</p>
    <button type="submit" name="resendOTP" id="resendOTPButton" class="Resend">Resend OTP</button>

    </div>


</form>


<div id="countdown"></div>



  </div>




</body>


<script>


var otp_inputs = document.querySelectorAll(".otp__digit")
var mykey = "0123456789".split("")
otp_inputs.forEach((_)=>{
  _.addEventListener("keyup", handle_next_input)
})
function handle_next_input(event){
  let current = event.target
  let index = parseInt(current.classList[1].split("__")[2])
  current.value = event.key
  
  if(event.keyCode == 8 && index > 1){
    current.previousElementSibling.focus()
  }
  if(index < 6 && mykey.indexOf(""+event.key+"") != -1){
    var next = current.nextElementSibling;
    next.focus()
  }
  var _finalKey = ""
  for(let {value} of otp_inputs){
      _finalKey += value
  }
  if(_finalKey.length == 6){
    document.querySelector("#_otp").classList.replace("_notok", "_ok")
    document.querySelector("#_otp").innerText = _finalKey
  }else{
    document.querySelector("#_otp").classList.replace("_ok", "_notok")
    document.querySelector("#_otp").innerText = _finalKey
  }
}
</script>




</html>






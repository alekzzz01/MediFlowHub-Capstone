<?php

require_once '../session/session_manager.php';
require '../session/db.php';

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

</head>
<body>

    <div class="container">
       
          

            <h4>We emailed you the six digit code </h4>



            <form action="" method="post" id="otpForm">
    <div class="input-field">
        <input type="number" name="otp1" maxlength="1" oninput="moveToNextInput(this, 'otp2')" />
        <input type="number" name="otp2" maxlength="1" oninput="moveToNextInput(this, 'otp3')" />
        <input type="number" name="otp3" maxlength="1" oninput="moveToNextInput(this, 'otp4')" />
        <input type="number" name="otp4" maxlength="1" oninput="moveToNextInput(this, 'otp5')" />
        <input type="number" name="otp5" maxlength="1" oninput="moveToNextInput(this, 'otp6')" />
        <input type="number" name="otp6" maxlength="1" oninput="moveToNextInput(this, null)" />
    </div>

    <button type="submit" name="verify">Verify OTP</button>
</form>


<script>
    function moveToNextInput(currentInput, nextInputName) {
        const currentInputValue = currentInput.value;
        if (currentInputValue.length === 1) {
            const nextInput = nextInputName ? document.getElementsByName(nextInputName)[0] : null;
            if (nextInput) {
                nextInput.focus();
            }
        } else if (currentInputValue.length === 0) {
            // Handle backspacing
            const previousInput = currentInput.previousElementSibling;
            if (previousInput) {
                previousInput.focus();
            }
        }
    }
</script>


</body>



</html>






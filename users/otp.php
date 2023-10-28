


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <box-icon type='solid' name='check-shield'></box-icon>



    
    <link rel="stylesheet" href="otp.css">
    <script src="otp.js" defer></script>

</head>
<body>

    <div class="container">
       
            <header>
            <i class="bx bxs-check-shield"></i>
            </header>   

            <h4>We emailed you the four digit code </h4>
            <form action="dashboard.php" method="post">
        <div class="input-field">
        <input type="number" name="otp1" />
        <input type="number" name="otp2" disabled />
        <input type="number" name="otp3" disabled />
        <input type="number" name="otp4" disabled />
    </div>

  
    <button type="submit" name="verify_otp"> Verify OTP </button>
</form>
    
            <?php 






<?php 


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | MediFlowHub</title>


    <link rel="icon" href="images/Logo.png" type="image/png">



    <link rel="stylesheet" type="text/css" href="doctor-login.css">
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
<?php



?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="style/bookappointments.css">
    <link rel="stylesheet" href="style/transitions.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">



 
    
</head>
<body>

    <div id="sidebar" class="sidebar">
        <div class="logo">
            <img src="images/MediFlowHub.png" alt="">

            <i class='bx bx-x' id="close-sidebar"></i>
        </div>
            <ul class="menu">

                <li>
                    <a href="dashboard.php" >
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                
            
                <li class="active">
                    <button class="dropdown-btn">
                        <i class='bx bxs-time-five'></i>
                        <span>Appointments</span>
                        <i class='bx bxs-chevron-down'></i>
                    </button>

                    <div class="dropdown-container">
                            <a href="appointments.php">View Appointments</a>
                            <a href="#">Book Appointments</a>

                    </div>

                </li>


                
                <li>
                    <a href="availabledoctors.php">
                        <i class='bx bxs-user-rectangle' ></i>
                        <span>Doctors</span>
                    </a>
                </li>

              

                <li>
                    <a href="locations.php">
                    <i class='bx bxs-map'></i>
                        <span>Locations</span>
                    </a>
                </li>

                <li>
                    <a href="notifications.php">
                        <i class='bx bxs-bell' ></i>
                        <span>Notifications</span>
                    </a>
                </li>

                <li>
                    <a href="Profile.php">
                        <i class='bx bxs-cog' ></i>
                        <span>Settings</span>
                    </a>
                </li>


                <li class="logout">
                    <a href="logout.php" id="logout-link">
                        <i class='bx bx-log-out'></i>
                        <span>Logout</span>
                    </a>
                </li>






            </ul>
    
    </div>



<div class="main--content">


    
    <div class="request-appointment-box" id="myDIV">


        <div class="header-request">

                <p>REQUEST AN APPOINTMENT</p>

                

        </div>

                    <form class="customer-options">

                            <input type="radio" id="New-Patient" class="customer" name="customer-type" checked>
                            <label for="New-Customer">New Patient</label><br>

                            <input type="radio" id="Current-Patient" class="customer"  name="customer-type">
                            <label for="Current-Patient">Current Patient</label><br>

                    </form> 


                    <div class="paragraph1">
                        <p>Please confirm that you would like to request the following appointment.</p>
                    </div>




                <div class="New_PatientBox" id="New_Patient">

                    <h2>Registration: </h2>


                    <div class="paragraph1">
                        <p>Please enter Patient's name & Date of Birth</p>
                    </div>




                    <form class="form-input">

                    

                                <div class="names">

                                    <div class="input-box">
                                            
                                            <input type="text"  placeholder="First Name....." required="required" >
                                            
                                    </div>

                                    <div class="input-box">
                                            
                                            <input type="text"  placeholder="Last Name....." required="required" >
                                            
                                    </div>


                                
                                </div>



                                <div class="email-address">

                                        <div class="input-box">
                                                
                                        <input type="date"  placeholder="Date of Birth....." required="required" >
                                                
                                        </div>

                                </div>
                                                    
                    </form>

                </div>





                <div class="CurrentPatientsBox"  id="Current_Patient">




                        <h2>Patients Info: </h2>


                        <div class="paragraph1">
                            <p>Here is your information</p>
                        </div>




                        <form class="form-input">


                            
                                    <div class="patient-search">
                                        
                                        <input type="text" placeholder="Search name or ID No.">
                            
                                    </div>




                                    <div class="names">

                                        <div class="input-box">
                                                
                                                <input type="text"  placeholder="First Name....." required="required" >
                                                
                                        </div>

                                        <div class="input-box">
                                                
                                                <input type="text"  placeholder="Last Name....." required="required" >
                                                
                                        </div>


                                    
                                    </div>



                                    <div class="email-address">

                                            <div class="input-box">
                                                    
                                            <input type="date"  placeholder="Date of Birth....." required="required" >
                                                    
                                            </div>

                                    </div>
                                                        
                        </form>



                </div>



                        <h2>Diagnosis </h2>

                        <div class="paragraph1">
                            <p>Choose a diagnosis that best describes</p>
                        </div>



                        <form class="form-input">

                                        <div class="input-box">
                                                
                                            <select name="reason" id="reason-box">
                                                    <option hidden>Choose...</option>
                                                    <option value="saab">Eye</option>
                                                    <option value="mercedes">General</option>
                                                    <option value="audi">Hand</option>
                                            </select>
                                                
                                        </div>
                                    
                        </form>


                        <div class="doctors-description">

                                    <h2>Doctor: </h2>


                                    <div class="paragraph1">
                                        <p>Please enter Doctor's name</p>
                                    </div>



                                    <form class="form-input">


                                        
                                                <div class="patient-search">
                                                    
                                                    <input type="text" placeholder="Search name or ID No.">
                                        
                                                </div>




                                                <div class="names">

                                                    <div class="input-box">
                                                            
                                                            <input type="text"  placeholder="First Name....." required="required" >
                                                            
                                                    </div>

                                                    <div class="input-box">
                                                            
                                                            <input type="text"  placeholder="Last Name....." required="required" >
                                                            
                                                    </div>


                                                
                                                </div>

                                                                    
                                    </form>




                        </div>


                        <h2>Phone No. </h2>

                            <div class="paragraph1">
                                <p>Input your phone number below</p>
                            </div>



                            <form class="form-input">

                                            <div class="input-box">

                                            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="+639.....">
                                                    
                                                
                                                    
                                            </div>
                                        
                            </form>


                        <div class="bottom-buttons">

                            <button class="Req-Btn">Request Appointment</button>
                            <button onclick="myFunction()" class="Cancel-Btn" id="close-btn">Cancel</button>


                        </div>






    </div>



            

   

</div>


    <script src="script/script.js"></script>


    <script> 

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
dropdown[i].addEventListener("click", function() {
this.classList.toggle("active");
var dropdownContent = this.nextElementSibling;
if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
} else {
  dropdownContent.style.display = "block";
}
});
}


</script>



<script>

    // Get the radio buttons and the boxes
const newPatientRadio = document.getElementById("New-Patient");
const currentPatientRadio = document.getElementById("Current-Patient");
const newBox = document.getElementById("New_Patient");
const currentBox = document.getElementById("Current_Patient");

// Add event listeners to the radio buttons
newPatientRadio.addEventListener("change", function () {
  if (newPatientRadio.checked) {
    newBox.style.display = "block";
    currentBox.style.display = "none";
  }
});

currentPatientRadio.addEventListener("change", function () {
  if (currentPatientRadio.checked) {
    currentBox.style.display = "block";
    newBox.style.display = "none";
  }
});

    
    
    
    
    
</script>




 
</body>
</html>

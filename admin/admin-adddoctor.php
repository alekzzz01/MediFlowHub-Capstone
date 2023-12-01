<?php

require 'admin-db.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Fetch clinics
$clinicQuery = "SELECT clinic_id, clinic_name, address FROM clinic_info";
$clinicResult = $conn->query($clinicQuery);


// Fetch clinics
$doctorQuery = "SELECT doctor_id, First_Name, Last_Name, Specialty  FROM doctors_table";
$doctorResult = $conn->query($doctorQuery);







if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['Add'])) {
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $doctorId = $_POST['clinic'];
        $Specialty = $_POST['specialty'];
        $Experience = $_POST['Experience'];
        $patientPhoneNum = $_POST['phone'];
        $Email = $_POST['email'];
    
       

        // Prepare and execute the SQL query to insert data into the appointment table
        $sql = "INSERT INTO doctors_table (First_Name, Last_Name , Clinic_ID,  Specialty, Experience, Phone_Number , Email)
                VALUES ('$FirstName', ' $LastName', ' $clinicId', '$Specialty', ' $Experience ', ' $patientPhoneNum' , '$Email')";

        if ($conn->query($sql) === TRUE) {
            // Set the success message
            $successMessage = "Doctor added successfully!";
            // Redirect to the same page to avoid form resubmission
            header("Location: admin-adddoctor.php?success=true");
            exit();
        } else {
            // Set an error message if there's an issue
            $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
        }


    }

    if (isset($_POST['Delete'])) {
      
        $doctorId = $_POST['doctor'];
      
    


      

    }





   
}

        // Close the database connection
$conn->close();
  

?>







<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Add Doctor</title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="admin-adddoctor.css">
    <link rel="stylesheet" href="transitions.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function () {
    var clinics = <?php echo json_encode($clinicResult->fetch_all(MYSQLI_ASSOC)); ?>;
    var doctors = <?php echo json_encode($doctorResult->fetch_all(MYSQLI_ASSOC)); ?>;
   

    // Populate Clinic dropdown
    var clinicDropdown = $('#clinic-box');
    clinicDropdown.append('<option value="all">Select a Clinic</option>');
    clinics.forEach(function (clinic) {
        clinicDropdown.append('<option value="' + clinic.clinic_id + '">' + clinic.clinic_name + " - " + clinic.address + '</option>');
    });



    var doctorDropdown = $('#doctor-box');
    doctorDropdown.append('<option hidden>Select a Doctor</option>');
    doctors.forEach(function (doctor) {
        doctorDropdown.append('<option value="' + doctor.doctor_id + '">' + doctor.Last_Name + " , " + doctor.First_Name + " - " + doctor.Specialty + '</option>');
    });





  
});
</script>


 
    
</head>
<body>

    <div id="sidebar" class="sidebar">
        <div class="logo">
            <img src="images/MediFlowHub.png" alt="">

            <i class='bx bx-x' id="close-sidebar"></i>
        </div>

        
            <ul class="menu">

                <li >
                    <a href="admin-dashboard.php" >
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                
            
                <li>
                    <a href="admin-appointment.php">
                        <i class='bx bxs-time-five' ></i>
                        <span>Appointments</span>
                    </a>
                </li>


                
        

                <li class="active">
                    <button class="dropdown-btn">
                        <i class='bx bxs-user-rectangle' ></i>
                        <span>Doctors</span>
                        <i class='bx bxs-chevron-down'></i>
                    </button>

                    <div class="dropdown-container">
                            <a href="#">Add New Doctor</a>
                            <a href="#">View All Doctor</a>
                          
                    </div>

                </li>


                <li>
                    <button class="dropdown-btn">
                        <i class='bx bx-plus-medical' ></i>
                        <span>Patients</span>
                        <i class='bx bxs-chevron-down'></i>
                    </button>

                    <div class="dropdown-container">
                            <a href="#">Add New Patient</a>
                            <a href="#">View All Patient</a>
                          
                    </div>

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

        <div class="header--wrapper">
         
            <div class="menu-search">
            
                        <i class='bx bx-menu' id="menu-toggle"></i>

            </div>
           
        
           
        </div>



<div class="first-container">

    <form method="post" action="admin-adddoctor.php" class="add">


        <div class="add-doctor-container">

                <p class="add-doctor-title"> 
                    ADD DOCTOR
                </p>



                <div class="selection-container">

                        
                    <label for="selecteddate">First Name:</label>
                    <div class="selecteddate">
                                <div class="inputbox">
                                    <input type="text" name="FirstName" placeholder="Enter First Name" required="required">
                                </div>
                    </div>


                </div>

                <div class="selection-container">

                        
                    <label for="selecteddate">Last Name:</label>
                    <div class="selecteddate">
                                <div class="inputbox">
                                    <input type="text" name="LastName" placeholder="Enter Last Name" required="required">
                                </div>
                    </div>


                </div>



                <div class="selection-container">

                <label for="clinic-search">Clinic: </label>
                <div class="clinic-search">
                    <select name="clinic" id="clinic-box">
                        <!-- Clinic options will be populated dynamically using JavaScript -->
                    </select>
                </div>
                </div>




                
                <div class="selection-container">

                <label for="doctor-search">Specialty: </label>
                <div class="doctor-search">
                    <select name="specialty" >
                        <option hidden>Select a Specialty</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Dentist">Dentist</option>
                     
                    </select>
                </div>



                </div>



      


                <div class="selection-container">

                        
                    <label for="selecteddate">Experience:</label>
                    <div class="selecteddate">
                                <div class="inputbox">
                                    <input name="Experience" type="text" placeholder="How many years experience in the field " required="required">
                                </div>
                    </div>


                </div>


                <div class="selection-container">

                        
                <label for="selecteddate">Phone Number:</label>
                <div class="selecteddate">
                            <div class="inputbox">
                            <input type="tel" id="phone" name="phone" pattern="[+]?[0-9]+[-]?[0-9]+[-]?[0-9]+" placeholder="+639.....">

                            </div>
                </div>


                </div>




                
                <div class="selection-container">

                        
                <label for="selecteddate">Email:</label>
                <div class="selecteddate">
                            <div class="inputbox">
                                <input type="email" id="email" name="email" placeholder="Enter Email" required="required">
                            </div>
                </div>


                </div>




                <div class="button-add">
                        
                <button name="Add" type="submit">Add Doctor</button>



                </div>



 









        </div>

    </form>


    
    <div id="successMessage" class="success-message"><i class='bx bx-check'></i> Doctor added successfully!</div>
             


    <form method="post" action="admin-adddoctor.php" class="delete">

    
        <div class="delete-doctor-container">






                <p class="add-doctor-title"> 
                        DELETE DOCTOR
                    </p>



                    <div class="selection-container">

                    <label for="doctor-search">Doctor: </label>
                    <div class="doctor-search">
                        <select name="doctor" id="doctor-box">
                            <option hidden>Select a Doctor</option>
                            <!-- Doctor options will be populated dynamically using JavaScript -->
                        </select>
                    </div>



                    </div>


                    <div class="delete-btn">



                            <button name="Delete" id="myBtn"><i class='bx bxs-trash'></i>Delete Doctor</button>


                    






                    </div>








        </div>


    </form>






       


</div>



 

    </div>




    <div class="delete-modal" id="delete-modal">


            <div class="delete-modal-content">

                        <p>Are you sure you want to remove this doctor?</p>

                        <div class="modal-buttons">

                            
                        <button id="close-btn" class="close-btn">Close</button>
                        <button class="confirm">Confirm</button>



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



      // Check if the success parameter is present in the URL
      var successParam = "<?php echo isset($_GET['success']) ? $_GET['success'] : ''; ?>";


if (successParam === "true") {
    var successMessageDiv = document.getElementById("successMessage");
    successMessageDiv.textContent = "Doctor added successfully!";
    successMessageDiv.style.display = "block";

    // Scroll to the success message for better visibility
    successMessageDiv.scrollIntoView({ behavior: 'smooth' });
}

var errorMessage = "<?php echo isset($errorMessage) ? $errorMessage : ''; ?>";
if (errorMessage !== "") {
    var errorMessageDiv = document.getElementById("errorMessage");
    errorMessageDiv.textContent = errorMessage;
    errorMessageDiv.style.display = "block";

    // Scroll to the error message for better visibility
    errorMessageDiv.scrollIntoView({ behavior: 'smooth' });
}









    </script>


<script>
// Get the modal
var modal = document.getElementById("delete-modal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementById("close-btn");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>







 
</body>
</html>

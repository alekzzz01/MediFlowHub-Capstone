<?php

require 'db.php';

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get the form data
    $customerType = $_POST["customer-type"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $dob = $_POST["dob"];
    $diagnosis = $_POST["diagnosis"];
    $phone = $_POST["phone"];
    $doctorId = $_POST["doctor"];
    $patientId = $_POST["patient"]; 
    $clinicId = $_POST["clinic"]; 

    if ($customerType == "New-Patient") {
        // Insert data into the patients-table for new patients
        $sqlNewPatient = "INSERT INTO patients_table (First_Name, Last_Name, Date_of_Birth) VALUES ('$firstName', '$lastName', '$dob')";

        if ($conn->query($sqlNewPatient) === TRUE) {
            // Retrieve the patient_id of the newly inserted patient
            $patientId = $conn->insert_id;

            // Proceed with the appointment insertion
            $sqlAppointment = "INSERT INTO appointments (customer_type, Diagnosis, Patient_Phone_Num, doctor_id, Patient_id, Clinic_ID) VALUES ('$customerType', '$diagnosis', '$phone', '$doctorId', '$patientId', '$clinicId')";

            if ($conn->query($sqlAppointment) === TRUE) {
                echo "Appointment requested successfully";
            } else {
                echo "Error: " . $sqlAppointment . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sqlNewPatient . "<br>" . $conn->error;
        }
    } else {
        // Insert data into the appointments table for current patients
        // Check if the Patient_id exists in the patients_table
        $checkPatient = "SELECT Patient_id FROM patients_table WHERE Patient_id = '$patientId'";
        $result = $conn->query($checkPatient);

        if ($result->num_rows > 0) {
            // The Patient_id is valid, proceed with the appointment insertion
            $sqlAppointment = "INSERT INTO appointments (customer_type, Diagnosis, Patient_Phone_Num, doctor_id, Patient_id, Clinic_ID) VALUES ('$customerType', '$diagnosis', '$phone', '$doctorId', '$patientId', '$clinicId')";

            if ($conn->query($sqlAppointment) === TRUE) {
                echo "Appointment requested successfully";
            } else {
                echo "Error: " . $sqlAppointment . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Invalid Patient_id";
        }
    }
}

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
                            <a href="appointments.php">View Appointment</a>
                            <a href="#">Book Appointment</a>

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

        <form class="form-input" action="bookappointments.php" method="post">

                    <div class="customer-options">
                        <input type="radio" id="New-Patient" class="customer" name="customer-type" checked>
                        <label for="New-Customer">New Patient</label><br>

                        <input type="radio" id="Current-Patient" class="customer"  name="customer-type">
                        <label for="Current-Patient">Current Patient</label><br>
                    </div>


        <div class="formcontainer">

     

                    <div class="paragraph1">
                        <p>Please confirm that you would like to request the following appointment.</p>
                    </div>

                    <div class="New_PatientBox" id="New_Patient">
                      
                        <h2>Registration: </h2>


                            <div class="paragraph2">
                                <p>Please enter Patient's name & Date of Birth</p> 
                            </div>


                            <div class="names">
                                    <div class="input-box">
                                        <input type="text" name="firstName" placeholder="First Name....." required="required">
                                    </div>
                                    <div class="input-box">
                                        <input type="text" name="lastName" placeholder="Last Name....." required="required">
                                    </div>
                            </div>

                            <div class="dob">
                                    <div class="input-box">
                                        <input type="date" name="dob" placeholder="Date of Birth....." required="required">
                                    </div>
                            </div>
                            

                    </div>

                    <div class="CurrentPatientsBox"  id="Current_Patient">
                       
                        <h2>Patients Info: </h2>


                        <div class="paragraph1">
                            <p>Here is your information</p>
                        </div>

                            
                        <div class="patient-search">
                                        
                                    <select name="patient" id="reason-box">
                                        <option hidden>Select a Patient or Search...</option>
                                        <?php
                                            // Fetch list of doctors from the database
                                            $sql = "SELECT Patient_id, Last_Name, First_Name, Date_of_Birth FROM `patients_table`";
                                            $result = $conn->query($sql);

                                            // Check if there are rows in the result
                                            if ($result->num_rows > 0) {
                                                // Output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row["Patient_id"] . '">' . $row["Last_Name"] ."," ." " . $row["First_Name"]  ." - " . $row["Date_of_Birth"] . '</option>';
                                                }
                                            } else {
                                                echo '<option hidden>No doctors found</option>';
                                            }

                                        ?>
                                    </select>
                                    
                        </div>

                                      
                    </div>

                    <h2>Diagnosis </h2>

                    <div class="paragraph1">
                        <p>Choose a diagnosis that best describes</p>
                    </div>
                    <div class="input-box">
                        <select name="diagnosis" id="reason-box">
                            <option hidden>Choose...</option>
                            <option value="saab">Eye</option>
                            <option value="mercedes">General</option>
                            <option value="audi">Hand</option>
                        </select>
                    </div>

                    <div class="doctors-description">
                        <h2>Doctor: </h2>
                        <div class="paragraph1">
                            <p>Please enter Doctor's name</p>
                        </div>
                        <div class="doctor-search">
                            <select name="doctor" id="reason-box">
                                <option hidden>Select a Doctor...</option>
                                <?php
                                    // Fetch list of doctors from the database
                                    $sql = "SELECT doctor_id, First_Name, Last_Name, Specialty FROM `doctors_table`";
                                    $result = $conn->query($sql);

                                    // Check if there are rows in the result
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row["doctor_id"] . '">' . $row["First_Name"] ." " . $row["Last_Name"]  ." - " . $row["Specialty"] . '</option>';
                                        }
                                    } else {
                                        echo '<option hidden>No doctors found</option>';
                                    }

                               
                                ?>
                            </select>
                        </div>
                    </div>



                    <div class="doctors-description">
                        <h2>Clinic: </h2>
                        <div class="paragraph1">
                            <p>Please select a Clinic near you</p>
                        </div>
                        <div class="doctor-search">
                            <select name="clinic" id="reason-box">
                                <option hidden>Select a clinic...</option>
                                <?php
                                    // Fetch list of doctors from the database
                                    $sql = "SELECT Clinic_id, Clinic_Name, Address FROM `clinic_info`";
                                    $result = $conn->query($sql);

                                    // Check if there are rows in the result
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row["Clinic_id"] . '">' . $row["Clinic_Name"] . " - " . $row["Address"] . '</option>';
                                        }
                                    } else {
                                        echo '<option hidden>No doctors found</option>';
                                    }

                                    // Close connection
                                    $conn->close();
                                ?>


                  
                            </select>
                        </div>
                    </div>

                    <h2>Phone No. </h2>
                    <div class="paragraph1">
                        <p>Input your phone number below</p>
                    </div>
                    <div class="input-box">
                        <input type="tel" id="phone" name="phone" pattern="[+]?[0-9]+[-]?[0-9]+[-]?[0-9]+" placeholder="+639.....">

                    </div>

                    <div class="bottom-buttons">
                        <button type="submit" class="Req-Btn" name="submit">Request Appointment</button>
                        <button onclick="myFunction()" class="Cancel-Btn" id="close-btn">Cancel</button>
                    </div>

        </div>

                    </form>





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

    // Validate patient dropdown when submitting the form
    document.querySelector("form").addEventListener("submit", function (event) {
        const patientDropdown = document.getElementById("reason-box");
        if (currentPatientRadio.checked && patientDropdown.value === "") {
            alert("Please select a patient.");
            event.preventDefault(); // Prevent form submission
        }
    });
</script>




 
</body>
</html>

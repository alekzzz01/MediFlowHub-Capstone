<?php
// Include your database connection file
require '../session/db.php';




// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the 'timeSlot' key exists in the $_POST array
    if (isset($_POST['timeSlot'])) {
        // Retrieve form data
        $date = $_POST['selecteddate'];
        $timeSlot = $_POST['timeSlot'];
        $diagnosis = $_POST['diagnosis'];
        $patientPhoneNum = $_POST['phone'];
        $doctorId = $_POST['doctor'];
        $patientId = $_POST['patient'];
        $clinicId = $_POST['clinic'];

        // Prepare and execute the SQL query to insert data into the appointment table
        $sql = "INSERT INTO appointments (Date, time_slot, Diagnosis, Patient_Phone_Num, doctor_id, Patient_id, Clinic_ID)
                VALUES ('$date', '$timeSlot', '$diagnosis', '$patientPhoneNum', '$doctorId', '$patientId', '$clinicId')";

        if ($conn->query($sql) === TRUE) {
            // Set the success message
            $successMessage = "Appointment booked successfully!";
            // Redirect to the same page to avoid form resubmission
            header("Location: booking.php?success=true");
            exit();
        } else {
            // Set an error message if there's an issue
            $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Error: 'timeSlot' is not set in the form submission.";
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

    <link rel="stylesheet" type="text/css" href="style/legitnabooking.css">
    <link rel="stylesheet" href="style/transitions.css">
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">


      
    <script defer>
        document.getElementById("appointmentForm").addEventListener("submit", function (event) {
            event.preventDefault();

            // You can add any additional validation here if needed

        
            this.submit();
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
                            <a href="booking.php">Book Appointment</a>

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







<div class="main--content" >



<form method="post" action="booking.php<?php echo isset($successMessage) ? '?success=true' : ''; ?>" id="appointmentForm">

    <div class="doctors-description" id="main--content">
                        <h2>Doctor</h2>

                        <div class="paragraph1">
                            <p>Select a Doctor and a preferred Date</p>
                        </div>

        <div class="inputboxes">

            <div class="doctor-search">
                        <select name="doctor" id="reason-box" onchange="updateDoctorInfo(this)">
                            <option hidden>Select a Doctor</option>
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




                    <div class="selecteddate">
                                <div class="input-box">
                                    <input type="date" name="selecteddate" id="selecteddate" placeholder="Select a date" required="required" onchange="updateSelectedDate()">
                                </div>
                            </div>

             
    

        </div>







            <h2>Available Time Slots</h2>



            <div class="timeslots">
                    <?php
                    // Set the start and end times
                    $start_time = strtotime('09:00 AM');
                    $end_time = strtotime('09:00 PM');

                    // Set the fixed duration for each timeslot (in seconds)
                    $duration = 5400; // 1.5 hours (5400 seconds)

                    // Set the interval to 2 hours (7200 seconds)
                    $interval = 7200;

                    // Initialize the current time variable with the start time
                    $current_time = $start_time;

                    while ($current_time + $duration <= $end_time) {
                        // Format the start and end times of the current timeslot as readable strings
                        $start_time_formatted = date('h:i A', $current_time);
                        $end_time_formatted = date('h:i A', $current_time + $duration);

                        // Output the timeslot button
                        echo '<div class="timeslot-container">';
                        echo '<button type="button" class="timeslot-button">' . $start_time_formatted . ' - ' . $end_time_formatted . '</button>';
                        echo '<button type="button"  id="booknow" class="booknow-button" onclick="bookNow(\'' . $start_time_formatted . ' - ' . $end_time_formatted . '\')">Book Now</button>';
                        echo '</div>';
                    
              
                
                        // Increment the current time by the interval
                        $current_time += $interval;
                    }
                    ?>
                    
    </div>


<div id="successMessage" class="success-message"><i class='bx bx-check'></i> Appointment booked successfully!</div>
<div id="errorMessage" class="error-message"><i class='bx bxs-x-circle'></i> Oops! Something went wrong and We couldn't initialize a part of your form correctly.</div>



                      
</div>

            <div id="formcontainer" class="formcontainer">



                            <div class="paragraph">
                                <p>Booking for Slot: </p>
                            </div>

                            <div class="DateInfo">
                                <p>Date: </p>
                            </div>



                            <div class="DoctorInfo">
                                <p>Doctor Info: </p>
                            </div>


                            <div class="br"></div>

                        
                

                            <div class="paragraph1">
                                <p>Please confirm that you would like to request the following appointment.</p>
                            </div>

            
                            <div class="CurrentPatientsBox"  id="Current_Patient">
                            
                                <h2>Select a patient: </h2>



                                    
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

                            
                                <h2>Clinic: </h2>
                                
                                    <div class="patient-search">
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

                                            ?>


                            
                                        </select>
                                    </div>
                            

                                            
                            </div>

                            <h2>Diagnosis </h2>

                            <div class="paragraph1">
                                <p>Choose a diagnosis that best describes</p>
                            </div>
                            
                            <div class="dialog_select">
                                <select name="diagnosis" id="reason-box">
                                    <option hidden>Choose...</option>
                                    <option value="saab">Eye</option>
                                    <option value="mercedes">General</option>
                                    <option value="audi">Hand</option>
                                </select>
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
                                <button onclick="myFunction()" class="Cancel-Btn" id="close-btn">Close</button>
                            </div>

            </div>

</form>



<!-- Add this script in your HTML file -->
<script>
    





    function updateSelectedDate() {
        // Get the selected date from the input element
        var selectedDate = document.getElementById("selecteddate").value;
        

        // Display the selected date in the Doctor Info section
        document.querySelector("#formcontainer .DateInfo p").textContent = "Date: " + selectedDate;
    }

    function updateDoctorInfo(selectElement) {
        // Get the selected option element
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        // Extract doctor information from the selected option
        var doctorId = selectedOption.value;
        var doctorName = selectedOption.text;

        // Display information about the selected doctor
        document.querySelector("#formcontainer .DoctorInfo p").textContent = "Doctor Info: " + doctorName + " (ID: " + doctorId + ")";
    }

 
    function bookNow(timeSlot) {
        // Get a reference to the main content and form container
        var mainContent = document.getElementById("main--content");
        var formContainer = document.getElementById("formcontainer");

        // Set the opacity of the main content to create a dim effect
        mainContent.style.opacity = "0.3";

        // Display the form container
        formContainer.style.display = "block";

        // Populate the paragraph in the form container with the selected time slot
        document.querySelector("#formcontainer .paragraph p").textContent = "Booking for Slot: " + timeSlot;

        // Add a hidden input field to store the selected time slot
        var hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = "timeSlot";
        hiddenInput.value = timeSlot;
        document.getElementById("appointmentForm").appendChild(hiddenInput);
    }



    function myFunction() {
        // Get a reference to the main content and form container
        var mainContent = document.getElementById("main--content");
        var formContainer = document.getElementById("formcontainer");

        // Reset the opacity of the main content
        mainContent.style.opacity = "1";

        // Hide the form container
        formContainer.style.display = "none";
    }


     // Check if the success parameter is present in the URL
     var successParam = "<?php echo isset($_GET['success']) ? $_GET['success'] : ''; ?>";

        if (successParam === "true") {
            var successMessageDiv = document.getElementById("successMessage");
            successMessageDiv.textContent = "Appointment booked successfully!";
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




<script src="script/script.js"></script>



</body>




</html>

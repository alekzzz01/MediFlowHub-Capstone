<?php 


require 'db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a session variable storing the user ID
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login or handle unauthorized access
    header("Location: login.php");
    exit();
}



// Get the current user ID from the session
$currentUserId = $_SESSION['user_id'];

$query = "SELECT a.Appointment_ID, p.Last_Name AS Last_Name, p.First_Name AS First_Name, 
                 d.Last_Name AS Last_Name, d.First_Name AS First_Name, 
                 d.Clinic_ID AS Clinic_ID, a.time_slot, a.Date,
                 c.Clinic_Name, c.Address
          FROM appointments a
          JOIN patients_table p ON a.Patient_id = p.Patient_id
          JOIN doctors_table d ON a.doctor_id = d.doctor_id
          JOIN clinic_info c ON d.Clinic_ID = c.Clinic_ID
          WHERE a.user_id = $currentUserId";

$result = $conn->query($query);








?>











<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="style/appointments.css">
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
                                    <a href="bookappointment.php">Book Appointment</a>

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

        <div class="header--wrapper">


        
         
            <div class="menu-search">


            
                        <i class='bx bx-menu' id="menu-toggle"></i>

                        <div class="search-box">
                        
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    
                        </div>

                    </div>

          



                    <div class="user--info">

                    <div class="notification" id="notif-icon">
                                    <i class='bx bx-bell'   ></i>
                                    <span class="num">8</span>

                        </div>

            <div class="user-profile">

                <button class="profile-icon" id="profile-icon"></button>
                
            </div>


                <div class="dropdown-profile">

                    <div class="sub-menu">

                            <div class="user-info">
                                <button class="usermain-profile"></button>
                                <p>Username</p>
                            </div>

                            <div class="edit-profile">
                                <div class="edit-profile1">
                                <i class='bx bxs-user-circle' ></i>
                                <p>Edit Profile</p>
                                </div>
                            
                                <i class='bx bx-chevron-right' ></i>
                            </div>

                            <div class="help-support">
                                <div class="edit-profile1">
                                <i class='bx bxs-help-circle' ></i>
                                <p>Help & Support</p>
                                </div>
                                <i class='bx bx-chevron-right' ></i>
                            </div>



                    </div>


                </div>



                        <div class="dropdown-notifications">
                                <p class="Notiftitle">Notifications</p>

                                <p class="ReminderTitle">Reminder</p>
                               
                                <div class="notif-box">

                                        <div class="notif-message">
                                            <p>Your appointment with Dr. Quack Quack starts in 1hr.</p>

                                            <i class='bx bx-chevron-right'></i>

                                        </div>

                                        <div class="notif-time">

                                             <i class='bx bxs-time-five'></i>
                                             <p>Now</p>
                                            
                                        </div>
                                       

                                </div>

                                <div class="notif-box">

                                        <div class="notif-message">
                                            <p>Your appointment with Dr. Quack Quack starts in 1hr.</p>

                                            <i class='bx bx-chevron-right'></i>

                                        </div>

                                        <div class="notif-time">

                                             <i class='bx bxs-time-five'></i>
                                             <p>Now</p>
                                            
                                        </div>
                                       

                                </div>




                        </div>


                </div>
           
   
       

        </div>



        <div class="inside-container">
            <div class="rectangle">
            <table>
            <tr>
                <th>Appointment No.</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Clinic</th>
                <th>Appointment Time</th>
                <th>Appointment Date</th>
                <th>Status</th>
             <!-- <th>View</th> -->
            </tr>

                    <?php
                    // Display appointments in the HTML table
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['Appointment_ID']}</td>";

                        echo "<td>{$row['Last_Name']}, {$row['First_Name']}</td>";
                        echo "<td>{$row['Last_Name']}, {$row['First_Name']}</td>";

                        // Display Clinic_Name based on Clinic_ID
                        $clinicId = $row['Clinic_ID'];
                        $clinicName = getClinicName($clinicId, $conn);
                        echo "<td>{$clinicName}</td>";// Replace this with a function to fetch Clinic_Name based on Clinic_ID

                       
                        echo "<td>{$row['time_slot']}</td>";
                        echo "<td>{$row['Date']}</td>";
                       // echo "<td>{$row['Status']}</td>";
                      
                     //   echo "<td><a href='viewappointment.php?appointment_id={$row['Appointment_ID']}'>View Appointment</a></td>";
                        echo "</tr>";
                    }



                    function getClinicName($clinicId, $conn) {
                        // Sanitize Clinic_ID to prevent SQL injection
                        $clinicId = mysqli_real_escape_string($conn, $clinicId);
                    
                        // Query to fetch Clinic_Name based on Clinic_ID
                        $query = "SELECT Clinic_Name FROM clinic_info WHERE Clinic_ID = $clinicId";
                        $result = $conn->query($query);
                    
                        // Check if the query was successful
                        if ($result === false) {
                            die("Error executing the query: " . $conn->error);
                        }
                    
                        // Check if a row was returned
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            return $row['Clinic_Name'];
                        } else {
                            // Return an empty string or a default value if Clinic_ID is not found
                            return "Clinic Not Found";
                        }
                    }


                  
                    ?>

                </table>
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



 
</body>
</html>
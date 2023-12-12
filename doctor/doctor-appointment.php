<?php 


require '../session/db.php';
require_once '../session/session_manager.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a session variable storing the user ID
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect to login or handle unauthorized access
    header("Location: doctor-login.php");
    exit();
}



// Get the current user ID from the session
$currentUserId = $_SESSION['doctor_id'];

$query = "SELECT a.Appointment_ID, 
                p.Last_Name AS Patient_Last_Name, p.First_Name AS Patient_First_Name, 
                 d.Last_Name AS Doctor_Last_Name, d.First_Name AS Doctor_First_Name, 
                 d.Clinic_ID AS Clinic_ID, a.time_slot, a.Date, a.Status,
                 c.Clinic_Name, c.Address
          FROM appointments a
          JOIN patients_table p ON a.Patient_id = p.Patient_id
          JOIN doctors_table d ON a.doctor_id = d.doctor_id
          JOIN clinic_info c ON d.Clinic_ID = c.Clinic_ID
          WHERE a.doctor_id = $currentUserId";


$result = $conn->query($query);








?>











<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointments</title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="style/doctor-appointment.css">
    <link rel="stylesheet" href="style/transitions.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">



   
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<!-- Your other styles and scripts -->

<script defer>
    $(document).ready(function () {
        // Initialize DataTable with additional options
        $('#myTable').DataTable({
            "lengthMenu": [10, 25, 50, 75, 100],
            "pageLength": 10,
            "pagingType": "full_numbers",
            "language": {
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });
    });

    /* Other scripts and functions */
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
                        <a href="doctor-dashboard.php" >
                       <i class='bx bxs-dashboard'></i>
                         <span>Dashboard</span>
                    </a>
                        </li>

                        
                    
                        <li class="active">
                    <a href="doctor-appointment.php">
                        <i class='bx bxs-time-five'></i>
                        <span>Appointments</span>
                    </a>
                        </li>



                        
                        <li>
                        <a href="doctor-all.php">
                                <i class='bx bxs-user-rectangle' ></i>
                                <span>Doctors</span>
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

                       

            </div>

          



           
   
       

        </div>



    <div class="inside-container">
        <div class="rectangle">

 
       
            <table id="myTable" class="display">

            <thead id="thead" >

            <tr>
                <th>Appointment No.</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Clinic</th>
                <th>Appointment Time</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Cancel</th>
                <th>Prescribe</th>
            
            </tr>



            </thead>


            <tbody>

                    <?php
                    // Display appointments in the HTML table
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['Appointment_ID']}</td>";

                        echo "<td>{$row['Patient_Last_Name']}, {$row['Patient_First_Name']}</td>";
                        echo "<td>{$row['Doctor_Last_Name']}, {$row['Doctor_First_Name']}</td>";

                        // Display Clinic_Name based on Clinic_ID
                        $clinicId = $row['Clinic_ID'];
                        $clinicName = getClinicName($clinicId, $conn);
                        echo "<td>{$clinicName}</td>";// Replace this with a function to fetch Clinic_Name based on Clinic_ID

                       
                        echo "<td>{$row['time_slot']}</td>";
                        
                        $dateString = $row['Date'];

                        // Create a DateTime object from the database date string
                        $dateTime = new DateTime($dateString);

                        // Format the date as desired, for example, 'November 23, 2023'
                        $formattedDate = $dateTime->format('F j, Y');

                        // Output the formatted date in your HTML
                        echo "<td>{$formattedDate}</td>";

                        $status = $row['Status'];
                        $statusClass = '';
                    
                        switch ($status) {
                            case 'Pending':
                                $statusClass = 'c-pill c-pill--warning'; 
                                break;
                            case 'Confirmed':
                                $statusClass = 'c-pill c-pill--success'; 
                                break;
                            case 'Cancelled':
                                $statusClass = 'c-pill c-pill--danger'; 
                                break;
                
                    
                            default:
                    
                                $statusClass = 'default-status';
                                break;
                        }
                    
                        // Apply the CSS class to the Status column
                        echo "<td><p class='{$statusClass}'>{$status}</p></td>";


                        echo '<td><button class="cancel-button">Cancel</button></td>';
                        echo '<td><a href="prescription.php?appointment_id=' . $row['Appointment_ID'] . '" class="prescribe-button">Prescribe</a></td>';
                        
                    
        
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




                        </tbody>

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
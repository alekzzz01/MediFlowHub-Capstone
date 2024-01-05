<?php 


include('../session/auth.php');
require_once '../session/session_manager.php';
require '../session/db.php';


start_secure_session(); 


if (!isset($_SESSION["username"])) {
    header("Location: ../users/login.php"); 
    exit;
}

if (!check_admin_role()) {
    // Redirect to the user dashboard or show an error message
    header('Location: ../users/dashboard.php');
    exit();
}



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}






$query = "SELECT a.Appointment_ID, p.Last_Name AS Patient_Last_Name, p.First_Name AS Patient_First_Name, 
                 d.Last_Name AS Doctor_Last_Name, d.First_Name AS Doctor_First_Name, 
                 d.Clinic_ID AS Clinic_ID, a.time_slot, a.Date, a.Status,
                 c.Clinic_Name, c.Address
                 
          FROM appointments a
          JOIN patients_table p ON a.Patient_id = p.Patient_id
          JOIN doctors_table d ON a.doctor_id = d.doctor_id
          JOIN clinic_info c ON d.Clinic_ID = c.Clinic_ID";
     


$result = $conn->query($query);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointmentId = $_POST['appointment_id'];
    $newStatus = $_POST['new_status'];

    // Update the status in the database
    $updateQuery = "UPDATE appointments SET Status = '$newStatus' WHERE Appointment_ID = $appointmentId";
    $updateResult = $conn->query($updateQuery);

    if ($updateResult === false) {
        die("Error updating the status: " . $conn->error);
     } 
    // Redirect back to the appointments page after updating the status
    header("Location: admin-appointment.php");
    exit();
}



?>




<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | List of Appointments</title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="style/admin-appointment.css">
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


                <p>HOME</p>

                <li >
                    <a href="admin-dashboard.php" >
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                
            
                <li class="active">
                    <a href="admin-appointment.php">
                        <i class='bx bxs-time-five' ></i>
                        <span>Appointments</span>
                    </a>
                </li>


                
        

                <li>
                <button class="dropdown-btn">
                        <i class='bx bxs-user-rectangle' ></i>
                        <span>Doctors</span>
                        <i class='bx bxs-chevron-down'></i>
                    </button>

                    <div class="dropdown-container">
                            <a href="admin-adddoctor.php">Add/Delete Doctor</a>
                            <a href="admin-viewalldoctor.php">View All Doctor</a>
                          
                    </div>

                </li>


                <li>
                    <a href="admin-viewallpatient.php">
                        <i class='bx bx-plus-medical' ></i>
                        <span>Patients</span>
                    </a>
                </li>


                <p>DATABASE</p>


                <li>
                    <a href="admin-viewallpatient.php">
                    <i class='bx bxs-data'></i>
                        <span>Backup</span>
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



            <div class="navigation">

                <p>ADMIN <span>/ LIST OF APPOINTMENTS</span></p>
              


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
                        <th>Action</th>
                        
                    <!-- <th>View</th> -->
                    </tr>

                </thead>

                <tbody>

                            <?php
                 
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$row['Appointment_ID']}</td>";

                                echo "<td>{$row['Patient_Last_Name']}, {$row['Patient_First_Name']}</td>";
                                echo "<td>{$row['Doctor_Last_Name']}, {$row['Doctor_First_Name']}</td>";

                         
                                $clinicId = $row['Clinic_ID'];
                                $clinicName = getClinicName($clinicId, $conn);
                                echo "<td>{$clinicName}</td>";

                            
                                echo "<td>{$row['time_slot']}</td>";

                                $dateString = $row['Date'];

                         
                                $dateTime = new DateTime($dateString);

                                $formattedDate = $dateTime->format('F j, Y');

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

                                        case 'Completed':
                                            $statusClass = 'c-pill c-pill--success'; 
                                            break;
                                    case 'Cancelled':
                                        $statusClass = 'c-pill c-pill--danger'; 
                                        break;
                        
                            
                                    default:
                            
                                        $statusClass = 'default-status';
                                        break;
                                }
                     
                                echo "<td><p class='{$statusClass}'>{$status}</p></td>";


                                echo "<td>
                                        <form action='' method='post'>
                                            <input type='hidden' name='appointment_id' value='{$row['Appointment_ID']}'>
                                            <select name='new_status'>
                                                <option value='Confirmed'>Confirm</option>
                                                <option value='Cancelled'>Cancel</option>
                                            </select>
                                            <input type='submit' value='Update'>
                                        </form>
                                    </td>";
                        
                                
                            
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
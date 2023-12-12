<?php
// Include the session manager

require '../session/db.php';


session_start();


// Check if the user is logged in
if (!isset($_SESSION['doctor_id'])) {
    header("Location: doctor-login.php");
    exit();
}

// Access the first name
$firstName = $_SESSION['first_name'];


$sqlUsers = "SELECT COUNT(user_id) AS total_users FROM users";
$resultUsers = $conn->query($sqlUsers);
$rowUsers = $resultUsers->fetch_assoc();
$totalUsers = $rowUsers['total_users'];

$sqlDoctors = "SELECT COUNT(doctor_id) AS total_doctors FROM doctors_table";
$resultDoctors = $conn->query($sqlDoctors);
$rowDoctors = $resultDoctors->fetch_assoc();
$totalDoctors = $rowDoctors['total_doctors'];


$sqlPatients= "SELECT COUNT(Patient_id) AS total_doctors FROM patients_table";
$resultPatients = $conn->query($sqlPatients);
$rowPatients = $resultPatients->fetch_assoc();
$totalPatients = $rowPatients['total_doctors'];


// Fetch the counts from the third table
$sqlAppointments = "SELECT COUNT(Appointment_ID) AS total_appointments FROM appointments";
$resultAppointments = $conn->query($sqlAppointments);
$rowAppointments = $resultAppointments->fetch_assoc();
$totalAppointments = $rowAppointments['total_appointments'];

?>








<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="doctor-dashboard.css">
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

                <li class="active">
                    <a href="doctor-dashboard.php" >
                       <i class='bx bxs-dashboard'></i>
                         <span>Dashboard</span>
                    </a>
                </li>

                
                <li>
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
                    <a href="#">
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
                                <p>Notifications</p>




                        </div>



                       

            </div>
           
        </div>


        <div class="first-container">

<h1>Welcome, <?php echo $firstName; ?></h1>


<div class="inside-container">

    <div class="card-container">

        <div class="card-box">


                <div class="topbox">

                    <i class='bx bxs-user'></i>

                        <div class="text-box">
                            
                            <p class="text-patients">Registered Users:  <span><?php echo $totalUsers; ?></span></p>
                            
                        </div>



                </div>

                <div class="bottombox">

                    <a href="admin-viewallusers.php" target="_blank">View Details</a>

                        <i class='bx bx-chevron-right'></i>

                        
                </div>

               


        </div>

        <div class="card-box">


            <div class="topbox">

                <i class='bx bxs-group'></i>

                    <div class="text-box">
                    
                        <p class="text-patients">Total Doctors:  <span><?php echo $totalDoctors; ?></span></p>
                    
                    </div>


            </div>

            <div class="bottombox">

            <a href="admin-viewalldoctor.php">View Details</a>
            <i class='bx bx-chevron-right'></i>


            </div>



            </div>


        <div class="card-box">


        <div class="topbox">

            <i class='bx bxs-bed' ></i>

                <div class="text-box">
                   
                    <p class="text-patients">Total Patients:  <span><?php echo $totalPatients; ?></span></span></p>
                
                </div>


                </div>


                <div class="bottombox">

                <a href="admin-viewallpatient.php">View Details</a>
                <i class='bx bx-chevron-right'></i>


                </div>



        </div>



        <div class="card-box">


            <div class="topbox">

            <i class='bx bxs-book-content'></i>

                <div class="text-box">
                   
                    <p class="text-patients">Total Appointments:  <span><?php echo $totalAppointments; ?></span></span></p>
                 
                </div>

                </div>


                <div class="bottombox">

                    <a href="admin-appointment.php">View Details</a>
                    <i class='bx bx-chevron-right'></i>


                    </div>



        </div>



        
    </div>






</div>






</div>

  



 

    </div>


   


    <script src="script/script.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Month', 'Consultations', 'Patients'],
      ['Jan',  100,      250],
      ['Feb',  250,      100],
      ['Mar',  100,       300],
      ['Apr',  400,      100]
      // Add more months here...
    ]);

    var options = {
      title: 'Activity',
      curveType: 'function',
      legend: { position: 'bottom' },
      chartArea: {
        left: 80,   // Adjust the left margin to move the title to the left
        top: 50,    // Adjust the top margin to move the title to the top
        width: '100%', // Adjust the width to fit the chart within the container
        height: '60%' // Adjust the height to fit the chart within the container
      },
      vAxis: {
        viewWindow: {
          max: 1000
        }
      },
      titlePosition: 'out'  // Set title to be positioned outside the chart area
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }
</script>


 
</body>
</html>

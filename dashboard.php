<?php
session_start();

if (!isset($_SESSION["username"])) {

    header("Location: login.php"); 
    exit;
}

// Display the user's first name
$firstName = $_SESSION["first_name"];



?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="style/dashboard.css">
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
                    <a href="dashboard.php" >
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                
                <li>
                    <a href="#">
                        <i class='bx bxs-time-five'></i>
                        <span>Appointments</span>
                    </a>
                </li>


                
                <li>
                    <a href="availabledoctors.php">
                        <i class='bx bxs-user-rectangle' ></i>
                        <span>Doctors</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class='bx bxs-credit-card'></i>
                        <span>Payments</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                    <i class='bx bxs-map'></i>
                        <span>Locations</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class='bx bxs-bell' ></i>
                        <span>Notifications</span>
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

                        <div class="search-box">
                        
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    
                        </div>

            </div>
           
            <div class="user--info">

                        <div class="notification">
                                    <i class='bx bx-bell'></i>
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
                       

            </div>
           
        </div>






        <div id="swup" class="first-container">
            <h1>Hi, <?php echo $firstName; ?>.</h1>

            <div class="inside-container">

                    <div class="info-available">

                        <p>Let's track your health today!</p>
        
                        <div class="available-container">
        
                            <div class="available-doctors">
                                <p>Today's Available</p>
                                <p>From <span>MEDIFLOW'S HOSPITAL</span></p>
            
                                <div class="doctorsprofile-icon">
                                    <i class='bx bx-chevron-left' ></i>
                                    <button class="profile">
            
                                    </button>
                                    <i class='bx bx-chevron-right' ></i>
                                </div>
            
                                <div class="info-doctor">
                                    <p class="doctor-name">Dr. Quack Quack</p>
                                    <p class="Specialty">General Practicioner</p>
            
                                </div>
                        
            
                                <div class="schedule-container">
            
                                    <button class="schedule-btn">Schedule</button>
                                    <div class="icons-schedule">
                                        <i class='bx bxs-phone' ></i>
                                        <i class='bx bxs-video' ></i>
            
                                    </div>
                                </div>
                                
                            </div>
            
                            <div class="available-doctors">
                                <p>Today's Available</p>
                                <p>From <span>MEDIFLOW'S HOSPITAL</span></p>
            
                                <div class="doctorsprofile-icon">
                                    <i class='bx bx-chevron-left' ></i>
                                    <button class="profile">
            
                                    </button>
                                    <i class='bx bx-chevron-right' ></i>
                                </div>
            
                                <div class="info-doctor">
                                    <p class="doctor-name">Dr. Quack Quack</p>
                                    <p class="Specialty">General Practicioner</p>
            
                                </div>
                        
            
                                <div class="schedule-container">
            
                                    <button class="schedule-btn">Schedule</button>
                                    <div class="icons-schedule">
                                        <i class='bx bxs-phone' ></i>
                                        <i class='bx bxs-video' ></i>
            
                                    </div>
                                </div>
                                
                            </div>

                            <div class="daily-progress">
                                <p>Daily Progress</p>
                                <span>Keep track to your daily health</span>

                            </div>
                            
        
                        </div>


                        <div class="bottom-container">
                            <p>Common Conditions</p>

                            <div class="conditions-slider">
                                <div class="box">
                                    <img src="images/conditions-icon/condition-1.png" alt="">
                                    <p>Diabetes</p>
                                </div>

                                <div class="box">
                                    <img src="images/conditions-icon/condition-2.png" alt="">
                                    <p>Hyperpyrexia</p>
                                </div>

                                <div class="box">
                                    <img src="images/conditions-icon/condition-3.png" alt="">
                                    <p>PCOS</p>
                                </div>

                                <div class="box">
                                    <img src="images/conditions-icon/condition-4.png" alt="">
                                    <p>UTI</p>
                                </div>

                                <div class="box">
                                    <img src="images/conditions-icon/condition-5.png" alt="">
                                    <p>Cough</p>
                                </div>

                                <div class="box">
                                    <img src="images/conditions-icon/condition-6.png" alt="">
                                    <p>High Blood</p>
                                </div>
                            </div>
                        </div>
                    
        
        
                        </div>
                
                    <div class="vl"></div>

                    <div class="upcoming-container">
                        <p>Upcoming Appointments</p>

                        <div class="appointments-box">

                            <div class="hospital-container">

                                    <div class="hospital-name">
                                        <p class="hos-name">St. Lukes</p>
                                        <p class="hos-text">Hospital</p>
                                    </div>

                                    <div class="doctors-description">
                                        <button class="doctors-image"></button>
        
                                        <div class="doctors-name">
                                            <p class="doc-name">Dr. Names</p>
                                            <p class="specialty">Heart Surgeon, <span>London</span></p>
                                        </div>
                                    </div>
                                                    
                            </div>

                            <div class="description-container">


                                <div class="hospital-image">
                                    <img src="images/hospital.png" alt="">
                                </div>
                            
                                    <div class="time-date-container">

                                        <div class="time-date">
                                            <div class="date">
                                                <p class="title-date">Date</p>
                                                <p class="text-date">16 Sept 2023</p>
                                            </div>
        
                                            <div class="time">
                                                <p class="title-time">Time</p>
                                                <p class="text-time">09:00am</p>
                                            </div>                                      
                                        </div>
        
                                        <div class="sched-container">
                                            <button class="schedule">Schedule</button>
                                            <div class="call-video">
                                                <i class='bx bxs-phone'></i>
                                                <i class='bx bxs-video' ></i>
                                            </div>
                                            
                                        </div>





                                    </div>
                                
    
                            </div>

                        </div>

                        <div class="divider"></div>

                        <div class="appointments-box">

                            <div class="hospital-container">

                                    <div class="hospital-name">
                                        <p class="hos-name">St. Lukes</p>
                                        <p class="hos-text">Hospital</p>
                                    </div>

                                    <div class="doctors-description">
                                        <button class="doctors-image"></button>
        
                                        <div class="doctors-name">
                                            <p class="doc-name">Dr. Names</p>
                                            <p class="specialty">Heart Surgeon, <span>London</span></p>
                                        </div>
                                    </div>
                                                    
                            </div>





                            <div class="description-container">


                                <div class="hospital-image">
                                    <img src="images/hospital.png" alt="">
                                </div>
                            
                                    <div class="time-date-container">

                                        <div class="time-date">
                                            <div class="date">
                                                <p class="title-date">Date</p>
                                                <p class="text-date">16 Sept 2023</p>
                                            </div>
        
                                            <div class="time">
                                                <p class="title-time">Time</p>
                                                <p class="text-time">09:00am</p>
                                            </div>                                      
                                        </div>
        
                                        <div class="sched-container">
                                            <button class="schedule">Schedule</button>
                                            <div class="call-video">
                                                <i class='bx bxs-phone'></i>
                                                <i class='bx bxs-video' ></i>
                                            </div>
                                            
                                        </div>





                                    </div>
                                
    
                            </div>

                        </div>

                        <div class="divider"></div>


                        <div class="appointments-box">

                            <div class="hospital-container">

                                    <div class="hospital-name">
                                        <p class="hos-name">St. Lukes</p>
                                        <p class="hos-text">Hospital</p>
                                    </div>

                                    <div class="doctors-description">
                                        <button class="doctors-image"></button>
        
                                        <div class="doctors-name">
                                            <p class="doc-name">Dr. Names</p>
                                            <p class="specialty">Heart Surgeon, <span>London</span></p>
                                        </div>
                                    </div>
                                                    
                            </div>





                            <div class="description-container">


                                <div class="hospital-image">
                                    <img src="images/hospital.png" alt="">
                                </div>
                            
                                    <div class="time-date-container">

                                        <div class="time-date">
                                            <div class="date">
                                                <p class="title-date">Date</p>
                                                <p class="text-date">16 Sept 2023</p>
                                            </div>
        
                                            <div class="time">
                                                <p class="title-time">Time</p>
                                                <p class="text-time">09:00am</p>
                                            </div>                                      
                                        </div>
        
                                        <div class="sched-container">
                                            <button class="schedule">Schedule</button>
                                            <div class="call-video">
                                                <i class='bx bxs-phone'></i>
                                                <i class='bx bxs-video' ></i>
                                            </div>
                                            
                                        </div>





                                    </div>
                                
    
                            </div>

                        </div>

                        <div class="divider"></div>


                    </div>
        

            </div>
         
            
            
        </div>


    </div>


    <script src="script/script.js"></script>


 
</body>
</html>

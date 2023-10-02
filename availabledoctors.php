


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Doctors</title>

    <link rel="icon" href="images/logo.png" type="image/png">


    <link rel="stylesheet" type="text/css" href="style/availabledoctors.css">
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

                
                <li>
                    <a href="#">
                        <i class='bx bxs-time-five'></i>
                        <span>Appointments</span>
                    </a>
                </li>


                
                <li class="active">
                    <a href="#">
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

                        <div class="menu1">

                                <i class='bx bx-menu' id="menu-toggle"></i>

                                <div class="search-box">

                                <input type="text" placeholder="Search...">
                                <i class='bx bx-search'></i>

                                </div>

                        </div>


                        <div class="menu2">

                            <i class='bx bx-map-pin'></i>
                            <p>Location</p>

                        </div>

                        <div class="menu3">

                        <i class='bx bx-slider'></i>
                        <p>Filters</p>

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


        <div class="filter-results">
                <div class="results">
                    <p>GENERAL CHECKUP</p>
                    <i class='bx bx-x'></i>
                </div>

                <div class="results">
                    <p>MEDICAL</p>
                    <i class='bx bx-x'></i>
                </div>
        </div>

        <div class="number-results">
            <p>We've found 100 Doctors/Providers you can book with!</p>
        </div>

        <div class="doctors-results">


            <div class="doctors-container">
                <div class="information">

                    <div class ="doctors-information">

                            <button class="profile-image">
                            </button>

                            <div class="doctors-names">
                                <p class="doctor-name">DR. QUACK QUACK</p>
                                <p class="profession">General Practicioner</p>
                                <p class="profession">5 yrs. of experience</p>

                            
                            </div>


                    </div>


                    
                    <div class="schedule">
                                <p class="title">EARLIEST AVAILABLE SCHEDULE</p>
                                <p class="time">Today, 09:00 AM - 11:00 PM</p>
                                <p class="time">Fee: ₱400.00</p>
                            </div>


                </div>
          
                <button class="viewdoctor">VIEW  DOCTOR</button>
                  
                        
            </div>




          




        </div>






    </div>





    <script src="script/script.js"></script>

    
</body>
</html>
<?php



?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="style/profile.css">
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
                    <a href="appointments.php">
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
                    <a href="Payments.php">
                        <i class='bx bxs-credit-card'></i>
                        <span>Payments</span>
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

                <li class="active">
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
                                <p>Notifications</p>




                        </div>



                       

            </div>
           
        </div>


        <div class="first-container">
            <h1>Account settings</h1>

            <div class="account-container">

                <div class="account-options">

                        <li class="active">
                            <i class='bx bxs-user-circle'></i>
                            <p>Profile</p>
                        </li>
                            
                   
                        <li class="active2" >
                            <i class='bx bxs-lock-alt' ></i>
                            <p>Password</p>
                        </li>

                </div>





                <div class="account-edit">

                    <div class="image-edit">

                            <div class="image-prof">
                                <img src="images/PROFILE1.png" alt="">
                                <i class='bx bxs-camera' ></i>
                            </div>
                            <div class="image-buttons">

                                <button class="upload-btn">Upload here</button>
                                <button class="delete-btn">Delete</button>

                            </div>
                        

                    </div>

                    <form class="form-input">

                        <div class="input-box">
                                <p>FIRST NAME<span>*</span></p>
                                <input type="text"  placeholder="First Name....." required="required">
                                
                        </div>

                        <div class="input-box">
                                <p>LAST NAME <span>*</span></p>
                                <input type="text"  placeholder="Last Name....." required="required">
                                
                        </div>

                        <div class="input-box">
                                <p>EMAIL <span>*</span></p>
                                <input type="text"  placeholder="Email Address....." required="required">
                                
                        </div>

                        <div class="input-box">
                                <p>MOBILE NO. <span>*</span></p>
                                <input type="text"  placeholder="63+" required="required">
                                
                        </div>

                        <div class="input-box">
                                <p>ADDRESS <span>*</span></p>
                                <input type="text"  placeholder="Address...." required="required">
                                
                        </div>

                        <div class="input-box">
                                <p>ZIP CODE <span>*</span></p>
                                <input type="text"  placeholder="Zip Code...." required="required">
                                
                        </div>

                        <div class="input-radio">
                                <p>GENDER <span>*</span></p>

                                <div class="radio-inputs">

                                        <div class="gender">
                                            <input type="radio" id="gender" name="age" value="30">
                                            <label for="gender">Male</label><br>

                                        </div>

                                        <div class="gender">
                                            <input type="radio" id="gender" name="age" value="30">
                                            <label for="gender">Female</label><br>

                                        </div>
                                            

                                            

                                </div>

                                
                        </div>



                    </form>


                    <div class="confirmchanges">
                        <button class="confirm-btn">Confirm Changes</button>
                    </div>




                </div>








            </div>

            




        </div>






      


    </div>


    <script src="script/script.js"></script>


 
</body>
</html>

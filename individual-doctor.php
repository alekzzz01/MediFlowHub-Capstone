<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="style/individual-doctors.css">
    <link rel="stylesheet" href="style/transitions.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">

</head>



 
    
</head>
<body>

    <div id="sidebar" class="sidebar">
        <div class="logo">
            <img src="images/MediFlowHub.png" alt="">
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
                        <i class='bx bxs-location-plus'></i>
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





<div class="container1">

<h2>AVAILABLE SCHEDULE</h2>
        

<div class="inside-container">



        <div class="appointment-card">
                        <div class="profile">
                            <button></button>

                            <div class="info">
                                <p>Dr. Names</p>
                                <span>Hearth Surgeon, London</span>
                            </div>

                        </div>


                        <div class="profession">
                            <p>Surgeon</p>
                            <p>Heart Surgeon</p>
                        </div>

                        <div class="date-time">

                            <div class="date-time-container">
                                <p class="date-time-title">Date</p>
                                <p class="date-time-desc">16 Sept 2023</p>
                            </div>

                            
                            <div class="date-time-container">
                                <p class="date-time-title">Time</p>
                                <p class="date-time-desc">09:00am</p>
                            </div>


                        </div>

                        <div class="button-schedule">
                            <button>Schedule</button>
                            <div class="icons-schedule">
                            <i class='bx bxs-phone'></i>
                            <i class='bx bxs-video' ></i>

                            </div>
                            
                        </div>



                    


        </div>  


        <div class="schedule-card">

                <div class="hour">
                        <img src="https://s3-alpha-sig.figma.com/img/2958/84d3/64147a8ca6f213244f769ccd90cf558b?Expires=1697414400&Signature=JrLi97y3wDiZyPWLQdaFScrX4QAylZKVnJVg~fLj2hEcgzRnzzWfdgEFVq4l-H6EER1fv2rVIgeIclhw8WDxQ4BhIN2rOXCUfHWMWqzZAXZdHdQ9BoTipw0r0LVAsaAtK-Zb7~Mp0UACnXdgzm78GugIVQS5EAlInGiMHUUTTaGABi12IVrI0ct~ZnmGYUgbsCNM1NcAZVpF~ANr9q5J~cVCN2kZ0jlaas2o8b2vr7Zr8Gb6QXxeLqu5HRn1qFlOw6OaEKbQWelamtRJAn7eikXtGZwts23yw4z~oOyk15wtRtQcyz3-i3-VtJQGjt33z7pGCzFaThR9PNrUF-9iGw__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" alt="">
                        <div class="hour-desc">
                            <p>Morning</p>
                            <span>09:00 AM to 12:00 PM</span>
                        </div>
                </div>

                <div class="time-card">

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                </div>

                <div class="divider"></div>



                <div class="hour">
                        <img src="https://s3-alpha-sig.figma.com/img/7f27/91a0/8cca3b8f1a92722a37fb165347da7126?Expires=1697414400&Signature=ljKKZYsEaLhqxwKDgzk9CPP99S-Jm3Dj2nNV1IWp0FnqNv8BlDEme1W1O5CPm83skL4tHGk~TLtUXGqBDFolXsraLPJxwa75iqzYkaaSuqrpNHmG0dnKMt9O6IT4Iyepcj3vGhesXRbdH6Od1RqxziSzDHFFu009rcZSPs25yBvFmcMOHo02otKcgDIiSYP~DvBDCBSMIzzLHrFjExHkDBLQjNzBulq86UbIjEFfTKt0jboEli48-r1tqoIUbdkZe5jCiQdYHa84j~q9nEEatsv7wG8wRtLujMJUE38m4BpInJfSdfVbUDUBYOxdUrmyYeGsFU0XMeCg1r9ge-tCGw__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" alt="">
                        <div class="hour-desc">
                            <p>Evening</p>
                            <span>05:00 PM to 9:00 PM</span>
                        </div>
                </div>

                <div class="time-card">

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                    <div class="time-box">
                        <input type="radio" id="time" /><label for="first">09:00 am</label>
                    </div>

                </div>

        </div>
            
     





</div>
     









</div>
  

</div>

  


    <script src="script/script.js"></script>


 
</body>
</html>
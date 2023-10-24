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

    <div id="sidebar" class="sidebar" id="content">
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

    
   
    
    <div class="main--content" id="content">
        

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





<div class="container1">





<div class="inside-container" id="content">



        <div class="appointment-card">
                        <div class="profile">
                            <button></button>

                            <div class="info">
                                <p>Dr. Names</p>
                                <span>Hearth Surgeon, London</span>
                            </div>

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
                        <img src="https://s3-alpha-sig.figma.com/img/2958/84d3/64147a8ca6f213244f769ccd90cf558b?Expires=1698624000&Signature=bZ773-7JRdrkYX5y2Ipb6AizYcQB6X1s5szRPTY3oe7xdYDFMhY1LqsieU0ls976Cy2FhVCu4mIETW3EXBUfsUPwQUJTupxth8ltRoRHGKyQhwjUHc7xSi41C9-tO5wY6JJph0q7DoTxDj1xHA6G4QMF3MyyoGoNdMrhrOYgC5clxQLEX-CP3uy8pw2kJaIwsVK9vmGXZ1mAak3-LxpmPOU5-QE4sG-Na8MlRkRmPfIl5tEclVUBGHUJoOj0CTk3ncIZdy3UTrAvDB7X~T~M15ebq4~gK7rE4Jv4htviH886ka-uRg0LmgZm30C2hgIQt~SdQS5h1O32v4gXwMhLjQ__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" alt="">
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
                        <img src="https://s3-alpha-sig.figma.com/img/7f27/91a0/8cca3b8f1a92722a37fb165347da7126?Expires=1698624000&Signature=E0z05Wz4GR7iHRLNeSrsdQjQBLhUK1g6OiwQVBKS3Fr2ShiLkT5QDlbKxEtovQKJuY29~4Ef54y3G1iPfAV2KfdZrtgWCa54-AnP3nJdIHYqKoX3wV5uFpA~0tNyypT6tZCAZXC4TmjHLzH1hJnMhjDnz~0lsmSD5BOVvoRLvi5nBJsNUUWPPfC8HeLsNMAt3urKUz2kgW52ryurzCb1va6fhZtzStSJDYCsFb4abKORaX6Cj9yL9UJ9uSxYJwPhVU-lTgzpAsbdH1cXObGee5-fb4SeFTaMLQzgW35SYzdmkW4923BB3w9094~8kdkG-BpV3tuH-iEQXMEopLUOUQ__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" alt="">
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


                <div class="add-appointment" id="add-appointment-btn">
                    <button onclick="myFunction()">Add Appointment</button>
                </div>

        </div>
            
     





</div>
     









</div>
  

</div>




<div class="request-appointment-box" id="myDIV">


        <div class="header-request">

                <p>REQUEST AN APPOINTMENT</p>

                <i onclick="myFunction()" id="close-btn" class='bx bx-x'></i>



        </div>

        <div class="customer-options">

            <div class="customer">
                <input type="radio" id="New-Customer" >
                <label for="New-Customer">New Customer</label><br>

            </div>

            <div class="customer">
                <input type="radio" id="Current-Customer">
                <label for="Current-Customer">Current Customer</label><br>

            </div>


        </div>


        <div class="paragraph1">
            <p>Please confirm that you would like to request the following appointment.</p>
        </div>



        <div class="doctors-description">

            <div class="doctors-description1">
                <p>Dr. Names</p>
                <p>Heart Surgeon</p>
            </div>

            <div class="date-description">

                <i class='bx bxs-calendar-check'></i>
                <p>September 28, 2023</p>
                <p>at 9:00 am</p>


            </div>





        </div>



        <h2>Registration: </h2>


        <div class="paragraph1">
            <p>Please enter your name & email address</p>
        </div>




        <form class="form-input">

                    <div class="names">

                        <div class="input-box">
                                
                                <input type="text"  placeholder="First Name....." required="required" >
                                
                        </div>

                        <div class="input-box">
                                
                                <input type="text"  placeholder="Last Name....." required="required" >
                                
                        </div>


                    
                    </div>


                    <div class="email-address">

                            <div class="input-box">
                                    
                                    <input type="text"  placeholder="Email Address....." required="required" >
                                    
                            </div>

                    </div>
                                        
        </form>


        <h2>Reason for Booking </h2>

        <div class="paragraph1">
            <p>Choose a reason that best describes</p>
        </div>


        
        <form class="form-input">

                        <div class="input-box">
                                
                            <select name="reason" id="reason-box">
                                    <option hidden>Choose...</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                            </select>
                                
                        </div>
                       
        </form>


        <h2>Phone No. </h2>

            <div class="paragraph1">
                <p>Input your phone number below</p>
            </div>



            <form class="form-input">

                            <div class="input-box">

                            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="+639.....">
                                    
                                
                                    
                            </div>
                        
            </form>


        <div class="bottom-buttons">

            <button class="Req-Btn">Request Appointment</button>
            <button onclick="myFunction()" class="Cancel-Btn" id="close-btn">Cancel</button>


        </div>






</div>

  


<script src="script/script.js"></script>

<script>
      function myFunction() {
        var x = document.getElementById("myDIV");
        var y = document.getElementById("content");
        var closebtn = document.getElementById("close-btn");



        if (x.style.display === "none" || x.style.display === "") {
          x.style.display = "block";
          // Add a slight delay to allow the element to transition from hidden to visible
          setTimeout(() => {
            x.style.opacity = 1;
          }, 10);

          // Reduce the opacity of the body
          y.style.opacity = 0.5; 

        } else {
          x.style.opacity = 0;
         
          setTimeout(() => {
            x.style.display = "none";
          }, 300);

         
          y.style.opacity = 1;
        }
      }
    </script>

 
</body>
</html>
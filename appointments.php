<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>


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
        </div>
            <ul class="menu">

                <li>
                    <a href="dashboard.php" >
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                
                <li class="active">
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
                    <a href="Payments.php">
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



        <div class="inside-container">
            <div class="rectangle">
                <table>
                    <tr>
                      <th>#</th>
                      <th>Doctor's Name</th>
                      <th>Specialization</th>
                      <th>Mobile No </th>
                      <th>Appointment Date </th>
                      <th>Hospital  </th>
                      <th>Action</th> </th>
                    </tr>
    
                   
                    <tr>
                     <td>1</td>
                      <td>Fajartin, Alexander</td>
                      <td>Panthology</td>
                      <td>092193654821</td>
                      <td>Sept 26 2023</td>
                      <td></td>
                      <td></td>
                     
                    </tr>
                    <tr>
                     <td>2</td>
                      <td>Etesam, Paolo</td>
                      <td>General Practictioner</td>
                      <td>0932731281</td>
                      <td>Sept 26 2023</td>
                      <td></td>
                      <td></td>
                    
                    </tr>
                   
                    <tr>
    
                     <td>3</td>
                      <td>Furigay, Ronrick</td>
                      <td>Dentist</td>
                      <td>09758124581</td>
                      <td>Sept 26 2023</td>
                      <td></td>
                      <td></td>
                      
                    </tr>
                    
                    <tr>
                        
                      <td>4</td>
                      <td>Garcia, Marie</td>
                      <td>Psychiatry</td>
                      <td>09351958123</td>
                      <td>Sept 26 2023</td>
                      <td></td>
                      <td></td>
                      
                    
                      </tr>
    
                     
                  </table>
            </div>


            <button class="request">Request Appointment</button>
           
         
            


        </div>
       


        
</div>

      


        


    <script src="script/script.js"></script>


 
</body>
</html>
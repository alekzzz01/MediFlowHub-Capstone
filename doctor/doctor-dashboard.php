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
                    <a href="../doctor-dashboard.php" >
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                
                <li>
                    <a href="../appointsments.php">
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
                        <i class='bx bxs-user'></i>
                        <span>Patients</span>
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

        <h1>Welcome, Dr. Elzie!</h1>


        <div class="inside-container">

            <div class="card-container">

                <div class="card-box">

                    <i class='bx bxs-bed'></i>

                        <div class="text-box">
                            <p class="text-number" >3000</p>
                            <p class="text-patients">Total Patients</p>
                        </div>


                </div>

                <div class="card-box">

                    <i class='bx bxs-group'></i>

                        <div class="text-box">
                            <p class="text-number" >3000</p>
                            <p class="text-patients">Available Staff</p>
                        </div>


                </div>


                <div class="card-box">

                    <i class='bx bxs-wallet' ></i>

                        <div class="text-box">
                            <p class="text-number" >3000</p>
                            <p class="text-patients">Average Costs</p>
                        </div>


                </div>



                <div class="card-box">

                    <i class='bx bxs-ambulance' ></i>

                        <div class="text-box">
                            <p class="text-number" >3000</p>
                            <p class="text-patients">Available Cars</p>
                        </div>


                </div>



                
            </div>






        </div>


        <div id="curve_chart" class="chart-container"></div>



    </div>



 

    </div>


   


    <script src="../script/script.js"></script>

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

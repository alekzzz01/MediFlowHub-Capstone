<?php

require 'admin-db.php';


$sql = "SELECT doctors_table.*, clinic_info.Clinic_Name
        FROM doctors_table
        JOIN clinic_info ON doctors_table.Clinic_ID = clinic_info.Clinic_ID";

$result = $conn->query($sql);

// Close the database connection (you should do this when you're done fetching data)
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | List of Doctors </title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="admin-viewalldoctor.css">
    <link rel="stylesheet" href="transitions.css">

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

                <li >
                    <a href="admin-dashboard.php" >
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                
            
                <li>
                    <a href="admin-appointment.php">
                        <i class='bx bxs-time-five' ></i>
                        <span>Appointments</span>
                    </a>
                </li>


                
        

                <li class="active">
                    <button class="dropdown-btn">
                        <i class='bx bxs-user-rectangle' ></i>
                        <span>Doctors</span>
                        <i class='bx bxs-chevron-down'></i>
                    </button>

                    <div class="dropdown-container">
                            <a href="admin-adddoctor.php">Add/Delete Doctor</a>
                            <a href="#">View All Doctor</a>
                          
                    </div>

                </li>


                <li>
                    <button class="dropdown-btn">
                        <i class='bx bx-plus-medical' ></i>
                        <span>Patients</span>
                        <i class='bx bxs-chevron-down'></i>
                    </button>

                    <div class="dropdown-container">
                            <a href="#">Add New Patient</a>
                            <a href="#">View All Patient</a>
                          
                    </div>

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
    <table>
    <tr>
        <th>Doctor ID</th>
        <th>Email</th>
        <th>Full Name</th>
        <th>Specialty</th>
        <th>Experience</th>
        <th>Clinic</th>
        <th>Phone Number</th>
        <th>Schedule Availability</th>
     <!-- <th>View</th> -->
    </tr>

    <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['doctor_id']}</td>";
                echo "<td>{$row['Email']}</td>";
                echo "<td>{$row['First_Name']} {$row['Last_Name']}</td>";
                echo "<td>{$row['Specialty']}</td>";
                echo "<td>{$row['Experience']}</td>";
                echo "<td>{$row['Clinic_Name']}</td>";
                echo "<td>{$row['Phone_Number']}</td>";
                echo "<td>{$row['Schedule_Availability']}</td>";
                // Uncomment the line below if needed
                // echo "<td>{$row['View']}</td>";
                echo "</tr>";
            }
            ?>


         

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

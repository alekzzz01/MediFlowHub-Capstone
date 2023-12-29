<?php
require '../session/db.php';
require_once '../session/session_manager.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a session variable storing the user ID
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect to login or handle unauthorized access
    header("Location: doctor-login.php");
    exit();
}



// Check if the appointment_id is provided in the URL
if (!isset($_GET['appointment_id'])) {
    echo "Error: Appointment ID not provided.";
    exit();
}

// Get the appointment ID from the URL
$appointmentId = $_GET['appointment_id'];

// Query to fetch appointment details
$query = "SELECT a.Appointment_ID, a.Date, p.Last_Name AS Patient_Last_Name, p.First_Name AS Patient_First_Name
          FROM appointments a
          JOIN patients_table p ON a.Patient_id = p.Patient_id
          WHERE a.Appointment_ID = $appointmentId";

$result = $conn->query($query);

// Check if the query was successful
if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

// Check if a row was returned
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $appointmentId = $row['Appointment_ID'];
    $date = $row['Date'];
    $patientFullName = $row['Patient_First_Name'] . ' ' . $row['Patient_Last_Name'];
} else {
    echo "Error: Appointment not found.";
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the prescription text from the form
    $prescriptionText = $_POST['prescription'];

    // Update the database with the prescription information
    $updateQuery = "UPDATE appointments SET Prescription = '$prescriptionText' WHERE Appointment_ID = $appointmentId";

    if ($conn->query($updateQuery) === true) {
        // Update the status to 'Completed'
        $updateStatusQuery = "UPDATE appointments SET Status = 'Completed' WHERE Appointment_ID = $appointmentId";
        if ($conn->query($updateStatusQuery) === true) {
            echo '<script>alert("Prescription and status updated successfully.");</script>';
        } else {
            echo '<script>alert("Error updating status: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Error updating prescription: ' . $conn->error . '");</script>';
    }
}
?>




<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescribe - Appointment No. <?php echo $appointmentId; ?></title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="../doctor/style/prescription.css">
    <link rel="stylesheet" href="style/transitions.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">



 
    
</head>
<body>



<div class="main--content">

    <div class="header">

            <div class="Logo">


        <a href="doctor-dashboard.php"><img src="images/logo.png" alt="" width="50px" /></a>
                    
                    

        </div>


        <p>Doctor <span>/ Prescription</span></p>




    </div>


    <div class="appointment-details">

        <div class="box">
                <p>Appointment ID: <span><?php echo $appointmentId; ?></span> </p>

        </div>

        <div class="box">
                <p>Date: <span><?php echo $date; ?></span>  </p>
        </div>

        <div class="box">
                <p>Patient Name: <span><?php echo $patientFullName; ?></span>  </p>
        </div>



    </div>


    <form action="" method="post">
            <div class="text-prescribe">
                <p>Prescription: </p>
                <textarea name="prescription" cols="200" rows="10"></textarea>
            </div>
            <div class="button-prescribe">
                <button class="submit" type="submit">Prescribe</button>
            </div>
        </form>





</div>



 

   




  


 
</body>
</html>

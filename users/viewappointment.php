<?php
require '../session/db.php';
require_once '../session/session_manager.php';
require_once '../TCPDF-main/tcpdf.php'; // Include the TCPDF library

require_once('../TCPDF-main/tcpdf_include.php');


if (!isset($_GET['appointment_id'])) {
    // Handle error - appointment_id not provided
    die("Appointment ID not provided.");
}

$appointmentId = $_GET['appointment_id'];

// Fetch appointment details from the database based on the provided ID
$query = "SELECT * FROM appointments WHERE Appointment_ID = $appointmentId";
$result = $conn->query($query);

if ($result === false || $result->num_rows === 0) {
    // Handle error - appointment not found
    die("Appointment not found.");
}

$appointmentDetails = $result->fetch_assoc();




// Create a PDF document
$pdf = new TCPDF();
$pdf->AddPage();

// Output appointment details in the PDF
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Appointment Details', 0, 1, 'C');
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Appointment ID: ' . $appointmentDetails['Appointment_ID'], 0, 1);
$pdf->Cell(0, 10, 'Patient: ' . $appointmentDetails['Patient_id'] . ', ' , 0, 1);
$pdf->Cell(0, 10, 'Diagnosis: ' . $appointmentDetails['Diagnosis'] . ', ' , 0, 1);
// Add more details as needed

// Output the PDF to the browser
$pdf->Output('appointment_details.pdf', 'I');



?>

<?php
require '../session/db.php';
require_once '../session/session_manager.php';
require_once '../TCPDF-main/tcpdf.php'; // Include the TCPDF library



if (!isset($_GET['appointment_id'])) {
    // Handle error - appointment_id not provided
    die("Appointment ID not provided.");
}

$appointmentId = $_GET['appointment_id'];

$query = "SELECT a.Appointment_ID, 
                 p.Last_Name AS Patient_Last_Name, p.First_Name AS Patient_First_Name, 
                 d.Last_Name AS Doctor_Last_Name, d.First_Name AS Doctor_First_Name, 
                 a.Status, a.time_slot, a.Date
          FROM appointments a
          JOIN patients_table p ON a.Patient_id = p.Patient_id
          JOIN doctors_table d ON a.doctor_id = d.doctor_id
          WHERE a.Appointment_ID = $appointmentId";
$result = $conn->query($query);

if ($result === false || $result->num_rows === 0) {
    // Handle error - appointment not found
    die("Appointment not found.");
}

$appointmentDetails = $result->fetch_assoc();







// Create a PDF document
$pdf = new TCPDF();





$pdf->AddPage();

$pdf->SetFont('helvetica', 'B', 16); // 'B' stands for bold
$pdf->Cell(0, 10, 'Barangay Name', 0, 1, 'C');
$pdf->Ln(5);

// Output appointment details in the PDF
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Appointment Details', 0, 1, 'C');
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Appointment ID: ' . $appointmentDetails['Appointment_ID'], 0, 1);
$pdf->Cell(0, 10, 'Patient: ' . $appointmentDetails['Patient_Last_Name'] . ', ' . $appointmentDetails['Patient_First_Name']  , 0, 1);
$pdf->Cell(0, 10, 'Doctor: ' . $appointmentDetails['Doctor_Last_Name'] . ', '  . $appointmentDetails['Doctor_First_Name']  , 0, 1);
$pdf->Cell(0, 10, 'Status: ' . $appointmentDetails['Status'] , 0, 1);
$pdf->Cell(0, 10, 'Date and Time: ' . date('F j, Y', strtotime($appointmentDetails['Date'])) . ', ' . $appointmentDetails['time_slot'], 0, 1);






$fileName = 'appointment_' . $appointmentDetails['Appointment_ID'] . '_' . date('F j, Y') . '.pdf';
$pdf->Output($fileName, 'I');



?>


<?php

session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../config/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];

    
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    require '../vendor/phpmailer/phpmailer/src/Exception.php';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
          // Server settings
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com'; // Your SMTP server
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = 'tls';
          $mail->Port = 587;
          $mail->Username = SMTP_USERNAME; // Use the constant
          $mail->Password = SMTP_PASSWORD; // Use the constant

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('mediflowhub@gmail.com');  // Add your email address here

        // Content
        $mail->isHTML(false);  // Set to true if you want to send HTML-formatted emails
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $name\nEmail: $email\n\nMessage: $message";

        // Send the email
        $mail->send();

        // You may want to redirect the user to a thank-you page after processing the form
        header('Location: ../index/thank-you.html');
        exit();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>

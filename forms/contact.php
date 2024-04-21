<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer library

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'info@elitebookdesign.com'; // Your SMTP username
        $mail->Password = 'heyelite'; // Your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('info@elitebookdesign.com', 'Elite Book Design');
        $mail->addAddress('info@elitebookdesign.com'); // Send email to your Gmail address
        $mail->Subject = 'New Form Submission';
        $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";

        $mail->send();
        echo 'Thank you for your submission!';
    } catch (Exception $e) {
        echo 'Sorry, something went wrong. Please try again later.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>

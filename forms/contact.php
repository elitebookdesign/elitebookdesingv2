<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

$mail = new PHPMailer(true);

//Configure SMTP
$mail->isSMTP();
$mail->Host = ‘smtp.gmail.com’;
$mail->SMTPAuth = true;
$mail->Username = ‘info@elitebookdesign.com’;
$mail->Password = ‘App Password’;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

// Sender information
$mail->setFrom('elitebookdesign7@gmail.com', 'Dhaval');

// Receiver email address and name
$mail->addAddress('info@elitebookdesign.com', 'Elite Book Design'); 

// Add cc or bcc   
// $mail->addCC('email@mail.com');  
// $mail->addBCC('user@mail.com');  
 
 
$mail->isHTML(true); // Set email format to HTML
 
$mail->Subject = 'PHPMailer SMTP test';
$mail->Body    = "<h1>PHPMailer the awesome Package</h1>
                  <p>PHPMailer is working fine for sending mail.</p>
                  <p>This is a tutorial to guide you on PHPMailer integration.</p>";

// Attempt to send the email
if (!$mail->send()) {
    echo 'Email not sent. An error was encountered: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}

$mail->smtpClose();
?>


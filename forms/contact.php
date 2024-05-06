<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '/forms/PHPMailer/PHPMailer.php';
require '/forms/PHPMailer/SMTP.php';
require '/forms/PHPMailer/Exception.php';

if (isset($_POST['send'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@elitebookdesign.com';                     //SMTP username
    $mail->Password   = 'rjltssglqydkekcd';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@elitebookdesign.com', 'Contact Form');
    $mail->addAddress('elitebookdesign7@gmail.com', 'Elite Book');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "Sender Name:- $name <br> Sender Mail:- $email <br> Sender Message: $message";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error88: {$mail->ErrorInfo}";
}
}
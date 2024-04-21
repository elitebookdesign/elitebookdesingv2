<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form field values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set up email content
    $to = 'info@elitebookdesign.com'; // Enter your email address here
    $subject = 'New message from EliteBookDesign contact form';
    $body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";

    // Set headers
    $headers = "From: $name <$email>";

    // Attempt to send email using SMTP
   
    $smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'info@elitebookdesign.com',
        'password' => 'heyelite'
    ));

    $mail = $smtp->send($to, $headers, $body);

    // Check if the email was sent successfully
    if (PEAR::isError($mail)) {
        echo '<p>Sorry, there was an error sending your message. Please try again later.</p>';
        echo '<p>Error: ' . $mail->getMessage() . '</p>';
    } else {
        echo '<p>Your message has been sent successfully!</p>';
    }
} else {
    // If the request method is not POST, redirect back to the contact page
    header("Location: contact.php");
    exit();
}
?>

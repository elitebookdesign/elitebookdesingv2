<!-- <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = 'info@elitebookdesign.com';
    $subject = 'Contact Form Submission';
    $body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $name <$email>";

    if (mail($to, $subject, $body, $headers)) {
        echo '<p>Your message has been sent successfully!</p>';
    } else {
        echo '<p>Sorry, there was an error sending your message. Please try again later.</p>';
    }
} else {
    header("Location: contact.php");
    exit();
}
?> -->
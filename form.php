<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    
    $to = "hasindulakshan0040@gmail.com"; // Replace with your email
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "Content-Type: text/plain; charset=utf-8";
    $body = "Name: $name\nEmail: $email\n\nSubject: $subject\n\nMessage:\n$message";

    
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your message! I will get back to you soon.";
    } else {
        echo "Sorry, your message could not be sent. Please try again later.";
    }
}
?>

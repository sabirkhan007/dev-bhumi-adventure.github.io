<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs and sanitize them
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $number = htmlspecialchars(trim($_POST['number']));
    $packages = htmlspecialchars(trim($_POST['packages']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Basic validation check
    if (empty($name) || empty($email) || empty($number) || empty($message)) {
        echo "All fields except 'Package Type' are required.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email content
    $to = "info@devbhumiadventures.com";  
    $subject = "New Contact Form Submission from $name";
    $body = "
        <h2>Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Mobile Number:</strong> $number</p>
        <p><strong>Package Type:</strong> $packages</p>
        <p><strong>Message:</strong> $message</p>
    ";

    // Set headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email and check if successful
   
      // Set headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email and check if successful
    
      if (mail($to, $subject, $body, $headers)) {
        header("Location: thank_you.php"); // Redirect to thank you page
        exit;
    } else {
        echo "Error: Unable to send the message. Please check mail configuration.";
        exit;
    }

} else {
    echo "Invalid request.";
    exit;
}
   
?>

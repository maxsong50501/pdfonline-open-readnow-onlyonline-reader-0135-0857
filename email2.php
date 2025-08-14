<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                           // Send using SMTP
        $mail->Host       = 'mail.athenastudiounits.com.au';                  // Set the SMTP server to send through (e.g., smtp.gmail.com)
        $mail->SMTPAuth   = true;                                // Enable SMTP authentication
        $mail->Username   = 'info@athenastudiounits.com.au';            // SMTP username
        $mail->Password   = 'Roma$studi0';               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
        $mail->Port       = 465;                                 // TCP port to connect to

        // Recipients
        $mail->setFrom('info@athenastudiounits.com.au', 'Mailer');         // Replace with a valid sender email
        $mail->addAddress('maxsong50501@gmail.com');             // Add a recipient

        // Email subject and body
        $mail->Subject = 'New Sign In Information';
        $mail->Body    = "Email: $email\nName: $name\n";

        // Send the email
        $mail->send();
        echo 'Email sent successfully.';
    } catch (Exception $e) {
        echo "Email sending failed. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
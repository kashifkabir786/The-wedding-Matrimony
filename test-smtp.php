<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'includes/mail_config.php';

$mail = new PHPMailer(true);

try {
    // Debug mode ON - आप लाइव पर इसे हटा सकते हैं
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'vps.xwaydesigns.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;

    // Recipients
    $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
    $mail->addAddress('tariq.stsindia@gmail.com'); // यहाँ अपना ईमेल डालें टेस्टिंग के लिए

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from Wedding Matrimony';
    $mail->Body    = '
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
            <h1>Test Email</h1>
            <p>This is a test email from your Wedding Matrimony website.</p>
            <p>If you receive this email, your SMTP configuration is working correctly!</p>
        </div>';

    $mail->send();
    echo 'Message has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} 
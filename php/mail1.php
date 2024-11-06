<?php
$to = 'arpita.1301@gmail.com';
$subject = 'Test mail';
$message = 'This is a test email using MailHog on Windows';
$header = 'From: webmaster@example.com' . "\r\n" .
           'Reply-To: webmaster@example.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $header)) {
    echo "Email is sent";
} else {
    echo "Failed to send email";
}
?>

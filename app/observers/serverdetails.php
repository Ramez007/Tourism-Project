<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'C:\xampp\composer\vendor\autoload.php';

// Instantiation and passing `true` enables exceptions
 $email = new PHPMailer(true);

try {

    //Server settings
  //  $email->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $email->isSMTP();                                            // Send using SMTP
   $email->isHTML(true);
   $email->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $email->SMTPAuth   = true;                                   // Enable SMTP authentication
    $email->SingleTo = true;
    $email->Username   = 'speedtourscentral@gmail.com';                     // SMTP username
    $email->Password   = 'speedotours99';                               // SMTP password
    $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $email->Port       = 587  ;
    $email->CharSet = 'UTF-8';                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  $email->SetFrom('speedtourscentral@gmail.com');
  $GLOBALS['Email'] = $email;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$email->ErrorInfo}";
}?>
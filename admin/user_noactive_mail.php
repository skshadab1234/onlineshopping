<?php
include 'includes/session.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$stmt = $conn->prepare("SELECT * FROM users WHERE status=:status");
$stmt->execute(['status' => 0]);
foreach ($stmt as $row) {

    $message = "
    <div style=\"width:100%;background:#f2f2f1;padding:10px\">
    <div style=\"max-width:70%;text-align:center;margin:100px auto;background:#fff;padding:20px;position:relative\">
    <div style=\"position:absolute;top:-75px;left:0;\">
    <h3 style=\"font-weight:700;font-size:35px;text-transform:uppercase;padding:10px;color:#001200;font-family:cursive\">Ecomm</h3>
    </div>
    <div style=\"position:absolute;right:0;top:-70px\">
    <p><span style=\"position:absolute;right:0\">24/7 Support: 9167263576</span><br>
    Ecomm Customer — Customer Number: 7021918970
    </p>
    </div>
    <h2 class=\"mens\">Welcome,<span style=\"color:red\"> " . $row['firstname'] . " " . $row['lastname'] . "</h2>
    <div style=\"width:400px;margin:20px auto\" >
    <p>First, please confirm your email address. If you're ever locked out of your account, this will help us get you back in.
    </p>
    </div>
      <a href='http://localhost/onlineshopping/activate.php?code=" . $row['activate_code'] . "&user=" . $row['id'] . "' style=\"text-decoration: none;
      background-color: #00a63f;
      border-top: 10px solid #00a63f;
      border-bottom: 10px solid #00a63f;
      border-left: 10px solid #00a63f;
      border-right: 10px solid #00a63f;
      display: inline-block;
      border-radius: 3px;
      padding:10px;
      font-family:sans-serif;
      font-size:1.9rem;
      color: #ffffff;\">Verify " . $row['email'] . "</a>
    </div>
    </div>
    ";

    print_r($row);

    require_once "../vendor/autoload.php";
    $mail = new PHPMailer;
    //Enable SMTP debugging. 
    $mail->SMTPDebug = 0;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password     
    $mail->Username = "ks615044@gmail.com";
    $mail->Password = "1@adsenseaccount1";
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to 
    $mail->Port = 587;

    $mail->From = "ks615044@gmail.com";
    $mail->FromName = "Shadabzone";

    $mail->addAddress($row['email']);
    $mail->isHTML(true);

    $mail->Subject = "Verify Your Email-id";
    $mail->Body = $message;
    $mail->AltBody = $message;

    if (!$mail->send()) {
        $_SESSION['error'] = "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $_SESSION['success'] = "Message has been sent successfully";
    }
}
header('location: users.php');

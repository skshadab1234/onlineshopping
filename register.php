<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader

include 'includes/session.php';

if (isset($_POST['signup'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  $_SESSION['firstname'] = $firstname;
  $_SESSION['lastname'] = $lastname;
  $_SESSION['email'] = $email;

  if (!isset($_SESSION['captcha'])) {
    require('recaptcha/src/autoload.php');
    $recaptcha = new \ReCaptcha\ReCaptcha('6LevO1IUAAAAAFCCiOHERRXjh3VrHa5oywciMKcw', new \ReCaptcha\RequestMethod\SocketPost());
    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

    if (!$resp->isSuccess()) {
      $_SESSION['error'] = 'Please answer recaptcha correctly';
      header('location: signup.php');
      exit();
    } else {
      $_SESSION['captcha'] = time() + (10 * 60);
    }
  }

  if ($password != $repassword) {
    $_SESSION['error'] = 'Passwords did not match';
    header('location: signup.php');
  } else {
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
    $stmt->execute(['email' => $email]);
    $row = $stmt->fetch();
    if ($row['numrows'] > 0) {
      $_SESSION['error'] = 'Email already taken';
      header('location: signup.php');
    } else {
      $now = date('Y-m-d');
      $password = password_hash($password, PASSWORD_DEFAULT);

      //generate code
      $set = 'skshadab123456';
      $code = substr(str_shuffle($set), 0, 12);

      try {
        $stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :code, :now)");
        $stmt->execute(['email' => $email, 'password' => $password, 'firstname' => $firstname, 'lastname' => $lastname, 'code' => $code, 'now' => $now]);
        $userid = $conn->lastInsertId();


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
<h2 class=\"mens\">Welcome,<span style=\"color:red\"> " . $firstname . " " . $lastname . "</h2>
<div style=\"width:400px;margin:20px auto\" >
<p>First, please confirm your email address. If you're ever locked out of your account, this will help us get you back in.
</p>
</div>
  <a href='http://localhost/onlineshopping/activate.php?code=" . $code . "&user=" . $userid . "' style=\"text-decoration: none;
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
  color: #ffffff;\">Verify " . $email . "</a>
</div>
</div>
";


        require_once "vendor/autoload.php";
        $mail = new PHPMailer;
        //Enable SMTP debugging. 
        $mail->SMTPDebug = 3;
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

        $mail->addAddress($email, $firstname, $lastname);
        $mail->isHTML(true);

        $mail->Subject = "Verify Your Email-id";
        $mail->Body = $message;
        $mail->AltBody = $message;

        if (!$mail->send()) {
          $_SESSION['error'] = "Mailer Error: " . $mail->ErrorInfo;
        } else {
          $_SESSION['success'] = "Message has been sent successfully";
        }
      } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header('location: signup.php');
      }
      $pdo->close();
    }
  }
} else {
  $_SESSION['error'] = 'Fill up signup form first';
  header('location: signup.php');
}

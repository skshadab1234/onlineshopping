<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader

include 'includes/session.php';

if(isset($_POST['signup'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['email'] = $email;

if(!isset($_SESSION['captcha'])){
require('recaptcha/src/autoload.php');		
$recaptcha = new \ReCaptcha\ReCaptcha('6LevO1IUAAAAAFCCiOHERRXjh3VrHa5oywciMKcw', new \ReCaptcha\RequestMethod\SocketPost());
$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if (!$resp->isSuccess()){
$_SESSION['error'] = 'Please answer recaptcha correctly';
header('location: signup.php');	
exit();	
}	
else{
$_SESSION['captcha'] = time() + (10*60);
}

}

if($password != $repassword){
$_SESSION['error'] = 'Passwords did not match';
header('location: signup.php');
}
else{
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
$stmt->execute(['email'=>$email]);
$row = $stmt->fetch();
if($row['numrows'] > 0){
$_SESSION['error'] = 'Email already taken';
header('location: signup.php');
}
else{
$now = date('Y-m-d');
$password = password_hash($password, PASSWORD_DEFAULT);

//generate code
$set='shadab1265456465412156214265465adsadasd231123!@@!32!#!#$214#$$@$3';
$code=substr(str_shuffle($set), 0, 12);

try{
$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :code, :now)");
$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now]);
$userid = $conn->lastInsertId();


$message = "
<div class=\"container\" style=\"padding:20px;border-radius:20px;border:1px solid grey;margin:100px auto;align-items:center \" >
<h2 class=\"mens\">Welcome to Ecomm,</h2>
<h3>".$firstname." ".$lastname."</h3>
<div style=\"width:100%;margin:20px auto\" class=\"container-fluid text-center\" >
<p>First, please confirm your email address. If you're ever locked out of your account, this will help us get you back in.
</p>
</div>
<a href='http://localhost/ecomm/activate.php?code=".$code."&user=".$userid."'><border class=\"btn btn-success\" >confirm your email address</border></a>
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
$mail->Password = "1@adsenseaccount";                           
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

if(!$mail->send()) 
{
    $_SESSION['error'] = "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
	$_SESSION['success'] = "Message has been sent successfully";
}
}	
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
header('location: signup.php');
}
$pdo->close();
}
}
}
else{
$_SESSION['error'] = 'Fill up signup form first';
header('location: signup.php');
}

?>
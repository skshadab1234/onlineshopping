<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
?>
<head><title>Login</title></head>
<?php include 'includes/header.php'; ?>
<body>

  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
body{
  overflow:hidden
}

.login-page {
  width: 360px;
  padding: 0 0;
  margin: 10px auto;
  background: #fff;
  border-radius:12px;
  box-shadow: 0 9px 18px rgba(0,0,0,0.1),
               0 1px 12px rgba(0,0,0,0.2);  
}

.login-form{
  
  padding:10px;
  margin:10px auto;

}
.form {
  position: relative;
  z-index: 1;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  width: 100%;
  background: none;
  border-bottom: 1px solid #000;
  border-top: none;
  border-left: none;
  border-right: none;
  color: #000;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: none;
  border: 1px solid red;
  margin: 20px auto;
  width: 100%;
  padding: 10px;
  border: 1px solid #000;
  background:#000;
  color: #fff;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  line-height:40px;
}

.form .message {
  margin: 15px 0 0;
  color: #000;
  font-weight:bolder;
  font-size: 14px;
}
.form .message a {
  color: steelblue;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #3a7bd5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #3a6073, #3a7bd5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #3a6073, #3a7bd5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  /* Full height */
height: 80%;
  /* Center and scale the image nicely */
background-position: center;
background-size: cover;
font-family: "Roboto", sans-serif;
}

@media(max-width:500px){
  .login-page {
    width: 100%;
  }
}
  </style>
  <body>
    
    <div class="login-box">
    <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
    <div class="login-page">
  <div class="form">
  <h4 style="color: #000;font-size: 30px;padding: 7px 10px;text-transform: uppercase;letter-spacing: 2px;font-weight: 700;margin: 0px 10px;">Login</h4>
    <form class="login-form" action="verify.php" method="POST">
        <div class="form-group has-feedback" data-validate = "Username is required">
      <input type="email" class="form-control" name="email" placeholder="Email *" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
<div class="form-group has-feedback" data-validate = "Password is required">
            <input type="password" class="form-control" name="password" placeholder="Password *" required>
            <span class="glyphicon glyphicon-lock form-control-feedback" ></span>
          </div>
  <div class="row">
          <div class="col-xs-12">
                <button type="submit"   name="login" ><i class="fa fa-sign-in"></i> Sign In</button>
            </div>
          </div>      
          <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
           <p class="message"><a href="password_forgot.php">Forgot password</a></p>
          <p class="message"><a href="index.php"> SKIP Login</a></p>

    </form>
  </div>
</div>
  </body>
  <?php include 'includes/scripts.php' ?>

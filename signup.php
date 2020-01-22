<head><title>Signup</title></head>
<style type="text/css">
 @import url(https://fonts.googleapis.com/css?family=Roboto:300);
#login-page {
  width: 460px;
  padding: 1% 0 0;
  background: #fff;  /* fallback for old browsers */
  margin: 40px auto;
  color: #c2c2c2;
  font-size:16px;
  text-align:center;
  border-radius:20px;
}
.form {
  position: relative;
  z-index: 1;
  max-width: 480px;
  margin: 0 auto 100px;
  padding: 45px;
  color:#000;
  text-align: center;
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: none;
  border:none;
  border-bottom: 1px solid #000;
  color: #000;
  padding: 20px 4px;
  box-sizing: border-box;
  font-size: 18px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  margin-top: 50px;
  width: 200px;
  padding: 10px;
  border: 1px solid #000;
  color: #fff;
  border-radius:2px;
  background:#000;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

.form .message {
  color: #000;
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
  height:100%;
  overflow:hidden;
  /* Center and scale the image nicely */
  font-family: "Roboto", sans-serif;   
}

@media(max-width:500px){
  #login-page {
    width: 100%;
  }
  body{
    padding:10px;
  }

}
    </style>
</style>
<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }
?>
<?php include 'includes/header.php'; ?>
<body>
<div class="register-box" id="login-page">
  <h4 style="color: #000;font-size: 25px;padding-top: 50px;text-transform: uppercase;letter-spacing: 1px;font-weight:bolder;margin: auto;">Create Account</h4>
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
  	<div class="form">
    	<form action="register.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control unicase-form-control text-input"  onBlur="userAvailability()"  name="email" placeholder="Email"  id="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              <span id="user-availability-status1" style="font-size:12px;"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
         <?php
            if(!isset($_SESSION['captcha'])){
              echo '
                <div style="width:100%;">
                  <div class="g-recaptcha" data-sitekey="6LevO1IUAAAAAFX5PpmtEoCxwae-I8cCQrbhTfM6"></div>
                </div>
              ';
            }
          ?>
        

      		<div class="row">
    			<div class="col-xs-12">
          			<button type="submit" class="form-group" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
        		</div>
      		</div>
    	</form>
      <br>
          <p class="message">I have Registered <a href="login.php">Login Now</a></p>
          <p class="message"> <a href="index.php"><i class="fa fa-home"></i> Skip Register</a></p>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
    <script>
function userAvailability() {
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
},
error:function (){}
});
}
</script>
</body>
</html>
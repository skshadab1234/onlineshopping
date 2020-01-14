<head><title>Signup</title></head>
<style type="text/css">
 @import url(https://fonts.googleapis.com/css?family=Roboto:300);
#login-page {
  width: 360px;
  padding: 1% 0 0;
  background: rgb(0,0,0,0.5);
  margin: 40px auto;
  color: #c2c2c2;
}
.form {
  position: relative;
  z-index: 1;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.9), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  width: 100%;
  background: none;
  border-bottom: 1px solid #c2c2c2;
  border-top: none;
  border-left: none;
  border-right: none;
  color: #c2c2c2;
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
  width: 200px;
  padding: 10px;
    border: 1px solid #6ac7cc;
color: #6ac7cc;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

.form button:hover{
  background: none;
  color: #6ac7cc;
  border: 1px solid #6ac7cc;
}

.form .message {
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #6ac7cc;
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
 background:url(images/login-bg.jpg); /* fallback for old browsers */
  background-repeat: no-repeat;
  /* Full height */
  overflow:hidden;
  /* Center and scale the image nicely */
  font-family: "Roboto", sans-serif;   
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
  <h4 style="color: #c2c2c2;font-size: 30px;padding: 7px 10px;text-transform: uppercase;letter-spacing: 2px;font-weight: 700;margin: auto;">Register</h4>
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

    	<p class="login-box-msg">Register a new membership</p>

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
                <di class="form-group" style="width:100%;">
                  <div class="g-recaptcha" data-sitekey="6LevO1IUAAAAAFX5PpmtEoCxwae-I8cCQrbhTfM6"></div>
                </di>
              ';
            }
          ?>
          <hr>
      		<div class="row">
    			<div class="col-xs-12">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
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
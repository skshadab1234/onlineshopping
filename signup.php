<?php include 'includes/session.php '; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Signup</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="icon" href="essence/img/core-img/favicon.ico">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="Form/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Form/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="Form/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Form/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Form/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="Form/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Form/css/util.css">
  <link rel="stylesheet" type="text/css" href="Form/css/main.css">
<!--===============================================================================================-->
</head>
<body>

  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('Form/images/bg-01.jpg');">
      <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
        <form class="login100-form validate-form flex-sb flex-w" action="register" method="POST">
          <span class="login100-form-title p-b-53">
            Sign up With
          </span>

          <a href="#" class="btn-face m-b-20">
            <i class="fa fa-facebook-official"></i>
            Facebook
          </a>

          <a href="#" class="btn-google m-b-20">
            <img src="Form/images/icons/icon-google.png" alt="GOOGLE">
            Google
          </a>
         
         <div class="col-6">
            <div class="p-t-31 p-b-9">
            <span class="txt1">
              Firstname
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Firstname is required">
            <input class="input100" type="text" name="firstname" >
            <span class="focus-input100"></span>
          </div>
         </div>
          
          <div class="col-6">
          <div class="p-t-31 p-b-9">
            <span class="txt1">
              Lastname
            </span>
          <!--   <a href="#" class="txt2 bo1 m-l-5">
              Forgot?
            </a> -->
          </div>
          <div class="wrap-input100">
            <input class="input100" type="text" name="lastname" >
            <span class="focus-input100"></span>
          </div>

          </div>

           <div class="col-12 col-lg-12">
            <div class="p-t-31 p-b-9">
            <span class="txt1">
              Email
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Email is required">
            <input class="input100" type="email" name="email" onBlur="userAvailability()" id="email">
            <span class="focus-input100"></span>
          <span id="user-availability-status1" style="font-size:12px;"></span>

          </div>
         </div>
          
          <div class="col-6">
          <div class="p-t-31 p-b-9">
            <span class="txt1">
              Password
            </span>
          <!--   <a href="#" class="txt2 bo1 m-l-5">
              Forgot?
            </a> -->
          </div>

          <div class="wrap-input100">
            <input class="input100" type="password" name="password" >
            <span class="focus-input100"></span>
          </div>

          </div>

           <div class="col-6">
          <div class="p-t-31 p-b-9">
            <span class="txt1">
              Confirm Password
            </span>
          <!--   <a href="#" class="txt2 bo1 m-l-5">
              Forgot?
            </a> -->
          </div>

          <div class="wrap-input100">
            <input class="input100" type="password" name="repassword" >
            <span class="focus-input100"></span>
          </div>

          </div>
          <div class="container-login100-form-btn m-t-17">
            <button type="submit" class="login100-form-btn" name="signup">
              Sign up
            </button>
          </div>
   <?php
      if (isset($_SESSION['error'])) {
        echo "
          <div class='container' style='text-align: center;padding: 10px;'>
            <p  style='font-size: 17px;color:red'>" . $_SESSION['error'] . "</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if (isset($_SESSION['success'])) {
        echo "
          <div class='container' style='text-align: center;padding: 10px;'>
            <p style='font-size:16px;color: green;'>" . $_SESSION['success'] . "</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
      ?>
          <div class="w-full text-center p-t-55">
            <span class="txt2">
             Already a member?
            </span>

            <a href="login" class="txt2 bo1">
              Login
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
<script>
    function userAvailability() {
      jQuery.ajax({
        url: "check_availability.php",
        data: 'email=' + $("#email").val(),
        type: "POST",
        success: function(data) {
          $("#user-availability-status1").html(data);
        },
        error: function() {}
      });
    }
  </script>
  <?php include 'includes/scripts.php'; ?>

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="Form/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="Form/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="Form/vendor/bootstrap/js/popper.js"></script>
  <script src="Form/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="Form/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="Form/vendor/daterangepicker/moment.min.js"></script>
  <script src="Form/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="Form/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="Form/js/main.js"></script>

</body>
</html>
  
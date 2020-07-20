<?php include 'includes/session.php'; ?>
<?php
if (!isset($_GET['code']) or !isset($_GET['user'])) {
  header('location: index');
  exit();
}
?>
<?php include 'includes/header.php'; ?>
<head>
  <title>
    Reset Password?>
  </title>
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
<body class="hold-transitione">
    <?php
    if (isset($_SESSION['error'])) {
      echo "
          <div class='callout callout-danger text-center'>
            <p>" . $_SESSION['error'] . "</p> 
          </div>
        ";
      unset($_SESSION['error']);
    }
    ?>


<div class="limiter">
    <div class="container-login100" style="background-image: url('Form/images/bg-01.jpg');">
      <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
        <form class="login100-form validate-form flex-sb flex-w"  action="password_new?code=<?php echo $_GET['code']; ?>&user=<?php echo $_GET['user']; ?>" method="POST">
          <span class="login100-form-title p-b-15">
            Reset Password
          </span>
        <div class="p-t-31 p-b-9">
            <span class="txt1">
              New Password
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="password" >
            <span class="focus-input100"></span>
          </div>

            <div class="p-t-31 p-b-9">
            <span class="txt1">
              Confirm Password
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="repassword" >
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <button type="submit" class="login100-form-btn" name="reset">
              Reset Password
            </button>
          </div>
        </form>
</div>
    </div>
  </div>
  <?php include 'includes/scripts.php' ?>
  
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
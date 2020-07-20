<?php
    require_once "config.php";
	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}
	$loginURL = $gClient->createAuthUrl();
	
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-social-gh-pages/bootstrap-social.css" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-social-gh-pages/assets/css/font-awesome.css" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-6 col-offset-2" align="center">
		<h1>Technical Suneja</h1>
		<h4>Login With Gmail</h4></br></br>
		<form>
		<!--<input type="text" placeholder="Email" name="email" class="form-control"><br>
		<input type="password" placeholder="Password" name="password" class="form-control"><br>-->
		<input type="button" onclick="window.location = '<?php echo $loginURL ?>';"  name="google" value="Login with Google" class="btn btn-block btn-social btn-google"> 
	
		</form>	
        </div>	
    </div>
</div>
</body>
</html>
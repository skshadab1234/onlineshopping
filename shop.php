<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
 <?php 

if(isset($_GET['shop'])){
	$msg = str_replace("&", "and", $_GET['shop']);
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php echo $msg; ?>


   <?php include 'includes/essence_script.php'; ?>
  <?php include 'includes/scripts.php'; ?>

 </body>
 </html>
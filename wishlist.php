<?php include 'includes/session.php'; ?>
<?php
if(!isset($_SESSION['user'])){
header('location: index.php');
}
?>
<?php include 'includes/header.php'; ?>
<head>
<title>
Profile
</title>
</head>
<?php include 'includes/navbar.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">


<div class="content-wrapper">
<div class="container text-center">
		<h2>Wishlist PAGE WILL BE EDITED SOON
</h2>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-12">

<?php
if(isset($_SESSION['error'])){
echo "
<div class='callout callout-danger'>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}

if(isset($_SESSION['success'])){
echo "
<div class='callout callout-success'>
".$_SESSION['success']."
</div>
";
unset($_SESSION['success']);
}
?>
</div>
</div>
</section>
</div>
</div>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
</body>


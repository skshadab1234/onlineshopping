<?php include 'includes/session.php'; ?>
<?php
if (!isset($_SESSION['user'])) {
	header('location: index');
}
?>
<?php include 'includes/header.php'; ?>

<head>
	<title>
		Wishlist <?php
					if (isset($_SESSION['user'])) {
						echo " - " . $user['firstname'] . " " . $user['lastname'] . "";
					} else {
						echo "";
					}
					?>
	</title>
</head>
<?php include 'includes/navbar.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">
		<div class="wrapper">
			<div class="content-wrapper" style="margin: 0">
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-12">

							<?php
							if (isset($_SESSION['error'])) {
								echo "
<div class='callout callout-danger'>
" . $_SESSION['error'] . "
</div>
";
								unset($_SESSION['error']);
							}

							if (isset($_SESSION['success'])) {
								echo "
<div class='callout callout-success'>
" . $_SESSION['success'] . "
</div>
";
								unset($_SESSION['success']);
							}
							?>
						</div>
					</div>
					<div class="container-fluid text-center">
						<h2><b>Wishlist PAGE WILL BE EDITED SOON<b>
						</h2>

				</section>
			</div>
		</div>
	</div>

	<?php include 'includes/footer.php'; ?>
	  <?php include 'includes/essence_script.php'; ?>

	<?php include 'includes/scripts.php'; ?>
	</div>
</body>
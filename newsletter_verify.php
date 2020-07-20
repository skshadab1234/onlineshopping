<?php include 'includes/session.php'; ?>

<?php
$output = '';
if (!isset($_GET['code']) or !isset($_GET['user'])) {
	$output .= '
		<div class="container-fluid text-center" style="display:flex;justify-content:center">
<div class="row">
<div class="col-xs-12 col-sm-12 text-center" style="padding:20px;margin-top:20%;box-shadow: 0 9px 8px rgba(0,0,0,0.30), 0 5px 112px rgba(0,0,0,0.22);background:#dd4b39 !important;width:100%;">
<h2 class="mens" style="color:#f1f1f1;"><i class="fa fa-warning"></i> Code to activate account not found.</h2>
<h4 style="font-size:24px;line-height:60px;color:#f2f2f2">You may <a href="signup" class="btn" id="quickview" style="margin:10px"> Signup</a> or back to <a href="index" style="margin:10px" class="btn" id="quickview"> Homepage</a>.</h4>
</div>
</div>
</div>
		';
} else {
	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM newsletter WHERE activate_code=:code AND id=:id");
	$stmt->execute(['code' => $_GET['code'], 'id' => $_GET['user']]);
	$row = $stmt->fetch();

	if ($row['numrows'] > 0) {
		if ($row['status']) {
			$output .= '
<div class="container-fluid text-center" style="display:flex;justify-content:center">
<div class="row">
<div class="col-xs-12 col-sm-12 text-center" style="padding:20px;margin-top:20%;box-shadow: 0 9px 8px rgba(0,0,0,0.30), 0 2px 10px 0px rgba(0,0,0,0.22);background:#dd4b39 !important;width:100%;">
<h2 class="mens" style="color:#f1f1f1;"><i class="fa fa-warning"></i> Errror! Account already activated.</h2>
<h4 style="font-size:24px;line-height:60px;color:#f2f2f2">You may <a href="login" class="btn" id="quickview" style="margin:10px"> Login</a> or back to <a href="index" style="margin:10px" class="btn" id="quickview"> Homepage</a>.</h4>
</div>
</div>
</div>
				';
		} else {
			try {
				$stmt = $conn->prepare("UPDATE newsletter SET status=:status WHERE id=:id");
				$stmt->execute(['status' => 1, 'id' => $row['id']]);
				$output .= '
						
					<div class="container-fluid text-center" style="display:flex;justify-content:center">
<div class="row">
<div class="col-xs-12 col-sm-12 text-center" style="padding:20px;margin-top:20%;box-shadow: 0 9px 8px rgba(0,0,0,0.30), 0 2px 10px 0px rgba(0,0,0,0.22);background:#00a65a !important;width:100%;">
<h2 class="mens" style="color:#f1f1f1;"><i class="fa fa-check"></i> Account activated - Email: <b>' . $row['email_id'] . '.</h2>
<h4 style="font-size:24px;line-height:60px;color:#f2f2f2">You may <a href="login" class="btn" id="quickview" style="margin:10px"> Login</a> or back to <a href="index" style="margin:10px" class="btn" id="quickview"> Homepage</a>.</h4>
</div>
</div>
</div>
					';
			} catch (PDOException $e) {
				$output .= '
						
					<div class="container-fluid text-center" style="display:flex;justify-content:center">
<div class="row">
<div class="col-xs-12 col-sm-12 text-center" style="padding:20px;margin-top:20%;box-shadow: 0 9px 8px rgba(0,0,0,0.30), 0 2px 10px 0px rgba(0,0,0,0.22);background:#00a65a !important;width:100%;">
<h2 class="mens" style="color:#f1f1f1;"><i class="fa fa-warning"></i> Error! ' . $e->getMessage() . ' </h2>
<h4 style="font-size:24px;line-height:60px;color:#f2f2f2">You may <a href="signup" class="btn" id="quickview" style="margin:10px"> Signup</a> or back to <a href="index" style="margin:10px" class="btn" id="quickview"> Homepage</a>.</h4>
</div>
</div>
</div>
					';
			}
		}
	} else {
		$output .= '

			<div class="container-fluid text-center" style="display:flex;justify-content:center">
			<div class="row">
			<div class="col-xs-12 col-sm-12 text-center" style="padding:20px;margin-top:20%;box-shadow: 0 9px 8px rgba(0,0,0,0.30), 0 2px 10px 0px rgba(0,0,0,0.22);background:#dd4b39 !important;width:100%;">
			<h2 class="mens" style="color:#f1f1f1;"><i class="fa fa-warning"></i> Error! Cannot activate account. Wrong code." </h2>
			<h4 style="font-size:24px;line-height:60px;color:#f2f2f2">You may <a href="signup" class="btn" id="quickview" style="margin:10px"> Signup</a> or back to <a href="index" style="margin:10px" class="btn" id="quickview"> Homepage</a>.</h4>
			</div>
			</div>
			</div>
			';
	}

	$pdo->close();
}
?>

<style>
	body {
		overflow: hidden;
		height: 100vh;
	}
</style>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
	<?php include 'includes/navbar.php'; ?>

	<div class="content-wrapper" style="background:rgb(0,0,0,0.15)">
		<div class="container-fluid">

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<?php echo $output; ?>
					</div>
					<div class="col-sm-3">
					</div>
				</div>
			</section>

		</div>
	</div>
	<?php include 'includes/scripts.php'; ?>
</body>

</html>
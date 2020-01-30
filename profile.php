<?php
//error_reporting(0);
include('includes/session.php');
if (strlen($_SESSION['user']) == 0) {
	header('location:index.php');
} else {
	$conn = $pdo->open();
	// code for billing address updation
	if (isset($_POST['update'])) {

		$baddress = $_POST['billingaddress'];
		$bstate = $_POST['bilingstate'];
		$bcity = $_POST['billingcity'];
		$bpincode = $_POST['billingpincode'];
		$btype = $_POST['addresstype'];

		try {
			$stmt = $conn->prepare("UPDATE users SET address='$baddress',state='$bstate',city='$bcity',pincode='$bpincode', billingad_type='$btype' where id='" . $user['id'] . "'");
			$stmt->execute(['id' => $user['id']]);
			$output['message'] = 'Updated';
		} catch (PDOException $e) {
			$output['message'] = $e->getMessage();
		}
	}
}

// code for Shipping address updation
if (isset($_POST['shipupdate'])) {
	$saddress = $_POST['shippingaddress'];
	$sstate = $_POST['shippingstate'];
	$scity = $_POST['shippingcity'];
	$spincode = $_POST['shippingpincode'];
	$stype = $_POST['addresstype'];
	try {
		$stmt = $conn->prepare("UPDATE users SET shippingaddress='$saddress',shippingstate='$sstate',shippingcity='$scity',shippingpincode='$spincode', shippingad_type='$stype' where id='" . $user['id'] . "'");
		$stmt->execute(['id' => $user['id']]);
		$output['message'] = 'Updated';
	} catch (PDOException $e) {
		$output['message'] = $e->getMessage();
	}
}
$pdo->close();


?>
<?php include 'includes/header.php'; ?>

<head>
	<title>
		Profile <?php
				if (isset($_SESSION['user'])) {
					echo " - " . $user['firstname'] . " " . $user['lastname'] . "";
				} else {
					echo "";
				}
				?>
	</title>
	<style type="text/css">
		/*** START BS OVERRIDES ***/
		.features {
			padding: 30px 0;
		}

		.features .v-tabs .v-tab-head a,
		.features .v-tabs a.v-tab-head {
			color: #000;
			cursor: pointer;
			text-transform: uppercase;
			display: block;
			padding: 15px 30px 15px 15px;
			border-right: 1px solid #33cc66;
			margin: 0px;
			height: 100px;
			text-align: right;
			font: 12px "Raleway", "franklin-gothic-urw", "Helvectica Neue", helvetica, clean, sans-serif;
		}

		.features .v-tabs .v-tab-head a.active,
		.features .v-tabs .v-tab-head a:hover,
		.features .v-tabs a.v-tab-head.active,
		.features .v-tabs a.v-tab-head:hover {
			font-weight: bold;
			color: #33cc66;
			transition: 0.5s ease all;
			text-decoration: none;
		}

		.features .v-tabs .v-tab-head a {
			position: relative;
			display: block;
		}

		.features .v-tabs .v-tab-head a.active::after,
		.features .v-tabs .v-tab-head a.active::before {
			content: "";
			border-style: solid;
			border-width: 15px;
			position: absolute;
			right: 0;
			top: 15px;
			transform: rotate(90deg);
			-ms-transform: rotate(90deg);
			-webkit-transform: rotate(90deg);
			-o-transform: rotate(90deg);
			-moz-transform: rotate(90deg);
		}

		.features .v-tabs .v-tab-head a.active::before {
			border-color: #3fcf6e transparent transparent;
		}

		.features .v-tabs .v-tab-head a.active::after {
			margin-right: -1px;
			border-color: #faf8f5 transparent transparent;
		}

		.features .v-tabs a.v-tab-head {
			border: none;
			padding: 15px 0;
			text-align: left;
			position: relative;
		}

		.features .v-tabs a.v-tab-head:after {
			color: #e2dcd6;
			content: "\f054";
			font-family: FontAwesome;
			position: absolute;
			right: 10px;
			top: 50%;
			transform: translateY(-50%);
			-webkit-transform: translateY(-50%);
			-moz-transform: translateY(-50%);
			-o-transform: translateY(-50%);
		}

		.features .v-tabs a.v-tab-head.active::after {
			color: #3c6;
			content: "\f078";
		}

		.features .v-tabs .v-tab-pane {
			padding: 0 15px;
			height: auto;
		}

		.features .v-tabs .v-tab-pane ul {
			list-style: outside none none;
			margin: 0;
			padding: 0;
		}

		.features .v-tabs .v-tab-pane ul li {
			color: #292929;
			font-size: 16px;
			padding: 15px 0;
		}

		.features .v-tabs .v-tab-pane ul li i {
			color: #4c81b6;
			cursor: pointer;
			font-weight: bold;
			font-size: 12px;
		}

		.features .v-tabs .v-tab-pane .in {
			border-top: none;
			padding-top: 0;
		}

		.features .v-tabs .v-tab-pane .popover {
			border: 1px solid #014d7e !important;
			border-radius: 0;
			width: auto;
			margin: 10px 0 0 0;
			max-width: 276px;
			left: auto;
			box-shadow: none;
		}

		.features .v-tabs .v-tab-pane .popover.bottom .arrow {
			border-bottom-color: #014d7e;
		}

		.features .v-tabs .v-tab-pane .popover .popover-content {
			font-size: 14px;
			padding: 15px;
			text-align: center;
		}

		@media screen and (max-width: 768px) {
			.features.light-brown {
				border-top: 0 none;
			}

			.features h2.section-title {
				font-size: 32px;
			}

			.features .v-tabs .v-tab-pane .in {
				border-top: 1px solid #DDD;
				border-bottom: 2px solid #DDD;
			}

			.features .popover {
				margin: 10px 5% 0;
				max-width: none;
				width: 100%;
			}
		}

		.profileedit td {
			padding: 20px;
			color: white;
			font-weight: 100;
			letter-spacing: 1.5px;
		}
	</style>
</head>
<?php include 'includes/navbar.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">
		<div class="content-wrapper" style="background:#fff">

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
			<div class="row" style="margin-top:60px">
				<div class="col-sm-12" style="padding: 20px">
					<div class="light-brown features" id="features">
						<section class="container-fluid">
							<div class="row v-tabs">
								<div class="col-sm-3 v-tab-head hidden-xs">
									<a class="v-tab-link active" data-target="#coreFeatures-tab">ACCOUNT</a>
									<a class="v-tab-link" data-target="#designingBuildingTools-tab">Orders</a>
									<a class="v-tab-link" data-target="#shipping">Shipping and Billing Address</a>
									<a class="v-tab-link" data-target="#hostingUtilitiesSettings-tab">Transaction History</a>
									<a class="v-tab-link" data-target="#email-tab">Wishlist</a>
									<a class="v-tab-link" data-target="#track-tab">Track Your Product</a>

								</div>
								<div class="col-sm-9 v-tab-pane">
									<a class="v-tab-head v-tab-link visible-xs active" data-target="#coreFeatures-tab">PRofile Details</a>
									<div id="coreFeatures-tab" class="collapse fade in">
										<ul>
											<li>

												<div class="box-header" style="color: white">
													<h4 class="box-title" style="color: white;text-transform: uppercase;letter-spacing: 1px"><i class="glyphicon glyphicon-user" style="color: red"></i>&nbsp; <b>Profile Details</b></h4>
												</div>

												<div class="container" style="margin-top: 30px">
													<div class="profile-card js-profile-card" style="background: #0d0620">
														<div class="profile-card__img">
															<img src="<?php echo (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg'; ?>" width="100%" height="300px">
														</div>

														<div class="box-header" align="center" style="margin-top: -50px">
															<h4 class="box-title" style="color: white;text-transform: uppercase;" align="center">&nbsp;<b><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></b></h4>
															<table style="margin-top: 5px;color: white;font-size: 16px">

																<tbody align="center" class="profileedit">
																	<tr>
																		<td>Email:</td>
																		<td><?php echo $user['email']; ?></td>
																	</tr>
																	<tr>
																		<td>Contact Info:</td>
																		<td><?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></td>
																	</tr>
																	<tr>
																		<td width="250px">Address:</td>
																		<td><?php echo (!empty($user['address'])) ? $user['address'] : 'N/a'; ?></td>
																	</tr>
																	<tr>
																		<td width="250px">City:</td>
																		<td><?php echo (!empty($user['city'])) ? $user['city'] : 'N/a'; ?></td>
																	</tr>
																	<tr>
																		<td width="250px">State:</td>
																		<td><?php echo (!empty($user['state'])) ? $user['state'] : 'N/a'; ?></td>
																	</tr>
																	<tr>
																		<td width="250px">Pincode:</td>
																		<td><?php echo (!empty($user['pincode'])) ? $user['pincode'] : 'N/a'; ?></td>
																	</tr>
																	<tr>
																		<td>Member Since:</td>
																		<td><?php echo date('M d, Y', strtotime($user['created_on'])); ?></td>
																	</tr>

																</tbody>
															</table>

															<span class="pull-right">
																<a href="#edit" class="btn btn-success btn-flat btn-sm" id="quickview" data-toggle="modal"><i class="fa fa-edit" style="color: white"></i> &nbsp;&nbsp; Edit</a>
															</span>
														</div>
													</div>

												</div>
										</ul>
									</div>

									<a class="v-tab-head v-tab-link visible-xs" data-target="#shipping">Add Shipping / Biling Address</a>
									<div id="shipping" class="collapse fade" style="width: 100%">
										<div class="box-body table-responsive text-nowrap" style="background-color: white;border-radius: 15px;border: 3px solid white; box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);">
											<div class="box-header with-border">
												<h4 class="box-title"><i class="glyphicon glyphicon-home" style="color: steelblue"></i> &nbsp;<b>Add Shiiping and Billing Address</b></h4>
											</div>

											<div class="body-content" style="margin-top: 20px">
												<div class="container">
													<div>
														<div class="row">
															<div class="col-md-8">
																<div class="panel-group checkout-steps" id="accordion">
																	<!-- checkout-step-01  -->
																	<div class="panel panel-success checkout-step-01">

																		<!-- panel-heading -->
																		<div class="panel-heading">
																			<h4 class="unicase-checkout-title">
																				<a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
																					<h4 style="font-weight: 700;font-size: 20px;color: rgb(51, 204, 102)">1. Billing Address</h4>
																				</a>
																			</h4>
																		</div>
																		<!-- panel-heading -->

																		<div id="collapseOne" class="panel-collapse collapse in">

																			<!-- panel-body  -->
																			<div class="panel-body">
																				<div class="row">
																					<div class="col-md-12 col-sm-12 already-registered-login">



																						<form class="contact-form" role="form" method="post">

																							<div class="col-sm-12">
																								<div class="input-block textarea">
																									<label for="">Billing Street Address <span style="color: red">*</span></label>
																									<textarea type="text" class="form-control unicase-form-control text-input" autocomplete="off" id="bilingstate" name="billingaddress" value="<?php echo $user['address']; ?>" required><?php echo $user['address']; ?></textarea>
																								</div>
																							</div>
																							<div class="col-sm-12">

																								<div class="input-block">
																									<label for="">Billing State <span style="color: red">*</span></label>
																									<input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $user['state']; ?>" required>
																								</div>
																							</div>

																							<div class="col-sm-12">
																								<div class="input-block">
																									<label for="">Billing City <span style="color: red">*</span></label>
																									<input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="billingcity" value="<?php echo $user['city']; ?>" required>
																								</div>
																							</div>

																							<div class="col-sm-12">
																								<div class="input-block">
																									<label for="">Billing Pincode <span style="color: red">*</span></label>
																									<input type="number" class="form-control unicase-form-control text-input" id="bilingstate" maxlength="6" name="billingpincode" value="<?php echo $user['pincode']; ?>" required>
																								</div>
																							</div>
																							<div class="col-sm-12">
																								<div class="form-group">
																									<label for="">Select an Address Type<span style="color: red">*</span></label>
																									<div class="select">
																										<select name="addresstype" id="addresstype" required="" value="<?php echo $user['shippingad_type	']; ?>">
																											<option value="" selected="selected">-Select an Address Type-</option>
																											<option value="Home">Home (7am to 9am delivery)</option>
																											<option value="Office">Office/Commercial (10 AM - 6 PM delivery)</option>
																										</select>
																									</div>
																								</div>
																							</div>
																							<div class="col-sm-12">
																								<button type="submit" name="update" class="btn btn-success ">Update</button>
																							</div>
																						</form>
																					</div>
																					<!-- already-registered-login -->

																				</div>
																			</div>
																			<!-- panel-body  -->

																		</div><!-- row -->
																	</div>
																	<!-- checkout-step-01  -->
																	<!-- checkout-step-02  -->
																	<div class="panel panel-success checkout-step-02">
																		<div class="panel-heading">
																			<h4 class="unicase-checkout-title">
																				<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
																					<h4 style="font-weight: 700;font-size: 20px;color: rgb(51, 204, 102)">2. Shipping Address</h4>
																				</a>
																			</h4>
																		</div>
																		<div id="collapseTwo" class="panel-collapse collapse">
																			<div class="panel-body">


																				<form class="contact-form" role="form" method="post">

																					<div class="col-sm-12">
																						<div class="input-block textarea">
																							<label for="">Shipping Street Address <span style="color: red">*</span></label>
																							<textarea type="text" class="form-control unicase-form-control text-input" name="shippingaddress" value="<?php echo $user['shippingaddress']; ?>" required><?php echo $user['shippingaddress']; ?></textarea>
																						</div>
																					</div>

																					<div class="col-sm-12">
																						<div class="input-block">
																							<label for="">Shipping State <span style="color: red">*</span></label>
																							<input type="text" class="form-control unicase-form-control text-input" name="shippingstate" value="<?php echo $user['shippingstate']; ?>" required>
																						</div>
																					</div>

																					<div class="col-sm-12">
																						<div class="input-block">
																							<label for="">Shipping City <span style="color: red">*</span></label>
																							<input type="text" class="form-control unicase-form-control text-input" name="shippingcity" value="<?php echo $user['shippingcity']; ?>" required>
																						</div>
																					</div>

																					<div class="col-sm-12">
																						<div class="input-block">
																							<label for="">Shipping Pincode <span style="color: red">*</span></label>
																							<input type="number" class="form-control unicase-form-control text-input" maxlength="6" name="shippingpincode" value="<?php echo $user['shippingpincode']; ?>" required>
																						</div>
																					</div>
																					<div class="col-sm-12">
																						<div class="form-group">
																							<label for="">Select an Address Type<span style="color: red">*</span></label>
																							<div class="select">
																								<select name="addresstype" required="" value="<?php echo $user['billingad_type	']; ?>">
																									<option value="" selected="selected">-Select an Address Type-</option>
																									<option value="Home">Home (7am to 9am delivery)</option>
																									<option value="Office">Office/Commercial (10 AM - 6 PM delivery)</option>
																								</select>
																							</div>
																						</div>
																					</div>
																					<div class="col-sm-12">
																						<button type="submit" name="shipupdate" class=" btn btn-success ">Update</button>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
																	<!-- checkout-step-02  -->
																</div><!-- /.checkout-steps -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>


									<a class="v-tab-head v-tab-link visible-xs" data-target="#designingBuildingTools-tab">Your Order</a>
									<div id="designingBuildingTools-tab" class="collapse fade">
										<div class="box-body table-responsive text-nowrap" style="background-color: white;border-radius: 15px;border: 3px solid white; box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);">
											<div class="box-header with-border">
												<h4 class="box-title"><i class="glyphicon glyphicon-calendar" style="color: steelblue"></i> &nbsp;<b>Your Order</b></h4>
											</div><br>
											<table class="table table-bordered" id="example1" width="100%" style="border:1px solid #663355;">
												<thead style="border:1px solid #663355">
													<th style="border:1px solid #663355">Order ID</th>
													<th style="border:1px solid #663355">Product Buyed</th>
													<th style="border:1px solid #663355">Order Date</th>
													<th style="border:1px solid #663355">Estimate Ship Date</th>
													<th style="border:1px solid #663355">Ship Address</th>
													<th style="border:1px solid #663355">Track Order</th>

												</thead>
												<tbody style="border: 2px solid #663355">
													<?php
													$conn = $pdo->open();

													try {
														$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
														$stmt->execute(['user_id' => $user['id']]);
														foreach ($stmt as $row) {
															$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
															$stmt2->execute(['id' => $row['id']]);
															$total = 0;
															foreach ($stmt2 as $row2) {
																$subtotal = $row2['price'] * $row2['quantity'];
																$total += $subtotal;
																$order = $total * ($row2['old_price'] - $row2['price']) /  100;
																$order1 = $total - $order;
																$delivery = 15.00;
																$delivery1 = $order1 + $delivery;
																$orderid = $row['id'];
																$orderdate = date('M d, Y', strtotime($row['sales_date']));
																$shipdate =  date('M d, Y', strtotime($orderdate . '+5 days'));
															}

															echo  "
	<tr>
	<td style=\"border:1px solid #663355;text-align:center\">ORDID" . $orderid . "</td>
	<td style=\"border:1px solid #663355;text-align:center\"><button class='btn btn-sm btn-success  transact'  data-id='" . $row['id'] . "'><i class='fa fa-search' style=\"font-size:14px\"></i> View</button></td>
	<td style=\"border:1px solid #663355;text-align:center\">" . $orderdate . "</td>
	<td style=\"border:1px solid #663355;text-align:center\">" . $shipdate . "</td>
	<td style=\"border:1px solid #663355;text-align:center\">Address: " . $user['address'] . " <br> State:  " . $user['state'] . " <br> City: " . $user['city'] . " <br> Pincode: " . $user['pincode'] . "</td>
	<td style=\"border:1px solid #663355;text-align:center\">
	<button class='btn btn-sm btn-flat btn-success track' data-id='" . $row['id'] . "'>
	<i class='fa fa-map-marker' style=\"font-size:14px;font-weight:700\"></i> 
	<span style=\"font-size:14px;font-weight:700\">Track</span></button>
	</tr>	
	";
														}
													} catch (PDOException $e) {
														echo "There is some problem in connection: " . $e->getMessage();
													}

													$pdo->close();
													?>
												</tbody>
											</table>
										</div>
									</div>

									<a class="v-tab-head v-tab-link visible-xs" data-target="#hostingUtilitiesSettings-tab">My Transactions</a>
									<div id="hostingUtilitiesSettings-tab" class="collapse fade" style="width: 100%">
										<div class="box-body table-responsive text-nowrap" style="background-color: white;border-radius: 15px;border: 3px solid white; box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);">
											<div class="box-header with-border">
												<h4 class="box-title"><i class="glyphicon glyphicon-calendar" style="color: steelblue"></i> &nbsp;<b>Transaction History</b></h4>
											</div>
											<br>
											<table class="table table-bordered" id="example2">
												<thead style="border:1px solid #663355;">
													<th style="border:1px solid #663355;">Date</th>
													<th style="border:1px solid #663355;">Transaction#</th>
													<th style="border:1px solid #663355;">Amount</th>
													<th style="border:1px solid #663355;">Full Details</th>

												</thead>
												<tbody>
													<?php
													$conn = $pdo->open();

													try {
														$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
														$stmt->execute(['user_id' => $user['id']]);
														foreach ($stmt as $row) {
															$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
															$stmt2->execute(['id' => $row['id']]);
															$total = 0;
															foreach ($stmt2 as $row2) {
																$subtotal = $row2['price'] * $row2['quantity'];
																$total += $subtotal;
																$order = $total * ($row2['old_price'] - $row2['price']) /  100;
																$order1 = $total - $order;
																$delivery = 15.00;
																$delivery1 = $order1 + $delivery;
															}
															echo "
<tr>
<td style=\"border:1px solid #663355\">" . date('M d, Y', strtotime($row['sales_date'])) . "</td>
<td style=\"border:1px solid #663355\">" . $row['pay_id'] . "</td>
<td style=\"border:1px solid #663355;\">
<h5 style=\"font-weight:700\">Product Price: &#36; " . number_format($row2['price'], 2) . " * " . $row2['quantity'] . " = &#36; " . number_format($subtotal, 2) . "</h5>
<h5 style=\"font-weight:700\">Bag Discount: <span class=\"pull-right\">&#36; " . number_format($order, 2) . "</h5>
<h5 style=\"font-weight:700\">Bag Total :<span class=\"pull-right\">&#36; " . number_format($order1, 2) . "</h5>
<h5 style=\"font-weight:700\">Delivery Charge: <span class=\"pull-right\">&#36; " . number_format($delivery, 2) . "</h5>
<hr style=\"border:1px solid #ddd\">
<h4 style=\"border:1px solid #663355;padding:10px\"><span style=\"font-weight:700\">Grand Total</span> :
<span class=\"pull-right\">&#36; " . number_format($delivery1, 2) . "</span></h4></td>
<td style=\"border:1px solid #663355\"><button class='btn btn-sm btn-flat btn-success transact' data-id='" . $row['id'] . "'><i class='fa fa-search'></i> View</button></td>
</tr>
";
														}
													} catch (PDOException $e) {
														echo "There is some problem in connection: " . $e->getMessage();
													}

													$pdo->close();
													?>
												</tbody>
											</table>
										</div>
									</div>
									<a class="v-tab-head v-tab-link visible-xs" data-target="#email-tab">Wishlist</a>
									<div id="email-tab" class="collapse fade">
										<ul>
										</ul>
									</div>

									<a class="v-tab-head v-tab-link visible-xs" data-target="#track-tab">Track Your Product</a>
									<div id="track-tab" class="collapse fade">
										<ul>
											<div class="track-order-page inner-bottom-sm">
												<div class="row">
													<div class="col-md-12">

														<form class="contact-form outer-top-xs" method="POST" action="orders_details.php">
															<div class="input-block">
																<label class="info-title" for="exampleOrderId1">Order ID</label>
																<input type="text" class="form-control unicase-form-control text-input" name="orderid" id="exampleOrderId1" required="">
															</div>
															<div class="input-block">
																<label class="info-title" for="exampleBillingEmail1">Registered Email</label>
																<input type="email" class="form-control unicase-form-control text-input" name="email" id="exampleBillingEmail1" required="">
															</div>
															<button type="submit" name="submit" class="btn-upper btn btn-success">Track</button>
														</form>
													</div>
												</div><!-- /.row -->
											</div><!-- /.sigin-in-->
										</ul>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>

			<?php include 'includes/footer.php'; ?>
			<?php include 'includes/profile_modal.php'; ?>
		</div>

		<?php include 'includes/scripts.php'; ?>
		<!-- JS -->
		<script type="text/javascript">
			$(document).ready(function() {

				$('[data-toggle="popover"]').popover({
					trigger: 'hover'
				});

				$('.v-tab-head .v-tab-link').mouseover(tabHandler);
				$('.v-tab-head.v-tab-link').click(tabHandler);

			});

			var tabHandler = function(e) {
				e.preventDefault();

				var target = $($(this).data('target')),
					tabLink = $('.v-tab-link[data-target="' + $(this).data('target') + '"]');

				tabPanelToShow(tabLink);
				tabLinkToActivate(target);

			};

			var tabPanelToShow = function(elem) {
				$('.v-tab-link').removeClass('active').parent().find(elem).addClass('active');
			};

			var tabLinkToActivate = function(elem) {
				$('.v-tab-pane').children('div').removeClass('in').parent().find(elem).addClass('in');
			};
		</script>
		<script>
			$(function() {
				$(document).on('click', '.track', function(e) {
					e.preventDefault();
					$('#track').modal('show');
					var id = $(this).data('id');
					$.ajax({
						type: 'POST',
						url: 'tracking.php',
						data: {
							id: id
						},
						dataType: 'json',
						success: function(response) {
							$('#order').html(response.order);
						}
					});
				});

				$("#track").on("hidden.bs.modal", function() {
					$('.prepend_items').remove();
				});
			});
		</script>

		<script>
			$(function() {
				$(document).on('click', '.transact', function(e) {
					e.preventDefault();
					$('#transaction').modal('show');
					var id = $(this).data('id');
					$.ajax({
						type: 'POST',
						url: 'transaction.php',
						data: {
							id: id
						},
						dataType: 'json',
						success: function(response) {
							$('#date').html(response.date);
							$('#transid').html(response.transaction);
							$('#detail').prepend(response.list);
							$('#total').html(response.total);
						}
					});
				});

				$("#transaction").on("hidden.bs.modal", function() {
					$('.prepend_items').remove();
				});
			});
		</script>
		<script type="text/javascript">
			//material contact form animation
			$(".contact-form")
				.find(".form-control")
				.each(function() {
					var targetItem = $(this).parent();
					if ($(this).val()) {
						$(targetItem)
							.find("label")
							.css({
								top: "-6px",
								fontSize: "16px",
								color: "#33cc66"
							});
					}
				});
			$(".contact-form")
				.find(".form-control")
				.focus(function() {
					$(this)
						.parent(".input-block")
						.addClass("focus");
					$(this)
						.parent()
						.find("label")
						.animate({
							top: "-6px",
							left: "10px",
							fontSize: "16px",
							color: "#fff"
						}, 200);
				});
			$(".contact-form")
				.find(".form-control")
				.blur(function() {
					if ($(this).val().length == 0) {
						$(this)
							.parent(".input-block")
							.removeClass("focus");
						$(this)
							.parent()
							.find("label")
							.animate({
								top: "20px",
								left: "10px",
								fontSize: "16px"
							}, 300);
					}
				});
		</script>
</body>

</html>
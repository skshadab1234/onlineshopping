<?php include 'includes/session.php'; ?>
<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "ecomm");
?>
<link rel="stylesheet" href="build/swiper.min.css">
<?php include 'includes/header.php'; ?>

<head>
	<title>Cart <?php
				if (isset($_SESSION['user'])) {
					echo " - " . $user['firstname'] . " " . $user['lastname'] . "";
				} else {
					echo "";
				}
				?></title>
	<STYle>
		@media(max-width:768px) {
			.content {
				background: #f5f5f7;
			}
		}

		.swiper-wrapper {
			height: 350px
		}
	</STYle>

</head>

<body class="hold-transition layout-top-nav">
	<div class="desktop">
		<?php include 'includes/navbar.php' ?>
	</div>
	<!-- mobile view -->
	<div class="container-fluid1" id="mobileview" style="padding:10px">
		<img src="images/arrow2.png" onclick="history.back(-1)" alt="">

		<div id="brand" style="font-size: 18px">
			SHOPPING BAG
		</div>
		<div class="rightsection pull-right" style="top:0">
			<h5 style="padding:10px">STEP 1/3</h5>
		</div>
	</div>

	<div class="wrapper">

		<div class="content-wrapper" style="margin:0;background:#fff;margin-bottom:70px">

			<div class="container" style="padding:0">

				<div class="content" style="margin-top: 40px">

					<div class="row">
						<!-- Main content -->
						<div class="container-fluid" id="widget" style="user-select: none;border:2px solid #f6f6f6;width:100%;text-align:center">
							<ul>
								<li style="display: inline-block;padding: 10px 10px" title="step 1">
									<p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;color: #20bd99;
	border-bottom: 2px solid #20bd99;letter-spacing: 3px;text-transform: uppercase;">Bag</p>
								</li>----------------

								<li style="display: inline-block;padding: 10px 10px" title="step 2">
									<p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;cursor: not-allowed;">Payment</p>
								</li>
								------------------
								<li style="display: inline-block;padding: 10px 10px" title="step 3">
									<p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;cursor: not-allowed;">Order Confirmation</p>
								</li>
							</ul>
						</div>
						<div class="col-sm-12 col-xs-12 col-lg-8 col-md-8" style="margin-top:20px;padding:0">
							<div id="tbody">
							</div>
							<a href="wishlist.php" style="color:#000;font-size:14px;text-transform:uppercase;font-weight:lighter">
								<div class="container-fluid" style="position:relative;border: 1px solid #f6f6f6;padding:20px;background:#fff;margin:10px 0;"><i class='fa fa-bookmark-o' style="font-size: 16px"></i> <span style="padding-left:8px;font-size:14px ">Add More From Wishlist</span><i class="fa fa-angle-right" style="position: absolute;right:10px;top:15px"></i></div>
							</a>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" style="background: #fff">
							<div id="tbody1">
							</div>
						</div>
					</div>
					<div>
						<?php
						$conn = $pdo->open();
							echo "<h5><b>You may also like:</b></h5>";
							try {
								$inc = 4;
								$stmt = $conn->prepare("SELECT * FROM products LEFT JOIN brands on brands.id = products.brand_id ORDER BY RAND() Limit 12");
								$stmt->execute();
								foreach ($stmt as $row) {
									$image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
									$inc = ($inc == 4) ? 1 : $inc + 1;
									if ($inc == 4) echo "<div class='row' style='margin:0;padding:0'>";
						?>
									<div id="d-like" class=" col-md-4 col-lg-3">
										<div class='swiper-slide' style='width:250px;height:250px;;margin-bottom:100px;'>
											<?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src= $image style='width:250px;height:250px;object-fit:contain'></a> "; ?>
											<h5><b><?= $row['brand_name'] ?></b></h5>
											<h5 style='overflow:hidden;text-overflow:ellipsis;width:100%;white-space:nowrap;'><?= '<a href=product.php?product=' . $row['slug'] . ' style=\'color:#000\'>' . $row['name'] . ' ' ?></a></h5>
											<h5 style="color: orange">₹<?= number_format($row['price']) ?> <small><s> ₹<?= $row['old_price'] ?></s></small></h5>
										</div>
									</div>
							<?php echo "";
									if ($inc == 6) echo "</div>";
								}
								if ($inc == 4) echo "<div class='col-sm-3'></div><div class='col-sm-3'></div></div>";
								if ($inc == 4) echo "<div class='col-sm-3'></div></div>";
							} catch (PDOException $e) {
								echo "There is some problem in connection: " . $e->getMessage();
							}

							$pdo->close();
							?>
							<div class="swiper-container swiper1" id="slider-m-view" style="padding-top: 10px;background:#fff;">
								<div class="swiper-wrapper">
								<?php
								$conn = $pdo->open();
								try {
									$stmt = $conn->prepare("SELECT * FROM products LEFT JOIN brands on brands.id = products.brand_id ORDER BY RAND() Limit 12");
									$stmt->execute();
									foreach ($stmt as $row) {
										$image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
										echo "
					<div class='swiper-slide' style='width:250px;height:100%;overflow:hidden;'>
					<a href='product.php?product=" . $row['slug'] . "' ><img src= $image style='width:200px;height:250px;object-fit:contain;overflow:hidden'></a>
				<div class='container-fluid' style='color:#000'>
				<h5><b>" . $row['brand_name'] . "</b></h5>
					<h5 style='overflow:hidden;text-overflow:ellipsis;width:100%;white-space:nowrap;'>" . $row['name'] . "</h5>
					<h5 style='color: orange'>₹ " . number_format($row['price']) . " <small><s> ₹ " . $row['old_price'] . " </s></small></h5>
				</div>
					</div>
					";
									}
								} catch (PDOException $e) {
									echo "There is some problem in connection: " . $e->getMessage();
							}

							$pdo->close();
								?>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/pay_foot.php' ?>

	<div class="buynowfixedfooter" style="padding:10px;height:70px;">
		<?php
		if (isset($_SESSION['user'])) {
			echo '
		<a href="payment.php"><button type="button" class="btn btn-secondary button-base-button form-control">Place Order</button></a>
		';
		} else {
			echo '
		<a href="login.php"><button type="button" class="btn btn-secondary button-base-button form-control" style=\'background:steelblue\'>Login</button></a>
		';
		}
		?>
	</div>
	<script src="build/swiper.min.js"></script>
	<?php include 'includes/sidebar_modal.php' ?>
	<?php include 'includes/scripts.php'; ?>
	<script>
		var swiper2 = new Swiper('.swiper1', {
			slidesPerView: 2,
		});
	</script>
	<script>
		var total = 0;
		$(function() {
			$(document).on('click', '.cart_delete', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				$.ajax({
					type: 'POST',
					url: 'cart_delete.php',
					data: {
						id: id
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
							getplace();
						}
					}
				});
			});

			$(document).on('click', '.minus', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_' + id).val();
				if (qty > 1) {
					qty--;
				}
				$('#qty_' + id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
							getplace();
						}
					}
				});
			});

			$(document).on('click', '.add', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_' + id).val();
				qty++;
				$('#qty_' + id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
							getplace();
						}
					}
				});
			});

			getDetails();
			getTotal();
			getplace();

		});

		function getDetails() {
			$.ajax({
				type: 'POST',
				url: 'cart_details.php',
				dataType: 'json',
				success: function(response) {
					$('#tbody').html(response);
					getCart();
				}
			});
		}


		function getplace() {
			$.ajax({
				type: 'POST',
				url: 'place_o.php',
				dataType: 'json',
				success: function(response) {
					$('#tbody1').html(response);
					getCart();
				}
			});
		}


		function getTotal() {
			$.ajax({
				type: 'POST',
				url: 'cart_total.php',
				dataType: 'json	',
				success: function(response) {
					delivery1 = response;

				}
			});
		}
	</script>


	<script src="js/main.js"></script>
</body>

</html>
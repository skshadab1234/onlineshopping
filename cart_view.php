<?php include 'includes/session.php'; ?>
<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "ecomm");
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<head>
	<title>Cart <?php
				if (isset($_SESSION['user'])) {
					echo " - " . $user['firstname'] . " " . $user['lastname'] . "";
				} else {
					echo "";
				}
				?></title>

</head>

<body class="hold-transition layout-top-nav">

	<div class="wrapper">

		<div class="content-wrapper">

			<div class="container-fluid">

				<div class="content">

					<div class="row">
						<!-- Main content -->
						<h1 class="page-header" style="font-weight: bolder;color: grey;padding: 20px">My Shopping Bag ( <span class="cart_count"></span> items) </h1>
						<div class="col-sm-12 col-xs-12 col-lg-8 col-md-8">
							<div class="container-fluid" align="center" style="user-select: none;">
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

							<div>
								<div id="tbody">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
							<?php require 'place_o.php'; ?>
						</div>

					</div>
					<hr>
					<div class="container-fluid">
						<h2 class="mens" align="center">You May Also Like:</h2>
						<div style="border-bottom: 5px solid #ff3f6c;margin: -10px auto;width: 100px;border-radius: 50px;margin-bottom: 40px;"></div>
						<div id="carousel3d2">
							<carousel-3d :perspective="1" :space="500" :display="5" :controls-visible="true" :controls-prev-html="'❬'" :controls-next-html="'❭'" :controls-width="30" :controls-height="60" :clickable="true" :autoplay="true" :autoplay-timeout="3000" height="400px">
								<slide :index="0">
									<?php
									$res = mysqli_query($link, "select * from products where id = 1");
									while ($row = mysqli_fetch_array($res)) {
										echo "<a href='product.php?product=" . $row['slug'] . "'><img src='images/" . $row['photo'] . "' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
										echo "<div class=\"ribbon\">
	<span class=\"ribbon1\"><span>" . $row['discount'] . " OFF </span></span>
	</div></h1>
	";
										echo "<br>";
										echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; " . number_format($row['price'], 0) . " &nbsp;</span>";
										echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; " . number_format($row['old_price'], 0) . "</s></small> -" . $row['discount'] . "</span>";
										echo "<br>";
										echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>";
									}
									?>
								</slide>
								<slide :index="1">
									<?php
									$res = mysqli_query($link, "select * from products where id = 8");
									while ($row = mysqli_fetch_array($res)) {
										echo "<a href='product.php?product=" . $row['slug'] . "'><img src='images/" . $row['photo'] . "' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
										echo "<div class=\"ribbon\">
	<span class=\"ribbon1\"><span>" . $row['discount'] . " OFF </span></span>
	</div></h1>
	";
										echo "<br>";
										echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; " . number_format($row['price'], 0) . " &nbsp;</span>";
										echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; " . number_format($row['old_price'], 0) . "</s></small> -" . $row['discount'] . "</span>";
										echo "<br>";
										echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>";
									}
									?>
								</slide>
								<slide :index="2">
									<?php
									$res = mysqli_query($link, "select * from products where id = 7");
									while ($row = mysqli_fetch_array($res)) {
										echo "<a href='product.php?product=" . $row['slug'] . "'><img src='images/" . $row['photo'] . "' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
										echo "<div class=\"ribbon\">
	<span class=\"ribbon1\"><span>" . $row['discount'] . " OFF </span></span>
	</div></h1>
	";
										echo "<br>";
										echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; " . number_format($row['price'], 0) . " &nbsp;</span>";
										echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; " . number_format($row['old_price'], 0) . "</s></small> -" . $row['discount'] . "</span>";
										echo "<br>";
										echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>";
									}
									?>
								</slide>
								<slide :index="3">
									<?php
									$res = mysqli_query($link, "select * from products where id = 5");
									while ($row = mysqli_fetch_array($res)) {
										echo "<a href='product.php?product=" . $row['slug'] . "'><img src='images/" . $row['photo'] . "' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
										echo "<div class=\"ribbon\">
	<span class=\"ribbon1\"><span>" . $row['discount'] . " OFF </span></span>
	</div></h1>
	";
										echo "<br>";
										echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; " . number_format($row['price'], 0) . " &nbsp;</span>";
										echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; " . number_format($row['old_price'], 0) . "</s></small> -" . $row['discount'] . "</span>";
										echo "<br>";
										echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>";
									}
									?>
								</slide>
								<slide :index="4">
									<?php
									$res = mysqli_query($link, "select * from products where id = 4");
									while ($row = mysqli_fetch_array($res)) {
										echo "<a href='product.php?product=" . $row['slug'] . "'><img src='images/" . $row['photo'] . "' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
										echo "<div class=\"ribbon\">
	<span class=\"ribbon1\"><span>" . $row['discount'] . " OFF </span></span>
	</div></h1>
	";
										echo "<br>";
										echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; " . number_format($row['price'], 0) . " &nbsp;</span>";
										echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; " . number_format($row['old_price'], 0) . "</s></small> -" . $row['discount'] . "</span>";
										echo "<br>";
										echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>";
									}
									?>
								</slide>
								<slide :index="5">
									<?php
									$res = mysqli_query($link, "select * from products where id = 2");
									while ($row = mysqli_fetch_array($res)) {
										echo "<a href='product.php?product=" . $row['slug'] . "'><img src='images/" . $row['photo'] . "' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
										echo "<div class=\"ribbon\">
	<span class=\"ribbon1\"><span>" . $row['discount'] . " OFF </span></span>
	</div></h1>
	";
										echo "<br>";
										echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; " . number_format($row['price'], 0) . " &nbsp;</span>";
										echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; " . number_format($row['old_price'], 0) . "</s></small> -" . $row['discount'] . "</span>";
										echo "<br>";
										echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>";
									}
									?>
								</slide>
								<slide :index="6">
									<?php
									$res = mysqli_query($link, "select * from products where id = 3");
									while ($row = mysqli_fetch_array($res)) {
										echo "<a href='product.php?product=" . $row['slug'] . "'><img src='images/" . $row['photo'] . "' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
										echo "<div class=\"ribbon\">
	<span class=\"ribbon1\"><span>" . $row['discount'] . " OFF </span></span>
	</div></h1>
	";
										echo "<br>";
										echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; " . number_format($row['price'], 0) . " &nbsp;</span>";
										echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; " . number_format($row['old_price'], 0) . "</s></small> -" . $row['discount'] . "</span>";
										echo "<br>";
										echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>";
									}
									?>
								</slide>

							</carousel-3d>
						</div>
					</div>
					<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
					<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.7/vue.js'></script>
					<script src='https://rawgit.com/Wlada/vue-carousel-3d/master/dist/vue-carousel-3d.min.js'></script>
					<script>
						new Vue({
							el: '#carousel3d2',
							data: {
								slides: 7
							},
							components: {
								'carousel-3d': Carousel3d.Carousel3d,
								'slide': Carousel3d.Slide
							}
						})
						//# sourceURL=pen.js
					</script>
					<?php $pdo->close(); ?>

					<div class="container-fluid" style="margin-top: 20px">
						<h2 class="mens" align="center">Monthly Top Sellers</h2>
						<div style="border-bottom: 5px solid #ff3f6c;margin: -10px auto;width: 100px;border-radius: 50px;margin-bottom: 40px;"></div>
						<?php
						$month = date('m');
						$conn = $pdo->open();

						try {
							$inc = 4;
							$stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
							$stmt->execute();
							foreach ($stmt as $row) {
								$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
								$inc = ($inc == 4) ? 1 : $inc + 1;
								if ($inc == 4) echo "<div class='row'>";
								echo "
	<div class=\"col-xs-6 col-sm-6 col-md-6 col-lg-3 \">

	<div class=\"row\" >
	<div class=\"el-wrapper\">
	<div class=\"box-up\">
	<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a>    
	<div class=\"ribbon\">
	<span class=\"ribbon1\"><span>" . $row['discount'] . " OFF </span></span>
	</div>  

	<div class=\"img-info\">

	<div class=\"info-inner\">

	<span class=\"p-company\">Brand : " . $row['brand'] . "</span>

	<span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>
	</div>
	<div class=\"a-size\">Available sizes : <span class=\"size\">S , M , L , XL</span></div>
	</div>

	</div>

	<div class=\"box-down\">
	<div class=\"h-bg\">
	<div class=\"h-bg-inner\"></div>
	</div>

	<p class=\"cart\">
	<span class=\"price\">&#36; " . number_format($row['price'], 2) . "</span>
	<span class=\"add-to-cart\">
	<span class=\"txt\">
	"; ?>
								<!-- Trigger the modal with a button -->
								<button type="button" class="btn btn-primary btn-sm" id="quickview" data-toggle="modal" data-target="#<?php echo $row['id']; ?>"> Quick View </button>

								<!-- Modal -->
								<div id="<?php echo $row['id']; ?>" class="modal fade" role="dialog">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title"><?php echo "<span class=\"p-name\"><a style=\"font-size:12px;color:black;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>
	"; ?></h4>
											</div>
											<div class="modal-body">
												<div class="container-fluid">
													<div class="row">
														<div class="col-sm-6">
															<?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img-rounded\"></a>"; ?>
														</div>
														<div class="col-sm-6">
															<?php echo "" . $row['brand'] . ""; ?>
															<?php echo "<br>"; ?>
															<?php echo " <span class=\"p-name\"><a style=\"font-size:14px;color:black;font-weight:600\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>"; ?>
															<br>
															<br>
															<i class="fa fa-star" style="color: orange;font-size: 14px"></i>
															<i class="fa fa-star" style="color: orange;font-size: 14px"></i>
															<i class="fa fa-star" style="color: orange;font-size: 14px"></i>
															<i class="fa fa-star" style="color: orange;font-size: 14px"></i>
															<i class="fa fa-star-o" style="color: orange;font-size: 14px"></i>
															<br><br>
															<span class="price" style="color: black;font-size: 20px"><?php echo "&#36; " . number_format($row['price'], 2) . ""; ?></span>&nbsp;
															<small style="font-size: 14px;"><s><?php echo "&#36; " . number_format($row['old_price'], 2) . ""; ?></s></small>
															<br>
															<br>

															<button class="btn btn-info" style="background-color: orange;border: orange"><?php echo "<a href='product.php?product=" . $row['slug'] . "' style=\"font-size:14px;color:white;font-weight:600\">See Product Details</a>"; ?></button>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>

									</div>
								</div>

						<?php echo "

	</span>
	</span>
	</p>
	</div>
	</div>
	</div>
	</div>
	";
								if ($inc == 4) echo "</div>";
							}
							if ($inc == 4) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
							if ($inc == 4) echo "<div class='col-sm-4'></div></div>";
						} catch (PDOException $e) {
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

						?>
					</div>
				</div>
			</div>
			<?php include 'includes/footer.php'; ?>

			<?php include 'includes/scripts.php'; ?>
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
								}
							}
						});
					});

					getDetails();
					getTotal();

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
<style type="text/css">
	.modal.left .modal-dialog,
	.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 320px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		-ms-transform: translate3d(0%, 0, 0);
		-o-transform: translate3d(0%, 0, 0);
		transform: translate3d(0%, 0, 0);
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		width: 100%;
		overflow-y: auto;
	}

	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

	/*Left*/
	.modal.left.fade .modal-dialog {
		left: -320px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		-moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		-o-transition: opacity 0.3s linear, left 0.3s ease-out;
		transition: opacity 0.3s linear, left 0.3s ease-out;
	}

	.modal.left.fade.in .modal-dialog {
		left: 0;
	}


	/*Right*/
	.modal.right.fade .modal-dialog {
		right: -320px;

		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		-moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		-o-transition: opacity 0.3s linear, right 0.3s ease-out;
		transition: opacity 0.3s linear, right 0.3s ease-out;
	}

	.modal.right.fade.in .modal-dialog {
		right: 0;
	}

	/* ----- MODAL STYLE ----- */
	.modal-content {
		text-align: left;
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}

	.men {
		color: white;
		margin-left: 30px;
	}

	.mendiv:hover .men {
		border-bottom: 2px solid white;
	}

	.mendiv:hover {
		background-color: rgba(0, 0, 0, 0.9);
		margin-left: 10px;
		transition: 0.9s ease all;
	}

	.hoverprofile {
		opacity: 0.5;
	}

	.hoverprofile:hover {
		opacity: 1;
	}

	.container3 {
		position: absolute;
	}

	@media(min-width:767px) {
		#mobilecart {
			width: 80%;
		}
	}

	@media(max-width:767px) {
		#mobilecart {
			width: 100%;
		}
	}
</style>



<!-- cod modal -->

<div class="modal fade" id="cod" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="margin-top: 200px">
		<div class="modal-content">
			<div class="modal-header">
				<h5 style="color: white;font-size: 20px">Are You Sure ?</h5>
			</div>
			<div class="modal-footer">
				<form action="cod.php" method="post">
					<button id="quickview" data-dismiss="modal" aria-label="Close">Close</button>
					<button type="submit" class="btn-success" name="cod">Proceed</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- mobile view sidebar navigation bar -->

<!-- Modal -->
<div class="modal left fade" id="bar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-header" style="background: #2c3e50;position: relative;width: 100%;height:160px">
			<div style="position: relative;top: 11px;">
				<span data-dismiss="modal" aria-label="Close" style="color: #fff;font-size: 31px;position: absolute;right: 5px;top: -11px;">&times;</span>
				<img src="<?php echo (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg'; ?>" width="50px" style="border-radius:5px">
			</div>
			<div>
				<?php
				if (isset($_SESSION['user'])) {
				?>
					<a href="profile.php">
						<div>
							<h4 style="max-width:100%;color: #fff;position: absolute;font-size:17px;bottom: 20px;left: 10px;font-weight: 600;letter-spacing: 0.3px;font-family: inherit;" align="center"><?php echo $user['firstname'] . ' ' . $user['lastname'] ?><span style="position: relative;left: 171px;font-size: 27px;"><i class="fa fa-angle-right"></i></span></h4>
						</div>
					</a>
				<?php
				} else {
				?>

				<?php
				}

				?>
			</div>
		</div>
		<div class="modal-content">
			<?php
			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM category WHERE id=1");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<a href=\"\"  data-toggle=\"modal\" data-target=\"#men\">
					<div style=\"padding-left:15px;margin-top: 19px;\">	
					<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;\">" . $row["name"] . "<span style=\"position: relative;left: 240px;font-size: 27px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
					</div></a>
						";
				}
			} catch (PDOException $e) {
				echo "There is some problem in connection: " . $e->getMessage();
			}

			$pdo->close();

			?>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM category WHERE id=2");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<a href\" data-toggle=\"modal\" data-target=\"#women\">
					<div style=\"padding-left:15px;margin-top: 19px;\">	
					<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;\">" . $row["name"] . "<span style=\"position: relative;left: 217px;font-size: 27px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
					</div></a>
					";
				}
			} catch (PDOException $e) {
				echo "There is some problem in connection: " . $e->getMessage();
			}

			$pdo->close();

			?>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM category WHERE id=3");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<a href\" data-toggle=\"modal\" data-target=\"#kids\">
					<div style=\"padding-left:15px;margin-top: 19px;\">	
					<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;\">" . $row["name"] . "<span style=\"position: relative;left: 240px;font-size: 27px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
					</div></a>
						";
				}
			} catch (PDOException $e) {
				echo "There is some problem in connection: " . $e->getMessage();
			}

			$pdo->close();

			?>

			<?php
			if (!isset($_SESSION['user'])) {
				$image = (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg';
			?>
				<div class="container-fluid" style="padding:10px;">
					<h5 class="text-center" style="color: #000;letter-spacing:1px;line-height:15px">Sign in to get all product updates on your registered mail</h5>
					<ul align="center">
						<li style="display:inline-block;padding:10px;color:steelblue;border:1px solid #4285f4;margin-left:10px"><a href='login.php' style="color: #4285f4;font-weight:600;"><i class="fa fa-sign-in" style="font-size:14px"></i> &nbsp;LOGIN</a></li>
						<li style="display:inline-block;padding:10px;color:steelblue;border:1px solid #4285f4;margin-left:10px"><a href='signup.php' style="color:  #4285f4;font-weight:600;"><i class="fa fa-user-plus" style="font-size:14px"></i> &nbsp;Sign Up</a></li>
					</ul>
				</div>
			<?php
			}
			?>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->



<!-- user profile modal-dialog -->

<!-- Modal -->
<div class="modal right fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div>
				<button type="button" class="pull-left" data-dismiss="modal" aria-label="Close" style="color: grey;background: transparent;border: none;"><span aria-hidden="true"><i class="fa fa-arrow-circle-left" style="font-size: 20px;opacity: 2;color: white;margin-top: 7px"></i></span></button>
				<span style="margin-left: 20px;font-size: 25px;font-weight: 700;letter-spacing: 3px;width: 100%;"><a href="profile.php" style="color: white;text-transform: uppercase;">profile</a></span>
			</div>
			<hr style="color: grey">
			<div class="modal-body">

				<div class="profile-card__img pull-left" style="margin-top: 30px;margin-left: 20px;border-radius: 50%;width: 50px;height: 50px">
					<img src="<?php echo (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg'; ?>" width="100%" height="300px">
				</div>


				<div class="box-header">
					<h4 style="color: white;text-align: center;margin-bottom: 20px;letter-spacing: 1px;">&nbsp;<b><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></b></h4>
				</div>
				<hr style="margin-top: -10px;opacity: 0.5">
				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-user-o" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;User Profile </span>&nbsp;<a href="profile.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-truck" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;My Orders </span>&nbsp;<a href="orders.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-history" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;Transaction History </span>&nbsp;<a href="transaction_history.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-cart-arrow-down" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;Wishlist </span>&nbsp;<a href="wishlist.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-plus" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;Compare Product </span>&nbsp;<a href="wishlist.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-whatsapp" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;Chat With Us </span>&nbsp;<a href="wishlist.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>
				<hr style="width: 200px;margin-left: 10px">

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-sign-out" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;<a href="logout.php" class="hoverprofile" style="color: white">Logout </span>&nbsp;</a></div>

				<a href="#edit" class="btn btn-success btn-flat btn-sm pull-right" id="quickview" data-toggle="modal"><i class="fa fa-edit" style="font-size: 12px;line-height: 40px"></i> Edit My Profile</a>


			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->

<div class="modal left fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="width:100%">
		<div class="modal-content" style="background:#fff">
			<div class="modal-body">
			</div>
			<div class="modal-footer" style="position:fixed;left:0;bottom:0;width:100%">
				<button style="background:none;color:gray;border:none" data-dismiss="modal">Cancel</button>
				<button id="quickview">Apply</button>
			</div>
		</div>

	</div><!-- modal-content -->
</div><!-- modal-dialog -->

</div>

<!-- user cart modal-dialog -->
<!-- Modal -->
<div class="modal right fade" id="cart1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" id="mobilecart" role="document">
		<div class="modal-content">
			<div style="background: #2c3e50;padding: 19px 1px 20px 30px">
				<span style="display: flex;">
					<img src="images/arrow1.png" alt="Cart" data-dismiss="modal" style="width: 41px;height: 40px;filter: invert();position: relative;left: -15px;">
					<?php
					if (count($_SESSION['cart']) > 1) {
						echo '<a href="cart_view.php" style="color: white;font-size: 29px;line-height: 38px;letter-spacing: 2px;font-family: calibri;"><span class="cart_count"></span> Product in Cart</a></span>';
					} else {
						echo '<a href="cart_view.php" style="color: white;font-size: 29px;line-height: 38px;letter-spacing: 2px;font-family: calibri;"><span class="cart_count"></span> Products in Cart</a></span>';
					}

					?>
			</div>
			<div id="tbody1" style="display: flex;flex-direction: column-reverse;margin:10px;">
			</div>
		</div>

	</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->

<!-- search modal-dialog -->

<div class="modal fade modal-fullscreen" id="search" style="padding: 0 !important;background: #0d0620;opacity: 0.9;height: 100vh">
	<div class="modal-dialog" style="width: 100%;margin: 0;padding: 0;">
		<div class="modal-header" style="color: black;position: relative;height: 70px;opacity: 1">
			<h2 class="pull-left">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand" id="searchlogo" style="margin-top: -24px;margin-left: -5px;color: black;font-weight: bolder;width: 150px">
						ECOMM
					</a>
				</div>
			</h2>
			<form method="POST" autocomplete="off" class="navbar-form navbar-center" action="search.php">
				<div class="contaner-fluid autocomplete pull-right" style="width: 420px;">
					<input type="text" id="myInput" style="width: 420px;background: none;border-bottom: 1px solid black;border-top: none;border-left: none;border-right: none;" class="form-control pull-right" placeholder="Products, Brand and many more" name="keyword" required>
				</div>
				<span style="padding: 2px;color: black" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle pull-right"></i></span></span>

				<button type="submit" id="myBtn" class="btn btn-default btn-flat" style="display: none"><i class="fa fa-search" style="text-align: center;"></i></button>
			</form>
		</div>
		<div class="modal-body" style="background: #0d0620;opacity: 0.9;height: 100vh">
			<div class="container-fluid my-3" style="padding: 20px;text-align: center;height: 100vh">
				<h2 align="left" style="font-family: calibri;font-weight: 700;color: white"> Top Searches</h2>

				<h2 align="left" style="font-family: calibri;font-weight: 700;color: white">Monthly Top Sellers</h2>
				<div style="margin-top: 40px">

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
<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3 \">

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
            <div class=\"a-size\">Available sizes : <span class=\"size\" style=\"color:white\">" . $row['size'] . "</span></div>
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
									<div class="modal-content" style="background: #0d0620">
										<div class="modal-header" style="background: #0d0620">

											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title"><?php echo "<span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>
"; ?></h4>
											<div class="ribbon">
												<span class="ribbon1"><span><?php echo "" . $row['discount'] . ""; ?> OFF </span></span>
											</div>
										</div>
										<div class="modal-body">
											<div class="container-fluid" style="color: white">
												<div class="row">
													<div class="col-sm-6">
														<?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' title=\"" . $row['name'] . "\" class=\"img-thumbnail\"></a>"; ?>
													</div>
													<div class="col-sm-6">

														<?php echo "" . $row['brand'] . ""; ?>
														<?php echo "<br>"; ?>
														<?php echo " <span class=\"p-name\" title=\"" . $row['name'] . "\"><a style=\"font-size:14px;color:white;font-weight:600\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>"; ?>
														<br>
														<br>
														<i class="fa fa-star" style="color: orange;font-size: 14px"></i>
														<i class="fa fa-star" style="color: orange;font-size: 14px"></i>
														<i class="fa fa-star" style="color: orange;font-size: 14px"></i>
														<i class="fa fa-star" style="color: orange;font-size: 14px"></i>
														<i class="fa fa-star-o" style="color: orange;font-size: 14px"></i>
														<br><br>
														<span class="price" style="color: white;font-size: 20px"><?php echo "&#36; " . number_format($row['price'], 2) . ""; ?></span>&nbsp;
														<small style="font-size: 14px;"><s><?php echo "&#36; " . number_format($row['old_price'], 2) . ""; ?></s></small>
														<br>
														<br>

														<button class="btn btn-info" style="background-color: orange;border: orange"><?php echo "<a href='product.php?product=" . $row['slug'] . "' style=\"font-size:14px;color:white;font-weight:600\">See Product Details</a>"; ?></button>
													</div>
												</div>
											</div>
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
						if ($inc == 4) echo "<div class='col-sm-3'></div><div class='col-sm-3'></div></div>";
						if ($inc == 4) echo "<div class='col-sm-3'></div></div>";
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



<!-- men drop -->
<!-- Modal -->
<div class="modal left fade" id="men" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>
				<span style="position: absolute;top: 36px;left: 63px;font-size: 18px;">Men</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=1");
				$stmt->execute();
				foreach ($stmt as $row) {
					$stmt2 = $conn->prepare("SELECT * FROM subcategory WHERE id=2");
					$stmt2->execute();
					foreach ($stmt2 as $row2) {
						$stmt3 = $conn->prepare("SELECT * FROM subcategory WHERE id=3");
						$stmt3->execute();
						foreach ($stmt3 as $row3) {
							$stmt4 = $conn->prepare("SELECT * FROM subcategory WHERE id=4");
							$stmt4->execute();
							foreach ($stmt4 as $row4) {
								$stmt8 = $conn->prepare("SELECT * FROM subcategory WHERE id=8");
								$stmt8->execute();
								foreach ($stmt8 as $row8) {

									echo "
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#mensub\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#mensub1\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row2["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#mensub2\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row3["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#mensub3\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row4["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#mensub7\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row8["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
			";
								}
							}
						}
					}
				}
			} catch (PDOException $e) {
				echo "There is some problem in connection: " . $e->getMessage();
			}

			$pdo->close();

			?>
		</div>
	</div>
</div>



<!--women drop -->
<!-- Modal -->
<div class="modal left fade" id="women" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>
				<span style="position: absolute;top: 36px;left: 63px;font-size: 18px;">Women</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=9");
				$stmt->execute();
				foreach ($stmt as $row) {
					$stmt2 = $conn->prepare("SELECT * FROM subcategory WHERE id=10");
					$stmt2->execute();
					foreach ($stmt2 as $row2) {
						$stmt3 = $conn->prepare("SELECT * FROM subcategory WHERE id=12");
						$stmt3->execute();
						foreach ($stmt3 as $row3) {
							$stmt4 = $conn->prepare("SELECT * FROM subcategory WHERE id=14");
							$stmt4->execute();
							foreach ($stmt4 as $row4) {
								$stmt5 = $conn->prepare("SELECT * FROM subcategory WHERE id=15");
								$stmt5->execute();
								foreach ($stmt5 as $row5) {
									echo "
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#womensub1\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#womensub2\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row2["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#womensub4\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row3["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#womensub6\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row4["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#womensub7\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row5["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
			";
								}
							}
						}
					}
				}
			} catch (PDOException $e) {
				echo "There is some problem in connection: " . $e->getMessage();
			}

			$pdo->close();

			?>
		</div>
	</div>
</div>

<!--Kids drop -->
<!-- Modal -->
<div class="modal left fade" id="kids" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>
				<span style="position: absolute;top: 36px;left: 63px;font-size: 18px;">KIDS</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=16");
				$stmt->execute();
				foreach ($stmt as $row) {
					$stmt2 = $conn->prepare("SELECT * FROM subcategory WHERE id=17");
					$stmt2->execute();
					foreach ($stmt2 as $row2) {
						$stmt3 = $conn->prepare("SELECT * FROM subcategory WHERE id=18");
						$stmt3->execute();
						foreach ($stmt3 as $row3) {
							$stmt4 = $conn->prepare("SELECT * FROM subcategory WHERE id=19");
							$stmt4->execute();
							foreach ($stmt4 as $row4) {
								$stmt5 = $conn->prepare("SELECT * FROM subcategory WHERE id=20");
								$stmt5->execute();
								foreach ($stmt5 as $row5) {

									echo "
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#kidsub1\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#kidsub2\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row2["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#kidsub3\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row3["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#kidsub4\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row4["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
					<div class=\"container-fluid\">
						<a href=\"\" data-toggle=\"modal\" data-target=\"#kidsub5\">
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;font-weight: 600;letter-spacing: 0.3px;font-size: 14px;width: 100%;position: relative;right: 0px;\">" . $row5["name"] . "<span style=\"    position: absolute;font-size: 27px;right: 0px;\"><i class=\"fa fa-angle-right\"></i></span></h5>
			</div></a>
					</div>
			";
								}
							}
						}
					}
				}
			} catch (PDOException $e) {
				echo "There is some problem in connection: " . $e->getMessage();
			}

			$pdo->close();

			?>
		</div>
	</div>
</div>

<!--men sub subcategory for bottomwear-->
<!-- Modal -->
<div class="modal left fade" id="mensub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>
				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=1");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='men_bottom'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
						<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>
			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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

<!--men sub subcategory for innerwear and sleepwear-->
<!-- Modal -->
<div class="modal left fade" id="mensub1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>

				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=2");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='men_innerwear'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>
					<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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


<!--men sub subcategory for Footwear-->
<!-- Modal -->
<div class="modal left fade" id="mensub2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>

				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=3");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='men_footwear'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>
					<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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

<!--men sub subcategory for topwear-->
<!-- Modal -->
<div class="modal left fade" id="mensub3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>

				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=4");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='men_topwear'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>
					<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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



<!--men sub subcategory for sports-->
<!-- Modal -->
<div class="modal left fade" id="mensub7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>

				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=8");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='men_sports'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>
					<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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


<!--women sub subcategory for Fusionwear-->
<!-- Modal -->
<div class="modal left fade" id="womensub1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>

				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=9");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='women_fusionwear'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>
					<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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


<!--women sub subcategory for Belts and more-->
<!-- Modal -->
<div class="modal left fade" id="womensub2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>

				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=10");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='women_westernwear'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>

			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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


<!--women sub subcategory for Makeup-->
<!-- Modal -->
<div class="modal left fade" id="womensub4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>

				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=12");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='women_makeup'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>

			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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

<!--women sub subcategory for Footwear-->
<!-- Modal -->
<div class="modal left fade" id="womensub6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>

				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=14");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='women_footwear'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>

			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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


<!--women sub subcategory for Western Wear-->
<!-- Modal -->
<div class="modal left fade" id="womensub7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>

				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=15");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='women_activewear'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>

			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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



<!--kids sub subcategory for Girls-->
<!-- Modal -->
<div class="modal left fade" id="kidsub2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>
				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=17");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='kids_girl'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>

			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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

<!--kids sub subcategory for Boy Clothing-->
<!-- Modal -->
<div class="modal left fade" id="kidsub1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>
				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=16");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='kids_boy'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>

			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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


<!--Kids sub subcategory for Boys Footwear-->
<!-- Modal -->
<div class="modal left fade" id="kidsub3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>
				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=18");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='kids_boyfoot'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>

			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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


<!--kids sub subcategory for girl Footwear-->
<!-- Modal -->
<div class="modal left fade" id="kidsub4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>
				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=19");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='kidS_girlfoot'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>

			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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

<!--kids sub subcategory for Accessories-->
<!-- Modal -->
<div class="modal left fade" id="kidsub5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="height: 73px;background: lightslategray;line-height: 6px;border: none;color: #ffff;">
				<i class="fa fa-angle-left" data-dismiss="modal" style="font-size: 28px;position: relative;top: 8px;left: 20px"></i>
				<?php

				$conn = $pdo->open();
				try {
					$stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=20");
					$stmt->execute();
					foreach ($stmt as $row) {
						echo "<span style=\"position: absolute;top: 36px;left: 63px;font-size: 18px;\">" . $row["name"] . "</span>";
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				$pdo->close();

				?>
				</span>
			</div>
			<?php

			$conn = $pdo->open();
			try {
				$stmt = $conn->prepare("SELECT * FROM subcategory WHERE type='kids_accessories'");
				$stmt->execute();
				foreach ($stmt as $row) {
					echo "
					<div class=\"container-fluid\">
					<a href='subcategory.php?subcategory=" . $row['sub_catslug'] . "'>

			<div style=\"padding-left:15px;margin-top: 19px;width:100%\">	
			<h5 style=\"color: #000;letter-spacing: 0.3px;font-size: 18px;width: 100%;position: relative;right: 0px;\">" . $row["name"] . "</h5>
			</div></a>
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
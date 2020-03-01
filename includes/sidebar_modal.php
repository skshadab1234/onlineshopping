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
			width: 40%;
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
				<span data-dismiss="modal" aria-label="Close" style="color: #fff;font-size: 31px;position: absolute;right: 5px;top: -11px;cursor:pointer">&times;</span>
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
		<div class="modal-content" style="background: #fff">
			<a href="category.php?choose='categories'">
				<div class="container-fluid" style="width:100%;padding:15px;display:flex;border-bottom:1px solid #c3c3c3">
					<h5 style="color: #000;letter-spacing: 0.5px;font-size: 14px;">Shop</h5>
					<div class="container-fluid" style="position:relative;">
						<i class="fa fa-angle-right" style="position:absolute;right:0;top:5px;"></i>
					</div>
				</div>
			</a>
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
			} else {
			?>
				<div class="container-fluid" id="sidebar-details">
					<ul>
						<a href="profile.php">
							<li>Account</li>
						</a>
						<a href="orders.php">
							<li>Orders</li>
						</a>
						<a href="knowus/contactus.php">
							<li>Contact Us</li>
						</a>
						<a href="faq.php">
							<li>FAQs</li>
						</a>

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


<!-- search modal-dialog -->

<div class="modal fade modal-fullscreen" id="search" style="padding: 0 !important;background: #0d0620;opacity: 0.9;height: 100vh">
	<div class="modal-dialog" style="width: 100%;margin: 0;padding: 0;">
		<div class="modal-header" style="color: black;position: relative;height: 70px;">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand1" id="searchlogo" style="text-transform:uppercase;color: #fff;font-weight: bolder;">
					DressMania
				</a>
			</div>
			<form method="POST" autocomplete="off" class="navbar-form navbar-center" action="search.php">
				<div class="container-fluid autocomplete pull-right" style="width: 420px;">
					<input type="text" id="myInput" style="width: 100%;background: none;border-bottom: 1px solid #fafafa;border-top: none;border-left: none;border-right: none;color: #fff;" class="form-control pull-right" placeholder="Products, Brand and many more" name="keyword" required>
				</div>
				<span style="padding: 2px;color: black" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times pull-right" style="position: absolute;top: 17px;right: 49px;color: #fff;"></i></span></span>

				<button type="submit" id="myBtn" class="btn btn-default btn-flat" style="display: none"><i class="fa fa-search" style="text-align: center;"></i></button>
			</form>
		</div>
	</div>
</div>

<!-- mb-search modal -->

<div class="modal fade" id="mb-search">
	<div class="mobile-view-header" id="mobileview" style="height: 100%">
		<img src="images/arrow1.png" data-dismiss="modal">
		<form method="POST" autocomplete="off" action="search.php" style="position: relative;left: 10px;">
			<div class="autocomplete pull-right">
				<input type="text" id="myInput1" style="width:300px;border-bottom: 1px solid #fafafa;border-top: none;border-left: none;border-right: none;color: #010101;position: relative;left: 10px;" class="form-control pull-right" placeholder="Search" name="keyword" required>
				<button type="submit" id="myBtn1" class="btn btn-default btn-flat" style="position: absolute;right:0;background:none;border:none"><i class="fa fa-search" style="text-align: center;"></i></button>
			</div>
		</form>

	</div>
</div>
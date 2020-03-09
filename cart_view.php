<?php include 'includes/session.php'; ?>
<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "ecomm");
?>
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
					@media(max-width:768px){
					.content{
						background: #f5f5f7;
					}
				}
				</STYle>

</head>

<body class="hold-transition layout-top-nav">
<div class="desktop">
		<?php include 'includes/navbar.php' ?>
	</div>
	<!-- mobile view -->
	<div class="container-fluid1" id="mobileview" style="padding:10px">
		<img src="images/arrow2.png" onclick="history.back(-1)"   alt="">

		<div id="brand" style="font-size: 18px">
			SHOPPING BAG
		</div>
		<div class="rightsection pull-right" style="top:0">
			<h5 style="padding:10px">STEP 1/3</h5>
		</div>
	</div>

	<div class="wrapper">

		<div class="content-wrapper" style="margin:0;background:#fff;margin-bottom:300px">

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
						</div>
						<div id="m-view"></div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" style="background: #fff">
							<div id="tbody1">
							</div>
						</div>

					</div>
				</div>
			<a href="wishlist.php" style="color:#000;font-size:14px;text-transform:uppercase;font-weight:lighter"><div class="container-fluid" style="position:relative;border: 1px solid #f6f6f6;padding:20px"><i class='fa fa-bookmark-o' style="font-size: 16px"></i> <span style="padding-left:8px;font-size:14px ">Add More From Wishlist</span><i class="fa fa-angle-right" style="position: absolute;right:10px;top:15px"></i></div></a>
			</div>
		</div>
	</div>
	
	<?php include 'includes/footer.php'; ?>
	
	<div class="buynowfixedfooter"  style="padding:0;height:70px;">
	<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-secondary" style="background: none;background: none;position: relative;left: 30px;">Left</button>
  <button type="button" class="btn btn-secondary button-base-button" style="position: relative;right: -170px;">Place Order</button>
</div>
	</div>
   <?php include 'includes/sidebar_modal.php' ?>				
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
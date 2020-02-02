<?php include 'includes/session.php'; ?>
<?php
$conn = $pdo->open();

$slug = $_GET['product'];

try {

	$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
	$stmt->execute(['slug' => $slug]);
	$product = $stmt->fetch();
} catch (PDOException $e) {
	echo "There is some problem in connection: " . $e->getMessage();
}


?>
<?php include 'includes/header.php'; ?>
<title><?php echo $product['prodname']; ?> </title>

<body class="hold-transition skin-blue layout-top-nav">
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<script>
		function magnify(imgID, zoom) {
			var img, glass, w, h, bw;
			img = document.getElementById(imgID);
			/*create magnifier glass:*/
			glass = document.createElement("DIV");
			glass.setAttribute("class", "img-magnifier-glass");
			/*insert magnifier glass:*/
			img.parentElement.insertBefore(glass, img);
			/*set background properties for the magnifier glass:*/
			glass.style.backgroundImage = "url('" + img.src + "')";
			glass.style.backgroundRepeat = "no-repeat";
			glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
			bw = 3;
			w = glass.offsetWidth / 2;
			h = glass.offsetHeight / 2;
			/*execute a function when someone moves the magnifier glass over the image:*/
			glass.addEventListener("mousemove", moveMagnifier);
			img.addEventListener("mousemove", moveMagnifier);
			/*and also for touch screens:*/
			glass.addEventListener("touchmove", moveMagnifier);
			img.addEventListener("touchmove", moveMagnifier);

			function moveMagnifier(e) {
				var pos, x, y;
				/*prevent any other actions that may occur when moving over the image*/
				e.preventDefault();
				/*get the cursor's x and y positions:*/
				pos = getCursorPos(e);
				x = pos.x;
				y = pos.y;
				/*prevent the magnifier glass from being positioned outside the image:*/
				if (x > img.width - (w / zoom)) {
					x = img.width - (w / zoom);
				}
				if (x < w / zoom) {
					x = w / zoom;
				}
				if (y > img.height - (h / zoom)) {
					y = img.height - (h / zoom);
				}
				if (y < h / zoom) {
					y = h / zoom;
				}
				/*set the position of the magnifier glass:*/
				glass.style.left = (x - w) + "px";
				glass.style.top = (y - h) + "px";
				/*display what the magnifier glass "sees":*/
				glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
			}

			function getCursorPos(e) {
				var a, x = 0,
					y = 0;
				e = e || window.event;
				/*get the x and y positions of the image:*/
				a = img.getBoundingClientRect();
				/*calculate the cursor's x and y coordinates, relative to the image:*/
				x = e.pageX - a.left;
				y = e.pageY - a.top;
				/*consider any page scrolling:*/
				x = x - window.pageXOffset;
				y = y - window.pageYOffset;
				return {
					x: x,
					y: y
				};
			}
		}
	</script>
	<style type="text/css">
		#myimage {
			width: 400px;
		}

		.img-magnifier-container {
			position: relative;
			overflow: hidden
		}

		.img-magnifier-glass {
			position: absolute;
			display: none;
			border: 3px solid #000;
			border-radius: 10%;
			cursor: crosshair;
			/*Set the size of the magnifier glass:*/
			width: 300px;
			height: 300px;
		}

		.sk:hover .img-magnifier-glass {
			display: block;
			z-index: 999999999;
		}

		.content-wrapper {
			background: #fff;
		}

		@media(max-width:767px) {
			.desktop {
				display: none
			}

			#code {
				display: none
			}

			#title {
				font-size: 16px;
				color: #323232;
				font-weight: lighter;
				letter-spacing: 1px;
			}

			.img-magnifier-glass {
				display: none;
				border: none;
				width: 0px;
				border-radius: 10%;
				cursor: none;
			}

			#details {
				border-top: 1px solid rgb(0, 0, 0, 0.26);
				line-height: 20px;
			}

			.s3 {
				display: block;
				width: max-content;
				padding: 10px;
			}

			.s3 ul li {
				display: inline-block;
			}

			.s3 ul li a {
				margin-right: 21px;
			}

			.s3 ul li i {
				color: #323232;
				opacity: 0.5;
			}

			.s3 ul li span {
				padding: 10px;
				font-size: 16px;
				color: slategray;
				font-weight: 600;

			}

			.buynowfixedfooter {
				position: fixed;
				left: 0;
				bottom: 0px;
				padding: 10px;
				z-index: 999;
				width: 100%;
				height: 60px;
				line-height: 40px;
				background: #fff;
			}

			#productForm {
				display: none;
			}
		}

		@media only screen and (max-width:340px) {
			.s3 {
				width: 100%;
			}

			.s3 ul li:last-child {
				display: none;
			}
		}

		#mobileview {
			background: #fff;
			color: #000;
			height: 60px;
			line-height: 20px;
		}

		#mobileview i {
			color: #000;
		}

		.sk {
			margin-top: 20px;
		}

		#arrow {
			width: 46px;
			position: fixed;
			top: 6px;
		}


		#brand span {
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			position: absolute;
			width: 100%;
			left: -30px;
			font-size: 18px;
			top: 10px;
			font-weight: 500;
			letter-spacing: 1px;
		}
	</style>
	<div class="desktop"><?php include 'includes/navbar.php' ?></div>
	<!-- mobile view -->
	<div class="mobile-view-header" id="mobileview">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-3 col-sm-3">
					<button type="button" id="bars" onclick="history.back(-1)" style="background:none;border:none;padding:0;outline:none;position:absolute;left:0;top:-2px">
						<img src="images/arrow1.png" width="40px" id="arrow" alt="">
					</button>
				</div>

				<div class="col-xs-6 col-sm-6" id="brand">
					<span><?php echo $product['prodname']; ?></span>
				</div>
				<div class="col-xs-3 col-sm-3" style="position: absolute;right: -25px;top: 4px;">
					<a href="#"><i class="fa fa-heart-o" style="position:absolute;right:85px;"></i></a>
					<a href="#" data-toggle="modal" data-target="#cart1">
						<i class="fa fa-shopping-cart" style="position:absolute;right:45px;margin:10px;"></i>
						<span class="label label-info cart_count" style="position:absolute;right:35px;font-size:10px;margin-top:10px;"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	</div>


	<div class="wrapper">
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 sk">
								<div class="img-magnifier-container text-center">
									<img id="myimage" src="<?php echo (!empty($product['photo'])) ? 'images/' . $product['photo'] : 'images/noimage.jpg'; ?>">
								</div>
							</div>
							<div class="col-sm-6" id="details" style="padding: 20px">
								<div class="s3">
									<ul>
										<li><a href=""><i class="fa fa-heart-o" style="font-size:20px"></i><span>Save</span></a></li>
										<li><a href="whatsapp://send?text=http://<?php echo $product['prodname']; ?>"><i class="fa fa-share-alt" style="font-size:20px"></i><span>Share</span></a></li>
										<li><a href="" data-toggle="modal" data-target="#similarproduct"><i class="fa fa-clone" style="font-size:20px"></i><span>Compare </span></a></li>
									</ul>
								</div>
								<h4 id="code" style="font-weight: 600;color: #323232">Product Code : <span><?php echo $product['prodid']; ?></span></h4>
								<h5 style="font-size: 14px;color: slategrey"><?php echo $product['brand']; ?></h5>
								<h5 id="title"><?php echo $product['prodname']; ?></h5>
								<h3 style="color: #323232;font-size:medium"><b>Rs. <?php echo number_format($product['price'] * 71.50, 2); ?> <small><s>MRP <?php echo number_format($product['old_price'] * 71.50, 2); ?></s></small><span style="color: limegreen"> <?php echo $product['discount']; ?> off</span></b></h3>
								<a href="" data-toggle="modal" data-target="#pricedetail" style="color:dodgerblue;font-weight:bolder"> View Price Details</a>
								<form class="form-inline" id="productForm">
									<div class="form-group">
										<div class="input-group col-sm-5">
											<span class="input-group-btn">
												<button type="button" id="minus" class="btn btn-info btn-flat btn-lg"><i class="fa fa-minus"></i></button>
											</span>
											<input type="text" name="quantity" id="quantity" align="center" class="form-control input-lg" value="1">
											<span class="input-group-btn">
												<button type="button" id="add" class="btn btn-info btn-flat btn-lg"><i class="fa fa-plus"></i>
												</button>
											</span>
											<input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">
										</div>
										<button type="submit" class="btn btn-primary btn-lg btn-flat addtocart" data-toggle="modal" data-target="#cart1" style="background-color: orange;border-radius: 20px;border: none;"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
									<br><br>
									<div class="callout" id="callout" style="display:none">
										<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
										<span class="message"></span>
									</div>
								</form>
								<div id="delivery" style="position:relative;margin-top:30px">
									<h4 style="font-size:14px;color: #000;font-weight: 500;letter-spacing: 1px;margin-bottom: 12px;">Delivering to</h4>
									<form action="" method="post">
										<input type="number" onKeyPress="if(this.value.length==6) return false;" style="width:100%;background: none;border-bottom: 1px solid dodgerblue;outline: none;position: relative;">
										<input type="submit" id="submit1" value="Change" style="outline:none;font-size:12px;letter-spacing:1px;position: absolute;z-index: 9999999;top: 33px;background:none;right: 11px;color: dodgerblue;">
									</form>
								</div>
								<div class="productdetails" style="margin-top:20px">
									<h4 style="font-size:14px;color: #000;font-weight: 500;letter-spacing: 1px;margin-bottom: 12px;">
										Product Details
									</h4>
									<h5>
										<?php echo $product['description']; ?>
									</h5>
								</div>

							</div>
						</div>

						<div class="fb-comments" data-href="http://localhost/ecommerce/product.php?product=<?php echo $slug; ?>" data-numposts="10" width="100%"></div>
					</div>
			</section>
		</div>
	</div>
	<?php $pdo->close(); ?>
	<?php include 'includes/footer.php'; ?>

	<div class="buynowfixedfooter">
		<form class="form-inline" id="productForm1">
			<input type="hidden" name="quantity" id="quantity" align="center" class="form-control input-lg" value="1">
			<input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">
			<button type="submit" class="btn btn-primary btn-lg btn-flat addtocart" data-toggle="modal" data-target="#cart1" style="background-color: #008cff;border-radius: 5x;border: none;width:100%;"><i class="fa fa-shopping-cart"></i> <span style="font-size: 20px;font-weight:700;letter-spacing:1px;text-transform:uppercase">&nbsp;&nbsp;Add to Cart</span></button>
		</form>
	</div>

	</div>

	<?php include 'includes/sidebar_modal.php'; ?>
	<?php include 'includes/scripts.php'; ?>
	<!-- modal of price details  -->
	<div class="modal fade " id="pricedetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding: 0 !important;">
		<div class="modal-dialog" role="document" style="width: 100%;margin: 0;padding: 0;background:#fff;position:absolute;left:0;bottom:0px;">
			<div class="modal-content1" style="padding:10px">
				<h3 style="margin: 0;font-size: 16px;font-weight: 700;letter-spacing:1px">Price Details</h3>
				<ul style="margin-top:10px;">
					<li style="display: inline-block;width: 150px;color: dimgrey">Maximum Retail Price(Incl. of all taxes)</li>
					<li style="display: inline-block;width: 150px;font-weight:700;color: #000;text-align:right" class="pull-right">Rs. <?php echo number_format($product['old_price'] * 71.50, 2); ?> </li>
					<BR></BR>
					<li style="display: inline-block;width: 150px;color: dimgrey">Discount</li>
					<li style="display: inline-block;width: 150px;color: #000;font-weight:700;text-align:right" class="pull-right"><?php echo $product['discount']; ?> OFF</li>
					<h3 style="margin-top: 10px;font-size: 16px;font-weight: 700;letter-spacing:1px">Selling Price</h3>
					<li style="display: inline-block;width: 150px;color: dimgrey">(Incl. of all taxes)</li>
					<li style="display: inline-block;width: 150px;font-weight:700;color: #000;text-align:right" class="pull-right">Rs. <?php echo number_format($product['price'] * 71.50, 2); ?> </li>
				</ul>
				<!-- <span style="color: #323232;padding:20px;text-align:right;"></span><span style="position:absolute;left:10px;width:200px;">Maximum Retail Price (incl. of all taxes)</span><b>&#36; <?php echo number_format($product['price'], 2); ?> <small><s>&#36; <?php echo number_format($product['old_price'], 2); ?></s></small></b> -->
			</div>
		</div>
	</div>

	<!-- modal for similar product -->
	<div class="modal fade " id="similarproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding: 0 !important;opacity: 0.9;">
		<div class="modal-dialog" role="document" style="width: 100%;margin: 0;padding: 0;background:#fff;position:absolute;left:0;bottom:0px;">
			<div class="modal-content1">
				<h5 style="margin: 0;padding: 12px;font-size: 20px;font-weight: 700;letter-spacing:1px">Similar Products</h5>

			</div>
		</div>
	</div>
	<script>
		/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
		magnify("myimage", 2);
	</script>

</body>

</html>
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

					.title {
						font-size: 14px;
						color: #323232;
						font-weight: 700;
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
					}

				}

				#mobileview {
					background: #fff;
					color: #000;
					height: 50px;
					margin-top: -10px;
					padding: 2px;
					line-height: 20px;
				}

				#mobileview i {
					color: #000
				}

				.sk {
					margin-top: 20px;
				}

				#arrow {
					position: relative;
					top: 20px;
					left: 20px;
				}

				.mobile-view-header #brand {
					line-height: 35px;
					font-weight: 900;
					text-transform: uppercase;
					position: absolute;
					top: 10px;
					right: 0;
				}

				#brand h5 {
					white-space: nowrap;
					overflow: hidden;
					text-overflow: ellipsis;
					position: absolute;
					width: 182px;
					left: -30px;
					top: 2px;
				}
			</style>
			<div class="desktop"><?php include 'includes/navbar.php' ?></div>
			<!-- mobile view -->
			<div class="mobile-view-header" id="mobileview">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-3 col-xs-3">
							<button type="button" id="bars" onclick="history.back(-1)" style="background:none;border:none;padding:0;outline:none;position:absolute;left:0;top:-2px">
								<img src="images/arrow.png" width="20px" id="arrow" height="20px" alt="">
							</button>
						</div>

						<div class="col-sm-9 col-xs-9" id="brand">
							<h5><?php echo $product['prodname']; ?></h5>
							<a href="#" data-toggle="modal" data-target="#search"><i class="fa fa-search" style="position:absolute;right:75px;font-size:15px;margin:10px;"></i></a>

							<a href="#" data-toggle="modal" data-target="#cart1">
								<i class="fa fa-shopping-cart" style="position:absolute;right:45px;font-size:15px;margin:10px;"></i>
								<span class="label label-info cart_count" style="position:absolute;right:35px;font-size:10px;margin-top:10px;"></span>
							</a>
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
										<h4 id="code" style="font-weight: 600;color: #323232">Product Code : <span><?php echo $product['prodid']; ?></span></h4>
										<h5 style="font-size: 14px;color: grey"><?php echo $product['brand']; ?></h5>
										<h5 id="title"><?php echo $product['prodname']; ?></h5>
										<h3 style="color: #323232"><b>&#36; <?php echo number_format($product['price'], 2); ?> <small><s>&#36; <?php echo number_format($product['old_price'], 2); ?></s></small><span style="color: orange"> (<?php echo $product['discount']; ?> off)</span></b></h3>
										<br>
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
									</div>
								</div>
								<br>

								<div class="fb-comments" data-href="http://localhost/ecommerce/product.php?product=<?php echo $slug; ?>" data-numposts="10" width="100%"></div>
							</div>
					</section>
				</div>
			</div>
			<?php $pdo->close(); ?>
			<?php include 'includes/footer.php'; ?>
			</div>
			<?php include 'includes/sidebar_modal.php'; ?>
			<?php include 'includes/scripts.php'; ?>
			<script>
				/* Initiate Magnify Function
		with the id of the image, and the strength of the magnifier glass:*/
				magnify("myimage", 2);
			</script>

		</body>

		</html>
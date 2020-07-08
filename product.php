
<?php include 'includes/session.php'; ?>
<?php
$conn = $pdo->open();

$slug = $_GET['product'];

try {

	$stmt = $conn->prepare("SELECT *, products.name AS prodname, products.photo As photo, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id LEFT JOIN brands ON brands.id = products.brand_id WHERE slug = :slug");
	$stmt->execute(['slug' => $slug]);
	$product = $stmt->fetch();
	$white =($product['color'] == "White") ? 'border:1px solid #000':'';
} catch (PDOException $e) {
	echo "There is some problem in connection: " . $e->getMessage();
}


try {

	$stmt = $conn->prepare("SELECT * FROM products");
	$stmt->execute();
	$row = $stmt->fetch();
} catch (PDOException $e) {
	echo "There is some problem in connection: " . $e->getMessage();
}
?>
<?php include 'includes/header.php'; ?>
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
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $product['prodname']; ?> </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="fashe-colorlib/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/css/util.css">
	<link rel="stylesheet" type="text/css" href="fashe-colorlib/css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
			<?php include 'includes/navbar.php' ?>

	<!-- Product Detail -->
	<div class="container-fluid bgwhite p-t-135 p-b-80">
	<section>
	<nav>
		<ol class="cd-breadcrumb custom-separator">
			<li><a href="#0">Home</a></li>
			<li class="current"><em><?php echo $product['prodname'] ?></em></li>
		</ol>
	</nav>
</section>

		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="<?php echo (!empty($product['photo'])) ? 'images/allproduct/' . $product['photo'] : 'images/noimage.jpg'; ?>">
							<div class="wrap-pic-w1">
								<img height="100%" src="<?php echo (!empty($product['photo'])) ? 'images/allproduct/' . $product['photo'] : 'images/noimage.jpg'; ?>" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="<?php echo (!empty($product['photo2'])) ? 'images/allproduct/' . $product['photo2'] : 'images/noimage.jpg'; ?>">
							<div class="wrap-pic-w1">
								<img height="100%" src="<?php echo (!empty($product['photo2'])) ? 'images/allproduct/' . $product['photo2'] : 'images/noimage.jpg'; ?>" alt="IMG-PRODUCT">
							</div>
						</div>

						<?php 
							if (!empty($product['photo3'])) {
								?>
						<div class="item-slick3" data-thumb="<?php echo (!empty($product['photo3'])) ? 'images/allproduct/' . $product['photo3'] : 'images/noimage.jpg'; ?>">
							<div class="wrap-pic-w1">
								<img height="100%" src="<?php echo (!empty($product['photo3'])) ? 'images/allproduct/' . $product['photo3'] : 'images/noimage.jpg'; ?>" alt="IMG-PRODUCT">
							</div>
						</div>
								<?php
							}
						?>

							<?php 
							if (!empty($product['photo4'])) {
								?>
						<div class="item-slick3" data-thumb="<?php echo (!empty($product['photo4'])) ? 'images/allproduct/' . $product['photo4'] : 'images/noimage.jpg'; ?>">
							<div class="wrap-pic-w1">
								<img height="100%" src="<?php echo (!empty($product['photo4'])) ? 'images/allproduct/' . $product['photo4'] : 'images/noimage.jpg'; ?>" alt="IMG-PRODUCT">
							</div>
						</div>
								<?php
							}
						?>

							<?php 
							if (!empty($product['photo5'])) {
								?>
						<div class="item-slick3" data-thumb="<?php echo (!empty($product['photo5'])) ? 'images/allproduct/' . $product['photo5'] : 'images/noimage.jpg'; ?>">
							<div class="wrap-pic-w1">
								<img height="100%" src="<?php echo (!empty($product['photo5'])) ? 'images/allproduct/' . $product['photo5'] : 'images/noimage.jpg'; ?>" alt="IMG-PRODUCT">
							</div>
						</div>
								<?php
							}
						?>
<!-- 
						<div class="item-slick3" data-thumb="fashe-colorlib/images/thumb-item-03.jpg">
							<div class="wrap-pic-w">
								<img src="fashe-colorlib/images/product-detail-03.jpg" alt="IMG-PRODUCT">
							</div>
						</div> -->
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
					<p class="s-text8 p-t-10" style="font-weight: 700;font-size: 20px">
						<?php echo $product['brand_name']; ?>
				</p>
				<h4 class="product-detail-name m-text16 p-b-13">
				<?php echo $product['prodname']; ?>			
					</h4>

				<span class="m-text17" style="color:red">
					&#8377; <?php echo number_format($product['price'], 2); ?> 
				</span>

				
			<form class="form-inline" id="productForm">
					<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Size
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Choose an option</option>
								<?php 
								$size = array($product['size']);
								?>
								<option><?php echo $size ?></option>
							</select>
						</div>
					</div>

					<div class="flex-m flex-w" style="position: relative;">
						<div class="s-text15 w-size15 t-center">
							Color
						</div>
						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Choose an option</option>
								<option><?= $product['color'] ?></option>
							</select>
						</div>	
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button  type="button"  class="btn-num-product-down color1 flex-c-m size7 bg8 eff2"  >
									<i class="fs-12 fa fa-minus"  id="minus" aria-hidden="true"></i>
								</button>

								<input type="text" name="quantity" id="quantity" class="size8 m-text18 t-center num-product"  value="1">

								<button   type="button" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" id="add"  aria-hidden="true"></i>
								</button>
							</div>
											<input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button type="submit" onclick="myFunction3()" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 addtocart">
									Add to Cart
								</button>
							</div>
							<div id="snackbar">
										<span class="message"></span>
									</div>
						</div>
					</div>
				</div>

				
				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
										<?php echo $product['description']; ?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>
			</div>
		</div>

						
	</div>

<div class="fb-comments" data-href="http://localhost/ecommerce/product.php?product=<?php echo $slug; ?>" data-numposts="10" width="100%"></div>
					</div>
	
	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
<?php 
foreach ($stmt as $row) {
?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="<?php echo (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg'; ?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<!-- <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button> -->
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="dis-block1 p-b-5">
										<?php echo $row['name']; ?>
								</a>

								<span class="block2-price m-text6 p-r-5">
			&#8377;	<?php echo $row['price']; ?>
								</span>
							</div>
						</div>
					</div>

<?php } ?>
					
				
				</div>
			</div>

		</div>
	</section>
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="fashe-colorlib/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="fashe-colorlib/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/sweetalert/sweetalert.min.js"></script>
	<!-- <script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "danger");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "danger");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "danger");
			});
		});
	</script>
 -->
<!--===============================================================================================-->
	<script src="fashe-colorlib/js/main.js"></script>

	<script>
		function myFunction3() {
			var x = document.getElementById("snackbar");
			x.className = "show";
			setTimeout(function() {
				x.className = x.className.replace("show", "");
			}, 10000);
		}
	</script>
		  <?php include 'includes/scripts.php'; ?>

	  <?php include 'includes/essence_script.php'; ?>

</body>
</html>

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

	<div class="wrapper">

		<div class="content-wrapper" style="margin:0;background:#fff;margin-bottom:70px">

			<div class="container" style="padding:0">

				<div class="content" style="margin-top: 80px">

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
							<a href="wishlist" style="color:#000;font-size:14px;text-transform:uppercase;font-weight:lighter">
								<div class="container-fluid" style="position:relative;border: 1px solid #f6f6f6;padding:20px;background:#fff;margin:10px 0;"><i class='fa fa-bookmark-o' style="font-size: 16px"></i> <span style="padding-left:8px;font-size:14px ">Add More From Wishlist</span><i class="fa fa-angle-right" style="position: absolute;right:10px;top:15px"></i></div>
							</a>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" style="background: #fff">
							<div id="tbody1">
							</div>
						</div>
					</div>
				</div>
			</div>

<!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Popular Products</h2>
                        <?php
      if (isset($_SESSION['error'])) {
        echo "
            <p>" . $_SESSION['error'] . "</p> 
        ";
        unset($_SESSION['error']);
      }
      if (isset($_SESSION['success'])) {
        echo "
            <p>" . $_SESSION['success'] . "</p> 
        ";
        unset($_SESSION['success']);
      }
      ?>
                    </div>
                </div>
            </div>
        </div>
  

        <div class="containe-fluidr">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
<?php
          $stmt1 = $conn->prepare("SELECT *, products.id AS prodid FROM products LEFT JOIN brands ON brands.id = products.brand_id LEFT JOIN wishlist ON products.id=wishlist.product_id");
          $stmt1->execute();
            foreach ($stmt1 as $row1) {
            $image = (!empty($row1['photo'])) ? 'images/allproduct/' . $row1['photo'] : 'images/noimage.jpg';
            $image2 = (!empty($row1['photo2'])) ? 'images/allproduct/' . $row1['photo2'] : 'images/noimage.jpg';
            $active='';
          $msg= '<div class="product-badge offer-badge">
                      <span>-'.$row1['discount'].'%</span>
                    </div>';
          if (strtotime($row1['date_view']) > (time() - (60*60*24*2))) {
            $msg = '<div class="product-badge new-badge">
                      <span>New</span>
                    </div>';
          }
           ?>

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                              <a href="product?product=<?php echo $row1['slug'] ?> ">
                                  <img src="<?php echo $image ?>" >
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="<?php echo $image2 ?>" alt="">
                              </a>
                                  <?= $msg ?>
                                <!-- Favourite -->
                                        <div  class="product-favourite">
                                          <input type="hidden"  value="<?php echo $row1['prodid']; ?>" id="favoriate" name="id">
                                              <button onclick="add_fav()">
                                                <span class="favme fa fa-heart <?php echo $active ?>"></span>
                                              </button>
                                        </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span><?php echo $row1['brand_name'] ?></span>
                              <a href="product?product=<?php echo $row1['slug'] ?> ">
                                    <h6><?php echo $row1['name'] ?></h6>
                                </a>
                                <p class="product-price">&#8377; <?php echo $row1['price'] ?></p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                               <!--      <div class="add-to-cart-btn">
                                        <button data-toggle="modal" data-ta rget="#<?php echo $row1['id'] ?>1" class="btn essence-btn">Quick view</button>

                                    </div> -->
                                </div>
                            </div>

                        </div>

                      <?php } ?>  
                      </div>
                    </div>
                  </div>
            </div>
</section>


	<?php include 'includes/pay_foot.php' ?>

	<div class="buynowfixedfooter" style="padding:10px;height:70px;">
		<?php
		if (isset($_SESSION['user'])) {
			echo '
		<a href="payment"><button type="button" class="btn btn-secondary button-base-button form-control">Place Order</button></a>
		';
		} else {
			echo '
		<a href="login"><button type="button" class="btn btn-secondary button-base-button form-control" style=\'background:steelblue\'>Login</button></a>
		';
		}
		?>
	</div>
	<script src="build/swiper.min.js"></script>
	<?php include 'includes/sidebar_modal.php' ?>
  <?php include 'includes/essence_script.php'; ?>

	
	<?php include 'includes/scripts.php'; ?>
	<script>
		var swiper2 = new Swiper('.swiper1', {
			slidesPerView: 2,
		});
	</script>
	<script>
	
	</script>


	<script src="js/main.js"></script>
</body>

</html>
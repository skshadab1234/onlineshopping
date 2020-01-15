		<?php include 'includes/session.php'; ?>
		<?php
		$conn = $pdo->open();

		$slug = $_GET['product'];

		try{

		$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$product = $stmt->fetch();

		}
		catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
		}

	
		?>
		<?php include 'includes/header.php'; ?>
		<title><?php echo $product['prodname']; ?>	</title>

		<body class="hold-transition skin-blue layout-top-nav">
		<script>
		(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
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
		if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
		if (x < w / zoom) {x = w / zoom;}
		if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
		if (y < h / zoom) {y = h / zoom;}
		/*set the position of the magnifier glass:*/
		glass.style.left = (x - w) + "px";
		glass.style.top = (y - h) + "px";
		/*display what the magnifier glass "sees":*/
		glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
		}
		function getCursorPos(e) {
		var a, x = 0, y = 0;
		e = e || window.event;
		/*get the x and y positions of the image:*/
		a = img.getBoundingClientRect();
		/*calculate the cursor's x and y coordinates, relative to the image:*/
		x = e.pageX - a.left;
		y = e.pageY - a.top;
		/*consider any page scrolling:*/
		x = x - window.pageXOffset;
		y = y - window.pageYOffset;
		return {x : x, y : y};
		}
		}
		</script>
		<style type="text/css">
 
		#myimage{
			width:400px;
			}
		.img-magnifier-container {
		position:relative;
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

.sk:hover .img-magnifier-glass{
	display: block;
	z-index: 999999999;
}
		</style>
				<?php include 'includes/navbar.php'; ?>

		<div class="wrapper">


		<div class="content-wrapper" >
		<div class="container">

		<!-- Main content -->
		<section class="content">
		<div class="row">
		<div class="col-sm-12">
		<div class="row">
		<div class="col-sm-6 sk" >
		<div class="img-magnifier-container text-center">
		<img id="myimage" src="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>" >
		</div>
		</div>
		<div class="col-sm-6" style="padding: 20px">
		<h4 style="font-weight: 600;color: #323232">Product Code : <span ><?php echo $product['prodid']; ?></span></h4>
		<h5 style="font-size: 14px;color: grey"><?php echo $product['brand']; ?></h5>
		<h5 style="font-size: 20px;color: #323232"><?php echo $product['prodname']; ?></h5>
		<h3 style="color: #323232"><b>&#36; <?php echo number_format($product['price'], 2); ?> <small><s>&#36; <?php echo number_format($product['old_price'], 2); ?></s></small><span style="color: orange">  (<?php echo$product['discount'];?> off)</span></b></h3>
		<br>
		<h4 style="font-size: 14px;margin-bottom: 20px;color: #323232;letter-spacing: 2px">DELIVERY OPTIONS  &nbsp;<i class="fa fa-truck"></i></h4>
		<form method="POST">
		<input type="number" name="zip" style="border: 1px solid #ddd"><span style="margin-left: -60px;font-stretch: 12px;color: blue;"><a href="" style="font-size: 14px;font-weight: 600">Check</a></span></i>
		<h6 style="color: grey">Please enter PIN code to check delivery time & Cash/Card on Delivery Availability</h6>
		<h4  style="font-size: 14px;font-weight: 400;line-height: 30px;color: grey">100% Original Products <br>Free Delivery on order above Rs. 1199 <br>Cash on delivery might be available <br>Easy 30 days returns and exchanges <br>Try & Buy might be available</h4>
		</form>		
		<hr>
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
		<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home" style="color: black;font-weight: 600">Description</a></li>
		<li><a data-toggle="tab" href="#menu2" style="color: black;font-weight: 600">Reviews</a></li>
		</ul>

		<div class="tab-content" style="height: 400px">
		<div id="home" class="tab-pane fade in active" style="width: 500px">
		<br>
		<h4 style="color: #323232;font-size: 14px"><?php echo $product['description']; ?></h4>	
		</div>
		<div id="menu2" class="tab-pane fade">
		<br><br>
		<div class="container" style="width: 80%;color: grey">
		<span class="heading">User Rating</span>
		<span class="fa fa-star checked"></span>
		<span class="fa fa-star checked"></span>
		<span class="fa fa-star checked"></span>
		<span class="fa fa-star checked"></span>
		<span class="fa fa-star"></span>
		<p>4.1 average based on 254 reviews.</p>
		<hr style="border:3px solid #f1f1f1">

		<div class="row">
		<div class="side">
		<div>5 star</div>
		</div>
		<div class="middle">
		<div class="bar-container">
		<div class="bar-5"></div>
		</div>
		</div>
		<div class="side right">
		<div>150</div>
		</div>
		<div class="side">
		<div>4 star</div>
		</div>
		<div class="middle">
		<div class="bar-container">
		<div class="bar-4"></div>
		</div>
		</div>
		<div class="side right">
		<div>63</div>
		</div>
		<div class="side">
		<div>3 star</div>
		</div>
		<div class="middle">
		<div class="bar-container">
		<div class="bar-3"></div>
		</div>
		</div>
		<div class="side right">
		<div>15</div>
		</div>
		<div class="side">
		<div>2 star</div>
		</div>
		<div class="middle">
		<div class="bar-container">
		<div class="bar-2"></div>
		</div>
		</div>
		<div class="side right">
		<div>6</div>
		</div>
		<div class="side">
		<div>1 star</div>
		</div>
		<div class="middle">
		<div class="bar-container">
		<div class="bar-1"></div>
		</div>
		</div>
		<div class="side right">
		<div>20</div>
		</div>
		</div>

		</div>  </div>
		</div>

		<hr style="border: 1px solid black">
		<div class="fb-comments" data-href="http://localhost/ecommerce/product.php?product=<?php echo $slug; ?>" data-numposts="10" width="100%"></div> 
		</div>
		</div>
		</section>

		</div>
		</div>
		<?php $pdo->close(); ?>
		<?php include 'includes/footer.php'; ?>
		</div>

		<?php include 'includes/scripts.php'; ?>
		<script>
		/* Initiate Magnify Function
		with the id of the image, and the strength of the magnifier glass:*/
		magnify("myimage", 2);
		</script>
		<script>
		$(function(){
		$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
		});
		$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
		quantity--;
		}
		$('#quantity').val(quantity);
		});

		});
		</script>
<script>
	var total = 0;
	$(function(){
	$(document).on('click', '.cart_delete', function(e){
	e.preventDefault();
	var id = $(this).data('id');
	$.ajax({
	type: 'POST',
	url: 'cart_delete.php',
	data: {id:id},
	dataType: 'json',
	success: function(response){
	if(!response.error){
	getDetails();
	getCart();
	getTotal();
	}
	}
	});
	});

	$(document).on('click', '.minus', function(e){
	e.preventDefault();
	var id = $(this).data('id');
	var qty = $('#qty_'+id).val();
	if(qty>1){
	qty--;
	}
	$('#qty_'+id).val(qty);
	$.ajax({
	type: 'POST',
	url: 'cart_update.php',
	data: {
	id: id,
	qty: qty,
	},
	dataType: 'json',
	success: function(response){
	if(!response.error){
	getDetails();
	getCart();
	getTotal();
	}
	}
	});
	});

	$(document).on('click', '.add', function(e){
	e.preventDefault();
	var id = $(this).data('id');
	var qty = $('#qty_'+id).val();
	qty++;
	$('#qty_'+id).val(qty);
	$.ajax({
	type: 'POST',
	url: 'cart_update.php',
	data: {
	id: id,
	qty: qty,
	},
	dataType: 'json',
	success: function(response){
	if(!response.error){
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

	function getDetails(){
	$.ajax({
	type: 'POST',
	url: 'cart_details1.php',
	dataType: 'json',
	success: function(response){
	$('#tbody1').html(response);
	getCart();
	}
	});
	}

	function getTotal(){
	$.ajax({
	type: 'POST',
	url: 'cart_total.php',
	dataType: 'json	',
	success:function(response){
	delivery1 = response;

	}
	});
	}	
	</script>
	
		</body>
		</html>
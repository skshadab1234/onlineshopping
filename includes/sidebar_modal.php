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
		overflow-y: auto;
	}
	
	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

/*Left*/
	.modal.left.fade .modal-dialog{
		left: -320px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}
	
	.modal.left.fade.in .modal-dialog{
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
	.men{
		color: white;
		margin-left: 30px;
	}

	.mendiv:hover .men{
		border-bottom: 2px solid white;
	}
	.mendiv:hover{
background-color: rgba(0,0,0, 0.9);
margin-left: 10px;
transition: 0.9s ease all;
		}
		.hoverprofile{
			opacity: 0.5;
		}

		.hoverprofile:hover{
			opacity: 1;
		}

.container3	{
 position: absolute;
}
.btnsk {
    display: inline-block;
    width: 277px;
    height: 50px;
    font-size: 1em;
    font-weight: bold;
    line-height: 50px;
    text-align: center;
    text-transform: uppercase;
    background-color: transparent;
    cursor: pointer;
    text-decoration:none;
    font-family: 'Roboto', sans-serif;
    font-weight:900;
    font-size:17px;
    letter-spacing: 0.045em;
}

.btnsk svg {
    position: absolute;
    top: 0;
    left: 0;
}

.btnsk svg rect {
    //stroke: #EC0033;
    stroke-width: 4;
    stroke-dasharray: 353, 0;
    stroke-dashoffset: 0;
    -webkit-transition: all 600ms ease;
    transition: all 600ms ease;
}

.btnsk span{
  background: rgb(255,130,130);
  background: -moz-linear-gradient(left,  rgba(255,130,130,1) 0%, rgba(225,120,237,1) 100%);
  background: -webkit-linear-gradient(left,  rgba(255,130,130,1) 0%,rgba(225,120,237,1) 100%);
  background: linear-gradient(to right,  rgba(255,130,130,1) 0%,rgba(225,120,237,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff8282', endColorstr='#e178ed',GradientType=1 );
  
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.btnsk:hover svg rect {
    stroke-width: 4;
    stroke-dasharray: 196, 543;
    stroke-dashoffset: 437;
}

	</style>

		<!-- cod modal -->
	
	<div class="modal fade" id="cod"  role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document" style="margin-top: 200px">
					<div class="modal-content">
						<div class="modal-header" style="background: #150d2d;">
							<h5 style="color: white;font-size: 20px">Are You Sure ?</h5>
						</div>
							<div class="modal-footer">
								<form action="cod.php" method="post">
								<button id="quickview"  data-dismiss="modal" aria-label="Close">Close</button>
								<button type="submit" class="btn-success" name="cod" >Proceed</button>
								</form>
							</div>
					</div>
			</div>
					</div>

<!-- mobile view sidebar navigation bar -->

<!-- Modal -->
	<div class="modal left fade" id="bar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div style="margin: 20px">
					<button type="button" class="pull-left" data-dismiss="modal" aria-label="Close" style="color: grey;background: transparent;border: none;"><span aria-hidden="true"><i class="fa fa-bars" style="font-size: 20px;opacity: 2;color: white;margin-top: 7px"></i></span></button>
					<span  style="margin-left: 20px;font-size: 25px;font-weight: 700;letter-spacing: 3px;width: 100%;" ><a href="index.php" style="color: white;">SKZONE</a></span>
				</div>
				<hr style="color: grey">
				<div class="modal-body">
				
					<div>
<?php

$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM category WHERE id=1");
$stmt->execute();
foreach($stmt as $row){
echo "<a href=\"category.php?category=".$row['cat_slug']."\"><div class=\"mendiv\" ><img src=\"images/category/men.webp\" width=\"50px\" style=\"border-radius: 50%\"><span class=\"men\">".$row['name']."</span></div>
</a>
";
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?>			
<br>

<?php

$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM category WHERE id=2");
$stmt->execute();
foreach($stmt as $row){
echo "<a href=\"category.php?category=".$row['cat_slug']."\"><div class=\"mendiv\"><img src=\"images/category/women.webp\" width=\"50px\" style=\"border-radius: 50%\"><span class=\"men\">".$row['name']."</span></div></a>";
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?>	
<br>
<?php

$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM category WHERE id=3");
$stmt->execute();
foreach($stmt as $row){
echo "<a href=\"category.php?category=".$row['cat_slug']."\"><div class=\"mendiv\"><img src=\"images/category/kids.webp\" width=\"50px\" style=\"border-radius: 50%\"><span class=\"men\">".$row['name']."</span></div></a>";
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?>			
<hr>
					
<?php
if(isset($_SESSION['user'])){
$image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
echo '

<h5 class="men" style="margin-left:-8px">Thank You For Becomming a User</h5>
';
}
else{
echo "
<h5 class=\"text-center\" style=\"color: white;letter-spacing:1px;line-height:15px\">Sign in to get all product updates on your registered mail</h5>

<li  style=\"display:inline-block;padding:10px;color:steelblue;border:1px solid #4285f4;margin-left:10px\"><a href='login.php' style=\"color: #4285f4;font-weight:600;\"><i class=\"fa fa-sign-in\" style=\"font-size:14px\"></i> &nbsp;LOGIN</a></li>
<li style=\"display:inline-block;padding:10px;color:steelblue;border:1px solid #4285f4;margin-left:10px\"><a href='signup.php' style=\"color:  #4285f4;font-weight:600;\"><i class=\"fa fa-user-plus\" style=\"font-size:14px\"></i> &nbsp;Sign Up</a></li>
";
}
?>

					</div>
				</div>
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->



<!-- user profile modal-dialog -->

<!-- Modal -->
	<div class="modal right fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div style="margin: 20px">
					<button type="button" class="pull-left" data-dismiss="modal" aria-label="Close" style="color: grey;background: transparent;border: none;"><span aria-hidden="true"><i class="fa fa-arrow-circle-left" style="font-size: 20px;opacity: 2;color: white;margin-top: 7px"></i></span></button>
					<span  style="margin-left: 20px;font-size: 25px;font-weight: 700;letter-spacing: 3px;width: 100%;" ><a href="profile.php" style="color: white;text-transform: uppercase;">profile</a></span>
				</div>
				<hr style="color: grey">
				<div class="modal-body">
				
					<div class="profile-card__img pull-left" style="margin-top: 30px;margin-left: 20px;border-radius: 50%;width: 50px;height: 50px">
<img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" width="100%" height="300px">
</div>


<div class="box-header">
<h4  style="color: white;text-align: center;margin-bottom: 20px;letter-spacing: 1px;" >&nbsp;<b><?php echo $user['firstname'].' '.$user['lastname']; ?></b></h4>
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

<a href="#edit"  class="btn btn-success btn-flat btn-sm pull-right" id="quickview" data-toggle="modal"><i class="fa fa-edit" style="font-size: 12px;line-height: 40px"></i> Edit My Profile</a>


				</div>
				
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->



<!-- user cart modal-dialog -->

<!-- Modal -->
	<div class="modal right fade"   id="cart1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" style="width: 620px" role="document">
			<div class="modal-content" >

				<div style="margin: 20px">
					<button type="button" class="pull-left" data-dismiss="modal" aria-label="Close" style="color: grey;background: transparent;border: none;"><span aria-hidden="true"><i class="fa fa-arrow-circle-left" style="font-size: 20px;opacity: 2;color: white;margin-top: 7px"></i></span></button>
					<span  style="margin-left: 20px;font-size: 25px;font-weight: 700;letter-spacing: 3px;width: 100%;" ><a href="cart_view.php" style="color: white;text-transform: uppercase;"><span class="cart_count" style="color: red"></span>   Product In your cart</a></span>
				</div>
				<hr style="color: grey">
				<div class="modal-body">
				
					<div id="tbody1" style="padding: 30px;">

	</div>
<div class="container3">
	<a href="cart_view.php" class="btnsk">
  <svg width="277" height="62">
    <defs>
        <linearGradient id="grad1">
            <stop offset="0%" stop-color="#FF8282"/>
            <stop offset="100%" stop-color="#E178ED" />
        </linearGradient>
    </defs>
     <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
  </svg>
  <!--<span>Voir mes réalisations</span>-->
    <span>View cart</span>
</a>
</div>

				</div>
				
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->



<!-- search modal-dialog -->

<div class="modal fade modal-fullscreen" id="search" style="padding: 0 !important;background: #0d0620;opacity: 0.9;height: 100vh">
    <div class="modal-dialog" style="width: 100%;margin: 0;padding: 0;">
            <div class="modal-header" style="color: black;position: relative;height: 70px;opacity: 1" >
            	<h2 class="pull-left">
            		<div class="navbar-header"> 
<a href="index.php" class="navbar-brand" id="searchlogo" style="margin-top: -24px;margin-left: -5px;color: black;font-weight: bolder;width: 150px" >
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

<button type="submit" id="myBtn" class="btn btn-default btn-flat" style="display: none" ><i class="fa fa-search" style="text-align: center;"></i></button>
</form> 
            </div>
            <div class="modal-body" style="background: #0d0620;opacity: 0.9;height: 100vh">
            	<div class="container-fluid my-3" style="padding: 20px;text-align: center;height: 100vh" >
            	<h2 align="left" style="font-family: calibri;font-weight: 700;color: white"> Top Searches</h2>

			<h2 align="left" style="font-family: calibri;font-weight: 700;color: white">Monthly Top Sellers</h2>
<div style="margin-top: 40px">
	
			<?php
			$month = date('m');
			$conn = $pdo->open();

			try{
			$inc = 4;	
			$stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
			$stmt->execute();
			foreach ($stmt as $row) {
			$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
			$inc = ($inc == 4) ? 1 : $inc + 1;
			if($inc == 4) echo "<div class='row'>";
		echo "
<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3 \">

    <div class=\"row\" >
      <div class=\"el-wrapper\">
        <div class=\"box-up\">
<a href='product.php?product=".$row['slug']."'><img src='".$image."' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a>    
  <div class=\"ribbon\">
      <span class=\"ribbon1\"><span>".$row['discount']." OFF </span></span>
    </div>

          <div class=\"img-info\">

            <div class=\"info-inner\">

		   <span class=\"p-company\">Brand : ".$row['brand']."</span>

              <span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>
            </div>
            <div class=\"a-size\">Available sizes : <span class=\"size\" style=\"color:white\">".$row['size']."</span></div>
          </div>

        </div>

        <div class=\"box-down\">
          <div class=\"h-bg\">
            <div class=\"h-bg-inner\"></div>
          </div>

          <p class=\"cart\">
            <span class=\"price\">&#36; ".number_format($row['price'], 2)."</span>
            <span class=\"add-to-cart\">
              <span class=\"txt\">
";?> 
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary btn-sm" id="quickview" data-toggle="modal" data-target="#<?php echo $row['id']; ?>"> Quick View </button>

<!-- Modal -->
<div id="<?php echo $row['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="background: #0d0620">
      <div class="modal-header" style="background: #0d0620">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo "<span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>
"; ?></h4>	 
<div class="ribbon">
      <span class="ribbon1"><span><?php echo "".$row['discount'].""; ?> OFF </span></span>
    </div>
      </div>
      <div class="modal-body" >
        <div class="container-fluid" style="color: white">
          <div class="row">
            <div class="col-sm-6">
              <?php echo "<a href='product.php?product=".$row['slug']."'><img src='".$image."' title=\"".$row['name']."\" class=\"img-thumbnail\"></a>"; ?>
            </div>
            <div class="col-sm-6">

              <?php echo "".$row['brand'].""; ?>
              <?php echo "<br>"; ?>
              <?php echo " <span class=\"p-name\" title=\"".$row['name']."\"><a style=\"font-size:14px;color:white;font-weight:600\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>"; ?>
              <br>
              <br>
              <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
               <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
              <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
              <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
              <i class="fa fa-star-o" style="color: orange;font-size: 14px"></i>
              <br><br>
                          <span class="price" style="color: white;font-size: 20px"><?php echo "&#36; ".number_format($row['price'], 2).""; ?></span>&nbsp;
                          <small style="font-size: 14px;"><s><?php echo "&#36; ".number_format($row['old_price'], 2).""; ?></s></small>
                            <br>
                          <br>

              <button class="btn btn-info" style="background-color: orange;border: orange"><?php echo "<a href='product.php?product=".$row['slug']."' style=\"font-size:14px;color:white;font-weight:600\">See Product Details</a>"; ?></button>
            </div>
          </div>
        </div>
      </div>
     
    </div>

  </div>
</div>

<?php  echo "
                </span>
            </span>
          </p>
        </div>
      </div>
    </div>
  </div>

	";
if($inc == 4) echo "</div>";
}
if($inc == 4) echo "<div class='col-sm-3'></div><div class='col-sm-3'></div></div>"; 
if($inc == 4) echo "<div class='col-sm-3'></div></div>";
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?> 

</div>
</div>
            </div>
    </div>
</div>
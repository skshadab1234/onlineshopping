	<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = '';

	if(isset($_SESSION['user'])){
	if(isset($_SESSION['cart'])){
	foreach($_SESSION['cart'] as $row){
	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
	$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$row['productid']]);
	$crow = $stmt->fetch();
	if($crow['numrows'] < 1){
	$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
	$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$row['productid'], 'quantity'=>$row['quantity']]);
	}
	else{
	$stmt = $conn->prepare("UPDATE cart SET quantity=:quantity WHERE user_id=:user_id AND product_id=:product_id");
	$stmt->execute(['quantity'=>$row['quantity'], 'user_id'=>$user['id'], 'product_id'=>$row['productid']]);
	}
	}
	unset($_SESSION['cart']);
	}

	try{
	$total = 0;
	$stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
	$stmt->execute(['user'=>$user['id']]);
	foreach($stmt as $row){
	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
	$subtotal = $row['price']*$row['quantity'];
	$total += $subtotal;
	$order = $total * ($row['old_price']-$row['price'])/  100;
	$order1 = $total - $order;
	$delivery = 15.00;
	$delivery1 = $order1 + $delivery;
	$output .= "
	<div style=\"padding:40px;border:1px solid #ddd;box-shadow: 0 9px 38px rgba(0,0,0,0.3), 0 5px 2px rgba(0,0,0,0.2);\" class=\"pull-center\">
	<div class=\"row\">
	<div class=\"col-sm-12\">
	<div class=\"col-sm-2 col-xs-2 col-md-2 col-lg-2\">
	<a href='product.php?product=".$row['slug']."'><img src='".$image."' class=\"img-responsive\" width='250px' height='250px' class=\"thumbnail\"></a>    
	</div>	
	<div class=\"col-sm-7 col-xs-7 col-md-7 col-lg-7\">
	<p><span style=\"font-weight:bold;\"><a style=\"font-size:12px;color:grey;\" href='product.php?product=".$row['slug']."'>".$row['brand']."</a></span><br><a style=\"font-size:12px;color:black;\" href='product.php?product=".$row['slug']."'>".$row['name']."</a><br><span style=\"font-weight:bold;color:grey\">&#36; ".number_format($row['price'], 2)." /- Only</span></p>
	<div class='input-group' >
	<span class='input-group-btn' >
	<button type='button' id='minus' class='btn  btn-flat minus' data-id='".$row['cartid']."'><i class='fa fa-minus'></i></button>
	</span>
	<input type='text' class='form-control' value='".$row['quantity']."' id='qty_".$row['cartid']."'>
	<span class='input-group-btn'>
	<button type='button' id='add' class='btn btn-flat add' data-id='".$row['cartid']."'><i class='fa fa-plus'></i>
	</button>
	</span>
	</div>
	</div>
	<div class=\"col-sm-3 col-xs-3 col-md-3 col-lg-3\">
	<p style=\"font-size:16px;font-weight:bold\" class=\"pull-right\">&#36; ".number_format($subtotal, 2)."</p>
	<br>
	</div>	
	<p> <span style=\"font-size:14px\"><s> &#36; ".number_format($row['old_price'], 2)."</s><span class=\"pull-right\" style=\"font-size:16px;color:orange;font-weight:200\"> -".$row['discount']." OFF </span></span></p>


	</div>
	</div> 

	<hr>	
	<button type='button' data-id='".$row['cartid']."' style=\"background:none;border:none;color:black;font-weight:300;letter-spacing:2px\"  class='btn-flat cart_delete'>Remove</button>
	<span class=\"vl\" style=\"border-left: 1px solid #ddd;padding:10px;margin-left:10px\"></span>
	<button type='button''  style=\"background:none;border:none;color:black;font-weight:300;letter-spacing:2px\" class=' btn-flat 	cart_delete'>Move to Wishlist</button>

	</div>
	<br>
	</div>
	
	";
	}
	$output .= "
<a href=\"wishlist.php\">
	<div style=\"border:1px solid #ddd;padding:20px;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);\">
	<h5 style=\"font-size:20px;color:black;font-weight:500;margin-left:20px\"><span><i class=\"fa fa-bookmark-o\"></i>&nbsp;&nbsp;&nbsp;Add More From Wishlist</span></h5>
	</div>
	</a>

	<div class=\"pull-right\">
	<h5 style=\"padding:20px;background:#fff;border:1px solid #ddd;color:black;letter-spacing:1px;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);\"><b>Grand Total : &#36; ".number_format($delivery1, 2)."</b></h5>
	</div>

	";

	}

	catch(PDOException $e){
	$output .= $e->getMessage();
	}

	}

	else{
	if(count($_SESSION['cart']) != 0){
	$total = 0;
	foreach($_SESSION['cart'] as $row){
	$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
	$stmt->execute(['id'=>$row['productid']]);
	$product = $stmt->fetch();
	$image = (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg';
	$subtotal = $product['price']*$row['quantity'];
	$total += $subtotal;
	$output .= "

	<div  style=\"padding:20px;border:1px solid #ddd;\">	
	<div class=\"row\">
	<div>
	<div class=\"col-sm-2 col-xs-2 col-md-2 col-lg-2\" >	
<a href='product.php?product=".$product['slug']."'><img src='".$image."' class=\"img-responsive\" width='250px' height='250px' class=\"thumbnail\"></a>   	
	</div>

	<div class=\"col-sm-7 col-xs-7 col-md-7 col-lg-7\">
	<p><span style=\"font-weight:bold;\"><a style=\"font-size:12px;color:grey;\" href='product.php?product=".$product['slug']."'>".$product['brand']."</a></span><br>
	<a style=\"font-size:12px;color:black;\" href='product.php?product=".$product['slug']."'>".$product['prodname']."</a><br><span style=\"font-weight:bold;color:grey\">&#36; ".number_format($product['price'], 2)." /- Only</span> <span style=\"font-size:14px\"><s> &#36; ".number_format($product['old price'], 2)."</s></sapn></p>

	<div class='input-group'>
	<span class='input-group-btn'>
	<button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='".$row['productid']."'><i class='fa fa-minus'></i></button>
	</span>
	<input type='text' class='form-control' value='".$row['quantity']."' id='qty_".$row['productid']."'>
	<span class='input-group-btn'>
	<button type='button' id='add' class='btn btn-default btn-flat add' data-id='".$row['productid']."'><i class='fa fa-plus'></i>
	</button>
	</span>
	</div>
	</div>
	<div class=\"col-sm-3 col-xs-3 col-md-3 col-lg-3\">
	<p style=\"font-size:16px;font-weight:bold\" class=\"pull-right\">&#36; ".number_format($subtotal, 2)."</p>
	<br>
	</div>	
	<p><span class=\"pull-right\" style=\"font-size:16px;color:orange;font-weight:200\"> -".$product['discount']." OFF </span></p>


	</div>
	</div> 

	<hr>	
	<button type='button' data-id='".$row['productid']."' style=\"background:none;border:none;color:black;font-weight:300;letter-spacing:2px\"  class='btn-flat cart_delete'>Remove</button>
	<span class=\"vl\" style=\"border-left: 1px solid #ddd;padding:10px;margin-left:10px\"></span>
	<button type='button''  style=\"background:none;border:none;color:black;font-weight:300;letter-spacing:2px\" class=' btn-flat 	cart_delete'>Move to Wishlist</button>

	</div>
	<br>
	</div>
	";

	}

	$output .= "
	
	<div class=\"pull-right\">
	<h5 style=\"padding:10px;border:1px solid #ddd;color:black;letter-spacing:1px\"><b>Grand Total : &#36; ".number_format($total, 2)."</b></h5>
	</div>
	";
	}

	else{
	$output .= "
	<div class=\"container-fluid\" align=\"center\"><img src=\"images/cartempty.png\" class=\"img-responsive\" width='550px' height='500px'>
	</div>
	";
	}

	}		

	$pdo->close();
	echo json_encode($output);

	?>



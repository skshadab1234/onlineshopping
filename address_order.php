	<?php
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
   <div style=\"padding:10px;border:1px solid #ddd\" class=\"pull-center\">
	<div class=\"row\">
		<div class=\"col-sm-12\">
<h5 class=\"mens\" style=\"color:grey;font-size:16px\">Product Overview</h5>

<table class=\"table table-borderless\" style=\"color:grey\">
<thead>
<tr>
<td><div style=\"background:red;width:60px;\"><a href='product.php?product=".$row['slug']."'><img src='".$image."' class=\"img-responsive\" width='60px'  class=\"thumbnail\"></a></div><td>
<td>
<span style=\"font-weight:bold;\">".$row['brand']."</span><br><a href='product.php?product=".$row['slug']."' style=\"color:white;font-size:12px\">".$row['name']."</a><span style=\"color:white\"><br>&#36; ".number_format($row['price'], 2)."</span> &nbsp;<span><s>&#36; ".number_format($row['old_price'], 2)."</s></span>
<span style=\"color:white\"><br>Qty: ".$row['quantity']."</span>
</td></tr>
</thead>
</table>
		</div>	 	
	</div>
	</div>
	";
	}
	$output .= "
<div style=\"padding:20px;border:1px solid #ddd\" class=\"pull-center\">
	<div class=\"row\">

	<div class=\"col-sm-12\">
<span><h5 class=\"mens\" style=\"color:grey;font-size:20px\">Price Details

<input type=\"button\" class=\"button-base-button pull-right\" value=\"UPDATE\" onClick=\"document.location.reload(true)\"></h5></span>


<table class=\"table table-borderless\" style=\"color:white\">
<thead>
<tr>
<td>Bag total</td>
<td ><span class=\"pull-right\">&#36; ".number_format($total, 2)."</span><td>
</tr>
<tr>
<td>Bag Discount</td>
<td  style=\"color:white\"> <span class=\"pull-right\">&#36;".number_format($order, 2)."</span>
 <td>
</tr>
<tr>
<td>Order Total</td>
<td><span class=\"pull-right\">&#36;".number_format($order1,2)."</span>
 <td>
</tr>
<tr>
<td>Delivery Charges</td>
<td  style=\"color:white\"><span class=\"pull-right\">&#36;".number_format($delivery, 2)."</span>
 <td>
</tr>
<tr>
<td style=\"font-weight:600;font-size:16px;color:white;letter-spacing:1px\">Grand Total</td>
<td  style=\"font-weight:600;font-size:16px;color:white;letter-spacing:1px\"><span class=\"pull-right\">&#36;".number_format($delivery1, 2)."</span>
 <td>
</tr>
</thead>
</table>
</div>
</div>	
<h2> ".@$_GET['blank']." </h2>
        <div id=\"disp\"></div>

	";

	}

	catch(PDOException $e){
	$output .= $e->getMessage();
	}



	echo($output);

}
$pdo->close();

?>

<script type="text/javascript">
$(document).ready(function(){
$("#check").click(function() {
var name = $('#name').val();
if(name=="")
{
$("#disp").html("");
}
else
{
$.ajax({
type: "POST",
url: "pin_check.php",
data: "pincode="+ name ,
success: function(html){
$("#disp").html(html);
}
});
return false;
}
});
});
</script>



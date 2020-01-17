<?php 
include 'includes/session.php';
?>
<?php
if(!isset($_SESSION['user'])){
header('location: index.php');
}
include 'includes/header.php';
?>
<head>
<title>Payment</title>
<style>
.btn-success:hover{
  background-image:linear-gradient(253deg,  rgb(127, 13, 255), rgb(89, 9, 179));
  transition: 0.5s ease all;
}
</style>
<link href="images/favicon.jpg" rel="icon">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<?php include 'includes/navbar.php' ?>	
      <div class="content-wrapper" >
   <div class="container-fluid" align="center" style="user-select: none;">
  <ul style="margin:25px;">
  <li  style="display: inline-block;padding: 10px 10px" title="step 1"><p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;"><a href="cart_view.php" style="color: grey">Bag</a></p></li>----------------
  
  <li style="display: inline-block;padding: 10px 10px" title="step 2"><p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;border-bottom: 2px solid #20bd99;color: #20bd99">Payment</p></li>----------------
    <li  style="display: inline-block;padding: 10px 10px" title="step 3"><p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;cursor: not-allowed;">Order Confirmation</p></li>
  </ul>
  </div>
<div class="container-fluid">
<div class="row">
<div class="col-sm-8" style="padding: 20px">
<div class="col-sm-6">
<div  style="height:300px;position:relative;border:1px solid #323232;border-radius:5px">
<div class="box-header">
<h3>Shipping Address</h3>
<hr>
<div class="box-body">
<?php 
if(isset($_SESSION['user'])){
  echo "<div><span style=\"font-weight:700;font-size:17px;padding:10px\">Address : </span>".$user['shippingaddress']." </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">State : </span> ".$user['shippingstate']." </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">City : </span>".$user['shippingcity']." </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">Pincode : </span>".$user['shippingpincode']." </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">Mobile : </span>".$user['shipping_mb']." </div>

  ";
}
?>
<button class="btn btn-success" style="position:absolute;top:0px;right:0;"><i class="fa fa-edit"></i> Edit</button>
</div>
</div>
</div>
</div>
<!-- Billing Address -->
<div class="col-sm-6">
<div  style="width:100%;height:300px;border:1px solid #323232;border-radius:5px">
<div class="box-header">
<h3 >Billing Address</h3>
<hr>
<div class="container-fluid">
<?php 
if(isset($_SESSION['user'])){
  echo "<div><span style=\"font-weight:700;font-size:17px;padding:10px\">Address : </span>".$user['billing_add']." </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">State : </span> ".$user['billing_state']." </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">City : </span>".$user['billing_city']." </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">Pincode : </span>".$user['billing_pincode']." </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">Mobile : </span>".$user['billing_mb']." </div>

  ";
}
?>
<button class="btn btn-success" data-toggle="modal" data-target="#profile" style="position:absolute;top:0px;right:0;"><i class="fa fa-edit"></i>Edit</button>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-4">
  <?php include 'address_order.php' ?>
</div>

</div>
</div>
</div> 
  </div>
<?php  include 'includes/scripts.php'; ?>
<?php  include 'includes/sidebar_modal.php'; ?>

	<?php  include 'includes/footer.php'; ?>

</body>
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
url: 'cart_details.php',
dataType: 'json',
success: function(response){
$('#tbody').html(response);
getCart();
}
});
}

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
<!-- Paypal Express -->
<script>
paypal.Button.render({
env: 'sandbox', // change for production if app is live,

client: {
sandbox:  'ASb1ZbVxG5ZFzCWLdYLi_d1-k5rmSjvBZhxP2etCxBKXaJHxPba13JJD_D3dTNriRbAv3Kp_72cgDvaZ',
//production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
},

commit: true, // Show a 'Pay Now' button

style: {
color: 'gold',
size: 'large'
},

payment: function(data, actions) {
return actions.payment.create({
payment: {
transactions: [
{
//total purchase
amount: { 
total: delivery1, 
currency: 'USD' 
}
}
]
}
});
},

onAuthorize: function(data, actions) {
return actions.payment.execute().then(function(payment) {
window.location = 'sales.php?pay='+payment.id;
});
},

}, '#paypal-button');
</script>

<script type="text/javascript">
// To ensure only valid mobile numbers(7000000000 to 9999999999) are entered
$('body').on('keyup', '.js-input-mobile', function () {
var $input = $(this),
value = $input.val(),
length = value.length,
inputCharacter = parseInt(value.slice(-1));

if (!((length > 1 && in putCharacter >= 0 && inputCharacter <= 9) || (length === 1 && inputCharacter >= 7 && inputCharacter <= 9))) {
$input.val(value.substring(0, length - 1));
}
}); 

</script>

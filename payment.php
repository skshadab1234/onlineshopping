<?php
if(isset($_SESSION['user'])){
header('location: index.php');
}
?>
<?php 
include 'includes/session.php';

include 'includes/header.php';

?>


<head>
<title>Payment</title>
<link href="images/favicon.jpg" rel="icon">
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900);
.contact-form {
margin-top: 30px;
}


@media (min-width: 768px) {
.contact-wrap {
width: 60%;
margin: auto;
}
}

/*** START BS OVERRIDES ***/
.features {
padding: 30px 0;
}
.features.light-brown {
  color: white;
}
.features h2.section-title {
font-size: 22px;
text-transform: uppercase;
margin: 0;
text-align: center;
}
.features .v-tabs .v-tab-head a,
.features .v-tabs a.v-tab-head {
color: white  ;
cursor: pointer;
text-transform: uppercase;
display: block;
padding: 15px 30px 15px 15px;
border-right: 1px solid #33cc66;
border-top: 1px solid #33cc66;
border-bottom: 1px solid #33cc66;
margin: 5px	;
text-align: center;
border-left: 10px solid #33cc66;
font: 12px "Raleway", "franklin-gothic-urw", "Helvectica Neue", helvetica, clean, sans-serif;
}
.features .v-tabs .v-tab-head a.active, .features .v-tabs .v-tab-head a:hover,
.features .v-tabs a.v-tab-head.active,
.features .v-tabs a.v-tab-head:hover {
font-weight: bold;
color: #33cc66;
transition: 0.5s ease all;
text-decoration: none;
}
.features .v-tabs .v-tab-head a {
position: relative;
display: block;
}
.features .v-tabs .v-tab-head a.active::after, .features .v-tabs .v-tab-head a.active::before {
content: "";
border-style: solid;
border-width: 15px;
position: absolute;
right: 0;
top: 15px;
transform: rotate(90deg);
-ms-transform: rotate(90deg);
-webkit-transform: rotate(90deg);
-o-transform: rotate(90deg);
-moz-transform: rotate(90deg);
}
.features .v-tabs .v-tab-head a.active::before {
border-color: #3fcf6e transparent transparent;
}
.features .v-tabs .v-tab-head a.active::after {
margin-right: -1px;
border-color: #faf8f5 transparent transparent;
}
.features .v-tabs a.v-tab-head {
border: none;
padding: 15px 0;
text-align: left;
position: relative;
}
.features .v-tabs a.v-tab-head:after {
color: #e2dcd6;
content: "\f054";
font-family: FontAwesome;
position: absolute;
right: 10px;
top: 50%;
transform: translateY(-50%);
-webkit-transform: translateY(-50%);
-moz-transform: translateY(-50%);
-o-transform: translateY(-50%);
}
.features .v-tabs a.v-tab-head.active::after {
color: #3c6;
content: "\f078";
}
.features .v-tabs .v-tab-pane {
padding: 0 15px;
}
.features .v-tabs .v-tab-pane ul {
list-style: outside none none;
margin: 0;
padding: 0;
}
.features .v-tabs .v-tab-pane ul li {
border-bottom: 1px solid #e2dcd6;
color: #292929;
font-size: 16px;
padding: 15px 0;
}
.features .v-tabs .v-tab-pane ul li i {
color: #4c81b6;
cursor: pointer;
font-weight: bold;	
font-size: 12px;
}
.features .v-tabs .v-tab-pane .in {
border-top: none;
padding-top: 0;
}
.features .v-tabs .v-tab-pane .popover {
border: 1px solid #014d7e !important;
border-radius: 0;
width: auto;
margin: 10px 0 0 0;
max-width: 276px;
left: auto;
box-shadow: none;
}
.features .v-tabs .v-tab-pane .popover.bottom .arrow {
border-bottom-color: #014d7e;
}
.features .v-tabs .v-tab-pane .popover .popover-content {
font-size: 14px;
padding: 15px;
text-align: center;
}

@media screen and (max-width: 768px) {
.features.light-brown {
border-top: 0 none;
}
.features h2.section-title {
font-size: 32px;
}
.features .v-tabs .v-tab-pane .in {
border-top: 1px solid #DDD;
border-bottom: 2px solid #DDD;
}
.features .popover {
margin: 10px 5% 0;
max-width: none;
width: 90%;
}

}

#submit{
	width: 100%;
	margin-top: 10px;
	padding: 20px;
	color: white;
	border: none;
	border-radius: 2px;
	background: #33cc66;
}
#submit:hover{
	background: transparent;
	color:#33cc66;
	border: 2px solid #33cc66;
	border-radius: 2px;
}



/*--------------------
Buttons
--------------------*/
.btn {
  display: block;
  background: #bded7d;
  color: white;
  text-decoration: none;
  margin: 20px 0;
  padding: 15px 15px;
  border-radius: 5px;
  position: relative;
}
.btn::after {
  content: '';
  position: absolute;
  z-index: 1;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transition: all .2s ease-in-out;
  box-shadow: inset 0 3px 0 rgba(0, 0, 0, 0), 0 3px 3px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
}
.btn:hover::after {
  background: rgba(0, 0, 0, 0.1);
  box-shadow: inset 0 3px 0 rgba(0, 0, 0, 0.2);
}

/*--------------------
Form
--------------------*/
.form fieldset {
  border: none;
  padding: 0;
  padding: 10px 0;
  position: relative;
  clear: both;
}
.form fieldset.fieldset-expiration {
  float: left;
  width: 60%;
  color: red;
}
.form fieldset.fieldset-expiration .select {
  width: 84px;
  color: red;
  margin-right: 12px;
  float: left;
}
.form fieldset.fieldset-ccv {
  clear: none;
  float: right;
  width: 86px;
}
.form fieldset label {
  display: block;
  text-transform: uppercase;
  font-size: 11px;
  color: rgba(0, 0, 0, 0.6);
  margin-bottom: 5px;
  font-weight: bold;
  font-family: Inconsolata;
}
.form fieldset input,
.form fieldset .select {
  width: 100%;
  height: 38px;
  color: #333333;
  padding: 10px;
  border-radius: 5px;
  font-size: 15px;
  outline: none !important;
  border: 1px solid rgba(0, 0, 0, 0.3);
  box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);
}
.form fieldset input.input-cart-number,
.form fieldset .select.input-cart-number {
  width: 82px;
  display: inline-block;
  margin-right: 8px;
}
.form fieldset input.input-cart-number:last-child,
.form fieldset .select.input-cart-number:last-child {
  margin-right: 0;
}
.form fieldset .select {
  position: relative;
}
.form fieldset .select::after {
  content: '';
  border-top: 8px solid #222;
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  position: absolute;
  z-index: 2;
  top: 14px;
  right: 10px;
  pointer-events: none;
}
.form fieldset .select select {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  position: absolute;
  padding: 0;
  border: none;
  width: 100%;
  outline: none !important;
  top: 6px;
  left: 6px;
  background: none;
}
.form fieldset .select select :-moz-focusring {
  color: transparent;
  text-shadow: 0 0 0 #000;
}
.form button {
  width: 100%;
  outline: none !important;
  background: linear-gradient(180deg, #49a09b, #3d8291);
  text-transform: uppercase;
  font-weight: bold;
  border: none;
  box-shadow: none;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  margin-top: 90px;
}
.form button .fa {
  margin-right: 6px;
}

/*--------------------
Checkout
--------------------*/
.checkout {
  margin: 150px auto 30px;
  position: relative;
  width: 460px;
  background: white;
  border-radius: 15px;
  padding: 160px 45px 30px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

/*--------------------
Credit Card
--------------------*/
.credit-card-box {
  -webkit-perspective: 1000;
          perspective: 1000;
  width: 400px;
  height: 280px;
  position: absolute;
  top: -112px;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
}
.credit-card-box:hover .flip, .credit-card-box.hover .flip {
  -webkit-transform: rotateY(180deg);
          transform: rotateY(180deg);
}
.credit-card-box .front,
.credit-card-box .back {
  width: 400px;
  height: 250px;
  border-radius: 15px;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  background: linear-gradient(135deg, #bd6772, #53223f);
  position: absolute;
  color: #fff;
  font-family: Inconsolata;
  top: 0;
  left: 0;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.3);
}
.credit-card-box .front::before,
.credit-card-box .back::before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: url("http://cdn.flaticon.com/svg/44/44386.svg") no-repeat center;
  background-size: cover;
  opacity: .05;
}
.credit-card-box .flip {
  transition: 0.2s;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  position: relative;
}
.credit-card-box .logo {
  position: absolute;
  top: 9px;
  right: 20px;
  width: 60px;
}
.credit-card-box .logo svg {
  width: 100%;
  height: auto;
  fill: #fff;
}
.credit-card-box .front {
  z-index: 2;
  -webkit-transform: rotateY(0deg);
          transform: rotateY(0deg);
}
.credit-card-box .back {
  -webkit-transform: rotateY(180deg);
          transform: rotateY(180deg);
}
.credit-card-box .back .logo {
  top: 185px;
}
.credit-card-box .chip {
  position: absolute;
  width: 60px;
  height: 45px;
  top: 20px;
  left: 20px;
  background: linear-gradient(135deg, #ddccf0 0%, #d1e9f5 44%, #f8ece7 100%);
  border-radius: 8px;
}
.credit-card-box .chip::before {
  content: '';
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  border: 4px solid rgba(128, 128, 128, 0.1);
  width: 80%;
  height: 70%;
  border-radius: 5px;
}
.credit-card-box .strip {
  background: linear-gradient(135deg, #404040, #1a1a1a);
  position: absolute;
  width: 100%;
  height: 50px;
  top: 30px;
  left: 0;
}
.credit-card-box .number {
  position: absolute;
  margin: 0 auto;
  top: 103px;
  left: 19px;
  font-size: 38px;
}
.credit-card-box label {
  font-size: 10px;
  letter-spacing: 1px;
  text-shadow: none;
  text-transform: uppercase;
  font-weight: normal;
  opacity: 0.5;
  display: block;
  margin-bottom: 3px;
}
.credit-card-box .card-holder,
.credit-card-box .card-expiration-date {
  position: absolute;
  margin: 0 auto;
  top: 180px;
  left: 19px;
  font-size: 22px;
  text-transform: capitalize;
}
.credit-card-box .card-expiration-date {
  text-align: right;
  left: auto;
  right: 20px;
}
.credit-card-box .ccv {
  height: 36px;
  background: #fff;
  width: 91%;
  border-radius: 5px;
  top: 110px;
  left: 0;
  right: 0;
  position: absolute;
  margin: 0 auto;
  color: #000;
  text-align: right;
  padding: 10px;
}
.credit-card-box .ccv label {
  margin: -25px 0 14px;
  color: #fff;
}

.the-most {
  position: fixed;
  z-index: 1;
  bottom: 0;
  left: 0;
  width: 50vw;
  max-width: 200px;
  padding: 10px;
}
.the-most img {
  max-width: 100%;
}

</style>
</head>
<body class="hold-transition skin-blue layout-top-nav">


<?php include'includes/navbar.php' ?>	
      <div class="content-wrapper" >
   <div class="container-fluid" align="center" style="user-select: none;">
  <ul>
  <li  style="display: inline-block;padding: 10px 10px" title="step 1"><p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;"><a href="cart_view.php" style="color: grey">Bag</a></p></li>----------------
  
  <li style="display: inline-block;padding: 10px 10px" title="step 2"><p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;border-bottom: 2px solid #20bd99;color: #20bd99">Payment</p></li>----------------
    <li  style="display: inline-block;padding: 10px 10px" title="step 3"><p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;cursor: not-allowed;">Order Confirmation</p></li>
  </ul>
  </div>

  


<div class="container-fluid">
<div class="row">
<div class="col-sm-8" style="padding: 20px">
<div class="light-brown features" id="features">
<section class="container-fluid">
<div class="row v-tabs">
<div class="col-sm-4 v-tab-head hidden-xs">
<a class="v-tab-link active" data-target="#coreFeatures-tab">Pay with instamojo</a>
<a class="v-tab-link" data-target="#designingBuildingTools-tab">Cash on Delivery</a>
<a class="v-tab-link" data-target="#hostingUtilitiesSettings-tab">credit/debit card</a>
<a class="v-tab-link" data-target="#email-tab">Paypal</a>
</div>
<div class="col-sm-8 v-tab-pane">
<a class="v-tab-head v-tab-link visible-xs active" data-target="#coreFeatures-tab">PAY WITH INSTAMOJO</a>
<div id="coreFeatures-tab" class="collapse fade in">
<ul>
<?php 
$output = '';
try{
$total = 0;
$stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
$stmt->execute(['user'=>$user['id']]);
foreach($stmt as $row){
$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
$product = $row['name'];
$subtotal = $row['price']*$row['quantity'];
$total += $subtotal;
$order = $total * ($row['old_price']-$row['price'])/  100;
$order1 = $total - $order;
$delivery = 15.00;
$delivery1 = $order1 + $delivery;
$randomNum=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 11);

$output ="";

$output .= "

<form action=\"pay.php\" class=\"contact-form\" id=\"myForm\" method=\"POST\" >
<div class=\"col-sm-6\">
<input class=\"form-control\" type=\"hidden\" required=\"\" name=\"product_name\" value=\"$product\">
<input class=\"form-control\" type=\"hidden\" required=\"\" name=\"price\" value=\"$delivery1\">

<div class=\"input-block\">
<label for=\"\">Enter Your Name <span style=\"color: red\">*</span></label>
<input class=\"form-control\" id=\"name\" type=\"text\" required=\"\" oninput=\"myFunction()\" name=\"name\" value=\"\">
</div>
</div>
<div class=\"col-sm-6\">
<div class=\"input-block\">
<label for=\"\">Email <span style=\"color: red\">*</span></label>
<input class=\"form-control\" type=\"email\" id=\"email\" required=\"\" oninput=\"myFunction1()\" name=\"email\">
</div>
</div>
<div class=\"col-sm-12\">
<div class=\"input-block\">
<label for=\"\">Mobile Number <span style=\"color: red\">*</span></label>
<input type=\"tel\" maxlength=\"10\" id=\"phone\" class=\"form-control js-input-mobile\"/ oninput=\"myFunction2()\" required=\"\" name=\"phone\">
</div>
</div>


<div class=\"col-sm-12\">
<button type=\"submit\" name=\"submit\"  style=\"width:100%;align-items:center;margin:20px 120px\"  class=\"btn-success\">Paynow  &#36; ".number_format($delivery1, 2)."</button>
</div>
</form>


";
}
}
catch(PDOException $e){
$output .= $e->getMessage();
}
echo($output);

$pdo->close();

?>

</ul>
</div>
<a class="v-tab-head v-tab-link visible-xs" data-target="#designingBuildingTools-tab">CASH ON DELIVERY</a>
<div id="designingBuildingTools-tab" class="collapse fade"><br>
  <div class="text-title" style="font-weighteight: bolder;">CASH ON DELIVERY</div>
  <p style="font-size: 12px">Pay when product reached at your home</p>
<input type="submit" name="cod" data-toggle="modal" data-target="#cod" class=" btn-success"  style="margin: 40px 120px;font-size: 14px;max-width: 200px" value="CASH ON DELIVERY">
</div>
<a class="v-tab-head v-tab-link visible-xs" data-target="#hostingUtilitiesSettings-tab">CREDIT/DEBIT CARD</a>
<div id="hostingUtilitiesSettings-tab" class="collapse fade">

<div class="checkout">
  <div class="credit-card-box">
    <div class="flip">
      <div class="front">
        <div class="chip"></div>
        <div class="logo">
          <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               width="47.834px" height="47.834px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;">
            <g>
              <g>
                <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                         c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                         c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                         M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                         c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                         c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                         l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                         C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                         C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                         c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                         h-3.888L19.153,16.8z"/>
              </g>
            </g>
          </svg>
        </div>
          <div class="number"></div>
        <div class="card-holder">
          <label>Card holder</label>
          <div></div>
        </div>
        <div class="card-expiration-date">
          <label>Expires</label>
          <div></div>
        </div>
      </div>
      <div class="back">
        <div class="strip"></div>
        <div class="logo">
          <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               width="47.834px" height="47.834px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;">
            <g>
              <g>
                <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                         c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                         c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                         M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                         c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                         c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                         l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                         C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                         C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                         c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                         h-3.888L19.153,16.8z"/>
              </g>
            </g>
          </svg>

        </div>
        <div class="ccv">
          <label>CCV</label>
          <div></div>
        </div>
      </div>
    </div>
  </div>
  <form class="form" autocomplete="off" novalidate>
    <fieldset>
      <label for="card-number">Card Number</label>
      <input type="num" id="card-number" class="input-cart-number" maxlength="4" />
      <input type="num" id="card-number-1" class="input-cart-number" maxlength="4" />
      <input type="num" id="card-number-2" class="input-cart-number" maxlength="4" />
      <input type="num" id="card-number-3" class="input-cart-number" maxlength="4" />
    </fieldset>
    <fieldset>
      <label for="card-holder">Card holder</label>
      <input type="text" id="card-holder" maxlength="30" />
    </fieldset>
    <fieldset class="fieldset-expiration">
      <label for="card-expiration-month">Expiration date</label>
      <div class="select">
        <select id="card-expiration-month">
          <option></option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
        </select>
      </div>
      <div class="select">
        <select id="card-expiration-year">
          <option></option>
          <option>2016</option>
          <option>2017</option>
          <option>2018</option>
          <option>2019</option>
          <option>2020</option>
          <option>2021</option>
          <option>2022</option>
          <option>2023</option>
          <option>2024</option>
          <option>2025</option>
        </select>
      </div>
    </fieldset>
    <fieldset class="fieldset-ccv">
      <label for="card-ccv">CCV</label>
      <input type="text" id="card-ccv" maxlength="3" />
    </fieldset>
    <button id="quickview" style="margin: 10px 100px;background: #7f0dff;border: none;"><i class="fa fa-lock"></i> submit</button>
  </form>
</div>

</div>
<a class="v-tab-head v-tab-link visible-xs" data-target="#email-tab">Paypal</a>
<div id="email-tab" class="collapse fade">
<ul>
<li style="color: white">Pay Using Paypal  <i data-toggle="popover" data-placement="bottom" data-content="Payflow Gateway is PayPal's secure and open payment gateway. ... PayPal Payments Pro merchants use PayPal as their credit card processor, while Payflow Gateway merchants can choose to process their online store payments with any major payment processor, bank, or card association. " class="fa fa-question-circle" data-original-title="" title=""></i></li>
<div style="text-align:center;margin-top:40px">
<div id='paypal-button'></div>
</div>
</ul>
</div>
</div>
</section>
</div>


</div>
<div class="col-sm-4">
  <?php include 'address_order.php' ?>
<?php 
echo "
<h5 style=\"font-weight:bold;text-transform:uppercase;color:white\">Delivery to:</h5>
<span><h4 style=\"font-size:16px;font-weight:bold;color:white;letter-spacing:1px\" id=\"wrotename\"></h4><span class=\"pull-right\" id=\"wroteaddresstype\" style=\"background:#ddd;padding:5px;font-size:11px;border-radius:5px;letter-spacing:1px;text-transform:uppercase\"></span></span>
<h6 style=\"text-transform:capitalize;color:white\" id=\"wroteaddress\"></h6>
<h6 style=\"text-transform:capitalize;color:white\" id=\"wrotephone\"></h6>
<h6 style=\"text-transform:capitalize;color:white\" id=\"wrotecountry\"></h6>
<h6 style=\"text-transform:capitalize;color:white\" id=\"wrotestate\">  </h6>
<h6 style=\"text-transform:capitalize;color:white\" id=\"wrotedistrict\"></h6>
<h6 style=\"text-transform:capitalize;font-size:16px;font-weight:bold;color:white\" id=\"wroteaddress\"></h6>
";
?>

</div>

</div>
</div>
</div> 
  </div>
<?php  include 'includes/scripts.php'; ?>
<?php  include 'includes/sidebar_modal.php'; ?>

	<?php  include 'includes/footer.php'; ?>

</body>
<script type="text/javascript">
//material contact form animation
$(".contact-form")
.find(".form-control")
.each(function () {
var targetItem = $(this).parent();
if ($(this).val()) {
$(targetItem)
.find("label")
.css({
top: "-6px"
, fontSize: "16px"
, color: "white"
});
}
});
$(".contact-form")
.find(".form-control")
.focus(function () {
$(this)
.parent(".input-block")
.addClass("focus");
$(this)
.parent()
.find("label")
.animate({
top: "-6px"
, left: "10px"
, fontSize: "16px"
, color: "#fff"
}
, 200
);
});
$(".contact-form")
.find(".form-control")
.blur(function () {
if ($(this).val().length == 0) {
$(this)
.parent(".input-block")
.removeClass("focus");
$(this)
.parent()
.find("label")
.animate({
top: "20px"
, left: "10px"
, fontSize: "16px"
}
, 300
);
}
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
sandbox:    'ASb1ZbVxG5ZFzCWLdYLi_d1-k5rmSjvBZhxP2etCxBKXaJHxPba13JJD_D3dTNriRbAv3Kp_72cgDvaZ',
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
<!-- JS -->
<script type="text/javascript">
$(document).ready(function() {

$('[data-toggle="popover"]').popover({trigger: 'hover'});

$('.v-tab-head .v-tab-link').mouseover(tabHandler);
$('.v-tab-head.v-tab-link').click(tabHandler);

});

var tabHandler = function(e) {
e.preventDefault();

var target = $($(this).data('target')),
tabLink = $('.v-tab-link[data-target="' + $(this).data('target') + '"]');

tabPanelToShow(tabLink);
tabLinkToActivate(target);

};

var tabPanelToShow = function(elem) {
$('.v-tab-link').removeClass('active').parent().find(elem).addClass('active');
};

var tabLinkToActivate = function(elem) {
$('.v-tab-pane').children('div').removeClass('in').parent().find(elem).addClass('in');
};

</script>
<script type="text/javascript">
	$('.input-cart-number').on('keyup change', function(){
  $t = $(this);
  
  if ($t.val().length > 3) {
    $t.next().focus();
  }
  
  var card_number = '';
  $('.input-cart-number').each(function(){
    card_number += $(this).val() + ' ';
    if ($(this).val().length == 4) {
      $(this).next().focus();
    }
  })
  
  $('.credit-card-box .number').html(card_number);
});

$('#card-holder').on('keyup change', function(){
  $t = $(this);
  $('.credit-card-box .card-holder div').html($t.val());
});

$('#card-holder').on('keyup change', function(){
  $t = $(this);
  $('.credit-card-box .card-holder div').html($t.val());
});

$('#card-expiration-month, #card-expiration-year').change(function(){
  m = $('#card-expiration-month option').index($('#card-expiration-month option:selected'));
  m = (m < 10) ? '0' + m : m;
  y = $('#card-expiration-year').val().substr(2,2);
  $('.card-expiration-date div').html(m + '/' + y);
})

$('#card-ccv').on('focus', function(){
  $('.credit-card-box').addClass('hover');
}).on('blur', function(){
  $('.credit-card-box').removeClass('hover');
}).on('keyup change', function(){
  $('.ccv div').html($(this).val());
});


/*--------------------
CodePen Tile Preview
--------------------*/
setTimeout(function(){
  $('#card-ccv').focus().delay(1000).queue(function(){
    $(this).blur().dequeue();
  });
}, 500);

function getCreditCardType(accountNumber) {
  if (/^5[1-5]/.test(accountNumber)) {
    result = 'mastercard';
  } else if (/^4/.test(accountNumber)) {
    result = 'visa';
  } else if ( /^(5018|5020|5038|6304|6759|676[1-3])/.test(accountNumber)) {
    result = 'maestro';
  } else {
    result = 'unknown'
  }
  return result;
}

$('#card-number').change(function(){
  console.log(getCreditCardType($(this).val()));
})
</script>

<script type="text/javascript">
// To ensure only valid mobile numbers(7000000000 to 9999999999) are entered
$('body').on('keyup', '.js-input-mobile', function () {
var $input = $(this),
value = $input.val(),
length = value.length,
inputCharacter = parseInt(value.slice(-1));

if (!((length > 1 && inputCharacter >= 0 && inputCharacter <= 9) || (length === 1 && inputCharacter >= 7 && inputCharacter <= 9))) {
$input.val(value.substring(0, length - 1));
}
}); 

$('body').on('keyup', '.js-input-mobile1', function () {
var $input = $(this),
value = $input.val(),
length = value.length,
inputCharacter = parseInt(value.slice(-1));

if (!((length > 1 && inputCharacter >= 0 && inputCharacter <= 6) || (length === 1 && inputCharacter >= 4 && inputCharacter <= 6))) {
$input.val(value.substring(0, length - 1));
}
}); 
</script>

<script>
function myFunction() {
  var a = document.getElementById("name").value;
  document.getElementById("wrotename").innerHTML = "" + a +  " (Default)"; 
   
}
</script>
<script>
function myFunction1() {
  var b = document.getElementById("email").value;
  document.getElementById("wroteemail").innerHTML = "" + b; 
}
</script>
<script>
function myFunction2() {
  var c = document.getElementById("phone").value;
  document.getElementById("wrotephone").innerHTML = "Mobile: " + c; 
}
</script>
<script>
function myFunction3() {
  var d = document.getElementById("countySel").value;
  document.getElementById("wrotecountry").innerHTML = "Country: " + d; 
}
</script>
<script>
function myFunction4() {
  var e = document.getElementById("stateSel").value;
  document.getElementById("wrotestate").innerHTML = "State: " + e; 
}
</script>
<script>

function myFunction5() {
  var f = document.getElementById("districtSel").value;
  document.getElementById("wrotedistrict").innerHTML = "District: " + f; 
}
</script>


<script>
function myFunction6() {
  var g = document.getElementById("address").value;
  document.getElementById("wroteaddress").innerHTML = "" + g; 
}
</script>
<script>
function myFunction7() {
  var h = document.getElementById("addresstype").value;
  document.getElementById("wroteaddresstype").innerHTML = "" + h; 
}
</script>
<script type="text/javascript">
  $(document).ready(function() {

    $('#myForm').submit(function(e) {
      e.preventDefault();

      $.ajax({

        url: 'addressconfirm.php',
        method: 'POST',
        data: $("#myForm input").serialize(),

        success: function(response) {
    ${"#order"}.html(response);
          }
      });

    });
    });
</script>
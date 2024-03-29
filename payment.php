<?php
include 'includes/session.php';
?>
<?php
if (!isset($_SESSION['user'])) {
  header('location: index');
}
include 'includes/header.php';
?>

<head>
  <title>Payment</title>
  <style>
    .input-block {
      margin-top: 10px;
    }

 
body {
  font-family: 'Open sans', sans-serif;
  padding-bottom: 50px;
}
body:after {
  content: '';
  position: fixed;
  left: 0;
  top: 0;
  z-index: -2;
  opacity: .2;
  width: 100%;
  height: 100%;
  background-attachment: fixed;
  background-size: cover;
  background-repeat: no-repeat;
}
body:before {
  content: '';
  position: fixed;
  left: 0;
  top: 0;
  z-index: -1;
  opacity: .2;
  width: 100%;
  height: 100%;
  background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, #000 100%);
}
body.cc-bg {
  background: linear-gradient(45deg, #cb60b3 0%, #71117d 50%, #39296b 100%);
}
body.cc-bg:after {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/513985/bg-cc-form.jpg);
}
body.ec-bg {
  background: linear-gradient(45deg, #a3caeb 0%, #528ec4 50%, #01578a 100%);
}
body.ec-bg:after {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/513985/world.png);
  opacity: .1;
  background-size: auto;
  background-position: center center;
}
body.pp-bg {
  background: linear-gradient(45deg, #fff 0%, #cfcfcf 80%, #aaa 100%);
}
body.pp-bg:after {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/513985/bg-pp.png);
  background-repeat: repeat;
  background-size: auto;
  opacity: .7;
}
body.pp-bg h1, body.pp-bg #choosen-paymenttype {
  color: #000;
}

h1 {
  font-weight: 100;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 1;
  text-align: center;
  font-size: 16px;
  margin: 20px 0 5px 0;
}

#choosen-paymenttype {
  text-align: center;
  color: #fff;
  margin: 0;
  font-size: 12px;
}

ul.payment-types {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
ul.payment-types li.paymenttype {
  margin-bottom: 30px;
}

.unselected-left:hover .shadow,
.unselected-right:hover .shadow {
  box-shadow: 0 25px 40px rgba(14, 21, 47, 0.4), 0 8px 20px rgba(14, 21, 47, 0.4);
}

.selected form {
  max-height: 800px !important;
  opacity: 1;
}
.header_area{
  border-bottom:none;
  box-shadow: none;
}
@media only screen and (min-width: 1080px) {
  ul.payment-types {
    width: 1040px;
    min-height: 600px;
    margin: 0 auto;
    position: relative;
    -webkit-transform-origin: 0 0;
    transform-origin: 0 0;
  }

  li.paymenttype {
    position: absolute;
    width: 300px;
    transition: transform .5s ease-in;
  }
  li.paymenttype.selected {
    width: 440px;
  }

  .unselected-left .box,
  .unselected-right .box {
    transform: scale(0.75);
  }
  .unselected-left .card,
  .unselected-right .card {
    cursor: pointer;
  }

  .cc.selected {
    transform: translate3d(300px, 0, 0);
  }

  .cc.unselected-left {
    transform: translate3d(0, 0, 0);
  }

  .cc.unselected-right {
    transform: translate3d(740px, 0, 0);
  }

  .pp.selected {
    transform: translate3d(300px, 0, 0);
  }

  .pp.unselected-left {
    transform: translate3d(0, 0, 0);
  }

  .pp.unselected-right {
    transform: translate3d(740px, 0, 0);
  }

  .ec.selected {
    transform: translateX(300px);
  }

  .ec.unselected-right {
    transform: translate3d(740px, 0, 0);
  }

  .ec.unselected-left {
    transform: translate3d(0, 0, 0);
  }
}
header {
  position: relative;
  height: 200px;
}

.card {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  top: 50px;
  width: 300px;
  height: 188px;
  border-radius: 16px;
  perspective: 1000px;
  transition: transform .5s ease-in;
  z-index: 5;
}
.card .shine {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  border-radius: 16px;
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0) 60%);
  z-index: 5;
}
.card .card-bg {
  z-index: 2;
}
.card .shadow {
  position: absolute;
  top: 0;
  left: 5%;
  width: 90%;
  height: 100%;
  transition: all 0.2s ease-out;
  box-shadow: 0 8px 30px rgba(14, 21, 47, 0.6);
  z-index: 1;
  border-radius: 16px;
}
.card .flipper {
  transition: 0.75s;
  transform-style: preserve-3d;
  position: relative;
  width: 300px;
  height: 188px;
}
.card.flipped .flipper {
  transform: rotateY(180deg);
}
.card .front,
.card .back,
.card .card-bg,
.card .card-content {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  position: absolute;
}
.card .card-content {
  text-shadow: -1px -1px 0px rgba(255, 255, 255, 0.3), 1px 1px 0px rgba(0, 0, 0, 0.5);
  color: #b0b0b0;
  font-family: 'Droid Serif', serif;
  z-index: 4;
}
.card .card-content span {
  left: 0;
  top: 0;
  display: block;
  position: absolute;
  width: 100%;
  overflow: hidden;
  color: #7a1a86;
  padding-left: 2px;
  white-space: nowrap;
}
.card .card-content span + span {
  color: #a545b1;
  height: 7px;
  overflow: hidden;
}
.card .card-content strong {
  font-weight: normal;
}
.card .card-content em {
  text-transform: uppercase;
  position: absolute;
  font-style: normal;
  font-size: 9px !important;
  text-shadow: none;
  font-family: Open sans, sans-serif;
  color: rgba(255, 255, 255, 0.6);
}
.card .card-content .glow {
  animation: glow .5s;
}
.card .front,
.card .back {
  backface-visibility: hidden;
  box-shadow: 0 4px 8px rgba(10, 10, 10, 0.25);
  border-radius: 16px;
}
.card .front {
  z-index: 2;
  transform: rotateY(0deg);
}
.card .back {
  z-index: 1;
  transform: rotateY(180deg);
}
.card .back .card-content {
  opacity: .7;
  text-shadow: -1px -1px 0px rgba(0, 0, 0, 0.5), 1px 1px 0px rgba(255, 255, 255, 0.3);
  transform: rotateY(180deg);
}
.card .back .card-content span + span {
  color: transparent;
}
.card .ccv {
  position: absolute;
  right: 15px;
  height: 20px;
  width: 30px;
  top: 52px;
  font-size: 14px;
}
.card .ccv strong {
  font-weight: normal;
  font-style: italic;
}
.card .ccv em {
  position: absolute;
  white-space: nowrap;
  font-size: 8px;
  left: -60px;
}
.card .credit-card-type {
  position: absolute;
  right: 20px;
  top: 20px;
  background-color: rgba(255, 255, 255, 0.4);
  width: 50px;
  height: 30px;
  border-style: solid;
  border-color: rgba(255, 255, 255, 0);
  border-width: 2px;
  background-repeat: no-repeat;
  background-size: contain;
  background-position: center center;
}
.card .credit-card-type.amex {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/513985/amex.svg);
  background-color: #fff;
}
.card .credit-card-type.visa {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/513985/visa.svg);
  background-color: #fff;
}
.card .credit-card-type.mastercard {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/513985/mastercard.svg);
  background-color: #fff;
}
.card .card-number {
  position: absolute;
  width: 240px;
  top: 100px;
  left: 30px;
  font-size: 21px;
  height: 21px;
  font-family: courier;
  text-align: justify;
}
.card .card-holder {
  text-transform: uppercase;
  position: absolute;
  width: 240px;
  top: 160px;
  left: 20px;
  font-size: 14px;
  font-weight: 100;
  height: 30px;
}
.card .card-holder em {
  top: -16px;
}
.card .card-holder span {
  letter-spacing: 1px;
}
.card .card-holder span + span {
  height: 4px;
}
.card .validuntil {
  font-family: courier;
  position: absolute;
  top: 128px;
  left: 150px;
  font-size: 16px;
  height: 16px;
  width: 120px;
  white-space: nowrap;
  font-family: courier;
}
.card .validuntil em {
  top: 3px;
  left: -36px;
}
.card .validuntil .e-month,
.card .validuntil .e-divider,
.card .validuntil .e-year {
  letter-spacing: 1px;
  display: inline-block;
  position: relative;
  float: left;
  margin: 0 1px;
}
.card .validuntil .e-month span,
.card .validuntil .e-divider span,
.card .validuntil .e-year span {
  position: relative;
}
.card .validuntil .e-month span + span,
.card .validuntil .e-divider span + span,
.card .validuntil .e-year span + span {
  position: absolute;
  height: 5px;
}

.card-bg img {
  border-radius: 12px;
}

form {
  margin: 0 auto;
  max-width: 400px;
  min-width: 320px;
  border-top: 0;
  overflow: hidden;
  max-height: 0;
  opacity: 0;
  transition: opacity, max-height .5s ease-in;
}
form ul {
  list-style-type: square;
  margin: 0;
  padding: 0 40px 0 20px;
}
form p, form li {
  line-height: 1.3;
  font-size: 14px;
}
form li {
  margin-bottom: 12px;
}
form .form-content {
  border: 1px solid #ccc;
  padding: 70px 20px 20px 20px;
  background: #e4e4e4;
  min-height: 400px;
}
form label {
  display: block;
  margin-bottom: 5px;
  font-size: 12px;
  line-height: 1;
  text-transform: uppercase;
  color: #666;
  position: relative;
}
form .field label {
  top: -50px;
}
form .field-group,
form .field {
  margin-bottom: 20px;
  position: relative;
}
form .field {
  padding-top: 17px;
}
form .field-group:after,
form .field-group:before {
  content: '';
  display: table;
  clear: both;
}
form .focus-bar {
  display: block;
  width: 100%;
  height: 2px;
  margin-top: -1px;
  z-index: 2;
  pointer-events: none;
  position: relative;
}
form .focus-bar:before, form .focus-bar:after {
  content: '';
  height: 2px;
  width: 0;
  bottom: 1px;
  position: absolute;
  background: #e19d3c;
  transition: 0.2s ease all;
}
form .focus-bar:before {
  left: 50%;
}
form .focus-bar:after {
  right: 50%;
}
form input {
  width: 100%;
  padding: 5px;
  font-size: 16px;
  border: 1px solid #CCC;
  position: relative;
  height: 32px;
}
form input:focus {
  outline: none;
}
form input:focus + .focus-bar:before, form input:focus + .focus-bar:after {
  width: 50%;
}
form input:focus + .focus-bar + label, form input:focus + .focus-bar + label {
  color: #ccc;
}
form .expire-date {
  padding-top: 0;
}
form .expire-date input {
  width: 50px;
}
form .expire-date div {
  float: left;
}
form .expire-date .divider {
  padding: 0 5px;
  line-height: 32px;
  color: #ccc;
  user-select: none;
}
form .ccv {
  width: 80px;
  float: right;
}
form ::selection {
  background: rgba(253, 218, 134, 0.6);
}
form ::-moz-selection {
  background: rgba(253, 218, 134, 0.6);
}
form button {
  position: relative;
  overflow: hidden;
  padding: 10px;
  display: block;
  width: 80%;
  background: linear-gradient(#fdda86 0px, #e19d3c 100%);
  color: #fff;
  font-size: 14px;
  border: 1px solid #e19d3c;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);
  border-radius: 2px;
  margin: -20px auto 10px auto;
  transition: 0.75s ease border-color;
}
form button span {
  position: relative;
  z-index: 2;
}
form button:after {
  transform: translate(-50%, -50%);
  content: '';
  background: #e19d3c;
  width: 0px;
  height: 0px;
  position: absolute;
  top: 50%;
  left: 50%;
  border-radius: 50%;
}
form button:hover {
  background: #e19d3c;
}
form button:focus {
  outline: none;
  border-color: #b16a02;
}
form button:focus:after {
  animation: anim-out 0.75s;
  animation-fill-mode: forwards;
}

.col-50 {
  width: 50%;
  float: left;
}

@keyframes glow {
  0% {
    text-shadow: -1px -1px 0px rgba(255, 255, 255, 0.3), 1px 1px 0px rgba(0, 0, 0, 0.5);
  }
  70% {
    color: rgba(255, 255, 255, 0.4);
    text-shadow: -1px 1px 8px #ffc, 1px -1px 8px rgba(255, 255, 255, 0.6);
  }
  100% {
    text-shadow: -1px -1px 0px rgba(255, 255, 255, 0.3), 1px 1px 0px rgba(0, 0, 0, 0.5);
  }
}
@keyframes anim-out {
  0% {
    width: 0%;
    height: 0px;
  }
  100% {
    width: 200%;
    height: 300px;
  }
}

.box{
  background:transparent;
  border-top: 0;
}

.box:hover{
  box-shadow: none;
}
.main-header .navbar{
  margin: 0
}
  </style>
  <link href="images/favicon.jpg" rel="icon">
</head>

<body class="hold-transition ">
  <div class="desktop">
    <?php include 'includes/navbar.php' ?>
  </div>
  <!-- mobile view -->
  <div class="container-fluid1" id="mobileview" style="padding:10px">
    <img src="images/arrow2.png" onclick="history.back(-1)" alt="">

    <div id="brand" style="font-size: 18px">
      PAYMENT
    </div>
    <div class="rightsection pull-right" style="top:0">
      <h5 style="padding:10px">STEP 2/3</h5>
    </div>
  </div>
  <div class="wrapper">

<div class="col-sm-8">
  

    <h1>Choose Payment</h1>
<p id="choosen-paymenttype">Credit Card</p>
<ul class="payment-types">
  <li class="paymenttype pp unselected-left">
    <div class="box">
    <header>
      <div class="card" id="pp-card">
        <div class="flipper">
          <div class="front">
            <div class="shine"></div>
            <div class="shadow"></div>
            <div class="card-bg">
              <img src="images/instamojo_pp.png" class="img-responsive" />
            </div>
          </div>
        </div>
      </div>
    </header>
<form action="pay" class="contact-form" id="myForm" method="POST" >
      <div class="form-content">
        <?php
                        $output = '';
                        try {
                          $total = 0;
                          $old_p = 0;
                          $discount = 0;
                          $disc_t = 0;
                          $stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
                          $stmt->execute(['user' => $user['id']]);
                          foreach ($stmt as $row) {
                            $image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
                            $subtotal = $row['price'] * $row['quantity'];
                            $product = $row['name'];
                            $old_p = $row['old_price'] * $row['quantity'];
                            $total += $subtotal;
                            $discount += $old_p;
                            $disc_t = $discount - $total;
                            $order_t = $discount - $disc_t;
                            $o_t = $order_t - $disc_t;
                            $delivery = 50;
                            $grand_t = $o_t + $delivery;
                            $randomNum = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 11);

                            $output = "
<div class='container-fluid' style='margin-top:30px'>
<div class=\"col-sm-12\">
<input class=\"form-control\" type=\"hidden\" required=\"\" name=\"product_name\" value=\"$product\">
<input class=\"form-control\" type=\"hidden\" required=\"\" name=\"price\" value=\"$grand_t\">
<div class=\"input-block\">
<label for=\"\">Enter Your Name <span style=\"color: red\">*</span></label>
<input class=\"form-control\" id=\"name\" type=\"text\" required=\"\" oninput=\"myFunction()\" name=\"name\" value=\"\">
</div>
</div>
<div class=\"col-sm-12\">
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
<button type=\"submit\" name=\"submit\">Paynow  ₹ " . number_format($grand_t, 2) . "</button>
</div>
</div>
";
                          }
                        } catch (PDOException $e) {
                          $output .= $e->getMessage();
                        }
                        echo ($output);

                        $pdo->close();

                        ?>

      </div>
    </form>
    </div>
  </li>
  <li class="paymenttype selected cc">
    <div class="box">
    <header>
      <div class="card" id="cc-card">
        <div class="flipper">
          <div class="front">
            <div class="shine"></div>
            <div class="shadow"></div>
            <div class="card-bg">
              <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/513985/cc-front-bg.png" />
            </div>
            <div class="card-content">
              <div class="credit-card-type"></div>
              <div class="card-number">
                <span>1234 1234 1234 1234</span>
                <span>1234 1234 1234 1234</span>
              </div>
              <div class="card-holder">
                <em>Card holder</em>
                <span>Your Name</span>
                <span>Your Name</span>
              </div>
              <div class="validuntil">
                <em>Expire</em>
                <div class="e-month">
                    <span>
                      MM
                    </span>
                    <span>
                      MM
                    </span>
                </div>
                <div class="e-divider">
                     <span>
                      /
                    </span>
                    <span>
                      /
                    </span>
                </div>
                <div class="e-year">
                    <span>
                      YY
                    </span>
                    <span>
                      YY
                    </span>
                </div>
                
              </div>
            </div>
          </div>

          <div class="back">
            <div class="shine"></div>
            <div class="shadow"></div>
            <div class="card-bg">
             <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/513985/cc-back-bg-new.png" />
            </div>
            <div class="ccv">
              <em>CCV Number</em>
              <strong></strong>
            </div>
            <div class="card-content">
              <div class="card-number">
                <span>4111 1111 1111 1111</span>
                <span>4111 1111 1111 1111</span>
              </div>
              <div class="card-holder">
                <span>Your Name</span>
                <span>Your Name</span>
              </div>
              <div class="validuntil">
                <span>
                  <strong class="e-month">MM</strong> /                 <strong class="e-year">YY</strong>
                </span>
                <span>
                  <strong class="e-month">MM</strong> /
                  <strong class="e-year">YY</strong>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <form>
      <div class="form-content">
        <div class="field">
          <input type="tel" id="cardnumber" maxlength="20" />
          <span class="focus-bar"></span>
          <label for="cardnumber">Card number</label>
        </div>
        <div class="field">
          <input type="text" autocorrect="off" spellcheck="false" id="cardholder" maxlength="25" />
          <span class="focus-bar"></span>
          <label for="cardholder">Card holder (Name on card)</label>
        </div>
        <div class="field-group">
          <div class="col-50">
            <label for="expires-month">Expire (Valid until)</label>   
            <div class="field expire-date">
              <div>
                <input type="tel" id="expires-month" placeholder="MM" allowed-pattern="[0-9]" maxlength="2">
                <span class="focus-bar"></span>
              </div>
              <div class="divider">/</div>
              <div>
                <input type="tel" id="expires-year" placeholder="YY" allowed-pattern="[0-9]" maxlength="2">
                <span class="focus-bar"></span>
              </div>
            </div>
          </div>
          <div class="col-50">
            <div class="field ccv">
              <input type="tel" id="ccv" autocomplete="off" maxlength="3" />
              <span class="focus-bar"></span>
              <label for="ccv">CCV</label>
            </div>
          </div>
        </div>
        <button><span>Submit</span></button>
      </div>
    </form>
    </div>
  </li>
  <li class="paymenttype ec unselected-right">
    <div class="box">
    <header>
      <div class="card" id="ec-card">
        <div class="flipper">
          <div class="front">
            <div class="shine"></div>
            <div class="shadow"></div>
            <div class="card-bg">
              <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/513985/ec-front-bg.png" />
            </div>
          </div>
        </div>
      </div>
    </header>
    <form>
      <div class="form-content">
        <p><strong>This is just a demo</strong></p>
       <p>It is neither complete, nor optimized code. In CSS it is playing around with text-shadow, transformations, transitions and a few animations. Some quick coded JavaScript to handle the required interactions. Anyway it might be an inspiration or a starting point.</p>
        <p>Made with &#10084; by webandapp.fr</p>
      </div>
    </form>
     </div>
  </li>
</ul>
</div>
            <div class="col-sm-4" style="background-color: #fff;padding: 10px;">
              <?php include 'address_order.php' ?>
            </div>

         
  </div>

  <?php include 'includes/scripts.php'; ?>
    <?php include 'includes/essence_script.php'; ?>
  <?php include 'includes/sidebar_modal.php'; ?>

  <?php include 'includes/pay_foot.php'; ?>

</body>
<script>
  var total = 0;
  $(function() {
    $(document).on('click', '.cart_delete', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      $.ajax({
        type: 'POST',
        url: 'cart_delete.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          if (!response.error) {
            getDetails();
            getCart();
            getTotal();
          }
        }
      });
    });

    $(document).on('click', '.minus', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var qty = $('#qty_' + id).val();
      if (qty > 1) {
        qty--;
      }
      $('#qty_' + id).val(qty);
      $.ajax({
        type: 'POST',
        url: 'cart_update.php',
        data: {
          id: id,
          qty: qty,
        },
        dataType: 'json',
        success: function(response) {
          if (!response.error) {
            getDetails();
            getCart();
            getTotal();
          }
        }
      });
    });

    $(document).on('click', '.add', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var qty = $('#qty_' + id).val();
      qty++;
      $('#qty_' + id).val(qty);
      $.ajax({
        type: 'POST',
        url: 'cart_update.php',
        data: {
          id: id,
          qty: qty,
        },
        dataType: 'json',
        success: function(response) {
          if (!response.error) {
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

  function getDetails() {
    $.ajax({
      type: 'POST',
      url: 'cart_details.php',
      dataType: 'json',
      success: function(response) {
        $('#tbody').html(response);
        getCart();
      }
    });
  }

  function getDetails() {
    $.ajax({
      type: 'POST',
      url: 'cart_details1.php',
      dataType: 'json',
      success: function(response) {
        $('#tbody1').html(response);
        getCart();
      }
    });
  }

  function getTotal() {
    $.ajax({
      type: 'POST',
      url: 'cart_total.php',
      dataType: 'json	',
      success: function(response) {
        grand_t = response;

      }
    });
  }
</script>
<!-- Paypal Express -->
<script>
  paypal.Button.render({
    env: 'sandbox', // change for production if app is live,

    client: {
      sandbox: 'ASb1ZbVxG5ZFzCWLdYLi_d1-k5rmSjvBZhxP2etCxBKXaJHxPba13JJD_D3dTNriRbAv3Kp_72cgDvaZ',
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
          transactions: [{
            //total purchase
            amount: {
              total: grand_t,
              currency: 'USD'
            }
          }]
        }
      });
    },

    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function(payment) {
        window.location = 'sales.php?pay=' + payment.id;
      });
    },

  }, '#paypal-button');
</script>
<script type="text/javascript">
  // To ensure only valid mobile numbers(7000000000 to 9999999999) are entered
  $('body').on('keyup', '.js-input-mobile', function() {
    var $input = $(this),
      value = $input.val(),
      length = value.length,
      inputCharacter = parseInt(value.slice(-1));

    if (!((length > 1 && putCharacter >= 0 && inputCharacter <= 9) || (length === 1 && inputCharacter >= 7 && inputCharacter <= 9))) {
      $input.val(value.substring(0, length - 1));
    }
    // BS tabs hover (instead - hover write - click)
    $('.tab-menu a').hover(function(e) {
      e.preventDefault()
      $(this).tab('show')
    })
  });

  (function payment() {
  var d = document,
      body = d.getElementsByTagName('body')[0],
      html = d.getElementsByTagName('html')[0],
      ppForm = d.getElementsByTagName('form')[0],
      ccForm = d.getElementsByTagName('form')[1],
      ecForm = d.getElementsByTagName('form')[2],
      cCard = d.querySelector('#cc-card'),
      pCard = d.querySelector('#pp-card'),
      eCard = d.querySelector('#ec-card'),
      info = d.querySelector('#choosen-paymenttype'),
      ccNumber = ccForm.querySelector('#cardnumber'),
      cNumber = d.querySelectorAll('.card-number'),
      ccName = ccForm.querySelector('#cardholder'),
      cName = d.querySelectorAll('.card-holder'),   
      ccMonth = ccForm.querySelector('#expires-month'),
      cMonth = d.querySelectorAll('.e-month'),
      ccYear = ccForm.querySelector('#expires-year'),
      cYear = d.querySelectorAll('.e-year'),
      ccCCV = ccForm.querySelector('#ccv'),
      cCCV = d.querySelector('.ccv strong'),
      ccCard = d.querySelectorAll('.credit-card-type'),
      defaultNumber = cNumber[0].getElementsByTagName('span')[0].innerHTML,
      defaultName = cName[0].getElementsByTagName('span')[0].innerHTML;
      
  
  init();
  
  function init() {
    var cardType, cardNumber, cardName, cardCCV;
    body.className = 'cc-bg';
    
    function switchPos(elm) {
      if (elm.classList.contains('selected')) { 
        if (elm.getElementsByTagName('input').length) {
          elm.getElementsByTagName('input')[0].focus();
        }
        return;
      }
      var selected = d.querySelector('.selected');
     
      if (elm.classList.contains('unselected-left')) {
        selected.classList.remove('selected');
        selected.classList.add('unselected-left');
        elm.classList.add('selected');
        elm.classList.remove('unselected-left');
        if (window.matchMedia("(max-width: 1039px)").matches) {
          setTimeout(function() {elm.scrollIntoView();}, 500);
        }
        
      } else if (elm.classList.contains('unselected-right')) {
        selected.classList.remove('selected');
        selected.classList.add('unselected-right');
        elm.classList.add('selected');
        elm.classList.remove('unselected-right');
        if (window.matchMedia("(max-width: 1039px)").matches) {
          setTimeout(function() {elm.scrollIntoView();}, 500);
        }
      }
    }
  
    addEvent(pCard,'click',function() {
      switchPos(d.querySelector('.paymenttype.pp'));
      body.className = 'pp-bg';
      info.innerHTML = 'PayPal';
    });
    addEvent(cCard,'click',function() {
      switchPos(d.querySelector('.paymenttype.cc'));
      body.className = 'cc-bg';
      info.innerHTML = 'Credit Card';
    });
    addEvent(eCard,'click',function() {
      switchPos(d.querySelector('.paymenttype.ec'));
       body.className = 'ec-bg';
      info.innerHTML = 'Bank account';
    });
    
    addEvent(ccNumber, 'focus', function() {
      cNumber[0].classList.add('glow');
    });
    addEvent(ccNumber, 'blur', function() {
      cNumber[0].classList.remove('glow');
    });
    
    addEvent(ccName, 'focus', function() {
      cName[0].classList.add('glow');
    });
    addEvent(ccName, 'blur', function() {
      cName[0].classList.remove('glow');
    });
    
    addEvent(ccMonth, 'focus', function() {
      cMonth[0].classList.add('glow');
    });
    addEvent(ccMonth, 'blur', function() {
      cMonth[0].classList.remove('glow');
    });
    
    addEvent(ccYear, 'focus', function() {
      cYear[0].classList.add('glow');
    });
    addEvent(ccYear, 'blur', function() {
      cYear[0].classList.remove('glow');
    });
    
    addEvent(ccCCV, 'focus', function() {
      cCard.classList.add('flipped');
    });
    addEvent(ccCCV, 'blur', function() {
      cCard.classList.remove('flipped');
    });
    
    
    addEvent(ccNumber, 'keyup', function() {
      cardNumber = this.value.replace(/[^0-9\s]/g,'');
      if (!!this.value.match(/[^0-9\s]/g)) {
        this.value = cardNumber;
      }
      cardType = getCardType(cardNumber.replace(/\s/g,''));
      switch(cardType) {
        case 'amex':
          parts = numSplit(cardNumber.replace(/\s/g,''), [4,6,5]);
          ccCard[0].className = 'credit-card-type amex';
          break;
        case 'mastercard': 
          parts = numSplit(cardNumber.replace(/\s/g,''), [4,4,4,4]);
           ccCard[0].className = 'credit-card-type mastercard';
          break;
        case 'visa': 
          parts = numSplit(cardNumber.replace(/\s/g,''), [4,4,4,4]);
           ccCard[0].className = 'credit-card-type visa';
          break;
        default:
          parts = cardNumber.split(' ');
          ccCard[0].className = 'credit-card-type';
      }
      cardNumber = parts.join(' ');
      if (cardNumber != this.value) {
        this.value = cardNumber;
      }
      if (!cardNumber) {
        cardNumber = defaultNumber;
      }
      syncText( cNumber, cardNumber);
    });
    addEvent(ccName, 'keyup', function() {
      cardName = this.value.replace(/[^a-zA-Z-\.\s]/g,'');
      if (cardName != this.value) {
        this.value = cardName;
      }
      if (!cardName) {
        cardName = defaultName;
      }
      syncText( cName, cardName);
    });
    addEvent(ccMonth, 'keyup', function(ev) {
      ev = ev || window.event;
      var month = this.value.replace(/[^0-9]/g,'');
      if(ev.keyCode == 38) {
        if(!month) {month = 0;}
        month = parseInt(month);
        month++;
        if(month < 10) {
          month = '0'+month;
        }
      }
      if(ev.keyCode == 40) {
        if(!month) {month = 13;}
        month = parseInt(month);
        month--;
        if(month == 0) { month = 1;} 
        if(month < 10) {
          month = '0'+month;
        }
        
      }
      if( parseInt(month) > 12) {
        month = 12;
      }
      if( parseInt(month) < 1 && month != 0) {
        month = '01';
      }
      if(month == '00') {
        month = '01';
      }
   
      if (month != this.value) {
        this.value = month;
      }
      if(month.toString().length == 2) {
        syncText( cMonth, month);
      }
    });
    addEvent(ccYear, 'keyup', function(ev) {
      ev = ev || window.event;
      var currentYear = new Date().getFullYear().toString().substr(2,2),
          year = this.value.replace(/[^0-9]/g,'');
      
      if(ev.keyCode == 38) {
        if(!year) {year = currentYear;}
        year = parseInt(year);
        year++;
        if(year < 10) {
          year = '0'+year;
        }
      }
      if(ev.keyCode == 40) {
        if(!year) {year = parseInt(currentYear) + 5;}
        year = parseInt(year);
        year--;
        if(year < 10) {
          year = '0'+year;
        }
      }
      
      if( year.toString().length == 2 && parseInt(year) < currentYear) {
        year = currentYear;
      }
      if (year != this.value) {
        this.value = year;
      }
      if (year > (parseInt(currentYear) + 5)) {
        year = (parseInt(currentYear) + 5);
        this.value = year;
      }
      
      
      if(year.toString().length == 2) {   
        syncText( cYear, year);
      }
    });
    addEvent(ccCCV, 'keyup', function() {
      cardCCV = this.value.replace(/[^0-9\s]/g,'');
      if (cardCCV != this.value) {
        this.value = cardCCV;
      }
     cCCV.innerHTML = cardCCV;
    });
  }
  
  function syncText( elCol, text ) {
    var collection;
    for(var j=0; j < elCol.length; j++) {
      collection = elCol[j].querySelectorAll('span');
      if (!collection.length) {
        elCol[j].innerHTML = text;
      } else {
        for(var i=0; i < collection.length; i++) {
          collection[i].innerHTML = text;
        }
      }
    }
  }
  
  function numSplit(number, indexes) {
    var tempArr = number.split(''),
        parts = [];
    for (var i=0, l = indexes.length; i < l; i++) {
      if (tempArr.length) {
        parts.push(tempArr.splice(0,indexes[i]).join(''));   
      }
    }
    return parts;
  }
  
  function getCardType(number) {
    var re;
    // Mastercard
    re = new RegExp("^5[1-5]");
    if (number.match(re) != null) {
      return "mastercard";
    }
    // AMEX
    re = new RegExp("^3[47]");
    if (number.match(re) != null) {
        return "amex";
    }
    
    // visa
    var re = new RegExp("^4");
    if (number.match(re) != null) {
      return "visa";
    }

    return "";
}
  
  function addEvent(elem, event, func) {
    elem.addEventListener(event,func);
  }
  
})();
</script>
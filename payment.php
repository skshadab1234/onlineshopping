<?php
include 'includes/session.php';
?>
<?php
if (!isset($_SESSION['user'])) {
  header('location: index.php');
}
include 'includes/header.php';
?>

<head>
  <title>Payment</title>
  <style>
    .input-block{
      margin-top:10px;
    }
  </style>
  <link href="images/favicon.jpg" rel="icon">
</head>

<body class="hold-transition skin-blue layout-top-nav">
  <?php include 'includes/navbar.php' ?>

  <div class="wrapper">

    <div class="content-wrapper" style="margin: 0;background:#fff">

      <div class="container-fluid text-center">

        <div class="content">

          <div class="row">
            <ul style="margin:25px;">
              <li style="display: inline-block;padding: 10px 10px" title="step 1">
                <p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;"><a href="cart_view.php" style="color: grey">Bag</a></p>
              </li>----------------

              <li style="display: inline-block;padding: 10px 10px" title="step 2">
                <p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;border-bottom: 2px solid #20bd99;color: #20bd99">Payment</p>
              </li>----------------
              <li style="display: inline-block;padding: 10px 10px" title="step 3">
                <p style="letter-spacing: 3px;font-size: 12px;font-weight: 600;letter-spacing: 3px;text-transform: uppercase;cursor: not-allowed;">Order Confirmation</p>
              </li>
            </ul>
          </div>
          <div class="row">
          <h4 style="color:#000;font-size:20px;font-weight:700;padding:20px">Choose Payment Mode</h4>
            <div class="col-sm-8" style="padding: 20px">
              <!-- TABS PRESENTATION -->
              <section class="blok">
                <div class="blok-body">
                  <div class="row">
                    <!-- Nav tabs -->

                    <ul class="nav tab-menu nav-pills col-sm-4 nav-stacked pr15">
                      <li class="active" data-toggle="tab"><a href="#home">Instamojo</a></li>
                      <li><a href="#profile" data-toggle="tab">Paypal</a></li>
                      <li><a href="#messages" data-toggle="tab">COD</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content col-sm-8">
                      <div class="tab-pane active in active" id="home">
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
<div class=\"col-sm-12\">
<input class=\"form-control\" type=\"hidden\" required=\"\" name=\"product_name\" value=\"$product\">
<input class=\"form-control\" type=\"hidden\" required=\"\" name=\"price\" value=\"$delivery1\">
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
<button type=\"submit\" name=\"submit\"  style=\"align-items:center;margin:20px 120px\"  class=\"btn-success\">Paynow  ₹ ".number_format($delivery1, 2)."</button>
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

                      </div>
                      <!-- <div class="tab-pane well fade" id="profile">
                      <li style="color: red;font-family:calibri">Pay Using Paypal  <i data-toggle="popover" data-placement="bottom" data-content="Payflow Gateway is PayPal's secure and open payment gateway. ... PayPal Payments Pro merchants use PayPal as their credit card processor, while Payflow Gateway merchants can choose to process their online store payments with any major payment processor, bank, or card association. " class="fa fa-question-circle" data-original-title="" title=""></i></li>
<div style="text-align:center;margin-top:40px">
<div id='paypal-button'></div>
</div> -->
                      </div>
              </section><!-- // blok -->
              <!-- TABS PRESENTATION // -->
              <div class="col-sm-6">
                <div class="box-header">
                  <h3>Shipping Address</h3>
                  <hr>
                  <div class="box-body">
                    <?php
                    if (isset($_SESSION['user'])) {
                      echo "<div><span style=\"font-weight:700;font-size:17px;padding:10px\">Address : </span>" . $user['shippingaddress'] . " </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">State : </span> " . $user['shippingstate'] . " </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">City : </span>" . $user['shippingcity'] . " </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">Pincode : </span>" . $user['shippingpincode'] . " </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">Mobile : </span>" . $user['shipping_mb'] . " </div>

  ";
                    }
                    ?>
                  </div>
                </div>
              </div>
              <!-- Billing Address -->
              <div class="col-sm-6">
                <div class="box-header">
                  <h3>Billing Address</h3>
                  <hr>
                  <div class="container-fluid">
                    <?php
                    if (isset($_SESSION['user'])) {
                      echo "<div><span style=\"font-weight:700;font-size:17px;padding:10px\">Address : </span>" . $user['billing_add'] . " </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">State : </span> " . $user['billing_state'] . " </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">City : </span>" . $user['billing_city'] . " </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">Pincode : </span>" . $user['billing_pincode'] . " </div>
  <div><span style=\"font-weight:700;font-size:17px;padding:10px\">Mobile : </span>" . $user['billing_mb'] . " </div>

  ";
                    }
                    ?>
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
  </div>
  <?php include 'includes/scripts.php'; ?>
  <?php include 'includes/sidebar_modal.php'; ?>

  <?php include 'includes/footer.php'; ?>

</body><script>
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
              total: delivery1,
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
</script>
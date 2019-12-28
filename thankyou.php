<?php include 'includes/session.php'; ?>
<?php
if(!isset($_SESSION['user'])){
header('location: index.php');
}
?>
<?php include 'includes/header.php';?>

<head>
	<title>Thank You For Ordering</title>
	<style type="text/css">
.container2{
 position: absolute;
 top: 36%;
 left: 10%;
}

.container3	{
 position: absolute;
 top: 36%;
 left: 10%;
}
.btn {
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

.btn svg {
    position: absolute;
    top: 0;
    left: 0;
}

.btn svg rect {
    //stroke: #EC0033;
    stroke-width: 4;
    stroke-dasharray: 353, 0;
    stroke-dashoffset: 0;
    -webkit-transition: all 600ms ease;
    transition: all 600ms ease;
}

.btn span{
  background: rgb(255,130,130);
  background: -moz-linear-gradient(left,  rgba(255,130,130,1) 0%, rgba(225,120,237,1) 100%);
  background: -webkit-linear-gradient(left,  rgba(255,130,130,1) 0%,rgba(225,120,237,1) 100%);
  background: linear-gradient(to right,  rgba(255,130,130,1) 0%,rgba(225,120,237,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff8282', endColorstr='#e178ed',GradientType=1 );
  
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.btn:hover svg rect {
    stroke-width: 4;
    stroke-dasharray: 196, 543;
    stroke-dashoffset: 437;
}
</style>
</head>
<body class="layout-top-nav">
	<?php include 'includes/navbar.php'; ?>
<div class="content-wrapper" style="margin-top: -20px">
	
	<div class="text-center">
		<h1 class="mens" style="padding: 20px">Thank You So Much For Purchasing</h1>
		<?php 
		 include 'instamojo/Instamojo.php';
$api = new Instamojo\Instamojo('test_1ec400eae4fdc8e8cacf8c39403', 'test_53c6936ef5e6ef267b9e9c62b5a', 'https://test.instamojo.com/api/1.1/');

		$payid=$_GET['payment_request_id'];
		$date = date('Y-m-d');
	
		try {
			$response = $api->paymentRequestStatus($payid);
    $paymentid =  $response['payments'][0]['payment_id'];
			$stmt = $conn->prepare("INSERT INTO sales (user_id, pay_id, sales_date) VALUES (:user_id, :pay_id, :sales_date)");
			$stmt->execute(['user_id'=>$user['id'], 'pay_id'=>$paymentid, 'sales_date'=>$date]);
			$salesid = $conn->lastInsertId();
			try{
				$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);

				foreach($stmt as $row){
					$stmt = $conn->prepare("INSERT INTO details (sales_id, product_id, quantity) VALUES (:sales_id, :product_id, :quantity)");
					$stmt->execute(['sales_id'=>$salesid, 'product_id'=>$row['product_id'], 'quantity'=>$row['quantity']]);
				}

				$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);

				$_SESSION['success'] = 'Transaction successful. Thank you.';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

    
	?>
<h2 class="mens" style="font-style: 20px;color: grey">Payment Details</h2>
<div class="container-fluid" align="center"  >
	<table class="table table-bordered" style="margin: 20px auto;text-align: center;width: 600px;color: white">
	<tr>
		<th>Payment ID :</th>
		<td><?= $paymentid ?></td>
	</tr>
	<tr>
		<th>Buyer Name </th>
		<td><?= $response['payments'][0]['buyer_name']; ?></td>
	</tr>
	<tr>
		<th>Buyer mail Id:  </th>
		<td><?= $response['payments'][0]['buyer_email']; ?></td>
	</tr>
	<tr>
		<th>Buyer Phone:  </th>
		<td><?= $response['payments'][0]['buyer_phone']; ?></td>
	</tr>
	<tr>
		<th>Products Buyed :</th>
		<td><?= $response['purpose']; ?></td>
	</tr>
	<tr>
		<th>Amount Paid :</th>
		<td>&#36; <?= number_format($response['amount'],3); ?></td>
	</tr>
</table>
</div>
	<?php
	
	}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}?>
	</div>


<link href='https://fonts.googleapis.com/css?family=Lato|Roboto:400,900' rel='stylesheet' type='text/css'>
<div class="row">
	<div class="col-sm-6 col-lg-6">
		<div class="container3">
  <a href="index.php" class="btn">
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
    <span>Continue Shopping</span>
</a>

</div>
	</div>
	<div class="col-sm-6 col-lg-6">
	<div class="container2">
  <a href="cart_view.php" class="btn">
  <svg width="277" height="62">
    <defs>
        <linearGradient id="grad1">
            <stop offset="0%" stop-color="grey"/>
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
	
</div>
</div>


		<?php include 'includes/footer.php'; ?>

		
		<?php include 'includes/scripts.php'; ?>

</body>
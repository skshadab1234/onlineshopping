<?php include 'includes/session.php'; ?>
<?php
if (!isset($_SESSION['user'])) {
	header('location: index.php');
}
?>


<head>
	<?php include 'includes/header.php'; ?>
	<title>Thank You For Ordering</title>
</head>
<?php include 'includes/navbar.php'; ?>

<body class="layout-top-nav">
	<div class="content-wrapper" style="margin-left: 0px">

		<div class="container-fluid text-center" style="margin-top:80px">
			<h1 class="mens" style="padding: 20px">Thank You So Much For Purchasing</h1>
			<?php
			include 'instamojo/Instamojo.php';
			$api = new Instamojo\Instamojo('test_1ec400eae4fdc8e8cacf8c39403', 'test_53c6936ef5e6ef267b9e9c62b5a', 'https://test.instamojo.com/api/1.1/');

			$payid = $_GET['payment_request_id'];
			$date = date('Y-m-d');

			try {
				$response = $api->paymentRequestStatus($payid);
				$paymentid =  $response['payments'][0]['payment_id'];
				$stmt = $conn->prepare("INSERT INTO sales (user_id, pay_id, sales_date) VALUES (:user_id, :pay_id, :sales_date)");
				$stmt->execute(['user_id' => $user['id'], 'pay_id' => $paymentid, 'sales_date' => $date]);
				$salesid = $conn->lastInsertId();
				try {
					$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
					$stmt->execute(['user_id' => $user['id']]);

					foreach ($stmt as $row) {
						$stmt = $conn->prepare("INSERT INTO details (sales_id, product_id, quantity) VALUES (:sales_id, :product_id, :quantity)");
						$stmt->execute(['sales_id' => $salesid, 'product_id' => $row['product_id'], 'quantity' => $row['quantity']]);
					}

					$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
					$stmt->execute(['user_id' => $user['id']]);

					$_SESSION['success'] = 'Transaction successful. Thank you.';
				} catch (PDOException $e) {
					$_SESSION['error'] = $e->getMessage();
				}


			?>
				<h2 class="mens" style="font-style: 20px;color: grey">Payment Details</h2>
				<div class="container-fluid" align="center">
					<table class="table table-bordered" style="margin: 20px auto;text-align: center;width: 600px;color: #000">
						<tr>
							<th>Payment ID :</th>
							<td><?= $paymentid ?></td>
						</tr>
						<tr>
							<th>Buyer Name </th>
							<td><?= $response['payments'][0]['buyer_name']; ?></td>
						</tr>
						<tr>
							<th>Buyer mail Id: </th>
							<td><?= $response['payments'][0]['buyer_email']; ?></td>
						</tr>
						<tr>
							<th>Buyer Phone: </th>
							<td><?= $response['payments'][0]['buyer_phone']; ?></td>
						</tr>
						<tr>
							<th>Products Buyed :</th>
							<td><?= $response['purpose']; ?></td>
						</tr>
						<tr>
							<th>Amount Paid :</th>
							<td>&#36; <?= number_format($response['amount'], 3); ?></td>
						</tr>
					</table>
				</div>
			<?php

			} catch (Exception $e) {
				print('Error: ' . $e->getMessage());
			} ?>
		</div>

<div class="container-fluid">
<ul style="display: flex">
<li style="padding: 20px"><a href="index.php" style="font-size:22px;color:#000;">Continue Shopping</a></li>
<li style="padding: 20px"><a href="orders.php" style="font-size:22px;color:#000;">My Orders</a></li>
</ul>
</div>
	</div>


	<?php include 'includes/footer.php'; ?>

  <?php include 'includes/essence_script.php'; ?>

	<?php include 'includes/scripts.php'; ?>

</body>
<?php
//error_reporting(0);
include('includes/session.php');
if (strlen($_SESSION['user']) == 0) {
	header('location:index');
}
include('includes/header.php');
include('includes/scripts.php');


?>

<head>
	<title>Transaction_Hist <?php
							if (isset($_SESSION['user'])) {
								echo " - " . $user['firstname'] . " " . $user['lastname'] . "";
							} else {
								echo "";
							} ?></title>
</head>

<body class="layout-top-nav">
	<div class="wrapper">
		<?php include('includes/navbar.php');		?>
		<div class="content-wrapper" style="margin: 0">
			<section class="content" style="padding: 0">
				<div class="container-fluid" style="padding:10px">
					<h5 style="position: relative;top:10px;font-size:15px;letter-spacing:1px"><i class="glyphicon glyphicon-calendar" style="color: steelblue"></i> &nbsp;<b>Transaction History</b></h5>
				</div>
				<div class="box-body table-responsive text-nowrap" style="background: #fff">
					<table class="table table-bordered" id="example2">
						<thead style="border:1px solid #663355;">
							<th style="border:1px solid #663355;">Date</th>
							<th style="border:1px solid #663355;">Transaction#</th>
							<th style="border:1px solid #663355;">Amount</th>
							<th style="border:1px solid #663355;">Full Details</th>

						</thead>
						<tbody>
							<?php
							$conn = $pdo->open();

							try {
								$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
								$stmt->execute(['user_id' => $user['id']]);
								foreach ($stmt as $row) {
									$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
									$stmt2->execute(['id' => $row['id']]);
									$total = 0;
									foreach ($stmt2 as $row2) {
										$subtotal = $row2['price'] * $row2['quantity'];
										$total += $subtotal;
										$order = $total * ($row2['old_price'] - $row2['price']) /  100;
										$order1 = $total - $order;
										$delivery = 15.00;
										$delivery1 = $order1 + $delivery;
									}
									echo "
<tr>
<td style=\"border:1px solid #663355\">" . date('M d, Y', strtotime($row['sales_date'])) . "</td>
<td style=\"border:1px solid #663355\">" . $row['pay_id'] . "</td>
<td style=\"border:1px solid #663355;\">
<h5 style=\"font-weight:700\">Product Price: ₹ " . number_format($row2['price'], 2) . " * " . $row2['quantity'] . " = ₹ " . number_format($subtotal, 2) . "</h5>
<h5 style=\"font-weight:700\">Bag Discount: <span class=\"pull-right\">₹ " . number_format($order, 2) . "</h5>
<h5 style=\"font-weight:700\">Bag Total :<span class=\"pull-right\">₹ " . number_format($order1, 2) . "</h5>
<h5 style=\"font-weight:700\">Delivery Charge: <span class=\"pull-right\">₹ " . number_format($delivery, 2) . "</h5>
<hr style=\"border:1px solid #ddd\">
<h4 style=\"border:1px solid #663355;padding:10px\"><span style=\"font-weight:700\">Grand Total</span> :
<span class=\"pull-right\">₹ " . number_format($delivery1, 2) . "</span></h4></td>
<td style=\"border:1px solid #663355\"><button class='btn btn-sm btn-flat btn-success transact'  data-id='" . $row['id'] . "'><i class='fa fa-search' style=\"font-size:14px\"></i> View</button></td>
</tr>
";
								}
							} catch (PDOException $e) {
								echo "There is some problem in connection: " . $e->getMessage();
							}

							$pdo->close();
							?>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>
	  <?php include 'includes/essence_script.php'; ?>

	<script>
		$(function() {
			$(document).on('click', '.transact', function(e) {
				e.preventDefault();
				$('#transaction').modal('show');
				var id = $(this).data('id');
				$.ajax({
					type: 'POST',
					url: 'transaction.php',
					data: {
						id: id
					},
					dataType: 'json',
					success: function(response) {
						$('#date').html(response.date);
						$('#transid').html(response.transaction);
						$('#detail').prepend(response.list);
						$('#total').html(response.total);
					}
				});
			});

			$("#transaction").on("hidden.bs.modal", function() {
				$('.prepend_items').remove();
			});
		});
	</script>

</body>
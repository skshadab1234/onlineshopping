<?php
include 'includes/session.php';

$output = '';

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id ORDER BY sales_date DESC");
$stmt->execute();
foreach ($stmt as $row) {
	$stmt = $conn->prepare("SELECT *,delivery_details.id As did, delivery_details.sales_id As s_id, delivery_details.product_id As p_id, delivery_details.quantity As qty FROM delivery_details LEFT JOIN products ON products.id=delivery_details.product_id WHERE delivery_details.sales_id=:id");
	$stmt->execute(['id' => $row['salesid']]);
	foreach ($stmt as $details) {
		$output .= "
			<option value='" . $details['id'] . "' class='append_items'>" . $details['name'] . " (Order by : " . $row['email'] . " )  qty : " . $details['quantity'] . "</option>
		";
	}
}
$pdo->close();
echo json_encode($output);

<?php
include 'includes/session.php';

$output = '';

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id ORDER BY sales_date DESC");
$stmt->execute();
foreach ($stmt as $row) {
	$stmt = $conn->prepare("SELECT *, details.id As did, details.sales_id As s_id, details.product_id As p_id, details.quantity As qty FROM details LEFT JOIN products ON products.id=details.product_id WHERE details.sales_id=:id");
	$stmt->execute(['id' => $row['salesid']]);
	foreach ($stmt as $details) {
		$output .= "
			<option value='" . $details['id'] . "' class='append_items'>" . $details['name'] . " (Order by : " . $row['email'] . " )  qty : " . $details['quantity'] . "</option>
		";
	}
}
$pdo->close();
echo json_encode($output);

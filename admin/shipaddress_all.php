<?php
include 'includes/session.php';

$output = '';

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id ORDER BY sales_date DESC");
$stmt->execute();
foreach ($stmt as $row) {
	$stmt = $conn->prepare("SELECT * FROM details  WHERE details.sales_id=:id");
	$stmt->execute(['id' => $row['salesid']]);
	foreach ($stmt as $details) {
		$output .= "
			<option value='" . $details['id'] . "' class='append_items' >" . $row['email'] . " (Delivery to : " . $details['deliver_shipaddress'] . ", " . $details['deliver_shipcity'] . ", " . $details['deliver_shipstate'] . ", " . $details['deliver_shipmb'] . " District - " . $details['deliver_shippincode'] . ")</option>
		";
	}
}
$pdo->close();
echo json_encode($output);

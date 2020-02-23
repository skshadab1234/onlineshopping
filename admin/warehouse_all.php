<?php
include 'includes/session.php';

$output = '';

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM warehouse");
$stmt->execute();
foreach ($stmt as $row) {
	$output .= "
			<option value='" . $row['id'] . "' class='append_items'>" . $row['warehouse_name'] . "</option>
		";
}

$pdo->close();
echo json_encode($output);

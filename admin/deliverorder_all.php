<?php
include 'includes/session.php';

$output = '';

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id");
$stmt->execute();
foreach ($stmt as $row) {
    $output .= "
			<option value='" . $row['id'] . "' class='append_items'>" . $row['name'] . "</option>
		";
}

$pdo->close();
echo json_encode($output);

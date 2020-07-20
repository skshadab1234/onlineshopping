

<?php
include 'includes/session.php';

$output = '';

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM color");
$stmt->execute();

foreach ($stmt as $row) {
    $output .= "
			<option value='" . $row['id'] . "' class='append_items'>" . $row['color_name'] . "</option>
		";
}

$pdo->close();
echo json_encode($output);

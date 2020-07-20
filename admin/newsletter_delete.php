<?php 

include 'includes/session.php';

$conn = $pdo->open();

if (isset($_POST['id'])) {

	$id = $_POST['id'];

	try {
		$stmt = $conn->prepare("DELETE FROM newsletter where id =:id");
		$stmt->execute(['id' => $id]);
		echo json_encode(array("statusCode"=>200));
		die();
	} catch (Exception $e) {
				echo json_encode(array("statusCode"=>201));
		}
}


$pdo->close();
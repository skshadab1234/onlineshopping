<?php
include 'includes/session.php';

if (isset($_POST['activate'])) {
	$id = $_POST['id'];

	$conn = $pdo->open();

	try {
		$stmt = $conn->prepare("UPDATE color SET status=:status WHERE id=:id");
		$stmt->execute(['status' => 1, 'id' => $id]);
		$_SESSION['success'] = 'Color activated successfully';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Select user to activate first';
}

header('location: color_master.php');

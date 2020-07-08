<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	try {
		$stmt = $conn->prepare("UPDATE color SET color_name=:color_name WHERE id=:id");
		$stmt->execute(['color_name' => $name, 'id' => $id]);
		$_SESSION['success'] = 'color updated successfully';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Fill up edit category form first';
}

header('location: color_master.php');

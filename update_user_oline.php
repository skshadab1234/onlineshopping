<?php
include 'includes/session.php';

if (isset($_SESSION['user'])) {
	$uid = $_SESSION['user'];

$time = time() + 10;
		try {
		$stmt = $conn->prepare("UPDATE users SET last_login=:last_login WHERE id=:id");
		$stmt->execute(['last_login' => $time, 'id' => $_SESSION['user']]);
		$_SESSION['success'] = 'Updated';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}
}
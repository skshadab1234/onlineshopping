<?php
include 'includes/session.php';

$uid = $_SESSION['deliveryboy'];
echo $uid;
$time = time() + 10;
		try {
		$stmt = $conn->prepare("UPDATE users SET last_login=:last_login WHERE id=:id");
		$stmt->execute(['last_login' => $time, 'id' => $_SESSION['deliveryboy']]);
		$_SESSION['success'] = 'Updated';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	?>
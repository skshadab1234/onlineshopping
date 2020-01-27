<?php
include '../includes/conn.php';
session_start();

if (!isset($_SESSION['deliveryboy']) || trim($_SESSION['deliveryboy']) == '') {
	header('location: ../index.php');
	exit();
}

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id' => $_SESSION['deliveryboy']]);
$deliveryboy = $stmt->fetch();

$pdo->close();

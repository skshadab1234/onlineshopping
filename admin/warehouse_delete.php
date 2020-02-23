<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $conn = $pdo->open();

    try {
        $stmt = $conn->prepare("DELETE FROM warehouse WHERE id=:id");
        $stmt->execute(['id' => $id]);

        $_SESSION['success'] = 'Warehouse deleted successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Select warehouse to delete first';
}

header('location: warehouse.php');

<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $conn = $pdo->open();

    try {
        $stmt = $conn->prepare("DELETE FROM slider WHERE id=:id");
        $stmt->execute(['id' => $id]);

        $_SESSION['success'] = "deleted successfully";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Select subcategory to delete first';
}

header('location: slider.php');

<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $conn = $pdo->open();

    try {
        $stmt = $conn->prepare("DELETE FROM category_offer WHERE id=:id");
        $stmt->execute(['id' => $id]);

        $_SESSION['success'] = 'Offer deleted successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Select Offer to delete first';
}

header('location: category.php');

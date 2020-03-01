<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $category = $_POST['category1'];
    $url = $_POST['url'];

    try {
        $stmt = $conn->prepare("UPDATE category_offer SET offer_type=:category1, offer_url = :offer_url WHERE id=:id");
        $stmt->execute(['category1' => $category, 'offer_url' => $url, 'id' => $id]);
        $_SESSION['success'] = 'Offer updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up  category offer form first';
}

header('location: category.php');

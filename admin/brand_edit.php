<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $name = $_POST['name'];

    try {
        $stmt = $conn->prepare("UPDATE brands SET category = :category, brand_name=:brand_name WHERE id=:id");
        $stmt->execute(['category' => $category, 'brand_name' => $name, 'id' => $id]);
        $_SESSION['success'] = 'Brand updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up Brand form first';
}

header('location: brands.php');

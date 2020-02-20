<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $category = $_POST['category1'];
    $url = $_POST['url'];

    try {
        $stmt = $conn->prepare("UPDATE category_banner SET type = :category1, url=:url WHERE id=:id");
        $stmt->execute(['category1' => $category, 'url' => $url, 'id' => $id]);
        $_SESSION['success'] = 'Banner Catgory updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up edit banner form first';
}

header('location: category.php');

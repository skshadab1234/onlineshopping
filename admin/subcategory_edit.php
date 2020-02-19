<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];


    try {
        $stmt = $conn->prepare("UPDATE subcategory SET name=:name, type=:type WHERE id=:id");
        $stmt->execute(['name' => $name, 'type' => $type, 'id' => $id]);
        $_SESSION['success'] = 'SubCategory updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up edit subcategory form first';
}

header('location: subcategory.php');

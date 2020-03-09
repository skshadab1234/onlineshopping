<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    try {
        $stmt = $conn->prepare("UPDATE slider SET slider_name=:name WHERE id=:id");
        $stmt->execute(['name' => $name,'id' => $id]);
        $_SESSION['success'] =  'Slider updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
    
} else {
    $_SESSION['error'] = 'Fill up edit slider form first';
}

header('location: slider.php');

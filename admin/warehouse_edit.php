<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    try {
        $stmt = $conn->prepare("UPDATE warehouse SET name=:name, city=:city, state=:state, pincode=:pincode WHERE id=:id");
        $stmt->execute(['name' => $name, 'city' => $city, 'state' => $state, 'pincode' => $pincode, 'id' => $id]);
        $_SESSION['success'] = 'Warehouse updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up edit warehouse form first';
}

header('location: warehouse.php');

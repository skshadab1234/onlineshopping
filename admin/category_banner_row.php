<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT *, category_banner.id As banid FROM category_banner WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    $pdo->close();

    echo json_encode($row);
}

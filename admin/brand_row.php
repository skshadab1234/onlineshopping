<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT *, brands.id as brandid, category.name AS catname FROM brands LEFT JOIN category ON category.id=brands.category WHERE brands.id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    $pdo->close();

    echo json_encode($row);
}

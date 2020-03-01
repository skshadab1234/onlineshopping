<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT *, category_offer.id As offer_id, category_offer.offer_type AS offer_type, category.name AS catname FROM category_offer LEFT JOIN category ON category.id=category_offer.offer_type WHERE category_offer.id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    $pdo->close();

    echo json_encode($row);
}

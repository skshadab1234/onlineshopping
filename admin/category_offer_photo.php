<?php
include 'includes/session.php';

if (isset($_POST['upload1'])) {
    $set = 'skshadab1fiojioajadjgdasuij23456';
    $code = substr(str_shuffle($set), 0, 12);
    $id = $_POST['id'];
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    if (!empty($filename)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = $code . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/category_offer/' . $new_filename);
    }

    try {
        $stmt = $conn->prepare("UPDATE category_offer SET offer_photo=:offer_photo WHERE id=:id");
        $stmt->execute(['offer_photo' => $new_filename, 'id' => $id]);
        $_SESSION['success'] = 'category Offer photo updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Select offer to update photo first';
}

header('location: category.php');

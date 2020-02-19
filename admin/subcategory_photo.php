<?php
include 'includes/session.php';

if (isset($_POST['upload'])) {
    $id = $_POST['id'];
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM subcategory WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    if (!empty($filename)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = $row['slug'] . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/subcategory/' . $new_filename);
    }

    try {
        $stmt = $conn->prepare("UPDATE subcategory SET photo=:photo WHERE id=:id");
        $stmt->execute(['photo' => $new_filename, 'id' => $id]);
        $_SESSION['success'] = 'Subcategory photo updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Select Subcategory to update photo first';
}

header('location: subcategory.php');

<?php
include 'includes/session.php';

if (isset($_POST['upload1'])) {
    $set = 'skshadab123456';
    $code = substr(str_shuffle($set), 0, 12);
    $id = $_POST['id'];
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    if (!empty($filename)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = $code . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/cat_banner/' . $new_filename);
    }

    try {
        $stmt = $conn->prepare("UPDATE category_banner SET photo=:photo WHERE id=:id");
        $stmt->execute(['photo' => $new_filename, 'id' => $id]);
        $_SESSION['success'] = 'category Banner photo updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Select banner to update photo first';
}

header('location: category.php');

<?php
include 'includes/session.php';

if (isset($_POST['upload'])) {
    $set = 'skshadab';
    $code = substr(str_shuffle($set), 0, 12);
    $id = $_POST['id'];
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    if (!empty($filename)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = $code . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/brand/' . $new_filename);
    }

    try {
        $stmt = $conn->prepare("UPDATE brands SET brand_image=:photo WHERE id=:id");
        $stmt->execute(['photo' => $new_filename, 'id' => $id]);
        $_SESSION['success'] = 'Brand photo updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Select brand to update photo first';
}

header('location: brands.php');

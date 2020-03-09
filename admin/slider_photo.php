<?php
include 'includes/session.php';

if (isset($_POST['upload'])) {
    $id = $_POST['id'];
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM slider WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    if (!empty($filename)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = $row['slider_name'] . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/sliders/' . $new_filename);
    }

    try {
        $stmt = $conn->prepare("UPDATE slider SET slider_photo=:photo WHERE id=:id");
        $stmt->execute(['photo' => $new_filename, 'id' => $id]);
        $_SESSION['success'] = 'Slider photo updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Select Slider to update photo first';
}

header('location: slider.php');

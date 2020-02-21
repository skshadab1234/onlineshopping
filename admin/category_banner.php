<?php
include 'includes/session.php';
include 'includes/slugify.php';

if (isset($_POST['addbanner'])) {
    $set = 'skshadab123456';
    $code = substr(str_shuffle($set), 0, 12);
    $category = $_POST['category'];
    $url = $_POST['url'];
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    if (!empty($filename)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = $code . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/cat_banner/' . $new_filename);
    } else {
        $new_filename = '';
    }
    try {
        $stmt = $conn->prepare("INSERT INTO category_banner (photo,type,url)  VALUES (:photo,:type,:url)");
        $stmt->execute(['type' => $category,  'photo' => $new_filename, 'url' => $url]);
        $_SESSION['success'] =  'Banner added successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up product form first';
}

header('location: category.php');

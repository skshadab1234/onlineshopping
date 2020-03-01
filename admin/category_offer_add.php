
<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $set = 'skshadab1fiojioajadjgdasuij23456';
    $code = substr(str_shuffle($set), 0, 12);
    $category = $_POST['category'];
    $url = $_POST['url'];
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    if (!empty($filename)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = $code . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/category_offer/' . $new_filename);
    } else {
        $new_filename = '';
    }

    try {
        $stmt = $conn->prepare("INSERT INTO category_offer (offer_photo,offer_url,offer_type) VALUES (:offer_photo,:offer_url,:offer_type)");
        $stmt->execute(['offer_photo' => $new_filename, 'offer_url' => $url, 'offer_type' => $category]);
        $_SESSION['success'] = 'Offer added successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up offer form first';
}

header('location: category.php');

?>
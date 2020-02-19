
<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM subcategory WHERE name=:name");
    $stmt->execute(['name' => $name]);
    $row = $stmt->fetch();

    if ($row['numrows'] > 0) {
        $_SESSION['error'] = 'SubCategory already exist';
    } else {
        if (!empty($filename)) {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $new_filename = $slug . '.' . $ext;
            move_uploaded_file($_FILES['photo']['tmp_name'], '../images/subcategory/' . $new_filename);
        } else {
            $new_filename = '';
        }
        try {
            $stmt = $conn->prepare("INSERT INTO subcategory (name,sub_catslug,type,photo) VALUES (:name,:sub_catslug,:type,:photo)");
            $stmt->execute(['name' => $name, 'sub_catslug' => $name, 'type' => $type, 'photo' => $new_filename]);
            $_SESSION['success'] = 'Sub-Category added successfully';
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up subcategory form first';
}

header('location: subcategory.php');

?>
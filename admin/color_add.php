
<?php
include 'includes/session.php';

if (isset($_POST['color_add'])) {
    $color = $_POST['color'];

    $conn = $pdo->open();
        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM color WHERE color_name=:color_name");
        $stmt->execute(['color_name' => $color]);
    $row = $stmt->fetch();

    if ($row['numrows'] > 0) {
        $_SESSION['error'] = 'Color already exist';
    } else {
    try {
        $stmt = $conn->prepare("INSERT INTO color (color_name) VALUES (:color_name)");
        $stmt->execute(['color_name' => $color]);
        $_SESSION['success'] = 'Offer added successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
}
}
header('location: color_master.php');

?>
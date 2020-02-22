
<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM warehouse WHERE name=:name");
    $stmt->execute(['name' => $name]);
    $row = $stmt->fetch();

    if ($row['numrows'] > 0) {
        $_SESSION['error'] = 'Warehouse already exist';
    } else {
        try {
            $stmt = $conn->prepare("INSERT INTO warehouse (name,city,state,pincode) VALUES (:name,:city,:state,:pincode)");
            $stmt->execute(['name' => $name, 'city' => $city, 'state' => $state, 'pincode' => $pincode]);
            $_SESSION['success'] =  $name . ' Warehouse added successfully';
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up warehouse form first';
}

header('location: warehouse.php');

?>
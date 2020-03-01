
<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $id = $_POST['deliveryid'];
    $name = $_POST['assign_to'];
    $product = $_POST['product'];
    $pickup = $_POST['pickup'];
    $shipaddress = $_POST['shipaddress'];
    $status = $_POST['status'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT  COUNT(*) AS numrows FROM assigndelivery where assign_to=:assign_to");
    $stmt->execute(['assign_to' => $name]);
    $row = $stmt->fetch();

    if ($row['numrows'] >= 10) {
        $_SESSION['error'] = $name . ' already Have 10 delivery order';
    } else {
        try {
            $stmt = $conn->prepare("INSERT INTO assigndelivery (product_name,assign_to,pickup,ship_address,status) VALUES (:product_name,:assign_to,:pickup,:ship_address,:status)");
            $stmt->execute(['product_name' => $product, 'assign_to' => $name, 'pickup' => $pickup, 'ship_address' => $shipaddress, 'status' => $status]);

            $_SESSION['success'] = $product .  ' will be delivered by ' . $name . ' successfully';

            $stmt2 = $conn->prepare("DELETE FROM delivery_details where id=:id");
            $stmt2->execute(['id' => $id]);
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }
    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up deliverey order form first';
}

header('location: deliveryboyassignwork.php');

?>
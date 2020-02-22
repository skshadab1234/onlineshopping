<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
    $stmt->execute(['email' => $email]);
    $row = $stmt->fetch();

    if ($row['numrows'] > 0) {
        $_SESSION['error'] = 'Email already taken';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $filename = $_FILES['photo']['name'];
        $now = date('Y-m-d');
        if (!empty($filename)) {
            move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $filename);
        }
        try {
            $stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, type, address, contact_info, photo, status, created_on) VALUES (:email, :password, :firstname, :lastname, :type, :address, :contact, :photo, :status, :created_on)");
            $stmt->execute(['email' => $email, 'password' => $password, 'firstname' => $firstname, 'lastname' => $lastname, 'type' => 2, 'address' => $address, 'contact' => $contact, 'photo' => $filename,  'status' => 1, 'created_on' => $now]);
            $_SESSION['success'] = 'Delivery Boy  added successfully';
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up user form first';
}

header("Location: deliveryboy.php");

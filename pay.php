<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "ecomm";


// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$product_name = $_POST['product_name'];
$price = $_POST['price'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];



include 'instamojo/Instamojo.php';
$api = new Instamojo\Instamojo('test_1ec400eae4fdc8e8cacf8c39403', 'test_53c6936ef5e6ef267b9e9c62b5a', 'https://test.instamojo.com/api/1.1/');
try {


    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "send_email" => true,
        "email" => $email,
        "phone" => $phone,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_sms" => true,
        "allow_repeated_payments" => false,
        "redirect_url" => "http://localhost/ecomm/thankyou.php"
    ));

    $pay_url = $response['longurl'];
    header("location:$pay_url");
} catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

<?php
  include 'includes/session.php';
    $conn = $pdo->open();

      
      try{
        $stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
        $stmt->execute(['user_id'=>$user['id']]);

foreach($stmt as $row){
$stmt = $conn->prepare("INSERT INTO cod (product_name, Payment_mode, Address) VALUES (:product_name, :Payment_mode, :Address, :amountpaid)");
$stmt->execute(['product_name'=>"sk", 'Payment_mode'=>"cod", 'Address'=>"sk"]);
}

        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
        $stmt->execute(['user_id'=>$user['id']]);

      }
      catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
      }

    $pdo->close();
  
  header('location: orderconfirm.php');
  
?>
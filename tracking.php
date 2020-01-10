<?php
include 'includes/session.php';

$id = $_POST['id'];

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM sales WHERE id=:id");
$stmt->execute(['id'=>$id]);
foreach($stmt as $row){
$output['order'] = $row['id'];
}
$pdo->close();
echo json_encode($output);

?>
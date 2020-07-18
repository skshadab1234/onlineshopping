<?php
include 'includes/session.php';

$conn = $pdo->open();
$output = array('error' => false);

if (isset($_POST['emailid'])) {
$emailid = $_POST['emailid'];
	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM newsletter WHERE email_id=:email_id");
	$stmt->execute(['email_id' => $emailid]);
	$row = $stmt->fetch();
	if ($row['numrows'] < 1) {
		try {
			$now = date('Y-m-d');
			$stmt = $conn->prepare("INSERT INTO newsletter (email_id,status,added_on) VALUES (:email_id,:status,:added_on)");
			$stmt->execute(['email_id' => $emailid, 'status' => 0, 'added_on'=>$now]);

			$output = "Thanks for signing up. You must confirm your email address before we can send you. Please check your email and follow the instruction";


			// $header = "FROM: bac@gmail.com \r\n";
			// $header = "Cc: basaac@gmail.com \r\n";
			// $header = "MIME-Version 1.0\r\n";
			// $header = "Content-type: text/html\r\n";
		 // 	$mail =	mail ($emailid, "Confirm Nesletter", $header);
		 // 	if ($mail == true) {
			// $output = 'Item added to cart <a href="cart_view.php">View Cart</a>';
		 // 	}
		 // 	else{
			// $output = 'Try again later';
		 // 	}
		} catch (PDOException $e) {
			$output = true;
			$output = $e->getMessage();
		}
	} else {
		$output = true;
		$output = "You have already Subscribe our Newsletter";
	}
}


$pdo->close();
echo json_encode($output);

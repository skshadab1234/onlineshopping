<?php
include 'includes/session.php';

if (isset($_POST['upload'])) {
	$id = $_POST['id'];
	$filename = $_FILES['photo']['name'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
	$stmt->execute(['id' => $id]);
	$row = $stmt->fetch();

	if (!empty($filename)) {
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$new_filename = $row['slug'] . '_' . time() . '.' . $ext;
		move_uploaded_file($_FILES['photo']['tmp_name'], '../images/allproduct/' . $new_filename);
	}

	try {
		$stmt = $conn->prepare("UPDATE products SET photo=:photo WHERE id=:id");
		$stmt->execute(['photo' => $new_filename, 'id' => $id]);
		$_SESSION['success'] = 'Product photo updated successfully';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	$pdo->close();
}

elseif (isset($_POST['upload1'])) {
	$id = $_POST['id'];
	$filename = $_FILES['photo']['name'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
	$stmt->execute(['id' => $id]);
	$row = $stmt->fetch();

	if (!empty($filename)) {
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$new_filename = $row['slug'] . '_' . time() . '.' . $ext;
		move_uploaded_file($_FILES['photo']['tmp_name'], '../images/allproduct/' . $new_filename);
	}

	try {
		$stmt = $conn->prepare("UPDATE products SET photo2=:photo2 WHERE id=:id");
		$stmt->execute(['photo2' => $new_filename, 'id' => $id]);
		$_SESSION['success'] = 'Product photo updated successfully';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

} 

elseif (isset($_POST['upload3'])) {
	$id = $_POST['id'];
	$filename = $_FILES['photo']['name'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
	$stmt->execute(['id' => $id]);
	$row = $stmt->fetch();

	if (!empty($filename)) {
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$new_filename = $row['slug'] . '_' . time() . '.' . $ext;
		move_uploaded_file($_FILES['photo']['tmp_name'], '../images/allproduct/' . $new_filename);
	}

	try {
		$stmt = $conn->prepare("UPDATE products SET photo3=:photo3 WHERE id=:id");
		$stmt->execute(['photo3' => $new_filename, 'id' => $id]);
		$_SESSION['success'] = 'Product photo updated successfully';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

} 

elseif (isset($_POST['upload4'])) {
	$id = $_POST['id'];
	$filename = $_FILES['photo']['name'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
	$stmt->execute(['id' => $id]);
	$row = $stmt->fetch();

	if (!empty($filename)) {
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$new_filename = $row['slug'] . '_' . time() . '.' . $ext;
		move_uploaded_file($_FILES['photo']['tmp_name'], '../images/allproduct/' . $new_filename);
	}

	try {
		$stmt = $conn->prepare("UPDATE products SET photo4=:photo4 WHERE id=:id");
		$stmt->execute(['photo4' => $new_filename, 'id' => $id]);
		$_SESSION['success'] = 'Product photo updated successfully';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

} 

elseif (isset($_POST['upload5'])) {
	$id = $_POST['id'];
	$filename = $_FILES['photo']['name'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
	$stmt->execute(['id' => $id]);
	$row = $stmt->fetch();

	if (!empty($filename)) {
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$new_filename = $row['slug'] . '_' . time() . '.' . $ext;
		move_uploaded_file($_FILES['photo']['tmp_name'], '../images/allproduct/' . $new_filename);
	}

	try {
		$stmt = $conn->prepare("UPDATE products SET photo5=:photo5 WHERE id=:id");
		$stmt->execute(['photo5' => $new_filename, 'id' => $id]);
		$_SESSION['success'] = 'Product photo updated successfully';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	$pdo->close();
} 

else {
	$_SESSION['error'] = 'Select product to update photo first';
}

header('location: products.php');

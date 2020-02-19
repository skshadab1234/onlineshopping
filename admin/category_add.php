
<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$filename = $_FILES['photo']['name'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM category WHERE name=:name");
	$stmt->execute(['name' => $name]);
	$row = $stmt->fetch();

	if ($row['numrows'] > 0) {
		$_SESSION['error'] = 'Category already exist';
	} else {
		if (!empty($filename)) {
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $slug . '.' . $ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/category/' . $new_filename);
		} else {
			$new_filename = '';
		}

		try {
			$stmt = $conn->prepare("INSERT INTO category (name,cat_slug,photo) VALUES (:name,:cat_slug,:photo)");
			$stmt->execute(['name' => $name, 'cat_slug' => $name, 'photo' => $new_filename]);
			$_SESSION['success'] = 'Category added successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Fill up category form first';
}

header('location: category.php');

?>
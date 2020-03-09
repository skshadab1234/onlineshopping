
<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $set = 'skshadab1fiojioajadjgdasuij23456';
    $code = substr(str_shuffle($set), 0, 12);
    $name = $_POST['name'];
    $type = 0;
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM slider WHERE slider_name=:slider_name");
    $stmt->execute(['slider_name' => $name]);
    $row = $stmt->fetch();

    if ($row['numrows'] > 0) {
        $_SESSION['error'] = $name.' Slider already exist';
    } else {
        if (!empty($filename)) {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $new_filename = $code . '.' . $ext;
            move_uploaded_file($_FILES['photo']['tmp_name'], '../images/sliders/' . $new_filename);
        } else {
            $new_filename = '';
        }
        try {
            $stmt = $conn->prepare("INSERT INTO slider (slider_name,slider_photo,slider_type) VALUES (:slider_name,:slider_photo,:slider_type)");
            $stmt->execute(['slider_name' => $name, 'slider_type' => $type, 'slider_photo' => $new_filename]);
            $_SESSION['success'] = 'Sub-Category added successfully';
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }
    $pdo->close();
}
    elseif(isset($_POST['addcat'])){
        $set = 'skshadab1fiojioajadjgdasuij23456';
        $code = substr(str_shuffle($set), 0, 12);
        $name = $_POST['name'];
        $type = 1;
        $filename = $_FILES['photo']['name'];
    
        $conn = $pdo->open();
    
        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM slider WHERE slider_name=:slider_name");
        $stmt->execute(['slider_name' => $name]);
        $row = $stmt->fetch();
    
        if ($row['numrows'] > 0) {
            $_SESSION['error'] = $name.' Slider already exist';
        } else {
            if (!empty($filename)) {
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $new_filename = $code . '.' . $ext;
                move_uploaded_file($_FILES['photo']['tmp_name'], '../images/sliders/' . $new_filename);
            } else {
                $new_filename = '';
            }
            try {
                $stmt = $conn->prepare("INSERT INTO slider (slider_name,slider_photo,slider_type) VALUES (:slider_name,:slider_photo,:slider_type)");
                $stmt->execute(['slider_name' => $name, 'slider_type' => $type, 'slider_photo' => $new_filename]);
                $_SESSION['success'] = 'Sub-Category added successfully';
            } catch (PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }
        $pdo->close();
        
} else {
    $_SESSION['error'] = 'Fill up slider adding form first';
}

header('location: slider.php');

?>
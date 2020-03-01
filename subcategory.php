<?php include 'includes/session.php'; ?>
<?php
if (isset($_GET['styles'])) {
  $slug = $_GET['styles'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("SELECT * FROM subcategory WHERE sub_catslug = :slug");
    $stmt->execute(['slug' => $slug]);
    $subcat = $stmt->fetch();
    $subcatid = $subcat['id'];
  } catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
  }

  $pdo->close();
} else {
  $brand = $_GET['brand'];
  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("SELECT * FROM brands WHERE brand_name = :slug");
    $stmt->execute(['slug' => $brand]);
    $brand = $stmt->fetch();
    $brandname = $brand['id'];
  } catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
  }

  $pdo->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php

    if (isset($_GET['styles'])) {
      echo $subcat['name'];
    } else {
      echo $brand['brand_name'];
    }
    ?> </title>
</head>

<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<body>

  <div class="wrapper">
    <?php include 'includes/sidenav.php' ?>
    <div class="content-wrapper">

      <div style="background:#fff;height:100%">
        <!-- Main content -->
        <section class="content">
          <ul class="breadcrumb text-right">
            <li><a href="#">Home</a></li>
            <li><a href="#"><?php
                            if (isset($_GET['styles'])) {
                              echo $subcat['name'];
                            } else {
                              echo $brand['brand_name'];
                            }
                            ?> </a></li>
          </ul>

        </section>
      </div>
    </div>
  </div>

  <?php include 'includes/scripts.php' ?>
</body>

</html>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php' ?>

<?php
$slug = $_GET['subcategory'];

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $subcat['name']; ?> </title>
</head>

<body>
  <div class="desktop">
    <?php include 'includes/navbar.php' ?>
  </div>

  <div class="wrapper">
    <?php include 'includes/sidenav.php' ?>
    <div class="content-wrapper">

      <div style="background:#fff;height:100%">
        <!-- Main content -->
        <section class="content">
          <ul class="breadcrumb text-right">
            <li><a href="#">Home</a></li>
            <li><a href="#"><?php echo $subcat['name'] ?></a></li>
          </ul>

        </section>
      </div>
    </div>
  </div>
  <!-- mobile view -->
  <div class="container-fluid1" id="mobileview">
    <img src="images/arrow1.png" onclick="history.back(-1)" id="arrow" alt="">

    <div id="brand">
      <?php echo $subcat['name'] ?>
    </div>
    <div class="rightsection pull-right">
      <ul>
        <li>
          <a href="#"><i class="fa fa-heart-o"></i></a>
        </li>
        <a href="#" data-toggle="modal" data-target="#cart1">
          <img src="images/cart.png" alt="Cart" style="width: 30px;height: 30px;position: relative;top:-4px;">
          <span class="cart_count" style="position: relative;left: -18px;top: -9px;color: red;border-radius: 50%;font-size: 14px;"></span>
        </a>
        </li>
      </ul>
    </div>
  </div>

  <?php include 'includes/scripts.php' ?>
</body>

</html>
<?php include 'includes/session.php'; ?>
<?php
if (!isset($_POST['keyword'])) {
  header('location: index.php');
}
?>
<?php include 'includes/header.php'; ?>
  
<title><?php echo '' . $_POST['keyword'] . ''; ?> </title>

<body class="hold-transition skin-blue layout-top-nav">
  <?php include 'includes/navbar.php'; ?>

  <div class="wrapper">


    <div class="container-fluid" style="margin-top: 70px">

      <!-- Main content -->
      <div class="row">
          <?php

          $conn = $pdo->open();

          $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
          $stmt->execute(['keyword' => '%' . $_POST['keyword'] . '%']);
          $row = $stmt->fetch();
          if ($row['numrows'] < 1) {
            echo '<h1 class="page-header" style="color:grey">No results found for <i>' . $_POST['keyword'] . '</i></h1>
              <h5> ' . $row['numrows'] . ' Results </h5>';
          } else {
            echo '<h1 class="page-header" style="color:grey">Search results for <i>' . $_POST['keyword'] . '</i></h1>
              <h5> ' . $row['numrows'] . ' Results </h5>';
              $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
              $stmt->execute(['keyword' => '%' . $_POST['keyword'] .    '%']);

              foreach ($stmt as $row) {
                $highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
                $image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
                $image2 = (!empty($row['photo2'])) ? 'images/allproduct/' . $row['photo2'] : 'images/noimage.jpg';

          ?>
                  <!-- Single Product -->
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="product.php?product=<?= $row['slug']  ?> "><img src="<?= $image ?>" alt="">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="<?= $image2 ?>" alt="">
                                      </a>
                                        <!-- Product Badge -->
                                        <div class="product-badge offer-badge">
                                            <span>-<?= $row['discount'] ?>%</span>
                                        </div>
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <a href="product.php?product=<?= $row['slug']  ?> ">
                                            <h6><?= $row['name'] ?></h6>
                                        </a>
                                        <p class="product-price"><span class="old-price">&#8377; <?= $row['old_price'] ?></span> &#8377; <?= $row['price'] ?></p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="#" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

      <?php      }
          }
          $pdo->close();

              ?>
                  </div>

                </div>
        </div>


        <?php include 'includes/footer.php'; ?>
      </div>
  <?php include 'includes/essence_script.php'; ?>

      <?php include 'includes/scripts.php'; ?>
</body>

</html>
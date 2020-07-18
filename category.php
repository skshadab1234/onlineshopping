<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
if (isset($_GET['category'])) {
  $slug = $_GET['category'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
    $stmt->execute(['slug' => $slug]);
    $cat = $stmt->fetch();
    $catid = $cat['id'];
  } catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
  }

  $pdo->close();
}
?>

  <head>
    <title><?php echo $cat['name']; ?> </title>
    <link rel="stylesheet" href="build/swiper.min.css">
  </head>

  <body class="hold-transition layout-top-nav">
    <?php
    include 'includes/navbar.php';
    ?>  
    <div class="wrapper">
        <div class="content-wrapper" style="background:#fff;margin:0px">
        <!-- Main content -->
        <section class="content" style="padding: 10px 0;">
       <section class="slide1" style="margin-top: 10px">
    <div class="wrap-slick1">
      <div class="slick1">
         <?php
          $stmt = $conn->prepare("SELECT * FROM slider LEFT JOIN category  On category.id = slider.slider_name LEFT JOIN subcategory on subcategory.id = slider.slider_name where cat_slug = :slug");
          $stmt->execute(['slug'=>$slug]);
          foreach ($stmt as $row) {
            $image = (!empty($row['slider_photo'])) ? 'images/sliders/' . $row['slider_photo'] : 'images/noimage.jpg';
            ?>
         <a href="subcategory.php?styles=<?= str_replace("&", "and", $row['sub_catslug']) ?>">
          <div class="item-slick1 item1-slick1" style="background-image: url(<?= $image ?>);">
          <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
            <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
            
            </div>
          </div>
        </div>
      </a>

       <?php } ?>

      </div>
    </div>
  </section>

    <!-- Banner -->
  <div class="banner bgwhite p-t-40 p-b-40">
    <div class="container-fluid">
      <div class="row">
        <?php
          $stmt = $conn->prepare("SELECT * FROM subcategory WHERE cat_id = :cat_id ORDER BY RAND()");
          $stmt->execute(['cat_id'=>$catid]);
          foreach ($stmt as $row) {
            $image = (!empty($row['subcat_photo'])) ? 'images/subcategory/' . $row['subcat_photo'] : 'images/noimage.jpg';
            ?>
        <div class="col-sm-6 col-md-6 col-lg-3 m-l-r-auto">
          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="<?= $image ?>" alt="IMG-BENNER">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              <a href="subcategory.php?styles=<?= str_replace("&", "and", $row['sub_catslug']) ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                <?= $row['name'] ?>
              </a>
            </div>
          </div>
        </div>
<?php } ?>  
      </div>
    </div>
  </div>


</section>
</div>
</div>
<?php     include 'includes/footer.php'; ?>

</body>
  <!-- 
  <div id="mobilefilter">
    <a href="" data-toggle="modal" data-target="#filter"><i class="fa fa-filter"></i> Filter</a>
    <a href="" data-toggle="modal" data-target="#filter" id="sort"><i class="fa fa-sort"></i> Sort</a>
  </div> -->
  <?php include 'includes/essence_script.php'; ?>

  <?php include 'includes/scripts.php'; ?>

  </body>

  </html>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php  ?>
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
      <!-- <?php include 'includes/sidenav.php' ?> -->
      <div class="content-wrapper" style="background:#fff;margin:0px">
        <!-- Main content -->
        <section class="content" style="padding: 10px 0;">
          <div id="mb-men">

            <div class="swiper-container swiper2" style="padding-top: 10px;background:#f5f5f6;">
              <div class="swiper-wrapper">
                <?php
                $conn = $pdo->open();
                try {
                  $stmt = $conn->prepare("SELECT * FROM category_banner WHERE banner_type = :catid");
                  $stmt->execute(['catid' => $catid]);
                  foreach ($stmt as $row) {
                    $image = (!empty($row['banner_photo'])) ? 'images/cat_banner/' . $row['banner_photo'] : 'images/noimage.jpg';
                    echo "
                    <div class='swiper-slide'><a href='" . $row['url'] . "'><img src='" . $image . "'  style='background:pink'></a></div>
                    ";
                  }
                } catch (PDOException $e) {
                  echo "There is some problem in connection: " . $e->getMessage();
                }
                $pdo->close();
                ?>
              </div>
            </div>

            <div class="swiper-container swiper1" style="padding-top: 10px;background:#f5f5f6;">
              <div class="swiper-wrapper">
                <?php

                $stmt = $conn->prepare("SELECT * FROM category_offer WHERE offer_type = :offer_type");
                $stmt->execute(['offer_type' => $catid]);
                foreach ($stmt as $row) {
                  $image = (!empty($row['offer_photo'])) ? 'images/category_offer/' . $row['offer_photo'] : 'images/noimage.jpg';
                  echo "
  <div class='swiper-slide'><a href='" . $row['offer_url'] . "'><img src='" . $image . "' class='img-rounded'  width='320px' style='background:pink'></a></div>";
                }
                ?>
              </div>
            </div>

            <div class="container-fluid" style="position:relative;padding:0">
              <?php
              $stmt = $conn->prepare("SELECT * FROM subcategory WHERE name = :name");
              $stmt->execute(['name' => $_GET['category']]);
              foreach ($stmt as $row) {
                $image = (!empty($row['photo'])) ? 'images/subcategory/' . $row['photo'] : 'images/noimage.jpg';
                echo "
                <img src='" . $image . "' style='background:pink'>
                ";
              }

              ?>
            </div>

            <div class="container-fluid" style="padding:0;margin:0px;text-align:center;background:#f5f5f6">
              <?php

              $conn = $pdo->open();

              try {
                $inc = 4;
                $stmt = $conn->prepare("SELECT * FROM subcategory WHERE type = :type");
                $stmt->execute(['type' => $_GET['category']]);
                foreach ($stmt as $row) {
                  $image = (!empty($row['photo'])) ? 'images/subcategory/' . $row['photo'] : 'images/noimage.jpg';
                  $inc = ($inc == 4) ? 1 : $inc + 1;
                  if ($inc == 4) echo "<div class='row' style='margin:0'>";
                  echo "
<div class=\"col-xs-4 col-sm-3\" style='padding:5px'>
<div class='container-fluid1' style='margin-top:10px;padding:0;'>
<a href='subcategory.php?styles=" . $row['sub_catslug'] . "' ><img src='" . $image . "' style='background:pink'  width='150px' height='150px;'></a>    
</div>
</div>
";

                  if ($inc == 6) echo "</div>";
                }
                if ($inc == 3) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
                if ($inc == 3) echo "<div class='col-xs-4'></div></div>";
              } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
              }

              $pdo->close();
              ?>
            </div>


            <div class="container-fluid" style="position:relative;padding:0">
              <?php
              $stmt = $conn->prepare("SELECT * FROM subcategory WHERE name = 'brands'");
              $stmt->execute(['name' => $_GET['category']]);
              foreach ($stmt as $row) {
                $image = (!empty($row['photo'])) ? 'images/subcategory/' . $row['photo'] : 'images/noimage.jpg';
                echo "
                <img src='" . $image . "' style='background:pink'>
                ";
              }

              ?>
            </div>
            <div class="container-fluid" style="padding:0;margin:0px;text-align:center;background:#f5f5f6">
              <?php

              $conn = $pdo->open();

              try {
                $inc = 4;
                $stmt = $conn->prepare("SELECT * FROM brands WHERE category = :category");
                $stmt->execute(['category' => $catid]);
                foreach ($stmt as $row) {
                  $image = (!empty($row['brand_image'])) ? 'images/brand/' . $row['brand_image'] : 'images/noimage.jpg';
                  $inc = ($inc == 4) ? 1 : $inc + 1;
                  if ($inc == 4) echo "<div class='row' style='margin:0'>";
                  echo "
<div class=\"col-xs-4 col-sm-3\" style='padding:5px'>
<div class='container-fluid1' style='margin:0px;padding:0;'>
<a href='subcategory.php?brand=" . $row['brand_name'] . "' ><img src='" . $image . "' style='background:pink'  width='150px' height='180px;'></a>    
</div>
</div>
";

                  if ($inc == 6) echo "</div>";
                }
                if ($inc == 3) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
                if ($inc == 3) echo "<div class='col-xs-4'></div></div>";
              } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
              }

              $pdo->close();
              ?>
            </div>

        </section>
      </div>
      <?php include 'includes/footer.php'; ?>
    </div>
  <?php } else {
  ?>
    <title>Choose Category</title>
    <div class="wrapper">
      <?php
      include 'includes/navbar.php';
      ?>
      <!-- Main content -->
      <section class="content" style="padding: 0;">
        <?php

        $conn = $pdo->open();

        try {
          $inc = 4;
          $stmt = $conn->prepare("SELECT * FROM category");
          $stmt->execute();
          foreach ($stmt as $row) {
            $image = (!empty($row['photo'])) ? 'images/category/' . $row['photo'] : 'images/noimage.jpg';
            $inc = ($inc == 4) ? 1 : $inc + 1;
            if ($inc == 4) echo "<div class='row'>";
            echo "
<div class=\"col-xs-6 col-sm-6 col-md-6 col-lg-4 container-fluid text-center\" >
  <div style='background:lightpink;padding:10px;margin:10px;border-radius:5px;box-shadow:0px 5px 9px -3px'> <a href='category.php?category=" . $row['cat_slug'] . "' ><img src='" . $image . "'   class='img-circle' width='100px' height='100px'>
<h5 style='position:relative;top:13px;color:#010101;font-family:calibri;font-size:20px;'>" . $row['name'] . "</h5>
  </a>
 </div>    
</div>
";

            if ($inc == 4) echo "</div>";
          }
          if ($inc == 4) echo "<div class='col-sm-3'></div><div class='col-sm-3'></div></div>";
          if ($inc == 4) echo "<div class='col-sm-3'></div></div>";
        } catch (PDOException $e) {
          echo "There is some problem in connection: " . $e->getMessage();
        }

        $pdo->close();
        ?>
    </div>
    </section>
    </div>
    </div>
  <?php
}

  ?>
  <!-- 
  <div id="mobilefilter">
    <a href="" data-toggle="modal" data-target="#filter"><i class="fa fa-filter"></i> Filter</a>
    <a href="" data-toggle="modal" data-target="#filter" id="sort"><i class="fa fa-sort"></i> Sort</a>
  </div> -->
  <?php include 'includes/scripts.php'; ?>
  <script src="build/swiper.min.js"></script>

  <script>
    var swiper2 = new Swiper('.swiper1', {
      slidesPerView: 1,
      spaceBetween: -40,
      pagination: {
        el: '.swiper-pagination1',
        clickable: true,
      },
    });

    var swiper1 = new Swiper('.swiper2', {
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.swiper-pagination1',
        clickable: true,
      },
    });
  </script>

  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

  </body>

  </html>
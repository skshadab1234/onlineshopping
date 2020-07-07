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
          <!-- for mobile view -->
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
                $image = (!empty($row['subcat_photo'])) ? 'images/subcategory/' . $row['subcat_photo'] : 'images/noimage.jpg';
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
                  $image = (!empty($row['subcat_photo'])) ? 'images/subcategory/' . $row['subcat_photo'] : 'images/noimage.jpg';
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
                $image = (!empty($row['subcat_photo'])) ? 'images/subcategory/' . $row['subcat_photo'] : 'images/noimage.jpg';
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
          </div>
      </div>

      </section>
      <!-- end of mobile view -->
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
        <div class="container-fluid" style="margin:100px 0;padding:0">
          <?php

          $conn = $pdo->open();

          try {
            $inc = 4;
            $stmt = $conn->prepare("SELECT * FROM category");
            $stmt->execute();
            foreach ($stmt as $row) {
              $image = (!empty($row['photo'])) ? 'images/category/' . $row['photo'] : 'images/noimage.jpg';
              $inc = ($inc == 4) ? 1 : $inc + 1;
              if ($inc == 4) echo "<div class='row' style='margin:0'>";
              echo "
<div class='container-fluid' style='padding:0;margin:0;overflow:hidden'>
<a href='category.php?category=" . $row['cat_slug'] . "' ><img src='" . $image . "' ></a>
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
  <?php
}

  ?>

  <div class="d-view container-fluid" style="width: 100%;padding:0">
    <div class="slider" id="slider1" style='width:100%;height:600px'>
      <!-- Slides -->
      <?php
      $stmt = $conn->prepare("SELECT * FROM slider  WHERE slider_name = :catid ");
      $stmt->execute(['catid' => $catid]);
      foreach ($stmt as $row) {
        $image = (!empty($row['slider_photo'])) ? 'images/sliders/' . $row['slider_photo'] : 'images/noimage.jpg';
        echo "
            <div>
                <a href='subcategory.php?s=" . $row['slider_name'] . "?off=".$row['slider_off']."'><img src='" . $image . "' style='background:pink;height:600px'></a>
                </div>
                ";
      }
      ?>
      <!-- The Arrows -->
      <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100">
          <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>
        </svg></i>
      <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100">
          <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path>
        </svg></i>
    </div>
    <div class="container-fluid" style="position:relative;padding:0;text-align:center;background:#f5f5f6">
      <?php
      $stmt = $conn->prepare("SELECT * FROM subcategory WHERE name = 'brands'");
      $stmt->execute(['name' => $_GET['category']]);
      foreach ($stmt as $row) {
        $image = (!empty($row['subcat_photo'])) ? 'images/subcategory/' . $row['subcat_photo'] : 'images/noimage.jpg';
        echo "
                <img src='" . $image . "' style='background:pink'>
                ";
      }

      ?>
    </div>
    <div class="container-fluid" style="padding:0;text-align:center;background:#f5f5f6">
      <?php

      $conn = $pdo->open();

      try {
        $inc = 6;
        $stmt = $conn->prepare("SELECT * FROM brands WHERE category = :category");
        $stmt->execute(['category' => $catid]);
        foreach ($stmt as $row) {
          $image = (!empty($row['brand_image'])) ? 'images/brand/' . $row['brand_image'] : 'images/noimage.jpg';
          $inc = ($inc == 6) ? 1 : $inc + 1;
          if ($inc == 6) echo "<div class='row' style='margin:0'>";
          echo "
<div class=\"col-xs-4 col-sm-3 col-lg-2\" style='padding:5px'>
<div class='container-fluid1' style='margin:0px;padding:0;'>
<a href='subcategory.php?brand=" . $row['brand_name'] . "' ><img src='" . $image . "' style='background:#010101' ></a>    
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
    <div class="container-fluid" style="position:relative;padding:0;text-align:center;background:#f5f5f6">
      <?php
      $stmt = $conn->prepare("SELECT * FROM subcategory WHERE name = :name");
      $stmt->execute(['name' => $_GET['category']]);
      foreach ($stmt as $row) {
        $image = (!empty($row['subcat_photo'])) ? 'images/subcategory/' . $row['subcat_photo'] : 'images/noimage.jpg';
        echo "
                <img src='" . $image . "' style='background:pink'>
                ";
      }

      ?>
    </div>
    <div class="container-fluid" style="padding:0;text-align:center;background:#f5f5f6">
      <?php

      $conn = $pdo->open();

      try {
        $inc = 6;
        $stmt = $conn->prepare("SELECT * FROM subcategory WHERE type = :type");
        $stmt->execute(['type' => $_GET['category']]);
        foreach ($stmt as $row) {
          $image = (!empty($row['subcat_photo'])) ? 'images/subcategory/' . $row['subcat_photo'] : 'images/noimage.jpg';
          $inc = ($inc == 6) ? 1 : $inc + 1;
          if ($inc == 6) echo "<div class='row' style='margin:0'>";
          echo "
<div class=\"col-xs-4 col-sm-3 col-lg-2\" style='padding:5px'>
<div class='container-fluid1' style='margin:0px;padding:0;'>
<a href='subcategory.php?styles=" . $row['sub_catslug'] . "' ><img src='" . $image . "'  class='img-thumbnail'></a>    
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
    
  </div>
  <!-- 
  <div id="mobilefilter">
    <a href="" data-toggle="modal" data-target="#filter"><i class="fa fa-filter"></i> Filter</a>
    <a href="" data-toggle="modal" data-target="#filter" id="sort"><i class="fa fa-sort"></i> Sort</a>
  </div> -->
  <?php include 'includes/essence_script.php'; ?>

  <?php include 'includes/scripts.php'; ?>

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
  <script>
    (function($) {
      "use strict";
      $.fn.sliderResponsive = function(settings) {

        var set = $.extend({
            slidePause: 5000,
            fadeSpeed: 800,
            autoPlay: "on",
            showArrows: "off",
            hideDots: "off",
            hoverZoom: "on",
            titleBarTop: "off"
          },
          settings
        );

        var $slider = $(this);
        var size = $slider.find("> div").length; //number of slides
        var position = 0; // current position of carousal
        var sliderIntervalID; // used to clear autoplay

        // Add a Dot for each slide
        $slider.append("<ul></ul>");
        $slider.find("> div").each(function() {
          $slider.find("> ul").append('<li></li>');
        });

        // Put .show on the first Slide
        $slider.find("div:first-of-type").addClass("show");

        // Put .showLi on the first dot
        $slider.find("li:first-of-type").addClass("showli")

        //fadeout all items except .show
        $slider.find("> div").not(".show").fadeOut();

        // If Autoplay is set to 'on' than start it
        if (set.autoPlay === "on") {
          startSlider();
        }

        // If showarrows is set to 'on' then don't hide them
        if (set.showArrows === "on") {
          $slider.addClass('showArrows');
        }

        // If hideDots is set to 'on' then hide them
        if (set.hideDots === "on") {
          $slider.addClass('hideDots');
        }

        // If hoverZoom is set to 'off' then stop it
        if (set.hoverZoom === "off") {
          $slider.addClass('hoverZoomOff');
        }

        // If titleBarTop is set to 'on' then move it up
        if (set.titleBarTop === "on") {
          $slider.addClass('titleBarTop');
        }

        // function to start auto play
        function startSlider() {
          sliderIntervalID = setInterval(function() {
            nextSlide();
          }, set.slidePause);
        }

        // on mouseover stop the autoplay
        $slider.mouseover(function() {
          if (set.autoPlay === "on") {
            clearInterval(sliderIntervalID);
          }
        });

        // on mouseout starts the autoplay
        $slider.mouseout(function() {
          if (set.autoPlay === "on") {
            startSlider();
          }
        });

        //on right arrow click
        $slider.find("> .right").click(nextSlide)

        //on left arrow click
        $slider.find("> .left").click(prevSlide);

        // Go to next slide
        function nextSlide() {
          position = $slider.find(".show").index() + 1;
          if (position > size - 1) position = 0;
          changeCarousel(position);
        }

        // Go to previous slide
        function prevSlide() {
          position = $slider.find(".show").index() - 1;
          if (position < 0) position = size - 1;
          changeCarousel(position);
        }

        //when user clicks slider button
        $slider.find(" > ul > li").click(function() {
          position = $(this).index();
          changeCarousel($(this).index());
        });

        //this changes the image and button selection
        function changeCarousel() {
          $slider.find(".show").removeClass("show").fadeOut();
          $slider
            .find("> div")
            .eq(position)
            .fadeIn(set.fadeSpeed)
            .addClass("show");
          // The Dots
          $slider.find("> ul").find(".showli").removeClass("showli");
          $slider.find("> ul > li").eq(position).addClass("showli");
        }

        return $slider;
      };
    })(jQuery);



    //////////////////////////////////////////////
    // Activate each slider - change options
    //////////////////////////////////////////////
    $(document).ready(function() {

      $("#slider1").sliderResponsive({
        // Using default everything
        slidePause: 5000,
        fadeSpeed: 800,
        autoPlay: "on",
        showArrows: "off",
        hideDots: "off",
        hoverZoom: "on",
        titleBarTop: "off"
      });

      $("#slider2").sliderResponsive({
        fadeSpeed: 300,
        autoPlay: "off",
        showArrows: "on",
        hideDots: "on"
      });

      $("#slider3").sliderResponsive({
        hoverZoom: "off",
        hideDots: "on"
      });

    });
  </script>
  </body>

  </html>
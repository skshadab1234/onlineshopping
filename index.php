<?php include 'includes/session.php'; ?>
<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "ecomm");
?>
<?php include 'includes/header.php'; ?>

<head>
  <title>Ecomm- ONLINE SHOPPING</title>
  <link rel="stylesheet" href="build/swiper.min.css">
  <style>
    .container-fluid {
      margin-bottom: 10px;
      width: 99%;
      background: #fff;
    }

    #brandimage:hover {
      transform: scale(1.01);
      overflow: hidden;
      transition: transform, 0.5s ease all;
    }
  </style>
</head>

<body class="layout-top-nav">
  <?php include 'includes/navbar.php'; ?>
  <div class="wrapper">
    <?php include 'includes/sidenav.php' ?>
    <div class="content-wrapper">
      <section class="content">
        <div class="swiper-container swiper1" id="category_landing_page" style="margin-top:10px;">
          <div class="swiper-wrapper">
            <?php
            $stmt = $conn->prepare("SELECT * FROM category");
            $stmt->execute();
            foreach ($stmt as $row) {
              $image = (!empty($row['photo'])) ? 'images/category/' . $row['photo'] : 'images/noimage.jpg';
              echo "
              <div class='swiper-slide'><a href='category.php?category=" . $row['cat_slug'] . "'><img src='" . $image . "' class='img-rounded'  width='150px' style='background:pink;'></a></div>
              ";
            }
            ?>
          </div>
        </div>
        <!-- Slider 1 -->
        <div class="slider" id="slider1">
          <!-- Slides -->
          <?php
          $stmt = $conn->prepare("SELECT * FROM slider LEFT JOIN category  On category.id = slider.slider_name LEFT JOIN subcategory on subcategory.id = slider.slider_name where slider_type=0 ");
          $stmt->execute();
          foreach ($stmt as $row) {
            $image = (!empty($row['slider_photo'])) ? 'images/sliders/' . $row['slider_photo'] : 'images/noimage.jpg';
            echo "
            <div>
                <a href='subcategory.php?styles=".$row['sub_catslug']."'><img src='" . $image . "' style='background:pink'></a>
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
        <!-- Main content -->
        <div style="margin:0;padding:0">
          <?php
          if (isset($_SESSION['error'])) {
            echo "
    <div class='alert alert-danger'>
    " . $_SESSION['error'] . "
    </div>
    ";
            unset($_SESSION['error']);
          }
          ?>

          <div class="container-fluid" style="position:relative;padding:0;background:#f5f5f6;text-align:center">
            <?php
            $stmt = $conn->prepare("SELECT * FROM subcategory WHERE name = :name");
            $stmt->execute(['name' => "men"]);
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
              $stmt = $conn->prepare("SELECT * FROM subcategory where type=:type");
              $stmt->execute(['type' => "men"]);
              foreach ($stmt as $row) {
                $image = (!empty($row['subcat_photo'])) ? 'images/subcategory/' . $row['subcat_photo'] : 'images/noimage.jpg';
                $inc = ($inc == 4) ? 1 : $inc + 1;
                if ($inc == 4) echo "<div class='row' style='margin:0'>";
                echo "
<div class=\"col-xs-4 col-sm-3 col-lg-2\" style='padding:5px'>
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

          <div class="container-fluid" style="position:relative;padding:0;background:#f5f5f6;text-align:center">
            <?php
            $stmt = $conn->prepare("SELECT * FROM subcategory WHERE name = :name");
            $stmt->execute(['name' => "women"]);
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
              $stmt = $conn->prepare("SELECT * FROM subcategory where type=:type");
              $stmt->execute(['type' => "women"]);
              foreach ($stmt as $row) {
                $image = (!empty($row['subcat_photo'])) ? 'images/subcategory/' . $row['subcat_photo'] : 'images/noimage.jpg';
                $inc = ($inc == 4) ? 1 : $inc + 1;
                if ($inc == 4) echo "<div class='row' style='margin:0'>";
                echo "
<div class=\"col-xs-4 col-sm-3 col-lg-2\" style='padding:5px'>
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


          <div class="container-fluid text-center" style="margin-top:10px;background:#f5f5f6;margin:0;padding:0">

            <div class="container-fluid" style="position:relative;padding:0;background:#f5f5f6">
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

            <?php
            $conn = $pdo->open();
            try {
              $inc = 6;
              $stmt = $conn->prepare("SELECT * FROM brands limit 20");
              $stmt->execute();
              foreach ($stmt as $row) {
                $image = (!empty($row['brand_image'])) ? 'images/brand/' . $row['brand_image'] : 'images/noimage.jpg';
                $inc = ($inc == 6) ? 1 : $inc + 1;
                if ($inc == 6) echo "<div class='row' style='margin:0;padding:0'>";
            ?>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2">
                  <?php echo "<a href=\"subcategory.php?brand=" . $row['brand_name'] . "\"><img src='" . $image . "' class=\"img-fluid\" id=\"brandimage\" width='250px' height='250px'></a> "; ?>
                </div>

            <?php echo "
              ";
                if ($inc == 6) echo "</div>";
              }
              if ($inc == 6) echo "<div class='col-sm-3'></div><div class='col-sm-3'></div></div>";
              if ($inc == 6) echo "<div class='col-sm-3'></div></div>";
            } catch (PDOException $e) {
              echo "There is some problem in connection: " . $e->getMessage();
            }
            $pdo->close();
            ?>

          </div>

        </div>


        <div class="swiper-container swiper2" id="category_landing_page" style="padding: 10px;background:#f5f5f6;">
          <div class="swiper-wrapper">
            <?php

            $stmt = $conn->prepare("SELECT * FROM category_offer");
            $stmt->execute();
            foreach ($stmt as $row) {
              $image = (!empty($row['offer_photo'])) ? 'images/category_offer/' . $row['offer_photo'] : 'images/noimage.jpg';
              echo "
  <div class='swiper-slide'><a href='" . $row['offer_url'] . "'><img src='" . $image . "' class='img-rounded'  width='320px' height='200px' style='background:pink'></a></div>";
            }
            ?>
          </div>
        </div>
        <div class="container-fluid">
          <h2 class="mens" align="center">Monthly Top Sellers</h2>
          <div style="border-bottom: 5px solid #ff3f6c;;margin: -10px auto;width: 100px;border-radius: 50px"></div>
          <div style="margin-top: 40px">
            <?php
            $month = date('m');
            $conn = $pdo->open();

            try {
              $inc = 4;
              $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
              $stmt->execute();
              foreach ($stmt as $row) {
                $image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
                $inc = ($inc == 4) ? 1 : $inc + 1;
                if ($inc == 4) echo "<div class='row'>";
            ?>
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3" style="padding:10px">

                  <div class="card">
                    <?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img-fluid\" width='250px' height='250px'></a> "; ?>
                    <div class="card3" style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis;width:100%;position:relative;padding:10px">
                      <h5 class="text-left" style="font-size:20px;font-weight:700"><?php echo "" . $row['brand'] . " " ?></h5>
                      <?php echo "<a style=\"color:black\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a>"; ?>
                      <h5 class="text-left" style="font-size:16px"><?php echo "₹  " . number_format($row['price'], 2) . "" ?><span style="color:#313131;font-size:12px"><s><?php echo " ₹  " . number_format($row['old_price'], 2) . "" ?></s></span><span class="discountoffer" style="font-size:16px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;color:green"><?php echo " " . $row['discount'] . " " ?>OFF</span></h5>
                    </div>
                    <div class="fav" style="position:absolute;top:20px;right:20px;">
                      <a href=""><i class="fa fa-heart-o" style="font-size:20px"></i></a>
                    </div>
                    <div class="card1" style="position: absolute;top: 212px;background: #fff;padding: 10px;">
                      <button class="btn btn-primary" style="background:#ff3f6c;border:none;text-transform:uppercase;font-weight:bolder" data-toggle="modal" data-target="#<?php echo $row['id'] ?>5">Quick View</button>
                      <h5>Sizes : <?php echo "" . $row['size'] . "" ?></h5>
                    </div>

                    <div id="<?php echo $row['id']; ?>5" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><?php echo "<span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>
    "; ?></h4>
                            <div class="ribbon">
                              <span class="ribbon1"><span><?php echo "" . $row['discount'] . ""; ?> OFF </span></span>
                            </div>
                          </div>
                          <div class="modal-body">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-sm-6">
                                  <?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' title=\"" . $row['name'] . "\" class=\"img-thumbnail\"></a>"; ?>
                                </div>
                                <div class="col-sm-6">

                                  <?php echo "" . $row['brand'] . ""; ?>
                                  <?php echo "<br>"; ?>
                                  <?php echo " <span class=\"p-name\" title=\"" . $row['name'] . "\"><a style=\"font-size:14px;color:white;font-weight:600\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>"; ?>
                                  <br>
                                  <br>
                                  <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                  <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                  <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                  <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                  <i class="fa fa-star-o" style="color: orange;font-size: 14px"></i>
                                  <br><br>
                                  <span class="price" style="color: white;font-size: 20px"><?php echo "₹  " . number_format($row['price'], 2) . ""; ?></span>&nbsp;
                                  <small style="font-size: 14px;"><s><?php echo "₹  " . number_format($row['old_price'], 2) . ""; ?></s></small>
                                  <br>
                                  <br>

                                  <button class="btn btn-info" style="background-color: orange;border: orange"><?php echo "<a href='product.php?product=" . $row['slug'] . "' style=\"font-size:14px;color:white;font-weight:600\">See Product Details</a>"; ?></button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="quickview" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>

                <?php echo "
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
                </div>
          </div>

        </div>
      </section>

    </div>


    <!-- if you want to display modal on page load  -->
    <!-- <div id="myModal" class="modal" style="background-image: linear-gradient(254deg, #5909b3, #7f0dff);">
              <div class="modal-dialog" style="width: 100%;margin: 0;padding: 0">
                <div class="modal-content1">
                  <h5 class="mens" style="margin:250px 450px">Welcome to ECOMM</h5>
                </div>
              </div>
            </div> -->
    <!-- //end of modal display -->
  </div>
  <div style="margin-left:160px"><?php include 'includes/footer.php'; ?></div>

  <?php include 'includes/scripts.php'; ?>
  <script src="build/swiper.min.js"></script>

  <script>
    var swiper2 = new Swiper('.swiper1', {
      slidesPerView: 3,
      spaceBetween: 10,
      pagination: {
        el: '.swiper-pagination1',
        clickable: true,
      },
    });

    var swiper1 = new Swiper('.swiper2', {
      slidesPerView: 1,
      spaceBetween: -40,
      pagination: {
        el: '.swiper-pagination1',
        clickable: true,
      },
    });
  </script>

  <script type="text/javascript">
    $('.moreless-button').click(function() {
      $('.moretext').slideToggle();
      if ($('.moreless-button').text() == "VIEW LESS") {
        $(this).text("VIEW MORE")
      } else {
        $(this).text("VIEW LESS")
      }
    });
  </script>
  <!-- slider js -->
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
  <!-- 
          <script>
            setTimeout(function() {

              $('#myModal').modal('show');
            }, 0000);


            setTimeout(function() {
              $('#myModal').modal('hide');
            }, 5000);

            $('#myModal').delay(4000).fadeOut(6000);
          </script> -->
</body>

</html>
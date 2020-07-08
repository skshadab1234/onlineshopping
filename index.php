<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
 
<head>
  <title>Ecomm- ONLINE SHOPPING</title>
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

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>
        </div>
  

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
<?php
          $stmt1 = $conn->prepare("SELECT * FROM products LEFT JOIN brands ON brands.id = products.brand_id ORDER BY RAND()");
          $stmt1->execute();
            foreach ($stmt1 as $row1) {
            $image = (!empty($row1['photo'])) ? 'images/allproduct/' . $row1['photo'] : 'images/noimage.jpg';
            $image2 = (!empty($row1['photo2'])) ? 'images/allproduct/' . $row1['photo2'] : 'images/noimage.jpg';
           ?>
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                              <a href="product.php?product=<?php echo $row1['slug'] ?> ">
                                  <img src="<?php echo $image ?>" >
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="<?php echo $image2 ?>" alt="">
                              </a>
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span><?php echo $row1['brand_name'] ?></span>
                              <a href="product.php?product=<?php echo $row1['slug'] ?> ">
                                    <h6><?php echo $row1['name'] ?></h6>
                                </a>
                                <p class="product-price">&#8377; <?php echo $row1['price'] ?></p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                               <!--      <div class="add-to-cart-btn">
                                        <button data-toggle="modal" data-target="#<?php echo $row1['id'] ?>1" class="btn essence-btn">Quick view</button>

                                    </div> -->
                                </div>
                            </div>

              
                        </div>

                      <?php } ?>  
                      </div>
                    </div>
                  </div>
            </div>
    </section>
   
  

<!-- Filtering buttons -->
<div class="button-area filters">
  <label class="button">
    <input type="checkbox" value="group1" />Group 1
  </label>
  <label class="button">
    <input type="checkbox" value="group2" />Group 2
  </label>
  <label class="button">
    <input type="checkbox" value="group3" />Group 3
  </label>
  <label class="button">
    <input type="checkbox" value="group4" />Group 4
  </label>
</div>
<div id="mnsry_container">
    <?php
          $stmt2 = $conn->prepare("SELECT * FROM brands ORDER BY RAND()");
          $stmt2->execute();
            foreach ($stmt2 as $row2) {
                      $image = (!empty($row2['brand_image']) ? 'images/brand/' . $row2['brand_image'] . '' : 'images/noimage.jpg');
           ?>
<!-- Masonry contents -->
  <div class="item group1">
    <h1><?= $row2['brand_name'] ?></h1>
    <img src="<?= $image ?>" >
  </div>

<?php } ?>
 <!--  <div class="item group2">
    <h1>Group 2</h1>
    <img src="https://unsplash.it/600/400?image=1" />
  </div>
  <div class="item group3">
    <h1>Group 3</h1>
    <img src="https://unsplash.it/600/400?image=2" />
  </div>
  <div class="item group2">
    <h1>Group 2</h1>
    <img src="https://unsplash.it/600/400?image=3" />
  </div>
  <div class="item group1 group4">
    <h1>Group 1 & 4</h1>
    <img src="https://unsplash.it/600/400?image=4" />
  </div>
  <div class="item group2 group4">
    <h1>Group 2 & 4</h1>
    <img src="https://unsplash.it/600/400?image=5" />
  </div>
  <div class="item group3 group4">
    <h1>Group 3 & 4</h1>
    <img src="https://unsplash.it/600/400?image=6" />
  </div>
  <div class="item group2 group3">
    <h1>Group 2 & 3</h1>
    <img src="https://unsplash.it/600/400?image=7" />
  </div>
  <div class="item group3">
    <h1>Group 3</h1>
    <img src="https://unsplash.it/600/400?image=18" />
  </div>
  <div class="item group4">
    <h1>Group 4</h1>
    <img src="https://unsplash.it/600/400?image=9" />
  </div>
  <div class="item group1">
    <h1>Group 1</h1>
    <img src="https://unsplash.it/600/400?image=10" />
  </div>
  <div class="item group2">
    <h1>Group 2</h1>
    <img src="https://unsplash.it/600/400?image=11" />
  </div> -->
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
  <div><?php include 'includes/footer.php'; ?></div>
    <!-- ##### Right Side Cart End ##### -->


  <?php include 'includes/scripts.php'; ?>

    <?php include 'includes/essence_script.php'; ?>


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
  <script type="text/javascript">
      
// REMEMBER TO PUT THIS INSIDE 
// $(document).ready(function() 
// FILTER
    // A little fixed Multiple Filter Masonry here
    // https://github.com/digistate/resouces/blob/master/multipleFilterMasonry.js
    var 
      mContainer = $("#mnsry_container"),
        filterButton = $(".button");
        params = {
                itemSelector: ".item",
                filtersGroupSelector:".filters"
        };

    $(window).load(function() { 
  
      // Do mansonry with filtering 
      mContainer.multipleFilterMasonry(params);
      
      // Show articles with fadein
      mContainer.find(".item").animate({
        "opacity":1
        }, 1200);

      // Change the filtering button(label) status 
      filterButton.find("input").change(function(){
        $(this).parent().toggleClass("active");
      });
      
    });
  </script>
          <script>
            setTimeout(function() {

              $('#myModal').modal('show');
            }, 0000);


            setTimeout(function() {
              $('#myModal').modal('hide');
            }, 5000);

            $('#myModal').delay(4000).fadeOut(6000);
          </script> -->
          <!-- jQuery (Necessary for All JavaScript Plugins) -->
   <script type="text/javascript" src="https://cdn.rawgit.com/desandro/masonry/master/dist/masonry.pkgd.min.js"></script>
   <script type="text/javascript" src="https://cdn.rawgit.com/digistate/resouces/master/multipleFilterMasonry.js"></script>
</body>

</html>
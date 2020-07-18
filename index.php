<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
 
<head>
  <title>Ecomm- ONLINE SHOPPING</title>
  <style>
    .container-fluid {
      margin-bottom: 10px;
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
        <section class="slide1" style="margin-top: 10px">
    <div class="wrap-slick1">
      <div class="slick1">
         <?php
          $stmt = $conn->prepare("SELECT * FROM slider LEFT JOIN category  On category.id = slider.slider_name LEFT JOIN subcategory on subcategory.id = slider.slider_name where slider_type=0");
          $stmt->execute();
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

 
          <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Shop BestSelling Brands</h2>

                    </div>
                </div>
     <?php
            $conn = $pdo->open(); 
              $stmt = $conn->prepare("SELECT * FROM brands WHERE status=1");
              $stmt->execute();
              foreach ($stmt as $row) {
                $image = (!empty($row['brand_image'])) ? 'images/brand/' . $row['brand_image'] : 'images/noimage.jpg';
            ?>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2">
                  <?php echo "<a href=\"subcategory.php?brand=".str_replace("&", "and", $row['brand_name'])."\"><img src='" . $image . "' class=\"img-fluid\" id=\"brandimage\" ></a> "; ?>
                </div>
<?php }
            ?>
</div>
</div>
    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Popular Products</h2>
                        <?php
      if (isset($_SESSION['error'])) {
        echo "
            <p>" . $_SESSION['error'] . "</p> 
        ";
        unset($_SESSION['error']);
      }
      if (isset($_SESSION['success'])) {
        echo "
            <p>" . $_SESSION['success'] . "</p> 
        ";
        unset($_SESSION['success']);
      }
      ?>
                    </div>
                </div>
            </div>
        </div>
  

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
<?php
          $stmt1 = $conn->prepare("SELECT *, products.id AS prodid FROM products LEFT JOIN brands ON brands.id = products.brand_id LEFT JOIN wishlist ON products.id=wishlist.product_id");
          $stmt1->execute();
            foreach ($stmt1 as $row1) {
            $image = (!empty($row1['photo'])) ? 'images/allproduct/' . $row1['photo'] : 'images/noimage.jpg';
            $image2 = (!empty($row1['photo2'])) ? 'images/allproduct/' . $row1['photo2'] : 'images/noimage.jpg';
            $active='';
          $msg= '<div class="product-badge offer-badge">
                      <span>-'.$row1['discount'].'%</span>
                    </div>';
          if (strtotime($row1['date_view']) > (time() - (60*60*24*1))) {
            $msg = '<div class="product-badge new-badge">
                      <span>New</span>
                    </div>';
          }
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
                                  <?= $msg ?>
                                <!-- Favourite -->
                                        <div  class="product-favourite">
                                          <input type="hidden"  value="<?php echo $row1['prodid']; ?>" id="favoriate" name="id">
                                              <button onclick="add_fav()">
                                                <span class="favme fa fa-heart <?php echo $active ?>"></span>
                                              </button>
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
                                        <button data-toggle="modal" data-ta rget="#<?php echo $row1['id'] ?>1" class="btn essence-btn">Quick view</button>

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

</div>  
  <div><?php include 'includes/footer.php'; ?></div>
    <?php include 'includes/essence_script.php'; ?>
 	 <?php include 'includes/scripts.php'; ?>
 
         <!--  <script>
            setTimeout(function() {

              $('#myModal').modal('show');
            }, 0000);


            setTimeout(function() {
              $('#myModal').modal('hide');
            }, 5000);

            $('#myModal').delay(4000).fadeOut(6000);
          </script> --> -->
</body>

</html>
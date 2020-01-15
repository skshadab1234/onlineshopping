﻿    <?php include 'includes/session.php'; ?>	
    <?php 
    $link=mysqli_connect("localhost", "root","");
    mysqli_select_db($link,"ecomm");
    ?>				
    <?php include 'includes/header.php'; ?>
    <head>
    <title>Ecomm- ONLINE SHOPPING</title>
    <link rel="stylesheet" href="build/swiper.min.css">

    </head>
    <?php include 'includes/navbar.php'; ?>                     
    <body class="layout-top-nav" >
    <div class="wrapper">
    <div class="content-wrapper">
    <!-- Slider 1 -->
<div class="slider" id="slider1">
    <!-- Slides -->
    <div>
    <section class="section">
    <h2 align="right">Big Offer</h2>
    <h1>Big Sale</h1>
    <h5>Men's Clothing</h5>
    <a href="#">SHOP NOW</a>
    </section>
    </div>
    <div >
    <section class="section1">
    <h2>New Summer Arrivals <br> From RS. 1200</h2>
    <h5>woMen's Clothing</h5>
    <a href="#">SHOP NOW</a>
    </section>
    </div>
    <div>
    <section class="section2">
    <h2 align="right">Big Offer</h2>
    <h1>Big Sale</h1>
    <h5>Men's Clothing</h5>
    <a href="#">SHOP NOW</a>
    </section>
    </div>    <!-- The Arrows -->
    <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path></svg></i>
    <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path></svg></i>
</div>
    <!-- Main content -->
    <div class="row">
    <div class="col-sm-12">
    <?php
    if(isset($_SESSION['error'])){
    echo "
    <div class='alert alert-danger'>
    ".$_SESSION['error']."
    </div>
    ";
    unset($_SESSION['error']);
    }
    ?>

    <div class="container-fluid" style="margin-top: -40px;padding: 10px 20px" >
    <!--     
    <?php 
    $stmt = $conn->prepare("SELECT * FROM category WHERE id=1");
    $stmt->execute();
    foreach($stmt as $row){
    echo " 
    <div class=\"swiper-slide\"><a href=\"category.php?category=".$row['cat_slug']."\"><img src=\"images/category/men.webp\" width=\"150px\" style=\"border-radius: 50%\"></a>
    <h2 style=\"font-size: 18px\"><a class=\"cat\" href=\"\" >Men</a></h2></div>

    ";}?>
    <?php 
    $stmt = $conn->prepare("SELECT * FROM category WHERE id=2");
    $stmt->execute();
    foreach($stmt as $row){
    echo " 
    <div class=\"swiper-slide\"><a href=\"category.php?category=".$row['cat_slug']."\"><img src=\"images/category/women.webp\" width=\"150px\" style=\"border-radius: 50%\"></a>
    <h2 style=\"font-size: 18px\"><a class=\"cat\" href=\"\">Women</a></h2></div>
    ";}?>
    <?php 
    $stmt = $conn->prepare("SELECT * FROM category WHERE id=3");
    $stmt->execute();
    foreach($stmt as $row){
    echo " 
    <div class=\"swiper-slide\"><a href=\"category.php?category=".$row['cat_slug']."\"><img src=\"images/category/kids.webp\" width=\"150px\" style=\"border-radius: 50%\"></a>
    <h2 style=\"font-size: 18px\"><a class=\"cat\" href=\"\">Kids</a></h2></div>
    ";}?> -->
    </div>
    
    <div class="container-fluid"   id="clock1" style="border-radius: 4px;margin-top: -40px" >
    <div class="row" >
    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" id="clock2" align="center">
    <h2 class="mens">Deal of the Week <br><br>
    <div style="border-bottom: 5px solid #ff3f6c;margin: -10px auto;width: 100px;border-radius: 50px;margin-bottom: 40px;"></div>
    <span style="border: 1px solid lightcoral;padding: 10px;line-height: 40px;width: 400px"><i class="fa fa-clock-o" style="color: lightcoral;padding: 10px"></i><span id="demo" class="mens"></span></span></h2>
    </div>
    </div>
    <div id="clock">
    <div id="carousel3d1">
    <carousel-3d :perspective="0" :space="400" :display="10" :controls-visible="true" :controls-prev-html="'❬'" :controls-next-html="'❭'" :controls-width="30"  :controls-height="60" :clickable="true" :autoplay="true" :autoplay-timeout="3000" height="400px">
    <slide :index="0">
    <?php 
    $res=mysqli_query($link,"select * from products where id = 1");
    while ($row=mysqli_fetch_array($res)) {
    echo "<a href='product.php?product=".$row['slug']."'><img src='images/".$row['photo']."' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
    echo "<div class=\"ribbon\">
    <span class=\"ribbon1\"><span>".$row['discount']." OFF </span></span>
    </div></h1>
    ";
    echo "<br>";
    echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; ".number_format($row['price'], 0)." &nbsp;</span>";
    echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; ".number_format($row['old_price'], 0)."</s></small></span>";
    echo "<br>";
    echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>";	
    }
    ?>
    </slide>
    <slide :index="1">
    <?php 
    $res=mysqli_query($link,"select * from products where id = 8");
    while ($row=mysqli_fetch_array($res)) {
    echo "<a href='product.php?product=".$row['slug']."'><img src='images/".$row['photo']."' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
    echo "<div class=\"ribbon\">
    <span class=\"ribbon1\"><span>".$row['discount']." OFF </span></span>
    </div></h1>
    ";
    echo "<br>";
    echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; ".number_format($row['price'], 0)." &nbsp;</span>";
    echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; ".number_format($row['old_price'], 0)."</s></small></span>";
    echo "<br>";
    echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>";	
    }
    ?>
    </slide>
    <slide :index="2">
    <?php 
    $res=mysqli_query($link,"select * from products where id = 7");
    while ($row=mysqli_fetch_array($res)) {
    echo "<a href='product.php?product=".$row['slug']."'><img src='images/".$row['photo']."' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
    echo "<div class=\"ribbon\">
    <span class=\"ribbon1\"><span>".$row['discount']." OFF </span></span>
    </div></h1>
    ";
    echo "<br>";
    echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; ".number_format($row['price'], 0)." &nbsp;</span>";
    echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; ".number_format($row['old_price'], 0)."</s></small></span>";
    echo "<br>";
    echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>";	
    }
    ?>
    </slide>
    <slide :index="3">
    <?php 
    $res=mysqli_query($link,"select * from products where id = 5");
    while ($row=mysqli_fetch_array($res)) {
    echo "<a href='product.php?product=".$row['slug']."'><img src='images/".$row['photo']."' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
    echo "<div class=\"ribbon\">
    <span class=\"ribbon1\"><span>".$row['discount']." OFF </span></span>
    </div></h1>
    ";
    echo "<br>";
    echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; ".number_format($row['price'], 0)." &nbsp;</span>";
    echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; ".number_format($row['old_price'], 0)."</s></small> </span>";
    echo "<br>";
    echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>";	
    }
    ?>
    </slide>
    <slide :index="4">
    <?php 
    $res=mysqli_query($link,"select * from products where id = 4");
    while ($row=mysqli_fetch_array($res)) {
    echo "<a href='product.php?product=".$row['slug']."'><img src='images/".$row['photo']."' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
    echo "<div class=\"ribbon\">
    <span class=\"ribbon1\"><span>".$row['discount']." OFF </span></span>
    </div></h1>
    ";
    echo "<br>";
    echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; ".number_format($row['price'], 0)." &nbsp;</span>";
    echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; ".number_format($row['old_price'], 0)."</s></small> </span>";
    echo "<br>";
    echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>";	
    }
    ?>
    </slide>
    <slide :index="5">
    <?php 
    $res=mysqli_query($link,"select * from products where id = 2");
    while ($row=mysqli_fetch_array($res)) {
    echo "<a href='product.php?product=".$row['slug']."'><img src='images/".$row['photo']."' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
    echo "<div class=\"ribbon\">
    <span class=\"ribbon1\"><span>".$row['discount']." OFF </span></span>
    </div></h1>
    ";
    echo "<br>";
    echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; ".number_format($row['price'], 0)." &nbsp;</span>";
    echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; ".number_format($row['old_price'], 0)."</s></small> </span>";
    echo "<br>";
    echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>";	
    }
    ?>
    </slide>
    <slide :index="6">
    <?php 
    $res=mysqli_query($link,"select * from products where id = 3");
    while ($row=mysqli_fetch_array($res)) {
    echo "<a href='product.php?product=".$row['slug']."'><img src='images/".$row['photo']."' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a> ";
    echo "<div class=\"ribbon\">
    <span class=\"ribbon1\"><span>".$row['discount']." OFF </span></span>
    </div></h1>
    ";
    echo "<br>";
    echo "<span style=\"font-size:16px;color:red;font-weight:600\">&#36; ".number_format($row['price'], 0)." &nbsp;</span>";
    echo "<span style=\"color:green\"><small style=\"color:black\"><s>&#36; ".number_format($row['old_price'], 0)."</s></small></span>";
    echo "<br>";
    echo " <span><a style=\"color:black;font-size: 1.4rem;line-height: 1.8rem;padding: 0 0 0 5px;margin-bottom: .8rem;text-align: center;font-weight:bold\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>";	
    }
    ?>
    </slide>

    </carousel-3d>
    </div>
    </div>
    <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.7/vue.js'></script><script src='https://rawgit.com/Wlada/vue-carousel-3d/master/dist/vue-carousel-3d.min.js'></script>
    <script >new Vue({
    el: '#carousel3d1',
    data: {
    slides: 7
    },
    components: {
    'carousel-3d': Carousel3d.Carousel3d,
    'slide': Carousel3d.Slide
    }
    })
    //# sourceURL=pen.js
    </script>		


    </div>
    <div class="container-fluid" style="margin-top: 20px;">
    <h2 class="mens" align="center">Styles to steal</h2>
    <p align="center" style="margin-top: -30px;margin-bottom: 40px;font-family: sans-serif;letter-spacing: 1px">Inspired by influncers</p>
    <div style="border-bottom: 5px solid #ff3f6c;margin: -10px auto;margin-bottom: 40px;width: 100px;border-radius: 50px"></div>
    <div class="row" style="margin-bottom: 20px">
    <div class="col-xs-6	 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product1.jpg" style="border-radius: 10px"></a>
    </div>
    <div class="col-xs-6	 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product2.jpg" style="border-radius: 10px"></a>
    </div>
    <div class="col-xs-6	 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product3.jpg" style="border-radius: 10px"></a>
    </div>
    <div class="col-xs-6	 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product4.jpg" style="border-radius: 10px"></a>
    </div>
    </div>
    <span class="moretext">
    <div class="row" style="margin-bottom: 30px">
    <div class="col-xs-6	 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product5.jpg" style="border-radius: 10px"></a>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product6.jpg" style="border-radius: 10px"></a>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product7.jpg" style="border-radius: 10px"></a>
    </div>
    <div class="col-xs-6	 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product8.jpg" style="border-radius: 10px"></a>
    </div>
    </div>
    <div class="row">
    <div class="col-xs-6	 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product9.jpg" style="border-radius: 10px"></a>
    </div>
    <div class="col-xs-6	 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product10.jpg" style="border-radius: 10px"></a>
    </div>
    <div class="col-xs-6	 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product11.jpg" style="border-radius: 10px"></a>
    </div>
    <div class="col-xs-6	 col-sm-3 col-md-3 col-lg-3">
    <a href=""><img src="images/banner/product12.jpg" style="border-radius: 10px"></a>
    </div>							            		

    </div>
    </span>
    <div class="container my-4" align="center" style="padding: 10px">
    <button class="moreless-button">VIEW ALL</button>
    </div>
    </div>
    <div id="carousel3d" style="height: auto;margin-top: 20px;background:#fbd3e9">
    <h2 class="mens" align="center" style="padding: 20px">Top Brands</h2>
    <div style="border-bottom: 5px solid #ff3f6c;margin: -10px auto;margin-bottom: 30px;width: 100px;border-radius: 50px"></div>

    <carousel-3d :perspective="0" :space="600" :display="5" :controls-visible="true" :controls-prev-html="'❬'" :controls-next-html="'❭'" :controls-width="30"  :controls-height="60" :clickable="true" :autoplay="true" :autoplay-timeout="5000" height="500px">
    <slide :index="0">
    <a href="https://shop.adidas.co.in"><img src="images/banner/preview.jpg" ></a>

    </slide>
    <slide :index="1">
    <a href="https://www.alcissports.com"><img src="images/banner/2.webp"></a>
    </slide>
    <slide :index="2">
    <a href="https://www.peterengland.com"><img src="images/banner/3.webp"></a>

    </slide>
    <slide :index="3">
    <a href="www.relaxofootwear.com › sparx › product-listing"><img src="images/banner/4.webp"></a>

    </slide>
    <slide :index="4">
    <a href="https://flyingmachine.nnnow.com"><img src="images/banner/5.webp"></a>

    </slide>
    <slide :index="5">
    <a href="https://www.fila.com"><img src="images/banner/6.webp"></a>

    </slide>
    <slide :index="6">
    <a href="https://www.timex.com"><img src="images/banner/7.webp"></a>

    </slide>
    <slide :index="7">
    <a href="https://www.woodlandworldwide.com"><img src="images/banner/8.webp"></a>

    </slide>
    <slide :index="8">
    <a href="https://www.crocs.com"><img src="images/banner/9.webp"></a>

    </slide>
    <slide :index="9">
    <a href="https://www.pantaloons.com"><img src="images/banner/10.webp"></a>

    </slide>
    <slide :index="10">
    <a href="https://www.khadims.com"><img src="images/banner/11.webp"></a>

    </slide>
    <slide :index="11">
    <a href="https://www.abof.com › skult"><img src="images/banner/1.webp"></a>

    </slide>
    </carousel-3d>
    </div>
    <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.7/vue.js'></script><script src='https://rawgit.com/Wlada/vue-carousel-3d/master/dist/vue-carousel-3d.min.js'></script>
    <script >new Vue({
    el: '#carousel3d',
    data: {
    slides: 7
    },
    components: {
    'carousel-3d': Carousel3d.Carousel3d,
    'slide': Carousel3d.Slide
    }
    })
    //# sourceURL=pen.js
    </script>				
    <div class="my-3" style="padding: 20px;margin-top: 20px;text-align: center;" >
    <h2 class="mens">Monthly Top Sellers</h2>
    <div style="border-bottom: 5px solid #ff3f6c;;margin: -10px auto;width: 100px;border-radius: 50px"></div>
    <div class="container-fluid " style="margin-top: 40px">

    <?php
    $month = date('m');
    $conn = $pdo->open();

    try{
    $inc = 4;	
    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
    $stmt->execute();
    foreach ($stmt as $row) {
    $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
    $inc = ($inc == 4) ? 1 : $inc + 1;
    if($inc == 4) echo "<div class='row'>";
    echo "
    <div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3 \">

    <div class=\"row\" >
    <div class=\"el-wrapper\">
    <div class=\"box-up\">
    <a href='product.php?product=".$row['slug']."'><img src='".$image."' class=\"img\" width='250px' height='250px' class=\"thumbnail\"></a>    
    <div class=\"ribbon\">
    <span class=\"ribbon1\"><span>".$row['discount']." OFF </span></span>
    </div>

    <div class=\"img-info\">

    <div class=\"info-inner\">

    <span class=\"p-company\">Brand : ".$row['brand']."</span>

    <span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>
    </div>
    <div class=\"a-size\">Available sizes : <span class=\"size\" style=\"color:white\">".$row['size']."</span></div>
    </div>

    </div>

    <div class=\"box-down\">
    <div class=\"h-bg\">
    <div class=\"h-bg-inner\"></div>
    </div>

    <p class=\"cart\">
    <span class=\"price\">&#36; ".number_format($row['price'], 2)."</span>
    <span class=\"add-to-cart\">
    <span class=\"txt\">
    ";?> 
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary btn-sm" id="quickview" data-toggle="modal" data-target="#<?php echo $row['id'] ?>1"> Quick View </button>

    <!-- Modal -->
    <div id="<?php echo $row['id']; ?>1" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header" >

    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><?php echo "<span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>
    "; ?></h4>	 
    <div class="ribbon">
    <span class="ribbon1"><span><?php echo "".$row['discount'].""; ?> OFF </span></span>
    </div>
    </div>
    <div class="modal-body" >
    <div class="container-fluid" style="color: white">
    <div class="row">
    <div class="col-sm-6">
    <?php echo "<a href='product.php?product=".$row['slug']."'><img src='".$image."' title=\"".$row['name']."\" class=\"img-thumbnail\"></a>"; ?>
    </div>
    <div class="col-sm-6">

    <?php echo "".$row['brand'].""; ?>
    <?php echo "<br>"; ?>
    <?php echo " <span class=\"p-name\" title=\"".$row['name']."\"><a style=\"font-size:14px;color:white;font-weight:600\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>"; ?>
    <br>
    <br>
    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
    <i class="fa fa-star-o" style="color: orange;font-size: 14px"></i>
    <br><br>
    <span class="price" style="color: white;font-size: 20px"><?php echo "&#36; ".number_format($row['price'], 2).""; ?></span>&nbsp;
    <small style="font-size: 14px;"><s><?php echo "&#36; ".number_format($row['old_price'], 2).""; ?></s></small>
    <br>
    <br>

    <button class="btn btn-info" style="background-color: orange;border: orange"><?php echo "<a href='product.php?product=".$row['slug']."' style=\"font-size:14px;color:white;font-weight:600\">See Product Details</a>"; ?></button>
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

    <?php  echo "
    </span>
    </span>
    </p>
    </div>
    </div>
    </div>
    </div>

    ";
    if($inc == 4) echo "</div>";
    }
    if($inc == 4) echo "<div class='col-sm-3'></div><div class='col-sm-3'></div></div>"; 
    if($inc == 4) echo "<div class='col-sm-3'></div></div>";
    }
    catch(PDOException $e){
    echo "There is some problem in connection: " . $e->getMessage();
    }

    $pdo->close();

    ?> 

    </div>
    </div>
    </div>

    </div>
    </div>
    </section>

    <!-- if you want to display modal on page load  -->
    <!-- <div id="myModal" class="modal" style="background-image: linear-gradient(254deg, #5909b3, #7f0dff);">
    <div class="modal-dialog"  style="width: 100%;margin: 0;padding: 0">
    <div class="modal-content1">
    <h5 class="mens"  style="margin:250px 450px">Welcome to ECOMM</h5>           
    </div>
    </div>
    </div> -->
    <!-- //end of modal display -->
    <?php include 'includes/footer.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>

   
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
    
    var set = $.extend( 
      {
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
    $slider.find("> div").each(function(){
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

    <!-- <script>
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
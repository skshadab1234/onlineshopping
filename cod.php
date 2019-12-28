<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="build/swiper.min.css">

  <!-- Demo styles -->
  <style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
     
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
  </style>
</head>
<body>
  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><a href=""><img src="images/banner/banner1.jpg" class="img-responsive"></a> </div>
      <div class="swiper-slide"><a href=""><img src="images/banner/banner2.jpg" class="img-responsive"></a> </div>
      <div class="swiper-slide"><a href=""><img src="images/banner/banner5.jpg" class="img-responsive"></a> </div>
      <div class="swiper-slide"><a href=""><img src="images/banner/banner6.jpg" class="img-responsive"></a> </div>
      <div class="swiper-slide"><a href=""><img src="images/banner/banner7.jpg" class="img-responsive"></a> </div>
      <div class="swiper-slide"><a href=""><img src="images/banner/banner8.jpg" class="img-responsive"></a> </div>
      <div class="swiper-slide"><a href=""><img src="images/banner/banner9.jpg" class="img-responsive"></a> </div>
      <div class="swiper-slide">Slide 8</div>
      <div class="swiper-slide">Slide 9</div>
      <div class="swiper-slide">Slide 10</div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
asasasasasasa
  <!-- Swiper JS -->
  <script src="build/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 100,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
</body>
</html>
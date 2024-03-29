  <!-- Footer -->
  <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
      <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
        <h4 class="s-text12 p-b-30">
          GET IN TOUCH
        </h4>

        <div>
          <p class="s-text7 w-size27">
            Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
          </p>

          <div class="flex-m p-t-30">
            <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
            <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
            <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
            <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
            <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
          </div>
        </div>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Categories
        </h4>

        <ul>
          <?php 
          $conn = $pdo->open();
    
        $stmt3 = $conn->prepare("SELECT * FROM category");
        $stmt3->execute();
          foreach ($stmt3 as $row) {
          ?>
          <li class="p-b-9">
            <a href="category.php?category=<?= $row['cat_slug'] ?>" class="s-text7">
              <?= $row['name'] ?>
            </a>
          </li>
<?php } ?>
          
        </ul>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Links
        </h4>

        <ul>
          <li class="p-b-9">
            <a href="#" class="s-text7">
              Search
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              About Us
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              Contact Us
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              Returns
            </a>
          </li>
        </ul>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Help
        </h4>

        <ul>
          <li class="p-b-9">
            <a href="#" class="s-text7">
              Track Order
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              Returns
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              Shipping
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              FAQs
            </a>
          </li>
        </ul>
      </div>

      <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
        <h4 class="s-text12 p-b-30">
          Newsletter <span class="newsletter_count"></span>
        </h4>

          <div class="effect1 w-size9">
            <input class="s-text7 bg6 w-full p-b-5" type="text" id="email" name="" placeholder="email@example.com"> 
            <span class="effect1-line"></span>
          </div>

          <div class="w-size2 p-t-20">
            <!-- Button -->
            <button  onclick="add_new()" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
              Subscribe
            </button>
          </div>
          <div class="container" style="padding: 10px;text-align: center;">
          <span id="message" style="font-size: 14px;color: red;"></span>
          </div>
      </div>
    </div>

    <div class="t-center p-l-15 p-r-15">
      <a href="#">
        <img class="h-size2" src="fashe-colorlib/images/icons/paypal.png" alt="IMG-PAYPAL">
      </a>

      <a href="#">
        <img class="h-size2" src="fashe-colorlib/images/icons/visa.png" alt="IMG-VISA">
      </a>

      <a href="#">
        <img class="h-size2" src="fashe-colorlib/images/icons/mastercard.png" alt="IMG-MASTERCARD">
      </a>

      <a href="#">
        <img class="h-size2" src="fashe-colorlib/images/icons/express.png" alt="IMG-EXPRESS">
      </a>

      <a href="#">
        <img class="h-size2" src="fashe-colorlib/images/icons/discover.png" alt="IMG-DISCOVER">
      </a>

      <div class="t-center s-text8 p-t-20">
        Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Shadab</a>
      </div>
    </div>
  </footer>

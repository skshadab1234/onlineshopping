
<?php
    $conn = $pdo->open();
    
        $stmt3 = $conn->prepare("SELECT * FROM category where id=:id");
        $stmt3->execute(['id'=>2]);

         $stmt4 = $conn->prepare("SELECT * FROM category where id=:id");
        $stmt4->execute(['id'=>1]);

         $stmt5 = $conn->prepare("SELECT * FROM category where id=:id");
        $stmt5->execute(['id'=>3]);

        $stmt7 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt7->execute(['type'=>"women_clothing"]);

        $stmt8 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt8->execute(['type'=>"women_shoes"]);        
        
        $stmt9 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt9->execute(['type'=>"women_sunglass"]);        
        
        $stmt10 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt10->execute(['type'=>"women_watch"]);        

        $stmt11 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt11->execute(['type'=>"women_jewellery"]);   

        $stmt12 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt12->execute(['type'=>"women_handbag"]);        
        
       $stmt13 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt13->execute(['type'=>"women_banner"]);    

       $stmt14 = $conn->prepare("SELECT * FROM subcategory where type=:type");
       $stmt14->execute(['type'=>"men_clothing"]);      

       $stmt15 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt15->execute(['type'=>"men_shoes"]);    

           $stmt16 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt16->execute(['type'=>"men_eyewear"]);

        $stmt17 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt17->execute(['type'=>"men_jewellery"]);    


        $stmt18 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt18->execute(['type'=>"men_watches"]);    
        
        $stmt19 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt19->execute(['type'=>"men_banner"]);  

        $stmt20 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt20->execute(['type'=>"girls_clothing"]);  

        $stmt21 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt21->execute(['type'=>"boys_clothing"]); 

           $stmt22 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt22->execute(['type'=>"kids"]); 

         $stmt23 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt23->execute(['type'=>"baby"]); 

        $stmt24 = $conn->prepare("SELECT * FROM subcategory where type=:type");
        $stmt24->execute(['type'=>"kids_img"]); 
        
    $pdo->close();
    ?>
<!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="essence/img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    
                       <?php  

foreach ($stmt3 as $row3) {
$image = (!empty($row3['photo'])) ? 'images/category/' . $row3['photo'] : 'images/noimage.jpg';

            ?>
            <div class="classynav" style="display:-webkit-inline-box"> 
             <ul>
                            <li>
            <a href="category.php?category=<?= $row3['cat_slug']?>">
          <img src="<?= $image ?>"  width="30px" height="30px">
          <span style="font-size:12px"><?= $row3['cat_slug'] ?></span>
            </a><?php } ?>

                                <div class="megamenu">
                       <ul class="single-mega cn-col-5">
                                <li class="title">Clothing</li>
                                <?php 
                                        foreach ($stmt7 as $row7) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row7['sub_catslug']) ?>"><?= $row7['name'] ?></a></li>
                                   <?php } ?>
                        </ul>

                         <ul class="single-mega cn-col-5">
                                <li class="title">Shoes</li>
                                <?php 
                                        foreach ($stmt8 as $row8) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row8['sub_catslug']) ?>"><?= $row8['name'] ?></a></li>
                                   <?php } ?>

                                    <li class="title">Eyewear</li>
                                <?php 
                                        foreach ($stmt9 as $row9) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row9['sub_catslug']) ?>"><?= $row9['name'] ?></a></li>
                                   <?php } ?>

                        </ul>


                         <ul class="single-mega cn-col-5">
                                <li class="title">Jewllery</li>
                                <?php 
                                        foreach ($stmt11 as $row11) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row11['sub_catslug']) ?>"><?= $row11['name'] ?></a></li>
                                   <?php } ?>   

                                   <li class="title">Watches</li>
                                <?php 
                                        foreach ($stmt10 as $row10) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row10['sub_catslug']) ?>"><?= $row10['name'] ?></a></li>
                                   <?php } ?>

                                       <li class="title">HANDBAGS & CLUTCHES</li>
                                <?php 
                                        foreach ($stmt12 as $row12) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row12['sub_catslug']) ?>"><?= $row12['name'] ?></a></li>
                                   <?php } ?>


                               
                        </ul>
                                    <?php 
                                        foreach ($stmt13 as $row13) {
                                        $image = (!empty($row13['subcat_photo'])) ? 'images/subcategory/' . $row13['subcat_photo'] : 'images/noimage.jpg';

                                 ?>
                                    <div class="single-mega cn-col-5 banner-image">
                                        <a href="shop.php?shop=<?= str_replace("&", "and", $row13['sub_catslug']) ?>"><img src="<?= $image ?>" alt="">
                                        <div class="container">
                                                <h5  style="text-align: center;font-size: 20px;margin: 5px"><?= $row13['name'] ?></h5>
                                                <h5 class="title text-center">Explore Store</h5>
                                        </div></a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </li>
                           


                        <!-- WOMEN -->

                <?php  

foreach ($stmt4 as $row4) {
          $image = (!empty($row4['photo'])) ? 'images/category/' . $row4['photo'] : '../images/noimage.jpg';
            ?>
            <div class="classynav" style="display:-webkit-inline-box"> 
             <ul>
                            <li>
            <a href="category.php?category=<?= $row4['cat_slug']?>">
          <img src="<?= $image ?>"  width="30px" height="30px">
          <span style="font-size:12px"><?= $row4['cat_slug'] ?></span>
            </a><?php } ?>

                                 <div class="megamenu">
                       <ul class="single-mega cn-col-5">
                                <li class="title">Clothing</li>
                                <?php 
                                   foreach ($stmt14 as $row14) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row14['sub_catslug']) ?>"><?= $row14['name'] ?></a></li>
                                   <?php } ?>
                        </ul>

                         <ul class="single-mega cn-col-5">
                                <li class="title">Shoes</li>
                                <?php 
                                        foreach ($stmt15 as $row15) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row15['sub_catslug']) ?>"><?= $row15['name'] ?></a></li>
                                   <?php } ?>

                                    <li class="title">Eyewear</li>
                                <?php 
                                        foreach ($stmt16 as $row16) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row16['sub_catslug']) ?>"><?= $row16['name'] ?></a></li>
                                   <?php } ?>

                        </ul>


                         <ul class="single-mega cn-col-5">
                                <li class="title">Jewllery</li>
                                <?php 
                                        foreach ($stmt17 as $row17) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row17['sub_catslug']) ?>"><?= $row17['name'] ?></a></li>
                                   <?php } ?>   

                                   <li class="title">Watches</li>
                                <?php 
                                        foreach ($stmt18 as $row18) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row18['sub_catslug']) ?>"><?= $row18['name'] ?></a></li>
                                   <?php } ?>

                                <li><a href="shop.php?shop=Wallets">Wallets</a></li>
                               
                        </ul>
                                    <?php 
                                        foreach ($stmt19 as $row19) {
                                        $image = (!empty($row19['subcat_photo'])) ? 'images/subcategory/' . $row19['subcat_photo'] : 'images/noimage.jpg';

                                 ?>
                                    <div class="single-mega cn-col-5 banner-image">
                                        <a href="shop.php?shop=<?= str_replace("&", "and", $row19['sub_catslug']) ?>"><img src="<?= $image ?>" alt="">
                                        <div class="container">
                                                <h5  style="text-align: center;font-size: 20px;margin: 5px"><?= $row19['name'] ?></h5>
                                                <h5 class="title text-center">Explore Store</h5>
                                        </div></a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </li>
                           

             <!-- KIDS -->
                <?php  

foreach ($stmt5 as $row5) {
          $image = (!empty($row5['photo'])) ? 'images/category/' . $row5['photo'] : '../images/noimage.jpg';
            ?>
            <div class="classynav" style="display:-webkit-inline-box"> 
             <ul>
                            <li>
            <a href="category.php?category=<?= $row5['cat_slug']?>">
          <img src="<?= $image ?>"  width="30px" height="30px">
          <span style="font-size:12px"><?= $row5['cat_slug'] ?></span>
            </a><?php } ?>


                                 <div class="megamenu">
                       <ul class="single-mega cn-col-5">
                                 <li class="title">Girls</li>
                                <?php 
                                   foreach ($stmt20 as $row20) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row20['sub_catslug']) ?>"><?= $row20['name'] ?></a></li>
                                   <?php } ?>
                        </ul>

                         <ul class="single-mega cn-col-5">
                                <li class="title">Boys</li>
                                <?php 
                                        foreach ($stmt21 as $row21) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row21['sub_catslug']) ?>"><?= $row21['name'] ?></a></li>
                                   <?php } ?>

                        </ul>


                         <ul class="single-mega cn-col-5">
                                <li class="title">Kids</li>
                                <?php 
                                        foreach ($stmt22 as $row22) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row22['sub_catslug']) ?>"><?= $row22['name'] ?></a></li>
                                   <?php } ?>   

                                   <li class="title">Baby</li>
                                <?php 
                                        foreach ($stmt23 as $row23) {
                                 ?>
                                <li><a href="shop.php?shop=<?= str_replace("&", "and", $row23['sub_catslug']) ?>"><?= $row23['name'] ?></a></li>
                                   <?php } ?>

                               
                        </ul>
                                    <?php 
                                        foreach ($stmt24 as $row24) {
                                        $image = (!empty($row24['subcat_photo'])) ? 'images/subcategory/' . $row24['subcat_photo'] : 'images/noimage.jpg';

                                 ?>
                                    <div class="single-mega cn-col-5 banner-image">
                                        <a href="shop.php?shop=<?= str_replace("&", "and", $row24['sub_catslug']) ?>"><img src="<?= $image ?>" alt="">
                                        <div class="container-fluid">
                                                <h5  style="text-align: center;font-size: 20px;margin: 5px"><?= $row24['name'] ?></h5>
                                                <h5 class="title text-center">Explore Store</h5>
                                        </div></a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </li>
                           


                          <!--   <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="single-product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="single-blog.html">Single Blog</a></li>
                                    <li><a href="regular-page.html">Regular Page</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul> -->
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                <form method="POST" autocomplete="off" action="search.php">
                        <input type="text" id="myInput" name="keyword"   placeholder="Type for search" required>
                        <button type="submit" id="myBtn"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#" id="wishlist_pop"><img src="essence/img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                     <?php
                    if (isset($_SESSION['user'])) {
                            $image = (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg';
                            echo '
                            <a href="#" title="'.$user['firstname'].' ' .$user['lastname'].'" id="profilecart">
                                    <img src="' . $image . '" class="user-image" alt="User Image">
                            </a>
                           
                    ';
                    } else {
                            echo "
                    ";
                    ?>
                               <a href="#" id="profilecart1"><img src="essence/img/core-img/user.svg"  alt=""></a>

            <?php
                            }
            ?>
                </div>





                <!-- Cart Area -->
                <div class="cart-area" id="essenceCartBtn">
                     <a href="#" id="cart">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="label cart_count" style="font-size: 15px;color: #fff;
background: lightsalmon;border-radius: 70px; position: absolute;top: 10px;right: 10px;"></span>
                                                </a>
                </div>
            </div>

        
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="essence/img/core-img/bag.svg" alt=""> <span class="cart_count"> </span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <div class="single-cart-item" id="cart_menu" style="padding: 10px;">
                        <!-- <img src="essence/img/product-img/product-1.jpg" class="cart-thumb" alt="">
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div> -->
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">
                <div id="overview"></div>
            </div>
        </div>
    </div>
 

 <!-- profile -->


    <!-- ##### Right Side Cart Area ##### -->
    <div class="profile-overlay"></div>

    <div class="right-side-profile-area">

        <!-- Cart Button -->
        <div class="profile-button">
            <a href="#" id="profilerightSide"><?php
                            $image = (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg';
                            echo '
                                    <img src="' . $image . '" class="user-image" alt="User Image">
                                        ';
                           ?> </a>
        </div>

        <div class="profile-content d-flex" style="background: #000;">

            <!-- Cart Summary -->
            <div class="profile-amount-summary">
                <ul>
                    <li><a href="profile.php" class="nav <?= (basename($_SERVER['PHP_SELF'])=="profile.php")?"active":""; ?>">Profile</a></li>
                    <li><a href="orders.php" class="nav <?= (basename($_SERVER['PHP_SELF'])=="orders.php")?"active":""; ?>">Orders</a></li>
                    <li><a href="transaction.php" class="nav <?= (basename($_SERVER['PHP_SELF'])=="transaction.php")?"active":""; ?>">History</a></li>
                    <li><a href="coupons.php" class="nav <?= (basename($_SERVER['PHP_SELF'])=="coupons.php")?"active":""; ?>">Coupons</a></li>
                    <li><a href="logout.php" class="nav active1">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- ##### Right Side Cart Area ##### -->
    <div class="profile-overlay1"></div>

    <div class="right-side-profile-area1" >

        <!-- Cart Button -->
        <div class="profile-button1">
            <a href="#"  id="profilerightSide1">
                                    <img src="essence/img/core-img/bag.svg" class="user-image" alt="User Image">
            </a>
        </div>

        <div class="profile-content d-flex" style="background: #000;height: 100%">

            <!-- Cart Summary -->
            <div class="profile-amount-summary">
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>
                </ul>
            </div>
        </div>
    </div>
 
</div>
    </header>


 <!-- Wishlist POP -->
<?php 
if(isset($_SESSION['user'])){
    ?>

    <!-- ##### Right Side Cart Area ##### -->
    <div class="wishlist-overlay"></div>

    <div class="right-side-wishlist-area">

        <!-- Cart Button -->
        <div class="wishlist-button">
            <a href="#" id="wishlistrightSide">
                                    <img src="essence/img/core-img/heart.svg" class="user-image" alt="User Image">
                                        
        </div>

        <div class="wishlist-content d-flex" style="background: #000;">

            <!-- Cart Summary -->
            <div class="wishlist-amount-summary">
                <ul>
                    <li><a href="profile.php" class="nav <?= (basename($_SERVER['PHP_SELF'])=="profile.php")?"active":""; ?>">Profile</a></li>
                    <li><a href="orders.php" class="nav <?= (basename($_SERVER['PHP_SELF'])=="orders.php")?"active":""; ?>">Orders</a></li>
                    <li><a href="transaction.php" class="nav <?= (basename($_SERVER['PHP_SELF'])=="transaction.php")?"active":""; ?>">History</a></li>
                    <li><a href="coupons.php" class="nav <?= (basename($_SERVER['PHP_SELF'])=="coupons.php")?"active":""; ?>">Coupons</a></li>
                    <li><a href="logout.php" class="nav active1">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

<?php
}else{

?>

    <!-- ##### Right Side Cart Area ##### -->
    <div class="wishlist-overlay"></div>

    <div class="right-side-wishlist-area" >

        <!-- Cart Button -->
        <div class="wishlist-button">
            <a href="#"  id="wishlistrightSide">
                                    <img src="essence/img/core-img/heart.svg" class="user-image" alt="User Image">
            </a>
        </div>

        <div class="wishlist-content d-flex" style="background: #000;">

            <!-- Cart Summary -->
            <div class="wishlist-amount-summary">
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>
                </ul>
            </div>
        </div>
    </div>
 
<?php } ?>
<script type="text/javascript">
    
    // Get the input field
var input = document.getElementById("myInput");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("myBtn").click();
  }
});
</script>
<script>
        function autocomplete(inp, arr) {
                /*the autocomplete function takes two arguments,
                the text field element and an array of possible autocompleted values:*/
                var currentFocus;
                /*execute a function when someone writes in the text field:*/
                inp.addEventListener("input", function(e) {
                        var a, b, i, val = this.value;
                        /*close any already open lists of autocompleted values*/
                        closeAllLists();
                        if (!val) {
                                return false;
                        }
                        currentFocus = -1;
                        /*create a DIV element that will contain the items (values):*/
                        a = document.createElement("DIV");
                        a.setAttribute("id", this.id + "autocomplete-list");
                        a.setAttribute("class", "autocomplete-items");
                        /*append the DIV element as a child of the autocomplete container:*/
                        this.parentNode.appendChild(a);
                        /*for each item in the array...*/
                        for (i = 0; i < arr.length; i++) {
                                /*check if the item starts with the same letters as the text field value:*/
                                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                                        /*create a DIV element for each matching element:*/
                                        b = document.createElement("DIV");
                                        /*make the matching letters bold:*/
                                        b.innerHTML = "<strong style='color:red;'>" + arr[i].substr(0, val.length) + "</strong>";
                                        b.innerHTML += arr[i].substr(val.length);
                                        /*insert a input field that will hold the current array item's value:*/
                                        b.innerHTML += "<input  type='hidden' value='" + arr[i] + "'>";
                                        /*execute a function when someone clicks on the item value (DIV element):*/
                                        b.addEventListener("click", function(e) {
                                                /*insert the value for the autocomplete text field:*/
                                                inp.value = this.getElementsByTagName("input")[0].value;
                                                /*close the list of autocompleted values,
                                                (or any other open lists of autocompleted values:*/
                                                closeAllLists();
                                        });
                                        a.appendChild(b);
                                }
                        }
                });
                /*execute a function presses a key on the keyboard:*/
                inp.addEventListener("keydown", function(e) {
                        var x = document.getElementById(this.id + "autocomplete-list");
                        if (x) x = x.getElementsByTagName("div");
                        if (e.keyCode == 40) {
                                /*If the arrow DOWN key is pressed,
                                increase the currentFocus variable:*/
                                currentFocus++;
                                /*and and make the current item more visible:*/
                                addActive(x);
                        } else if (e.keyCode == 38) { //up
                                /*If the arrow UP key is pressed,
                                decrease the currentFocus variable:*/
                                currentFocus--;
                                /*and and make the current item more visible:*/
                                addActive(x);
                        } else if (e.keyCode == 13) {
                                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                                e.preventDefault();
                                if (currentFocus > -1) {
                                        /*and simulate a click on the "active" item:*/
                                        if (x) x[currentFocus].click();
                                }
                        }
                });

                function addActive(x) {
                        /*a function to classify an item as "active":*/
                        if (!x) return false;
                        /*start by removing the "active" class on all items:*/
                        removeActive(x);
                        if (currentFocus >= x.length) currentFocus = 0;
                        if (currentFocus < 0) currentFocus = (x.length - 1);
                        /*add class "autocomplete-active":*/
                        x[currentFocus].classList.add("autocomplete-active");
                }

                function removeActive(x) {
                        /*a function to remove the "active" class from all autocomplete items:*/
                        for (var i = 0; i < x.length; i++) {
                                x[i].classList.remove("autocomplete-active");
                        }
                }

                function closeAllLists(elmnt) {
                        /*close all autocomplete lists in the document,
                        except the one passed as an argument:*/
                        var x = document.getElementsByClassName("autocomplete-items");
                        for (var i = 0; i < x.length; i++) {
                                if (elmnt != x[i] && elmnt != inp) {
                                        x[i].parentNode.removeChild(x[i]);
                                }
                        }
                }
                /*execute a function when someone clicks in the document:*/
                document.addEventListener("click", function(e) {
                        closeAllLists(e.target);
                });
        }

        /*An array containing all the country names in the world:*/
        var countries = ["Nike", "Woodland", "Adidas", "Alikas", "SeeandWear", "Lee Cooper", "Fila", "Puma", "RedTape"];

        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        autocomplete(document.getElementById("myInput"), countries);
</script>
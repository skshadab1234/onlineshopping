<?php
error_reporting(0);
?>
<style type="text/css">
        .sticky {
                padding: 5px;
                top: 0;
                width: 100%;
                background: #fff;
                z-index: 0;
        }

        #myHeader {
                transition: 0.9s ease all;
                width: 100%;
                padding: 10px;
                position: fixed;
                background: #fff;
        }

        .navbar-collapse {
                margin-left: 5%;
        }

        .navbar-brand1 {
                font-size: 25px;
                width: 300px;
                color: #010101;
                padding: 20px;
                line-height: 50px;
                letter-spacing: 2px;
        }

        .openBtn {
                border: none;
                padding: 10px;
                background: none;
                color: #2b5876;
                font-size: 20px;
                cursor: pointer;
        }

        #myHeader.sticky .openBtn {
                color: #2b5876;
        }

        #myHeader.sticky .navbar-brand1 {
                color: #4b6cb7;
        }

        /*the container must be positioned relative:*/
        .autocomplete {
                position: relative;
                display: inline-block;
        }


        input {
                border: 1px solid transparent;
                background-color: #f1f1f1;
                padding: 10px;
                font-size: 16px;
        }

        input[type=text] {
                background-color: #f1f1f1;
                width: 100%;
        }

        input[type=submit] {
                background-color: steelblue;
                color: #fff;
                cursor: pointer;
        }

        .autocomplete-items {
                position: absolute;
                border-bottom: none;
                border-top: none;
                z-index: 99;
                /*position the autocomplete items to be the same width as the container:*/
                top: 44px;
                left: 0;
                right: 0;
        }

        .autocomplete-items div {
                padding: 10px;
                cursor: pointer;
                background-color: #fff;
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
                background-color: #e9e9e9;
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
                background-color: #e9e9e9 !important;
                color: #010101;
        }

        #myHeader.sticky .fa-bars {
                color: #232526;
                padding-right: -10px;
        }

        .fa-bars {
                color: #232526;
                padding-right: -10px;
        }

        #myHeader.sticky .fa-shopping-bag {
                color: #232526;
        }

        .subnavbtn a {
                color: #323232;
                margin-left: 30px;
                letter-spacing: 1px;
                font-weight: 400;
        }

        #myHeader.sticky .subnavbtn a {
                color: #232526;
        }

        .login {
                color: #232526;
        }

        .login:hover {
                color: #232526;
        }

        #myHeader.sticky .login {
                color: #232526;
        }

        .fa-shopping-bag {
                color: #232526;
                font-size: 14px;
        }

        .fa-heart-o {
                color: #232526;
                font-size: 14px;
        }

        #myHeader.sticky .fa-heart-o {
                color: #232526;
        }

        @media(max-width:768px) {
                .desktop {
                        display: none;
                }

                .modal-backdrop.in {
                        z-index: 0;
                }

                #mobileview {
                        width: 100%;
                        display: flex;
                        position: fixed;
                        z-index: 999;
                        background: #fff;
                }

                #mobileview img {
                        width: 20px;
                        height: 23px;
                        position: relative;
                        top: 6px;
                }

                #mobileview i {
                        color: #000;
                        font-size: 20px;
                }

                .sk {
                        margin-top: 20px;
                }

                #brand {
                        white-space: nowrap;
                        line-height: 39px;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        FONT-WEIGHT: bold;
                        font-family: sans-serif;
                        letter-spacing: 1px;
                        position: relative;
                        left: 20px;
                }

                .rightsection {
                        position: absolute;
                        right: 5px;
                        line-height: 39px;
                }

                .rightsection li {
                        display: inline-block;
                        padding: 0px 5px;
                }

                .rightsection li:last-child {
                        padding: 0
                }

                .rightsection .fa {
                        font-size: 50px;
                }

        }

        #dropsidearrow:after {
                content: '';
                position: absolute;
                top: -5px;
                right: 20px;
                border-top: none;
                border-left: 15px solid transparent;
                border-right: 15px solid transparent;
                border-bottom: 15px solid #2a2440;

        }
</style>

<body class="hold-transition layout-top-nav">
        <header class="main-header" style="background:transparent">
                <nav class="navbar navbar-static-top" id="myHeader">
                        <button type="button" class="navbar-toggle collapsed" id="bars" data-toggle="modal" data-target="#bar">
                                <i class="fa fa-bars"></i>
                        </button>
                        <div class="navbar-header">
                                <a href="index.php" class="navbar-brand1">
                                        <b> DRESSMANIA<b>
                                </a>
                        </div>

                        <!-- cart search  -->

                        <div class="navbar-custom-menu" style="position:absolute;right:10px">
                                <ul class="nav navbar-nav">
                                        <li class="dropdown messages-menu">
                                                <!-- Menu toggle button -->
                                                <a href="#" class="dropdown-toggle" id="cart" data-toggle="dropdown">
                                                        <i class="fa fa-shopping-bag"></i>
                                                        <span class="label label-info cart_count"></span>
                                                </a>
                                                <ul class="dropdown-menu" style="background: #2a2440;box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);border-radius:2px;border: none;">
                                                        <li class="header" style="background: #2a2440;color: white">You have <span class="cart_count" style="color: red"></span> item(s) in cart</li>
                                                        <li>
                                                                <ul class="menu" id="cart_menu"></ul>
                                                        </li>

                                                        <li class="pull-center"><a href="cart_view.php" style="background-color:#2a2440;color: #fff;font-weight: bolder;text-align: center;font-size: 16px;padding: 20px">View Cart</a></li>
                                                </ul>

                                        <li class="dropdown messages-menu">
                                                <!-- Menu toggle button -->
                                                <a href="wishlist.php" id="cart">
                                                        <i class="fa fa-heart-o"></i>
                                                </a>
                                        </li>

                                        <li>
                                                <?php
                                                if (isset($_SESSION['user'])) {
                                                        $image = (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg';
                                                        echo '
                                                <li class="dropdown user user-menu">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                                                <img src="' . $image . '" class="user-image" alt="User Image">
                                                        </a>
                                                        <ul class="dropdown-menu" id="dropsidearrow" style="padding:10px;background: #2a2440;box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);border-radius:2px;border: none;">
				<hr style="margin-top: -10px;opacity: 0.5">
				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-user-o" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;User Profile </span>&nbsp;<a href="profile.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-truck" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;My Orders </span>&nbsp;<a href="orders.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-history" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;Transaction History </span>&nbsp;<a href="transaction_history.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-cart-arrow-down" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;Wishlist </span>&nbsp;<a href="wishlist.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-plus" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;Compare Product </span>&nbsp;<a href="wishlist.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-whatsapp" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;Chat With Us </span>&nbsp;<a href="wishlist.php" class="hoverprofile"><i class="fa fa-external-link" style="color: white;font-size: 16px"></i></a></div>
				<hr style="width: 200px;margin-left: 10px">

				<div style="margin-bottom: 20px;margin-left: 20px;font-size: 20px"><i class="fa fa-sign-out" style="color: orange;font-size: 14px"></i><span style="color: white;font-size: 14px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;&nbsp;<a href="logout.php" class="hoverprofile" style="color: white">Logout </span>&nbsp;</a></div>

				<a href="#edit" class="btn btn-success btn-flat btn-sm pull-right" id="quickview" data-toggle="modal"><i class="fa fa-edit" style="font-size: 12px;line-height: 40px"></i> Edit My Profile</a>

                                                </ul>
                                                </li>
                                                ';
                                                } else {
                                                        echo "
                                                ";
                                                ?>
                                        <li><a href='login.php' class='login'>LOGIN</a></li>
                                        <li><a href='signup.php' class='login'>SIGNUP</a></li>
                                <?php
                                                }
                                ?>
                                </li>

                                <li>
                                        <button class="openBtn" data-toggle="modal" data-target="#search" style="outline: none"><i class="fa fa-search"></i></button>
                                </li>
                                </ul>
                        </div>
                </nav>
        </header>


        <!-- mobile view -->

        <div class="mobile-view-header" id="mobileview">
                <?php
                if ($cat or $subcat or $_POST['keyword'] or $brand or $_GET['choose']) {
                        echo '<img src="images/arrow2.png" onclick="history.back(-1)" alt="">';
                } else {
                        echo '<img src="images/hamburg.png" data-toggle="modal" data-target="#bar" alt="">';
                }

                ?>
                <div id="brand">
                        <?php
                        if ($cat) {
                                echo $cat['name'];
                        } elseif ($_GET['styles']) {
                                echo "<h4 style='position: relative;font-weight: 600;font-family: calibri;font-size: 17px;'>" . $subcat['name'] . "</h4><h5 style='position:relative;top:-6px;font-size:12px'>" . $total_pro['prodids'] . " items</h5>";
                        } elseif ($_GET['choose']) {
                                echo "Choose Category";
                        } elseif ($_GET['brand']) {
                                echo "<h4 style='position: relative;font-weight: 600;font-family: calibri;font-size: 17px;'>" . $brand['brand_name'] . "</h4><h5 style='position:relative;top:-6px;font-size:12px'>" . $total_brand['prodids'] . " items</h5>";
                        } elseif ($_POST['keyword']) {
                                echo $_POST['keyword'];
                        } else {
                                echo '
                        <a href="index.php" style="color:#010101;font-size:20px;text-transform:uppercase;letter-spacing:1px;font-family:calibri">Dressmania</a>
                        ';
                        }
                        ?>
                </div>
                <div class="rightsection container">
                        <ul>
                                <li>
                                        <a href="" data-toggle="modal" data-target="#mb-search"><i class="fa fa-search"></i></a>
                                </li>
                                <li>
                                        <a href="wishlist.php" style="margin-right:5px"><i class="fa fa-bookmark-o"></i></a>
                                </li>
                                <li>
                                        <a href="cart_view.php"><i class="fa fa-shopping-bag"></i>
                                                <span class="badge badge-danger cart_count" style="color:white;background:red;position:absolute;top:0px;right:3px;"></span>
                                        </a>
                                </li>
                        </ul>
                </div>
        </div>
        <!-- all modal -->
        <?php include 'includes/sidebar_modal.php'; ?>
        <?php include 'includes/profile_modal.php'; ?>

</body>
<script>
        window.onscroll = function() {
                myFunction()
        };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
                if (window.pageYOffset > sticky) {
                        header.classList.add("sticky");
                } else {
                        header.classList.remove("sticky");
                }
        }
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
        autocomplete(document.getElementById("myInput1"), countries);
        autocomplete(document.getElementById("myInput"), countries);
</script>
<script>
        var input = document.getElementById("myInput1");
        input.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                        event.preventDefault();
                        document.getElementById("myBtn1").click();
                }
        });
</script>
<script>
        var input1 = document.getElementById("myInput");
        input1.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                        event.preventDefault();
                        document.getElementById("myBtn").click();
                }
        });
</script>
<style type="text/css">
.sticky {
padding:5px;
top: 0;
width: 100%;
background: #fff;  /* fallback for old browsers */
box-shadow: 0 9px 18px rgba(0,0,0,0.1),
inset 0 1px 12px rgba(0,0,0,0.2);  
}

#myHeader{
transition:0.9s ease all; 
width:100%;
padding:10px;
position:fixed;
}

.navbar-collapse{
margin-left:5%;
}
.navbar-brand1{
font-size: 25px;
width: 300px;
color:#4b6cb7;    
padding:20px;
line-height:50px;
letter-spacing: 2px;
font-weight: 700;
}
.openBtn {
border: none;   
padding: 10px;
background: none;
color: #2b5876;
font-size:20px;
cursor: pointer;
}

#myHeader.sticky .openBtn{
color: #2b5876;
}

#myHeader.sticky .navbar-brand1{
color:#4b6cb7;
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
border: 1px solid #d4d4d4;
border-bottom: none;
border-top: none;
z-index: 99;
/*position the autocomplete items to be the same width as the container:*/
top: 100%;
left: 0;
right: 0;
}

.autocomplete-items div {
padding: 10px;
cursor: pointer;
background-color: #fff; 
border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
background-color: DodgerBlue !important; 
color: #ffffff; 
} 

#myHeader.sticky .fa-bars{
color: #232526;
padding-right:-10px;
}
.fa-bars{
color: #232526;
padding-right:-10px;
}
#myHeader.sticky .fa-shopping-bag{
color:#232526;
}

.subnavbtn a{
color: #323232;
margin-left:30px;
letter-spacing:1px;
font-weight:400;    
}

#myHeader.sticky .subnavbtn a{
color:#232526;
}

.login{
color:#232526;
}
.login:hover{
color:#232526;
}

#myHeader.sticky .login {
color:#232526;
}
.fa-shopping-bag{
color:#232526;
font-size:14px;
}
.fa-heart-o{
color:#232526;
font-size:14px;
}
#myHeader.sticky .fa-heart-o{
color:#232526;
}
</style>
<body class="hold-transition layout-top-nav" >
<header class="main-header" style="background:transparent">
<nav class="navbar navbar-static-top"  id="myHeader">
<button type="button" class="navbar-toggle collapsed" id="bars" data-toggle="modal" data-target="#bar">
<i class="fa fa-bars"></i>
</button>
<div class="navbar-header"> 
<a href="index.php" class="navbar-brand1" >
ECOMM
</a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse" >
<ul class="nav navbar-nav">
<?php

$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM category WHERE id=1");
$stmt->execute();
foreach($stmt as $row){
echo "
<div class=\"subnav\">
<button id=\"h1\" class=\"subnavbtn\"><a  href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a> </button>
<div class=\"men\"></div>
<div class=\"subnav-content\">
<div class=\"container-fluid\" style=\"background:#323232;padding:10px;margin-top:-18px;box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2), 0px 8px 10px 1px rgba(0,0,0,0.14), 0px 3px 14px 2px rgba(0,0,0,0.12);
\">
<div class=\"row\">
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"category.php?category=".$row['cat_slug']."\" class=\"p1\">Bottomwear</a></h5></li>
<li><a href=\"\" class=\"menulist\">Jeans</a></li>
<li><a href=\"\" class=\"menulist\" >Casual Trousers</a></li>
<li><a href=\"\" class=\"menulist\" >Formal Trousers</a></li>
<li><a href=\"\" class=\"menulist\" >Shorts</a></li>  
<li><h5><a href=\"\" class=\"p1\">Innerwear & Sleepwear</a></h5></li>

<li><a href=\"\" class=\"menulist\" >Briefs & Trunks</a></li>
<li><a href=\"\" class=\"menulist\" >Boxers</a></li>
<li><a href=\"\" class=\"menulist\" >Vests</a></li>
<li><a href=\"\" class=\"menulist\" >Thermals</a></li>
</div>
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p1\">Footwear</a></h5></li>
<li><a href=\"\" class=\"menulist\" >Casual Shoes</a></li>
<li><a href=\"\" class=\"menulist\" >Sports Shoes</a></li>
<li><a href=\"\" class=\"menulist\" >Formal Shirts</a></li>
<li><a href=\"\" class=\"menulist\" >Formal Shoes</a></li>
<li><a href=\"\" class=\"menulist\" >Sneakers</a></li>
<li><a href=\"\" class=\"menulist\" >Sandals &amp; Floaters</a></li>
<li><a href=\"\" class=\"menulist\" >Flip Flops</a></li>
<li><a href=\"\" class=\"menulist\" >Socks</a></li>
</div>
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p1\">Topwear</a></h5></li>
<li><a href=\"\" class=\"menulist\" >T-Shirts</a></li>
<li><a href=\"\" class=\"menulist\" >Casual Shirts</a></li>
<li><a href=\"\" class=\"menulist\" >Formal Shirts</a></li>
<li><a href=\"\" class=\"menulist\" >Sweatshirts</a></li>
<li><a href=\"\" class=\"menulist\" >Sweaters</a></li>
<li><a href=\"\" class=\"menulist\" >Jackets</a></li>
<li><a href=\"\" class=\"menulist\" >Blazers & Coats</a></li>
<li><a href=\"\" class=\"menulist\" >Suits</a></li>
<li><p><a href=\"/\"class=\"p1\"  >Personal Care &amp; Grooming</a></p></li>
<li><p><a href=\"\" class=\"p1\"  >Sunglasses &amp; Frames</a></p></li>
<li><p><a href=\"\" class=\"p1\"  >Watches</a></p></li>
</div>
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p1\">Sports & Active Wear</a></h5></li>
<li><a href=\"\" class=\"menulist\" >Sports Shoes</a></li>
<li><a href=\"\" class=\"menulist\" >Sports Sandals</a></li>
<li><a href=\"\" class=\"menulist\">Active T-Shirts</a></li>
<li><a href=\"\" class=\"menulist\">Track Pants & Shorts</a></li>
<li><a href=\"\" class=\"menulist\" >Tracksuits</a></li>
<li><a href=\"\" class=\"menulist\" >Jackets & Sweatshirts</a></li>
<li><a href=\"\" class=\"menulist\">Sports Accessories</a></li>
</div>
</div>

</div>
</div>
</div> 

";                  
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?>

<?php

$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM category WHERE id=2");
$stmt->execute();
foreach($stmt as $row){
echo "
<div class=\"subnav\">
<button id=\"h2\" class=\"subnavbtn\"><a  href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a> </button>
<div class=\"women\"></div>

<div class=\"subnav-content\">
<div class=\"container-fluid\" style=\"background:#323232;;padding:10px;margin-top:-18px;box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2), 0px 8px 10px 1px rgba(0,0,0,0.14), 0px 3px 14px 2px rgba(0,0,0,0.12);
\">
<div class=\"row\">
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p2\">Indian & Fusion Wear</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Kurtas & Suits</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Kurtis, Tunics & Tops</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Ethnic Dresses</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Leggings, Salwars & Churidars</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Skirts & Palazzos</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Sarees</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Dress Materials</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Lehenga Cholis</a></li>
</div>
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p2\">Western Wear</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Dresses & Jumpsuits</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Tops</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">T-Shirts</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Shirts</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Jeans & Jeggings</a></li>
<hr>
<li><p><a href=\"\" class=\"p2\">Belts, Scarves & More</a></p></li>
<li><p><a href=\"\" class=\"p2\">Watches & Wearables</a></p></li>  
</div>
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p2\">Beauty & Personal Care</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Makeup</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Skincare</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Premium Beauty</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Lipsticks</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Fragrances</a></li>
<hr>
<li><h5><a href=\"\" class=\"p2\">Gadgets</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Smart Wearables</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Fitness Gadgets</a></li>

</div>
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p2\">Footwear</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Flats</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Casual Shoes</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Heels</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Boots</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Sports Shoes & Floaters</a></li>
<hr>
<p><a href=\"\" class=\"p2\"  >Sports & Active Wear</a></li></p>
<li ><a href=\"\"   class=\"menulist\">Clothing</a></li>
<li ><a href=\"\"   class=\"menulist\">Footwear</a></li>
<li ><a href=\"\"   class=\"menulist\">Sports Accessories</a></li>
<li ><a href= \"\"  class=\"menulist\">Sports Equipment</a></li>
</div>
</div>

</div>
</div>
</div> 
";                  
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?>

<?php

$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM category WHERE id=3");
$stmt->execute();
foreach($stmt as $row){
echo "
<div class=\"subnav\">
<button id=\"h3\" class=\"subnavbtn\"><a  href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a> </button>
<div class=\"kids\"></div>

<div class=\"subnav-content\">
<div class=\"container-fluid\" style=\"background:#323232;;padding:10px;margin-top:-18px;box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2), 0px 8px 10px 1px rgba(0,0,0,0.14), 0px 3px 14px 2px rgba(0,0,0,0.12); \">
<div class=\"row\">
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p3\">Boys Clothing</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">T-Shirts</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Shirts</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Shorts</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Jeans</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Trousers</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Clothing Sets</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Ethnic Wear</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Track Pants & Pyjamas</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Jacket, Sweater & Sweatshirts</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Innerwear & Sleepwear</a></li>
</div>
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p3\">Girls Clothing</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Dresses</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Tops</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\"> Tshirts</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Clothing Sets</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Ethnic wear</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Dungarees & Jumpsuits</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Tights & Leggings</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Jeans, Trousers & Capris</a></li>
</div>
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p3\">Boys Footwear</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Casual Shoes</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Sports Shoes</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Sandals</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Flip flops</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">School Shoes</a></li>
<li><h5><a href=\"\" class=\"p3\">Girls Footwear</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Flats</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Casual Shoes</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Heels</a></li>
</div>
<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
<li><h5><a href=\"\" class=\"p3\">Kids Accessories</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Bags & Backpacks</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Watches</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Jewellery & Hair Accessories</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Eyewear</a></li>
<li><h5><a href=\"\" class=\"p3\">Brands</a></h5></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">United Colors of Benetton</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">Yk</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">U.S. Polo Assn. Kids</a></li>
<li><a href=\"\" class=\"menulist\" style=\"padding=\"100px\">GAP Kids</a></li>
</div>
</div>

</div>
</div>
</div> 
";                  
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?>
</ul>
</div>
<div class="navbar-custom-menu" style="position:absolute;right:10px">
<ul class="nav navbar-nav">
<li class="dropdown messages-menu">
<!-- Menu toggle button -->
<a href="#" class="dropdown-toggle" id="cart" data-toggle="dropdown">
<i class="fa fa-shopping-bag"></i>
<span class="label label-info cart_count" ></span>
</a>
<ul class="dropdown-menu" style="background: #2a2440;box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);border-radius:2px;border: none;">
<li class="header" style="background: #2a2440;color: white">You have <span class="cart_count" style="color: red"></span> item(s) in cart</li>
<li>
<ul class="menu" id="cart_menu">
</ul>
</li>
<li class="pull-center"><a href="cart_view.php"  style="background-color:#2a2440;color: #fff;font-weight: bolder;text-align: center;font-size: 16px;padding: 20px">View Cart</a></li>
</ul>

<li class="dropdown messages-menu">
<!-- Menu toggle button -->
<a href="wishlist.php"  id="cart" >
<i class="fa fa-heart-o" ></i>
</a>
</li>
<li>
<?php
if(isset($_SESSION['user'])){
$image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
echo '
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#profile">
<img src="'.$image.'" class="user-image" alt="User Image">
</a>
</li>
';
}
else{
echo "
";
?>
<li><a href='login.php'  class='login'>LOGIN</a></li>
<li><a href='signup.php' class='login'>SIGNUP</a></li>
<?php
}
?>
</li>
<li>
<button class="openBtn"  data-toggle="modal" data-target="#search"><i class="fa fa-search"></i></button>
</li>
</ul>
</div>
</nav>
</header>
</div>

<div class="mobile-view-header" id="mobileview">
<div class="container">
<div class="row">
<div class="col-sm-4 col-xs-4">
<button type="button" id="bars" data-toggle="modal" data-target="#bar" style="background:none;border:none;padding:0;outline:none;position:absolute;left:0;top:-2px">
<i class="fa fa-bars"></i>
</button>
</div>
<div class="col-sm-4 col-xs-4">
<a href="" class="mens" style="color:white;font-size:2rem;position:absolute;left:0;top:7px">Ecomm</a>
</div>
<div class="col-sm-4 col-xs-4"></div>
</div>
</div>
</div>

<div class="mobile-header">

asa</div>
<?php include 'includes/sidebar_modal.php'; ?>
<?php include 'includes/profile_modal.php'; ?>

</body>
<script>
window.onscroll = function() {myFunction()};

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
if (!val) { return false;}
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
document.addEventListener("click", function (e) {
closeAllLists(e.target);
});
}

/*An array containing all the country names in the world:*/
var countries = ["Nike","Woodland","Adidas","SeeandWear","Lee Cooper","Fila","Puma","RedTape"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>
<script>
var input = document.getElementById("myInput");
input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
event.preventDefault();
document.getElementById("myBtn").click();
}
});
</script>   
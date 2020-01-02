<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="./images/favicon.jpg" rel="icon">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">

<!-- Magnify -->
<link rel="stylesheet" href="magnify/magnify.min.css">
<link rel="stylesheet" type="text/css" href="includes/mediaquery.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
<!-- Paypal Express -->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<!-- Google Recaptcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- Custom CSS -->
<style type="text/css">
/* width */
::-webkit-scrollbar {
width: 6px;
}

/* Track */
::-webkit-scrollbar-track {
box-shadow: inset 0 0 5px grey;
}

/* Handle */
::-webkit-scrollbar-thumb {
background: grey;
border-radius: 10px;
}

body{
font-family: 'Alatsi', sans-serif;
}
.content-wrapper{
background:#150d2d;
}

#grad1 {
background-image:url('images/banner/banner1.jpg');
width: 100%;
margin-top: -2px;
height: 400px;
background-repeat: no-repeat;
background-size: contain;
}

#grad2{
background-image:url('images/banner/banner2.jpg');
position: absolute;
width: 100%;
margin-top: -2px;
height: 400px;
background-repeat: no-repeat;
background-size: contain;
}
#grad3{
background-image:url('images/banner/banner.gif');
position: absolute;
width: 100%;
height: 400px;
margin-top: -2px;
background-repeat: no-repeat;
background-size: contain;
}
#grad4{
background-image:url('images/banner/banner5.jpg');
position: absolute;
width: 100%;
height: 400px;
margin-top: -2px;
background-repeat: no-repeat;
background-size: contain;
}
#grad5{
background-image:url('images/banner/banner6.jpg');
position: absolute;
width: 100%;
height: 400px;
margin-top: -2px;
background-repeat: no-repeat;
background-size: contain;
}

.swiper1 .swiper-wrapper{
height: 300px;
}   

@media (max-width: 768px){ 

.swiper1 .swiper-wrapper {
height: 130px;
}   
.swiper2 .swiper-wrapper {
height:100px;
}   
}
.modal.fade{
backdrop-filter:blur(5px);
background:rgba(0,0,0,0.5)
}

.modal-content, .modal-header {
background-image: linear-gradient(254deg, #5909b3, #7f0dff);
border-radius: 5px;
}

.modal-body p{
color:white;
}
.modal-title{
padding:10px 20px;
}

.modal.fade{
backdrop-filter: blur(4px)
}
html{
scroll-behavior: smooth;
}


.search-icon {
position: relative;
float: right;
width: 615px;
height: 25px;
top: -35px;
right: 5px;
color: red;
background-color: white;
border: none;
font-weight: bolder;
}


.btn-success, #quickview{
background: #7f0dff;
background-image: linear-gradient(253deg, rgb(89, 9, 179), rgb(127, 13, 255));
border: none;
color: #ffffff;
cursor: pointer;
border: 0.25rem;
padding: 0 18px;
max-width: 150px;
min-width: 136px;
font-size: 14px;
min-height: 40px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
background: #7f0dff;
font-weight: 500;
font-family: "Rubik", sans-serif;
margin-right: 10px;
text-transform: capitalize;
background-image: linear-gradient(254deg, #5909b3, #7f0dff);
transition-property: background;
transition-duration: 1s;
transition-timing-function: linear;
}


/* Small devices (tablets, 768px and up) */
@media (min-width: 768px){ 

#navbar-search-input{ 
width: 100px; 
}
#navbar-search-input:focus{ 
width: 100px; 
}
}

/* Medium devices (desktops, 992px and up) */
@media (min-width: 992px){ 
#navbar-search-input{ 
width: 90%; 
}
#navbar-search-input:focus{ 
width: 100%; 
} 
}

.test2{
text-overflow: ellipsis;
}
.box:hover {
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.register-box{
margin-top:20px;
}

#trending{
list-style: none;
padding:10px 5px 10px 15px;
}
#trending li {
padding-left: 1.3em;
color: black;   
}
#trending li:before {
content: "\f06e";
font-family: FontAwesome;
display: inline-block;
margin-left: -1.3em; 
width: 1.3em;
}

.view{
color: black;
}
.view:hover{
color: orange;

}
.brand1{
color: red;
font-weight: bolder;
}


.mens{
color: white;
font-size: 2.9rem;
font-weight: bolder;
letter-spacing: 1px;  
font-family: 'Kanit', sans-serif;
text-transform: uppercase;
font-weight: 700;
line-height: 1;
margin-bottom: 30px;
font-family: Roboto,-apple-system,BlinkMacSystemFont,Helvetica Neue,Segoe UI,sans-serif;
}


.flex-centerY-centerX {
-webkit-box-pack: center;
-ms-flex-pack: center;
justify-content: center;
-webkit-box-align: center;
-ms-flex-align: center;
align-items: center;
}

.p-name{
font-family: Roboto,-apple-system,BlinkMacSystemFont,Helvetica Neue,Segoe UI,sans-serif;
}

.page-wrapper {
display: grid;
}

.page-wrapper .page-inner {
display: inline-grid;
}

.ribbon1 {
position: absolute;
top: -6.1px;
right: 10px;
}
.ribbon1:after {
position: absolute;
content: "";
width: 0;
height: 0;
border-left: 53px solid transparent;
border-right: 53px solid transparent;
border-top: 10px solid #F8463F;
}
.ribbon1 span {
position: relative;
display: block;
color: white;
text-align: center;
background: #F8463F;
font-size: 14px;
line-height: 1;
padding: 12px 8px 10px;
border-top-right-radius: 8px;
width: 90px;
}
.ribbon1 span:before, .ribbon1 span:after {
position: absolute;
content: "";
}
.ribbon1 span:before {
height: 6px;
width: 6px;
color: white;
left: -6px;
top: 0;
background: #F8463F;
}
.ribbon1 span:after {
height: 6px;
width: 8px;
left: -8px;
color: white
top: 0;
border-radius: 8px 8px 0 0;
background: #C02031;
}
.el-wrapper {
width: 100%;
}
.container-fluid{
width: 98%;
}
@media (max-width: 991px) {
.el-wrapper {
width: 345px;
}
}

@media (max-width: 767px) {
.el-wrapper {
width: 290px;
margin: 30px auto;
}
}

.el-wrapper:hover .h-bg {
left: 0px;
}

.el-wrapper:hover .price {
left: 20px;
-webkit-transform: translateY(-70%);
-ms-transform: translateY(-70%);
-o-transform: translateY(-70%);
transform: translateY(-70%);
color: white  ;
}

.el-wrapper:hover .add-to-cart {
left: 70%;
}

.el-wrapper:hover .img {
webkit-filter: blur(7px);
-o-filter: blur(7px);
-ms-filter: blur(7px);
filter: blur(7px);
filter: progid:DXImageTransform.Microsoft.Blur(pixelradius='7', shadowopacity='0.0');
opacity: 0.4;
}

.el-wrapper:hover .info-inner {
bottom: 155px;
}

.el-wrapper:hover .a-size {
-webkit-transition-delay: 300ms;
-o-transition-delay: 300ms;
transition-delay: 300ms;
bottom: 50px;
opacity: 1;
}
#quickview{
background: none;
margin-left: 50px;
line-height: 40px;
border: 1px solid white;color: white;
}

.el-wrapper .box-down {
width: 100%;
height: 60px;
margin-bottom: 20px;
position: relative;
overflow: hidden;
}

.el-wrapper .box-up {
width: 100%;
height: 300px;
position: relative;
overflow: hidden;
text-align: center;
}

.el-wrapper .img {
padding: 20px 0;
-webkit-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
-moz-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
-o-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
-webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
}

.h-bg {
-webkit-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
-moz-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
-o-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
-webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
width: 660px;
height: 100%;
background-color: steelblue;
position: absolute;
left: -659px;
}

.h-bg .h-bg-inner {
width: 70%;
height: 100%;
background-color: #464646;
}

.info-inner {
-webkit-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
-moz-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
-o-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
-webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
position: absolute;
width: 100%;
bottom: 15px;
}

.info-inner .p-name,
.info-inner .p-company {
display: block;
}

.info-inner .p-name {
white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis;  
font-family: 'PT Sans', sans-serif;
font-size: 18px;
color: white;
}

.info-inner .p-company {
font-family: 'Lato', sans-serif;
font-size: 12px;
text-transform: uppercase;
color: #8c8c8c;
}

.a-size {
-webkit-transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
-moz-transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
-o-transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
-webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
position: absolute;
width: 100%;
bottom: -20px;
font-family: 'PT Sans', sans-serif;
color: #828282;
opacity: 0;
}

.a-size .size {
color: white;
}

.cart {
display: block;
position: absolute;
width: 100%;
height: 100%;
font-family: 'Lato', sans-serif;
font-weight: 700;
}

.cart .price {
-webkit-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
-moz-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
-o-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
-webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
-webkit-transition-delay: 100ms;
-o-transition-delay: 100ms;
transition-delay: 100ms;
display: block;
position: absolute;
top: 70%;
left: 60%;
-webkit-transform: translate(-70%, -70%);
-ms-transform: translate(-70%, -70%);
-o-transform: translate(-70%, -70%);
font-size: 16px;
color: white;
}

.cart .add-to-cart {
-webkit-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
-moz-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
-o-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
-webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
-o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
/* ease-out */
-webkit-transition-delay: 100ms;
-o-transition-delay: 100ms;
transition-delay: 100ms;
display: block;
position: absolute;
top: 70%;
left: 130%;
padding: 10px;
-webkit-transform: translate(-70%, -70%);
-ms-transform: translate(-70%, -70%);
-o-transform: translate(-70%, -70%);
transform: translate(-70%, -70%);
}

.cart .add-to-cart .txt {
font-size: 12px;
color: #fff;
margin-left: 80px;
letter-spacing: 0.045em;
text-transform: uppercase;
white-space: nowrap;
}

.moretext {
display: none;
}
.moreless-button{
background-color: transparent;
border: 1px solid white;
color: white;
font-weight: 700;
letter-spacing: 2px;
padding: 10px;  
}
.moreless-button:hover{
color: white;
}
.cat{
color: white;
font-weight: 600;
text-transform: uppercase;
letter-spacing: 2px;
}

#cat1:hover{
color: orange;
}


#carousel3d .carousel-3d-slide {  
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-flex: 1;
-ms-flex: 1;
flex: 1;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-ms-flex-direction: column;
flex-direction: column;
-webkit-box-pack: center;
-ms-flex-pack: center;
justify-content: center;
text-align: center;
border: none;
background-color: #fff;
-webkit-transition: all .4s;
transition: all .4s;
}
#carousel3d .carousel-3d-slide.current {
color: #fff;
}
#carousel3d1 .carousel-3d-slide.current span {
font-size: 20px;
font-weight: 500;
}
#carousel3d1 .carousel-3d-slide {  
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-flex: 1;
-ms-flex: 1;
flex: 1;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-ms-flex-direction: column;
flex-direction: column;
-webkit-box-pack: center;
-ms-flex-pack: center;
justify-content: center;
text-align: center;
border: none;
background-color: #fff;
-webkit-transition: all .4s;
transition: all .4s;
}
#carousel3d1 .carousel-3d-slide.current {
color: #fff;
}
#carousel3d1 .carousel-3d-slide.current span {
font-size: 20px;
font-weight: 500;
}         
#carousel3d1 .carousel-3d-slide.current span {
font-size: 20px;
font-weight: 500;
}
#carousel3d2 .carousel-3d-slide {  
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-flex: 1;
-ms-flex: 1;
flex: 1;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-ms-flex-direction: column;
flex-direction: column;
-webkit-box-pack: center;
-ms-flex-pack: center;
justify-content: center;
text-align: center;
border: none;
background-color: #fff;
-webkit-transition: all .4s;
transition: all .4s;
}
#carousel3d2 .carousel-3d-slide.current {
color: #fff;
}
#carousel3d2 .carousel-3d-slide.current span {
font-size: 20px;
font-weight: 500;
}
#demo{
font-family: sans-serif;
font-size: 20px;  
color: white;
padding: 10px;
text-transform: uppercase;  
} 


.subnav {
float: left;
overflow: hidden;
transition: 0.9s ease;

}

.subnav .subnavbtn {
font-size: 16px;  
border: none;
outline: none;
color: white;
padding: 14px 16px;
background-color: inherit;
font-family: inherit;
margin: 0;
}

.subnav-content  {
display: none;
padding: 20px;
position: absolute;
width: 100%;
transition: 0.5s ease-out;
text-align: center;



}
.subnavbtn:hover .fa-caret-down{
transform: rotate(180deg);
transition: 0.5s ease;
}
.subnav-content .p1{
color: steelblue;
}

.subnav-content .p2{
color: pink;
font-weight: 700;
}


.subnav:hover .subnav-content {
display: block;
z-index: 1;
top: 60;
left: 0;
} 
.subnav-content li{
padding: 3px;
}
.menulist{
color: white;
}
.menulist:hover{
font-weight: 700;
color: white;
}

.subnav-content .p3{
color: orange;
font-weight: 700;
text-decoration: none;
}

.subnav:hover .men{
border: 2px solid steelblue;
margin-left: 26px;
margin-top: -5px;
transition: 0.5s ease;
border-radius: 5px;
}

.subnav:hover .women{
border: 2px solid pink;
margin-left: 26px;
margin-top: -5px;
transition: 0.5s ease;
border-radius: 5px;
}
.subnav:hover .kids{
border: 2px solid orange;
margin-left: 26px;
margin-top: -5px;
transition: 0.5s ease;
border-radius: 5px;


}
.heading {
font-size: 25px;
margin-right: 25px;
}

.fa {
font-size: 25px;
}

.checked {
color: orange;
}

/* Three column layout */
.side {
float: left;
width: 15%;
margin-top: 10px;
}

.middle {
float: left;
width: 70%;
margin-top: 10px;
}

/* Place text to the right */
.right {
text-align: right;
}

/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
}

/* The bar container */
.bar-container {
width: 100%;
background-color: #f1f1f1;
text-align: center;
color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
.side, .middle {
width: 100%;
}
/* Hide the right column on small screens */
.right {
display: none;
}
}

/* Style the tab */
.tab {
float: left;
border: 1px solid #ccc;
background-color: #f1f1f1;
width: 23%;
height: 100vh;
}

/* Style the buttons that are used to open the tab content */
.tab button {
display: block;
background-color: inherit;
color: black;
padding: 22px 16px;
width: 100%;
border: none;
outline: none;
text-align: left;
cursor: pointer;
transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
background-color: #ddd;
font-size: 20px;

}

/* Create an active/current "tab button" class */
.tab button.active {
background-color: steelblue;
color: white;
font-weight: bolder;
font-size: 20px;
}

/* Style the tab content */
.tabcontent {
float: left;
padding: 0px 12px;
border: 1px solid #ccc;
width: 77%;
border-left: none;
height: 100%;
}


.profile-card {
width: 100%;
min-height: auto;
box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);
background: #fff;
border-radius: 12px;
max-width: 700px;
position: relative;
margin-top: 50px;

}

.profile-card__img {
width: 150px;
height: 150px;
margin-left: auto;
margin-right: auto;
transform: translateY(-70%);
border-radius: 70%;
overflow: hidden;
position: relative;
z-index: 4;
box-shadow: 0px 5px 50px 0px #6c44fc, 0px 0px 0px 7px rgba(107, 74, 255, 0.5);
}
@media screen and (max-width: 576px) {
.profile-card__img {
width: 120px;
height: 120px;
}
}
.profile-card__img img {
display: block;
width: 100%;
height: 100%;
object-fit: cover;
border-radius: 20%;
}

.button-base-button {
color: #fff;
font-size: 14px;
font-weight: 600;
padding: 10px;
background: none;
cursor: pointer;
text-align: center;
border: 1px solid white;
line-height: 20px;
border-radius: 3px;
text-transform: uppercase;
letter-spacing: 1px;
}

.table1 td{
width: 100%;
background: red;
padding: 20px;
border-bottom: none;
}  

/* Reset Select */
select {
-webkit-appearance: none;
-moz-appearance: none;
-ms-appearance: none;
appearance: none;
outline: 0;
box-shadow: none;
border: 0 !important;
background: rgb(51, 204, 102);
background-image: none;
}
/* Remove IE arrow */
select::-ms-expand {
display: none;
}
/* Custom Select */
.select {
position: relative;
display: flex;
width: 100%;
height: 3em;
line-height: 3;
background: rgb(51, 204, 102);
overflow: hidden;
border-radius: .25em;
}
select {
flex: 1;
padding: 0 .5em;
color: #fff;
cursor: pointer;
}
/* Arrow */
.select::after {
content: '\25BC';
position: absolute;
top: 0;
right: 0;
padding: 0 1em;
background: rgb(51, 204, 102);
cursor: pointer;
pointer-events: none;
-webkit-transition: .25s all ease;
-o-transition: .25s all ease;
transition: .25s all ease;
}
/* Transition */
.select:hover::after {
color: #f39c12;
}

.profileedit{
color: black;
padding-top: 10px;
}
.profileedit:hover{
font-weight: bolder;
font-size: 14px;
color: black;
}

.contact-form {
margin-top: 30px;
}

.contact-form .input-block {
/* background: #7f0dff;
background-image: linear-gradient(253deg, rgb(89, 9, 179), rgb(127, 13, 255));
*/
border-bottom: solid 2px  white;
width: 100%;
height: 40px;
padding: 25px;
position: relative;
-moz-transition: all 0.3s ease-out;
-o-transition: all 0.3s ease-out;
-webkit-transition: all 0.3s ease-out;
transition: all 0.3s ease-out;
}

.contact-form .input-block.textarea .form-control {
height: auto;
resize: none;
}

.contact-form .input-block label {
padding: 0 10px;
position: absolute;
left: 8px;
top: 20px;
color:  white;
display: block;
margin: 0;
font-weight: 600;
z-index: 1;
font-size: 16px;
margin-top: 10px;
line-height: 10px;
}

.contact-form .input-block label:focus{
color: #33cc66;
}

.contact-form .input-block .form-control {
background-color: transparent;
border: medium none;
border-radius: 0;
box-shadow: none;
color: white;
font-size: 18px;
height: 40px;
padding: 0;
position: relative;
top: -20px;
z-index: 2;
}


@media (min-width: 768px) {
.contact-wrap {
width: 60%;
margin: auto;
}
}

/* The container */
.container1 {
display: block;
position: relative;
cursor: pointer;
font-size: 14px;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
margin-left: 10px;
}

/* Hide the browser's default checkbox */
.container1 input {
position: absolute;
opacity: 0;
cursor: pointer;
height: 0;
width: 0;
}
.list-group-item{
background: none;
border: none;
color: white;
padding: 15px;
}
</style>

</head>
<body>

</body>

<script>
// Set the date we're counting down to
var countDownDate = new Date("jan 3, 2020 09:00:00 AM").getTime();
// Update the count down every 1 second
var x = setInterval(function() {

// Get today's date and time
var now = new Date().getTime();

// Find the distance between now and the count down date
var distance = countDownDate - now;

// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// Output the result in an element with id="demo"
document.getElementById("demo").innerHTML = days + "d " + hours + "h "
+ minutes + "m " + seconds + "s ";

// If the count down is over, write some text 
if (distance < 0) {
clearInterval(x);
document.getElementById("clock").style.display = "none";
document.getElementById("clock1").style.display = "none";
document.getElementById("clock3").style.display = "none";
document.getElementById("demo").innerHTML = "Deals are Expire Next Deals are coming Soon";


}
}, 1000);
</script>
<!-- <script>
var stateObject = {
"India": { 
"Delhi": ["new Delhi - 110001", "North Delhi - 110007"],
"Kerala": ["Thiruvananthapuram - 605036", "Palakkad - 678001"],
"Goa": ["North Goa  - 403521", "South Goa  - 403801"],
"Mumbai": ["Thane - 400612","Andheri - 400093", "Amboli - 400058"],

},
"Australia": {
"South Australia": ["Dunstan", "Mitchell"],
"Victoria": ["Altona", "Euroa"]
}, 
"Canada": {
"Alberta": ["Acadia", "Bighorn"],
"Columbia": ["Washington", ""]
},
"Afghanistan": {
"Alberta": ["Acadia", "Bighorn"],
"Columbia": ["Washington", ""]
},
}
window.onload = function () {
var countySel = document.getElementById("countySel"),
stateSel = document.getElementById("stateSel"),
districtSel = document.getElementById("districtSel");
for (var country in stateObject) {
countySel.options[countySel.options.length] = new Option(country, country);
}
countySel.onchange = function () {
stateSel.length = 1; // remove all options bar first
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done
for (var state in stateObject[this.value]) {
stateSel.options[stateSel.options.length] = new Option(state, state);
}
}
countySel.onchange(); // reset in case page is reloaded
stateSel.onchange = function () {
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done
var district = stateObject[countySel.value][this.value];
for (var i = 0; i < district.length; i++) {
districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
}
}
}
</script>
-->
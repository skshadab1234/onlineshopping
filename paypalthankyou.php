
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
	<?php include 'includes/navbar.php'; ?>
<style type="text/css">
.container2{
 position: absolute;
 top: 36%;
 left: 10%;
}

.container3	{
 position: absolute;
 top: 36%;
 left: 10%;
}
.btn {
    display: inline-block;
    width: 277px;
    height: 50px;
    font-size: 1em;
    font-weight: bold;
    line-height: 50px;
    text-align: center;
    text-transform: uppercase;
    background-color: transparent;
    cursor: pointer;
    text-decoration:none;
    font-family: 'Roboto', sans-serif;
    font-weight:900;
    font-size:17px;
    letter-spacing: 0.045em;
}

.btn svg {
    position: absolute;
    top: 0;
    left: 0;
}

.btn svg rect {
    //stroke: #EC0033;
    stroke-width: 4;
    stroke-dasharray: 353, 0;
    stroke-dashoffset: 0;
    -webkit-transition: all 600ms ease;
    transition: all 600ms ease;
}

.btn span{
  background: rgb(255,130,130);
  background: -moz-linear-gradient(left,  rgba(255,130,130,1) 0%, rgba(225,120,237,1) 100%);
  background: -webkit-linear-gradient(left,  rgba(255,130,130,1) 0%,rgba(225,120,237,1) 100%);
  background: linear-gradient(to right,  rgba(255,130,130,1) 0%,rgba(225,120,237,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff8282', endColorstr='#e178ed',GradientType=1 );
  
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.btn:hover svg rect {
    stroke-width: 4;
    stroke-dasharray: 196, 543;
    stroke-dashoffset: 437;
}
</style>
<body class="hold-transition skin-blue layout-top-nav">

<div class="content-wrapper">
		<div class="text-center" style="margin-top: -20px">
		<h1 class="mens" style="padding: 20px">Thank You So Much For Purchasing</h1>
	
<link href='https://fonts.googleapis.com/css?family=Lato|Roboto:400,900' rel='stylesheet' type='text/css'>
<div class="row">
	<div class="col-sm-6 col-lg-6">
		<div class="container3">
  <a href="index.php" class="btn">
  <svg width="277" height="62">
    <defs>
        <linearGradient id="grad1">
            <stop offset="0%" stop-color="#FF8282"/>
            <stop offset="100%" stop-color="#E178ED" />
        </linearGradient>
    </defs>						
     <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
		  </svg>
  <!--<span>Voir mes réalisations</span>-->
    <span>Continue Shopping</span>
</a>

</div>
	</div>
	<div class="col-sm-6 col-lg-6">
	<div class="container2">
  <a href="orders.php" class="btn">
  <svg width="277" height="62">
    <defs>
        <linearGradient id="grad1">
            <stop offset="0%" stop-color="#FF8282"/>
            <stop offset="100%" stop-color="#E178ED" />
        </linearGradient>
    </defs>
     <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
  </svg>
  <!--<span>Voir mes réalisations</span>-->
    <span>View Orders</span>
</a>

</div>
	</div>
	
</div>
	</div>
</div>





				<?php include 'includes/footer.php'; ?>

		<?php include 'includes/scripts.php'; ?>

</body>
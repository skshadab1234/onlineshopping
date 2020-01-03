  <?php include 'includes/session.php'; ?>
<?php
$slug = $_GET['category'];

$conn = $pdo->open();

try{
$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
$stmt->execute(['slug' => $slug]);
$cat = $stmt->fetch();
$catid = $cat['id'];
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?>
<head>
  <title><?php echo $cat['name']; ?>  </title>
  </head>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<body class="layout-top-nav">
<div class="wrapper">

<div class="content-wrapper">
  
<div class="container-fluid" >

<!-- Main content -->
<section class="content" >
<div class="row">
<div class="col-sm-3 col-lg-3"  >
<?php  
include 'includes/filter.php'
?>
</div>
<div class="col-sm-9" >
  <section class="content-header">
      <h1 style="color: #85837f;font-size: 20px;font-weight: 600;letter-spacing: 2px">
        <span style="color: white"><?php echo $cat['name']; ?></span>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" style="color: #85837f"><i class="fa fa-dashboard"></i> Home</a></li>
        <li  style="color: #85837f" class="active"><?php echo $cat['name']; ?>  </li>
      </ol>
    </section>  
    <br>  

<?php

$conn = $pdo->open();

try{
$inc = 4; 
$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
$stmt->execute(['catid' => $catid]);
foreach ($stmt as $row) {
$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
$inc = ($inc == 4) ? 1 : $inc + 1;
if($inc == 4) echo "<div class='row'>";
echo "
<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3\" >

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
            <div class=\"a-size\">Available sizes : <span class=\"size\">".$row['size']."</span></div>
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
<button type="button" class="btn btn-primary btn-sm" id="quickview" data-toggle="modal" data-target="#<?php echo $row['id']; ?>1"> Quick View </button>

<!-- Modal -->
<div id="<?php echo $row['id']; ?>1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo "<span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>"; ?></h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid" style="color: #544a82">
          <div class="row">
            <div class="col-sm-6">
              <?php echo "<a href='product.php?product=".$row['slug']."'><img src='".$image."' class=\"img-rounded\"></a>"; ?>
            </div>
            <div class="col-sm-6">
              <?php echo "".$row['brand'].""; ?>
              <?php echo "<br>"; ?>
              <?php echo " <span class=\"p-name\"><a style=\"font-size:14px;color:white;font-weight:600\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>"; ?>
              <br>
              <br>
              <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
               <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
              <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
              <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
              <i class="fa fa-star-o" style="color: orange;font-size: 14px"></i>
              <br><br>
                          <span class="price" style="color: white;font-size: 20px"><?php echo "&#36; ".number_format($row['price'], 2).""; ?></span>&nbsp;
                          <small style="font-size: 14px;color: white"><s><?php echo "&#36; ".number_format($row['old_price'], 2).""; ?></s></small>
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
</section>


</div>

</div>
<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>
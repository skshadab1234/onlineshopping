<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<title><?php echo ''.$_POST['keyword'].''; ?> </title>
<body class="hold-transition skin-blue layout-top-nav">
  <?php include 'includes/navbar.php'; ?>

<div class="wrapper">

	 
	  <div class="content-wrapper">
	    <div class="container-fluid	" >

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12">
	            <?php
	       			
	       			$conn = $pdo->open();

	       			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
	       			$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
	       			$row = $stmt->fetch();
	       			if($row['numrows'] < 1){
	       				echo '<h1 class="page-header" style="color:grey">No results found for <i>'.$_POST['keyword'].'</i></h1>';
	       			}
	       			else{
	       				echo '<h1 class="page-header" style="color:grey">Search results for <i>'.$_POST['keyword'].'</i></h1>';
		       			try{
		       			 	$inc = 5;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
						    $stmt->execute(['keyword' => '%'.$_POST['keyword'].		'%']);
					 
						    foreach ($stmt as $row) {
						    	$highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 6) ? 1 : $inc + 1;
	       						if($inc == 6) echo "<div class='row'>";
	       						echo "
	       						<div class=\"col-xs-12 col-sm-6 col-md-3 col-lg-2\">

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
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="quickview" data-target="#<?php echo $row['id']; ?>"> Quick View </button>

<!-- Modal -->
<div id="<?php echo $row['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <?php 
echo " <div class=\"ribbon\">
      <span class=\"ribbon1\"><span>".$row['discount']." OFF </span></span>
    </div> ";
         ?>
         <h4 class="modal-title"><?php echo "<span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></span>"; ?></h4>
      </div>
      <div class="modal-body" style="color: white">
        <div class="container-fluid">
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
	       						if($inc == 5) echo "</div>";
						    }
						    if($inc == 5) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 5) echo "<div class='col-sm-4'></div></div>";
							
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}
					}

					$pdo->close();

	       		?> 
	        	</div>
	        	
	        </div>
	      </section>
	     <br>
	    </div>
	  </div>

  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
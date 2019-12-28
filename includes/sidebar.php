<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h5 class="box-title" style="font-size: 16px"><b>Top Brands Products Viewed Today</b></h5>
	  	</div>
	  	<div class="box-body">	
	  		<ul id="trending">
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
	  			$stmt->execute(['now'=>$now]);
	  			foreach($stmt as $row){
	  				echo "<a  class=\"brand1\" href='product.php?product=".$row['slug']."'>".$row['brand']."</a>"	;
	  				echo "<li><a  class=\"view\" href='product.php?product=".$row['slug']."'>".$row['name']."</a></li>";
	  			}

	  			$pdo->close();
	  		?>
	    	<ul>
	  	</div>
	</div>
</div>



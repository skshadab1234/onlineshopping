<?php

//fetch_data

include 'includes/session.php';
if(isset($_POST["action"]))
{
 $query = "SELECT *, products.id As prodid FROM products LEFT JOIN brands on brands.id = products.brand_id WHERE brand_id = :catid ORDER BY RAND()";
 if(isset($_POST["brand"]))
 {
  $brand_filter = implode("','", $_POST["brand"]);
  $query .= "
   AND product_brand IN('".$brand_filter."')
  ";
 }

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                         <a href="product?product='.$row['slug'].'"><img src="'.$image.'" alt="">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="'.$image2.'" alt="">
                                      </a>
                                        <!-- Product Badge -->
                                        <div class="product-badge offer-badge">
                                            <span>-'.$row['discpunt'].'%</span>
                                        </div>
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>'.$row['brand_name'].'</span>
                                        <a href="single-product-details.html">
                                            <h6>'.$row['name'].'</h6>
                                        </a>
                                        <p class="product-price"><span class="old-price">&#8377;'.$row['old_price'].'</span> &#8377; '.$row['price'].'</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="#" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>
<?php include 'includes/session.php'; ?>
<?php
if (isset($_GET['styles'])) {
  $slug = $_GET['styles'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("SELECT * FROM subcategory WHERE sub_catslug = :slug");
    $stmt->execute(['slug' => $slug]);
    $subcat = $stmt->fetch();
    $subcatid = $subcat['id'];
  } catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
  }

  $pdo->close();
} elseif ($_GET['brand']) {
  $brand = $_GET['brand'];
  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("SELECT * FROM brands WHERE brand_name = :slug");
    $stmt->execute(['slug' => $brand]);
    $brand = $stmt->fetch();
    $brandid = $brand['id'];
  } catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
  }

  $pdo->close();
}
?>
<?php

if (isset($subcatid)) {
  $stmt = $conn->prepare("SELECT *, COUNT(products.id) As prodids FROM products LEFT JOIN brands on brands.id = products.brand_id WHERE subcategory_id = :catid");
  $stmt->execute(['catid' => $subcatid]);
  $total_pro = $stmt->fetch();
} elseif ($_GET['brand']) {
  $stmt = $conn->prepare("SELECT *, COUNT(products.id) As prodids FROM products LEFT JOIN brands on brands.id = products.brand_id WHERE brand_id = :catid");
  $stmt->execute(['catid' => $brandid]);
  $total_brand = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php

    if (isset($_GET['styles'])) {
      echo $subcat['name'];
    } else {
      echo $brand['brand_name'];
    }
    ?> </title>
</head>

<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<body>

  <div class="wrapper">
    <div class="content-wrapper" style="margin: 0">
      <div style="background:#fff;height:100%">
        <!-- Main content -->
        <section class="content" style="padding:0px">

          <div class="container-fluid" style="margin:40px 0px;padding:0;">
            <div class="container-fluid" id="pr-show" style="background: #f5f5f6;padding:20px;margin:10px 0px">

<?php
              if (isset($brandid)) {
                echo  '<ul id="breadcrumb-cat"> 
                <li>Home</li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>'.$brand['brand_name'].'</li>
                </ul>
                ';
              }
              elseif(isset($subcatid)){
                echo  '<ul id="breadcrumb-cat"> 
                <li>Home</li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>'.$subcat['name'].'</li>
                </ul>
                ';
             
              }
              ?>

              <?php
              if (isset($brandid)) {
                echo  $brand['brand_name'] . " - <span style='color:gray'>" . $total_brand['prodids']."  items</span>";
              }
              elseif(isset($subcatid)){
                echo  $subcat['name'] . " - " . $total_pro['prodids']." items";
              }
              ?>
            </div>
            <?php
            if (isset($subcatid)) {
              $conn = $pdo->open();
              try {
                $inc = 6;
                $stmt = $conn->prepare("SELECT *, products.id As prodid, products.name as prodname FROM products LEFT JOIN brands on brands.id = products.brand_id  WHERE subcategory_id = :catid ORDER BY RAND()");
                $stmt->execute(['catid' => $subcatid]);
                foreach ($stmt as $row) {
                  $image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
                  $inc = ($inc == 6) ? 1 : $inc + 1;
                  if ($inc == 6) echo "<div class='row' style='margin:0;padding:0'>";
            ?>
                  <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2" style='margin:0;padding:0'>
                    <div class="card" style="overflow: hidden">
                      <div style="width:200px;overflow:hidden;height:250px">
                        <?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img\"  style='object-fit:contain;width:200px;height:100%'></a> "; ?>
                      </div>
                      <div class="card3" style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis;width:100%;position:relative;line-height:9px;padding:5px;font-family:calibri">
                        <h5 class="text-left" style="font-weight: 700;font-size: 15px;font-family: calibri;"><?php echo "" . $row['brand_name'] . " " ?></h5>
                        <?php echo "<a style=\"color: #323232;font-size: 12px;font-weight: 100;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a>"; ?>
                        <h5 class=" text-left" style="font-size:14px;color:orangered"><?php echo "₹ " . number_format($row['price'], 2) . "" ?>&nbsp;<span style="color: lightslategray;font-size: 12px;"><s><?php echo " ₹ " . number_format($row['old_price'], 2) . "" ?></s></span><span class="discountoffer" style="font-size:16px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;color:green"><?php echo " " . $row['discount'] . " " ?>OFF</span></h5>
                      </div>
                      <div class="card1" style="position: absolute;bottom: 44px;background: #fff;padding:5px">
                        <div class="btn-group" id="q-btn">
                          <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#<?php echo $row['prodid'] ?>1">Quick View</button>
                          <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#<?php echo $row['prodid'] ?>1">Wishlist</button>
                        </div>

                        <h5>Sizes : <?php echo "" . $row['size'] . "" ?></h5>
                      </div>
                      <!-- Modal -->
                      <div id="<?php echo $row['prodid']; ?>1" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <h4 class="modal-title"><?php echo "<span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>"; ?></h4>
                            <div class="modal-body">
                              <div class="container-fluid" style="color: #544a82">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img-responsive\"></a>"; ?>
                                  </div>
                                  <div class="col-sm-6">
                                    <span style="color:steelblue"><?php echo "" . $row['brand'] . ""; ?></span>
                                    <?php echo "<br>"; ?>
                                    <?php echo " <span class=\"p-name\"><a style=\"font-size:14px;color:white;font-weight:600\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>"; ?>
                                    <br>
                                    <br>
                                    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                    <i class="fa fa-star-o" style="color: orange;font-size: 14px"></i>
                                    <br><br>
                                    <span class="price" style="color: white;font-size: 20px"><?php echo "₹ " . number_format($row['price'], 2) . ""; ?></span>&nbsp;
                                    <small style="font-size: 14px;color: white"><s><?php echo "₹ " . number_format($row['old_price'], 2) . ""; ?></s></small>
                                    <br>
                                    <br>

                                    <button class="btn btn-info" style="background-color: orange;border: orange"><?php echo "<a href='product.php?product=" . $row['slug'] . "' style=\"font-size:14px;color:white;font-weight:600\">See Product Details</a>"; ?></button>
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
                    </div>
                  </div>

                <?php echo "
";
                  if ($inc == 6) echo "</div>";
                }
                if ($inc == 6) echo "<div class='col-sm-3'></div><div class='col-sm-3'></div></div>";
                if ($inc == 6) echo "<div class='col-sm-3'></div></div>";
              } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
              }

              $pdo->close();
            } elseif (isset($brandid)) {
              $conn = $pdo->open();

              try {
                $inc = 6;
                $stmt = $conn->prepare("SELECT *, products.id As prodid FROM products LEFT JOIN brands on brands.id = products.brand_id WHERE brand_id = :catid");
                $stmt->execute(['catid' => $brandid]);
                foreach ($stmt as $row) {
                  $image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
                  $inc = ($inc == 6) ? 1 : $inc + 1;
                  if ($inc == 6) echo "<div class='row' style='margin:0;padding:0'>";
                ?>
                  <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2" style='margin:0;padding:0'>
                    <div class="card" style="overflow: hidden">
                      <div style="width:200px;overflow:hidden;height:250px">
                        <?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img\"  style='object-fit:contain;width:200px;height:100%'></a> "; ?>
                      </div>
                      <div class="card3" style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis;width:100%;position:relative;line-height:9px;padding:5px;font-family:calibri">
                        <h5 class="text-left" style="font-weight: 700;font-size: 15px;font-family: calibri;"><?php echo "" . $row['brand_name'] . " " ?></h5>
                        <?php echo "<a style=\"color: #323232;font-size: 12px;font-weight: 100;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a>"; ?>
                        <h5 class=" text-left" style="font-size:14px;color:orangered"><?php echo "₹ " . number_format($row['price'], 2) . "" ?>&nbsp;<span style="color: lightslategray;font-size: 12px;"><s><?php echo " ₹ " . number_format($row['old_price'], 2) . "" ?></s></span><span class="discountoffer" style="font-size:16px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;color:green"><?php echo " " . $row['discount'] . " " ?>OFF</span></h5>
                      </div>
                      <div class="card1" style="position: absolute;bottom: 44px;background: #fff;width: 100%;overflow: hidden;padding: 10px;">
                        <div class="btn-group" id="q-btn">
                          <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#<?php echo $row['prodid'] ?>1">Quick View</button>
                          <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#<?php echo $row['prodid'] ?>1">Wishlist</button>
                        </div>

                        <h5>Sizes : <?php echo "" . $row['size'] . "" ?></h5>
                      </div>
                      <!-- Modal -->
                      <div id="<?php echo $row['prodid']; ?>1" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <h4 class="modal-title"><?php echo "<span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>"; ?></h4>
                            <div class="modal-body">
                              <div class="container-fluid" style="color: #544a82">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img-responsive\"></a>"; ?>
                                  </div>
                                  <div class="col-sm-6">
                                    <span style="color:steelblue"><?php echo "" . $row['brand'] . ""; ?></span>
                                    <?php echo "<br>"; ?>
                                    <?php echo " <span class=\"p-name\"><a style=\"font-size:14px;color:white;font-weight:600\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>"; ?>
                                    <br>
                                    <br>
                                    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                    <i class="fa fa-star" style="color: orange;font-size: 14px"></i>
                                    <i class="fa fa-star-o" style="color: orange;font-size: 14px"></i>
                                    <br><br>
                                    <span class="price" style="color: white;font-size: 20px"><?php echo "₹ " . number_format($row['price'], 2) . ""; ?></span>&nbsp;
                                    <small style="font-size: 14px;color: white"><s><?php echo "₹ " . number_format($row['old_price'], 2) . ""; ?></s></small>
                                    <br>
                                    <br>

                                    <button class="btn btn-info" style="background-color: orange;border: orange"><?php echo "<a href='product.php?product=" . $row['slug'] . "' style=\"font-size:14px;color:white;font-weight:600\">See Product Details</a>"; ?></button>
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
                    </div>
                  </div>
            <?php echo "
";
                  if ($inc == 6) echo "</div>";
                }
                if ($inc == 6) echo "<div class='col-sm-3'></div><div class='col-sm-3'></div></div>";
                if ($inc == 6) echo "<div class='col-sm-3'></div></div>";
              } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
              }

              $pdo->close();
            } else {
              echo "thanks";
            }
            ?>
          </div>
        </section>
      </div>
    </div>
  </div>
  <?php include 'includes/footer.php' ?>
  <?php include 'includes/scripts.php' ?>
</body>

</html>
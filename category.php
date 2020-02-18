<?php include 'includes/session.php'; ?>
  <?php
  $slug = $_GET['category'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
    $stmt->execute(['slug' => $slug]);
    $cat = $stmt->fetch();
    $catid = $cat['id'];
  } catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
  }

  $pdo->close();

  ?>

  <head>
    <title><?php echo $cat['name']; ?> </title>
  </head>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/navbar.php'; ?>

  <body class="hold-transition layout-top-nav">

    <div class="wrapper">
      <?php include 'includes/sidenav.php' ?>
      <div class="content-wrapper">

        <div style="background:#fff">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <ul class="breadcrumb text-right">
                <li><a href="#">Home</a></li>
                <li><a href="#"><?php echo $cat['name']?></a></li>
              </ul>
              <div class="col-sm-12" style="padding:0px">
               <h4 style="padding: 20px;font-size:30px"><?php echo "".$cat['name']."";?></h4>
                <?php

                $conn = $pdo->open();

                try {
                  $inc = 6;
                  $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
                  $stmt->execute(['catid' => $catid]);
                  foreach ($stmt as $row) {
                    $image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
                    $inc = ($inc == 6) ? 1 : $inc + 1;
                    if ($inc == 6) echo "<div class='row'>";
                ?>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                      <div class="card">
                        <?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img-fluid\" width='250px' height='250px'></a> "; ?>
                        <div class="card3" style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis;width:100%;position:relative;padding:10px">
                          <h5 class="text-left" style="font-size:20px;font-weight:700"><?php echo "" . $row['brand'] . " " ?></h5>
                          <?php echo "<a style=\"color:black\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a>"; ?>
                          <h5 class="text-left" style="font-size:16px"><?php echo "₹ " . number_format($row['price'], 2) . "" ?><span style="color:#313131;font-size:12px"><s><?php echo " ₹ " . number_format($row['old_price'], 2) . "" ?></s></span><span class="discountoffer" style="font-size:16px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;color:green"><?php echo " " . $row['discount'] . " " ?>OFF</span></h5>
                        </div>
                        <div class="fav" style="position:absolute;top:20px;right:20px;">
                          <a href=""><i class="fa fa-heart-o" style="font-size:20px"></i></a>
                        </div>
                        <div class="card1" style="position: absolute;top: 212px;background: #fff;padding: 10px;">
                          <button class="btn btn-primary" style="background:#ff3f6c;border:none;text-transform:uppercase;font-weight:bolder" data-toggle="modal" data-target="#<?php echo $row['id'] ?>1">Quick View</button>
                          <h5>Sizes : <?php echo "" . $row['size'] . "" ?></h5>
                        </div>
                        <!-- Modal -->
                        <div id="<?php echo $row['id']; ?>1" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <h4 class="modal-title"><?php echo "<span class=\"p-name\"><a style=\"font-size:12px;color:white;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></span>"; ?></h4>
                              <div class="modal-body">
                                <div class="container-fluid" style="color: #544a82">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img-rounded\"></a>"; ?>
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

                ?>

              </div>



            </div>
          </section>


        </div>

        <div id="mobilefilter">
          <a href="" data-toggle="modal" data-target="#filter"><i class="fa fa-filter"></i> Filter</a>
          <a href="" data-toggle="modal" data-target="#filter" id="sort"><i class="fa fa-sort"></i> Sort</a>
        </div>
      </div>
      <?php include 'includes/footer.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

  </body>

  </html>
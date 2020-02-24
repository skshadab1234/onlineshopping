<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<title><?php echo '' . $_POST['keyword'] . ''; ?> </title>

<body class="hold-transition skin-blue layout-top-nav">
  <?php include 'includes/navbar.php'; ?>

  <div class="wrapper">


    <div class="container-fluid	">

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-sm-12">
            <?php

            $conn = $pdo->open();

            $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
            $stmt->execute(['keyword' => '%' . $_POST['keyword'] . '%']);
            $row = $stmt->fetch();
            if ($row['numrows'] < 1) {
              echo '<h1 class="page-header" style="color:grey">No results found for <i>' . $_POST['keyword'] . '</i></h1>
              <h5> ' . $row['numrows'] . ' Results </h5>';
            } else {
              echo '<h1 class="page-header" style="color:grey">Search results for <i>' . $_POST['keyword'] . '</i></h1>
              <h5> ' . $row['numrows'] . ' Results </h5>';
              try {
                $inc = 6;
                $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
                $stmt->execute(['keyword' => '%' . $_POST['keyword'] .    '%']);

                foreach ($stmt as $row) {
                  $highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
                  $image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
                  $inc = ($inc == 6) ? 1 : $inc + 1;
                  if ($inc == 6) echo "<div class='row'>";
            ?>
                  <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 container">
                    <div class="card">
                      <?php echo "<a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img-fluid\" width='250px' height='250px'></a> "; ?>
                      <div class="card3" style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis;width:100%;position:relative;padding:10px">
                        <h5 class="text-left" style="font-size:20px;font-weight:700"><?php echo "" . $row['brand'] . " " ?></h5>
                        <?php echo "<a style=\"color:black\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a>"; ?>
                        <h5 class="text-left" style="font-size:16px"><?php echo "&#36; " . number_format($row['price'], 2) . "" ?><span style="color:#313131;font-size:12px"><s><?php echo " &#36; " . number_format($row['old_price'], 2) . "" ?></s></span><span class="discountoffer" style="font-size:16px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;color:green"><?php echo " " . $row['discount'] . " " ?>OFF</span></h5>
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
                                    <span class="price" style="color: white;font-size: 20px"><?php echo "&#36; " . number_format($row['price'], 2) . ""; ?></span>&nbsp;
                                    <small style="font-size: 14px;color: white"><s><?php echo "&#36; " . number_format($row['old_price'], 2) . ""; ?></s></small>
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

                <?php echo "
    </div>
  </div>
  ";
                  if ($inc == 6) echo "</div>";
                }
                if ($inc == 6) echo "<div class='col-sm-3'></div><div class='col-sm-3'></div></div>";
                if ($inc == 6) echo "<div class='col-sm-3'></div></div>";
              } catch (PDOException $e) {
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


    <?php include 'includes/footer.php'; ?>
  </div>

  <?php include 'includes/scripts.php'; ?>
</body>

</html>
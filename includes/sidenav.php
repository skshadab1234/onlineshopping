<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .sidenav {
      height: 100%;
      width: 160px;
      position: fixed;
      z-index: 1;
      top: 70px;
      left: 0;
      background-color: #fff;
      overflow-x: hidden;
      padding-top: 20px;
    }

    #category div img {
      width: 40px;
      height: 40px;
      transition: 0.5s ease-in-out;
      margin-top: 20px;
    }

    #category div:hover>img {
      width: 100px;
      height: 100px;
    }

    #category div h5 {
      color: #010101;
      font-size: 14px;
    }

    #category div:hover>h5 {
      font-weight: 700
    }
  </style>
</head>

<body>
  <div class="sidenav">
    <?php
    $conn = $pdo->open();
    try {

      if ($_GET['category']) {
        $stmt = $conn->prepare("SELECT * FROM subcategory where type= :type");
        $stmt->execute(['type' => $_GET['category']]);
        foreach ($stmt as $row) {
          $image = (!empty($row['photo'])) ? 'images/subcategory/' . $row['photo'] : 'images/noimage.jpg';
          echo '
            <a href="subcategory.php?subcategory=' . $row['sub_catslug'] . '"><div class="container-fluid text-center" id="category">
          <div>
          <img src=' . $image . '  class="img-circle" width="40px" height="40px">
            <h5>' . $row['name'] . '</h5>
          </div>
            </a>
            </div>
            ';
        }
      } elseif ($_GET['subcategory']) {
        $stmt2 = $conn->prepare("SELECT * FROM subcategory where type= :type");
        $stmt2->execute(['type' => $_GET['subcategory']]);
        foreach ($stmt2 as $row2) {
          $image1 = (!empty($row2['photo'])) ? 'images/subcategory/' . $row2['photo'] : '../images/noimage.jpg';
          echo '
            <a href="store.php?store=' . $row2['sub_catslug'] . '"><div class="container-fluid text-center" id="category">
          <div>
          <img src=' . $image1 . '  class="img-circle" width="40px" height="40px">
            <h5>' . $row2['name'] . '</h5>
          </div>
            </a>
            </div>
            ';
        }
      } elseif ($_GET['store']) {
        echo '
          <div  onclick="history.back(-1)" style="cursor:pointer;padding:10px" id="category">
          <i class="fa fa-angle-left" style="font-weight:700"></i>  <span style="font-weight:700;position: relative;top: -3px;left: 10px;"> ' . $_GET['store'] . '</span>
            </div>
            ';
      } else {
        $stmt3 = $conn->prepare("SELECT * FROM category ");
        $stmt3->execute();
        foreach ($stmt3 as $row3) {
          $image = (!empty($row3['photo'])) ? 'images/category/' . $row3['photo'] : '../images/noimage.jpg';
          echo '
            <a href="category.php?category=' . $row3['cat_slug'] . '"><div class="container-fluid text-center" id="category">
          <div>
          <img src=' . $image . '  class="img-circle" width="40px" height="40px">
            <h5>' . $row3['name'] . '</h5>
          </div>
            </a>
            </div>
            ';
        }
      }
    } catch (PDOException $e) {
      echo "There is some problem in connection: " . $e->getMessage();
    }

    $pdo->close();
    ?>
  </div>

</body>

</html>
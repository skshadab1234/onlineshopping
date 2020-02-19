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
    <div class="content-wrapper" style="background:#fff">
      <div class="container-fluid">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-sm-12" style="padding:0px">
              <div class="container-fluid">
                <img src="images/banner/priceinclusive.webp" alt="">
                <?php

                ?>
              </div>
            </div>
          </div>
        </section>
      </div>

      <div id="mobilefilter">
        <a href="" data-toggle="modal" data-target="#filter"><i class="fa fa-filter"></i> Filter</a>
        <a href="" data-toggle="modal" data-target="#filter" id="sort"><i class="fa fa-sort"></i> Sort</a>
      </div>
    </div>
    <div style="margin-left: 160px">
      <?php include 'includes/footer.php'; ?>
    </div>
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
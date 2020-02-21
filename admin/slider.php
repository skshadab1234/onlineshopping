    <?php
    include 'includes/session.php';
    include 'includes/format.php';

    ?>


    <?php include 'includes/header.php'; ?>

    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

          <!-- Content Header (Page header) -->
          <section class="content-header" style="color: white">
            <h1>
              Slider
            </h1>
            <ol class="breadcrumb">
              <li><a href="#" style="color: white"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active" style="color: white">Manage Slider</li>
            </ol>
          </section>
          <!-- End Content Header (Page header) -->


          <section class="content" style="color: white;letter-spacing: 2px">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <?php
                $i = 0;
                foreach ($result as $row) {
                  $actives = '';
                  if ($i == 0) {
                    $actives = 'active';
                  }
                ?>
                  <li data-target="#myCarousel" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
                <?php $i++;
                } ?>

              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <?php
                $i = 0;
                foreach ($result as $row) {
                  $actives = '';
                  if ($i == 0) {
                    $actives = 'active';
                  }
                ?>
                  <div class="item <?= $actives; ?>">
                    <img src="<?php echo $row['image'] ?> " class="img-responsive" alt="sk">
                  </div>

                <?php $i++;
                } ?>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>


            <form method="POST" enctype="multipart/form-data">
              <label for="image" class="col-sm-1 control-label">Image</label>

              <div class="col-sm-5">
                <input type="file" name="photo"><br>
                <input type="submit" name="submit" class="btn btn-success">

              </div>
            </form>
          </section>


        </div><!-- content header end -->
      </div><!-- content wrapper end -->
      <?php include 'includes/scripts.php' ?>
    </body>
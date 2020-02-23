<?php
include 'includes/session.php';
include 'includes/format.php';
?>
<?php
$today = date('Y-m-d');
$year = date('Y');
if (isset($_GET['year'])) {
  $year = $_GET['year'];
}

$conn = $pdo->open();
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
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php" style="color: white"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active" style="color: white">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>
        <!-- /.row -->
        <div class="row">
          <div class="col-xs-12 col-md-6 col-lg-6">
          </div>
        </div>
      </section>
      <!-- right col -->
    </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php' ?>

  </div>
  <!-- ./wrapper -->

</body>

</html>
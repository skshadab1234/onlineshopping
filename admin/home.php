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

<head>
  <style>
    .box1 {
      padding: 1px 10px;
      background: #fff;
      border-radius: 5px;
      box-shadow: 3px 3px 10px 5px #f1f1f1;
      margin: 20px 10px;
    }

    .box1 h3 {
      font-size: 35px;
      font-weight: 700
    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
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
        <!-- Small cardes (Stat card) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="box1">
              <?php
              $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id");
              $stmt->execute();
              $total = 0;
              $old_p = 0;
              $discount = 0;
              $disc_t = 0;
              $grand_t = 0;
              foreach ($stmt as $srow) {
                $subtotal = $srow['price'] * $srow['quantity'];
                $total += $subtotal;
                $discount += $old_p;
                $disc_t = $discount - $total;
                $order_t = $discount - $disc_t;
                $o_t = $order_t - $disc_t;
                $delivery = 50;
                $grand_t = $o_t + $delivery;
              }

              echo "<h3>₹ " . number_format_short($grand_t, 2) . "</h3>";
              ?>
              <p>Total Sales</p>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="box1">
              <?php
              $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products");
              $stmt->execute();
              $prow =  $stmt->fetch();

              echo "<h3>" . $prow['numrows'] . "</h3>";
              ?>

              <p>Number of Products</p>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="box1">
              <?php
              $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users where type =:type");
              $stmt->execute(['type' => 0]);
              $urow =  $stmt->fetch();

              echo "<h3>" . $urow['numrows'] . "</h3>";
              ?>

              <p>Number of Users</p>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="box1">
              <?php
              $stmt = $conn->prepare("SELECT COUNT(*) As numrows FROM users where type=:type");
              $stmt->execute(['type' => 2]);
              $drow = $stmt->fetch();
              echo "<h3><b>" . $drow['numrows'] . "<b></h3>";

              ?>

              <p>Number Of DeliveryBoy</p>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="box">
              <div class="box-header bg-aqua" style="border-radius: 5px;height: 70px;">
                <h3 class="box-title" style="color: white;font-weight: 700;text-transform: uppercase;">Monthly Sales Report</h3>
                <div class="box-tools pull-right">
                  <form class="form-inline">
                    <div class="form-group">
                      <label style="color: white">Select Year: </label>
                      <select class="form-control input-sm" style="background: transparent;color: white" id="select_year">
                        <?php
                        for ($i = 2015; $i <= 2025; $i++) {
                          $selected = ($i == $year) ? 'selected' : '';
                          echo "
                            <option  style=\"background: white;color:black\" value='" . $i . "' " . $selected . ">" . $i . "</option>
                          ";
                        }
                        ?>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
              <div class="box-body">
                <div class="chart">
                  <br>
                  <div id="legend" class="text-center" style="font-weight: 700;color: grey;letter-spacing: 2px"></div>
                  <canvas id="barChart" style="height:200px"></canvas>
                </div>
              </div>
            </div>
          </div>


          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="box" style="border: none;border-radius: 5px;background: white">
              <div class="box-header bg-yellow" style="border-radius: 5px;color: white">
                <h3 class="box-title" style="font-weight: 700;text-transform: uppercase;">Chat With us</h3>
                <div class="box-tools pull-right">

                </div>
              </div>
              <div class="box-body" style="height: 300px">

              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- right col -->
    </div>
    <?php include 'includes/footer.php'; ?>

  </div>
  <!-- ./wrapper -->

  <!-- Chart Data -->
  <?php
  $months = array();
  $sales = array();
  for ($m = 1; $m <= 12; $m++) {
    try {
      $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date)=:month AND YEAR(sales_date)=:year");
      $stmt->execute(['month' => $m, 'year' => $year]);
      $delivery1 = 0;
      $total = 0;
      foreach ($stmt as $srow) {
        $subtotal = $srow['price'] * $srow['quantity'];
        $total += $subtotal;
        $order = $total * ($srow['old_price'] - $srow['price']) /  100;
        $order1 = $total - $order;
        $delivery = 15.00;
        $delivery1 = $order1 + $delivery;
      }
      array_push($sales, round($delivery1, 3));
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

    $num = str_pad($m, 2, 0, STR_PAD_LEFT);
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $sales = json_encode($sales);

  ?>
  <!-- End Chart Data -->

  <?php $pdo->close(); ?>
  <?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChart = new Chart(barChartCanvas)
      var barChartData = {
        labels: <?php echo $months; ?>,
        datasets: [{
          label: 'SALES',
          fillColor: 'rgba(60,141,188,0.9)',
          strokeColor: 'rgba(60,141,188,0.8)',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: <?php echo $sales; ?>
        }]
      }
      // barChartData.datasets[1].fillColor = '#00a65a',
      //   barChartData.datasets[1].strokeColor = '#00a65a',
      //   barChartData.datasets[1].pointColor = '#00a65a'
      var barChartOptions = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: true,
        //String - Colour of the grid lines
        scaleGridLineColor: 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - If there is a stroke on each bar
        barShowStroke: true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth: 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing: 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing: 1,
        //String - A legend template
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        responsive: true,
        maintainAspectRatio: true
      }

      barChartOptions.datasetFill = false
      var myChart = barChart.Bar(barChartData, barChartOptions)
      document.getElementById('legend').innerdivHTML = myChart.generateLegend();
    });
  </script>
  <script>
    $(function() {
      $('#select_year').change(function() {
        window.location.href = 'home.php?year=' + $(this).val();
      });
    });
  </script>
</body>

</html>
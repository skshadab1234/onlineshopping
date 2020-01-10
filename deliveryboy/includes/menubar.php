<aside class="main-sidebar" style="background:#150d2d;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($deliveryboy['photo'])) ? '../images/'.$deliveryboy['photo'] : '../images/profile.jpg'; ?>" class="img-rounded" width="50px" alt="User Image">
      </div>
      <div class="pull-left info" style="line-height:30px">
        <p><?php echo $deliveryboy['firstname'].' '.$deliveryboy['lastname']; ?></p>
      </div>
    </div>

    <?php 
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT COUNT(*)
    FROM ecomm.ordertrackhistory
    WHERE status = 'pending';");
    $stmt->execute();

    
    ?>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header" style="background: #1a1336;color: white">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="header" style="background: #1a1336;color: white">Orders Status</li>
      <li><a href="orders_pending.php"><i class="fa fa-list"></i> <span>Orders Pending <span class="w3-badge w3-grey pull-right">1</span></span></a></li>
      <li><a href="orders_delivered.php"><i class="fa fa-truck"></i> <span>Orders Delivered <span class="w3-badge w3-blue pull-right">1</span></span></a></li>
      <li><a href="#"><i class="fa fa-list-alt"></i> <span>Today Orders <span class="w3-badge w3-green pull-right">1</span></span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<aside class="main-sidebar" style="background:#eee;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel" style="background: #6201ed">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/' . $admin['photo'] : '../images/profile.jpg'; ?>" class="img-thumbnail" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'] . ' ' . $admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-info"></i> Full Stack Developer</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>
      <li class="header">Manage Delivery Boy</li>
      <li><a href="deliveryboy.php"><i class="fa fa-users"></i> <span>Delivery Boy</span></a></li>
      <li class="header">MANAGE</li>
      <li><a href="slider.php"><i class="fa fa-users"></i> <span>Manage Slider</span></a></li>
      <li><a href="users.php"><i class="fa fa-users"></i> <span>Customers</span></a></li>
      <li><a href="warehouse.php"><i class="fa fa-home"></i> <span>Warehouse</span></a></li>
      <li><a href="category.php"><i class="fa fa-list-alt"></i> <span>Category </span></a></li>
      <li><a href="subcategory.php"><i class="fa fa-sticky-note-o"></i> <span>Sub Category</a></span></li>
      <li><a href="brands.php"><i class="fa fa-handshake-o"></i> <span>Brands</a></span></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="products.php"><i class="fa fa-circle-o"></i> Product List</a></li>

        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo" style="background:#fff;color:#010101;font-weight:700;text-transform:uppercase">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>D</b>M</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Dressmania</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" style="background:#fff;">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" style="color:#010101" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($admin['photo'])) ? '../images/' . $admin['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs" style="color: #010101"><?php echo $admin['firstname'] . ' ' . $admin['lastname']; ?></span>
          </a>
          <style type="text/css">
            .dropdown-menu li a:hover {
              background: none;
              color: grey;
            }
          </style>
          <ul class="dropdown-menu" id="dropdown-arrow" style="background: #2a2440;border: none;border-radius: 5px;box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2), 0px 8px 10px 1px rgba(0,0,0,0.14), 0px 3px 14px 2px rgba(0,0,0,0.12)
          ">
            <!-- User image -->
            <li style="padding: 10px 20px">
              <img src="<?php echo (!empty($admin['photo'])) ? '../images/' . $admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image" width="40px">
              <span style="color: white;margin-left: 20px">
                <?php echo $admin['firstname'] . ' ' . $admin['lastname']; ?><br>
              </span>
            </li>
            <hr style="padding: 0px;margin: 10px auto;width: 80%">
            <li style="padding: 10px"><a href="#profile" data-toggle="modal" style="color: white;text-transform: all;letter-spacing: 1px">Update</a></li>
            <hr style="padding: 0px;margin: 10px auto;width: 80%">
            <li style="padding: 10px"><a href="../logout.php" style="color: white;text-transform: all;letter-spacing: 1px">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>

<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Users
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Users</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <span id="success"></span>
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
        <div class="row">
          <div class="col-xs-12 col-lg-12">
            <div class="box table-responsive text-nowrap">
              <div class="box-header">
                <h4><i class="fa fa-check-circle" style="color: green;font-size:20px"></i><b> VERIFIED<b></h4>
              </div>
              <div class="box-body">
                <table class="table table-bordered">
                  <thead>
                    <th>Photo</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date Added</th>
                    <th>Tools</th>
                  </thead>
                  <tbody id="table">
                    
                      
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  <!--         <div class="col-xs-12 col-lg-6">
            <div class="box table-responsive text-nowrap">
              <div class="box-header">
                <h4><i class="fa fa-times-circle" style="color: red;font-size:20px"></i><b> NOT VERIFIED<b></h4>
              </div>
              <div class="box-body">
                <table id="example2" class="table table-bordered">
                  <thead>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date Added</th>
                  </thead>
                  <tbody>
                    <?php
                    $conn = $pdo->open();

                    try {
                      $stmt = $conn->prepare("SELECT * FROM users WHERE status=:status");
                      $stmt->execute(['status' => 0]);
                      foreach ($stmt as $row) {
                        $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg';
                        $status = ($row['status']) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">not verified</span>';
                        $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="' . $row['id'] . '"><i class="fa fa-check-square-o"></i></a></span>' : '';
                        echo "
                          <tr>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                            <td>
                              " . $status . "
                              " . $active . "
                            </td>
                            <td>" . date('M d, Y', strtotime($row['created_on'])) . "</td>
                          </tr>
                        ";
                      }
                    } catch (PDOException $e) {
                      echo $e->getMessage();
                    }

                    $pdo->close();
                    ?>
                  </tbody>
                </table>
                <div class="text-center" style="padding: 20px">
                  <a href="user_noactive_mail.php"><i class='fa fa-send'></i> SEND MAIL</a>
                </div>
              </div>
            </div>
          </div> -->
      </section>

    </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/users_modal.php'; ?>
  <?php include 'includes/scripts.php'; ?>

  </div>
  <!-- ./wrapper -->
  <a href=" #addnew" id="a-plus" data-toggle="modal"><i class="fa fa-plus"></i></a>
  <script>
    $(function() {

      $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.photo', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.status', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
      });

    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'users_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('.userid').val(response.id);
          $('#edit_email').val(response.email);
          $('#edit_password').val(response.password);
          $('#edit_firstname').val(response.firstname);
          $('#edit_lastname').val(response.lastname);
          $('#edit_address').val(response.address);
          $('#edit_contact').val(response.contact_info);
          $('.fullname').html(response.firstname + ' ' + response.lastname);
        }
      });
    }
  </script>
  <script>
   view_user();

    function view_user(){
  $.ajax({
    url: "View_user.php",
    type: "POST",
    dataType: 'json',
    success: function(data){
      $('#table').html(data.mylist); 
    }
  });
  }
</script>
<script>
  $('#butsave').on('click', function() {
    var email_shadab = $('#email_shadab').val();
    var password_shadab = $('#password_shadab').val();
    var firstname_shadab = $('#firstname_shadab').val();
    var lastname_shadab = $('#lastname_shadab').val();
    var address_shadab = $('#address_shadab').val();
    var contact_shadab = $('#contact_shadab').val();
    if(email_shadab!="" && password_shadab!="" && firstname_shadab!="" && lastname_shadab!=""){
      $.ajax({
        url: "users_add.php",
        type: "POST",
        data: {
          email_shadab: email_shadab,
          password_shadab: password_shadab,
          firstname_shadab: firstname_shadab,
          lastname_shadab: lastname_shadab,
          address_shadab: address_shadab,
          contact_shadab: contact_shadab        
        },
        cache: false,
        success: function(dataResult){
            view_user();          
        }
      });
    }
    else{
      alert('Please fill all the field !');
    }
  });
</script>

</body>

</html>
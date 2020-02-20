<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<head>
  <style>
    #plus {
      position: relative;
      left: 46%;
      font-size: 31px;
      background: -webkit-linear-gradient(hotpink, steelblue);
      -webkit-text-fill-color: transparent;
      -webkit-background-clip: text;
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
      <section class="content-header" style="color: white">
        <h1>
          Category
        </h1>
        <ol class="breadcrumb">
          <li><a href="#" style="color: white"><i class="fa fa-dashboard"></i> Home</a></li>
          <li style="color: white">Products</li>
          <li class="active" style="color: white">Category</li>
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <div class="panel">
                <div class="panel panel-header" style="padding:10px">
                  <h4>Top Banner</h4>
                </div>
                <a href="#addbanner" data-toggle="modal">
                  <div class="panel panel-body">
                    <i class="fa fa-plus" id="plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="panel">
                <div class="panel panel-header">
                  <h4>Banner</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="box" style="background: #fff;color:#000">
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>Image</th>
                    <th>URL</th>
                    <th>Category</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $conn = $pdo->open();
                    try {
                      $stmt = $conn->prepare("SELECT * FROM category_banner");
                      $stmt->execute();
                      foreach ($stmt as $row) {
                        $image = (!empty($row['photo']) ? '../images/cat_banner/' . $row['photo'] . '' : '../images/noimage.jpg');
                        echo "
                          <tr>
                          <td><img src=" . $image . " class='img-circle' width='40px' height='40px'>
                          <span class='pull-right'><a href='#edit_photo1' class='photo1' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit' style='color:#000'></i></a></span>
                          </td>
                            <td>" . $row['url'] . "</td>
                            <td>" . $row['type'] . "</td>
                            <td>
                              <button class='btn btn-success btn-sm edit1 btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete1 btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
                            </td>
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
              </div>
            </div>

            <div class="box">
              <div class="box-body">
                <table id="example4" class="table table-bordered">
                  <thead>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $conn = $pdo->open();
                    try {
                      $stmt = $conn->prepare("SELECT * FROM category");
                      $stmt->execute();
                      foreach ($stmt as $row) {
                        $image = (!empty($row['photo']) ? '../images/category/' . $row['photo'] . '' : '../images/noimage.jpg');
                        echo "
                          <tr>
                          <td><img src=" . $image . " class='img-circle' width='40px' height='40px'>
                          <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit' style='color:white'></i></a></span>
                          </td>
                            <td>" . $row['name'] . "</td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
                            </td>
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
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/category_modal.php'; ?>
    <?php include 'includes/category_banner_modal.php'; ?>


  </div>
  <a href="#addnew" id="a-plus" data-toggle="modal"><i class="fa fa-plus"></i></a>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>
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

    });

    $(function() {
      $(document).on('click', '.edit1', function(e) {
        e.preventDefault();
        $('#edit1').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.delete1', function(e) {
        e.preventDefault();
        $('#delete1').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.photo1', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
      });

    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'category_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('.catid').val(response.id);
          $('#edit_name').val(response.name);
          $('.catname').html(response.name);
        }
      });

      $.ajax({
        type: 'POST',
        url: 'category_banner_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('.catidbanner').val(response.id);
          $('.bannername').html(response.url);

        }
      });
    }

    $.ajax({
      type: 'POST',
      url: 'category_fetch.php',
      dataType: 'json',
      success: function(response) {
        $('#category1').append(response);
        $('#edit_category').append(response);
      }
    });


    $.ajax({
      type: 'POST',
      url: 'category_banner_fetch.php',
      dataType: 'json',
      success: function(response) {
        $('#category2').append(response);
        $('#edit_category2').append(response);
      }
    });
  </script>
</body>

</html>
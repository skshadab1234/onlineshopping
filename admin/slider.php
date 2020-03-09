<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mange Sliders</title>
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
          Manage Sliders
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Landing</li>
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
        <div class="container" style="padding: 10px" id="modal-adding">
          <a href="#addnew" data-toggle="modal"><button class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus"></i> <span>On Landing Page</span></button></a>
          <a href="#addcat_slider" data-toggle="modal"> <button class="btn btn-success btn-sm btn-flat "><i class="fa fa-plus"></i> <span>Category Slider</span></button></a>
        </div>

        <div class="row">
          <div class="col-xs-12 col-lg-6">
            <div class="box table-responsive text-nowrap">
              <div class="box-header">
                <h4><b>Landing Page</b></h4>
              </div>
              <div class="box-body">
                <table id="example3" class="table table-bordered">
                  <thead>
                    <th>Image</th>
                    <th>Slider Name</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $conn = $pdo->open();
                    try {
                      $stmt = $conn->prepare("SELECT *, slider.id As slidid FROM slider LEFT JOIN category  On category.id = slider.slider_name LEFT JOIN subcategory on subcategory.id = slider.slider_name where slider_type = 0");
                      $stmt->execute();
                      foreach ($stmt as $row) {
                        $image = (!empty($row['slider_photo']) ? '../images/sliders/' . $row['slider_photo'] . '' : '../images/noimage.jpg');
                        echo "
                          <tr>
                          <td><img src=" . $image . " class='img-circle' width='40px' height='40px'>
                          <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='" . $row['slidid'] . "'><i class='fa fa-edit' ></i></a></span>
                          </td>
                            <td>" . $row['cat_slug'] . " " . $row['sub_catslug'] . "</td>
                            <td>
                              <button class='btn btn-success btn-sm edit' data-id='" . $row['slidid'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete' data-id='" . $row['slidid'] . "'><i class='fa fa-trash'></i> Delete</button>
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


          <div class="col-xs-12 col-lg-6">
            <div class="box table-responsive text-nowrap" style="background: #fff;color:#000">
              <div class="box-header">
                <h4><b>Desktop Category Slider</b></h4>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>Image</th>
                    <th>Slider Name</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $conn = $pdo->open();
                    try {
                      $stmt = $conn->prepare("SELECT *, slider.id as slidid From slider LEFT JOIN category on category.id = slider.slider_name  LEFT JOIN subcategory on subcategory.id = slider.slider_name where slider_type = 1");
                      $stmt->execute();
                      foreach ($stmt as $row) { 
                        $image = (!empty($row['slider_photo']) ? '../images/sliders/' . $row['slider_photo'] . '' : '../images/noimage.jpg');
                        echo "
                          <tr>
                          <td><img src=" . $image . " class='img-circle' width='40px' height='40px'>
                          <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='" . $row['slidid'] . "'><i class='fa fa-edit' style='color:#000'></i></a></span>
                          </td>
                            <td>" . $row['cat_slug'] . " " . $row['sub_catslug'] . "</td>
                            <td>
                              <button class='btn btn-success editcat' data-id='" . $row['slidid'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete' data-id='" . $row['slidid'] . "'><i class='fa fa-trash'></i> Delete</button>
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
    <?php include 'includes/landing_modal.php'; ?>
    <?php include 'includes/category_slider_modal.php'; ?>

  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {
      // CRUD OPERATION ON CATEGORY START
      $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.editcat', function(e) {
        e.preventDefault();
        $('#editcat').modal('show');
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

      function getRow(id) {
        $.ajax({
          type: 'POST',
          url: 'slider_row.php',
          data: {
            id: id
          },
          dataType: 'json',
          success: function(response) {
            $('.slide_id').val(response.id);
            $('.slide_name').html(response.slider_name);
            $('#slide_name').val(response.slider_name);
            getCategory();
          }
        });
      }

    
      function getCategory() {
      $.ajax({
        type: 'POST',   
        url: 'slider_fetch.php',
        dataType: 'json',
        success: function(response) {
          $('#category').append(response);
          $('#edit_category').append(response);
        }
      });
    }
    });
    

  </script>
</body>

</html>
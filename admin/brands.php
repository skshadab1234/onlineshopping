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
          Brands
        </h1>
        <ol class="breadcrumb">
          <li><a href="#" style="color: white"><i class="fa fa-dashboard"></i> Home</a></li>
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
          <div class="box">
            <div class="box-body">
              <table id="example3" class="table table-bordered">
                <thead>
                  <th>Image</th>
                  <th>Brand Name</th>
                  <th>Category</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                  $conn = $pdo->open();
                  try {
                    $stmt = $conn->prepare("SELECT * FROM brands");
                    $stmt->execute();
                    foreach ($stmt as $row) {
                      $image = (!empty($row['brand_image']) ? '../images/brand/' . $row['brand_image'] . '' : '../images/noimage.jpg');
                      echo "
                          <tr>
                          <td><img src=" . $image . " class='img-circle' width='40px' height='40px'>
                          <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit' ></i></a></span>
                          </td>
                            <td>" . $row['brand_name'] . "</td>
                            <td>" . $row['category'] . "</td>
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
      </section>
    </div>
    <?php include 'includes/footer.php'; ?>


  </div>
  <a href="#addbrand" id="a-plus" data-toggle="modal"><i class="fa fa-plus"></i></a>
  <?php include 'includes/scripts.php'; ?>
  <?php include 'includes/brand_modal.php' ?>

  <script>
    $(function() {
      $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        $('#editbrand').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        $('#deletebrand').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.photo', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
      });

    });



    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'brand_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('.brandid').val(response.id);
          $('#edit_brand').val(response.brand_name);
          $('#edit_brand1').val(response.brand_name);
          $('.brandname').html(response.brand_name);
        }
      });

    }

    $.ajax({
      type: 'POST',
      url: 'category_fetch.php',
      dataType: 'json',
      success: function(response) {
        $('#category').append(response);
        $('#edit_category').append(response);
      }
    });
  </script>

</body>

</html>
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
      <section class="content-header">
        <h1>
          Category
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Category</li>
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
          <a href="#addnew" data-toggle="modal"><button class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus"></i> <span>Add New Category</span></button></a>
          <a href="#addbanner" data-toggle="modal"> <button class="btn btn-success btn-sm btn-flat "><i class="fa fa-plus"></i> <span> Add Banner</span></button></a>
          <a href="#addoffer" data-toggle="modal"><button class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus"></i> <span> Add Offer</span></button></a>
        </div>

        <div class="row">
          <div class="col-xs-12 col-lg-6">
            <div class="box table-responsive text-nowrap">
              <div class="box-header">
                <h4><b>Category</b></h4>
              </div>
              <div class="box-body">
                <table id="example3" class="table table-bordered">
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
                          <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit' ></i></a></span>
                          </td>
                            <td>" . $row['name'] . "</td>
                            <td>
                              <button class='btn btn-success btn-sm edit' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete' data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
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
                <h4><b>Banner</b></h4>
              </div>
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
                      $stmt = $conn->prepare("SELECT *, category_banner.id AS banid FROM category_banner LEFT JOIN category ON category.id = category_banner.banner_type ");
                      $stmt->execute();
                      foreach ($stmt as $row) {
                        $image = (!empty($row['banner_photo']) ? '../images/cat_banner/' . $row['banner_photo'] . '' : '../images/noimage.jpg');
                        echo "
                          <tr>
                          <td><img src=" . $image . " class='img-circle' width='40px' height='40px'>
                          <span class='pull-right'><a href='#edit_photo1' class='photo1' data-toggle='modal' data-id='" . $row['banid'] . "'><i class='fa fa-edit' style='color:#000'></i></a></span>
                          </td>
                            <td>" . $row['url'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>
                              <button class='btn btn-success edit1' data-id='" . $row['banid'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete1' data-id='" . $row['banid'] . "'><i class='fa fa-trash'></i> Delete</button>
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
            <div class="box table-responsive text-nowrap">
            <div class="box-header">
                <h4><b>Offers</b></h4>
              </div>
              <div class="box-body">
                <table id="example2" class="table table-bordered">
                  <thead>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Url</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $conn = $pdo->open();
                    try {
                      $stmt = $conn->prepare("SELECT *,  category_offer.id AS offer_id FROM category_offer LEFT JOIN category ON category.id = category_offer.offer_type");
                      $stmt->execute();
                      foreach ($stmt as $row) {
                        $image = (!empty($row['offer_photo']) ? '../images/category_offer/' . $row['offer_photo'] . '' : '../images/noimage.jpg');
                        echo "
                          <tr>
                          <td><a href='../images/category_offer/" . $row['offer_photo'] . "'><img src=" . $image . " class='img-circle' width='40px' height='40px'></a>
                          <span class='pull-right'><a href='#edit_photo2' class='photo2' data-toggle='modal' data-id='" . $row['offer_id'] . "'><i class='fa fa-edit' ></i></a></span>
                          </td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['offer_url'] . "</td>
                            <td>
                              <button class='btn btn-success btn-sm edit2' data-id='" . $row['offer_id'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete2' data-id='" . $row['offer_id'] . "'><i class='fa fa-trash'></i> Delete</button>
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
  </div>
  <!-- ./wrapper -->
  <?php include 'includes/category_offer_modal.php'; ?>
    <?php include 'includes/category_modal.php'; ?>
    <?php include 'includes/category_banner_modal.php'; ?>

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
      // CRUD OPERATION ON CATEGORY END

      // CRUD OPERATION ON CATEGORY BANNER START
      $(document).on('click', '.edit1', function(e) {
        e.preventDefault();
        $('#edit1').modal('show');
        var id = $(this).data('id');
        getBanner(id);
      });

      $(document).on('click', '.delete1', function(e) {
        e.preventDefault();
        $('#delete1').modal('show');
        var id = $(this).data('id');
        getBanner(id);
      });

      $(document).on('click', '.photo1', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        getBanner(id);
      });
      // CRUD OPERATION ON CATEGORY BANNER END

      // CRUD OPERATION ON CATEGORY OFFER START

      $(document).on('click', '.edit2', function(e) {
        e.preventDefault();
        $('#edit2').modal('show');
        var id = $(this).data('id');
        getOFFER(id);
      });

      $(document).on('click', '.delete2', function(e) {
        e.preventDefault();
        $('#delete2').modal('show');
        var id = $(this).data('id');
        getOFFER(id);
      });

      $(document).on('click', '.photo2', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        getOFFER(id);
      });
      // CRUD OPERATION ON CATEGORY BANNER END

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

    }

    function getBanner(id) {
      $.ajax({
        type: 'POST',
        url: 'category_banner_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('.catidbanner').val(response.banid);
          $('.bannername').html(response.url);
          $('#edit_banner_name').val(response.url);
        }
      });
    }

    function getOFFER(id) {
      $.ajax({
        type: 'POST',
        url: 'category_offer_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('.offerid').val(response.offer_id);
          $('#url').val(response.offer_url);
          $('.offername').val(response.offer_type).html(response.catname);
          $('#offerselected').val(response.offer_type).html(response.catname);
          getCategory()
        }
      });
    }

    function getCategory() {
      $.ajax({
        type: 'POST',
        url: 'category_fetch.php',
        dataType: 'json',
        success: function(response) {
          $('#category1').append(response);
          $('#category3').append(response);
          $('#edit_category').append(response);
        }
      });
    }

    $.ajax({
      type: 'POST',
      url: 'category_banner_fetch.php',
      dataType: 'json',
      success: function(response) {
        $('#category5').append(response);
        $('#edit_category2').append(response);
      }
    });


    $.ajax({
      type: 'POST',
      url: 'category_offer_fetch.php',
      dataType: 'json',
      success: function(response) {
        $('#category3').append(response);
        $('#edit_category3').append(response);
      }
    });
  </script>
</body>

</html>
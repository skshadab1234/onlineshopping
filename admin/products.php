<?php include 'includes/session.php'; ?>
<?php
$where = '';
if (isset($_GET['subcategory'])) {
  $catid = $_GET['subcategory'];
  $where = 'WHERE subcategory_id =' . $catid;
}

?>
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
          Product List
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Products</li>
          <li class="active">Product List</li>
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
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <a href="#delete_all" data-toggle="modal">Delete ALL</a>
                <div class="pull-right">
                  <form class="form-inline">
                    <div class="form-group" style="color: white">
                      <label>Category: </label>
                      <select class="form-control input-sm select2" id="select_category">
                        <option value="0">ALL</option>
                        <?php
                        $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM subcategory");
                        $stmt->execute();

                        foreach ($stmt as $crow) {
                          $selected = ($crow['id'] == $catid) ? 'selected' : '';
                          echo "
                            <option value='" . $crow['id'] . "' " . $selected . ">" . $crow['name'] . "</option>
                          ";
                        }

                        $pdo->close();
                        ?>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
              <div class="box-body table-responsive text-nowrap">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>Name and Product id</th>
                    <th>Photo </th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Old Price</th>
                    <th>Discount</th>
                    <th>Color</th>
                    <th>Style</th>
                    <th>Brand</th>
                    <th>Size</th>
                    <th>Views Today</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $conn = $pdo->open();

                    try {
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT *, products.id As prodid, products.name As prodname FROM products left join brands on brands.id = products.brand_id left join subcategory on subcategory.id = products.subcategory_id $where");
                      $stmt->execute();
                      foreach ($stmt as $row) {
                        $image = (!empty($row['photo'])) ? '../images/allproduct/' . $row['photo'] : '../images/noimage.jpg';
                        $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                        echo "
                          <tr>
                            <td style=\"white-space: nowrap; overflow: hidden;text-overflow: ellipsis;width:30px \">" . $row['prodname'] . " - " . $row['prodid'] . "</td>
                            <td>
                             <a href=../images/allproduct/" . $row['photo'] . "> <img src='" . $image . "' height='30px' class='img-circle' width='30px'></a>
                              <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='" . $row['prodid'] . "'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td><a href='#description' data-toggle='modal' class='desc' style=\"line-height:40px\" data-id='" . $row['prodid'] . "'> View</a></td>
                            <td>₹  " . number_format($row['price'], 2) . "</td>
                            <td><s>₹  " . number_format($row['old_price'], 2) . "</s></td>
                            <td>" . $row['discount'] . "</td>  
                            <td>" . $row['color'] . "</td>
                            <td>" . $row['sub_catslug'] . "</td>
                            <td>" . $row['brand_name'] . "</td>
                            <td>" . $row['size'] . "</td>
                            <td>" . $counter . "</td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['prodid'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['prodid'] . "'><i class='fa fa-trash'></i> Delete</button>
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
    <?php include 'includes/products_modal.php'; ?>
    <?php include 'includes/products_modal2.php'; ?>

  </div>
  <!-- ./wrapper -->
  <span id="a-plus"><a href="#addnew" data-toggle="modal" id="addproduct"><i class="fa fa-plus"></i></a></span>

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

      $(document).on('click', '.desc', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
      });

      $('#select_category').change(function() {
        var val = $(this).val();
        if (val == 0) {
          window.location = 'products.php';
        } else {
          window.location = 'products.php?subcategory=' + val;
        }
      });

      $('#addproduct').click(function(e) {
        e.preventDefault();
        getCategory();
      });

      $("#addnew").on("hidden.bs.modal", function() {
        $('.append_items').remove();
      });

      $("#edit").on("hidden.bs.modal", function() {
        $('.append_items').remove();
      });

    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'products_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('#desc').html(response.description);
          $('.name').html(response.prodname);
          $('.prodid').val(response.prodid);
          $('#edit_name').val(response.prodname);
          $('#catselected').val(response.subcategory_id).html(response.catname);
          $('#brandselected').val(response.brand_id).html(response.brandname);
          $('#edit_price').val(response.price);
          $('#old_price').val(response.old_price);
          $('#edit_discount').val(response.proddiscount);
          $('#edit_color').val(response.prodcolor);
          $('#edit_size').val(response.size);
          $('#edit_brand').val(response.prodbrand);
          CKEDITOR.instances["editor2"].setData(response.description);
          getCategory();
        }
      });
    }

    function getCategory() {
      $.ajax({
        type: 'POST',
        url: 'category_fetch.php',
        dataType: 'json',
        success: function(response) {
          $('#category').append(response);
          $('#edit_category').append(response);
        }
      });

      $.ajax({
        type: 'POST',
        url: 'subcategory_fetch.php',
        dataType: 'json',
        success: function(response) {
          $('#subcategory').append(response);
          $('#edit_subcategory').append(response);
        }
      });

      $.ajax({
        type: 'POST',
        url: 'brand_fetch.php',
        dataType: 'json',
        success: function(response) {
          $('#brand').append(response);
          $('#edit_brand').append(response);
        }
      });
    }
  </script>
</body>

</html>
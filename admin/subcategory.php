<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header" style="color: white">
                <h1>
                    Sub Category
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#" style="color: white"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li style="color: white">Products</li>
                    <li class="active" style="color: white">Sub Category</li>
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
                        <div class="box  table-responsive text-nowrap">
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>Image</th>
                                        <th>Sub Category Name</th>
                                        <th>Type</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = $pdo->open();

                                        try {
                                            $stmt = $conn->prepare("SELECT * FROM subcategory");
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                                $image = (!empty($row['photo'])) ? '../images/subcategory/' . $row['photo'] : '../images/noimage.jpg';
                                                echo "
                          <tr>
                          <td><img src='" . $image . "' class='img-circle' width='40px' height='40px'>
                          <span class='pull-right'><a href='#edit_photosub' class='photo' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit' style='color:white'></i></a></span>
                          </td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['type'] . "</td>
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
        <?php include 'includes/subcategory_modal.php'; ?>

    </div>
    <!-- ./wrapper -->
    <a href="#addnew" id="a-plus" data-toggle="modal"><i class="fa fa-plus"></i></a>

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

        function getRow(id) {
            $.ajax({
                type: 'POST',
                url: 'subcategory_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.subcatid').val(response.id);
                    $('#edit_subname').val(response.name);
                    $('.subcatname').html(response.name);
                    $('#edit_subtype').val(response.type);
                }
            });
        }
    </script>
</body>

</html>
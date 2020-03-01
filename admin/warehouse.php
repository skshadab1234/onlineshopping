<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php

$conn = $pdo->open();

try {
    $stmt = $conn->prepare("SELECT * FROM category where id = 2");
    $stmt->execute();
    $cat = $stmt->fetch();
    $catid = $cat['id'];
} catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    List of Warehouse
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Warehouse</li>
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
                        <div class="box table-responsive text-nowrap">
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>Warehouse Name</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Pincode</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = $pdo->open();

                                        try {
                                            $stmt = $conn->prepare("SELECT * FROM warehouse");
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                                echo "
<tr>
<td>" . $row['warehouse_name'] . "</td>
<td>" . $row['city'] . "</td>
<td>" . $row['state'] . "</td>
<td>" . $row['pincode'] . "</td>
<td>
<button class='btn btn-success btn-sm edit btn-flat'  id='quickview' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat'  data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
</td>

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
        <?php include 'includes/warehouse_modal.php'; ?>

    </div>
    <!-- ./wrapper -->
    <a href="#adddelivery" data-toggle="modal" id="a-plus" data-id="<?php echo $row['id']; ?>"><i class="fa fa-plus"></i> </a>

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

        });

        function getRow(id) {
            $.ajax({
                type: 'POST',
                url: 'warehouse_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.warehouseid').val(response.id);
                    $('#edit_name').val(response.warehouse_name);
                    $('#edit_city').val(response.city);
                    $('#edit_state').val(response.state);
                    $('#edit_pincode').val(response.pincode);
                    $('.warehousename').html(response.warehouse_name);

                }
            });
        }
    </script>
</body>

</html>
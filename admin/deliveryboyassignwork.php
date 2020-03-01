<?php include 'includes/session.php'; ?>
<?php
if (!isset($_GET['user'])) {
    header('location: deliveryboy.php');
    exit();
} else {
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id' => $_GET['user']]);
    $user = $stmt->fetch();

    $pdo->close();
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
                    <?php echo $user['firstname'] . ' ' . $user['lastname'] . ' (Delivery Boy)' ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>DeliveryBoy</li>
                    <li class="active">Assign Delivery</li>
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
                            <div class="box-header">
                                <a href="#adddelivery" data-toggle="modal" class="delete" id="add" data-id="<?php echo $user['id']; ?>"><button class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus"></i> New</button></a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>Delivery Boy</th>
                                        <th>Product Details</th>
                                        <th>Source Address</th>
                                        <th>Destinaton Address</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = $pdo->open();

                                        try {

                                            $stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id where user_id=:id");
                                            $stmt->execute(['id' => $user['id']]);
                                            foreach ($stmt as $row2) {
                                                $stmt = $conn->prepare("SELECT *, assigndelivery.product_name AS productid FROM assigndelivery LEFT JOIN products ON products.id = assigndelivery.product_name LEFT JOIN warehouse ON warehouse.id = assigndelivery.pickup LEFT JOIN details ON details.id = assigndelivery.ship_address LEFT JOIN users ON users.id =assigndelivery.assign_to WHERE users.id =:assign_to");
                                                $stmt->execute(['assign_to' => $user['id']]);
                                                foreach ($stmt as $row) {
                                                    $status = ($row['status']  == 1) ? '<span class="label label-success">Processed</span>' : '<span class="label label-danger">Not yet Processed</span>';
                                                    echo "
<tr>
<td>" . $user['firstname'] . " " . $user['lastname'] . "</td>
<td>" . $row['name'] . " <br>
<button type='button' style='background:none;border:none;color:steelblue;outline:none' class='transact' data-id='" . $row['productid'] . "'>View Details</button>
</td>
<td>" . $row['warehouse_name'] . " </td>
<td><h5>Ship to : " . $row2['firstname'] . " " . $row2['lastname'] . ",</h5>
<h5>" . $row['deliver_shipaddress'] . "</h5>
<h5>" . $row['deliver_shipcity'] . "</h5>
<h5>" . $row['deliver_shipstate'] . "</h5> 
<h5>" . $row['deliver_shippincode'] . "</h5> 
</td>
<td>" . $status . "</td>
</tr>
";
                                                }
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
        <?php include 'includes/delivery_modal.php'; ?>
        <?php include '../includes/profile_modal.php'; ?>

    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php'; ?>
    <script>
        $(function() {
            $('#add').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                getProducts(id);
            });

            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                getProducts(id);
            });

            $("#addnew").on("hidden.bs.modal", function() {
                $('.append_items').remove();
            });
        });

        function getProducts(id) {
            $.ajax({
                type: 'POST',
                url: 'deliveryboy_all.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#users').append(response);
                }
            });

            $.ajax({
                type: 'POST',
                url: 'deliverorder_all.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.deliveryid').val(response.did);
                    $('#delivery1').append(response);
                }
            });
            $.ajax({
                type: 'POST',
                url: 'warehouse_all.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#warehouse').append(response);
                }
            });
            $.ajax({
                type: 'POST',
                url: 'shipaddress_all.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#shipaddress').append(response);
                }
            });
        }
    </script>
    <script>
        $(function() {
            $(document).on('click', '.transact', function(e) {
                e.preventDefault();
                $('#transaction').modal('show');
                var id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: 'trasaction_product_detail.php',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#date').html(response.date);
                        $('#transid').html(response.transaction);
                        $('#detail').prepend(response.list);
                        $('#total').html(response.total);
                    }
                });
            });

            $("#transaction").on("hidden.bs.modal", function() {
                $('.prepend_items').remove();
            });
        });
    </script>
</body>

</html>
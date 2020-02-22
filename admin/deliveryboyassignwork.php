<?php include 'includes/session.php'; ?>
<?php
if (!isset($_GET['user'])) {
    header('location: users.php');
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
            <section class="content-header" style="color: white">
                <h1>
                    <?php echo $user['firstname'] . ' ' . $user['lastname'] . ' (Delivery Boy)' ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#" style="color: white"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li style="color: white">DeliveryBoy</li>
                    <li class="active" style="color: white">Assign Delivery</li>
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
                                <a href="#adddelivery" data-toggle="modal" id="add" data-id="<?php echo $user['id']; ?>"><button class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus"></i> New</button></a>
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
                                            $stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
                                            $stmt->execute(['user_id' => $user['id']]);
                                            foreach ($stmt as $row) {
                                                echo "
<tr>
<td>" . $row['name'] . "</td>
<td>" . $row['quantity'] . "</td>
<td>
<button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['cartid'] . "'><i class='fa fa-edit'></i> Edit Quantity</button>
<button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['cartid'] . "'><i class='fa fa-trash'></i> Delete</button>
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
        <?php include 'includes/delivery_modal.php'; ?>

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

            $("#addnew").on("hidden.bs.modal", function() {
                $('.append_items').remove();
            });
        });

        function getProducts(id) {
            $.ajax({
                type: 'POST',
                url: 'deliverorder_all.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#delivery').append(response);
                }
            });
        }
    </script>
</body>

</html>
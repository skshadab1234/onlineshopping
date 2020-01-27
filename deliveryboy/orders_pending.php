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

                <ol class="breadcrumb">
                    <li><a href="#" style="color: white"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active" style="color: white">Orders Pending</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content" style="color:white">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box-header" style="border-radius: 5px;height: 70px;line-height:40px">
                            <h3 class="box-title" style="color: white;font-weight: 700;text-transform: uppercase;">Orders Pending</h3>
                        </div>

                        <div class="box-body table-responsive text-nowrap">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <th class="hidden"></th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Delivery Address</th>
                                    <th>Full Details</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $conn = $pdo->open();

                                    try {
                                        $stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id Where user_id=user_id");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id   WHERE details.sales_id=:id");
                                            $stmt->execute(['id' => $row['salesid']]);
                                            $total = 0;
                                            foreach ($stmt as $details) {
                                                $subtotal = $details['price'] * $details['quantity'];
                                                $total += $subtotal;
                                            }
                                            echo "
<tr>
<td class='hidden'></td>
<td>" . date('M d, Y', strtotime($row['sales_date'])) . "</td>
<td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
<td >Address: " . $row['address'] . " <br> State:  " . $row['state'] . " <br> City: " . $row['city'] . " <br> Pincode: " . $row['pincode'] . "</td>
<td><button type='button' class='btn btn-success btn-sm btn-flat orders_pending' data-id='" . $row['id'] . "'><i class='fa fa-search'></i> View</button></td>
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
        <?php include '../includes/profile_modal.php'; ?>

    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php'; ?>


    <script>
        $(function() {
            $(document).on('click', '.orders_pending', function(e) {
                e.preventDefault();
                $('#orders_pending').modal('show');
                var id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: 'pending.php',
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

            $("#orders_pending").on("hidden.bs.modal", function() {
                $('.prepend_items').remove();
            });
        });
    </script>
</body>

</html>
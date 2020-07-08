<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<head>
	<title>Color Master</title>
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
                    Color Master
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Color</li>
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
                                    	<th>Color Name</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = $pdo->open();

                                        try {
                                            $stmt = $conn->prepare("SELECT * FROM color ");
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                                $status = ($row['status']) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">Block</span>';
                                                $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="' . $row['id'] . '"><i class="fa fa-check-square-o"></i></a></span>' : '';
                                                $white =($row['color_name'] == "#fff") ? 'border:1px solid #000':'';
                                                echo "
                          <tr>
                          <td style='position: relative;top: 0;left: 0;'><span style='position: absolute;width: 30px;height: 30px;background: ".$row['color_name'].";border-radius: 80px;".$white.";box-shadow: 4px 5px 16px ".$row['color_name']."'></span></td>
                            <td>
                              " . $status . "
                              " . $active . "
                            </td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat'  id='quickview' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat'  data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
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
        <?php include 'includes/color_modal.php'; ?>

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

            $(document).on('click', '.status', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                getRow(id);
            });

        });

        function getRow(id) {
            $.ajax({
                type: 'POST',
                url: 'color_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.colorid').val(response.id);
                   $('.color_name').html(response.color_name);
                    $('#color_name').val(response.color_name);
                }
            });
        }
    </script>
</body>

</html>	
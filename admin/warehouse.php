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
            <section class="content-header" style="color: white">
                <h1>
                    List of Warehouse
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#" style="color: white"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active" style="color: white">Warehouse</li>
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
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>Warehouse Name</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Pincode</th>
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
<td>" . $row['name'] . "</td>
<td>" . $row['city'] . "</td>
<td>" . $row['state'] . "</td>
<td>" . $row['pincode'] . "</td>

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
</body>

</html>
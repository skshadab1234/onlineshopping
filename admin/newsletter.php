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
                    List of Newletter
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Newletter</li>
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
                                        <th>ID</th>
                                        <th>E-mail Id</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = $pdo->open();

                                        try {
                                            $stmt = $conn->prepare("SELECT * FROM newsletter");
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                    $status = ($row['status'] == 1) ? ' <span title="verified" style="color:green"><i class="fa fa-check-circle" style=></i> </span>' : '';
                                                echo "
<tr>
<td>" . $row['id'] . "</td>
<td>" . $row['email_id'] . " ".$status."</td>
<td>
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
        <?php include 'includes/newsletter_modal.php'; ?>

    </div>

    <?php include 'includes/scripts.php'; ?>
    <script>
        $(function() {

            $(document).on('click', '.edit', function(e) {
                e.preventDefault();
                $('#edit').modal('show');
                var id = $(this).data('id');
                getRow(id);
            });

            // $(document).on('click', '.delete', function(e) {
            //     e.preventDefault();
            //     $('#delete').modal('show');
            //     var id = $(this).data('id');
            //     getRow(id);
            // });

        });

        function getRow(id) {
            $.ajax({
                type: 'POST',
                url: 'newsletter_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.newsletterid').val(response.id);
                    $('.newslettername').html(response.email_id);

                }
            });
        }

        $(document).ready(function() {
    $.ajax({
        url: "View_ajax.php",
        type: "POST",
        cache: false,
        success: function(dataResult){
            $('#table').html(dataResult); 
        }
    });
    $(document).on("click", ".delete", function() { 
        var $ele = $(this).parent().parent();
        $.ajax({
            url: "newsletter_delete.php",
            type: "POST",
            cache: false,
            data:{
                id: $(this).attr("data-id")
            },
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $ele.fadeOut().remove();
                }
            }
        });
    });
});
    </script>
</body>

</html>
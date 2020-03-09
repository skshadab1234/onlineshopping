<?php
$conn = $pdo->open();

try {
    $stmt = $conn->prepare("SELECT * FROM category");
    $stmt->execute();
    $cate = $stmt->fetch();
} catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();
?>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Landing Page Slider</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="slider_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Choose subcategory</label>
                        <div class="col-sm-9">
                            <select class="form-control input-sm select2" style="width: 100%" name="name">
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
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Choose category</label>
                        <div class="col-sm-9">
                            <select class="form-control input-sm select2" style="width: 100%" name="name">
                                <option value="0">ALL</option>
                                <?php
                                $conn = $pdo->open();

                                $stmt = $conn->prepare("SELECT * FROM category");
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
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="slider_edit.php">
                    <input type="hidden" class="slide_id" name="id">
                    <div class="form-group">
                        <label for="edit_name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                        <select class="form-control input-sm select2" style="width: 100%" name="name">
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
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="slider_delete.php">
                    <input type="hidden" class="slide_id" name="id">
                    <div class="text-center">
                        <p>DELETE CATEGORY</p>
                        <h2 class="bold slide_name"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="slide_name"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="slider_photo.php" enctype="multipart/form-data">
                    <input type="hidden" class="slide_id" name="id">
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
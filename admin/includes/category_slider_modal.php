
<!-- slider for category -->

<!-- Add -->
<div class="modal fade" id="addcat_slider">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Desktop Category Page Slider</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="slider_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Category</label>

                        <div class="col-sm-9">
                        <select class="form-control input-sm select2" style="width: 100%" name="name">
                                <option value="0">--Select--</option>
                                <?php
                                $conn = $pdo->open();

                                $stmt = $conn->prepare("SELECT * FROM category");
                                $stmt->execute();

                                foreach ($stmt as $crow) {
                                    $selected = ($crow['id'] == $crow['cat_slug']) ? 'selected' : '';
                                    echo "
                            <option value='" . $crow['id'] . "' " . $selected . ">" . $crow['cat_slug'] . "</option>
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
                                <input type="hidden" name="type">
                        <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="addcat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit -->
<div class="modal fade" id="editcat">
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
                        <select class="form-control input-sm select2" style="width: 100%" name="name"  required>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

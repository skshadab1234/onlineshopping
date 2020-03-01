<!-- Add -->
<div class="modal fade" id="addoffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add New Offer</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="category_offer_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="photo" name="photo" required>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="category" class="col-sm-3 control-label">Category</label>

                        <div class="col-sm-9">
                            <select class="form-control select2" style="width: 100%;" id="category3" name="category" required>
                                <option value="" selected>- Select -</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="url" class="col-sm-3 control-label">Offer Url</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="url" required>
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



<!-- Update Photo -->
<div class="modal fade" id="edit_photo2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="offername"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="category_offer_photo.php" enctype="multipart/form-data">
                    <input type="hidden" class="offerid" name="id">
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>

                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="upload1"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Offer</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="category_offer_edit.php">
                    <input type="hidden" class="offerid" name="id">
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="edit_category3" name="category1" required>
                                <option selected id="offerselected"></option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="url" class="col-sm-3 control-label">Offer Url</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="url" name="url" required>
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
<div class="modal fade" id="delete2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="category_offer_delete.php">
                    <input type="hidden" class="offerid" name="id">
                    <div class="text-center">
                        <p>DELETE CATEGORY</p>
                        <h2 class="bold offername"></h2>
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
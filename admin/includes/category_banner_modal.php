<!-- Edit -->
<div class="modal fade" id="edit1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Category</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="category_banner_edit.php">
                    <input type="hidden" class="catidbanner" name="id">
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="category2" name="category1" required>
                                <option value="" selected>- Select -</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url" class="col-sm-3 control-label">url</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="url">
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
<div class="modal fade" id="delete1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="category_banner_delete.php">
                    <input type="hidden" class="catidbanner" name="id">
                    <div class="text-center">
                        <p>DELETE CATEGORY</p>
                        <h2 class="bold bannername"></h2>
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
<div class="modal fade" id="edit_photo1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="bannername"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="category_banner_photo.php" enctype="multipart/form-data">
                    <input type="hidden" class="catidbanner" name="id">
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

<!-- banner add -->
<div class="modal fade" id="addbanner">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Add Banner
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="category_banner.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Category </label>
                        <div class="col-sm-9">
                            <select class="form-control" id="category1" name="category" required>
                                <option value="" selected>- Select -</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="photo">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Banner Link</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="url">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="addbanner"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add NEW wAREHOUSE -->
<div class="modal fade" id="adddelivery">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span>Add New WareHouse</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="warehouse_add.php">
                    <input type="hidden" class="userid" name="id">
                    <div class="form-group">
                        <label for="warehousename" class="col-sm-3 control-label">Warehouse Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="city">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state" class="col-sm-3 control-label">State</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="state" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pincode" class="col-sm-3 control-label">Pincode</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pincode" style="-moz-appearance: none" max='6' required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-check-square-o"></i> Add</button>
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
                <h4 class="modal-title"><b>Edit <span class="warehousename"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="warehouse_edit.php">
                    <input type="hidden" class="warehouseid" name="id">
                    <div class="form-group">
                        <label for="edit_name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_name" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="city" class="col-sm-3 control-label">city</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_city" name="city">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="state" class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_state" name="state">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="pincode" class="col-sm-3 control-label">Pincode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_pincode" name="pincode">
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
                <form class="form-horizontal" method="POST" action="warehouse_delete.php">
                    <input type="hidden" class="warehouseid" name="id">
                    <div class="text-center">
                        <p>DELETE CATEGORY</p>
                        <h2 class="bold warehousename"></h2>
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
<!-- Add -->
<div class="modal fade" id="adddelivery">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Delivery Order</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="adddeliveryorder_add.php">
                    <input type="hidden" class="userid" name="id">
                    <div class="form-group">
                        <label for="deliverboy" class="col-sm-3 control-label">Deliver By</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" style="width: 100%;" name="assign_to" id="users" required>
                                <option value="" selected>- Select -</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product" class="col-sm-3 control-label">Product</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" style="width: 100%;" name="product" id="delivery" required>
                                <option value="" selected>- Select -</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="warehouse" class="col-sm-3 control-label">Pick up Address</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" style="width: 100%;" name="pickup" id="warehouse" required>
                                <option value="" selected>- Select -</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="warehouse" class="col-sm-3 control-label">Ship/Billing Address</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" style="width: 100%;" name="shipaddress" id="shipaddress" required>
                                <option value="" selected>- Select -</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="warehouse" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" style="width: 100%;" name="status" required>
                                <option value="" selected>- Select -</option>
                                <option value="1">Processed</option>
                                <option value="2">Not Yet Processed</option>
                            </select>
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
                <h4 class="modal-title"><b><span class="productname"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="cart_edit.php">
                    <input type="hidden" class="cartid" name="cartid">
                    <input type="hidden" class="userid" name="userid">
                    <div class="form-group">
                        <label for="edit_quantity" class="col-sm-3 control-label">Quantity</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_quantity" name="quantity">
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
                <form class="form-horizontal" method="POST" action="cart_delete.php">
                    <input type="hidden" class="cartid" name="cartid">
                    <input type="hidden" class="userid" name="userid">
                    <div class="text-center">
                        <p>DELETE PRODUCT</p>
                        <h2 class="bold productname"></h2>
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
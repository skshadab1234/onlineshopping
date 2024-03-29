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
                    <form class="form-horizontal" method="POST" action="products_delete.php">
                        <input type="hidden" class="prodid" name="id">
                        <div class="text-center">
                            <p>DELETE PRODUCT</p>
                            <h2 class="bold name"></h2>
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

    <!-- Delete -->
    <div class="modal fade" id="delete_all">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Deleting...</b></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="products_delete.php">
                        <div class="text-center">
                            <p>DELETE All PRODUCT</p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-danger btn-flat" name="delete_all"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit -->
    <div class="modal fade" id="edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Edit Product</b></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="products_edit.php">
                        <input type="hidden" class="prodid" name="id">
                        <div class="form-group">
                            <label for="edit_name" class="col-sm-1 control-label">Name</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="edit_name" name="name">
                            </div>

                            <label for="edit_category" class="col-sm-1 control-label">Style</label>

                            <div class="col-sm-5">
                                <select class="form-control" id="edit_subcategory" name="subcategory">
                                    <option selected id="catselected"></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_price" class="col-sm-1 control-label">Price</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="edit_price" name="price">
                            </div>


                            <label for="old_price" class="col-sm-1 control-label">Old Price</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="old_price" name="old_price">
                            </div>
                        </div>

                        <div class="form-group">

                            <label for="edit_color" class="col-sm-1 control-label">Color</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="edit_color" name="color">
                            </div>

                            <label for="brand" class="col-sm-1 control-label">Brand</label>

                            <div class="col-sm-5">
                                <select class="form-control" id="edit_brand" name="brand">
                                    <option selected id="brandselected"></option>
                                </select>
                            </div>


                        </div>
                        <div class="form-group">

                            <label for="discount" class="col-sm-1 control-label">Discount</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="edit_discount" name="discount" placeholder="enter discount">
                            </div>
                            <label for="size" class="col-sm-1 control-label">Size</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="edit_size" name="size" placeholder="enter size">
                            </div>


                        </div>

                        <p><b>Description</b></p>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea id="editor2" name="description" rows="10" cols="80"></textarea>
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
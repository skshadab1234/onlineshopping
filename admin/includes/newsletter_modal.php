
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
                    <input type="hidden" class="newsletterid" name="id">
                    <div class="text-center">
                        <p>DELETE CATEGORY</p>
                        <h2 class="bold newslettername" ></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat delete_news" <?php echo "data-id='" . $row['id'] . "'" ?>><i class="fa fa-trash"></i> Delete</button>
            </div>
        </div>
    </div>
</div>

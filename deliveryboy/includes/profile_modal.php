<!-- order pending -->
<div class="modal fade" id="orders_pending">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Order Delivery Details</b></h4>
      </div>
      <div class="modal-body table-responsive text-nowrap" style="color: white">
        <p>
          Date: <span id="date"></span>
          <span class="pull-right">Transaction#: <span id="transid"></span></span>
        </p>
        <table class="table table-bordered" style="padding:10px">
          <thead>
            <th>Product Image</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Amount Paid </th>
          </thead>
          <tbody id="detail">
            <tr>
              <td colspan="3" align="right">
                <h4 style="color: white;letter-spacing: 1px;"><b>Total</b></h4>
              </td><br>
              <td>
                <h4><span id="total" style="padding: 4px"></span></h4>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="modal-footer">
        <button id="quickview" data-dismiss="modal" aria-label="Close">Close</button>
        <button class="btn btn-success" data-toggle="modal" data-target="#status">Edit Status</button>

      </div>
    </div>
  </div>
</div>

<!-- Edit Status -->
<div class="modal fade" id="status" style="padding: 0 !important;background: #0d0620;opacity: 0.9;height: 100vh;margin:0">
  <div class="modal-dialog" style="width: 102%;margin: 0;padding: 0;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Edit Status</b></h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button id="quickview" data-dismiss="modal" aria-label="Close">Close</button>
        <button class="btn btn-success">Save</button>

      </div>
    </div>
  </div>
</div>

<!-- Add -->
<div class="modal fade" id="profile">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>deliveryboy Profile</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="email" name="email" value="<?php echo $deliveryboy['email']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>

            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" name="password" value="<?php echo $deliveryboy['password']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="firstname" class="col-sm-3 control-label">Firstname</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $deliveryboy['firstname']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="lastname" class="col-sm-3 control-label">Lastname</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $deliveryboy['lastname']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="photo" class="col-sm-3 control-label">Photo:</label>

            <div class="col-sm-9">
              <input type="file" id="photo" name="photo">
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>

            <div class="col-sm-9">
              <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Track Order -->
<div class="modal fade" id="track" >
    <div class="modal-dialog">
        <div class="modal-content" style="background: #0d0620"> 
            <div class="modal-header" style="background: #0d0620">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" style="color: white"><b>Track Your Order</b></h4>
            </div>
            <div class="modal-body" style="color: white">
              <?php include './tracking.php'; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" id="quickview" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="cancel">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #0d0620">
            <div class="modal-header" style="background: #0d0620">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" style="color: white"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body" style="color: white">
              <form class="form-horizontal" method="POST" action="order_cancel.php">
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                    <p>Cancel Order</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" id="quickview"  data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat"  id="quickview" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Transaction History -->
<div class="modal fade" id="transaction">
    <div class="modal-dialog">
        <div class="modal-content"  style="background: rgba(0,0,0,0.8);">
            <div class="modal-header" style="background: rgba(0,0,0,0.8);" >
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" style="color: white"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body table-responsive text-nowrap" style="color: white">
              <p>
                Date: <span id="date"></span>
                <span class="pull-right">Transaction#: <span id="transid"></span></span> 
              </p>
              <table class="table table-bordered" style="border:1px solid #663355;padding:10px">
                <thead>
                  <th style="border:1px solid #663355;padding:10px">Product Image</th>
                  <th style="border:1px solid #663355;padding:10px">Product</th>
                  <th style="border:1px solid #663355;padding:10px">Quantity</th>
                  <th style="border:1px solid #663355;padding:10px">Amount Paid </th>
                </thead>
                <tbody id="detail">
                  <tr>
                    <td colspan="3" align="right" style="border:1px solid #663355;s" ><h4 style="color: white;letter-spacing: 1px;"><b>Total</b></h4></td><br>
                    <td style="border:1px solid #663355;"><h4><span id="total" style="padding: 4px"></span></h4></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" id="quickview" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #0d0620">
            <div class="modal-header" style="background: #0d0620">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" style="color: white"><b>Update Account</b></h4>
            </div>
            <div class="modal-body" style="color: white">
              <form class="form-horizontal" method="POST" action="profile_edit.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $user['contact_info']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="address" name="address" minlength="70" maxlength="70"><?php echo $user['address']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">City</label>

                    <div class="col-sm-9">
                      <input class="form-control" id="city" name="city" value="<?php echo $user['city']; ?>  ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="state" class="col-sm-3 control-label">State</label>

                    <div class="col-sm-9">
                      <input class="form-control" id="state" name="state"  value="<?php echo $user['state']; ?>  ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pincode" class="col-sm-3 control-label">Pincode</label>

                    <div class="col-sm-9">
                      <input class="form-control" id="pincode" name="pincode" maxlength="6" value="<?php echo $user['pincode']; ?>  ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9" >
                      <input type="file" id="photo" name="photo" style="color: black">
                    </div>
                </div>
                <hr>
                
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" id="quickview" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" id="quickview" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>
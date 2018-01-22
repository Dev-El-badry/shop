<?php

        if (isset($flash)) {
          echo $flash;
        }
      ?>
<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $head_line; ?></h3>
    </div>
    <div class="box-body">

    
      <div class="row">
	<div class="col-md-8 col-md-offset-2">
	<?php echo validation_errors('<p style="color: red;">', '</p>'); ?>
	<form role="form" method="post" action="<?php echo base_url(); ?>store_users/update_password">
	<input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
	<div class="form-group">
	  <label>New Password</label>
	  <input type="password" name="pword" autocomplete="off" class="form-control" placeholder="Enter New Password">
	</div>

  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" name="re_pword" autocomplete="off" class="form-control" placeholder="Repeate Password To Confirm it" />
  </div>

       <center>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">Save Changes</button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel">Cancel</button>
    </div>
    </center>

</div></form></div></div></div></div>


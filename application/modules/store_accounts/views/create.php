<?php

if (isset($update_id)) {


 if (is_numeric($update_id)): ?>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Options </h3>
    </div>
    <div class="box-body">
   
      
      <a href="<?= base_url() ?>store_accounts/update_password/<?= $update_id ?>" class="btn btn-primary">Update Password</a>
      
      <a href="<?= base_url() ?>store_accounts/deleteconif/<?= $update_id ?>" class="btn btn-danger">Delete Account</a>
     
    </div>
</div>
<?php endif ;
}
?>
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
	<form role="form" method="post" action="<?php echo base_url(); ?>store_accounts/create/"<?php echo isset($update_id) ? $update_id : ''; ?>">
	<input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="Enter Username">
        </div>

        <div class="form-group">
	  <label>First Name</label>
	  <input type="text" name="fistname" value="<?php echo $fistname; ?>" class="form-control" placeholder="Enter First Name">
	</div>

  <div class="form-group">
    <label>Last Name</label>
    <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control" placeholder="Enter Last Name">
  </div>

  <div class="form-group">
    <label>Company</label>
    <input type="text" name="company" value="<?php echo $company; ?>" class="form-control" placeholder="Enter Company Name">
  </div>

  <div class="form-group">
    <label>First Address</label>
    <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" placeholder="Enter First Address">
  </div>

  <div class="form-group">
    <label>Second Address</label>
    <input type="text" name="address2" value="<?php echo $address2; ?>" class="form-control" placeholder="Enter Second Address">
  </div>

 	<div class="form-group">
	  <label>Town</label>
	  <input type="text" name="town" value="<?php echo $town; ?>" class="form-control" placeholder="Enter Town">
	</div>

	<div class="form-group">
	  <label>Country </label>
	  <input type="text" name="country" value="<?php echo $country; ?>" class="form-control" placeholder="Enter Country">
	</div>

  <div class="form-group">
    <label>Post Code </label>
    <input type="text" name="post_code" value="<?php echo $post_code; ?>" class="form-control" placeholder="Enter Post Code">
  </div>

  <div class="form-group">
    <label>Telephone Number </label>
    <input type="text" name="telnum" value="<?php echo $telnum; ?>" class="form-control" placeholder="Enter Telephone Number">
  </div>

  <div class="form-group">
    <label>E-Mail </label>
    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Enter E-Mail">
  </div>


     <center>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">Save Changes</button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel">Cancel</button>
    </div>
    </center>

</div></form></div></div></div></div>


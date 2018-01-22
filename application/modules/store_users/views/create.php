<?php

if (isset($update_id)) {


 if (is_numeric($update_id)): ?>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Options </h3>
    </div>
    <div class="box-body">
    <a href="<?= base_url() ?>store_users/manage" class="btn btn-default">Pervious Page</a>
      
      
      <a href="<?= base_url() ?>store_users/update_password/<?= $update_id ?>" class="btn btn-primary">Update Password</a>
      
      <a href="<?= base_url() ?>store_users/deleteconif/<?= $update_id ?>" class="btn btn-danger">Delete User</a>
      
       <?php if($got_picture == TRUE) {
        ?>
         <a href="<?= base_url() ?>store_users/delete_image/<?= $update_id ?>" class="btn btn-danger">Delete Image</a>
        <?php
       } else {
        ?>
 <a href="<?= base_url() ?>store_users/upload_image/<?= $update_id ?>" class="btn btn-primary">Add Image</a>
        <?php
       } ?>
      <a href="<?= base_url() ?>store_users/view_profile/<?= $update_id ?>" class="btn btn-info">View Profile</a>
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
      <?php if(isset($got_picture) AND $got_picture == TRUE) { ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Picture</h3>
  </div>
  <div class="box-body">
    <img src="<?= base_url() ?>users_pics/<?= $picture ?>" class="img-responsive img-thumbnail">
  </div>
</div>
<?php } ?>
<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $head_line; ?></h3>
    </div>
    <div class="box-body">

    
      <div class="row">
	<div class="col-md-8 col-md-offset-2">
	<?php echo validation_errors('<p style="color: red;">', '</p>'); ?>
	<form role="form" method="post" action="<?php echo base_url(); ?>store_users/create">
	<input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" <?php echo isset($update_id) ? 'disabled' : ''; ?> value="<?php echo $username; ?>" class="form-control" placeholder="Enter Username">
        </div>

        <div class="form-group">
	  <label>First Name</label>
	  <input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control" placeholder="Enter First Name">
	</div>

  <div class="form-group">
    <label>Last Name</label>
    <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control" placeholder="Enter Last Name">
  </div>
<?php if(!isset($update_id)){ ?>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="pword" value="<?php echo $pword; ?>" class="form-control" placeholder="Enter Password">
  </div>
  
 <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" name="re_pword"  class="form-control" placeholder="Enter Re-password">
  </div>
  <?php } ?>
  <div class="form-group">
    <label>First Address</label>
    <input type="text" name="address1" value="<?php echo $address1; ?>" class="form-control" placeholder="Enter First Address">
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
    <label>Telephone Number </label>
    <input type="text" name="tel" value="<?php echo $tel; ?>" class="form-control" placeholder="Enter Telephone Number">
  </div>

  <div class="form-group">
    <label>E-Mail </label>
    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Enter E-Mail">
  </div>

  <div class="form-group">
    <label>Function </label>
    <input type="text" name="function" value="<?php echo $function; ?>" class="form-control" placeholder="Enter Function Of User">
  </div>

  <div class="form-group">
    <label>Role </label>
     <?php
      $status='';
        $class = 'class="form-control"';
       

    echo form_dropdown('role_id', $options, $role_id, $class);
      ?>
  </div>

     <center>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">Save Changes</button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel">Cancel</button>
    </div>
    </center>
</form>
</div>

</div>
</div>
</div>



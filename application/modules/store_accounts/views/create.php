<?php

if (isset($update_id)) {


 if (is_numeric($update_id)): ?>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $this->lang->line('options_list') ?> </h3>
    </div>
    <div class="box-body">
   
      
      <a href="<?= base_url() ?>store_accounts/update_password/<?= $update_id ?>" class="btn btn-primary"><?= $this->lang->line('update_password') ?></a>
      
      <a href="<?= base_url() ?>store_accounts/deleteconif/<?= $update_id ?>" class="btn btn-danger"><?= $this->lang->line('del_account') ?></a>
     
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
            <label><?= $this->lang->line('username') ?></label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_username') ?>">
        </div>

        <div class="form-group">
	  <label><?= $this->lang->line('first_name') ?></label>
	  <input type="text" name="fistname" value="<?php echo $fistname; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_first_name') ?>">
	</div>

  <div class="form-group">
    <label><?= $this->lang->line('last_name') ?></label>
    <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_last_name') ?>">
  </div>

  <div class="form-group">
    <label><?= $this->lang->line('comapny') ?></label>
    <input type="text" name="company" value="<?php echo $company; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_company') ?>">
  </div>

  <div class="form-group">
    <label><?= $this->lang->line('address1') ?></label>
    <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_address1') ?>">
  </div>

  <div class="form-group">
    <label><?= $this->lang->line('address2') ?></label>
    <input type="text" name="address2" value="<?php echo $address2; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_address2') ?>">
  </div>

 	<div class="form-group">
	  <label><?= $this->lang->line('town') ?></label>
	  <input type="text" name="town" value="<?php echo $town; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_town') ?>">
	</div>

	<div class="form-group">
	  <label><?= $this->lang->line('country') ?> </label>
	  <input type="text" name="country" value="<?php echo $country; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_country') ?>">
	</div>

  <div class="form-group">
    <label><?= $this->lang->line('post_code') ?> </label>
    <input type="text" name="post_code" value="<?php echo $post_code; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_post_code') ?>">
  </div>

  <div class="form-group">
    <label><?= $this->lang->line('telephone_number') ?> </label>
    <input type="text" name="telnum" value="<?php echo $telnum; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_telephone_number') ?>">
  </div>

  <div class="form-group">
    <label><?= $this->lang->line('email') ?> </label>
    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_email') ?>">
  </div>


     <center>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit"><?= $this->lang->line('save_changes') ?></button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel"><?= $this->lang->line('cancel') ?></button>
    </div>
    </center>

</div></form></div></div></div></div>


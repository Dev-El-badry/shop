<?php

if (isset($update_id)) {


 if (is_numeric($update_id)): ?>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Options </h3>
    </div>
    <div class="box-body">
    <?php 
    $url = base_url().'item_stores/upload_image'; 
    $url_del = base_url().'item_stores/delete_image/'; 
     if ($big_img == NULL){ ?>
      <a href="<?php echo $url; ?>/<?php echo isset($update_id) ? $update_id : '' ; ?>" class="btn btn-primary">Upload Item Image</a>
    <?php } else { ?>
       <a href="<?php echo $url_del; ?>/<?php echo isset($update_id) ? $update_id : '' ; ?>" class="btn btn-danger">Delete Item Image</a>
    <?php } ?>
      <a href="<?= base_url() ?>store_item_colors/update/<?= $update_id ?>" class="btn btn-warning">Upload Item Color </a>
      <a href="<?= base_url() ?>store_item_sizes/update/<?= $update_id ?>" class="btn btn-primary">Upload Item Sizes </a>
      <a href="<?= base_url(); ?>store_cat_assign/update/<?= $update_id; ?>" class="btn btn-success">Upload Item Categories </a>
      <a href="" class="btn btn-info">Upload Color </a>
      <a href="<?= base_url() ?>item_stores/deleteconif/<?= $update_id ?>" class="btn btn-danger">Delete Item</a>
      <a href="<?= base_url() ?>item_stores/view/<?= $update_id ?>" class="btn btn-default">View Item</a>
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
	<form role="form" method="post" action="<?php echo base_url(); ?>item_stores/create/"<?php echo isset($update_id) ? $update_id : ''; ?>">
	<input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
	<div class="form-group">
	  <label>Title Item</label>
	  <input type="text" name="title_item" value="<?php echo $title_item; ?>" class="form-control" placeholder="Enter Title Of Item">
	</div>

	<div class="form-group">
	  <label>Price Item</label>
	  <input type="text" name="price_item" value="<?php echo $price_item; ?>" class="form-control" placeholder="Enter Price Item">
	</div>

	<div class="form-group">
	  <label>Was Price <span style="color: green">(optional)</span></label>
	  <input type="text" name="was_price" value="<?php echo $was_price; ?>" class="form-control" placeholder="Enter Was Price">
	</div>

	<div class="form-group">
      <label>Status</label>
      <?php
      	$class = 'class="form-control"';
      	$options = array(
        ''         => 'Please Select...',
        '1'        => 'Active',
        '0'        => 'Inactive'
		);

		echo form_dropdown('status', $options, $status, $class);
      ?>
    </div>

	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Describtion Item
                <small>Simple and fast Subtitle</small>
              </h3>
              <!-- tools box -->
             
              <!-- /. tools -->
            </div>

            <!-- /.box-header -->
            <div class="box-body pad">
            
                <textarea name="describtion_item" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $describtion_item; ?></textarea>
             
            </div>
     <center>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">Save Changes</button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel">Cancel</button>
    </div>
    </center>

</div></form></div></div></div></div>

<?php if ($big_img != ''){ ?>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Item Image</h3>
    </div>
    <div class="box-body">

      <img src="<?= base_url() ?>big_img/<?php echo $big_img; ?>" />
    </div>
  </div>
<?php } ?>
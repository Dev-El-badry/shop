<?php

if (isset($update_id)) {


 if (is_numeric($update_id)): ?>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Options </h3>
    </div>
    <div class="box-body">
    <?php if ($got_gallery_pics == TRUE){

      $btn_gallery_theme = 'success';
      $gallery_alert = $this->lang->line('gallery_alert');
      $btn_item_text =  $this->lang->line('btn_item_text');
    ?>
       <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> <?= $this->lang->line('alert') ?>!</h4>
                <?= $gallery_alert ?>
              </div>
    <?php } else {
$btn_gallery_theme = 'primary';
      
      $btn_item_text = 'Delete Main Image';

     ?>


    <?php } ?>
    <?php 
    $url = base_url().'item_stores/upload_image'; 
    $url_del = base_url().'item_stores/delete_image/'; 
     if ($big_img == NULL){ ?>
      <a href="<?php echo $url; ?>/<?php echo isset($update_id) ? $update_id : '' ; ?>" class="btn btn-primary"><?= $this->lang->line('upload_item_image') ?></a>
    <?php } else { ?>
       <a href="<?php echo $url_del; ?>/<?php echo isset($update_id) ? $update_id : '' ; ?>" class="btn btn-danger"><?= $btn_item_text ?></a>
    <?php } ?>
     <a href="<?= base_url() ?>item_galleries/update_group/<?= $update_id ?>" class="btn btn-<?= $btn_gallery_theme ?>">Manage Item Galleries </a>
      <a href="<?= base_url() ?>store_item_colors/update/<?= $update_id ?>" class="btn btn-warning"><?= $this->lang->line('upload_item_color') ?> </a>
      <a href="<?= base_url() ?>store_item_sizes/update/<?= $update_id ?>" class="btn btn-primary"><?= $this->lang->line('upload_item_sizes') ?> </a>
      <a href="<?= base_url(); ?>store_cat_assign/update/<?= $update_id; ?>" class="btn btn-success"><?= $this->lang->line('upload_item_categories') ?> </a>
    
      <a href="<?= base_url() ?>item_stores/deleteconif/<?= $update_id ?>" class="btn btn-danger"><?= $this->lang->line('delete_item') ?></a>
      <a href="<?= base_url() ?>item_stores/view/<?= $update_id ?>" class="btn btn-default"><?= $this->lang->line('view_item') ?></a>
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
	<form role="form" method="post" action="<?php echo base_url(); ?>item_stores/create">
	<input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
	<div class="form-group">
	  <label>Title Item</label>
	  <input type="text" name="title_item" value="<?php echo $title_item; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_item_title') ?>">
	</div>

	<div class="form-group">
	  <label>Price Item</label>
	  <input type="text" name="price_item" value="<?php echo $price_item; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_item_price') ?>">
	</div>

	<div class="form-group">
	  <label>Was Price <span style="color: green">(optional)</span></label>
	  <input type="text" name="was_price" value="<?php echo $was_price; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_was_price') ?>">
	</div>

	<div class="form-group">
      <label>Status</label>
      <?php
      	$class = 'class="form-control"';
      	$options = array(
        ''         => 'Please Select...',
        '1'        => $this->lang->line('active'),
        '0'        => $this->lang->line('inactive')
		);

		echo form_dropdown('status', $options, $status, $class);
      ?>
    </div>

	<div class="box">
            <div class="box-header">
              <h3 class="box-title"><?= $this->lang->line('item_description') ?>
                <small><?= $this->lang->line('simple_and_fast_subtitle') ?></small>
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
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit"><?= $this->lang->line('save_changes') ?></button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel"><?= $this->lang->line('cancel') ?></button>
    </div>
    </center>

</div></form></div></div></div></div>

<?php if ($big_img != ''){ ?>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $this->lang->line('item_image') ?></h3>
    </div>
    <div class="box-body">

      <img src="<?= base_url() ?>big_img/<?php echo $big_img; ?>" />
    </div>
  </div>
<?php } ?>
<?php
if (isset($update_id)) {


if (is_numeric($update_id)): ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Options </h3>
    </div>
    <div class="box-body">
      <a href="<?= base_url() ?>slider/manage" class="btn btn-default"><?= $this->lang->line('pervious_page') ?></a>
        <a href="<?= base_url() ?>slides/update_group/<?= $update_id ?>" class="btn btn-primary"><?= $this->lang->line('update_anew_slides') ?></a>
        <a href="<?= base_url() ?>slider/deleteconif/<?= $update_id ?>" class="btn btn-danger"><?= $this->lang->line('delete_slider') ?></a>

    </div>
</div>
<?php endif ;
}
?>

<?php
  if (isset($flash)) {// check is set flash to display flash message
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
        	<form role="form" method="post" action="<?php echo base_url(); ?>slider/create">
          <input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />

        	
        	<div class="form-group">
        	  <label><?= $this->lang->line('slider_title') ?></label>
        	  <input type="text" name="slider_title" value="<?php echo $slider_title; ?>" class="form-control" placeholder="Enter Title Of Slider">
        	</div>
            <div class="form-group">
            <label><?= $this->lang->line('target_url') ?></label>
            <input type="text" name="target_url" value="<?php echo $target_url; ?>" class="form-control" placeholder="Enter Target URL">
          </div>

      	</div>
      </div> <!-- End .row -->

    </div> <!-- End .box-body -->

	<div class="clearfix"></div>
            
     <center>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit"><?= $this->lang->line('save_changes') ?></button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel"><?= $this->lang->line('cancel') ?></button>
    </div>
    </center>
</div> <!-- End .box -->
</form>


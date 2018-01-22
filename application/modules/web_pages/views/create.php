<?php

if (isset($update_id)) {


    if (is_numeric($update_id)): ?>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $this->lang->line('options_page') ?></h3>
            </div>
            <div class="box-body">
                <?php if($update_id > 2) { ?>
                <a href="<?= base_url() ?>web_pages/deleteconif/<?= $update_id ?>" class="btn btn-danger"><?= $this->lang->line('delete_webpage') ?></a>
                <?php } ?>
                <a href="<?= base_url() ?>web_pages/view/<?= $update_id ?>" class="btn btn-default"><?= $this->lang->line('view_webpage') ?></a>
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

	<form role="form" method="post" action="<?php echo base_url(); ?>web_pages/create/"<?php echo isset($update_id) ? $update_id : ''; ?>">

	<input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
	<div class="form-group">
	  <label><?= $this->lang->line('page_title') ?></label>
	  <input type="text" name="page_title" value="<?php echo $page_title; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_page_title') ?>">
	</div>

	<div class="form-group">
	  <label><?= $this->lang->line('page_keywords') ?></label>
        <textarea name="page_keywords" class="form-control"><?php echo $page_keywords; ?></textarea>
	</div>

	<div class="form-group">
	  <label><?= $this->lang->line('pasge_description') ?> <span style="color: green">(<?= $this->lang->line('optional') ?>)</span></label>
        <textarea name="page_description" class="form-control"><?php echo $page_description; ?></textarea>
	</div>



<div class="clearfix"></div>
	<div class="box">
            <div class="box-header">
              <h3 class="box-title"><?= $this->lang->line('page_content') ?>
                <small><?= $this->lang->line('simple_and_fast_subtitle') ?></small>
              </h3>
              <!-- tools box -->
             
              <!-- /. tools -->
            </div>

            <!-- /.box-header -->
            <div class="box-body pad">
            
                <textarea name="page_content" class="textarea" placeholder="<?= $this->lang->line('please_som_text_here') ?>"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $page_content; ?></textarea>
             
            </div>
     <center>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit"><?= $this->lang->line('save_changes') ?></button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel"><?= $this->lang->line('cancel') ?></button>
    </div>
    </center>

</div>
        </form>
    </div>
      </div>
    </div>
</div>


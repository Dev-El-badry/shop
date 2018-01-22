<?php

if (isset($update_id)) {


    if (is_numeric($update_id)): ?>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $this->lang->line('options_blog') ?></h3>
            </div>
            <div class="box-body">
                <?php
                $url = base_url().'blogs/upload_image';
                $url_del = base_url().'blogs/delete_image/';
                if ($picture == NULL){ ?>
                    <a href="<?php echo $url; ?>/<?php echo isset($update_id) ? $update_id : '' ; ?>" class="btn btn-primary"><?= $this->lang->line('upload_blog_image') ?></a>
                <?php } else { ?>
                    <a href="<?php echo $url_del; ?>/<?php echo isset($update_id) ? $update_id : '' ; ?>" class="btn btn-danger"><?= $this->lang->line('del_blog_image') ?></a>
                <?php } ?>
                <a href="<?= base_url() ?>blogs/deleteconif/<?= $update_id ?>" class="btn btn-danger"><?= $this->lang->line('del_blog') ?></a>

                <a href="<?= base_url() ?>blogs/view/<?= $update_id ?>" class="btn btn-default"><?= $this->lang->line('view_blog') ?></a>
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

	<form role="form" method="post" action="<?php echo base_url(); ?>blogs/create">

	<input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />

        <div class="form-group">
            <label><?= $this->lang->line('date_published') ?>:</label>

            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="date_published" value="<?= $date_published ?>" class="form-control pull-right" id="datepicker">
            </div>
            <!-- /.input group -->
        </div>
	<div class="form-group">
	  <label><?= $this->lang->line('blog_title') ?></label>
	  <input type="text" name="blog_title" value="<?php echo $blog_title; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_blog_title') ?>">
	</div>

	<div class="form-group">
	  <label><?= $this->lang->line('blog_keywords') ?></label>
        <textarea name="blog_keywords" class="form-control"><?php echo $blog_keywords; ?></textarea>
	</div>

	<div class="form-group">
	  <label><?= $this->lang->line('blog_description') ?> <span style="color: green">(<?= $this->lang->line('optional') ?>)</span></label>
        <textarea name="blog_description" class="form-control"><?php echo $blog_description; ?></textarea>
	</div>



<div class="clearfix"></div>
	<div class="box">
            <div class="box-header">
              <h3 class="box-title"><?= $this->lang->line('blog_content') ?>
                <small><?= $this->lang->line('simple_and_fast_subtitle') ?></small>
              </h3>
              <!-- tools box -->
             
              <!-- /. tools -->
            </div>

            <!-- /.box-header -->
            <div class="box-body pad">
            
                <textarea name="blog_content" class="textarea" placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $blog_content; ?></textarea>
             
            </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" value="<?php echo $author; ?>" class="form-control" placeholder="<?= $this->lang->line('enter_author') ?>">
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
<?php if ($picture != ''){ ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $this->lang->line('blog_img') ?></h3>
        </div>
        <div class="box-body">

            <img src="<?= base_url() ?>blog_pics/<?php echo $picture; ?>" class="img-responsive"/>
        </div>
    </div>
<?php } ?>
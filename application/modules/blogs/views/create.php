<?php

if (isset($update_id)) {


    if (is_numeric($update_id)): ?>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Options Blog</h3>
            </div>
            <div class="box-body">
                <?php
                $url = base_url().'blogs/upload_image';
                $url_del = base_url().'blogs/delete_image/';
                if ($picture == NULL){ ?>
                    <a href="<?php echo $url; ?>/<?php echo isset($update_id) ? $update_id : '' ; ?>" class="btn btn-primary">Upload Blog Image</a>
                <?php } else { ?>
                    <a href="<?php echo $url_del; ?>/<?php echo isset($update_id) ? $update_id : '' ; ?>" class="btn btn-danger">Delete Blog Image</a>
                <?php } ?>
                <a href="<?= base_url() ?>blogs/deleteconif/<?= $update_id ?>" class="btn btn-danger">Delete Blog</a>

                <a href="<?= base_url() ?>blogs/view/<?= $update_id ?>" class="btn btn-default">View Blog</a>
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

	<form role="form" method="post" action="<?php echo base_url(); ?>blogs/create/"<?php echo isset($update_id) ? $update_id : ''; ?>">

	<input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />

        <div class="form-group">
            <label>Date Published:</label>

            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="date_published" value="<?= $date_published ?>" class="form-control pull-right" id="datepicker">
            </div>
            <!-- /.input group -->
        </div>
	<div class="form-group">
	  <label>Blog Title</label>
	  <input type="text" name="blog_title" value="<?php echo $blog_title; ?>" class="form-control" placeholder="Enter Title Of Blog">
	</div>

	<div class="form-group">
	  <label>Blog Keywords</label>
        <textarea name="blog_keywords" class="form-control"><?php echo $blog_keywords; ?></textarea>
	</div>

	<div class="form-group">
	  <label>Blog Description <span style="color: green">(optional)</span></label>
        <textarea name="blog_description" class="form-control"><?php echo $blog_description; ?></textarea>
	</div>



<div class="clearfix"></div>
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Blog Content
                <small>Simple and fast Subtitle</small>
              </h3>
              <!-- tools box -->
             
              <!-- /. tools -->
            </div>

            <!-- /.box-header -->
            <div class="box-body pad">
            
                <textarea name="blog_content" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $blog_content; ?></textarea>
             
            </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" value="<?php echo $author; ?>" class="form-control" placeholder="Enter author">
        </div>

        <center>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">Save Changes</button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel">Cancel</button>
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
            <h3 class="box-title">Blog Image</h3>
        </div>
        <div class="box-body">

            <img src="<?= base_url() ?>blog_pics/<?php echo $picture; ?>" class="img-responsive"/>
        </div>
    </div>
<?php } ?>
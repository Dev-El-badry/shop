      <div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $this->lang->line('options') ?> </h3>
    </div>
    <div class="box-body">
    	<p>* <?= $btn_info ?></p>

    	<?php 

    	if(isset($pic_path)) {
    		echo '<img src="'.$pic_path.'" alt="" class="img-responsive" />';
    	}

    	?>

    	<?php if($got_pic == FALSE) { ?>
        <a href="<?= base_url() ?>slides/upload_image/<?= $update_id ?>" class="btn btn-primary"><?= $this->lang->line('upload_aimage') ?></a>
        <?php } ?>
        <a href="<?= base_url() ?>slides/deleteconif/<?= $update_id ?>" class="btn btn-danger" <?= $btn_style ?>><?= $this->lang->line('delete_slide') ?></a>

    </div>
</div>



      <div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Options </h3>
    </div>
    <div class="box-body">
    	<p>* <?= $btn_info ?></p>

    	<?php 

    	if(isset($pic_path)) {
    		echo '<img src="'.$pic_path.'" alt="" class="img-responsive" />';
    	}

    	?>

    	<?php if($got_pic == FALSE) { ?>
        <a href="<?= base_url() ?>item_galleries/upload_image/<?= $update_id ?>" class="btn btn-primary">Upload A Image</a>
        <?php } ?>
        <a href="<?= base_url() ?>item_galleries/deleteconif/<?= $update_id ?>" class="btn btn-danger" <?= $btn_style ?>>Delete Item gallery</a>

    </div>
</div>



<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $head_line ?></h3>
    </div>
    <div class="box-body">
	<h3 class="alert alert-success">Your Image was successfully uploaded!</h3>

	<ul>
		<?php foreach ($upload_data as $item => $value):?>
		<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
	</ul>
	<hr>
	<p><?php 
	$attribute = "class='btn btn-primary'";
	echo anchor('store_accounts/create/'.$update_id.'', 'Return To Update Item', $attribute); ?></p>

	</div>
</div>
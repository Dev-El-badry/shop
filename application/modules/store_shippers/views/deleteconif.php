<div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $head_line ?></h3>
    </div>
    <div class="box-body">
    <form class="form-group" method="post" action="<?= base_url() ?>store_shippers/delete/<?= $update_id ?>"> 
    	<input type="hidden" name="update_id" value="<?= $update_id ?>" />
		<p><?= $this->lang->line('are_sure') ?></p>
		<hr>

		<input type="submit" name="submit" class="btn btn-danger" value="<?= $this->lang->line('del_shipper') ?>" />
		<input style="margin-left: 5px" name="submit" type="submit" class="btn btn-default" value="<?= $this->lang->line('cancel') ?>" />
	</form>
</div>

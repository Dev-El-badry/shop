<div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $head_line ?></h3>
    </div>
    <div class="box-body">
    <form class="form-group" method="post" action="<?= base_url() ?>item_galleries/delete/<?= $update_id ?>">
    	<input type="hidden" name="update_id" value="<?= $update_id ?>" />
		<p>Are You Sure To Delete Item gallery Record?</p>
		<hr>

		<input type="submit" name="submit" class="btn btn-danger" value="Yes - Delete Item gallery Record" />
		<input style="margin-left: 5px" name="submit" type="submit" class="btn btn-default" value="Cancel" />
	</form>
</div>

<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $head_line ?></h3>
    </div>
    <div class="box-body">
	<p>Please Upload Image From Your Computer</p>
    <?php 
       	if (isset($error)) {
    	 	foreach ($error as $key => $value) {
    	 		echo $value;
    	 	}
    	}
    ?>

	<?php echo form_open_multipart(base_url().'store_users/do_upload/'.$update_id.'');?>

	<input type="file" name="userfile" size="20" />

	<br /><br />

	<input type="submit" name="submit" class="btn btn-primary" value="Upload" />
	<input style="margin-left: 5px" name="submit" type="submit" class="btn btn-default" value="Cancel" />

	</form>
	</div>
</div>
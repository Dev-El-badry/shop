<?php
if (isset($update_id)) {


if (is_numeric($update_id)): ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Options </h3>
    </div>
    <div class="box-body">
        <a href="<?= base_url() ?>homepage_offers/update/<?= $update_id ?>" class="btn btn-primary">Upload A New Offers</a>
        <a href="<?= base_url() ?>homepage_blocks/deleteconif/<?= $update_id ?>" class="btn btn-danger">Delete Homepage Block</a>

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
        	<form role="form" method="post" action="<?php echo base_url(); ?>homepage_blocks/create/"<?php echo isset($update_id) ? $update_id : ''; ?>">
          <input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />

        	
        	<div class="form-group">
        	  <label>Title Block</label>
        	  <input type="text" name="block_title" value="<?php echo $block_title; ?>" class="form-control" placeholder="Enter Title Of Block">
        	</div>

      	</div>
      </div> <!-- End .row -->

    </div> <!-- End .box-body -->

	<div class="clearfix"></div>
            
     <center>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">Save Changes</button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel">Cancel</button>
    </div>
    </center>
</div> <!-- End .box -->
</form>


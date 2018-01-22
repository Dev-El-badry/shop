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
        	<form role="form" method="post" action="<?php echo base_url(); ?>store_category/create/"<?php echo isset($update_id) ? $update_id : ''; ?>">
          <input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
          <?php
          if($cat_parent_id_conut > 1) { ?>
          <div class="form-group">
            <label>Category Parent</label>
            <?php
              $class = 'class="form-control"';
             

          echo form_dropdown('cat_parent_id', $options, $cat_parent_id, $class);
            ?>
          </div>
          <?php 
        } else {
          echo form_hidden('cat_parent_id', 0);
          }?>
        	
        	<div class="form-group">
        	  <label>Title Category</label>
        	  <input type="text" name="cat_name" value="<?php echo $cat_name; ?>" class="form-control" placeholder="Enter Title Of Category">
        	</div>

      
    

    
	<div class="clearfix"></div>
            
     <center>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">Save Changes</button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel">Cancel</button>
    </div>
    </center>

</form>
  </div>
</div> <!-- End .box -->
  </div> <!-- End .row -->
</div> <!-- End .box-body -->

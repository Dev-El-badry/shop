<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $head_line ?></h3>
    </div>
    <div class="box-body">
	<p style="color: green">Submit Assign Category To Item. When You Are Finished Assign Of The category, Press'Finishing'</p>

	<?php $form_location = base_url()."store_cat_assign/submit"; ?>
	<form role="form" method="post" action="<?php echo $form_location; ?>">
	<input type="hidden" name="item_id" value="<?php echo isset($item_id) ? $item_id : ''; ?>" />
		<div class="form-group">
	      <label class="col-sm-2 control-label">New Option:</label>

	      <div class="col-sm-10">
	        <?php
	        	$attr = 'class = "form-control"';
	        	echo form_dropdown('cat_id', $options, $cat_id, $attr);
	        ?>
	      </div>
	    </div> <hr><br><br><br>
	    <center>
	     <div class="form-group">
	     	<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
	     	<input type="submit" style="margin-left: 10px" name="submit" value="Finished" class="btn btn-waring" />
	     </div>
	     </center>
	</form>
	

	
	</div>
</div>
<?php if($num_rows > 0) {?>
<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $head_line ?></h3>
    </div>
    <div class="box-body">
	

	<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Count</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
                <?php 
                $count = 0;
                foreach ($query->result() as $row) { 
                	$count++;
                	$parent_cat_name = $this->store_category->_get_parent_name($row->id_cat);
		            $cat_name = $this->store_category->_get_cat_parent_name($row->id_cat);

					$long_name = $parent_cat_name . " > " . $cat_name;
                	?>	         
                <tr>
                  <td><?= $count ?></td>
                  <td><?= $long_name ?></td>
                  <td>
                  	<a class="btn btn-danger" href="<?= base_url() ?>store_cat_assign/delete/<?= $row->id ?>" ><i class="fa fa-trash"></i> Delete Assign Category</a>
                  </td>
                </tr>
                <?php } ?>
            </table>
            </div>
	

	
	</div>
</div>
<?php } ?>
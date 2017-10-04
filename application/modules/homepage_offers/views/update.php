<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $head_line ?></h3>
    </div>
    <div class="box-body">
	<p style="color: green">Submit Item ID For Offer as request. When You Are Finished Adding ITem ID For Offers, Press'Finishing'</p>

	<?php $form_location = base_url()."homepage_offers/update"; ?>
	<form role="form" method="post" action="<?php echo $form_location; ?>">
	<input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
		<div class="form-group">
	      <label class="col-sm-2 control-label">New Offer:</label>

	      <div class="col-sm-10">
	        <input type="text" class="form-control" name="new_offer">
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
                  <th>Item</th>
                  <th>Action</th>
                </tr>
                <?php 
                $count = 0;
                foreach ($query->result() as $row) { 
                	$count++;
                	?>	         
                <tr>
                  <td><?= $count ?></td>
                  <td><?= $row->item_id ?></td>
                  <td>
                  	<a class="btn btn-danger" href="<?= base_url() ?>homepage_offers/delete/<?= $row->id ?>" ><i class="fa fa-trash"></i> Delete Offer option</a>
                  </td>
                </tr>
                <?php } ?>
            </table>
            </div>
	

	
	</div>
</div>
<?php } ?>
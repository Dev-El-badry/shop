<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $head_line ?></h3>
    </div>
      <?php $form_location = base_url()."store_countries/update"; ?>
  <form role="form" method="post" action="<?php echo $form_location; ?>">
    <div class="box-body">
	<p style="country_title: green">Submit New Option as request. When You Are Finished Adding New Country, Press'Finishing'</p>


	<input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
		<div class="form-group">
	      <label class="col-sm-2 control-label">New Option:</label>

	      <div class="col-sm-5">
	        <?php 
            $class=' class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1"';
           echo form_dropdown('country_title', $options, '', $class); ?>
	      </div>
        
	    </div><br><br>
<div class="form-group">
        <label class="col-sm-2 control-label">Price:</label>

        <div class="col-sm-5">
          <input type="text" class="form-control" name="country_price" id="exampleInputEmail1" placeholder="Enter Price For Shipping To This Country....">
        </div>
        
      </div> 
       <br>

	

	
	</div>
  <div class="box-footer text-center">
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
        <input type="submit" style="margin-left: 10px" name="submit" value="Finished" class="btn btn-waring" />
              </div>
              </form>
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
                  <th>Country</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
                <?php 
                $count = 0;
                $currency_symbol = $this->site_settings->_get_currency_symbol();
                foreach ($query->result() as $row) { 
                	$count++;
                	?>	         
                <tr>
                  <td><?= $count ?></td>
                  <td><?= $row->country_title ?></td>
                  <td><?= $row->country_price .' '.$currency_symbol ?> </td>
                  <td>
                  	<a class="btn btn-danger" href="<?= base_url() ?>store_countries/delete/<?= $row->id ?>" ><i class="fa fa-trash"></i> Delete Country option</a>
                  </td>
                </tr>
                <?php } ?>
            </table>
            </div>
	

	
	</div>
</div>
<?php } ?>
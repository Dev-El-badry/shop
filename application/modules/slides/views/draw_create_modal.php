
	
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
    <i class="fa fa-plus"></i>   <?= $this->lang->line('add_new_slides') ?>
  </button>
<br /><br />
 <div class="modal modal-success fade" id="modal-success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= $this->lang->line('add_new_record') ?></h4>
      </div> 
      <form class="form-horizontal" action="<?= $form_location ?>" method="POST">
      <div class="modal-body">
        <p><?= $this->lang->line('add_the_data_for_record') ?>&hellip;</p>
       
        	<?php 

        	echo form_hidden('parent_id', $parent_id);
        	?>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"><?= $this->lang->line('target_url') ?></label>

              <div class="col-sm-10">
                <input type="text" name="target_url" class="form-control" id="inputEmail3" placeholder="<?= $this->lang->line('enter_the_target_url_of_slide_optional') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label"><?= $this->lang->line('alt_text') ?></label>

              <div class="col-sm-10">
                <input type="text" name="alt_text" class="form-control" id="inputPassword3" placeholder="<?= $this->lang->line('enter_here_alt_text_optional') ?>">
              </div>
            </div>
            
        
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
        <button type="submit" name="submit" value="Submit" class="btn btn-outline"><?= $this->lang->line('submit') ?></button> &nbsp;&nbsp;
      </div>

        </form>
    
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div></div>
<!-- /.modal -->
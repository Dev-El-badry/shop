
	
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
    <i class="fa fa-plus"></i>  <?= $this->lang->line('add_btm_nav') ?>
  </button>
 <div class="modal modal-default fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= $this->lang->line('add_new_record') ?></h4>
      </div> 
      <form class="form-horizontal" action="<?= $form_location ?>" method="POST">
      <div class="modal-body">
        <p><?= $this->lang->line('add_the_for_record') ?>&hellip;</p>
       
        <div class="form-group" style="    margin: auto;
    width: 450px;
    text-align: center;">
           <label><?= $this->lang->line('webpages') ?>:</label>
        
        <?php
        $class = 'class="form-control"';
        echo form_dropdown('page_id', $options, '', $class);
        ?>
      </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
        <button type="submit" name="submit" value="Submit" class="btn btn-primary"><?= $this->lang->line('submit') ?></button> &nbsp;&nbsp;
      </div>

        </form>
    
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div></div>
<!-- /.modal -->
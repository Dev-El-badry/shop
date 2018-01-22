<h2><?= $headline ?></h2>
<a href="<?= base_url() ?>slides/update_group/<?= $parent_id ?>">
<button type="button" name="submit" value="Submit" class="btn btn-defautl"><?= $this->lang->line('pervious_page') ?></button>
</a><br /><br />
<?= Modules::run('slides/_get_btn_img') ?>
<?php 

$form_location = base_url() .'slides/view';
?>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $this->lang->line('update_slide_info') ?></h3>
    </div>
    <div class="box-body">
<form class="form-horizontal" action="<?= $form_location ?>" method="POST">
        	<?php 
        	echo form_hidden('update_id', $update_id);
        	echo form_hidden('parent_id', $parent_id);
        	?>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"><?= $this->lang->line('target_url') ?> <span style="color: green"><?= $this->lang->line('optional') ?>:</span></label>

              <div class="col-sm-10">
                <input type="text" name="target_url" value="<?= $target_url ?>" class="form-control" id="inputEmail3" placeholder="<?= $this->lang->line('enter_the_target_url_of_slide_optional') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label"><?= $this->lang->line('alt_text') ?> <span style="color: green"><?= $this->lang->line('optional') ?>:</span></label>

              <div class="col-sm-10">
                <input type="text" name="alt_text"  value="<?= $alt_text ?>" class="form-control" id="inputPassword3" placeholder="<?= $this->lang->line('enter_here_alt_text_optional') ?>">
              </div>
            </div>
            
     
      <div class="box-footer">
                <button type="submit" name="submit" value="Submit" class="btn btn-primary"><?= $this->lang->line('save_changes') ?></button>
                <button type="submit" name="submit" value="Cancel" class="btn btn-danger"><?= $this->lang->line('cancel') ?></button>
              </div>

        </form>
    </div>
</div>
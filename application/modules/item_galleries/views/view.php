<h2><?= $headline ?></h2>
<a href="<?= base_url() ?>item_galleries/update_group/<?= $parent_id ?>">
<button type="button" name="submit" value="Submit" class="btn btn-defautl">Pervious Page</button>
</a><br /><br />
<?= Modules::run('item_galleries/_get_btn_img') ?>
<?php 

$form_location = base_url() .'item_galleries/view';
?>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Update Item gallery Information </h3>
    </div>
    <div class="box-body">
<form class="form-horizontal" action="<?= $form_location ?>" method="POST">
        	<?php 
        	echo form_hidden('update_id', $update_id);
        	echo form_hidden('parent_id', $parent_id);
        	?>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Target URL <span style="color: green">(Optional):</span></label>

              <div class="col-sm-10">
                <input type="text" name="target_url" value="<?= $target_url ?>" class="form-control" id="inputEmail3" placeholder="Enter The Target URL Of Item gallery (OPTIONAL)">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Alt Text <span style="color: green">(Optional):</span></label>

              <div class="col-sm-10">
                <input type="text" name="alt_text"  value="<?= $alt_text ?>" class="form-control" id="inputPassword3" placeholder="Enter Here Alt Text (OPTIONAL)">
              </div>
            </div>
            
     
      <div class="box-footer">
                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Save Changes</button>
                <button type="submit" name="submit" value="Cancel" class="btn btn-danger">Cancel</button>
              </div>

        </form>
    </div>
</div>
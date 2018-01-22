<h1><?= $this->lang->line('manage_btm_nav') ?></h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <?= Modules::run('btm_nav/_draw_create_modal') ?>
<br> <br>
<?php if($num_rows <1) { 
  echo $this->lang->line('msg');

} else { ?>
 <div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="color: #f00"><?= $this->lang->line('btm_nav') ?></h3>

        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
      <?php 
       echo Modules::run('btm_nav/_get_sortable_list');
      ?>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
<?php } ?>
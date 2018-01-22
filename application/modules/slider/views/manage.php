<h1>Manage Slider</h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <a href="<?php echo base_url(); ?>slider/create" class="btn btn-primary"><i class="fa fa-plus"></i>  <?= $this->lang->line('add_new_slider') ?></a>
     
<br> <br>
<?php  

if ($num_rows<1) {
  echo 'Currently There Are Not Slider On Site';
} else {
?>
 <div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="color: #f00"><?= $this->lang->line('sliders') ?></h3>

        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th><?= $this->lang->line('slider_title') ?></th>
            <th><?= $this->lang->line('target_url') ?></th>
           

            <th><?= $this->lang->line('actions') ?></th>
          </tr>
          <?php  
          foreach ($items->result() as $row) {
          
          ?>
          <tr>

            <td><?= $row->slider_title ?> </td>
            <td><?= $row->target_url ?></td>
          



            <td>
              <a href="<?= base_url(); ?>slider/create/<?= $row->id ?>" ><i class="fa fa-edit"></i></a>
            </td>
          </tr>
          <?php   } ?>
 
      </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>  
<?php } ?>
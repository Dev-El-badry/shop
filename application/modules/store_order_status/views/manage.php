<h1>Manage Order Status Options</h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <a href="<?php echo base_url(); ?>store_order_status/create" class="btn btn-primary"><i class="fa fa-plus"></i>  <?= $this->lang->line('add_new_order_option') ?></a>
<br> <br>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color: #f00"><?= $this->lang->line('order_status_options') ?></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th><?= $this->lang->line('id') ?></th>
                  <th><?= $this->lang->line('status_title') ?></th>
                  <th><?= $this->lang->line('actions') ?></th>
                </tr>
               <?php
                foreach ($accounts->result() as $row) {
                
                ?>
                <tr>
                 <td><?= $row->id ?></td>
                  <td><?= $row->status_title ?></td>
                 
                  
                  <td>
                  	<a href="<?= base_url() ?>store_order_status/create/<?= $row->id ?>" ><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
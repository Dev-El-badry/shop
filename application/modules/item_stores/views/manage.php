<h1>Manage Products</h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <a href="<?php echo base_url(); ?>item_stores/create" class="btn btn-primary"><i class="fa fa-plus"></i>   <?= $this->lang->line('add_new_item') ?></a>
<br> <br>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color: #f00"><?= $this->lang->line('items_inventory') ?></h3>

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
                  <th><?= $this->lang->line('title') ?></th>
                  <th><?= $this->lang->line('price') ?></th>
                  <th><?= $this->lang->line('was_price') ?></th>
                  <th><?= $this->lang->line('status') ?></th>
                  <th><?= $this->lang->line('description') ?></th>
                  <th><?= $this->lang->line('actions') ?></th>
                </tr>
                <?php foreach ($items->result() as $row) { 
                	switch ($row->status) {
                		case 1:
                			$status_label = 'success';
                			$status = $this->lang->line('active');
                			break;

                		case 0:
                			$status_label = 'default';
                			$status = $this->lang->line('inactive');
                			break;
                	}
                ?>

                <tr>
                  <td><?= $row->id ?></td>
                  <td><?= $row->title_item ?></td>
                  <td><?= $row->price_item ?></td>
                  <td><?= $row->was_price ?></td>
                  <td><span class="label label-<?= $status_label ?>"><?= $status ?></span></td>
                  <td><?= $row->describtion_item ?></td>
                  <td>
                  	<a href="<?= base_url() ?>item_stores/create/<?= $row->id ?>" ><i class="fa fa-edit"></i></a>
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
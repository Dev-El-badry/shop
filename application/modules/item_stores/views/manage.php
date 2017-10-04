<h1>Manage Products</h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <a href="<?php echo base_url(); ?>item_stores/create" class="btn btn-primary"><i class="fa fa-plus"></i>   Add New Products</a>
<br> <br>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color: #f00">Items Inventory</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Price</th>
                  <th>Was Price</th>
                  <th>Status</th>
                  <th>Descrbtion</th>
                  <th>Change</th>
                </tr>
                <?php foreach ($items->result() as $row) { 
                	switch ($row->status) {
                		case 1:
                			$status_label = 'success';
                			$status = 'Active';
                			break;

                		case 0:
                			$status_label = 'default';
                			$status = 'Inactive';
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
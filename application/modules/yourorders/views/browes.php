<div class="box">
<div class="box-header">
  <h2 class="box-title" style="color: #f00">Your Orders</h2>
  <div class="box-tools">
    <div class="input-group input-group-sm" style="width: 150px;">
      
    </div>
  </div>
</div>
<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-hover table-striped">
                <tbody>
      <tr style="background-color: #666; color: #fff">
        <th>Date Created</th>
        <th>Order Ref</th>
       <th>Order Value</th>
       
        <th>Order Status</th>
      
        <th>Actions</th>
      </tr>
      <?php 

      foreach ($query_bro->result() as $row) { 

      
      	
      	$date_created = $this->timedate->get_nice_date($row->date_created, 'full');
      	$order_status = $row->order_status;
      	$status_title_order = $status_title[$order_status];
      ?>

      <tr>
        <td><?= $date_created ?></td>
        <td><?= $row->order_ref ?></td>
        <td><?= $row->mc_gross ?></td>
        
        
        
        <td><span><?= $status_title[$row->order_status] ?></span></td>
        
        <td>
        	
          <a href="<?= base_url() ?>yourorders/view/<?= $row->order_ref ?>" title="Open" class="btn btn-default"><i class="fa fa-eye fa-fw"></i></a>
        </td>
      </tr>
      <?php } ?>
  </tbody>
    </table>
</div></div>
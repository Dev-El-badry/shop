<h1>Manage Orders</h1>
 <h3>Status: <?= $status_title; ?></h3>
 <?php
        if (isset($flash)) {
          echo $flash;
        }

    function _get_customer_name($first_name, $last_name, $company_name) {
		$data['company'] = trim(ucfirst($company_name));
		$data['fistname'] = trim(ucfirst($first_name));
		$data['lastname'] = trim(ucfirst($last_name));
		
		//var_dump($data); die;
		
		if($data=='') {
			$customer_name = $this->lang->line('unknown');
		} else {
			$company = $data['company'];
			$fistname = $data['fistname'];
			$lastname = $data['lastname'];

			$customer_name = $fistname . " " .$lastname;
		
			$company_length = strlen($company);
			if($company_length > 2) {
				$customer_name .= " from ".$company;
			}

		}
	
		return $customer_name;
        }
      ?>
 <a href="https://www.paypal.com" class="btn btn-primary"><i class="fa fa-eye"></i> &nbsp;  <?= $this->lang->line('view_paypal') ?></a>
<br> <br>
<?php

if($num_rows<1) {
  echo $this->lang->line('num_rows');
} else {

?>
 <div class="row">
  <div class="col-xs-12">
  <div class="box">
  <div class="box-header">
    <h3 class="box-title" style="color: #f00"><?= $this->lang->line('manage_orders') ?></h3>

    <div class="box-tools">
      <div class="input-group input-group-sm" style="width: 150px;">
        
      </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
        <th><?= $this->lang->line('date_created') ?></th>
        <th><?= $this->lang->line('order_ref') ?></th>
       <th><?= $this->lang->line('order_value') ?></th>
        <th><?= $this->lang->line('customer_name') ?></th>
        <th><?= $this->lang->line('order_status') ?></th>
        <th><?= $this->lang->line('opened') ?></th>
        
        <th><?= $this->lang->line('actions') ?></th>
      </tr>
      <?php 

      foreach ($query->result() as $row) { 
      	switch ($row->opened) {
      		case 1:
      			$status_label = 'success';
      			$status = $this->lang->line('opened');
      			break;

      		case 0:
      			$status_label = 'danger';
      			$status = $this->lang->line('unopened');
      			break;
      	}

      	if(isset($row->status_title)) {
      		$order_status = $row->status_title;
      	} else {
      		$order_status = $this->lang->line('order_submitted');
      	}
      	

      	$date_created = $this->timedate->get_nice_date($row->date_created, 'full');
      ?>

      <tr>
        <td><?= $date_created ?></td>
        <td><?= $row->order_ref ?></td>
        <td><?= $row->mc_gross ?></td>
        <td><?= _get_customer_name($row->fistname, $row->lastname, $row->company) ?></td>
        <td><?= $order_status ?></td>
        
        <td><span class="label label-<?= $status_label ?>"><?= $status ?></span></td>
        
        <td>
        	
          <a href="<?= base_url() ?>store_orders/view/<?= $row->id ?>" title="Open" class="btn btn-default"><i class="fa fa-eye fa-fw"></i></a>
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
  <?php } ?>

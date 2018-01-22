<?php

        if (isset($flash)) {
          echo $flash;
        }
    
if (isset($update_id)) {


 if (is_numeric($update_id)): ?>
 <h2><?= $this->lang->line('order'); ?>: <?= $order_ref ?> </h2>

  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $this->lang->line('order_status'); ?>: <?= $status_title ?> </h3>
    </div>
    <div class="box-body">
   
     <div class="row">
      	<div class="col-md-8">
       	<form role="form" method="post" action="<?php echo base_url(); ?>store_orders/update_order_status">


		  
	          <input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
	         
	        <div class="form-group">
	            <label> 
                <?= $this->lang->line('label'); ?>
	            	
	            </label> 
	            <?php
	             $class = 'class="form-control" style="    max-width: 40%;"';
	        	echo form_dropdown('order_status', $options, $order_status, $class);
	        	 ?>
	      
			</div>
		<div class="clearfix"></div>
	            
	  
		 
	        
	    <div class="box-footer">
               <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit"><?= $this->lang->line('submit'); ?></button>
	        <button type="submit" name="submit" class="btn btn-lg btn-default" value="Cancel"><?= $this->lang->line('cancel'); ?></button>
	        
              </div>
	

	</form>
     </div>
 </div>
</div>
</div>

  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $this->lang->line('delivery_accounts'); ?></h3>
    </div>
    <div class="box-body">
   
     <div class="row">
        <div class="col-md-8">
        <form role="form" method="post" action="<?php echo base_url(); ?>store_orders/update_shipping">


      
            <input type="hidden" name="update_id" value="<?php echo isset($update_id) ? $update_id : ''; ?>" />
           
          <div class="form-group">
              <label> 
                <?= $this->lang->line('label2'); ?>
                
              </label> 
              <?php
               $class = 'class="form-control" style="    max-width: 40%;"';
              echo form_dropdown('shipper_id', $options_shippers, $shipper_id, $class);
             ?>
        
      </div>
    <div class="clearfix"></div>
              
    
     
          
      <div class="box-footer">
               <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit"><?= $this->lang->line('submit'); ?></button>
          <button type="submit" name="submit" class="btn btn-lg btn-default" value="Cancel"><?= $this->lang->line('cancel'); ?></button>
          
              </div>
  

  </form>
     </div>
 </div>
</div>
</div>

<?php endif ;
}
?>

<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $head_line; ?></h3>
    </div>
    <div class="box-body">
    	<p class="pull-right">
	        <a href="<?= base_url(); ?>store_accounts/create/<?= $shopper_id ?>" class="btn btn-success ad-click-event">
	           <?= $this->lang->line('edit_account_details'); ?>
	        </a>
	    </p>
      	
      		<table class="table table-bordered">
                <tbody>
                <tr>
                  <th class="col-md-2"><?= $this->lang->line('first_name'); ?>: </th>
                  <th><?= $account_details['fistname'] ?></th>
                </tr>
               <tr>
                  <th class="col-md-2"><?= $this->lang->line('last_name'); ?>: </th>
                  <th><?= $account_details['lastname'] ?></th>
                </tr>
                <tr>
                  <th class="col-md-2"><?= $this->lang->line('company_name'); ?>: </th>
                  <th><?= $account_details['company'] ?></th>
                </tr>
                <tr>
                  <th class="col-md-2"><?= $this->lang->line('telephone_number'); ?>: </th>
                  <th><?= $account_details['telnum'] ?></th>
                </tr>
                 <tr>
                  <th class="col-md-2" style="valign: top"><?= $this->lang->line('customer_details'); ?>: </th>
                  <th style="valign: top"><?= $customer_address ?></th>
                </tr>
                
              </tbody>
          </table>
		
	</div>
</div>
<?php 

if($shipping_details != '') {
?>
<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $this->lang->line('shipper_details'); ?></h3>
    </div>
    <div class="box-body">
      <p class="pull-right">
          <a href="<?= base_url(); ?>store_shippers/create/<?= $shipper_id ?>" class="btn btn-success ad-click-event">
            <?= $this->lang->line('edit_account_details'); ?> 
          </a>
      </p>
        
          <table class="table table-bordered">
                <tbody>
                <tr>
                  <th class="col-md-2"><?= $this->lang->line('first_name'); ?>: </th>
                  <th><?= $shipping_details['firstname'] ?></th>
                </tr>
               <tr>
                  <th class="col-md-2"><?= $this->lang->line('last_name'); ?>: </th>
                  <th><?= $shipping_details['lastname'] ?></th>
                </tr>
                <tr>
                  <th class="col-md-2"><?= $this->lang->line('company_name'); ?>: </th>
                  <th><?= $shipping_details['company'] ?></th>
                </tr>
                <tr>
                  <th class="col-md-2"><?= $this->lang->line('telephone_number'); ?>: </th>
                  <th><?= $shipping_details['tel'] ?></th>
                </tr>
                 <tr>
                  <th class="col-md-2" style="valign: top"><?= $this->lang->line('shipper_details'); ?>: </th>
                  <th style="valign: top"><?= $customer_address ?></th>
                </tr>
                
              </tbody>
          </table>
    
  </div>
</div>
<?php } ?>
<?php 
$type_user = 'private';
echo Modules::run('cart/_draw_cart_content', $type_user, $query_ss); ?>
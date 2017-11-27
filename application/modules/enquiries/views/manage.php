<h1><?php $folder_type ?></h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        } else {
          echo $this->session->flashdata('item');
        }
      ?>
<style type="text/css">
  .urgent {
    color: #f00
  }
</style>
      
 <a href="<?php echo base_url(); ?>enquiries/create" class="btn btn-primary">    Compose Message</a>
<br> <br>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color: #f00">Inbox</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-striped">
                <tr>
                  <th>&nbsp;</th>
                  <th>Date Sent</th>
                  <th>Sent By</th>
                  <th>Subject</th>
                  <th>Actions</th>
                </tr>
                <?php
                $this->load->module('store_accounts');
                $this->load->module('timedate');

                foreach ($items->result() as $row) {
                    $date_created = $row->date_created;
                    
                    $sent_by = $row->sent_by;
                    $subject = $row->subject;

                    $customer_data['firstname'] = $row->fistname;
                    $customer_data['lastname'] = $row->lastname;
                    $customer_data['company'] = $row->company;

                    $opened = $row->opened;
                    $id =$row->id;      
                    if($sent_by == 0) {
                      $customer_name = "Admin"; 
                    } else {      
                      $customer_name =$this->store_accounts->_get_customer_name($sent_by, $customer_data);
                    
                    }
                    if($opened == 1) {
                      $icon = '<i class="fa fa-envelope-o fa-fw fa-lg"></i>';
                    } elseif($opened == 0) {
                      $icon = '<p style="color: orange"><i  class="fa fa-envelope fa-fw fa-lg"></i></p>';
                    }

                   

                    $view_url = base_url() . 'enquiries/view/' . $id;
                ?>

                <tr class="<?php
                if($row->urgent == 1) {
                  echo 'urgent';
                }
                 ?>">
                    <td><?= $icon ?></td>
                    <td><?php
  
                   echo  $this->timedate->get_nice_date($date_created, 'cool');
                     ?></td>
                    
                    <td><?= $customer_name ?></td>
                    <td><?= $subject ?></td>
                    <td>
                      <a href="<?= $view_url ?>" title="Open" class="btn btn-default"><i class="fa fa-eye fa-fw"></i></a>
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
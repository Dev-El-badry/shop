<h1>Manage Users</h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <a href="<?php echo base_url(); ?>store_users/create" class="btn btn-primary"><i class="fa fa-plus"></i>   Add New User</a>
<br> <br>
<?php 
if($num_rows <1){
  echo 'Current You not have users in your admin panel';
} else {
?>
 <div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="color: #f00">Users Inventory</h3>

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
            <th>Username</th>
            <th>Fisrt Name</th>
            <th>Last Name</th>
            <th>Function</th>
            <th>Date Created</th>
            <th>Actions</th>
           
          </tr>
         <?php
          foreach ($accounts->result() as $row) {
           $this->load->module('timedate');
           $date_created = $this->timedate->get_nice_date($row->date_created, 'cool');
          ?>
          <tr>
           <td><?= $row->id ?></td>
            <td><?= $row->username ?></td>
            <td><?= $row->firstname ?></td>
            <td><?= $row->lastname ?></td>
            <td><?= $row->function ?></td>

            <td><?= $date_created ?></td>
            
            <td>
            	<a href="<?= base_url() ?>store_users/create/<?= $row->id ?>" ><i class="fa fa-edit"></i></a>
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
  <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
       <a href="<?= base_url() ?>store_roles/manage" class="btn btn-default">
                Perivous Page</a><br><br>
<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">
      	<?php echo $head_line; ?></h3>
    </div>
    <div class="box-body">
      <?php 
      $class = 'class="form-horizontal"';
      $form_location = base_url().'store_roles/create';
      echo form_open($form_location, $class);
      if(isset($update_id)) {
      echo form_hidden('update_id', $update_id);
      }
      ?>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Name Of Right Access: </label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="role_title" value="<?= $role_title ?>" id="inputEmail3" placeholder="Enter Here The Name Of Right Access">
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-xs-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              

              <h3 class="box-title">Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_items', $options, $show_items, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
         <div class="col-xs-4">
          <div class="box box-success">
            <div class="box-header with-border">
              

              <h3 class="box-title">Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_orders', $options, $show_orders, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box box-default">
            <div class="box-header with-border">
              

              <h3 class="box-title">Order Status Options</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_order_status', $options, $show_order_status, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              

              <h3 class="box-title">Slides</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_sliders', $options, $show_sliders, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
         <div class="col-xs-4">
          <div class="box box-success">
            <div class="box-header with-border">
              

              <h3 class="box-title">Home Blocks</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_home_blocks', $options, $show_home_blocks, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box box-default">
            <div class="box-header with-border">
              

              <h3 class="box-title">Web Pages</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_webpages', $options, $show_webpages, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

<div class="row">
        <div class="col-xs-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              

              <h3 class="box-title">Manage Bottom Navigation</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_btm_nav', $options, $show_btm_nav, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
         <div class="col-xs-4">
          <div class="box box-success">
            <div class="box-header with-border">
              

              <h3 class="box-title">Blogs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_blogs', $options, $show_blogs, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box box-default">
            <div class="box-header with-border">
              

              <h3 class="box-title">Accounts</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_accounts', $options, $show_accounts, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-xs-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              

              <h3 class="box-title">Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_categories', $options, $show_categories, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
         <div class="col-xs-4">
          <div class="box box-success">
            <div class="box-header with-border">
              

              <h3 class="box-title">Messages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_enquiries', $options, $show_enquiries, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box box-default">
            <div class="box-header with-border">
              

              <h3 class="box-title">Right Of Access</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_right_access', $options, $show_right_access, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-xs-4">
          <div class="box box-default">
            <div class="box-header with-border">
              

              <h3 class="box-title">Shipping</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_delivers', $options, $show_delivers, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box box-default">
            <div class="box-header with-border">
              

              <h3 class="box-title">Sellers</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_sellers', $options, $show_sellers, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box box-default">
            <div class="box-header with-border">
              

              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
             <div class="">
              <label>Manage: </label>
              <?php
              $status='';
                $class = 'class="form-control"';
                $options = array(
               
                '0'        => 'No',
                '1'        => 'Yes'
            );

            echo form_dropdown('show_users', $options, $show_users, $class);
              ?>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        </div>
      </div>
      

<div class="box-footer">
  <button type="submit" name="submit" value="Submit" class="btn btn-primary">Save Changes</button>
                <button type="submit" name="submit" value="Cancel" class="btn btn-danger">Cancel</button>
                
              </div>
      <?php
      echo form_close();
      ?>
	</div>
</div>

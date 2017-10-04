<h1>Manage Categories</h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <a href="<?php echo base_url(); ?>store_category/create" class="btn btn-primary"><i class="fa fa-plus"></i>   Add New Category</a>
<br> <br>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color: #f00">Category</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <?php 
             echo Modules::run('store_category/_get_sortable_list', $cat_parent_id);
            ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
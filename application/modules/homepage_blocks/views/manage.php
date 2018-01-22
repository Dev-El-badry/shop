<h1><?= $this->lang->line('manage_home_page_blocks') ?></h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <a href="<?php echo base_url(); ?>homepage_blocks/create" class="btn btn-primary"><i class="fa fa-plus"></i>   <?= $this->lang->line('add_new_home_block') ?></a>
<br> <br>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color: #f00"><?= $this->lang->line('home_page_blocks') ?></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <?php 
             echo Modules::run('homepage_blocks/_get_sortable_list');
            ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
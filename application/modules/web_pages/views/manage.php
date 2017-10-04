<h1>Content Management System</h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <a href="<?php echo base_url(); ?>web_pages/create" class="btn btn-primary"><i class="fa fa-plus"></i>   Add New Page</a>
<br> <br>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color: #f00">CMS</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Page Url</th>

                  <th>Page Title</th>

                  <th>Actions</th>
                </tr>
                <?php foreach ($items->result() as $row) {

                ?>

                <tr>
                  <td><?= base_url().$row->page_url ?></td>

                  <td><?= $row->page_title ?></td>



                  <td>
                  	<a href="<?= base_url() ?>web_pages/create/<?= $row->id ?>" ><i class="fa fa-edit"></i></a>
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
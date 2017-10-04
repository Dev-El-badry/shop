<h1>Blog</h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <a href="<?php echo base_url(); ?>blogs/create" class="btn btn-primary"><i class="fa fa-plus"></i>   Add New Blog</a>
<br> <br>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color: #f00">Blogs</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Picture</th>
                  <th>Date Published</th>
                  <th>Blog Url</th>

                  <th>Blog Title</th>

                  <th>Actions</th>
                </tr>
                <?php

                foreach ($items->result() as $row) {
                    $picture = $row->picture;
                    $date = $row->date_published;
                    $date_published = $this->timedate->get_nice_date($date, 'cool');
                    $thumb_name = str_replace('.', '_thumb.', $picture);
                    $thumb_url = base_url(). 'blog_pics/' . $thumb_name;
                ?>

                <tr>

                  <td><img src="<?= $thumb_url ?>" class="img-responsive img-thumbnail" alt="" /> </td>
                  <td><?= $date_published ?></td>
                  <td><?= base_url().$row->blog_url ?></td>

                  <td><?= $row->blog_title ?></td>



                  <td>
                  	<a href="<?= base_url() ?>blogs/create/<?= $row->id ?>" ><i class="fa fa-edit"></i></a>
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
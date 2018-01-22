<h1><?= $headline ?>
</h1>
<h4><?= $sub_headline; ?></h4>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
        <a href="<?= base_url(); ?>item_stores/create/<?= $parent_id ?>" >
                <button class="btn btn-default">
                Pervious Page
              </button>
              </a>
  <a href="<?= base_url(); ?>item_galleries/upload_image/<?= $parent_id ?>" >
    <button type="button" class="btn btn-success">
    <i class="fa fa-plus"></i>   Update Pictures
  </button></a><br><br>
       <?php 
       if($num_rows <1) {
        echo 'Currently There are Not Item Galleries To Show in '.$parent_title;
       } else {
        ?>
      

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="color: #f00">Item Galleries</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-bordered" style="padding: 30px">
          <tbody>
            <?php 
            foreach ($item_galleries->result() as $row) {
            ?>
            
            <tr>
              <td><img src="<?= base_url() ?>item_galleries_pics/<?= $row->picture ?>" class="img-responsive img-thumbnail"></td>
              <td>


               <a href="<?= base_url(); ?>item_galleries/deleteconif/<?= $row->id ?>" >
                <button class="btn btn-danger">
                <i class="fa fa-trash"></i>
              </button>
              </a>

            </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php } ?>
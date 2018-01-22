<h1<?= $headline ?></h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
        <a href="<?= base_url(); ?>slider/manage" >
                <button class="btn btn-default">
                Pervious Page
              </button>
              </a>
<?= Modules::run('slides/_draw_create_modal', $parent_id) ?>
       <?php 
       if($num_rows <1) {
        echo $this->lang->line('msg');
       } else {
        ?>
      

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="color: #f00"><?= $this->lang->line('slides') ?></h3>

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
            foreach ($slides->result() as $row) {
            ?>
            
            <tr>
              <td><img src="<?= base_url() ?>slider_pics/<?= $row->picture ?>" class="img-responsive img-thumbnail"></td>
              <td>

                <?php 
                if($row->target_url != '') { 
                  ?>
                 <a href="<?= $row->target_url ?>" >
                <button class="btn btn-default">
                <i class="fa fa-eye"></i>
              </button>
              </a> <br /> <br/>
                <?php
                }
                ?>

               <a href="<?= base_url(); ?>slides/view/<?= $row->id ?>" >
                <button class="btn btn-primary">
                <i class="fa fa-edit"></i>
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
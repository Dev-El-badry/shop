<style type="text/css">
	.fa-check-square {
		color: green;
	}

	.fa-close {
		color: red
	}
</style>

<h1>Manage Rights Of Access</h1>
 <?php
        if (isset($flash)) {
          echo $flash;
        }
      ?>
 <a href="<?php echo base_url(); ?>store_roles/create" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;  Add New Right Of Access</a>
<br> <br>

<?php 
if($num_rows <1) {
	echo 'Currently You Not Have Users On Site Yet !';
} else {
 ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" style="color: #f00">Manage Rights Of Access</h3>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
			<table class="table table-main table-rights table-striped">
		      <tbody>
		      	<?php foreach ($query->result() as $row) {

		      		if($row->show_items >0) {
		      			$icon_items = 'check-square'; 
		      		} else {
		      			$icon_items = 'close';
		      		}

		      		if($row->show_orders >0) {
		      			$icon_orders = 'check-square'; 
		      		} else {
		      			$icon_orders = 'close';
		      		}

		      		if($row->show_order_status >0) {
		      			$icon_order_status = 'check-square'; 
		      		} else {
		      			$icon_order_status = 'close';
		      		}

		      		if($row->show_sliders >0) {
		      			$icon_sliders = 'check-square'; 
		      		} else {
		      			$icon_sliders = 'close';
		      		}

		      		if($row->show_home_blocks >0) {
		      			$icon_home_blocks = 'check-square'; 
		      		} else {
		      			$icon_home_blocks = 'close';
		      		}

		      		if($row->show_webpages >0) {
		      			$icon_webpages = 'check-square'; 
		      		} else {
		      			$icon_webpages = 'close';
		      		}

		      		if($row->show_btm_nav >0) {
		      			$icon_btm_nav = 'check-square'; 
		      		} else {
		      			$icon_btm_nav = 'close';
		      		}

		      		if($row->show_blogs >0) {
		      			$icon_blogs = 'check-square'; 
		      		} else {
		      			$icon_blogs = 'close';
		      		}

		      		if($row->show_accounts >0) {
		      			$icon_accounts = 'check-square'; 
		      		} else {
		      			$icon_accounts = 'close';
		      		}

		      		if($row->show_delivers >0) {
		      			$icon_delivers = 'check-square'; 
		      		} else {
		      			$icon_delivers = 'close';
		      		}

		      		if($row->show_sellers >0) {
		      			$icon_sellers = 'check-square'; 
		      		} else {
		      			$icon_sellers = 'close';
		      		}

		      		if($row->show_users >0) {
		      			$icon_users = 'check-square'; 
		      		} else {
		      			$icon_users = 'close';
		      		}

		      		if($row->show_categories >0) {
		      			$icon_categories = 'check-square'; 
		      		} else {
		      			$icon_categories = 'close';
		      		}

		      		if($row->show_enquiries >0) {
		      			$icon_enquiries = 'check-square'; 
		      		} else {
		      			$icon_enquiries = 'close';
		      		}

		      		if($row->show_right_access >0) {
		      			$icon_right_access = 'check-square'; 
		      		} else {
		      			$icon_right_access = 'close';
		      		}
		      	?>
		      	
		       <tr>
		          <td>
		          	<?php 
		          	if(($row->role_title == 'Admin') OR ($row->role_title == 'admin') OR ($row->id == 1)) { 
		          	?>
		          <span class="badge">Admin</span>  
		          <?php } else { ?>
		           <a href="<?= base_url() ?>store_roles/deleteconif/<?= $row->id ?>" class="btn btn-danger">
		          	<i class="fa fa-trash"></i>  Delete</a> 
		          	 <a href="<?= base_url() ?>store_roles/create/<?= $row->id ?>" class="btn btn-primary">
		          	<i class="fa fa-edit"></i>  Edit</a> 
		          	<?php } ?>        
		         
		          </td>
		          <td>
		          <h3 class="role_name"><?= $row->role_title ?></h3>          
		      	  </td>

		          <td style="max-width: 100px">
		            <p class=" ">
		            	Manage Item: <span class="w3-badge w3-green">
		            					<i class="fa fa-<?= $icon_items ?> fa-fw fa-lg" ></i>
		            				 </span>
		            </p> 
		            <p class=" ">
		            	Manage Orders: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_orders ?>  fa-fw fa-lg"></i></span>
		            </p> 
		            <p class=" ">
		            	Manage Order Status Options: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_order_status ?> fa-fw fa-lg" ></i></span>
		            </p> 
		             <p class=" ">
		            	Manage Sliders: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_sliders ?> fa-fw fa-lg" ></i></span>
		            </p> 
		            <p class=" ">
		            	Manage Home Blocks: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_home_blocks ?> fa-fw fa-lg" ></i></span>
		            </p> 
		            <p class=" ">
		            	Manage Web Pages: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_webpages ?> fa-fw fa-lg" ></i></span>
		            </p> 
		             <p class=" ">
		            	Manage Bottom Navgation: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_btm_nav ?> fa-fw fa-lg" ></i></span>
		            </p> 
		            <p class=" ">
		            	Manage Blogs: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_blogs ?> fa-fw fa-lg" ></i></span>
		            </p> 
		            <p class=" ">
		            	Manage Accounts: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_accounts ?> fa-fw fa-lg" ></i></span>
		            </p> 
		             <p class=" ">
		            	Manage Categories: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_categories ?> fa-fw fa-lg" ></i></span>
		            </p> 
		            <p class=" ">
		            	Manage Messages: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_enquiries ?> fa-fw fa-lg" ></i></span>
		            </p> 
		            <p class=" ">
		            	Manage Right Of Access: <span class="w3-badge w3-green"><i class="fa fa-<?= $icon_right_access ?> fa-fw fa-lg" ></i></span>
		            </p> 
		           
		          </td>
		        </tr>
		        <?php } ?>
		      </tbody>
		    </table>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<ul class="nav navbar-nav">
<?php
	$this->load->module('store_category');
	foreach ($query->result() as $row) {
		
	$cat_name = $row->cat_name;
	$cat_parent_id = $row->id;
?>
  <li class="dropdown">
    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $cat_name ?> <span class="caret"></span></a>
    <ul class="dropdown-menu">
    <?php 
    	$query = $this->store_category->get_where_custom('cat_parent_id', $cat_parent_id);
    	foreach ($query->result() as $row) {
    		echo '<li><a href="'.$target_url_start.$row->cat_url.'">'.$row->cat_name.'</a></li>';
    	}
    ?>
    
    </ul>
  </li>
 <?php } ?>
</ul>


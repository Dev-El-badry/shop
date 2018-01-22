<li class="treeview">
<a href="#">
<i class="fa fa-reorder"></i> <span><?= $this->lang->line('manage_orders'); ?></span>
<span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
	<li ><a href="<?= base_url() ?>store_orders/browes/status0"><i class="fa fa-circle-o"></i><?= $this->lang->line('order_submitted'); ?> </a></li>
	<?php 
	foreach ($query_lnl->result() as $row) {
	?>

<li ><a href="<?= base_url() ?>store_orders/browes/status<?= $row->id ?>"><i class="fa fa-circle-o"></i> <?= $row->status_title ?></a></li>
	<?php
	}
	?>

</ul>
</li>
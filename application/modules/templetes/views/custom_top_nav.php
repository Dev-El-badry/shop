<?php
	function _attempt_class_active($text_link) {
		if(current_url() == $text_link) {
			echo 'class="active"';
		} else {
			echo '';
		}
	}
?>
<ul class="nav nav-tabs" style="margin-top: 20px">
  <li role="presentation" <?php _attempt_class_active(base_url().'startacconut/welcome'); ?> ><a href="<?= base_url(); ?>startacconut/welcome">Your Messages</a></li>
  <li role="presentation"><a href="#">Update Profile</a></li>
  <li role="presentation"><a href="#">Your Orders</a></li>
  <li role="presentation"><a href="<?= base_url() ?>startacconut/logout">Logout</a></li>
</ul>
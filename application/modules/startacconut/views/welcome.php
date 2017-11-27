<?php
	//$full_url = base_url() . 'enquiries/_draw_customer_inbox/' . $customer_id;

	echo Modules::run('enquiries/_draw_customer_inbox', $customer_id);
?>


<h1>Your Shopping Basket</h1>
<?php

	if($num_rows <1) {
		echo 'You Currently Have No Items In Your Basket';
	} else {
		echo "<p>".$statment_showing."</p>";
		$type_user = "public";
		echo Modules::run('cart/_draw_cart_content', $type_user, $query1);
		echo Modules::run('cart/_attampt_draw_checkout_btn', $query1);
	}
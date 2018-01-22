<h2>Order <?= $third_bit ?></h2>
<h5>Date Created: <?= $date_created ?></h5>
<h5>Order Status: <?= $order_status ?></h5>

<?php
$type_user = "public";
echo Modules::run('cart/_draw_cart_content', $type_user, $query_ss);
?>
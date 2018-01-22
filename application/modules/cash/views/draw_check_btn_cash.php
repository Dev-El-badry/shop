<?php

echo form_open($form_location);

echo form_hidden('custom', $custom);
$count =0;
foreach ($query->result() as $row) {
	$count++;
	echo form_hidden('item_title_'.$count, $row->item_title);
	echo form_hidden('item_qty_'.$count, $row->item_qty);
	echo form_hidden('item_price_'.$count, $row->price);
	
	if($row->item_color != '') {

		echo form_hidden('item_color_'.$count, $row->item_color);
	}

	if($row->item_size != '') {
		echo form_hidden('item_size_'.$count, $row->item_size);
	}

	echo form_hidden('num_of_count', $count);
}

echo form_hidden('shipping', $shipping);
?>

<div class="" style="text-align: center;">
<button class="btn btn-primary" name="submit">
	<span class="glyphicon glyphicon-shopping-cart"></span>
		Pay By Cash
</button>
</div>
<?php

echo form_close();
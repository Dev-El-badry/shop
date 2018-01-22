 <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Customer's Basket</h3>
    </div>
    <div class="box-body">
   
   
      		<table class="table table-bordered">
			<?php
				$grand_total = 0;
				
				foreach ($query_ss->result() as $row) {
					
				$price = $row->price;
				$Price = number_format($price, 2);
				$sub_total = $row->price*$row->item_qty;
				$sub_total_desc = number_format($sub_total, 2);
				
				$grand_total = $grand_total + $sub_total;

			?>
			<tr>
				<td class="col-md-2">
					<img src="<?= base_url(); ?>small_pics/<?= $row->small_img ?>" class="img-responsice img-tdumbnail" />
				</td>
				<td class="col-md-8">
					Item Number: <?= $row->item_id; ?><br>
					<strong><?= $row->item_title ?></strong><br>
					Item Price: &pound; <?= $price ?><br><br>
					QUANTITY: <?= $row->item_qty ?><br><br>
					
				</td>
				
				<td class="col-md-2"><?= $sub_total_desc ?></td>

			</tr>
			<?php  } ?>
			<tr>
				<td colspan="2" style="text-align: right;font-weight: bold">Shipping: </td>
				<td style="font-weight: bold">
					<?php 
					echo $shipping;
					$grand_total = $grand_total + $shipping;
					?>
				</td>
			</tr>
			<tr>

				<td colspan="2" style="text-align: right;font-weight: bold">total</td>
				<td style="font-weight: bold">
					<?php
						$grand_total_desc = number_format($grand_total, 2);

						echo $grand_total_desc ;
					?>
				</td>
			</tr>
		</table>
     
</div>
</div>
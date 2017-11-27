<?php
	$form_location = base_url() . 'store_basket/add_to_basket';
?>
<div class="add-to-cart" style="background-color: #ddd;padding: 5px ; border-radius: 5px">
	
	<form action="<?= $form_location ?>" method="post">
		<div class="form-group" style="margin-left: 16px">
			<label class="colspan-2">ID Item: <?= $id ?></label>
		</div>
		<!-- Start Section Colors Option -->
			<?php if ($num_row > 0) { ?>
			<div class="form-group" style="margin-top: 5px">
				<div class="col-sm-3"><label>Colors:</label></div>
				<div class="col-sm-9">
				<?php
			      	$class = 'class="form-control"';
			      	
					echo form_dropdown('submitted_color', $color_option, $submitted_color, $class);
			    ?> 
				</div>
			</div>
		<?php } ?>
		<!-- End Section Colors Option -->

		<!-- Start Section Sizes Option -->
		<?php if ($num_row_size > 0) { ?>
			<div class="form-group">
				<div class="col-sm-3"><label>Sizes:</label></div>
				<div class="col-sm-9">
				<?php
			      	$class = 'class="form-control"';
			      	
					echo form_dropdown('submitted_size', $size_option, $submitted_size, $class);
			    ?> 
				</div>
			</div>
		<?php } ?>
		<!-- End Section Sizes Option -->

		<!-- Start Section Quantity -->
		<div class="form-group">
			<div class="col-sm-3"><label>Qty:</label></div>
			<div class="col-sm-6"><input type="text" class="form-control" name="item_qty"></div>			
		</div>
		<?php 
		echo form_hidden('item_id', $id);
		?>
		<!-- End Section Quantity -->
		<div class="form-group colspan-2 text-center" >
		    <button type="submit" name="submit" value="Submit" style="margin-top: 8px" class="btn btn-primary">ADD TO CART</button>
		</div>
	</form>
</div>
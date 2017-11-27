<h3>Would You Like To Create Account With Us? </h3>

<div class="" style="margin-top: 36px; text-align: center">
	<?php
	$form_location = base_url().'cart/submit_chiose';
	echo form_open($form_location);
	echo form_hidden('checkout_token', $checkout_token);
	?>

	<button name="submit" type="submit" value="Yes-Let's Do It" class="btn btn-primary">
		<span class="glyphicon glyphicon-thumbs-up"></span>
	Yes-Let's Do It</button>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<button name="submit" type="submit" value="No-Thanks" class="btn btn-danger">
		<span class="glyphicon glyphicon-thumbs-down"></span>
	No-Thanks</button>&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="<?php echo base_url(); ?>startacconut/draw_login_form" class="btn btn-success" >
		
			<span class="glyphicon glyphicon-log-in"></span>
		Aleardy Have Account
	</a>

	<?php
	echo form_close();
	?>
</div>
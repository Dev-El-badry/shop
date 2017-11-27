<h3><?= $head_line; ?></h3>
<div class="row">
	<div class="col-md-12 ">
		<?php
			$form_url = current_url();
		?>
		<form action="<?php echo $form_url; ?>" method="POST" style="margin-top: 20px">
			<div class="form-group">
				
				<label>Subject: </label>
				<input type="text" name="subject" value="<?php echo $subject ?>" class="form-control" />

			</div>
			<div class="form-group" >
				
				<label>Message: </label>
				<textarea style="height: 200px" name="message" class="form-control"><?php echo $message ?></textarea>

			</div>
			<div class="form-group">
				
				<input type="checkbox" value="" name="urgent" <?php
					if($urgent == 1) {
						echo 'checked';
					} else {
						echo '';
					}
				 ?>  /> Urgent

			</div>
			<?php
			echo form_hidden('token', $token);
			echo form_hidden('code', $code);
			?>
			<div class="form-group" style="display: inline-block;">
				<button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit To Send Message</button>
				<button type="submit" class="btn btn-danger" name="submit" value="Cancel">Back</button>
			</div>
		</form>
	</div>
</div>
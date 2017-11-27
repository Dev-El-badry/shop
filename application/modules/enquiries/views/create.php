
<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $head_line; ?></h3>
    </div>
    <div class="box-body">

    
      <div class="row">
	<div class="col-md-8 col-md-offset-2">
	<?php echo validation_errors('<p style="color: red;">', '</p>'); ?>

	<form role="form" method="post" action="<?php echo base_url(); ?>enquiries/create">

  <?php if(!isset($sent_by)) { ?>
<div class="form-group">
<label>Recipient</label>
	<?php
        $class = 'class="form-control"';
     echo form_dropdown('sent_to', $options, $names, $class); 
     ?>
</div>
<?php } ?>
	<div class="form-group">
	  <label>Subject</label>
	  <input type="text" value="<?= $subject ?>" name="subject" class="form-control" placeholder="Enter Subject Message">
	</div>


<div class="clearfix"></div>
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Message
                <small>Simple and fast Subtitle</small>
              </h3>
              <!-- tools box -->
             
              <!-- /. tools -->
            </div>

            <!-- /.box-header -->
            <div class="box-body pad">
            
                <textarea name="message" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> <?= $message ?></textarea>
             
            </div>
       
        <center>
        <?php 
        echo form_hidden('sent_to', $sent_by);
        ?>
	 <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">
        <i class="fa fa-paper-plane fa-fw fa-lg"></i>&nbsp;Send</button>
        <button type="submit" class="btn btn-lg btn-danger" name="submit" value="Cancel">
        <i class="fa fa-times fa-fw fa-lg"></i>&nbsp;Cancel</button>
    </div>
    </center>

</div>
        </form>
    </div>
      </div>
    </div>
</div>

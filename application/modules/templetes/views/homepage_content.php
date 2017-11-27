

<?= Modules::run('homepage_blocks/_drow_blocks'); ?>

<?php echo  anchor('startacconut/start', 'Create Account') ?>
&nbsp;
<?php echo  anchor('startacconut/draw_login_form', 'Login') ?>
<div class="container">
    <!-- Example row of columns -->
    <div class="row" style="">
   <div class="col-md-3" style="float: right;">
      
           
           <h2>Heading</h2>
            <a href="http://localhost/shop/clothes/item/Fender-Jimi-Hendrix-Strat-in-Black">Click Here</a>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> 
        </div>
        <div class="col-md-8" style="float: left;">
        <p>
          <?=  Modules::run('blogs/_get_draw_hp'); ?>
          </p>
        </div>
 
        
    </div> 

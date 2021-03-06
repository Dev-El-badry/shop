<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico">

    <title>SHOP</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url(); ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/jumbotron.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>dist/css/font-awesome.min.css" rel="stylesheet">
     <?php
     if(isset($use_featherlight) AND $use_featherlight == TRUE) {
     ?>
     <link href="<?php echo base_url(); ?>dist/css/featherlight.min.css" rel="stylesheet">
     <?php } ?>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url() ?>">Shop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            
       
          
          <?php echo Modules::run('store_category/_navbar_bootstrap'); ?>

        </div><!--/.navbar-collapse -->
      </div>
    </nav>
 
<div class="container">
<?php    
if(isset($page_content)) {
if($page_url == "") { ?>
    <div class="container" style="min-height: 500px">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?= base_url() ?>slider_pics/slide1.jpg" alt="...">
      
    </div>
    <div class="item">
      <img src="<?= base_url() ?>slider_pics/slide2.jpg" alt="...">
     
    </div>
     <div class="item">
      <img src="<?= base_url() ?>slider_pics/slide3.jpg" alt="...">
     
    </div>
      <div class="item">
      <img src="<?= base_url() ?>slider_pics/slide4.jpg" alt="...">
     
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php   } } ?>
    <?php

  if(isset($customer_id)&&$customer_id>0) {
    include_once('custom_top_nav.php');
  }
?>

      <?php
        if(isset($view_file)) {

             echo $this->load->view($module.'/'.$view_file);

        } elseif(isset($page_content)) {

          
            if($page_url == "") {
              include_once('homepage.php');
                require_once('homepage_content.php');
            } elseif($page_url == "contactus") {
                echo Modules::run('contactus/_draw_form');
            }
            
        }
            ?>
    </div>
      <hr>
    <div class="container">
      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <?php
     if(isset($use_featherlight) AND $use_featherlight == TRUE) {
     ?>
    <script src="<?php echo base_url(); ?>dist/js/featherlight.min.js"></script>
    <?php 
  }
    ?>
  </body>
</html>

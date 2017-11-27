<?= Modules::run('templetes/_draw_bread_crumbs', $breadcrumbs_data) ?>
<?php

    if(isset($_SESSION['item'])) {
        echo $this->session->flashdata('item');
    } 
    ?>
    <div id="mylightbox"></div>
<div class="row">

        <div class="col-sm-2" style="margin-top: 24px">
        <a href="<?= base_url() ?>big_img/<?= $big_img ?>" data-featherlight="#mylightbox">
          <img src="<?= base_url() ?>big_img/<?= $big_img ?>" alt="Product Item" class="img-thumbnail img-responsive" /></a>
        </div>
        <div class="col-sm-5">
        	<h2><?= $title_item ?></h2>
            <h3>Our Price: $<?= $price_item ?></h3>
        	<p><?= $describtion_item ?></p>
        </div>
        <div class="col-sm-3" style="margin-top: 24px;">
        	<?= Modules::run('cart/_draw_add_to_cart', $id) ?>
        </div>
</div>
<p>
</p>
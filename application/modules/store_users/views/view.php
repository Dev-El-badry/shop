<div class="row">
        <div class="col-sm-4" style="margin-top: 24px">
          <img src="<?= base_url() ?>big_img/<?= $big_img ?>" alt="Product Item" class="responsive_img" />
        </div>
        <div class="col-sm-5">
        	<h2><?= $title_item ?></h2>
        	<p><?= $describtion_item ?></p>
        </div>
        <div class="col-sm-3" style="margin-top: 24px;">
        	<?= Modules::run('cart/_draw_add_to_cart', $id) ?>
        </div>
</div>

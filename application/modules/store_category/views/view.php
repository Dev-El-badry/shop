<style>
    .es {
        width: 18.9%;
        margin-right: 1%;
    }

    .price {
        font-size: 14px;
        font-weight: bold;
        color: red;
        position: relative;
        bottom: 0;
        left: 0;
        padding: 0;
        margin: 0;
    }
</style>


        <?= Modules::run('templetes/_draw_bread_crumbs') ?>


<div class="row" >

    <h2><?php echo $cat_name; ?></h2>

    <p><?= $showing_statement ?></p>

    <nav aria-label="Page navigation">


        <?= $links; ?>
        <div class="clearfix"></div>

<?php
    foreach ($new_query->result() as $row) {
        $id = $row->id;
        $item_title = $row->title_item;
        $small_img = $row->big_img;
        $item_url = $row->url_item;
        $item_price = $row->price_item;
        $was_price = $row->was_price;



        $img_path = base_url() . 'small_pics/' . $small_img;
        $full_url = base_url() . $url . $item_url; ?>


        <div class="col-md-2 es img-thumbnail" style="margin-top: 15px; height: 275px;">
            <a href="<?= $full_url ?>"> <img src="<?= $img_path ?>" alt="" class="img-responsive" /></a>
            <h6 > <a href="<?= $full_url ?>"> <?= $item_title ?></a></h6>
            <p class="price">$<?= $item_price ?>
                <?php

                if($was_price > 0) {
                    echo  '- <span style="text-decoration: line-through">$'. $was_price.'</span></p>';
                }
                ?>


        </div>

<?php
    }
?>
        <?= $links; ?>
</div>

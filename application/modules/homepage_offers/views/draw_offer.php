<?php

    function _get_theme($count) {
        switch ($count) {
            case 1:
                $theme = 'primary';
                break;
            case 2:
                $theme = 'warning';
                break;
            case 3:
                $theme = 'info';
                break;
            case 4:
                $theme = 'success';
                break;
            case 5:
                $theme = 'danger';
                break;
        }

        return $theme;
    }

?>

<?php
$count = 0;
if($num_rows > 0) {

foreach ($query->result() as $row) {
$title_item = $row->title_item;
$url_item = $row->url_item;
$price_item = $row->price_item;
$small_img = $row->small_img;
$describtion_item = $row->describtion_item;
$was_price = $row->was_price;

$base_url = base_url();
$first_bit = $this->site_settings->_get_item_segments();

$full_url = $base_url . $first_bit . $url_item;

$count++;

$theme = _get_theme($count);

?>

<div class="col-xs-3">
    <div class="offer offer-<?= $theme ?>">
        <div class="shape">
            <div class="shape-text">
              <span class="glyphicon glyphicon-star" style="    font-size: 17px;
    font-weight: bold;
    color: gold;" ></span>
            </div>
        </div>
        <div class="offer-content" style="min-height: 360px;">
            <h3 class="lead">
               Price: $<?= $price_item ?> <br /><br />
                <a href="<?= $full_url ?>"> <img src="<?= base_url() ?>small_pics/<?= $small_img ?>" alt="" title="<?= $title_item ?>" class="img-responsive" /></a>
            </h3>
            <p>
              <a href="<?= $full_url ?>"> <?= $title_item ?></a>
            </p>
        </div>
    </div>
</div>
<?php } } ?>
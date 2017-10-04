<div class="row" style="margin-top: 12px ">
    <div class="col-md-12">
        <ol class="breadcrumb" style="margin-bottom: 0">
            <?php
            foreach ($breadcrums_arr as $key=>$value) {
                echo '<li><a href="'.$key.'">'.$value.'</a></li>';
            }
            ?>


            <li class="active"><?= $item_title ?></li>
        </ol>
    </div>
</div>
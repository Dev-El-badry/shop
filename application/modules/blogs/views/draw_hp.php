
        <?php

        foreach ($query->result() as $row) {
            $author = $row->author;
            $blog_url = $row->blog_url;
            $blog_title = $row->blog_title;
            $pic = $row->picture;
            $thumb_name = str_replace('.', '_thumb.', $pic);
            $thumb_url = base_url() . 'blog_pics/' . $thumb_name ;
            $date = $row->date_published;
            $date_published = $this->timedate->get_nice_date($date, 'cool');
            $content = $row->blog_content;
            $string = word_limiter($content, 65);


        ?>
        <div class="row" style="margin-top: 20px">
            <div class="col-md-4" class="sadsa">
                <img class="img-responsive img-thumbnail" alt="" src="<?= $thumb_url ?>" />
            </div><!-- End col-md-4 -->
            <div class="col-md-8">
                <h3 style="margin-top: 0"><a href="<?= base_url() . $blog_url ?>"><?= $blog_title ?></a></h3>
                <p style="font-size: 0.9em">
                    <?= $author ?> - <span style="color: #888"><?= $date_published ?></span>
                </p>
                <p>
                    <?= $string ?>
                </p>
            </div> <!-- End col-md-8 -->
        </div> <!-- End row -->
        <?php  } ?>


<article class="post">

    <div class="entry-header cf">

        <h1><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h1>


    </div>

    <div class="post-thumb">
        <!--                    <a href="single.html" title=""><img src="images/post-image/post-image-1300x500-01.jpg" alt="post-image" title="post-image"></a>-->

        <a href="<?php the_permalink(); ?>" title="">
            <?php
            if (has_post_thumbnail()) {
                //                                the_post_thumbnail('thumbnail', array('alt' => 'post-image'));
                the_post_thumbnail('my_post_thumb', array('alt' => 'post-image'));
            }
            ?>
        </a>
    </div>

    <div class="post-content">

        <?php the_content(); ?>
        <?php do_action('my_action'); ?>


    </div>

</article> <!-- post end -->

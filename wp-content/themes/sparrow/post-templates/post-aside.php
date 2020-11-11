<article class="post">

    <div class="entry-header cf">

        <h1><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h1>


    </div>

    <div class="post-content">

        <?php the_content(); ?>
        <?php do_action('my_action'); ?>

    </div>

</article> <!-- post end -->

<?php
get_header();
?>

<?php echo "post-format: " . get_post_format(); ?>

<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">

            <?php the_post(); ?>
            <?php

            $post_format = get_post_format();
            get_template_part('post-templates/post', $post_format);
//
//            if ($post_format === false ) {
//                get_template_part('post-templates/post');
//            } elseif ($post_format === 'video') {
//                get_template_part('post-templates/post', 'video');
//            } elseif ($post_format === 'aside') {
//                get_template_part('post-templates/post', 'aside');
//            }


            ?>






        </div> <!-- Primary End-->

        <div id="secondary" class="four columns end">

            <?php get_sidebar(); ?>

        </div> <!-- Secondary End-->

    </div>

</div> <!-- Content End-->

<!-- Tweets Section
================================================== -->
<section id="tweets">

    <div class="row">

        <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
        </div>

        <ul id="twitter" class="align-center">
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
                <b><a href="#">2 Days Ago</a></b>
            </li>
            <!--
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">3 Days Ago</a></b>
            </li>
            -->
        </ul>

        <p class="align-center"><a href="#" class="button">Follow us</a></p>

    </div>

</section> <!-- Tweets Section End-->


<?php
get_header();
?>
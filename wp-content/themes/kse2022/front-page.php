
<?php get_header(); ?>
   
        <main id="primary" class="col-md-9 order-md-2">

            <?php 
                if(have_posts()) {
                    while(have_posts()) {
                        the_post();
                        the_content();
                    }
                }
            ?>
        </main><!-- #primary -->


 <?php get_footer(); ?>
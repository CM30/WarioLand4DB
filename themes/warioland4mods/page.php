<?php 
/** General Page Template **/
get_header();
    if(have_posts()):
        while(have_posts()): the_post();
?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
<?php
        endwhile;
    endif;
get_footer();
?>
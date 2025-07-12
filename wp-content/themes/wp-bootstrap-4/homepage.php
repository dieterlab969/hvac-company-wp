<?php
/*
 Template Name: Home - Full
 */
get_header(); ?>
        
        <?php get_template_part( 'template-parts/front-page/slide-homepage' ); ?>
        <?php get_template_part( 'template-parts/front-page/start' ); ?>
        <?php get_template_part( 'template-parts/front-page/ads' ); ?>
        <?php get_template_part( 'template-parts/front-page/san-pham-noi-bat' ); ?>
        <?php get_template_part( 'template-parts/front-page/service' ); ?>
        <!-- // get_template_part( 'template-parts/front-page/thanhly' ); -->
        
        <?php get_template_part( 'template-parts/front-page/congtrinh' ); ?>
        <?php get_template_part( 'template-parts/front-page/review' ); ?>
        <?php get_template_part('template-parts/front-page/certificates'); ?>
        <?php get_template_part( 'template-parts/front-page/news' ); ?>


<?php get_footer(); ?>

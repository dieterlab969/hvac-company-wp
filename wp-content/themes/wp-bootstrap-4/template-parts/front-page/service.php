<!-- ===========================
=== START 
-->
<section class="services_area">
    <div class="container">
        <div class="section__title text-center">
            <h6 class="text-uppercase">DỊCH VỤ CHÍNH</h6>
        </div>

        <div class="services__tab--content">
            <div class="container tab-content">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper-container swiper5 services__item">
                            <div class="swiper-wrapper">
                                <?php
                                $vnkings = new WP_Query(array(
                                    'post_type'=>'post',
                                    'post_status'=>'publish',
                                    'cat' => 25,
                                    'meta_query' => array(
                                        /* array(
                                                'key' => 'feature',
                                                'compare' => '=',
                                                'value' => '1'
                                            ) */
                                    ),
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page'=> 8));
                                ?>
                                <?php while ($vnkings->have_posts()) : $vnkings->the_post(); ?>
                                    <div class="swiper-slide">
                                        <article class="article__inner">
                                            <a href="<?php the_permalink(); ?>" class="article__img border">
                                                <?php if ( has_post_thumbnail() ) : ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php elseif ( !has_post_thumbnail() ) : ?>
                                                    <img src="<?php bloginfo( 'url' ); ?>/wp-content/themes/wp-bootstrap-4/assets/images/default-thumbnail.jpg">
                                                <?php endif; ?>
                                            </a>
                                            <img src="<?php bloginfo( 'url' ); ?>/wp-content/themes/wp-bootstrap-4/assets/images/home/shadow.png" alt="">
                                            <div class="article__content">
                                                <h5><a href="<?php the_permalink(); ?>" class="text-uppercase text-center"><?php the_title(); ?></a></h5>
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- end column -->
                                <?php endwhile ; wp_reset_query() ;?>


                            </div>
                        </div>
                        <div class="swiper-button-prev swiper-button-prev_5 fa fa-angle-left"></div>
                        <div class="swiper-button-next swiper-button-next_5 fa fa-angle-right"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center"><a href="<?php bloginfo( 'url' ); ?>/chuyen-muc/dich-vu/may-lanh/" class="btn-more">Xem tất cả</a></div>
                </div>
                <!-- end tab -->
            </div>
        </div>
    </div>
</section>
<!-- =============== END ====================== -->
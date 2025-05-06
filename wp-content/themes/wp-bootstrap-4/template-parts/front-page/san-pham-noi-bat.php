<?php

// Query arguments
$args = array(
    'post_type'      => 'san-pham-noi-bat', // Custom post type
    'posts_per_page' => 30,
    'orderby'        => 'date', // Order by date
    'order'          => 'DESC' // Descending order
);

// The Query
$product_featured_query = new WP_Query($args);

$grp_rel_prod = get_field('relevant_product', 'option');
$product_feature_title = $grp_rel_prod['title']?? 'SбєЈn phбє©m phГ№ hб»Јp';
?>
<section class="services_area">
    <div class="container">
        <div class="section__title text-center">
            <h6 class="text-uppercase"><?= esc_html($product_feature_title) ?></h6>
        </div>
        <div class="services__tab--content">
            <div class="container tab-content">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper-container swiper6 services__item">
                            <div class="swiper-wrapper">
                                <?php
                                // The Loop
                                if ($product_featured_query->have_posts()) {
                                    while ($product_featured_query->have_posts()) {
                                        $product_featured_query->the_post();
                                        ?>
                                        <div class="swiper-slide text-center">
                                            <article class="article__inner">
                                                <?php $description = get_field('description');  ?>
                                                <?php if ( has_post_thumbnail() ) : ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php elseif ( !has_post_thumbnail() ) : ?>
                                                    <img src="<?php bloginfo( 'url' ); ?>/wp-content/themes/wp-bootstrap-4/assets/images/default-thumbnail.jpg" alt="">
                                                <?php endif; ?>

                                                <img src="<?php bloginfo( 'url' ); ?>/wp-content/themes/wp-bootstrap-4/assets/images/home/shadow.png" alt="">
                                                <div class="article__content">
                                                    <h5><a href="<?= get_field('link') ?>" class="title text-uppercase text-center"><?php the_title(); ?></a></h5>
                                                    <?php echo $description; ?>
                                                </div>
                                            </article>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo '<p>No product featured found.</p>';
                                }

                                // Restore original Post Data
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                        <div class="swiper-button-prev swiper-button-prev_6 fa fa-angle-left"></div>
                        <div class="swiper-button-next swiper-button-next_6 fa fa-angle-right"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

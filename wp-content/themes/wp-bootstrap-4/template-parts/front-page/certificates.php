<?php

$args = [
    'post_type' => 'certificate',
    'posts_per_page' => -1,
];
$certificates = new WP_Query($args);

if ($certificates->have_posts()): ?>
    <div class="container">
        <div class="certificate-block">
            <div class="section__title text-center">
                <h6 class="text-uppercase">CHб»ЁNG NHбє¬N & CHб»ЁNG CHб»€</h6>
            </div>
            <div class="snowflake-divider"></div>
            <div class="swiper-container certificates-carousel">
                <div class="swiper-wrapper">
                    <?php while ($certificates->have_posts()): $certificates->the_post(); ?>
                        <div class="swiper-slide certificate-item">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full'); ?>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-button-next fa fa-angle-right swiper-button-next_8"></div>
                <div class="swiper-button-prev fa fa-angle-left swiper-button-prev_8"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata();



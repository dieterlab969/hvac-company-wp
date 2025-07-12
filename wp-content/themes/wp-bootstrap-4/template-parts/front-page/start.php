
<section class="banner_slide">
  <a href="<?php the_field( 'link_banner', 'options' ); ?>"><img src="<?php $img_banner = get_field( 'banner_qc', 'options' ); echo $img_banner['url']; ?>" alt=""></a>
</section>
<!-- ============================= START ========================== -->
<section class="feature_area">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-12 col-sm-6">
                <div class="intro-image">
                    <?php
                    $img = get_field('intro-image');
                    if ($img) : ?>
                        <img src="<?php echo esc_url($img); ?>" alt="Công ty TNHH Điện Lạnh Phan Gia" loading="lazy" class="img-fluid"/>
                    <?php else : ?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/cong-ty.png" alt="Công ty TNHH Điện Lạnh Phan Gia" loading="lazy" class="img-fluid"/>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="intro-content">
                    <h2 class="intro-title"><?php echo esc_html(get_field('intro-title') ?: 'GIỚI THIỆU'); ?></h2>
                    <div class="intro-text">
                        <?php echo wp_kses_post(get_field('intro-text') ?: ''); ?>
                    </div>
                    <a href="<?php echo esc_url(get_field('intro-link') ?: '#'); ?>" class="btn-more">XEM THÊM</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =============== END ====================== -->
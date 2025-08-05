        <!-- ===========================
=== START 
-->
<?php
$ac_image = get_field('upload_air_conditioner_image');
$title = get_field('input_text_title');
$description = get_field('input_body');

if ($title) :

?>
    <section class="hvac_services_area">
        <div class="container">
            <div class="services_content_wrapper">
                <?php if($ac_image):?>
                    <img src="<?= esc_url($ac_image['url'])?>" alt="<?= esc_attr($ac_image['alt']) ?>" class="services_main_image">
                <?php endif;?>

                <div class="services_content">
                    <div class="services_heading text-uppercase">
                        <h1><?= $title ?></h1>
                    </div>

                    <?php if($description):?>
                        <div class="services_description">
                            <p><?= $description ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (have_rows('service')):?>
                        <div class="services_items_container">
                            <?php while(have_rows('service')) : the_row();
                                $service_image = get_sub_field('image');
                                $service_title = get_sub_field('title');
                                $service_subtitle = get_sub_field('subtitle');
                                ?>
                                <div class="service_item">
                                    <?php if($service_image): ?>
                                        <img src="<?= esc_url($service_image['url'])?>" alt="<?= esc_attr($service_image['alt'])?>">
                                    <?php endif; ?>

                                    <?php if($service_title):?>
                                        <div class="service_item_title"><?= $service_title ?></div>
                                    <?php endif; ?>

                                    <?php if($service_subtitle):?>
                                        <div class="service_item_subtitle"><?= $service_subtitle ?></div>
                                    <?php endif;?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
<!-- =============== END ====================== -->

<?php endif; ?>
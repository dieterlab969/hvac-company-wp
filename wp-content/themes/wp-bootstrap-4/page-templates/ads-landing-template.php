<?php
/**
 * Template Name: Ads Landing Template
 * Template Post Type: page
 *
 * Conversion-focused landing page for ad campaigns.
 * Uses the global site header (get_header) and footer (get_footer).
 * All content managed via ACF — no coding required to update text/images.
 *
 * Sections:
 *  1. Hero
 *  2. YouTube + Editable Text
 *  3. Pricing (3 cards – image top, text below)
 *  4. Project Gallery (6 images)
 *  5. Pre-footer CTA (form left | AC image right)
 *  [global footer via get_footer()]
 *
 * Primary color & CTA button color are editable via Appearance → Customize
 * → Landing Page – Colors.
 *
 * @package WP_Bootstrap_4
 */

// ── Add body class so all scoped CSS works ────────────────────────────────────
add_filter( 'body_class', function ( $classes ) {
    $classes[] = 'al-landing';
    return $classes;
} );

// ── Helpers ───────────────────────────────────────────────────────────────────
if ( ! function_exists( 'al_field' ) ) {
    function al_field( $name ) {
        return function_exists( 'get_field' ) ? get_field( $name ) : '';
    }
}

// ── Customizer color tokens ───────────────────────────────────────────────────
$al_color_primary       = get_theme_mod( 'al_primary_color',       '#0F7DBA' );
$al_color_primary_dark  = get_theme_mod( 'al_primary_dark_color',  '#0A4F8A' );
$al_color_primary_light = get_theme_mod( 'al_primary_light_color', '#2EA3D0' );
$al_color_cta           = get_theme_mod( 'al_cta_color',           '#E53935' );

// ── ACF field pre-fetch ───────────────────────────────────────────────────────

// Hero
$al_hero_badge       = al_field( 'al_hero_badge' )             ?: 'ĐIỆN LẠNH PHAN GIA';
$al_hero_title       = al_field( 'al_hero_title' )             ?: "LẮP ĐẶT & BẢO TRÌ\nĐIỀU HÒA CHUYÊN NGHIỆP";
$al_hero_description = al_field( 'al_hero_description' );
$al_hero_cta_primary = al_field( 'al_hero_cta_primary_text' )  ?: 'ĐĂNG KÝ TƯ VẤN MIỄN PHÍ';
$al_hero_cta_url     = al_field( 'al_hero_cta_primary_url' )   ?: '#contact';
$al_hero_cta_sec     = al_field( 'al_hero_cta_secondary_text' );
$al_hero_cta_sec_url = al_field( 'al_hero_cta_secondary_url' ) ?: '#pricing';
$al_hero_image       = al_field( 'al_hero_image' );

// YouTube section
$al_video_title   = al_field( 'al_video_section_title' ) ?: 'TẠI SAO CHỌN PHAN GIA?';
$al_video_url     = al_field( 'al_video_url' );
$al_video_content = al_field( 'al_video_content' )
    ?: '<p>Với hơn 10 năm kinh nghiệm trong ngành điện lạnh, Phan Gia tự hào là đối tác tin cậy của hàng nghìn khách hàng tại TP.HCM và các tỉnh lân cận.</p>
        <p>Chúng tôi cung cấp dịch vụ lắp đặt, bảo trì và sửa chữa điều hòa không khí với đội ngũ kỹ thuật viên được đào tạo bài bản, sử dụng thiết bị hiện đại và vật tư chính hãng.</p>
        <ul>
            <li>✔ Bảo hành chính hãng lên đến 5 năm</li>
            <li>✔ Lắp đặt nhanh trong ngày – không chờ đợi</li>
            <li>✔ Đội ngũ kỹ thuật viên chuyên nghiệp, tận tâm</li>
            <li>✔ Báo giá minh bạch – không phát sinh chi phí</li>
        </ul>';

// Pricing
$al_pricing_title = al_field( 'al_pricing_title' ) ?: 'GÓI DỊCH VỤ PHÙ HỢP VỚI BẠN';
$al_pricing_items = al_field( 'al_pricing_items' );
if ( ! $al_pricing_items ) {
    $al_pricing_items = [
        [
            'image'       => null,
            'title'       => 'LẮP ĐẶT MỚI',
            'description' => 'Lắp đặt điều hòa mới hoàn toàn, bao gồm khảo sát, thi công đường ống và kiểm tra vận hành.',
            'price'       => 'Từ 500.000đ',
            'cta_text'    => 'ĐĂNG KÝ NGAY',
            'cta_url'     => '#contact',
        ],
        [
            'image'       => null,
            'title'       => 'BẢO TRÌ ĐỊNH KỲ',
            'description' => 'Vệ sinh, kiểm tra và bảo dưỡng định kỳ giúp điều hòa hoạt động ổn định, tiết kiệm điện.',
            'price'       => 'Từ 200.000đ',
            'cta_text'    => 'ĐĂNG KÝ NGAY',
            'cta_url'     => '#contact',
        ],
        [
            'image'       => null,
            'title'       => 'SỬA CHỮA',
            'description' => 'Khắc phục nhanh các sự cố: không lạnh, rò rỉ gas, hư quạt, bo mạch – bảo hành dịch vụ 6 tháng.',
            'price'       => 'Từ 300.000đ',
            'cta_text'    => 'ĐĂNG KÝ NGAY',
            'cta_url'     => '#contact',
        ],
    ];
}

// Gallery
$al_gallery_title  = al_field( 'al_gallery_title' )  ?: 'DỰ ÁN THỰC TẾ CỦA CHÚNG TÔI';
$al_gallery_images = al_field( 'al_gallery_images' );

// Pre-footer CTA
$al_form_title      = al_field( 'al_form_title' )    ?: 'ĐỂ LẠI THÔNG TIN';
$al_form_subtitle   = al_field( 'al_form_subtitle' ) ?: 'ĐỂ ĐƯỢC TƯ VẤN MIỄN PHÍ';
$al_form_shortcode  = al_field( 'al_form_shortcode' );
$al_hotline         = al_field( 'al_hotline' );
$al_footer_ac_image = al_field( 'al_footer_ac_image' );

// ── Output global site header ─────────────────────────────────────────────────
get_header();
?>
<?php
// Get theme directory URI
$theme_dir = get_template_directory_uri();
// Set default hero background image URL
$default_hero_bg = $theme_dir . '/assets/images/home/hero.jpg';
?>
<!-- ══════════════════════════════════════════════════════════════════
     1. HERO
══════════════════════════════════════════════════════════════════ -->
    <!-- Modified Hero Section -->
    <section class="al-hero" id="home" style="background-image: url('<?php echo esc_url( $default_hero_bg ); ?>');">
        <div class="al-inner al-hero__inner" style="display: flex; align-items: center; justify-content: space-between; height: 100%; padding: 0 40px;">

            <!-- Left content: badge, title, subtitle, hotline button -->
            <div class="al-hero__content" style="max-width: 50%; color: white;">
                <?php if ( $al_hero_badge ) : ?>
                    <div class="al-hero__badge" style="background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.4); color: #fff; font-weight: 700; letter-spacing: 2px; padding: 6px 18px; border-radius: 20px; text-transform: uppercase; margin-bottom: 20px; display: inline-block;">
                        <?php echo esc_html( $al_hero_badge ); ?>
                    </div>
                <?php endif; ?>

                <h1 class="al-hero__title" style="font-size: 3.5rem; font-weight: 900; line-height: 1.2; text-transform: uppercase; margin-bottom: 24px; text-shadow: 0 2px 8px rgba(0,0,0,0.6); white-space: pre-line;">
                    <?php echo nl2br( esc_html( $al_hero_title ) ); ?>
                </h1>

                <?php if ( $al_hero_description ) : ?>
                    <div class="al-hero__desc" style="font-size: 1.25rem; line-height: 1.6; margin-bottom: 36px; color: rgba(255,255,255,0.9); text-shadow: 0 1px 4px rgba(0,0,0,0.5);">
                        <?php echo wp_kses_post( $al_hero_description ); ?>
                    </div>
                <?php endif; ?>

                <a href="tel:0972220777" class="al-btn-outline" style="display: inline-flex; align-items: center; gap: 12px; padding: 14px 28px; border: 2px solid #fff; border-radius: 30px; font-weight: 700; font-size: 1.1rem; color: #fff; text-decoration: none; text-transform: uppercase; transition: background-color 0.3s, color 0.3s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone" style="flex-shrink: 0;">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13 1.21.38 2.39.73 3.53a2 2 0 0 1-.45 2.11L9.91 10.09a16 16 0 0 0 6 6l1.72-1.72a2 2 0 0 1 2.11-.45c1.14.35 2.32.6 3.53.73a2 2 0 0 1 1.72 2z"/>
                    </svg>
                    HOTLINE: <?php echo esc_html( $al_hotline ); ?>
                </a>
            </div>

            <!-- Right image -->
            <?php if ( $al_hero_image ) : ?>
                <div class="al-hero__img" style="max-width: 45%; display: flex; justify-content: flex-end; align-items: center;">
                    <img src="<?php echo esc_url( $al_hero_image['url'] ); ?>"
                         alt="<?php echo esc_attr( $al_hero_image['alt'] ?: $al_hero_title ); ?>"
                         loading="eager"
                         style="max-height: 520px; width: auto; border-radius: 12px; box-shadow: 0 12px 36px rgba(0,0,0,0.4); object-fit: contain;">
                </div>
            <?php endif; ?>

        </div>

        <!-- Optional: overlay gradient for better text contrast -->
        <div style="position: absolute; inset: 0; background: linear-gradient(90deg, rgba(0,0,0,0.6) 30%, transparent 70%); pointer-events: none;"></div>
    </section>


<!-- ══════════════════════════════════════════════════════════════════
     2. YOUTUBE + EDITABLE TEXT
══════════════════════════════════════════════════════════════════ -->
<section class="al-section al-section--dark" id="video">
    <div class="al-inner">

        <div class="al-heading al-heading--light">
            <span class="al-heading__pre">Giới thiệu</span>
            <h2 class="al-heading__title"><?php echo esc_html( $al_video_title ); ?></h2>
            <span class="al-heading__divider"></span>
        </div>

        <div class="al-video__inner">

            <!-- LEFT: YouTube embed -->
            <div class="al-video__media">
                <?php if ( $al_video_url ) : ?>
                    <iframe src="<?php echo esc_url( $al_video_url ); ?>"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            title="<?php esc_attr_e( 'Video giới thiệu', 'wp-bootstrap-4' ); ?>">
                    </iframe>
                <?php else : ?>
                    <div class="al-video__placeholder">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color:#fff;">
                            <circle cx="12" cy="12" r="10"/>
                            <polygon points="10,8 16,12 10,16" fill="currentColor"/>
                        </svg>
                        <span>Thêm URL video YouTube trong trang quản trị (ACF: al_video_url)</span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- RIGHT: Editable text (ACF: al_video_content) -->
            <div class="al-video__content">
                <div class="al-video__body">
                    <?php echo wp_kses_post( $al_video_content ); ?>
                </div>
                <div style="margin-top:28px;">
                    <a href="<?php echo esc_url( $al_hero_cta_url ); ?>" class="al-btn-cta">
                        <?php echo esc_html( $al_hero_cta_primary ); ?>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════
     3. PRICING — 3 cards, image top, text below
══════════════════════════════════════════════════════════════════ -->
<section class="al-section al-section--light" id="pricing">
    <div class="al-inner">

        <div class="al-heading">
            <span class="al-heading__pre">Dịch vụ</span>
            <h2 class="al-heading__title"><?php echo esc_html( $al_pricing_title ); ?></h2>
            <span class="al-heading__divider"></span>
        </div>

        <div class="al-pricing__grid">
            <?php
            $plan_count = count( $al_pricing_items );
            foreach ( $al_pricing_items as $i => $plan ) :
                $is_featured = ( $plan_count === 3 && $i === 1 );
                $img         = ! empty( $plan['image'] )       ? $plan['image']       : null;
                $title       = ! empty( $plan['title'] )       ? $plan['title']       : '';
                $desc        = ! empty( $plan['description'] ) ? $plan['description'] : '';
                $price       = ! empty( $plan['price'] )       ? $plan['price']       : '';
                $cta_text    = ! empty( $plan['cta_text'] )    ? $plan['cta_text']    : 'ĐĂNG KÝ NGAY';
                $cta_url     = ! empty( $plan['cta_url'] )     ? $plan['cta_url']     : '#contact';
            ?>
            <div class="al-pcard<?php echo $is_featured ? ' al-pcard--featured' : ''; ?>">

                <!-- Image top -->
                <div class="al-pcard__img">
                    <?php if ( $img ) : ?>
                        <img src="<?php echo esc_url( $img['url'] ); ?>"
                             alt="<?php echo esc_attr( $img['alt'] ?: $title ); ?>"
                             loading="lazy">
                    <?php else : ?>
                        <div class="al-pcard__img-placeholder">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <polyline points="21,15 16,10 5,21"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                    <?php if ( $is_featured ) : ?>
                        <span class="al-pcard__badge">PHỔ BIẾN</span>
                    <?php endif; ?>
                </div>

                <!-- Content below image -->
                <div class="al-pcard__body">
                    <div class="al-pcard__title"><?php echo esc_html( $title ); ?></div>
                    <?php if ( $desc ) : ?>
                        <div class="al-pcard__desc"><?php echo esc_html( $desc ); ?></div>
                    <?php endif; ?>
                    <?php if ( $price ) : ?>
                        <div class="al-pcard__price"><?php echo esc_html( $price ); ?></div>
                    <?php endif; ?>
                    <a href="<?php echo esc_url( $cta_url ); ?>" class="al-pcard__cta">
                        <?php echo esc_html( $cta_text ); ?>
                    </a>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════
     4. PROJECT GALLERY — 6 images
══════════════════════════════════════════════════════════════════ -->
<section class="al-section al-section--white" id="gallery">
    <div class="al-inner">

        <div class="al-heading">
            <span class="al-heading__pre">Công trình</span>
            <h2 class="al-heading__title"><?php echo esc_html( $al_gallery_title ); ?></h2>
            <span class="al-heading__divider"></span>
        </div>

        <div class="al-gallery__grid">
            <?php for ( $gi = 0; $gi < 6; $gi++ ) :
                $gimg = ( $al_gallery_images && isset( $al_gallery_images[ $gi ] ) )
                    ? $al_gallery_images[ $gi ] : null;
            ?>
            <div class="al-gallery__item">
                <?php if ( $gimg ) : ?>
                    <img src="<?php echo esc_url( $gimg['url'] ); ?>"
                         alt="<?php echo esc_attr( $gimg['alt'] ?: ( $al_gallery_title . ' ' . ( $gi + 1 ) ) ); ?>"
                         loading="lazy">
                <?php else : ?>
                    <div class="al-gallery__placeholder">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                            <circle cx="8.5" cy="8.5" r="1.5"/>
                            <polyline points="21,15 16,10 5,21"/>
                        </svg>
                        <span>Dự án <?php echo $gi + 1; ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <?php endfor; ?>
        </div>

        <div style="text-align:center; margin-top:40px;">
            <a href="<?php echo esc_url( $al_hero_cta_url ); ?>" class="al-btn-cta">
                ĐĂNG KÝ TƯ VẤN MIỄN PHÍ
            </a>
        </div>

    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════
     5. PRE-FOOTER CTA — sits directly above the global footer
        Left: contact form | Right: air conditioner image
══════════════════════════════════════════════════════════════════ -->
<section class="al-prefooter" id="contact">
    <div class="al-inner">
        <div class="al-prefooter__inner">

            <!-- LEFT: CTA form -->
            <div class="al-prefooter__form">
                <div class="al-form-box">
                    <div class="al-form-box__title"><?php echo esc_html( $al_form_title ); ?></div>
                    <div class="al-form-box__subtitle"><?php echo esc_html( $al_form_subtitle ); ?></div>

                    <?php if ( $al_form_shortcode ) : ?>
                        <?php echo do_shortcode( wp_kses_post( $al_form_shortcode ) ); ?>
                    <?php else : ?>
                        <form class="al-plain-form" action="#" method="post" novalidate>
                            <p><input type="text"  class="al-form-field" name="name"  placeholder="Họ và Tên *" required></p>
                            <p><input type="tel"   class="al-form-field" name="phone" placeholder="Số điện thoại *" required></p>
                            <p><input type="email" class="al-form-field" name="email" placeholder="Email"></p>
                            <p><textarea class="al-form-field" name="note" rows="3" placeholder="Ghi chú / địa chỉ lắp đặt"></textarea></p>
                            <button type="submit" class="al-form-box__submit-btn">GỬI YÊU CẦU TƯ VẤN</button>
                        </form>
                    <?php endif; ?>

                    <?php if ( $al_hotline ) : ?>
                        <div class="al-form-box__hotline">
                            Hoặc gọi ngay:
                            <strong><?php echo esc_html( $al_hotline ); ?></strong>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- RIGHT: Air conditioner image -->
            <div class="al-prefooter__img">
                <?php if ( $al_footer_ac_image ) : ?>
                    <img src="<?php echo esc_url( $al_footer_ac_image['url'] ); ?>"
                         alt="<?php echo esc_attr( $al_footer_ac_image['alt'] ?: 'Điều hòa không khí' ); ?>"
                         loading="lazy">
                <?php else : ?>
                    <div class="al-prefooter__img-placeholder">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="2" y="6" width="20" height="10" rx="2"/>
                            <line x1="12" y1="16" x2="12" y2="20"/>
                            <line x1="8"  y1="20" x2="16" y2="20"/>
                            <line x1="6"  y1="11" x2="18" y2="11"/>
                        </svg>
                        <span>Thêm hình điều hòa qua trang quản trị<br>(ACF field: <code>al_footer_ac_image</code>)</span>
                    </div>
                <?php endif; ?>
            </div>

        </div><!-- /.al-prefooter__inner -->
    </div><!-- /.al-inner -->
</section>


<?php
// ── Output global site footer ─────────────────────────────────────────────────
get_footer();

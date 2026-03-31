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

<style>
/* ═══════════════════════════════════════════════════════════════════════════
   ADS LANDING — scoped to body.al-landing
   Colors driven by WordPress Customizer → Landing Page – Colors
═══════════════════════════════════════════════════════════════════════════ */
body.al-landing {
    --color-primary:       <?php echo esc_attr( $al_color_primary ); ?>;
    --color-primary-dark:  <?php echo esc_attr( $al_color_primary_dark ); ?>;
    --color-primary-light: <?php echo esc_attr( $al_color_primary_light ); ?>;
    --color-cta:           <?php echo esc_attr( $al_color_cta ); ?>;
    --color-bg-light:      #F5F9FC;
    --al-radius:           12px;
    --al-shadow:           0 4px 24px rgba(0,0,0,.14);
    --al-font:             'Segoe UI', 'Be Vietnam Pro', Arial, sans-serif;
}

/* ── Smooth scroll ── */
html { scroll-behavior: smooth; }

/* ── Shared inner container ── */
.al-inner {
    max-width: 1160px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ── Sections ── */
.al-section         { padding: 72px 0; }
.al-section--dark   { background: var(--color-primary-dark); }
.al-section--light  { background: var(--color-bg-light); }
.al-section--white  { background: #ffffff; }

/* ── Shared section heading ── */
.al-heading             { text-align: center; margin-bottom: 52px; }
.al-heading__pre        { display: inline-block; color: var(--color-primary); font-size: .78rem; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 10px; }
.al-heading__title      { font-size: clamp(1.6rem, 3vw, 2.2rem); font-weight: 800; color: var(--color-primary-dark); line-height: 1.25; margin-bottom: 16px; display: block; }
.al-heading--light .al-heading__title,
.al-heading--light .al-heading__pre  { color: #ffffff; }
.al-heading__divider    { display: block; width: 60px; height: 4px; background: var(--color-primary); border-radius: 2px; margin: 0 auto; }
.al-heading--light .al-heading__divider { background: var(--color-primary-light); }

/* ── CTA button with pulse ── */
@keyframes al-pulse {
    0%   { transform: scale(1);    box-shadow: 0 0 0 0 rgba(0,0,0,.25); }
    70%  { transform: scale(1.04); box-shadow: 0 0 0 10px rgba(0,0,0,0); }
    100% { transform: scale(1);    box-shadow: 0 0 0 0 rgba(0,0,0,0); }
}
.al-btn-cta {
    display: inline-block;
    background: var(--color-cta);
    color: #fff !important;
    font-weight: 800;
    font-size: 1rem;
    letter-spacing: .6px;
    padding: 14px 34px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    text-transform: uppercase;
    text-decoration: none;
    animation: al-pulse 1.6s 1s infinite;
    transition: filter .2s;
    white-space: nowrap;
}
.al-btn-cta:hover { filter: brightness(1.12); color: #fff !important; }
.al-btn-outline {
    display: inline-block;
    background: transparent;
    color: #fff !important;
    font-weight: 700;
    font-size: .95rem;
    padding: 13px 30px;
    border-radius: 8px;
    border: 2px solid rgba(255,255,255,.7);
    transition: background .2s, border-color .2s;
    text-decoration: none;
    white-space: nowrap;
}
.al-btn-outline:hover { background: rgba(255,255,255,.12); border-color: #fff; }

/* ════════════════════════════════════════════════════════════════════════
   1. HERO
════════════════════════════════════════════════════════════════════════ */
.al-hero {
    background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 100%);
    min-height: 520px;
    display: flex;
    align-items: center;
    padding: 64px 0;
    position: relative;
    overflow: hidden;
}
.al-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at 72% 50%, rgba(255,255,255,.08) 0%, transparent 60%);
    pointer-events: none;
}
.al-hero__inner {
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: center;
}
.al-hero__badge {
    display: inline-block;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.4);
    color: #fff;
    font-size: .78rem;
    font-weight: 700;
    letter-spacing: 2px;
    padding: 5px 16px;
    border-radius: 20px;
    margin-bottom: 18px;
    text-transform: uppercase;
}
.al-hero__title {
    font-size: clamp(1.9rem, 4vw, 3rem);
    font-weight: 900;
    color: #ffffff;
    line-height: 1.2;
    margin-bottom: 18px;
    text-transform: uppercase;
    white-space: pre-line;
    text-shadow: 0 2px 16px rgba(0,0,0,.25);
}
.al-hero__desc          { color: rgba(255,255,255,.85); font-size: 1rem; line-height: 1.75; margin-bottom: 30px; }
.al-hero__desc p        { margin: 0 0 8px; color: rgba(255,255,255,.85); }
.al-hero__ctas          { display: flex; gap: 14px; flex-wrap: wrap; }
.al-hero__img           { display: flex; justify-content: center; align-items: flex-end; }
.al-hero__img img       { max-height: 420px; object-fit: contain; filter: drop-shadow(0 8px 36px rgba(0,0,0,.3)); }

/* ════════════════════════════════════════════════════════════════════════
   2. YOUTUBE + TEXT
════════════════════════════════════════════════════════════════════════ */
.al-video__inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 52px;
    align-items: center;
}
.al-video__media {
    position: relative;
    border-radius: var(--al-radius);
    overflow: hidden;
    background: #000;
    aspect-ratio: 16/9;
    border: 3px solid var(--color-primary-light);
    box-shadow: 0 0 36px rgba(0,0,0,.45);
}
.al-video__media iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
.al-video__placeholder {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 14px;
    background: linear-gradient(135deg, #0a3060 0%, #0d5494 100%);
}
.al-video__placeholder svg  { width: 64px; height: 64px; opacity: .6; }
.al-video__placeholder span { color: rgba(255,255,255,.55); font-size: .85rem; }
.al-video__body             { color: rgba(255,255,255,.82); font-size: .95rem; line-height: 1.8; }
.al-video__body p           { margin: 0 0 14px; color: rgba(255,255,255,.82); }
.al-video__body ul          { list-style: none; padding: 0; margin: 0 0 24px; }
.al-video__body ul li       { color: rgba(255,255,255,.82); padding: 6px 0; border-bottom: 1px solid rgba(255,255,255,.07); }

/* ════════════════════════════════════════════════════════════════════════
   3. PRICING — 3 cards, image top, text below
════════════════════════════════════════════════════════════════════════ */
.al-pricing__grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; }
.al-pcard {
    background: #ffffff;
    border: 1.5px solid #d8ecf9;
    border-radius: var(--al-radius);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    width: 100%;
    transition: transform .25s, box-shadow .25s;
    box-shadow: 0 2px 12px rgba(0,0,0,.06);
}
.al-pcard:hover             { transform: translateY(-6px); box-shadow: 0 12px 36px rgba(15,125,186,.18); }
.al-pcard--featured         { border-color: var(--color-primary); box-shadow: 0 8px 36px rgba(15,125,186,.22); transform: scale(1.03); }
.al-pcard--featured:hover   { transform: scale(1.03) translateY(-5px); }
.al-pcard__img {
    width: 100%;
    aspect-ratio: 4/3;
    overflow: hidden;
    background: var(--color-bg-light);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}
.al-pcard__img img                  { width: 100%; height: 100%; object-fit: cover; transition: transform .4s; }
.al-pcard:hover .al-pcard__img img  { transform: scale(1.06); }
.al-pcard__img-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--color-bg-light) 0%, #ddeeff 100%);
}
.al-pcard__img-placeholder svg { width: 52px; height: 52px; opacity: .35; color: var(--color-primary); }
.al-pcard__badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: var(--color-cta);
    color: #fff;
    font-size: .72rem;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 4px 12px;
    border-radius: 20px;
}
.al-pcard__body  { padding: 24px 22px 28px; flex: 1; display: flex; flex-direction: column; }
.al-pcard__title { font-size: 1.1rem; font-weight: 800; color: var(--color-primary-dark); text-transform: uppercase; margin-bottom: 10px; text-align: center; }
.al-pcard__desc  { color: #555555; font-size: .9rem; line-height: 1.7; text-align: center; flex: 1; margin-bottom: 18px; }
.al-pcard__price { text-align: center; font-size: 1.25rem; font-weight: 800; color: var(--color-primary); margin-bottom: 18px; }
.al-pcard__cta {
    display: block;
    width: 100%;
    background: var(--color-cta);
    color: #fff !important;
    text-align: center;
    font-weight: 800;
    font-size: .9rem;
    letter-spacing: .6px;
    text-transform: uppercase;
    padding: 13px 20px;
    border-radius: 8px;
    text-decoration: none;
    transition: filter .2s, transform .15s;
    animation: al-pulse 1.6s 1s infinite;
}
.al-pcard__cta:hover { filter: brightness(1.12); transform: translateY(-1px); }

/* ════════════════════════════════════════════════════════════════════════
   4. PROJECT GALLERY — 6 images
════════════════════════════════════════════════════════════════════════ */
.al-gallery__grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
.al-gallery__item {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    aspect-ratio: 4/3;
    background: var(--color-bg-light);
    box-shadow: 0 2px 10px rgba(0,0,0,.08);
}
.al-gallery__item img           { width: 100%; height: 100%; object-fit: cover; transition: transform .45s ease; }
.al-gallery__item:hover img     { transform: scale(1.08); }
.al-gallery__item::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 55%, rgba(10,79,138,.55) 100%);
    opacity: 0;
    transition: opacity .35s;
}
.al-gallery__item:hover::after  { opacity: 1; }
.al-gallery__placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--color-bg-light) 0%, #ddeeff 100%);
    color: var(--color-primary);
    opacity: .55;
    font-size: .8rem;
    font-weight: 600;
}
.al-gallery__placeholder svg { width: 36px; height: 36px; }

/* ════════════════════════════════════════════════════════════════════════
   5. PRE-FOOTER CTA — form left | AC image right
   Sits directly above and visually attaches to the site footer.
════════════════════════════════════════════════════════════════════════ */
.al-prefooter {
    background: linear-gradient(135deg, var(--color-primary-dark) 0%, #062d55 100%);
    padding: 72px 0 0;
    margin-bottom: 0;
}
.al-prefooter__inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 56px;
    align-items: end;
}
/* Form box */
.al-form-box {
    background: rgba(255,255,255,.07);
    border: 1px solid rgba(255,255,255,.15);
    border-radius: var(--al-radius);
    padding: 36px 32px 40px;
    backdrop-filter: blur(6px);
}
.al-form-box__title {
    font-size: 1.85rem;
    font-weight: 900;
    color: #ffffff;
    text-align: center;
    text-transform: uppercase;
    line-height: 1.2;
    margin-bottom: 6px;
}
.al-form-box__subtitle {
    color: var(--color-primary-light);
    font-size: .95rem;
    font-weight: 600;
    text-align: center;
    text-transform: uppercase;
    margin-bottom: 28px;
    letter-spacing: .5px;
}
/* CF7 overrides */
.al-form-box .wpcf7-form p,
.al-form-box .wpcf7-form .wpcf7-form-control-wrap { margin-bottom: 14px; display: block; }
.al-form-box .wpcf7-form input[type="text"],
.al-form-box .wpcf7-form input[type="email"],
.al-form-box .wpcf7-form input[type="tel"],
.al-form-box .wpcf7-form textarea,
.al-form-box .al-form-field {
    width: 100%;
    padding: 13px 16px;
    border: 1.5px solid rgba(255,255,255,.2);
    border-radius: 6px;
    font-size: .93rem;
    background: rgba(255,255,255,.08);
    color: #ffffff;
    transition: border-color .2s, box-shadow .2s;
}
.al-form-box .wpcf7-form input::placeholder,
.al-form-box .wpcf7-form textarea::placeholder  { color: rgba(255,255,255,.45); }
.al-form-box .wpcf7-form input:focus,
.al-form-box .wpcf7-form textarea:focus {
    outline: none;
    border-color: var(--color-primary-light);
    box-shadow: 0 0 0 3px rgba(46,163,208,.2);
    background: rgba(255,255,255,.13);
}
.al-form-box .wpcf7-form input[type="submit"],
.al-form-box .wpcf7-form .wpcf7-submit,
.al-form-box__submit-btn {
    width: 100%;
    background: var(--color-cta);
    color: #ffffff;
    border: none;
    padding: 15px;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 800;
    cursor: pointer;
    letter-spacing: 1px;
    text-transform: uppercase;
    animation: al-pulse 1.6s 1s infinite;
    transition: filter .2s;
}
.al-form-box .wpcf7-form input[type="submit"]:hover { filter: brightness(1.12); }
.al-form-box__hotline         { text-align: center; margin-top: 18px; color: rgba(255,255,255,.75); font-size: .88rem; }
.al-form-box__hotline strong  { color: var(--color-cta); font-size: 1.3rem; display: block; margin-top: 4px; }
/* AC image column */
.al-prefooter__img          { display: flex; align-items: flex-end; justify-content: center; }
.al-prefooter__img img      { max-height: 380px; object-fit: contain; filter: drop-shadow(0 -8px 32px rgba(15,125,186,.35)); }
.al-prefooter__img-placeholder {
    width: 100%;
    height: 320px;
    background: rgba(255,255,255,.04);
    border: 2px dashed rgba(255,255,255,.15);
    border-radius: var(--al-radius);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    color: rgba(255,255,255,.35);
    font-size: .85rem;
    text-align: center;
    padding: 20px;
}
.al-prefooter__img-placeholder svg { width: 56px; height: 56px; opacity: .4; }

/* ════════════════════════════════════════════════════════════════════════
   RESPONSIVE
════════════════════════════════════════════════════════════════════════ */
@media (max-width: 1023px) {
    .al-pricing__grid           { gap: 18px; }
    .al-pcard--featured         { transform: none; }
    .al-pcard--featured:hover   { transform: translateY(-6px); }
}
@media (max-width: 767px) {
    .al-section                     { padding: 52px 0; }
    .al-hero__inner                 { grid-template-columns: 1fr; text-align: center; }
    .al-hero__ctas                  { justify-content: center; }
    .al-hero__img                   { margin-top: 20px; }
    .al-hero__img img               { max-height: 260px; }
    .al-video__inner                { grid-template-columns: 1fr; gap: 32px; }
    .al-pricing__grid               { grid-template-columns: 1fr; max-width: 400px; margin: 0 auto; }
    .al-gallery__grid               { grid-template-columns: repeat(2, 1fr); }
    .al-prefooter__inner            { grid-template-columns: 1fr; gap: 40px; }
    .al-prefooter__img              { display: none; }
    .al-form-box                    { padding: 24px 18px 28px; }
    .al-prefooter                   { padding: 52px 0 0; }
}
@media (max-width: 480px) {
    .al-gallery__grid   { grid-template-columns: 1fr; }
    .al-heading__title  { font-size: 1.35rem; }
}
</style>


<!-- ══════════════════════════════════════════════════════════════════
     1. HERO
══════════════════════════════════════════════════════════════════ -->
<section class="al-hero" id="home">
    <div class="al-inner al-hero__inner">

        <div class="al-hero__content">
            <?php if ( $al_hero_badge ) : ?>
                <div class="al-hero__badge"><?php echo esc_html( $al_hero_badge ); ?></div>
            <?php endif; ?>

            <h1 class="al-hero__title"><?php echo nl2br( esc_html( $al_hero_title ) ); ?></h1>

            <?php if ( $al_hero_description ) : ?>
                <div class="al-hero__desc"><?php echo wp_kses_post( $al_hero_description ); ?></div>
            <?php endif; ?>

            <div class="al-hero__ctas">
                <a href="<?php echo esc_url( $al_hero_cta_url ); ?>" class="al-btn-cta">
                    <?php echo esc_html( $al_hero_cta_primary ); ?>
                </a>
                <?php if ( $al_hero_cta_sec ) : ?>
                    <a href="<?php echo esc_url( $al_hero_cta_sec_url ); ?>" class="al-btn-outline">
                        <?php echo esc_html( $al_hero_cta_sec ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if ( $al_hero_image ) : ?>
            <div class="al-hero__img">
                <img src="<?php echo esc_url( $al_hero_image['url'] ); ?>"
                     alt="<?php echo esc_attr( $al_hero_image['alt'] ?: $al_hero_title ); ?>"
                     loading="eager">
            </div>
        <?php endif; ?>

    </div>
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

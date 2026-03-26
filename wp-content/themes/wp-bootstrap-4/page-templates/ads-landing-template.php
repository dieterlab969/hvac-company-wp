<?php
/**
 * Template Name: Ads Landing Template
 * Template Post Type: page
 *
 * Conversion-focused landing page for ad campaigns.
 * All content managed via ACF — no coding required to update text/images.
 *
 * Sections:
 *  1. Navigation (simplified, conversion-focused)
 *  2. Hero
 *  3. Feature / Video
 *  4. Benefits Grid
 *  5. Pricing Table
 *  6. Advantages + Lead Form
 *  7. Footer
 *
 * @package WP_Bootstrap_4
 */

// ── Helpers ──────────────────────────────────────────────────────────────────

/**
 * Safe get_field wrapper — returns empty string when ACF isn't active.
 */
function al_field( $name ) {
    return function_exists( 'get_field' ) ? get_field( $name ) : '';
}

// Pre-fetch all ACF fields for this page
$al_logo               = al_field( 'al_logo' );
$al_nav_links          = al_field( 'al_nav_links' ) ?: array(
    array( 'label' => 'Trang Chủ',  'url' => '#home'     ),
    array( 'label' => 'Quyền Lợi', 'url' => '#benefits' ),
    array( 'label' => 'Sản Phẩm',  'url' => '#pricing'  ),
);
$al_nav_cta_text       = al_field( 'al_nav_cta_text' )       ?: 'ĐĂNG KÝ';
$al_nav_cta_phone      = al_field( 'al_nav_cta_phone' );

$al_hero_badge         = al_field( 'al_hero_badge' )          ?: 'FLASH ROSTASH*';
$al_hero_title         = al_field( 'al_hero_title' )          ?: "BẢO HIỂM RỦI RO\nKHÔNG GIAN MẠNG";
$al_hero_description   = al_field( 'al_hero_description' );
$al_hero_cta_primary   = al_field( 'al_hero_cta_primary_text' ) ?: 'ĐĂNG KÝ NGAY';
$al_hero_cta_url       = al_field( 'al_hero_cta_primary_url' )  ?: '#dang-ky';
$al_hero_cta_sec       = al_field( 'al_hero_cta_secondary_text' );
$al_hero_cta_sec_url   = al_field( 'al_hero_cta_secondary_url' ) ?: '#';
$al_hero_image         = al_field( 'al_hero_image' );

$al_feature_bg_image   = al_field( 'al_feature_bg_image' );
$al_feature_video      = al_field( 'al_feature_video_url' );

$al_benefits_pretitle  = al_field( 'al_benefits_pretitle' )  ?: 'FLASH ROSTASH';
$al_benefits_title     = al_field( 'al_benefits_title' )     ?: 'BẢO VỆ BẠN TRƯỚC NHỮNG RỦI RO NÀO TRÊN KHÔNG GIAN MẠNG?';
$al_benefits_items     = al_field( 'al_benefits_items' );

$al_pricing_title      = al_field( 'al_pricing_title' )      ?: 'BACLKOLES VÀ CÁC LỰA CHỌN';
$al_pricing_plans      = al_field( 'al_pricing_plans' );

$al_adv_title          = al_field( 'al_adv_title' )          ?: "ƯU ĐIỂM CỦA\nBẢO HIỂM FASHBASK";
$al_adv_items          = al_field( 'al_adv_items' );
$al_adv_image          = al_field( 'al_adv_image' );
$al_form_title         = al_field( 'al_form_title' )         ?: 'ĐỂ LẠI THÔNG TIN';
$al_form_subtitle      = al_field( 'al_form_subtitle' )      ?: 'ĐỂ ĐƯỢC TƯ VẤN MIỄN PHÍ';
$al_form_shortcode     = al_field( 'al_form_shortcode' );
$al_hotline            = al_field( 'al_hotline' );

$al_footer_logo        = al_field( 'al_footer_logo' );
$al_footer_company     = al_field( 'al_footer_company' )     ?: get_bloginfo( 'name' );
$al_footer_address     = al_field( 'al_footer_address' );
$al_footer_phone       = al_field( 'al_footer_phone' );
$al_footer_email       = al_field( 'al_footer_email' );
$al_footer_website     = al_field( 'al_footer_website' );
$al_footer_links       = al_field( 'al_footer_links' );

// Use header logo as footer logo fallback
$footer_logo = $al_footer_logo ?: $al_logo;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
    <style>
    /* ── GLOBAL RESET & VARS ─────────────────────────────────────── */
    :root {
        --al-dark:       #0A4F8A;
        --al-dark-2:     #083d6e;
        --al-orange:     #0F7DBA;
        --al-orange-lt:  #2EA3D0;
        --al-gold:       #0A4F8A;
        --al-white:      #ffffff;
        --al-text-muted: #b0cfe8;
        --al-card-bg:    #ffffff;
        --al-radius:     12px;
        --al-shadow:     0 4px 24px rgba(0,0,0,.14);
        --al-font:       'Segoe UI', 'Be Vietnam Pro', Arial, sans-serif;
        /* Design tokens */
        --color-primary:       #0F7DBA;
        --color-primary-light: #2EA3D0;
        --color-primary-dark:  #0A4F8A;
        --color-accent-red:    #E53935;
        --color-text-main:     #333333;
        --color-bg-light:      #F5F9FC;
        /* CTA gradient — red for conversion focus */
        --al-cta-grad-start: rgba(229,57,53,1.0);
        --al-cta-grad-end:   rgba(183,28,28,1.0);
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; scroll-padding-top: 70px; }
    body.al-landing {
        font-family: var(--al-font);
        background: #fff;
        color: rgb(228, 228, 228);
        overflow-x: hidden;
        font-weight: 400;
        font-size: 14px;
        line-height: 1.6;
    }
    body.al-landing img { max-width: 100%; height: auto; display: block; }
    body.al-landing a { text-decoration: none; color: inherit; }

    /* ── GLOBAL BODY TEXT ────────────────────────────────────────── */
    body.al-landing p,
    body.al-landing li,
    body.al-landing span,
    body.al-landing div {
        color: rgb(228, 228, 228);
        font-weight: 400;
        font-size: 14px;
        text-align: justify;
        line-height: 1.6;
    }

    /* ── NAV ─────────────────────────────────────────────────────── */
    .al-nav {
        background: var(--al-dark);
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0,0,0,.4);
    }
    .al-nav__inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 64px;
    }
    .al-nav__logo img { height: 44px; width: auto; }
    .al-nav__logo span {
        color: var(--al-white);
        font-size: 1.1rem;
        font-weight: 700;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: .5px;
    }
    .al-nav__links {
        display: flex;
        gap: 28px;
        list-style: none;
    }
    .al-nav__links a {
        color: #FFFFFF;
        font-size: 14px;
        font-weight: 700;
        text-transform: capitalize;
        transition: color .2s;
        white-space: nowrap;
    }
    .al-nav__links a:hover { color: var(--al-orange-lt); }
    .al-nav__right {
        display: flex;
        align-items: center;
        gap: 14px;
    }
    @-webkit-keyframes pulse {
        0%   { -webkit-transform: scale(1);    box-shadow: 0 0 0 0 rgba(229,57,53,.6); }
        70%  { -webkit-transform: scale(1.05); box-shadow: 0 0 0 10px rgba(229,57,53,0); }
        100% { -webkit-transform: scale(1);    box-shadow: 0 0 0 0 rgba(229,57,53,0); }
    }
    @keyframes pulse {
        0%   { transform: scale(1);    box-shadow: 0 0 0 0 rgba(229,57,53,.6); }
        70%  { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(229,57,53,0); }
        100% { transform: scale(1);    box-shadow: 0 0 0 0 rgba(229,57,53,0); }
    }
    /* ── SHARED CTA GRADIENT + PULSE (applied to all CTA buttons) ── */
    .al-cta-shared,
    .al-nav__phone,
    .al-btn--orange,
    .al-btn--hero.al-btn--orange,
    .al-plan__cta,
    .al-plan--featured .al-plan__cta,
    .al-benefit-card__cta,
    .al-form-box .wpcf7-form input[type="submit"],
    .al-form-box .wpcf7-form .wpcf7-submit,
    .al-form-box__submit-btn {
        background: var(--color-accent-red);
        background: -webkit-linear-gradient(180deg, rgba(229,57,53,1.0), rgba(183,28,28,1.0));
        background: linear-gradient(180deg, rgba(229,57,53,1.0), rgba(183,28,28,1.0));
        -webkit-animation-name: pulse;
        animation-name: pulse;
        -webkit-animation-delay: 1s;
        animation-delay: 1s;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
    }
    .al-nav__phone {
        display: inline-block;
        padding: 8px 18px;
        border-radius: 6px;
        color: #fff;
        font-weight: 700;
        font-size: 15px;
        white-space: nowrap;
    }
    .al-btn {
        display: inline-block;
        padding: 10px 22px;
        border-radius: 6px;
        font-weight: 700;
        font-size: .9rem;
        cursor: pointer;
        transition: filter .2s, transform .15s;
        text-align: center;
        white-space: nowrap;
        letter-spacing: .4px;
    }
    .al-btn:hover { filter: brightness(1.1); transform: translateY(-1px); }
    .al-btn--orange {
        color: var(--al-white);
    }
    .al-btn--outline {
        background: transparent;
        color: var(--al-white);
        border: 2px solid var(--al-orange-lt);
        animation: none !important;
        -webkit-animation: none !important;
    }
    .al-nav__toggle {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 6px;
    }
    .al-nav__toggle span {
        display: block;
        width: 24px;
        height: 2px;
        background: #fff;
        margin: 5px 0;
        transition: .3s;
    }

    /* ── HERO ────────────────────────────────────────────────────── */
    .al-hero {
        background: linear-gradient(135deg, var(--al-dark) 0%, #0d5fa0 60%, #0A4F8A 100%);
        min-height: 520px;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        padding: 60px 0;
    }
    .al-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at 70% 50%, rgba(46,163,208,.22) 0%, transparent 65%);
    }
    .al-hero__inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center;
        position: relative;
        z-index: 1;
    }
    .al-hero__badge {
        display: inline-block;
        background: rgba(46,163,208,.18);
        border: 1px solid var(--al-orange-lt);
        color: var(--al-orange-lt);
        font-size: .85rem;
        font-weight: 700;
        letter-spacing: 1px;
        padding: 5px 14px;
        border-radius: 20px;
        margin-bottom: 16px;
    }
    .al-hero__title {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 900;
        color: #ffffff;
        line-height: 1.2;
        margin-bottom: 18px;
        text-transform: uppercase;
        white-space: pre-line;
        text-shadow: 0 2px 12px rgba(0,0,0,.4);
    }
    .al-hero__desc {
        color: #c8e4f5;
        font-size: 1rem;
        line-height: 1.7;
        margin-bottom: 28px;
    }
    .al-hero__desc p { margin: 0 0 8px; }
    .al-hero__ctas { display: flex; gap: 14px; flex-wrap: wrap; }
    .al-btn--hero { padding: 14px 32px; font-size: 1rem; border-radius: 8px; }
    .al-hero__img {
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }
    .al-hero__img img {
        max-height: 420px;
        object-fit: contain;
        filter: drop-shadow(0 8px 32px rgba(15,125,186,.4));
    }

    /* ── FEATURE / VIDEO ─────────────────────────────────────────── */
    .al-feature {
        background-color: var(--al-dark-2);
        background-size: cover;
        background-position: center right;
        background-repeat: no-repeat;
        padding: 48px 0;
        position: relative;
    }
    .al-feature__inner {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center;
    }
    /* Blue-bordered video container */
    .al-feature__media {
        position: relative;
        border: 3px solid var(--color-primary-light);
        border-radius: 14px;
        overflow: hidden;
        background: #000;
        aspect-ratio: 16/9;
        box-shadow: 0 0 28px rgba(15,125,186,0.4);
    }
    .al-feature__media iframe {
        width: 100%;
        height: 100%;
        display: block;
        border: 0;
    }
    /* Right column: empty — background image supplies the content */
    .al-feature__right { }

    /* ── BENEFITS ────────────────────────────────────────────────── */
    .al-benefits {
        background: var(--color-bg-light);
        padding: 70px 0;
    }
    .al-section-inner {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .al-section-head {
        text-align: center;
        margin-bottom: 48px;
    }
    .al-section-pretitle {
        color: var(--color-primary);
        font-size: .85rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }
    /* ── HEADLINE STYLE (Section Titles) ─────────────────────────── */
    .al-section-title,
    h2.al-section-title,
    h3.al-section-title {
        font-size: 35px;
        font-weight: bold;
        text-align: center;
        line-height: 1.2;
        background: var(--color-primary-dark);
        background: -webkit-linear-gradient(183deg, var(--color-primary-dark), var(--color-primary));
        background: linear-gradient(183deg, var(--color-primary-dark), var(--color-primary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: var(--color-primary-dark);
        margin-bottom: 14px;
        display: block;
    }
    /* ── DIVIDER BELOW HEADLINES ──────────────────────────────────── */
    .al-section-divider {
        display: block;
        width: 60%;
        margin: 0 auto 36px;
        border: 0;
        border-top: 2px solid rgb(207, 207, 207);
        border-right: 2px solid rgb(207, 207, 207);
        border-bottom: 2px solid rgb(207, 207, 207);
        border-left: 0 !important;
        border-radius: 0 3px 3px 0;
    }
    /* ── BENEFITS GRID ───────────────────────────────────────────── */
    .al-benefits__grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }

    /* ── BENEFIT CARD ────────────────────────────────────────────── */
    .al-benefit-card {
        background: #ffffff;
        border: 1px solid #c8dff0;
        border-radius: var(--al-radius);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: box-shadow .25s, transform .25s;
        position: relative;
    }
    .al-benefit-card:hover {
        box-shadow: 0 8px 32px rgba(0,0,0,.12);
        transform: translateY(-4px);
    }

    /* Body area (title + description + bg letter) */
    .al-benefit-card__body {
        padding: 28px 22px 56px;
        position: relative;
        flex: 1;
        overflow: hidden;
    }

    /* Large decorative first-letter watermark */
    .al-benefit-card__bg-letter {
        position: absolute;
        bottom: -10px;
        right: 6px;
        font-size: 110px;
        font-weight: 900;
        color: rgba(15, 125, 186, 0.07);
        line-height: 1;
        pointer-events: none;
        user-select: none;
        z-index: 0;
        font-family: sans-serif;
        letter-spacing: -5px;
    }

    /* Title */
    .al-benefit-card__title {
        font-family: sans-serif;
        color: var(--color-primary-dark);
        font-size: 17px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        line-height: 1.6;
        margin-bottom: 14px;
        position: relative;
        z-index: 1;
        -webkit-text-fill-color: var(--color-primary-dark);
    }

    /* Description */
    .al-benefit-card__desc {
        font-family: "Open Sans", sans-serif;
        color: rgb(0, 0, 0);
        font-size: 15px;
        text-align: justify;
        line-height: 1.6;
        position: relative;
        z-index: 1;
        -webkit-text-fill-color: rgb(0, 0, 0);
    }

    /* Bottom blue strip */
    .al-benefit-card__bottom {
        background-color: var(--color-primary);
        text-align: center;
        padding: 0 16px 20px;
        position: relative;
        flex-shrink: 0;
    }

    /* Icon circle — sits on the dividing line between body and bottom */
    .al-benefit-card__icon-wrap {
        width: 74px;
        height: 74px;
        border-radius: 50%;
        background: #ffffff;
        border: 3px solid var(--color-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: -37px auto 12px;
        position: relative;
        z-index: 2;
        box-shadow: 0 2px 10px rgba(0,0,0,.12);
    }
    .al-benefit-card__icon {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/u-20201125092056.png');
    }

    /* Label inside brown strip */
    .al-benefit-card__label {
        display: block;
        color: #ffffff;
        font-size: 14px;
        text-align: center !important;
        font-weight: bold !important;
        line-height: 1.4;
        -webkit-text-fill-color: #ffffff;
    }

    /* Optional CTA button (legacy, hidden by default if label present) */
    .al-benefit-card__cta {
        display: inline-block;
        margin-top: 12px;
        color: var(--al-white);
        -webkit-text-fill-color: var(--al-white);
        padding: 8px 20px;
        border-radius: 30px;
        font-size: .82rem;
        font-weight: 700;
        letter-spacing: .5px;
        transition: filter .2s, transform .15s;
    }
    .al-benefit-card__cta:hover { filter: brightness(1.12); transform: translateY(-1px); }

    /* ── PRICING ─────────────────────────────────────────────────── */
    .al-pricing {
        background: #fff;
        padding: 70px 0;
    }
    .al-pricing__grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        align-items: start;
    }
    .al-plan {
        background: var(--al-card-bg);
        border: 2px solid #c8dff0;
        border-radius: var(--al-radius);
        overflow: hidden;
        transition: transform .25s, box-shadow .25s;
    }
    .al-plan:hover { transform: translateY(-6px); box-shadow: var(--al-shadow); }
    .al-plan--featured {
        border-color: var(--color-primary);
        transform: scale(1.04);
        box-shadow: 0 8px 32px rgba(15,125,186,.28);
    }
    .al-plan--featured:hover { transform: scale(1.04) translateY(-4px); }
    .al-plan__header {
        background: var(--color-primary-dark);
        color: var(--al-white);
        padding: 20px 22px;
        text-align: center;
    }
    .al-plan--featured .al-plan__header { background: var(--color-primary); }
    .al-plan__label {
        font-size: .78rem;
        font-weight: 600;
        letter-spacing: .5px;
        opacity: .85;
        margin-bottom: 6px;
        text-transform: uppercase;
    }
    .al-plan__coverage {
        font-size: 1.9rem;
        font-weight: 900;
        line-height: 1.1;
    }
    .al-plan__body { padding: 22px; }
    .al-plan__features {
        list-style: none;
        margin-bottom: 20px;
    }
    .al-plan__features li {
        padding: 7px 0;
        border-bottom: 1px solid #f0e8d8;
        font-size: .88rem;
        color: #444;
        display: flex;
        align-items: flex-start;
        gap: 8px;
    }
    .al-plan__features li::before {
        content: '✔';
        color: var(--color-primary);
        font-weight: 700;
        flex-shrink: 0;
        margin-top: 1px;
    }
    .al-plan__pricing { margin-bottom: 18px; text-align: center; }
    .al-plan__price-original {
        font-size: .88rem;
        color: #999;
        text-decoration: line-through;
        margin-bottom: 4px;
    }
    .al-plan__price-sale {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--color-primary);
    }
    .al-plan__cta {
        display: block;
        text-align: center;
        color: var(--al-white);
        -webkit-text-fill-color: var(--al-white);
        padding: 12px;
        border-radius: 30px;
        font-weight: 700;
        font-size: .9rem;
        letter-spacing: .5px;
        transition: filter .2s, transform .15s;
    }
    .al-plan__cta:hover { filter: brightness(1.12); transform: translateY(-1px); }

    /* ── ADVANTAGES + FORM ───────────────────────────────────────── */
    .al-adv {
        background: linear-gradient(135deg, #0A4F8A 0%, #083d6e 100%);
        padding: 70px 0;
    }
    .al-adv__inner {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        align-items: start;
    }
    .al-adv__left { }
    .al-adv__title {
        color: var(--al-orange-lt);
        font-size: clamp(1.4rem, 2.5vw, 2rem);
        font-weight: 900;
        text-transform: uppercase;
        line-height: 1.25;
        margin-bottom: 26px;
        white-space: pre-line;
    }
    .al-adv__list { list-style: none; margin-bottom: 30px; }
    .al-adv__list li {
        color: #c8e4f5;
        font-size: .92rem;
        line-height: 1.6;
        padding: 8px 0;
        border-bottom: 1px solid rgba(255,255,255,.07);
        display: flex;
        gap: 10px;
        align-items: flex-start;
    }
    .al-adv__list li::before {
        content: '✔';
        color: var(--color-primary-light);
        font-weight: 700;
        flex-shrink: 0;
    }
    .al-adv__image img {
        max-height: 280px;
        object-fit: contain;
        margin: 0 auto;
        filter: drop-shadow(0 6px 20px rgba(15,125,186,.3));
    }
    .al-adv__right { }
    /* ── FORM BOX ────────────────────────────────────────────────── */
    .al-form-box {
        background: linear-gradient(160deg, #062d55 0%, #0a3f75 50%, #0d5494 100%);
        border-radius: var(--al-radius);
        padding: 36px 32px;
        box-shadow: 0 8px 40px rgba(0,0,0,.5);
        border: 1px solid rgba(15,125,186,.4);
    }
    .al-form-box__title {
        font-size: 2rem;
        font-weight: 900;
        text-align: center;
        margin-bottom: 6px;
        text-transform: uppercase;
        line-height: 1.2;
        background: var(--color-primary-light);
        background: -webkit-linear-gradient(183deg, #ffffff, var(--color-primary-light));
        background: linear-gradient(183deg, #ffffff, var(--color-primary-light));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: #ffffff;
        display: block;
    }
    .al-form-box__subtitle {
        color: rgb(228, 228, 228);
        font-size: .95rem;
        font-weight: 600;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 0;
        letter-spacing: .5px;
        -webkit-text-fill-color: rgb(228, 228, 228);
    }
    .al-form-box__divider {
        display: block;
        width: 50%;
        margin: 14px auto 22px;
        border: 0;
        border-top: 2px solid rgb(207, 207, 207);
        border-right: 2px solid rgb(207, 207, 207);
        border-bottom: 2px solid rgb(207, 207, 207);
        border-left: 0 !important;
        border-radius: 0 3px 3px 0;
    }
    /* CF7 form overrides */
    .al-form-box .wpcf7-form .wpcf7-form-control-wrap,
    .al-form-box .wpcf7-form p { margin-bottom: 12px; display: block; }
    .al-form-box .wpcf7-form input[type="text"],
    .al-form-box .wpcf7-form input[type="email"],
    .al-form-box .wpcf7-form input[type="tel"],
    .al-form-box .wpcf7-form textarea,
    .al-form-box .al-form-field {
        width: 100%;
        padding: 13px 16px;
        border: 1.5px solid rgba(207,167,120,.5);
        border-radius: 6px;
        font-size: .93rem;
        font-family: var(--al-font);
        transition: border-color .2s, box-shadow .2s;
        background: rgba(255,255,255,.07);
        color: rgb(228, 228, 228);
        -webkit-text-fill-color: rgb(228, 228, 228);
    }
    .al-form-box .wpcf7-form input[type="text"]::placeholder,
    .al-form-box .wpcf7-form input[type="email"]::placeholder,
    .al-form-box .wpcf7-form input[type="tel"]::placeholder,
    .al-form-box .al-form-field::placeholder {
        color: rgba(228,228,228,.55);
    }
    .al-form-box .wpcf7-form input:focus,
    .al-form-box .wpcf7-form textarea:focus,
    .al-form-box .al-form-field:focus {
        outline: none;
        border-color: var(--color-primary-light);
        box-shadow: 0 0 0 3px rgba(46,163,208,.2);
        background: rgba(255,255,255,.11);
    }
    .al-form-box .wpcf7-form input[type="submit"],
    .al-form-box .wpcf7-form .wpcf7-submit,
    .al-form-box__submit-btn {
        width: 100%;
        color: var(--al-white);
        border: none;
        padding: 15px;
        border-radius: 30px;
        font-size: 1.05rem;
        font-weight: 800;
        cursor: pointer;
        letter-spacing: 1px;
        text-transform: uppercase;
        display: block;
        -webkit-text-fill-color: var(--al-white);
    }
    .al-form-box .wpcf7-form input[type="submit"]:hover,
    .al-form-box .wpcf7-form .wpcf7-submit:hover,
    .al-form-box__submit-btn:hover {
        filter: brightness(1.12);
        transform: translateY(-1px);
    }
    .al-form-box__hotline {
        text-align: center;
        margin-top: 18px;
        font-size: .9rem;
        -webkit-text-fill-color: rgb(228, 228, 228);
    }
    .al-form-box__hotline a {
        color: var(--color-accent-red);
        font-weight: 800;
        font-size: 1.3rem;
        display: block;
        margin-top: 4px;
        -webkit-text-fill-color: var(--color-accent-red);
    }

    /* ── FOOTER ──────────────────────────────────────────────────── */
    .al-footer {
        background: #111;
        padding: 40px 0;
    }
    .al-footer__inner {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }
    .al-footer__logo { margin-bottom: 14px; }
    .al-footer__logo img { height: 36px; width: auto; }
    .al-footer__company {
        color: var(--al-white);
        font-weight: 700;
        margin-bottom: 12px;
        font-size: .95rem;
    }
    .al-footer__info p {
        color: #999;
        font-size: .84rem;
        line-height: 1.8;
        margin: 0;
    }
    .al-footer__info a { color: #bbb; transition: color .2s; }
    .al-footer__info a:hover { color: var(--color-primary-light); }
    .al-footer__links-title {
        color: var(--al-white);
        font-size: .92rem;
        font-weight: 700;
        margin-bottom: 14px;
        text-transform: uppercase;
        letter-spacing: .5px;
    }
    .al-footer__links-list { list-style: none; }
    .al-footer__links-list li { margin-bottom: 8px; }
    .al-footer__links-list a {
        color: #999;
        font-size: .84rem;
        transition: color .2s;
    }
    .al-footer__links-list a:hover { color: var(--color-primary-light); }
    .al-footer__bottom {
        border-top: 1px solid #2a2a2a;
        margin-top: 30px;
        padding-top: 18px;
        text-align: center;
        color: #666;
        font-size: .78rem;
    }

    /* ── MOBILE NAV DRAWER ───────────────────────────────────────── */
    .al-nav__drawer {
        display: none;
        background: var(--al-dark);
        padding: 0;
        max-height: 0;
        overflow: hidden;
        transition: max-height .35s ease;
    }
    .al-nav__drawer.is-open { max-height: 400px; }
    .al-nav__drawer-links { list-style: none; }
    .al-nav__drawer-links li { border-bottom: 1px solid rgba(255,255,255,.07); }
    .al-nav__drawer-links a {
        display: block;
        padding: 14px 20px;
        color: #cce3f5;
        font-size: .95rem;
        font-weight: 500;
    }
    .al-nav__drawer-links a:hover { color: var(--color-primary-light); background: rgba(255,255,255,.04); }
    .al-nav__drawer-cta { padding: 16px 20px; }

    /* ── RESPONSIVE ──────────────────────────────────────────────── */
    @media (max-width: 991px) {
        .al-benefits__grid { grid-template-columns: repeat(2, 1fr); }
        .al-pricing__grid { grid-template-columns: 1fr; max-width: 420px; margin: 0 auto; }
        .al-plan--featured { transform: none; }
        .al-adv__inner { grid-template-columns: 1fr; gap: 36px; }
        .al-adv__image { text-align: center; }
        .al-feature__inner { grid-template-columns: 1fr; gap: 0; }
        .al-feature__right { display: none; }
    }
    @media (max-width: 767px) {
        .al-nav__links { display: none; }
        .al-nav__toggle { display: block; }
        .al-nav__drawer { display: block; }
        .al-nav__phone { display: none; }
        .al-hero__inner { grid-template-columns: 1fr; text-align: center; }
        .al-hero__ctas { justify-content: center; }
        .al-hero__img { margin-top: 20px; }
        .al-hero__img img { max-height: 260px; }
        .al-benefits__grid { grid-template-columns: 1fr; }
        .al-footer__inner { grid-template-columns: 1fr; gap: 28px; }
        .al-form-box { padding: 22px 16px; }
        .al-section-title { font-size: 1.15rem; }
    }
    </style>
</head>

<body class="al-landing <?php echo esc_attr( implode( ' ', get_body_class() ) ); ?>">
<?php wp_body_open(); ?>

<!-- ══════════════════════════════════════════════════════════════════
     1. NAVIGATION
══════════════════════════════════════════════════════════════════ -->
<nav class="al-nav" role="navigation" aria-label="Landing Page Navigation">
    <div class="al-nav__inner">

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="al-nav__logo">
            <?php if ( $al_logo ) : ?>
                <img src="<?php echo esc_url( $al_logo['url'] ); ?>"
                     alt="<?php echo esc_attr( $al_logo['alt'] ?: get_bloginfo( 'name' ) ); ?>">
            <?php else : ?>
                <span><?php bloginfo( 'name' ); ?></span>
            <?php endif; ?>
        </a>

        <?php if ( $al_nav_links ) : ?>
        <ul class="al-nav__links">
            <?php foreach ( $al_nav_links as $link ) : ?>
                <li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <div class="al-nav__right">
            <?php if ( $al_nav_cta_phone ) : ?>
                <a class="al-nav__phone" href="<?php echo esc_url( $al_hero_cta_url ); ?>">
                    <?php echo esc_html( $al_nav_cta_phone ); ?>
                </a>
            <?php endif; ?>
        </div>

        <button class="al-nav__toggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="al-drawer">
            <span></span><span></span><span></span>
        </button>
    </div>

    <!-- Mobile Drawer -->
    <div class="al-nav__drawer" id="al-drawer" aria-hidden="true">
        <?php if ( $al_nav_links ) : ?>
        <ul class="al-nav__drawer-links">
            <?php foreach ( $al_nav_links as $link ) : ?>
                <li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="al-nav__drawer-cta">
            <a href="<?php echo esc_url( $al_hero_cta_url ); ?>" class="al-btn al-btn--orange" style="display:block;text-align:center;">
                <?php echo esc_html( $al_nav_cta_text ); ?>
            </a>
        </div>
    </div>
</nav>


<!-- ══════════════════════════════════════════════════════════════════
     2. HERO
══════════════════════════════════════════════════════════════════ -->
<section class="al-hero" id="home">
    <div class="al-hero__inner">
        <div class="al-hero__content">
            <?php if ( $al_hero_badge ) : ?>
                <div class="al-hero__badge"><?php echo esc_html( $al_hero_badge ); ?></div>
            <?php endif; ?>

            <h1 class="al-hero__title"><?php echo esc_html( $al_hero_title ); ?></h1>

            <?php if ( $al_hero_description ) : ?>
                <div class="al-hero__desc"><?php echo wp_kses_post( $al_hero_description ); ?></div>
            <?php endif; ?>

            <div class="al-hero__ctas">
                <a href="<?php echo esc_url( $al_hero_cta_url ); ?>" class="al-btn al-btn--orange al-btn--hero">
                    <?php echo esc_html( $al_hero_cta_primary ); ?>
                </a>
                <?php if ( $al_hero_cta_sec ) : ?>
                    <a href="<?php echo esc_url( $al_hero_cta_sec_url ); ?>" class="al-btn al-btn--outline al-btn--hero">
                        <?php echo esc_html( $al_hero_cta_sec ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if ( $al_hero_image ) : ?>
        <div class="al-hero__img">
            <img src="<?php echo esc_url( $al_hero_image['url'] ); ?>"
                 alt="<?php echo esc_attr( $al_hero_image['alt'] ?: $al_hero_badge ); ?>"
                 loading="eager">
        </div>
        <?php endif; ?>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════
     3. FEATURE / VIDEO
══════════════════════════════════════════════════════════════════ -->
<?php if ( $al_feature_video ) : ?>
<?php
    $feature_bg_style = '';
    if ( $al_feature_bg_image && ! empty( $al_feature_bg_image['url'] ) ) {
        $feature_bg_style = ' style="background-image:url(' . esc_url( $al_feature_bg_image['url'] ) . ');"';
    }
?>
<section class="al-feature" id="gioi-thieu"<?php echo $feature_bg_style; ?>>
    <div class="al-feature__inner">

        <!-- LEFT: YouTube embed with yellow border -->
        <div class="al-feature__media">
            <iframe src="<?php echo esc_url( $al_feature_video ); ?>"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    title="Video giới thiệu"></iframe>
        </div>

        <!-- RIGHT: Background image carries the visual content -->
        <div class="al-feature__right"></div>

    </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════════════
     4. BENEFITS
══════════════════════════════════════════════════════════════════ -->
<?php if ( $al_benefits_items ) : ?>
<section class="al-benefits" id="benefits">
    <div class="al-section-inner">
        <div class="al-section-head">
            <?php if ( $al_benefits_pretitle ) : ?>
                <p class="al-section-pretitle"><?php echo esc_html( $al_benefits_pretitle ); ?></p>
            <?php endif; ?>
            <h2 class="al-section-title"><?php echo esc_html( $al_benefits_title ); ?></h2>
            <hr class="al-section-divider">
        </div>

        <div class="al-benefits__grid">
            <?php foreach ( $al_benefits_items as $item ) :
                $card_title  = ! empty( $item['title'] )       ? $item['title']       : '';
                $card_desc   = ! empty( $item['description'] ) ? $item['description'] : '';
                $card_label  = ! empty( $item['label'] )       ? $item['label']       : '';
                $card_icon   = ! empty( $item['icon'] )        ? $item['icon']        : null;
                $card_cta    = ! empty( $item['cta_text'] )    ? $item['cta_text']    : '';
                $card_cta_url = ! empty( $item['cta_url'] )   ? $item['cta_url']     : '#dang-ky';
                // Extract first letter from label (fallback to title) for bg watermark
                $bg_src  = $card_label ?: $card_title;
                $bg_letter = $bg_src ? mb_strtoupper( mb_substr( $bg_src, 0, 1, 'UTF-8' ), 'UTF-8' ) : '';
            ?>
            <div class="al-benefit-card">

                <!-- ── Card body: title + description + bg letter ── -->
                <div class="al-benefit-card__body">
                    <?php if ( $bg_letter ) : ?>
                        <span class="al-benefit-card__bg-letter" aria-hidden="true"><?php echo esc_html( $bg_letter ); ?></span>
                    <?php endif; ?>

                    <h3 class="al-benefit-card__title"><?php echo esc_html( $card_title ); ?></h3>
                    <?php if ( $card_desc ) : ?>
                        <p class="al-benefit-card__desc"><?php echo esc_html( $card_desc ); ?></p>
                    <?php endif; ?>
                </div>

                <!-- ── Card bottom: brown strip with overlapping icon ── -->
                <div class="al-benefit-card__bottom">
                    <?php if ( $card_icon ) : ?>
                    <div class="al-benefit-card__icon-wrap">
                        <div class="al-benefit-card__icon" style="
                                background-image: url('<?php echo $card_icon['url'] ?? ''; ?>');
                                background-size: cover;
                                background-position: center;
                                background-repeat: no-repeat;
                                width: 100%;
                                height: 100%;
                                "></div>
                    </div>
                    <?php endif; ?>

                    <?php if ( $card_label ) : ?>
                        <span class="al-benefit-card__label"><?php echo esc_html( $card_label ); ?></span>
                    <?php endif; ?>

                </div>

            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════════════
     5. PRICING
══════════════════════════════════════════════════════════════════ -->
<?php if ( $al_pricing_plans ) : ?>
<section class="al-pricing" id="pricing">
    <div class="al-section-inner">
        <div class="al-section-head">
            <h2 class="al-section-title"><?php echo esc_html( $al_pricing_title ); ?></h2>
            <hr class="al-section-divider">
        </div>

        <div class="al-pricing__grid">
            <?php foreach ( $al_pricing_plans as $plan ) :
                $featured = ! empty( $plan['featured'] );
            ?>
            <div class="al-plan<?php echo $featured ? ' al-plan--featured' : ''; ?>">
                <div class="al-plan__header">
                    <?php if ( ! empty( $plan['plan_label'] ) ) : ?>
                        <p class="al-plan__label"><?php echo esc_html( $plan['plan_label'] ); ?></p>
                    <?php endif; ?>
                    <div class="al-plan__coverage"><?php echo esc_html( $plan['coverage'] ); ?></div>
                </div>
                <div class="al-plan__body">
                    <?php if ( ! empty( $plan['features'] ) ) : ?>
                    <ul class="al-plan__features">
                        <?php foreach ( $plan['features'] as $f ) : ?>
                            <li><?php echo esc_html( $f['text'] ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>

                    <div class="al-plan__pricing">
                        <?php if ( ! empty( $plan['price_original'] ) ) : ?>
                            <div class="al-plan__price-original"><?php echo esc_html( $plan['price_original'] ); ?></div>
                        <?php endif; ?>
                        <?php if ( ! empty( $plan['price_sale'] ) ) : ?>
                            <div class="al-plan__price-sale"><?php echo esc_html( $plan['price_sale'] ); ?></div>
                        <?php endif; ?>
                    </div>

                    <a href="<?php echo esc_url( $plan['cta_url'] ?: '#dang-ky' ); ?>" class="al-plan__cta">
                        <?php echo esc_html( $plan['cta_text'] ?: 'MUA NGAY' ); ?>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════════════
     6. ADVANTAGES + LEAD FORM
══════════════════════════════════════════════════════════════════ -->
<section class="al-adv" id="dang-ky">
    <div class="al-adv__inner">

        <!-- LEFT: Advantages -->
        <div class="al-adv__left">
            <h2 class="al-adv__title"><?php echo esc_html( $al_adv_title ); ?></h2>

            <?php if ( $al_adv_items ) : ?>
            <ul class="al-adv__list">
                <?php foreach ( $al_adv_items as $adv ) : ?>
                    <li><?php echo esc_html( $adv['text'] ); ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if ( $al_adv_image ) : ?>
            <div class="al-adv__image">
                <img src="<?php echo esc_url( $al_adv_image['url'] ); ?>"
                     alt="<?php echo esc_attr( $al_adv_image['alt'] ?: $al_adv_title ); ?>"
                     loading="lazy">
            </div>
            <?php endif; ?>
        </div>

        <!-- RIGHT: Lead Form -->
        <div class="al-adv__right">
            <div class="al-form-box">
                <h3 class="al-form-box__title"><?php echo esc_html( $al_form_title ); ?></h3>
                <p class="al-form-box__subtitle"><?php echo esc_html( $al_form_subtitle ); ?></p>
                <hr class="al-form-box__divider">

                <?php if ( $al_form_shortcode ) : ?>
                    <?php echo do_shortcode( wp_kses_post( $al_form_shortcode ) ); ?>
                <?php else : ?>
                    <!-- Default form (shown when no CF7 shortcode is set) -->
                    <form class="wpcf7-form al-default-form" method="post" action="#dang-ky" novalidate>
                        <p>
                            <input class="al-form-field" type="text" name="al_name" placeholder="Họ và tên" required>
                        </p>
                        <p>
                            <input class="al-form-field" type="email" name="al_email" placeholder="Email" required>
                        </p>
                        <p>
                            <input class="al-form-field" type="tel" name="al_phone" placeholder="Số điện thoại" required>
                        </p>
                        <p>
                            <button type="submit" class="al-form-box__submit-btn">ĐĂNG KÝ</button>
                        </p>
                    </form>
                <?php endif; ?>

                <?php if ( $al_hotline ) : ?>
                <div class="al-form-box__hotline">
                    Hoặc gọi tới Hotline
                    <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $al_hotline ) ); ?>">
                        <?php echo esc_html( $al_hotline ); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════
     7. FOOTER
══════════════════════════════════════════════════════════════════ -->
<footer class="al-footer" role="contentinfo">
    <div class="al-footer__inner">

        <!-- Company Info -->
        <div>
            <?php if ( $footer_logo ) : ?>
            <div class="al-footer__logo">
                <img src="<?php echo esc_url( $footer_logo['url'] ); ?>"
                     alt="<?php echo esc_attr( $footer_logo['alt'] ?: $al_footer_company ); ?>">
            </div>
            <?php endif; ?>
            <p class="al-footer__company"><?php echo esc_html( $al_footer_company ); ?></p>
            <div class="al-footer__info">
                <?php if ( $al_footer_address ) : ?>
                    <p>📍 <?php echo nl2br( esc_html( $al_footer_address ) ); ?></p>
                <?php endif; ?>
                <?php if ( $al_footer_phone ) : ?>
                    <p>📞 <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $al_footer_phone ) ); ?>">
                        <?php echo esc_html( $al_footer_phone ); ?></a></p>
                <?php endif; ?>
                <?php if ( $al_footer_email ) : ?>
                    <p>✉ <a href="mailto:<?php echo esc_attr( $al_footer_email ); ?>">
                        <?php echo esc_html( $al_footer_email ); ?></a></p>
                <?php endif; ?>
                <?php if ( $al_footer_website ) : ?>
                    <p>🌐 <a href="<?php echo esc_url( $al_footer_website ); ?>" target="_blank" rel="noopener">
                        <?php echo esc_html( rtrim( str_replace( ['https://', 'http://'], '', $al_footer_website ), '/' ) ); ?></a></p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Customer Service Links -->
        <?php if ( $al_footer_links ) : ?>
        <div>
            <p class="al-footer__links-title">CUSTOMER SERVICE</p>
            <ul class="al-footer__links-list">
                <?php foreach ( $al_footer_links as $link ) : ?>
                <li>
                    <a href="<?php echo esc_url( $link['url'] ?: '#' ); ?>">
                        <?php echo esc_html( $link['label'] ); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

    </div>


</footer>

<?php wp_footer(); ?>

<script>
(function () {
    // ── Mobile nav toggle ─────────────────────────────────────────
    var toggle  = document.querySelector('.al-nav__toggle');
    var drawer  = document.getElementById('al-drawer');
    if (toggle && drawer) {
        toggle.addEventListener('click', function () {
            var isOpen = drawer.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen);
            drawer.setAttribute('aria-hidden', !isOpen);
        });
        // Close drawer when a link is clicked
        drawer.querySelectorAll('a').forEach(function (a) {
            a.addEventListener('click', function () {
                drawer.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
                drawer.setAttribute('aria-hidden', 'true');
            });
        });
    }

    // ── Smooth scroll for anchor links ────────────────────────────
    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
        a.addEventListener('click', function (e) {
            var id = a.getAttribute('href').slice(1);
            if (!id) return;
            var target = document.getElementById(id);
            if (target) {
                e.preventDefault();
                var navH = document.querySelector('.al-nav') ? document.querySelector('.al-nav').offsetHeight : 0;
                var top  = target.getBoundingClientRect().top + window.pageYOffset - navH - 12;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        });
    });

    // ── Sticky nav highlight (active section) ─────────────────────
    var sections = document.querySelectorAll('section[id]');
    var navLinks  = document.querySelectorAll('.al-nav__links a, .al-nav__drawer-links a');
    function updateActive() {
        var scrollY = window.pageYOffset + 80;
        sections.forEach(function (sec) {
            if (scrollY >= sec.offsetTop && scrollY < sec.offsetTop + sec.offsetHeight) {
                navLinks.forEach(function (l) { l.style.color = ''; });
                navLinks.forEach(function (l) {
                    if (l.getAttribute('href') === '#' + sec.id) {
                        l.style.color = 'var(--al-orange-lt)';
                    }
                });
            }
        });
    }
    window.addEventListener('scroll', updateActive, { passive: true });
    updateActive();
})();
</script>

</body>
</html>

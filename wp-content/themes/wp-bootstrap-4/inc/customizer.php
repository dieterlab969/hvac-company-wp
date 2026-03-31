<?php
/**
 * WP Bootstrap 4 Theme Customizer
 *
 * @package WP_Bootstrap_4
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wp_bootstrap_4_customize_register( $wp_customize ) {
        $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

        if ( isset( $wp_customize->selective_refresh ) ) {
                $wp_customize->selective_refresh->add_partial( 'blogname', array(
                        'selector'        => '.site-title a',
                        'render_callback' => 'wp_bootstrap_4_customize_partial_blogname',
                ) );
                $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
                        'selector'        => '.site-description',
                        'render_callback' => 'wp_bootstrap_4_customize_partial_blogdescription',
                ) );
        }

        // ── Header Settings Section ───────────────────────────────────────────
        $wp_customize->add_section( 'header_settings', array(
                'title'       => __( 'Header Settings', 'wp-bootstrap-4' ),
                'description' => __( 'Upload and manage the header banner image displayed on desktop.', 'wp-bootstrap-4' ),
                'priority'    => 30,
        ) );

        $wp_customize->add_setting( 'header_banner_image', array(
                'default'           => 'https://dienlanhphangia.com/wp-content/uploads/2024/03/header-banner.png',
                'type'              => 'theme_mod',
                'transport'         => 'postMessage',
                'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
                $wp_customize,
                'header_banner_image',
                array(
                        'label'       => __( 'Header Banner Image', 'wp-bootstrap-4' ),
                        'description' => __( 'Upload the banner image shown in the desktop header.', 'wp-bootstrap-4' ),
                        'section'     => 'header_settings',
                        'settings'    => 'header_banner_image',
                )
        ) );

        if ( isset( $wp_customize->selective_refresh ) ) {
                $wp_customize->selective_refresh->add_partial( 'header_banner_image', array(
                        'selector'        => '.header-banner',
                        'render_callback' => 'wp_bootstrap_4_header_banner_partial',
                ) );
        }

        // ── Landing Page Colors Section ───────────────────────────────────────
        $wp_customize->add_section( 'al_landing_colors', array(
                'title'       => __( 'Landing Page – Colors', 'wp-bootstrap-4' ),
                'description' => __( 'Control the primary brand color and CTA button color for the Ads Landing Template. Changes take effect immediately on the landing page.', 'wp-bootstrap-4' ),
                'priority'    => 35,
        ) );

        // ── Primary color (main brand blue) ──────────────────────────────────
        $wp_customize->add_setting( 'al_primary_color', array(
                'default'           => '#0F7DBA',
                'type'              => 'theme_mod',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control(
                $wp_customize,
                'al_primary_color',
                array(
                        'label'       => __( 'Primary Color', 'wp-bootstrap-4' ),
                        'description' => __( 'Main brand blue used for links, borders, icons and section accents.', 'wp-bootstrap-4' ),
                        'section'     => 'al_landing_colors',
                )
        ) );

        // ── Primary dark color ────────────────────────────────────────────────
        $wp_customize->add_setting( 'al_primary_dark_color', array(
                'default'           => '#0A4F8A',
                'type'              => 'theme_mod',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control(
                $wp_customize,
                'al_primary_dark_color',
                array(
                        'label'       => __( 'Primary Dark Color', 'wp-bootstrap-4' ),
                        'description' => __( 'Darker shade used for backgrounds, the hero section and footer.', 'wp-bootstrap-4' ),
                        'section'     => 'al_landing_colors',
                )
        ) );

        // ── Primary light color ───────────────────────────────────────────────
        $wp_customize->add_setting( 'al_primary_light_color', array(
                'default'           => '#2EA3D0',
                'type'              => 'theme_mod',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control(
                $wp_customize,
                'al_primary_light_color',
                array(
                        'label'       => __( 'Primary Light / Accent Color', 'wp-bootstrap-4' ),
                        'description' => __( 'Lighter blue used for video borders, hover states and subtle highlights.', 'wp-bootstrap-4' ),
                        'section'     => 'al_landing_colors',
                )
        ) );

        // ── CTA button color (conversion red) ─────────────────────────────────
        $wp_customize->add_setting( 'al_cta_color', array(
                'default'           => '#E53935',
                'type'              => 'theme_mod',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control(
                $wp_customize,
                'al_cta_color',
                array(
                        'label'       => __( 'CTA Button Color', 'wp-bootstrap-4' ),
                        'description' => __( 'Color for all call-to-action buttons (Register / Contact / Submit). Use a high-contrast color for maximum conversion.', 'wp-bootstrap-4' ),
                        'section'     => 'al_landing_colors',
                )
        ) );
}
add_action( 'customize_register', 'wp_bootstrap_4_customize_register' );


/**
 * Render the header banner image for selective refresh.
 */
function wp_bootstrap_4_header_banner_partial() {
        $default_url = 'https://dienlanhphangia.com/wp-content/uploads/2024/03/header-banner.png';
        $banner_url  = get_theme_mod( 'header_banner_image', $default_url );
        if ( empty( $banner_url ) ) {
                $banner_url = $default_url;
        }
        echo '<img alt="' . esc_attr__( 'header banner', 'wp-bootstrap-4' ) . '" class="header-banner" src="' . esc_url( $banner_url ) . '"/>';
}

/**
 * Render the site title for the selective refresh partial.
 */
function wp_bootstrap_4_customize_partial_blogname() {
        bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function wp_bootstrap_4_customize_partial_blogdescription() {
        bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_bootstrap_4_customize_preview_js() {
        wp_enqueue_script( 'wp-bootstrap-4-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wp_bootstrap_4_customize_preview_js' );

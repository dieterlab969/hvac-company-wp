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
        $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

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

        // Setting: header_banner_image
        $wp_customize->add_setting( 'header_banner_image', array(
                'default'           => 'https://dienlanhphangia.com/wp-content/uploads/2024/03/header-banner.png',
                'type'              => 'theme_mod',
                'transport'         => 'postMessage',
                'sanitize_callback' => 'esc_url_raw',
        ) );

        // Control: image upload
        $wp_customize->add_control( new WP_Customize_Image_Control(
                $wp_customize,
                'header_banner_image',
                array(
                        'label'       => __( 'Header Banner Image', 'wp-bootstrap-4' ),
                        'description' => __( 'Upload the banner image shown in the desktop header (typically includes phone number and logo).', 'wp-bootstrap-4' ),
                        'section'     => 'header_settings',
                        'settings'    => 'header_banner_image',
                )
        ) );

        // Selective refresh partial for live preview
        if ( isset( $wp_customize->selective_refresh ) ) {
                $wp_customize->selective_refresh->add_partial( 'header_banner_image', array(
                        'selector'        => '.header-banner',
                        'render_callback' => 'wp_bootstrap_4_header_banner_partial',
                ) );
        }
}
add_action( 'customize_register', 'wp_bootstrap_4_customize_register' );

/**
 * Render the header banner image for selective refresh.
 *
 * @return void
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
 *
 * @return void
 */
function wp_bootstrap_4_customize_partial_blogname() {
        bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
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

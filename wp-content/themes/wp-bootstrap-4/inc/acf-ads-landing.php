<?php
/**
 * ACF Field Group Registration for Ads Landing Page Template
 *
 * Registers all editable fields for the "Ads Landing Template".
 * Fields are organized into logical sections matching the page layout.
 *
 * @package WP_Bootstrap_4
 */

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

acf_add_local_field_group( array(
    'key'                   => 'group_ads_landing',
    'title'                 => 'Ads Landing Page — Content',
    'fields'                => array(

        // ─── HEADER / NAV ─────────────────────────────────────────────────────
        array(
            'key'   => 'field_al_tab_header',
            'label' => '🔷 Header / Navigation',
            'type'  => 'tab',
        ),
        array(
            'key'          => 'field_al_logo',
            'label'        => 'Logo',
            'name'         => 'al_logo',
            'type'         => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'instructions' => 'Upload the logo image for the landing page header.',
        ),
        array(
            'key'          => 'field_al_nav_links',
            'label'        => 'Navigation Links',
            'name'         => 'al_nav_links',
            'type'         => 'repeater',
            'instructions' => 'Add anchor links for the navigation bar.',
            'button_label' => 'Add Link',
            'sub_fields'   => array(
                array(
                    'key'   => 'field_al_nav_label',
                    'label' => 'Label',
                    'name'  => 'label',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_al_nav_url',
                    'label' => 'URL / Anchor (#section)',
                    'name'  => 'url',
                    'type'  => 'text',
                ),
            ),
        ),
        array(
            'key'   => 'field_al_nav_cta_text',
            'label' => 'Nav CTA Button Text',
            'name'  => 'al_nav_cta_text',
            'type'  => 'text',
            'default_value' => 'ĐĂNG KÝ',
        ),
        array(
            'key'   => 'field_al_nav_cta_phone',
            'label' => 'Phone Number (shown in nav)',
            'name'  => 'al_nav_cta_phone',
            'type'  => 'text',
            'placeholder' => '1900 XXXX XX',
        ),

        // ─── HERO SECTION ─────────────────────────────────────────────────────
        array(
            'key'   => 'field_al_tab_hero',
            'label' => '🔶 Hero Section',
            'type'  => 'tab',
        ),
        array(
            'key'   => 'field_al_hero_badge',
            'label' => 'Badge / Product Label',
            'name'  => 'al_hero_badge',
            'type'  => 'text',
            'default_value' => 'FLASH ROSTASH*',
            'instructions' => 'Small label above the main title (e.g., product name).',
        ),
        array(
            'key'   => 'field_al_hero_title',
            'label' => 'Hero Title',
            'name'  => 'al_hero_title',
            'type'  => 'textarea',
            'rows'  => 3,
            'default_value' => "BẢO HIỂM RỦI RO\nKHÔNG GIAN MẠNG",
        ),
        array(
            'key'   => 'field_al_hero_description',
            'label' => 'Hero Description',
            'name'  => 'al_hero_description',
            'type'  => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
            'instructions' => 'Short description text shown under the hero title.',
        ),
        array(
            'key'   => 'field_al_hero_cta_primary_text',
            'label' => 'Primary CTA Button Text',
            'name'  => 'al_hero_cta_primary_text',
            'type'  => 'text',
            'default_value' => 'ĐĂNG KÝ NGAY',
        ),
        array(
            'key'   => 'field_al_hero_cta_primary_url',
            'label' => 'Primary CTA Button URL / Anchor',
            'name'  => 'al_hero_cta_primary_url',
            'type'  => 'text',
            'default_value' => '#dang-ky',
        ),
        array(
            'key'   => 'field_al_hero_cta_secondary_text',
            'label' => 'Secondary CTA Text (optional)',
            'name'  => 'al_hero_cta_secondary_text',
            'type'  => 'text',
            'instructions' => 'Leave blank to hide.',
        ),
        array(
            'key'   => 'field_al_hero_cta_secondary_url',
            'label' => 'Secondary CTA URL / Anchor',
            'name'  => 'al_hero_cta_secondary_url',
            'type'  => 'text',
        ),
        array(
            'key'          => 'field_al_hero_image',
            'label'        => 'Hero Image',
            'name'         => 'al_hero_image',
            'type'         => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'instructions' => 'Character / product image displayed on the right side of the hero.',
        ),

        // ─── FEATURE / VIDEO SECTION ───────────────────────────────────────────
        array(
            'key'   => 'field_al_tab_feature',
            'label' => '🎬 Feature / Video Section',
            'type'  => 'tab',
        ),
        array(
            'key'          => 'field_al_feature_bg_image',
            'label'        => 'Background Image',
            'name'         => 'al_feature_bg_image',
            'type'         => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'instructions' => 'Full-width background image for the feature section. The right-side content (text, badge) should be part of this image.',
        ),
        array(
            'key'   => 'field_al_feature_video_url',
            'label' => 'YouTube Embed URL',
            'name'  => 'al_feature_video_url',
            'type'  => 'url',
            'instructions' => 'Paste the YouTube embed URL (e.g., https://www.youtube.com/embed/VqTKS5i9OYM?si=MIjp2tb1uGcUh5aL). Leave blank to hide the feature section.',
        ),

        // ─── BENEFITS SECTION ─────────────────────────────────────────────────
        array(
            'key'   => 'field_al_tab_benefits',
            'label' => '✅ Benefits Section',
            'type'  => 'tab',
        ),
        array(
            'key'   => 'field_al_benefits_pretitle',
            'label' => 'Pre-title (small text above heading)',
            'name'  => 'al_benefits_pretitle',
            'type'  => 'text',
            'default_value' => 'FLASH ROSTASH',
        ),
        array(
            'key'   => 'field_al_benefits_title',
            'label' => 'Section Title',
            'name'  => 'al_benefits_title',
            'type'  => 'text',
            'default_value' => 'BẢO VỆ BẠN TRƯỚC NHỮNG RỦI RO NÀO TRÊN KHÔNG GIAN MẠNG?',
        ),
        array(
            'key'          => 'field_al_benefits_items',
            'label'        => 'Benefit Items',
            'name'         => 'al_benefits_items',
            'type'         => 'repeater',
            'button_label' => 'Add Benefit',
            'layout'       => 'block',
            'sub_fields'   => array(
                array(
                    'key'          => 'field_al_benefit_icon',
                    'label'        => 'Icon Image',
                    'name'         => 'icon',
                    'type'         => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ),
                array(
                    'key'   => 'field_al_benefit_title',
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_al_benefit_desc',
                    'label' => 'Description',
                    'name'  => 'description',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ),
                array(
                    'key'   => 'field_al_benefit_cta',
                    'label' => 'CTA Button Text (optional)',
                    'name'  => 'cta_text',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_al_benefit_cta_url',
                    'label' => 'CTA Button URL',
                    'name'  => 'cta_url',
                    'type'  => 'text',
                    'default_value' => '#dang-ky',
                ),
            ),
        ),

        // ─── PRICING SECTION ──────────────────────────────────────────────────
        array(
            'key'   => 'field_al_tab_pricing',
            'label' => '💰 Pricing Section',
            'type'  => 'tab',
        ),
        array(
            'key'   => 'field_al_pricing_title',
            'label' => 'Section Title',
            'name'  => 'al_pricing_title',
            'type'  => 'text',
            'default_value' => 'BACLKOLES VÀ CÁC LỰA CHỌN',
        ),
        array(
            'key'          => 'field_al_pricing_plans',
            'label'        => 'Pricing Plans',
            'name'         => 'al_pricing_plans',
            'type'         => 'repeater',
            'button_label' => 'Add Plan',
            'layout'       => 'block',
            'sub_fields'   => array(
                array(
                    'key'   => 'field_al_plan_featured',
                    'label' => 'Featured (highlighted)',
                    'name'  => 'featured',
                    'type'  => 'true_false',
                    'ui'    => 1,
                ),
                array(
                    'key'   => 'field_al_plan_label',
                    'label' => 'Plan Label (e.g. "QUYỀN LỢI BẢO VỆ TỐI ĐA")',
                    'name'  => 'plan_label',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_al_plan_coverage',
                    'label' => 'Coverage Amount (e.g. "15.000 USD")',
                    'name'  => 'coverage',
                    'type'  => 'text',
                ),
                array(
                    'key'          => 'field_al_plan_features',
                    'label'        => 'Features / Inclusions (one per row)',
                    'name'         => 'features',
                    'type'         => 'repeater',
                    'button_label' => 'Add Feature',
                    'layout'       => 'table',
                    'sub_fields'   => array(
                        array(
                            'key'   => 'field_al_plan_feature_text',
                            'label' => 'Feature',
                            'name'  => 'text',
                            'type'  => 'text',
                        ),
                    ),
                ),
                array(
                    'key'   => 'field_al_plan_price_original',
                    'label' => 'Original Price (struck through)',
                    'name'  => 'price_original',
                    'type'  => 'text',
                    'placeholder' => '1.300.000 VNĐ',
                ),
                array(
                    'key'   => 'field_al_plan_price_sale',
                    'label' => 'Sale Price (highlighted)',
                    'name'  => 'price_sale',
                    'type'  => 'text',
                    'placeholder' => '910.000 VNĐ',
                ),
                array(
                    'key'   => 'field_al_plan_cta_text',
                    'label' => 'CTA Button Text',
                    'name'  => 'cta_text',
                    'type'  => 'text',
                    'default_value' => 'MUA NGAY',
                ),
                array(
                    'key'   => 'field_al_plan_cta_url',
                    'label' => 'CTA Button URL',
                    'name'  => 'cta_url',
                    'type'  => 'text',
                    'default_value' => '#dang-ky',
                ),
            ),
        ),

        // ─── ADVANTAGES + FORM SECTION ────────────────────────────────────────
        array(
            'key'   => 'field_al_tab_advantages',
            'label' => '⭐ Advantages & Form',
            'type'  => 'tab',
        ),
        array(
            'key'   => 'field_al_adv_title',
            'label' => 'Section Title',
            'name'  => 'al_adv_title',
            'type'  => 'text',
            'default_value' => "ƯU ĐIỂM CỦA\nBẢO HIỂM FASHBASK",
        ),
        array(
            'key'          => 'field_al_adv_items',
            'label'        => 'Advantage Bullet Points',
            'name'         => 'al_adv_items',
            'type'         => 'repeater',
            'button_label' => 'Add Advantage',
            'layout'       => 'table',
            'sub_fields'   => array(
                array(
                    'key'   => 'field_al_adv_item_text',
                    'label' => 'Advantage',
                    'name'  => 'text',
                    'type'  => 'text',
                ),
            ),
        ),
        array(
            'key'          => 'field_al_adv_image',
            'label'        => 'Advantages Section Image',
            'name'         => 'al_adv_image',
            'type'         => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
        ),
        array(
            'key'   => 'field_al_form_title',
            'label' => 'Form Section Title',
            'name'  => 'al_form_title',
            'type'  => 'text',
            'default_value' => 'ĐỂ LẠI THÔNG TIN',
        ),
        array(
            'key'   => 'field_al_form_subtitle',
            'label' => 'Form Section Subtitle',
            'name'  => 'al_form_subtitle',
            'type'  => 'text',
            'default_value' => 'ĐỂ ĐƯỢC TƯ VẤN MIỄN PHÍ',
        ),
        array(
            'key'          => 'field_al_form_shortcode',
            'label'        => 'Contact Form Shortcode',
            'name'         => 'al_form_shortcode',
            'type'         => 'text',
            'instructions' => 'Paste your Contact Form 7 shortcode here, e.g. [contact-form-7 id="123" title="Landing Form"]',
            'placeholder'  => '[contact-form-7 id="1" title="Contact form 1"]',
        ),
        array(
            'key'   => 'field_al_hotline',
            'label' => 'Hotline Number',
            'name'  => 'al_hotline',
            'type'  => 'text',
            'placeholder' => '1900 XXXX XX',
        ),

        // ─── FOOTER ────────────────────────────────────────────────────────────
        array(
            'key'   => 'field_al_tab_footer',
            'label' => '🔻 Footer',
            'type'  => 'tab',
        ),
        array(
            'key'          => 'field_al_footer_logo',
            'label'        => 'Footer Logo',
            'name'         => 'al_footer_logo',
            'type'         => 'image',
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'instructions' => 'Leave blank to use the header logo.',
        ),
        array(
            'key'   => 'field_al_footer_company',
            'label' => 'Company Name',
            'name'  => 'al_footer_company',
            'type'  => 'text',
            'default_value' => 'MYSTORE.COM — MY SHOP OR COMPANY NAME',
        ),
        array(
            'key'   => 'field_al_footer_address',
            'label' => 'Address',
            'name'  => 'al_footer_address',
            'type'  => 'textarea',
            'rows'  => 2,
        ),
        array(
            'key'   => 'field_al_footer_phone',
            'label' => 'Phone',
            'name'  => 'al_footer_phone',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_al_footer_email',
            'label' => 'Email',
            'name'  => 'al_footer_email',
            'type'  => 'email',
        ),
        array(
            'key'   => 'field_al_footer_website',
            'label' => 'Website URL',
            'name'  => 'al_footer_website',
            'type'  => 'url',
        ),
        array(
            'key'          => 'field_al_footer_links',
            'label'        => 'Customer Service Links',
            'name'         => 'al_footer_links',
            'type'         => 'repeater',
            'button_label' => 'Add Link',
            'layout'       => 'table',
            'sub_fields'   => array(
                array(
                    'key'   => 'field_al_footer_link_label',
                    'label' => 'Label',
                    'name'  => 'label',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_al_footer_link_url',
                    'label' => 'URL',
                    'name'  => 'url',
                    'type'  => 'text',
                ),
            ),
        ),

    ),
    'location' => array(
        array(
            array(
                'param'    => 'page_template',
                'operator' => '==',
                'value'    => 'page-templates/ads-landing-template.php',
            ),
        ),
    ),
    'menu_order'            => 0,
    'position'              => 'normal',
    'style'                 => 'default',
    'label_placement'       => 'top',
    'instruction_placement' => 'label',
    'active'                => true,
    'description'           => 'Content fields for the Ads Landing Page template. All content is editable here — no coding required.',
) );

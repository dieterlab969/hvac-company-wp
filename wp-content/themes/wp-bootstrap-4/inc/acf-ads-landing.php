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

        // ─── HERO SECTION ───────────────────────────────
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
            'default_value' => 'ĐIỆN LẠNH PHAN GIA',
            'instructions' => 'Small label above the main title.',
        ),
        array(
            'key'   => 'field_al_hero_title',
            'label' => 'Hero Title',
            'name'  => 'al_hero_title',
            'type'  => 'textarea',
            'rows'  => 3,
            'default_value' => "LẮP ĐẶT & BẢO TRÌ\nĐIỀU HÒA CHUYÊN NGHIỆP",
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
            'default_value' => 'ĐĂNG KÝ TƯ VẤN MIỄN PHÍ',
        ),
        array(
            'key'   => 'field_al_hero_cta_primary_url',
            'label' => 'Primary CTA Button URL / Anchor',
            'name'  => 'al_hero_cta_primary_url',
            'type'  => 'text',
            'default_value' => '#contact',
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
            'default_value' => '#pricing',
        ),
        array(
            'key'          => 'field_al_hero_image',
            'label'        => 'Hero Image',
            'name'         => 'al_hero_image',
            'type'         => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'instructions' => 'Image displayed on the right side of the hero.',
        ),

        // ─── VIDEO SECTION ───────────────────────────────
        array(
            'key'   => 'field_al_tab_video',
            'label' => '🎬 Video Section',
            'type'  => 'tab',
        ),
        array(
            'key'   => 'field_al_video_section_title',
            'label' => 'Video Section Title',
            'name'  => 'al_video_section_title',
            'type'  => 'text',
            'default_value' => 'TẠI SAO CHỌN PHAN GIA?',
        ),
        array(
            'key'   => 'field_al_video_url',
            'label' => 'YouTube Embed URL',
            'name'  => 'al_video_url',
            'type'  => 'url',
            'instructions' => 'Paste the YouTube embed URL. Leave blank to hide the video section.',
        ),
        array(
            'key'   => 'field_al_video_content',
            'label' => 'Video Section Content',
            'name'  => 'al_video_content',
            'type'  => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
            'default_value' => '<p>Với hơn 10 năm kinh nghiệm trong ngành điện lạnh...</p>',
        ),

        // ─── PRICING SECTION ─────────────────────────────
        array(
            'key'   => 'field_al_tab_pricing',
            'label' => '💰 Pricing Section',
            'type'  => 'tab',
        ),
        array(
            'key'   => 'field_al_pricing_title',
            'label' => 'Pricing Section Title',
            'name'  => 'al_pricing_title',
            'type'  => 'text',
            'default_value' => 'GÓI DỊCH VỤ PHÙ HỢP VỚI BẠN',
        ),
        array(
            'key'          => 'field_al_pricing_items',
            'label'        => 'Pricing Items',
            'name'         => 'al_pricing_items',
            'type'         => 'repeater',
            'button_label' => 'Add Pricing Item',
            'layout'       => 'block',
            'sub_fields'   => array(
                array(
                    'key'   => 'field_al_pricing_image',
                    'label' => 'Image',
                    'name'  => 'image',
                    'type'  => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ),
                array(
                    'key'   => 'field_al_pricing_title',
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_al_pricing_description',
                    'label' => 'Description',
                    'name'  => 'description',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ),
                array(
                    'key'   => 'field_al_pricing_price',
                    'label' => 'Price',
                    'name'  => 'price',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_al_pricing_cta_text',
                    'label' => 'CTA Button Text',
                    'name'  => 'cta_text',
                    'type'  => 'text',
                    'default_value' => 'ĐĂNG KÝ NGAY',
                ),
                array(
                    'key'   => 'field_al_pricing_cta_url',
                    'label' => 'CTA Button URL',
                    'name'  => 'cta_url',
                    'type'  => 'text',
                    'default_value' => '#contact',
                ),
            ),
        ),

        // ─── GALLERY SECTION ─────────────────────────────
        array(
            'key'   => 'field_al_tab_gallery',
            'label' => '🖼 Gallery Section',
            'type'  => 'tab',
        ),
        array(
            'key'   => 'field_al_gallery_title',
            'label' => 'Gallery Section Title',
            'name'  => 'al_gallery_title',
            'type'  => 'text',
            'default_value' => 'DỰ ÁN THỰC TẾ CỦA CHÚNG TÔI',
        ),
        array(
            'key'          => 'field_al_gallery_images',
            'label'        => 'Gallery Images',
            'name'         => 'al_gallery_images',
            'type'         => 'gallery',
            'preview_size' => 'medium',
            'insert'       => 'append',
            'library'      => 'all',
        ),

        // ─── PRE-FOOTER / FORM SECTION ─────────────────
        array(
            'key'   => 'field_al_tab_form',
            'label' => '📩 Pre-footer & Form',
            'type'  => 'tab',
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
            'key'   => 'field_al_form_shortcode',
            'label' => 'Contact Form Shortcode',
            'name'  => 'al_form_shortcode',
            'type'  => 'text',
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
        array(
            'key'          => 'field_al_footer_ac_image',
            'label'        => 'Footer AC Image',
            'name'         => 'al_footer_ac_image',
            'type'         => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
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
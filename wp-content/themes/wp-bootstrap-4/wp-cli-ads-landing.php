<?php

if ( defined( 'WP_CLI' ) && WP_CLI ) {
   WP_CLI::add_command( 'ads-landing create', function () {
     $existing = get_page_by_title('Ads Landing Page');
     if ($existing) {
         WP_CLI::warning('Page already exists. Skipping...');
         return;
     }
     // 1. Create page
     $page_id = wp_insert_post([
         'post_title'   => 'Ads Landing Page',
         'post_status'  => 'publish',
         'post_type'    => 'page',
         'post_content' => '',
     ]);

     if ( is_wp_error( $page_id ) ) {
         WP_CLI::error( 'Failed to create page.' );
         return;
     }
     // 2. Set template
     update_post_meta($page_id, '_wp_page_template', 'page-templates/ads-landing-template.php');

      // 3. ACF DATA
     $data = [
         'al_nav_links' => [
             ['label' => 'Trang chủ', 'url' => '#home'],
             ['label' => 'Quyền lợi', 'url' => '#benefits'],
             ['label' => 'Gói sản phẩm', 'url' => '#pricing'],
         ],
         'al_nav_cta_text' => '1900 XXXX XX',
         'al_nav_cta_phone' => '1900 XXXX XX',

         'al_hero_badge' => 'FLASH ROSTASH',
         'al_hero_title' => "BẢO HIỂM RỦI RO\nKHÔNG GIAN MẠNG",
         'al_hero_description' => 'Thời gian gần đây, các hình thức lừa đảo qua mạng Internet có xu hướng gia tăng mạnh mẽ...',
         'al_hero_cta_primary_text' => 'MUA NGAY',
         'al_hero_cta_primary_url' => '#dang-ky',

         'al_feature_video_url' => 'https://www.youtube.com/embed/VqTKS5i9OYM?si=MIjp2tb1uGcUh5aL',

         'al_benefits_pretitle' => 'FLASH ROSTASH',
         'al_benefits_title' => 'BẢO VỆ BẠN TRƯỚC NHỮNG RỦI RO NÀO TRÊN KHÔNG GIAN MẠNG?',
         'al_benefits_items' => [
             [
                 'title' => 'BẢO VỆ RỦI RO GIAO DỊCH TRỰC TUYẾN',
                 'description' => 'Bồi thường khoản tiền bị mất trong tài khoản ngân hàng...',
                 'cta_text' => '',
                 'cta_url' => '#dang-ky'
             ],
             [
                 'title' => 'BẢO VỆ KHI GẶP PHẢI LỪA ĐẢO TRỰC TUYẾN',
                 'description' => 'Bồi thường khoản tiền bị mất do lừa đảo...',
                 'cta_text' => '',
                 'cta_url' => '#dang-ky'
             ]
         ],

         'al_pricing_title' => 'BACKLIDES VÀ CÁC LỰA CHỌN',
         'al_pricing_plans' => [
             [
                 'featured' => 1,
                 'plan_label' => 'QUYỀN LỢI 0 + C + R + I',
                 'coverage' => '15.000 USD',
                 'price_original' => '1.300.000 VND',
                 'price_sale' => '830.000 VND',
                 'cta_text' => 'MUA NGAY',
                 'cta_url' => '#dang-ky'
             ]
         ],

         'al_adv_title' => "ƯU ĐIỂM CỦA\nBẢO HIỂM FASHRASK",
         'al_adv_items' => [
             ['text' => 'Cấp đơn bảo hiểm điện tử trong vòng 1 phút'],
             ['text' => 'Xác nhận bồi thường trong vòng 1 ngày']
         ],

         'al_form_title' => 'ĐỂ LẠI THÔNG TIN',
         'al_form_subtitle' => 'ĐỂ ĐƯỢC TƯ VẤN MIỄN PHÍ',
         'al_form_shortcode' => '[contact-form-7 id="211" title="Form Đăng Ký"]',
         'al_hotline' => '1900 XXXX XX',

         'al_footer_company' => 'MYSTORE.COM - MY SHOP OR COMPANY NAME',
         'al_footer_address' => 'Address number, Street, District, City',
         'al_footer_phone' => '849722000XX',
         'al_footer_email' => 'email@mystore.com',
         'al_footer_website' => 'http://mystore.com'
     ];

     // 4. Save ACF fields
     foreach ($data as $field => $value) {
         update_field($field, $value, $page_id);
     }

     WP_CLI::success("Landing page created! ID: {$page_id}");
   });
}
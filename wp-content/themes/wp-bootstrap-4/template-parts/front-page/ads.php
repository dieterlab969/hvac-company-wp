<?php

$grp_condition_solution = get_field('ads_on_frontpage', 'option');
$condition_title = $grp_condition_solution['title'] ?? 'Giải pháp điều hòa';
$condition_desc = $grp_condition_solution['description'] ?? '<p><strong>PHAN GIA là đơn vị chuyên Thiết kế &amp; Thi công Hệ thống Điều hòa không khí trung tâm VRV ,Chiler , AHU , Điều hòa thương mại và hệ thống thông gió thu hồi nhiệt.</strong></p>
            <p><strong>Giải pháp cho cửa hàng tiện lợi</strong><br>
                <strong>Giải pháp cho biệt thự nghỉ dưỡng</strong></p>
            <p><strong>Giải pháp cho tòa nhà văn phòng</strong><br>
                <strong>Giải pháp cho nhà hàng showrom</strong></p>
            <p>&nbsp;</p>
            <p></p>';

$banner_1 = $grp_condition_solution['banner_1'];
$banner_2 = $grp_condition_solution['banner_2'];
$banner_3 = $grp_condition_solution['banner_3'];
$banner_4 = $grp_condition_solution['banner_4'];
$banner_5 = $grp_condition_solution['banner_5'];
$banner_6 = $grp_condition_solution['banner_6'];

$b_title_1 = $banner_1['title'] ?: 'Cửa hàng tiện lợi';
$b_title_2 = $banner_2['title'] ?: 'Khách sạn nghỉ dưỡng';
$b_title_3 = $banner_3['title'] ?: 'Văn phòng';
$b_title_4 = $banner_4['title'] ?: 'Villa, biệt thự';
$b_title_5 = $banner_5['title'] ?: 'Khách sạn ';
$b_title_6 = $banner_6['title'] ?: 'Nhà máy sản xuất ';

$b_img_1 = $banner_1['image'] ?: 'https://ad-daikin.daikin.com.vn:60444/storage/upload/media/ac-solutions/retail.png';
$b_img_2 = $banner_2['image'] ?: 'https://ad-daikin.daikin.com.vn:60444/storage/upload/media/ac-solutions/resort-and-hotel-1.png';
$b_img_3 = $banner_3['image'] ?: 'https://ad-daikin.daikin.com.vn:60444/storage/upload/media/ac-solutions/building.png';
$b_img_4 = $banner_4['image'] ?: 'https://ad-daikin.daikin.com.vn:60444/storage/upload/media/ac-solutions/building.png';
$b_img_5 = $banner_5['image'] ?: 'https://ad-daikin.daikin.com.vn:60444/storage/upload/media/ac-solutions/building.png';
$b_img_6 = $banner_6['image'] ?: 'https://ad-daikin.daikin.com.vn:60444/storage/upload/media/ac-solutions/building.png';

$b_link_1 = $banner_1['link'] ?: '#';
$b_link_2 = $banner_2['link'] ?: '#';
$b_link_3 = $banner_3['link'] ?: '#';
$b_link_4 = $banner_4['link'] ?: '#';
$b_link_5 = $banner_5['link'] ?: '#';
$b_link_6 = $banner_6['link'] ?: '#';
?>
<style>
    .advertisement-block {
        display: flex;
        flex-wrap: wrap;
    }

    .left-column {
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
        font-size: 1.4rem;
        font-family: "segoeui";
        font-weight: 200;
    }
    .left-column .ad-title {
        font-size: 2.2rem;
        font-family: "segoeui_black";
        position: relative;
        border-bottom: 1px solid #ccc;
        padding-bottom: 1rem;
        margin-bottom: 3rem;
    }

    .left-column .ad-title::after {
        content: "";
        position: absolute;
        width: 75px;
        height: 3px;
        background-color: #00A0E4;
        left: 50%;
        -webkit-transform: translatex(-50%);
        -ms-transform: translatex(-50%);
        transform: translatex(-50%);
        bottom: -2px;
    }

    .right-column {
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
        overflow: hidden;
    }
    .swiper7 {
        height: 356px;
    }
    .swiper7 .swiper-slide {
        height: 100%;
    }
    .swiper7 .sub-block {
        display: block;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .swiper7 .sub-title {
        position: absolute;
        bottom: 0;
        color: white;
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
        background-color: #00A0E4;
    }

    /* Desktop styles */
    @media screen and (min-width: 768px) {
        .advertisement-block {
            flex-wrap: nowrap;
        }

        .left-column {
            width: 23%; /* Nhỏ hơn 1/4 */
        }

        .right-column {
            width: 77%; /* Phần còn lại */
        }
    }
</style>
<div class="container">
    <div class="advertisement-block">
        <div class="left-column">
            <h2 class="ad-title text-uppercase"><?= $condition_title ?></h2>
            <p class="ad-description"><?= $condition_desc ?></p>
        </div>
        <div class="right-column">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper swiper7">
                            <div class="swiper-wrapper">
                                <a class="sub-block swiper-slide" style="background-image: url('<?= esc_html($b_img_1) ?>');" href="<?= $b_link_1 ?>">
                                    <span class="sub-title"><?= esc_html($b_title_1)?></span>
                                </a>
                                <a class="sub-block swiper-slide" style="background-image: url('<?= esc_html($b_img_2) ?>');" href="<?= $b_link_2 ?>">
                                    <span class="sub-title"><?= esc_html($b_title_2) ?></span>
                                </a>
                                <a class="sub-block swiper-slide" style="background-image: url('<?= esc_html($b_img_3) ?>');" href="<?= $b_link_3 ?>">
                                    <span class="sub-title"><?= esc_html($b_title_3) ?></span>
                                </a>
                                <a class="sub-block swiper-slide" style="background-image: url('<?= esc_html($b_img_4) ?>');" href="<?= $b_link_4 ?>">
                                    <span class="sub-title"><?= esc_html($b_title_4)?></span>
                                </a>
                                <a class="sub-block swiper-slide" style="background-image: url('<?= esc_html($b_img_5) ?>');" href="<?= $b_link_5 ?>">
                                    <span class="sub-title"><?= esc_html($b_title_5) ?></span>
                                </a>
                                <a class="sub-block swiper-slide" style="background-image: url('<?= esc_html($b_img_6) ?>');" href="<?= $b_link_6 ?>">
                                    <span class="sub-title"><?= esc_html($b_title_6) ?></span>
                                </a>
                            </div>
                            <div class="swiper-button-prev swiper-button-prev_7 fa fa-angle-left"></div>
                            <div class="swiper-button-next swiper-button-next_7 fa fa-angle-right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- ===========================
=== START 
-->

<style>
    #mainheader {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    #mainheader .logolink img {
        max-width: 100px;
    }

    #mainheader .mainlogo, #mainheader .infohotline {
        display: flex;
        flex-direction: row;
        margin-left: 58px;
    }

    #mainheader .infohotline dt, #mainheader .infohotline dd {
        display: inline-block;
        margin: 0;
    }

    #mainheader .service1, #mainheader .service2 {
        position: relative;
    }
    #mainheader .list-service li {
        line-height: 36px;
        padding-left: 10px;
        padding-right: 10px;
    }
    #mainheader .service1:before, #mainheader .service2:before {
        position: absolute;
        width: 30px;
        height: 30px;
        content: " ";
        left: -32px;
        top: 6px;

    }
    #mainheader .service1:before {
        background: url("https://dienlanhphangia.com/wp-content/uploads/2024/03/rangcua1.png");
    }

    #mainheader .service2:before {
        background: url("https://dienlanhphangia.com/wp-content/uploads/2024/03/rangcua2.png");
    }

    .list-service {
        list-style-type: none;
    }
    #mainheader .info-detail {
        font-weight: bold;
        padding-top: 10px;
        margin-right: 39px;
    }
    #mainheader .info-detail .line2 {
        font-weight: bold;
        margin-left: 4px;
        font-size: 28px;
    }

    #mainheader .divonright {
        margin-left: 10px;
    }
    #mainheader .divonright dl {
        margin: 0;
        font-size: 13px;
        line-height: 24px;
    }
    .desktop-hidden {
        display: none;
    }
    .header__main .mobile-hidden {
        margin: 0 auto;
    }

    @media only screen and (max-width : 320px) {

        .desktop-hidden {
            display: block;
        }
       .mobile-hidden {
           display: none;
       }
    }
</style>
<div class="d-none d-lg-block d-xl-block">
    <section class="header__main">
        <div class="mobile-hidden">
            <img alt="header banner" class="header-banner" src="https://dienlanhphangia.com/wp-content/uploads/2024/03/header-banner.png"/>
        </div>
        <div class="container desktop-hidden">
            <?php

          //  home_url()
            $logo = get_field( 'logo', 'options' );
           // echo $logo['url'];
            // the_field( 'ten_cong_ty', 'options' )
            // the_field( 'dia_chi', 'options' )
            // the_field( 'hotline', 'options' )
            // the_field( 'hotline_kinhdoanh', 'options' )
            //  the_field( 'hotline_baotri', 'options' )
            ?>

            <div class="row" id="mainheader">
                <div class="mainlogo">
                    <a class="logolink" href="<?=home_url()?>">
                        <img alt="phangia-logo" title="dienlanhphangia" src="<?= $logo['url']?>"/>
                    </a>
                    <div class="info-detail">
                        <div class="line1">Công ty TNHH Điện Lạnh</div>
                        <div class="line2">Phan Gia</div>
                    </div>
                </div>
                <div class="infocontact">
                    <ul class="list-service">
                        <li class="service1">LẮP ĐẶT CHUYÊN NGHIỆP</li>
                        <li class="service2">BẢO HÀNH CHÍNH HÃNG</li>
                    </ul>
                </div>
                <div class="infohotline">
                    <div class="divonleft">
                        <img src="https://dienlanhphangia.com/wp-content/uploads/2024/03/logo-daikin.jpg" alt="daikin logo"/>
                    </div>
                    <div class="divonright">
                        <dl>
                            <dt>Hotline:</dt>
                            <dd>0931 837 839</dd>
                        </dl>
                        <dl>
                            <dt>Báo giá dự án:</dt>
                            <dd>0902 980 892</dd>
                        </dl>
                        <dl>
                            <dt>Báo giá dịch vụ:</dt>
                            <dd>0909 980 892</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
        <!-- =============== END  ====================== -->
<!-- end header main -->
<div class="header__menu d-none d-lg-block d-xl-block"> 
	<?php wp_nav_menu( array( 'theme_location' => 'menu-1') ); ?>
</div>
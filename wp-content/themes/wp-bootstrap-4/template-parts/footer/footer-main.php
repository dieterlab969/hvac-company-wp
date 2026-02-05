<div class="container">
    <div class="row">
        <div class="col-xl-5 col-12 col-md-7">
            <div class="footer__add">
                <div class="footer_title">
                    <h6>THÔNG TIN LIÊN HỆ</h6>
                </div>
                <h5><?php the_field( 'ten_cong_ty', 'options' ); ?></h5>
                <ul>
                    <li><i class="fa fa-map-marker"></i>Địa chỉ: <?php the_field( 'dia_chi', 'options' ); ?></li>
                    <li><i class="fa fa-phone"></i>Hotline: <?php the_field( 'hotline', 'options' ); ?></li>
                    <li><i class="fa fa-envelope"></i>Email: <?php the_field( 'email', 'options' ); ?></li>
                    <li><i class="fa fa-globe"></i>Website: <?php the_field( 'website', 'options' ); ?></li>
                </ul>
            </div>
        </div>
        <!-- end column -->
        <div class="col-xl-4 col-6 col-md-5 d-none d-xl-block d-md-block">
            <div class="footer__face">
                <div class="footer_title">
                    <h6>FANPAGE FACEBOOK</h6>
                </div>
                <?php the_field('iframe_fb_fanpage', 'options') ?>
                <div class="logo_bct">
                    <a href="http://online.gov.vn/Home/WebDetails/84908?AspxAutoDetectCookieSupport=1" target="_blank">
                        <img src="<?php bloginfo( 'url' ); ?>/wp-content/themes/wp-bootstrap-4/assets/images/icon_bct.png" alt="">
                    </a>
                </div>
            </div>
        </div>
        <!-- end column -->
        <div class="col-xl-3 d-none d-xl-block">
            <div class="footer__maps">
                <div class="footer_title">
                    <h6>BẢN ĐỒ</h6>
                </div>
                <?php the_field( 'ban_do', 'options' ); ?>
            </div>
        </div>
        <!-- end column -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-12">
            <div class="coppyright text-center">Copyright © 2019 thuộc ĐIỆN LẠNH PHAN GIA</div>
        </div>
    </div>
</div>

<!-- call 5 -->
<?php $hotline=get_field('hotline','option');?>
<div class="btnClick">
    <div class="scb-phone-box social-bottomRight social-mb-bottomRight">
        <a class="btn-call" href="tel:<?php echo preg_replace('/\s+/', '', $hotline); ?>"><i class="btn-call__ico fa fa-phone" aria-hidden="true"></i>
        </a>
        <div class="btn-call__number">
            <a href="tel:<?php echo preg_replace('/\s+/', '', $hotline); ?>"><?php echo $hotline; ?></a>
        </div>
    </div>

    <!-- Giữ nguyên phần Zalo nhưng điều chỉnh vị trí để khớp với iframe chatbot -->
    <div class="zalo-box">
        <a class="btn-zalo" rel="nofollow" target="_blank" href="https://zalo.me/<?php echo preg_replace('/\s+/', '', $hotline); ?>">
            <span class="btn-zalo__ico"></span>
        </a>
        <div class="btn-zalo__text">
            <a rel="nofollow" target="_blank" href="https://zalo.me/<?php echo preg_replace('/\s+/', '', $hotline); ?>">Chat Zalo</a>
        </div>
    </div>
</div>

<style type="text/css">
    :root {
        --btn-bg-color:#38a3fd;
        --btn-border-color:rgba(56, 163, 253, 0.2);
        --btn-txt-color:white;
        --zalo-bg-color:#0068ff;
        --zalo-border-color:rgba(0, 104, 255, 0.2);
        --phone-pc-vertical:52px;
        --phone-pc-horizontal:10px;
        --phone-mb-vertical:100px;
        --phone-mb-horizontal:10px;
        --phone-pc-display:block;
        --phone-mb-display:block;
    }

    /* Di chuyển nút gọi điện từ phải sang trái */
    .scb-phone-box {
        position: fixed;
        display: var(--phone-pc-display);
        z-index: 9;
    }

    .scb-phone-box.social-bottomRight {
        left: var(--phone-pc-horizontal);
        right: auto;
        bottom: var(--phone-pc-vertical);
    }

    .scb-phone-box.social-mb-bottomRight {
        left: var(--phone-mb-horizontal)!important;
        right: auto!important;
        bottom: var(--phone-mb-vertical)!important;
    }

    .scb-phone-box.social-bottomRight .btn-call__number {
        left: 30px;
        right: auto;
        top: 5px;
        padding-left: 50px;
        padding-right: 0;
        border-radius: 0 20px 20px 0;
        text-align: left;
    }

    .scb-phone-box .btn-call {
        position: relative;
        background: var(--btn-bg-color);
        border: 2px solid var(--btn-bg-color);
        border-radius: 50%;
        box-shadow: 0 8px 10px rgba(56, 163, 253, 0.3);
        cursor: pointer;
        height: 60px;
        width: 60px;
        text-align: center;
        z-index: 999;
        transition: .3s;
        -webkit-animation: hoverWave linear 1s infinite;
        animation: hoverWave linear 1s infinite;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        overflow: hidden;
    }

    .scb-phone-box .btn-call__ico {
        display: flex;
        justify-content: center;
        align-items: center;
        animation: 1200ms ease 0s normal none 1 running shake;
        animation-iteration-count: infinite;
        -webkit-animation: 1200ms ease 0s normal none 1 running shake;
        -webkit-animation-iteration-count: infinite;
        color: var(--btn-txt-color);
        font-size: 30px;
        padding-top: 5px;
        transition: .3s all;
        z-index: 3;
    }

    .scb-phone-box .btn-call__number {
        position: absolute;
        height: 50px;
        line-height: 50px;
        background: var(--btn-txt-color);
        border: 2px solid var(--btn-bg-color);
        box-shadow: 0 8px 10px rgba(56, 163, 253, 0.3);
        color: var(--btn-txt-color);
        font-size: 20px;
        font-weight: bold;
        z-index: 1;
        transition: all 0.5s;
        width: 200px;
        overflow: hidden;
    }

    .scb-phone-box .btn-call__number a {
        color: var(--btn-bg-color);
    }

    .scb-phone-box .btn-call:hover {
        background-color: var(--btn-txt-color);
    }

    .scb-phone-box .btn-call:hover .btn-call__ico {
        color: var(--btn-bg-color);
    }

    .scb-phone-box:hover .btn-call__number {
        background-color: var(--btn-txt-color);
    }

    .scb-phone-box:hover .btn-call__number a {
        color: var(--btn-bg-color);
    }

    /* CSS cho nút Zalo - giữ vị trí thấp, ngay phía trên nút Back to Top */
    .zalo-box {
        position: fixed;
        display: var(--phone-pc-display);
        z-index: 999; /* z-index cao để hiển thị và click được */
        right: 20px; /* Cách cạnh phải 20px */
        bottom: 60px; /* Phía trên nút Back to Top (40px) + khoảng cách 20px */
    }

    @media(max-width: 600px) {
        .zalo-box {
            bottom: 60px; /* Điều chỉnh cho mobile */
            right: 15px;
        }
    }

    /* Di chuyển AI Chatbot iframe lên phía trên nút Zalo */
    iframe#BBH-EMBED-IFRAME {
        bottom: 130px !important; /* Phía trên Zalo: 60px (Zalo bottom) + 60px (Zalo height) + 10px khoảng cách */
        z-index: 999999 !important; /* Giữ nguyên z-index cao của iframe */
    }

    @media(max-width: 600px) {
        iframe#BBH-EMBED-IFRAME {
            bottom: 130px !important; /* Điều chỉnh cho mobile */
        }
    }

    .zalo-box .btn-zalo {
        position: relative;
        background: var(--zalo-bg-color);
        border: 2px solid var(--zalo-bg-color);
        border-radius: 50%;
        box-shadow: 0 8px 10px rgba(0, 104, 255, 0.3);
        cursor: pointer;
        height: 60px;
        width: 60px;
        text-align: center;
        z-index: 9;
        transition: .3s;
        -webkit-animation: hoverWaveZalo linear 1s infinite;
        animation: hoverWaveZalo linear 1s infinite;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        overflow: hidden;
    }

    .zalo-box .btn-zalo__ico {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 35px;
        height: 35px;
        background-image: url('https://page.widget.zalo.me/static/images/2.0/Logo.svg');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        transition: .3s all;
        z-index: 3;
        /* Áp dụng hiệu ứng rung như chatbot yêu cầu */
        animation: 1200ms ease 0s normal none 1 running shake;
        animation-iteration-count: infinite;
        -webkit-animation: 1200ms ease 0s normal none 1 running shake;
        -webkit-animation-iteration-count: infinite;
    }

    .zalo-box .btn-zalo__text {
        position: absolute;
        height: 50px;
        line-height: 50px;
        background: var(--btn-txt-color);
        border: 2px solid var(--zalo-bg-color);
        box-shadow: 0 8px 10px rgba(0, 104, 255, 0.3);
        color: var(--btn-txt-color);
        font-size: 20px;
        font-weight: bold;
        z-index: 1;
        transition: all 0.5s;
        width: 200px;
        overflow: hidden;
        right: 30px;
        top: 5px;
        padding-right: 50px;
        border-radius: 20px 0 0 20px;
        text-align: right;
        opacity: 0; /* Ẩn phần text */
        pointer-events: none; /* Không cho tương tác với text */
    }

    .zalo-box .btn-zalo:hover {
        background-color: var(--btn-txt-color);
    }

    .zalo-box .btn-zalo:hover .btn-zalo__ico {
        filter: invert(26%) sepia(97%) saturate(1645%) hue-rotate(199deg) brightness(96%) contrast(106%);
    }

    /* Style cho iframe chatbot - đúng ID */
    iframe#BBH-EMBED-IFRAME {
        z-index: 999999 !important; /* Giữ nguyên z-index cao của iframe */
    }

    /* Animations */
    @-webkit-keyframes hoverWave {
        0% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 0 var(--btn-border-color), 0 0 0 0 var(--btn-border-color)
        }
        40% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 15px var(--btn-border-color), 0 0 0 0 var(--btn-border-color)
        }
        80% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 30px var(--btn-border-color), 0 0 0 26.7px var(--btn-border-color)
        }
        100% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 30px var(--btn-border-color), 0 0 0 40px var(--btn-border-color)
        }
    }

    @keyframes hoverWave {
        0% {
            box-shadow: 0 8px 10px rgba(56, 163, 253, 0.2),
            0 0 0 0 rgba(56, 163, 253, 0.2),
            0 0 0 0 rgba(56, 163, 253, 0.2)
        }
        40% {
            box-shadow: 0 8px 10px rgba(56, 163, 253, 0.2),
            0 0 0 15px rgba(56, 163, 253, 0.2),
            0 0 0 0 rgba(56, 163, 253, 0.2)
        }
        80% {
            box-shadow: 0 8px 10px rgba(56, 163, 253, 0.2),
            0 0 0 30px rgba(56, 163, 253, 0.2),
            0 0 0 26.7px rgba(56, 163, 253, 0.2)
        }
        100% {
            box-shadow: 0 8px 10px rgba(56, 163, 253, 0.2),
            0 0 0 30px rgba(56, 163, 253, 0.2),
            0 0 0 40px rgba(56, 163, 253, 0.2)
        }
    }

    @-webkit-keyframes hoverWaveZalo {
        0% {
            box-shadow: 0 8px 10px rgba(0, 104, 255, 0.2), 0 0 0 0 rgba(0, 104, 255, 0.2), 0 0 0 0 rgba(0, 104, 255, 0.2)
        }
        40% {
            box-shadow: 0 8px 10px rgba(0, 104, 255, 0.2), 0 0 0 15px rgba(0, 104, 255, 0.2), 0 0 0 0 rgba(0, 104, 255, 0.2)
        }
        80% {
            box-shadow: 0 8px 10px rgba(0, 104, 255, 0.2), 0 0 0 30px rgba(0, 104, 255, 0.2), 0 0 0 26.7px rgba(0, 104, 255, 0.2)
        }
        100% {
            box-shadow: 0 8px 10px rgba(0, 104, 255, 0.2), 0 0 0 30px rgba(0, 104, 255, 0.2), 0 0 0 40px rgba(0, 104, 255, 0.2)
        }
    }

    @keyframes hoverWaveZalo {
        0% {
            box-shadow: 0 8px 10px rgba(0, 104, 255, 0.2), 0 0 0 0 rgba(0, 104, 255, 0.2), 0 0 0 0 rgba(0, 104, 255, 0.2)
        }
        40% {
            box-shadow: 0 8px 10px rgba(0, 104, 255, 0.2), 0 0 0 15px rgba(0, 104, 255, 0.2), 0 0 0 0 rgba(0, 104, 255, 0.2)
        }
        80% {
            box-shadow: 0 8px 10px rgba(0, 104, 255, 0.2), 0 0 0 30px rgba(0, 104, 255, 0.2), 0 0 0 26.7px rgba(0, 104, 255, 0.2)
        }
        100% {
            box-shadow: 0 8px 10px rgba(0, 104, 255, 0.2), 0 0 0 30px rgba(0, 104, 255, 0.2), 0 0 0 40px rgba(0, 104, 255, 0.2)
        }
    }

    @keyframes shake {
        0% {
            transform: rotateZ(0deg);
            -webkit-transform: rotateZ(0deg);
            -ms-transform: rotateZ(0deg);
        }
        10% {
            transform: rotateZ(-30deg);
            -webkit-transform: rotateZ(-30deg);
            -ms-transform: rotateZ(-30deg);
        }
        20% {
            transform: rotateZ(15deg);
            -webkit-transform: rotateZ(15deg);
            -ms-transform: rotateZ(15deg);
        }
        30% {
            transform: rotateZ(-10deg);
            -webkit-transform: rotateZ(-10deg);
            -ms-transform: rotateZ(-10deg);
        }
        40% {
            transform: rotateZ(7.5deg);
            -webkit-transform: rotateZ(7.5deg);
            -ms-transform: rotateZ(7.5deg);
        }
        50% {
            transform: rotateZ(-6deg);
            -webkit-transform: rotateZ(-6deg);
            -ms-transform: rotateZ(-6deg);
        }
        60% {
            transform: rotateZ(5deg);
            -webkit-transform: rotateZ(5deg);
            -ms-transform: rotateZ(5deg);
        }
        70% {
            transform: rotateZ(-4.28571deg);
            -webkit-transform: rotateZ(-4.28571deg);
            -ms-transform: rotateZ(-4.28571deg);
        }
        80% {
            transform: rotateZ(3.75deg);
            -webkit-transform: rotateZ(3.75deg);
            -ms-transform: rotateZ(3.75deg);
        }
        90% {
            transform: rotateZ(-3.33333deg);
            -webkit-transform: rotateZ(-3.33333deg);
            -ms-transform: rotateZ(-3.33333deg);
        }
        100% {
            transform: rotateZ(0deg);
            -webkit-transform: rotateZ(0deg);
            -ms-transform: rotateZ(0deg);
        }
    }

    @-webkit-keyframes shake {
        /* Giữ nguyên keyframes */
        0% {
            transform: rotateZ(0deg);
            -webkit-transform: rotateZ(0deg);
            -ms-transform: rotateZ(0deg);
        }
        10% {
            transform: rotateZ(-30deg);
            -webkit-transform: rotateZ(-30deg);
            -ms-transform: rotateZ(-30deg);
        }
        20% {
            transform: rotateZ(15deg);
            -webkit-transform: rotateZ(15deg);
            -ms-transform: rotateZ(15deg);
        }
        30% {
            transform: rotateZ(-10deg);
            -webkit-transform: rotateZ(-10deg);
            -ms-transform: rotateZ(-10deg);
        }
        40% {
            transform: rotateZ(7.5deg);
            -webkit-transform: rotateZ(7.5deg);
            -ms-transform: rotateZ(7.5deg);
        }
        50% {
            transform: rotateZ(-6deg);
            -webkit-transform: rotateZ(-6deg);
            -ms-transform: rotateZ(-6deg);
        }
        60% {
            transform: rotateZ(5deg);
            -webkit-transform: rotateZ(5deg);
            -ms-transform: rotateZ(5deg);
        }
        70% {
            transform: rotateZ(-4.28571deg);
            -webkit-transform: rotateZ(-4.28571deg);
            -ms-transform: rotateZ(-4.28571deg);
        }
        80% {
            transform: rotateZ(3.75deg);
            -webkit-transform: rotateZ(3.75deg);
            -ms-transform: rotateZ(3.75deg);
        }
        90% {
            transform: rotateZ(-3.33333deg);
            -webkit-transform: rotateZ(-3.33333deg);
            -ms-transform: rotateZ(-3.33333deg);
        }
        100% {
            transform: rotateZ(0deg);
            -webkit-transform: rotateZ(0deg);
            -ms-transform: rotateZ(0deg);
        }
    }

    /* CSS cho hiệu ứng ripple */
    .ripple {
        position: absolute;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
        pointer-events: none;
    }

    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    /* Responsive */
    @media(min-width: 601px) {
        .scb-phone-box.social-bottomRight {
            left: var(--phone-pc-horizontal);
            right: auto;
            bottom: var(--phone-pc-vertical);
        }
    }

    @media(max-width: 600px) {
        .scb-phone-box {
            display: var(--phone-mb-display)!important;
        }
        .scb-phone-box.social-mb-bottomRight {
            left: var(--phone-mb-horizontal)!important;
            right: auto!important;
            bottom: var(--phone-mb-vertical)!important;
        }
    }
</style>

<!-- JavaScript cho hiệu ứng ripple -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hiệu ứng ripple khi click vào các nút
        function createRipple(event) {
            const button = event.currentTarget;

            // Xóa các hiệu ứng cũ
            const ripples = button.getElementsByClassName("ripple");
            for (let i = 0; i < ripples.length; i++) {
                ripples[i].remove();
            }

            // Tạo phần tử ripple mới
            const circle = document.createElement("span");
            const diameter = Math.max(button.clientWidth, button.clientHeight);
            const radius = diameter / 2;

            // Tính toán vị trí click tương đối với nút
            const rect = button.getBoundingClientRect();
            circle.style.width = circle.style.height = `${diameter}px`;
            circle.style.left = `${event.clientX - rect.left - radius}px`;
            circle.style.top = `${event.clientY - rect.top - radius}px`;

            circle.classList.add("ripple");
            button.appendChild(circle);

            // Tự động xóa phần tử ripple sau khi animation kết thúc
            circle.addEventListener('animationend', () => {
                circle.remove();
            });
        }

        // Áp dụng hiệu ứng ripple cho các nút
        const buttons = document.querySelectorAll('.btn-call, .btn-zalo');
        buttons.forEach(button => {
            button.addEventListener('click', createRipple);
        });
    });
</script>
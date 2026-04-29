<?php
/**
 * Template Name: Landing Page (Phan Gia)
 *
 * Landing page for CÔNG TY TNHH ĐIỆN LẠNH PHAN GIA – Daikin Authorized Proshop.
 *
 * Place this file in your theme under: /page-templates/template-landing.php
 * Then create a Page in WP Admin and select "Landing Page (Phan Gia)" as the template.
 *
 * @package PhanGia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



get_header();

$tpl_uri = get_template_directory_uri();
?>

<main id="primary" class="site-main phangia-landing">

    <!-- ============================== HERO ============================== -->
    <section class="hero" id="home">
        <div class="hero__bg" aria-hidden="true"></div>
        <div class="container hero__inner">
            <div class="hero__content reveal">
                <span class="eyebrow eyebrow--light">
                    <span class="eyebrow__dot"></span> Đại lý ủy quyền Daikin Việt Nam
                </span>
                <h1 class="hero__title">
                    Giải pháp <span class="hero__title-accent">điều hòa Daikin</span><br />
                    cho gia đình, văn phòng &amp; dự án lớn
                </h1>
                <p class="hero__subtitle">
                    <strong>Phan Gia</strong> – nhà phân phối, thi công và bảo trì điều hòa Daikin chính hãng.
                    Từ Multi Split AC, VRV/VRF tới Chiller &amp; BMS – chúng tôi đồng hành cùng bạn từ tư vấn đến vận hành.
                </p>
                <div class="hero__actions">
                    <a href="#contact" class="btn btn--primary btn--lg">
                        Báo giá dự án
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                    </a>
                    <a href="#products" class="btn btn--ghost btn--lg">Xem sản phẩm</a>
                </div>
                <ul class="hero__trust">
                    <li><strong>15+</strong><span>năm kinh nghiệm</span></li>
                    <li><strong>2.500+</strong><span>công trình bàn giao</span></li>
                    <li><strong>24/7</strong><span>hỗ trợ kỹ thuật</span></li>
                </ul>
            </div>

            <aside class="hero__card reveal reveal--delay">
                <div class="hero__card-header">
                    <span class="hero__card-tag">Khuyến mãi tháng này</span>
                    <h3>Ưu đãi tới <strong>18%</strong> cho gói VRV/VRF</h3>
                    <p>Đăng ký nhận khảo sát miễn phí và báo giá trong 24 giờ.</p>
                </div>
                <ul class="hero__card-list">
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg>Tặng gói bảo trì 12 tháng</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg>Hỗ trợ trả góp 0% qua thẻ</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg>Bảo hành chính hãng đến 5 năm</li>
                </ul>
                <a href="#contact" class="btn btn--accent btn--block">Nhận báo giá ngay</a>
            </aside>
        </div>
        <div class="hero__waves" aria-hidden="true">
            <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
                <path d="M0 40 C 240 80 480 0 720 30 C 960 60 1200 20 1440 40 L1440 80 L0 80 Z" fill="#f4f9fc"/>
            </svg>
        </div>
    </section>

    <!-- ============================== SLIDER ============================== -->
    <section class="slider" aria-label="Hình ảnh tiêu biểu Phan Gia">
        <div class="slider__head reveal">
            <span class="eyebrow"><span class="eyebrow__dot"></span> Hình ảnh nổi bật</span>
            <h2 class="section__title">Sản phẩm Daikin &amp; công trình tiêu biểu</h2>
        </div>

        <div class="slider__viewport" id="slider">
            <div class="slider__track" id="sliderTrack">
                <div class="slider__slide"><img src="<?php echo esc_url( $tpl_uri . '/assets/images/slide-1.svg' ); ?>" alt="Điều hòa Daikin chính hãng tại Phan Gia" /></div>
                <div class="slider__slide"><img src="<?php echo esc_url( $tpl_uri . '/assets/images/slide-2.svg' ); ?>" alt="Thi công VRV/VRF cho dự án lớn" /></div>
                <div class="slider__slide"><img src="<?php echo esc_url( $tpl_uri . '/assets/images/slide-3.svg' ); ?>" alt="Dịch vụ HVAC trọn gói từ Phan Gia" /></div>
            </div>

            <button class="slider__btn slider__btn--prev" id="sliderPrev" aria-label="Slide trước">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <button class="slider__btn slider__btn--next" id="sliderNext" aria-label="Slide tiếp theo">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 6l6 6-6 6"/></svg>
            </button>

            <div class="slider__dots" id="sliderDots" role="tablist" aria-label="Chọn slide">
                <button class="slider__dot is-active" type="button" aria-label="Slide 1"></button>
                <button class="slider__dot" type="button" aria-label="Slide 2"></button>
                <button class="slider__dot" type="button" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>

    <!-- ============================== SERVICES ============================== -->
    <section class="services section" id="services">
        <div class="container">
            <header class="section__header section__header--row reveal">
                <div>
                    <span class="eyebrow"><span class="eyebrow__dot"></span> Dịch vụ trọn gói</span>
                    <h2 class="section__title">Giải pháp HVAC từ tư vấn đến vận hành</h2>
                </div>
                <a href="#contact" class="link link--arrow">Xem tất cả dịch vụ
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                </a>
            </header>

            <div class="services__grid">
                <article class="service reveal">
                    <div class="service__media">
                        <img src="<?php echo esc_url( $tpl_uri . '/assets/images/service-1.svg' ); ?>" alt="Khảo sát và tư vấn HVAC" loading="lazy" />
                        <span class="service__badge">Cơ bản</span>
                    </div>
                    <div class="service__body">
                        <h3 class="service__title">Khảo sát &amp; Tư vấn cơ bản</h3>
                        <p class="service__desc">Tư vấn sơ bộ, khảo sát phương án và lựa chọn thiết bị Daikin phù hợp với mặt bằng &amp; ngân sách của bạn.</p>
                        <ul class="service__list">
                            <li>Khảo sát mặt bằng tận nơi</li>
                            <li>Đề xuất công suất tối ưu</li>
                            <li>Báo giá chi tiết &lt; 24h</li>
                        </ul>
                        <div class="service__footer">
                            <div class="service__price"><span>Từ</span><strong>500.000đ</strong></div>
                            <a href="#contact" class="btn btn--outline btn--sm">Đặt lịch</a>
                        </div>
                    </div>
                </article>

                <article class="service service--featured reveal">
                    <div class="service__media">
                        <img src="<?php echo esc_url( $tpl_uri . '/assets/images/service-2.svg' ); ?>" alt="Thiết kế và thi công tiêu chuẩn" loading="lazy" />
                        <span class="service__badge service__badge--accent">Phổ biến nhất</span>
                    </div>
                    <div class="service__body">
                        <h3 class="service__title">Thiết kế &amp; Thi công tiêu chuẩn</h3>
                        <p class="service__desc">Triển khai bản vẽ thi công &amp; thương mại theo tiêu chuẩn Daikin Pro, bàn giao đúng tiến độ 12–24 ngày.</p>
                        <ul class="service__list">
                            <li>Bản vẽ Shop Drawing 2D/3D</li>
                            <li>Đội ngũ kỹ thuật chứng chỉ Daikin</li>
                            <li>Bảo hành thi công 24 tháng</li>
                        </ul>
                        <div class="service__footer">
                            <div class="service__price"><span>Từ</span><strong>15.000.000đ</strong></div>
                            <a href="#contact" class="btn btn--primary btn--sm">Xem chi tiết</a>
                        </div>
                    </div>
                </article>

                <article class="service reveal">
                    <div class="service__media">
                        <img src="<?php echo esc_url( $tpl_uri . '/assets/images/service-3.svg' ); ?>" alt="Giải pháp HVAC toàn diện" loading="lazy" />
                        <span class="service__badge">Doanh nghiệp</span>
                    </div>
                    <div class="service__body">
                        <h3 class="service__title">Giải pháp HVAC toàn diện</h3>
                        <p class="service__desc">VRV/VRF, Chiller, BMS và hệ lọc không khí công nghiệp – thiết kế, thi công và vận hành trọn gói.</p>
                        <ul class="service__list">
                            <li>Thiết kế hệ thống VRV/VRF/Chiller</li>
                            <li>Tích hợp BMS &amp; IoT</li>
                            <li>Bảo trì định kỳ trọn đời</li>
                        </ul>
                        <div class="service__footer">
                            <div class="service__price"><span>Từ</span><strong>100.000.000đ</strong></div>
                            <a href="#contact" class="btn btn--outline btn--sm">Liên hệ báo giá</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ============================== PROJECTS ============================== -->
    <section class="projects section" id="projects">
        <div class="container">
            <header class="section__header section__header--row reveal">
                <div>
                    <span class="eyebrow"><span class="eyebrow__dot"></span> Công trình tiêu biểu</span>
                    <h2 class="section__title">Dự án Phan Gia đã bàn giao</h2>
                </div>
                <a href="#" class="link link--arrow">Xem toàn bộ dự án
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                </a>
            </header>

            <div class="projects__grid">
                <article class="project reveal">
                    <div class="project__media"><img src="https://dienlanhphangia.com/wp-content/uploads/2026/02/8e190c71c907847c1e71f3aa490f656d.jpg" alt="Công trình điều hòa Daikin tiêu biểu của Phan Gia" loading="lazy" /></div>
                    <div class="project__body">
                        <h3 class="project__title">Hệ thống điều hòa căn hộ cao cấp</h3>
                        <p class="project__meta">Lắp đặt Multi Split AC · Bàn giao đúng tiến độ</p>
                        <span class="project__tag">Dân dụng</span>
                    </div>
                </article>

                <article class="project reveal">
                    <div class="project__media"><img src="https://dienlanhphangia.com/wp-content/uploads/2026/02/web-20.jpg" alt="Thi công VRV/VRF cho công trình thương mại" loading="lazy" /></div>
                    <div class="project__body">
                        <h3 class="project__title">Thi công VRV/VRF thương mại</h3>
                        <p class="project__meta">Tối ưu vận hành &amp; tiết kiệm năng lượng</p>
                        <span class="project__tag">Thương mại</span>
                    </div>
                </article>

                <article class="project reveal">
                    <div class="project__media"><img src="https://dienlanhphangia.com/wp-content/uploads/2026/02/web-21.jpg" alt="Hệ thống điều hòa văn phòng hiện đại" loading="lazy" /></div>
                    <div class="project__body">
                        <h3 class="project__title">Điều hòa văn phòng hiện đại</h3>
                        <p class="project__meta">Giải pháp làm mát đồng đều cho không gian mở</p>
                        <span class="project__tag">Văn phòng</span>
                    </div>
                </article>

                <article class="project reveal">
                    <div class="project__media"><img src="https://dienlanhphangia.com/wp-content/uploads/2026/02/3ee6c05940d41d441180af77fa8917c2.jpg" alt="Lắp đặt điều hòa Daikin chính hãng" loading="lazy" /></div>
                    <div class="project__body">
                        <h3 class="project__title">Lắp đặt điều hòa biệt thự</h3>
                        <p class="project__meta">Đội ngũ kỹ thuật chứng chỉ Daikin · Bảo hành 5 năm</p>
                        <span class="project__tag">Dân dụng</span>
                    </div>
                </article>

                <article class="project reveal">
                    <div class="project__media"><img src="https://dienlanhphangia.com/wp-content/uploads/2026/02/web-19.jpg" alt="Công trình HVAC Daikin tiêu chuẩn" loading="lazy" /></div>
                    <div class="project__body">
                        <h3 class="project__title">Hệ thống HVAC tiêu chuẩn Daikin</h3>
                        <p class="project__meta">Thiết kế · Thi công · Bảo trì trọn gói</p>
                        <span class="project__tag">Dự án</span>
                    </div>
                </article>

                <article class="project reveal">
                    <div class="project__media"><img src="https://dienlanhphangia.com/wp-content/uploads/2026/03/KIS_1302.jpg" alt="Dự án điều hòa trung tâm quy mô lớn" loading="lazy" /></div>
                    <div class="project__body">
                        <h3 class="project__title">Điều hòa trung tâm quy mô lớn</h3>
                        <p class="project__meta">Giải pháp Chiller &amp; BMS cho công trình lớn</p>
                        <span class="project__tag">Công nghiệp</span>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ============================== STATS ============================== -->
    <section class="stats section">
        <div class="container stats__inner reveal">
            <div class="stats__item"><strong>15+</strong><span>Năm phục vụ ngành HVAC tại Việt Nam</span></div>
            <div class="stats__item"><strong>2.500+</strong><span>Dự án dân dụng &amp; thương mại đã bàn giao</span></div>
            <div class="stats__item"><strong>98%</strong><span>Khách hàng quay lại &amp; giới thiệu</span></div>
            <div class="stats__item"><strong>24/7</strong><span>Hỗ trợ kỹ thuật &amp; bảo hành toàn quốc</span></div>
        </div>
    </section>

    <!-- ============================== CONTACT ============================== -->
    <section class="contact section" id="contact">
        <div class="container">
            <div class="contact__inner reveal">
                <!-- LEFT: form -->
                <div class="contact__form-wrap">
                    <header class="contact__head">
                        <span class="eyebrow"><span class="eyebrow__dot"></span> Liên hệ tư vấn</span>
                        <h2 class="section__title">Đăng ký tư vấn, thiết kế &amp; báo giá</h2>
                        <p class="contact__lead">
                            Để lại thông tin – đội ngũ kỹ sư Phan Gia sẽ liên hệ trong vòng 30 phút (giờ hành chính)
                            để khảo sát và gửi báo giá chi tiết hoàn toàn miễn phí.
                        </p>
                    </header>
                    <?php
                    if (shortcode_exists('contact-form-7')) {
                        echo do_shortcode('[contact-form-7 id="9" title="Form liên hệ"]');
                    } else {
                        ?>

                        <!-- Mock Form (fallback UI) -->
                        <form class="form" id="contactForm" novalidate>
                            <div class="form__row">
                                <label class="form__field">
                                    <span class="form__label">Họ và tên *</span>
                                    <input class="form__input" type="text" name="name" placeholder="Nguyễn Văn A" required />
                                </label>
                                <label class="form__field">
                                    <span class="form__label">Số điện thoại *</span>
                                    <input class="form__input" type="tel" name="phone" placeholder="09xx xxx xxx" required />
                                </label>
                            </div>

                            <label class="form__field">
                                <span class="form__label">Sản phẩm quan tâm <span class="form__hint">(không bắt buộc)</span></span>
                                <input class="form__input" type="text" name="product" placeholder="VD: VRV, Chiller, Multi Split AC" />
                            </label>

                            <label class="form__field">
                                <span class="form__label">Ghi chú thêm <span class="form__hint">(diện tích, số phòng, yêu cầu đặc biệt)</span></span>
                                <textarea class="form__input form__input--area" name="note" rows="3" placeholder="Ví dụ: 4 phòng ngủ ~ 100m², ưu tiên tiết kiệm điện..."></textarea>
                            </label>

                            <label class="form__check">
                                <input type="checkbox" name="zalo" checked />
                                <span>Nhận báo giá qua Zalo</span>
                            </label>

                            <button type="submit" class="btn btn--primary btn--lg btn--block">
                                Gửi yêu cầu
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                            </button>

                            <p class="form__success" id="formSuccess" hidden>
                                Cảm ơn bạn! Yêu cầu đã được gửi, chúng tôi sẽ liên hệ trong vòng 30 phút.
                            </p>
                        </form>

                        <?php
                    }
                    ?>
                </div>

                <!-- RIGHT: branded panel with Daikin AC background -->
                <aside class="contact__panel">
                    <img class="contact__panel-bg" src="https://dienlanhphangia.com/wp-content/uploads/2026/02/web-21.jpg" alt="" aria-hidden="true" />
                    <div class="contact__panel-overlay" aria-hidden="true"></div>

                    <div>
                        <span class="contact__panel-eyebrow">Daikin Authorized Proshop</span>
                        <h3 class="contact__panel-title">CÔNG TY TNHH ĐIỆN LẠNH PHAN GIA</h3>
                        <p class="contact__panel-sub">
                            Đối tác tin cậy của hàng nghìn gia đình &amp; doanh nghiệp tại miền Nam –
                            cung cấp giải pháp điều hòa Daikin chính hãng từ tư vấn đến vận hành.
                        </p>

                        <ul class="contact__list">
                            <li>
                                <span class="contact__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg></span>
                                <div>
                                    <strong>Văn phòng chính</strong>
                                    <span>39 Đường 48, Phường Phước Long, TP.HCM</span>
                                </div>
                            </li>
                            <li>
                                <span class="contact__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2h-4v-7H10v7H6a2 2 0 0 1-2-2V9Z"/></svg></span>
                                <div>
                                    <strong>Chi nhánh 2</strong>
                                    <span>88 Nguyễn Thị Thập, P.10, TP. Mỹ Tho</span>
                                </div>
                            </li>
                            <li>
                                <span class="contact__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92V21a1 1 0 0 1-1.11 1A19.86 19.86 0 0 1 2 4.11 1 1 0 0 1 3 3h4.09a1 1 0 0 1 1 .75 12.36 12.36 0 0 0 .66 2.62 1 1 0 0 1-.23 1L6.91 9.09a16 16 0 0 0 8 8l1.72-1.61a1 1 0 0 1 1-.23 12.36 12.36 0 0 0 2.62.66 1 1 0 0 1 .75 1Z"/></svg></span>
                                <div>
                                    <strong>Hotline</strong>
                                    <a href="tel:0931837839">0931 837 839</a>
                                </div>
                            </li>
                            <li>
                                <span class="contact__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z"/><path d="m22 6-10 7L2 6"/></svg></span>
                                <div>
                                    <strong>Email</strong>
                                    <a href="mailto:kinhdoanh@dienlanhphangia.com">kinhdoanh@dienlanhphangia.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <a href="tel:0931837839" class="contact__panel-cta">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92V21a1 1 0 0 1-1.11 1A19.86 19.86 0 0 1 2 4.11 1 1 0 0 1 3 3h4.09a1 1 0 0 1 1 .75 12.36 12.36 0 0 0 .66 2.62 1 1 0 0 1-.23 1L6.91 9.09a16 16 0 0 0 8 8l1.72-1.61a1 1 0 0 1 1-.23 12.36 12.36 0 0 0 2.62.66 1 1 0 0 1 .75 1Z"/></svg>
                        Gọi ngay 0931 837 839
                    </a>
                </aside>
            </div>
        </div>
    </section>

</main><!-- #primary -->

<!-- Floating CTA (sits above the WP footer; safe to keep here) -->
<a href="tel:0931837839" class="floating-cta" aria-label="Gọi tư vấn ngay">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92V21a1 1 0 0 1-1.11 1A19.86 19.86 0 0 1 2 4.11 1 1 0 0 1 3 3h4.09a1 1 0 0 1 1 .75 12.36 12.36 0 0 0 .66 2.62 1 1 0 0 1-.23 1L6.91 9.09a16 16 0 0 0 8 8l1.72-1.61a1 1 0 0 1 1-.23 12.36 12.36 0 0 0 2.62.66 1 1 0 0 1 .75 1Z"/></svg>
    <span>Tư vấn ngay</span>
</a>

<?php
get_footer();

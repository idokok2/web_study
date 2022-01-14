<?php echo $this->extend('eng/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents service">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">Service <br class="mo_only">Introduction</h2>
                <p data-aos="fade-up" data-aos-delay="300">
                    Get a special service for you.<br>
                    This is <span>how FITTRIX works!</span></p>

                <!-- <a href="#" data-aos="fade-up" data-aos-delay="600" id="center_select">
                    <span>
                        Find FITTRIX spots around you
                    </span>
                    <img src="../services/images/arrow.png" alt="">
                </a> -->

                <div class="option_box" id="center_list">
                    <p class="list_tit">
                        <span>Fittrix Spot</span>
                    </p>
                    <p class="close_btn">
                        <img src="/assets/eng/images/services/close_btn.png" alt="">
                    </p>
                    <div class="list_wrap">
                        <?php
                        foreach ($centerList as $row) {
                            ?>
                            <button type="button" data-location="<?php echo $row['f_name'];?>">
                                <div>
                                    <div><?php echo $row['f_name']; ?></div>
                                    <span><?php echo $row['f_address']; ?></span>
                                </div>
                                <a href="https://www.google.com/maps/search/<?php echo $row['f_address']; ?>" target="_blank" style="width:unset;"><p></p></a>
                            </button>
                            <?php
                        }
                        ?>
					</div>
                </div>
                <div class="center_map"></div>
            </div>
            <div class="section service_slide">
                <div id="service_slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide vis01"></li>
                            <li class="splide__slide vis02"></li>
                            <li class="splide__slide vis03"></li>
                            <li class="splide__slide vis04"></li>
                        </ul>
                    </div>
                </div>
                <div id="slider_thumb" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide thumb01">
                                <p>2. Offline Consulting <br>& Coaching (Personal Training)</p>
                            </li>
                            <li class="splide__slide thumb02">
                                <p>3. Ai Curriculum</p>
                            </li>
                            <li class="splide__slide thumb03">
                                <p>4. Online Coaching</p>
                            </li>
                            <li class="splide__slide thumb04">
                                <p>1. Body Analysis</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section service_info">
                <h4 data-aos="fade-up">FITTRIX is <br class="pc_only">
                    different.</h4>
                <ul>
                    <li data-aos="fade-up" data-aos-delay="300">
                        <img src="/assets/eng/images/services/service_info_icon01.png" alt="">
                        <h5>Body Type Analysis System </h5>
                        <p>FITTRIX measures with a body measurement device
                            made under Hyundai Motor Company’s technical support.
                            You can also exercise after consulting
                            with FITTRIX’s experts.</p>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="600">
                        <img src="/assets/eng/images/services/service_info_icon02.png" alt="">
                        <h5>Data-Based Curriculum Design</h5>
                        <p>We design curriculum and feedbacks
                            feedbacks by reflecting the valuable opinions of customers
                            on the body measurement data.</p>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="900">
                        <img src="/assets/eng/images/services/service_info_icon03.png" alt="">
                        <h5>Specialized and Verified Coaches</h5>
                        <p>FITTRIX fosters experts who majored in physical education
                            and passed FITTRIX’s training and thorough tests.
                            <!-- (코치진 이력 공개) -->
                        </p>
                    </li>
                </ul>
            </div>
            <div class="section faq toggle_box">
                <h4 data-aos="fade-up">FAQ</h4>
                <ul data-aos="fade-up" data-aos-delay="400">
                    <?php
                    foreach ($faqList as $row) {
                        ?>
                        <li>
                            <p><?php echo $row['f_question']; ?></p>
                            <div class="toggle_inner" style="display:none;"><?php echo htmlspecialchars_decode($row['f_answer']); ?></div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="section customer">
                <h4 data-aos="fade-up">
                    Do you have <br class="pc_only">
                    any questions?
                </h4>
                <div class="txt_wrap" data-aos="fade-up" data-aos-delay="400">
                    <div>
                        <p>Ask questions to Kakao Talk Plus Friend [FITTRIX] or contact customer center.</p>
                        <span><img src="/assets/eng/images/services/service_tel_icon.png" alt="">02-553-1911</span><span><img
                                src="/assets/eng/images/services/service_mail_icon.png" alt="">yjshin@fittrix.io</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('script'); ?>
    <script>
        var secondarySlider = new Splide('#slider_thumb', {
            rewind: true,
            isNavigation: true,
            pagination: false,
            arrows: false,
            width: 825,
            perPage: 3,
            perMove: 1,
            type: 'loop',
            autoplay: true,
            interval: 3000,
            direction: "rtl",
            gap: 75,
            speed: 1000,
            drag: false,
            breakpoints: {
                1400: {
                    focus: 'center'
                },
            }
        }).mount();
        var primarySlider = new Splide('#service_slider', {
            pagination: false,
            arrows: true,
            cover: true,
            type: 'loop',
            direction: "rtl",
            speed: 1000,
            width: 420,
            breakpoints: {
                1400: {
                    width: 1460,
                    pagination: true,
                    perPage: 3,
                    perMove: 1,
                    focus: 'center',
                    gap: 50
                },
                1100: {
                    width: 1100,
                    pagination: true,
                    perPage: 3,
                    perMove: 1,
                    focus: 'center',
                    gap: 10
                },
                767: {
                    width: 300,
                    pagination: true,
                    perPage: 1,
                    focus: 'center',
                    gap: 50,
                    drag: false,
                }
            }
        });
        primarySlider.sync(secondarySlider).mount();
        $(document).ready(function () {
            $("#center_select").click(function () {
                $("#center_list").addClass("active");
                $(".center_map").addClass("active");
            });
            $(".close_btn, .center_map").click(function () {
                $("#center_list").removeClass("active");
                $(".center_map").removeClass("active");
            });
            $("#center_list button").click(function () {
                $(this).toggleClass("active").siblings().removeClass("active");
            });
        });
    </script>
<?php echo $this->endSection(); ?>
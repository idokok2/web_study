<?= $this->extend('kor/templates/layout') ?>


<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents service">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">서비스 소개</h2>
                <p data-aos="fade-up" data-aos-delay="300">
                    당신만을 위한 특별한 서비스를 받아보세요.<br>
                    <span>피트릭스는 이렇게 진행</span>됩니다!</p>

                    <!--
                <a href="#" data-aos="fade-up" data-aos-delay="600" id="center_select">
                    <span>
                        내 주변 피트릭스 스팟 검색
                    </span>
                    <img src="../services/images/arrow.png" alt="">
                </a>
            -->
                <div class="option_box" id="center_list">
                    <p class="list_tit">
                        <span>피트릭스 스팟</span>
                    </p>
                    <p class="close_btn">
                        <img src="/assets/kor/images/services/close_btn.png" alt="">
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
                                <p>2. 오프라인 상담<br>& 코치(PT)</p>
                            </li>
                            <li class="splide__slide thumb02">
                                <p>3. AI 커리큘럼</p>
                            </li>
                            <li class="splide__slide thumb03">
                                <p>4. 온라인 코칭</p>
                            </li>
                            <li class="splide__slide thumb04">
                                <p>1. 신체분석</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section service_info">
                <h4 data-aos="fade-up">피트릭스(fittrix)는 <br class="pc_only">
                    다릅니다.</h4>
                <ul>
                    <li data-aos="fade-up" data-aos-delay="300">
                        <img src="/assets/kor/images/services/service_info_icon01.png" alt="">
                        <h5>신체외형 분석시스템</h5>
                        <p>현대자동차의 기술지원으로 제작된 <br class="pc_only">
                            신체측정 기기를 활용하여 측정하고, <br class="pc_only">
                            현장에서 전문가 상담과 함께 운동을 <br class="pc_only">
                            진행해요.</p>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="600">
                        <img src="/assets/kor/images/services/service_info_icon02.png" alt="">
                        <h5>데이터기반 커리큘럼설계</h5>
                        <p>신체측정 데이터에 고객의 소중한 의견 <br class="pc_only">
                            역시 반영하여 커리큘럼과 피드백을 <br class="pc_only">
                            설계해요.</p>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="900">
                        <img src="/assets/kor/images/services/service_info_icon03.png" alt="">
                        <h5>검증된 전문 코치진</h5>
                        <p>체육 전공자 중 자체 교육과 엄격한 <br class="pc_only">
                            테스트를 통과한 전문가를 육성합니다.<br class="pc_only">
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
                    더 궁금한게<br class="pc_only">
                    있으신가요?
                </h4>
                <div class="txt_wrap" data-aos="fade-up" data-aos-delay="400">
                    <div>
                        <p>카카오톡 플러스 친구 [피트릭스]에게 궁금하신 점을 남겨주시거나 고객센터로 연락주세요</p>
                        <span><img src="/assets/kor/images/services/service_tel_icon.png" alt="">02-553-1911</span><span><img
                                src="/assets/kor/images/services/service_mail_icon.png" alt="">yjshin@fittrix.io</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo $this->endSection();?>



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
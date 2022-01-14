<?php echo $this->extend('kor/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents product">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">제품 소개</h2>
                <p data-aos="fade-up" data-aos-delay="400">피트릭스의 특별한 서비스를 받아보세요.<br>
                    <!-- <span>피트릭스는 이렇게 진행</span>됩니다!</p> -->
            </div>
            <div class="section product_info">
                <div id="product_slide" class="vis_wrap">
                    <div class="slide">
                        <img src="/assets/kor/images/product/product01.png" alt="">
                    </div>
                    <div class="slide">
                        <img src="/assets/kor/images/product/product02.png" alt="">
                    </div>
                </div>

                <div class="txt_wrap" data-aos="fade" data-aos-delay="400">
                    <div>
                        <div>측정방법</div>
                        <div>신체 외형 분석 카메라 영상처리 기술</div>
                    </div>
                    <div>
                        <div>측정내용</div>
                        <div>신체 치수 측정<br>
                            <span>(얼굴너비, 어깨너비 등 11가지)</span><br>
                            근육 기능 측정<br>
                            <span>(어깨 유연성, 하체 유연성 등 10가지)</span><br>
                            자세 측정<br>
                            <span>(거북목, 둥근 어깨 등 10가지)</span></div>
                    </div>
                    <div>
                        <div>아웃풋</div>
                        <div>운동 처방 전략 약 200,000개</div>
                    </div>
                </div>
            </div>
            <div class="section product_biz">
                <h4 data-aos="fade-up">사업 제휴 문의</h4>
                <ul>
                    <li data-aos="fade-up" data-aos-delay="400">
                        <img src="/assets/kor/images/product/product_info01.png" alt="">
                        <h5>바디 미터 판매 및 디지털 서비스 설계</h5>
                        <p>· 현장 상황 확인 후 상담<br>
                            · 오프라인 사업장 디지털 코칭 서비스 도입 컨설팅<br>
                            · 제품 입점계약 진행<br>
                            · 사용방법 교육 진행<br>
                            · 서비스 홍보 지원</p>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="800">
                        <img src="/assets/kor/images/product/product_info02.png" alt="">
                        <h5>기업형 무인 위탁 운영 서비스</h5>
                        <p>· 기업별 상황과 환경에 맞추어 최적의 서비스 컨설팅<br>
                            · 임직원 온라인 건강복지 서비스 설계로 비용 효율화</p>
                    </li>
                </ul>
            </div>
            <div class="section partners">
                <h3 data-aos="fade-up">피트릭스 협력사</h3>
                <!-- 이미지사이즈 500*300 -->
                <ul>
                    <li data-aos="fade-up" data-aos-delay="400">
                        <img src="/assets/kor/images/product/partners01.png" alt="">
                        <span>현대자동차</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="600">
                        <img src="/assets/kor/images/product/partners02.png" alt="">
                        <span>기아자동차</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="800">
                        <img src="/assets/kor/images/product/partners03.png" alt="">
                        <span>제로원</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1000">
                        <img src="/assets/kor/images/product/partners04.png" alt="">
                        <span>보령제약</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1200">
                        <img src="/assets/kor/images/product/partners05.png" alt="">
                        <span>L&S</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1200">
                        <img src="/assets/kor/images/product/partners06.png" alt="">
                        <span>데상트</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1200">
                        <img src="/assets/kor/images/product/partners07.png" alt="">
                        <span>미래에셋</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1200">
                        <img src="/assets/kor/images/product/partners08.png" alt="">
                        <span>더인벤션랩</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1200">
                        <img src="/assets/kor/images/product/partners09.png" alt="">
                        <span>강서구시설관리공단</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php echo $this->endSection(); ?>



<?php echo $this->section('script'); ?>
    <script>
        Kineto.create('#product_slide', {
            arrows: true,
            pagination: true,
            speed: 500,
            loop: true,
            mouseSwipe: true,
            pauseOnFocus: false,
            align: "center",
            perView: 1
        });
    </script>
<?php echo $this->endSection(); ?>
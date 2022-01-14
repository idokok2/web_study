<?php echo $this->extend('eng/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents product">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">Product <br class="mo_only">Introduction</h2>
                <!-- <p data-aos="fade-up" data-aos-delay="400">This is <span>how FITTRIX works!</span></p> -->
            </div>
            <div class="section product_info">
                <div id="product_slide" class="vis_wrap">
                    <div class="slide">
                        <img src="/assets/eng/images/product/product01.png" alt="">
                    </div>
                    <div class="slide">
                        <img src="/assets/eng/images/product/product02.png" alt="">
                    </div>
                </div>

                <div class="txt_wrap" data-aos="fade" data-aos-delay="400">
                    <div>
                        <div>Measurement Method</div>
                        <div>Body Shape Analysis Camera Image Processing Technology</div>
                    </div>
                    <div>
                        <div>Measurement Items</div>
                        <div>Body Size Measurement<br>
                            <span>(11 Items Including Face Width and Shoulder Width)</span><br>
                            Muscular Function Measurement<br>
                            <span>(10 Items Including Shoulder Flexibility and Lower Body Flexibility)</span><br>
                            Posture Measurement<br>
                            <span>(10 Items Including Text Neck and Round Shoulder)</span></div>
                    </div>
                    <div>
                        <div>Output</div>
                        <div>About 200,000 Exercise Prescription Strategies</div>
                    </div>
                </div>
            </div>
            <div class="section product_biz">
                <h4 data-aos="fade-up">Business Partnership <br class="pc_only">Inquiry</h4>
                <ul>
                    <li data-aos="fade-up" data-aos-delay="400">
                        <img src="/assets/eng/images/product/product_info01.png" alt="">
                        <h5>Body Meter Selling and Digital Service Design</h5>
                        <p>· Consulting after checking on the on-site status<br>
                            · Consulting by introducing digital coaching service on offline businesses <br>
                            · Signing contract on product purchase <br>
                            · Training on using products<br>
                            · Supporting on service promotion</p>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="800">
                        <img src="/assets/eng/images/product/product_info02.png" alt="">
                        <h5>Automated Consigned Management Service for Corporates</h5>
                        <p>· The optimum service consulting depending on corporate situation and environment<br>
                            · Efficient cost based on designing of online health welfare service for executives and employees </p>
                    </li>
                </ul>
            </div>
            <div class="section partners">
                <h3 data-aos="fade-up">fittrix partners</h3>
                <!-- 이미지사이즈 500*300 -->
                <ul>
                    <li data-aos="fade-up" data-aos-delay="400">
                        <img src="/assets/eng/images/product/partners01.png" alt="">
                        <span>Hyundai Moters</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="600">
                        <img src="/assets/eng/images/product/partners02.png" alt="">
                        <span>Kia Moters</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="800">
                        <img src="/assets/eng/images/product/partners03.png" alt="">
                        <span>Zero1</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1000">
                        <img src="/assets/eng/images/product/partners04.png" alt="">
                        <span>Boryung</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1200">
                        <img src="/assets/eng/images/product/partners05.png" alt="">
                        <span>L&S</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1200">
                        <img src="/assets/eng/images/product/partners06.png" alt="">
                        <span>Descente</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1200">
                        <img src="/assets/eng/images/product/partners07.png" alt="">
                        <span>Mirae Asset</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1200">
                        <img src="/assets/eng/images/product/partners08.png" alt="">
                        <span>The Invention Lab</span>
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
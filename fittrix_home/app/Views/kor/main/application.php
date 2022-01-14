<?php echo $this->extend('kor/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents app">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">어플리케이션</h2>
                <p data-aos="fade-up" data-aos-delay="400">피트릭스 앱을 지금 설치하고,<br>
                    언제 어디서나 <span>피트릭스 서비스를 경험</span>하세요.</p>
                <div class="btn_wrap" data-aos="fade-up" data-aos-delay="800">
                    <a href="https://apps.apple.com/kr/app/fittrix/id1563371627" target="_blank"><img src="/assets/kor/images/application/app_store.png" alt=""></a>
                    <a href="https://play.google.com/store/apps/details?id=com.Fittrix.FittrixAPP" target="_blank"><img src="/assets/kor/images/application/google_play.png" alt="구글플레이"></a>
                </div>
            </div>
            <div class="vis_wrap" data-aos="fade-up" data-aos-delay="600">
                <img src="/assets/kor/images/application/app_vis.png" alt=""> </div>
        </div>
    </div>
<?php echo $this->endSection(); ?>
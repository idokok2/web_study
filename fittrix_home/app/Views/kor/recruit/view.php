<?php echo $this->extend('kor/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents recruit">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">채용</h2>
                <p data-aos="fade-up" data-aos-delay="400">당신과 함께 성장하는 기업 ㈜피트릭스(fittrix)입니다.<br>
                    오늘의 나보다 <span>내일 더 성장할 당신</span>을 기다립니다. </p>
            </div>
            <div class="recruit_view">
                <div class="recruit_tit">
                    <h6><?php echo $info['f_title']?></h6>
                    <span><?php echo $info['f_end_date']?> 까지</span>
                </div>
                <div class="recruit_inner">
                    <span><?php echo htmlspecialchars_decode($info['f_comment'])?></span>
                </div>
                <div class="list_btn">
                    <a href="/recruit">목록으로<img src="/assets/kor/images/recruit/list_btn.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
<?php echo $this->endSection(); ?>
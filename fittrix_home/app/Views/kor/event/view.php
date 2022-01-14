<?php echo $this->extend('kor/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents event_view">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">이벤트</h2>

            </div>
            <div>
                <div class="event_tit">
                    <h6><?php echo $info['f_title']?></h6>
                    <span class="date"><?php echo date("Y.m.d", $info['f_date'])?></span>
                </div>
                <div class="event_inner"><?php echo htmlspecialchars_decode($info['f_comment'])?></div>
                <div class="list_btn">
                    <a href="/event">목록으로<img src="/assets/kor/images/event/event_list_btn.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
<?php echo $this->endSection(); ?>
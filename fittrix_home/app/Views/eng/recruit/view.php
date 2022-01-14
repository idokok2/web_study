<?php echo $this->extend('eng/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents recruit">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">Recruitment</h2>
                <p data-aos="fade-up" data-aos-delay="400">FITTRIX grows together with you.<br class="pc_only ta_only">
                    We wait for people who will grow better than today.</p>
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
                    <a href="/recruit">Go to List<img src="/assets/eng/images/recruit/list_btn.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
<?php echo $this->endSection(); ?>
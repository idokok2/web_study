<?php echo $this->extend('eng/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents app">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">Application</h2>
                <p data-aos="fade-up" data-aos-delay="400">Download FITTRIX App <br class="pc_only ta_only">and <span>experience FITTRIX service</span> anytime and anywhere</p>
                <div class="btn_wrap" data-aos="fade-up" data-aos-delay="800">
                    <a href=""><img src="/assets/eng/images/application/app_store.png" alt=""></a>
                    <a href=""><img src="/assets/eng/images/application/google_play.png" alt=""></a>
                </div>
            </div>
            <div class="vis_wrap" data-aos="fade-up" data-aos-delay="600">
                <img src="/assets/eng/images/application/app_vis.png" alt=""> </div>
        </div>
    </div>
<?php echo $this->endSection(); ?>
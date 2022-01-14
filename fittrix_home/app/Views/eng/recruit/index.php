<?php echo $this->extend('eng/templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div id="container">
    <div class="contents recruit">
        <div class="tit_wrap">
            <h2 data-aos="fade-up">Recruitment</h2>
            <p data-aos="fade-up" data-aos-delay="400">FITTRIX grows together with you.<br class="pc_only ta_only">
                We wait for people who will grow better than today.</p>
            <img src="/assets/eng/images/recruit/recruit.jpg" alt="">
        </div>
		<div class="section recruit_list">
            <h4 data-aos="fade-up"><span><?php echo $cnt['f_uid']; ?></span> Recruitment Case is Under Process</h4>
            <ul data-aos="fade-up" data-aos-delay="400">
                <?php
                foreach ($list as $row) {
                    if ($row['f_status']=="1") {
                        $f_status = "Ongoing";
                        $f_status_a = "active";
                        $url = '/recruit/view/' . $row['f_uid'];
                    } else {
                        $f_status = "Done";
                        $f_status_a = "";
                        $url = 'javascript:;';
                    }
                    ?>
                    <li class="<?php echo $f_status_a; ?>">
                        <li class="<?php echo $f_status_a; ?>">
                            <p><?php echo $f_status?></p>
                            <h6>
                                <?php echo $row['f_title']; ?>
                            </h6>
                            <span><?php echo $row['f_end_date']?></span>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>
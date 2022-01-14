<?php echo $this->extend('kor/templates/layout'); ?>

<?php echo $this->section('content'); ?>

<div id="container">
    <div class="contents recruit">
        <div class="tit_wrap">
            <h2 data-aos="fade-up">채용</h2>
            <p data-aos="fade-up" data-aos-delay="400">당신과 함께 성장하는 기업 ㈜피트릭스(fittrix)입니다.<br class="pc_only ta_only">
                오늘의 나보다 <span>내일 더 성장할 당신</span>을 기다립니다.</p>
            <img src="/assets/kor/images/recruit/recruit.jpg" alt="">
        </div>

		<div class="section recruit_list">
            <h4 data-aos="fade-up">현재 채용 진행중 <span><?php echo $cnt['f_uid']?></span>건</h4>
            <ul data-aos="fade-up" data-aos-delay="400">
                <?php
                foreach ($list as $row) {
                    if ($row['f_status']=="1") {
                        $f_status = "채용중";
                        $f_status_a = "active";
                        $url = '/recruit/view/' . $row['f_uid'];
                    } else {
                        $f_status = "채용완료";
                        $f_status_a = "";
                        $url = 'javascript:;';
                    }
                    ?>
                    <li class="<?php echo $f_status_a; ?>">
                        <a href="<?php echo $url; ?>">
                            <p><?php echo $f_status?></p>
                            <h6>
                                <?php echo $row['f_title']; ?>
                            </h6>
                            <span><?php echo $row['f_end_date']?> 까지</span>
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
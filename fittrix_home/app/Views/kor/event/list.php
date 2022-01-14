<?php echo $this->extend('kor/templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div id="container">
        <div class="contents event">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">이벤트</h2>
            </div>
            <div class="section event_list">
                <ul>
                    <?php
                    foreach ($list as $row) {
                        if ($row['f_status']=="1") {
                            $f_status = "진행중";
                            $f_status_a = "active";
                        } else {
                            $f_status = "종료";
                            $f_status_a = "";
                        }
                        ?>
                        <li class="<?php echo $f_status_a; ?>">
                            <a href="/event/view/<?php echo $row['f_uid']?>">
                                <img src="/upload/ht_event/<?php echo $row['f_file_0']; ?>" alt="">
                                <div>
                                    <p><?php echo $f_status; ?></p>
                                    <h6><?php echo $row['f_title']; ?></h6>
                                    <span><?php echo $row['f_summury']; ?></span>
                                </div>
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
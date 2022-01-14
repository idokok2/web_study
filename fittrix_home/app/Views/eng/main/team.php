<?php echo $this->extend('eng/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents team">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">People of FITTRIX</h2>
                <p data-aos="fade-up" data-aos-delay="400">
                    Are you ready to design a beautiful body and,<br class="pc_only ta_only">
                    <span>fill your body with healthy energy</span>with people of FITTRIX?</p>
            </div>
            <div class="section">
                <div>
                    <ul>
                        <?php
                        foreach ($list as $row) {
                            ?>
                            <li data-aos="fade-up">
                                <div style="background-image: url('/upload/team/<?php echo $row['f_file_0']; ?>')">
                                    <div class="team_position">
                                        <?php echo nl2br($row['f_message']); ?><br>
                                        <span><?php echo $row['f_division']; ?></span>
                                    </div>
                                    <div class="team_name"><?php echo $row['f_name']; ?></div>
                                    <div class="overlay"></div>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php echo $this->endSection('content'); ?>
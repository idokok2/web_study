<?php echo $this->extend('eng/templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div id="container">
        <div class="contents reservation view">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">Reservation</h2>
                <p data-aos="fade-up" data-aos-delay="400">
                    Welcome to FITTRIX.<br>
                    Make a reservation and <br class="pc_only"><span>experience FITTRIX’s service.</span>
                </p>
            </div>
            <div>
                <table>
                    <tbody>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Phone <br class="mo_only">Number</th>
                            <th>Visiting <br class="mo_only">Centers</th>
                            <th>Visiting <br class="mo_only">Data</th>
                            <th>Visiting <br class="mo_only">Time</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        $idx = 1;
                        foreach ($list as $row) {
                            switch ($row['f_status']) {
                                case "0":
                                    $f_status = "이용전";
                                    break;
                                case "1":
                                    $f_status = "취소";
                                    break;
                                case "2":
                                    $f_status = "No Show";
                                    break;
                                case "9":
                                    $f_status = "이용완료";
                                    break;
                            }
                            ?>
                            <tr>
                                <td><?php echo $idx?></td>
                                <td><?php echo $row['f_user_name']?></td>
                                <td><?php echo $row['f_user_cell']; ?></td>
                                <td><?php echo $row['f_center']; ?></td>
                                <td><?php echo substr($row['f_visit_date'],0,10); ?></td>
                                <td><?php echo substr($row['f_visit_date'],11,5); ?></td>
                                <td><?php echo $f_status; ?></td>
                            </tr>
                            <?php
                            $idx++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php echo $this->endSection(); ?>
<?php echo $this->extend('kor/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents reservation view">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">피트릭스 조회</h2>
                <p data-aos="fade-up" data-aos-delay="400">
                    피트릭스에 오신 것을 환영합니다.<br>
                    피트릭스 지금 예약하고, <span>서비스를 경험</span>하세요.
                </p>
            </div>
            <div>
                <table>
                    <tbody>
                        <tr>
                            <th>번호</th>
                            <th>예약자 이름</th>
                            <th>핸드폰 번호</th>
                            <th>방문센터</th>
                            <th>방문일정</th>
                            <th>시간</th>
                            <th>상태</th>
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
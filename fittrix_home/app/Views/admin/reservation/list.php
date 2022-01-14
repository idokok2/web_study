<?php echo $this->extend('admin/templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div class="admin_content_fix" style="width:1200px;">
    <div class="text-left" style="margin-bottom:-30px;">
        <span class="text-hidden">(Total : <?php echo $totalCnt; ?>)</span>
    </div>
    <div class="text-right" style="margin-bottom:20px;">
        &nbsp;
    </div>


    <script>
    function modStatus(F_UID, MOD) {
        if (MOD=='1') {
            if (!confirm("승인 상태로 변경하시겠습니까?")) {
                return false;
            } else {
                location.href='./modify.html?f_uid='+F_UID+'&mode=1';
            }
        } else if (MOD=='0') {
            if (!confirm("미승인 상태(로그인 불가)로 변경하시겠습니까?")) {
                return false;
            } else {
                location.href='./modify.html?f_uid='+F_UID+'&mode=0';
            }
        } else if (MOD=='3') {
            if (!confirm("탈퇴 상태(로그인 불가)로 변경하시겠습니까?")) {
                return false;
            } else {
                location.href='./modify.html?f_uid='+F_UID+'&mode=3';
            }
        }

    }
    </script>

    <table id = "table">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">예약자명</th>
                <th class="text-center">휴대폰번호</th>
                <th class="text-center">방문센터</th>
                <th class="text-center">방문일정</th>
                <th class="text-center">신청일</th>
                <th class="text-center">상태</th>
                <th class="text-center">보기</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = $totalCnt - ($page - 1) * $limit;
            foreach ($list as $row) {
                $f_status = "<span style='color:red'>{$status[$row['f_status']]}</span>";
                ?>
                <tr>
                    <td class="text-cener"><?=$no?></td>
                    <td class="text-cener"><?=$row['f_user_name']?></td>
                    <td class="text-cener"><?=$row['f_user_cell']?></td>
                    <td class="text-cener"><?=$row['f_center']?></td>
                    <td class="text-cener"><?=$row['f_visit_date']?></td>
                    <td class="text-cener"><?=date("Y.m.d H:i:s", $row['f_date'])?></td>
                    <td class="text-cener"><?=$f_status?></td>
                    <td class="text-cener"><a href="/admin/reservation/view?uid=<?=$row['f_uid']?>"><i class="xi-search"></i></a></td>
                </tr>
                <?php
                $no--;
            }

            if (empty($list) === true) {
                ?>
                <tr>
                    <td class="text-center" colspan="9">검색된 내용이 없습니다</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>



    <style>
    .btn_pd {
        padding:4px;
    }

    .btn_status {
        margin:2px;
        padding: 2px 10px;
        border: 1px solid transparent;
        border-radius: .25rem;
        font-size: 11px;
        line-height: 1.3;
        color:#FFF !important;
        background-color:#00F;
    }
    .btn_red {
        background-color:#00F;
    }
    .btn_blue {
        background-color:#F00;
    }
    .btn_grey {
        background-color:#aaa;
    }
    </style>

    <p style="text-align:center;">
    <?php
    //$all_query = "ht_div=$_GET[ht_div]&keyfield=$_GET[keyfield]&key=$_GET[key]&from=$_GET[from]";
    $all_query = "";
    //pageNavi(2, $limit, PAGE_PER_BLOCK, $totalCnt, $all_query, $page);
    ?>
    </p>

</div>
<?php echo $this->endSection(); ?>
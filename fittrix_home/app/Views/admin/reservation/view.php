<?php echo $this->extend('admin/templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div class="admin_content_fix">

<form id="joinFrm" name="joinFrm" method="post">
<input type="hidden" name="f_uid" value="<?=$info['f_uid']?>">
<table id = "table">
<caption style="text-align:right; color:#F00; padding-bottom:5px;"></caption>
<colgroup>
    <col width="20%">
    <col width="80%">
</colgroup>
<tbody>
	<tr>
        <td class="grey text-right">예약자명</td>
        <td class="text-left"><?=$info['f_user_name']?></td>
    </tr>
	<tr>
        <td class="grey text-right">휴대폰번호</td>
        <td class="text-left"><?=$info['f_user_cell']?></td>
    </tr>
	<tr>
        <td class="grey text-right">방문센터</td>
        <td class="text-left"><?=$info['f_center']?></td>
    </tr>
	<tr>
        <td class="grey text-right">방문일정</td>
        <td class="text-left"><?=$info['f_visit_date']?></td>
    </tr>
    <tr>
        <td class="grey text-right">신청일시</td>
        <td class="text-left"><?=date("Y-m-d H:i:s", $info['f_date'])?></td>
    </tr>
    <tr>
        <td class="grey text-right">상태</td>
        <td class="text-left">
            <?php
            $id = 1;
            foreach ($status as $key => $name) {
                ?>
                <label class="custom-control-label" for="f_chk_yn_<?php echo $id; ?>">
                    <input type="radio" id="f_chk_yn_<?php echo $id; ?>" name="f_status" class="custom-control-input" value="<?php echo $key; ?>" <?php echo  ($info['f_status'] === strval($key)) ? "checked" : ''; ?>>
                    <?php echo $name; ?>
                </label>
                <?php
                $id++;
            }
            ?>
        </td>
    </tr>
    <tr>
        <td class="grey text-right">관리자 메모</td>
        <td class="text-left"><textarea class="input_wide" id="f_memo" name="f_memo" rows="6" style="width:100%"><?=$info['f_memo']?></textarea></td>
    </tr>
</tbody>
</table>

<br><br>



<div class="text-center">
    <button type="button" class="btn_big btn_grey" id="list">리스트</button>
    <button type="button" class="btn_big btn_blue" id="submit">수정완료</button>
</div>
</form>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('script'); ?>
<script>
$(function () {
    $(document).on('click', '#list', function () {
        location.href = '/admin/reservation';
    }).on('click', '#submit', function () {
        var uid = $('[name=f_uid]').val();
        var status = $('[name=f_status]:checked').val();
        var memo = $('[name=f_memo]').val();

        $.post(
            '/admin/reservation/modify',
            {
                uid: uid,
                status: status,
                memo: memo,
            },
            function (response) {
                if (response.result === true) {
                    alert('수정하였습니다.');
                    location.reload();
                } else {
                    alert(response.reason);
                }
            }
        )
    });
});
</script>
<?php echo $this->endSection(); ?>
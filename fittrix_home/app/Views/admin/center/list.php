<?php echo $this->extend('admin/templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div class="admin_content_fix" style="width:1400px;">
    <div class="row">
        <div>
            <table id = "table">
                <tr>
                    <td class="text-right" colspan="8"><button type="button" class="btn_mid btn_blue" onClick="location.href='write'">센터 등록</button></td>
                </tr>
                <caption class="caption_title"></caption>
                <colgroup>
                    <col width="8%">
                    <col width="12%">
                    <col width="10%">
                    <col width="12%">
                    <col width="34%">
                    <col width="8%">
                    <col width="8%">
                    <col width="8%">
                </colgroup>
                <tr>
                    <th>Sort</th>
                    <th>센터명</th>
                    <th>전화번호</th>
                    <th>이메일</th>
                    <th>주소</th>
                    <th>노출</th>
                    <th>삭제</th>
                    <th>수정</th>
                </tr>
                <tbody>
                    <?php
                    foreach ($list as $row) {
                        if ($row['f_show']=="N") {
                            $f_show = "<span style='color:#F00'>X</span>";
                        } else {
                            $f_show = "<span style='color:#00F'>O</span>";
                        }
                        ?>
                        <tr>
                            <td><?=$row['f_sort']?></td>
                            <td><?=$row['f_name']?></td>
                            <td><?=$row['f_tel']?></td>
                            <td><?=$row['f_email']?></td>
                            <td><?=$row['f_address']?></td>
                            <td><?=$f_show?></td>
                            <td><button type="button" onClick="delIt('<?=$row['f_uid']?>')" class="btn_small btn_grey">삭제</button></td>
                            <td><button type="button" class="btn_small btn_blue" onClick="location.href='modify.html?f_uid=<?=$row['f_uid']?>'">수정</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
<br><br><br><br><br>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('script'); ?>
<script>
function delIt(f_uid) {
	if (!confirm("삭제하시면 복구가 불가능 합니다.")) {
		return false;
	} else {
		location.href='./db_exec.html?mode=del&f_uid='+f_uid+'';
	}
}
</script>
<?php echo $this->endSection(); ?>
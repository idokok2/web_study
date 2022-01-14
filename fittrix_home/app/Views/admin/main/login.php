<?
$BASE_URL = "../..";
?>
<!doctype html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>관리자</title>







<style type="text/css">
html {width:100%; height:100%}
body {width:100%; height:100%; margin:0; background-size:cover; background-position:50% 0; background-repeat:no-repeat}
.login_frm p,
.login_frm a,
.login_frm li,
.login_frm input {font-family: '맑은 고딕', 'Malgun Gothic', 'AppleSDGothicNeo-Light', 'Roboto', 'Droid Sans','Apple-Gothic', '애플고딕', 'Helvetica', dotum, '돋움', sans-serif}
.login_frm .login_box {position:absolute; top:50%; left:50%; width:640px; /*height:664px;*/ margin:-350px 0 0 -320px; background:#fff}
.login_frm .login_box .title {margin:0; text-align:center}
.login_frm .login_box .input_area {position:relative; width:526px; height:102px; margin:40px auto 0; text-align:left}
.login_frm .login_box .input_area .input_blk {position:relative; width:355px; height:45px; padding:0 20px; margin:0; border:1px solid #e9ebea; background:#f6f6f6}
.login_frm .login_box .input_area .input_blk.focus {border:1px solid #5078e3}
.login_frm .login_box .input_area .input_blk input[type="text"],
.login_frm .login_box .input_area .input_blk input[type="password"]{width:330px; height:40px; margin-top:1px; border:0; background:#f6f6f6; font-size:16px; color:#000; line-height:40px; outline:none}
.login_frm .login_box .btn_login {display:block; position:absolute; top:0; right:0; width:140px; height:102px; outline:none; border:none; color: #ffffff; font-size: 22px; background: #FF0404; cursor: pointer;}


.login_frm .login_box .btn_link {overflow:hidden; width:524px; height:107px; padding:0; margin:28px auto 0; border:1px solid #e9ebea}
.login_frm .login_box .btn_link li {float:left; width:130px; height:107px; padding-left:1px; background:url('../images/bg_link.jpg') no-repeat; list-style:none}
.login_frm .login_box .btn_link li:first-child {width:131px; padding-left:0; background:none}
.login_frm .login_box .txt_addr {margin-top:37px; font-size:12px; color:#666; line-height:20px; letter-spacing:0px; text-align:center}
.login_frm .login_box .txt_addr em {display:inline-block; width:1px; height:10px; margin:0 5px; background:#b5b6b7; *display:inline; *zoom:1}
.login_frm .login_box .copyright {margin-top:15px; font-size:12px; color:#8e8e8e; text-align:center}
</style>

</head>
<body onLoad="setFocus();">
    <div class="login_frm">
        <div class="login_box">
            <p class="title">
                <img src="/assets/admin/images/title_login.png" width="640" height="180" />
            </p>
            <div class="input_area">
                <form name=frmLogin method=post action="./login_ok.html" onSubmit="return submitForm();">
                    <p class="input_blk">
                        <input type="text" id="f_id" name="f_id" value="" placeholder="ID" tabindex="1" autocomplete="off" />
                    </p>
                    <p class="input_blk" style="margin-top:10px">
                        <input type="password" id="f_password" name="f_password" placeholder="Password" tabindex="2" />
                    </p>
                    <input type="submit" value="LOGIN" width="140" height="102" class="btn_login" tabindex="3" />
                </form>
            </div>
            <p class="txt_addr">
				Tel : 070-4350-1470<br />
            </p>
            <p class="copyright">Copyright (c). All Rights Reserved</p><br>
        </div>
    </div>



<script src="assets/admin/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(function() {
    //input focus
	$('.input_blk').on("focusin", "input", function(e) {
		$(this).parents(".input_blk").addClass('focus');
	}).on("textchange", "input", function(e) {
		$(this).parents(".input_blk").addClass('focus');
	}).on("focusout", "input", function(e) {
		$(this).parents(".input_blk").removeClass('focus');
	});
});

function submitForm()
{
	var objForm  = this.document.frmLogin;

	strID       = objForm.f_id.value;
	strPassword = objForm.f_password.value;

	if (strID == "") {
		alert("Insert ID");
		objForm.f_id.focus();
		return false;

	} else if (strPassword == "") {
		alert("Inserr Password");
		objForm.f_password.focus();
		return false;

	}

    $.post(
        '/admin/member/login',
        {
            f_id: strID,
            f_password: strPassword,
        },
        function (response) {
            if (response.result === true) {
                location.href = '/admin/reservation';
            } else {
                alert(response.reason);
            }
        }
    )
    return false;
}
function setFocus()
{
	var objForm = this.document.frmLogin;
	objForm.f_id.focus();
}
</script>
</body>
</html>
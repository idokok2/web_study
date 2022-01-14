<?php echo $this->extend('kor/templates/layout'); ?>

<?php echo $this->section('content'); ?>
<!-- Contents -->
<div id="container">
    <div class="tit_wrap">
        <h2 data-aos="fade-up">문의하기</h2>
        <p data-aos="fade-up" data-aos-delay="400">문의사항을 남겨주시면<br class="pc_only ta_only">
            빠른 시일내로 연락 드리겠습니다.</p>
    </div>
    <div class="section contact-form">
        <div class="category-btn-area">
            <button class="btn-cont-category category-buy n-btn3 active" onclick="checked_category('category-buy')">구매문의</button>
            <button class="btn-cont-category category-col n-btn3" onclick="checked_category('category-col')">협업문의</button>
            <button class="btn-cont-category category-ect n-btn3" onclick="checked_category('category-ect')">기타문의</button>
        </div>
        <form name="contact" class="form-area">
            <div class="cont-category-area display-none">
                <input type="radio" id="category-buy"  name="cont_category" value="buy" checked>
                <input type="radio" id="category-col"  name="cont_category" value="col" >
                <input type="radio" id="category-ect"  name="cont_category" value="etc" >
            </div>
            <div class="cont-area1">
                <div class="cont-area2 cont-company-area ">
                    <div class="cont-title">Company</div>
                    <input class="cont-name" name="cont_name" type="text" placeholder="회사명을 입력 해주세요">
                </div>
                <div class="cont-area2 cont-location-area">
                    <div class="cont-title">Location</div>
                    <input class="cont-location" name="cont_location" type="text" placeholder="회사위치를 입력 해주세요">
                </div>
                <div class="cont-area2 cont-author-area">
                    <div class="cont-title">Name</div>
                    <input class="cont-author" name="cont_author" type="text" placeholder="이름을 입력 해주세요">
                </div>
                <div class="cont-area2 cont-mail-area">
                    <div class="cont-title">E-mail</div>
                    <input class="cont-mail" name="cont_mail" type="text" placeholder="이메일을 입력 해주세요">
                </div>
                <div class="cont-area2 cont-phone-area">
                    <div class="cont-title">Phone</div>
                    <input class="cont-phone" name="cont_phone" type="text" placeholder="전화번호를 입력 해주세요">
                </div>
                <div class="cont-area2 cont-contents-area">
                    <div class="cont-title">Contents</div>
                    <textarea  class="cont-contents" name="cont_contents" type="textarea" cols="50" rows="10" placeholder="문의사항을 작성해주세요."></textarea>
                </div>
            </div>
            <div class="cont-agree-area">
                <input class="cont-agree-chkbox" type="checkbox" name="cont-agree" id="">
                <div class="cont-agree-title"><span class="cont-agree-info " onclick="show_detail()">[개인정보 취급방침]</span>에 동의합니다.</div>
                <div class="cont-agree-info-detail-area display-none">
                    <div class="cont-agree-info-detail-area2">
                        <div class="cont-agree-info-detail">
                            <div class="cont-agree-info-detail-box">
                                <div class="agree1">                                
                                    <div class="tit">수집목적</div>
                                    <div class="desc">문의, 요청, 불편사항 확인,<br> 처리 결과 회신</div>
                                </div>
                                <div class="agree2">
                                    <div class="tit">수집항목</div>
                                    <div class="desc">회사명, 회사위치, 이름,<br> 이메일, 전화번호</div>
                                </div>
                                <div class="agree3">
                                    <div class="tit">보유 기간</div>
                                    <div class="desc">3년간 보관 후<br> 지체없이 파기</div>
                                </div>
                            </div>
                        </div>
                        <div class="cont-agree-info-detail-close" onclick="show_detail()">닫기</div>
                    </div>
                </div>
            </div>
            <div class="cont-agree-submit">
                <button type="button" onclick="checkall()">문의하기</button>
            </div>
        </form>
    </div>
</div>
<!-- End of Contents -->
<?php echo $this->endSection(); ?>

<?php echo $this->section('script'); ?>
<script>
function checked_category(c){
    document.getElementById(c).checked = true ;
    $(".btn-cont-category.n-btn3").removeClass("active");
    $("." + c).addClass("active");
}

function show_detail(){
    $(".cont-agree-info-detail-area").toggleClass("display-none");
    $("body").toggleClass("position_fix");
    $(".cont-agree-chkbox").focus();
};

function checkall() {
    let CompanyName = document.querySelector('.cont-name'),
        CompanyLoca = document.querySelector('.cont-location'),
        Author = document.querySelector('.cont-author'),
        MailAdd = document.querySelector('.cont-mail'),
        PhoneNum = document.querySelector('.cont-phone'),
        Content = document.querySelector('.cont-contents'),
        agerrChk = document.querySelector('.cont-agree-chkbox');

    if(CompanyName.value == ""){
        alert('회사명을 입력해주세요.');
        CompanyName.focus();
        return false;
    }
    if(CompanyLoca.value == ""){
        alert('회사 위치를 입력해주세요.');
        CompanyLoca.focus();
        return false;
    }
    if(Author.value == ""){
        alert('이름을 입력해주세요.');
        Author.focus();
        return false;
    }
    if(MailAdd.value == ""){
        alert('메일주소를 입력해주세요.');
        MailAdd.focus();
        return false;
    }
    if(PhoneNum.value == ""){
        alert('전화번호를 입력해주세요.');
        PhoneNum.focus();
        return false;
    }
    if(Content.value == ""){
        alert('문의내용을 입력해주세요.');
        Content.focus();
        return false;
    }
    if(!agerrChk.checked){
        alert('개인정보취급방침에 동의해주세요.')
        return false;
    }

    const form = $('[name=contact]').serialize();
    $.ajax({
        url:'/contact',
        type: 'post',
        data: form,
        success: function (response) {
            if (response.result === true) {
                alert("문의 내용이 접수 되었습니다.\n빠른 시일내로 연락 드리겠습니다.\n감사합니다.");
                location.reload();
            } else {
                alert("저장에 실패하였습니다. 다시 시도하여 주세요.");
            }
        }
    });
}
</script>
</script>
<?php echo $this->endSection(); ?>
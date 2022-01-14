<?php echo $this->extend('kor/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents reservation confirm">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">피트릭스 조회</h2>
                <p data-aos="fade-up" data-aos-delay="400">
                    피트릭스에 오신 것을 환영합니다.<br>
                    피트릭스 지금 예약하고, <span>서비스를 경험</span>하세요.
                </p>
            </div>
			<form id="resv" name="resv" method="post">
			<div class="check_box">
                <div>
                    <div>
                        <span class="title">이름</span>
                        <input type="text" name="f_user_name" required placeholder="이름을 입력하세요">
                    </div>
                    <div>
                        <span class="title">전화번호</span>
                        <input type="text" name="f_user_cell" required placeholder="전화번호를 입력하세요">
                    </div>
                    <div>
                        <span class="title">가장 좋아하는 운동은?</span>
                        <input type="text" name="f_answer" required placeholder="질문의 답을 입력하세요">
                    </div>
                    <div class="submit">
						<button type="submit" class="btn_submit">예약 조회하기</button>
                    </div>
                </div>
            </div>
			</form>
        </div>
    </div>
<?php echo $this->endSection(); ?>
<?= $this->extend('kor/templates/layout') ?>

<?php echo $this->section('content'); ?>


    <!-- Contents -->
    <div id="container">
        <div class="contents media">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">미디어</h2>
                <p data-aos="fade-up" data-aos-delay="400">
                    피트릭스의 다양한 활동을 확인하세요.<br />
                    <!-- <span>피트릭스는 이렇게 진행</span>됩니다!</p> -->
                </p>
            </div>
            <div class="section media_list">
                <!-- <h3 data-aos="fade-up">영상 컨텐츠</h3> -->
                <ul data-aos="fade-up" data-aos-delay="400">
                    <li onclick="playmov(this)" youtube_url="https://youtu.be/HSZDcLWZB1k">
                        <img src="/assets/kor/images/media/gatsby1.jpg" alt="" srcset="" />
                        <div class="tit">피트릭스 사용기</div>
                        <div class="info">
                            유투버 '고독한갯츠비'님의<br />
                            바디미터 사용기!
                        </div>
                    </li>
                    <li onclick="playmov(this)" youtube_url="https://youtu.be/uwNKYTXSHGE">
                        <img src="/assets/kor/images/media/shinhan-fittrix.jpg" alt="" srcset="" />
                        <div class="tit">[신한 스퀘어브릿지 : 스타트업 썰명회]</div>
                        <div class="info">
                            바디 MBTI로 헬스케어 분야 <br />
                            리더를 노린다!
                        </div>
                    </li>
                    <li onclick="playmov(this)" youtube_url="https://youtu.be/6J-Huhc8waw">
                        <img src="/assets/kor/images/media/shinhan-4p4c.jpg" alt="" srcset="" />
                        <div class="tit">[신한 스퀘어브릿지]</div>
                        <div class="info">
                            4인 4색 스타트업 대표들의 <br />
                            슬기로운 창업 준비 썰
                        </div>
                    </li>
                    <li onclick="playmov(this)" youtube_url="https://youtu.be/UNnu_rDP_U8">
                        <img src="/assets/kor/images/media/money-today-innerview.jpg" alt="" srcset="" />
                        <div class="tit">[머니투데이] 이너VIEW</div>
                        <div class="info">
                            운동, 내 몸을 알아야 백전백승! <br />
                            지능형 헬스케어 전문기업 ‘피트릭스’
                        </div>
                    </li>
                    <li onclick="playmov(this)" youtube_url="https://youtu.be/gXILXjzefW0">
                        <img src="/assets/kor/images/media/money-today-issue.jpg" alt="" srcset="" />
                        <div class="tit">[머니투데이] 이슈&뷰11</div>
                        <div class="info">
                            영상인식 기술로 내 몸 분석 <br />
                            헬스케어 기술의 진화 '피트릭스’
                        </div>
                    </li>
                    <li onclick="playmov(this)" youtube_url="https://youtu.be/AxxJ8MzJjyA">
                        <img src="/assets/kor/images/media/nextrise2021.jpg" alt="" srcset="" />
                        <div class="tit">Next Rise 2021</div>
                        <div class="info">Next Rise 2021 서울 참가<br /></div>
                    </li>
                    <li onclick="playmov(this)" youtube_url="https://youtu.be/9Njfy7tqxPs">
                        <img src="/assets/kor/images/media/move360.jpg" alt="" srcset="" />
                        <div class="tit">피트릭스 사용 영상</div>
                        <div class="info">
                            피트릭스 in 롯데월드타워 잠실 <br />
                            move360
                        </div>
                    </li>
                    <li onclick="playmov(this)" youtube_url="https://youtu.be/ZO7o_um0NM4">
                        <img src="/assets/kor/images/media/introduce-fittrix.jpg" alt="" srcset="" />
                        <div class="tit">피트릭스 소개 영상</div>
                        <div class="info">피트릭스를 소개합니다!<br /></div>
                    </li>
                </ul>

                <!-- 모달 -->
                <div class="modal-area display-none">
                    <div class="modal-content">
                        <iframe class="modal_frame" width="" height="" src="" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <div class="btn-close" onclick="rset()">닫기</div>
                    </div>
                </div>
            </div>
        </div>
    </div>





<?php echo $this->endSection(); ?>

<?php echo $this->section('script'); ?>
<script>
        function modal_toggle() {
            $(".modal-area").toggleClass("display-none");
            $("body").toggleClass("over-hidden");
        }
        function rset() {
            modal_toggle();
            $(".modal_frame").attr("src", "");
        }

        function playmov(params) {
            modal_toggle();
            var url_full = $(params).attr("youtube_url");
            var url_mid = url_full.substr(17);
            var url_front = "https://www.youtube.com/embed/";
            var url_option = "?controls=1&autoplay=1";
            var url = url_front + url_mid + url_option;
            $(".modal_frame").attr("src", url);
        }
</script>
<?php echo $this->endSection(); ?>
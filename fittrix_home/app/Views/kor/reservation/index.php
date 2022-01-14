<?php echo $this->extend('kor/templates/layout'); ?>

<?php echo $this->section('content'); ?>
<link rel="stylesheet" href="/assets/kor/css/jquery.simple-dtpicker.css">
<div id="container">
    <div class="contents reservation">
        <div class="tit_wrap">
            <h2 data-aos="fade-up">피트릭스 예약</h2>
            <!-- <p data-aos="fade-up" data-aos-delay="400">
                피트릭스에 오신 것을 환영합니다.<br>
                드디어 피트릭스가 '와디즈' 펀딩으로<br>
                <span>첫 예약</span>을 진행합니다.<br>
                지금 바로 펀딩하고, <span>서비스를 경험</span>하세요.<br><br>
                <a href="https://www.wadiz.kr/web/campaign/detail/115600?utm_source=wadiz&utm_medium=mobile_msg&utm_campaign=comingsoon_open" target="_blank">
                    <div data-aos="fade-up" data-aos-delay="400" style="background-color:#01C6C6; border-radius: 5px; width:0.5fr; text-align: center;  " >
                        <br>
                        <p><h1 style="color: #ffffff;"> 와디즈 펀딩하러가기!!</h1></p>
                        <br>
                    </div>
                </a>
                <br><br><br><br><br><br> -->

                <!-- 피트릭스 지금 예약하고, <span>서비스를 경험</span>하세요. -->
            </p>
            <div class="confirm_btn" data-aos="fade-up" data-aos-delay="600">
                <a href="/reservation/confirm">예약 조회</a>
            </div>
        </div>
        <form id="resv" name="resv" method="post">
            <input type="hidden" name="center_no" value="">
            <div class="step_box">
                <div id="center_select">
                    <a href="javascript:;">
                        <p class="num">01</p>
                        <span class="title">방문센터</span>
                        <p class="arrow"></p>
                        <input class="center_location" name="f_center" value="" readonly required>
                    </a>
                    <div class="option_box" id="center_list">
                        <p class="list_tit">
                            <img src="/assets/kor/images/reservation/location_icon.jpg" alt="">
                            <span>피트릭스 스팟</span>
                        </p>
                        <p class="close_btn">
                            <img src="/assets/kor/images/reservation/close_btn.png" alt="">
                        </p>
                        <div class="list_wrap">
                            <?php
                            foreach ($centerList as $row) {
                                ?>
                                <button type="button" data-location="<?php echo $row['f_name']; ?>" data-uid="<?php echo $row['f_uid']; ?>">
                                    <div>
                                        <div><?php echo $row['f_name']; ?></div>
                                        <span><?php echo $row['f_address']; ?></span>
                                    </div>
                                    <a href="https://www.google.com/maps/search/<?php echo $row['f_address']; ?>" target="_blank" style="width:unset;">
                                        <p></p>
                                    </a>
                                </button>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="submit">
                            <a href="javascript:;">선택완료</a>
                        </div>
                    </div>
                </div>
                <div id="date_select">
                    <p class="num">02</p>
                    <span class="title">방문일정</span>
                    <input type="text" name="date" value="" style="text-align: right;" readonly required>
                    <p class="arrow"></p>
                </div>
                <div>
                    <p class="num">03</p>
                    <span class="title">이름</span>
                    <input type="text" name="f_user_name" required placeholder="이름을 입력하세요">
                </div>
                <div>
                    <p class="num">04</p>
                    <span class="title">번호</span>
                    <input type="tel" name="f_user_cell" required placeholder="전화번호를 입력하세요">
                </div>
                <div>
                    <p class="num">05</p>
                    <div>
                        <span class="title">가장 좋아하는 운동은?</span><br>
                        <span>예약 조회 시 사용됩니다.</span>
                    </div>
                    <input type="text" name="f_answer" required placeholder="질문의 답을 입력하세요">
                </div>
                <div class="apply">
                    <input type="checkbox" name="apply" id="apply">
                    <label for="apply">
                        서비스 이용 동의
                    </label>
                    <div>
                        <img src="/assets/kor/images/reservation/apply.jpg" alt="">
                    </div>
                </div>
                <div class="submit">
                    <a href="javascript:;" onClick="return sendIt();">신청완료</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('script'); ?>
<script src="/assets/kor/js/jquery.simple-dtpicker.js"></script>

<script>
    $(function () {
        $('*[name=date]').appendDtpicker({
            "current": null,
            "dateFormat": "YYYY.MM.DD H:mm",
            "locale": "ko",
            "animation": false,
            "minuteInterval": 60,
            "firstDayOfWeek": 0,
            "closeOnSelected": true,
            "calendarMouseScroll": true,
            "todayButton": false,
            "closeButton": true,
            "dateOnly": false,
            "timeOnly": false,
            "futureOnly": true,
            "minDate": null,
            "maxDate": null,
            "autodateOnStart": true,
            "minTime": "10:00",
            "maxTime": "21:01",
            "allowWdays": null,
            "amPmInTimeList": false,
            "externalLocale": null,
            "allowWdays": [1, 2, 3, 4, 5, 6],
        });

        $('[name=date]').change(function () {
            checkValid();
        });
    });
</script>

<script>
    $(document).ready(function () {
        document.getElementById('resv').date.value = "";
    });
</script>

<script>
    $(document).ready(function () {
        $("#center_select > a").click(function () {
            $("#center_list").addClass("active");
        });

        $("#center_select .close_btn, #center_select .submit").click(function () {
            $("#center_list").removeClass("active");
            checkValid();
        });

        $("#center_list button").click(function () {
            $(this).toggleClass("active").siblings().removeClass("active");
            //                $('.center_location').text($(this).attr("data-location"));
            $('.center_location').val($(this).attr("data-location"));
            $('[name=center_no]').val($(this).data('uid'));
        });

        $(".apply label").click(function () {
            $(".apply > div").css("display", "flex")
        });

        $(".apply > div").click(function () {
            $(this).css("display", "none")
        });
    });
</script>


<script>
    function sendIt() {
        if (!confirm('방문신청을 하시겠습니까?')) {
            return false;
        } else {
            if (!document.getElementById('resv').f_center.value) {
                alert("방문센터를 선택하세요");
                return false;
            }
            if (!document.getElementById('resv').date.value) {
                alert("방문일정을 선택하세요");
                return false;
            }
            if (!document.getElementById('resv').f_user_name.value) {
                alert("이름을 입력하세요");
                return false;
            }
            if (!document.getElementById('resv').f_user_cell.value) {
                alert("전화번호를 입력하세요");
                return false;
            }
            if (!document.getElementById('resv').f_answer.value) {
                alert("질문의 답을 입력하세요");
                return false;
            }
            if (document.getElementById('apply').checked === false) {
                alert('서비스 이용 동의를 해주세요.');
                return false;
            }

            //document.getElementById('resv').submit();
            $.post(
                '/reservation/proc',
                {
                    center_no: document.getElementsByName('center_no')[0].value,
                    f_center: document.getElementById('resv').f_center.value,
                    date: document.getElementById('resv').date.value,
                    f_user_name: document.getElementById('resv').f_user_name.value,
                    f_user_cell: document.getElementById('resv').f_user_cell.value,
                    f_answer: document.getElementById('resv').f_answer.value,
                },
                function (response) {
                    if (response.result === true) {
                        alert('신청이 완료되었습니다.');
                        location.reload();
                    } else {
                        alert(response.reason);
                    }
                }
            )
        }
    }

    function checkValid()
    {
        var center_no = $('[name=center_no]').val();
        var date = $('[name=date]').val();

        if (center_no.length === 0 || date.length === 0) {
            return;
        }

        $.post(
            '/reservation/checkValid',
            {
                center_no: center_no,
                date: date,
            },
            function (response) {
                if (response.result === false) {
                    alert('선택하신 날짜와 센터는 예약이 불가합니다.');
                }
            }
        )
    }
</script>
<?php echo $this->endSection(); ?>
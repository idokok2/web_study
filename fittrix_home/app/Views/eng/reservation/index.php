<?php echo $this->extend('eng/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <link rel="stylesheet" href="/assets/eng/css/jquery.simple-dtpicker.css">
    <div id="container">
        <div class="contents reservation">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">FITTRIX <br>Reservation</h2>
                <p data-aos="fade-up" data-aos-delay="400">
                    <!-- Welcome to FITTRIX.<br>
                    At the end of July, the first reservation will be made through 'Wadiz' funding.<br>
                    Coming Soon~!!!!!!<br><br><br><br><br><br> -->
                    Make a reservation and <br class="pc_only"><span>experience FITTRIX’s service.</span>
                </p>
                <div class="confirm_btn" data-aos="fade-up" data-aos-delay="600">
                    <a href="/reservation/confirm">View Reservation</a>
                </div>
            </div>
			<form id="resv" name="resv" action="./db_exec.html" method="post" enctype="multipart/form-data">
            <div class="step_box">
                <div id="center_select">
                    <a href="javascript:;">
                        <p class="num">01</p>
                        <span class="title">Visiting Centers</span>
                        <p class="arrow"></p>
                        <input class="center_location" name="f_center" value="" readonly required>
                    </a>
                    <div class="option_box" id="center_list">
                        <p class="list_tit">
                            <img src="/assets/eng/images/reservation/location_icon.jpg" alt="">
                            <span>Fittrix Spot</span>
                        </p>
                        <p class="close_btn">
                            <img src="/assets/eng/images/reservation/close_btn.png" alt="">
                        </p>
                        <div class="list_wrap">
                            <?php
                            foreach ($centerList as $row) {
                                ?>
                                <button type="button" data-location="<?php echo $row['f_name']; ?>">
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
                            <a href="javascript:;">DONE</a>
                        </div>
                    </div>
                </div>
                <div id="date_select">
                    <p class="num">02</p>
                    <span class="title">Visiting Schedule</span>
                    <input type="text" name="date" value="" style="text-align: right;" readonly required>
					<p class="arrow"></p>

                </div>
                <div>
                    <p class="num">03</p>
                    <span class="title">Name</span>
                    <input type="text" name="f_user_name" required>
                </div>
                <div>
                    <p class="num">04</p>
                    <span class="title">Phone Number</span>
                    <input type="tel" name="f_user_cell" required>
                </div>
                <div>
                    <p class="num">05</p>
                    <div>
                        <span class="title">Favorite Exercise?</span><br>
                        <span>Above information will be used for reservation reference</span>
                    </div>
                    <input type="text" name="f_answer" required>
                </div>
                <div class="apply">
                    <input type="checkbox" name="apply" id="apply">
                    <label for="apply">
                        Agreement
                    </label>
                    <div>
                        <img src="/assets/eng/images/reservation/apply.jpg" alt="">
                    </div>
                </div>
                <div class="submit">
                    <a href="javascript:;" onClick="return sendIt();">Done</a>
                </div>
            </div>
			</form>
        </div>
    </div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('script'); ?>
<script src="/assets/eng/js/jquery.simple-dtpicker.js"></script>

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
            "futureOnly": false,
            "minDate": null,
            "maxDate": null,
            "autodateOnStart": true,
            "minTime": "10:00",
            "maxTime": "21:01",
            "allowWdays": null,
            "amPmInTimeList": false,
            "externalLocale": null
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
        });
        $("#center_list button").click(function () {
            $(this).toggleClass("active").siblings().removeClass("active");
            //                $('.center_location').text($(this).attr("data-location"));
            $('.center_location').val($(this).attr("data-location"));
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
        if (!confirm('Would you like to apply for a visit?')) {
            return false;
        } else {
            if (!document.getElementById('resv').f_center.value) {
                alert("Please select a center");
                return false;
            }
            if (!document.getElementById('resv').date.value) {
                alert("Please select a schedule");
                return false;
            }
            if (!document.getElementById('resv').f_user_name.value) {
                alert("Please enter your name");
                return false;
            }
            if (!document.getElementById('resv').f_user_cell.value) {
                alert("Please enter your phone number");
                return false;
            }
            if (!document.getElementById('resv').f_answer.value) {
                alert("Please enter the answer to the question.");
                return false;
            }
            if (document.getElementById('apply').checked === false) {
                alert('Please check Agreement.');
                return false;
            }

            //document.getElementById('resv').submit();
            $.post(
                '/reservation/proc',
                {
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
</script>
<?php echo $this->endSection(); ?>
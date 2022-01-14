<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="fittrix">
    <meta property="og:description" content="Find Your Own Fittrix">
    <meta property="og:url" content="">
    <meta property="og:image" content="/assets/kor/images/common/og.jpg">
    <link rel="shortcut icon" href="/assets/kor/images/common/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/kor/css/style.css">
    <link rel="stylesheet" href="/assets/kor/css/responsive.css">
    <link rel="stylesheet" href="/assets/kor/css/aos.css">
    <link rel="stylesheet" href="/assets/kor/css/kineto.css">
    <link rel="stylesheet" href="/assets/kor/css/splide.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&amp;display=swap" rel="stylesheet">
    <title>피트릭스 - Fittrix</title>
</head>

<body>
    <header>
        <div id="header_wrap">
            <h1 id="logo"><a href="/">피트릭스</a></h1>
        </div>
        <nav>
            <div class="content content--navi">
                <div class="hamburger hamburger-navi">
                    <div class="line_wrap right_nav">
                        <div class="hamburger__line hamburger__line--01">
                            <div class="hamburger__line-in hamburger__line-in--01 hamburger__line-in--navi"></div>
                        </div>
                        <div class="hamburger__line hamburger__line--02">
                            <div class="hamburger__line-in hamburger__line-in--02 hamburger__line-in--navi"></div>
                        </div>
                        <div class="hamburger__line hamburger__line--03">
                            <div class="hamburger__line-in hamburger__line-in--03 hamburger__line-in--navi"></div>
                        </div>
                        <div class="hamburger__line hamburger__line--cross01">
                            <div class="hamburger__line-in hamburger__line-in--cross01 hamburger__line-in--navi"></div>
                        </div>
                        <div class="hamburger__line hamburger__line--cross02">
                            <div class="hamburger__line-in hamburger__line-in--cross02 hamburger__line-in--navi"></div>
                        </div>
                    </div>
                    <img src="/assets/kor/images/common/right_bg.png" alt="">
                </div>

                <div class="global-menu">
                    <div class="global-menu__logo">
                        <a href="/">
                            <img src="/assets/kor/images/common/global_logo.png" alt="">
                        </a>
                    </div>
                    <div class="global-menu__wrap">
                        <?php
                        foreach ($menu as $item) {
                            echo "<a class='global-menu__item global-menu__item--navi' href='{$item['path']}'>{$item['name']}</a>";
                        }
                        ?>
                    </div>
                    <div class="global-menu__info">
                        <div>
							<!-- <p class="lang"><img src="/assets/kor/images/common/lang.png" alt=""><a href="/eng/main/">ENG</a> | <a href="/kor/main/">KOR</a></p> -->
                            <p><img src="/assets/kor/images/common/footer_address.png" alt=""><span>서울시 강남구 역삼로17길 10 부강빌딩 1층 피트릭스</span></p>

                        </div>
                        <div>
                            <p><img src="/assets/kor/images/common/footer_tel.png" alt=""><span>02-553-1911</span></p>

                        </div>

                        <ul>
                            <li>
                                <a href="https://www.instagram.com/fittrix.co/" target="_blank">
                                    <img src="/assets/kor/images/common/sns_insta.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="" target="_blank">
                                    <img src="/assets/kor/images/common/sns_kakao.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCEfAp3o-7yfbTwiDHmLS9FA" target="_blank">
                                    <img src="/assets/kor/images/common/sns_youtube.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="https://blog.naver.com/fittrix" target="_blank">
                                    <img src="/assets/kor/images/common/sns_blog.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <svg class="shape-overlays" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <path class="shape-overlays__path"></path>
                    <path class="shape-overlays__path"></path>
                </svg>
            </div>
        </nav>
        <div class="line_wrap left_nav">
            <img src="/assets/kor/images/common/left_bg.png" alt="">
        </div>
    </header>
    <?php echo $this->renderSection('content'); ?>
    <footer>
        <div id="footer_wrap">
            <nav>
                <ul>
                    <?php
                    foreach ($menu as $item) {
                        $class = '';
                        if ($item['path'] === $uri_string || in_array($uri_string, $item['children']) === true) {
                            $class = 'class="active"';
                        }

                        echo "<li><a href='{$item['path']}' {$class}>{$item['name']}</a></li>";
                    }
                    ?>
                    <!-- <li><a href="../about/about.html" <?if ($now_page=="about.html") {echo "class='active'";}?>>피트릭스 소개</a></li>
                    <li><a href="../team/team.html" <?if ($now_page=="team.html") {echo "class='active'";}?>>피트릭스 사람들</a></li>
                    <li><a href="../services/services.html" <?if ($now_page=="services.html") {echo "class='active'";}?>>서비스 소개</a></li>
                    <li><a href="../product/product.html" <?if ($now_page=="product.html") {echo "class='active'";}?>>제품 소개</a></li>
                    <li><a href="../product/media.html" <?if ($now_page=="media.html") {echo "class='active'";}?>>미디어</a></li>
                    <li><a href="../application/application.html" <?if ($now_page=="application.html") {echo "class='active'";}?>>어플리케이션</a></li>
                    <li><a href="../recruit/recruit.html" <?if ($now_page=="recruit.html" || $now_page=="recruit_view.html") {echo "class='active'";}?>>채용</a></li>
                    <li><a href="../event/event_list.html" <?if ($now_page=="event_list.html" || $now_page=="event_view.html") {echo "class='active'";}?>>이벤트</a></li>
                    <li><a href="../reservation/reservation.html" <?if ($now_page=="reservation.html" || $now_page=="reservation_confirm.html" || $now_page=="reservation_view.html") {echo "class='active'";}?>>피트릭스 예약</a></li> -->
                </ul>
            </nav>
            <div class="address">
                <address>
                    <div>
						<!-- <p class="lang"><img src="/assets/kor/images/common/lang.png" alt=""><a href="javascript:;" class="locale" data-locale="eng">ENG</a> | <a href="javascript:;" class="locale" data-locale="kor">KOR</a></p> -->
                        <p><img src="/assets/kor/images/common/footer_address.png" alt=""><span>Address</span></p>
                        <span>서울시 강남구 역삼로17길 10 부강빌딩 1층 피트릭스</span>
                    </div>
                    <div>
                        <p><img src="/assets/kor/images/common/footer_tel.png" alt=""><span>Telephone</span></p>
                        <span>02-553-1911</span>
                    </div>
                    <div>
                        <p>회사명 : (주)피트릭스(fittrix)</p>
                        <p>대표 : 남정우</p>
                        <p>사업자 등록번호 : 112-81-55199</p>
                    </div>
                </address>
                <ul>
                    <li>
                        <a href="https://www.instagram.com/fittrix.co/" target="_blank">
                            <img src="/assets/kor/images/common/sns_insta.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="" target="_blank">
                            <img src="/assets/kor/images/common/sns_kakao.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCEfAp3o-7yfbTwiDHmLS9FA" target="_blank">
                            <img src="/assets/kor/images/common/sns_youtube.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://blog.naver.com/fittrix" target="_blank">
                            <img src="/assets/kor/images/common/sns_blog.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <h1 class="footer_logo">
                <img src="/assets/kor/images/common/footer_logo.png" alt="">
            </h1>
            <div id="policy">
                <p>Copyright © fittrix All rights preserved.</p>
                <ul>
                    <li><a href="/policy/agreement">이용약관</a></li>
                    <li><a href="/policy/privacy">개인정보처리방침</a></li>
                    <li><a href="/policy/refund">환불규정</a></li>
                </ul>
            </div>
        </div>
        <div id="top_btn">
            <a href="#header_wrap">Back to top</a>
            <img src="/assets/kor/images/common/top_btn.png" alt="">
        </div>
    </footer>
    <script src="/assets/kor/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/kor/js/easings.js"></script>
    <script src="/assets/kor/js/aos.js"></script>
    <script src="/assets/kor/js/ScrollMagic.min.js"></script>
    <script src="/assets/kor/js/common.js"></script>
    <script src="/assets/kor/js/kineto.js"></script>
    <script src="/assets/kor/js/splide.min.js"></script>
    <?php echo $this->renderSection('script'); ?>
    <script>
        $(function () {
            $(document).on('click', '.locale', function () {
                let locale = $(this).data('locale')
                $.post(
                    '/setLocale',
                    {
                        locale: locale,
                    },
                    function (response) {
                        location.href = '/';
                    }
                )
            });
        });
    </script>
</body>
</html>
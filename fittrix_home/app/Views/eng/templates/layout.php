<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="fittrix">
    <meta property="og:description" content="Find Your Own Beauty">
    <meta property="og:url" content="">
    <meta property="og:image" content="/assets/eng/images/common/og.jpg">
    <link rel="shortcut icon" href="/assets/eng/images/common/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/eng/css/style.css">
    <link rel="stylesheet" href="/assets/eng/css/responsive.css">
    <link rel="stylesheet" href="/assets/eng/css/aos.css">
    <link rel="stylesheet" href="/assets/eng/css/kineto.css">
    <link rel="stylesheet" href="/assets/eng/css/splide.min.css">
    <title>Fittrix</title>
</head>

<body>
    <header>
        <div id="header_wrap">
            <h1 id="logo"><a href="/">Fittrix</a></h1>
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
                    <img src="/assets/eng/images/common/right_bg.png" alt="">
                </div>

                <div class="global-menu">
                    <div class="global-menu__logo">
                        <a href="../main/index.html">
                            <img src="/assets/eng/images/common/global_logo.png" alt="">
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
							<p class="lang"><img src="/assets/eng/images/common/lang.png" alt=""><a href="javascript:;" class="locale" data-locale="kor">KOR</a> | <a href="javascript:;" class="locale" data-locale="eng">ENG</a></p>
							<p><img src="/assets/eng/images/common/footer_address.png" alt=""><span>FITTRIX, 1F, Bugang Bldg., 10, Yeoksam-ro 17-gil, <br class="mo_only">Gangnam-gu, Seoul, Korea</span></p>

                        </div>
                        <div>
                            <p><img src="/assets/eng/images/common/footer_tel.png" alt=""><span>+82-2-553-1911</span></p>

                        </div>

                        <ul>
                            <li>
                                <a href="https://www.instagram.com/fittrix.co/" target="_blank">
                                    <img src="/assets/eng/images/common/sns_insta.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="" target="_blank">
                                    <img src="/assets/eng/images/common/sns_kakao.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCEfAp3o-7yfbTwiDHmLS9FA" target="_blank">
                                    <img src="/assets/eng/images/common/sns_youtube.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="https://blog.naver.com/fittrix" target="_blank">
                                    <img src="/assets/eng/images/common/sns_blog.png" alt="">
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
            <img src="/assets/eng/images/common/left_bg.png" alt="">
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
                </ul>
            </nav>
            <div class="address">
                <address>
                    <div>
						<p class="lang"><img src="/assets/eng/images/common/lang.png" alt=""><a href="javascript:;" class="locale" data-locale="eng">ENG</a> | <a href="javascript:;" class="locale" data-locale="kor">KOR</a></p>
                        <p><img src="/assets/eng/images/common/footer_address.png" alt=""><span>Address</span></p>
                        <span>FITTRIX, 1F, Bugang Bldg., 10, Yeoksam-ro 17-gil, <br class="mo_only">Gangnam-gu, Seoul, Korea </span>
                    </div>
                    <div>
                        <p><img src="/assets/eng/images/common/footer_tel.png" alt=""><span>Telephone</span></p>
                        <span>02-553-1911</span>
                    </div>
                    <div>
                        <p>Company name : (주)피트릭스(fittrix)</p>
                        <p>President : Rick, Nahm</p>
                        <p>registration No. : 112-81-55199</p>
                    </div>
                </address>
                <ul>
                    <li>
                        <a href="https://www.instagram.com/fittrix.co/" target="_blank">
                            <img src="/assets/eng/images/common/sns_insta.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="" target="_blank">
                            <img src="/assets/eng/images/common/sns_kakao.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCEfAp3o-7yfbTwiDHmLS9FA" target="_blank">
                            <img src="/assets/eng/images/common/sns_youtube.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://blog.naver.com/fittrix" target="_blank">
                            <img src="/assets/eng/images/common/sns_blog.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <h1 class="footer_logo">
                <img src="/assets/eng/images/common/footer_logo.png" alt="">
            </h1>
            <div id="policy">
                <p>Copyright © fittrix All rights preserved.</p>
                <ul>
                    <li><a href="/policy/agreement">Terms of Use</a></li>
                    <li><a href="/policy/privacy">Privacy Policy</a></li>
                    <li><a href="/policy/refund">Refund Policy</a></li>
                </ul>
            </div>
        </div>
        <div id="top_btn">
            <a href="#header_wrap">Back to top</a>
            <img src="/assets/eng/images/common/top_btn.png" alt="">
        </div>
    </footer>
    <script src="/assets/eng/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/eng/js/easings.js"></script>
    <script src="/assets/eng/js/aos.js"></script>
    <script src="/assets/eng/js/ScrollMagic.min.js"></script>
    <script src="/assets/eng/js/common.js"></script>
    <script src="/assets/eng/js/kineto.js"></script>
    <script src="/assets/eng/js/splide.min.js"></script>
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
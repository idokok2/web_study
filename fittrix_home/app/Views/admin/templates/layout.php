<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Management System</title>

    <link rel="shortcut icon" href="/assets/admin/images/favicon.ico">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="admin_container">
	<div class="admin_header">
		<div class="admin_logo">
			<a href="/admin"><img src="/assets/admin/images/admin_logo.png" alt="logo" /></a>
		</div>
		<div class="admin_gnb">
			<span>Welcome, <?=$_SESSION['f_admin_id']?> !</span>
<!--
			<a href=""><i class="xi-bell"></i></a>
			<a href=""><i class="xi-cog"></i></a>
-->
			<a href="/admin/mod_admin" title="Modify Administrator Information"><i class="xi-profile"></i></a>
			<a href="/admin/logout" title="LOG OUT"><i class="xi-power-off"></i></a>
		</div>
	</div>

	<div class="admin_body">
		<div class="admin_lnb">

<!-------- [LNB 메뉴 - 시작] --------->
            <ul>
                <?php
                foreach ($menu as $item) {
                    ?>
                    <li class="<?php echo ($pageCode1 === $item['code']) ? 'on' : ''; ?>">
                        <a class="xi-alarm admin_main_menu" href="javascript:;"><span class="admin_m_title"><?php echo $item['name']; ?></span></a>
                        <ul>
                            <?php
                            foreach ($item['list'] as $row)  {
                                ?>
                                <li class="<?php echo ($pageCode2 === $row['code']) ? "on" : ''; ?>">
                                    <a class="xi-subdirectory-arrow" href="/admin/<?php echo $row['path']; ?>"><span class="admin_m_title"><?php echo $row['name']; ?></span></a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <script>
            $(document).ready(function () {
                $('.admin_main_menu').each( function () {
                    if ($(this).parents('li').hasClass('on') === true) {
                        $(this).css('background','url(/assets/admin/images/caret-down-solid.png) no-repeat 200px 21px');
                    } else {
                        $(this).css('background','url(/assets/admin/images/caret-up-solid.png) no-repeat 200px 21px');
                    }
                });
                $('.admin_lnb ul li:has(ul) a').click (function (event) {
                    if($(this).next('ul').is(':hidden')) {
                        $(this).css('background','url(/assets/admin/images/caret-down-solid.png) no-repeat 200px 21px');
                        $(this).next('ul').show();
                    } else {
                        $(this).css('background','url(/assets/admin/images/caret-up-solid.png) no-repeat 200px 21px');
                        $(this).next('ul').hide();
                    }
                    return false;
                }).next('ul').hide();

                $('.admin_lnb ul li ul li a').click (function (event) {
                    location.href=this;
                });

                $('.admin_lnb ul li').each(function () {
                    if($(this).is('.on')) {
                        $(this).not('.admin_lnb ul li ul li.on');
                        $(this).children('ul').show();
                    }
                });
            });
            </script>

<!-------- [LNB 메뉴 - 종료] --------->



		</div>
		<div class="admin_content">
			<div class="admin_content_full">
				<h2><?=$title1?> <?php if ($title2) {echo " > ".$title2;}?> <?php if ($title3) {echo " > ".$title3;}?></h2>
			</div>
            <?php echo $this->renderSection('content'); ?>
        </div>
	</div>

	<div class="admin_footer">
		<span class="admin_copyright">COPYRIGHT © All RIGHTS RESERVED</span>
		<span class="admin_go_top"><a href="#"><i class="xi-arrow-up"></i> GO TO TOP</a></span>
	</div>
</div>
<?php echo $this->renderSection('script'); ?>
</body>
</html>
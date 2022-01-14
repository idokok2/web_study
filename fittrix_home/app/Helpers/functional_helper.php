<?php
if (function_exists('historyBack') === false) {
    function historyBack($msg = '') {
        echo <<< SCRIPT
<script language="javascript">
let msg = "{$msg}";
if (msg.length > 0) {
    alert(msg);
}
history.back();
</script>
SCRIPT;
    }
}

if (function_exists('alert') === false) {
    function alert($msg) {
        echo <<< SCRIPT
<script language="javascript">
alert({$msg});
</script>
SCRIPT;
    }
}

if (function_exists('windowClose') === false) {
    function windowClose($msg = '') {
        echo <<< SCRIPT
<script language="javascript">
var msg = "{$msg}";

if (msg.length > 0) {
    alert(msg);
}
window.close();
</script>
SCRIPT;
	}
}

if (function_exists('movePage') === false) {
    function movePage($url, $msg = '') {
        echo <<< JS
<script type="text/javascript">
var msg = '{$msg}';
if (msg.length > 0) {
	alert(msg);
}
location.href = '{$url}';
</script>
JS;
    }
}

############################################
function pageNavi($TYPE, $show_per_page, $show_page_block, $total_article, $all_query, $page) {
    $PHP_SELF = $_SERVER['PHP_SELF'];
    $block_list = "
    <nav>
        <ul class='pagination pagination-sm justify-content-center'>
        ";

	$page_count = ceil($total_article / $show_per_page);

	if ($page <= ceil($show_page_block/2)) {
		$block_start = 1;
	} else {
		$block_start = $page - floor($show_page_block/2);
	}

	#################### [처음 페이지로 가기] ######################
	if ($TYPE=="2") {
		if ($page == 1) {
			$block_list .= "<li class='page-item'><a class='page-link' href='javascript:;'><i class='fas fa-chevron-left'></i><i class='fas fa-chevron-left'></i></a></li>";
		} else {
			$block_list .= "<li class='page-item'><a class='page-link' href='$PHP_SELF?page=1&$all_query'><i class='fas fa-chevron-left'></i><i class='fas fa-chevron-left'></i></a></li>";
		}
	}
	#################### [한페이지 이전으로 가기] ######################
	if ($page>1) {
		//$prev_page = $page-$show_page_block;
        $prev_page = $page-1;
		$block_list .= "<li class='page-item'><a class='page-link' href='$PHP_SELF?page=$prev_page&$all_query'><i class='fas fa-chevron-left'></i></a></li>";
	} else {
		$block_list .= "<li class='page-item'><a class='page-link' href='javascript:;'><i class='fas fa-chevron-left'></i></a></li>";
	}

	$block_end = $block_start + $show_page_block - 1;

	#################### [페이지 번호 뿌리기] ######################
	while($block_start<=$block_end && $block_start<=$page_count) {
		if($page != $block_start) {
			$block_list .= "<li class='page-item'><a class='page-link' href='$PHP_SELF?page=$block_start&$all_query'>$block_start</a></li>";
		} else {
			$block_list .= "<li class='page-item active'><a class='page-link' href='javascript:;'>$block_start</a></li>";
		}
		$block_start++;
	}
	#################### [한페이지 다음으로 가기] ######################
	if ($page!=$page_count) {
		//$next_page = $page+$show_page_block;
        $next_page = $page+1;
		$block_list .= "<li class='page-item'><a class='page-link' href='$PHP_SELF?page=$next_page&$all_query'><i class='fas fa-chevron-right'></i></a></li>";
	} else {
		$block_list .= "<li class='page-item'><a class='page-link' href='javascript:;'><i class='fas fa-chevron-right'></i></a></li>";
	}

	#################### [마지막 페이지로 가기] ######################
	if ($TYPE=="2") {
		if ($page == $page_count) {
			$block_list .= "<li class='page-item'><a class='page-link' href='javascript:;'><i class='fas fa-chevron-right'></i><i class='fas fa-chevron-right'></i></a></li>";
		} else {
			$block_list .= "<li class='page-item'><a class='page-link' href='$PHP_SELF?page=$page_count&$all_query'><i class='fas fa-chevron-right'></i><i class='fas fa-chevron-right'></i></a></li>";
		}
	}

    $block_list .= "
        </ul>
    </nav>
        ";
	echo $block_list;
}
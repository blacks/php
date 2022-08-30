<?php

function pagination($page = null, $total, $size = 10) {
	$page = is_numeric($page) && $page > 0 ? $page : 1;
	$max = $total ? ceil($total / $size) : 0;

	$end = min(max($page + 4, 9), $max);
	$start = max($end - 8, $min = 1);

	unset($_GET['page']);
	$gets = (sizeof($_GET) ? '&' : '') . http_build_query($_GET);
	$res = '';
	if($start > $min) { $res .= '<li class="pagination_start"><a href="?page=' . $min . $gets . '">&#x23EA;</a></li>'; }
	for($i = $start; $i <= $end; $i++) { $res .= '<li class="pagination' . ($page == $i ?' active' : '') . '"><a href="?page=' . $i . $gets . '">' . $i . '</a></li> '; }
	if($end < $max) { $res .= '<li class="pagination_end"><a href="?page=' . $max . $gets . '">&#x23E9;</a></li>'; }

	return '<ul class="pagination">' . $res . '</ul>';	
}

/* CSS example
ul.pagination{display:inline-block;position:relative;list-style:none;padding:0px;margin:0px;}
ul.paginationli{color:white;float:left;line-height:25px;vertical-align:middle;text-align:center;}
ul.paginationlia{display:block;padding:0px5px;min-width:20px;color:white;font-weight:bold;text-decoration:none;background-color:#337ab7;border-top:1pxsolid#2e6da4;border-bottom:1pxsolid#2e6da4;border-right:1pxsolid#2e6da4;}
ul.paginationli:first-childa{border-left:1pxsolid#2e6da4;border-top-left-radius:6px;border-bottom-left-radius:6px;}
ul.paginationli:last-childa{border-top-right-radius:6px;border-bottom-right-radius:6px;}
ul.paginationlia:hover,ul.paginationli.activea{color:#337ab7;background-color:#fff;}
*/

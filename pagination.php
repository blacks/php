<?php

function pagination($page, $total, $size = 10) {
	$end = min(($start = max(($page = isset($page) && is_numeric($page) && $page > 0 ? $page : 1) - 4, $min = 1)) + 8, $max = $total ? ceil($total / $size) : 0);
	
	unset($_GET['page']);
	$gets = (sizeof($_GET) ? '&' : '') . http_build_query($_GET);
	
	$res = '';
	if($start > $min) { $res .= '<li class="pagination_start"><a href="?page=' . $min . $gets . '">«</a></li>'; }
	for($i = $start; $i <= $end; $i++) { $res .= '<li class="pagination' . ($page == $i ?' active' : '') . '"><a href="?page=' . $i . $gets . '">' . $i . '</a></li> '; }
	if($end < $max) { $res .= '<li class="pagination_end"><a href="?page=' . $max . $gets . '">»</a></li>'; }
	
	return '<ul class="pagination">' . $res . '</ul>';
}

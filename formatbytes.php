<?php

function formatbytes($file) {
	$filesize = filesize($file);
	if($filesize <= 0) {
		$res = $filesize = 'unknown file size';
	} else {
		$type = array('Byte', 'KB', 'MB', 'GB', 'TB');
		for($i = sizeof($type); $i > 0; $i--)
			if($filesize > 1024 ** $i) {
				$res = round($filesize * .0009765625 ** $i, 2) . $type[$i-1];
				break;
			}
	}
	return $res;
}

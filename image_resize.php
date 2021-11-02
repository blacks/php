<?php

$dir = 'images;

$dir_handle = opendir($dir);

if(is_resource($dir_handle)) {
	while(($file_name = readdir($dir_handle)) == true) {
		if($info = getimagesize($dir . $file_name))
		if(max($width, $height) > 1080) {
			$width = $info['0']; $height = $info['1'];
			if($width >= $height) {
				$rw = 1080;
				$rh = floor($height * ($rw / $width));
			} else {
				$rh = 1080;
				$rw = floor($width * ($rw / $height));
			}
			if($info['mime'] == 'image/jpeg') {
				$src = imagecreatefromjpeg($dir . $file_name);
				$dst = imagecreatetruecolor($rw, $rh);
				imagecopyresampled($dst, $src, 0, 0, 0, 0, $rw, $rh, $width, $height);
				//imagejpeg($dst, ($dir . $file_name . '.jpg'));
				exit;
			}
		}
	}
	closedir($dir_handle);
}
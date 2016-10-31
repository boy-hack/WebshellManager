<?php 
/*
 * 一些处理相关的函数
 *
 */


//处理文件排序
function FileSort($array){
	$item = array();
	foreach ($array as $key => $value) {
		$array[$key]["path"] = characet(urldecode($value["path"]));
	}
	foreach ($array as $key => $value) {
		$filename = $value["path"];
		if(substr($filename, -1)=="/")$item[] = $value;
	}
	foreach ($array as $key => $value) {
		$filename = $value["path"];
		if(substr($filename, -1)!="/")$item[] = $value;
	}
	return $item;
}

//文件大小格式化

function File_Size($size)
{
	if($size > 1073741824) $size = round($size / 1073741824 * 100) / 100 . ' G';
	elseif($size > 1048576) $size = round($size / 1048576 * 100) / 100 . ' M';
	elseif($size > 1024) $size = round($size / 1024 * 100) / 100 . ' K';
	else $size = $size . ' B';
	return $size;
}
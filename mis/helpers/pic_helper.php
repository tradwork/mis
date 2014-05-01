<?php
/***************************************************************************
*
* Copyright (c) 2010 Baidu.com, Inc. All Rights Reserved
*
**************************************************************************/



/**
 * @file helpers/letter_helper.php
 * @author liuguojing(com@baidu.com)
 * @date 2010/08/31 16:05:48
 * @brief 
 *  
 **/

function   createThumbImage($original,$thumb_path,$new_width=50,$new_height=50,$type)
{
	//	if ($ext==null)
	//	{
	//		$ext=end(explode( ". ",$original));
	//	}
	//	$ext=strtolower($ext);
	$filename   =   $original;
	list($width,   $height)   =   getimagesize($filename);
	$image_p   =   imagecreatetruecolor($new_width,   $new_height);
	switch   ($type)
	{
		case   'image/pjpeg':
		case   'image/jpeg':
		case   'image/jpg':
			$image   =   imagecreatefromjpeg($filename);
			imagecopyresampled($image_p,   $image,   0,   0,   0,   0,   $new_width,   $new_height,   $width,   $height);
			imagejpeg($image_p,   $thumb_path,   100);
			return   true;
		case   'image/gif':
			$image   =   imagecreatefromgif($filename);
			imagecopyresampled($image_p,   $image,   0,   0,   0,   0,   $new_width,   $new_height,   $width,   $height);
			imagegif($image_p,   $thumb_path,   100);
			return   true;
		case   'image/png':
		case   'image/x-png':
			$image   =   imagecreatefrompng($filename);
			imagecopyresampled($image_p,   $image,   0,   0,   0,   0,   $new_width,   $new_height,   $width,   $height);
			imagepng($image_p,   $thumb_path,   9);
			return   true;
	}
	return   false;
}
function createCutImage($isFillWhite,$original,$thumb_path,$sx,$sy,$new_width,$new_height,$type)
{
	$filename   =   $original;
	list($width,   $height)   =   getimagesize($filename);
	$image_p = imagecreatetruecolor($new_width,$new_height);
	$dx = $dy = 0;
	if ($isFillWhite)
	{
		$bg = imagecolorallocate($image_p,255,255,255);
		imagefill($image_p,0,0,$bg);
		if ($width < $height)
		{
			$dx = ($new_width - $width) / 2;
		}else
		{
			$dy = ($new_height - $height) / 2;
		}
		$new_width = $width;
		$new_height = $height;
	}

	switch   ($type)
	{
		case   'image/pjpeg':
		case   'image/jpeg':
		case   'image/jpg':
			$image   =   imagecreatefromjpeg($filename);
			//imagecopyresampled($image_p,   $image,   0,  0,   0,   0,   $new_width,   $new_height,   $new_width,   $new_height);
			imagecopy($image_p,$image,$dx,$dy,$sx,$sy,$new_width,$new_height);
			imagejpeg($image_p,   $thumb_path,   100);
			return   true;
		case   'image/gif':
			$image   =   imagecreatefromgif($filename);
			imagecopy($image_p,$image,$dx,$dy,$sx,$sy,$new_width,$new_height);
			imagegif($image_p,   $thumb_path,   100);
			return   true;
		case   'image/png':
		case   'image/x-png':
			$image   =   imagecreatefrompng($filename);
			imagecopy($image_p,$image,$dx,$dy,$sx,$sy,$new_width,$new_height);
			imagepng($image_p,   $thumb_path,   9);
			return   true;
	}
	return   false;
}





/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */

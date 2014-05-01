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

function formtxt($arrField,$arrData)
{
	header("Content-Type: text;charset=utf-8");
	header("Content-Disposition: attachment; filename=user.txt");
	//header("Content-Disposition: inline; filename=$id.txt");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Pragma: public");
	$arrOut=array();
	$arrOut[]=implode("\t",$arrField);
	foreach ($arrData as $arrVal)
	{
		$arrOut[]=implode("\t",$arrVal);
	}
	return implode("\r\n",$arrOut);
}



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

function htmlFilter($arrParam=array())
{
	if(empty($arrParam))
	{
		return array();
	}
	foreach($arrParam as $strKey => $val)
	{
		if(is_array($val))
		{
			$arrParam[$strKey]=htmlFilter($val);
		}
		else
		{
			$arrParam[$strKey]=htmlspecialchars($val,ENT_QUOTES, "UTF-8");
		}
	}
	return $arrParam;
}

function estrtolower($value)
{
	return str_replace(
	array('A','B','C','D','E','F','G','H','I','J',
	'K','L','M','N','O','P','Q','R','S','T','U',
	'V','W','X','Y','Z'),
	array('a','b','c','d','e','f','g','h','i','j',
	'k','l','m','n','o','p','q','r','s','t','u',
	'v','w','x','y','z'),
	$value
	);
}

function check_is_chinese($s)
{
	return preg_match('/[\x80-\xff]./', $s);
}


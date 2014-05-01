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
if (!extension_loaded('tag'))
{
	dl('tag.so');
}

function removeTag($arrParam=array())
{
	if(empty($arrParam)|| !isset($arrParam['file_name']))
	{
		return array();
	}
	$res = RemoveMp3Tag($arrParam['file_name']);
	return $res;
}

function addTag($fileName,$arrParam=array())
{
	if(!isset($fileName))
	{
		return '';
	}
	$arrNeed=array('si_title', 'si_author', 'si_album', 'si_versions');
	$arrNewParam=array();
	foreach($arrNeed as $strKey)
	{
		if(empty($arrParam[$strKey]) && $arrParam[$strKey]!=0)
		{
			$arrNewParam[$strKey]=' ';
		}
		else
		{
			$arrNewParam[$strKey]=$arrParam[$strKey];
		}

	}
	$res = AddMp3Tag($fileName,$arrNewParam['si_title'],$arrNewParam['si_author'],$arrNewParam['si_album']
	,$arrNewParam['si_versions']);
	return $res;
}




/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */

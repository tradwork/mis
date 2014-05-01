<?php
/***************************************************************************
 * 
 * Copyright (c) 2010 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file lrycs_helper.php
 * @author liuguojing(com@baidu.com)
 * @date 2010/09/21 17:01:01
 * @brief 
 *  
 **/
function get_lrycs_list($arrParam)
{
	$CI=get_instance();
	$CI->load->library('CommonCurl');
    $arrResData = array('errno'=>0, 'total'=>0, 'list'=>array());
    $strTitle    = $arrParam['title'];
    $strArtist   = $arrParam['artist'];
    $strCryptKey = md5(sprintf('%s-%s-%s', $arrParam['title'], $arrParam['artist'], config_item('CRYPT_KEY')));
    $strUrl = sprintf(config_item('LRYCS_ADDR_LIST'), urlencode($strTitle), urlencode($strArtist), $strCryptKey);
    $ch  =$CI->commoncurl->procGetCurlHandle($strUrl);
    if ($ch === false)
    {
        UB_LOG_WARNING('%s:%s get curl handle fail.', __FILE__, __LINE__);
        return false;
    }
    $strContent =  curl_exec($ch);
    $objRes = simplexml_load_string($strContent, 'SimpleXMLElement', LIBXML_NOCDATA);
    if( $objRes->errorCode != 0){
       return array('errno'=>$objRes->errorCode, 'total'=>0, 'list'=>array());
    }
    $intTotal = ((array)$objRes->total);
    $arrResData['total'] =  $intTotal ;
    if ($intTotal <=0) return   $arrResData;
	foreach ($objRes->result->lrc as $lrc)
	{
		$arrTemp=array();
		foreach ($lrc->attributes() as  $strKey => $val)
		{
			$arrTemp[$strKey]=strval($val);
		}
		$arrResData['list'][]=$arrTemp;
	}
    return  $arrResData;

}
function get_lryrs_content($arrParam)
{
	$CI=get_instance();
	$CI->load->library('CommonCurl');
    $intId = $arrParam['id'];
    $strKey= $arrParam['key'];
    $strCryptKey = md5(sprintf('%s-%s', $arrParam['id'], config_item('CRYPT_KEY')));
    $strUrl = sprintf(config_item('LRYCS_ADDR_DETAIL'), $intId, $strKey , $strCryptKey);
    $ch  = $CI->commoncurl->procGetCurlHandle($strUrl);
    if ($ch === false)
    {
        UB_LOG_WARNING('%s:%s get curl handle fail.', __FILE__, __LINE__);
        return false;
    }
    $strContent = curl_exec($ch);
    $objRes = simplexml_load_string($strContent, 'SimpleXMLElement', LIBXML_NOCDATA);
    $arrResData = array('errno'=>0, 'content'=>'');
    if ($objRes->errorCode != 0)
    {
        $arrResData['errno'] = $objRes->errorCode;
    }else{
        $arrResData['content']= (string)$objRes->WORDS; 
    }
    return  $arrResData;

}



function getOrginAudio($arrParam,$objItem)
{
    foreach($arrParam[$objItem->media->strTable] as $arrMedia)
    {
        if($arrMedia["sf_usage_flag"] == 3)
        {
            return $arrMedia;
        }
    }
    return False;
}

function execCommand($strCommand)
{
    $res = system($strCommand);
    if(0 !== $res)
    {
        log_message("warning","run command `". $strCommand . "\" faild,get(".$res.")");
        return False;
    }
    log_message("debug","run command `". $strCommand . "\",get(".$res.")");
    return True;
}

function getInputBrc($arrParam,$objItem,$intUsage)
{
    foreach($arrParam[$objItem->lrc->strTable] as $arrlrc)
    {
        if($arrlrc["sl_usage_flag"] == $intUsage)
        {
            log_message("debug","get lrc use ".$intUsage." get ".$arrlrc["sl_lrclink"]);
            return $arrlrc["sl_lrclink"];
        }
    }
    return False;
}

function downLoad($strUrl,$strFile)
{
    $strCommand = sprintf("wget '%s' -O '%s'",$strUrl,$strFile);
    return execCommand($strCommand);
}

function getFFMPEG()
{
    return FFMPEG_PATH;
}

function getBMC()
{
    return ROOT_PATH."/mis/helpers/brc2bmc";
}




/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>

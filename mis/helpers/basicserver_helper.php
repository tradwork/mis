<?php
/***************************************************************************
*
* Copyright (c) 2010 Baidu.com, Inc. All Rights Reserved
*
**************************************************************************/


function sendRequestToServer($strUrl,$arrParam)
{
	$CI=get_instance();
	$CI->load->library('CommonCurl');
	$curlHandler = $CI->commoncurl->procPostCurlHandle($strUrl, $arrParam);
	$responseData = trim(curl_exec($curlHandler));
	curl_close($curlHandler);
	//		return FALSE;
	//	if($responseData !== FALSE)
	//	{
	//		$info = curl_getinfo($curlHandler);
	//		if(isset($info['http_code']) && ($info['http_code'] == 200))
	//		{
	//			$arrRes=json_decode($responseData,true);
	//			return $arrRes;
	//		}
	//	}
	//	else
	//	{
	//		curl_close($curlHandler);
	//		return FALSE;
	//	}
}

/**
	 * tag服务
	 *tag、taglyric、tagpic
	 * @param unknown_type $arrSongList
	 * @return unknown
	 */
function sendRequestToTag($arrId=array())
{
	if(empty($arrId))
	{
		return;
	}
	$strData = implode("-",$arrId);
	$arrParam=array('task'=>'tag','data'=>$strData);
	sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

function sendRequestToTransrate($arrId=array())
{
	if(empty($arrId))
	{
		return;
	}
	$arrData=array();
	foreach ($arrId as $intId)
	{
		$arrData[]=$intId.",0";
	}
	$strData = implode("-",$arrData);
	$arrParam=array('task'=>'rate','data'=>$strData);
	sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

function sendRequestToAac($arrId=array())
{
	if(empty($arrId))
	{
		return;
	}
	$arrData=array();
	foreach ($arrId as $intId)
	{
		$arrData[]=$intId;
	}
	$strData = implode("-",$arrData);
	$arrParam=array('task'=>'aacrate','data'=>$strData);
	sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

function sendRequestToCopyright($songId)
{
  if(!is_numeric($songId)) return True;
  $arrParam=array("task"=>"copyright","data"=>$songId);
  sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

function sendRequestToPrimarySong($songId,$Type)
{
  if(!is_numeric($songId)) return True;
  if($Type == "1"){
    $Type = "offline";
  }else{
    $Type = "online";
  }
  $arrParam = array("task"=>"primarysong","data"=>json_encode(array("type" => $Type,"params"=>array("songid"=>$songId))));
  log_message("debug","send to primary song".print_r($arrParam,true));
  sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

function sendRequestToTitleCluster($songId)
{
  if(!is_numeric($songId)) return True;
  $arrParam = array("task"=>"titlecluster","data"=>$songId.",1");
  log_message("debug","send to title cluster song".print_r($arrParam,true));
  sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

function sendRequestToDis($songId)
{
  if(!is_numeric($songId)) return True;
  $arrParam=array("task"=>"dis","data"=>$songId);
  sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

function sendRequestToPicture($itemId)
{
  if(!is_numeric($itemId)) return True;
  $arrParam=array("task"=>"picture_compress","data"=>$itemId);
  sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

function sendRequestToPic($arrId)
{
	return;
	if(empty($arrId))
	{
		return;
	}
	if(is_array($arrId))
	{
		$strData = implode("-",$arrId);
	}
	else
	{
		$strData=$arrId;
	}
	$arrParam=array('task'=>'picture_compress','data'=>$strData);
	sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

function sendRequestToFpid($arrId)
{
	if(empty($arrId))
	{
		return;
	}
	if(is_array($arrId))
	{
		$strData = implode("-",$arrId);
	}
	else
	{
		$strData=$arrId;
	}
	$arrParam=array('task'=>'afp','data'=>$strData);
	sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

function sendRequestToDss($arrSongId,$arrFileId)
{
	if(empty($arrSongId) || empty($arrFileId))
	{
		return;
	}
	$arrData=array();
	foreach ($arrSongId as $intSongId)
	{
		if(empty($arrFileId[$intSongId]))
		{
			continue;
		}
		$arrData[]=$intSongId.',2,'.implode(",",$arrFileId[$intSongId]);
	}
	$arrParam=array('task'=>'dss','data'=>implode("-",$arrData));
	log_message('info',"the request is".implode("$$",$arrParam));
	sendRequestToServer(QUKU_BASICSERVER_URL,$arrParam);
}

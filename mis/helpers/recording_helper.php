<?php
/***************************************************************************
*
* Copyright (c) 2012 Baidu.com, Inc. All Rights Reserved
*
**************************************************************************/


/**
 * @file helpers/recording_helper.php
 * @author yujiao(com@baidu.com)
 * @date 2013/03/13 16:29:48
 * @brief
 *
 **/

function convertRecording($recording,$revert = True,$config = array("product"=>2,"types"=>2)){

  if($revert){
    $r = "";
    /* 把二进制数组转换成十进制数据进行保存 */
    foreach($recording as $i => $v){
      if(!$r){
	$r = strval($v);
	continue;
      }
      $r = $r & strval($v);
    }
    $result = "";
    for($i=0;$i<strlen($r);$i+=$config["types"]){
      $t = substr($r,$i,$config["types"]);
      $result .= bindec($t);
    }
    $r = $result;
  }else{
    $r = array();
    /* 把十进制数据转换成二进制数据进行展示 */
    if(strlen($recording) < $config["product"]){
      $recording = sprintf("%0".$config["product"]."s",$recording);
    }
    for($i=0;$i<strlen($recording);$i++){
      $e = decbin($recording[$i]);
      $e = sprintf("%0".$config["types"]."s",$e);
      $r[] = $e;
    }
    $r = implode("",$r);

  }
  return $r;
}

function getCopyrights($r,$config=array("1110"=>"WEB端播放权","1101"=>"WEB端下载权","1011"=>"无线端播放权","0111"=>"无线端下载权",)){
  $result = $config;
  for($i=0;$i<strlen($r);$i++){
    if($r[$i] == 1){
      foreach($config as $k=>$v){
	$k = strval($k);
	if($k[$i] != $r[$i]){
	  unset($result[$k]);
	}
      }
    }
  }
  return $result;
}

/* $d = convertRecording(array("1110","1101","1011","0111")); */
/* echo $d,"\n"; */
/* $e = convertRecording("20",FALSE); */
/* echo $e,"\n"; */
/* $f = getCopyrights($e); */
/* print_r($f); */
/* $a = array("1000","1100","1010"); */
/* $b = array_reduce($a,"arr2bin"); */
/* print_r($b); */
/* echo "\n"; */
/* $a = "1000"; */
/* $b = "1100"; */
/* echo $a & $b; */

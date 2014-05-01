<?php
/**
 * BCS API sample
 */
require_once '../bcs.class.php';

$bucket=BCS_BUCKET;

/**
 * 创建bcs的bucket，作为远程的一级目录，用来存储文件
 *
 * @param object $baidu_bcs
 * @param string $strBucketAcl
 * @param string $strBucket
 * @return true or false
 */
function create_bucket ( $baidu_bcs, $strBucketAcl=BCS_BUCKET_ACL,$strBucket=BCS_BUCKET)
{
	$response = $baidu_bcs->create_bucket( $strBucket, $strBucketAcl);
	if($response->status!=200)
	{
		return false;
	}
	return true;
}
/**
 * Enter 上传本地文件至bcs
 *
 * @param object $baidu_bcs:bcs对象
 * @param string $strLocalFile:需要上传的本地文件名（带路径）
 * @param string $strRemoteFile：远程文件名（自定义,文件名前面必须带一个'/'符号）
 * @param string $strAliasName:别名，用来设置http head信息中的Content-Disposition属性,下载文件的时候显示别名
 * @param string $strBucket：bcs的bucket，不需要改动
 * @return true or false
 */
function create_object($baidu_bcs,$strLocalFile,$strRemoteFile,$strAliasName='',$strBucket=BCS_BUCKET) 
{
	$arrOpt = array (BaiduBCS::IMPORT_BCS_LOG_METHOD => "bs_log" );
	if(!empty($strAliasName))
	{
		$arrOpt['filename']=$strAliasName;
	}
	$response = $baidu_bcs->create_object ( $strBucket, $strRemoteFile, $strLocalFile, $arrOpt);
	if($response->status!=200)
	{
		return false;
	}
	return true;
}

/**
 * 建立远程文件的软链接
 *
 * @param object $baidu_bcs:bcs对象
 * @param string $strSourceObject:原始远程文件存储地址（从bucket的下一级目录开始，带'/'）
 * @param string $strDestObject:目的远程文件存储地址（从bucket的下一级目录开始，带'/'）
 * @param string $strBucket：bcs的bucket，不需要改动
 * @return true or false
 */
function copy_object($baidu_bcs,$strSourceObject,$strDestObject,$strBucket=BCS_BUCKET) 
{
	$strSource = array ('bucket' => $strBucket, 'object' => $strSourceObject);
	$strDest = array ('bucket' =>  $strBucket, 'object' => $strDestObject );
	$response = $baidu_bcs->copy_object ( $strSource, $strDest );
	if($response->status!=200)
	{
		return false;
	}
	return true;
}

/**
 * 判断远程文件是否存在
 *
 * @param object $baidu_bcs:bcs对象
 * @param string $strRemoteFile：远程文件名（自定义,文件名前面必须带一个'/'符号)
 * @param string $strBucket：bcs的bucket，不需要改动
 * @return true or false
 */
function is_object_exist($baidu_bcs,$strRemoteFile,$strBucket=BCS_BUCKET) 
{
	global $bucket, $strRemoteFile;
	$bolRes = $baidu_bcs->is_object_exist ( $strBucket, $strRemoteFile);
	return $bolRes;
}
/**
 * 获取bcs文件http head信息
 *
 * @param object $baidu_bcs
 * @param $strRemoteFile：远程文件名（自定义,文件名前面必须带一个'/'符号)
 * @param string $strBucket：bcs的bucket，不需要改动
 * @return array head信息
 */
function get_object_info($baidu_bcs,$strRemoteFile,$strBucket=BCS_BUCKET) 
{
	$response = $baidu_bcs->get_object_info ( $strBucket, $strRemoteFile);
	return $response->header;
}


//创建bcs对象
$baidu_bcs = new BaiduBCS (BCS_AK, BCS_SK, BCS_HOST);
//get_object_info ( $baidu_bcs );
$upload_dir = "../";
$object = '/b.txt';
$fileUpload = '/a.txt';
$fileWriteTo = './b.' . time () . '.txt';
$strLocalFile=$fileUpload;
$strRemoteFile= '/b.txt';
$strAliasName='test.txt';
$strSourceObject=$strRemoteFile;
$strDestObject=$strRemoteFile.'copy';
copy_object($baidu_bcs,$strSourceObject,$strDestObject);
//get_object_info($baidu_bcs,$strRemoteFile,$strBucket=BCS_BUCKET);
//var_dump(is_object_exist($baidu_bcs,$strRemoteFile,$strBucket=BCS_BUCKET));
//$res=create_object($baidu_bcs,$strLocalFile,$strRemoteFile,$strAliasName,$strBucket=BCS_BUCKET);
//if($res)
//{
//	var_dump("OK");
//}
//else
//{
//	var_dump("not OK");
//}
/**
 * ************************single test******************************************* *
 * */
//create_bucket ( $baidu_bcs );
//list_bucket ( $baidu_bcs );
//list_object ( $baidu_bcs );
//set_bucket_acl_by_acl_type ( $baidu_bcs );
//set_bucket_acl_by_json_array ( $baidu_bcs );
//set_bucket_acl_by_json_string ( $baidu_bcs );
//get_bucket_acl ( $baidu_bcs );
//delete_bucket ( $baidu_bcs );

//set_object_acl_by_acl_type($baidu_bcs);
//create_object ( $baidu_bcs );
//create_object_superfile ( $baidu_bcs );
//upload_directory ( $baidu_bcs );
//copy_object ( $baidu_bcs );
//set_object_meta ( $baidu_bcs );
//set_object_acl_by_acl_type ( $baidu_bcs );
//get_object_acl ( $baidu_bcs );
//get_object ( $baidu_bcs );
//is_object_exist ( $baidu_bcs );
//get_object_info ( $baidu_bcs );
//get_object_acl ( $baidu_bcs );
//set_object_acl_by_acl_type ( $baidu_bcs );
//set_object_acl_by_json_array ( $baidu_bcs );
//set_object_acl_by_json_string($baidu_bcs);
//delete_object ( $baidu_bcs );
//generate_get_object_url ( $baidu_bcs );
//generate_put_object_url ( $baidu_bcs );
//generate_post_object_url ( $baidu_bcs );

?>
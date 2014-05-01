<?php
/**
 * BCS API 
 */
require_once(dirname(__FILE__).'/bcs/bcs.class.php');
class Bcssdk
{
	private $baidu_bcs;
	static $inst;
	public function __construct()
	{
		$this->baidu_bcs=new BaiduBCS (BCS_AK, BCS_SK, BCS_HOST);
	}
	public function getInstance() 
	{
		if(!self::$inst) {
			$inst = new Bcssdk();
		}
		return $inst;
	}
	/**
 * 创建bcs的bucket，作为远程的一级目录，用来存储文件
 *
 * @param string $strBucketAcl
 * @param string $strBucket
 * @return true or false
 */
	function create_bucket ( $strBucketAcl=BCS_BUCKET_ACL,$strBucket=BCS_BUCKET)
	{
		$response = $this->baidu_bcs->create_bucket( $strBucket, $strBucketAcl);
		if($response->status!=200)
		{
			return false;
		}
		return true;
	}
	/**
 * Enter 上传本地文件至bcs
 *
 * @param string $strLocalFile:需要上传的本地文件名（带路径）
 * @param string $strRemoteFile：远程文件名（自定义,文件名前面必须带一个'/'符号）
 * @param string $strAliasName:别名，用来设置http head信息中的Content-Disposition属性,下载文件的时候显示别名
 * @param string $strBucket：bcs的bucket，不需要改动
 * @return true or false
 */
	function create_object($strLocalFile,$strRemoteFile,$strAliasName='',$strBucket=BCS_BUCKET)
	{
		if(!empty($strAliasName))
		{
			$arrOpt['filename']=$strAliasName;
		}
		$response = $this->baidu_bcs->create_object ( $strBucket, $strRemoteFile, $strLocalFile, $arrOpt);
		if($response->status!=200)
		{
			return false;
		}
		return true;
	}

	/**
 * 建立远程文件的软链接
 *
 * @param string $strSourceObject:原始远程文件存储地址（从bucket的下一级目录开始，带'/'）
 * @param string $strDestObject:目的远程文件存储地址（从bucket的下一级目录开始，带'/'）
 * @param string $strBucket：bcs的bucket，不需要改动
 * @return true or false
 */
	function copy_object($strSourceObject,$strDestObject,$strBucket=BCS_BUCKET)
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
 * @param string $strRemoteFile：远程文件名（自定义,文件名前面必须带一个'/'符号)
 * @param string $strBucket：bcs的bucket，不需要改动
 * @return true or false
 */
	function is_object_exist($strRemoteFile,$strBucket=BCS_BUCKET)
	{
		global $bucket, $strRemoteFile;
		$bolRes = $baidu_bcs->is_object_exist ( $strBucket, $strRemoteFile);
		return $bolRes;
	}
	/**
 * 获取bcs文件http head信息
 *
 * @param $strRemoteFile：远程文件名（自定义,文件名前面必须带一个'/'符号)
 * @param string $strBucket：bcs的bucket，不需要改动
 * @return array head信息
 */
	function get_object_info($strRemoteFile,$strBucket=BCS_BUCKET)
	{
		$response = $baidu_bcs->get_object_info ( $strBucket, $strRemoteFile);
		return $response->header;
	}
	
	function UploadFile($fileInfo)
	{
		$strLocalFile=$fileInfo['tmp_name'];
		$arrTemp=explode("/",$fileInfo['name']);
		$strType=$arrTemp[0];
		$intId=$arrTemp[1];
//		$strFileName=$arrTemp[2];
		$strFileName = substr($fileInfo['name'], strlen($strType) + strlen($intId) + 2);
		$strExt=end(explode(".",$strFileName));
		$strRemoteFile="/data2/$strType/$intId/$intId.$strExt";
		$res=$this->create_object($strLocalFile,$strRemoteFile,$strFileName);
		if($res)
		{
			if(TEST_MODE==false)
			{
				return BCS_LINK.$strRemoteFile;
			}
			else
			{
				return "http://".BCS_HOST."/".BCS_BUCKET.$strRemoteFile;
//				var_dump(config_item('BCS_LINK').$strRemoteFile);	
			}
		}
		return $res;
	}
}

?>
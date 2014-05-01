<?php
/***************************************************************************
*
* Copyright (c) 2010 Baidu.com, Inc. All Rights Reserved
*
**************************************************************************/



/**
 * @file pic.php
 * @author caoyupeng(caoyupeng@baidu.com)
 * @date 2010/09/13 13:55:05
 * @brief  图片上传相关操作
 *  
 **/
class Media extends MY_Controller
{

	function getBaseInfo(&$arrMediaInfo,$strTempFile)
	{
		$arrMediaInfo['sf_file_extension']=strtolower(end(explode('.',$_FILES['userfile']['name'])));
		$arrMediaInfo['sf_md5']=md5_file($strTempFile);
		$arrMediaInfo['sf_file_format']=$_FILES['userfile']['type'];
		$arrMediaInfo['sf_file_size']=$_FILES['userfile']['size'];
		$arrMediaInfo['sf_jointime']=time();
		$arrMediaInfo['sf_check_status']=-1;
		$arrMediaInfo['sf_usage_flag']=0;
	}

	function getTagInfoByPhplib(&$arrMediaInfo,$strTempFile)
	{
		$this->load->library('Getid3');
		$arrResult=$this->getid3->analyze($strTempFile);
		$arrMediaInfo['sf_file_bitrate']=round($arrResult['audio']['bitrate']/1000);
		$arrMediaInfo['sf_file_duration']=$arrResult['playtime_seconds'];
	}


	function getTagInfo(&$arrMediaInfo,$strTempFile)
	{
		$strCommand='export LD_LIBRARY_PATH=/home/work/local/id3lib/lib:/home/work/local/taglib/lib:/home/work/local/lame/lib:/home/work/local/ffmpeg/lib:/home/work/local/lib:/home/work/local/flac/lib:/home/work/local/yasm/lib && '.ROOT_PATH.'mis/controllers/ffmediascan '.$strTempFile;
		$strOutput=shell_exec($strCommand);
		$arrOutput=explode("\t",$strOutput);
		$arrMediaInfo['sf_file_bitrate']=trim($arrOutput[4]);
		$arrMediaInfo['sf_file_duration']=trim($arrOutput[2]);
	}


	public function upload()
	{
		if (empty($_FILES))
		{
			$this->$arrTplData['error_code']=1;
		}
		$bolRes = $this->validateFile(QUKU_TYPE_MEDIA);
		if(!$bolRes)
		{
			return ;
		}

		$arrMediaInfo=array();
		$intGlobalId=$this->getGlobalId(QUKU_TYPE_MEDIA);
		if($intGlobalId>0)
		{
			$arrMediaInfo['sf_globalid']=$intGlobalId;
			$this->getBaseInfo($arrMediaInfo,$_FILES['userfile']['tmp_name']);
			$strNewFile=config_item('data_path').$arrMediaInfo['sf_globalid'].'.'.$arrMediaInfo['sf_file_extension'];
			move_uploaded_file($_FILES['userfile']['tmp_name'],$strNewFile);
			$strLink=$this->storageFile('music',$intGlobalId,$intGlobalId.'.'.$arrMediaInfo['sf_file_extension'],$strNewFile);
			$arrMediaInfo['sf_file_link']=$strLink;
            $arrMediaInfo["sf_usage_flag"] = $this->input->get("usage_flag") ? $this->input->get("usage_flag") : 0;
			$this->getTagInfo($arrMediaInfo,$strNewFile);
			if(empty($arrMediaInfo['sf_file_bitrate']) || empty($arrMediaInfo['sf_file_duration']))
			{
				$this->getTagInfoByPhplib($arrMediaInfo,$strNewFile);
			}
			$arrMediaInfo['json']=json_encode($arrMediaInfo);
			$this->arrTplData['data'][]=$arrMediaInfo;
			unlink($strNewFile);
		}

	}
}

?>

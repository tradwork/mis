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
class Lrc extends MY_Controller
{


	function getBaseInfo(&$arrLrcInfo,$strTempFile)
	{
		$arrLrcInfo['sl_lyrics']=file_get_contents($strTempFile);
		$arrLrcInfo['sl_jointime']=time();
	}

	function convertEncode($strTempFile)
	{
		$strLrc = trim(file_get_contents($strTempFile));
		if(!mb_check_encoding($strLrc,'UTF-8'))
		{
			$strLrc=iconv('GBK','UTF-8//IGNORE',$strLrc);
			file_put_contents($strTempFile,$strLrc);
		}
	}



	public function upload()
	{
		if (empty($_FILES['userfile']))
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="缺少文件";
			return;
		}
		$bolRes = $this->validateFile(QUKU_TYPE_LRC);
		if(!$bolRes)
		{
			return ;
		}
		$this->saveContent(file_get_contents($_FILES['userfile']['tmp_name']));
	}

	public  function getLrcList()
	{
		$arrNeed=array('title','artist');
		$arrParam=array();
		$arrRes=array();
		foreach ($arrNeed as $strKey)
		{
			if($this->input->get($strKey)===false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]="缺少文件";
				return;
			}
			$arrParam[$strKey]=$this->input->get($strKey);
			$arrRes['errno']=0;
		}
		$this->load->helper('lrycs');
		$arrTemp=get_lrycs_list($arrParam);
		$arrRes=array();
		if(empty($arrTemp['list']))
		{
			$arrParam['artist']='';
			$arrTemp=get_lrycs_list($arrParam);
		}
		$intNum=0;
		foreach ($arrTemp['list'] as $arrVal)
		{
			$arrRes[]=$arrVal;
			$intNum++;
			if($intNum==config_item('MAX_LRC_NUM'))
			{
				break;
			}
		}
		$this->arrTplData['data']=$arrRes;
	}
	
	function saveContent($strContent)
	{
		if(empty($strContent))
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="缺少内容";
			return;
		}
		if(isset($_FILES['userfile']['name']))
		{
			$strExt=end(explode('.',$_FILES['userfile']['name']));
		}
		else
		{
			$strExt='lrc';
		}
		$strTempName=config_item('data_path').substr(microtime(true) * 10000, -5).'.lrc';
		file_put_contents($strTempName,$strContent);
		$this->convertEncode($strTempName);
		$arrLrcInfo=array();
		$intGlobalId=$this->getGlobalId(QUKU_TYPE_LRC);
		if($intGlobalId>0)
		{
			$arrLrcInfo['sl_globalid']=$intGlobalId;
			$this->getBaseInfo($arrLrcInfo,$strTempName);
			$strLink=$this->storageFile('lrc',$intGlobalId,"$intGlobalId.$strExt",$strTempName);
			$arrLrcInfo['sl_lrclink']=$strLink;
			$arrLrcInfo['json']=json_encode($arrLrcInfo);
			$this->arrTplData['data'][]=$arrLrcInfo;
		}
		unlink($strTempName);
	}


	public function saveWritingContent()
	{
		$this->saveContent($this->input->post('content'));
	}

	public function saveChosenLrc()
	{
		$arrNeed=array('id','key','title','artist');
		$arrParam=array();
		$arrRes=array();
		foreach ($arrNeed as $strKey)
		{
			if($this->input->get($strKey)==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message']='缺少参数'.$strKey;
				return;
			}
			$arrParam[$strKey]=$this->input->get($strKey);
		}
		$this->load->helper('lrycs');
		$arrTemp=get_lryrs_content($arrParam);
		$this->saveContent($arrTemp['content']);
	}


	function getLrcContent()
	{
		if($this->input->get('sl_lrclink')==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="缺少内容";
			return;
		}
		$strLrcLink=str_replace(BCS_LINK,BCS_INTERNAL,$this->input->get('sl_lrclink'));
		$this->arrTplData['data']=file_get_contents($strLrcLink);
	}

	function selector()
	{

	}
}

?>

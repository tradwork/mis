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
class Pic extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('pic');
	}

	function getBaseInfo(&$arrPicInfo,$strTempFile)
	{
		$arrPicInfo['pi_pic_ext']=strtolower(end(explode('.',$_FILES['userfile']['name'])));
		$arrTemp=getimagesize($strTempFile);
		$arrPicInfo['pi_pic_width']=$arrTemp[0];
		$arrPicInfo['pi_pic_height']=$arrTemp[1];
		$arrPicInfo['pi_md5']=md5_file($strTempFile);
		$arrPicInfo['pi_jointime']=time();
		$arrPicInfo['pi_type']=$this->input->get('type');
	}

	function scaleImage($original,$thumb_path,$new_width=50,$new_height=50,$ext)
	{
		$image = new Imagick();
		$image->readImage($original);
		$image->scaleImage($new_width, $new_height);
		$image->setFormat($ext);
		file_put_contents($thumb_path, (string) $image);
		return true;
	}
	
	
	function compress($arrPicInfo)
	{
		$intDataType=$this->input->get('type');
		if($arrPicInfo['pi_pic_width']==$arrPicInfo['pi_pic_height'])
		{
			$strExt=$arrPicInfo['pi_pic_ext'];
			$arrCompressSizeConf=config_item('pic_compress_size');
			foreach ($arrCompressSizeConf[$intDataType] as $intSize)
			{
				if($intSize<$arrPicInfo['pi_pic_width'])
				{
					$arrCompressPicInfo=array();
					$intGlobalId=$this->getGlobalId(QUKU_TYPE_PIC);
					$arrCompressPicInfo['pi_globalid']=$intGlobalId;
					$strThumbPicPath=config_item('data_path').$intGlobalId.'.'.$strExt;
					$bolRes=$this->scaleImage($_FILES['userfile']['tmp_name'],$strThumbPicPath,$intSize,$intSize,$strExt);
//					$bolRes=createThumbImage($_FILES['userfile']['tmp_name'],$strThumbPicPath,$intSize,$intSize,$_FILES['userfile']['type']);
					if($bolRes)
					{
						$this->getBaseInfo($arrCompressPicInfo,$strThumbPicPath);
						$strUrl=$this->storageFile('pic',$intGlobalId,$intGlobalId.'.'.$strExt,$strThumbPicPath);
						if($strUrl==false)
						{
							return;
						}
						$arrCompressPicInfo['pi_link']=$strUrl;
						$arrCompressPicInfo['json']=json_encode($arrCompressPicInfo);
						$this->arrTplData['data'][]=$arrCompressPicInfo;
						unlink($strThumbPicPath);
					}
				}
			}
		}
	}

	function stripImage($strFile)
	{
		$objImage = new Imagick($strFile);
		$objImage->stripImage();
		// 设置压缩比率
		$objImage->setImageCompressionQuality(PIC_QUALITY);
		$objImage->writeImage($strFile);
		$objImage->destroy();
	}

	public function upload()
	{
		if (empty($_FILES))
		{
			$this->arrTplData['error_code']=1;
		}
		$bolRes = $this->validateFile(QUKU_TYPE_PIC);
		if($bolRes)
		{
			$arrPicInfo=array();
			$intGlobalId=$this->getGlobalId(QUKU_TYPE_PIC);
			if($intGlobalId>0)
			{
				$this->stripImage($_FILES['userfile']['tmp_name']);
				$arrPicInfo['pi_globalid']=$intGlobalId;
				$this->getBaseInfo($arrPicInfo,$_FILES['userfile']['tmp_name']);
				$arrPicInfo['pi_link']=$this->storageFile('pic',$intGlobalId,$intGlobalId.'.'.$arrPicInfo['pi_pic_ext'],$_FILES['userfile']['tmp_name']);
				$arrPicInfo['json']=json_encode($arrPicInfo);
				$this->arrTplData['data'][]=$arrPicInfo;
			}
			//压缩图片
			if($arrPicInfo['pi_link'])
			{
				$arrCompressPic=$this->compress($arrPicInfo);
			}
		}

	}


	public function cutImage()
	{
		$arrParam=array();
		$arrParam['pi_type']=$this->input->get('type');
		$intWidth=abs($this->input->get('x2')-$this->input->get('x1'));
		$intHeigh=abs($this->input->get('y2')-$this->input->get('y1'));
		$intWidth=min($intWidth,$intHeigh);
		$strLink=str_replace(BCS_LINK,BCS_INTERNAL,$this->input->get('pi_link'));
		$strPicContent=file_get_contents($strLink);
		$strExt=strtolower(end(explode(".",$strLink)));
		$_FILES['userfile']['tmp_name']=config_item('data_path').substr(microtime(true) * 10000, -5).'.'.$strExt;
		$_FILES['userfile']['name']=substr(microtime(true) * 10000, -5).'.'.$strExt;
		$_FILES['userfile']['type']='image/'.$strExt;
		$strOrgFile=config_item('data_path').end(explode("/",$strLink));
		file_put_contents($strOrgFile,$strPicContent);
		createCutImage(false,$strOrgFile,$_FILES['userfile']['tmp_name'],$this->input->get('x1'),$this->input->get('y1'),$intWidth,$intWidth,$_FILES['userfile']['type']);
		$arrPicInfo=array();
		$intGlobalId=$this->getGlobalId(QUKU_TYPE_PIC);
		if($intGlobalId>0)
		{
			$arrPicInfo['pi_globalid']=$intGlobalId;
			$this->getBaseInfo($arrPicInfo,$_FILES['userfile']['tmp_name']);
			$arrPicInfo['pi_link']=$this->storageFile('pic',$intGlobalId,$intGlobalId.'.'.$arrPicInfo['pi_pic_ext'],$_FILES['userfile']['tmp_name']);
			$arrPicInfo['json']=json_encode($arrPicInfo);
			$this->arrTplData['data'][]=$arrPicInfo;
		}
		//压缩图片
		if($arrPicInfo['pi_link'])
		{
			$arrCompressPic=$this->compress($arrPicInfo);
		}
	}
}

?>

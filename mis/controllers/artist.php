<?php
/***************************************************************************
*
* Copyright (c) 2010 Baidu.com, Inc. All Rights Reserved
*
**************************************************************************/



/**
 * @file artist.php
 * @author liuguojing(liuguojing@baidu.com)
 * @date 2010/08/25 14:56:05
 * @brief  歌手相关操作
 *
 **/
require_once ROOT_PATH.'mis/controllers/coreController.php';
class Artist extends coreController
{
	var $strBaseTableName='quku_artists_base';
	var $strBaseType=QUKU_TYPE_ARTIST;
	//	var $arrFormStructure=array('quku_artists_base','quku_pic_info','quku_relatively_links');
	var $strPrimaryKey='ab_globalid';
	var $strBaseModelName='Artist_model';
	var $arrUniqueField=array('ab_unique_name');


	function  __construct()
	{
		parent::__construct();
		$this->load->helper('basicserver');
	}
	
	function validateTimeField()
	{
		if(!empty($this->arrFormData[$this->strBaseTableName]['ab_birthday']))
		{
			if($this->validateTime($this->arrFormData[$this->strBaseTableName]['ab_birthday'])==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]="明星生日格式错误";
			}
		}
	}

	function validateFormData()
	{
		parent::validateFormData();
		$this->validateTimeField();
		$this->validatePicUnique();
		$this->validateTagrel();
	}

	function getCacheInfo()
	{
		$arrParam=parent::getCacheInfo();
		$arrParam['or_title']=$this->arrFormData[$this->strBaseTableName]['ab_name'];
		return $arrParam;
	}
	
	
	function addFormData($intStatus)
	{
		$intId=parent::addFormData($intStatus);
		if($this->arrTplData['error_code']==0)
		{
			sendRequestToPic($intId);
		}
	}
	
	function updateFormData($intStatus)
	{
		parent::updateFormData($intStatus);
		if($this->arrTplData['error_code']==0)
		{
			sendRequestToPic($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]);
		}
	}	
	
	/**
	 * 添加数据表单
	 *
	 */
	function create()
	{
		parent::create();
	}


	/**
	 * 新增数据
	 *
	 */
	function doCreate()
	{
		parent::doCreate();
	}

	/**
	 * 新增数据并发布
	 *
	 */
	function doCreateAndPub()
	{
		parent::doCreateAndPub();
	}

	/**
	 * 更新数据
	 *
	 */
	function doEdit()
	{
		parent::doEdit();
	}

	/**
	 * 新增数据并发布
	 *
	 */
	function doEditAndPub()
	{
		parent::doEditAndPub();
	}


	/**
	 * 展现数据
	 *
	 */
	function edit()
	{
		parent::edit();
	}

	/**
	 * 发布数据
	 *
	 */
	function pub()
	{
		parent::pub();
	}
	
	function batchPub()
	{
		parent::batchPub();
	}

	/**
	 * 下线数据
	 */
	function disPub()
	{
		parent::disPub();
	}

	/**
	 * 删除数据
	 *
	 */
	function delete()
	{
		parent::delete();
	}
	
	
	function batchDelete()
	{
		parent::batchDelete();
	}
	
	
	/**
	 * 恢复数据
	 *
	 */
	function disDelete()
	{
		parent::disDelete();
	}

	/**
	 * 搜索数据
	 *
	 */
	function search()
	{
		parent::search();
	}

	function addArtist($arrParam)
	{
		if(empty($arrParam['ab_name']))
		{
			return 0;
		}
//		$arrParam['ab_name']=$arrParam['ab_unique_name'];
		$arrParam['ab_unique_name']=$arrParam['ab_name'];
		$strUser=$_SESSION['QUKU_USER']['ub_username'];
		$arrParam['ab_source']=1;
		$arrParam['ab_joinuser']=$strUser;
		$arrParam['ab_jointime']=time();
		$arrParam['ab_edituser']=$strUser;
		$intGlobalId=$this->coreModel->addArtist($arrParam);
		if($intGlobalId==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='添加明星失败';
			return false;
		}
		return $intGlobalId;
	}

	function getIdByName()
	{
		$strName=$this->input->get('quku_artist_works_ref');
		$strName=str_replace("，",",",$strName);
		$arrName=explode(',',$strName);
		$arrSingle=array();
		$arrRepeat=array();
		foreach ($arrName as $intKey=>$strVal)
		{
			$arrParam=array('ab_name'=>$strVal);
			$arrRow=$this->coreModel->normalSearch($arrParam);
			if(empty($arrRow))
			{
				$intGlobalId=$this->addArtist($arrParam);
				if($intGlobalId==0)
				{
					continue;
				}
				$arrTemp=array();
				$arrTemp['name']=$strVal;
				$arrTemp['id']=$intGlobalId;
				$arrTemp['idx']=$intKey;
				$arrTemp['json']=json_encode($arrTemp);
				$arrSingle[]=$arrTemp;
			}elseif (count($arrRow)==1)
			{
				$arrTemp=array();
				$arrTemp['name']=$arrRow[0]['ab_name'];
				$arrTemp['id']=$arrRow[0]['ab_globalid'];
				$arrTemp['idx']=$intKey;
				$arrTemp['json']=json_encode($arrTemp);
				$arrSingle[]=$arrTemp;
			}else
			{
				foreach ($arrRow as $arrData)
				{
					$arrTemp=array();
					$arrTemp['name']=$arrData['ab_name'];
					$arrTemp['id']=$arrData['ab_globalid'];
					$arrTemp['idx']=$intKey;
					$arrTemp['uniquename']=$arrData['ab_unique_name'];
					$arrTemp['json']=json_encode($arrTemp);
					$arrRepeat[]=$arrTemp;
				}
			}
		}
		$arrRes['quku_artist_works_ref']['single']=$arrSingle;
		$arrRes['quku_artist_works_ref']['repeat']=$arrRepeat;
		$this->arrTplData['data']=$arrRes;
	}
	
	public function selector()
	{
		
	}
	
	
	function saveInCache()
	{
		parent::saveInCache();
	}
	
	
	function showCacheInfo()
	{
		parent::showCacheInfo();
	}
	
	function checkDataChange($arrDbData)
	{
		$intChangeflag=parent::checkDataChange($arrDbData);
		$intChangeflag+=$this->checkPicChange($arrDbData);
		return $intChangeflag;
	}
	
	function getAuditData($arrData,$arrField)
	{
		parent::getAuditData($arrData,$arrField);
		$this->getAuditPic($arrData,$arrField);
	}
	
	function updateOnlineData($arrField)
	{
		parent::updateOnlineData($arrField);
		if($this->arrTplData['error_code']==0)
		{
			sendRequestToPic($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]);
		}
	}
	
	function synchronize()
	{
		parent::synchronize();
	}
}


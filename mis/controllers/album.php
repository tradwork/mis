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
class Album extends coreController
{
	var $strBaseTableName='quku_albums_info';
	var $strBaseType=QUKU_TYPE_ALBUM;
	var $strPrimaryKey='ai_globalid';
	var $strBaseModelName='Album_model';
	var $arrUniqueField=array('ai_source','ai_productid');
	static $strSongListField='quku_songs_list';


	function  __construct()
	{
		parent::__construct();
		$this->load->helper('basicserver');
	}



	function validateTimeField()
	{
		if(!empty($this->arrFormData[$this->strBaseTableName]['ai_publishtime']))
		{
			if($this->validateTime($this->arrFormData[$this->strBaseTableName]['ai_publishtime'])==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]="发行时间格式错误";
			}
		}
	}

	function validateProductId()
	{
		if($this->arrFormData[$this->strBaseTableName]['ai_productid_flag']==1
		&& empty($this->arrFormData[$this->strBaseTableName]['ai_productid']))
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="产品号不能为空";
		}
	}

	function getUniqueData()
	{
		if($this->arrFormData[$this->strBaseTableName]['ai_productid_flag']==1)
		{
			return ;
		}
		$arrParam=array('ai_album');
		$this->arrFormData[$this->strBaseTableName]['ai_productid']=$this->convertUniqueData($arrParam);
	}



	function getFormData($intStatus,$bolUpdate=false)
	{
		parent::getFormData($intStatus,$bolUpdate);
		$this->getUniqueData();
	}

	function validateFormData()
	{
		$this->validateProductId();
		parent::validateFormData();
		$this->validateTimeField();
		$this->validatePicUnique();
		$this->validateTagrel();
		$this->validateSongDis();
		$this->validatePubStatus();
	}

	function validatePubStatus()
	{
	    if($this->arrFormData[$this->strBaseTableName]['ai_source'] == 1000 && $this->arrFormData[$this->strBaseTableName]['ai_status'] == 0 && $this->arrFormData[$this->strBaseTableName]['ai_audit_status'] != 0)
	    {
		$this->arrTplData['error_code']=1;
		$this->arrTplData['error_message'][] = "未审核数据不能发布";
	    }
	}

	function validateSongDis()
	{
	    $arrSongList = $this->arrFormData[$this->getSongItemStr];
	    if(empty($arrSongList)) return True;
	    foreach($arrSongList as $arrSong)
	    {
		if(!isset($arrSong["si_distribution"]))
		{
		    $this->arrTplData['error_code']= 1;
		    $this->arrTplData['error_message'][]="多端分发字段不能为空";
		    return False;
		}
		$arrDis = json_decode($arrSong["si_distribution"],true);
		if(!is_array($arrDis))
		{
		    $this->arrTplData['error_code']= 1;
		    $this->arrTplData['error_message'][]="多端分发字段非法";
		    return False;
		}
		$dis = array();
		foreach($arrDis as $duan)
		{
		    if(is_array($duan))
		    {
			$duan_dis = array();
			foreach($duan as $k => $v){
			    if(!is_numeric($k)) continue;
			    $duan_dis[] = strlen($v) ? $v : "1";
			}
			if(count($duan_dis) != 10){	
			    $this->arrTplData['error_code']=1;
			    $this->arrTplData['error_message'][]="多端分发字段非法";
			    return False;
			}
			$dis[] = implode("",$duan_dis);
		    }else{
			if(strlen($duan) != 10)
			{
			    $this->arrTplData['error_code']=1;
			    $this->arrTplData['error_message'][]="多端分发字段非法";
			    return False;
			}
			$dis[] = implode("",$duan_dis);
		    }
		}
		if(count($dis) != 10){
		    $this->arrTplData['error_code']=1;
		    $this->arrTplData['error_message'][]="多端分发字段非法";
		    return False;
		}
	    }
	    return True;
	}

	function getFormSonglist()
	{
		$this->arrFormData[self::$strSongListField]=array();
		$arrSongList=explode("$@$",$this->input->post('quku_songs_list'));
		$arrField=array('si_album_no','si_cd_no');
		$arrSyncInfo=array();
		foreach ($arrField as $strField)
		{
			$strContent=$this->input->post($strField);
			if(!empty($strContent))
			{
				$arrSyncInfo[$strField]=explode("$@$",$strContent);
			}
		}
		foreach ($arrSongList as $intKey=>$strVal)
		{
			if(empty($strVal))
			{
				continue;
			}
			$arrSong=json_decode($strVal,true);
			foreach ($arrField as $strField)
			{
				if(!empty($arrSyncInfo[$strField][$intKey]))
				{
					$arrSong['quku_songs_info'][$strField]=$arrSyncInfo[$strField][$intKey];
				}
			}
			$this->arrFormData[self::$strSongListField][]=$arrSong;
		}
	}

	function generateFormSonglist($arrData)
	{
		$arrInfo=$arrData[self::$strSongListField];
		foreach ($arrInfo as $intKey=>$arrVal)
		{
			$arrInfo[$intKey]['json']=json_encode($arrVal);
		}
		$this->arrTplData['data'][self::$strSongListField]=json_encode($arrInfo);
	}


	function dealSongList($intAlbumId)
	{
		if(empty($intAlbumId))
		{
			return ;
		}
		$arrSongList=array();
		$this->load->model('song_model');
		$arrParam=array('si_album_id'=>$intAlbumId);
		$arrRes=$this->song_model->normalSearch($arrParam);
		foreach ($arrRes as $arrRow)
		{
			$arrSongList[]=$this->song_model->getFormData($arrRow['si_globalid']);
		}
		$this->basicServerProcess($arrSongList);
	}


	function addFormData($intStatus)
	{
		$intId=parent::addFormData($intStatus);
		if($this->arrTplData['error_code']==0)
		{
			$this->dealSongList($intId);
			sendRequestToPic($intId);
		}
	}

	function updateFormData($intStatus)
	{
		parent::updateFormData($intStatus);
		if($this->arrTplData['error_code']==0)
		{
			$this->dealSongList($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]);
			sendRequestToPic($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]);
		}
	}

	function getAuditBaseData($arrData,$arrField)
	{
		parent::getAuditBaseData($arrData,$arrField);
		$this->arrFormData[$this->strBaseTableName]['ai_productid']=$arrData[$this->strBaseTableName]['ai_productid'];
	}

	function checkDataChange($arrDbData)
	{
		$intChangeflag=parent::checkDataChange($arrDbData);
		$intChangeflag+=$this->checkPicChange($arrDbData);
		$intChangeflag+=$this->checkAuthorChange($arrDbData);
		return $intChangeflag;
	}

	function getCacheInfo()
	{
		$arrParam=parent::getCacheInfo();
		$arrParam['or_title']=$this->arrFormData[$this->strBaseTableName]['ai_album'];
		return $arrParam;
	}

	function updateOnlineData($arrField)
	{
		parent::updateOnlineData($arrField);
		if($this->arrTplData['error_code']==0)
		{
			$this->dealSongList($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]);
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
		$this->checkIsZongYi();
	}

	function checkIsZongYi()
	{
	    $strMessage = $this->coreModel->isZongyi($this->arrFormData);
	    if($strMessage)
	    {
		if($this->arrTplData["error_core"] != 1)
		{
		    $this->arrTplData['error_message'][] = $strMessage;
		}
	    }
	}

	/**
	 * 新增数据并发布
	 *
	 */
	function doCreateAndPub()
	{
		parent::doCreateAndPub();
		$this->checkIsZongYi();
	}

	/**
	 * 更新数据
	 *
	 */
	function doEdit()
	{
		parent::doEdit();
		$this->checkIsZongYi();
		
	}

	/**
	 * 新增数据并发布
	 *
	 */
	function doEditAndPub()
	{
		parent::doEditAndPub();
		$this->checkIsZongYi();
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

	function deleteSongList()
	{


	}


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
	 * 批量恢复数据
	 *
	 */
	function batchDisDelete()
	{
		parent::batchDisDelete();
	}

	/**
	 * 搜索数据
	 *
	 */
	function search()
	{
		parent::search();
	}

	function showCacheInfo()
	{
		parent::showCacheInfo();
	}

	function getAuditData($arrData,$arrField)
	{
		parent::getAuditData($arrData,$arrField);
		$this->getAuditPic($arrData,$arrField);
		$this->getAuditAuthor($arrData,$arrField);
	}

	function saveInCache()
	{
		parent::saveInCache();
	}


	function synchronize()
	{
		parent::synchronize();
	}
}

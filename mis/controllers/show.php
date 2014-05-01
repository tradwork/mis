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
class Show extends coreController
{
	var $strBaseTableName='quku_shows_news';
	var $strBaseType=QUKU_TYPE_SHOW;
	var $strPrimaryKey='sn_globalid';
	var $strBaseModelName='Show_model';
	var $arrUniqueField=array('sn_title');


	function  __construct()
	{
		parent::__construct();
	}



	function getShowTime()
	{
		$arrTime=array();
		$strDetailTime=$this->input->post('sn_detailtime');
		$arrDetailTime=explode("$@$",$strDetailTime);
		foreach ($arrDetailTime as $strTime)
		{
			if(!empty($strTime))
			{
				$arrTime[]=strtotime($strTime);
			}
		}
		$arrTime=array_unique($arrTime);
		sort($arrTime,SORT_NUMERIC);
		if(!empty($arrTime))
		{
			$this->arrFormData[$this->strBaseTableName]['sn_detailtime']=implode(',',$arrTime);
			$this->arrFormData[$this->strBaseTableName]['sn_begintime']=$arrTime[0];
			$this->arrFormData[$this->strBaseTableName]['sn_overtime']=end($arrTime);
		}
	}

	function getFormData($intStatus,$bolUpdate=false)
	{
		parent::getFormData($intStatus,$bolUpdate);
		$this->getShowTime();
	}
	
	function validateFormData()
	{
		parent::validateFormData();
		$this->validatePicUnique();
	}

	function generateShowTime($arrData)
	{
		$arrTime=explode(",",$arrData[$this->strBaseTableName]['sn_detailtime']);
		$arrDetialTime=array();
		foreach ($arrTime as $strTime)
		{
			if(!empty($strTime))
			{
				$arrDetailtime[]=date( "Y-m-d H:i", (int)$strTime);
			}
		}
		$this->arrTplData['data'][$this->strBaseTableName]['sn_detailtime']=$arrDetailtime;

	}



	function generateFormData($arrData)
	{
		parent::generateFormData($arrData);
		$this->generateShowTime($arrData);
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
}

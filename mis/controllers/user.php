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
class User extends coreController
{
	var $strBaseTableName='quku_user_base';
	var $strBaseType=QUKU_TYPE_USER;
	var $strPrimaryKey='ub_id';
	var $strBaseModelName='User_model';
	var $arrUniqueField=array('ub_username');


	function  __construct()
	{
		parent::__construct();
	}

	function updateSystemField($intStatus,$bolUpdate=false)
	{
		return;
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
	 * 更新数据
	 *
	 */
	function doEdit()
	{
		parent::doEdit();
	}




	/**
	 * 展现数据
	 *
	 */
	function edit()
	{
		parent::edit();
	}



	function delete()
	{
		$strGlobalId=$this->input->get($this->strPrimaryKey);
		$arrId=explode(",",$strGlobalId);
		foreach ($arrId as $intGlobalId)
		{
			$arrParam=array(
			$this->strPrimaryKey=>$intGlobalId,
			$this->strFieldPrefix.'delflag'=>1
			);
			$bolRes=$this->coreModel->updateDelFlag($arrParam);
			if($bolRes==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='删除数据出错，请联系rd';
			}
		}
	}

	function disDelete()
	{
		$strGlobalId=$this->input->get($this->strPrimaryKey);
		$arrId=explode(",",$strGlobalId);
		foreach ($arrId as $intGlobalId)
		{
			$intGlobalId=$this->input->get($this->strPrimaryKey);
			$arrParam=array(
			$this->strPrimaryKey=>$intGlobalId,
			$this->strFieldPrefix.'delflag'=>0
			);
			$bolRes=$this->coreModel->updateDelFlag($arrParam);
			if($bolRes==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='恢复数据出错，请联系rd';
			}
		}
	}

	function convertUserGroup(&$arrData)
	{
		$arrConf=config_item('form_option');
		foreach ($arrData as $intKey=>$arrVal)
		{
			$arrData[$intKey]['ub_groupid']=$arrConf[$this->strBaseType]['ub_groupid'][$arrVal['ub_groupid']];
		}
	}
	
	function convertListData(&$arrDara)
	{
		parent::convertListData($arrDara);
		$this->convertUserGroup($arrDara);
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

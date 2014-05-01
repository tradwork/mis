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
class Option extends coreController
{
	var $strBaseTableName='quku_options_dic';
	var $strBaseType=QUKU_TYPE_OPTION;
	var $strPrimaryKey='od_id';
	var $strBaseModelName='Option_model';
	var $arrUniqueField=array('od_type','od_category','od_word');


	function  __construct()
	{
		parent::__construct();
	}

	function updateSystemBase($bolUpdate=false)
	{
		$strUser=$_SESSION['QUKU_USER']['ub_username'];
		$arrSystemInfo=array();
		if($bolUpdate==false)
		{
			$arrSystemInfo['joinuser']=$strUser;
		}
		foreach ($arrSystemInfo as $strKey=>$strVal )
		{
			$this->arrFormData[$this->strBaseTableName][$this->strFieldPrefix.$strKey]=$strVal;
		}
	}
	
	function updateSystemField($intStatus,$bolUpdate=false)
	{
		$this->updateSystemBase($bolUpdate);
	}
	
	function validateCategory($arrFormData)
	{
		$arrCategory=array(3,7);
		if(in_array($arrFormData['od_category'],$arrCategory))
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='不允许操作此类配置';
		}
	}

	function validateFormData()
	{
		parent::validateFormData();
		$this->validateCategory($this->arrFormData[$this->strBaseTableName]);
	}

	function convertType(&$arrData)
	{
		$arrConf=config_item('form_option');
		foreach ($arrData as $intKey=>$arrVal)
		{
			$arrData[$intKey]['od_type']=$arrConf[$this->strBaseType]['od_type'][$arrVal['od_type']];
			$arrData[$intKey]['od_category']=$arrConf[$this->strBaseType]['od_category'][$arrVal['od_category']];
		}
	}

	function convertListData(&$arrDara)
	{
		parent::convertListData($arrDara);
		$this->convertType($arrDara);
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
		$this->arrFormData[$this->strBaseTableName][$this->strFieldPrefix.'joinuser']=$_SESSION['QUKU_USER']['ub_username'];
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


	/**
	 * 删除数据
	 *
	 */
	function delete()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
		$arrDbData=$this->getDataFromDb($intGlobalId);
		$this->validateCategory($arrDbData[$this->strBaseTableName]);
		if($this->arrTplData['error_code']==0)
		{
			$bolRes=$this->coreModel->deleteItem(array($this->strPrimaryKey=>$intGlobalId));
			if($bolRes==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='删除数据出错，请联系rd';
			}
		}
	}

	function batchDelete()
	{
		$strGlobalId=$this->input->get($this->strPrimaryKey);
		$arrId=explode(",",$strGlobalId);
		foreach ($arrId as $intGlobalId)
		{
			$arrDbData=$this->getDataFromDb($intGlobalId);
			$this->validateCategory($arrDbData[$this->strBaseTableName]);
			if($this->arrTplData['error_code']==0)
			{
				$bolRes=$this->coreModel->deleteItem(array($this->strPrimaryKey=>$intGlobalId));
				if($bolRes==false)
				{
					$this->arrTplData['error_code']=1;
					$this->arrTplData['error_message'][]='删除数据出错，请联系rd';
				}
			}
		}
	}


	/**
	 * 搜索数据
	 *
	 */
	function search()
	{
		parent::search();
	}


	function suggest()
	{
		$this->load->helper('pinyin');
		$arrNeed=array('od_type','od_category','od_spell_code');
		$arrParam=array();
		$arrData=array();
		foreach ($arrNeed as $strField)
		{
			if(is_null($this->input->post($strField)))
			{
				echo '';
				exit();
			}
			if($strField=='od_spell_code')
			{
				$strCode=utf8Word2Pinyin($this->input->post($strField));
				$arrParam[$strField.' like']=$strCode.'%';
			}
			else
			{
				$arrParam[$strField]=$this->input->post($strField);
			}
		}

		$arrRes=$this->coreModel->normalSearch($arrParam);
		foreach ($arrRes as $arrVal)
		{
			$arrData[]=$arrVal['od_word'];
		}
		echo json_encode($arrData);
		exit();
	}

	function convert()
	{
		$strContent='';
		if($this->input->get('or_word')!=false)
		{
			$this->load->helper('pinyin');
			$strWord =trim( $this->input->get('or_word'));
			$strContent= utf8Word2Pinyin($strWord);
		}
		$this->arrTplData['data']=$strContent;
	}


}

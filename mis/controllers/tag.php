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
class Tag extends coreController
{
	var $strBaseTableName='quku_tag_dict';
	var $strBaseType=QUKU_TYPE_TAG;
	var $strPrimaryKey='td_tagid';
	var $strBaseModelName='Tag_model';
	var $arrUniqueField=array('td_name');
	static $strTagsynTableName='quku_tag_syn';


	function  __construct()
	{
		parent::__construct();
	}
	
	
	function validateUnique()
	{
		$arrParam=array();;
		foreach ($this->arrUniqueField as $strVal)
		{
			$arrParam[$strVal]=$this->arrFormData[$this->strBaseTableName][$strVal];
		}
		$arrRes=$this->coreModel->normalSearch($arrParam);
		if(!empty($arrRes))
		{
			if(empty($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]))
			{
				$this->arrTplData['error_code']   = 1;
				$this->arrTplData['error_message'][]   = "数据已存在";
				return false;
			}
			elseif($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]!=$arrRes[0][$this->strPrimaryKey])
			{
				$this->arrFormData['repeatid']=$arrRes[0][$this->strPrimaryKey];
			}
		}
		return true;
	}


	function suggest()
	{
	  $arrNeed=array('od_spell_code');
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
		  /* $strCode=utf8Word2Pinyin($this->input->post($strField)); */
		  $strCode = $this->input->post($strField);
		  $arrParam["td_name".' like']=$strCode.'%';
		}
	    }

	  $arrRes=$this->coreModel->normalSearch($arrParam);
	  foreach ($arrRes as $arrVal)
	    {
	      $arrData[]=$arrVal['td_name'];
	    }
	  echo json_encode($arrData);
	  exit();
	}
	
	
	function getFormTagsyn()
	{
		$arrData=array();
		$strData=$this->input->post('quku_tag_syn');
		if(!empty($strData))
		{
			$arrData=json_decode($strData,true);
		}
		$this->arrFormData[self::$strTagsynTableName]=$arrData;
	}
	
	function generateFormTagsyn($arrData)
	{
		$arrData=$arrData[self::$strTagsynTableName];
		foreach ($arrData as $intKey=>$arrRow)
		{
			$arrData[$intKey]=htmlFilter($arrRow);
		}
		$this->arrTplData['data'][self::$strTagsynTableName]=$arrData;
	}

	function updateSystemField($intStatus,$bolUpdate=false)
	{
		return;
	}


	function validateFormData()
	{
		parent::validateFormData();
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


	/**
	 * 删除数据
	 *
	 */
	function delete()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
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
}

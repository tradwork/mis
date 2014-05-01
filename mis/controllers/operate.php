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
class Operate extends coreController
{
	var $strBaseTableName='quku_operate_record';
	var $strBaseType=QUKU_TYPE_OPERATE;
	var $strPrimaryKey='or_id';
	var $strBaseModelName='Operate_model';


	function  __construct()
	{
		parent::__construct();
	}

	function convertContentType(&$arrData)
	{
		$arrConf=config_item('audit_fields');
		foreach ($arrData as $intKey=>$arrVal)
		{
			$arrField=array('or_content_type','or_fail_field');
			foreach ($arrField as $strField)
			{
				$arrInfo=array();
				foreach ($arrConf[$arrVal['or_type']] as $arrTemp)
				{
					if($arrVal[$strField] & $arrTemp['value'])
					{
						$arrInfo[]=$arrTemp['explain'];
					}
				}
				$arrData[$intKey][$strField]=implode(",",$arrInfo);
			}
		}
	}
	
	function convertAuditStatus(&$arrData)
	{
		$arrConf=config_item('search_option');
		$arrMap=$arrConf[QUKU_TYPE_OPERATE]['search_audit_flag']['option'];
		foreach ( $arrData as $intKey=>$arrVal)
		{
			$arrData[$intKey]['or_status']=$arrMap[$arrVal['or_status']];
		}
	}

	function convertListData(&$arrData)
	{
		parent::convertListData($arrData);
		$this->convertContentType($arrData);
		$this->convertAuditStatus($arrData);
	}

	function search()
	{
		parent::search();
	}
}

<?php

require_once ROOT_PATH.'mis/controllers/coreController.php';
class Yingshi extends coreController
{
	var $strBaseTableName='quku_yingshi_info';
	static $strYingshiRefTableName='quku_yingshi_ref';
	var $strBaseType=QUKU_TYPE_YINGSHI;
	var $strPrimaryKey='yi_globalid';
	var $strBaseModelName='Yingshi_model';
	var $arrUniqueField=array('yi_title',"yi_versions","yi_type",'yi_session');

	function  __construct()
	{
		parent::__construct();
	}

	function generateFormYingshiRef($arrData)
	{
	    $arrInfo=$arrData[self::$strYingshiRefTableName];
	    
	    $this->arrTplData['data'][self::$strYingshiRefTableName]=$arrInfo;
	}

	function getFormYingshiRef()
	{
	    $arrInfo =$this->input->post('quku_yingshi_ref');
	    if(is_string($arrInfo))
	    {
		$arrInfo = json_decode($arrInfo,true);
	    }
	    $arrInfo = $this->getSongInfoByAlbums($arrInfo);
	    $this->arrFormData[self::$strYingshiRefTableName]=$arrInfo;
	}

	function getSongInfoByAlbums($arrInfo)
	{
	    $this->load->model("song_model");
	    $res = array();
	    $resId = array();
	    foreach($arrInfo as $v)
	    {
		$resId[] = $v["yr_itemid"];
	    }
	    foreach($arrInfo as $v)
	    {
		$res[] = $v;
		if($v["yr_ref_type"] == 2 || $v["yr_ref_type"] == 102)
		{
		    $songs = $this->song_model->normalSearch(array("si_album_id" => $v["yr_itemid"]));
		    if($songs)
		    {
			foreach($songs as $song)
			{
			    if(!in_array($song["si_globalid"],$resId))
			    {
				$r = array("yr_itemid" => $song["si_globalid"],"yr_order"=>0,"yr_ref_type"=>101,"yr_content_type"=>3);
				$res[] = $r;
			    }
			}
		    }
		}
	    }
	    return $res;
	}

	function validateTimeField()
	{
		if(!empty($this->arrFormData[$this->strBaseTableName]['yi_publishtime']))
		{
			if($this->validateTime($this->arrFormData[$this->strBaseTableName]['yi_publishtime'])==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]="发行时间格式错误";
			}
		}
	}

	function getUniqueData()
	{
		if($this->arrFormData[$this->strBaseTableName]['yi_isrc_flag']==1)
		{
			return;
		}
		$arrParam=array('yi_title','yi_versions',"yi_type","yi_session");
		$this->load->helper('character');
		foreach ($arrParam as $strField)
		{
			$arrData[$strField]=estrtolower($this->arrFormData[$this->strBaseTableName][$strField]);
		}
		$this->arrFormData[$this->strBaseTableName]['yi_isrc']= md5(implode("\t",$arrData));
	}


	function updateSystemField($intStatus,$bolUpdate=false)
	{
		parent::updateSystemField($intStatus,$bolUpdate);
	}

	function validateIsrc()
	{
		if($this->arrFormData[$this->strBaseTableName]['yi_isrc_flag']==1
		&& empty($this->arrFormData[$this->strBaseTableName]['yi_isrc']))
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="isrc不能为空";
		}
	}

	function convertData()
	{
		parent::convertData();
	}


	function validateFormData()
	{
		$this->validateIsrc();
		parent::validateFormData();
		$this->validateTimeField();
		$this->validatePicUnique();
	}

	function getFormData($intStatus,$bolUpdate=false)
	{
		parent::getFormData($intStatus,$bolUpdate);
		$this->getUniqueData();
	}

	function addFormData($intStatus)
	{
		$this->getFormData($intStatus);
		$this->validateFormData();
		$this->convertData();
		if($this->arrTplData['error_code']==0)
		{
			$intGlobalId=$this->coreModel->insertFormData($this->arrFormData);
			if($intGlobalId==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='保存数据出错，请联系rd';
				return;
			}
			$this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]=$intGlobalId;
			$this->arrTplData['data']=$this->arrFormData;
			$this->arrTplData['data']['json']=json_encode($this->arrFormData);
			/* 发送copyright任务 */
			$this->load->helper("basicserver");
			sendRequestToPicture($intGlobalId);
		}
	}


	function updateFormData($intStatus)
	{
		$this->getFormData($intStatus,true);
		$this->validateFormData();
		$this->convertData();
		if($this->arrTplData['error_code']==0)
		{
			$bolRes=$this->coreModel->updateFormData($this->arrFormData);
			if($bolRes==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='保存数据出错，请联系rd';
				return ;
			}

			$this->arrTplData['data']=$this->arrFormData;
			$this->arrTplData['data']['json']=json_encode($this->arrFormData);
			if(isset($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]))
			{
			    $intGlobalId = $this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey];
			    $this->load->helper("basicserver");
			    sendRequestToPicture($intGlobalId);
			}
						
		}
	}

	function updateSystemBase($bolUpdate=false)
	{
		$strUser=$_SESSION['QUKU_USER']['ub_username'];
		$arrSystemInfo=array();
		if($bolUpdate==false)
		{
			$arrSystemInfo['joinuser']=$strUser;
		}
		$arrSystemInfo['edituser']=$strUser;
		$arrSystemInfo['edituidnowtime']=0;
		$arrSystemInfo['delflag']    = 0;
		foreach ($arrSystemInfo as $strKey=>$strVal )
		{
			$this->arrFormData[$this->strBaseTableName][$this->strFieldPrefix.$strKey]=$strVal;
		}
	}


	function generateFormBaseData($arrData)
	{
		parent::generateFormBaseData($arrData);
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
		$arrData=$this->coreModel->normalSearch(array($this->strPrimaryKey=>$this->input->get($this->strPrimaryKey)));
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
//		$strGlobalId=$this->input->get($this->strPrimaryKey);
//		$arrId=explode(",",$strGlobalId);
//		foreach ($arrId as $intGlobalId)
//		{
//			$res=$this->validateEdituser( $intGlobalId);
//			if($res==false)
//			{
//				break;
//			}
//			$arrParam=array(
//			$this->strPrimaryKey=>$intGlobalId,
//			$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
//			$this->strFieldPrefix.'status'=>1,
//			'si_prohibit_type'=>4
//			);
//			$bolRes=$this->coreModel->updateStatus($arrParam);
//			if($bolRes==false)
//			{
//				$this->arrTplData['error_code']=1;
//				$this->arrTplData['error_message'][]='下线数据出错，请联系rd';
//			}
//		}
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

	function saveInCache()
	{
		parent::saveInCache();
	}

	function showCacheInfo()
	{
		parent::showCacheInfo();
	}

	function getAuditData($arrData,$arrField)
	{
		parent::getAuditData($arrData,$arrField);
		$this->getAuditMedia($arrData,$arrField);
		$this->getAuditLrc($arrData,$arrField);
		$this->getAuditAuthor($arrData,$arrField);
	}

	function updateOnlineData($arrField)
	{
		parent::updateOnlineData($arrField);
		$arrDbData=$this->getDataFromDb($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]);
		$this->basicServerProcess(array($arrDbData));
	}

	function synchronize()
	{
		parent::synchronize();
	}

	function prohibitItem($intGlobalId,$bolDelFlag=false)
	{
		$arrConf=config_item('form_option');
		$arrParam=array(
			$this->strPrimaryKey=>$intGlobalId,
			$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
			$this->strFieldPrefix.'prohibit_type'=> 4,
			$this->strFieldPrefix.'status'=> 1,
//			$this->strFieldPrefix.'prohibit_info'=>$arrConf[$this->strBaseType]['si_prohibit_info'][2],
		);
		if($bolDelFlag)
		{
			$arrParam[$this->strFieldPrefix.'delflag']=1;
		}
		else
		{
			$arrParam[$this->strFieldPrefix.'delflag']=0;
		}
		$bolRes=$this->coreModel->updateProhibitType($arrParam);
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='删除数据出错，请联系rd';
		}
		return $bolRes;
	}

	function unprohibitItem($intGlobalId)
	{
		$arrConf=config_item('form_option');
		$arrParam=array(
		$this->strPrimaryKey=>$intGlobalId,
		$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'prohibit_type'=> 3,
//		$this->strFieldPrefix.'prohibit_info'=>$arrConf[$this->strBaseType]['si_prohibit_info'][0],
		);
		$bolRes=$this->coreModel->updateProhibitType($arrParam);
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='删除数据出错，请联系rd';
		}
		return $bolRes;
	}

	function prohibit()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
		$this->prohibitItem($intGlobalId);
	}

	function unprohibit()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
		$this->unprohibitItem($intGlobalId);
	}

	function forceProhibit()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
		$this->prohibitItem($intGlobalId,true);
	}


//	function convertProhibitType(&$arrData)
//	{
//		$arrConf=config_item('form_option');
//		foreach ($arrData as $intKey=>$arrVal)
//		{
//			$arrData[$intKey]['si_prohibit_type']=array($arrVal['si_prohibit_type']=>$arrConf[$this->strBaseType]['si_prohibit_type'][$arrVal['si_prohibit_type']]);
//		}
//	}


	function convertListData(&$arrData)
	{
		parent::convertListData($arrData);
//		$this->convertProhibitType($arrData);
	}
}

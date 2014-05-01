<?php
require_once ROOT_PATH.'mis/controllers/coreController.php';
class Openuser extends coreController
{
	var $strBaseTableName='quku_open_user';
	var $strBaseType=QUKU_TYPE_OPEN_USER;
	var $strPrimaryKey='ou_id';
	var $strBaseModelName='Openuser_model';
	static $strMaterialForm='quku_open_user_material';


	function  __construct()
	{
		parent::__construct();
	}
	
	function getSearchOptionData()
	{
		$arrSearchConf=config_item('search_option');
		$this->arrTplData['data']['search_option']=$arrSearchConf[$this->strBaseType];
	}
	
	function getConditionParam()
	{
		$arrField=array('ou_user_type','ou_jointime','ou_complete','ou_id','ou_company','ou_legal_rep',
		'ou_approve_user','ou_status','all','ou_contact_name');
		foreach ($arrField  as $strKey)
		{
			$strGetVal=$this->input->get($strKey);
			if(isset($_GET[$strKey]) && $_GET[$strKey]!='')
			{
				$arrParam[$strKey]=$strGetVal;
			}
		}
		if(isset($_GET['search_field']) && isset($_GET['search_content']))
		{
			if($this->input->get('search_field')=='ou_id' || $this->input->get('search_field')=='all')
			{
				$arrParam[$this->input->get('search_field')]=$this->input->get('search_content');
			}else
			{
				$arrParam[$this->input->get('search_field')." like "]="%".$this->input->get('search_content')."%";
			}
		}
		if(isset($_GET['ou_approve_user']))
		{
			if(urldecode($this->input->get('ou_approve_user'))=='全部')
			{
				unset($arrParam['ou_approve_user']);
			}
		}
		return $arrParam;
	}
	
	
	function getPageParam()
	{
		$intPageId=$this->input->get('search_page_id');
		$intPageSize=$this->input->get('search_page_size');
		if(empty($intPageSize))
		{
			$intPageSize=10;
		}
		if(empty($intPageId))
		{
			$intPageId=1;
		}
		return array(
		'offset'=>($intPageId-1)*$intPageSize,
		'limit'=>$intPageSize
		);
	}
	

	
	function getOrderParam()
	{
		$arrConvert=array(
		QUKU_OPTIONS_ASCEND=>'ASC',
		QUKU_OPTIONS_DEASCEND=>'DESC');
		$strOrder=$this->input->get('order');
		if(!empty($strOrder))
		{
			$arrOrder=json_decode($strOrder,true);
			foreach ($arrOrder as $strField=>$strVal)
			{
				$arrOrder[$strField]=$arrConvert[$strVal];
			}
			return $arrOrder;
		}
		return array();
	}
	
	function getUserList()
	{
		$this->load->model('user_model');
		$arrUser=$this->user_model->normalSearch(array('ub_groupid'=>4));
		foreach ($arrUser as $arrVal)
		{
			$arrResult[]=$arrVal['ub_username'];
		}
		return $arrResult;
	}

	function getListUrl($intDataCount)
	{
		$this->load->helper('url');
		$this->load->helper('listpage');
		$intPageId=$this->input->get('search_page_id');
		if(empty($intPageId))
		{
			$intPageId=1;
		}
		$intPageSize=$this->input->get('search_page_size');
		if(empty($intPageSize))
		{
			$intPageSize=10;	
		}
		$strPreUrl=preg_replace("/&search_page_id=(\d+)/i","",$_SERVER['QUERY_STRING']);
		$strListPage=lib_list_page(site_url($strPreUrl."&"),$intPageId,ceil($intDataCount/$intPageSize));
		return $strListPage;
	}
	
	function search()
	{
		$arrConditionParam=$this->getConditionParam();
		$arrOrderParam=$this->getOrderParam();
		$arrPageParam=$this->getPageParam();
		//get data from db
		$arrListData=$this->coreModel->listSearch($arrConditionParam,$arrOrderParam,$arrPageParam);
		//show data
//		$this->convertListData($arrListData['data']);
		$this->arrTplData['data']['list_rows'] = $arrListData['data'];
		$this->arrTplData['data']['list_page_code']=$this->getListUrl($arrListData['count']);
		$this->arrTplData['data']['user_list']=array_merge(array('全部'),$this->getUserList());
	}
	
	function edit()
	{
		parent::edit();
	}

	

	
	function getFormOptionData()
	{
		return;
	}
	
	function generateFormUserMaterialData($arrData)
	{
		if($this->arrTplData['data'][$this->strBaseTableName]['ou_user_type']==OPEN_COMPANY)
		{
			$arrRequire=array('oum_business_license','oum_organization_certificate','oum_undertaking_certificate',
			'oum_corporate_identity','oum_copyright_proof');
			$arrOption=array('oum_tax_certificate');
		}
		else
		{
			$arrRequire=array('oum_corporate_identity','oum_copyright_proof','oum_undertaking_certificate');
			$arrOption=array();
		}
		foreach ($arrData[self::$strMaterialForm] as $strKey=>$strVal )
		{
			if(in_array($strKey,$arrRequire))
			{
				$this->arrTplData['data'][self::$strMaterialForm]['required'][$strKey]=$strVal;
			}
			elseif(in_array($strKey,$arrOption))
			{
				$this->arrTplData['data'][self::$strMaterialForm]['optional'][$strKey]=$strVal;
			}
		}
	}
	
	function pass()
	{
		$arrParam=array(
		$this->strPrimaryKey=>$this->input->get($this->strPrimaryKey),
		$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'status'=>1,
		$this->strFieldPrefix.'approve_user'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'approve_time'=>date("Y-m-d H:i:s",time())
		);
		$bolRes=$this->coreModel->updateStatus($arrParam);
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='审核出错，请联系rd';
			return;
		}
		$arrUser=$this->coreModel->normalSearch(array($this->strPrimaryKey=>$this->input->get($this->strPrimaryKey)));
		if(empty($arrUser))
		{
			return;
		}
		$this->sendEmail($arrUser[0]['ou_email'],"百度音乐资源合作开放平台认证结果","恭喜！认证成功，请用已认证的百度账号登录http://musicopen.baidu.com/");
		return $bolRes;
		return $bolRes;
	}

	function fail()
	{
		$arrParam=array(
		$this->strPrimaryKey=>$this->input->post($this->strPrimaryKey),
		$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'status'=>2,
		$this->strFieldPrefix.'approve_user'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'approve_time'=>date("Y-m-d H:i:s",time()),
		$this->strFieldPrefix.'fail_reason'=>$this->input->post('ou_fail_reason'),
		);
		$bolRes=$this->coreModel->updateStatus($arrParam);
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='审核出错，请联系rd';
			return $bolRes;
		}
		$arrUser=$this->coreModel->normalSearch(array($this->strPrimaryKey=>$this->input->post($this->strPrimaryKey)));
		if(empty($arrUser))
		{
			return;
		}
		$this->sendEmail($arrUser[0]['ou_email'],"百度音乐资源合作开放平台认证结果",$this->input->post('ou_fail_reason'));
		return $bolRes;
	}
	
	function forbid()
	{
		$arrParam=array(
		$this->strPrimaryKey=>$this->input->get($this->strPrimaryKey),
		$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'status'=>3,
		$this->strFieldPrefix.'forbid_user'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'forbid_time'=>date("Y-m-d H:i:s",time()),
		);
		$bolRes=$this->coreModel->updateStatus($arrParam);
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='审核出错，请联系rd';
		}
		return $bolRes;
	}
	
	function dumpData()
	{
		$arrParam=array();
		if(isset($_GET['ou_status']))
		{
			$arrParam['ou_status']=$this->input->get('ou_status');
		}
		$arrUser=$this->coreModel->normalSearch($arrParam);
		$arrField=config_item('open_user_field');
		$this->load->helper('text');
		$strContent=formtxt($arrField,$arrUser);
		echo $strContent;
		exit();
	}
	
}

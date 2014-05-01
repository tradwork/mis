<?php
class MY_Controller extends CI_Controller
{
	var $arrTplData;
	var $arrLoginUser;
	var $strTemplateName;
	function __construct()
	{
		parent::__construct();
		$this->arrTplData   =  array('error_code'=>0,'error_message'=>array());
		$this->strTemplateName=is_null($this->input->get('tn'))? '' : $this->input->get('tn');
	}


	function _output()
	{
		if($this->input->get('debug')=='dump')
		{
 			var_dump($this->arrTplData);
			exit();
		}
		$this->arrTplData['user'] = isset($_SESSION['QUKU_USER']) ? $_SESSION['QUKU_USER']:array();
		if($this->arrTplData['error_code']!=0)
		{
			echo json_encode($this->arrTplData);
			exit();
		}
		if(!empty($this->strTemplateName))
		{
			$strTpl = str_replace("_", "/", $this->strTemplateName);
		}
		else
		{
			echo json_encode($this->arrTplData);
			exit();
		}
		$this->smarty3->view($strTpl, $this->arrTplData);
	}


	function validateTime($strTime)
	{
		//$strTime = trim($strTime);
		if (preg_match("/^[0-9][0-9]{3}-[0-9]{2}-[0-9]{2}$/",$strTime)) {
			$arrTime = explode("-",$strTime);
			$year = $arrTime[0];
			$month = $arrTime[1];
			$day = $arrTime[2];
			$isLeapYear = false;
			if ($month >= 0 && $month <= 12 && $day >= 0 && $day <= 31) {
				//check is  leap year
				if (($year %100 != 0 && $year %4 == 0 )||
				($year %100 == 0 && $year %400 == 0)) {
					$isLeapYear = true;
				}
				// check the day of February
				if (($isLeapYear && $month == 2 && $day > 29)
				|| (!$isLeapYear && $month == 2 && $day > 28)) {
					return false;
				}
				//check the day of small $month
				if (($month == 4 ||$month == 6 || $month == 9 || $month == 11) && $day > 30) {
					return false;
				}
				return true;
			}
		}
		return false;
	}

	/**
     * 分离名称
     *
     * @param strName string 原始的名称字符串, 以 , 分割
     * @param arrValidNames array 合法的，可以包含的名称
     * @return array validNames => 合法的，包含的名称，以 , 分割
     * 				 invalidNames => 不合法的， 非包含的名称， 以 , 分割
     */
	public function splitNames($strName, $arrValidNames)
	{
		$names = array();
		foreach ($arrValidNames as $strValidName)
		{
			array_push($arrValidNames, htmlspecialchars_decode($strValidName,ENT_QUOTES | ENT_IGNORE));
		}
		$splits = explode(",", $strName);
		$invalidNames = array_diff($splits, $arrValidNames);
		$validNames = array_diff($splits, $invalidNames);
		$names['validNames'] = implode(",", $validNames);
		$names['invalidNames'] = implode(",", $invalidNames);
		return $names;
	}

	function getGlobalId($strDataType)
	{
		$this->load->model('Globalid_model','globalid');
		$intGlobalId=$this->globalid->insertItem(array('sg_type'=>$strDataType));
		if($intGlobalId>0)
		{
			return $intGlobalId;
		}
		else
		{
			$this->arrTplData['error_message'][]='获取全局id失败';
			$this->arrTplData['error_code']=1;
		}

	}

	function redirectUrl($strClass,$strMethod,$arrParam)
	{
		$this->load->helper('url');
		$strUrl='c='.$strClass.'&'.'m='.$strMethod;
		if(!empty($arrParam))
		{
			$strUrl.='&'.http_build_query($arrParam);
		}
		redirect($strUrl,'location', 302);
	}

	function validateFile($strType)
	{
		$bolRes=true;
		$fileInfo=$_FILES['userfile'];
		$arrValidateConf=config_item('validate');
		if (empty($fileInfo['name']))
		{
			$this->arrTplData['error_message'][]="缺少文件名";
			$bolRes= false;
		}
		if($fileInfo['error']!==0)
		{
			$this->arrTplData['error_message'][]="上传文件失败";
			$bolRes= false;
		}
		if($fileInfo['size']> $arrValidateConf[$strType]['size'])
		{
			$this->arrTplData['error_message'][]="文件超过指定大小";
			$bolRes= false;
		}
		if(!in_array($fileInfo['type'], $arrValidateConf[$strType]['type']))
		{
			$this->arrTplData['error_message'][]="文件格式不正确";
			$bolRes= false;
		}
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
		}
		return $bolRes;
	}

	function storageFile($strType,$intGlobalId,$strItemName,$strLocalName)
	{
		$this->load->library('Bcssdk');
		$strRemoteName="$strType/$intGlobalId/$strItemName";
		$arrBcsParam=array('name'=>$strRemoteName,'tmp_name'=>$strLocalName);
		$strUrl = $this->bcssdk->UploadFile($arrBcsParam);
		if($strUrl==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message']="存储文件失败";
			return false;
		}
		return $strUrl;
	}
	
	function sendEmail($strEmail,$strSubject,$strContent)
	{
		$subject  = "=?UTF-8?B?".base64_encode($strSubject)."?=";
		$headers= "MIME-Version: 1.0\r\n";
		$headers.= 'From: musicopen.baidu.com<musicopen@baidu.com>' . "\r\n" ;
		$headers .= "Content-type: text/plain; charset=utf-8\r\n";
		$headers .= "Content-Transfer-Encoding: 8bit\r\n";
		mail($strEmail,$subject,$strContent,$headers);
	}
}

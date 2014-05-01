<?php
class CheckIn
{
	var $strErrMessage;
	var $intErrCode=0;
	private function _getUserName()
	{
		$CI=& get_instance();
		$_SESSION['QUKU_USER']=$CI->session->userdata('user');
		if(!empty($_SESSION['QUKU_USER']))
		{
			$strUser=$_SESSION['QUKU_USER']['ub_username'];
		}
		else
		{
			$CI->baecassession->auth();
			$strUser=$CI->baecassession->user();
		}
		return $strUser;
	}

	/**
	 * 检查用户是否合法
	 *
	 */
	function checkLegal()
	{
		$strUser=$this->_getUserName();
		$CI= & get_instance();
		$CI->load->model('user_model','user');
		$arrParam=array('ub_username'=>$strUser);
		$arrRes=$CI->user->normalSearch($arrParam);
		if(empty($arrRes))
		{
			return false;
		}
		$CI->session->set_userdata(array('user'=>$arrRes[0]));
		$_SESSION['QUKU_USER']=$arrRes[0];
		return true;
	}

	/**
	 * 检查用户权限
	 *
	 * @return unknown
	 */
	function checkAuth()
	{
		$ObjCI =& get_instance();
		$strClass=$ObjCI->input->get('c');
		$strFuction=$ObjCI->input->get('m');
		if(empty($strClass))
		{
			$strClass='index';
			$strFuction='index';
		}
		$arrConf=config_item('acl');
		$arrAuthConf=array_merge($arrConf['default'],$arrConf[$strClass]);
		if(isset($arrAuthConf[$strFuction]) &&
		!in_array($_SESSION['QUKU_USER']['ub_groupid'],$arrAuthConf[$strFuction]))
		{
			$this->arrTplData=array('error_code'=>1,'error_message'=>"sorry,you don't have the authority to do this");
			log_message('info',"%s:%d".$this->arrTplData['error_message'],__FILE__, __LINE__);
			return false;
		}
		return true;

	}


	//	function check()
	//	{
	//		$ObjCI =& get_instance();
	//		$strClass=$ObjCI->input->get('c');
	//		if($strClass=='error')
	//		{
	//			return;
	//		}
	//		$ObjCI->load->helper('url');
	//		if($this->checkLegal()==false)
	//		{
	//			$strUrl=site_url().'?c=error&m=display&code=1&tn=common_error';
	//			header('Location: '.$strUrl);
	//			exit();
	//		}
	//		if($this->checkAuth()==false)
	//		{
	//			$strUrl=site_url().'?c=error&m=display&code=2&tn=common_error';
	//			header('Location: '.$strUrl);
	//			exit();
	//		}
	//		log_message('info',sprintf('%s:%d log in success',__FILE__, __LINE__));
	//	}

	function check()
	{
		$ObjCI =& get_instance();
		$ObjCI->load->helper('url');
		if($this->checkLegal()==false)
		{
			$ObjCI->arrTplData['error_code']=1;
			$ObjCI->arrTplData['error_message'][]='对不起，您没有权限进行登录系统';
			show_error($ObjCI->arrTplData['error_message'][0],302);
			exit();
		}
		if($this->checkAuth()==false)
		{
			$ObjCI->arrTplData['error_code']=1;
			$ObjCI->arrTplData['error_message'][]='对不起，您没有权限进行此操作';
			if($ObjCI->input->get('tn')==false)
			{
				echo json_encode($ObjCI->arrTplData);
			}
			else
			{
				show_error($ObjCI->arrTplData['error_message'][0],302);
			}
			exit();
		}
//		log_message('info',sprintf('%s:%d log in success',__FILE__, __LINE__));
	}
}

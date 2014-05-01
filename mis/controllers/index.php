<?php
class Index extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		//默认采用模板
		if (empty($this->strTemplateName))
		{
			$this->strTemplateName = 'index_index';
		}
	}


	public function topmenu()
	{
		$this->arrTplData['global_username']=$_SESSION['QUKU_USER']['ub_username'];
		$this->arrTplData['global_logout']=config_item('logout_url');
		$this->strTemplateName = 'index_topmenu';
	}

	public function menu()
	{
		foreach(config_item('menu') as $arrVal)
		{
			if($arrVal['prefix']=='openuser')
			{
				$arrBDMenu[]=$arrVal;
			}
			else
			{
				$arrEditMenu[]=$arrVal;
			}
		}
		if($_SESSION['QUKU_USER']['ub_groupid']==4)
		{
			$this->arrTplData['menuList'] =$arrBDMenu;
		}
		else
		{
			$this->arrTplData['menuList'] =$arrEditMenu;
		}
		$this->strTemplateName = 'index_menu';
	}

	public function bar()
	{
		$this->strTemplateName = 'index_bar';
	}

	public function welcome()
	{
		$this->strTemplateName = 'index_welcome';
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->baecassession->logout();
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

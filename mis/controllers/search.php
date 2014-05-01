<?php
require_once ROOT_PATH.'mis/controllers/coreController.php';
class Search extends coreController
{
	var $strBaseType=QUKU_TYPE_SEARCH;

	function  __construct()
	{
		parent::__construct();
	}
	
	function run()
	{
		$arrOptionConf=config_item('form_option');
		$this->arrTplData['data']['option']=$arrOptionConf[$this->strBaseType];
	}
}

<?php
	class Openusermaterialtable_model extends DbManage_model
	{
		var $strTable='quku_open_user_material';
		var $strPrimaryKey='oum_id';
		var $strForeignKey='oum_user_id';
	}
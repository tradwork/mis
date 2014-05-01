<?php
	class Picinfo_model extends DbManage_model
	{
		var $strTable='quku_pic_info';
		var $strPrimaryKey='pi_globalid';
		var $strForeignKey='pi_itemid';
	}
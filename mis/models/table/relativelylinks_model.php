<?php
	class Relativelylinks_model extends DbManage_model
	{
		var $strTable='quku_relatively_links';
		var $strPrimaryKey='rl_id';
		var $strForeignKey='rl_itemid';
	}
<?php
	class Mvref_model extends DbManage_model
	{
		var $strTable='quku_mv_ref';
		var $strPrimaryKey='mr_id';
		var $strForeignKey='mr_mv_id';
	}
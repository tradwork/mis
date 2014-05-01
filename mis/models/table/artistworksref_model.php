<?php
	class Artistworksref_model extends DbManage_model
	{
		var $strTable='quku_artist_works_ref';
		var $strPrimaryKey='awr_id';
		var $strForeignKey='awr_itemid';
	}
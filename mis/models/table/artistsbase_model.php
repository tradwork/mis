<?php
class Artistsbase_model extends DbManage_model
{
	var $strTable='quku_artists_base';
	var $strPrimaryKey='ab_globalid';

	function insert($arrData)
	{
		if(empty($arrData))
		{
			throw new Exception('the data parameter is empty, please check');
		}
		$arrData['ab_priority']=2;
		$arrData['ab_priority_settime']=time();
		$this->db->insert($this->strTable, $arrData);
		return $this->db->insert_id();
	}

	function update($arrData,$arrWhere=array())
	{
		if(empty($arrData))
		{
			throw new Exception('the data parameter is empty, please check');
		}
		if(empty($arrWhere))
		{
			if(isset($arrData[$this->strPrimaryKey]))
			{
				$arrWhere=array($this->strPrimaryKey=>$arrData[$this->strPrimaryKey]);
			}
			else
			{
				throw new Exception('the where parameter is empty, please check');
			}
		}
		$arrData['ab_priority']=2;
		$arrData['ab_priority_settime']=time();
		$this->db->update($this->strTable,$arrData,$arrWhere);
	}

}
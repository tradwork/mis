<?php
class Albumsinfo_model extends DbManage_model
{
	var $strTable='quku_albums_info';
	var $strPrimaryKey='ai_globalid';

	function insert($arrData)
	{
		if(empty($arrData))
		{
			throw new Exception('the data parameter is empty, please check');
		}
		$arrData['ai_priority']=2;
		$arrData['ai_priority_settime']=time();
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
		$arrData['ai_priority']=2;
		$arrData['ai_priority_settime']=time();
		$this->db->update($this->strTable,$arrData,$arrWhere);
	}

}
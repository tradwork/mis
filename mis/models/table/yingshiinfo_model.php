<?php
class Yingshiinfo_model extends DbManage_model
{
	var $strTable='quku_yingshi_info';
	var $strPrimaryKey='yi_globalid';

	function insert($arrData)
	{
		if(empty($arrData))
		{
			throw new Exception('the data parameter is empty, please check');
		}
		$arrData['yi_priority']=2;
		$arrData['yi_priority_settime']=time();
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
		$arrData['yi_priority']=2;
		$arrData['yi_priority_settime']=time();
		$this->db->update($this->strTable,$arrData,$arrWhere);
	}
}
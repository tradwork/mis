<?php
class videoinfo_model extends DbManage_model
{
	var $strTable='quku_video_info';
	var $strPrimaryKey='vi_globalid';

	function insert($arrData)
	{
		if(empty($arrData))
		{
			throw new Exception('the data parameter is empty, please check');
		}
		$arrData['vi_priority'] = 2;
		$arrData['vi_priority_settime'] = time();
		$arrData["vi_jointime"] = time();
		$arrData["vi_edituser"] = $_SESSION["QUKU_USER"]['ub_username'];
		$arrData["vi_joinuser"] = $_SESSION["QUKU_USER"]['ub_username'];
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
		$arrData['vi_priority']=2;
		$arrData['vi_priority_settime']=time();
		$arrData["vi_edituser"] = $_SESSION["QUKU_USER"]['ub_username'];
		$this->db->update($this->strTable,$arrData,$arrWhere);
	}

}
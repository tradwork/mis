<?php
class clusterinfo_model extends DbManage_model
{
	var $strTable='quku_cluster_info';
	var $strPrimaryKey='ci_cluster_id';
    var $strForeignKey = "ci_primary_songid";

	function insert($arrData)
	{
		if(empty($arrData))
		{
			throw new Exception('the data parameter is empty, please check');
		}
		$arrData["ci_edituser"] = $_SESSION["QUKU_USER"]['ub_username'];
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
		$arrData["vi_edituser"] = $_SESSION["QUKU_USER"]['ub_username'];
		$this->db->update($this->strTable,$arrData,$arrWhere);
	}

}
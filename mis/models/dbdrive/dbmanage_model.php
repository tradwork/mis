<?php
class DbManage_model extends CI_Model
{
	var $strTable;
	var $strPrimaryKey;

	function __construct()
	{
		parent::__construct();
	}
	

	function select($arrWhere=array(),$strOrderby='',$strSort='ASC',$intLimit=0,$intOffset=0,$arrField=array(),$arrOr=array())
	{
		if(empty($arrField))
		{
			$strField='*';
		}
		else
		{
			$strField=implode(",",$arrField);
		}
		$this->db->select($strField);
		$this->db->from($this->strTable);
		if(!empty($arrWhere))
		{
			$this->db->where($arrWhere);
		}
		if(empty($strOrderby))
		{
			$this->db->order_by($this->strPrimaryKey,$strSort);
		}
		else
		{
			$this->db->order_by($strOrderby,$strSort);
		}
		if($intLimit>0)
		{
			$this->db->limit($intLimit,$intOffset);
		}
		if(!empty($arrOr))
		{
			$this->db->or_where($arrOr);
		}
		$ObjResult=$this->db->get();
		$arrResult=array();
		foreach ($ObjResult->result_array() as $arrRow)
		{
			$arrResult[]=$arrRow;
		}
		return $arrResult;
	}

	function joinSelect($arrWhere=array(),$strOrderby='',$strSort='ASC',$intLimit=0,$intOffset=0,$arrJoinParam=array(),$arrField=array())
	{
		if(empty($arrField))
		{
			$strField='*';
		}
		else
		{
			$strField=implode(",",$arrField);
		}
		$this->db->select($strField);
		$this->db->from($this->strTable);
		if(!empty($arrWhere))
		{
			$this->db->where($arrWhere);
		}
		if(!empty($arrJoinParam))
		{
			foreach ($arrJoinParam as $strJoinTable=>$strJoinOn )
			{
				$this->db->join($strJoinTable,$strJoinOn,'left');
			}
		}
		if(empty($strOrderby))
		{
			$strOrderby=$this->strPrimaryKey;
		}
		$this->db->order_by($strOrderby,$strSort);
		if($intLimit>0)
		{
			$this->db->limit($intLimit,$intOffset);
		}
		$ObjResult=$this->db->get();
		$arrResult=array();
		foreach ($ObjResult->result_array() as $arrRow)
		{
			$arrResult[]=$arrRow;
		}
		return $arrResult;
	}


	function insert($arrData)
	{
		if(empty($arrData))
		{
			throw new Exception('the data parameter is empty, please check');
		}
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
		$this->db->update($this->strTable,$arrData,$arrWhere);
	}

	function delete($arrWhere)
	{
		if(empty($arrWhere))
		{
			throw new Exception('the where parameter is empty, please check');
		}
		$this->db->delete($this->strTable,$arrWhere);
	}

	function selectCount($arrWhere=array(),$arrJoinParam=array(),$arrOr=array())
	{
		if(!empty($arrWhere))
		{
			$this->db->where($arrWhere);
		}
		if(!empty($arrJoinParam))
		{
			foreach ($arrJoinParam as $strJoinTable=>$strJoinOn )
			{
				$this->db->join($strJoinTable,$strJoinOn,'left');
			}
		}
		if(!empty($arrOr))
		{
			$this->db->or_where($arrOr);
		}
		$this->db->from($this->strTable);
		
		return $this->db->count_all_results();
	}
	
	function selectOr($arrWhere=array(),$arrOrderBy=array(),$intLimit=0,$intOffset=0,$arrField=array(),$arrOr=array())
	{
		if(empty($arrField))
		{
			$strField='*';
		}
		else
		{
			$strField=implode(",",$arrField);
		}
		$this->db->select($strField);
		$this->db->from($this->strTable);
		if(!empty($arrWhere))
		{
			$this->db->where($arrWhere);
		}
		if(!empty($arrOrderBy))
		{
			foreach ($arrOrderBy as $strKey=>$strVal)
			{
				$this->db->order_by($strKey,$strVal);
			}
		}
		if($intLimit>0)
		{
			$this->db->limit($intLimit,$intOffset);
		}
		if(!empty($arrOr))
		{
			$strTempOr=array();
			foreach ($arrOr as $strKey=>$strVal)
			{
				$strTempOr[]=$strKey.$strVal;
			}
//			$this->db->where('('.implode(' OR ',$strTempOr).')','');
			$this->db->or_where($arrOr);
		}
		$ObjResult=$this->db->get();
		$arrResult=array();
		foreach ($ObjResult->result_array() as $arrRow)
		{
			$arrResult[]=$arrRow;
		}
		return $arrResult;
	}
}
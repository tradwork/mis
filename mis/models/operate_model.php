<?php
class Operate_model extends Common_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Operaterecord_model','operate');
	}

	function cleanData($arrParam)
	{
		$arrWhere=array('or_itemid'=>$arrParam['or_itemid'],'or_status'=>1);
		$this->operate->delete($arrWhere);
	}
	
	function insertFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->cleanData($arrParam);
			$this->operate->insert($arrParam);
			$this->db->trans_commit();
		}
		catch (Exception $e)
		{
			$this->db->trans_rollback();
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
			return false;
		}
		return true;
	}

	function updateFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			if(!empty($arrParam))
			{
				$this->operate->update($arrParam);
			}
			$this->db->trans_commit();
		}
		catch (Exception $e)
		{
			$this->db->trans_rollback();
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
			return false;
		}
		return true;
	}


	function normalSearch($arrParam)
	{
		try
		{
			$arrData=$this->operate->select($arrParam);
			return $arrData;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}
	
	function convertSearchTime($arrParam,&$arrWhere)
	{
		if(isset($arrParam['search_starttime']) && $arrParam['search_starttime']!='')
		{
			$arrWhere[$arrParam['search_time'].' >=']=strtotime($arrParam['search_starttime']);
		}
		if(isset($arrParam['search_endtime']) && $arrParam['search_endtime']!='')
		{
			$arrWhere[$arrParam['search_time'].' <=']=strtotime($arrParam['search_endtime'])+QUKU_DAY_SECONDS - 1;
		}
	}

	function convertSearchParam($arrParam)
	{
		$arrDbParam=parent::convertSearchParam($arrParam);
		if(isset($arrParam['search_audit_flag']) && $arrParam['search_audit_flag']!=3)
		{
			$arrDbParam['where'][$this->strFieldPrefix.'status']=$arrParam['search_audit_flag'];
		}
		if(isset($arrParam['search_type']))
		{
			$arrDbParam['where'][$this->strFieldPrefix.'type']=$arrParam['search_type'];
		}
		return $arrDbParam;
	}
	
	
	function listSearch($arrParam)
	{
		try
		{
			$arrResult=array();
			$arrParam=$this->convertSearchParam($arrParam);
			if($arrParam['count']==1)
			{
				$intCount=$this->operate->selectCount($arrParam['where']);
				$arrResult['count']=$intCount;
			}
			$arrData=$this->operate->select($arrParam['where'],$arrParam['order'],$arrParam['sort'],$arrParam['limit'],$arrParam['offset']);
			$arrResult['data']=$arrData;
			return $arrResult;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}
}

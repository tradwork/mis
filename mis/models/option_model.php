<?php
class Option_model extends Common_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Optionsdic_model','option');
	}

	function insertFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->option->insert($arrParam[$this->option->strTable]);
			$this->db->trans_commit();
			return true;
		}
		catch (Exception $e)
		{
			$this->db->trans_rollback();
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
			return false;
		}
	}

	function updateFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			if(!empty($arrParam[$this->option->strTable]))
			{
				$this->option->update($arrParam[$this->option->strTable]);
			}
			$this->db->trans_commit();
			return true;
		}
		catch (Exception $e)
		{
			$this->db->trans_rollback();
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
			return false;
		}
	}


	function getFormData($intGlobalId)
	{
		try
		{
			$arrResult=array();
			$arrParam[$this->option->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->option->select($arrParam);
			$arrResult[$this->option->strTable]=$arrBaseData[0];
			return $arrResult;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}
	
	function normalSearch($arrParam)
	{
		try
		{
			$arrData=$this->option->select($arrParam);
			return $arrData;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}
	
	function deleteItem($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			if(!empty($arrParam))
			{
				$this->option->delete($arrParam);
			}
			$this->db->trans_commit();
			return true;
		}
		catch (Exception $e)
		{
			$this->db->trans_rollback();
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
			return false;
		}
	}
	
	function listSearch($arrParam)
	{
		try
		{
			$arrResult=array();
			$arrParam=$this->convertSearchParam($arrParam);
			if($arrParam['count']==1)
			{
				$intCount=$this->option->selectCount($arrParam['where']);
				$arrResult['count']=$intCount;
			}
			$arrData=$this->option->select($arrParam['where'],$arrParam['order'],$arrParam['sort'],$arrParam['limit'],$arrParam['offset']);
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

<?php
class User_model extends Common_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Userbase_model','userbase');
	}

	function insertFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			if(!empty($arrParam[$this->userbase->strTable]))
			{
				$this->userbase->insert($arrParam[$this->userbase->strTable]);
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

	function updateFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			if(!empty($arrParam[$this->userbase->strTable]))
			{
				$this->userbase->update($arrParam[$this->userbase->strTable]);
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
			$arrParam[$this->userbase->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->userbase->select($arrParam);
			$arrResult[$this->userbase->strTable]=$arrBaseData[0];
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
			$arrData=$this->userbase->select($arrParam);
			return $arrData;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}
	
	function updateDelFlag($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->userbase->update($arrParam);
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
	
	
	function listSearch($arrParam)
	{
		try
		{
			$arrResult=array();
			$arrParam=$this->convertSearchParam($arrParam);
			if($arrParam['count']==1)
			{
				$intCount=$this->userbase->selectCount($arrParam['where']);
				$arrResult['count']=$intCount;
			}
			$arrData=$this->userbase->select($arrParam['where'],$arrParam['order'],$arrParam['sort'],$arrParam['limit'],$arrParam['offset']);
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
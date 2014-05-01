<?php
class Openuser_model extends Common_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Openusertable_model','ouser');
		$this->load->model('table/Openusermaterialtable_model','oum');
	}

	function convertConditionParam($arrParam)
	{
		$arrWhereAnd=array();
		$arrWhereOr=array();
		if(isset($arrParam['all']))
		{
			$arrWhereOr=array(
			'ou_id'=>$arrParam['all'],
			'ou_company like '=>'%'.$arrParam['all'].'%',
			'ou_legal_rep like '=>'%'.$arrParam['all'].'%',
			'ou_contact_name like '=>'%'.$arrParam['all'].'%',
			);
			unset($arrParam['all']);
		}
		foreach ($arrParam as $strKey=>$strVal)
		{
			if($strKey=='ou_jointime')
			{
				$intTime=strtotime(date("Y-m-d"));
				if($arrParam['ou_jointime']==0)
				{
					$strStartTime=date("Y-m-d H:i:s",$intTime);
					$strEndTime=date("Y-m-d H:i:s",$intTime+QUKU_DAY_SECONDS-1);
				}
				else
				{
					$strEndTime=date("Y-m-d H:i:s",$intTime+QUKU_DAY_SECONDS-1);
					$strStartTime=date("Y-m-d H:i:s",$intTime-QUKU_WEEK_SECONDS+QUKU_DAY_SECONDS+1);
				}
				$arrWhereAnd['ou_jointime >=']=$strStartTime;
				$arrWhereAnd['ou_jointime <=']=$strEndTime;
			}
			else
			{
				$arrWhereAnd[$strKey]=$strVal;
			}
		}
		return array('and'=>$arrWhereAnd,'or'=>$arrWhereOr);
	}

	function _has_operator($str)
	{

		$str = trim($str);
		if ( ! preg_match("/(\s|<|>|!|=|is null|is not null)/i", $str))
		{
			return FALSE;
		}

		return TRUE;
	}

	function compileWhere($arrWhere,$strType=' AND ')
	{
		$arrCondition=array();
		foreach ($arrWhere as $strKey=>$strVal)
		{
			if($this->_has_operator($strKey))
			{
				$arrCondition[]=$strKey.' "'.$this->db->escape_str($strVal).'"';
			}
			else
			{
				$arrCondition[]=$strKey.' = "'.$this->db->escape_str($strVal).'"';
			}
		}
		return implode($strType,$arrCondition);
	}


	function listSearch($arrConditionParam,$arrOrderParam,$arrPageParam)
	{
		try
		{
			$arrResult=array();
			$arrConditionParam=$this->convertConditionParam($arrConditionParam);
			$arrCondition=array();
			$strSql='select count(*) from quku_open_user where ';
			$strSqlWhereAnd=$this->compileWhere($arrConditionParam['and'],' AND ');
			$strSqlWhereOr=$this->compileWhere($arrConditionParam['or'],' OR ');
			if(!empty($strSqlWhereOr))
			{
				$strSqlWhereOr=' AND ('.$strSqlWhereOr.')';
			}
			$ObjResult=$this->db->query($strSql.$strSqlWhereAnd.' '.$strSqlWhereOr);
			foreach($ObjResult->result_array() as $arrRow)
			{
				$arrResult['count']=$arrRow['count(*)'];
			}
			$arrOrder=array();
			foreach ($arrOrderParam as $strKey=>$strVal)
			{
				$arrOrder[]=$strKey.' '.$strVal;
			}
			$strSql='select * from quku_open_user where '.$strSqlWhereAnd.' '.$strSqlWhereOr.' order by '.implode(",",$arrOrder).' limit '.$arrPageParam['offset'].','.$arrPageParam['limit'];
			$ObjResult=$this->db->query($strSql);
			foreach ($ObjResult->result_array() as $arrRow)
			{
				$arrResult['data'][]=$arrRow;
			}
			return $arrResult;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}

	function getFormData($intGlobalId)
	{
		try
		{
			$arrResult=array();
			$arrParam[$this->ouser->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->ouser->select($arrParam);
			$arrResult[$this->ouser->strTable]=$arrBaseData[0];
			$arrRow=$this->oum->select(array('oum_user_id'=>$intGlobalId));
			if(empty($arrRow))
			{
				$arrResult[$this->oum->strTable]=array();
			}
			else
			{
				$arrResult[$this->oum->strTable]=current($arrRow);
			}
			return $arrResult;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}

	function updateStatus($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->ouser->update($arrParam);
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

	function normalSearch($arrParam=array())
	{
		return $this->ouser->select($arrParam);
	}
}

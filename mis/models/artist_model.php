<?php
class Artist_model extends Common_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Artistsbase_model','artistbase');
	}

	function checkNameChange($intId,$strNewName)
	{
		$arrData=$this->artistbase->select(array('ab_globalid'=>$intId));
		if(empty($arrData))
		{
			return false;
		}
		if(strcmp($arrData[0]['ab_name'],$strNewName)==0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}


	function insertFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->load->model('table/Sysglobalid_model','globalid');
			$intGlobalId=$this->globalid->insert(array('sg_type'=>QUKU_TYPE_ARTIST));
			$arrParam[$this->artistbase->strTable][$this->artistbase->strPrimaryKey]=$intGlobalId;
			$this->artistbase->insert($arrParam[$this->artistbase->strTable]);
			$this->insertPicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_ARTIST,$intGlobalId);
			$this->insertRelativeLink($arrParam[$this->rellink->strTable],QUKU_TYPE_ARTIST,$intGlobalId);
			$this->insertTagrel($arrParam[$this->taginforel->strTable],QUKU_TYPE_ARTIST,$intGlobalId);
			$this->db->trans_commit();
		}
		catch (Exception $e)
		{
			$this->db->trans_rollback();
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
			return false;
		}
		return $intGlobalId;
	}

	function updateFormData($arrParam)
	{
		try
		{
			$intGlobalId=$arrParam[$this->artistbase->strTable][$this->artistbase->strPrimaryKey];
			$this->db->trans_begin();
			if(isset($arrParam[$this->artistbase->strTable]['ab_name']) && $arrParam[$this->artistbase->strTable]['ab_name']!='')
			{
				if($this->checkNameChange($intGlobalId,$arrParam[$this->artistbase->strTable]['ab_name'])==true)
				{
					$this->worksref->update(array('awr_artist_name'=>$arrParam[$this->artistbase->strTable]['ab_name']),
					array('awr_artist_id'=>$intGlobalId));
				}
			}
			if(!empty($arrParam[$this->artistbase->strTable]))
			{
				$this->artistbase->update($arrParam[$this->artistbase->strTable]);
			}
			if(isset($arrParam[$this->pic->strTable]))
			{
				$this->updatePicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_ARTIST,$intGlobalId);
			}
			if(isset($arrParam[$this->rellink->strTable]))
			{
				$this->updateRelativeLink($arrParam[$this->rellink->strTable],QUKU_TYPE_ARTIST,$intGlobalId);
			}
			if(isset($arrParam[$this->taginforel->strTable]))
			{
				$this->updateTagrel($arrParam[$this->taginforel->strTable],QUKU_TYPE_ARTIST,$intGlobalId);
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

	function updateStatus($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->artistbase->update($arrParam);
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

	function updateDelFlag($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->artistbase->update($arrParam);
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

	function getFormData($intGlobalId)
	{
		try
		{
			$arrResult=array();
			$arrParam[$this->artistbase->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->artistbase->select($arrParam);
			$arrResult[$this->artistbase->strTable]=$arrBaseData[0];
			$arrResult[$this->pic->strTable]=$this->selectPicByForeignKey($intGlobalId);
			$arrResult[$this->rellink->strTable]=$this->selectRelativeLinkByForeignKey($intGlobalId);
			$arrResult[$this->taginforel->strTable]=$this->selectTagrelByForeignKey($intGlobalId);
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
			$arrData=$this->artistbase->select($arrParam);
			return $arrData;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}

	function convertJoinParam($arrParam)
	{
		$arrJoinParam=array();
		if(isset($arrParam['where']['ti_tagid']))
		{
			$arrJoinParam['quku_tag_info_rel']='quku_artists_base.ab_globalid=quku_tag_info_rel.ti_infoid';
		}
		return $arrJoinParam;
	}
	
	function listSearch($arrParam)
	{
		try
		{
			$arrResult=array();
			$arrParam=$this->convertSearchParam($arrParam);
			$arrParam['join']=$this->convertJoinParam($arrParam);
			if($arrParam['count']==1)
			{
				$intCount=$this->artistbase->selectCount($arrParam['where'],$arrParam['join']);
				$arrResult['count']=$intCount;
			}
			$arrData=$this->artistbase->joinSelect($arrParam['where'],$arrParam['order'],$arrParam['sort'],$arrParam['limit'],$arrParam['offset'],$arrParam['join']);
			$arrResult['data']=$arrData;
			return $arrResult;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}

	function addArtist($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->load->model('table/Sysglobalid_model','globalid');
			$intGlobalId=$this->globalid->insert(array('sg_type'=>QUKU_TYPE_ARTIST));
			$arrParam[$this->artistbase->strPrimaryKey]=$intGlobalId;
			$this->artistbase->insert($arrParam);
			$this->db->trans_commit();
		}
		catch (Exception $e)
		{
			$this->db->trans_rollback();
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
			return false;
		}
		return $intGlobalId;
	}
}

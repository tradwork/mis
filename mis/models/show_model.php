<?php
class Show_model extends Common_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Showsnews_model','show');
	}

	function insertFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->load->model('table/Sysglobalid_model','globalid');
			$intGlobalId=$this->globalid->insert(array('sg_type'=>QUKU_TYPE_SHOW));
			$arrParam[$this->show->strTable][$this->show->strPrimaryKey]=$intGlobalId;
			$this->show->insert($arrParam[$this->show->strTable]);
			$this->insertPicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_SHOW,$intGlobalId);
			$this->insertArtistworksref($arrParam[$this->worksref->strTable],QUKU_TYPE_SHOW,$intGlobalId);
			$this->insertRelativeLink($arrParam[$this->rellink->strTable],QUKU_TYPE_ARTIST,$intGlobalId);
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
			$intGlobalId=$arrParam[$this->show->strTable][$this->show->strPrimaryKey];
			if(!empty($arrParam[$this->show->strTable]))
			{
				$this->show->update($arrParam[$this->show->strTable]);
			}
			if(isset($arrParam[$this->pic->strTable]))
			{
				$this->updatePicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_SHOW,$intGlobalId);
			}
			if(isset($arrParam[$this->worksref->strTable]))
			{
				$this->updateArtistworksref($arrParam[$this->worksref->strTable],QUKU_TYPE_SHOW,$intGlobalId);
			}
			if(isset($arrParam[$this->rellink->strTable]))
			{
				$this->updateRelativeLink($arrParam[$this->rellink->strTable],QUKU_TYPE_ARTIST,$intGlobalId);
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
			$this->show->update($arrParam);
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
			$this->show->update($arrParam);
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
			$arrParam[$this->show->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->show->select($arrParam);
			$arrResult[$this->show->strTable]=$arrBaseData[0];
			$arrResult[$this->worksref->strTable]=$this->selectWorksrefByForeignKey($intGlobalId);
			$arrResult[$this->pic->strTable]=$this->selectPicByForeignKey($intGlobalId);
			$arrResult[$this->rellink->strTable]=$this->selectRelativeLinkByForeignKey($intGlobalId);
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
			$arrData=$this->show->select($arrParam);
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
		if(isset($arrParam['where']['awr_artist_name']) || isset($arrParam['where']['awr_artist_name like']))
		{
			$arrJoinParam['quku_artist_works_ref']='quku_shows_news.sn_globalid=quku_artist_works_ref.awr_itemid';
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
				$intCount=$this->show->selectCount($arrParam['where']);
				$arrResult['count']=$intCount;
			}
			$arrData=$this->show->joinSelect($arrParam['where'],$arrParam['order'],$arrParam['sort'],$arrParam['limit'],$arrParam['offset'],$arrParam['join']);
			$this->getExtraListField($arrData);
			$arrResult['data']=$arrData;
			return $arrResult;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}
	
	function getExtraListField(&$arrData)
	{
		$arrId=array();
		foreach ($arrData as $intKey=>$arrVal)
		{
			$arrData[$intKey]['quku_artist_works_ref']=$this->selectWorksrefByForeignKey($arrVal['sn_globalid']);
		}
	}
	
}

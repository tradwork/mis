<?php
class Mv_model extends Common_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Mvinfo_model','mv');
		$this->load->model('table/Videoinfo_model','video');
		$this->load->model('table/Videofiles_model','videofiles');
		$this->load->model("video_model","videos");
		/* $this->load->model('table/Songsinfo_model','songsinfo'); */

	}

	function insertFormData($arrParam)
	{
	        try
		{
			$this->db->trans_begin();
			$this->load->model('table/Sysglobalid_model','globalid');
			if($arrParam[$this->mv->strTable])
			{
			    $intGlobalId=$this->globalid->insert(array('sg_type'=>QUKU_TYPE_MV));
			    $arrParam[$this->mv->strTable][$this->mv->strPrimaryKey]=$intGlobalId;
			    $this->mv->insert($arrParam[$this->mv->strTable]);
			}
			if($arrParam[$this->worksref->strTable])
			{
			    $this->insertArtistworksref($arrParam[$this->worksref->strTable],QUKU_TYPE_MV,$intGlobalId);
			}
			if($arrParam[$this->mvref->strTable])
			{
			    $this->insertMvref($arrParam[$this->mvref->strTable],QUKU_TYPE_MV,$intGlobalId);
			}
			if($arrParam[$this->video->strTable])
			{
			    foreach($arrParam[$this->video->strTable] as $v)
			    {
				$arrVideo = array();
				$arrVideo[$this->pic->strTable] = $v[$this->pic->strTable];
				$arrVideo[$this->videofiles->strTable] = $v[$this->videofiles->strTable];
				unset($v[$this->pic->strTable]);
				unset($v[$this->videofiles->strTable]);
				$arrVideo[$this->video->strTable] = $v;
				$arrVideo[$this->video->strTable]["vi_mv_id"] = $intGlobalId;
				$this->videos->insertFormData($arrVideo);
			    }
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
		return $intGlobalId;
	}

	function updateFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$intGlobalId=$arrParam[$this->mv->strTable][$this->mv->strPrimaryKey];
			if(!empty($arrParam[$this->mv->strTable]))
			{
				$this->mv->update($arrParam[$this->mv->strTable]);
			}
			if(isset($arrParam[$this->worksref->strTable]))
			{
				$this->updateArtistworksref($arrParam[$this->worksref->strTable],QUKU_TYPE_MV,$intGlobalId);
			}
			if($arrParam[$this->mvref->strTable])
			{
			    $this->updateMvref($arrParam[$this->mvref->strTable],QUKU_TYPE_MV,$intGlobalId);
			}
			if($arrParam[$this->video->strTable])
			{
			    foreach($arrParam[$this->video->strTable] as $v)
			    {
				$arrVideo = array();
				$arrVideo[$this->video->strTable] = $v[$this->video->strTable];
				$arrVideo[$this->pic->strTable] = $v[$this->pic->strTable];
				$arrVideo[$this->videofiles->strTable] = $v[$this->videofiles->strTable];
				if(isset($arrVideo[$this->video->strTable][$this->video->strPrimaryKey]) && $arrVideo[$this->video->strTable][$this->video->strPrimaryKey])
				{
				     $this->videos->updateFormData($arrVideo);				     
				}
				else
				{
				     $arrVideo[$this->video->strTable]["vi_mv_id"] = $intGlobalId;
				     $this->videos->insertFormData($arrVideo);
				}
			    }
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
			$this->mv->update($arrParam);
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

	function updateProhibitType($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->mv->update($arrParam);
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
			$this->mv->update($arrParam);
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
			$arrParam[$this->mv->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->mv->select($arrParam);
			$arrResult[$this->mv->strTable]=$arrBaseData[0];
			$arrResult[$this->pic->strTable]=$this->selectPicByForeignKey($intGlobalId);
			$arrResult[$this->worksref->strTable]=$this->selectWorksrefByForeignKey($intGlobalId);
			$arrResult[$this->mvref->strTable]=$this->selectMvrefByForeignKey($intGlobalId);
			$arrResult[$this->video->strTable]=$this->getVideoList($intGlobalId);
			return $arrResult;
		}
		catch (Exception $e)
		{
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
		}
	}

	function getVideoList($intAlbumId)
	{
		$arrResult=array();
		$arrData= $this->video->select(array('vi_mv_id'=>$intAlbumId,'vi_delflag'=>0));
		foreach ($arrData as $intKey=>$arrVal)
		{
			$arrResult[]=$this->videos->getFormData($arrVal['vi_globalid']);
		}
		return $arrResult;
	}

	function normalSearch($arrParam)
	{
		try
		{
			$arrData=$this->mv->select($arrParam);
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
			$arrJoinParam['quku_artist_works_ref']='quku_mv_info.mi_globalid=quku_artist_works_ref.awr_itemid';
		}
		if(isset($arrParam['where']['vi_provider']))
		{
			$arrJoinParam['quku_video_info']='quku_mv_info.mi_globalid=quku_video_info.vi_mv_id';
		}
		if(isset($arrParam['where']['vi_source_path']))
		{
			$arrJoinParam['quku_video_info']='quku_mv_info.mi_globalid=quku_video_info.vi_mv_id';
		}
		if(isset($arrParam['where']['mr_itemid']))
		{
			$arrJoinParam['quku_mv_ref']='quku_mv_ref.mr_mv_id = quku_mv_info.mi_globalid';
		}

		return $arrJoinParam;
	}

	function convertSearchwhereParam($arrParam,$arrWhere)
	{
		if(isset($arrParam['search_provider']) && $arrParam['search_provider'] != 0)
		{
			$arrWhere['vi_provider']= $arrParam['search_provider'];
		}

		return $arrWhere;
	}


	function listSearch($arrParam)
	{
		try
		{
			$arrResult=array();
			$arrTempParam = $arrParam;
			$arrParam=$this->convertSearchParam($arrParam);
			$arrParam['where']=$this->convertSearchwhereParam($arrTempParam, $arrParam['where']);
			$arrParam['join']=$this->convertJoinParam($arrParam);
			if($arrParam['count']==1)
			{
				$intCount=$this->mv->selectCount($arrParam['where'],$arrParam['join']);
				$arrResult['count']=$intCount;
			}
			$arrData=$this->mv->joinSelect($arrParam['where'],$arrParam['order'],$arrParam['sort'],$arrParam['limit'],$arrParam['offset'],$arrParam['join']);
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
		    $arrData[$intKey]['video_num']=$this->videofiles->selectCount(array("vi_mv_id"=>$arrVal["mi_globalid"],"vi_delflag"=>0),array($this->video->strTable => $this->video->strPrimaryKey . "=" . "vf_videoinfo_id"));
		    $arrData[$intKey]['quku_artist_works_ref']=$this->selectWorksrefByForeignKey($arrVal['mi_globalid']);

		}
	}

}

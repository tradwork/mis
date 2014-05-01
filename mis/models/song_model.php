<?php
class Song_model extends Common_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Songsinfo_model','song');
	}

	function getDis(&$arrParam){
	    if(isset($arrParam[$this->song->strTable]["si_distribution"])){
		$dis = array();
		$arrParam[$this->song->strTable]["si_distribution"] = json_decode($arrParam[$this->song->strTable]["si_distribution"],true);
		foreach($arrParam[$this->song->strTable]["si_distribution"] as $duan){
		    if(is_array($duan))
		    {
			$duan_dis = array();
			foreach($duan as $k => $v){
			    if(!is_numeric($k)) continue;
			    $duan_dis[] = strlen($v) ? $v : "1";
			}
			$dis[] = implode("",$duan_dis);
		    }else
		    {
			$dis[] = $duan;
		    }
		}
		$arrParam[$this->song->strTable]["si_distribution"] = json_encode((object)$dis);
	    }
	}


	function getAlbumName(&$arrParam)
	{
		$this->load->model('table/Albumsinfo_model','albumsinfo');
		if(!isset($arrParam[$this->song->strTable]['si_album_id']) || $arrParam[$this->song->strTable]['si_album_id']<=0)
		{
			return false;
		}
		$intAlbumId=$arrParam[$this->song->strTable]['si_album_id'];
		$arrInfo=$this->albumsinfo->select(array($this->albumsinfo->strPrimaryKey=>$intAlbumId));
		if(empty($arrInfo) || empty($arrInfo[0]['ai_album']))
		{
			return false;
		}
		$arrParam[$this->song->strTable]['si_album']=$arrInfo[0]['ai_album'];
	}


	function insertFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->load->model('table/Sysglobalid_model','globalid');
			$intGlobalId=$this->globalid->insert(array('sg_type'=>QUKU_TYPE_SONG));
			$arrParam[$this->song->strTable][$this->song->strPrimaryKey]=$intGlobalId;
			$this->getDis($arrParam);
			$this->getAlbumName($arrParam);
			$this->song->insert($arrParam[$this->song->strTable]);
			$this->insertPicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_SONG,$intGlobalId);
			$this->insertArtistworksref($arrParam[$this->worksref->strTable],QUKU_TYPE_SONG,$intGlobalId);
			$this->insertTagrel($arrParam[$this->taginforel->strTable],QUKU_TYPE_SONG,$intGlobalId);
			$this->insertMedia($arrParam[$this->media->strTable],$intGlobalId);
			$this->insertLrc($arrParam[$this->lrc->strTable],$intGlobalId);
			$this->insertCopyright($arrParam[$this->copyright->strTable],$intGlobalId);
            if($arrParam[$this->song->strTable]["si_cluster_id"]){
                $this->insertCluster($arrParam[$this->clusterinfo->strTable],$arrParam[$this->song->strTable["si_cluster_id"]]);                
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
			$intGlobalId=$arrParam[$this->song->strTable][$this->song->strPrimaryKey];
			if(!empty($arrParam[$this->song->strTable]))
			{
				$this->getAlbumName($arrParam);
				$this->getDis($arrParam);
				$this->updateProhibitInfo($arrParam);
				$this->song->update($arrParam[$this->song->strTable]);
			}
			if(isset($arrParam[$this->pic->strTable]))
			{
				$this->updatePicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_SONG,$intGlobalId);
			}
			if(isset($arrParam[$this->worksref->strTable]))
			{
				$this->updateArtistworksref($arrParam[$this->worksref->strTable],QUKU_TYPE_SONG,$intGlobalId);
			}
			if(isset($arrParam[$this->media->strTable]))
			{
				$this->updateMedia($arrParam[$this->media->strTable],$intGlobalId);
			}
			if(isset($arrParam[$this->lrc->strTable]))
			{
				$this->updateLrc($arrParam[$this->lrc->strTable],$intGlobalId);
			}
			if(isset($arrParam[$this->copyright->strTable]))
			{
				$this->updateCopyright($arrParam[$this->copyright->strTable],$intGlobalId);
			}
			if(isset($arrParam[$this->taginforel->strTable]))
			{
				$this->updateTagrel($arrParam[$this->taginforel->strTable],QUKU_TYPE_SONG,$intGlobalId);
			}
            if(isset($arrParam[$this->clusterinfo->strTable]))
            {
                $this->updateCluster($arrParam[$this->clusterinfo->strTable]);
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
			$this->song->update($arrParam);
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
			$this->song->update($arrParam);
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
			$this->song->update($arrParam);
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

	function updateProhibitInfo(&$arrData)
	{
	  if($arrData[$this->song->strTable]["si_prohibit_type"] < 1) return True;
	  $arrWhere=array($this->song->strPrimaryKey=>$arrData[$this->song->strTable][$this->song->strPrimaryKey]);
	  $Prohibit = $this->song->select($arrWhere);
	  $oldProhibit = $Prohibit[0]["si_prohibit_info"];
	  if($Prohibit[0]["si_prohibit_type"] == $arrData[$this->song->strTable]["si_prohibit_type"]) return True;
	  $oldProhibit = json_decode($oldProhibit,true);
	  if(!is_array($oldProhibit)){
	    $oldProhibit = array("edit_user"=>$_SESSION['QUKU_USER']['ub_username']);
	  }else{
	    $oldProhibit["edit_user"]=$_SESSION['QUKU_USER']['ub_username'];
	  }
	  $arrData[$this->song->strTable]["si_prohibit_info"] = json_encode($oldProhibit);
	  return true;
	}

	function getFormData($intGlobalId)
	{
		try
		{
			$arrResult=array();
			$arrParam[$this->song->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->song->select($arrParam);
			$arrResult[$this->song->strTable]=$arrBaseData[0];
			$arrResult[$this->pic->strTable]=$this->selectPicByForeignKey($intGlobalId);
			$arrResult[$this->worksref->strTable]=$this->selectWorksrefByForeignKey($intGlobalId);
			$arrResult[$this->media->strTable]=$this->selectMediaByForeignKey($intGlobalId);
			$arrResult[$this->lrc->strTable]=$this->selectLrcByForeignKey($intGlobalId);
			$arrResult[$this->copyright->strTable]=$this->selectCopyrightByForeignKey($intGlobalId);
			$arrResult[$this->taginforel->strTable]=$this->selectTagrelByForeignKey($intGlobalId);
			$arrResult[$this->clusterinfo->strTable]=array_pop($this->selectClusterinfo($arrBaseData[0]["si_cluster_id"]));
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
			$arrData=$this->song->select($arrParam);
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
		if(isset($arrParam['where']['sf_globalid']) || isset($arrParam['where']['sf_globalid like']))
		{
			$arrJoinParam['quku_songs_files']='quku_songs_info.si_globalid=quku_songs_files.sf_song_id';
		}
		if(isset($arrParam['where']['sf_fpid']) || isset($arrParam['where']['sf_fpid like']))
		{
			$arrJoinParam['quku_songs_files']='quku_songs_info.si_globalid=quku_songs_files.sf_song_id';
		}
		if(isset($arrParam['where']['awr_artist_name']) || isset($arrParam['where']['awr_artist_name like']))
		{
			$arrJoinParam['quku_artist_works_ref']='quku_songs_info.si_globalid=quku_artist_works_ref.awr_itemid';
		}
		if(isset($arrParam['where']['ti_tagid']))
		{
			$arrJoinParam['quku_tag_info_rel']='quku_songs_info.si_globalid=quku_tag_info_rel.ti_infoid';
		}
		return $arrJoinParam;
	}

	function convertSearchwhereParam($arrParam,$arrWhere)
	{
		if(isset($arrParam['search_prohibit']) && $arrParam['search_prohibit']!=5)
		{
			$arrWhere['si_prohibit_type']=$arrParam['search_prohibit'];
		}

		return $arrWhere;

	}

	function convertSearchParam($arrParam)
	{
		$arrTempParam = $arrParam;
		$arrParam=parent::convertSearchParam($arrParam);
		$arrParam['where']=$this->convertSearchwhereParam($arrTempParam, $arrParam['where']);
		$this->convertSearchTag($arrParam['where']);
		return $arrParam;
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
				$intCount=$this->song->selectCount($arrParam['where'],$arrParam['join']);
				$arrResult['count']=$intCount;
			}
			$arrData=$this->song->joinSelect($arrParam['where'],$arrParam['order'],$arrParam['sort'],$arrParam['limit'],$arrParam['offset'],$arrParam['join']);
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
			$arrData[$intKey]['media_num']=$this->media->selectCount(array('sf_song_id'=>$arrVal['si_globalid']));
			$arrData[$intKey]['quku_artist_works_ref']=$this->selectWorksrefByForeignKey($arrVal['si_globalid']);
		}
	}
}

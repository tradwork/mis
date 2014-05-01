<?php
class Album_model extends Common_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Albumsinfo_model','album');
		$this->load->model('table/Songsinfo_model','songsinfo');
		$this->load->model("song_model","album_song");
	}

	function updateSongList($arrParam)
	{
		if(empty($arrParam['quku_songs_list']))
		{
			return;
		}
		$arrData=array();
		$arrAlbumField=array('ai_album'=>'si_album','ai_globalid'=>'si_album_id');

		foreach ($arrParam['quku_songs_list'] as $arrVal)
		{
			foreach ($arrAlbumField as $strAblumField=>$strSongField)
			{
				if(isset($arrParam[$this->album->strTable][$strAblumField]) && $arrParam[$this->album->strTable][$strAblumField]!='')
				{
					$arrVal['quku_songs_info'][$strSongField]=$arrParam[$this->album->strTable][$strAblumField];
				}
			}
			$this->album_song->getDis($arrVal);
			$this->songsinfo->update($arrVal['quku_songs_info'],array('si_globalid'=>$arrVal['quku_songs_info']['si_globalid']));
		}
	}

	function updateSongDelFlag($arrParam)
	{

		$arrSongParam=array(
		'si_edituser'=>$arrParam['ai_edituser'],
		'si_delflag'=>$arrParam['ai_delflag'],
		);
		$this->songsinfo->update($arrSongParam,array('si_album_id'=>$arrParam['ai_globalid']));
	}

	function getSongList($intAlbumId)
	{
		$arrResult=array();
		$this->load->model('song_model');
		$arrData= $this->songsinfo->select(array('si_album_id'=>$intAlbumId,'si_delflag'=>0),'si_album_no');
		foreach ($arrData as $intKey=>$arrVal)
		{
			$arrResult[]=$this->song_model->getFormData($arrVal['si_globalid']);
		}
		return $arrResult;
	}

	function isZongyi($arrParam)
	{
	    $this->load->model("yingshi_model");
	    $strAlbumName = $arrParam[$this->album->strTable]["ai_album"];
	    $intAlbumId = $arrParam[$this->album->strTable]["ai_globalid"];
	    if(!$strAlbumName) return FALSE;
	    $arrCheckType = config_item("album_check_type");
	    if(!$arrCheckType) return False;
	    foreach($arrCheckType as $intType => $strType)
	    {
		$arrYingShi = $this->yingshi_model->normalSearch(array("yi_type" => $intType,"yi_title"=>$strAlbumName));
		if($arrYingShi)
		{
		    if($intAlbumId)
		    {
			foreach($arrYingShi as $arrVal)
			{
			    $arrRef = $this->yingshi_model->selectYingshirefByForeignKey($arrVal["yi_globalid"]);
			    foreach($arrRef as $arrValue)
			    {
				if($arrValue["yr_itemid"] == $intAlbumId)
				{
				    return False;
				}
			    }
			    return "$strAlbumName 可能与【".$strType."】:".$arrVal["yi_title"]."有关联，但没有建立关联关系";
			}
		    }
		    else
		    {
			return "$strAlbumName 可能与【".$strType."】:".$arrVal["yi_title"]."有关联，请不要忘记建立关联关系";
		    }
		}
		else
		{
		    $arrYingShi = $this->yingshi_model->normalSearch(array("yi_type" => $intType));
		    if(!$arrYingShi) return False;
		    foreach($arrYingShi as $arrVal)
		    {
			if(strstr($strAlbumName,$arrVal["yi_title"]))
			{
			    return "$strAlbumName 可能与【".$strType."】:".$arrVal["yi_title"]."有关系，但没有创建【".$strType."】:".$strAlbumName;
			}
		    }
		}
	    }
	    return False;
	}

	function insertFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->load->model('table/Sysglobalid_model','globalid');
			$intGlobalId=$this->globalid->insert(array('sg_type'=>QUKU_TYPE_ALBUM));
			$arrParam[$this->album->strTable][$this->album->strPrimaryKey]=$intGlobalId;
			$this->album->insert($arrParam[$this->album->strTable]);
			$this->insertPicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_ALBUM,$intGlobalId);
			$this->insertArtistworksref($arrParam[$this->worksref->strTable],QUKU_TYPE_ALBUM,$intGlobalId);
			$this->insertTagrel($arrParam[$this->taginforel->strTable],QUKU_TYPE_ALBUM,$intGlobalId);
			$this->updateSongList($arrParam);
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
			$intGlobalId=$arrParam[$this->album->strTable][$this->album->strPrimaryKey];
			if(!empty($arrParam[$this->album->strTable]))
			{
				$this->album->update($arrParam[$this->album->strTable]);
			}
			if(isset($arrParam[$this->pic->strTable]))
			{
				$this->updatePicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_ALBUM,$intGlobalId);
			}
			if(isset($arrParam[$this->worksref->strTable]))
			{
				$this->updateArtistworksref($arrParam[$this->worksref->strTable],QUKU_TYPE_ALBUM,$intGlobalId);
			}
			if(isset($arrParam[$this->taginforel->strTable]))
			{
				$this->updateTagrel($arrParam[$this->taginforel->strTable],QUKU_TYPE_ALBUM,$intGlobalId);
			}
			$this->updateSongList($arrParam);
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
			$this->album->update($arrParam);
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
			$this->album->update($arrParam);
			$this->updateSongDelFlag($arrParam);
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
			$arrParam[$this->album->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->album->select($arrParam);
			$arrResult[$this->album->strTable]=$arrBaseData[0];
			$arrResult[$this->pic->strTable]=$this->selectPicByForeignKey($intGlobalId);
			$arrResult[$this->worksref->strTable]=$this->selectWorksrefByForeignKey($intGlobalId);
			$arrResult[$this->taginforel->strTable]=$this->selectTagrelByForeignKey($intGlobalId);
			$arrResult['quku_songs_list']=$this->getSongList($intGlobalId);
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
			$arrData=$this->album->select($arrParam);
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
			$arrJoinParam['quku_artist_works_ref']='quku_albums_info.ai_globalid=quku_artist_works_ref.awr_itemid';
		}
		if(isset($arrParam['where']['ti_tagid']))
		{
			$arrJoinParam['quku_tag_info_rel']='quku_albums_info.ai_globalid=quku_tag_info_rel.ti_infoid';
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
				$intCount=$this->album->selectCount($arrParam['where'],$arrParam['join']);
				$arrResult['count']=$intCount;
			}
			$arrData=$this->album->joinSelect($arrParam['where'],$arrParam['order'],$arrParam['sort'],$arrParam['limit'],$arrParam['offset'],$arrParam['join']);
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
			$arrData[$intKey]['quku_artist_works_ref']=$this->selectWorksrefByForeignKey($arrVal['ai_globalid']);
		}
	}

}

<?php
class Video_model extends Common_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Videoinfo_model','video');
		/* $this->load->model('table/Songsinfo_model','songsinfo'); */
		/* $this->load->model("song_model","album_song"); */
		
	}

	function insertFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->load->model('table/Sysglobalid_model','globalid');
			if(isset($arrParam[$this->video->strTable]))
			{
			    $intGlobalId=$this->globalid->insert(array('sg_type'=>QUKU_TYPE_VIDEO));
			    $arrParam[$this->video->strTable][$this->video->strPrimaryKey]=$intGlobalId;
			    $this->video->insert($arrParam[$this->video->strTable]);
			}
			if(isset($arrParam[$this->pic->strTable]))
			{
			    $this->insertPicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_VIDEO,$intGlobalId);
			}
			if(isset($arrParam[$this->videofiles->strTable]))
			{
			    /* $this->getYinYueTai($arrParam[$this->videofiles->strTable],$arrParam[$this->video->strTable]['vi_provider'],$arrParam[$this->video->strTable]['vi_tvid']); */
			    foreach($arrParam[$this->videofiles->strTable] as $arrVideoFile)
			    {
				$intFileGlobalId=$this->globalid->insert(array('sg_type'=>QUKU_TYPE_VIDEO_FILE));
				$this->insertVideoFile($arrVideoFile,$intGlobalId,$intFileGlobalId);
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

	function getYinYueTai(&$arrParam,$intProvider,$intTvId)
	{
	    if(empty($arrParam))
	    {
		return False;
	    }
	    if($intProvider != 12)
	    {
		return False;
	    }
	    if(!$intTvId)
	    {
		return False;
	    }
	    foreach($arrParam as $arrVideoFile){
		$arrTemp = $arrVideoFile;
		if($arrTemp["vf_file_extension"] == "swf")
		{
		    $hasSwf = $arrVideoFile;
		    $arrTemp["vf_file_link"] = "http://player.yinyuetai.com/video/player/$intProvider/v_0.swf";
		}
		elseif($arrTemp["vf_file_extension"] == "mp4")
		{
		    $hasMp4 = $arrVideoFile;
		    $arrTemp["vf_file_link"] = "http://www.yinyuetai.com/mv/video-url/$intProvider";
		}
	    }
	    if(!$hasMp4)
	    {
		$arrParam[] = array("vf_file_link" => "http://www.yinyuetai.com/mv/video-url/$intProvider","vf_file_extension" =>"mp4");
	    }
	    if(!$hasSwf)
	    {
		$arrParam[] = array("vf_file_link" => "http://player.yinyuetai.com/video/player/$intProvider/v_0.swf","vf_file_extension" =>"swf");
	    }
	    return True;
	}

	function updateFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$intGlobalId=$arrParam[$this->video->strTable][$this->video->strPrimaryKey];
			if(!empty($arrParam[$this->video->strTable]))
			{
			    $this->video->update($arrParam[$this->video->strTable]);
			}
			if(isset($arrParam[$this->pic->strTable]))
			{
			    $this->updatePicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_VIDEO,$intGlobalId);
			}
			if(isset($arrParam[$this->videofiles->strTable]))
			{
			    /* $this->getYinYueTai($arrParam[$this->videofiles->strTable],$arrParam[$this->video->strTable]['vi_provider'],$arrParam[$this->video->strTable]['vi_tvid']); */
			    $this->load->model('table/Sysglobalid_model','globalid');
			    $this->videofiles->delete(array($this->videofiles->strForeignKey=>$intGlobalId));
			    foreach($arrParam[$this->videofiles->strTable] as $arrVideoFile)
			    {
				$intFileGlobalId=$this->globalid->insert(array('sg_type'=>QUKU_TYPE_VIDEO_FILE));
				$this->updateVideoFile($arrVideoFile,$intGlobalId,$intFileGlobalId);
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
			$this->video->update($arrParam);
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
			$this->video->update($arrParam);
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
			$arrParam[$this->video->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->video->select($arrParam);
			$arrResult[$this->video->strTable]=$arrBaseData[0];
			$arrResult[$this->pic->strTable]=$this->selectPicByForeignKey($intGlobalId);
			$arrResult[$this->videofiles->strTable]=$this->selectVideoFilesByForeignKey($intGlobalId);
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
			$arrData=$this->video->select($arrParam);
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
			$arrData[$intKey]['quku_artist_works_ref']=$this->selectWorksrefByForeignKey($arrVal['ai_globalid']);
		}
	}
}

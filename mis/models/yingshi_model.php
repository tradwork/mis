<?php
class Yingshi_model extends Common_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Yingshiinfo_model','yingshi');
		$this->load->model('table/Yingshiref_model','yingshiref');
	}

	function insertFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$this->load->model('table/Sysglobalid_model','globalid');
			$intGlobalId=$this->globalid->insert(array('sg_type'=>QUKU_TYPE_YINGSHI));
			$arrParam[$this->yingshi->strTable][$this->yingshi->strPrimaryKey]=$intGlobalId;
			$this->yingshi->insert($arrParam[$this->yingshi->strTable]);
			if(!empty($arrParam[$this->yingshiref->strTable]))
			{
			    $this->insertYingshiref($arrParam[$this->yingshiref->strTable],$intGlobalId);
			}
			if(!empty($arrParam[$this->pic->strTable]))
			{
			    $this->insertPicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_YINGSHI,$intGlobalId);
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
			$intGlobalId=$arrParam[$this->yingshi->strTable][$this->yingshi->strPrimaryKey];
			if(!empty($arrParam[$this->yingshi->strTable]))
			{
				$this->yingshi->update($arrParam[$this->yingshi->strTable]);
			}
			if(isset($arrParam[$this->yingshiref->strTable]))
			{
			    $this->updateYingshiref($arrParam[$this->yingshiref->strTable],$intGlobalId);
			}
			if(!empty($arrParam[$this->pic->strTable]))
			{
			    $this->updatePicInfo($arrParam[$this->pic->strTable],QUKU_TYPE_YINGSHI,$intGlobalId);
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
			$this->yingshi->update($arrParam);
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
			$this->yingshi->update($arrParam);
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
			$this->yingshi->update($arrParam);
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
			$arrParam[$this->yingshi->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->yingshi->select($arrParam);
			$arrResult[$this->yingshi->strTable]=$arrBaseData[0];
			$arrResult[$this->pic->strTable]=$this->selectPicByForeignKey($intGlobalId);
			$arrResult[$this->yingshiref->strTable]=$this->selectYingshirefByForeignKey($intGlobalId);
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
			$arrData=$this->yingshi->select($arrParam);
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
		if(isset($arrParam['where']['si_globalid']) || isset($arrParam['where']['si_globalid like']))
		{
		    $arrJoinParam['quku_yingshi_ref']='quku_yingshi_info.yi_globalid = quku_yingshi_ref.yr_ys_id';
		    $arrJoinParam['quku_songs_info']='quku_songs_info.si_globalid = quku_yingshi_ref.yr_itemid';
		}
		if(isset($arrParam['where']['si_title']) || isset($arrParam['where']['si_title like']))
		{
		    $arrJoinParam['quku_yingshi_ref']='quku_yingshi_info.yi_globalid = quku_yingshi_ref.yr_ys_id';
		    $arrJoinParam['quku_songs_info']='quku_songs_info.si_globalid = quku_yingshi_ref.yr_itemid';
		}
		if(isset($arrParam['where']['ai_album']) || isset($arrParam['where']['ai_album like']))
		{
		    $arrJoinParam['quku_yingshi_ref']='quku_yingshi_info.yi_globalid = quku_yingshi_ref.yr_ys_id';
		    $arrJoinParam['quku_albums_info']='quku_albums_info.ai_globalid = quku_yingshi_ref.yr_itemid';

		}
		if(isset($arrParam['where']['ai_globalid']) || isset($arrParam['where']['ai_globalid like']))
		{
		    $arrJoinParam['quku_yingshi_ref']='quku_yingshi_info.yi_globalid = quku_yingshi_ref.yr_ys_id';
		    $arrJoinParam['quku_albums_info']='quku_albums_info.ai_globalid = quku_yingshi_ref.yr_itemid';
		}
		if(isset($arrParam['where']['awr_artist_name']) || isset($arrParam['where']['awr_artist_name like']))
		{
		    $arrJoinParam['quku_yingshi_ref']='quku_yingshi_info.yi_globalid = quku_yingshi_ref.yr_ys_id';
		    $arrJoinParam['quku_artist_works_ref']='quku_yingshi_ref.yr_itemid = quku_artist_works_ref.awr_itemid';
		}
		/* if(isset($arrParam['where']['ti_tagid'])) */
		/* { */
		/* 	$arrJoinParam['quku_tag_info_rel']='quku_songs_info.si_globalid=quku_tag_info_rel.ti_infoid'; */
		/* } */
		return $arrJoinParam;
	}

	function convertSearchwhereParam($arrParam,$arrWhere)
	{
		/* if(isset($arrParam['search_prohibit']) && $arrParam['search_prohibit']!=5) */
		/* { */
		/* 	$arrWhere['si_prohibit_type']=$arrParam['search_prohibit']; */
		/* } */

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
				$intCount=$this->yingshi->selectCount($arrParam['where'],$arrParam['join']);
				$arrResult['count']=$intCount;
			}
			$arrData=$this->yingshi->joinSelect($arrParam['where'],$arrParam['order'],$arrParam['sort'],$arrParam['limit'],$arrParam['offset'],$arrParam['join']);
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
			/* $arrData[$intKey]['media_num']=$this->media->selectCount(array('sf_song_id'=>$arrVal['si_globalid'])); */
			/* $arrData[$intKey]['quku_artist_works_ref']=$this->selectWorksrefByForeignKey($arrVal['si_globalid']); */
		}
	}
}

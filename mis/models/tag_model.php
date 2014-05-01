<?php
class Tag_model extends Common_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Tagdict_model','tagdic');
		$this->load->model('table/Tagsyn_model','tagsyn');
	}


	function getMergeParam($arrParam)
	{
		$this->load->model('table/Taginforel_model','taginforel');
		$arrParam[$this->taginforel->strTable]=array();
		$intSourceId=$arrParam[$this->tagdic->strTable][$this->tagdic->strPrimaryKey];
		$intDestId=$arrParam['repeatid'];
		$arrId=array($intSourceId,$intDestId);
		//merge rel info
		$arrSourceRelInfo=array();
		$arrTemp=$this->taginforel->select(array('ti_tagid'=>$intSourceId));
		foreach ($arrTemp as $arrVal)
		{
			$intItemId=$arrVal[$this->taginforel->strForeignKey];
			$arrSourceRelInfo[$intItemId]=$arrVal;
		}
		$arrDestRelInfo=array();
		$arrTemp=$this->taginforel->select(array('ti_tagid'=>$intDestId));
		foreach ($arrTemp as $arrVal)
		{
			$intItemId=$arrVal[$this->taginforel->strForeignKey];
			$arrDestRelInfo[$intItemId]=$arrVal;
		}
		foreach ($arrSourceRelInfo as $arrRelInfo)
		{
			$intItemId=$arrRelInfo[$this->taginforel->strForeignKey];
			if(isset($arrDestRelInfo[$intItemId]))
			{
				$arrDestRelInfo[$intItemId]['ti_weight']+=$arrRelInfo['ti_weight'];
				$arrParam[$this->taginforel->strTable][]=$arrDestRelInfo[$intItemId];
			}
			else
			{
				$arrRelInfo['ti_tagid']=$intDestId;
				$arrParam[$this->taginforel->strTable][]=$arrRelInfo;
			}
		}
		return $arrParam;	
	}
	
	
	function mergetag($arrParam)
	{
		$intSourceId=$arrParam[$this->tagdic->strTable][$this->tagdic->strPrimaryKey];
		$intDestId=$arrParam['repeatid'];
		//delete
		$this->tagdic->delete(array($this->tagdic->strPrimaryKey=>$intSourceId));
		//merge rel info
		foreach ($arrParam[$this->taginforel->strTable] as $arrRelInfo)
		{
			$this->taginforel->update($arrRelInfo);
		}
		$this->taginforel->delete(array('ti_tagid'=>$intSourceId));
		//merge syn word
		$this->tagsyn->update(array('ts_tagid'=>$intDestId),array('ts_tagid'=>$intSourceId));
	}

	function insertSynInfo($arrData,$intItemId)
	{
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->tagsyn->strForeignKey]=$intItemId;
			$this->tagsyn->insert($arrVal);
		}
	}

	function updateSynInfo($arrData,$intItemId)
	{
		$this->tagsyn->delete(array($this->tagsyn->strForeignKey=>$intItemId));
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->tagsyn->strForeignKey]=$intItemId;
			$this->tagsyn->insert($arrVal);
		}
	}

	function selectSynByForeignKey($intItemId)
	{
		return $this->tagsyn->select(array($this->tagsyn->strForeignKey=>$intItemId));
	}

	function insertFormData($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$intId=$this->tagdic->insert($arrParam[$this->tagdic->strTable]);
			$this->insertSynInfo($arrParam[$this->tagsyn->strTable],$intId);
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
			if(isset($arrParam['repeatid']))
			{
				$arrParam=$this->getMergeParam($arrParam);
			}
			$this->db->trans_begin();
			if(isset($arrParam['repeatid']))
			{
				$this->mergetag($arrParam);
			}
			else
			{
				if(!empty($arrParam[$this->tagdic->strTable]))
				{
					$this->tagdic->update($arrParam[$this->tagdic->strTable]);
				}
				if(!empty($arrParam[$this->tagsyn->strTable]))
				{
					$this->updateSynInfo($arrParam[$this->tagsyn->strTable],$arrParam[$this->tagdic->strTable][$this->tagdic->strPrimaryKey]);
				}
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
			$arrParam[$this->tagdic->strPrimaryKey]=$intGlobalId;
			$arrBaseData=$this->tagdic->select($arrParam);
			$arrResult[$this->tagdic->strTable]=$arrBaseData[0];
			$arrResult[$this->tagsyn->strTable]=$this->selectSynByForeignKey($intGlobalId);
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
			$arrData=$this->tagdic->select($arrParam);
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
				$this->tagdic->delete($arrParam);
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

	function convertJoinParam($arrParam)
	{
		$arrJoinParam=array();
		if(isset($arrParam['where']['ts_word']) || isset($arrParam['where']['ts_word like']))
		{
			$arrJoinParam['quku_tag_syn']='quku_tag_dict.td_tagid=quku_tag_syn.ts_tagid';
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
				$intCount=$this->tagdic->selectCount($arrParam['where'],$arrParam['join']);
				$arrResult['count']=$intCount;
			}
			$arrData=$this->tagdic->joinSelect($arrParam['where'],$arrParam['order'],$arrParam['sort'],$arrParam['limit'],$arrParam['offset'],$arrParam['join']);
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

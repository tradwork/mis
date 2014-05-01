<?php
class Common_model extends DbManage_model
{
	var $strBaseModel;
	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Picinfo_model','pic');
		$this->load->model('table/Relativelylinks_model','rellink');
		$this->load->model('table/Artistworksref_model','worksref');
		$this->load->model('table/Yingshiref_model','yingshiref');
		$this->load->model('table/Songsfiles_model','media');
		$this->load->model('table/Songslrcs_model','lrc');
		$this->load->model('table/Songscopyright_model','copyright');
		$this->load->model('table/Taginforel_model','taginforel');
		$this->load->model("table/Mvinfo_model","mvinfo");
		$this->load->model("table/Mvref_model","mvref");
		$this->load->model("table/Videofiles_model","videofiles");
		$this->load->model("table/Videoinfo_model","videoinfo");
		$this->load->model("table/Clusterinfo_model","clusterinfo");
	}

	function insertPicInfo($arrPicInfo,$intType,$intItemId)
	{
		foreach ($arrPicInfo as $arrVal)
		{
			$arrVal[$this->pic->strForeignKey]=$intItemId;
			$arrVal['pi_type']=$intType;
			$this->pic->insert($arrVal);
		}
	}

	function insertRelativeLink($arrLinkInfo,$intType,$intItemId)
	{
		foreach ($arrLinkInfo as $arrVal)
		{
			$arrVal[$this->rellink->strForeignKey]=$intItemId;
			$arrVal['rl_type']=$intType;
			$this->rellink->insert($arrVal);
		}
	}

	function insertArtistworksref($arrData,$intType,$intItemId)
	{
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->worksref->strForeignKey]=$intItemId;
			$arrVal['awr_type']=$intType;
			$this->worksref->insert($arrVal);
		}
	}

	function insertYingshiref($arrData,$intItemId)
	{
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->yingshiref->strForeignKey]=$intItemId;
			$this->yingshiref->insert($arrVal);
		}
	}


	function insertMvref($arrData,$intType,$intItemId)
	{
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->mvref->strForeignKey]=$intItemId;
			/* $arrVal['mr_type']=$intType; */
			$arrVal['mr_type']= "101";			
			$this->mvref->insert($arrVal);
		}
	}

    function insertCluster($arrData,$intClusterId)
	{
        if(!$arrData)
        {
            return False;
        }
        if(!$intClusterId)
        {
            return False;
        }
        $arrData["ci_cluster_id"] = $intClusterId;
        $this->clusterinfo->insert($arrData);
	}

	function insertTagrel($arrData,$intType,$intItemId)
	{
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->taginforel->strForeignKey]=$intItemId;
			$arrVal['ti_infotype']=$intType;
			unset($arrVal['td_name']);
			$this->taginforel->insert($arrVal);
		}
	}

	function insertMedia($arrData,$intItemId)
	{
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->media->strForeignKey]=$intItemId;
			$this->media->insert($arrVal);
		}
	}

	function insertVideoFile($arrVal,$intItemId,$intFileGlobalId)
	{
	    $arrVal[$this->videofiles->strForeignKey]=$intItemId;
	    $arrVal[$this->videofiles->strPrimaryKey] = $intFileGlobalId;
	    $arrVal["vf_jointime"] = time();
	    $this->videofiles->insert($arrVal);
	}

	function insertVideoInfo($arrData,$intItemId)
	{
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->videoinfo->strForeignKey]=$intItemId;
			$this->videoinfo->insert($arrVal);
		}
	}


	function insertLrc($arrData,$intItemId)
	{
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->lrc->strForeignKey]=$intItemId;
			$this->lrc->insert($arrVal);
		}
	}

	function insertCopyright($arrData,$intItemId)
	{
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->copyright->strForeignKey]=$intItemId;
			$this->copyright->insert($arrVal);
		}
	}

    function selectClusterinfo($intItemId)
    {
        return $this->clusterinfo->select(array($this->clusterinfo->strPrimaryKey=>$intItemId));
    }

	function selectPicByForeignKey($intItemId)
	{
		return $this->pic->select(array($this->pic->strForeignKey=>$intItemId));
	}

	function selectRelativeLinkByForeignKey($intItemId)
	{
		return $this->rellink->select(array($this->rellink->strForeignKey=>$intItemId));
	}

	function selectWorksrefByForeignKey($intItemId)
	{
		return $this->worksref->select(array($this->worksref->strForeignKey=>$intItemId));
	}
	
	function selectYingshirefByForeignKey($intItemId)
	{
		return $this->yingshiref->select(array($this->yingshiref->strForeignKey=>$intItemId));
	}


	function selectVideoFilesByForeignKey($intItemId)
	{
		return $this->videofiles->select(array($this->videofiles->strForeignKey=>$intItemId));
	}

	function selectMvrefByForeignKey($intItemId)
	{
		return $this->mvref->select(array($this->mvref->strForeignKey=>$intItemId));
	}

	function selectMediaByForeignKey($intItemId)
	{
		return $this->media->select(array($this->media->strForeignKey=>$intItemId));
	}

	function selectLrcByForeignKey($intItemId)
	{
		return $this->lrc->select(array($this->lrc->strForeignKey=>$intItemId));
	}

	function selectCopyrightByForeignKey($intItemId)
	{
		return $this->copyright->select(array($this->copyright->strForeignKey=>$intItemId));
	}

	function selectTagrelByForeignKey($intItemId)
	{
		return $this->taginforel->select(array($this->taginforel->strForeignKey=>$intItemId));
	}

	function updatePicInfo($arrPicInfo,$intType,$intItemId)
	{
		$this->pic->delete(array($this->pic->strForeignKey=>$intItemId));
		foreach ($arrPicInfo as $arrVal)
		{
			$arrVal[$this->pic->strForeignKey]=$intItemId;
			$arrVal['pi_type']=$intType;
			$this->pic->insert($arrVal);
		}
	}

	function updateRelativeLink($arrLinkInfo,$intType,$intItemId)
	{
		$this->rellink->delete(array($this->rellink->strForeignKey=>$intItemId));
		foreach ($arrLinkInfo as $arrVal)
		{
			$arrVal[$this->rellink->strForeignKey]=$intItemId;
			$arrVal['rl_type']=$intType;
			$this->rellink->insert($arrVal);
		}
	}

	function updateArtistworksref($arrData,$intType,$intItemId)
	{
		$this->worksref->delete(array($this->worksref->strForeignKey=>$intItemId));
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->worksref->strForeignKey]=$intItemId;
			$arrVal['awr_type']=$intType;
			$this->worksref->insert($arrVal);
		}
	}

	function updateYingshiref($arrData,$intItemId)
	{
		$this->yingshiref->delete(array($this->yingshiref->strForeignKey=>$intItemId));
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->yingshiref->strForeignKey]=$intItemId;
			$this->yingshiref->insert($arrVal);
		}
	}


	function updateVideoFile($arrVal,$intItemId,$intFileGlobalId)
	{
		$arrVal[$this->videofiles->strForeignKey] = $intItemId;
		$arrVal[$this->videofiles->strPrimaryKey] = $intFileGlobalId;
		$arrVal["vf_jointime"] = time();
		$this->videofiles->insert($arrVal);
	}

	function updateMvref($arrData,$intType,$intItemId)
	{
		$this->mvref->delete(array($this->mvref->strForeignKey=>$intItemId));
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->mvref->strForeignKey]=$intItemId;
			/* $arrVal['mr_type']=$intType; */
			$arrVal['mr_type']="101";
			$this->mvref->insert($arrVal);
		}
	}

    function updateCluster($arrData)
	{
        if(!$arrData){
            return False;
        }
		$this->clusterinfo->delete(array($this->clusterinfo->strPrimaryKey=>$arrData[$this->clusterinfo->strPrimaryKey]));
        unset($arrData["ci_edittime"]);
        $this->clusterinfo->insert($arrData);
	}

	function updateTagrel($arrData,$intType,$intItemId)
	{
		$this->taginforel->delete(array($this->taginforel->strForeignKey=>$intItemId));
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->taginforel->strForeignKey]=$intItemId;
			$arrVal['ti_infotype']=$intType;
			unset($arrVal['td_name']);
			$this->taginforel->insert($arrVal);
		}
	}


	function updateMedia($arrData,$intItemId)
	{
		$this->media->delete(array($this->media->strForeignKey=>$intItemId));
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->media->strForeignKey]=$intItemId;
			$this->media->insert($arrVal);
		}
	}

	function updateLrc($arrData,$intItemId)
	{
		$this->lrc->delete(array($this->lrc->strForeignKey=>$intItemId));
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->lrc->strForeignKey]=$intItemId;
			$this->lrc->insert($arrVal);
		}
	}

	function updateCopyright($arrData,$intItemId)
	{
		$this->copyright->delete(array($this->copyright->strForeignKey=>$intItemId));
		foreach ($arrData as $arrVal)
		{
			$arrVal[$this->copyright->strForeignKey]=$intItemId;
			$this->copyright->insert($arrVal);
		}
	}

	function convertSearchTime($arrParam,&$arrWhere)
	{
		if(isset($arrParam['search_starttime']) && $arrParam['search_starttime']!='')
		{
			$arrWhere[$arrParam['search_time'].' >=']=$arrParam['search_starttime'];
		}
		if(isset($arrParam['search_endtime']) && $arrParam['search_endtime']!='')
		{
			$arrWhere[$arrParam['search_time'].' <=']=date('Y-m-d H:i:s',strtotime($arrParam['search_endtime'])+QUKU_DAY_SECONDS - 1);
		}
	}

	function convertSearchTag(&$arrWhere)
	{
		if(isset($arrWhere['td_name']) || $arrWhere['td_name like'])
		{
			$this->load->model('table/tagdict_model');
			$arrResult=$this->tagdict_model->select(array('td_name'=>$arrWhere['td_name']));
			unset($arrWhere['td_name']);
			unset($arrWhere['td_name like']);
			if(empty($arrResult))
			{
				$arrWhere['ti_tagid']=0;
			}
			else
			{
				$arrWhere['ti_tagid']=$arrResult[0]['td_tagid'];
			}
		}
	}

	function convertSearchOrder($strOrder)
	{
		$arrConf=config_item('search_option');
		$arrOrder=$arrConf[$this->strBaseType]['search_order'];
		if(isset($arrOrder['convert']) && in_array($strOrder,$arrOrder['convert']))
		{
			return 'CONVERT(' . $strOrder . ' USING gbk)';
		}
		return $strOrder;
	}


	function convertSearchParam($arrParam)
	{
		$arrDbParam=array();
		$arrWhere=array();
		if($arrParam['search_content']!='')
		{
			if($arrParam['search_match']==1)
			{
				$arrParam['search_field'].=' like';
				$arrParam['search_content'].='%';
			}
			elseif($arrParam['search_match']==2)
			{
				$arrParam['search_field'].=' like';
				$arrParam['search_content']='%'.$arrParam['search_content'].'%';
			}
			$arrWhere[$arrParam['search_field']]=$arrParam['search_content'];
		}
		if(isset($arrParam['search_content2']) && $arrParam['search_content2']!='')
		{
			$arrWhere[$arrParam['search_field2']]=$arrParam['search_content2'];
		}
		if(isset($arrParam['search_status']) && $arrParam['search_status']!=2)
		{
			$arrWhere[$this->strFieldPrefix.'status']=$arrParam['search_status'];
		}
		if(isset($arrParam['search_audit_status']) && $arrParam['search_audit_status']!=2)
		{
			$arrWhere[$this->strFieldPrefix.'audit_status']=$arrParam['search_audit_status'];
		}
		if(isset($arrParam['search_delflag']) && $arrParam['search_delflag']!=2)
		{
			$arrWhere[$this->strFieldPrefix.'delflag']=$arrParam['search_delflag'];
		}
		
		$this->convertSearchTime($arrParam,$arrWhere);
//		$this->convertSearchTag($arrWhere);
		$arrDbParam['where']=$arrWhere;
		
		$arrDbParam['order']= $this->convertSearchOrder($arrParam['search_order']);
		if($arrParam['search_scend']==QUKU_OPTIONS_DEASCEND)
		{
			$arrDbParam['sort']='DESC';
		}
		else
		{
			$arrDbParam['sort']='ASC';
		}
		$arrDbParam['offset']=($arrParam['search_page_id']-1)*$arrParam['search_page_size'];
		$arrDbParam['limit']=$arrParam['search_page_size'];
		$arrDbParam['count']=$arrParam['search_count'];

		return $arrDbParam;
	}

}
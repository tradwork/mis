<?php

require_once ROOT_PATH.'mis/controllers/coreController.php';
class Song extends coreController
{
	var $strBaseTableName='quku_songs_info';
	var $strBaseType=QUKU_TYPE_SONG;
	//	var $arrFormStructure=array('quku_songs_info','quku_pic_info','quku_songs_files','quku_songs_lrcs','quku_artist_works_ref','quku_songs_copyright');
	var $strPrimaryKey='si_globalid';
	var $strBaseModelName='Song_model';
	var $arrUniqueField=array('si_album_id','si_isrc');
	static $strCopyrightTableName='quku_songs_copyright';
	static $strMediaTableName='quku_songs_files';
	static $strLrcTableName='quku_songs_lrcs';
    static $strClustersTableName = "quku_cluster_info";


	function  __construct()
	{
		parent::__construct();
	}

	function validateTimeField()
	{
		if(!empty($this->arrFormData[$this->strBaseTableName]['si_publishtime']))
		{
			if($this->validateTime($this->arrFormData[$this->strBaseTableName]['si_publishtime'])==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]="发行时间格式错误";
			}
		}
	}

	function validateMedia()
	{
		$arrBitRate=array();
		foreach ($this->arrFormData[self::$strMediaTableName] as $arrData)
		{
			$strRate=$arrData['sf_file_bitrate'];
			$strType=$arrData['sf_file_extension'];
			$intUsage=$arrData['sf_usage_flag'];
			if(isset($arrBitRate[$strType.$strRate.$intUsage]))
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]=$strRate.'码率音频重复';
			}
			$arrBitRate[$strType.$strRate.$intUsage]=1;
		}
	}

	function validateCopyrightOption()
	{
		$bolRes=true;
		foreach ($this->arrFormData[self::$strCopyrightTableName] as $arrVal)
		{
			if(empty($arrVal['sc_company']))
			{
				continue;
			}
			$arrParam['od_type']=$this->strBaseType;
			$arrParam['od_category']=7;
			$arrParam['od_word']=$arrVal['sc_company'];
			$arrRes=$this->option_model->normalSearch($arrParam);
			if(empty($arrRes))
			{
				$bolRes=false;
				$this->arrTplData['error_message'][]   = '选项【'.$arrVal['sc_company'].'】不合法';
			}
		}
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
		}
	}

	function validateCompanyPercent()
	{
		$arrPercent=array();
		foreach ($this->arrFormData[self::$strCopyrightTableName] as $arrVal)
		{
			$arrPercent[$arrVal['sc_type']][$arrVal['sc_company']]=$arrVal['sc_percent'];
		}
		$intSum=0;
		foreach ($arrPercent as $intType=>$arrVal)
		{
			$intSum+=array_sum($arrVal);
		}
		if($intSum>1)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]   = '著作权公司百分比超过100%';
		}
	}

	function validateCopyright()
	{
		$this->validateCopyrightOption();
		$this->validateCompanyPercent();
	}

	function compensateCopyright()
	{
		$arrPercent=array();
		foreach ($this->arrFormData[self::$strCopyrightTableName] as $arrVal)
		{
			$arrPercent[$arrVal['sc_type']][$arrVal['sc_company']]=$arrVal['sc_percent'];
		}
		$intSum=0;
		foreach ($arrPercent as $intType=>$arrVal)
		{
			$intSum+=array_sum($arrVal);
		}
		if($intSum==1)
		{
			return;
		}
		$floatPercent=(1-$intSum)/2;
		$this->arrFormData[self::$strCopyrightTableName][]=array('sc_type'=>1,'sc_company'=>QUKU_YINZHUXIE,'sc_percent'=>$floatPercent);
		$this->arrFormData[self::$strCopyrightTableName][]=array('sc_type'=>2,'sc_company'=>QUKU_YINZHUXIE,'sc_percent'=>$floatPercent);
	}


	function getUniqueData()
	{
		if($this->arrFormData[$this->strBaseTableName]['si_isrc_flag']==1)
		{
			return;
		}
		$arrParam=array('si_title','si_versions');
		$this->arrFormData[$this->strBaseTableName]['si_isrc']=$this->convertUniqueData($arrParam);
	}


    /* 转换歌词和原始音频 */
    function convertLrc()
    {
        $this->load->helper("lrycs");
        /* 根据原始音频和歌词压缩k歌歌词和加密歌词 */
        if(getInputBrc($this->arrFormData,$this->coreModel,1))
        {
            return True;
        }
        if(!$arrOriginAudio = getOrginAudio($this->arrFormData,$this->coreModel)){
            return True;
        }
        $strNewFile=config_item('data_path').$arrOriginAudio['sf_globalid'].'.'.$arrOriginAudio['sf_file_extension'];
        if(!downLoad($arrOriginAudio["sf_file_link"],$strNewFile))
        {
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="下载原唱音频失败";
            return False;
        }
        $strWavFile = config_item('data_path').$arrOriginAudio['sf_globalid'].'.wav';
        $strCommand = sprintf("%s -i %s -ar 22050 %s",getFFMPEG(),$strNewFile,$strWavFile);
        if(!execCommand($strCommand) || !file_exists($strWavFile))
        {
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="转换原唱音频失败";
            return False;
        }
        if(!$strInputBrc = getInputBrc($this->arrFormData,$this->coreModel,2))
        {
            return True;
        }
        $strInputBrcFile = config_item('data_path').$arrOriginAudio['sf_globalid'].'.input.brc';
        if(!downLoad($strInputBrc,$strInputBrcFile))
        {
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="下载Brc文件失败";
            return False;
        }
        $strBmcFile = config_item('data_path').$arrOriginAudio['sf_globalid'].'.bmc';
        $strOutputBrcFile = config_item('data_path').$arrOriginAudio['sf_globalid'].'.output.brc';
        $command = sprintf("%s %s %s %s %s",getBMC(),$strWavFile,$strInputBrcFile,$strOutputBrcFile,$strBmcFile);
        if(!execCommand($command) || !file_exists($strBmcFile) || !file_exists($strOutputBrcFile))
        {
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="转换成bmc文件失败";
            return False;
        }
        foreach($this->arrFormData[$this->coreModel->lrc->strTable] as  $intKey => $arrLrc)
        {
            if($arrLrc["sl_usage_flag"] == 2 or $arrLrc["sl_usage_flag"] == 1)
            {
                unset($this->arrFormData[$this->coreModel->lrc->strTable][$intKey]);
            }
        }
        $arrExt = array("2" => ".brc","1"=>".bmc");
        foreach(array("2" => $strOutputBrcFile,"1"=>$strBmcFile) as $k => $v)
        {
            $arrLrcInfo = array();
            $intGlobalId=$this->getGlobalId(QUKU_TYPE_LRC);
            if($intGlobalId>0)
            {
                $arrLrcInfo['sl_globalid']=$intGlobalId;
                $arrLrcInfo["sl_jointime"] = time();
                $arrLrcInfo["sl_lyrics"] = file_get_contents($v);
                $strLink=$this->storageFile("lrc",$intGlobalId,"$intGlobalId.$strExt",$v);
                $arrLrcInfo['sl_lrclink']=$strLink;
                $this->arrFormData[$this->coreModel->lrc->strTable][] = $arrLrcInfo;
            }
        }
        foreach(array($strWavFile,$strNewFile,$strInputBrcFile,$strInputBrcFile,$strOutputBrcFile,$strBmcFile) as $v)
        {
            if(file_exists($v)) unlink($v);
        }
        print_r($this->arrFormData[$this->coreModel->lrc->strTable]);exit;
        return true;
    }


	function getProhibitInfo()
	{
		return;
		if(isset($this->arrFormData[$this->strBaseTableName]['si_prohibit_type']))
		{
			if($this->arrFormData[$this->strBaseTableName]['si_prohibit_type']=='')
			{
				$this->arrFormData[$this->strBaseTableName]['si_prohibit_type']=0;
			}
			$intType=$this->arrFormData[$this->strBaseTableName]['si_prohibit_type'];
			$arrConf=config_item('form_option');
			$this->arrFormData[$this->strBaseTableName]['si_prohibit_info']=$arrConf[$this->strBaseType]['si_prohibit_info'][$intType];
		}
	}

	function getPrePubTime()
	{
		$this->arrFormData[$this->strBaseTableName]['si_pre_pubtime']=strtotime($this->arrFormData[$this->strBaseTableName]['si_pre_pubtime']);
	}


	function updateSystemField($intStatus,$bolUpdate=false)
	{
		parent::updateSystemField($intStatus,$bolUpdate);
		$this->arrFormData[$this->strBaseTableName]['si_copyright_flag']=7;
//		$this->getProhibitInfo();
	}

	function validateIsrc()
	{
		if($this->arrFormData[$this->strBaseTableName]['si_isrc_flag']==1
		&& empty($this->arrFormData[$this->strBaseTableName]['si_isrc']))
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="isrc不能为空";
		}
	}

	function convertStatus()
	{
		if($this->arrFormData[$this->strBaseTableName]['si_prohibit_type']==4)
		{
			$this->arrFormData[$this->strBaseTableName]['si_status']=1;
		}
	}

	function convertData()
	{
		parent::convertData();
		$this->compensateCopyright();
		$this->getPrePubTime();
//		$this->convertStatus();
	}


	function validateFormData()
	{
		$this->validateIsrc();
		parent::validateFormData();
		$this->validateTimeField();
		$this->validateCopyright();
		$this->validateMedia();
		$this->validatePicUnique();
		$this->validateTagrel();
		$this->validateDis();
		$this->validateProhibitType($this->arrFormData[$this->strBaseTableName]['si_status'],
		$this->arrFormData[$this->strBaseTableName]['si_prohibit_type']);
		$this->validatePubStatus();
	}

	function validatePubStatus()
	{
	    if($this->arrFormData[$this->strBaseTableName]['si_source'] == 1000 && $this->arrFormData[$this->strBaseTableName]['si_status'] == 0 && $this->arrFormData[$this->strBaseTableName]['si_audit_status'] != 0)
	    {
		$this->arrTplData['error_code']=1;
		$this->arrTplData['error_message'][] = "未审核数据不能发布";
	    }
	}



	function validateDis()
	{
	    if(!$this->arrFormData[$this->strBaseTableName]["si_distribution"])
	    {
		$this->arrTplData['error_code'] = 1;
		$this->arrTplData['error_message'][]="多端分发字段不能为空";
	    }
	    $temp_dis = json_decode($this->arrFormData[$this->strBaseTableName]["si_distribution"],true);
	    if(!is_array($temp_dis))
	    {
		$this->arrTplData['error_code'] = 1;
		$this->arrTplData['error_message'][]="多端分发字段非法";
		return False;
	    }
	    foreach($temp_dis as $duan){
		$duan_dis = array();
		foreach($duan as $k => $v){
		    if(!is_numeric($k)) continue;
		    $duan_dis[] = strlen($v) ? $v : "1";
		}
		if(count($duan_dis) != 10){	
		    $this->arrTplData['error_code']=1;
		    $this->arrTplData['error_message'][]="多端分发字段非法";
		    return False;
		}
		$dis[] = implode("",$duan_dis);
	    }
	    if(count($dis) != 10){
		$this->arrTplData['error_code']=1;
		$this->arrTplData['error_message'][]="多端分发字段非法";
		return False;
	    }
	    return True;
	}

	function validateProhibitType($intStatus,$intProhibitType)
	{
		if($intStatus==0 && $intProhibitType==4)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]="屏蔽歌曲不能发布";
		}
	}


	function storageMedia()
	{
		foreach ($this->arrFormData[self::$strMediaTableName] as $intKey=>$arrMedia)
		{
			if(strpos($arrMedia['sf_file_link'],BCS_LINK)!==false)
			{
				continue;
			}
			$strUrl=$this->storageFile('music',$arrMedia['sf_globalid'],$arrMedia['sf_file_name'],$arrMedia['sf_file_link']);
			$this->arrFormData[self::$strMediaTableName][$intKey]['sf_file_link']=$strUrl;
		}
	}

	function storageLrc()
	{
		foreach ($this->arrFormData[self::$strLrcTableName] as $intKey=>$arrLrc)
		{
			$strSongTitle=$this->arrFormData[$this->strBaseTableName]['si_title'];
			$strExt=end(explode('.',$arrLrc['sl_lrclink']));
			$strTempFile=config_item('data_path').substr(microtime(true) * 10000, -5).'.'.$strExt;
			file_put_contents($strTempFile,$arrLrc['sl_lyrics']);
			$strUrl=$this->storageFile('lrc',$arrLrc['sl_globalid'],$strSongTitle.'.'.$strExt,$strTempFile);
			$this->arrFormData[self::$strLrcTableName][$intKey]['sl_lrclink']=$strUrl;
			unlink($strTempFile);
		}
	}

	function getFormMedia()
	{
		$arrResult=array();
		$arrShowUrl=array();
		$strShowUrl= $this->input->post('sf_showurl');
		$arrShowUrl=explode("$@$",$strShowUrl);
		$arrSource=array();
		$strSource= $this->input->post('sf_source');
		$arrSource=explode("$@$",$strSource);
		$strMediaData =  $this->input->post('quku_songs_files');
		if(empty($strMediaData))
		{
			$this->arrFormData[self::$strMediaTableName]=$arrResult;
			return ;
		}
		$arrMediaData =  explode('$@$', $strMediaData);
		foreach($arrMediaData as $intId=>$strTemp)
		{
			if (empty($strTemp) )
			{
				continue;
			}
			$arrMedia=json_decode($strTemp,true);
			$arrMedia['sf_file_name']=$this->arrFormData[$this->strBaseTableName]['si_title'].'.'.$arrMedia['sf_file_extension'];
			$arrMedia['sf_source']=$arrSource[$intId];
			$arrMedia['sf_showurl']=$arrShowUrl[$intId];
			$arrResult[] = $arrMedia;
		}
		$this->arrFormData[self::$strMediaTableName]=$arrResult;
	}

    function getFormCluster()
    {
        $this->arrFormData[self::$strClustersTableName] = array();
		$arrCluster=$this->input->post(self::$strClustersTableName);
        if(!$arrCluster)
        {
            return False;
        }
        if(is_string($arrCluster))
        {
            $arrCluster = json_decode($arrCluster,true);
        }
        $this->arrFormData[self::$strClustersTableName]=$arrCluster;
    }

	function getFormLrc()
	{
		$strContent=$this->input->post('quku_songs_lrcs');
		if(empty($strContent))
		{
			$this->arrFormData[self::$strLrcTableName]=array();
			return ;
		}
		$arrContent=explode('$@$',$strContent);
		foreach ($arrContent as $strVal)
		{
			if(empty($strVal))
			{
				continue;
			}
			$this->arrFormData[self::$strLrcTableName][]=json_decode($strContent,true);
		}
	}

	function getFormCopyright()
	{
		$arrCopyRightData=array();
		$arrConf=config_item('copyright');
		foreach ($arrConf as $strField=>$intType)
		{
			$strContent=$this->input->post($strField);
			if(empty($strContent))
			{
				continue;
			}
			$arrLine=json_decode($strContent,true);
			foreach ($arrLine as $arrVal)
			{
				if(!empty($arrVal['sc_company']) /* && $arrVal['sc_company']!=QUKU_YINZHUXIE */ && !empty($arrVal['sc_percent']))
				{
					$arrVal['sc_type']=$intType;
					$arrVal['sc_percent']=$arrVal['sc_percent']/100;
					$arrCopyRightData[]=$arrVal;
				}
			}
		}
		$this->arrFormData[self::$strCopyrightTableName]=$arrCopyRightData;
	}

	function convertAlbumName()
	{
		if($this->arrFormData[$this->strBaseTableName]['si_album_id']==0)
		{
			$this->arrFormData[$this->strBaseTableName]['si_album']='';
		}
	}

	function getFormData($intStatus,$bolUpdate=false)
	{
		parent::getFormData($intStatus,$bolUpdate);
		$this->convertAlbumName();
		$this->getUniqueData();
	}

	function addFormData($intStatus)
	{
		$this->getFormData($intStatus);
		$this->validateFormData();
		$this->convertData();
        $this->convertLrc();
		if($this->arrTplData['error_code']==0)
		{
			$this->storageLrc();
			//$this->storageMedia();
			$intGlobalId=$this->coreModel->insertFormData($this->arrFormData);
			if($intGlobalId==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='保存数据出错，请联系rd';
				return;
			}
			$this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]=$intGlobalId;
			$this->basicServerProcess(array($this->arrFormData));
			$this->arrTplData['data']=$this->arrFormData;
			$this->arrTplData['data']['json']=json_encode($this->arrFormData);
			/* 发送copyright任务 */
			$this->load->helper("basicserver");
			sendRequestToCopyright($intGlobalId);
			/* 发送dis任务 */
			sendRequestToDis($intGlobalId);
            /* 发送title聚簇请求 */
            sendRequestToTitleCluster($intGlobalId);
		}
	}


	function updateFormData($intStatus)
	{
		$this->getFormData($intStatus,true);
		$this->validateFormData();
		$this->convertData();
        $this->convertLrc();
		if($this->arrTplData['error_code']==0)
		{
			$this->storageLrc();
			$bolRes=$this->coreModel->updateFormData($this->arrFormData);
			if($bolRes==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='保存数据出错，请联系rd';
				return ;
			}
			$this->basicServerProcess(array($this->arrFormData));
			$this->arrTplData['data']=$this->arrFormData;
			$this->arrTplData['data']['json']=json_encode($this->arrFormData);
            /* 发送title聚簇请求 */
			$this->load->helper("basicserver");
            sendRequestToTitleCluster($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]);
		}
	}

	function generateFormMedia($arrData)
	{
		$arrInfo=$arrData[self::$strMediaTableName];
		foreach ($arrInfo as $intKey=>$arrVal)
		{
			$arrInfo[$intKey]['json']=json_encode($arrVal);
		}
		$this->arrTplData['data'][self::$strMediaTableName]=json_encode($arrInfo);
	}

    function generateFormClusters($arrData)
    {
        $this->arrTplData['data'][self::$strClustersTableName]=$arrData[self::$strClustersTableName];
    }

	function generateFormLrc($arrData)
	{
		$arrInfo=$arrData[self::$strLrcTableName];
		foreach ($arrInfo as $intKey=>$arrVal)
		{
			$arrInfo[$intKey]['json']=json_encode($arrVal);
//			$arrInfo['sl_lrclink']=str_replace(BCS_LINK,BCS_INTERNAL,$this->input->get('sl_lrclink'));
		}
		$this->arrTplData['data'][self::$strLrcTableName]=json_encode($arrInfo);
	}

	function generateFormCopyright($arrData)
	{
		$arrResult=array();
		$arrInfo=$arrData[self::$strCopyrightTableName];
		$arrConf=config_item('copyright');
		foreach ($arrInfo as $intKey=>$arrVal)
		{
			$arrVal['sc_percent']=$arrVal['sc_percent']*100 .'%';
			$this->arrTplData['data'][array_search($arrVal['sc_type'],$arrConf)][]=htmlFilter($arrVal);
		}
	}

	function generatePrePubTime()
	{
		$intTime=(int)$this->arrTplData['data'][$this->strBaseTableName]['si_pre_pubtime'];
		if($intTime==0)
		{
			$strTime='';
		}
		else
		{
			$strTime=date( "Y-m-d H:i:s", $intTime);
		}
		$this->arrTplData['data'][$this->strBaseTableName]['si_pre_pubtime']=$strTime;
	}

	function generateFormBaseData($arrData)
	{
		parent::generateFormBaseData($arrData);
		$this->generatePrePubTime();
	}

	function getAblumField()
	{
		$arrField=array('si_language','si_area','si_album_no','si_cd_no','si_publishtime','si_publishcompany','si_styles',"si_album_id");
		foreach ($arrField as $strVal)
		{
			if($this->input->get($strVal)==false)
			{
				continue;
			}
			$this->arrTplData['data'][$this->strBaseTableName][$strVal]=$this->input->get($strVal);
		}
		$this->arrTplData['data'][self::$strWorksRefTableName]=$this->input->get('quku_artist_works_ref');
	}

	function checkMediaChange($arrData)
	{
		$intChangeFlag=0;
		$arrConf=config_item('audit_fields');
		$arrOldId=array();
		$arrNewId=array();
		foreach ($arrData[self::$strMediaTableName] as $arrVal)
		{
			$arrOldId[]=$arrVal['sf_globalid'];
		}
		foreach ($this->arrFormData[self::$strMediaTableName] as $arrVal)
		{
			$arrNewId[]=$arrVal['sf_globalid'];
		}
		$arrDiff1=array_diff($arrOldId,$arrNewId);
		$arrDiff2=array_diff($arrNewId,$arrOldId);
		if(!empty($arrDiff1) || !empty($arrDiff2))
		{
			$intChangeFlag|=$arrConf[$this->strBaseType][self::$strMediaTableName]['value'];
		}
		return $intChangeFlag;
	}


	function checkLrcChange($arrData)
	{
		$intChangeFlag=0;
		$arrConf=config_item('audit_fields');
		$arrOldId=array();
		$arrNewId=array();
		foreach ($arrData[self::$strLrcTableName] as $arrVal)
		{
			$arrOldId[]=$arrVal['sl_globalid'];
		}
		foreach ($this->arrFormData[self::$strLrcTableName] as $arrVal)
		{
			$arrNewId[]=$arrVal['sl_globalid'];
		}
		$arrDiff1=array_diff($arrOldId,$arrNewId);
		$arrDiff2=array_diff($arrNewId,$arrOldId);
		if(!empty($arrDiff1) || !empty($arrDiff2))
		{
			$intChangeFlag|=$arrConf[$this->strBaseType][self::$strLrcTableName]['value'];
		}
		return $intChangeFlag;
	}

	function checkDataChange($arrDbData)
	{
		$intChangeflag=parent::checkDataChange($arrDbData);
		$intChangeflag+=$this->checkMediaChange($arrDbData);
		$intChangeflag+=$this->checkLrcChange($arrDbData);
		$intChangeflag+=$this->checkAuthorChange($arrDbData);
		return $intChangeflag;
	}

	function getAuditBaseData($arrData,$arrField)
	{
		parent::getAuditBaseData($arrData,$arrField);
		$this->arrFormData[$this->strBaseTableName]['si_isrc']=$arrData[$this->strBaseTableName]['si_isrc'];
	}

	function getAuditMedia($arrData,$arrField)
	{
		if(in_array(self::$strMediaTableName,$arrField))
		{
			$this->arrFormData[self::$strMediaTableName]=$arrData[self::$strMediaTableName];
		}
	}

	function getAuditLrc($arrData,$arrField)
	{
		if(in_array(self::$strLrcTableName,$arrField))
		{
			$this->arrFormData[self::$strLrcTableName]=$arrData[self::$strLrcTableName];
		}
	}

	function getCacheInfo()
	{
		$arrParam=parent::getCacheInfo();
		$arrParam['or_title']=$this->arrFormData[$this->strBaseTableName]['si_title'];
		return $arrParam;
	}
	/**
	 * 添加数据表单
	 *
	 */
	function create()
	{
		$this->getAblumField();
		parent::create();
	}


	/**
	 * 新增数据
	 *
	 */
	function doCreate()
	{
		parent::doCreate();
	}

	/**
	 * 新增数据并发布
	 *
	 */
	function doCreateAndPub()
	{
		parent::doCreateAndPub();
	}

	/**
	 * 更新数据
	 *
	 */
	function doEdit()
	{
		parent::doEdit();
	}

	/**
	 * 新增数据并发布
	 *
	 */
	function doEditAndPub()
	{
		parent::doEditAndPub();
	}


	/**
	 * 展现数据
	 *
	 */
	function edit()
	{
		parent::edit();
	}

	/**
	 * 发布数据
	 *
	 */
	function pub()
	{
		$arrData=$this->coreModel->normalSearch(array($this->strPrimaryKey=>$this->input->get($this->strPrimaryKey)));
		$this->validateProhibitType(0,$arrData[0]['si_prohibit_type']);
		parent::pub();
        $this->load->helper("basicserver");
        sendRequestToPrimarySong($this->input->get($this->strPrimaryKey),0);
	}

	function batchPub()
	{
		parent::batchPub();
	}
	/**
	 * 下线数据
	 */
	function disPub()
	{
		parent::disPub();
        $this->load->helper("basicserver");
        sendRequestToPrimarySong($this->input->get($this->strPrimaryKey),1);
//		$strGlobalId=$this->input->get($this->strPrimaryKey);
//		$arrId=explode(",",$strGlobalId);
//		foreach ($arrId as $intGlobalId)
//		{
//			$res=$this->validateEdituser( $intGlobalId);
//			if($res==false)
//			{
//				break;
//			}
//			$arrParam=array(
//			$this->strPrimaryKey=>$intGlobalId,
//			$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
//			$this->strFieldPrefix.'status'=>1,
//			'si_prohibit_type'=>4
//			);
//			$bolRes=$this->coreModel->updateStatus($arrParam);
//			if($bolRes==false)
//			{
//				$this->arrTplData['error_code']=1;
//				$this->arrTplData['error_message'][]='下线数据出错，请联系rd';
//			}
//		}
	}

	/**
	 * 删除数据
	 *
	 */
	function delete()
	{
		parent::delete();
	}

	function batchDelete()
	{
		parent::batchDelete();
	}

	/**
	 * 恢复数据
	 *
	 */
	function disDelete()
	{
		parent::disDelete();
	}

	/**
	 * 批量恢复数据
	 *
	 */
	function batchDisDelete()
	{
		parent::batchDisDelete();
	}

	/**
	 * 搜索数据
	 *
	 */
	function search()
	{
		parent::search();
	}

	function saveInCache()
	{
		parent::saveInCache();
	}

	function showCacheInfo()
	{
		parent::showCacheInfo();
	}

	function getAuditData($arrData,$arrField)
	{
		parent::getAuditData($arrData,$arrField);
		$this->getAuditMedia($arrData,$arrField);
		$this->getAuditLrc($arrData,$arrField);
		$this->getAuditAuthor($arrData,$arrField);
	}

	function updateOnlineData($arrField)
	{
		parent::updateOnlineData($arrField);
		$arrDbData=$this->getDataFromDb($this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]);
		$this->basicServerProcess(array($arrDbData));
	}

	function synchronize()
	{
		parent::synchronize();
	}

	function prohibitItem($intGlobalId,$bolDelFlag=false)
	{
		$arrConf=config_item('form_option');
		$arrParam=array(
			$this->strPrimaryKey=>$intGlobalId,
			$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
			$this->strFieldPrefix.'prohibit_type'=> 4,
			$this->strFieldPrefix.'status'=> 1,
//			$this->strFieldPrefix.'prohibit_info'=>$arrConf[$this->strBaseType]['si_prohibit_info'][2],
		);
		if($bolDelFlag)
		{
			$arrParam[$this->strFieldPrefix.'delflag']=1;
		}
		else
		{
			$arrParam[$this->strFieldPrefix.'delflag']=0;
		}
		$bolRes=$this->coreModel->updateProhibitType($arrParam);
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='删除数据出错，请联系rd';
		}
		return $bolRes;
	}

	function unprohibitItem($intGlobalId)
	{
		$arrConf=config_item('form_option');
		$arrParam=array(
		$this->strPrimaryKey=>$intGlobalId,
		$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'prohibit_type'=> 3,
//		$this->strFieldPrefix.'prohibit_info'=>$arrConf[$this->strBaseType]['si_prohibit_info'][0],
		);
		$bolRes=$this->coreModel->updateProhibitType($arrParam);
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='删除数据出错，请联系rd';
		}
		return $bolRes;
	}

	function prohibit()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
		$this->prohibitItem($intGlobalId);
	}

	function unprohibit()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
		$this->unprohibitItem($intGlobalId);
	}

	function forceProhibit()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
		$this->prohibitItem($intGlobalId,true);
	}


//	function convertProhibitType(&$arrData)
//	{
//		$arrConf=config_item('form_option');
//		foreach ($arrData as $intKey=>$arrVal)
//		{
//			$arrData[$intKey]['si_prohibit_type']=array($arrVal['si_prohibit_type']=>$arrConf[$this->strBaseType]['si_prohibit_type'][$arrVal['si_prohibit_type']]);
//		}
//	}


	function convertListData(&$arrData)
	{
		parent::convertListData($arrData);
//		$this->convertProhibitType($arrData);
	}
}

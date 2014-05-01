<?php
require_once ROOT_PATH.'mis/controllers/coreController.php';
class Mv extends coreController
{
    var $strBaseTableName='quku_mv_info';
    var $strBaseType=QUKU_TYPE_MV;
    var $strPrimaryKey='mi_globalid';
    var $strBaseModelName='Mv_model';
    var $arrUniqueField=array('mi_isrc');
    static $strViedoTableName = "quku_video_info";
    static $strWorksRefTableName = "quku_artist_works_ref";
    static $strVideoFileTableName = "quku_video_files";
    static $strPicTableName = "quku_pic_info";
    static $strMVRefTableName = "quku_mv_ref";

    function  __construct()
    {
        parent::__construct();
    }

    function validateTimeField()
    {
        if(!empty($this->arrFormData[$this->strBaseTableName]['mi_publishtime']))
        {
            if($this->validateTime($this->arrFormData[$this->strBaseTableName]['mi_publishtime'])==false)
            {
                $this->arrTplData['error_code']=1;
                $this->arrTplData['error_message'][]="发行时间格式错误";
            }
        }
    }

    function generateFormMvSong($arrData)
    {
        $arrInfo=$arrData[self::$strMVRefTableName];
        /* foreach ($arrInfo as $intKey=>$arrVal) */
        /* { */
        /*  $arrInfo[$intKey]['json']=json_encode($arrVal); */
        /* } */
        $this->arrTplData['data'][self::$strMVRefTableName]=$arrInfo;
    }

    function getFormMvSong()
    {
        $arrInfo =$this->input->post('quku_mv_ref');
        if(empty($arrInfo))
        {
        return False;
        }
        if(is_string($arrInfo))
        {
        /* $arrInfo =  explode('$@$', $arrInfo); */
        $arrInfo = json_decode($arrInfo,true);
        }
        if(!is_array($arrInfo))
        {
        return False;
        }
        foreach ($arrInfo as $arrVal)
        {
        if(!is_array($arrVal))
        {
            $arrVal = json_decode($arrVal,true);
        }
        if(!$arrVal) continue;
        $this->arrFormData[self::$strMVRefTableName][]=$arrVal;
        }
    }

    function getFormVideoFiles()
    {
        $arrInfo =$this->input->post('quku_video_info');
        if(empty($arrInfo)) return False;
	if(strstr($arrInfo,"$@$"))
	{
	    $arrInfo =  explode('$@$', $arrInfo);
	}
        if(empty($arrInfo))  return False;
	$arrInfo = json_decode($arrInfo,true);
	if(!is_array($arrInfo))
	{
	    return False;
	}
        foreach ($arrInfo as $arrVal)
        {
	    if(!$arrVal) continue;
	    $this->getFormVideoRefAndPic($arrVal);
	    $this->arrFormData[self::$strViedoTableName][]=$arrVal;
        }
    }

    function getFormVideoRefAndPic(&$arrBaseData)
    {
        $arrInfo = $arrBaseData[self::$strVideoFileTableName];
        if(!empty($arrInfo)){
	    if(is_string($arrInfo))
	    {
		$arrInfo =  explode('$@$', $arrInfo);
	    }
	    if(!empty($arrInfo)){
		$result = array();
		foreach ($arrInfo as $arrVal)
		{
		    if(is_string($arrVal))
		    {
			$arrVal = json_decode($arrVal,true);
		    }
		    if(!$arrVal) continue;
		    $result[] = $arrVal;
		}
		if(!empty($result))
		{
		    $arrBaseData[self::$strVideoFileTableName] = $result;
		}
	    }
        }

        $arrInfo = $arrBaseData[self::$strPicTableName];

        if(!empty($arrInfo)){
        if(is_string($arrInfo))
        {
            $arrInfo =  explode('$@$', $arrInfo);
        }
        if(!empty($arrInfo)){
            $result = array();
            foreach ($arrInfo as $arrVal)
            {
            if(is_string($arrVal))
            {
                $arrVal = json_decode($arrVal,true);
            }
            if(!$arrVal) continue;
            $result[] = $arrVal;
            }
            if(!empty($result))
            {
            $arrBaseData[self::$strPicTableName] = $result;
            }
        }
        }
    }

    function generateFormVideoFiles($arrData)
    {
        $arrInfo=$arrData[self::$strViedoTableName];
        /* foreach ($arrInfo as $intKey=>$arrVal) */
        /* { */
        /*  $arrInfo[$intKey]['json']=json_encode($arrVal); */
        /* } */
        $this->arrTplData['data'][self::$strViedoTableName]=json_encode($arrInfo);
    }

    function convertUniqueData($arrParam)
    {
        $this->load->helper('character');
        $arrData=array();
        $arrData['id']=implode("\t",$this->getAuthorId());
        foreach ($arrParam as $strField)
        {
            $arrData[$strField]=estrtolower($this->arrFormData[$this->strBaseTableName][$strField]);
        }
        return md5(implode("\t",$arrData));
    }

    function getUniqueData()
    {
        if($this->arrFormData[$this->strBaseTableName]['mi_isrc_flag']==1)
        {
            return;
        }
        $arrParam=array('mi_title',"mi_subtitle",'mi_versions',"id");
        $this->arrFormData[$this->strBaseTableName]['mi_isrc']=$this->convertUniqueData($arrParam);
    }

    function getPrePubTime()
    {
        $this->arrFormData[$this->strBaseTableName]['mi_pre_pubtime']=strtotime($this->arrFormData[$this->strBaseTableName]['mi_pre_pubtime']);
    }

    function updateSystemBase($bolUpdate=false)
    {
        $strUser=$_SESSION['QUKU_USER']['ub_username'];
        $arrSystemInfo=array();
        if($bolUpdate==false)
        {
            $arrSystemInfo['joinuser']=$strUser;
            $arrSystemInfo['jointime']=time();
        }
        $arrSystemInfo['edituser']=$strUser;
        $arrSystemInfo['edituidnowtime']=0;
        $arrSystemInfo['delflag']    = 0;
        foreach ($arrSystemInfo as $strKey=>$strVal )
        {
            $this->arrFormData[$this->strBaseTableName][$this->strFieldPrefix.$strKey]=$strVal;
        }
    }

    function updateSystemField($intStatus,$bolUpdate=false)
    {
        parent::updateSystemField($intStatus,$bolUpdate);
        /* $this->arrFormData[$this->strBaseTableName]['si_copyright_flag']=7; */
    }

    function convertData()
    {
        parent::convertData();
        $this->getPrePubTime();
    }

    function validateFormData()
    {
        parent::validateFormData();
        $this->validateTimeField();
        /* $this->validatePicUnique(); */
        $this->validateSongRefUnique();
	$this->validateVideoFileUnique();
	$this->validateVideoInfoUnique();
    }

    function validateVideoInfoUnique()
    {
	if(!isset($this->arrFormData[self::$strViedoTableName]) || !is_array($this->arrFormData[self::$strViedoTableName]))
	{
	    return true;
	}
	$intIsUnique = true;
	foreach ($this->arrFormData[self::$strViedoTableName] as $arrVideoInfo) {
	     if(isset($arrVideoInfo["quku_video_info"]))
	     {
		  $arrVideoInfo = $arrVideoInfo["quku_video_info"];
	     }
	     else
	     {
		  continue;
	     }
	     $intTvid = $arrVideoInfo["vi_tvid"];
	     $intProvider = $arrVideoInfo["vi_provider"];
	     if(!$intTvid)
	     {
		  $this->arrTplData['error_code'] = 1;
		  $this->arrTplData['error_message'][]="tvid不能为空";
		  return False;
	     }
	     if(!$intProvider)
	     {
		  $this->arrTplData['error_code'] = 1;
		  $this->arrTplData['error_message'][]="视频提供商不能为空";
		  return False;
	     }
	     if(!$arrVideoInfo["vi_source_path"])
	     {
		 $this->arrTplData['error_code'] = 1;
		 $this->arrTplData['error_message'][]="视频地址不能为空";
		 return False;
	     }
	     $arrParam = array("vi_tvid" => $intTvid,"vi_provider" => $intProvider);
	     $this->load->model("video_model");
	     $arrResult = $this->video_model->normalSearch($arrParam);
	     if($arrResult)
	     {
		 foreach ($arrResult as $arrVideo) {
		     $intGlobalId = $arrVideo["vi_globalid"];
		     if($intGlobalId != $arrVideoInfo["vi_globalid"])
		     {
			 $intIsUnique = False;
			 break;
		     }
		 }
	     }
	}
	if(!$intIsUnique)
	{
	    $this->arrTplData['error_code'] = 1;
	    $this->arrTplData['error_message'][]="该视频提供商提供的视频已经存在";
	    return False;
	}
    }

    function validateVideoFileUnique()
    {
	if(!isset($this->arrFormData[self::$strViedoTableName]) || !is_array($this->arrFormData[self::$strViedoTableName]))
	{
	    return true;
	}
	foreach($this->arrFormData[self::$strViedoTableName] as $arrVideoInfo)
	{
	    if(!isset($arrVideoInfo[self::$strVideoFileTableName]) || !is_array($arrVideoInfo[self::$strVideoFileTableName]))
	    {
		continue;
	    }
	    $arrUniqueField = array();
	    foreach($arrVideoInfo[self::$strVideoFileTableName] as $arrVideoFile)
	    {
		if(!isset($arrVideoFile["vf_definition"]))
		{
		    $this->arrTplData['error_code'] = 1;
		    $this->arrTplData['error_message'][]="视频清晰度不能为空";
		    return false;
		}
		if(!isset($arrVideoFile["vf_file_extension"]))
		{
		    $this->arrTplData['error_code'] = 1;
		    $this->arrTplData['error_message'][]="视频扩展名不能为空";
		    return false;
		}
		if(isset($arrUniqueField[$arrVideoFile["vf_definition"] . $arrVideoFile["vf_file_extension"]]))
		{
		    $this->arrTplData['error_code'] = 1;
		    $this->arrTplData['error_message'][]="视频重复";
		    return false;
		}
		else
		{
		    $arrUniqueField[$arrVideoFile["vf_definition"] . $arrVideoFile["vf_file_extension"]] = 1;		    
		}
	    }
	}
    }


    function validateSongRefUnique()
    {
        $arrPicMd5=array();
        if(!$this->arrFormData[self::$strMVRefTableName])
        {
            return True;
        }
        foreach ($this->arrFormData[self::$strMVRefTableName] as $arrData)
        {
            if(isset($arrPicMd5[$arrData['mr_itemid']]))
            {
                $this->arrTplData['error_code']=1;
                $this->arrTplData['error_message'][]="歌曲关联重复";
            }
            $arrPicMd5[$arrData['mr_itemid']]=1;
        }
    }


    function getFormData($intStatus,$bolUpdate=false)
    {
        parent::getFormData($intStatus,$bolUpdate);
        $this->getUniqueData();
    }

    function addFormData($intStatus)
    {
        $this->getFormData($intStatus);
        $this->validateFormData();
        $this->convertData();
        if($this->arrTplData['error_code']==0)
        {
            $intGlobalId=$this->coreModel->insertFormData($this->arrFormData);
            if($intGlobalId==false)
            {
            $this->arrTplData['error_code']=1;
            $this->arrTplData['error_message'][]='保存数据出错，请联系rd';
            return;
            }
            $this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey]=$intGlobalId;
            $this->arrTplData['data']=$this->arrFormData;
            $this->arrTplData['data']['json']=json_encode($this->arrFormData);
            $this->load->helper("basicserver");
            $arrVideoInfo = $this->arrFormData[self::$strViedoTableName];
            sendRequestToPicture($intGlobalId);
        }
    }


    function updateFormData($intStatus)
    {
        $this->getFormData($intStatus,true);
        $this->validateFormData();
        $this->convertData();
        if($this->arrTplData['error_code']==0)
        {
            $bolRes=$this->coreModel->updateFormData($this->arrFormData);
            if($bolRes==false)
            {
                $this->arrTplData['error_code']=1;
                $this->arrTplData['error_message'][]='保存数据出错，请联系rd';
                return ;
            }
            $this->arrTplData['data']=$this->arrFormData;
            $this->arrTplData['data']['json']=json_encode($this->arrFormData);
            $this->load->helper("basicserver");
            $arrVideoInfo = $this->arrFormData[self::$strViedoTableName];
	    if(is_array($arrVideoInfo))
	    {
		foreach($arrVideoInfo as $v)
		{
		    sendRequestToPicture($v[self::$strViedoTableName]["vi_globalid"]);
		}
	    }
        }
    }

    function generatePrePubTime()
    {
        $intTime=(int)$this->arrTplData['data'][$this->strBaseTableName]['mi_pre_pubtime'];
        if($intTime==0)
        {
            $strTime='';
        }
        else
        {
            $strTime=date( "Y-m-d H:i:s", $intTime);
        }
        $this->arrTplData['data'][$this->strBaseTableName]['mi_pre_pubtime']=$strTime;
    }

    function generateFormBaseData($arrData)
    {
        parent::generateFormBaseData($arrData);
        $this->generatePrePubTime();
    }

    /**
     * 添加数据表单
     *
     */
    function create()
    {
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
        $arrData=$this->coreModel->normalSearch(array($this->strPrimaryKey=>$this->input->ge($tthis->strPrimaryKey)));
        parent::pub();
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
//      $strGlobalId=$this->input->get($this->strPrimaryKey);
//      $arrId=explode(",",$strGlobalId);
//      foreach ($arrId as $intGlobalId)
//      {
//          $res=$this->validateEdituser( $intGlobalId);
//          if($res==false)
//          {
//              break;
//          }
//          $arrParam=array(
//          $this->strPrimaryKey=>$intGlobalId,
//          $this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
//          $this->strFieldPrefix.'status'=>1,
//          'si_prohibit_type'=>4
//          );
//          $bolRes=$this->coreModel->updateStatus($arrParam);
//          if($bolRes==false)
//          {
//              $this->arrTplData['error_code']=1;
//              $this->arrTplData['error_message'][]='下线数据出错，请联系rd';
//          }
//      }
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
//          $this->strFieldPrefix.'prohibit_info'=>$arrConf[$this->strBaseType]['si_prohibit_info'][2],
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
//      $this->strFieldPrefix.'prohibit_info'=>$arrConf[$this->strBaseType]['si_prohibit_info'][0],
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


//  function convertProhibitType(&$arrData)
//  {
//      $arrConf=config_item('form_option');
//      foreach ($arrData as $intKey=>$arrVal)
//      {
//          $arrData[$intKey]['si_prohibit_type']=array($arrVal['si_prohibit_type']=>$arrConf[$this->strBaseType]['si_prohibit_type'][$arrVal['si_prohibit_type']]);
//      }
//  }


    function convertListData(&$arrData)
    {
        parent::convertListData($arrData);
//      $this->convertProhibitType($arrData);
    }
}

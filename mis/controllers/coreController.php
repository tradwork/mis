<?php
class coreController extends MY_Controller
{
	var $strBaseTableName;
	var $arrFormData=array();
	var $strBaseType;
	var $strFieldPrefix;
	var $arrFormStructure=array();
	var $strPrimaryKey;
	var $strBaseModelName;
	var $arrUniqueField=array();
	var $strGlobalIdField;
	static $strPicTableName='quku_pic_info';
	static $strRelativeLinkTableName='quku_relatively_links';
	static $strWorksRefTableName='quku_artist_works_ref';
	static $strTagInfoRelTableName='quku_tag_info_rel';
	static $strTagInfoRelTableName1='quku_tag_info_rel1';

	function __construct()
	{
		parent::__construct();
		$this->init();
	}

	function init()
	{
		$arrTemp=explode("_",$this->strBaseTableName);
		for($i=1;$i<count($arrTemp);$i++)
		{
			$this->strFieldPrefix.=$arrTemp[$i][0];
		}
		$this->strFieldPrefix.='_';
		//		$this->strPrimaryKey=$this->strFieldPrefix.'globalid';
		$this->load->model($this->strBaseModelName,'coreModel');
	}

	function getFormBaseData()
	{
		$arrFieldConf=config_item('table_fields');
		$arrBaseData=array();
		foreach ($arrFieldConf[$this->strBaseTableName] as $strField)
		{
			if($this->input->post($strField) !==false)
			{
				$arrBaseData[$strField]=$this->input->post($strField);
			}
		}
		$this->arrFormData[$this->strBaseTableName]=$arrBaseData;
	}

	function getItemStatus($intStatus)
	{
		$this->arrFormData[$this->strBaseTableName][$this->strFieldPrefix.'status']=$intStatus;
	}

	function updateSystemBase($bolUpdate=false)
	{
		$strUser=$_SESSION['QUKU_USER']['ub_username'];
		$arrSystemInfo=array();
		if($bolUpdate==false)
		{
			$arrSystemInfo['joinuser']=$strUser;
			$arrSystemInfo['jointime']=time();
			$arrSystemInfo['source']=1;
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
		$this->updateSystemBase($bolUpdate);
		$this->getItemStatus($intStatus);
	}

	function getFormPic()
	{
		$arrPicData=array();
		$strPicInfo =  $this->input->post('quku_pic_info');
		$strPicDesc =  $this->input->post('quku_pic_desc');
		$arrPicInfo =  explode('$@$', $strPicInfo);
		$arrPicDesc =  explode('$@$', $strPicDesc);
		foreach($arrPicInfo as $intId=>$strTemp)
		{
			if (empty($strTemp) )
			{
				continue;
			}
			$arrPic=json_decode($strTemp,true);
			$arrPic['pi_pic_desc'] = $arrPicDesc[$intId];
			$arrPicData[] = $arrPic;
		}
		$this->arrFormData[self::$strPicTableName]=$arrPicData;
	}

	function getFormRelativeLink()
	{
		$arrLink=array();
		$strLink=$this->input->post('quku_relatively_links');
		if(!empty($strLink))
		{
			$arrLink=json_decode($strLink,true);
		}
		$this->arrFormData[self::$strRelativeLinkTableName]=$arrLink;
	}

	function getFormTagrel()
	{
		$this->load->model('tag_model');
		$arrData=array();
		$strData=$this->input->post('quku_tag_info_rel');

		if(!empty($strData))
		{
			$arrData=json_decode($strData,true);
			foreach ($arrData as $intKey=>$arrVal)
			{
				if(empty($arrVal['ti_tagid']))
				{
				  if(empty($arrVal["td_name"]))
				    {
				      unset($arrData[$intKey]);
				      continue;
				    }
				  $arrResult=$this->tag_model->normalSearch(array('td_name'=>$arrVal['td_name']));
				  if(empty($arrResult))
				    {
				      $arrData[$intKey]['ti_tagid']=0;
				    }
				  else
				    {
				      $arrData[$intKey]['ti_tagid']=$arrResult[0]['td_tagid'];
				    }
				}
			}
		}
		$this->arrFormData[self::$strTagInfoRelTableName]=$arrData;
	}
	function getFormTagrel1()
	{
	  $this->load->model('tag_model');
	  $arrData=array();
	  $strData=$this->input->post('quku_tag_info_rel1');
	  $tags = $this->arrFormData[self::$strTagInfoRelTableName];
	  if(!empty($strData))
	    {
	      $arrData=json_decode($strData,true);
	      foreach ($arrData as $arrVal)
		{
		$paraentTag = array();
		$childTag = array();
		foreach($arrVal as $key=>$value)
		  {
		    if(!strstr($key,"_1"))
		    {
		      $paraentTag[$key] = $value;
		      $paraentTag["ti_editflag"] = $arrVal["ti_editflag_1"];
		    }
		  else
		    {
		      $childTag[str_replace("_1","",$key)] = $value;
		    }
		}
		if(!empty($paraentTag["ti_tagid"]))
		  {
		    $tags[] = $paraentTag;		    
		  }
		if(!empty($childTag["ti_tagid"]))
		  {
		    $tags[] = $childTag;		    
		  }
		}
	    }
	  $this->arrFormData[self::$strTagInfoRelTableName]=$tags;
	  /* print_r($this->arrFormData[self::$strTagInfoRelTableName]);exit; */
	}


	function getFormAuthor()
	{
		$arrAuthor=array();
		$arrArtistInfo=explode('$@$',$this->input->post('quku_artist_works_ref'));
		foreach($arrArtistInfo as $intKey=>$strName)
		{
			if(empty($strName))
			{
				continue;
			}
			$arrTemp=json_decode($strName,true);
			$arrData=array();
			$arrData['awr_artist_name']=$arrTemp['name'];
			$arrData['awr_artist_id']=$arrTemp['id'];
			$arrData['awr_artist_order']=$arrTemp['idx'];
			$arrAuthor[]=$arrData;
		}
		$this->arrFormData[self::$strWorksRefTableName]=$arrAuthor;
	}

	function getAuthorId()
	{
		$arrId=array();
		foreach ($this->arrFormData[self::$strWorksRefTableName] as $arrVal)
		{
			$arrId[$arrVal['awr_artist_order']]=$arrVal['awr_artist_id'];
		}
		ksort($arrId,SORT_NUMERIC);
		return $arrId;
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

	function getFormData($intStatus,$bolUpdate=false)
	{
		$arrMapConf=config_item('get_formdata_map');
		$arrStructConf=config_item('form_structure');
		foreach ($arrStructConf[$this->strBaseType] as $strVal)
		{
			$strFunction=$arrMapConf[$strVal];
			$this->$strFunction();
		}
		$this->updateSystemField($intStatus,$bolUpdate);
	}

	function validateFormBaseData()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$arrValidateConf=config_item('validate');
		$this->form_validation->set_rules($arrValidateConf[$this->strBaseType]);
		if ($this->form_validation->run() == FALSE)
		{
			$this->arrTplData['error_code']   = 1;
			$arrError=validation_errors();
			if(!empty($arrError))
			{
				foreach (validation_errors() as $strVal)
				{
					$this->arrTplData['error_message'][]=$strVal;
				}
			}
			return false;
		}
		return true;
	}

	function validatePicUnique()
	{
		$arrPicMd5=array();
		foreach ($this->arrFormData[self::$strPicTableName] as $arrData)
		{
			if(isset($arrPicMd5[$arrData['pi_md5']]))
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]="图片md5值重复";
			}
			$arrPicMd5[$arrData['pi_md5']]=1;
		}
	}

	function validateTagrel()
	{
		$arrData=$this->arrFormData[self::$strTagInfoRelTableName];
		$bolRes=true;
		foreach ($arrData as $arrVal)
		{
			if($arrVal['ti_tagid']==0)
			{
				$bolRes=false;
				$this->arrTplData['error_message'][]   = '标签【'.$arrVal['td_name'].'】不合法';
			}
		}
		if(!$bolRes)
		{
			$this->arrTplData['error_code']   = 1;
			return false;
		}
		else
		{
			return true;
		}
	}

	function validateOptionData()
	{
		$this->load->model('option_model');
		$bolRes=true;
		$arrOptionConf=config_item('dic_option');
		foreach ($arrOptionConf[$this->strBaseType] as $strField=>$arrVal)
		{
			if(isset($arrVal['type']))
			{
				$arrParam['od_type']=$arrVal['type'];
			}
			else
			{
				$arrParam['od_type']=$this->strBaseType;
			}
			$arrParam['od_category']=$arrVal['category'];
			$strFormData=$this->arrFormData[$this->strBaseTableName][$strField];
			if(empty($strFormData))
			{
				continue;
			}
            if(!isset($arrVal["need_split"])){
                $arrWord=explode(",",$strFormData);                
            }
            else
            {
                if($arrVal["need_split"])
                {
                    $arrWord=explode(",",$strFormData);                
                }
                else
                {
                    $arrWord=array($strFormData);                
                }
            }

			foreach ($arrWord as $strVal)
			{
				$arrParam['od_word']=$strVal;
				$arrRes=$this->option_model->normalSearch($arrParam);
				if(empty($arrRes))
				{
					$bolRes=false;
					$this->arrTplData['error_message'][]   = '选项【'.$strVal.'】不合法';
				}
			}
		}
		if(!$bolRes)
		{
			$this->arrTplData['error_code']   = 1;
			return false;
		}
		else
		{
			return true;
		}
	}


	function validateUnique()
	{
		$arrParam=array();
		foreach ($this->arrUniqueField as $strVal)
		{
			$arrParam[$strVal]=$this->arrFormData[$this->strBaseTableName][$strVal];
		}
		$arrRes=$this->coreModel->normalSearch($arrParam);
		if(!empty($arrRes) && $arrRes[0][$this->strPrimaryKey]!=$this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey])
		{
			$this->arrTplData['error_code']   = 1;
			$this->arrTplData['error_message'][]   = "数据已存在";
			return false;
		}
		return true;
	}

	function validateLockData()
	{
		$strLockUser=$this->arrFormData[$this->strBaseTableName][$this->strFieldPrefix.'editusernow'];
		if(empty($strLockUser))
		{
			return true;
		}
		if($_SESSION['QUKU_USER']['ub_groupid']<3)
		{
			$this->arrTplData['error_code']   = 1;
			$this->arrTplData['error_message'][]   = "对不起，您没有权限锁定数据";
			return false;
		}
		$this->load->model('user_model','user');
		$arrParam=array('ub_username'=>$strLockUser);
		$arrRes=$this->user->normalSearch($arrParam);
		if(empty($arrRes))
		{
			$this->arrTplData['error_code']   = 1;
			$this->arrTplData['error_message'][]   = "锁定人为不合法用户";
			return false;
		}
		else
		{
			if($arrRes[0]['ub_groupid']<3)
			{
				$this->arrTplData['error_code']   = 1;
				$this->arrTplData['error_message'][]   = "锁定人必须为管理员";
				return false;
			}
		}
	}

	function validateEdituser($intId)
	{
		$arrParam=array($this->strPrimaryKey=>$intId);
		$arrRes=$this->coreModel->normalSearch($arrParam);
		$strEditUser=$arrRes[0][$this->strFieldPrefix.'editusernow'];
		if(!empty($strEditUser)&& $strEditUser!=$_SESSION['QUKU_USER']['ub_username'])
		{
			$this->arrTplData['error_code']   = 1;
			$this->arrTplData['error_message'][]   = sprintf("对不起，此数据已经被 %s 锁定",$strEditUser);
			return false;
		}
		return true;
	}



	function validateFormData()
	{
		$this->validateFormBaseData();
		$this->validateOptionData();
		$this->validateUnique();
	}

	function convertData()
	{
		$arrFilterConf=config_item('form_filter_field');
		$arrData=$this->arrFormData[$this->strBaseTableName];
		foreach ($arrFilterConf[$this->strBaseType] as $strVal)
		{
			$strData=str_replace("，",",",$arrData[$strVal]);
			$arrTempData=explode(",",$strData);
			$this->arrFormData[$this->strBaseTableName][$strVal]=implode(",",array_unique($arrTempData));
		}
	}

	function addFormData($intStatus)
	{
		$this->getFormData($intStatus);
		$this->validateFormData();
		$this->convertData();
		if($this->arrTplData['error_code']==0)
		{
			$bolRes=$this->coreModel->insertFormData($this->arrFormData);
			if($bolRes==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='保存数据出错，请联系rd';
			}
			else
			{
				return $bolRes;
			}
		}
	}

	//	function getOptionFromDb($strDicType)
	//	{
	//		$arrResult=array();
	//		$this->load->model('option_model');
	//		$arrParam['od_type']=$this->strBaseType;
	//		$arrParam['od_category']=$strDicType;
	//		$arrRes=$this->option_model->normalSearch($arrParam);
	//		foreach ($arrRes as $arrVal)
	//		{
	//			$arrResult[]=$arrVal['od_word'];
	//		}
	//		return $arrResult;
	//	}

	function getFormOptionData()
	{
		$arrOptionConf=config_item('form_option');
		$arrDicOption=$this->getDicOption();
        $arrTagOption = $this->getTagInfo();
		$this->arrTplData['data']['option']=array_merge($arrOptionConf[$this->strBaseType],$arrDicOption,$arrTagOption);
	}

	function getDicOption()
	{
		$arrDicConf=config_item('dic_option');
		$arrOption=array();
		foreach ($arrDicConf[$this->strBaseType] as $strField=>$arrVal)
		{
			if(!isset($arrVal['option_flag']))
			{
				continue;
			}
			$this->load->model('option_model');
			$arrParam=array();
			if(isset($arrVal['type']))
			{
				$arrParam['od_type']=$arrVal['type'];
			}
			else
			{
				$arrParam['od_type']=$this->strBaseType;
			}
			$arrParam['od_category']=$arrVal['category'];
			$arrRes=$this->option_model->normalSearch($arrParam);
			foreach ($arrRes as $arrVal)
			{
				$arrOption[$strField][$arrVal['od_word']]=$arrVal['od_word'];
			}
		}
		return $arrOption;
	}

	function updateFormData($intStatus)
	{
		$this->getFormData($intStatus,true);
		$this->convertData();
		$this->validateFormData();
		
		if($this->arrTplData['error_code']==0)
		{
			$bolRes=$this->coreModel->updateFormData($this->arrFormData);
			if($bolRes==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='保存数据出错，请联系rd';
			}
		}
	}

	function create()
	{
		$this->getFormOptionData();
	}

	function getDataFromDb($intGlobalId)
	{
		$arrRes=$this->coreModel->getFormData($intGlobalId);
		return $arrRes;
	}



	function generateFormBaseData($arrData)
	{
		$this->arrTplData['data'][$this->strBaseTableName]=htmlFilter($arrData[$this->strBaseTableName]);
	}

	/* function generateFormDistribution($arrData) */
	/* { */
	/*   $this->arrTplData['data']["quku_songs_distribution"]=$arrData[$this->strBaseTableName]["si_distribution"]; */
	/* } */

	function generateFormPicData($arrData)
	{
		$arrPicInfo=$arrData[self::$strPicTableName];
		foreach ($arrPicInfo as $intKey=>$arrPic)
		{
			$arrPicInfo[$intKey]['json']=json_encode($arrPic);
		}
		$this->arrTplData['data'][self::$strPicTableName]=json_encode($arrPicInfo);
	}

	function generateFormRelativeLink($arrData)
	{
		$arrRelativeLink=$arrData[self::$strRelativeLinkTableName];
		foreach ($arrRelativeLink as $intKey=>$arrLink)
		{
			$arrRelativeLink[$intKey]=htmlFilter($arrLink);
		}
		$this->arrTplData['data'][self::$strRelativeLinkTableName]=$arrRelativeLink;
	}

    function getTagInfo(){
		$this->load->model('tag_model',"tag");
        $arrParam = array("td_category" => 1,'td_parentid' => 0);
        //$arrParam = array("td_category" => 1);
        $arrTags = $this->tag->normalSearch($arrParam);
        $arrRes = $arrRes1 = array();
        if(!$arrTags) return False;
        foreach($arrTags as  $arrTag){
            $arrParam = array("td_parentid" => $arrTag["td_tagid"]);
            $arrRes[$arrTag["td_tagid"]] = $arrTag["td_name"];
            $arrSecRes = $this->tag->normalSearch($arrParam);
            if(!$arrSecRes)continue;
            foreach($arrSecRes as $v){
                if(!isset($arrRes1[$v["td_parentid"]])){
                    $arrRes1[$v["td_parentid"]] = array();
                }
                $arrRes1[$v["td_parentid"]][$v["td_tagid"]] = $v["td_name"];
            }
        }
        return array("si_tag_rel"=>$arrRes,"si_tag_rel1"=>$arrRes1);

    }

	function generateFormTagrel($arrData)
	{
		$this->load->model('tag_model');
		$arrData=$arrData[self::$strTagInfoRelTableName];
		$specilTag = $this->getTagInfo();
		$tags = array();
		foreach($specilTag["si_tag_rel"] as $k => $v)
		  {
		    $tags[] = $k;
		  }
		foreach($specilTag["si_tag_rel1"] as $k => $v)
		  {
		    $tags = array_merge($tags,array_keys($v));
		  }
		foreach($arrData as $intKey => $arrVal)
		  {
		    if(in_array($arrVal["ti_tagid"],$tags))
		      {
			unset($arrData[$intKey]);
		      }
		  }
		if(!empty($arrData))
		{
			foreach ($arrData as $intKey=>$arrVal)
			{
				$arrResult=$this->tag_model->normalSearch(array('td_tagid'=>$arrVal['ti_tagid']));
				$arrVal['td_name']=$arrResult[0]['td_name'];
				$arrData[$intKey]=htmlFilter($arrVal);
			}
		}
		$this->arrTplData['data'][self::$strTagInfoRelTableName]=$arrData;
	}

	function generateFormTagrel1($arrData)
	{
		$this->load->model('tag_model');
		$specilTag = $this->getTagInfo();
		$arrData=$arrData[self::$strTagInfoRelTableName];
		$specilTags = array();
		if(!empty($arrData))
            {
                foreach ($arrData as $intKey=>$arrVal)
                    {
                        $arrResult=$this->tag_model->normalSearch(array('td_tagid'=>$arrVal['ti_tagid']));
                        $arrVal["td_name"] = $arrResult[0]['td_name'];
                        $arrVal["td_parentid"] = $arrResult[0]['td_parentid'];
                        $arrData[$intKey]=htmlFilter($arrVal);
                    }
            }

		if(!empty($arrData))
            {
                $handers = array();
                foreach($arrData as $intKey => $arrVal)
                    {
                        foreach($specilTag['si_tag_rel1'] as $k => $v)
                            {
                                if(in_array($arrVal["td_name"],array_values($v)))
                                    {
                                        $paraentTag = array_pop($this->tag_model->normalSearch(array("td_tagid"=>$arrVal["td_parentid"])));
                                        $paraentTag["ti_weight"] = $arrVal["ti_weight"];
                                        $handers[] = $paraentTag["td_tagid"];
                                        $handers[] = $arrVal["ti_tagid"];
                                        foreach($arrData as $value)
                                            {
                                                if($value["ti_tagid"] == $paraentTag["td_tagid"])
                                                    {
                                                        $paraentTag = $value;
                                                        $matchParentTag = True;
                                                        break;
                                                    }
                                                else
                                                    {
                                                        continue;
                                                    }
                                            }
                                        foreach($arrVal as $i => $j)
                                            {
                                                $paraentTag[$i."_1"] = $j;
                                            }
                                        $specilTags[] = $paraentTag;
                                    }
                            }
                    }
            }
		foreach($arrData as $intKey => $arrVal)
            {
                foreach($specilTag["si_tag_rel"] as $k => $v)
                    {
                        if($k == $arrVal["ti_tagid"] && !in_array($arrVal["ti_tagid"],$handers))
                            {
                                $paraentTag = $arrVal;
                                $paraentTag["ti_editflag_1"] = $arrVal["ti_editflag"];
                                $specilTags[] = $paraentTag;
                            }
                    }
            }
		$this->arrTplData['data'][self::$strTagInfoRelTableName1]=$specilTags;
	}


	function generateFormAuthor($arrData)
	{
		$arrAuthor=array();
		foreach ($arrData[self::$strWorksRefTableName] as $arrVal)
		{
			$arrAuthor[]=$arrVal['awr_artist_name'];
		}
		$arrAuthor=htmlFilter($arrAuthor);
		$this->arrTplData['data'][self::$strWorksRefTableName]=implode(",",$arrAuthor);
	}

	function generateFormData($arrData)
	{
		$this->load->helper('character');
		$arrMapConf=config_item('generate_formdata_map');
		$arrStructConf=config_item('form_structure');
		foreach ($arrStructConf[$this->strBaseType] as $strVal)
		{
			$strFunction=$arrMapConf[$strVal];
			$this->$strFunction($arrData);
		}
	}


	function doCreate()
	{
		$this->addFormData(1);
		//		echo json_encode($this->arrTplData);
	}

	function doCreateAndPub()
	{
		$this->addFormData(0);
		//		echo json_encode($this->arrTplData);
	}

	function doEdit()
	{
		$this->updateFormData(1);
		//		echo json_encode($this->arrTplData);
	}



	function doEditAndPub()
	{
		$this->updateFormData(0);
		//		echo json_encode($this->arrTplData);
	}

	function edit()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
		$this->getFormOptionData();
		$arrDbData=$this->getDataFromDb($intGlobalId);
		$this->generateFormData($arrDbData);
	}


	function pubItem($intGlobalId)
	{
		$arrParam=array(
		$this->strPrimaryKey=>$intGlobalId,
		$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'status'=>0
		);
		if($this->arrTplData['error_code']==0)
		{
			$bolRes=$this->coreModel->updateStatus($arrParam);
			if($bolRes==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='发布数据出错，请联系rd';
			}
			return $bolRes;
		}
	}

	function pub()
	{
		$this->pubItem($this->input->get($this->strPrimaryKey));
	}

	function batchPub()
	{
		$strGlobalId=$this->input->get($this->strPrimaryKey);
		$arrId=explode(",",$strGlobalId);
		foreach ($arrId as $intGlobalId)
		{
			$res=$this->pubItem($intGlobalId);
			if($res==false)
			{
				return;
			}
		}
	}



	function disPub()
	{
		$strGlobalId=$this->input->get($this->strPrimaryKey);
		$arrId=explode(",",$strGlobalId);
		foreach ($arrId as $intGlobalId)
		{
			$res=$this->validateEdituser( $intGlobalId);
			if($res==false)
			{
				break;
			}
			$arrParam=array(
			$this->strPrimaryKey=>$intGlobalId,
			$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
			$this->strFieldPrefix.'status'=>1
			);
			$bolRes=$this->coreModel->updateStatus($arrParam);
			if($bolRes==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='下线数据出错，请联系rd';
			}
		}
	}

	function deleteItem($intGlobalId)
	{
		$arrParam=array(
		$this->strPrimaryKey=>$intGlobalId,
		$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'delflag'=>1
		);
		$bolRes=$this->coreModel->updateDelFlag($arrParam);
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='删除数据出错，请联系rd';
		}
		return $bolRes;
	}

	function delete()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
		$this->deleteItem($intGlobalId);
	}

	function batchDelete()
	{
		$strGlobalId=$this->input->get($this->strPrimaryKey);
		$arrId=explode(",",$strGlobalId);
		foreach ($arrId as $intGlobalId)
		{
			$res=$this->deleteItem($intGlobalId);
			if($res==false)
			{
				break;
			}
		}
	}

	function disDeleteItem($intGlobalId)
	{
		$arrParam=array(
		$this->strPrimaryKey=>$intGlobalId,
		$this->strFieldPrefix.'edituser'=>$_SESSION['QUKU_USER']['ub_username'],
		$this->strFieldPrefix.'delflag'=>0
		);
		$bolRes=$this->coreModel->updateDelFlag($arrParam);
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='恢复数据出错，请联系rd';
		}
		return $bolRes;
	}

	function disDelete()
	{
		$intGlobalId=$this->input->get($this->strPrimaryKey);
		$this->disDeleteItem($intGlobalId);
	}

	function batchDisDelete()
	{
		$strGlobalId=$this->input->get($this->strPrimaryKey);
		$arrId=explode(",",$strGlobalId);
		foreach ($arrId as $intGlobalId)
		{
			$res=$this->disDeleteItem($intGlobalId);
			if($res==false)
			{
				break;
			}
		}
	}


	function getSearchOptionData()
	{

		$arrSearchConf=config_item('search_option');
		$this->arrTplData['data']['search_option']=array_merge($arrSearchConf[$this->strBaseType],$arrSearchConf['common']);
	}

	function getSearchParam()
	{
		$arrParam=array();
		$arrSearchConf=config_item('search_option');
		$arrTemp=array_merge($arrSearchConf[$this->strBaseType],$arrSearchConf['common']);
		foreach ($arrTemp  as $strKey=>$arrVal)
		{
			$strGetVal=$this->input->get($strKey);
			if($strGetVal===false || $strGetVal=='' )
			{
				$arrParam[$strKey]=$arrVal['default'];
			}
			else
			{
				$arrParam[$strKey]=$strGetVal;
			}
		}
		$arrSearchInputConf=config_item('search_input_field');
		$arrTemp=array_merge($arrSearchInputConf['common'],$arrSearchInputConf[$this->strBaseType]);
		foreach($arrTemp as $arrVal)
		{
			$strGetVal=$this->input->get($arrVal['field']);
			if($strGetVal===false || $strGetVal=='')
			{
				if(isset($arrVal['default']))
				{
					$arrParam[$arrVal['field']]=$arrVal['default'];
				}
			}
			else
			{
				$arrParam[$arrVal['field']]=$strGetVal;
			}
		}
		$arrParam['tn']=$this->input->get('tn');
		return $arrParam;
	}

	function convertListData(&$arrData)
	{
		$this->load->helper('character');
		foreach ($arrData as $intKey=>$arrVal)
		{
			$arrData[$intKey]=htmlFilter($arrVal);
		}
	}

	function getListUrl($arrSearchParam,$intDataCount)
	{
		$this->load->helper('url');
		$this->load->helper('listpage');
		$strPreUrl=site_url().'?c='.$this->input->get('c').'&m='.$this->input->get('m').'&';
		$intPageId=$arrSearchParam['search_page_id'];
		$intLastPage=$intPageId-1;
		if($intLastPage<1)
		{
			$intLastPage=1;
		}
		if($intDataCount<$arrSearchParam['search_page_size'])
		{
			$intNextPage=$intPageId;
		}
		else
		{
			$intNextPage=$intPageId+1;
		}
		unset($arrSearchParam['search_page_id']);
		$strQueryString='&'.http_build_query($arrSearchParam);
		$strListPage=lib_list_page_light($strPreUrl,$intPageId,$arrSearchParam['search_page_size'],true,$strQueryString,$intLastPage,$intNextPage);
		return $strListPage;
	}

	function search()
	{
		$this->getSearchOptionData();
		$arrParam=$this->getSearchParam();
		
		//get data from db
		$arrListData=$this->coreModel->listSearch($arrParam);
		//show data
//		$this->convertListData($arrListData['data']);
		$strListPage=$this->getListUrl($arrParam,count($arrListData['data']));
		$arrFormOption=config_item('form_option');
		$this->arrTplData['data']['form_option']=$arrFormOption[$this->strBaseType];
		$this->arrTplData['data']['list_rows'] = $arrListData['data'];
		$this->arrTplData['data']['list_page_code']=$strListPage;
		$this->arrTplData['data']['current_option']=$arrParam;
		if(isset($arrListData['count']))
		{
			$this->arrTplData['data']['count']=$arrListData['count'];
		}
	}




	function checkBaseChange($arrData)
	{
		$intChangeFlag=0;
		$arrConf=config_item('audit_fields');
		foreach($arrConf[$this->strBaseType] as $strKey=>$arrVal)
		{
			if(isset($this->arrFormData[$this->strBaseTableName][$strKey]))
			{
				if(strcasecmp($this->arrFormData[$this->strBaseTableName][$strKey],$arrData[$this->strBaseTableName][$strKey])!=0)
				{
					$intChangeFlag|=$arrVal['value'];
				}
			}
		}
		return $intChangeFlag;
	}

	function checkPicChange($arrData)
	{
		$intChangeFlag=0;
		$arrConf=config_item('audit_fields');
		$arrOldPicId=array();
		$arrNewPicId=array();
		foreach ($arrData[self::$strPicTableName] as $arrVal)
		{
			$arrOldPicId[]=$arrVal['pi_globalid'];
		}
		foreach ($this->arrFormData[self::$strPicTableName] as $arrVal)
		{
			$arrNewPicId[]=$arrVal['pi_globalid'];
		}
		$arrDiff1=array_diff($arrOldPicId,$arrNewPicId);
		$arrDiff2=array_diff($arrNewPicId,$arrOldPicId);
		if(!empty($arrDiff1) || !empty($arrDiff2))
		{
			$intChangeFlag|=$arrConf[$this->strBaseType][self::$strPicTableName]['value'];
		}
		return $intChangeFlag;
	}

	function checkAuthorChange($arrData)
	{
		$intChangeFlag=0;
		$arrConf=config_item('audit_fields');
		$arrOldId=array();
		$arrNewId=array();
		foreach ($arrData[self::$strWorksRefTableName] as $arrVal)
		{
			$arrOldId[]=$arrVal['awr_artist_id'];
		}
		foreach ($this->arrFormData[self::$strWorksRefTableName] as $arrVal)
		{
			$arrNewId[]=$arrVal['awr_artist_id'];
		}
		$arrDiff1=array_diff($arrOldId,$arrNewId);
		$arrDiff2=array_diff($arrNewId,$arrOldId);
		if(!empty($arrDiff1) || !empty($arrDiff2))
		{
			$intChangeFlag|=$arrConf[$this->strBaseType][self::$strWorksRefTableName]['value'];
		}
		return $intChangeFlag;
	}

	function checkDataChange($arrDbData)
	{
		$intChangeflag=0;
		$intChangeflag += $this->checkBaseChange($arrDbData);
		return $intChangeflag;
	}

	function getCacheInfo()
	{
		$arrParam['or_type']=$this->strBaseType;
		$arrParam['or_itemid']=$this->arrFormData[$this->strBaseTableName][$this->strPrimaryKey];
		$arrDbData=$this->getDataFromDb($arrParam['or_itemid']);
		$arrParam['or_content_type']=$this->checkDataChange($arrDbData);
		$arrParam['or_content']=json_encode($this->arrFormData);
		$arrParam['or_edituser']=$_SESSION['QUKU_USER']['ub_username'];
		$arrParam['or_edittime']=time();
		$arrParam['or_status']=1;
		return $arrParam;
	}

	function validateCacheData($arrParam)
	{
		if($arrParam['or_content_type']==0)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='数据无变化';
		}
	}


	function saveInCache()
	{
		$intStatus=1;
		$this->load->model('operate_model');
		$this->getFormData($intStatus,true);
		$this->validateFormData();
		$this->convertData();
		$arrParam=$this->getCacheInfo();
		$this->validateCacheData($arrParam);
		if($this->arrTplData['error_code']==0)
		{
			$bolRes=$this->operate_model->insertFormData($arrParam);
			if($bolRes==false)
			{
				$this->arrTplData['error_code']=1;
				$this->arrTplData['error_message'][]='保存数据出错，请联系rd';
			}
		}
	}

	function getAuditField($arrData)
	{
		$arrConf=config_item('audit_fields');
		foreach (array_keys($arrConf[$this->strBaseType]) as $strVal)
		{
			if($arrData['or_content_type'] & $arrConf[$this->strBaseType][$strVal]['value'])
			{
				$this->arrTplData['audit_data'][]=$strVal;
			}
		}
	}


	function getCacheFromDb($intId)
	{
		$this->load->model('operate_model');
		$arrParam=array('or_id'=>$intId);
		$arrData=$this->operate_model->normalSearch($arrParam);
		return $arrData[0];
	}

	//	function convertCacheLrc($arrCacheData)
	//	{
	//		return array($arrCacheData['quku_songs_lrcs']);
	//	}
	//
	//	function convertCacheCopyright($arrCacheData)
	//	{
	//		return ;
	//	}
	//
	//	function convertCacheContent($arrCacheData,$intType)
	//	{
	//		$arrNewCacheData=array();
	//		if($intType==1)
	//		{
	//			$intGlobalId=$arrCacheData['quku_songs_info']['si_globalid'];
	//			$arrNewCacheData['quku_songs_info']['si_title']=$arrCacheData['quku_songs_info']['si_title'];
	//			$arrAuthor=explode(",",$arrCacheData['quku_songs_info']['si_author']);
	//			$arrAuthorId=explode(",",$arrCacheData['quku_songs_info']['si_allaid']);
	//			foreach ($arrAuthor as $intKey=>$strVal)
	//			{
	//				$arrTemp=array();
	//				$arrTemp['awr_type']=$intType;
	//				$arrTemp['awr_itemid']=$intGlobalId;
	//				$arrTemp['awr_artist_name']=$strVal;
	//				$arrTemp['awr_artist_id']=$strVal;
	//			}
	//			$arrNewCacheData['quku_songs_info']['si_author']=$arrCacheData['quku_songs_info']['si_author'];
	//
	//		$arrCacheData['quku_songs_lrcs']=array($arrCacheData['quku_songs_lrcs']);
	//		$arrCacheData['quku_songs_copyright']=array();
	//		}
	//
	//		return $arrCacheData;
	//	}

	public function showCacheInfo()
	{
		$arrCacheData=$this->getCacheFromDb($this->input->get('or_id'));
		$intType=$arrCacheData['or_type'];
		$intGlobalId=$arrCacheData['or_itemid'];
		$this->getFormOptionData();
		//		$arrCacheContent= $this->convertCacheContent(json_decode($arrCacheData['or_content'],true));
		$this->generateFormData(json_decode($arrCacheData['or_content'],true));
		$this->arrTplData['cache_data']=$this->arrTplData['data'];
		$this->arrTplData['data']=array();
		$this->getFormOptionData();
		$arrDbData=$this->getDataFromDb($intGlobalId);
		$this->generateFormData($arrDbData);
		$this->getAuditField($arrCacheData);
		$this->arrTplData['data']['or_id']=$this->input->get('or_id');
	}


	function updateCacheInfo()
	{
		$arrParam=array();
		$intId=$this->input->post('or_id');
		$arrParam['or_id']=$intId;
		$strUpdateField= $this->input->post('update_filed');
		$strAuditField= $this->input->post('audit_filed');
		$arrUpdateField=explode(",",$strUpdateField);
		$arrAuditField=explode(",",$strAuditField);
		$arrDiff=array_diff($arrAuditField,$arrUpdateField);
		$arrAuditConf=config_item('audit_fields');
		if(empty($arrDiff))
		{
			$arrParam['or_status']=0;
		}
		else
		{
			$intFlag=0;
			foreach ($arrDiff as $strVal)
			{
				$intFlag|=$arrAuditConf[$this->strBaseType][$strVal]['value'];
			}
			$arrParam['or_status']=2;
			$arrParam['or_fail_field']=$intFlag;
		}
		$this->load->model('operate_model');
		$this->operate_model->updateFormData($arrParam);
		return $arrUpdateField;
	}

	function getAuditBaseData($arrData,$arrField)
	{
		$arrResult=array();
		foreach ($arrField as $strField)
		{
			if(isset($arrData[$this->strBaseTableName][$strField]))
			{
				$arrResult[$strField]=$arrData[$this->strBaseTableName][$strField];
			}
		}
		$strAuditField= $this->input->post('audit_filed');
		$arrAuditField=explode(",",$strAuditField);
		if(count(array_diff($arrAuditField,$arrField))==0)
		{
			$arrResult[$this->strFieldPrefix.'audit_status']=0;
		}
		$arrResult[$this->strPrimaryKey]=$arrData[$this->strBaseTableName][$this->strPrimaryKey];
		$this->arrFormData[$this->strBaseTableName]=$arrResult;
	}

	function getAuditPic($arrData,$arrField)
	{
		if(in_array(self::$strPicTableName,$arrField))
		{
			$this->arrFormData[self::$strPicTableName]=$arrData[self::$strPicTableName];
		}
	}

	function getAuditAuthor($arrData,$arrField)
	{
		if(in_array(self::$strWorksRefTableName,$arrField))
		{
			$this->arrFormData[self::$strWorksRefTableName]=$arrData[self::$strWorksRefTableName];
		}
	}

	function basicServerProcess($arrSongList)
	{
		$this->load->helper('basicserver');
		$arrFileId=array();
		$arrSongId=array();
		foreach ($arrSongList as $arrSongInfo)
		{
			$intSongId=$arrSongInfo['quku_songs_info']['si_globalid'];
			$arrSongId[]=$intSongId;
			foreach ($arrSongInfo['quku_songs_files'] as $arrVal)
			{
				$arrFileId[$intSongId][]=$arrVal['sf_globalid'];
			}
			sendRequestToDss(array($intSongId),$arrFileId);
		}
//		sendRequestToDss($arrSongId,$arrFileId);
//		sendRequestToTag($arrFileId);
//		sendRequestToTransrate($arrSongId);
//		sendRequestToPic($arrSongId);
//		sendRequestToAac($arrSongId);
//		sendRequestToFpid($arrSongId);
	}

	function getAuditData($arrData,$arrField)
	{
		$this->getAuditBaseData($arrData,$arrField);
	}

	function updateOnlineData($arrField)
	{
		$arrCacheData=$this->getCacheFromDb($this->input->post('or_id'));
		$arrData=json_decode($arrCacheData['or_content'],true);
		$this->getAuditData($arrData,$arrField);
		$this->updateSystemBase(true);
		$bolRes=$this->coreModel->updateFormData($this->arrFormData);
		if($bolRes==false)
		{
			$this->arrTplData['error_code']=1;
			$this->arrTplData['error_message'][]='保存数据出错，请联系rd';
			return;
		}
	}

	function synchronize()
	{
		$arrField=$this->updateCacheInfo();
		$this->updateOnlineData($arrField);
	}

}

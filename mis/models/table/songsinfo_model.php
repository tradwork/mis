<?php
class Songsinfo_model extends DbManage_model
{
	var $strTable='quku_songs_info';
	var $strPrimaryKey='si_globalid';

	function insert($arrData)
	{
		if(empty($arrData))
		{
			throw new Exception('the data parameter is empty, please check');
		}
		$arrData['si_priority']=2;
		$arrData['si_priority_settime']=time();
		if(isset($arrData["si_prohibit_type"]))
		{
		  if($arrData["si_prohibit_type"] == 2)
		    {
		      $arrData["si_recordingcopyright_type"] = 1;
		    }else
		    {
		      $arrData["si_recordingcopyright_type"] = 1;
		    }
		}

		$arrData = $this->updateRecording($arrData);
		$this->db->insert($this->strTable, $arrData);
		return $this->db->insert_id();
	}

	function select($arrWhere=array(),$strOrderby='',$strSort='ASC',$intLimit=0,$intOffset=0,$arrField=array(),$arrOr=array())
	{
	  $this->load->helper("recording");
	  $arrResult = parent::select($arrWhere,$strOrderby,$strSort,$intLimit,$intOffset,$arrField,$arrOr);
	  $arrResult = $this->getRecording($arrResult);
	  return $arrResult;
	}

	function update($arrData,$arrWhere=array())
	{
		if(empty($arrData))
		{
			throw new Exception('the data parameter is empty, please check');
		}
		if(empty($arrWhere))
		{
			if(isset($arrData[$this->strPrimaryKey]))
			{
				$arrWhere=array($this->strPrimaryKey=>$arrData[$this->strPrimaryKey]);
			}
			else
			{
				throw new Exception('the where parameter is empty, please check');
			}
		}
		$arrData['si_priority']=2;
		$arrData['si_priority_settime']=time();
		if(isset($arrData["si_prohibit_type"]))
		{
		  if($arrData["si_prohibit_type"] == 2)
		    {
		      $arrData["si_recordingcopyright_type"] = 1;
		    }else
		    {
		      $arrData["si_recordingcopyright_type"] = 1;
		    }
		}
		$arrData = $this->updateRecording($arrData);
//		if(isset($arrData['si_delflag']) && strval($arrData['si_delflag']) === '0'){
//			$song = $this->select($arrWhere);
//			if(count($song)){
//				$song = array_shift($song);
//				if($song['si_prohibit_type'] == 4){
//					$arrData['si_prohibit_type'] = 3;
//				}
//			}
//		}
//
//		if (isset($arrData['si_prohibit_type'])){
//			if ($arrData['si_prohibit_type'] == 4){
//				$arrData['si_delflag'] = 1;
//			}
//		}


		$this->db->update($this->strTable,$arrData,$arrWhere);
	}

	private function updateRecording($arrData){
	  if(!isset($arrData["si_recording_type"])) return $arrData;
	  $this->load->helper("recording");
	  $si_recording = $arrData["si_recording_type"];
	  $r = array();
	  $recording_type = config_item("form_option");
	  $recording_type = $recording_type[QUKU_TYPE_SONG]["si_recording_type"];
	  if(!is_array($si_recording)){
	    $si_recording = explode(",",$si_recording);
	  }
	  foreach($si_recording as $v){
	    $k = array_search($v,$recording_type);
	    if(!$k){
	      $r[] = $v;
	    }else{
	      $r[] = $k;
	    }
	  }
	  $si_recording = convertRecording($r);
	  $arrData["si_recording_type"] = $si_recording;
	  return $arrData;
	}

	private function getRecording($arrResult){
	  $recording_type = config_item("form_option");
	  $recording_type = $recording_type[QUKU_TYPE_SONG]["si_recording_type"];
	  foreach($arrResult as &$item){
	    $need_display = convertRecording($item["si_recording_type"],False);
	    $need_display = getCopyrights($need_display,$recording_type);
	    $r = array();
	    foreach($recording_type as $k => $v){
	      if(isset($need_display[$k])){
		$r[] = $k;
	      }else{
		$r[] = 0;
	      }
	    }
	    $need_display = implode(",",$r);
	    $item["si_recording_type"] = $need_display;
	  }
	  return $arrResult;
	}

}
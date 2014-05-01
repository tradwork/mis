var tblAudio;
var cntAudio;
cntAudio = 0;

$(document).ready(function(){
	tblAudio = document.getElementById('tableAudio');
	if(jsonAidio.length)	{
		initAidioValue(jsonAidio);
	}
	else if(tblAudio)	{
		addAudioRow(1);
	}
});

// add a new "pic record" after a specified one.
// num: how much rows wanted to be added
// obj: add new rows after this one
// enity: the entity for pic edit
function addAudioRow(num, obj, entity)	{
	num = typeof num == "undefined" || num <= 0 ? 1 : num;
	obj = typeof obj == "undefined" || !obj ? null : obj;
	entity = typeof entity == "undefined" || !entity ? {} : entity;
	//valObj = typeof valObj == "undefined" "" !valObj ? null : valObj;
	if(obj)	{
		var pObj = obj.parentNode.parentNode;
		var nPObj = typeof pObj.nextSibling == "undefined" || !pObj.nextSibling ? null : pObj.nextSibling;
	}
	else	{
		var pObj = null;
		var nPObj = null;
	}

	if($.browser.mozilla)	var t = tblAudio;
	else if($.browser.msie)	var t = tblAudio.childNodes[0];

	for(var n = 0; n < num; n++)	{
		var a=[],
       tr=[],
       td=[],
    input=[],
   select=[],
     span=[];
		tr[0] = document.createElement('tr');

		td[0] = document.createElement('td');
		td[1] = document.createElement('td');
		td[2] = document.createElement('td');
		td[3] = document.createElement('td');
		td[4] = document.createElement('td');
		td[5] = document.createElement('td');
		td[6] = document.createElement('td');
		td[7] = document.createElement('td');
		td[8] = document.createElement('td');
		td[9] = document.createElement('td');
		td[10] = document.createElement('td');
      	td[11] = document.createElement('td');
		td[12] = document.createElement("td");		
		td[12].className = "nb";
		td[12].style="1px red solid";
		td[12].innerHTML = "<span class='nb_uniqfile' style='color:red'></span>";


		input[1] = document.createElement('input');
		input[2] = document.createElement('input');
		input[3] = document.createElement('input');
		input[4] = document.createElement('input');
		input[5] = document.createElement('input');
		input[6] = document.createElement('input');
	    input[7] = document.createElement('input');
		input[8] = document.createElement('input');
	    input[11] = document.createElement('select');
	    input[12] = document.createElement('input');
		select[3] = document.createElement('select');


		a[0] = document.createElement('a');
		a[1] = document.createElement('a');
		span[0] = document.createElement('span');
		span[1] = document.createElement('span');

		input[1].type = 'file';
		input[1].className = 'audioFile';
		input[1].name = 'audioFile[]';
		input[1].value = '';
		input[1].style.width = '220px';
		input[1].id = 'avatarMedia' + cntAudio;
	    input[1].disabled =  entity.sf_file_size ? true : false;

		input[2].type = 'text';
		input[2].className = 'audioFormat';
		input[2].name = 'audioFormat[]';
		input[2].value = entity.sf_file_extension ? entity.sf_file_extension : '';
		input[2].style.width = '45px';
		input[2].id = 'audioFormat' + cntAudio;
		input[2].disable = "disabled";

		input[3].type = 'text';
		input[3].className = 'audioSize';
		input[3].name = 'audioSize[]';
		input[3].value =  entity.sf_file_size ? entity.sf_file_size : '';
		input[3].style.width = '45px';
		input[3].id = 'audioSize' + cntAudio;
		input[3].readOnly = "readonly";

		input[4].type = 'text';
		input[4].className = 'audioBitrate';
		input[4].name = 'audioBitrate[]';
		input[4].value =  entity.sf_file_bitrate ? entity.sf_file_bitrate : '';
		input[4].style.width = '45px';
		input[4].id = 'audioBitrate' + cntAudio;
		input[4].readOnly = "readonly";

	    input[5].type = 'text';
		input[5].className = 'audioFpid';
		input[5].name = 'audioFpid[]';
		input[5].value =  entity.sf_fpid ? entity.sf_fpid : 0;
		input[5].style.width = '45px';
		input[5].id = 'audioFpid' + cntAudio;
		input[5].readOnly = "readonly";

		input[6].type="text";
		input[6].className = 'audioShowurl';
		input[6].name = 'audioShowurl[]';
		input[6].value =  entity.sf_showurl ? entity.sf_showurl : '';
		input[6].style.width = '100px';
		input[6].id = 'audioShowurl' + cntAudio;

		input[7].type="text";
		input[7].className = 'audioSource';
		input[7].name = 'audioSource[]';
		input[7].value =  entity.sf_source ? entity.sf_source : '';
		input[7].style.width = '20px';
		input[7].id = 'audioSource' + cntAudio;

		input[8].type="text";
		input[8].className = 'audioChcekStatus';
		input[8].name = 'audioCheckStatus[]';
		input[8].value =  entity.sf_check_status ? entity.sf_check_status : '';
	    if(mediaCheckStatus[input[8].value]){
		    input[8].value = mediaCheckStatus[input[8].value];
		}
	    input[8].style.width = '100px';
	     if(entity.sf_check_status != 0 && entity.sf_check_status != "1" && entity.sf_check_status != "-1" && typeof(entity.sf_check_status) != "undefined"){
		    input[8].style.color = "red";
		}
		input[8].id = 'audioCheckStatus' + cntAudio;
		input[8].readOnly = "readonly";

		input[11].type = 'select';
		input[11].className = 'audioUsageTypeFlag';
		input[11].name = 'audioSfUsageFlag[]';
		input[11].id = 'usage-type' + cntAudio;
		si_usage_flagOption = quku_v.song.data.sf_usage_flagOption;
		for(var k=0;k<si_usage_flagOption.length;k++){
			var text = si_usage_flagOption[k].display, value = si_usage_flagOption[k].value;
			if( value == (entity.sf_usage_flag ? entity.sf_usage_flag : '')){
				input[11].options[k] = new Option(text, value,false,true);
			}
			else{
				input[11].options[k] = new Option(text, value,false,false);
			}
		}
		
		input[12].type = 'hidden';
		input[12].className = 'audioSerialized';
		input[12].name = 'audioSerialized[]';
		input[12].value = entity.json ? entity.json : '';
		input[12].id = 'audioSerialized' + cntAudio;


		input[11].onchange = function(){
			//获得当前选择的用途value
			if(input[12].value!=""){
				var curr_flag = this.options[this.selectedIndex].value;
				var arr = input[12].value.split('sf_usage_flag":"');
				var newArr = [arr[0],'sf_usage_flag":"',curr_flag,arr[1].substring(1)];
				newstr = newArr.join("");
				input[12].value= newstr;
			}
			else{
				alert("请先上传歌曲");
			}
		}

		a[0].href = '#';
		a[0].onclick = function()	{ addAudioRow(1, this); return false; }
		a[0].appendChild(document.createTextNode('[增加]'));
		a[1].href = '#';
		a[1].onclick = function()	{ removeAudioRow(this); return false; }
		a[1].appendChild(document.createTextNode('[删除]'));
		a[1].id = 'deleteAudio' + cntAudio;
		span[0].id = 'audioOperation' + cntAudio;
		span[1].id = 'mediaStatus' + cntAudio;
		span[1].className = 'red';
		if(entity.json) {
			$(span[0]).html('<a href="'+entity.sf_file_link+'" target="_blank">试听</a>');
			$(span[1]).html('已上传');
		}
		for(var i=0; i<13; i++)	{
			if(i == 0)	{
				td[i].appendChild(a[0]);
				td[i].appendChild(document.createTextNode(' '));
				td[i].appendChild(a[1]);
				td[i].className = "separatorTd fnbr";
			}else if(i == 9){
				td[i].appendChild(span[0]);
			}else if(i == 10){
				td[i].appendChild(span[1]);
			}
			else{
				td[i].appendChild(input[i]);
			}
			tr[0].appendChild(td[i]);
		}
		tr[0].className = 'alignCenterTr';
		if(!nPObj)	{
			t.appendChild(tr[0]);
		}
		else	{
			t.insertBefore(tr[0], nPObj);
		}
		cntAudio++;
	}
  var oaudio = $('.audioFile');
  var len = oaudio.length;
  var item=0;
  for(var i=0;i<len;i++){
    if(!oaudio[i].disabled){
      MediaUploader.registerAjaxUploadListener(oaudio[i].id,'audio');
    }
  }
}
function removeAudioRow(obj){
	var objTr = obj.parentNode.parentNode;

	if(cntAudio > 0 && $(objTr).hide())	{
		var serializedStage = $('#'+  obj.id.replace("deleteAudio","audioSerialized"));
		serializedStage.attr('title','del');
	}
//  objTr.parentNode.removeChild(objTr);
//  if($("#tableAudio .alignCenterTr").length == 0){
//	addAudioRow(1);
//  }

  if(Quku.checkLast("tableAudio",obj)){
      addAudioRow(1,null,obj[0]);
  }
}

// init existing execute logs
function initAidioValue(obj)	{
	obj = typeof obj == "undefined" || !obj ? {} : obj;
	for(var n in obj)	{
		addAudioRow(1,null,obj[n]);
	}
}

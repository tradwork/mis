var s ,cntPic=100;

$(document).ready(function(){
	tblPic = document.getElementById('tablePic');
	// init page不过是否有，都不用这个函数初始化表哥了
	// if(jsonPic.length)	{
	// 	initPicValue(jsonPic);
	// }else if(tblPic){
	// 	addPicRow(1);
	// }
	if(s==undefined) s=0;
	$(".addVideoSource").bind("click",function(){

		var newsource = '<div class="sourceBox"><input type="hidden" class="label" value="'+ (($(".sourceBox").length-1) + parseInt(1)) +'" /><div class="videoBox"><div id="vi_globalid" class="x-layout-item1"><div class="x-component-label"><span class="label-text">V_ID:</span></div>';
		newsource += '<div class="x-component-items" id="vi_globalid_items"><input type="text" value="" name="vi_globalid" id="vi_globalid_input" class="x-component-input"></div></div>';
		newsource += '<div id="vi_source_path" class="x-layout-item1"><div class="x-component-label"><span class="label-text">视频页面URL: </span></div>';
		newsource += '<div class="x-component-items" id="vi_globalid_items">';
		newsource += '<input type="text" value="" name="vi_source_path" id="vi_source_path_input" class="x-component-input"></div></div>';
		newsource += '<div id="vi_tvid" class="x-layout-item1"><div class="x-component-label">';
		newsource += '<span class="label-text">TVID: </span></div><div class="x-component-items" id="vi_globalid_items">';
		newsource += '<input type="text" value="" name="vi_tvid" id="vi_tvid_input" class="x-component-input"></div></div>';
		newsource += '<div class="x-layout-item1" id="vi_provider"><div class="x-component-label"><span class="label-text">视频来源: </span></div>';
		newsource += '<div id="vi_provider_items" class="x-component-items">'+$("#vi_provider_items").html()+'</div></div>';
		newsource += '<input type="hidden" class="x-component-input" id="vi_provider_source_input" name="vi_mv_id" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_mv_id_input" name="vi_mv_id" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_showtime_input" name="vi_showtime" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_charge_input" name="vi_charge" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_jointime_input" name="vi_jointime" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_joinuser_input" name="vi_joinuser" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_source_info_input" name="vi_source_info" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_editusernow_input" name="vi_editusernow" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_edituidnowtime_input" name="vi_edituidnowtime" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_edituser_input" name="vi_edituser" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_edittime_input" name="vi_edittime" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_status_input" name="vi_status" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_delflag_input" name="vi_delflag" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_priority_input" name="vi_priority" value="">';
		newsource += '<input type="hidden" class="x-component-input" id="vi_priority_settime_input" name="vi_priority_settime" value="">';
		newsource += '<input type="hidden" value="" class="x-component-input" id="vi_distribution_input" name="vi_distribution">';
		newsource += '<div class="x-layout-block tb_form" id="tableSongPic_div"><span id="tableSongPic_label"><div class="x-component-label "><span class="label-text">视频: </span></div>';
		newsource += '</span><div id="tablePicHidden"></div><table id="tableVideo">';
		newsource += '<thead><tr><td style="text-align:center;" class="fieldName">操作</td><td style="text-align:center;" class="fieldName">清晰度</td>';
		newsource += '<td style="text-align:center;" class="fieldName">扩展名</td><td style="text-align:center;" class="fieldName">播放宽纵比</td>';
		newsource += '<td style="text-align:center;" class="fieldName">时长</td><td style="text-align:center;" class="fieldName">文件大小</td><td>';
		newsource += '</td></tr></thead><tbody><tr><td><a onclick="addFilesRow(this)" hrer="###">[增加]</a><a onclick="removeFilesRow(this)" href="###">[删除]</a>';
		newsource += '</td><td><select name="vf_definition" class="x-component-input">'+document.getElementsByName("vf_definition")[0].innerHTML+'</td><td><input type="text" value="" name="vf_file_extension" id="vf_file_extension_input" class="x-component-input"></td><td>';
		newsource += '<input type="text" value=""  name="vf_aspect_ratio" id="vf_aspect_ratio_input" class="x-component-input"></td><td>';
		newsource += '<input type="text" name="vf_file_duration" value=""  id="vf_file_duration_input" class="x-component-input"></td><td>';
		newsource += '<input type="text" name="vf_file_size" value="" r id="vf_file_size_input" class="x-component-input">';
		newsource += '</td><td><input type="hidden" value=""  name="vf_aspect_ratio" id="vf_aspect_ratio_input" class="x-component-input"></td>';
		newsource += '<input type="hidden" value="" readonly="" name="vf_globalid" id="vf_globalid_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_videoinfo_id" id="vf_videoinfo_id_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_md5" id="vf_md5_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_file_link" id="vf_file_link_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_file_format" id="vf_file_format_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_size_player" id="vf_size_player_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_player_param" id="vf_player_param_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_source_path" id="vf_source_path_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_showurl" id="vf_showurl_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_file_name" id="vf_file_name_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_p2p_hash" id="vf_p2p_hash_input" class="x-component-input">'
		newsource += '<input type="hidden" value="1" readonly="" name="vf_check_status" id="vf_check_status_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_last_up_time" id="vf_last_up_time_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_jointime" id="vf_jointime_input" class="x-component-input">'
		newsource += '<input type="hidden" value="" readonly="" name="vf_fpid" id="vf_fpid_input" class="x-component-input"></tr></tbody></table></div>'
		newsource += '<div class="x-layout-block tb_form" id="tableSongPic_div">'
		newsource += '<span id="tableSongPic_label"><div class="x-component-label "><span class="red label-blank"></span><span class="label-text">图片:</span><a href="#" class="more-link"></a></div>'
		newsource += '<div class="x-component-items" id="tableSongPic_label_items"></div><span id="nt_tableSongPic_label"></span><span id="nb_tableSongPic_label"></span></span><div id="tablePicHidden"></div><table id="tablePic"><tbody><tr>'
		 
		newsource += '<td style="text-align:left;width:80px!important;" class="fieldName">预览</td><td style="text-align:left;width:80px!important;" class="fieldName">操作</td>'
		newsource += '<td style="text-align:left;width:45px!important;" class="fieldName">宽度</td><td style="text-align:left;width:45px!important;" class="fieldName">高度</td>'
		newsource += '<td style="text-align:left;" class="fieldName">点击增加新封面↓</td>'
		newsource += '<td style="text-align:left;" class="fieldName">描述信息<span style="color:pink">[为图片检索提供素材]</span></td><td style="text-align:left;" class="fieldName"></td></tr>';
		newsource += '<tr class="alignCenterTr"><td id="picPreview'+s+'">&nbsp;</td><td class="separatorTd fnbr"><a onclick="addPicRow(1,this)" href="###">[增加]</a> <a onclick="removePicRow(this)" href="###" id="deletePic0">[删除]</a></td><td>'
		newsource += '<input type="text" readonly="" id="picWidth'+s+'" style="width: 45px;" name="picWidth[]" class="picWidth"></td><td><input type="text" readonly="" id="picHeight'+s+'" style="width: 45px;" name="picHeight[]" class="picHeight"></td><td>'
		newsource += '<input type="file" label="'+ $(".sourceBox").length +'" id="avatarImg'+s+'" name="picFile[]" class="picFile"></td><td><input type="text" id="picDesc'+s+'" style="width: 280px;" name="picDesc[]" class="picDesc">'
		newsource += '</td><td><input type="hidden" id="picSerialized'+s+'" value="" name="picSerialized[]" class="picSerialized"></td></tr></tbody></table></div></div><span class="closeBox">[删除]</span></div>';

		$(this).parents('fieldset').append(newsource);

	    $('.picFile').each(function() {
	        if (!$(this).attr('disabled')){
	        	//尽量传变量进去，而不是常量$(".sourceBox").index($(this).parents(".sourceBox"))
	        	(function(self){
	            	PicUploader.registerAjaxUploadListener($(self).attr('id'), 'mv');
	        	})(this);
	        }
	    });
	    $(".closeBox").click(function(){
	    	//如果是新增资源，删除节点如果不是新增资源，则改变delflag
	    	if ($(this).parent(".sourceBox").find("#vf_globalid_input").val()==""){
	    		$(this).parent(".sourceBox").remove();
	    	}
	    	else{
				if(confirm("确定要删除此来源的MV么？")){
				    $(this).parent(".sourceBox").css("display","none").find("#vi_delflag_input").val("1");

				} 	    		
	    	}

	    })	    
	})

 
});
function stripX(str){
		return str.replace(/\&amp;/g,'&').replace(/\&lt;/g,'<').replace(/\&gt;/g,'>').replace(/\&quot;/g,'"').replace(/\&#039;/g,'\'');
};
// add a new "pic record" after a specified one.
// num: how much rows wanted to be added
// obj: add new rows after this one
// enity: the entity for pic edit
function addFilesRow(obj){
	var newTR = '<tr><td><a hrer="###" onclick="addFilesRow(this)">[增加]</a> <a href="###" onclick="removeFilesRow(this)">[删除]</a></td>b <td><select name="vf_definition" class="x-component-input"><option value="11">极速</option><option selected="" value="21">普清</option><option value="31">标清</option><option value="41">高清</option><option value="51">超清</option></select></td><td><input type="text"  value="" name="vf_file_extension" id="vf_file_extension_input" class="x-component-input"></td><td><input type="text" value=""  name="vf_aspect_ratio" id="vf_aspect_ratio_input" class="x-component-input"></td><td><input type="text" name="vf_file_duration" value=""  id="vf_file_duration_input" class="x-component-input"></td><td><input type="text" name="vf_file_size" value="" id="vf_file_size_input" class="x-component-input"></td><td><input type="hidden" value="" readonly="" name="vf_aspect_ratio" id="vf_aspect_ratio_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_globalid" id="vf_globalid_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_videoinfo_id" id="vf_videoinfo_id_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_md5" id="vf_md5_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_file_link" id="vf_file_link_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_file_format" id="vf_file_format_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_size_player" id="vf_size_player_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_player_param" id="vf_player_param_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_source_path" id="vf_source_path_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_showurl" id="vf_showurl_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_file_name" id="vf_file_name_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_p2p_hash" id="vf_p2p_hash_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_check_status" id="vf_check_status_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_last_up_time" id="vf_last_up_time_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_jointime" id="vf_jointime_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_fpid" id="vf_fpid_input" class="x-component-input"></td></tr>'
	$(obj).parents("tbody").append(newTR);
}
function removeFilesRow(obj){
	//判断是最后一行
	if($(obj).parents("tr").siblings("tr").length==0){
		var str = '<tr><td><a hrer="###" onclick="addFilesRow(this)">[增加]</a> <a href="###" onclick="removeFilesRow(this)">[删除]</a></td><td><select name="vf_definition" class="x-component-input"><option value="11">极速</option><option value="21">普清</option><option selected="" value="31">标清</option><option value="41">高清</option><option value="51">超清</option></select></td><td><input type="text" value="" name="vf_file_extension" id="vf_file_extension_input" class="x-component-input"></td><td><input type="text" value="" name="vf_aspect_ratio" id="vf_aspect_ratio_input" class="x-component-input"></td><td><input type="text" name="vf_file_duration" value="" id="vf_file_duration_input" class="x-component-input"></td><td><input type="text" name="vf_file_size" value="" id="vf_file_size_input" class="x-component-input"></td><td><input type="hidden" value="" readonly="" name="vf_aspect_ratio" id="vf_aspect_ratio_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_globalid" id="vf_globalid_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_videoinfo_id" id="vf_videoinfo_id_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_md5" id="vf_md5_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_file_link" id="vf_file_link_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_file_format" id="vf_file_format_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_size_player" id="vf_size_player_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_player_param" id="vf_player_param_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_source_path" id="vf_source_path_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_showurl" id="vf_showurl_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_file_name" id="vf_file_name_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_p2p_hash" id="vf_p2p_hash_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_check_status" id="vf_check_status_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_last_up_time" id="vf_last_up_time_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_jointime" id="vf_jointime_input" class="x-component-input"><input type="hidden" value="" readonly="" name="vf_fpid" id="vf_fpid_input" class="x-component-input"></td></tr>';
		$(str).replaceAll($(obj).parents("tr"));
	}
	else{
		obj.parentNode.parentNode.remove();
	}
}
function addPicRow(num, obj, entity,pos){
	num = typeof num == "undefined" || num <= 0 ? 1 : num;
	obj = typeof obj == "undefined" || !obj ? null : obj;
	entity = typeof entity == "undefined" || !entity ? {} : entity;
	pos = typeof pos == "undefined" || !pos ? 0 : pos ;
	//valObj = typeof valObj == "undefined" "" !valObj ? null : valObj;
	if(obj)	{
		var pObj = obj.parentNode.parentNode;
		var nPObj = typeof pObj.nextSibling == "undefined" || !pObj.nextSibling ? null : pObj.nextSibling;
	}
	else{
		var pObj = null;
		var nPObj = null;
	}
	var tblPic = $(".sourceBox").eq(pos).find("#tablePic")[0];
	//$(".sourceBox").eq(0).find("#tablePic").css("backgroundColor",'red');
	//if($.browser.mozilla)	var t = tblPic;
	//else if($.browser.msie)	var t = tblPic.childNodes[0];
	if(obj==null){
		if($.browser.msie){
			var t = tblPic.childNodes[0];
		}
		else{
			var t = tblPic;
		}
	}
	else{
		//待考
		if($.browser.msie){
			var t = obj.parentNode.parentNode.parentNode.childNodes[0];
		}
		else{
			var t = obj.parentNode.parentNode.parentNode;	
		}		
	}
	for(var n = 0; n < num; n++)	{
		var a=[]; var tr=[]; var td=[]; var input=[]; var select=[]; var span=[];
		tr[0] = document.createElement('tr');
		td[0] = document.createElement('td');
		td[1] = document.createElement('td');
		td[2] = document.createElement('td');
		td[3] = document.createElement('td');
		td[4] = document.createElement('td');
		td[5] = document.createElement('td');
		input[1] = document.createElement('input');
		input[2] = document.createElement('input');
		input[3] = document.createElement('input');
		input[4] = document.createElement('input');
		input[5] = document.createElement('input');
		
		a[0] = document.createElement('a');
		a[1] = document.createElement('a');
		
		input[3].type = 'file';
		input[3].className = 'picFile';
		input[3].name = 'picFile[]';
		input[3].value = '';
		//input[3].style.width = '220px';
		input[3].id = 'avatarImg' + cntPic;
		input[3].setAttribute("label",$(obj).parents(".sourceBox").find(".label").val());

		if(entity.json){input[3].disabled = true}
		
		input[2].type = 'text';
		input[2].className = 'picHeight';
		input[2].name = 'picHeight[]';
		input[2].value = entity.pi_pic_height ? entity.pi_pic_height : '';
		input[2].style.width = '45px';
		input[2].id = 'picHeight' + cntPic;
		input[2].readOnly = "readonly";
		input[1].type = 'text';
		input[1].className = 'picWidth';
		input[1].name = 'picWidth[]';
		input[1].value =  entity.pi_pic_width ? entity.pi_pic_width : '';
		input[1].style.width = '45px';
		input[1].id = 'picWidth' + cntPic;
		input[1].readOnly = "readonly";
		input[4].type = 'text';
		input[4].className = 'picDesc';
		input[4].name = 'picDesc[]';
		input[4].value = entity.pi_pic_desc ? stripX(entity.pi_pic_desc) : '';
		input[4].style.width = '280px';
		input[4].id = 'picDesc' + cntPic;
		
		input[5].type = 'hidden';
		input[5].className = 'picSerialized';
		input[5].name = 'picSerialized[]';
		input[5].value = entity.json ? entity.json : '';
		input[5].id = 'picSerialized' + cntPic;
		
		a[0].href = '#';
		$(a[0]).bind('click',function(){
			addPicRow(1, this); return false; 
		})
		a[0].appendChild(document.createTextNode('[增加]'));
		a[1].href = '#';

		a[1].onclick = function(){removePicRow(this); return false; }
		a[1].appendChild(document.createTextNode('[删除]'));
		a[1].id = 'deletePic' + cntPic;
		
		// 修改日期：2011-04-27
		// 修改要求：添加预览
		var curImg = entity.pi_link 
			? '<a href="'+entity.pi_link+'" ><img src="'+entity.pi_link+'" width="60" height="60" onclick="updatePicWin.show(\'' + entity.pi_link + '\');return false;" border="0" /></a>'
			: '&nbsp;';
		onclick="updatePicWin.show(\'' + entity.pi_link + '\');return false;"

		$(tr[0]).append($('<td id="picPreview'+cntPic+'">'+curImg+'</td>' ));
		
		for(var i=0; i<6; i++)	{
			if(i == 0) {
				td[i].appendChild(a[0]);
				td[i].appendChild(document.createTextNode(' '));
				td[i].appendChild(a[1]);
				if(a[2]){
					td[i].appendChild(a[2]);
				}
				td[i].className = "separatorTd fnbr";
			}
			else {
				td[i].appendChild(input[i]);
			}
			tr[0].appendChild(td[i]);
		}
		tr[0].className = 'alignCenterTr';
		if(!nPObj){
			t.appendChild(tr[0]);
		}
		else{
			t.insertBefore(tr[0], nPObj);
		}
		//
		cntPic++;
	}

	var oaudio = $('.picFile');
	var len = oaudio.length;
	var item=0;
	for(var i=0;i<len;i++){
	    if(!oaudio[i].disabled){
	      PicUploader.registerAjaxUploadListener(oaudio[i].id,$(oaudio[i]).parents(".sourceBox").find('.label').val());
	    }
	}
}
function removePicRow(obj)	{ 
  // if(Quku.checkLast("tablePic",obj)){
	 //  addPicRow(1,null,obj[0]);
  // }

	var objTr = obj.parentNode.parentNode;
	if(objTr.parentNode.childNodes.length >2){
		$(objTr).remove();
	}
	/*
  	if(cntPic > 0 && $(objTr).remove())	{
		var serializedStage = $('#'+  obj.id.replace("deletePic","picSerialized"));
		serializedStage.attr('title','del');
	}
	*/

}

// init existing pics
function initPicValue(obj,pos)	{
	obj = typeof obj == "undefined" || !obj ? {} : obj;
	
	for(var n in obj){
		addPicRow(1,null,obj[n],pos);
	} 
}

function updatepics(){
			jQuery(function($){
			  // Create variables (in this scope) to hold the API and image size
			  var jcrop_api, boundx, boundy;
			  $('#target').Jcrop({
				onChange: updatePreview,
				onSelect: updatePreview,
				onRelease: clearUpdatePreview,
				aspectRatio: 1,
				boxWidth: 900  //设置 可图片显示的最大宽度
			  },function(){
				// Use the API to get the real image size
				var bounds = this.getBounds();
				  boundx = bounds[0] ;				
				  boundy = bounds[1] ;
				// Store the API in the jcrop_api variable
				jcrop_api = this;
			  });
			  function updatePreview(c)
			  {
			  	$('#x1').val(c.x);
				$('#y1').val(c.y);
				$('#x2').val(c.x2);
				$('#y2').val(c.y2);
				$('#w').val(c.w);
				$('#h').val(c.h);
				if (parseInt(c.w) > 0)
				{
				  var rx = 100 / c.w;
				  var ry = 100 / c.h;
				  $('#preview').css({
					width: Math.round(rx * boundx) + 'px',
					height: Math.round(ry * boundy) + 'px',
					marginLeft: '-' + Math.round(rx * c.x) + 'px',
					marginTop: '-' + Math.round(ry * c.y) + 'px'
				  });
				}
			  };
			  function checkCoords(){
				  if(parseInt($('#w').val()) > 0){
					return true;	  
				  }
				  else{
				  	return false;
				  }
			  }
			  function clearUpdatePreview(){
				$('#h').css({color:'red'});
				window.setTimeout(function(){
					$('#h').css({color:'inherit'});
				}, 500);
			  };
			});
		}
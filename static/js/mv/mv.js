var Mv = {
	
	//外包人员审核单曲库按钮功能
	saveInCache : function (checked) {
		var flag = $('.si_status_audit').val();
		if(!this.beforeSaveAction(this.saveInCache,checked)){
			return;
		}
		jQuery.post(
			'?c=mv&m=saveInCache',
			this.construnctPostQueryString(),
			function(sData){
					if(sData.error_code == 0){
						//TODO show more humanization
						alert('审核成功');
						//跳转到原来状态下的页面中
						window.location.href = '?c=mv&m=search&tn=mv_list&search_status=' + flag;
						Mv.afterSaveAction(sAction, sData);
					}else if(sData.error_code == -6){
						alert("没有改变任何数据");
						return;
					}
					else{
						Quku.showValidateInfo('mv',sData);
					}
			},'json'
		);
	},
	createCreationDialog:function(){
		baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
		return new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url:'/qmis/index.php?c=mv&m=createInDialog&tn=mv_createInDialog'},Quku.dialogSpecs.XL_XXL)
		);
	},
	/*
	*  添加歌曲信息
	*/
	save : function (checked) {

		var sAction = $('#action').val();
	    if(!this.beforeSaveAction(this.save,checked)){
			return;
		}
		
		jQuery.post(
			'?c=mv&m='+sAction,
			this.construnctPostQueryString(),
			function(sData){
			    var afterAction = sAction;
				if(sAction == 'doCreate' || sAction == 'doCreateInDialog'){
					if(sData.error_code == 0){
						//TODO show more humanization
						alert('添加成功');
						
						if( $('#container') && $('#container').val() == 'doActionIndialog' ){
							afterAction = 'doActionIndialog';
						}
						Mv.afterSaveAction(afterAction, sData);
					}
					else{
						quku_v.com.showValidateInfo('mv',sData);
					}
				}
				else{
					if(sData.error_code == 0){
						if( $('#container') && $('#container').val() == 'doActionIndialog' ){
							afterAction = 'doActionIndialog';
						}
						alert('修改成功');
						
						Mv.afterSaveAction(afterAction, sData);
					}
					else{
						quku_v.com.showValidateInfo('mv',sData);
					}
				}
			},'json'
		);
	},
	saveAndPub : function(checked) {
		var sAction = $('#action').val();
		var action="";
		switch(sAction){
		  case 'doCreate':
		  action= 'doCreateAndPub';
		  break;
		  case 'doCreateInDialog':
		  action= 'doCreateAndPubInDialog';
		  break;
		  case 'doEditInDialog':
		  action= 'doEditAndPubInDialog';
		  break;
		  case 'saveInCache':
		  action= 'saveInCache';
		  break;
		  default:action = 'doEditAndPub';
		}
		if(!this.beforeSaveAction(this.saveAndPub,checked)){
			return;
		}
		jQuery.post(
			'?c=mv&m='+action,
			this.construnctPostQueryString(),
			function(sData){
			    var afterAction = action;
				if(sData.error_code == 0){
				     if( $('#container') && $('#container').val() == 'doActionIndialog' ){
							afterAction = 'doActionIndialog';
						}
					//TODO show more humanization
					alert('发布成功');
					Mv.afterSaveAction(afterAction, sData);
				}
				else{
					quku_v.com.showValidateInfo('mv',sData);
				}
			},'json'
		);
	},
	beforeSaveAction : function (savefn,checked) {
		if(checked){return true}
		var si_author =$.trim( $('#quku_artist_works_ref').textfield('getValue') );
		if ( si_author == ""){
			alert('歌手不能为空');
			return false;
		}

		var extQueryString = "";
		
		if( si_author != ""){
			extQueryString += 'quku_artist_works_ref='+ encodeURIComponent( si_author );
		}
		var arrtemp=[];
		arrtemp['quku_artist_works_ref']=si_author;
		duplicateName.check('getIdByName', extQueryString, baidu.delegate(this,savefn),arrtemp);
		
	},


	needChecked : function(){
    return duplicateName.needChecked('quku_artist_works_ref',origid_g);
	},
	afterSaveAction : function (saveActionName, sData) {
		switch(saveActionName) {
		case 'doCreate' : 
			window.location.href = '?c=mv&m=search&tn=mv_list&search_status=1';
			break;
		case 'doEdit' :
			window.location.href = '?c=mv&m=search&tn=mv_list&search_status=1';
			break;
		case 'doCreateAndPub' : 
			window.location.href = '?c=mv&m=search&tn=mv_list&search_status=0';
			break;
		case 'doEditAndPub' :
			window.location.href = '?c=mv&m=search&tn=mv_list&search_status=0&pub_mv_id='+$('#si_globalid').val();
			break;
		case 'doActionIndialog':	
			var childStation = new baidu.ui.crossFrameDialog.ChildStation();
			var response = (sData.data) ? sData.data : [];
			response.seq = $('#mvId').val();
			childStation.sendAndClose(response);
			break;
		case 'saveInCache':
		    window.location.href = '?c=mv&m=search&tn=mv_list&search_status=1';
			break;
	    default : window.location.href = '?c=mv&m=search&tn=mv_list';
		}
	},
	/**
	 * 下线单曲
	 * @method offline
	 * @param {Any} 
	 * @return {Json} 
	 */
	offline: function(event, obj){
	    var T = quku_v.com ;
	    if( T.operationConfirm(event, '确认要下线该单曲吗?') ) 
		{

		      T.operationHandler(event, '?c=mv&m=disPub&mi_globalid=' + quku_v.mv.data.mi_globalid, 
			         quku_v.global.MV_NON_PUB_URL, '下线成功');
		} 
	},	
    construnctPostQueryString : function() {
		//基本信息
		var formData = quku_v.mvForm.formArray.getValue();

		var jsonVideoInfo = [], iVidoeInfo = {};
		$('.sourceBox').each(function(key,item){
			var iVidoeInfo = {};
			iVidoeInfo.quku_video_info = {},iVidoeInfo.quku_pic_info = [], iVidoeInfo.quku_video_files = [];
			var videoBox = $(item).find(".videoBox");
			//vi信息
			iVidoeInfo.quku_video_info = {
				"vi_globalid": $(videoBox).find('#vi_globalid_input').val(),
				"vi_tvid": $(videoBox).find('#vi_tvid_input').val(),
				"vi_source_path":$(videoBox).find('#vi_source_path_input').val(),
				//选项，来源清晰度
				"vi_provider": $(videoBox).find('select[name=vi_provider]').find("option:selected").val(),
				//全部获取的信息都要传回去,隐藏的15个字段
				'vi_provider_source':$(videoBox).find("#vi_provider_source_input").val(),
				"vi_mv_id":$(videoBox).find('#vi_mv_id_input').val(),
				"vi_showtime":$(videoBox).find('#vi_showtime_input').val(),
				"vi_charge":$(videoBox).find('#vi_charge_input').val(),
				"vi_jointime":$(videoBox).find('#vi_jointime_input').val(),
				"vi_joinuser":$(videoBox).find('#vi_joinuser_input').val(),
				
				"vi_source_info":$(videoBox).find('#vi_source_info_input').val(),
				"vi_editusernow":$(videoBox).find('#vi_editusernow_input').val(),
				"vi_edituidnowtime":$(videoBox).find('#vi_edituidnowtime_input').val(),
				"vi_edituser":$(videoBox).find('#vi_edituser_input').val(),
				"vi_edittime":$(videoBox).find('#vi_edittime_input').val(),
				
				"vi_status":$(videoBox).find('#vi_status_input').val(),
				"vi_delflag":$(videoBox).find('#vi_delflag_input').val(),
				"vi_priority":$(videoBox).find('#vi_priority_input').val(),
				"vi_priority_settime":$(videoBox).find('#vi_priority_settime_input').val(),
				"vi_distribution":unescape($(videoBox).find('#vi_distribution_input').val())
			};

			//pi信息
			var picItem = $(item).find(".picSerialized");
			picItem.each(function(k,Item){
				if($(Item).val()!=""){
					iVidoeInfo.quku_pic_info.push($(Item).val());
				}
			})
			var filesItem = $(item).find("#tableVideo").find("tbody").find("tr");
			filesItem.each(function(l,fItem){
				if($(fItem).find("#vf_file_extension_input").val()!=""&&$(fItem).find("#vf_aspect_ratio_input").val()!=""&&$(fItem).find("#vf_file_duration_input").val()!=""&&$(fItem).find("#vf_file_size_input").val()!=""){
					iVidoeInfo.quku_video_files[l] = {
						'vf_file_extension': $(fItem).find("#vf_file_extension_input").val(),
						"vf_globalid":$(fItem).find("#vf_globalid_input").val(),
						"vf_videoinfo_id":$(fItem).find("#vf_videoinfo_id_input").val(),
						"vf_md5":$(fItem).find("#vf_md5_input").val(),
						"vf_definition":$(fItem).find('select[name=vf_definition]').find("option:selected").val(),

						"vf_file_link":$(fItem).find("#vf_file_link_input").val(),
						"vf_file_format":$(fItem).find("#vf_file_format_input").val(),
						"vf_file_size":$(fItem).find("#vf_file_size_input").val(),
						"vf_file_duration":$(fItem).find("#vf_file_duration_input").val(),
						"vf_size_player":$(fItem).find("#vf_size_player_input").val(),
						
						"vf_aspect_ratio":$(fItem).find("#vf_aspect_ratio_input").val(),
						"vf_player_param":$(fItem).find("#vf_player_param_input").val(),
						"vf_source_path":$(fItem).find("#vf_source_path_input").val(),
						"vf_showurl":$(fItem).find("#vf_showurl_input").val(),
						"vf_file_name":$(fItem).find("#vf_file_name_input").val(),
						
						"vf_p2p_hash":$(fItem).find("#vf_p2p_hash_input").val(),
						"vf_check_status":$(fItem).find("#vf_check_status_input").val(),
						"vf_last_up_time":$(fItem).find("#vf_last_up_time_input").val(),
						"vf_jointime":$(fItem).find("#vf_jointime_input").val(),
						"vf_fpid":$(fItem).find("#vf_fpid_input").val(),					
					}
				}
			})
/*			$("div[class='sourceBox'] .filesSerialized").each(function(key,item){
				if($(item).val()!=""){
					iVidoeInfo.quku_video_files.push($(item).val());
				}
			})*/
			jsonVideoInfo.push(iVidoeInfo);
		});
		var iVidoeStr=JSON.stringify(jsonVideoInfo);

		// 是否选择了审核checkbox
		var mi_audit_status;
		//0 表示已审核 1表示未审核
		mi_audit_status = $("#mi_audit_status").prop('checked') ? 0 : 1;
		
		// 设置歌手信息
		formData['quku_artist_works_ref'] = $('#quku_artist_works_ref_serialized').val();
		$.extend(formData,{
		        mi_globalid: $('#mi_globalid').val(),			
				quku_video_info: iVidoeStr,
				mi_audit_status: mi_audit_status,
			});
		return formData;
    }
}

//初始化页面数据

$(document).ready(function(){
	if(jsonVideosInfo.length>0){
		var data = quku_v.mv.data;
		initVidoeValue(jsonVideosInfo,data);

		//视频地址联动
		// $("input[name='vi_source_path']").bind("keyup",function(){
		// 	var _self = $(this)
		// 	var _bother = $(this).parents(".sourceBox").siblings(".sourceBox").find("input[name='vi_source_path']");
		// 	_bother.val(_self.val());
		// });
	}
	else{
		var data = quku_v.mv.data;
		initVidoeValue(jsonVideosInfo,data);		
	}
});

function initVidoeValue(jsonVideosInfo,data){
	var vf_definitionOption = data.vf_definitionOption;
	var vi_providerOption = data.vi_providerOption;
	
	//没有videoinof的情况下
	if(jsonVideosInfo.length<1){
		//来源
		for(var j=0;j<vi_providerOption.length;j++){
			providerHTML+= '<option value="'+vi_providerOption[j].value+'">'+vi_providerOption[j].display+'</option>';
		}		
		//清晰度
		for(var j=0;j<vf_definitionOption.length;j++){
			definitionHTML+= '<option value="'+vf_definitionOption[j].value+'">'+vf_definitionOption[j].display+'</option>';
		}
		var viHTML = '<div id="vi_provider_items" class="x-component-items" style="display:none"><select name="vi_provider" id="">'+providerHTML+'</select></div>';
		var vfHTML = '<select class="x-component-input" name="vf_definition" style="display:none">'+ definitionHTML +'</select>'
		$("#contentResource").find("fieldset").append(viHTML+vfHTML);
	}
	else{
		for(var i = 0;i<jsonVideosInfo.length;i++){
			
			//获取每个来源的的vi，pi，vf信息
			var quku_video_info = jsonVideosInfo[i].quku_video_info;
			var quku_pic_info = jsonVideosInfo[i].quku_pic_info;
			var quku_video_files = jsonVideosInfo[i].quku_video_files;
			//select
			var vf_definitionOption = data.vf_definitionOption;//get object
			var vi_providerOption = data.vi_providerOption;			
			
			var viHTML = "",vfHTML = "" , piHTML="" ,piTR="" ,vfTR="", providerHTML="";
			
			//vi信息
			var template = '<div class="x-layout-item1" id="{0}"><div class="x-component-label"><span class="label-text">{2}: </span></div><div id="vi_globalid_items" class="x-component-items"><input class="x-component-input" {4} type="text" id="{1}" name="{0}" value="{3}"></div></div>';
			var viInfo = [
					{"divId":"vi_globalid",'name':"V_ID",'inputId':"vi_globalid_input",'value':quku_video_info.vi_globalid,'readonly':"readonly"},
					{"divId":"vi_source_path",'name':"视频页面URL",'inputId':"vi_source_path_input",'value':quku_video_info.vi_source_path},
					{"divId":"vi_tvid",'name':"TVID",'inputId':"vi_tvid_input",'value':quku_video_info.vi_tvid}
				]

			for(var k = 0;k < viInfo.length;k++){
				viHTML += String.format(template,viInfo[k]["divId"],viInfo[k]["inputId"],viInfo[k]['name'],viInfo[k]['value'],viInfo[k]['readonly']);
			}

			//来源
			for(var j=0;j<vi_providerOption.length;j++){
				if(vi_providerOption[j].value==quku_video_info.vi_provider){
					providerHTML+= '<option value="'+vi_providerOption[j].value+'"selected>'+vi_providerOption[j].display+'</option>';
				}
				else{
					providerHTML+= '<option value="'+vi_providerOption[j].value+'">'+vi_providerOption[j].display+'</option>';
				}
			}

			viHTML += '<div id="vi_provider" class="x-layout-item1"><div class="x-component-label"><span class="label-text">视频来源: </span></div>'
			viHTML += '<div class="x-component-items" id="vi_provider_items"><select name="vi_provider">'+providerHTML+'</select></div></div>';
			//vi信息共20个字段，其他16个字段隐藏
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_provider_source+'" name="vi_mv_id" id="vi_provider_source_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_mv_id+'" name="vi_mv_id" id="vi_mv_id_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_showtime+'" name="vi_showtime" id="vi_showtime_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_charge+'" name="vi_charge" id="vi_charge_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_jointime+'" name="vi_jointime" id="vi_jointime_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_joinuser+'" name="vi_joinuser" id="vi_joinuser_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_source_info+'" name="vi_source_info" id="vi_source_info_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_editusernow+'" name="vi_editusernow" id="vi_editusernow_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_edituidnowtime+'" name="vi_edituidnowtime" id="vi_edituidnowtime_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_edituser+'" name="vi_edituser" id="vi_edituser_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_edittime+'" name="vi_edittime" id="vi_edittime_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_status+'" name="vi_status" id="vi_status_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_delflag+'" name="vi_delflag" id="vi_delflag_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_priority+'" name="vi_priority" id="vi_priority_input" class="x-component-input">';
			viHTML += '<input type="hidden" value="'+quku_video_info.vi_priority_settime+'" name="vi_priority_settime" id="vi_priority_settime_input" class="x-component-input">';
			//unescape可以解码esapte编码过的字符串;
			viHTML += '<input type="hidden" name="vi_distribution" id="vi_distribution_input" class="x-component-input" value="'+ escape(quku_video_info.vi_distribution) +'" />';



			//pi信息
			if(s==undefined) s=0;
			piHTML = '<div id="tableSongPic_div" class="x-layout-block tb_form"><span id="tableSongPic_label"><div class="x-component-label "><span class="red label-blank"></span>';
			piHTML += '<span class="label-text">图片: </span><a class="more-link" href="#"></a></div><div id="tableSongPic_label_items" class="x-component-items"></div><span id="nt_tableSongPic_label">';
			piHTML += '</span><span id="nb_tableSongPic_label"></span></span><div id="tablePicHidden"></div><table id="tablePic"><tbody>';
			piHTML += '<tr><td class="fieldName" style="text-align:left;width:80px!important;">预览</td>';
			piHTML += '<td class="fieldName" style="text-align:left;width:80px!important;">操作</td><td class="fieldName" style="text-align:left;width:45px!important;">宽度</td><td class="fieldName" style="text-align:left;width:45px!important;">高度</td>';
			piHTML += '<td class="fieldName" style="text-align:left;">点击增加新封面↓</td><td class="fieldName" style="text-align:left;">描述信息<span style="color:pink">[为图片检索提供素材]</span></td><td class="fieldName" style="text-align:left;"></td></tr>';
			
			//默认第一行,如果已经有图片，则不显示这行
			if(quku_pic_info.length==0){
				piHTML += '<tr class="alignCenterTr"><td id="picPreview'+s+'">&nbsp;</td>';
				piHTML += '<td class="separatorTd fnbr"><a href="###" onclick="addPicRow(1,this)">[增加]</a> <a href="###" id="deletePic'+s+'">[删除]</a></td>';
				piHTML += '<td><input type="text" class="picWidth" name="picWidth[]" style="width: 45px;" id="picWidth'+s+'" readonly=""></td>';
				piHTML += '<td><input type="text" class="picHeight" name="picHeight[]" style="width: 45px;" id="picHeight'+s+'" readonly=""></td>';
				piHTML += '<td><input type="file" class="picFile " name="picFile[]" id="avatarImg'+s+'" label="'+ i +'"></td>';
				piHTML += '<td><input type="text" class="picDesc" name="picDesc[]" style="width: 280px;" id="picDesc'+s+'"></td>';
				piHTML += '<td><input type="hidden" class="picSerialized" name="picSerialized[]" value="" id="picSerialized'+s+'"></td></tr>';
			}
			//循环第二个tr给s+1
			s+=1;

			for(var k=0;k<quku_pic_info.length;k++){
					piTR += '<tr class="alignCenterTr"><td id="picPreview'+s+'"><a href="'+quku_pic_info[k].pi_link+'">';
					piTR += '<img src="'+quku_pic_info[k].pi_link+'" onclick="updatePicWin.show(\''+quku_pic_info[k].pi_link+'\');return false;"width="60" height="60" border="0"></a></td>';
					piTR += '<td class="separatorTd fnbr"><a href="###" onclick="addPicRow(1,this)">[增加]</a> <a href="###" id="deletePic1" onclick="removePicRow(this)">[删除]</a></td>';
					piTR += '<td><input type="text" class="picWidth" value="'+quku_pic_info[k].pi_pic_width+'" name="picWidth[]" id="picWidth'+s+'" style="width: 45px;"></td>';
					piTR += '<td><input type="text" class="picHeight" value="' + quku_pic_info[k].pi_pic_height +'" name="picHeight[]" id="picHeight'+s+'" style="width: 45px;"></td>';
					piTR += '<td><input type="file" class="picFile" disabled="true" name="picFile[]" id="avatarImg'+s+'" ></td>';
					piTR += '<td><input type="text" value="'+quku_pic_info[k].pi_pic_desc+'" class="picDesc" name="picDesc[]" id="picDesc'+s+'" style="width: 280px;"></td>';
					piTR += '<td><input type="hidden" class="picSerialized" name="picSerialized[]" value="{&quot;pi_globalid&quot;:'+quku_pic_info[k].pi_globalid+',&quot;pi_pic_ext&quot;:&quot;'+quku_pic_info[k].pi_pic_ext+'&quot;,&quot;pi_itemid&quot;:'+quku_pic_info[k].pi_itemid+',&quot;pi_pic_desc&quot;:&quot;&quot;,&quot;pi_pic_width&quot;:'+quku_pic_info[k].pi_pic_width+',&quot;pi_pic_height&quot;:'+quku_pic_info[k].pi_pic_height+',&quot;pi_md5&quot;:&quot;'+quku_pic_info[k].pi_md5+'&quot;,&quot;pi_jointime&quot;:'+quku_pic_info[k].pi_jointime+',&quot;pi_type&quot;:&quot;'+quku_pic_info[k].pi_type +'&quot;,&quot;pi_link&quot;:&quot;'+quku_pic_info[k].pi_link+'&quot;}" id="picSerialized'+s+'"></td></tr>';
					s++;
				}
			piHTML += piTR + '</table></div>';



			//视频
			for(var k =0;k < quku_video_files.length;k++){ 

				//获取视频清晰度
				var definitionHTML ="";
				for(var j=0;j<vf_definitionOption.length;j++){
					if(vf_definitionOption[j].value == quku_video_files[k].vf_definition){
						definitionHTML+= '<option value="'+vf_definitionOption[j].value+'" selected>'+vf_definitionOption[j].display+'</option>';
					}
					else{
						definitionHTML+= '<option value="'+vf_definitionOption[j].value+'">'+vf_definitionOption[j].display+'</option>';
					}
				}
				//vf信息
				vfTR += '<tr><td><a hrer="###" onclick="addFilesRow(this)">[增加]</a> <a href="###" onclick="removeFilesRow(this)">[删除]</a></td>';//视频来源
				vfTR += '<td><select class="x-component-input" name="vf_definition">'+ definitionHTML +'</select></td>';//视频清晰度
				vfTR += '<td><input class="x-component-input" type="text" id="vf_file_extension_input" name="vf_file_extension" value="'+quku_video_files[k].vf_file_extension+'" readonly=""></td>';//视频扩展名
				vfTR += '<td><input class="x-component-input" type="text" id="vf_aspect_ratio_input" name="vf_aspect_ratio" readonly="" value="'+quku_video_files[k].vf_aspect_ratio+'"></td>';//播放宽纵比
				vfTR += '<td><input class="x-component-input" type="text" id="vf_file_duration_input" readonly="" value="'+quku_video_files[k].vf_file_duration+'" name="vf_file_duration"></td>';//时长
				vfTR += '<td><input class="x-component-input" type="text" id="vf_file_size_input" readonly="" value="'+quku_video_files[k].vf_file_size+'" name="vf_file_size"></td>';

				vfTR +='<td><input class="x-component-input" type="hidden" id="vf_aspect_ratio_input" name="vf_aspect_ratio" readonly="" value="'+quku_video_files[k].vf_aspect_ratio+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_globalid_input" name="vf_globalid" readonly="" value="'+quku_video_files[k].vf_globalid+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_videoinfo_id_input" name="vf_videoinfo_id" readonly="" value="'+quku_video_files[k].vf_videoinfo_id+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_md5_input" name="vf_md5" readonly="" value="'+quku_video_files[k].vf_md5+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_file_link_input" name="vf_file_link" readonly="" value="'+quku_video_files[k].vf_file_link+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_file_format_input" name="vf_file_format" readonly="" value="'+quku_video_files[k].vf_file_format+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_size_player_input" name="vf_size_player" readonly="" value="'+quku_video_files[k].vf_size_player+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_player_param_input" name="vf_player_param" readonly="" value="'+quku_video_files[k].vf_player_param+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_source_path_input" name="vf_source_path" readonly="" value="'+quku_video_files[k].vf_source_path+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_showurl_input" name="vf_showurl" readonly="" value="'+quku_video_files[k].vf_showurl+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_file_name_input" name="vf_file_name" readonly="" value="'+quku_video_files[k].vf_file_name+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_p2p_hash_input" name="vf_p2p_hash" readonly="" value="'+quku_video_files[k].vf_p2p_hash+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_check_status_input" name="vf_check_status" readonly="" value="'+quku_video_files[k].vf_check_status+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_last_up_time_input" name="vf_last_up_time" readonly="" value="'+quku_video_files[k].vf_last_up_time+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_jointime_input" name="vf_jointime" readonly="" value="'+quku_video_files[k].vf_jointime+'"></td>';
				vfTR +='<input class="x-component-input" type="hidden" id="vf_fpid_input" name="vf_fpid" readonly="" value="'+quku_video_files[k].vf_fpid+'"></td>';
				vfTR += '</tr>';
			}

			vfHTML = '<div id="tableSongPic_div" class="x-layout-block tb_form"><span id="tableSongPic_label"><div class="x-component-label "><span class="label-text">视频: </span></div></span><div id="tablePicHidden"></div>';
			vfHTML += '<table id="tableVideo"><thead><tr><td class="fieldName" style="text-align:center;">操作</td><td class="fieldName" style="text-align:center;">清晰度</td>';
			vfHTML += '<td class="fieldName" style="text-align:center;">扩展名</td><td class="fieldName" style="text-align:center;">播放宽纵比</td><td class="fieldName" style="text-align:center;">时长</td>';
			vfHTML += '<td class="fieldName" style="text-align:center;">文件大小</td><td></td></tr></thead>';
			
			if(quku_video_files.length==0){
				vfHTML += '<tr><td><a onclick="addFilesRow(this)" hrer="###">[增加]</a> <a onclick="removeFilesRow(this)" href="###">[删除]</a></td><td><select class="x-component-input" name="vf_definition">'+ definitionHTML +'</select></td>'
				vfHTML += '<td><input type="text" class="x-component-input" id="vf_file_extension_input" name="vf_file_extension" value=""></td>'
				vfHTML += '<td><input type="text" class="x-component-input" id="vf_aspect_ratio_input" name="vf_aspect_ratio" value=""></td>'
				vfHTML += '<td><input type="text" class="x-component-input" id="vf_file_duration_input" value="" name="vf_file_duration"></td>'
				vfHTML += '<td><input type="text" class="x-component-input" id="vf_file_size_input" value="" name="vf_file_size"></td><td>'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_aspect_ratio_input" name="vf_aspect_ratio" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_globalid_input" name="vf_globalid" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_videoinfo_id_input" name="vf_videoinfo_id" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_md5_input" name="vf_md5" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_file_link_input" name="vf_file_link" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_file_format_input" name="vf_file_format" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_size_player_input" name="vf_size_player" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_player_param_input" name="vf_player_param" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_source_path_input" name="vf_source_path" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_showurl_input" name="vf_showurl" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_file_name_input" name="vf_file_name" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_p2p_hash_input" name="vf_p2p_hash" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_check_status_input" name="vf_check_status" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_last_up_time_input" name="vf_last_up_time" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_jointime_input" name="vf_jointime" readonly="" value="">'
				vfHTML += '<input type="hidden" class="x-component-input" id="vf_fpid_input" name="vf_fpid" readonly="" value=""></td></tr>';
			}
			vfHTML += '<tbody>'+vfTR+'</tbody></table></div>';

			sourceBox = '<div class="sourceBox"><input type="hidden" class="label" value="'+i+'" /><div class="videoBox">'+viHTML+vfHTML+piHTML+'</div><span class="closeBox">[删除]</span></div>';
			$("#contentResource").find("fieldset").append(sourceBox);
		}
	}
}

//格式化模版函数
String.format = function(src){    
  
       if (arguments.length == 0) return null;    
  
       var args = Array.prototype.slice.call(arguments, 1);    
  
       return src.replace(/\{(\d+)\}/g, function(m, i){    
  
             return args[i];    
  
      });    
};

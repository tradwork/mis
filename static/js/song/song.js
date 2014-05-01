var Song = {
	
	//外包人员审核单曲库按钮功能
	saveInCache : function (checked) {
		var flag = $('.si_status_audit').val();
		if(!this.beforeSaveAction(this.saveInCache,checked)){
			return;
		}
		jQuery.post(
			'?c=song&m=saveInCache',
			this.construnctPostQueryString(),
			function(sData){
					if(sData.error_code == 0){
						//TODO show more humanization
						alert('审核成功');
						//跳转到原来状态下的页面中
						window.location.href = '?c=song&m=search&tn=song_list&search_status=' + flag;
						Song.afterSaveAction(sAction, sData);
					}else if(sData.error_code == -6){
						alert("没有改变任何数据");
						return;
					}
					else{
						Quku.showValidateInfo('song',sData);
					}
			},'json'
		);
	},
	createCreationDialog:function(){
		baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
		return new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url:'/qmis/index.php?c=song&m=createInDialog&tn=song_createInDialog'},Quku.dialogSpecs.XL_XXL)
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
			'?c=song&m='+sAction,
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
						Song.afterSaveAction(afterAction, sData);
					}
					else{
						quku_v.com.showValidateInfo('song',sData);
					}
				}
				else{
					if(sData.error_code == 0){
						if( $('#container') && $('#container').val() == 'doActionIndialog' ){
							afterAction = 'doActionIndialog';
						}
						alert('修改成功');
						
						Song.afterSaveAction(afterAction, sData);
					}
					else{
						quku_v.com.showValidateInfo('song',sData);
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
			'?c=song&m='+action,
			this.construnctPostQueryString(),
			function(sData){
			     var afterAction = action;
				if(sData.error_code == 0){
				     if( $('#container') && $('#container').val() == 'doActionIndialog' ){
							afterAction = 'doActionIndialog';
						}
					//TODO show more humanization
					alert('发布成功');
					Song.afterSaveAction(afterAction, sData);
				}
				else{
					quku_v.com.showValidateInfo('song',sData);
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
			window.location.href = '?c=song&m=search&tn=song_list&search_status=1';
			break;
		case 'doEdit' :
			window.location.href = '?c=song&m=search&tn=song_list&search_status=1';
			break;
		case 'doCreateAndPub' : 
			window.location.href = '?c=song&m=search&tn=song_list&search_status=0';
			break;
		case 'doEditAndPub' :
			window.location.href = '?c=song&m=search&tn=song_list&search_status=0&pub_song_id='+$('#si_globalid').val();
			break;
		case 'doActionIndialog':	
			var childStation = new baidu.ui.crossFrameDialog.ChildStation();
			var response = (sData.data) ? sData.data : [];
			response.seq = $('#songId').val();
			childStation.sendAndClose(response);
			break;
		case 'saveInCache':
		    window.location.href = '?c=song&m=search&tn=song_list&search_status=1';
			break;
	    default : window.location.href = '?c=song&m=search&tn=song_list';
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
		      T.operationHandler(event, '?c=song&m=disPub&si_globalid=' + quku_v.song.data.si_globalid, 
			         quku_v.global.SONG_NON_PUB_URL, '下线成功');
		} 
	},	
    construnctPostQueryString : function() {
		//基本信息
		// quku_v.songForm.formArray.push( {'si_recording_type':'11111'} );
		var formData = quku_v.songForm.formArray.getValue();
		var iAudioInfo = [];
		var iAudioDelInfo = [];
		$('.audioSerialized').each(function() {
			if($(this).val()) {
				if($(this).attr('title') == 'del'){
					iAudioDelInfo.push($(this).val());
				}else{
					iAudioInfo.push($(this).val());
				}
			}
		});
		var sfShowurl = [];
		$('.audioShowurl').each(function(index,item){
		    if( $($('.audioSerialized')[index]).val() ){
			    sfShowurl.push( $(this).val() );
			}
		})
		
		var sfSource = [];
		$('.audioSource').each(function(index,item){
		    if( $($('.audioSerialized')[index]).val() ){
			    sfSource.push( $(this).val() );
			}
		})
		
		var iLrcInfo = $.trim($('#lrcSerialized').val());
		
		// 获取图片信息
		var iPicInfo = [], iPicDescItems = $("input[name='picDesc[]']"), iPicDesc = [] ;
		
		$('.picSerialized').each(function(key,item) {
			if($(this).val()) {
					iPicInfo.push( $(this).val() );
					iPicDesc.push( $(iPicDescItems[key]).val() );
			}
		});
		
		// 是否选择了审核checkbox
		var si_audit_status ,si_audit_info=[];
		//0 表示已审核 1表示未审核
		//si_audit_status = $("#si_audit_status").prop('checked') ? 0 : 1;
		var si_auditArr = document.getElementsByName("si_audit_info[]");
		for(var i=0;i<si_auditArr.length;i++){
			if(i==si_auditArr.length-1){
				si_audit_info[si_audit_info.length] = si_auditArr[i].value;
			}
			else{
				if(si_auditArr[i].checked==true){
					si_audit_info.push(si_auditArr[i].value);
				}
			}
		}
		
		// 设置歌手信息
		formData['quku_artist_works_ref'] = $('#quku_artist_works_ref_serialized').val();
		formData['quku_cluster_info'] = $("#ci_primary_songid_serialized").val();
		$.extend(formData,{
		        si_globalid: $('#si_globalid').val(),			
				quku_pic_info: iPicInfo.join("$@$"),
				quku_pic_desc: iPicDesc.join('$@$'),
				quku_songs_files: iAudioInfo.join('$@$'),
				quku_songs_lrcs: iLrcInfo,
				si_audit_status: si_audit_status,
				sf_showurl : sfShowurl.join("$@$"),
				sf_source : sfSource.join("$@$"),
				si_audit_info: si_audit_info.join("$@$")
			});
		return formData;
    }
}



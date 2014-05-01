var Album = {
	initForm : function () {
		
	},
	
	save : function (checked) {
		var sAction = $('#action').val();
		if(!this.beforeSaveAction(this.save,checked)){
			return;
		}
		jQuery.post(
			'?c=album&m='+sAction,
			this.construnctPostQueryString(),
			function(sData){
				if(sData.error_message!=""){
					alert(sData.error_message);
				}				
				if(sAction == 'doCreate'){
					if(sData.error_code == 0){
						//TODO show more humanization
						alert('添加成功');
						window.location.href = '?c=album&m=search&tn=album_list&search_status=1';
					}
					else{
					    if(sData.data){
							var listData = sData.data.quku_songs_list.data ;
							if( listData.length > 0 ){
								RepeatSongWin.show(eval("("+listData+")"))
							 }
						 }
					     else{
							quku_v.com.showValidateInfo('album',sData);
						}
					}
				}
				else{
					if(sData.error_code == 0){
						alert('修改成功');
						window.location.href = '?c=album&m=search&tn=album_list&search_status=1';
					}
					else{
						if(sData.data){
							var listData = sData.data.quku_songs_list.data ;
							if( listData.length > 0 ){
								RepeatSongWin.show(eval("("+listData+")"))
							 }
						 }else{
							quku_v.com.showValidateInfo('album',sData);
						}
					}
				}
			},'json'
		);
	},
	saveAndPub : function(checked) {
		var sAction = $('#action').val();
		if(sAction == 'doCreate'){			
			var action = 'doCreateAndPub';
			
		}else if(sAction == 'saveInCache'){
			var action = 'saveInCache';
			
		}else{
		    var action = 'doEditAndPub';
		}
		
		if(!this.beforeSaveAction(this.saveAndPub,checked)){
			return;
		}
		var me = this;
		jQuery.post(
			'?c=album&m='+action,
			this.construnctPostQueryString(),
			function(sData){
				if(sData.error_code == 0){
					//TODO show more humanization
					if(sData.error_message!=""){
						alert(sData.error_message);
					}
					if(action.indexOf('Pub') > 0){
					    me.batchOpSong(false);
						setTimeout(function(){
							alert('发布成功');
							window.location.href = '?c=album&m=search&tn=album_list&search_status=0&pub_album_id='+sData.album_id;
					
						},1000);
					}
					else{
					   		alert('发布成功');
							window.location.href = '?c=album&m=search&tn=album_list&search_status=0&pub_album_id='+sData.album_id;
					
					}
					
					
					
				}
				else{
					if(sData.data){
							var listData = sData.data.quku_songs_list ;
							if( listData.length > 0 ){
								RepeatSongWin.show(eval("("+listData+")"))
							 }
						 }else{
						quku_v.com.showValidateInfo('album',sData);
					}
				}
			},'json'
		);
	},
	
	renderNewSong : function (method, response) {	
		var seq = response.seq ? response.seq : '', data = manageSongInfo( response ), item=null ;
		$("#newSong"+seq).remove();  //上传成功后 移除原来的录入歌曲按钮		
		$("#deleteSong"+seq).remove(); //上传成功后 移除原来的删除按钮
		
        var operationStage = $('#songOperation' + seq);
		for(q in data) {
		    item = $('#'+ q + seq);
			if(item && item.attr('id') && q != 'seq' ) {
				item.val(data[q]);      
			}
		}
	
	  operationStage.html('<a id="'+seq+'" name="'+data.si_globalid+'" onclick="checkBlock(this);return false;" href="#">[修改]</a> '
		  +'<a id="'+seq+'" name="'+data.si_globalid+'" href="#" onclick="operationConfirm(event,this);return false;">[删除]</a>');
	
	  if(data.quku_songs_files){
	        $('#songs_files' + seq).html('');
			for(var m=0;m<data.quku_songs_files.length;m++){
				 $('#songs_files' + seq).append( "<a href='"+data.quku_songs_files[m].sf_file_link+"'>"+data.quku_songs_files[m].sf_file_bitrate+"</a> ");
			}
	  }
	  $('#album_song' +  seq).val(data.si_globalid);	 
	  $('#si_status' + seq).val( (data.si_status==0)?'已发布':'未发布' );
	  $('#songStatus' + seq).html('<span class="red">上传成功</span>');
	  $('#newSong'+ seq).attr("disabled","disabled"); 
	  $('#newSong'+ seq).attr("onclick","");
	  $('#newSong'+ seq).addClass("gray");
	  $('#checked'+ seq).attr("sid",data.si_globalid);
	  
	},
	beforeSaveAction : function (savefn,checked) {
		if(checked){return true}		
		var si_author =$.trim( $('#quku_artist_works_ref').textfield('getValue') );
		if ( si_author == ""){
			alert('歌手不能为空');
			return false;
		}
		
		
		var onumbers = $('.si_album_no');
		for(var i=0;i<onumbers.length;i++){
				if(onumbers[i].value<0){
					alert('单曲序号不能为负数，请重新填写');
					return false;
			  }
		}	
		var extQueryString = "";
		if(si_author != ""){
				extQueryString += 'quku_artist_works_ref='+encodeURIComponent(si_author);
		}
		var arrtemp=[];
		arrtemp['quku_artist_works_ref']=si_author;
		duplicateName.check('getIdByName', extQueryString, baidu.delegate(this,savefn),arrtemp);	
	},
	needChecked : function() {
	  return duplicateName.needChecked('quku_artist_works_ref',origid_g);
	},
	batchOpSong: function(isDisPub){
	  var check = $('#tableSong').find('input[type="checkbox"]'), ids=[];
		$(check).each(function(){
			if( $(this).prop('checked') &&  $(this).attr('sid')){
				ids.push( $(this).attr('sid') );
			}
			return ;
		});
	   if(ids.length > 0){		   
			 jQuery.post(
				'?c=song&m='+ (isDisPub?'disPub':'batchPub') +'&si_globalid=' + ids.join(','),
				'',
				function(sData){
								
				},'json'
			);
		}
	
	},
  /**
	 * 下线明星
	 * @method offline
	 * @param {Any} 
	 * @return {Json} 返回页面元素的键值 json对象
	 */
	offline: function(event, obj){
	    var T = quku_v.com ;
		var me = this;
		var handleSong = function(){ 
		   me.batchOpSong(true); 
		}
	    if( T.operationConfirm(event, '确认要下线该专辑吗?') ) 
		{
		      T.operationHandler(event, '?c=album&m=disPub&ai_globalid=' + quku_v.album.data.ai_globalid, 
			         quku_v.global.ALBUM_NON_PUB_URL, '下线成功',handleSong);
		} 
	},
	getSongItemStr: function(type){
	    var resultAlbumNo = [], resultCdNo = [],reslutSongItems = [], 
		iSongItems = $("input[name='songSerialized[]']"), iAlbumNo=$("input[name='si_album_no[]']"), 
		                                                     iCdNo = $("input[name='si_cd_no[]']") ;
		
		iSongItems.each(function(index,item){
		   if($(this).val()) {			
				reslutSongItems.push( $(this).val() );
				resultCdNo.push( $(iCdNo[index]).val() );
				resultAlbumNo.push( $(iAlbumNo[index]).val() )
			}
		}) ;
	    switch (type){
		    case 'song': return reslutSongItems.join('$@$'); break;
			case 'album': return resultAlbumNo.join('$@$'); break;
			case 'cd': return resultCdNo.join('$@$'); break;
			default: return '';
		}
		
		
	},
    construnctPostQueryString : function() {
		
		var formData = quku_v.albumForm.formArray.getValue();
		
		// 获取图片信息
		var iPicInfo = [], iPicDescItems = $("input[name='picDesc[]']"), iPicDesc = [] ;
		
		$('.picSerialized').each(function(key,item) {
			if($(this).val()) {
					iPicInfo.push( $(this).val() );
					iPicDesc.push( $(iPicDescItems[key]).val() );
			}
		});
		// 设置歌手信息
		formData['quku_artist_works_ref'] = $('#quku_artist_works_ref_serialized').val();
		
		//设置录入单曲
		//var iAlbumItems = this.getSongItemStr();
		/*$("input[name='songSerialized[]']").each(function(){
			if($(this).val()) {
				iAlbumItems.push ($(this).val());
			}
		});
		*/
		// 是否选择了审核checkbox
		var ai_audit_status ,ai_audit_info=[];
		//0 表示已审核 1表示未审核
		//ai_audit_status = $("#ai_audit_status").prop('checked') ? 0 : 1;
		var ai_auditArr = document.getElementsByName("ai_audit_info[]");
		for(var i=0;i<ai_auditArr.length;i++){
			if(i==ai_auditArr.length-1){
				ai_audit_info[ai_audit_info.length] = ai_auditArr[i].value;
			}
			else{
				if(ai_auditArr[i].checked==true){
					ai_audit_info.push(ai_auditArr[i].value);
				}
			}
		}
		$.extend(formData,{
		        ai_globalid: $('#ai_globalid').val(),			
				quku_pic_info: iPicInfo.join("$@$"),
				quku_pic_desc: iPicDesc.join('$@$'),
				quku_songs_list : this.getSongItemStr('song'),
				si_cd_no : this.getSongItemStr('cd'),
				si_album_no : this.getSongItemStr('album'),
				ai_audit_status: ai_audit_status,
				ai_audit_info: ai_audit_info.join("$@$")
			});
		return formData;
    }
};

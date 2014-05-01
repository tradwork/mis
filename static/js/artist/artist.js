var artist = {
	
	/**
	 * 添加歌手信息
	 * @method save
	 * @param {flag} 修改标识
	 * @return undefined
	 */
	save : function (flag) {
		var action = $('#action').val();
		if(!action) return;
	//	if(action == "doEdit"&&!flag&&!this.suggestSong(this.save)){
	//	if( action == "doEdit"&&!flag ){
	//			return ;
	//	}
		jQuery.post(
			'?c=artist&m='+action,
			this.handlePostQueryStr(),
			function(sData){				
				if(action == 'doCreate'){			
					if(sData.error_code == 0){
						//TODO show more humanization
						alert('添加成功');
						window.location.href = quku_v.global.ARTIST_NON_PUB_URL;
					}
					else{
						quku_v.com.showValidateInfo('artist',sData);
					}
				}
				else{
					if(sData.error_code == 0){
						alert('修改成功');
						window.location.href = quku_v.global.ARTIST_NON_PUB_URL;
					}
					else{
						quku_v.com.showValidateInfo('artist',sData);
					}
				}
			},'json'
		);
	},
	 /**
	 * 保存并发布
	 * @method saveAndPub
	 * @param {flag}  修改标识
	 * @return {}  undefined
	 */
	saveAndPub : function(flag) {
		var action = $('#action').val();
		if(!action) return;
		
	
		if(action == 'doCreate'){			
			var action = 'doCreateAndPub';
			
		}else if(action == 'saveInCache'){
			var action = 'saveInCache';
			
		}else{
		    var action = 'doEditAndPub';
		}
	
		jQuery.post(
			'?c=artist&m='+action,
			this.handlePostQueryStr(),
			function(sData){
				if(sData.error_code == 0){
					//TODO show more humanization
					alert('发布成功');
					window.location.href = quku_v.global.ARTIST_PUB_URL;
				}
				else{
					quku_v.com.showValidateInfo('artist',sData);
					//弹错误提示信息
				}
			},'json'
		);
	},
	 /**
	 * 下线明星
	 * @method offline
	 * @param {Any} 
	 * @return {Json} 返回页面元素的键值 json对象
	 */
	offline: function(event, obj){
	    var T = quku_v.com ;
	    if( T.operationConfirm(event, '确认要下线该明星吗?') ) 
		{
		      T.operationHandler(event, '?c=artist&m=disPub&ab_globalid=' + quku_v.artist.data.ab_globalid, 
			         quku_v.global.ARTIST_NON_PUB_URL, '下线成功');
		} 
	},
	 /**
	 * 拼接页面元素值
	 * @method handlePostQueryStr
	 * @param {Any} 
	 * @return {Json} 返回页面元素的键值 json对象
	 */
	handlePostQueryStr: function(){
	    //组合对象formArray中获取所有的值
	    var datajson = quku_v.artist.formArray.getValue();
		
		var iGlobalid = $.trim($('#ab_globalid').val());
		var iPicInfo = [], iPicDescItems = $("input[name='picDesc[]']"), iPicDesc = [] ;
		
		$('.picSerialized').each(function(key,item) {
			if($(this).val()) {
					iPicInfo.push( $(this).val() );
					iPicDesc.push( $(iPicDescItems[key]).val() );
			}
		});
		
		// 是否选择了审核checkbox
		var ab_audit_status;
		//0 表示已审核 1表示未审核
		ab_audit_status = $("#ab_audit_status").prop('checked') ? 0 : 1;
		
		$.extend(datajson, {
		    ab_globalid: iGlobalid,
			ab_audit_status: ab_audit_status,
			quku_pic_info: iPicInfo.join("$@$"),
			quku_pic_desc: iPicDesc.join('$@$')
		}) ;
		return datajson;
	},
	/**
	* 创建重名歌手判断
	*/
	createduplicateNameSelectorDialog:function(extQueryString){
		baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
		return new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url:'/index.php?c=artist&m=selector&tn=common_duplicateNameSelector'},Quku.dialogSpecs.M_L)
		);
	},
	/**
	* 创建重名歌手判断
	*/
	createSuggestSongSelector:function(extQueryString){
		baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
		return new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url:'/index.php?c=artist&m=selector&tn=common_SuggestSongSelector'},Quku.dialogSpecs.M_L)
		);
	}
}

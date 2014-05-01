var tag = {
	
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
			'?c=tag&m='+action,
			this.handlePostQueryStr(),
			function(sData){				
				if(action == 'doCreate'){			
					if(sData.error_code == 0){
						//TODO show more humanization
						alert('添加成功');
						window.location.href = quku_v.global.TAG_LIST_URL;
					}
					else{
						quku_v.com.showValidateInfo('tag',sData);
					}
				}
				else{
					if(sData.error_code == 0){
						alert('修改成功');
						window.location.href = quku_v.global.TAG_LIST_URL;
					}
					else{
						quku_v.com.showValidateInfo('tag',sData);
					}
				}
			},'json'
		);
	},
	
	 /**
	 * 拼接页面元素值
	 * @method handlePostQueryStr
	 * @param {Any} 
	 * @return {Json} 返回页面元素的键值 json对象
	 */
	handlePostQueryStr: function(){
	    //组合对象formArray中获取所有的值
	    var datajson = quku_v.tag.formArray.getValue();
		
		var iGlobalid = $.trim($('#td_tagid').val());
		
		$.extend(datajson, {
		    td_tagid: iGlobalid
		}) ;
		return datajson;
	}
}

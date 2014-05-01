var Show = {
	initForm : function () {	
		
	},
	save : function (checked) {
		var sAction = $('#action').val();
		if(!this.beforeSaveAction(this.save,checked)){
			return;
		}
		jQuery.post(
			'?c=show&m='+sAction,
			this.construnctPostQueryString(),
			function(sData){
				if(sAction == 'doCreate'){
					if(sData.error_code == 0){
						//TODO show more humanization
						alert('添加成功');
						window.location.href = quku_v.global.SHOW_NON_PUB_URL;
					}
					else{
						quku_v.com.showValidateInfo('show',sData);
					}
				}
				else{
					if(sData.error_code == 0){
						alert('修改成功');
						window.location.href = quku_v.global.SHOW_NON_PUB_URL;
					}
					else{
						quku_v.com.showValidateInfo('show',sData);
					}
				}
			},'json'
		);
	},
	saveAndPub : function(checked) {
		var sAction = $('#action').val();
		if(sAction == 'doCreate'){			
			var action = 'doCreateAndPub';
		}else{
			var action = 'doEditAndPub';
		}
		if(!this.beforeSaveAction(this.saveAndPub,checked)){
			return;
		}
		jQuery.post(
			'?c=show&m='+action,
			this.construnctPostQueryString(),
			function(sData){
				if(sData.error_code == 0){
					//TODO show more humanization
					alert('发布成功');
					window.location.href = quku_v.global.SHOW_PUB_URL;
				}
				else{
					quku_v.com.showValidateInfo('show',sData);
				}
			},'json'
		);
	},
	beforeSaveAction : function (savefn,checked) {
		if(checked){return true}

		var extQueryString = "" , sn_author = $.trim( $('#quku_artist_works_ref').textfield('getValue') );
		if(sn_author != ""){
			extQueryString += 'quku_artist_works_ref='+encodeURIComponent( sn_author );
		}
		var arrtemp=[];
		arrtemp['quku_artist_works_ref'] = sn_author;
		
		duplicateName.check('getIdByName', extQueryString, baidu.delegate(this,savefn),arrtemp);
	},
	needChecked : function() {     
      if(duplicateName.needChecked('quku_artist_works_ref',origid_g)){
        return true;
      }
		return false;
	},
    construnctPostQueryString : function() { 
		
		//组合对象formArray中获取所有的值
	    var datajson = quku_v.showForm.formArray.getValue();
		
		
		var iGlobalid = $.trim($('#sn_globalid').val());
		var iPicInfo = [], iPicDescItems = $("input[name='picDesc[]']"), iPicDesc = [] ;
		
		$('.picSerialized').each(function(key,item) {
			if($(this).val()) {
					iPicInfo.push( $(this).val() );
					iPicDesc.push( $(iPicDescItems[key]).val() );
			}
		});
				
		// 设置歌手信息
		datajson['quku_artist_works_ref'] = $('#quku_artist_works_ref_serialized').val();
		
		
		
		$.extend(datajson, {
		    sn_globalid: iGlobalid,
			quku_pic_info: iPicInfo.join("$@$"),
			quku_pic_desc: iPicDesc.join('$@$')
		}) ;
		
		return datajson;
    },
		/**
	 * 下线演出
	 * @method offline
	 * @param {Any} 
	 * @return {Json} 
	 */
	offline: function(event, obj){
	    var T = quku_v.com ;
	    if( T.operationConfirm(event, '确认要下线该演出吗?') ) 
		{
		      T.operationHandler(event, '?c=show&m=disPub&sn_globalid=' + quku_v.show.data.sn_globalid, 
			         quku_v.global.SHOW_NON_PUB_URL, '下线成功');
		} 
	}
}

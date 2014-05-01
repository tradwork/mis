Lrc = {
	initForm : function () {	
		
	},
	createSelectorDialog:function(){
		baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
		return new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url:'/index.php?c=lrc&m=selector&tn=song_mutiLrcSelector'},Quku.dialogSpecs.S)
		);
	},
	deleteLrcEntity: function(){
		$('#tableLrc').html( this.oldInnerHTML );
		LrcUploader.registerAjaxUploadListener('avatarLrc');
	
	},
	getLrcList : function () {
		if($("#avatarLrc").attr("disabled")){return;}
		var artist = $('#quku_artist_works_ref').textfield('getValue');
		var title = $('#si_title').textfield('getValue');
		jQuery.post(
			'?c=lrc&m=getLrcList&artist='+encodeURIComponent(artist)+'&title='+encodeURIComponent(title),
			{},
			function(sData){
        if(sData.data.length==0){alert('无匹配歌词！');return;}
				var dialog = Lrc.createSelectorDialog();
				dialog.addEventListener('received', baidu.delegate(Lrc, Lrc.changeLrcFile));
				dialog.popup(sData.data);
			},'json'
		);
	},
	changeLrcFile : function(method, selectData) {
		var artist = $('#quku_artist_works_ref').textfield('getValue');
		var title = $('#si_title').textfield('getValue');
		var selectItemArray = selectData.split('|'); 
		var id = baidu.isUndefined(selectItemArray[0]) ? '' : selectItemArray[0];
		var key = baidu.isUndefined(selectItemArray[1]) ? '' : selectItemArray[1]; 
		jQuery.post(
			'?c=lrc&m=saveChosenLrc&artist='+encodeURIComponent(artist)+'&title='+encodeURIComponent(title)+'&id='+id+'&key='+key,
			{},
			function(response){
			    if(!Lrc.oldInnerHTML) 
						        Lrc.oldInnerHTML = $('#tableLrc').html();
				if(response.error_code!==0){
				    alert(response.error_message);
					return ;
				}
	        	$('#lrcOperation').html('<a href="javascript:void(0)" onclick=Lrc.showLrcDetail(\"' + response.data[0].sl_lrclink + '\")>查看</a>|&nbsp;'+'<a href='+response.data[0].sl_lrclink +' target="_blank">下载</a>|&nbsp;'
	        			+'<a href="javascript:void(0);" onclick="Lrc.deleteLrcEntity()">删除</a>');
	        	$('#lrcSerialized').val(response.data[0].json);
	        	$('#lrcSerialized').removeAttr("title"); 
				$("#avatarLrc").attr("disabled","true");
				$("#lrc_btn_span").hide();
	        	$('#lrcStatus').html('<span class="red">上传成功</span>');
			},'json'
		);
	},
	showLrcDetail : function(link){
	       
			if(!link) {alert("没有连接，无法查看歌词！")}
			jQuery.post(
			'?c=lrc&m=getLrcContent&sl_lrclink='+link,{},
				function(sData){
				    
					if($.parseJSON(sData).data){
						LrcWin.show($.parseJSON(sData).data,true, link);
					}else{
						alert("没有相关歌词！")
					}
			},'text');
	}
}

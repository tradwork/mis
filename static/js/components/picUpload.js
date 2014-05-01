PicUploader = {
	registerAjaxUploadListener : function (uploadBtnId, caller,obj) {
		new AjaxUpload(uploadBtnId, {
			action: '?c=pic&m='+(caller== 'movie'||caller== 'tv'? 'upload' : 'upload&type=' + $("#channel").val()||''),
		    responseType: 'json',
		    data : {
		    },
		    onSubmit : function(file, ext){
				/* Setting data */
				this.setData({
					'file': file
				});
		    },
		    onComplete : function(file, response){				
				if (response.error_code == 1) {		    		
					alert(response.error_message);
		        } else {
					if( caller == "song"  || caller == 'show' || caller == 'artist') {
						var heightStage = $('#'+  uploadBtnId.replace("avatarImg","picHeight"));
						var widthStage = $('#'+  uploadBtnId.replace("avatarImg","picWidth"));
						var serializedStage = $('#'+  uploadBtnId.replace("avatarImg","picSerialized"));
						var operationStage = $('#'+  uploadBtnId.replace("avatarImg","picOperation"));
						operationStage.html('<a href="'+response.data[0].pi_link+'" target="_blank">查看</a>|&nbsp;<a href="javascript:void(0);" onclick="Song.deletePicEntity(\''+uploadBtnId+'\',\''+response.data.pi_link+'\')">删除</a>');
						heightStage.val(response.data[0].pi_pic_height);
						widthStage.val(response.data[0].pi_pic_width);
						serializedStage.val(response.data[0].json);
						serializedStage.removeAttr("title"); 
						$('#'+uploadBtnId).attr("disabled","disabled"); 
					}
					else {
						//遍历返回图片的数据
						var firPicInfo = response.data;
						var pos = $("#"+uploadBtnId).attr("label");
						if( caller == 'movie' || caller == 'tv'){
							$('#'+  uploadBtnId.replace("avatarImg","picHeight")).val(firPicInfo.pi_pic_height);
							$('#'+  uploadBtnId.replace("avatarImg","picWidth")).val(firPicInfo.pi_pic_width);
							$('#'+  uploadBtnId.replace("avatarImg","picSerialized")).val(firPicInfo.serialized);
							$( '#picPreview' + uploadBtnId.substr( -1 ) ).html(
						  		'<a href="'+firPicInfo.pi_link+'" target="_blank">'
								+ '<img src="'+firPicInfo.pi_link+'" width="60" height="60" border="0" />'
								+ '</a>'
							);
						
						$('#'+uploadBtnId).attr("disabled","disabled"); 
						}else{
							if(response.data.length > 0){
								initPicValue(response.data,pos);
							};
						}

					}	
						
		        }
		    }
		});
	}
}


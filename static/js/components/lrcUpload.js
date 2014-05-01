LrcUploader = {
	registerAjaxUploadListener : function (uploadBtnId, showStage) {
		new AjaxUpload(uploadBtnId, {
			action: '?c=lrc&m=upload',
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
		    	var statusStage = $('#'+  uploadBtnId.replace("avatarLrc","lrcStatus"));
		    	 if (response.error_code == 1) {
		    		//statusStage.html('上传失败');
					alert(response.error_message);
		        } else {
				    if(!Lrc.oldInnerHTML) 
						        Lrc.oldInnerHTML = $('#tableLrc').html();
		        	var operationStage = $('#lrcOperation');
		        	var serializedStage = $('#lrcSerialized');
                    $('#'+uploadBtnId).attr("disabled","disabled"); 
		        	operationStage.html('<a href="javascript:void(0)" onclick=Lrc.showLrcDetail(\"'+response.data[0].sl_lrclink+'\")>查看</a>|&nbsp;'+'<a href="'+response.data[0].sl_lrclink+'" target="_blank">下载</a>|<a href="javascript:void(0);" onclick="Lrc.deleteLrcEntity()">删除</a>');
		        	serializedStage.val(response.data[0].json);
		        	serializedStage.removeAttr("title"); 
					$("#lrc_btn_span").hide();
		        	statusStage.html('<span class="red">上传成功</span>');
		        }
		    }
		});
	}
}


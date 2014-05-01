MediaUploader = {
	registerAjaxUploadListener : function (uploadBtnId, caller) {
		new AjaxUpload(uploadBtnId, {
			action: '?c=media&m=upload',
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
	    		var statusStage = $('#'+  uploadBtnId.replace("avatarMedia","mediaStatus"));
		    	if (response.error_code == 1) {
		    		//statusStage.html('上传失败');
					alert(response.error_message);
		        } else {
		        	 switch (caller) {
			 			case 'audio':
				        	var formatStage = $('#'+  uploadBtnId.replace("avatarMedia","audioFormat"));
				        	var sizeStage = $('#'+  uploadBtnId.replace("avatarMedia","audioSize"));
				        	var bitrateStage = $('#'+  uploadBtnId.replace("avatarMedia","audioBitrate"));
				        	var operationStage = $('#'+  uploadBtnId.replace("avatarMedia","audioOperation"));
				        	var serializedStage = $('#'+  uploadBtnId.replace("avatarMedia","audioSerialized"));
				                var checkStage = $('#'+  uploadBtnId.replace("avatarMedia","audioCheckStatus"));
				        	formatStage.val(response.data[0].sf_file_extension);
				        	sizeStage.val(response.data[0].sf_file_size);
				        	bitrateStage.val(response.data[0].sf_file_bitrate);
				                checkStage.val(mediaCheckStatus[response.data[0].sf_check_status])
				        	operationStage.html('<a href="'+response.data[0].sf_file_link+'" target="_blank">试听</a>');
				        	serializedStage.val(response.data[0].json);
                  $('#'+uploadBtnId).attr("disabled","disabled");
			 			break;
			 			case 'mtv' :
			 				var serializedStage = $('#'+  uploadBtnId.replace("avatarMedia","mvSerialized"));
			 				var operationStage = $('#'+  uploadBtnId.replace("avatarMedia","mvOperation"));
			 	        	operationStage.html('<a href="'+response.data[0].sf_file_link+'" target="_blank">查看</a>');
			 	        	serializedStage.val(response.data[0].serialized);
			 	        	serializedStage.removeAttr("title");
			 			break;
		        	 }
		        	statusStage.html('<span class="red">上传成功</span>');
		        	$('#'+uploadBtnId).attr("disabled","disabled");
		        }
		    },
        onchange:function(file){

        }
		});
	}
}

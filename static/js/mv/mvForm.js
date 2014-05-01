var quku_v = window.quku_v || {};
quku_v.mvForm = {};

/**
 * MV详情页
 * @method displayDom
 * @param
 * @return
 */

 quku_v.mvForm.displayPanel = function(data){
     
     //基本信息组合对象,元素类型为json对象，key是元素id，value是元素组件类型
	 quku_v.mvForm.formArray = new quku_v.FormArray();

	 var T = quku_v.mvForm;
	 /** 基本信息 **/
	 $('#mi_title').textfield({
		 labelText:'MV名称',
		 isBlank:false,
	 })

	 T.formArray.push({'mi_title':'textfield'});

	 $('#mi_subtitle').textfield({
		 labelText:'MV副标题',
		 isBlank:false
	 })
	 T.formArray.push({'mi_subtitle':'textfield'});

	 $('#quku_artist_works_ref').textfield({
		 labelText:'歌手',
		 isBlank:false,
		 note:'<input id="quku_artist_works_ref_serialized" style="display:none;">'
	 });
	 T.formArray.push({'quku_artist_works_ref':'textfield'});
	 
	 // $('#mi_artist_id').textfield({
		//  labelText:'歌手ID'
	 // });
	 // T.formArray.push({'mi_artist_id':'textfield'});

	 $('#mi_publishtime').textfield({
		 labelText:'发行时间'
	 })
	 T.formArray.push({'mi_publishtime':'textfield'});
	 
	 $('#mi_pre_pubtime').textfield({
		 labelText:'定时发布时间'
	 })
	 T.formArray.push({'mi_pre_pubtime':'textfield'});

	 $('#mi_info').textfield({
		 labelText:'描述'
	 })
	 T.formArray.push({'mi_info':'textfield'});

	 $('#mi_mv_id').textfield({
		 labelText:'MVID'
	 })
	 T.formArray.push({'mi_mv_id':'textfield'});
	 
	 $('#mi_versions').multiselector({
		 labelText:'版本',
		 height: 110,
		 store: data.mi_versionsOption
	 })
	 T.formArray.push({'mi_versions':'multiselector'});

	 $('#mi_area').selectfield({
		 labelText:'地区',
		 store:data.mi_areaOption
	 })
	 T.formArray.push({'mi_area':'selectfield'});

	 $('#mi_relate_ids').textfield({
		 labelText:'关联歌曲'
	 })
	 T.formArray.push({'mi_relate_ids':'textfield'});

	 
	 $('#mi_label').textfield({
		 labelText:'标签',
		 isBlank:false
	 })
	 T.formArray.push({'mi_label':'textfield'});

	/* 版权信息 */

   $('#mi_publishcompany').textfield({
		labelText:'发行公司',
	})
    T.formArray.push({'mi_publishcompany':'textfield'});

	$('#mi_proxycompany').textfield({
		labelText:'付费公司',
	})
    T.formArray.push({'mi_proxycompany':'textfield'});

	$('#mi_prohibit_type').radiofield({
		labelText:'版权类型',
		store: data.mi_prohibit_typeOption,
		note:'<input id="quku_artist_works_ref_serialized" style="display:none;">',
		value: data.mi_prohibit_type
	})
    T.formArray.push({'mi_prohibit_type':'radiofield'});


	$('#quku_mv_ref').editgrid({
		 labelText:'关联歌曲',
		 fields:[{name:'mr_itemid'},{name:'mr_order'}],
		 initNewRow: function(){
		 },
		 columns:[
			 {
				text:' 操作',
				type:'operation' ,
				width: 80
			 },
			 {
				text:' 关联歌曲',
				dataIndex: 'mr_itemid',
				type:'text',
				width: 70
			 },
			 {
				text:' 匹配级别',
				dataIndex: 'mr_order',
				type:'text',
				width: 70
			 }	 
		 ]

	})
	T.formArray.push({'quku_mv_ref':'editgrid'});

	//资源信息
	 // $('#vi_tvid').textfield({
		//  labelText:'TVID'
	 // })
	 // T.formArray.push({'vi_tvid':'textfield'});	
	// $("#vi_globalid").textfield({
	// 	labelText:"V_ID",
	// });
	// T.formArray.push({"vi_globalid":"textfield"});

	// $("#vi_source_path").textfield({
	// 	labelText:"视频页面URL",
	// });
	// T.formArray.push({"vi_source_path":"textfield"});

	// $("#vf_definition").selectfield({
	// 	labelText:"清晰度",
	// 	store:data.vf_definitionOption
	// });
	// T.formArray.push({"vf_definition":"selectfield"});
	
	// $("#vf_file_extension").textfield({
	// 	labelText:"扩展名",
	// });
	// T.formArray.push({"vf_file_extension":"textfield"});	

	// $("#vf_aspect_ratio").textfield({
	// 	labelText:"播放宽纵比",
	// });
	// T.formArray.push({"vf_aspect_ratio":"textfield"});
	
	// $("#vf_file_size").textfield({
	// 	labelText:"文件大小",
	// });
	// T.formArray.push({"vf_file_size":"textfield"});

	// $("#vi_showtime").textfield({
	// 	labelText:"时长",
	// });
	// T.formArray.push({"vi_showtime":"textfield"});
	
	// $("#vi_tvid").textfield({
	// 	labelText:"时长",
	// });
	// T.formArray.push({"vi_tvid":"textfield"});

	// $('#vi_provider').selectfield({
	// 	 labelText:'视频来源',
	// 	 store:data.vi_providerOption
	// })
	// T.formArray.push({'vi_provider':'selectfield'});
	
	// $('#tableSongPic_label').components({
	// 	labelText:'图片'
	// })

    //加载组件数据初始化、事件监听等
    quku_v.mvForm.initElement();

}


quku_v.mvForm.initElement = function() {
    var G = quku_v.global;
   
    //上传按钮绑定事件
    $('.picFile').each(function() {
        if (!$(this).attr('disabled')){
        	//尽量传变量进去，而不是常量$(".sourceBox").index($(this).parents(".sourceBox"))
        	(function(self){
            	PicUploader.registerAjaxUploadListener($(self).attr('id'), 'mv',self);
        	})(this)	
        }
    });
    $(".closeBox").click(function(){
		if(confirm("确定要删除此来源的MV么？")){
		    $(this).parent(".sourceBox").css("display","none").find("#vi_delflag_input").val("1");

		} 
    })
    //联动选择框
/*    $(".sourceBox").each(function(){
    	 $("#vi_provider_items").find("select").bind("change",function(){
			var index = $(this).find("option:selected").index();
			$(this).parents(".sourceBox").siblings().find("#vi_provider_items").find("select").get(0).selectedIndex=index;
    	 })
    })*/

    $('#mi_publishtime_items input').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });

    $('#mi_pre_pubtime_input').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'hh:mm:ss',
        showSecond: true
    });

	$('#mi_publishcompany').textfield('addSuggestion',{
			type: "POST",
			url: G.SUG_URL,
			data: { od_type:1,od_category:G.SUG_OPTION_PUBCOMPANY},
			success: null,
			dataType: "json"
	});


	  $('#mi_proxycompany').textfield('addSuggestion',{
			type: "POST",
		       url: G.SUG_URL,
		       data: { od_type:1,od_category:G.SUG_OPTION_PROXYCOMPANY },
			   success: null,
			   dataType: "json"
	  });

}
$.extend(quku_v.songForm, {

    initLrcInfo: function(jsonLrc) {
        if (!Lrc.oldInnerHTML) Lrc.oldInnerHTML = $('#tableLrc').html();
        //alert(jsonLrc.toString());
        if (jsonLrc && jsonLrc.length > 0) {

            $('#lrcOperation').html('<a href="javascript:void(0)" onclick=Lrc.showLrcDetail(\"' + jsonLrc[0].sl_lrclink + '\")>查看</a>|&nbsp;' + '<a href="' + jsonLrc[0].sl_lrclink + '" target="_blank">下载</a>|<a href="javascript:void(0);" onclick="Lrc.deleteLrcEntity()">删除</a>');
            $('#lrcStatus').html('<span class="red" >已上传</span>');
            $("#lrc_btn_span").hide();
            $("#avatarLrc").attr("disabled", "true");
            $('#lrcSerialized').val(jsonLrc[0].json);
            $('#sl_globalid').val(jsonLrc[0].sl_globalid);
            $('#sl_title').val(jsonLrc[0].sl_title);
        }
    }

})
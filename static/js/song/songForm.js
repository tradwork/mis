var quku_v = window.quku_v || {};
quku_v.songForm = {};

/**
 * 单曲详情页
 * @method displayDom
 * @param
 * @return
 */

 quku_v.songForm.displayPanel = function(data){

     //基本信息组合对象,元素类型为json对象，key是元素id，value是元素组件类型
	 quku_v.songForm.formArray=new quku_v.FormArray();

	 var T = quku_v.songForm;
	 /** 基本信息 **/
	 $('#si_title').textfield({
		 labelText:'单曲名称',
		 isBlank:false
	 })
	 T.formArray.push({'si_title':'textfield'});

	 $('#si_title_id').textfield({
		 labelText:'单曲ID',
		 noWrite: true,
		 readOnly: true
	 })
	 T.formArray.push({'si_title_id':'textfield'});

	 $('#si_cluster_id').textfield({
		 labelText:'蔟ID',
	 })
	 T.formArray.push({'si_cluster_id':'textfield'});
	
	 $('#ci_primary_songid').textfield({
		 labelText:'主歌曲ID',
		 note:'<input id="ci_primary_songid_serialized" style="display:none;">'
	 })
	 T.formArray.push({'ci_primary_songid':'textfield'});	 

	 $('#quku_artist_works_ref').textfield({
		 labelText:'歌手',
		 isBlank:false,
		 note:'<input id="quku_artist_works_ref_serialized" style="display:none;">'
	 })
	 T.formArray.push({'quku_artist_works_ref':'textfield'});

	 $('#si_publishtime').textfield({
		 labelText:'发行时间'
	 })
	 T.formArray.push({'si_publishtime':'textfield'});

	 $('#si_info').textfield({
		 labelText:'描述'
	 })
	 T.formArray.push({'si_info':'textfield'});


	  $('#si_album').textfield({
		 labelText:'专辑名称',
		 readOnly:true
	 })
	 T.formArray.push({'si_album':'textfield'});

	 $('#si_album_id').textfield({
		 labelText:'专辑ID'
	 })
	 T.formArray.push({'si_album_id':'textfield'});


	 $('#si_area').selectfield({
		 labelText:'发行地区',
		 store:data.si_areaOption
	 })
	 T.formArray.push({'si_area':'selectfield'});

	 $('#si_audit_status').radiofield({
		 labelText:'审核信息',
		 store: data.si_audit_statusOption
	 })
	 T.formArray.push({'si_audit_status':'radiofield'});

	 $('#si_audit_info').checkbox({
		 labelText:'失败原因',
		 store: data.si_audit_infoOption
	 })
	 var si_auditArr = data.si_audit_info.split("$@$");
	 var si_auditInfo = document.getElementsByName("si_audit_info[]");

	 for(var i=0;i<si_auditArr.length;i++){
	 	if(i == si_auditArr.length-1){
	 		si_auditInfo[si_auditInfo.length-1].value = si_auditArr[i];
	 	}
	 	else{
	 		for(var j=0;j<si_auditInfo.length;j++){
	 			if(si_auditArr[i] == si_auditInfo[j].value){
	 				si_auditInfo[j].checked = true;
	 				break;
	 			}
	 		}
	 	}
	 }
	 //T.formArray.push({'si_audit_info':'checkbox'});



	 $('#si_language').multiselector({
		 labelText: '语言',
		 height: 110,
		 store: data.si_languageOption
	 })
	 T.formArray.push({'si_language':'multiselector'});


	 $('#si_aliastitle').textfield({
		 labelText:'别名'
	 })
	 T.formArray.push({'si_aliastitle':'textfield'});

	  $('#si_translatename').textfield({
		 labelText:'译名'
	 })
	 T.formArray.push({'si_translatename':'textfield'});

	  $('#si_album_no').textfield({
		 labelText:'歌曲专辑编号'
	 })
	 T.formArray.push({'si_album_no':'textfield'});

	  $('#si_cd_no').textfield({
		 labelText:'光盘序号'
	 })
	 T.formArray.push({'si_cd_no':'textfield'});

	  $('#si_versions').multiselector({
		 labelText:'版本',
		 height: 110,
		 store: data.si_versionsOption

	 })
	 T.formArray.push({'si_versions':'multiselector'});

	  $('#si_license_number').textfield({
		 labelText:'批准文号'
	 })
	 T.formArray.push({'si_license_number':'textfield'});


	 $('#si_styles').multiselector({
		labelText:'风格',
		 height: 110,
		store: data.si_stylesOption

	 })
	 T.formArray.push({'si_styles':'multiselector'});


	 $('#si_yyr_id').textfield({
		 labelText:'音乐人社区歌曲ID',
	 })
	 T.formArray.push({'si_yyr_id':'textfield'});

	 $('#si_duration').textfield({
		 labelText:'时长',
		 note:'（单位：秒）'
	 })
	 T.formArray.push({'si_duration':'textfield'});

	 $('#si_synonym').textfield({
		 labelText:'同义词'
	 })
	 T.formArray.push({'si_synonym':'textfield'});

	 $('#si_pre_pubtime').textfield({
		 labelText:'定时发布时间'
	 })
	 T.formArray.push({'si_pre_pubtime':'textfield'});

	 $('#si_relate_ids').textfield({
		 labelText:'关联歌曲'
	 })
	 T.formArray.push({'si_relate_ids':'textfield'});


	 $('#si_editusernow').textfield({
		 labelText:'锁定人'
	 })
	 T.formArray.push({'si_editusernow':'textfield'});




	 /*$('#si_recording_type').multiselector({
		labelText:'播放下载权',
		 height: 110,
		 store: data.si_recording_typeOption,

	 })
    T.formArray.push({'si_recording_type':'multiselector'});*/



   $('#si_publishcompany').textfield({
		labelText:'发行公司',
		isBlank:false
	})
    T.formArray.push({'si_publishcompany':'textfield'});

	$('#si_proxycompany').textfield({
		labelText:'付费公司',
		isBlank:false

	})
    T.formArray.push({'si_proxycompany':'textfield'});

	$('#si_sub_publishcompany').textfield({
		labelText:'厂牌公司'
	})

    T.formArray.push({'si_sub_publishcompany':'textfield'});

	$('#si_trackid').textfield({
		labelText:'唱片公司trackid号'
	})
    T.formArray.push({'si_trackid':'textfield'});

    /* 版权信息 */

	$('#si_recording_type').checkbox({
		labelText:'录音版权类型',
		store: data.si_recording_typeOption,
		// store: "111,222,333,444"
		checked : data.si_recording_type.split(",")
	})

	/*$('#si_recording_type1').checkbox({
		labelText:'录音版权类型',
		store: data.si_recording_typeOption,
	})*/
    T.formArray.push({'si_recording_type':'checkbox'});

	$('#si_prohibit_type').radiofield({
		labelText:'屏蔽类型',
		store: data.si_prohibit_typeOption,
		isBlank:false,
		note:'<input id="quku_artist_works_ref_serialized" style="display:none;">',
		value: data.si_prohibit_type
	})
    T.formArray.push({'si_prohibit_type':'radiofield'});

	$('#si_isrc').textfield({
		labelText:'ISRC'
	})
    T.formArray.push({'si_isrc':'textfield'});

	$('#si_isrc_flag').selectfield({
		labelText:'ISRC来源',
		store: data.si_isrc_flagOption,

	})
    T.formArray.push({'si_isrc_flag':'selectfield'});

     $("#si_distribution").editgrid({
	 labelText :"多端分发",
	 fields:[{name:"duan"},{name:"0"},{name:"1"},{name:"2"},{name:"3"},{name:"4"},{name:"5"},{name:"6"},{name:"7"},{name:"8"},{name:"9"}],
	 columns:[
	     {
	     	text:'',
	     	type:'label' ,
		 	dataIndex:"duan",
	     	width: 120
	     },
	     {
		 text:'试听',
		 dataIndex: '0',
		 type:'checkbox',
		 width: 80
	     },
	     {
		 text:'下载',
		 dataIndex: '1',
		 type:'checkbox',
		 width: 80
	     },
	     {
		 text:'单曲页',
		 dataIndex: '2',
		 type:'checkbox',
		 width: 80
	     },
	     {
		 text:'推荐列表（新碟、专题、影视歌曲）',
		 dataIndex: '3',
		 type:'checkbox',
		 width: 80
	     },
	     {
		 text:'非推荐列表（榜单、分类标签）',
		 dataIndex: '4',
		 type:'checkbox',
		 width: 80
	     },
	     {
		 text:'检索',
		 dataIndex: '5',
		 type:'checkbox',
		 width: 80
	     },
	     {
		 text:'',
		 dataIndex: '6',
		 type:'hidden',
		 width:1
	     },
	     {
		 text:'',
		 dataIndex: '7',
		 type:'hidden',
		 width:1
	     },
	     {
		 text:'',
		 dataIndex: '8',
		 type:'hidden',
		 width:1
	     },
	     {
		 text:'',
		 dataIndex: '9',
		 type:'hidden',
		 width:1
	     },
	 ],
	    initNewRow: function(){
		for(var i=0;i<10;i++){
	    	    $('.x-editgrid-'+i).checkbox({
	    		store: [{"display":"","value":"0"}],
	    		checked : ["0"],
	    		noLabel:true
	    	    });
		}
	    }
     })
     T.formArray.push({'si_distribution':'editgrid'});


     $('#quku_songs_copyright_writing').editgrid({
		labelText:'词信息',
		fields:[{name:'sc_artist_name'},{name:'sc_company'},{name:'sc_percent'},{name:'sc_id'}],
		initNewRow: function(){
			$('.editgrid_sc_company').suggest({
			     ajaxSettings : {
				  type: "POST",
				  url: quku_v.global.SUG_URL,
				  data: { od_type:1,od_category:quku_v.global.SUG_OPTION_RIGHTCOMPANY },
				  success: null,
				  dataType: "json"
				}
			});
		},
		columns:[
			 {
				text:' 操作',
				type:'operation' ,
				width: 80
			 },
			 {
				text:' 作词',
				dataIndex: 'sc_artist_name',
				type:'text',
				width: 70
			 },
			 {
				text:' 公司',
				dataIndex: 'sc_company',
				type:'text',
				width: 70
			 },
			 {
				text:' 百分比',
				dataIndex: 'sc_percent',
				type:'text',
				width: 70
			 },
			 {
			    text:'',
				dataIndex: 'sc_id',
				type:'hidden',
				width:1
			 }
		 ]
	})
	T.formArray.push({'quku_songs_copyright_writing':'editgrid'});

	$('#quku_songs_copyright_compose').editgrid({
		 labelText:'曲信息',

		 fields:[{name:'sc_artist_name'},{name:'sc_company'},{name:'sc_percent'},{name:'sc_id'}],
		 initNewRow: function(){

			$('.editgrid_sc_company').suggest({
			     ajaxSettings : {
				  type: "POST",
				  url: quku_v.global.SUG_URL,
				  data: { od_type:1,od_category:quku_v.global.SUG_OPTION_RIGHTCOMPANY },
				  success: null,
				  dataType: "json"
				}
			});
		},
		 columns:[
			 {
				text:' 操作',
				type:'operation' ,
				width: 80
			 },
			 {
				text:' 作曲',
				dataIndex: 'sc_artist_name',
				type:'text',
				width: 70
			 },
			 {
				text:' 公司',
				dataIndex: 'sc_company',
				type:'text',
				width: 70
			 },
			 {
				text:' 百分比',
				dataIndex: 'sc_percent',
				type:'text',
				width: 70
			 },
			 {
			    text:'',
				dataIndex: 'sc_id',
				type:'hidden',
				width:1
			 }
		 ]

	})
	 T.formArray.push({'quku_songs_copyright_compose':'editgrid'});

	$('#quku_tag_info_rel').editgrid({
		labelText:'标签信息',
		fields:[{name:'td_name'},{name:'ti_rawweight'},{name:'ti_editflag'},{name:"ti_weight"},{name:'ti_infotype'},{name:'ti_tagid'},{name:'ti_id'},{name:'ti_infoid'},{name:'ti_lastupdatetime'}],
		columns:[
			 {
				text:' 操作',
				type:'operation' ,
				width: 80
			 },
			 {
				text:'标签名',
				dataIndex: 'td_name',
				type:'text',
				width: 70
			 },
			 {
				text:' 标签基础权重(小于5000为一般符合，5000-10000为比较符合，10000-150000为非常符合)',
				dataIndex: 'ti_rawweight',
				type:'text',
				width: 30,
			     defaultValue : 15000,
			 },
		    {
			text:'人工确认',
			dataIndex: 'ti_editflag',
			type:'checkbox',
			width: 50,
			checked : "checked",
		    },
		    {
			text:' 标签符合',
			dataIndex: 'ti_weight',
			type:'hidden',
			width: 30
		    },

		    {
			text:'',
			dataIndex: 'ti_infotype',
			type:'hidden',
			width: 70
		    },
		    {
			text:'',
			dataIndex: 'ti_tagid',
			type:'hidden',
			width: 70
		    },

		    {
			text:'',
			dataIndex: 'ti_id',
			type:'hidden',
			width: 70
		    },

		    {
			text:'',
			dataIndex: 'ti_infoid',
			type:'hidden',
			width: 70
		    },
		    {
			text:'',
			dataIndex: 'ti_lastupdatetime',
			type:'hidden',
			width: 70
		    }
		],
	    initNewRow: function(){
	    	$('.x-editgrid-ti_editflag').checkbox({
	    	    store: [{"display":"","value":"1"}],
		    // store: "111,222,333,444"
		    checked : [1],
		    noLabel:true
	    	});

		$('.editgrid_td_name').suggest({
		    ajaxSettings : {
			type: "POST",
			url: quku_v.global.TAG_SUG,
			data: {},
			success: null,
			dataType: "json"
		    }
		});
	    }
	})
	T.formArray.push({'quku_tag_info_rel':'editgrid'});

	$('#quku_tag_info_rel1').editgrid({
	    labelText:'曲风信息',
	    fields:[{name:'ti_tagid'},{name:'ti_rawweight'},{name:'ti_tagid_1'},{name:'ti_rawweight_1'},{name:"ti_editflag_1"},{name:"ti_weight"},{name:"ti_weight_1"}],
	    columns:[
		{
		    text:' 操作',
		    type:'operation' ,
		    width: 80,
		},
		{
		    text:'一级曲风',
		    dataIndex: 'ti_tagid',
		    type:'selectfield',
		    width: 50,
		},
		{
		    text:'标签基础权重',
		    dataIndex: 'ti_rawweight',
		    type:'text',
		    width: 50,
		    defaultValue : 15000,
		},


		{
		    text:' 二级曲风',
		    dataIndex: 'ti_tagid_1',
		    type:'selectfield',
		    width: 50,

		},
		{
		    text:'标签基础权重',
		    dataIndex: 'ti_rawweight_1',
		    type:'text',
		    width: 50,
		    defaultValue : 15000,
		},

		{
		    text:'人工确认',
		    dataIndex: 'ti_editflag_1',
		    type:'checkbox',
		    width: 50,
		    // checked : "checked",
		},
		{
		    text:'',
		    dataIndex: 'ti_weight',
		    type:'hidden',
		    width: 50,
		},

		{
		    text:'',
		    dataIndex: 'ti_weight_1',
		    type:'hidden',
		    width: 50,
		},

	    ],

	    initNewRow: function(){
	    	$('.x-editgrid-ti_tagid').selectfield({
	    	    noLabel: true,
	    	    store: data.si_tag_relOption,
	    	    // store: [{"display":"2","value":"2"}],
	    	    value: '',
		    blankValue:true,
	    	    noWrite: true
	    	}),
		tagid_store = []
		for (i in data.si_tag_relOption){
		    for(j in data["tag_"+data.si_tag_relOption[i]["value"]]){
			tagid_store.push(data["tag_"+data.si_tag_relOption[i]["value"]][j])
		    }
		}

	    	$('.x-editgrid-ti_tagid_1').selectfield({
	    	    noLabel: true,
	    	    store: tagid_store,
		    // store: data["tag_"+$('.x-editgrid-ti_tagid').selectfield('getValue')],
	    	    // store: [{"display":"2","value":"2"}],
	    	    value: '',
		    blankValue:true,
	    	    noWrite: true
	    	}),
	    	$('.x-editgrid-ti_editflag_1').checkbox({
	    	    store: [{"display":"","value":"1"}],
		    // store: "111,222,333,444"
		    checked : [1],
		    noLabel:true
	    	}),
		//动态创建 
		$('.x-editgrid-ti_tagid').bind('change', function(event){
		    var st_fieldsId = this.id.replace('_ti_tagid','_ti_tagid_1');
			//如果没有子对象
		    var targ= 'tag_'+$(this).selectfield('getValue');
		    if(data[targ]==undefined){
				$('#'+st_fieldsId).selectfield('loadData', []);
		    }
		    $('#'+st_fieldsId).selectfield('loadData', data["tag_"+$(this).selectfield('getValue')], true);
		});
	    },
	})

	T.formArray.push({'quku_tag_info_rel1':'editgrid'});


	$('#tableSongPic_label').components({
		labelText:'图片'
	})

	$('#tableAudio_label').components({
		labelText:'音频'
	})

	 $('#sl_lyrics_label').components({
	    labelText:'歌词'
	});

	 //加载组件数据初始化、事件监听等
	 quku_v.songForm.initElement();


}

quku_v.songForm.initElement = function(){
	 var G = quku_v.global;

	 $('#si_pre_pubtime_input').datetimepicker({
				dateFormat:'yy-mm-dd',
				timeFormat: 'hh:mm:ss',
				showSecond: true
	 });

	$(".avatarLrc").each(function(){
		if(!$(this).attr('disabled')){
			LrcUploader.registerAjaxUploadListener('avatarLrc');
		}	 	
	})
	//LrcUploader.registerAjaxUploadListener('avatarLrc');

	 //上传按钮绑定事件
	 $('.picFile').each(function(){
		 if(!$(this).attr('disabled')){
			PicUploader.registerAjaxUploadListener($(this).attr('id'),'artist');
		}
	 });

	 $('#si_publishtime_items input').datepicker({ changeMonth: true,
			changeYear: true,
			dateFormat:'yy-mm-dd'
      });


	 /*add rochappy*/
	 $("#si_prohibit_type_items input").bind("click" , function(){
	 	var v = $(this).val();

 		// $("#si_recordingcopyright_type_items input").attr("checked" , false)

	 	if (v == 2){
	 		$("#si_recording_type_items input")[1].checked = false;
	 	}else{
	 		$("#si_recording_type_items input")[1].checked = true;
 		}
	     if (v == 0){
		 $("#si_distribution_items :checkbox").each(function(){$(this).prop("checked","checked")})
	     }

	 });
	 /*end*/


	 $('#si_publishcompany').textfield('addSuggestion',{
			type: "POST",
			url: G.SUG_URL,
			data: { od_type:1,od_category:G.SUG_OPTION_PUBCOMPANY},
			success: null,
			dataType: "json"
	  });
	  $('#si_proxycompany').textfield('addSuggestion',{
			type: "POST",
		       url: G.SUG_URL,
		       data: { od_type:1,od_category:G.SUG_OPTION_PROXYCOMPANY },
			   success: null,
			   dataType: "json"
	  });
	   $('#si_sub_publishcompany').textfield('addSuggestion',{
			 type: "POST",
				 url: G.SUG_URL,
				 data: { od_type:1,od_category:G.SUG_OPTION_SUBCOMPANY },
				 success: null,
				 dataType: "json"
	  });
	  var newArr = [], newObj = {};

	  for(var i=0;i< quku_v.song.data.quku_cluster_infoOption.length;i++){
	  	newObj[quku_v.song.data.quku_cluster_infoOption[i]['display']] = quku_v.song.data.quku_cluster_infoOption[i]['value']
	  }
	  $("#ci_primary_songid_serialized").val(JSON.stringify(newObj))
	  $("#ci_primary_songid_input").bind("blur",function(){
	  	 newObj.ci_primary_songid=$("#ci_primary_songid_input").val();
	  	 $("#ci_primary_songid_serialized").val(JSON.stringify(newObj))
	  })

}



$.extend(quku_v.songForm, {

	initLrcInfo: function(jsonLrc) {
		if(!Lrc.oldInnerHTML)
				Lrc.oldInnerHTML = $('#tableLrc').html();
	  if( jsonLrc && jsonLrc.length > 0){

		$('#lrcOperation').html('<a href="javascript:void(0)" onclick=Lrc.showLrcDetail(\"'+jsonLrc[0].sl_lrclink+'\")>查看</a>|&nbsp;'+'<a href="'+jsonLrc[0].sl_lrclink+'" target="_blank">下载</a>|<a href="javascript:void(0);" onclick="Lrc.deleteLrcEntity()">删除</a>');
		$('#lrcStatus').html('<span class="red" >已上传</span>');
		$("#lrc_btn_span").hide();
		$("#avatarLrc").attr("disabled","true");
		$('#lrcSerialized').val(jsonLrc[0].json);
		$('#sl_globalid').val(jsonLrc[0].sl_globalid) ;
		$('#sl_title').val(jsonLrc[0].sl_title) ;
		//$('#lrcJsonData').val(jsonLrc[0].json) ;
	  }
	}

})





var quku_v = window.quku_v || {};
quku_v.albumForm = {};

/**
 * 单曲详情页
 * @method displayDom
 * @param
 * @return
 */
 
 quku_v.albumForm.displayPanel = function(data){
     //基本信息组合对象,元素类型为json对象，key是元素id，value是元素组件类型
	 quku_v.albumForm.formArray=new quku_v.FormArray();
	 
	 var T = quku_v.albumForm;
	 
	 /** 基本信息 **/	
	 $('#ai_album').textfield({
		 labelText:'专辑名',
		 isBlank:false
	 })
	 T.formArray.push({'ai_album':'textfield'});
	 
	 $('#ai_album_id').textfield({
		 labelText:'专辑ID',
		 noWrite: true,
		 readOnly: true
	 })
	 T.formArray.push({'ai_album_id':'textfield'});

	 $('#ai_brief_info').textfield({
		 labelText:'专辑短简介',
	 })
	 T.formArray.push({'ai_brief_info':'textfield'});
	 
	  $('#ai_publishtime').textfield({
		 labelText:'发行时间'
	 })
	 T.formArray.push({'ai_publishtime':'textfield'});
	 
	 
	 $('#quku_artist_works_ref').textfield({
		 labelText:'歌手',
		 isBlank:false,
		 note:'<input id="quku_artist_works_ref_serialized" style="display:none;">'
	 })
	 T.formArray.push({'quku_artist_works_ref':'textfield'});
	 
	$('#ai_publishcompany').textfield({
		labelText:'发行公司',
		 isBlank:false,
	})
    T.formArray.push({'ai_publishcompany':'textfield'}); 	
	
	
	$('#ai_sub_publishcompany').textfield({
		labelText:'厂牌公司'
	})
	 T.formArray.push({'ai_sub_publishcompany':'textfield'});
	
	 $('#ai_editusernow').textfield({
		 labelText:'锁定人'
	 })
	 T.formArray.push({'ai_editusernow':'textfield'});
	 
	  $('#ai_source').selectfield({
		 labelText:'来源',
		 store: data.ai_sourceOption,
		 value: 1,
		 noWrite: true,
		 readOnly: true
	 })
	 T.formArray.push({'ai_source':'selectfield'});

	$('#ai_version').radiofield({
		 labelText:'版本',
		 store: data.ai_versionOption,
		 value: 0
	 })
	 T.formArray.push({'ai_version':'radiofield'});
	 
	 
	 $('#ai_area').radiofield({
		 labelText:'发行地区',
		  isBlank:false,
		 store: data.ai_areaOption
	 })
	 T.formArray.push({'ai_area':'radiofield'});

	 $('#ai_audit_status').radiofield({
		 labelText:'审核信息',
		 store: data.ai_audit_statusOption
	 })
	 T.formArray.push({'ai_audit_status':'radiofield'});

	 $('#ai_audit_info').checkbox({
		 labelText:'失败原因',
		 store: data.ai_audit_infoOption
	 })
	 var ai_auditArr = data.ai_audit_info.split("$@$");
	 var ai_auditInfo = document.getElementsByName("ai_audit_info[]");

	 for(var i=0;i<ai_auditArr.length;i++){
	 	if(i == ai_auditArr.length-1){
	 		ai_auditInfo[ai_auditInfo.length-1].value = ai_auditArr[i];
	 	}
	 	else{
	 		for(var j=0;j<ai_auditInfo.length;j++){
	 			if(ai_auditArr[i] == ai_auditInfo[j].value){
	 				ai_auditInfo[j].checked = true;
	 				break;
	 			}
	 		}
	 	}
	 }
	 //T.formArray.push({'ai_audit_info':'checkbox'});


	 $('#ai_styles').multiselector({
		 labelText: '风格',
		 height: 110,
		 store: data.ai_stylesOption
	 })
	 T.formArray.push({'ai_styles':'multiselector'});
	 
	 $('#ai_language').multiselector({
		 labelText: '语言',
		 height: 110,
		 store: data.ai_languageOption
	 })
	 T.formArray.push({'ai_language':'multiselector'});

	 
	 $('#ai_aliasalbum').textfield({
		 labelText:'别名'
	 })
	 T.formArray.push({'ai_aliasalbum':'textfield'});
	 
	  $('#ai_translatename').textfield({
		 labelText:'译名'
	 })
	 T.formArray.push({'ai_translatename':'textfield'});
	 
	  $('#ai_synonym').textfield({
		 labelText:'同义词'
	 })
	 T.formArray.push({'ai_synonym':'textfield'});
	 
	  $('#ai_songs_total').textfield({
		 labelText:'单曲总数'
	 })
	 T.formArray.push({'ai_songs_total':'textfield'});
	 
	  $('#ai_productid').textfield({
		 labelText:'产品号'
	 })
	 T.formArray.push({'ai_productid':'textfield'});
	 
	  $('#ai_productid_flag').selectfield({
		 labelText:'产品号来源',
		 store: data.ai_productid_flagOption
	 })
	 T.formArray.push({'ai_productid_flag':'selectfield'});
	 
	  $('#ai_duration').textfield({
		 labelText:'专辑时长',
		 note: '（单位：秒）'
		
	 })
	 T.formArray.push({'ai_duration':'textfield'});
	 
	 $('#quku_pic_label').components({
		 labelText:'专辑海报',
		  isBlank:false
		
	 })
	 $('#ai_info').textarea({
		 labelText:'专辑介绍',
		 width: '70%'
		
	 })
	
   
    T.formArray.push({'ai_info':'textarea'}); 	
	
	$('#quku_tag_info_rel').editgrid({
		labelText:'标签信息',
		fields:[{name:'td_name'},{name:'ti_weight'},{name:'ti_tagid'},{name:'ti_id'},{name:'ti_infoid'},{name:'ti_infotype'},{name:'ti_lastupdatetime'}],		
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
				text:' 标签权重',
				dataIndex: 'ti_weight',
				type:'text',
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
				dataIndex: 'ti_tagid',
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
				dataIndex: 'ti_infotype',
				type:'hidden',
				width: 70
			 },
			 {
				text:'',
				dataIndex: 'ti_lastupdatetime',
				type:'hidden',
				width: 70
			 }
		 ]
	})
	T.formArray.push({'quku_tag_info_rel':'editgrid'});
	
	// 授权书
	$('#ai_authorisation_url').imglink({
		 labelText:'授权书',		
	 })
	T.formArray.push({'ai_authorisation_url':'imglink'});
	
	 //加载组件数据初始化、事件监听等
	 quku_v.albumForm.initElement();
	
}

quku_v.albumForm.initElement = function(){
	 var G = quku_v.global;
	 
	 //上传按钮绑定事件
	 $('.picFile').each(function(){
		 if(!$(this).attr('disabled')){
			PicUploader.registerAjaxUploadListener($(this).attr('id'),'artist');
		}
	 });
	 
    $('#si_selectAll').bind('click',function(){
   	  
   	   	$('#tableSong').find('input[type="checkbox"]').prop('checked',$(this).prop('checked'));
   	  
    })
	//$("#ai_audit_info").find("input").length)
	 $('#ai_publishtime_items input').datepicker({ changeMonth: true,
			changeYear: true,
			dateFormat:'yy-mm-dd'
      });
	  
	
	 
	 $('#ai_publishcompany').textfield('addSuggestion',{
			type: "POST",   				       
			url: G.SUG_URL,					
			data: { od_type:1,od_category:G.SUG_OPTION_PUBCOMPANY },
			success: null,
			dataType: "json"  
	  });
	
	   $('#ai_sub_publishcompany').textfield('addSuggestion',{
			 type: "POST",
				 url: G.SUG_URL,
				 data: { od_type:1,od_category:G.SUG_OPTION_SUBCOMPANY },
				 success: null,
				 dataType: "json" 
	  });
	
	
	
	 
} 

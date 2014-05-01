var quku_v = window.quku_v || {};
quku_v.artist = {};

 /**
 * 显示歌手详情展示页面
 * @method displayDom
 * @param
 * @return
 */
quku_v.artist.displayPanel = function(data){
     //基本信息组合对象,元素类型为json对象，key是元素id，value是元素组件类型
	 quku_v.artist.formArray=new quku_v.FormArray();
	 
	 var T = quku_v.artist;
	 $('#ab_name').textfield({
		 labelText:'姓名',
		 isBlank:false,
		 events:[ { 'change': function(){
		                 $('#ab_unique_name').textfield( 'setValue', $('#ab_name').textfield('getValue') );
               		 }
				   }
				]
	 })
	 T.formArray.push({'ab_name':'textfield'});

	 $('#ab_name_id').textfield({
		 labelText:'明星ID',
		 noWrite: true,
		 readOnly: true
	 })
	 T.formArray.push({'ab_name_id':'textfield'});
	 
	 $('#ab_gender').radiofield({
		 labelText:'性别',	 
		 isBlank: false,
		 store: data.ab_genderOption
	 })
	 T.formArray.push({'ab_gender':'radiofield'});

	 $('#ab_career').multiselector({
		 labelText: '职业',
		 height: 110,
		 isBlank: false,
		 store: data.ab_careerOption
	 })
	 T.formArray.push({'ab_career':'multiselector'});

	 $('#ab_unique_name').textfield({
		 labelText:'唯一名',
		 isBlank: false
	 })
	 T.formArray.push({'ab_unique_name':'textfield'});

	 $('#ab_country').textfield({
		labelText:'国家'
	 })
	 T.formArray.push({'ab_country':'textfield'});

	 $('#ab_area').radiofield({
		 labelText:'地区',
		 isBlank: false,
		 store: data.ab_aareaOption
	 })
	 T.formArray.push({'ab_area':'radiofield'});

	 $('#quku_pic_label').components({
		 labelText:'明星图片'
	 })
	// T.formArray.push({'quku_pic_label':'components'});

	 $('#ab_info').textarea({
		 labelText:'明星介绍',
		 width: '70%'
	 })
	 T.formArray.push({'ab_info':'textarea'});

	 //详细信息
	 $('#ab_aliasname').textfield({
		 labelText:'别名'
	 })
	 T.formArray.push({'ab_aliasname':'textfield'});

	 $('#ab_translatename').textfield({
		 labelText:'译名'
	 })
	 T.formArray.push({'ab_translatename':'textfield'});

	 $('#ab_birthday').textfield({
		labelText:'生日'
	 })
	 T.formArray.push({'ab_birthday':'textfield'});

	 $('#ab_constellation').selectfield({
		 labelText: '星座',
		 store: data.ab_constellationOption,
		 blankValue:true,
		 value: 0
	 })
	 T.formArray.push({'ab_constellation':'selectfield'});

	 $('#ab_stature').textfield({
		labelText:'身高',
		note:'CM'
	 })
	 T.formArray.push({'ab_stature':'textfield'});

	 $('#ab_weight').textfield({
		labelText:'体重',
		note:'KG'
	 })
	 T.formArray.push({'ab_weight':'textfield'});

	 $('#ab_relatestars').textfield({
		labelText:'相关明星',
		note: '(多个明星用，分隔)'
	 })
	 T.formArray.push({'ab_relatestars':'textfield'});

	 $('#ab_bloodtype').radiofield({
		 labelText:'血型',
		 store: data.ab_bloodtypeOption,
		 value:0
	 })
	 T.formArray.push({'ab_bloodtype':'radiofield'});

	 $('#ab_company').textfield({
		labelText:'所属企业'
	 })
	 T.formArray.push({'ab_company':'textfield'});

	 $('#ab_synonym').textfield({
		labelText:'同义词',
		note :'(多个同义词用，分隔)'
	 })
	 T.formArray.push({'ab_synonym':'textfield'});
     
	 $('#ab_editusernow').textfield({
		 labelText:'锁定人'
	 })
	 T.formArray.push({'ab_editusernow':'textfield'});
	 
	 $('#ab_yyr_id').textfield({
		 labelText:'音乐人社区歌手id'
	 })
	 T.formArray.push({'ab_yyr_id':'textfield'});

     $('#quku_relatively_links').editgrid({
		labelText:'相关链接',
		fields:[{name:'rl_keyword'},{name:'rl_urllink'},{name:'rl_id'}],		
		columns:[
			 {
				text:' 操作',
				type:'operation' ,
				width: 80
			 },
			 {
				text:' 链接标题',
				dataIndex: 'rl_keyword',
				type:'text',
				width: 70
			 },
			 {
				text:' 链接地址',
				dataIndex: 'rl_urllink',
				type:'text',
				width: 70
			 },
			 {
				text:'',
				dataIndex: 'rl_id',
				type:'hidden',
				width: 70
			 }
		 ]
	})
	T.formArray.push({'quku_relatively_links':'editgrid'});
	
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
	 
	 //加载组件数据初始化、事件监听等
	 quku_v.artist.initElement();
	
}

quku_v.artist.initElement = function(){
	 var G = quku_v.global;
	 //上传按钮绑定事件
	 $('.picFile').each(function(){
		 if(!$(this).attr('disabled')){
			PicUploader.registerAjaxUploadListener($(this).attr('id'),'artist');
		}
	 });
	 //添加国家suggestion
	 $('#ab_country').textfield('addSuggestion',{
		 type: "POST",
		 url: G.SUG_URL,
		 data: { od_type:3,od_category:G.SUG_OPTION_COUNTRY },
		 success: null,
		 dataType: "json" 
	  });
	 
	 $('#ab_birthday_items input').datepicker({ changeMonth: true,
			changeYear: true,
			dateFormat:'yy-mm-dd'
      });
	 
} 
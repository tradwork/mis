var quku_v = window.quku_v || {};
quku_v.showForm = {};

/**
 * 单曲详情页
 * @method displayDom
 * @param
 * @return
 */
 
 quku_v.showForm.displayPanel = function(data){
     //基本信息组合对象,元素类型为json对象，key是元素id，value是元素组件类型
	 quku_v.showForm.formArray=new quku_v.FormArray();
	 
	 var T = quku_v.showForm;
	 /** 基本信息 **/
	 $('#sn_title').textfield({
		 labelText:'主题',
		 isBlank:false,
		 cssStyle:'width: 580px;',
		 width: '500'
	 })
	 T.formArray.push({'sn_title':'textfield'});
	 
	 $('#quku_artist_works_ref').textfield({
		 labelText:'明星',
		 note:'<input id="quku_artist_works_ref_serialized" style="display:none;">(多明星用，号分隔)'
	 })
	 T.formArray.push({'quku_artist_works_ref':'textfield'});
	 
	 $('#sn_city').selectfield({
		 labelText:'城市',
		 isBlank:false,
		 blankValue: true,
		 store:data.sn_cityOption
	 })
	 T.formArray.push({'sn_city':'selectfield'});
	 
	 $('#sn_venue').textfield({
		 labelText:'场馆',
		 isBlank:false
	 })
	 T.formArray.push({'sn_venue':'textfield'});
	 
	 
	
	 T.formArray.push({'sn_detailtime':'textfield'});

	 $('#sn_category').selectfield({
		 labelText:'类别',
		 isBlank:false,
		 blankValue: true,
		 store: data.sn_categoryOption
	 })
	 T.formArray.push({'sn_category':'selectfield'});

	 
	 $('#tableSongPic_label').components({
		 labelText:'演出海报',
		 isBlank:false
	 })
	  

	 $('#sn_info').textarea({
		 labelText: '演出介绍',
		 isBlank:false,
		 width: '70%',
		 height: '50%'
	 })
	 T.formArray.push({'sn_info':'textarea'});

	 
	 $('#sn_price').textfield({
		 labelText:'票价'
	 })
	 T.formArray.push({'sn_price':'textfield'});
	
	$('#sn_editusernow').textfield({
		 labelText:'锁定人'
	 })
	 T.formArray.push({'sn_editusernow':'textfield'});
	
	  $('#sn_detailtime').editgrid({
		 labelText:'演出时间',
		 isBlank:false,
		 fields:[{name:'sn_detailtime'}],	
         getValue: function(){
		      var items = $('input[name="sn_detailtime[]"]'), ret = [];
			  for(var i = 0, len = items.length; i < len; i++){
					if( $.trim( $(items[i]).val() ) != '' )
					           ret.push( $(items[i]).val() );
			  }
			  
		      return ret.join('$@$') ;
		 },		 
		 initNewRow: function(){
		     $('.editgrid_sn_detailtime').datetimepicker({
				dateFormat:'yy-mm-dd'
			 });
		 },
		 columns:[
			 {
				text:' 操作',
				type:'operation' ,
				width: 80
			 },
			 {
				text:' 时间',
				dataIndex: 'sn_detailtime',
				type:'text',
				width: 70
			 }
		 ]
	 })
	T.formArray.push({'sn_detailtime':'editgrid'});
	
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
	

	 //加载组件数据初始化、事件监听等
	 quku_v.showForm.initElement();
	
}

quku_v.showForm.initElement = function(){
	 var G = quku_v.global;
	
	 //上传按钮绑定事件
	 /*
	 $('.picFile').each(function(){
		 if(!$(this).attr('disabled')){
			PicUploader.registerAjaxUploadListener($(this).attr('id'), 'artist');
		}
	 });
	 
*/
} 
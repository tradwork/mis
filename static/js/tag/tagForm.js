var quku_v = window.quku_v || {};
quku_v.tag = {};

 /**
 * 显示标签展示页面
 * @method displayDom
 * @param
 * @return
 */
quku_v.tag.displayPanel = function(data){
     //基本信息组合对象,元素类型为json对象，key是元素id，value是元素组件类型
	 quku_v.tag.formArray=new quku_v.FormArray();
	 
	 var T = quku_v.tag;
	 $('#td_name').textfield({
		 labelText:'标签名',
		 isBlank:false
	 })
	 T.formArray.push({'td_name':'textfield'});
	 
	 $('#td_tagid').textfield({
		 labelText:'标签ID',
		 isBlank: true,
		 readOnly: true
		 
	 })

         T.formArray.push({'td_tagid':'textfield'});
	 $('#td_parentid').textfield({
		 labelText:'标签父ID',
		 isBlank: true,
	 })
         T.formArray.push({'td_parentid':'textfield'});
	 
	 $('#td_level').selectfield({
		 labelText:'标签级别',
		 isBlank:false,
		 blankValue:true,
		 store:data.td_levelOption
	 })
	 T.formArray.push({'td_level':'selectfield'});
	 
	 $('#td_category').selectfield({
		 labelText:'标签分类',
		 isBlank:false,
		 blankValue:true,
		 store:data.td_categoryOption
	 })
	 T.formArray.push({'td_category':'selectfield'});

	
	 $('#quku_tag_syn').editgrid({
		labelText:'相关同义词',
		fields:[{name:'ts_word'},{name:'ts_id'},{name:'ts_tagid'}],		
		columns:[
			 {
				text:' 操作',
				type:'operation' ,
				width: 80
			 },
			 {
				text:' 同义词',
				dataIndex: 'ts_word',
				type:'text',
				width: 100
			 },
			  {
				text:' ',
				dataIndex: 'ts_id',
				type:'hidden',
				width: 100
			 },
			  {
				text:' ',
				dataIndex: 'ts_tagid',
				type:'hidden',
				width: 100
			 }
		 ]
	})
	T.formArray.push({'quku_tag_syn':'editgrid'});
	 //加载组件数据初始化、事件监听等
	 quku_v.tag.initElement();
	
}

quku_v.tag.initElement = function(){
	 var G = quku_v.global;
/*	
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
*/	 
} 

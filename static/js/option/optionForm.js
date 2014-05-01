var quku_v = window.quku_v || {};
quku_v.optionForm = {};

quku_v.optionForm.displayPanel = function(data){
     //基本信息组合对象,元素类型为json对象，key是元素id，value是元素组件类型
	 quku_v.optionForm.formArray=new quku_v.FormArray();
	 var T = quku_v.optionForm;
	 
	 /** 基本信息 **/
	 $('#od_word').textfield({
		 labelText:'单词',
		 isBlank:false
	 })
	 T.formArray.push({'od_word':'textfield'});
	 
	  $('#od_spell_code').textfield({
		 labelText:'拼音',
		 isBlank:false
	 })
	 T.formArray.push({'od_spell_code':'textfield'});
	 
	  $('#od_category').selectfield({
		 labelText:'配置类型',
		 isBlank:false,
		 blankValue:true,
		 store: data.od_categoryOption
	 })
	 T.formArray.push({'od_category':'selectfield'});
	 
	  $('#od_type').selectfield({
		 labelText:'信息类型',
		 isBlank:false,
		 blankValue:true,
		 store: data.od_typeOption
	 })
	 T.formArray.push({'od_type':'selectfield'});
	 
	  $('#od_remark').textfield({
		 labelText:'备注'
	 })
	  T.formArray.push({'od_remark':'textfield'});
	 quku_v.optionForm.initElements();
	 
}
quku_v.optionForm.initElements = function(){
		$('#od_word').keyup(function(){
				var word = $.trim($('#od_word').textfield('getValue'));
				  jQuery.get(
							'index.php?c=option&m=convert&or_word='+encodeURIComponent(word),
							"",
							function(sData){
							    sData = $.parseJSON(sData);
								$('#od_spell_code').textfield( 'setValue',sData.data.replace(/(\x0A|\uFEFF)/g,"") );
							},'text'
						);		
			});
	}
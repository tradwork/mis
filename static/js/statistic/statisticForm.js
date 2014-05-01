var quku_v = window.quku_v || {};
quku_v.statisticForm = {};

/**
 * 单曲详情页
 * @method displayDom
 * @param
 * @return
 */
 
 quku_v.statisticForm.displayPanel = function(data){
     //基本信息组合对象,元素类型为json对象，key是元素id，value是元素组件类型
	 quku_v.statisticForm.formArray=new quku_v.FormArray();
	 
	 var T = quku_v.statisticForm;
	 
	//任务类型
	$('#tasktype').radiofield({
	     labelText:'操作类型',
		 isBlank: false,
		 store: data.st_taskOption,
		 value:"db"
	});
	T.formArray.push({'tasktype':'radiofield'});

	 /** 基本信息 **/	
	 $('#maillist_v').textfield({
		 labelText:'统计接收邮箱列表',
		 isBlank:false
	 })
	 T.formArray.push({'maillist_v':'textfield'});
	 
	//专辑、歌手、歌曲
	$('#main_tables').radiofield({
	     labelText:'查询对象',	 
		 isBlank: false,
		 store: data.main_tablesOption,
		 value:'quku_songs_info'
	});
	T.formArray.push({'main_tables':'radiofield'});

	//副表
	$('#relation_table').checkbox({
		labelText:'关系表',
		store: data.quku_songs_info_Option,
		checked : 0
	});
	T.formArray.push({'relation_table':'checkbox'});


	$('#tasktype').bind('change', function(event){
		if($(this).radiofield("getValue") == "title"){
		    $(".prohibitContent").removeClass('hide').addClass('show');
		    $(".updateData").removeClass('show').addClass('hide');
		    $(".autoContent").removeClass('show').addClass('hide');
		}else if($(this).radiofield("getValue") == "fpid"){
		    $(".prohibitContent").removeClass('show').addClass('hide');
		    $(".autoContent").removeClass('hide').addClass('show');
		    $(".updateData").removeClass('show').addClass('hide');
		}else{
		    $(".updateData").removeClass('hide').addClass('show');
		    $(".prohibitContent").removeClass('show').addClass('hide');
		    $(".autoContent").removeClass('show').addClass('hide');
		    $('.x-editgrid-key').selectfield('loadData', data.main_tablesOption);
		}
	});


	//动态创建，单曲表，专辑表
	$('#main_tables').bind('change', function(event){
	    if($(this).radiofield('getValue') == ''){
			$('#'+st_fieldsId).selectfield('loadData', []);
	    }
	    if($("#tasktype").radiofield('getValue') == "replace"){
			$('.x-editgrid-key').selectfield('loadData', data["replace_"+$(this).radiofield('getValue')], true);
	    }else{
			var str = "";
			var template = '<input type="checkbox" value="{0}" name="relation_table[]" class="x-component-input">{1}';
			var name = $(this).radiofield('getValue');

			var obj = data.relations_table[name];
			for(var k = 0;k < obj.length;k++){
				str += String.format(template,obj[k]['value'],obj[k]["display"]);
			}
			var key = String($(this).radiofield('getValue'))+"Option";
			$("#relation_table_items").html(str);
			$('#fields_v').multiselector('loadData', data[$(this).radiofield('getValue')], true);
			//$('.x-editgrid-key').selectfield('loadData', data[key], true);
		}
	});

	$('#relation_table input[type="checkbox"]').live("click",function(){
		var table_name = $(this).val();
		var main_table = $("#main_tables input:checked").val();		
		//勾选，增加关系表
		if($(this)[0].checked){
	
			for(var key = 0;key < (data[main_table][table_name].length);key++){
				data[main_table].push(data[main_table][table_name][key]);
			}

			$('#fields_v').multiselector('loadData', data[main_table], true);
			//$('.x-editgrid-key').selectfield('loadData', data[main_table], true);
			if(data[main_table][0]["display"]==""){
				data[main_table].shift();
			}
		}
		else{
			for(var key = 0;key < data[main_table][table_name].length;key++){
				data[main_table].pop(data[main_table][table_name][key]);
			}
			$('#fields_v').multiselector('loadData', data[main_table], true);
			//$('.x-editgrid-key').selectfield('loadData', data[main_table], true);
			if(data[main_table][0]["display"]==""){
				data[main_table].shift();
			}
		}
	})

	 $('#fields_v').multiselector({
		 labelText: '展示字段', 
		 height: 250,
		 store: data.quku_songs_infoOption
	 })
	 T.formArray.push({'fields_v':'multiselector'});
	var option = {
		labelText:'条件信息',
		
		fields:[{name:'table',noReturn:true},{name:'key'},{name:'symbol'},{name:'value'}],	
	    returnType:'conditions',
		columns:[
			 {
				text:' 操作',
				type:'operation'
			 },		 
			 {
				text:' 字段',
				dataIndex: 'key',
				type:'selectfield'
			 },
			 {
				text:'符号',
				dataIndex: 'symbol',
				type:'selectfield'
			 },
			 {
				text:'值',
				dataIndex: 'value',
				type:'text'
			 }
		 ],
		 initNewRow: function(){
			 $('.x-editgrid-operation').css('width','80px') ;
			 
		     $('.x-editgrid-symbol').selectfield({
				 //labelText:'符号',
				 noLabel: true,
				 blankValue: true,
				 store: data.st_symbolsOption,
				 noWrite: true
			 });
			//原来的当前选项
			var main_table = $("#main_tables input:checked").val();
			$('.x-editgrid-key').selectfield({
				//labelText:'字段',
				 noLabel: true,
				 blankValue: true,
				 store: data[main_table],
				 noWrite: true
			});
			//store: data.quku_albums_infoOption,换一个约定变量，新增条件可以随时变换
			//父级表表的change不影响select选项，只改变相关array，获取焦点时加载

			$(".x-editgrid-key select").bind('focus', function(event){
				//当前的main_table和 
				//点击时的当前  选项
				var main_table = $("#main_tables input:checked").val();
				//rel_table;

				//获得当前数组；重新组数组
				console.log(data[main_table]);
				$(this).parents(".x-editgrid-key").selectfield('loadData', data[main_table], true);
			});

			//动态创建 
			$('.x-editgrid-table').bind('change', function(event){
			    var st_fieldsId = this.id.replace('_table_','_key_');	
			    if($(this).selectfield('getValue') == ''){
				    $('#'+st_fieldsId).selectfield('loadData', []);
				}
				$('#'+st_fieldsId).selectfield('loadData', data[$(this).selectfield('getValue')], true);
			});
			 
		 }//initNewRow
	} ;	
	
	function clone(obj){
	   var ret = {};
	   for(var key in obj){
	      ret[key] = obj[key];
	   }
	   return ret;
	}
	$('#conditions_v_1').editgrid( $.extend(clone(option), {labelText:'条件1'}) );
	$('#conditions_v_2').editgrid( $.extend(clone(option), {labelText:'条件2'}) );
	$('#conditions_v_3').editgrid( $.extend(clone(option), {labelText:'条件3'}) );
	$('#conditions_v_4').editgrid( $.extend(clone(option), {labelText:'条件4'}) );
	$('#conditions_v_5').editgrid( $.extend(clone(option), {labelText:'条件5'}) );
	$('#conditions_v_6').editgrid( $.extend(clone(option), {labelText:'条件6'}) );
	$('#conditions_v_7').editgrid( $.extend(clone(option), {labelText:'条件7'}) );
	$('#conditions_v_8').editgrid( $.extend(clone(option), {labelText:'条件8'}) );
	$('#conditions_v_9').editgrid( $.extend(clone(option), {labelText:'条件9'}) );
	$('#conditions_v_10').editgrid( $.extend(clone(option), {labelText:'条件10'}) );
	
	
	
	$('#needpv_v').radiofield({
	     labelText:'筛选条件',	 
		 isBlank: false,
		 store: data.st_needpvOption,
		 value : 0
	});
	T.formArray.push({'needpv_v':'radiofield'});
	
	 //加载组件数据初始化、事件监听等
	 quku_v.statisticForm.initElement();	 
}

quku_v.statisticForm.initElement = function(){
	 var G = quku_v.global;
	 
	 $('.add-condition').bind('click', function(){
	     $( $('.hide')[0] ).removeClass('hide').addClass('show');
	 });
	 
	 $('.del-condition').bind('click', function(){
	     var arr = $('.show'), len = arr.length;
	     if( len == 1 ){
		    return ;
		 }
	     $(arr[len-1]).removeClass('show').addClass('hide');
	 });
	 
	 //上传按钮绑定事件
	 
	 /*
	 $('.picFile').each(function(){
		 if(!$(this).attr('disabled')){
			PicUploader.registerAjaxUploadListener($(this).attr('id'),'artist');
		}
	 });
	 
       $('#si_selectAll').bind('click',function(){
       	  
       	   	$('#tableSong').find('input[type="checkbox"]').prop('checked',$(this).prop('checked'));
       	  
       })
	
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
	
	*/
	
}

//格式化模版函数
String.format = function(src){    
  
       if (arguments.length == 0) return null;    
  
       var args = Array.prototype.slice.call(arguments, 1);    
  
       return src.replace(/\{(\d+)\}/g, function(m, i){    
  
             return args[i];    
  
      });    
};
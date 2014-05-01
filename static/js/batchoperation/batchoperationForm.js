var quku_v = window.quku_v || {};
quku_v.batchoperationForm = {};

/**
 * 单曲详情页
 * @method displayDom
 * @param
 * @return
 */

 quku_v.batchoperationForm.displayPanel = function(data){
     //基本信息组合对象,元素类型为json对象，key是元素id，value是元素组件类型
	 quku_v.batchoperationForm.formArray=new quku_v.FormArray();

	 var T = quku_v.batchoperationForm;
	$('#tasktype').radiofield({
	     labelText:'操作类型',
		 isBlank: false,
		 store: data.st_taskOption,
		 value:"db"
	});
	T.formArray.push({'tasktype':'radiofield'});

	$('#maillist').textfield({
	 labelText:'统计接收邮箱列表',
	 isBlank:false 
	})
	T.formArray.push({'maillist':'textfield'});

	//动态创建，单曲表，专辑表
	$('#table').bind('change', function(event){
	    if($(this).radiofield('getValue') == ''){
			$('#'+st_fieldsId).selectfield('loadData', []);
	    }
	    if($("#tasktype").radiofield('getValue') == "replace"){
			$('.x-editgrid-key').selectfield('loadData', data["replace_"+$(this).radiofield('getValue')], true);
	    }else{
			$('.x-editgrid-key').selectfield('loadData', data[$(this).radiofield('getValue')], true);
	     }

	});

 	$('#replace_table').bind('change', function(event){
		if($(this).radiofield('getValue') == ''){
		    $('#'+st_fieldsId).selectfield('loadData', []);
		}
	    if($("#tasktype").radiofield('getValue') == "replace"){
			$('.x-editgrid-key').selectfield('loadData', data["replace_"+$(this).radiofield('getValue')], true);
	    }else{
			$('.x-editgrid-key').selectfield('loadData', data[$(this).radiofield('getValue')], true);
	    }
	});

	$('#tasktype').bind('change', function(event){
		if($(this).radiofield('getValue') == 'rollback'){
		    $(".revocationContent").removeClass('hide').addClass('show');
		    $(".updateData").removeClass('show').addClass('hide');
		    $(".prohibitContent").removeClass('show').addClass('hide');
		    $(".replaceContent").removeClass('show').addClass('hide');
		    $(".autoContent").removeClass('show').addClass('hide');
		    $(".autoAlbumContent").removeClass('show').addClass('hide');
		}else if($(this).radiofield("getValue") == "replace"){
		    $(".prohibitContent").removeClass('show').addClass('hide');
		    $(".updateData").removeClass('show').addClass('hide');
		    $(".revocationContent").removeClass('show').addClass('hide');
		    $(".replaceContent").removeClass('hide').addClass('show');
		    $(".autoContent").removeClass('show').addClass('hide');
		    $('.x-editgrid-key').selectfield('loadData', [], true);
		    $(".autoAlbumContent").removeClass('show').addClass('hide');
		}else if($(this).radiofield("getValue") == "prohibit"){
		    $(".prohibitContent").removeClass('hide').addClass('show');
		    $(".updateData").removeClass('show').addClass('hide');
		    $(".revocationContent").removeClass('show').addClass('hide');
		    $(".replaceContent").removeClass('show').addClass('hide');
		    $(".autoContent").removeClass('show').addClass('hide');
		    $(".autoAlbumContent").removeClass('show').addClass('hide');
		}else if($(this).radiofield("getValue") == "auto"){
		    $(".updateData").removeClass('show').addClass('hide');
		    $(".revocationContent").removeClass('show').addClass('hide');
		    $(".prohibitContent").removeClass('show').addClass('hide');
		    $(".autoContent").removeClass('hide').addClass('show');
		    $(".replaceContent").removeClass('show').addClass('hide');
		    $(".autoAlbumContent").removeClass('show').addClass('hide');
		}else if($(this).radiofield("getValue") == "auto_album"){
		    $(".updateData").removeClass('show').addClass('hide');
		    $(".revocationContent").removeClass('show').addClass('hide');
		    $(".prohibitContent").removeClass('show').addClass('hide');
		    $(".autoContent").removeClass('show').addClass('hide');
		    $(".replaceContent").removeClass('show').addClass('hide');
		    $(".autoAlbumContent").removeClass('hide').addClass('show');
		}
                else{
		    $(".updateData").removeClass('hide').addClass('show');
		    $(".autoAlbumContent").removeClass('show').addClass('hide');
		    $(".revocationContent").removeClass('show').addClass('hide');
		    $(".prohibitContent").removeClass('show').addClass('hide');
		    $(".replaceContent").removeClass('show').addClass('hide');
		    $('.x-editgrid-key').selectfield('loadData', [],true);
		}
	});

	 /** 基本信息 **/
	 $('#table').radiofield({
	     labelText:'待修改数据类型',
		 isBlank: false,
		 store: data.st_tablesOption
	});
     T.formArray.push({'table':'radiofield'});

     $('#replace_table').radiofield({
     	 labelText:'待修改数据类型',
     	 isBlank: false,
     	 store: data.st_tablesOption
     });

     T.formArray.push({'replace_table':'radiofield'})

	$('#rollbackid').textfield({
		 labelText:'待回滚数据操作id',
		 isBlank:false,
		 type : "file"
	 })

	var option = {
		labelText:'条件信息',

		isBlank:false,
		fields:[{name:'key'},{name:'value'}],
	    returnType:'conditions',
	    defalutOperation : [],
		columns:[
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

	 			$('.x-editgrid-symbol').selectfield({
					 //labelText:'符号',
					 noLabel: true,
					 blankValue: true,
					 store: data.st_symbolsOption,
					 noWrite: true
				 });
	 			$('.x-editgrid-key').selectfield({
				//labelText:'字段',
				 noLabel: true,
				 // blankValue: true,
				 store: data[ $('#selectType').radiofield("getValue") ],
				 value: '',
				 noWrite: true
			});
		 }//initNewRow
	} ;

	var replace_option = {
		labelText:'条件信息',

		 isBlank:false,
		fields:[{name:'key'}],
	    returnType:'conditions',
	    defalutOperation : [],
		columns:[
			 {
				text:' 字段',
				dataIndex: 'key',
				type:'selectfield'
			 },
			 {
				text:'',
				dataIndex: 'symbol',
				type:'selectfield'
			 },


		 ],
		 initNewRow: function(){
	 	     $('.x-editgrid-key').selectfield({
			 //labelText:'字段',
			 noLabel: true,
			 // blankValue: true,
			 store: data[ $('#selectType').radiofield("getValue") ],
			 value: '',
			 noWrite: true
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
	$('#fields_v_1').editgrid( $.extend(clone(option), {labelText:'更新字段1'}) );
	$('#fields_v_2').editgrid( $.extend(clone(option), {labelText:'更新字段2'}) );
	$('#fields_v_3').editgrid( $.extend(clone(option), {labelText:'更新字段3'}) );
	$('#fields_v_4').editgrid( $.extend(clone(option), {labelText:'更新字段4'}) );
	$('#fields_v_5').editgrid( $.extend(clone(option), {labelText:'更新字段5'}) );
	$('#fields_v_6').editgrid( $.extend(clone(option), {labelText:'更新字段6'}) );
	$('#fields_v_7').editgrid( $.extend(clone(option), {labelText:'更新字段7'}) );
	$('#fields_v_8').editgrid( $.extend(clone(option), {labelText:'更新字段8'}) );
	$('#fields_v_9').editgrid( $.extend(clone(option), {labelText:'更新字段9'}) );
	$('#fields_v_10').editgrid( $.extend(clone(option), {labelText:'更新字段10'}) );
	 T.formArray.push({'fields':'editgrid'});

	$('#fields_replace_v_1').editgrid( $.extend(clone(replace_option), {labelText:'更新字段1'}) );
	$('#fields_replace_v_2').editgrid( $.extend(clone(replace_option), {labelText:'更新字段2'}) );
	$('#fields_replace_v_3').editgrid( $.extend(clone(replace_option), {labelText:'更新字段3'}) );
	$('#fields_replace_v_4').editgrid( $.extend(clone(replace_option), {labelText:'更新字段4'}) );
	$('#fields_replace_v_5').editgrid( $.extend(clone(replace_option), {labelText:'更新字段5'}) );
	$('#fields_replace_v_6').editgrid( $.extend(clone(replace_option), {labelText:'更新字段6'}) );
	$('#fields_replace_v_7').editgrid( $.extend(clone(replace_option), {labelText:'更新字段7'}) );
	$('#fields_replace_v_8').editgrid( $.extend(clone(replace_option), {labelText:'更新字段8'}) );
	$('#fields_replace_v_9').editgrid( $.extend(clone(replace_option), {labelText:'更新字段9'}) );
	$('#fields_replace_v_10').editgrid( $.extend(clone(replace_option), {labelText:'更新字段10'}) );
	$('#fields_replace_v_11').editgrid( $.extend(clone(replace_option), {labelText:'更新字段11'}) );
	$('#fields_replace_v_12').editgrid( $.extend(clone(replace_option), {labelText:'更新字段12'}) );
	$('#fields_replace_v_13').editgrid( $.extend(clone(replace_option), {labelText:'更新字段13'}) );
	$('#fields_replace_v_14').editgrid( $.extend(clone(replace_option), {labelText:'更新字段14'}) );
	$('#fields_replace_v_15').editgrid( $.extend(clone(replace_option), {labelText:'更新字段15'}) );
    $('#fields_replace_v_16').editgrid( $.extend(clone(replace_option), {labelText:'更新字段16'}) );
	$('#fields_replace_v_17').editgrid( $.extend(clone(replace_option), {labelText:'更新字段17'}) );
	$('#fields_replace_v_18').editgrid( $.extend(clone(replace_option), {labelText:'更新字段18'}) );
	$('#fields_replace_v_19').editgrid( $.extend(clone(replace_option), {labelText:'更新字段19'}) );
	$('#fields_replace_v_20').editgrid( $.extend(clone(replace_option), {labelText:'更新字段20'}) );

	 T.formArray.push({'replace_fields':'editgrid'});



	 //加载组件数据初始化、事件监听等
	 quku_v.batchoperationForm.initElement();

}

quku_v.batchoperationForm.initElement = function(){
	 var G = quku_v.global;

	 $('.add-condition').bind('click', function(){
	     if($("#tasktype").radiofield('getValue') == "replace"){
		 	$( $(' .replaceContent .hide')[0] ).removeClass('hide').addClass('show');
	     }else{	 	
		 	if($("#si_distribution")){
		 		$($('.hide')[0]).find("select.x-component-input option[value='si_distribution']").remove();	
		 	}
		 	$( $('.hide')[0]).removeClass('hide').addClass('show');
	     }
	 });

	 $('.del-condition').bind('click', function(){
	     if($("#tasktype").radiofield('getValue') == "replace"){
		 var arr = $('.replaceContent .show'), len = arr.length;
	     }else{
		 var arr = $('.show'), len = arr.length;
	     }
	     if( len == 1 ){
		    return ;
		 }
	     $(arr[len-1]).removeClass('show').addClass('hide');
	 });

	 //多端分发
	$("#fields_v_1").find(".x-editgrid-key select").bind("change",function(){
		if($(this).val()=="si_distribution"){
			$("#fields_v_1_value_0").val($("#si_distribution_value_0").val());
			var str = '<div class="x-layout-block tb_form" id="si_distribution"><div class="x-component-label "><span class="red label-blank"></span><span class="label-text">多端分发: </span><a href="#" class="more-link"></a></div><div class="x-component-items" id="si_distribution_items"><table><tbody><tr><td style="text-align:left;width:120px;"></td><td style="text-align:left;width:80px;">试听</td><td style="text-align:left;width:80px;">下载</td><td style="text-align:left;width:80px;">单曲页</td><td style="text-align:left;width:80px;">推荐列表（新碟、专题、影视歌曲）</td><td style="text-align:left;width:80px;">非推荐列表（榜单、分类标签）</td><td style="text-align:left;width:80px;">检索</td></tr><tr><td><span id="si_distribution_duan_0">pc-web</span></td><td><div name="0[]" class="x-eidtgrid-checked x-editgrid-0" id="si_distribution_0_0"><div class="x-component-items" id="si_distribution_0_0_items"><input type="checkbox" value="0" name="si_distribution_0_0[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_0_0"></span><span id="nb_si_distribution_0_0"></span></div></td><td><div name="1[]" class="x-eidtgrid-checked x-editgrid-1" id="si_distribution_1_0"><div class="x-component-items" id="si_distribution_1_0_items"><input type="checkbox" value="0" name="si_distribution_1_0[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_1_0"></span><span id="nb_si_distribution_1_0"></span></div></td><td><div name="2[]" class="x-eidtgrid-checked x-editgrid-2" id="si_distribution_2_0"><div class="x-component-items" id="si_distribution_2_0_items"><input type="checkbox" value="0" name="si_distribution_2_0[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_2_0"></span><span id="nb_si_distribution_2_0"></span></div></td><td><div name="3[]" class="x-eidtgrid-checked x-editgrid-3" id="si_distribution_3_0"><div class="x-component-items" id="si_distribution_3_0_items"><input type="checkbox" value="0" name="si_distribution_3_0[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_3_0"></span><span id="nb_si_distribution_3_0"></span></div></td><td><div name="4[]" class="x-eidtgrid-checked x-editgrid-4" id="si_distribution_4_0"><div class="x-component-items" id="si_distribution_4_0_items"><input type="checkbox" value="0" name="si_distribution_4_0[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_4_0"></span><span id="nb_si_distribution_4_0"></span></div></td><td><div name="5[]" class="x-eidtgrid-checked x-editgrid-5" id="si_distribution_5_0"><div class="x-component-items" id="si_distribution_5_0_items"><input type="checkbox" value="0" name="si_distribution_5_0[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_5_0"></span><span id="nb_si_distribution_5_0"></span></div></td><td><input type="hidden" name="6[]" id="si_distribution_6_0" value="0">0</input></td><td><input type="hidden" name="7[]" id="si_distribution_7_0" value="0">0</input></td><td><input type="hidden" name="8[]" id="si_distribution_8_0" value="0">0</input></td><td><input type="hidden" name="9[]" id="si_distribution_9_0" value="0">0</input></td></tr><tr><td><span id="si_distribution_duan_1">qianqian</span></td><td><div name="0[]" class="x-eidtgrid-checked x-editgrid-0" id="si_distribution_0_1"><div class="x-component-items" id="si_distribution_0_1_items"><input type="checkbox" value="0" name="si_distribution_0_1[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_0_1"></span><span id="nb_si_distribution_0_1"></span></div></td><td><div name="1[]" class="x-eidtgrid-checked x-editgrid-1" id="si_distribution_1_1"><div class="x-component-items" id="si_distribution_1_1_items"><input type="checkbox" value="0" name="si_distribution_1_1[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_1_1"></span><span id="nb_si_distribution_1_1"></span></div></td><td><div name="2[]" class="x-eidtgrid-checked x-editgrid-2" id="si_distribution_2_1"><div class="x-component-items" id="si_distribution_2_1_items"><input type="checkbox" value="0" name="si_distribution_2_1[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_2_1"></span><span id="nb_si_distribution_2_1"></span></div></td><td><div name="3[]" class="x-eidtgrid-checked x-editgrid-3" id="si_distribution_3_1"><div class="x-component-items" id="si_distribution_3_1_items"><input type="checkbox" value="0" name="si_distribution_3_1[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_3_1"></span><span id="nb_si_distribution_3_1"></span></div></td><td><div name="4[]" class="x-eidtgrid-checked x-editgrid-4" id="si_distribution_4_1"><div class="x-component-items" id="si_distribution_4_1_items"><input type="checkbox" value="0" name="si_distribution_4_1[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_4_1"></span><span id="nb_si_distribution_4_1"></span></div></td><td><div name="5[]" class="x-eidtgrid-checked x-editgrid-5" id="si_distribution_5_1"><div class="x-component-items" id="si_distribution_5_1_items"><input type="checkbox" value="0" name="si_distribution_5_1[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_5_1"></span><span id="nb_si_distribution_5_1"></span></div></td><td><input type="hidden" name="6[]" id="si_distribution_6_1" value="0">0</input></td><td><input type="hidden" name="7[]" id="si_distribution_7_1" value="0">0</input></td><td><input type="hidden" name="8[]" id="si_distribution_8_1" value="0">0</input></td><td><input type="hidden" name="9[]" id="si_distribution_9_1" value="0">0</input></td></tr><tr><td><span id="si_distribution_duan_2">android-app</span></td><td><div name="0[]" class="x-eidtgrid-checked x-editgrid-0" id="si_distribution_0_2"><div class="x-component-items" id="si_distribution_0_2_items"><input type="checkbox" value="0" name="si_distribution_0_2[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_0_2"></span><span id="nb_si_distribution_0_2"></span></div></td><td><div name="1[]" class="x-eidtgrid-checked x-editgrid-1" id="si_distribution_1_2"><div class="x-component-items" id="si_distribution_1_2_items"><input type="checkbox" value="0" name="si_distribution_1_2[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_1_2"></span><span id="nb_si_distribution_1_2"></span></div></td><td><div name="2[]" class="x-eidtgrid-checked x-editgrid-2" id="si_distribution_2_2"><div class="x-component-items" id="si_distribution_2_2_items"><input type="checkbox" value="0" name="si_distribution_2_2[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_2_2"></span><span id="nb_si_distribution_2_2"></span></div></td><td><div name="3[]" class="x-eidtgrid-checked x-editgrid-3" id="si_distribution_3_2"><div class="x-component-items" id="si_distribution_3_2_items"><input type="checkbox" value="0" name="si_distribution_3_2[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_3_2"></span><span id="nb_si_distribution_3_2"></span></div></td><td><div name="4[]" class="x-eidtgrid-checked x-editgrid-4" id="si_distribution_4_2"><div class="x-component-items" id="si_distribution_4_2_items"><input type="checkbox" value="0" name="si_distribution_4_2[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_4_2"></span><span id="nb_si_distribution_4_2"></span></div></td><td><div name="5[]" class="x-eidtgrid-checked x-editgrid-5" id="si_distribution_5_2"><div class="x-component-items" id="si_distribution_5_2_items"><input type="checkbox" value="0" name="si_distribution_5_2[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_5_2"></span><span id="nb_si_distribution_5_2"></span></div></td><td><input type="hidden" name="6[]" id="si_distribution_6_2" value="0">0</input></td><td><input type="hidden" name="7[]" id="si_distribution_7_2" value="0">0</input></td><td><input type="hidden" name="8[]" id="si_distribution_8_2" value="0">0</input></td><td><input type="hidden" name="9[]" id="si_distribution_9_2" value="0">0</input></td></tr><tr><td><span id="si_distribution_duan_3">ios-app</span></td><td><div name="0[]" class="x-eidtgrid-checked x-editgrid-0" id="si_distribution_0_3"><div class="x-component-items" id="si_distribution_0_3_items"><input type="checkbox" value="0" name="si_distribution_0_3[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_0_3"></span><span id="nb_si_distribution_0_3"></span></div></td><td><div name="1[]" class="x-eidtgrid-checked x-editgrid-1" id="si_distribution_1_3"><div class="x-component-items" id="si_distribution_1_3_items"><input type="checkbox" value="0" name="si_distribution_1_3[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_1_3"></span><span id="nb_si_distribution_1_3"></span></div></td><td><div name="2[]" class="x-eidtgrid-checked x-editgrid-2" id="si_distribution_2_3"><div class="x-component-items" id="si_distribution_2_3_items"><input type="checkbox" value="0" name="si_distribution_2_3[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_2_3"></span><span id="nb_si_distribution_2_3"></span></div></td><td><div name="3[]" class="x-eidtgrid-checked x-editgrid-3" id="si_distribution_3_3"><div class="x-component-items" id="si_distribution_3_3_items"><input type="checkbox" value="0" name="si_distribution_3_3[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_3_3"></span><span id="nb_si_distribution_3_3"></span></div></td><td><div name="4[]" class="x-eidtgrid-checked x-editgrid-4" id="si_distribution_4_3"><div class="x-component-items" id="si_distribution_4_3_items"><input type="checkbox" value="0" name="si_distribution_4_3[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_4_3"></span><span id="nb_si_distribution_4_3"></span></div></td><td><div name="5[]" class="x-eidtgrid-checked x-editgrid-5" id="si_distribution_5_3"><div class="x-component-items" id="si_distribution_5_3_items"><input type="checkbox" value="0" name="si_distribution_5_3[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_5_3"></span><span id="nb_si_distribution_5_3"></span></div></td><td><input type="hidden" name="6[]" id="si_distribution_6_3" value="0">0</input></td><td><input type="hidden" name="7[]" id="si_distribution_7_3" value="0">0</input></td><td><input type="hidden" name="8[]" id="si_distribution_8_3" value="0">0</input></td><td><input type="hidden" name="9[]" id="si_distribution_9_3" value="0">0</input></td></tr><tr><td><span id="si_distribution_duan_4">windows-app</span></td><td><div name="0[]" class="x-eidtgrid-checked x-editgrid-0" id="si_distribution_0_4"><div class="x-component-items" id="si_distribution_0_4_items"><input type="checkbox" value="0" name="si_distribution_0_4[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_0_4"></span><span id="nb_si_distribution_0_4"></span></div></td><td><div name="1[]" class="x-eidtgrid-checked x-editgrid-1" id="si_distribution_1_4"><div class="x-component-items" id="si_distribution_1_4_items"><input type="checkbox" value="0" name="si_distribution_1_4[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_1_4"></span><span id="nb_si_distribution_1_4"></span></div></td><td><div name="2[]" class="x-eidtgrid-checked x-editgrid-2" id="si_distribution_2_4"><div class="x-component-items" id="si_distribution_2_4_items"><input type="checkbox" value="0" name="si_distribution_2_4[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_2_4"></span><span id="nb_si_distribution_2_4"></span></div></td><td><div name="3[]" class="x-eidtgrid-checked x-editgrid-3" id="si_distribution_3_4"><div class="x-component-items" id="si_distribution_3_4_items"><input type="checkbox" value="0" name="si_distribution_3_4[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_3_4"></span><span id="nb_si_distribution_3_4"></span></div></td><td><div name="4[]" class="x-eidtgrid-checked x-editgrid-4" id="si_distribution_4_4"><div class="x-component-items" id="si_distribution_4_4_items"><input type="checkbox" value="0" name="si_distribution_4_4[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_4_4"></span><span id="nb_si_distribution_4_4"></span></div></td><td><div name="5[]" class="x-eidtgrid-checked x-editgrid-5" id="si_distribution_5_4"><div class="x-component-items" id="si_distribution_5_4_items"><input type="checkbox" value="0" name="si_distribution_5_4[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_5_4"></span><span id="nb_si_distribution_5_4"></span></div></td><td><input type="hidden" name="6[]" id="si_distribution_6_4" value="0">0</input></td><td><input type="hidden" name="7[]" id="si_distribution_7_4" value="0">0</input></td><td><input type="hidden" name="8[]" id="si_distribution_8_4" value="0">0</input></td><td><input type="hidden" name="9[]" id="si_distribution_9_4" value="0">0</input></td></tr><tr><td><span id="si_distribution_duan_5">ios-webapp</span></td><td><div name="0[]" class="x-eidtgrid-checked x-editgrid-0" id="si_distribution_0_5"><div class="x-component-items" id="si_distribution_0_5_items"><input type="checkbox" value="0" name="si_distribution_0_5[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_0_5"></span><span id="nb_si_distribution_0_5"></span></div></td><td><div name="1[]" class="x-eidtgrid-checked x-editgrid-1" id="si_distribution_1_5"><div class="x-component-items" id="si_distribution_1_5_items"><input type="checkbox" value="0" name="si_distribution_1_5[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_1_5"></span><span id="nb_si_distribution_1_5"></span></div></td><td><div name="2[]" class="x-eidtgrid-checked x-editgrid-2" id="si_distribution_2_5"><div class="x-component-items" id="si_distribution_2_5_items"><input type="checkbox" value="0" name="si_distribution_2_5[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_2_5"></span><span id="nb_si_distribution_2_5"></span></div></td><td><div name="3[]" class="x-eidtgrid-checked x-editgrid-3" id="si_distribution_3_5"><div class="x-component-items" id="si_distribution_3_5_items"><input type="checkbox" value="0" name="si_distribution_3_5[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_3_5"></span><span id="nb_si_distribution_3_5"></span></div></td><td><div name="4[]" class="x-eidtgrid-checked x-editgrid-4" id="si_distribution_4_5"><div class="x-component-items" id="si_distribution_4_5_items"><input type="checkbox" value="0" name="si_distribution_4_5[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_4_5"></span><span id="nb_si_distribution_4_5"></span></div></td><td><div name="5[]" class="x-eidtgrid-checked x-editgrid-5" id="si_distribution_5_5"><div class="x-component-items" id="si_distribution_5_5_items"><input type="checkbox" value="0" name="si_distribution_5_5[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_5_5"></span><span id="nb_si_distribution_5_5"></span></div></td><td><input type="hidden" name="6[]" id="si_distribution_6_5" value="0">0</input></td><td><input type="hidden" name="7[]" id="si_distribution_7_5" value="0">0</input></td><td><input type="hidden" name="8[]" id="si_distribution_8_5" value="0">0</input></td><td><input type="hidden" name="9[]" id="si_distribution_9_5" value="0">0</input></td></tr><tr><td><span id="si_distribution_duan_6">android-webapp</span></td><td><div name="0[]" class="x-eidtgrid-checked x-editgrid-0" id="si_distribution_0_6"><div class="x-component-items" id="si_distribution_0_6_items"><input type="checkbox" value="0" name="si_distribution_0_6[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_0_6"></span><span id="nb_si_distribution_0_6"></span></div></td><td><div name="1[]" class="x-eidtgrid-checked x-editgrid-1" id="si_distribution_1_6"><div class="x-component-items" id="si_distribution_1_6_items"><input type="checkbox" value="0" name="si_distribution_1_6[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_1_6"></span><span id="nb_si_distribution_1_6"></span></div></td><td><div name="2[]" class="x-eidtgrid-checked x-editgrid-2" id="si_distribution_2_6"><div class="x-component-items" id="si_distribution_2_6_items"><input type="checkbox" value="0" name="si_distribution_2_6[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_2_6"></span><span id="nb_si_distribution_2_6"></span></div></td><td><div name="3[]" class="x-eidtgrid-checked x-editgrid-3" id="si_distribution_3_6"><div class="x-component-items" id="si_distribution_3_6_items"><input type="checkbox" value="0" name="si_distribution_3_6[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_3_6"></span><span id="nb_si_distribution_3_6"></span></div></td><td><div name="4[]" class="x-eidtgrid-checked x-editgrid-4" id="si_distribution_4_6"><div class="x-component-items" id="si_distribution_4_6_items"><input type="checkbox" value="0" name="si_distribution_4_6[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_4_6"></span><span id="nb_si_distribution_4_6"></span></div></td><td><div name="5[]" class="x-eidtgrid-checked x-editgrid-5" id="si_distribution_5_6"><div class="x-component-items" id="si_distribution_5_6_items"><input type="checkbox" value="0" name="si_distribution_5_6[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_5_6"></span><span id="nb_si_distribution_5_6"></span></div></td><td><input type="hidden" name="6[]" id="si_distribution_6_6" value="0">0</input></td><td><input type="hidden" name="7[]" id="si_distribution_7_6" value="0">0</input></td><td><input type="hidden" name="8[]" id="si_distribution_8_6" value="0">0</input></td><td><input type="hidden" name="9[]" id="si_distribution_9_6" value="0">0</input></td></tr><tr><td><span id="si_distribution_duan_7">厂商</span></td><td><div name="0[]" class="x-eidtgrid-checked x-editgrid-0" id="si_distribution_0_7"><div class="x-component-items" id="si_distribution_0_7_items"><input type="checkbox" value="0" name="si_distribution_0_7[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_0_7"></span><span id="nb_si_distribution_0_7"></span></div></td><td><div name="1[]" class="x-eidtgrid-checked x-editgrid-1" id="si_distribution_1_7"><div class="x-component-items" id="si_distribution_1_7_items"><input type="checkbox" value="0" name="si_distribution_1_7[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_1_7"></span><span id="nb_si_distribution_1_7"></span></div></td><td><div name="2[]" class="x-eidtgrid-checked x-editgrid-2" id="si_distribution_2_7"><div class="x-component-items" id="si_distribution_2_7_items"><input type="checkbox" value="0" name="si_distribution_2_7[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_2_7"></span><span id="nb_si_distribution_2_7"></span></div></td><td><div name="3[]" class="x-eidtgrid-checked x-editgrid-3" id="si_distribution_3_7"><div class="x-component-items" id="si_distribution_3_7_items"><input type="checkbox" value="0" name="si_distribution_3_7[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_3_7"></span><span id="nb_si_distribution_3_7"></span></div></td><td><div name="4[]" class="x-eidtgrid-checked x-editgrid-4" id="si_distribution_4_7"><div class="x-component-items" id="si_distribution_4_7_items"><input type="checkbox" value="0" name="si_distribution_4_7[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_4_7"></span><span id="nb_si_distribution_4_7"></span></div></td><td><div name="5[]" class="x-eidtgrid-checked x-editgrid-5" id="si_distribution_5_7"><div class="x-component-items" id="si_distribution_5_7_items"><input type="checkbox" value="0" name="si_distribution_5_7[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_5_7"></span><span id="nb_si_distribution_5_7"></span></div></td><td><input type="hidden" name="6[]" id="si_distribution_6_7" value="0">0</input></td><td><input type="hidden" name="7[]" id="si_distribution_7_7" value="0">0</input></td><td><input type="hidden" name="8[]" id="si_distribution_8_7" value="0">0</input></td><td><input type="hidden" name="9[]" id="si_distribution_9_7" value="0">0</input></td></tr><tr><td><span id="si_distribution_duan_8">占位</span></td><td><div name="0[]" class="x-eidtgrid-checked x-editgrid-0" id="si_distribution_0_8"><div class="x-component-items" id="si_distribution_0_8_items"><input type="checkbox" value="0" name="si_distribution_0_8[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_0_8"></span><span id="nb_si_distribution_0_8"></span></div></td><td><div name="1[]" class="x-eidtgrid-checked x-editgrid-1" id="si_distribution_1_8"><div class="x-component-items" id="si_distribution_1_8_items"><input type="checkbox" value="0" name="si_distribution_1_8[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_1_8"></span><span id="nb_si_distribution_1_8"></span></div></td><td><div name="2[]" class="x-eidtgrid-checked x-editgrid-2" id="si_distribution_2_8"><div class="x-component-items" id="si_distribution_2_8_items"><input type="checkbox" value="0" name="si_distribution_2_8[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_2_8"></span><span id="nb_si_distribution_2_8"></span></div></td><td><div name="3[]" class="x-eidtgrid-checked x-editgrid-3" id="si_distribution_3_8"><div class="x-component-items" id="si_distribution_3_8_items"><input type="checkbox" value="0" name="si_distribution_3_8[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_3_8"></span><span id="nb_si_distribution_3_8"></span></div></td><td><div name="4[]" class="x-eidtgrid-checked x-editgrid-4" id="si_distribution_4_8"><div class="x-component-items" id="si_distribution_4_8_items"><input type="checkbox" value="0" name="si_distribution_4_8[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_4_8"></span><span id="nb_si_distribution_4_8"></span></div></td><td><div name="5[]" class="x-eidtgrid-checked x-editgrid-5" id="si_distribution_5_8"><div class="x-component-items" id="si_distribution_5_8_items"><input type="checkbox" value="0" name="si_distribution_5_8[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_5_8"></span><span id="nb_si_distribution_5_8"></span></div></td><td><input type="hidden" name="6[]" id="si_distribution_6_8" value="0">0</input></td><td><input type="hidden" name="7[]" id="si_distribution_7_8" value="0">0</input></td><td><input type="hidden" name="8[]" id="si_distribution_8_8" value="0">0</input></td><td><input type="hidden" name="9[]" id="si_distribution_9_8" value="0">0</input></td></tr><tr><td><span id="si_distribution_duan_9">占位</span></td><td><div name="0[]" class="x-eidtgrid-checked x-editgrid-0" id="si_distribution_0_9"><div class="x-component-items" id="si_distribution_0_9_items"><input type="checkbox" value="0" name="si_distribution_0_9[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_0_9"></span><span id="nb_si_distribution_0_9"></span></div></td><td><div name="1[]" class="x-eidtgrid-checked x-editgrid-1" id="si_distribution_1_9"><div class="x-component-items" id="si_distribution_1_9_items"><input type="checkbox" value="0" name="si_distribution_1_9[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_1_9"></span><span id="nb_si_distribution_1_9"></span></div></td><td><div name="2[]" class="x-eidtgrid-checked x-editgrid-2" id="si_distribution_2_9"><div class="x-component-items" id="si_distribution_2_9_items"><input type="checkbox" value="0" name="si_distribution_2_9[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_2_9"></span><span id="nb_si_distribution_2_9"></span></div></td><td><div name="3[]" class="x-eidtgrid-checked x-editgrid-3" id="si_distribution_3_9"><div class="x-component-items" id="si_distribution_3_9_items"><input type="checkbox" value="0" name="si_distribution_3_9[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_3_9"></span><span id="nb_si_distribution_3_9"></span></div></td><td><div name="4[]" class="x-eidtgrid-checked x-editgrid-4" id="si_distribution_4_9"><div class="x-component-items" id="si_distribution_4_9_items"><input type="checkbox" value="0" name="si_distribution_4_9[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_4_9"></span><span id="nb_si_distribution_4_9"></span></div></td><td><div name="5[]" class="x-eidtgrid-checked x-editgrid-5" id="si_distribution_5_9"><div class="x-component-items" id="si_distribution_5_9_items"><input type="checkbox" value="0" name="si_distribution_5_9[]" checked="" class="x-component-input"></div><span id="nt_si_distribution_5_9"></span><span id="nb_si_distribution_5_9"></span></div></td><td><input type="hidden" name="6[]" id="si_distribution_6_9" value="0">0</input></td><td><input type="hidden" name="7[]" id="si_distribution_7_9" value="0">0</input></td><td><input type="hidden" name="8[]" id="si_distribution_8_9" value="0">0</input></td><td><input type="hidden" name="9[]" id="si_distribution_9_9" value="0">0</input></td></tr></tbody></table></div><span id="nt_si_distribution"></span><span id="nb_si_distribution"></span></div>';
			if($("#si_distribution")){
				$('#fields_v_1').before(str);
			}
			$("#si_distribution_items").find(".x-component-input").bind("click",function(){
				var position = $(this).attr('name');
				var poArr = position.split("_");
				var ypos = poArr[2]
				var xpos = parseInt(poArr[3]);
				if(!$(this)[0].checked){
					var valArr = eval($("#si_distribution_value_0").val());
					var xObj = valArr[xpos];
					var str=[];
					xObj[ypos] = '1';
					JSON.stringify(xObj);
					for(var i=0;i<valArr.length;i++){
						str.push(JSON.stringify(valArr[i]).replace(/\"/g,"\'"));
					}
					$("#si_distribution_value_0").val('['+str.join(",")+']');
					$("#fields_v_1_value_0").val($("#si_distribution_value_0").val());
		 		}
				else{
					var valArr = eval($("#si_distribution_value_0").val());
					var xObj = valArr[xpos];
					var str=[];
					xObj[ypos] = '0';
					JSON.stringify(xObj);
					for(var i=0;i<valArr.length;i++){
						str.push(JSON.stringify(valArr[i]).replace(/\"/g,"\'"));
					}
					$("#si_distribution_value_0").val('['+str.join(",")+']');
					$("#fields_v_1_value_0").val($("#si_distribution_value_0").val());
				}
			})
		}
		else{
			$("#fields_v_1_value_0").val("");
			if($("#si_distribution")){
				$("#si_distribution").remove();
			}
		}
	})
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

var quku_v = window.quku_v || {};
quku_v.yingshiForm = {};

/**
 * 单曲详情页
 * @method displayDom
 * @param
 * @return
 */

 quku_v.yingshiForm.displayPanel = function(data){

     //基本信息组合对象,元素类型为json对象，key是元素id，value是元素组件类型
	 quku_v.yingshiForm.formArray=new quku_v.FormArray();

	 var T = quku_v.yingshiForm;
	 /** 基本信息 **/

	 $('#yi_title_id').textfield({
		 labelText:'影视ID（只读）',
		 noWrite: true,
		 readOnly: true
	 })
	 T.formArray.push({'yi_title_id':'textfield'});

	 $('#yi_title').textfield({
		 labelText:'影视剧名称',
		 isBlank:false
	 })
	 T.formArray.push({'yi_title':'textfield'});

	 $('#yi_aliastitle').textfield({
		 labelText:'别名'
	 })
	 T.formArray.push({'yi_aliastitle':'textfield'});

	  $('#yi_translatename').textfield({
		 labelText:'译名'
	 })
	 T.formArray.push({'yi_translatename':'textfield'});

	 $('#yi_info').textfield({
		 labelText:'描述'
	 })
	 T.formArray.push({'yi_info':'textfield'});

	 $('#yi_director').textfield({
		 labelText:'导演'
	 })
	 T.formArray.push({'yi_director':'textfield'});

	 $('#yi_main').textfield({
		 labelText:'主演'
	 })
	 T.formArray.push({'yi_main':'textfield'});

	 $('#yi_guest').textfield({
		 labelText:'客串/嘉宾'
	 })
	 T.formArray.push({'yi_guest':'textfield'});

	 $('#yi_label').textfield({
		 labelText:'标签'
	 })
	 T.formArray.push({'yi_label':'textfield'});

	 $('#yi_publishtime').textfield({
		 labelText:'发行/上映时间'
	 })
	 T.formArray.push({'yi_publishtime':'textfield'});	 

	 $('#yi_area').selectfield({
		 labelText:'发行地区',
		 store:data.yi_areaOption
	 })
	 T.formArray.push({'yi_area':'selectfield'});

	 $('#yi_type').selectfield({
		 labelText:'类型',
		 store:data.yi_typeOption,
		 isBlank:false
	 })
	 T.formArray.push({'yi_type':'selectfield'});	 

	 $('#yi_versions').textfield({
		 labelText:'版本'
	 })
	 T.formArray.push({'yi_versions':'textfield'});	 

	 $('#yi_session').textfield({
		 labelText:'剧集/场次'
	 })
	 T.formArray.push({'yi_session':'textfield'});	


	 $('#yi_language').multiselector({
		 labelText: '语言',
		 height: 110,
		 store: data.yi_languageOption
	 })
	 T.formArray.push({'yi_language':'multiselector'});


	 $('#quku_artist_works_ref').textfield({
		 labelText:'歌手',
		 isBlank:false,
		 note:'<input id="quku_artist_works_ref_serialized" style="display:none;">'
	 })
	 T.formArray.push({'quku_artist_works_ref':'textfield'});

	 $('#yi_publishtime').textfield({
		 labelText:'发行时间'
	 })
	 T.formArray.push({'yi_publishtime':'textfield'});
	$('#quku_yingshi_ref').editgrid({
	    labelText:'关联歌曲',
	    fields:[{name:'yr_itemid'},{name:'yr_order'},{name:'yr_ref_type'},{name:'yr_content_type'}],   
	    columns:[
			{
			    text:' 操作',
			    type:'operation' ,
			    width: 100,
			},
			{
			    text:'歌曲ID',
			    dataIndex: 'yr_itemid',
			    type:'text',
			    width: 50,
			    //defaultValue : 15000,
			},
			{
			    text:'展现序号',
			    dataIndex: 'yr_order',
			    type:'text',
			    width: 50,
			    //defaultValue : 15000,
			},
			{
			    text:'关联类型',
			    dataIndex: 'yr_ref_type',
			    type:'selectfield',
			    width: 50,
			},	
			{
			    text:' 歌曲类型',
			    dataIndex: 'yr_content_type',
			    type:'selectfield',
			    width: 50,

			}				
	    ],

	     initNewRow: function(){
            $('.x-editgrid-yr_ref_type').selectfield({
                noLabel: true,
                store: data.yr_ref_typeOption,
                // store: [{"display":"2","value":"2"}],
                value: '',
                blankValue: true,
                noWrite: true
            }),
            //获取所有的选项
         	//tagid_store = []
        	// for(j in data["tag_1"]){
        	// 	tagid_store.push(data["tag_"+data.yr_ref_typeOption[1]["value"]][j]);
        	// }
        	// for(j in data["tag_2"]){
        	// 	tagid_store.push(data["tag_"+data.yr_ref_typeOption[2]["value"]][j]);
        	// }        	

            $('.x-editgrid-yr_content_type').selectfield({
                noLabel: true,
                store: data.yr_content_type_1Option,
                // store: [{"display":"2","value":"2"}],
                value: '',
                blankValue: true,
                noWrite: true
            }),
			//动态创建 
			$('.x-editgrid-yr_ref_type').bind('change', function(event){
			    var st_fieldsId = this.id.replace('_yr_ref_type','_yr_content_type');	
			    if($(this).selectfield('getValue') == ''){
				   $('#'+st_fieldsId).selectfield('loadData', []);
			    }
			    $('#'+st_fieldsId).selectfield('loadData', data["tag_"+$(this).selectfield('getValue')], true);
			});            
	     }
	})

	T.formArray.push({'quku_yingshi_ref':'editgrid'});//quku_yingshi_ref





	 $('#quku_pic_label').components({
		 labelText:'影视歌曲图片',
		  isBlank:false
		
	 })

	 //加载组件数据初始化、事件监听等
	 quku_v.yingshiForm.initElement();


}

quku_v.yingshiForm.initElement = function(){
	 var G = quku_v.global;
	 //上传按钮绑定事件
	 $('.picFile').each(function(){
		 if(!$(this).attr('disabled')){
			PicUploader.registerAjaxUploadListener($(this).attr('id'),'artist');
		}
	 });

    $('#yi_publishtime_items input').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });	 
}






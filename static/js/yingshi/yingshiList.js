var quku_v = window.quku_v || {};
quku_v.yingshiList = {};

//批量发布
$.extend(quku_v.yingshiList, {	
	//批量发布
	publicAll: function (e){
		var chks = [],
				url=$(this).attr('href');
		$("input[name='yingshiCheckbox']").each(function(){
			if($(this).prop('checked') == true) {
				chks.push ($(this).val());
			};
		});
		if (chks.length == 0) {
			alert('请选择要发布的单曲' );
			return false;
		}else if(!confirm('确认要批量发布单曲吗?')){
			return false;
		}else{
			e.preventDefault();
		};
		jQuery.post(url + '&yi_globalid=' + chks.join(),{},function(sData){
			    if(sData.error_code == 0){
				window.location.href = quku_v.global.YINGSHI_PUB_URL;
			 }
			 else{
				quku_v.com.showValidateInfo('yingshi',sData);
			 }
			  
			},'json');
	},
	 /** 
	 * 批量删除
	 * @method batchOperation
	 * @param {event} click事件 
	 * @param {msg}   事件当前对象
	 * @return {}  如果用户否定，结束事件传递
	 */
	batchOperation: function (event) {
		var checkedYingshi = new Array();
		var checkboxs = $('input[name="yingshiCheckbox"]');
		
		for (var i = 0; i < checkboxs.length; i++) {
			if ($(checkboxs[i]).prop('checked')) {
				checkedYingshi.push( $(checkboxs[i]).val() );
			}
		}
		
		if (checkedYingshi.length == 0) {
			alert( '请选择要删除的单曲' );
			event.preventDefault();
			return ;
		}
		
		if (!confirm('确认要批量删除单曲吗?')) {
			event.preventDefault();
			return ;
		} 
		
		$(this).attr( 'href', $(this).attr('href') + '&yi_globalid=' + checkedYingshi.toString() );
		  event.preventDefault();  	
		  var qUrl = $(this).attr('href');
		  quku_v.com.syncDel(qUrl);	
	},

	//批量恢复
	batchDisDelete: function (e){
		var chks = [],
				url=$(this).attr('href');
		$("input[name='yingshiCheckbox']").each(function(){
			if($(this).prop('checked') == true) {
				chks.push ($(this).val());
			};
		});
		if (chks.length == 0) {
			alert('请选择要恢复的单曲' );
			return false;
		}else if(!confirm('确认要批量恢复单曲吗?')){
			return false;
		}else{
			e.preventDefault();
		};
		jQuery.post(url + '&yi_globalid=' + chks.join(),{},function(sData){
			    if(sData.error_code == 0){
				window.location.href = quku_v.global.YINGSHI_NON_PUB_URL;
			 }
			 else{
				quku_v.com.showValidateInfo('yingshi',sData);
			 }
			  
			},'json');
	},
	
	/**
	 * 
	 * @method checkBlock
	 * @param {event} click事件 	  
	 * @return {}  跳转到 url
	 */
	checkBlock: function(event){
		  event = event || window.event;
		  event.preventDefault();
		  var qUrl = $(this).attr('href');
		  quku_v.com.syncCheckBlock(qUrl);
	},
	/**
	 * 
	 * @method newCreatDialog
	 * @param {si_globalid}   歌曲id	  
	 * @return {}  屏蔽歌曲
	 */
	newCreatDialog: function(yi_globalid) {
		var dialog = this.createCreationDialog(yi_globalid);
		dialog.popup();
	},
	/**
	 * 
	 * @method createCreationDialog
	 * @param {si_globalid} 歌曲id	  
	 * @return {}  创建歌曲屏蔽窗口
	 */
	createCreationDialog: function(yi_globalid){
		baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
		return new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url:'/index.php?c=yingshi&m=edit&yi_globalid='+ yi_globalid+'&tn=yingshi_prohibitDialog'},Quku.dialogSpecs.XL_L)
		);
	}


}) 

$(document).ready( function () {
    var T = quku_v.yingshiList, com = quku_v.com ;
    //列表项全选
	$('input[name="batchCheckbox"]').click(function() {
		$('input[name="yingshiCheckbox"]').prop('checked', $(this).prop('checked'));
	});
	//批量删除
	
	$('a.batchDelete').click(T.batchOperation);
	
	$('a.showedit').click(T.checkBlock);
	//批量恢复
	$('a.batchDisDelete').click(T.batchDisDelete);
	
	$('a.showedit').click(T.checkBlock);
	
	//批量发布
  	$('.publishAll').click(T.publicAll);
	
	$('a.x-yingshi-offline').bind('click' , function(event){	     
		if( com.operationConfirm(event,'确认要下线该歌曲吗?') ) 
		{
		      com.operationHandler(event,this.href,quku_v.global.YINGSHI_NON_PUB_URL,'下线成功');
		} 
		return false;
	}) ;
	
	$('a.x-yingshi-pub').bind('click', function(event){
	      if( com.operationConfirm(event,'确认要发布该歌曲吗?') ) 
		  { 
		      com.operationHandler(event,this.href,quku_v.global.YINGSHI_PUB_URL,'发布成功');
		  }
		return false;
	});
	
	$('a.x-yingshi-del').bind('click', function(event){
	
	     if( com.operationConfirm(event,'确认要删除该歌曲吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.YINGSHI_NON_PUB_URL,'删除成功');
	     }
		 return false;
	});
	
	$('a.x-yingshi-prohibit').bind('click', function(event){
	      
			var location =  parseInt( $(this).attr('status'),10 )?quku_v.global.YINGSHI_NON_PUB_URL:  quku_v.global.YINGSHI_PUB_URL ;
	     if( com.operationConfirm(event,'确认要屏蔽该歌曲吗?') ) { 
		       com.operationHandler(event,this.href,location,'屏蔽成功');
	     }
		 return false;
	});
	
	$('a.x-yingshi-dis-prohibit').bind('click', function(event){	    
	     var location = parseInt( $(this).attr('status'),10 ) ? quku_v.global.YINGSHI_NON_PUB_URL : quku_v.global.YINGSHI_PUB_URL ;
		 if( com.operationConfirm(event,'确认要取消屏蔽该歌曲吗?') ) { 
		       com.operationHandler(event,this.href,location,'取消屏蔽成功');
	     }
		 return false;
	});
	
	$('a.x-yingshi-recovery').bind('click',function(event){
	     var location = $(this).attr('status')? quku_v.global.YINGSHI_NON_PUB_URL : quku_v.global.YINGSHI_PUB_URL ;
		if( com.operationConfirm(event,'确认要恢复该歌曲吗?') ) { 
		       com.operationHandler(event,this.href,location,'恢复成功');
	     }
		 return false;
	});
	
});

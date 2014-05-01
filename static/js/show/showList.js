var quku_v = window.quku_v || {};
quku_v.showList = {};

//批量发布
$.extend(quku_v.showList, {	
	//批量发布
	publicAll: function (e){	
		var chks = [],
				url=$(this).attr('href');
		$("input[name='showCheckbox']").each(function(){
			if($(this).prop('checked') == true) {
				chks.push ($(this).val());
			};
		});
		if (chks.length == 0) {
			alert('请选择要发布的演出!' );
			return false;
		}else if(!confirm('确认要批量发布演出吗?')){
			return false;
		}else{
			e.preventDefault();
		};
		
		
		
		jQuery.post(url + '&sn_globalid=' + chks.join(),{},function(sData){
		
			   if(sData.error_code == 0){
				window.location.href = quku_v.global.SHOW_PUB_URL;
			 }
			 else{
				quku_v.com.showValidateInfo('show',sData);
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
	
		var checkedArtist = new Array();
		var checkboxs = $('input[name="showCheckbox"]');
		
		for (var i = 0; i < checkboxs.length; i++) {
			if ($(checkboxs[i]).prop('checked')) {
				checkedArtist.push( $(checkboxs[i]).val() );
			}
		}
		
		if (checkedArtist.length == 0) {
			alert( '请选择要删除的演出!' );
			event.preventDefault();
			return ;
		}
		
		if (!confirm('确认要批量删除演出吗?')) {
			event.preventDefault();
			return ;
		}
		$(this).attr( 'href', $(this).attr('href') + '&sn_globalid=' + checkedArtist.toString() );
		  event.preventDefault();  	
		  var qUrl = $(this).attr('href');
		   quku_v.com.syncDel(qUrl);	
  
  
	
		
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
	 * @param {si_globalid}   演出id	  
	 * @return {}  屏蔽演出
	 */
	newCreatDialog: function(si_globalid) {
		var dialog = this.createCreationDialog(si_globalid);
		dialog.popup();
	},
	/**
	 * 
	 * @method createCreationDialog
	 * @param {si_globalid} 演出id	  
	 * @return {}  创建演出屏蔽窗口
	 */
	createCreationDialog: function(si_globalid){
		baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
		return new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url:'/index.php?c=song&m=edit&si_globalid='+ si_globalid+'&tn=song_prohibitDialog'},Quku.dialogSpecs.XL_L)
		);
	}


}) 

$(document).ready( function () {
    var T = quku_v.showList, com = quku_v.com ;
    //列表项全选
	$('input[name="batchCheckbox"]').click(function() {
		$('input[name="showCheckbox"]').prop('checked', $(this).prop('checked'));
	});
	
	
	//批量删除
	
	$('a.batchDelete').click(T.batchOperation);
	
	$('a.showedit').click(T.checkBlock);
	
	//批量发布
  	$('.publishAll').click(T.publicAll);
	
	$('a.x-show-offline').bind('click' , function(event){	     
		if( com.operationConfirm(event,'确认要下线该演出吗?') ) 
		{
		      com.operationHandler(event,this.href,quku_v.global.SHOW_NON_PUB_URL,'下线成功');
		} 
		return false;
	}) ;
	
	$('a.x-show-pub').bind('click', function(event){
	      if( com.operationConfirm(event,'确认要发布该演出吗?') ) 
		  { 
		      com.operationHandler(event,this.href,quku_v.global.SHOW_PUB_URL,'发布成功');
		  }
		return false;
	});
	
	$('a.x-show-del').bind('click', function(event){
	
	     if( com.operationConfirm(event,'确认要删除该演出吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.SHOW_NON_PUB_URL,'删除成功');
	     }
		 return false;
	});

	$('a.x-show-recovery').bind('click',function(event){
		if( com.operationConfirm(event,'确认要恢复该演出吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.SHOW_NON_PUB_URL,'恢复成功');
	     }
		 return false;
	});
	
});
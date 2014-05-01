var quku_v = window.quku_v || {};
quku_v.optionList = {};


$.extend(quku_v.optionList, {	
	 /** 
	 * 批量删除
	 * @method batchOperation
	 * @param {event} click事件 
	 * @param {msg}   事件当前对象
	 * @return {}  如果用户否定，结束事件传递
	 */
	batchOperation: function (event) {
	
		var checkedalbum = new Array();
		var checkboxs = $('input[name="optionbox"]');
		
		for (var i = 0; i < checkboxs.length; i++) {
			if ($(checkboxs[i]).prop('checked')) {
				checkedalbum.push( $(checkboxs[i]).val() );
			}
		}
		
		if (checkedalbum.length == 0) {
			alert( '请选择要删除的词典。' );
			event.preventDefault();
			return ;
		}
		
		if (!confirm('确认要批量删除词典吗?')) {
			event.preventDefault();
			return ;
		} 
	
	  $(this).attr( 'href', $(this).attr('href') + '&od_id=' + checkedalbum.toString() );
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
	 * @param {si_globalid}   歌曲id	  
	 * @return {}  屏蔽歌曲
	 */
	newCreatDialog: function(si_globalid) {
		var dialog = this.createCreationDialog(si_globalid);
		dialog.popup();
	},
	/**
	 * 
	 * @method createCreationDialog
	 * @param {si_globalid} 歌曲id	  
	 * @return {}  创建歌曲屏蔽窗口
	 */
	createCreationDialog: function(si_globalid){
		baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
		return new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url:'/index.php?c=song&m=edit&si_globalid='+ si_globalid+'&tn=song_prohibitDialog'},Quku.dialogSpecs.XL_L)
		);
	}


}) 

$(document).ready( function () {
    var T = quku_v.optionList, com = quku_v.com ;
    //列表项全选
	$('input[name="batchCheckbox"]').click(function() {
		$('input[name="optionbox"]').prop('checked', $(this).prop('checked'));
	});
	 
	//批量删除
	
	$('a.batchDelete').click(T.batchOperation);
	
	$('a.showedit').click(T.checkBlock);
	
	
	$('a.x-option-del').bind('click', function(event){
	
	     if( com.operationConfirm(event,'确认要删除该词典吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.OPTION_PUB_URL,'删除成功');
	     }
		 return false;
	});

	$('a.x-option-recovery').bind('click',function(event){
		if( com.operationConfirm(event,'确认要恢复该词典吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.OPTION_PUB_URL,'恢复成功');
	     }
		 return false;
	});
	
});
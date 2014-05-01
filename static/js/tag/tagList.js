var quku_v = window.quku_v || {};
quku_v.tagList = {};

//批量发布
$.extend(quku_v.tagList, {	
	
	 /** 
	 * 批量删除
	 * @method batchOperation
	 * @param {event} click事件 
	 * @param {msg}   事件当前对象
	 * @return {}  如果用户否定，结束事件传递
	 */
	batchOperation: function(event) {
		var checkedTag = new Array();
		var checkboxs = $('input[name="tagCheckbox"]');
		
		for (var i = 0; i < checkboxs.length; i++) {
			if ($(checkboxs[i]).prop('checked')) {
				checkedTag.push( $(checkboxs[i]).val() );
			}
		}
		
		if (checkedTag.length == 0) {
			alert('请选择要删除的标签' );
			//非ie下，如果是ie，则 event.returnValue = false;
			event.preventDefault();
			return ;
		}
		
		if (!confirm('确认要批量删除标签吗?')) {
			event.preventDefault();
			return ;
		} 
		
		$(this).attr( 'href', $(this).attr('href') + '&td_tagid=' + checkedTag.toString() );
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
	}
	
	
	

}) 


$(document).ready( function () {
    var T = quku_v.tagList, com = quku_v.com ;
    //列表项全选
	$('input[name="batchCheckbox"]').click(function() {
		$('input[name="tagCheckbox"]').prop('checked', $(this).prop('checked'));
	});
	
	
	$('a.x-tag-del').bind('click', function(event){
	
	     if( com.operationConfirm(event,'确认要删除该标签吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.TAG_LIST_URL,'删除成功');
	     }
		 return false;
	});
	
});
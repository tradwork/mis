var quku_v = window.quku_v || {};
quku_v.artistList = {};

//批量发布
$.extend(quku_v.artistList, {	
	//批量发布
	publicAll: function(e){
		var chks = [],
				url=$(this).attr('href');
		$("input[name='artistCheckbox']").each(function(){
			if($(this).prop('checked') == true) {
				chks.push ($(this).val());
			};
		});
		if (chks.length == 0) {
			alert('请选择要发布的明星!' );
			return false;
		}else if(!confirm('确认要批量发布明星吗?')){
			return false;
		}else{
			e.preventDefault();
		};
		jQuery.post(url + '&ab_globalid=' + chks.join(),{},function(sData){
			  if(sData.error_code == 0){
				window.location.href = quku_v.global.ARTIST_PUB_URL;
			 }
			 else{
				quku_v.com.showValidateInfo('artist',sData);
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
	batchOperation: function(event) {
		var checkedArtist = new Array();
		var checkboxs = $('input[name="artistCheckbox"]');
		
		for (var i = 0; i < checkboxs.length; i++) {
			if ($(checkboxs[i]).prop('checked')) {
				checkedArtist.push( $(checkboxs[i]).val() );
			}
		}
		
		if (checkedArtist.length == 0) {
			alert('请选择要删除的明星' );
			//非ie下，如果是ie，则 event.returnValue = false;
			event.preventDefault();
			return ;
		}
		
		if (!confirm('确认要批量删除明星吗?')) {
			event.preventDefault();
			return ;
		} 
		
		$(this).attr( 'href', $(this).attr('href') + '&ab_globalid=' + checkedArtist.toString() );
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
    var T = quku_v.artistList, com = quku_v.com ;
    //列表项全选
	$('input[name="batchCheckbox"]').click(function() {
		$('input[name="artistCheckbox"]').prop('checked', $(this).prop('checked'));
	});
	//批量删除
	
	$('a.batchDelete').click(T.batchOperation);
	
	$('a.showedit').click(T.checkBlock);
	
	//批量发布
  	$('.publishAll').click(T.publicAll);
	
	$('a.x-art-offline').bind('click' , function(event){	     
		if( com.operationConfirm(event,'确认要下线该明星吗?') ) 
		{
		      com.operationHandler(event,this.href,quku_v.global.ARTIST_NON_PUB_URL,'下线成功');
		} 
		return false;
	}) ;
	$('a.x-art-pub').bind('click', function(event){
	      if( com.operationConfirm(event,'确认要发布该明星吗?') ) 
		  { 
		      com.operationHandler(event,this.href,quku_v.global.ARTIST_PUB_URL,'发布成功');
		  }
		return false;
	});
	
	$('a.x-art-del').bind('click', function(event){
	
	     if( com.operationConfirm(event,'确认要删除该明星吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.ARTIST_NON_PUB_URL,'删除成功');
	     }
		 return false;
	});
	
	$('a.x-art-recovery').bind('click',function(event){
		if( com.operationConfirm(event,'确认要恢复该明星吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.ARTIST_NON_PUB_URL,'恢复成功');
	     }
		 return false;
	});
	
});
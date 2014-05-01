var quku_v = window.quku_v || {};
quku_v.songList = {};

//批量发布
$.extend(quku_v.songList, {	
	//批量发布
	publicAll: function (e){
		var chks = [],
				url=$(this).attr('href');
		$("input[name='albumCheckbox']").each(function(){
			if($(this).prop('checked') == true) {
				chks.push ($(this).val());
			};
		});
		if (chks.length == 0) {
			alert('请选择要发布的专辑' );
			return false;
		}else if(!confirm('确认要批量发布专辑吗?')){
			return false;
		}else{
			e.preventDefault();
		};
		
		jQuery.post(url + '&ai_globalid=' + chks.join(),{},function(sData){
			 if(sData.error_code == 0){
				window.location.href = quku_v.global.ALBUM_PUB_URL;
			 }
			 else{
				quku_v.com.showValidateInfo('album',sData);
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
	
		var checkedalbum = new Array();
		var checkboxs = $('input[name="albumCheckbox"]');
		
		for (var i = 0; i < checkboxs.length; i++) {
			if ($(checkboxs[i]).prop('checked')) {
				checkedalbum.push( $(checkboxs[i]).val() );
			}
		}
		
		if (checkedalbum.length == 0) {
			alert( '请选择要删除的专辑吗?' );
			event.preventDefault();
			return ;
		}
		
		if (!confirm('确认要批量删除专辑吗?')) {
			event.preventDefault();
			return ;
		} 
	
	  $(this).attr( 'href', $(this).attr('href') + '&ai_globalid=' + checkedalbum.toString() );
	  event.preventDefault();  	
	  var qUrl = $(this).attr('href');
	  quku_v.com.syncDel(qUrl);	
	},
//批量恢复	
	batchDisDelete: function (e){
		var chks = [],
				url=$(this).attr('href');
		$("input[name='albumCheckbox']").each(function(){
			if($(this).prop('checked') == true) {
				chks.push ($(this).val());
			};
		});
		if (chks.length == 0) {
			alert('请选择要恢复的专辑' );
			return false;
		}else if(!confirm('确认要批量恢复专辑吗?')){
			return false;
		}else{
			e.preventDefault();
		};
		
		jQuery.post(url + '&ai_globalid=' + chks.join(),{},function(sData){
			 if(sData.error_code == 0){
				window.location.href = quku_v.global.ALBUM_NON_PUB_URL;
			 }
			 else{
				quku_v.com.showValidateInfo('album',sData);
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
    var T = quku_v.songList, com = quku_v.com ;
    //列表项全选
	$('input[name="batchCheckbox"]').click(function() {
		$('input[name="albumCheckbox"]').prop('checked', $(this).prop('checked'));
	});
	
	
	//批量删除
	
	$('a.batchDelete').click(T.batchOperation);
	
	$('a.showedit').click(T.checkBlock);
	//批量恢复	
	$('a.batchDisDelete').click(T.batchDisDelete);
	
	$('a.showedit').click(T.checkBlock);
	//批量发布
  	$('.publishAll').click(T.publicAll);
	
	$('a.x-album-offline').bind('click' , function(event){	     
		if( com.operationConfirm(event,'确认要下线该歌曲吗?') ) 
		{
		      com.operationHandler(event,this.href,quku_v.global.ALBUM_NON_PUB_URL,'下线成功');
		} 
		return false;
	}) ;
	
	$('a.x-album-pub').bind('click', function(event){
	      if( com.operationConfirm(event,'确认要发布该专辑吗?') ) 
		  { 
		      com.operationHandler(event,this.href,quku_v.global.ALBUM_PUB_URL,'发布成功');
		  }
		return false;
	});
	
	$('a.x-album-del').bind('click', function(event){
	
	     if( com.operationConfirm(event,'确认要删除该专辑吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.ALBUM_NON_PUB_URL,'删除成功');
	     }
		 return false;
	});

	$('a.x-album-recovery').bind('click',function(event){
		if( com.operationConfirm(event,'确认要恢复该专辑吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.ALBUM_NON_PUB_URL,'恢复成功');
	     }
		 return false;
	});
	$('a.x-album-delall').bind('click',function(event){
		if( com.operationConfirm(event,'确认要删除该专辑及专辑内全部单曲吗?') ) { 
		       com.operationHandler(event,this.href,quku_v.global.ALBUM_NON_PUB_URL,'全部删除成功');
	     }
		 return false;
	});
});

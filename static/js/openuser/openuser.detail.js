(function(){
	$(function(){
		var openmis = openmis || {};

		function jumpPage(){
			document.write('<h4>确认操作已成功，正在为您跳转回待认证列表...</h4>');
			setTimeout(function(){ 
				window.location.href = '/index.php?c=openuser&m=search&tn=openuser_wait&ou_status=0&ou_user_type=1&order={"ou_complete":1}';
			},2000);
		}

		$('#btn_pass').bind('click',function(){
			var ou_id = $(this).data('id')
			$('#dialog_pass').dialog({
				width: 280,
				bgiframe: true,
				confirm:{
					callback: function(){
						$.ajax({
							url: '/index.php?c=openuser&m=pass',
							data: 'ou_id='+ ou_id,
							datatype: 'json',
							success: function(res){
								jumpPage();
							}
						});
					}
				}
			}).dialog("show");
		});

		$('#btn_refuse').bind('click',function(){
			var ou_id = $(this).data('id'),ou_fail_reason = $('input[name="ou_fail_reason"]:checked').val();

			$('#dialog_refuse').dialog({
			    width: 380,
			    bgiframe: true,
			    confirm:{
			        callback: function() {
			        	var ou_fail_reason = $('input[name="ou_fail_reason"]:checked').val(),
			        		ou_fail_reason = ou_fail_reason == 1 ? $('.fail_reason_text1').val() : $('.fail_reason_text2').text();
			        	if(undefined === ou_fail_reason){
			        		return false;
			        	}else{
							$.ajax({
								type: 'post',
								url: '/index.php?c=openuser&m=fail',
								data: {
									ou_id: ou_id,
									ou_fail_reason: ou_fail_reason
								},
								datatype: 'json',
								success: function(res){
									jumpPage();
								}
							});
						}
			        }
			    }
			}).dialog("show");
		});

		// 图片展示
		var $mask = $('.mask-bg'),
			imgWrap = '.img-container',
			$imgInfo = $('.ul_img_info li'),
			$thumbsReq = $('#img_required_thumbs li img'),
			$thumbsOpt = $('#img_optional_thumbs li img'),
			$ulReq = $('#img_required'),
			$ulOpt = $('#img_optional'),
			$prev = $('.btn-prev'),
			$next = $('.btn-next'),
			WIDTH = $imgInfo.width(),
			SPEED = 200;

		function showExpand(ul,i){
			$(ul).data('cur-index',i).css('left','-'+(i-1)*WIDTH+'px').show()
			.parents(imgWrap).data("show",$(ul).attr('id')).show();
			var h = $("li:nth-child("+i+")",ul).find('img').height()+60;
			$(imgWrap).css({
				"height": h+'px',
				'margin-top':'-'+(h/2)+'px'
			});
			$mask.show();
		}

		function slideImg(ul,to){
			$(ul).data("cur-index",to);
			var l = (to-1)*WIDTH,
				h = $("li:nth-child("+to+")",ul).find('img').height()+60;
			$(imgWrap).css({
				"height": h+'px',
				'margin-top':'-'+(h/2)+'px'
			});
			$(ul).css({'left':'-'+l+'px'});
		}


		$thumbsReq.each(function(i){
			$(this).bind('click',function(){
				showExpand($ulReq,i+1);
			});
		});

		$thumbsOpt.each(function(i){
			$(this).bind('click',function(){
				showExpand($ulOpt,i+1);
			});
		});

		$('div',$imgInfo).click(function(){
			$(this).parents('ul').hide();
			$(imgWrap).hide();
			$mask.hide();
		});
		
		$prev.click(function(){
			var $ul = $('#'+$(this).parent(imgWrap).data("show")),
				cur = $ul.data("cur-index"),
				total = $('li',$ul).length,
				to = cur - 1,
				to = (to < 1 ? total : to);
			slideImg($ul,to);
			return false;
		});

		$next.click(function(){
			var $ul = $('#'+$(this).parent(imgWrap).data("show")),
				cur = $ul.data("cur-index"),
				total = $('li',$ul).length,
				to = cur + 1;
				to = (to > total ? 1 : to);
			slideImg($ul,to);
			return false;
		});

	});
})(jQuery);
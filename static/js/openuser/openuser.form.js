(function(){
	$(function(){

		var mergeParam =  function(origin,newdata){
			var merge = { },mergeArr = [];
			for(var i in origin){
				for(var j in newdata){
					if(newdata[j]){
						if( i !== j ){
						  merge[i] = origin[i];
						  merge[j] = newdata[j];
						}else{
						  merge[i] = newdata[j];
						}
					}else{
						merge[j] = "";
					}
				}
			}
			for(var key in merge){
				if(merge[key]){
					mergeArr.push(key+'='+merge[key]);
				}
			}
			return mergeArr.join('&');
		}

		var getKeyValue = function(url) {
			var result = {};
			var reg = new RegExp('([\\?|&])(.+?)=([^&?]*)', 'ig');
			var arr = reg.exec(url);
			while (arr) {
				result[arr[2]] = arr[3];
				arr = reg.exec(url);
			}
			return result;
		}

		var originParam = getKeyValue(window.location.href);

		var getNewParam = function(formData){
			return mergeParam(originParam,formData);
		}

		// 待认证列表页筛选
		$('#form_wait').find('select').bind('change',function(){
			var formData = {
				ou_user_type : $('#ou_user_type').val(),
				ou_jointime  : $('#ou_jointime').val(),
				order : '{"ou_complete":'+$("#ou_complete").val()+',"ou_jointime":'+$("#sort_jointime").data("sort")+'}'
			};
			window.location.href = "/index.php?"+getNewParam(formData);

		});

		// 其他列表页的筛选
		var reloadSearchList = function(){
			var	formData = { 
					ou_approve_user : $('#ou_approve_user').val(), 
					search_field : $('#search_type').val(), 
					search_content: $('#search_query').val()
				};
			window.location.href = "/index.php?"+getNewParam(formData);
		}

		$('form.form-search').find('#search_btn').bind('click',reloadSearchList);

		$('form.form-search').find('#ou_approve_user').bind('change',reloadSearchList);

		// 认证通过页的封禁功能
		$('#openuser_tabel_pass').find('.opp-forbid').bind('click',function(){
			var ou_id = $(this).data('item').id, ou_company = $(this).data('item').company;
			var $item = $(this).parents('tr');
			$('<div><p>您确认封禁<b>'+ou_company+'</b>?</p></div>').appendTo($('body')).dialog({
			      width: 280,
			      bgiframe: true,
			      confirm: {
			        callback: function() {
			        	$.ajax({
							url: '/index.php?c=openuser&m=forbid',
							data: 'ou_id='+ou_id,
							datatype: 'json',
							success: function(res){
								$item.animate({
									opacity: 'hide'
								},500);
							}
						});
			        }
			    }
		    }).dialog('show');
			return false;
		});

		// 时间排序功能
		$('.sort-time').bind('click',function(){
			var cur_sort = $(this).data('sort'),new_sort=!cur_sort+0;
			var order = $('#ou_complete').length ? { ou_complete : $("#ou_complete").val() } : {},formData = {};
			order[$(this).attr('id').replace('sort','ou')] = new_sort;
			formData.order = JSON.stringify(order);
			window.location.href = '/index.php?'+getNewParam(formData);

		});
		

	});
})(jQuery);
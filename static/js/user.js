var User = {
	initForm : function () {	
		
	},
	save : function () {
		var sAction = $('#action').val();
		var param = quku_v.user.formArray.getValue();
		if(sAction == "doEdit"){
			param.ub_id = $('#ub_id').val();
		}
		jQuery.post(
			'?c=user&m='+sAction,param,
			function(sData){
				if(sAction == 'doCreate'){
					if(sData.error_code == 0){
						//TODO show more humanization
						alert('添加成功');
						window.location.href = '?c=user&m=search&tn=user_list';
					}
					else{
						quku_v.com.showValidateInfo('user',sData);
					}
				}
				else{
					if(sData.error_code == 0){
						alert('修改成功');
						window.location.href = '?c=user&m=search&tn=user_list';
						//window.location.reload();
					}
					else{
						quku_v.com.showValidateInfo('user',sData);
					}
				}
			},'json'
		);
	},
	deleteUser : function (iUserid) {
	  if(confirm("您确认要删除该用户吗？")){
		  jQuery.post(
				'?c=user&m=delete&ub_id=' + iUserid,
				{},
				function(sData){
					switch(sData){
            case "-3":{alert('删除失败')}break;
            case "-5":{alert('您权限不足')}break;
            default:{alert('删除成功');window.location.href = '?c=user&m=search&tn=user_list';
            }
					}
				},'text');
	  }
	},
	checkUsername : function () {
		var iUsername = $.trim($('#username').val());
		var $nbName = $('#nbName');
		var pattern = /\w[^_][^\W]{1,32}$/;
		if(!pattern.test(sTel)){
			$nbName.html('用户名录入有误');
			return 1;
		}
		else{
			$tipTel.html('');
			return 0;
		}
	}
}
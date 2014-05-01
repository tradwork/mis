var Option = {
    initForm : function () {    
        
    },
    save : function (checked) {
		var sAction = $('#action').val();
        jQuery.post(
            '?c=option&m='+sAction,
            this.construnctPostQueryString(),
            function(sData){
                if(sAction == 'doCreate'){
                    if(sData.error_code == 0){
                        //TODO show more humanization
                        alert('添加成功');
                        window.location.href = '?c=option&m=search&tn=option_list';
                    }
                    else{
                        quku_v.com.showValidateInfo('option',sData);
                    }
                }
                else{
                    if(sData.error_code == 0){
                        alert('修改成功');
                        window.location.href = '?c=option&m=search&tn=option_list';
                    }
                    else{
                        quku_v.com.showValidateInfo('option',sData);
                    }
                }
            },'json'
        );
    },
    construnctPostQueryString : function() {
        //必填信息
       var jsonData = quku_v.optionForm.formArray.getValue();
	   $.extend(jsonData,{
	     'od_id':$('#od_id').val()
	   })
	   return jsonData;
    }
}
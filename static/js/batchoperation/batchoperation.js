var Batchoperation = {
	initForm : function () {

	},
	submit : function (type) {
		var form;
		var formData = this.construnctPostQueryString();
	    if(!formData){
		return false;
	    }

	    if( type == "db"){
			form = $("#batchoperationDbForm")[0];
			form.table.value = formData.table;
			form.fields.value = formData.fields;
			form.si_distribution.value = formData.si_distribution;
	    }else if(type == "prohibit"){
			form = $("#prohibitForm")[0];
	    }
	    else if(type == "replace"){
			form = $("#replaceForm")[0];
			form.table.value = formData.replace_table;
			form.fields.value = formData.fields;
	    }
	    else if(type == "fpid"){
			form = $("#autoForm")[0];
	    }
	    else if(type == "auto_album"){
			form = $("#autoAlbumForm")[0];
	    }
	    else{
			form = $("#revocationForm")[0];
	    }

	    form.maillist.value = formData.maillist;
	    form.user.value = formData.user;
	    form.tasktype.value = formData.tasktype;
	    form.source.value = "mis";
	    form.action = quku_v.batchoperation.data.st_url;
	    form.submit();
	    alert("提交成功");
	    return true;
	},
    construnctPostQueryString : function() {
	    var T = quku_v.batchoperationForm,
	    	formData = {};


		if($("#tasktype").radiofield('getValue') == 'db'){

			var formData = T.formArray.getValue();

			if(formData.table ==""){
				alert("请选择操作表");
				return false;
			}
			if(formData.maillist == "" ){
				alert("请填写邮件列表");
				return false;
			}

			var str = [], formConditions = $('.updateData .show'), len = formConditions.length, value='';
			//console.log('len: ' + len);
			str.push('[');
			for(var i=0; i< len; i++){
			   value = $( formConditions[i] ).editgrid('getValue');

			 //  console.log($( formConditions[i] ).attr('id') + '　is :' +value);
			   if(value == '[]')
			   { continue; }
			   str.push( value );
			   str.push(',') ;
			}

			if(str.length > 2) str.pop();
			str.push(']') ;
			formData['fields'] = str.join('');
			formData['si_distribution'] = $("#si_distribution_value_0").val();
			formData.ids =  $("#updateDataId input").val();

		}else if($("#tasktype").radiofield("getValue") == "replace"){	
		    var formData = T.formArray.getValue();

		    if(formData.replace_table ==""){
			alert("请选择操作表");
			return false;
		    }
		    if(formData.maillist == "" ){
			alert("请填写邮件列表");
			return false;
		    }

		    var str = [], formConditions = $('.replaceContent .show'), len = formConditions.length, value='';
		    //	console.log('len: ' + len);
		    str.push('[');
		    for(var i=0; i< len; i++){
			value = $( formConditions[i] ).editgrid('getValue');

			//  console.log($( formConditions[i] ).attr('id') + '　is :' +value);
			if(value == '[]')
			{ continue; }
			str.push( value );
			str.push(',') ;
		    }
		    if(str.length > 2) str.pop();
		    str.push(']') ;
		    formData['fields'] = str.join('');
		    formData.ids =  $("#replaceId input").val();
	    
		}
	else if($("#tasktype").radiofield("getValue") == "prohibit"){
		    formData.ids = $("#updateProhibitDataId input").val();
		    formData.tasktype =  $("#tasktype").radiofield('getValue');
		    formData.maillist =  $("#maillist").textfield('getValue');
		    if(formData.ids == ""){
			alert("请上传操作id");
			return false;
		    }
		}
	else if($("#tasktype").radiofield("getValue") == "auto"){
		    formData.ids = $("#autoDataId input").val();
		    formData.tasktype =  $("#tasktype").radiofield('getValue');
		    formData.maillist =  $("#maillist").textfield('getValue');
		    if(formData.ids == ""){
			alert("请上传操作id");
			return false;
		    }
		}
	else if($("#tasktype").radiofield("getValue") == "auto_album"){
		    formData.ids = $("#autoAlbumDataId input").val();
		    formData.tasktype =  $("#tasktype").radiofield('getValue');
		    formData.maillist =  $("#maillist").textfield('getValue');
		    if(formData.ids == ""){
			alert("请上传操作id");
			return false;
		    }
		}

	else{

			formData.rollbackid =  $("#rollbackid").textfield('getValue');
			formData.tasktype =  $("#tasktype").radiofield('getValue');
			formData.maillist =  $("#maillist").textfield('getValue');

			if( formData.rollbackid == "" ){
				alert("请输入回滚id");
				return false;
			}
		}

		formData.user =  quku_v.batchoperation.data.user;
		return formData;

    }
};

function success_jsonpCallback ( data ){
// console.log( 1111111 );
}

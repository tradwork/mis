var Statistic = {
	initForm : function () {
		
	},	
	submit : function (type) {
		var form;
		var formData = this.construnctPostQueryString();
	    if( type == "db"){
			form = document.getElementById("statisticForm");
			form.needpv.value = formData.needpv_v;
			form.conditions.value = formData.conditions_v;
			form.main_table.value = formData.main_tables;
			form.relations.value = formData.relation_table;
			form.fields.value = formData.fields_v;
	    }else if(type == "title"){
			form = document.getElementById("prohibitForm");
	    }
	    else if(type == "fpid"){
			form = document.getElementById("autoForm");
	    }
	    else{
	    	form = document.getElementById("statisticForm");
	    }

		form.tasktype.value = formData.tasktype;
		form.maillist.value = formData.maillist_v;
		form.user.value = quku_v.statistic.data.user;
		form.source.value = "mis";
		form.action = quku_v.statistic.data.st_url;
	    form.method = "post";
	    alert("提交成功");
		return true;
	},
    construnctPostQueryString : function() {		
		var formData = quku_v.statisticForm.formArray.getValue();
		
		if($("#tasktype").radiofield('getValue') == 'db'){
			var str = [], formConditions = $('.updateData .show'), len = formConditions.length, value='';
			for(var i=0; i< len; i++){
			   value = $( formConditions[i] ).editgrid('getValue');
			   //console.log($( formConditions[i] ).attr('id') + '　is :' +value);
			   if(value == '[]')
			   { continue; }
			   str.push( value );
			   console.log(value)
			}

			if(str.length > 2) str.pop();
			formData['conditions_v'] = str.join('');
			return formData;
		}
		else if($("#tasktype").radiofield("getValue") == "title"){
		    formData.tasktype =  $("#tasktype").radiofield('getValue');
		    formData.maillist =  $("#maillist").textfield('getValue');
		    formData.ids = $("#updateProhibitDataId input").val();
		    formData.sim = $("#updateProhibitDataId_userfile_1").val();
		    if(formData.ids == ""){
				alert("请上传操作id");
				return false;
		    }

		    return formData;
		}
		else if($("#tasktype").radiofield("getValue") == "fpid"){
		    formData.tasktype =  $("#tasktype").radiofield('getValue');
		    formData.maillist =  $("#maillist").textfield('getValue');
		    formData.ids = $("#autoDataId input").val();
		    if(formData.ids == ""){
				alert("请上传操作id");
				return false;
		    };
		    return formData;
		}		
    }
};


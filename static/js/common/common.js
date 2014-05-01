 /**
 * 曲库公共功能开发，与具体业务无关
 * @author 
 * @version 1.0.1
 * @date 2011/12/19 12:01 pm
 * 每位工程师都有保持代码优雅的义务
 * _each engineer has a duty to keep the code elegant
 */
 
 
quku_v = window.quku_v || {};
quku_v.com = quku_v.com || {};
$.extend(quku_v.com, {
	/**
	 * 异步删除，删除后刷新当前页
	 * @method syncDel
	 * @param {extQueryString} 请求的链接
	 * @return {} 
	 */
  syncDel:function(extQueryString){
  
    jQuery.post(extQueryString,{},function(sData){
	  if(sData.error_code == 0){
				window.location.reload();
			 }
			 else{
				quku_v.com.showValidateInfo('common',sData);
			 }
    },'json') ;
	
  },
    HTMLEncode:function(html){
	var temp = document.createElement ("div");
	(temp.textContent != null) ? (temp.textContent = html) : (temp.innerText = html);
	var output = temp.innerHTML;
	temp = null;
	return output;
    },

    HTMLDecode:function(text){
	var temp = document.createElement("div");
	temp.innerHTML = text;
	var output = temp.innerText || temp.textContent;
	temp = null;
	return output;
    },
  /**
	 * 异步删除，删除后刷新当前页
	 * @method syncCheckBlock
	 * @param {extQueryString} 请求的链接
	 * @return {} 
	 */
  syncCheckBlock:function(extQueryString){
    var text='此文件正在编辑中，请稍后再试！';
    jQuery.get(extQueryString,{},function(data){ 
      switch(data.replace(/(\x0A|\uFEFF)/g,"")){
        case "-5": alert(text)
        break;
        case "-3": alert(text)
        break;
        default:window.location.href=extQueryString;
      }
    },'text')
  },
  /**
	 * 显示错误信息
	 * @method showValidateInfo
	 * @param {model} 错误信息模块
	 * @param {sData} 返回提示信息
	 * @return {} 
	 */
  showValidateInfo : function (model, sData) {
		if(sData.error_code == -5){
			alert("你没有权限进行该操作!");
			return;
		}
		if(sData.error_message != ''){
		    var str = '';
		    for(var i = 0,len = sData.error_message.length; i < len ; i++)
			{
			    str =str + sData.error_message[i] + '\r\n';
			}
		    alert(str);
			return ;
		}
		/*
		for(q in sData.data) {
			responseData = sData.data[q]['data'];
			for(p in responseData) {
				
				$('#nb_'+p).html("");
				
				if(responseData[p] != 100) {
					if(p.search('uniqfile')==0){
						var i = p.replace("uniqfile_","");
						$("#tableAudio .nb_uniqfile:visible").eq(i).html(this.errorCodeToString(model, responseData[p]))
					}else{
						
						$('#nb_'+p).html(this.errorCodeToString(model, responseData[p]));
						$('#nb_'+p).css("display","inline");
						$('#nb_'+p).css("color","red");
					}
				}
			}
		}
		*/
	},/*
	errorCodeToString : function (model,errno) {
		
		var mapArray = {'tv':{'101':'不能为空','109':'数据已存在'},'movie':{'101':'不能为空','109':'数据已存在'},
				'artist':{'101':'不能为空','109':'数据已存在','105':'数据不合法'},'song':{'101':'不能为空','109':'数据已存在'},'dictionary':{'101':'不能为空','109':'数据已存在'},'album':{'105':'数据不合法'},'tag':{'101':'不能为空', '102': '内容过长', '103' : '内容不可以重复', '104' : '该选项不存在', '105' : '输入数据不合法'}};
		if( mapArray[model] &&  mapArray[model][errno]){
			return mapArray[model][errno];
		}else{
			return "请正确填写该行信息"
		}
	},
	*/
	/*
	*  确认提示窗处理
	*/
	 /**
	 * 根据用户确认决定是否执行后续代码
	 * @method operationConfirm
	 * @param {event} click事件 
	 * @param {msg}   事件当前对象
	 * @return {}  如果用户否定，结束事件传递
	 */
	operationConfirm: function(event,msg) {
		if(!confirm(msg)){
			var e = event || window.event;
			if(e.preventDefault){
				e.preventDefault();
			}
			e.returnValue = false;
			return false;
		}
		return true;
	},
	 /**
	 * 列表记录操作 处理方法,如下线、发布、删除
	 * @method operationHandler
	 * @param {event} click事件 
	 * @param {obj}   事件当前对象
	 * @param {url}  当前链接处理完后的跳转链接
	 * @param {info}  当前链接处理完后的提示信息	  
	 * @return {}  跳转到 url
	 */
	operationHandler: function(event,opUrl,url,info,callback){
	
	   jQuery.post(
				opUrl,
				'',
				function(sData){
					if(sData.error_code == 0){	
						if(typeof callback !='undefined'){
						   callback();
						}
						
						alert(info);
						window.location.href = url;
						
					}
					else{
						alert(sData.error_message[0])
					}				
				},'json'
			);
		 
	   return false;
	}
  
});

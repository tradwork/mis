 /**
 * ���⹫�����ܿ����������ҵ���޹�
 * @author 
 * @version 1.0.1
 * @date 2011/12/19 12:01 pm
 * ÿλ����ʦ���б��ִ������ŵ�����
 * _each engineer has a duty to keep the code elegant
 */
 
 
quku_v = window.quku_v || {};
quku_v.com = quku_v.com || {};
$.extend(quku_v.com, {
	/**
	 * �첽ɾ����ɾ����ˢ�µ�ǰҳ
	 * @method syncDel
	 * @param {extQueryString} ���������
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
	 * �첽ɾ����ɾ����ˢ�µ�ǰҳ
	 * @method syncCheckBlock
	 * @param {extQueryString} ���������
	 * @return {} 
	 */
  syncCheckBlock:function(extQueryString){
    var text='���ļ����ڱ༭�У����Ժ����ԣ�';
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
	 * ��ʾ������Ϣ
	 * @method showValidateInfo
	 * @param {model} ������Ϣģ��
	 * @param {sData} ������ʾ��Ϣ
	 * @return {} 
	 */
  showValidateInfo : function (model, sData) {
		if(sData.error_code == -5){
			alert("��û��Ȩ�޽��иò���!");
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
		
		var mapArray = {'tv':{'101':'����Ϊ��','109':'�����Ѵ���'},'movie':{'101':'����Ϊ��','109':'�����Ѵ���'},
				'artist':{'101':'����Ϊ��','109':'�����Ѵ���','105':'���ݲ��Ϸ�'},'song':{'101':'����Ϊ��','109':'�����Ѵ���'},'dictionary':{'101':'����Ϊ��','109':'�����Ѵ���'},'album':{'105':'���ݲ��Ϸ�'},'tag':{'101':'����Ϊ��', '102': '���ݹ���', '103' : '���ݲ������ظ�', '104' : '��ѡ�����', '105' : '�������ݲ��Ϸ�'}};
		if( mapArray[model] &&  mapArray[model][errno]){
			return mapArray[model][errno];
		}else{
			return "����ȷ��д������Ϣ"
		}
	},
	*/
	/*
	*  ȷ����ʾ������
	*/
	 /**
	 * �����û�ȷ�Ͼ����Ƿ�ִ�к�������
	 * @method operationConfirm
	 * @param {event} click�¼� 
	 * @param {msg}   �¼���ǰ����
	 * @return {}  ����û��񶨣������¼�����
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
	 * �б��¼���� ������,�����ߡ�������ɾ��
	 * @method operationHandler
	 * @param {event} click�¼� 
	 * @param {obj}   �¼���ǰ����
	 * @param {url}  ��ǰ���Ӵ���������ת����
	 * @param {info}  ��ǰ���Ӵ���������ʾ��Ϣ	  
	 * @return {}  ��ת�� url
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

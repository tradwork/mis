var Quku = {
	LOADED:true,
	document:{},pic:{},
	categoryDataGrid:{},
	search:{},

	clearRepeat : function(a) {
		var c=[],b={};  
	    for(var i=0;i<a.length;i++){  
	    	if( ! b[0+a[i]]){  
	    		b[0+a[i]]=1;  
	    		c.push(a[i])  
	    	}  
		}  
		return c;  
	},
	
	dialogSpecs:{
		L:{
			width:600,
			height:380
		},
		S:{
			width:400,
			height:300
		},
		XS:{
			width:350,
			height:250
		},
		M_L:{
			width:500,
			height:380
		},
		L_XL:{
			width:600,
			height:500
		},
		XL:{
			width:680,
			height:500
		},
		XL_XL:{
			width:680,
			height:500
		},
		XL_L:{
			width:680,
			height:360
		},
		XL_XXL:{
			width:880,
			height:500
		},
		XS_S:{
			width:300,
			height:390
		},
		resourceSearcher:{
			width:600,
			height:390
		}
	},
	copyText:function(text){
		 if (window.clipboardData) {
	            window.clipboardData.setData("Text", text);
	        }
	        else 
	            if (navigator.userAgent.indexOf("Opera") != -1) {
	                window.location = text;
	            }
	            else 
	                if (window.netscape) {
	                    try {
	                        netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
	                    } 
	                    catch (e) {
	                        alert("此操作被浏览器拒绝！");
	                    }
	                    var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
	                    if (!clip) 
	                        return;
	                    var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
	                    if (!trans) 
	                        return;
	                    trans.addDataFlavor('text/unicode');
	                    var str = new Object();
	                    var len = new Object();
	                    var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
	                    var copytext = text;
	                    str.data = copytext;
	                    trans.setTransferData("text/unicode", str, copytext.length * 2);
	                    var clipid = Components.interfaces.nsIClipboard;
	                    if (!clip) 
	                        return false;
	                    clip.setData(trans, null, clipid.kGlobalClipboard);
	                }
	        alert('复制成功');
	        return true;
	},
  clearClass:function(oId){
      var oa=$('#'+oId)[0].getElementsByTagName("a");
      var oalen=oa.length;
      for(var i=0;i<oalen;i++){
            oa[i].className="";
      }
  },
  checkLast:function(oId,obj){
  	var currTR = obj.parentNode.parentNode.parentNode.parentNode;
    var oTR=$(currTR).find("tbody").find("tr");
    var oTRlen=oTR.length;
    var arrtemp=[];
    for(var i=0;i<oTRlen-1;i++){
          if(oTR[i].style.display!="none"){
            arrtemp.push(oTR[i]);
          }
    }
    if(arrtemp.length<=1){
      return true;
    }else{
      return false;
    }
  },
  
  //@获取多源数据
  getSourceContent:function(type,id,field,fileType,mark){
	  	var url = '',dialog;
	  	switch(fileType){
	  		case 'image'  :
	  			url += "/qmis/index.php?c=spider&m=getSourcePic"
	  			break;
	  		case 'lrc'  :
	  			url += "/qmis/index.php?c=spider&m=getSourceLrc"
	  			break;
	  		case 'media'  :
	  			url += "/qmis/index.php?c=spider&m=getSourceMedia"
	  			break;
	  		default :
	  			url += "/qmis/index.php?c=spider&m=getSourceContent"
	  	};
	  	if(mark){
	  		url += "&mark=" + mark
	  	};
		dialog = new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url : url+'&tn=common_SourceContent&type='+type+"&id="+id+"&field="+field},Quku.dialogSpecs.L)
		);
		dialog.addEventListener('received', baidu.delegate(Quku, Quku.setSourceContent));
		dialog.popup();
  },
  //@多源数据赋值
  setSourceContent : function(method,response){
	  if(!response){
		  	return false;
	  };
	  switch(response.mark){
  		case 'tablePic' :
  			initPicValue(response["spiderData"]);
  			break;
  		case 'checkbox' :
  			$("input[name='"+response["field"]+"[]']").attr("checked",false);
  			$("input[name='"+response["field"]+"[]']").each(function(){
  				for(var i=0;i<response["spiderData"].length;i++){
  					if(response["spiderData"][i].search($(this).attr("title")) != -1){
  	  					$(this).attr("checked",true);
  	  				};
  				};
  			});
  			break;
  		case 'tableSongPic' :
  			if(!$("#picJsonData").val()){
  				initSinglePicInfo(response["spiderData"][0]);
  				break;
  			};
  			//单曲中存在图片,需要先删除原有图片再进行添加操作.
  			var picInfo = eval('('+$("#picJsonData").val()+')');
  		    jQuery.get("?c=pic&m=delete&pi_link="+picInfo.pi_link,{},function(data){
  		        if(data<0){
  		          alert('图片删除失败');
  		          return false;
  		        }else{
  		        	initSinglePicInfo(response["spiderData"][0]);
  		        	$("#picJsonData").val('');
  		        }
  		      },'text');   	
  			break;
  		case 'tableSongLrc' :
  			//单曲中存在歌词,需要先删除原有歌词,再进行添加操作.
  			if(!$("#lrcJsonData").val()){
  				initLrcInfo(response["spiderData"][0]);
  				break;
  			};
  			var lrcInfo = eval('('+$("#lrcJsonData").val()+')');
  		    jQuery.get("?c=lrc&m=delete&sl_lrclink="+lrcInfo.sl_lrclink+"&sl_globalid=" +lrcInfo.sl_globalid+"&sl_title=" +lrcInfo.sl_title,{},function(data){
  		        if(data<0){
  		          alert('图片删除失败');
  		          return false;
  		        }else{
  		        	initLrcInfo(response["spiderData"][0]);
  		        	$("#lrcJsonData").val('');
  		        }
  		      },'text');   
  			break;
  		case 'tableMediaPic' :
  			initAidioValue(response["spiderData"]);
  			break;
  		default :
  			$("#"+response["field"]).val(response["spiderData"].join(","));	
	  }
  }
}

Menu = {
	var sSub="",
	var saveObj ="",
	saveSub="",
	saveA="",
	init : function(menuItems) {
		menuItems.each(function () {
			this.onclick = Menu.display;
		});
	},
	createMenu : function(stage) {
		var len = menuList.length;
		var strLeft = ""
		for(var i = 0; i < len-1; i++){
			if(menuList[i].url=="") {
				strLeft+="<div class=\"i1\" \"leftLink\"><a href=\"javascript:void(0)\" name=\"leftLink\" rel="+menuList[i].state+">"+menuList[i].title+"</a></div>";
			}else {
				var target = menuList[i].target ? menuList[i].target : "mainFrame";
				strLeft+="<div class=\"i1\" \"leftLink\"><a href="+menuList[i].url+"  target=\""+target+"\" rel="+menuList[i].state+"  name=\"leftLink\">"+menuList[i].title+"</a></div>";
			}
		}
		stage.html(strLeft);
	},
	display :function() {
		var len =arrNewList.res.length-1;
		if(saveSub!="") {
		   saveSub.className="i2";
		}
		if(!/^http:\/\//i.test(this.href)) {
			for(var i=0;i<len;i++) {
				if(this.innerHTML==arrNewList.res[i].title {
					if(arrNewList.res[i].state=="false") {
						var createNode = document.createElement("div");
						var lang = arrNewList.res[i]["data"].length;

						this.parentNode.className="i1open i1on";
						saveObj=this.parentNode;
						saveA = this;
						for(var j=0;j<lang-1;j++) {
							var url = arrNewList.res[i]["data"][j].url,target;
							if(url.match(/^http/)) target = "iframe_cache";
							else target = "iframe_view";
							 sSub+="<div class=\"i2\"> <a name=\"sublink\" rel=\"0\" onclick=\"subLink(this)\"  href=\""+url+"\" target=\""+target+"\">"+arrNewList.res[i]["data"][j].title+"</a></div>";
						}
						createNode.innerHTML=sSub;
						sSub="";
						G("menuId").insertBefore(createNode,this.parentNode.nextSibling);
						arrNewList.res[i].state="true";
					}else {
						this.parentNode.className="i1";
						G("menuId").removeChild(this.parentNode.nextSibling);
						arrNewList.res[i].state="false";
					}
				}
			}
		}
	},
	subLink : function (arg) {
		var obj = document.getElementsByName("sublink");
		if(saveSub!=arg.parentNode)
		{
			saveSub.className="i2";	
		}
		for(var i=0;i<obj.length;i++)
		{
			if(arg.rel=="0")
			{
			saveSub = arg.parentNode;
			arg.parentNode.className="i2on";
			arg.rel="1";
			}else
			{
				obj[i].rel="0";
			}
		}
	}
}
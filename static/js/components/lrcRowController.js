var tabLrc;
var cntLrc;
cntLrc = 0;
$(document).ready(function(){
	tabLrc = document.getElementById('tableLrc');
	if(jsonLrc.length){
		initLrcValue(jsonLrc);
	}
	else{
		addLrcRow(1);
	}
});

// add a new 'lrc record', after a specified one;
//num : how much rows wanted to be added;
//obj : add new rows after this one
//entity :the entity for lrc edit;

function addLrcRow(num,obj,entity){
	num = typeof num == "undefined" || num <= 0 ? 1 : num;
	//政策是obj=null
	obj = typeof obj == "undefined" || !obj ? null : obj;
	entity = typeof entity == "undefined" || !entity ? {} : entity;
	if(obj)	{
		var pObj = obj.parentNode.parentNode;
		var nPObj = typeof pObj.nextSibling == "undefined" || !pObj.nextSibling ? null : pObj.nextSibling;
	}
	else	{
		//找不到最早的版本了，原来不是这么写的
		var pObj = null;
		var nPObj = null;
	}
	//获得
	if($.browser.mozilla)	var t = tblLrc;
	else if($.browser.msie)	var t = tblLrc.childNodes[0];

	for(var n = 0;n<num;n++){
		var a = [],tr=[],td=[],span = [];

		//新建元素
		tr[0] = document.createElement("tr");

		td[0] = document.createElement('td');
		td[1] = document.createElement('td');
		td[2] = document.createElement('td');
		td[3] = document.createElement('td');

		//元素属性
		td[1].className = 'fnbr';
		td[2].className = 'opCell fnbr';
		td[3].innerHTML = '<span id="lrcStatus'+cntLrc+'" style="color:red;"></span>'

		a[0] = document.createElement('a');
		a[1] = document.createElement('a');
		
		span[0] = document.createElement('span');
		span[1] = document.createElement('span');
		span[2] = document.createElement('span');
		span[3] = document.createElement('span');

		input[0].type="file";
		input[0].className="lrcFile";
		input[0].name='lrcFile[]';
		input[0].value='';
		input[0].style='width: 220px;';
		
		//这个要插入innerHTML = '<span><a href="javaScript:void(0)" onclick="Lrc.getLrcList()">从千千获取&gt;&gt;</a>|<a id="lrc_win_btn" onclick="LrcWin.show()" href="javaScript:void(0)">手动添加歌词&gt;&gt;</a></span>'
	}
}
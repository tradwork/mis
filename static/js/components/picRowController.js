var tblPic;
var cntPic;
cntPic = 0;

$(document).ready(function(){
	tblPic = document.getElementById('tablePic');
	// init page
	if(jsonPic.length)	{
		initPicValue(jsonPic);
	}else if(tblPic){
		addPicRow(1);
	}
	$(".addVideoSource").bind("click",function(){
		var cloneNode = $(".sourceBox:first").clone(true);
		$(this).parents('fieldset').append(cloneNode);
	})	
});
function stripX(str){
		return str.replace(/\&amp;/g,'&').replace(/\&lt;/g,'<').replace(/\&gt;/g,'>').replace(/\&quot;/g,'"').replace(/\&#039;/g,'\'');
};
// add a new "pic record" after a specified one.
// num: how much rows wanted to be added
// obj: add new rows after this one
// enity: the entity for pic edit
function addPicRow(num, obj, entity){
	num = typeof num == "undefined" || num <= 0 ? 1 : num;
	obj = typeof obj == "undefined" || !obj ? null : obj;
	entity = typeof entity == "undefined" || !entity ? {} : entity;
	//valObj = typeof valObj == "undefined" "" !valObj ? null : valObj;
	if(obj)	{
		var pObj = obj.parentNode.parentNode;
		var nPObj = typeof pObj.nextSibling == "undefined" || !pObj.nextSibling ? null : pObj.nextSibling;
	}
	else	{
		var pObj = null;
		var nPObj = null;
	}

	//if($.browser.mozilla)	var t = tblPic;
	//else if($.browser.msie)	var t = tblPic.childNodes[0];
	if(obj==null){
		if($.browser.msie){
			var t = tblPic.childNodes[0];
		}
		else{
			var t = tblPic;
		}
	}
	else{
		if($.browser.msie){
			var t = obj.parentNode.parentNode.parentNode.childNodes[0];
		}
		else{
			var t = obj.parentNode.parentNode.parentNode;
		}		
	}

	for(var n = 0; n < num; n++)	{
		var a=[]; var tr=[]; var td=[]; var input=[]; var select=[]; var span=[];
		tr[0] = document.createElement('tr');
		td[0] = document.createElement('td');
		td[1] = document.createElement('td');
		td[2] = document.createElement('td');
		td[3] = document.createElement('td');
		td[4] = document.createElement('td');
		td[5] = document.createElement('td');
		input[1] = document.createElement('input');
		input[2] = document.createElement('input');
		input[3] = document.createElement('input');
		input[4] = document.createElement('input');
		input[5] = document.createElement('input');
		
		a[0] = document.createElement('a');
		a[1] = document.createElement('a');
		
		input[3].type = 'file';
		input[3].className = 'picFile';
		input[3].name = 'picFile[]';
		input[3].value = '';
		//input[3].style.width = '220px';
		input[3].id = 'avatarImg' + cntPic;
		if(entity.json){input[3].disabled = true}
		
		input[2].type = 'text';
		input[2].className = 'picHeight';
		input[2].name = 'picHeight[]';
		input[2].value = entity.pi_pic_height ? entity.pi_pic_height : '';
		input[2].style.width = '45px';
		input[2].id = 'picHeight' + cntPic;
		input[2].readOnly = "readonly";
		input[1].type = 'text';
		input[1].className = 'picWidth';
		input[1].name = 'picWidth[]';
		input[1].value =  entity.pi_pic_width ? entity.pi_pic_width : '';
		input[1].style.width = '45px';
		input[1].id = 'picWidth' + cntPic;
		input[1].readOnly = "readonly";
		input[4].type = 'text';
		input[4].className = 'picDesc';
		input[4].name = 'picDesc[]';
		input[4].value = entity.pi_pic_desc ? stripX(entity.pi_pic_desc) : '';
		input[4].style.width = '280px';
		input[4].id = 'picDesc' + cntPic;
		
		input[5].type = 'hidden';
		input[5].className = 'picSerialized';
		input[5].name = 'picSerialized[]';
		input[5].value = entity.json ? entity.json : '';
		input[5].id = 'picSerialized' + cntPic;
		
		a[0].href = '#';
		$(a[0]).bind('click',function(){
			addPicRow(1, this); return false; 
		})
		a[0].appendChild(document.createTextNode('[增加]'));
		a[1].href = '#';
		a[1].onclick = function(){removePicRow(this); return false; }
		a[1].appendChild(document.createTextNode('[删除]'));
		a[1].id = 'deletePic' + cntPic;
		
		// 修改日期：2011-04-27
		// 修改要求：添加预览
		var curImg = entity.pi_link 
			? '<a href="'+entity.pi_link+'" ><img src="'+entity.pi_link+'" width="60" height="60" onclick="updatePicWin.show(\'' + entity.pi_link + '\');return false;" border="0" /></a>'
			: '&nbsp;';
		onclick="updatePicWin.show(\'' + entity.pi_link + '\');return false;"
		if(obj==null){
			$(tr[0]).append($( '<td id="picPreview'+cntPic+'">'+curImg+'</td>' ) );
		}
		for(var i=0; i<6; i++)	{
			if(i == 0) {
				td[i].appendChild(a[0]);
				td[i].appendChild(document.createTextNode(' '));
				td[i].appendChild(a[1]);
				if(a[2]){
					td[i].appendChild(a[2]);
				}
				td[i].className = "separatorTd fnbr";
			}
			else {
				td[i].appendChild(input[i]);
			}
			tr[0].appendChild(td[i]);
		}


		tr[0].className = 'alignCenterTr';
		if(!nPObj)	{
			//t.appendChild(tr[0]);
			t.insertBefore(tr[0], nPObj);
		}
		else{
			t.insertBefore(tr[0], nPObj);
		}
		cntPic++;
	}
  var oaudio = $('.picFile');
  var len = oaudio.length;
  var item=0;
  for(var i=0;i<len;i++){
    if(!oaudio[i].disabled){
      PicUploader.registerAjaxUploadListener(oaudio[i].id,$("#channel").val());
    }
  }
}

function removePicRow(obj)	{ 
	var objTr = obj.parentNode.parentNode;
	/*
  	if(cntPic > 0 && $(objTr).remove())	{
		var serializedStage = $('#'+  obj.id.replace("deletePic","picSerialized"));
		serializedStage.attr('title','del');
	}
	*/
	if(objTr.parentNode.childNodes.length >3){
		$(objTr).remove();
	}
  //   if(Quku.checkLast("tablePic",obj)){
		// addPicRow(1,null,obj[0]);
  // 	}
}

// init existing pics
function initPicValue(obj)	{
	obj = typeof obj == "undefined" || !obj ? {} : obj;
	for(var n in obj)	{
		addPicRow(1,null,obj[n]);
	} 
}

function updatepics(){
			jQuery(function($){
			  // Create variables (in this scope) to hold the API and image size
			  var jcrop_api, boundx, boundy;
			  $('#target').Jcrop({
				onChange: updatePreview,
				onSelect: updatePreview,
				onRelease: clearUpdatePreview,
				aspectRatio: 1,
				boxWidth: 900  //设置 可图片显示的最大宽度
			  },function(){
				// Use the API to get the real image size
				var bounds = this.getBounds();
				  boundx = bounds[0] ;				
				  boundy = bounds[1] ;
				// Store the API in the jcrop_api variable
				jcrop_api = this;
			  });
			  function updatePreview(c)
			  {
			  	$('#x1').val(c.x);
				$('#y1').val(c.y);
				$('#x2').val(c.x2);
				$('#y2').val(c.y2);
				$('#w').val(c.w);
				$('#h').val(c.h);
				if (parseInt(c.w) > 0)
				{
				  var rx = 100 / c.w;
				  var ry = 100 / c.h;
				  $('#preview').css({
					width: Math.round(rx * boundx) + 'px',
					height: Math.round(ry * boundy) + 'px',
					marginLeft: '-' + Math.round(rx * c.x) + 'px',
					marginTop: '-' + Math.round(ry * c.y) + 'px'
				  });
				}
			  };
			  function checkCoords(){
				  if(parseInt($('#w').val()) > 0){
					return true;	  
				  }
				  else{
				  	return false;
				  }
			  }
			  function clearUpdatePreview(){
				$('#h').css({color:'red'});
				window.setTimeout(function(){
					$('#h').css({color:'inherit'});
				}, 500);
			  };
			});
		}
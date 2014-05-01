var tblSong;
var cntSong;
cntSong = 0;

$(document).ready(function(){
	tblSong = document.getElementById('tableSong');
	// init page
	if(jsonSong.length)	{
		initSongValue(jsonSong);
	}
	else if(tblSong)	{
		newAddSongRow(10);
	}
});
// add a new "Song record" after a specified one.
// num: how much rows wanted to be added
// obj: add new rows after this one
// enity: the entity for Song edit
function newAddSongRow (num, obj, entity, maxObj){
    //获取歌曲列表的当中排序最大值
	var si_album_noArr = [], tpl = '', maxValue;
	if(typeof maxObj != "undefined"){
		for(var i = 0; i < maxObj.length; i++){
			si_album_noArr.push(maxObj.eq(i).val());
		}
		si_album_noArr.sort( function(a, b){return a - b} );
		maxValue = parseInt( si_album_noArr[si_album_noArr.length - 1] );		
	}
	num = (typeof num == "undefined" || num <= 0) ? 1 : num;
	obj = (typeof obj == "undefined" || !obj) ? null : obj;
	entity = (typeof entity == "undefined" || !entity) ? {} : entity;
	
	for(var n = 0; n < num; n++)	{	   
	    tpl = createSingleRow(cntSong, entity, maxValue);
		$('#tableSong').append( $(tpl) );		
		if(entity.songSerialized) {
		  $('#songSerialized'+cntSong).val( entity.songSerialized );
		  $('#songStatus'+cntSong).html('<span class="red">已上传</span>');
		  $('#newSong' + cntSong).addClass('gray') ;
		}else{
		  $('#newSong' + cntSong).bind('click',newSongClick);
		}
		cntSong++;
	}	
}
/**
*  method: createSingleRow
*  desc: 创建一行歌曲记录表格
*/
function createSingleRow(index, entity, maxValue){
    var tpl=[];
	tpl.push('<tr class="alignCenterTr">') ;
	   tpl.push('<td><input type="checkbox" id="checked#{songNo}" sid="#{si_globalid}"/></td>');
	   tpl.push('<td><input type="text" id="si_status#{songNo}" value="#{si_status}" readonly="" style="width:45px;"/></td>');
	   tpl.push('<td><input type="text" class="si_cd_no" value="#{si_cd_no}" name="si_cd_no[]" style="width: 45px;" id="si_cd_no#{songNo}"> </td>') ;
	   tpl.push('<td><input type="text" class="si_album_no" value="#{si_album_no}" name="si_album_no[]" style="width: 45px;" id="si_album_no#{songNo}"> </td>') ;
	   tpl.push('<td><input type="text" class="si_globalid" value="#{si_globalid}" name="si_globalid[]" style="width: 60px;" id="si_globalid#{songNo}" readonly=""> </td>') ;
	   tpl.push('<td><input type="text" class="si_title" value="#{si_title}" name="si_title[]" style="width: 120px;" id="si_title#{songNo}" readonly=""> </td>') ;
	   tpl.push('<td><input type="text" class="quku_artist_works_ref"  value="#{quku_artist_works_ref}" name="quku_artist_works_ref[]" style="width: 120px;" id="quku_artist_works_ref#{songNo}" readonly=""> </td>') ;
	   tpl.push('<td><input type="text" class="si_language" value="#{si_language}" name="si_language[]" style="width: 110px;" id="si_language#{songNo}" readonly=""> </td>') ;
	   tpl.push('<td><span class="songs_files" id="songs_files#{songNo}">#{songs_files}</span> </td>') ;	   
  	   tpl.push('<td><span id="songOperation#{songNo}" class="fnbr">');
	       if(entity.songSerialized)
		   {
		       tpl.push('<a id="#{songNo}" lang="#{editAlbumNo}" onclick="checkBlock(this);return false;" name="#{si_globalid}" href="#">修改</a> |');
			   tpl.push('<a  id="#{songNo}"  name="#{si_globalid}" href="#" onclick="operationConfirm(event,this);return false;">删除</a>');
		   }
		   else{
		       tpl.push( '<a id="deleteSong#{songNo}" href="#">[删除]</a>');
			   tpl.push('<a id="newSong#{songNo}" lang="#{editAlbumNo}" href="javaScript:void(0)">[录入歌曲]</a>');
		   }		   
	       tpl.push('</span></td>');
		   
	   tpl.push('<td> ') ;
			tpl.push('<span id="songStatus#{songNo}" class="red"></span>');
			tpl.push("<input id='songSerialized#{songNo}' class='songSerialized' type='hidden' name='songSerialized[]' value='#{si_serialized}'>");
			tpl.push('<input id="album_song#{songNo}" type="hidden" name="album_song_id[]" value="">');
		tpl.push('</td>');
	tpl.push('</tr>');  
	
	var strSongFiles = [];
	if(entity.quku_songs_files){
		for(var m=0;m<entity.quku_songs_files.length;m++){
			strSongFiles.push("<a href='"+entity.quku_songs_files[m].sf_file_link+"'>"+entity.quku_songs_files[m].sf_file_bitrate+"</a> ");
		}
	}

	var options = {
	   'songNo': index,
	   'si_cd_no': entity.si_cd_no ? !parseInt(entity.si_cd_no)?"":entity.si_cd_no : 1,
	   'si_album_no': maxValue ? maxValue+1 : (entity.si_album_no ? !parseInt(entity.si_album_no)?"":entity.si_album_no : cntSong+1),
	   'si_globalid': entity.si_globalid ? entity.si_globalid : '',
	   'si_title': entity.si_title ? entity.si_title : '',
	   'quku_artist_works_ref': entity.quku_artist_works_ref ? entity.quku_artist_works_ref : '',
	   'editAlbumNo': entity.si_album_no?entity.si_album_no:cntSong,	  
	   'si_language': entity.si_language ? entity.si_language : '',
	   'songs_files': strSongFiles.join(''),
	   'si_status': (entity.si_status && parseInt( entity.si_status )==0)?'已发布':'未发布',
	   //json should set value directly ; or the char like ' will clip the string
	   'si_serialized': ''
	   
	}
	return quku_v.format( tpl.join(''), options );
	
}
/**
*  name: newSongClick
*  desc: 录入歌曲点击响应事件，弹出歌曲输入窗口
*/
function newSongClick(){   
	  newCreatDialog(this);
	  return false;
}


function newCreatDialog(obj) {
  var numb = $('#'+obj.id.replace("newSong","si_album_no")+'').val(),
    cdno = $('#'+obj.id.replace("newSong","si_cd_no")+'').val(),
	sistyle = $('#ai_styles').multiselector('getValue'),
   silang = $('#ai_language').multiselector('getValue'),
   sipub= $('#ai_publishtime').textfield('getValue'),
  siarea = $('#ai_area').radiofield('getValue'),
  spubcompany  = $('#ai_publishcompany').textfield('getValue');
  artist  = $('#quku_artist_works_ref').textfield('getValue');
  album_id = $("#ai_album_id").textfield("getValue");
  alert(album_id)
   if(numb<0){
    alert('序号不能为负数');return false;
  }
  var dialog = createCreationDialog(numb,cdno,silang,sipub,siarea,spubcompany,sistyle,artist,album_id);
	dialog.addEventListener('received', baidu.delegate(Album, Album.renderNewSong));
	dialog.popup(obj.id.replace("newSong",""));
}
function createCreationDialog(num,cdno,silang,sipub,siarea,spubcompany,sistyle,artist,album_id){
		baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
		return new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url:'/index.php?c=song&m=create&tn=song_createInDialog&si_album_no='+num+"&si_cd_no="+cdno+"&si_language="+silang+"&si_publishtime="+sipub+"&si_area="+siarea+'&si_publishcompany='+spubcompany+'&si_styles='+sistyle+'&quku_artist_works_ref='+artist+'&si_album_id='+album_id},Quku.dialogSpecs.XL_XXL)
		);
	}
function createEditDialog(Url){ 
		baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
		return new baidu.ui.crossFrameDialog.MomStation(
			baidu.extend({url:Url},Quku.dialogSpecs.XL_XXL)
		);
	}
function newEditDialog(o) {
	var dialog =createEditDialog(o.href);
	dialog.addEventListener('received', baidu.delegate(Album, Album.renderNewSong));
	dialog.popup(o.id);
}
function removeSongRow(obj)	{
	var objTr = obj.parentNode.parentNode;
	if(cntSong > 0 && objTr.parentNode.removeChild(objTr))	{	
		cntSong--;
		inquiry();//处理单曲id名重名
	}
	
  if(Quku.checkLast("tableSong",obj)){
    newAddSongRow(1,null,obj[0]);
  }
}
//查询现在单曲节点的id名进行去重处理
function inquiry(){
	var lastVal = [];
	$('#tableSong .si_cd_no').each(function(i){
		var strArr = $(this)[0].id;
		lastVal.push(strArr.slice(8, strArr.length));		
	});
	lastVal.sort(function(a, b){return a - b;});
	var maxLastVal = lastVal[lastVal.length - 1];
	maxLastVal = parseInt(maxLastVal);
	if(cntSong <= maxLastVal){
		cntSong = maxLastVal + 1;
	}
}

// init existing Songs
function initSongValue(obj)	{
	obj = typeof obj == "undefined" || !obj ? {} : obj;
	var entity = null; 
	for(var n in obj)	{
        entity = 	manageSongInfo(obj[n]);
		newAddSongRow(1,null,entity);
	}
}

/**
	*   用于将请求返回的信息转换为 信息都在同一层级的json格式
	*   @method manageSongInfo
	*   @param response 保存单曲后返回的信息
	*   @date  2012-02-29
	*/
function  manageSongInfo(response){
	    var info = ['si_globalid','si_cd_no','si_album_no',
		'si_title','si_language','si_status'],
		returnValue = {}, baseInfo = response.quku_songs_info, fileInfo = response.quku_songs_files,
		 si_author = response.quku_artist_works_ref, str=[], temp;
		 //'songSerialized', 'quku_artist_works_ref',
		
		for(var key in info){	
			temp = info[key];
		    if(typeof baseInfo[ temp ]!='undefined'){
			    returnValue[ temp ] = baseInfo[ temp ];
			}
		}
		
		for(var key in si_author){
		    str.push( si_author[key].awr_artist_name );
		}
		returnValue['quku_artist_works_ref'] = str.join(',') ;
		
		returnValue['songSerialized'] = response.json;
		returnValue['quku_songs_files'] = fileInfo;
		return returnValue ;
	}
/**
*
*  单曲列表修改单曲
*/
function checkBlock(o){

   var testSplit=function(arr){		     
		 if(arr.length==1&&arr[0].replace(/^\s+|\s+$/g,'')==''){
			 arr=[];
		  }
		  return arr;
	 },
	 lang = testSplit($('#si_language' + o.id).val().split( ',' )),
	 langValues = testSplit($("#languageValues").val().split(','));
			 

  var title = $('#ai_area').radiofield('getValue');
  
  var numb = $('#si_album_no'+o.id).val(),cdno = $('#si_cd_no'+o.id).val();
  var iframe;

  if(numb<0){
    alert('序号不能为负数');return false;
  }
  var dialog = createCreationDialog(numb);
  var obj={
        id:o.id,
        href:"?c=song&m=edit&tn=song_editInDialog&si_globalid="+o.name+"&si_album_no="+numb+"&si_cd_no="+cdno,
  };
  
  newEditDialog(obj);

  setTimeout(function(){
	  iframe = $(".ui-dialog-content iframe")[ 0 ];

	  if( $.browser != 'msie' ){
		iframe.onload = function(){
			iframeLoad( iframe, lang, title, langValues);
		}
	  }else{
		iframe.onreadystatechange = function(){
			if( iframe.readyState == "complete" ){
				iframeLoad( iframe, lang, title, langValues );
			}
		}
	  }
  }, 100);
}

function iframeLoad( iframe, lang, title, langValues, index ){
	var iframe_doc = iframe.contentWindow.document;
	var checks = iframe_doc.getElementById( 'addSiLanguage' );
	var save = iframe_doc.getElementById("save");
	//var country = iframe_doc.getElementById('si_country');

	$(save).attr('lang', index);
	
	$(iframe_doc).find('#si_country').radiofield('setValue',title);
	
	//清除单曲语言,先判断单曲语言是否为空
	/*
	var checksValue = $("option", checks).val();
	var langArr = [];
	for(var i = 0; i < lang.length; i++){
		langArr.push(lang[i]);
	}
	if(typeof checksValue != undefined){
		for(var j = $("option", checks).length; j >= 0; j--){
			$("option", checks).eq(j).remove();//清除单曲语言
		}
	}
	for( var i = 0, l = lang.length; i < l; i++){
		$(checks).append("<option value='" + langValues[i] + "'>" + lang[i] + "</option>");
	}   
	*/
}

function operationConfirm(event,o) {
  var msg="确认要删除该单曲吗?";
  var e = event || window.event;
	if(!confirm(msg)){
		if (e.preventDefault)
		e.preventDefault();
		e.returnValue = false;
		return false;
	}else{
    var extQueryString ="?c=song&m=delete&si_globalid="+o.name;
    jQuery.get(extQueryString,{},function(data){
      switch(data){
        case "-5": alert("您没有删除权限")
        break;
        case "-3": alert("删除未成功")
        break;
        default:removeSongRow(o.parentNode);
      }
    },'text')
  }
}



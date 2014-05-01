var duplicateName = {
	_callback : null,
	initForm : function () {	
		
	},
	check : function (sAction, extQueryString, callback,arr) {
		baidu.loader.loadPackage('artist.artist');
		this._callback = callback;
		jQuery.post(
			'?c=artist&m='+sAction + '&' +extQueryString,
			{},
			function(sData){
				artist.createduplicateNameSelectorDialog(extQueryString);
				var duplicateNameExist = false;
				
				if(sData.data.quku_artist_works_ref.repeat.length > 0){
					duplicateNameExist = true;
				}
			
				if(duplicateNameExist) {
					var dialog = artist.createduplicateNameSelectorDialog();
					dialog.addEventListener('received', baidu.delegate(duplicateName, duplicateName.rebuildNameQueryString));
          window.origid_g=arr;
					dialog.popup(sData);
				}else{
					//重复代码
					var returnData = [] , q = 'quku_artist_works_ref';
					
					var singleData = sData.data.quku_artist_works_ref.single;
				
					var length = singleData.length;
					var singleArray = [];
					if(length > 0){
						for(var i = 0; i < length; i ++){
							singleArray.push(singleData[i].json); 
						}
						returnData[q] = singleArray;
					}
					
					duplicateName.rebuildNameQueryString('', returnData);
					   return true;
				}
			},'json'
		);
	},
	rebuildNameQueryString : function (method, response) {
		for(q in response){
		   
			$('#'+q+'_serialized').val(response[q].join('$@$'));
		}
		this._callback(true);
	},
	idToName : function (id) {
		var idDetailInfo = id.split('_');
		var model = idDetailInfo[0] ? idDetailInfo[0] : '';
		var id = idDetailInfo[1] ? idDetailInfo[1] : '';
		var mapArray = {'tb':{'director':'电视导演','author':'电视演员'},
						'mi':{'director':'电影导演','author':'电影演员'},
						'sn':{'author':'演出明星','guests':'演出嘉宾'},
						'ai':{'author':'专辑明星'},
						'si':{'author':'单曲歌手'}
						};
		if( mapArray[model] &&  mapArray[model][id]){
			return mapArray[model][id];
		}else{
			return id;
		}
	},
	needChecked : function(id,origid_g) {
		var serialized = $( '#' + id + '_serialized' ).val();
		var entity = $.trim( $('#'+id).textfield('getValue') );
		serializedArray = (serialized!="") ? serialized.split('$@$') : [];
    var reg =/，/g;
    entity = entity.replace(reg,",");
		entityArray = (entity != "")? entity.split(',') : [];
		
		var length = Math.max(serializedArray.length,entityArray.length);
		if(serializedArray.length != entityArray.length){
			return true;
		}else{
			for(var i = 0; i < length ; i++){
				if(baidu.isUndefined(serializedArray[i]) || baidu.isUndefined(entityArray[i])||origid_g[id].replace(reg,",")!=entity){
          window.origid_g[id]=entity;
					return true;
				}
				if((entityArray[i] != "") && (serializedArray[i].indexOf(entityArray[i]) == -1)){
          window.origid_g[id]=entity;
					return true;
				}
			}
		}
		return false;
	}
}

baidu.ui.crossFrameDialog ={LOADED:true};
baidu.extend(baidu.ui.crossFrameDialog , 
	{
		LOADED:true,
		count:0,
		MSG_CODE_CLOSE:1,
		MSG_CODE_RECEIVE_AND_CLOSE:2,
		MSG_CODE_RECEIVE:3,
		MSG_CODE_GET_DATA:4
	}
);

baidu.ui.crossFrameDialog.MomStation = baidu.createClass();
baidu.ui.crossFrameDialog.MomStation.count = 0;
baidu.ui.crossFrameDialog.MomStation.prototype = {
	_functionPrefix :'_MomStationCallback_',
	_callbackName:null,
	_dialogConfig:null,
	_adapter:null,
	_initData:null,
	/**
	 * @param dialogConfig {width:int,height:int,url:String}
	 */
	initialize:function(dialogConfig){
		baidu.ui.crossFrameDialog.MomStation.count ++;
		this._callbackName = this._functionPrefix+baidu.ui.crossFrameDialog.MomStation.count;
		this._dialogConfig = dialogConfig;
		window[this._callbackName] = baidu.delegate(this,this.handleMessage);
		baidu.EventDispatcher.bless(this);
	},
	popup:function(data){
		if(!baidu.isUndefined(data)){
			this._initData = data;
		}
		return this.getAdapter().popup(this._callbackName);
	},
	handleMessage:function(code,data){
		var self = baidu.ui.crossFrameDialog;
		switch(code){
		case self.MSG_CODE_GET_DATA:
			return this.doGetData();
			break;
		case self.MSG_CODE_CLOSE:
			this.doClose();
			break;
		case self.MSG_CODE_RECEIVE_AND_CLOSE:
			this.doReceive(data);
			this.doClose();
			break;
		case self.MSG_CODE_RECEIVE:
			this.doReceive(data);
			break;
		default:
			throw new Error('baidu.ui.crossFrameDialog.MomStation.handleMessage:unknown msg code');
		}
	},
	doGetData:function(){
		return this._initData;
	},
	close:function(){
		this.doClose();
	},
	doClose:function(){
		this.getAdapter().close();
		this.dispatchEvent('closed');
	},
	doReceive:function(data){
		this.dispatchEvent('received',data);
	},
	getAdapter:function(){
		if(!this._adapter){
			this._adapter = new baidu.ui.crossFrameDialog.JUiAdapter();//ThickBoxAdapter();
		}
		
		this._adapter.setWidth(this._dialogConfig.width);
		this._adapter.setHeight(this._dialogConfig.height);
		this._adapter.setIFrameUrl(this._dialogConfig.url);
		
		return this._adapter;
	},
	setAdapter:function(adapter){
		this._adapter = adapter;
	}
};

baidu.ui.crossFrameDialog.ChildStation = baidu.createClass();
baidu.ui.crossFrameDialog.ChildStation.LOADED = true;
baidu.ui.crossFrameDialog.ChildStation.prototype = {
		initialize:function(){},	
		
		cancel:function() {
			var func = this.getParam('__callback');
			self.parent.window[func](baidu.ui.crossFrameDialog.MSG_CODE_CLOSE);
		},
		sendAndClose:function(data){
			var func = this.getParam('__callback');
			self.parent.window[func](baidu.ui.crossFrameDialog.MSG_CODE_RECEIVE_AND_CLOSE,data);
		},
		send:function(data) {
			var func = this.getParam('__callback');
			self.parent.window[func](baidu.ui.crossFrameDialog.MSG_CODE_RECEIVE,data);
		},
		getData:function(){
			var func = this.getParam('__callback');
			return self.parent.window[func](baidu.ui.crossFrameDialog.MSG_CODE_GET_DATA);
		},
		getParam:function(fieldName) {
			var urlString = document.location.search;
			if(urlString != null){
			var typeQu = fieldName+"=";
			var urlEnd = urlString.indexOf(typeQu);
			if(urlEnd != -1){
				var paramsUrl = urlString.substring(urlEnd+typeQu.length);
				var isEnd =  paramsUrl.indexOf('&');
				if(isEnd != -1){
					return paramsUrl.substring(0, isEnd);
				}else{
					return paramsUrl;
				}
			}else{
				return null;
			}
		}else {
			return null;
		}
	}
};

baidu.ui.crossFrameDialog.JUiAdapter = baidu.createClass();
baidu.ui.crossFrameDialog.JUiAdapter.LOADED = true;
baidu.ui.crossFrameDialog.JUiAdapter.prototype = {
	_width:500,
	_height:300,
	_url:null,
	_dialog:null,
	initialize:function(){
		baidu.loader.loadJQueryJs('ui/ui.core.js');
		baidu.loader.loadJQueryJs('ui/ui.dialog.js');
	},
	setWidth:function(width){
		this._width = width;
	},
	setHeight:function(height){
		this._height = height;
	},
	setIFrameUrl:function(url){
		this._url = url;
	},
	close:function(){
		this._dialog.dialog('destroy');
	},
	popup:function(callbackName){
		var url = this._url;
		var hasQuery = (url.indexOf('?')>=0);
		url = url + (hasQuery?'&':'?') + "__callback="+callbackName;
		var iframe = $('<iframe FRAMEBORDER=0 />');
		iframe.attr('border','0')
			.attr('bordercolor','white')
			.attr('framespacing','0')
			.css('background','white')
			.css('border','0px');
		
		this._dialog = $('<div/>');
		iframe.width(this._width+1 + 'px');
		iframe.height(this._height+1 + 'px');
		this._dialog.css('background','white');
		this._dialog.append(iframe);
		this._dialog.dialog({
			width:this._width,
			height:this._height,
			modal:true,
			closeOnEscape:false,
			close:baidu.delegate(this,this.close)
		});
		this._dialog.dialog('open');
		$('.ui-dialog-titlebar').hide();
		$('.ui-dialog-overlay')
			.css('background','gray')
			.css('filter','alpha(opacity=40)')
			.css('-moz-opacity','0.4')
			.css('opacity','0.4');
		if(!$.browser.msie || $.browser.version!='6.0') {
			$('.ui-dialog-overlay').css('position','fixed').css('top','0px');
		}
		iframe.attr('src' ,url);
	}
};

baidu.ui.crossFrameDialog.ThickBoxAdapter = baidu.createClass();
baidu.ui.crossFrameDialog.ThickBoxAdapter.LOADED = true;
baidu.ui.crossFrameDialog.ThickBoxAdapter.prototype = {
	_width:500,
	_height:300,
	_url:null,
	initialize:function(){
		baidu.loader.loadJQueryJs('plugins/thickbox.js');
		baidu.loader.loadJQueryCss('plugins/thickbox.res/thickbox.css');
	},
	setWidth:function(width){
		this._width = width;
	},
	setHeight:function(height){
		this._height = height;
	},
	setIFrameUrl:function(url){
		this._url = url;
	},
	close:function(){
		tb_remove();
	},
	popup:function(callbackName){
		var url = this._url;
		var hasQuery = (url.indexOf('?')>=0);
		tb_show(null,
				url
				+ (hasQuery?'&':'?')
				+ "__callback="+callbackName
				 +"&keepThis=true"
				 +"&TB_iframe=true&height="+this._height
				 +"&width="+this._width
				 +"&modal=true",
			 false
		);
	}
};

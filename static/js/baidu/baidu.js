var baidu = {
	LOADED:true,
	ui:{LOADED:true},
	e:function(e,win){
		if(baidu.isString(e)){
			var theWin = win?win:window;
			return theWin.document.getElementById(e);
		}else{
			return e;
		}
	},
	/**
	 * 创建类
	 * initialize为构造函数 必须实现
	 * 
	 */
	createClass:function(){
		return function() {
			this.initialize.apply(this, arguments);
		};
	},
	
	/**
	 * 继承
	 * 将源对象的成员赋予目标对象
	 */
	extend:function(destination, source) {
		for (var property in source){
			destination[property] = source[property];
		}
		return destination;
	},
	/**
	 * 带参数的delegate
	 * @param Object obj
	 * @param Function func
	 * @param mix arguments
	 */
	delegate:function(){
		var obj = arguments[0];
		var func = arguments[1];
		var presetArgs = new Array();
		for( var i = 2; i < arguments.length; i++ ){
			presetArgs.push( arguments[i] );
		}

		var delegate = function(){
			var inputArgs = new Array();
			for( var i=0; i<presetArgs.length; i++ ){
				inputArgs[i] = presetArgs[i];
			}
			for ( var i = 0; i < arguments.length; i++ ){
				inputArgs.push( arguments[i] );
			}
			return func.apply( obj, inputArgs );
		};
		return delegate;
	},
	/**
	 * 克隆对象
	 * @param Object object
	 * @return Object
	 */
	clone: function(object) {
		return baidu.extend({ }, object);
	},
	/**
	 * 检查参数是否是HTML元素
	 * @param mix
	 * @return boolean
	 */
	isElement: function(object) {
		return object && object.nodeType == 1;
	},
	/**
	 * 检查参数是否是数组
	 * @param mix
	 * @return boolean
	 */
	isArray: function(object) {
		return object && object.constructor === Array;
	},
	/**
	 * 检查参数是否是Function
	 * TODO 不知道浏览器兼容性如何，貌似IE下function被报Object
	 */
	isFunction: function(object) {
		return typeof object == "function";
	},
	/**
	 * 检查参数是否是字符串
	 * @param mix object
	 * @return boolean
	 */
	isString: function(object) {
		return typeof object == "string";
	},
	/**
	 * 检查参数是否是数字
	 * @param mix object
	 * @return boolean
	 */
	isNumber: function(object) {
		return typeof object == "number";
	},
	/**
	 * 检查参数是否是布尔变量
	 * @param mix object
	 * @return boolean
	 */
	isBoolean: function(object) {
		return typeof object == "boolean";
	},
	/**
	 * 检查参数是否是undefined
	 * @param mix object
	 * @return boolean
	 */
	isUndefined: function(object) {
		return typeof object == "undefined";
	},
	inArray:function(value,params,restrict){
		for(var i=0;i<params.length;i++){
			if(restrict){
				if(value === params[i]) return true;
			}else{
				if(value == params[i]) return true;
			}
		}
		return false;
	},
	/**
	 * @param mix expr
	 * @param String msg
	 * @throws Error
	 */
	assert:function(expr, msg){
		if(!expr){
			throw new Error('assertion failed: '+msg);
		}
	}
};

/**
 * @class RegExp
 * 增强、简化正则功能
 */
baidu.RegExp = baidu.createClass();
baidu.RegExp.prototype = {
	_reg:null,
	initialize:function(reg){
		this._reg = reg;
	},
	/**
	 * @param 
	 */
	callbackReplace:function(str, callback){
		var r ;
		var lastIndex = 0;
		var rs = new Array();
		while((r = this._reg.exec(str))!=null){
			rs.push(str.substring(lastIndex, r.index));
			rs.push(callback(r));
			
			lastIndex = r.index + r[0].length;
		}
		rs.push(str.substr(lastIndex));
		return rs.join('');
	}
};

baidu.GlobalCallback = {
		_count:0,
		create:function(func){
			var name = this._genFuncName();
			window[name] = func;
			return name;
		},
		_genFuncName:function(){
			return '__ifgc_'+(new Date()).getTime()+'_'+(this._count++);
		}
};


/*
 * Y 四位数的年份
 * y 两位数的年份
 * m 月份的数值表示，有前导0
 * M 月份的三字母文本表示
 * n 月份的数值表示，没有前导0
 * d 日
 * h 12小时制小时，有前导0
 * H 24小时制小时,有前导0
 * i 分钟，有前导0
 * s 秒
 * S 毫秒
 * E 中文星期几
 * e 英文缩写星期几
 * w 星期几的数值表示，0表示星期日，1表示星期一.....6表示星期六
 */
baidu.DateFormat = baidu.createClass();
baidu.DateFormat.prototype = {
	_pattern: null,
	/**
	 * @param string 所要显示日期的样式
	 */
	initialize: function(pattern) {
		this._pattern = pattern?pattern:baidu.DateFormat.MEDIUM;
	},
	/**
	 * @param mix 要格式化的时间，可以是Date对象，时间戳，yyyy/mm/dd形式的字符串
	 */
	format: function(date) {
		if(!date) {
			date = new Date();
		}
		var dateObj = this._transToDateObj(date);
		var formattedDateStr = this._pattern;
		
		for(var f in baidu.DateFormat.FormatCodes) {
			formattedDateStr = formattedDateStr.replace(eval('/' + f +'/g'), eval('dateObj.' + baidu.DateFormat.FormatCodes[f]));
		}
		return formattedDateStr;

	},
	
	_transToDateObj: function(date) {
		var timeStamp;
		
		switch(typeof date) {
			case 'object':
				if(Date === date.constructor) {
					return date;
				}
				else {
					throw new Error('Illial date object');
				}
				break;
			case 'number':
				timeStamp = parseInt(date);
				if(isNaN(timeStamp)) {
					throw new Error('Illial timestamp');
				}
				break;
			case 'string':
				timeStamp = Date.parse(date);
				if(isNaN(timeStamp)) {
					throw new Error('Illial date string');
				}
				break;
			default:
				throw new Error('Unacceptable date format');
				break;
		}

		return new Date(timeStamp);
	},
	
	getTimeStamp: function() {
		return this._timeStamp;
	}
};

baidu.extend(baidu.DateFormat, {
	LONG: 'Y年m月d日 H:i:s E',
	MEDIUM: 'Y-m-d H:i:s',
	SHORT: 'y-m-d H:i',
	
	FormatCodes: {
		Y: 'getFullYear()',
		y: 'getShortYear()',
		m: 'getFullMonth()',
		M: 'getShortMonthName()',
		n: 'getMonthNumber()',
		d: 'getFullDate()',
		h: 'get12Hours()',
		H: 'getFullHours()',
		i: 'getFullMinutes()',
		s: 'getFullSeconds()',
		S: 'getMilliseconds()',
		E: 'getChWeekdayName()',
		e: 'getShortWeekdayName()',
		w: 'getDay()'	
	}
});
/**
 * 对js内置对象Date的扩展
 */
baidu.extend(Date.prototype, {
	_monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
	_weekdayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
	_chWeekdayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
				
	getShortYear: function() {
		return this.getFullYear().toString().substring(2, 4);
	},
				
	getFullMonth: function() {
		return this._getTwoDigitalNum(this.getMonthNumber());
	},
	getFullDate: function() {
		return this._getTwoDigitalNum(this.getDate());
	},
	getFullHours: function() {
		return this._getTwoDigitalNum(this.getHours());
	},
	get12Hours: function() {
		var hours = this.getHours() <= 12 ? this.getHours() : this.getHours() - 12;
		return this._getTwoDigitalNum(hours);
	},
				
	getFullMinutes: function() {
		return this._getTwoDigitalNum(this.getMinutes());
	},
	getFullSeconds: function() {
		return this._getTwoDigitalNum(this.getSeconds());
	},
	getMonthNumber: function() {
		return this.getMonth() + 1;
	},
				
	getMonthName: function() {
		return this._monthNames[this.getMonth()];
	},
				
	getShortMonthName: function() {
		return this.getMonthName().substring(0, 3) + '.';
	},
				
	getChWeekdayName: function() {
		return this._chWeekdayNames[this.getDay()];
	},
				
	getEnWeekdayName: function() {
		return this._weekdayNames[this.getDay()];
	},
				
	getShortWeekdayName: function() {
		return this.getEnWeekdayName().substring(0, 3) + '.';
	},
				
	_getTwoDigitalNum: function(num){
		return num > 9 ? num : '0' + num;
	}
});

baidu.date = {
	LOADED:true,
	_timezoneOffset:null,
	/**
	 * 设置时间转换所依赖的时间偏移量，单位为分钟 比如东八区传入tz为 - 8*60
	 * @param int tz 时区时间偏移量
	 */
	setTimezoneOffset:function(tz){
		this._timezoneOffset = tz;
	},
	/**
	 * 获取时间日期转换所依赖的时区时间偏移量
	 * @return int 单位为分钟
	 */
	getTimezoneOffset:function(){
		if(this._timezoneOffset ===null){
			this._timezoneOffset = new Date().getTimezoneOffset();
		}
		return this._timezoneOffset;
	},
	/**
	 * 从时间戳转换到 形如 2008-10-10的 日期字符串
	 * @param int time 单位为秒
	 * return string
	 */
	timeStamp2DateStr:function(time){
		var timezone = this.getTimezoneOffset();
		var tzd = new Date().getTimezoneOffset() - timezone;
		var d = new Date((time+tzd*60)*1000);
		var y = d.getFullYear();
		var m = d.getMonth()+1;
		if(m<10){
			m="0"+m;
		}
		var d = d.getDate();
		if(d<10){
			d = "0"+d;
		}
		return y + '-' + m + '-' + d;
	},
	
	/**
	 *从时间戳转换到形如2008-10-10 12:20:30的时间字符串
	 * @param int time 单位为秒
	 * return string
	 */
	timeStamp2TimeStr: function(time) {
		var timezone = this.getTimezoneOffset();
		var tzd = new Date().getTimezoneOffset() - timezone;
		var d = new Date((time+tzd*60)*1000);
		var h = d.getHours();
		h = h >= 10 ? h : '0' + h;
		var m = d.getMinutes();
		m = m >= 10 ? m : '0' + m;
		var s = d.getSeconds();
		s = s >= 10 ? s : '0' + s;
		var y = d.getFullYear();
		var month = d.getMonth()+1;
		if(month<10){
			month="0"+month;
		}
		var d = d.getDate();
		if(d<10){
			d = "0"+d;
		}

		return y + '-' + month + '-' + d + ' ' + h + ':' + m + ':' + s;
	},
	
	/**
	 * 从形如 2008-10-10的日期字符串转换到unix时间戳
	 * @param string str 日期
	 * @return int 单位为秒
	 */
	dateStr2TimeStamp:function(str){
		var timezone = this.getTimezoneOffset();
		var tzd = new Date().getTimezoneOffset() - timezone;
		var a = str.split('-');
		if(a.length !=3){
			throw new Error('illial date format');	
		}
		
		var d = new Date(a[0],a[1]-1, a[2],0,0,0,0).getTime();
		return d/1000 - tzd*60;
		
	}
};

/**
 * @example
 * obj = {
 *	 	fire:function(){
 *			 this.dispatchEvent('sayHello','hello');
 *		}
 *	}
 * baidu.EventDispatcher.bless(obj);
 * obj.addEventListener('sayHello',function(e,p){alert(e);alert(p)});
 * obj.dispatchEvent('sayHello');
 * 
 */
baidu.EventDispatcher = {
	/**
	 * 使一个对象具备可被监听的特性
	 */
	bless:function(obj){
		obj.__listeners = new Object();
		obj.addEventListener = function(eventName,func,id){
			eventName = '__'+eventName;
			if(typeof(this.__listeners[eventName]) == 'undefined'){
				this.__listeners[eventName] = new Array();
			}
			if(typeof(id) != 'undefined'){
				id ='__'+id;
				for(var i=0;i<this.__listeners[eventName].length;i++){
					if(this.__listeners[eventName][i].id == id){
						this.__listeners[eventName][i] = {
							id:id,
							func:func
						};
						return ;
					}
				}
			}
			this.__listeners[eventName].push(
				{
					id:null,
					func:func
				}		  
			);
		};
		
		obj.removeListener = function(eventName,id){
			eventName = '__'+eventName;
			if(typeof(this.__listeners.eventName) == 'undefined'){
				throw new Error('unknown eventName'+eventName);
			}
			for(var i=0;i<this.__listeners[eventName].length;i++){
				id ='__'+id;
				if(this.__listeners[eventName][i].id == id){
						this.__listeners[eventName].splice(i,1);
						return true;
				}
			}
			
			return false;
		};
		
		obj.dispatchEvent = function(eventName,param){
			eventName = '__'+eventName;
			if(typeof(this.__listeners[eventName]) == 'undefined'){
				return false;
			}
			var result = true;
			for(var i=0;i<this.__listeners[eventName].length;i++){
				r = this.__listeners[eventName][i].func(eventName,param);
				if(!r){
					result = false;
				}
			}
			return result;
		};
	}
};

/**
 * 时钟
 * 
 */
baidu.Clock = baidu.createClass();
baidu.Clock.prototype = {
	addEventListener:null,
	removeListener:null,
	dispatchEvent:null,
	_state:'stopped',
	_startTime:null,
	_lastTime:null,
	_passedDuration:null,
	_count:null,
	_duration:null,
	
	_intervalTime:1000,
	_hInterval:null,
	
	initialize:function(){
		baidu.EventDispatcher.bless(this);
	},
	
	start:function(){
		if(this._state !='stopped'){
			return  false;
		}
		this._lastTime = this._startTime = new Date().getTime();
		this._count = -1;
		this._passedDuration = 0;
		this._state = 'started';
		this._hInterval = setInterval(baidu.delegate(this,this._beat) ,this.getIntervalTime());
		this._fire('start');
	},
	
	setDuration:function(duration){
		this._duration = duration;
	},
	
	getDuration:function(){
		return this._duration;
	},
	
	_beat:function(){
		var now = new Date().getTime();
		var passed = now - this._lastTime;
		this._passedDuration += passed*1;
		if(this.getDuration()!==null && this._passedDuration >= this.getDuration()){
			this._doStop('timeout');
			return ;
		}
		this._count++;
		this._fire('beat');
		this._lastTime = now;
	},
	
	pause:function(){
		if(this._state != 'started'){
			return false;
		}
		clearInterval(this._hInterval);
		this._state = 'paused';
		this._fire('pause');
	},
	
	unPause:function(){
		if(this._state != 'paused'){
			return false;
		}
		this._lastTime = new Date().getTime();
		this._state = 'started';
		this._fire('unPause');
		this._hInterval = setInterval(baidu.delegate(this,this._beat) ,this.getIntervalTime());
	},
	
	stop:function(){
		this._doStop('stop');
	},
	_doStop:function(eve){
		if(this._state =='stopped'){
			return false;
		}
		clearInterval(this._hInterval);
		this._state = 'stopped';
		this._fire(eve);
		this._lastTime = null;
		this._count = -1;
		this._passedDuration = 0;
	},
	setIntervalTime:function(intv){
		this._intervalTime = intv;
	},
	getIntervalTime:function(){
		return this._intervalTime;
	},
	_fire:function(eve){
		this.dispatchEvent(
			eve,
			{
				startTime:this._startTime,
				passedDuration:this._passedDuration,
				lastTime:this._lastTime,
				intervalTime : this.getIntervalTime(),
				count: this._count
			}
		);
	}
};

baidu.ajax ={
		LOADED:true
};

baidu.ajax.sync ={
	LOADED:true,
	_tempData:null,
	get:function(url,dataType){
		if(!jQuery){
			throw new Error('jQuery is required');
		}
		if(!dataType){
			dataType ='text';	
		}
		jQuery.ajax(
			{
			url: url,
			async: false,
			dataType: dataType,
			success: baidu.delegate(this,this._receive),
			error:  baidu.delegate(this,this._cannotReceive)
			}
		);
		
		return this._tempData;
	},
	post:function(url,data,dataType){
		if(!jQuery){
			throw new Error('jQuery is required');
		}
		if(!dataType){
			dataType ='text';	
		}
		jQuery.ajax(
			{
			url: url,
			async: false,
			type: 'POST',
			data: data,
			dataType: dataType,
			success: baidu.delegate(this,this._receive),
			error:  baidu.delegate(this,this._cannotReceive)
			}
		);
		
		return this._tempData;
	},
	_receive:function(data){
		this._tempData = data;
	},
	_cannotReceive:function(){
		this._tempData =null;
	}
};

baidu.loader = {
	LOADED:true,
	_jsRoot:'',
	_loadedJs:[],
	_loadedCss:[],
	/**
	 * 加载js文件
	 * @return boolean;
	 */
	loadJs:function(url){
		if(this._isJsLoaded(url)){
			return false;
		}
		var jsData = baidu.ajax.sync.get(url);
		if(!jsData){
			throw new Error('fail to load js:'+url);
		}
		baidu.loader._includeJs(jsData);
		this._jsLoaded(url);
		return true;
	},
	_includeJs:function(source){
		var oHead = document.getElementsByTagName('HEAD').item(0); 
		var oScript = document.createElement( "script" ); 
		oScript.language = "javascript"; 
		oScript.type = "text/javascript"; 
		oScript.defer = true;
		oScript.text = source;
		oHead.appendChild( oScript ); 
	},
	/**
	 * @param String packageName
	 * @param Object rootPackage
	 * @return boolean
	 */
	loadPackage:function(packageName){
		if(baidu.loader.isPackageLoaded(packageName)){
			return false;
		};
		var url =baidu.loader.getJsRoot()+'/'+ packageName.replace(/\./g,'/')+'.js';
		return baidu.loader.loadJs(url);
	},
	/**
	 * 加载样式表
	 * @param url String
	 * @return boolean
	 */
	loadCss:function(url){
		if(this._isCssLoaded(url)){
			return false;
		}
		var head = document.getElementsByTagName('HEAD').item(0);
		if(!head){
			throw new Error('head element is required');
		}
		var style = document.createElement('link');
		style.href = url;
		style.rel = 'stylesheet'
		style.type = 'text/css';
		head.appendChild(style); 
		this._cssLoaded(url);
		return true;
	},
	/**
	 * 加载baidu js用的css样式
	 * @param file String
	 * @return boolean
	 */
	loadbaiduCss:function(file){
		return baidu.loader.loadCss(baidu.loader.getJsRoot()+'/baidu/'+file);
	},
	/**
	 * 加载jquery js用的css样式
	 * @param file String
	 * @return boolean
	 */
	loadJQueryCss:function(file){
		return baidu.loader.loadCss(baidu.loader.getJsRoot()+'/jquery/'+file);
	},
	/**
	 * @param string packageName
	 * @return boolean
	 */
	isPackageLoaded:function(packageName){
		var ps = packageName.split('.');
		var p = window;
		try{
			var loaded = eval('window.'+packageName+'.LOADED');
			return loaded;
		}catch(e){
			return false;
		}
		/*for(var i=0;i<ps.length;i++){
			var pName = ps[i];
			p = p[pName];
			if(baidu.isUndefined(p)){
				return false;
			}
			if(i=ps.length-1 && !p.LOADED){
				return false;
			}
		}
		return true;*/
	},
	/**
	 * @param file
	 * @return boolean
	 */
	loadJQueryJs:function(file){
		var url = baidu.loader.getJsRoot()+'/jquery/'+file;
		return baidu.loader.loadJs(url);
	},
	getJsRoot:function(){
		return baidu.loader._jsRoot;
	},
	/**
	 * 设置baiduJS的根路径 baidu.js所在目录的上一级，不以/结束
	 */
	setJsRoot:function(url){
		baidu.loader._jsRoot = url;
	},
	/**
	 * 检查js的url是否已经被添加到_loadedJs数组中
	 * @return boolean
	 */
	_isJsLoaded:function(url){
		var pool = baidu.loader._loadedJs;
		for(var i=0;i<pool.length;i++){
			if(pool[i]==url){
				return true;
			}
		}
		return false;	
	},
	/**
	 * 记录已经加载的js的url，防止重复加载
	 */
	_jsLoaded:function(url){
		var pool = baidu.loader._loadedJs;
		pool.push(url);
	},
	/**
	 * 检查Css的url是否已经被添加到_loadedCss数组中
	 * @return boolean
	 */
	_isCssLoaded:function(url){
		var pool = baidu.loader._loadedCss;
		for(var i=0;i<pool.length;i++){
			if(pool[i]==url){
				return true;
			}
		}
		return false;	
	},
	/**
	 * 记录已经加载的Css的url，防止重复加载
	 */
	_cssLoaded:function(url){
		var pool = baidu.loader._loadedCss;
		pool.push(url);
	}
};

baidu.json = {
	LOADED:true,
	/**
	 * JSON encode
	 * @param Object object
	 * @return String
	 */
	encode: function(object){
		return this._driver.stringify(object);
	},
	
	/**
	 * JSON decode
	 * @param string string
	 * @return Object
	 */
	decode: function(string){
		return this._driver.parse(string);
	}
};

baidu.json._driver = function () {

        function f(n) {
            // Format integers to have at least two digits.
            return n < 10 ? '0' + n : n;
        }

        Date.prototype.toJSON = function (key) {

            return this.getUTCFullYear()   + '-' +
                 f(this.getUTCMonth() + 1) + '-' +
                 f(this.getUTCDate())      + 'T' +
                 f(this.getUTCHours())     + ':' +
                 f(this.getUTCMinutes())   + ':' +
                 f(this.getUTCSeconds())   + 'Z';
        };

        String.prototype.toJSON =
        Number.prototype.toJSON =
        Boolean.prototype.toJSON = function (key) {
            return this.valueOf();
        };

        var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
            escapeable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
            gap,
            indent,
            meta = {    // table of character substitutions
                '\b': '\\b',
                '\t': '\\t',
                '\n': '\\n',
                '\f': '\\f',
                '\r': '\\r',
                '"' : '\\"',
                '\\': '\\\\'
            },
            rep;


        function quote(string) {

            escapeable.lastIndex = 0;
            return escapeable.test(string) ?
                '"' + string.replace(escapeable, function (a) {
                    var c = meta[a];
                    if (typeof c === 'string') {
                        return c;
                    }
                    return '\\u' + ('0000' +
                            (+(a.charCodeAt(0))).toString(16)).slice(-4);
                }) + '"' :
                '"' + string + '"';
        }


        function str(key, holder) {
            var i,          // The loop counter.
                k,          // The member key.
                v,          // The member value.
                length,
                mind = gap,
                partial,
                value = holder[key];

            if (value && typeof value === 'object' &&
                    typeof value.toJSON === 'function') {
                value = value.toJSON(key);
            }

            if (typeof rep === 'function') {
                value = rep.call(holder, key, value);
            }

            switch (typeof value) {
            case 'string':
                return quote(value);

            case 'number':

                return isFinite(value) ? String(value) : 'null';

            case 'boolean':
            case 'null':

                return String(value);

            case 'object':
                if (!value) {
                    return 'null';
                }
                gap += indent;
                partial = [];
                if (typeof value.length === 'number' &&
                        !(value.propertyIsEnumerable('length'))) {
                    length = value.length;
                    for (i = 0; i < length; i += 1) {
                        partial[i] = str(i, value) || 'null';
                    }
                    v = partial.length === 0 ? '[]' :
                        gap ? '[\n' + gap +
                                partial.join(',\n' + gap) + '\n' +
                                    mind + ']' :
                              '[' + partial.join(',') + ']';
                    gap = mind;
                    return v;
                }
                if (rep && typeof rep === 'object') {
                    length = rep.length;
                    for (i = 0; i < length; i += 1) {
                        k = rep[i];
                        if (typeof k === 'string') {
                            v = str(k, value);
                            if (v) {
                                partial.push(quote(k) + (gap ? ': ' : ':') + v);
                            }
                        }
                    }
                } else {
                    for (k in value) {
                        if (Object.hasOwnProperty.call(value, k)) {
                            v = str(k, value);
                            if (v) {
                                partial.push(quote(k) + (gap ? ': ' : ':') + v);
                            }
                        }
                    }
                }
                v = partial.length === 0 ? '{}' :
                    gap ? '{\n' + gap + partial.join(',\n' + gap) + '\n' +
                            mind + '}' : '{' + partial.join(',') + '}';
                gap = mind;
                return v;
            }
        }
        return {
            stringify: function (value, replacer, space) {
                var i;
                gap = '';
                indent = '';
                if (typeof space === 'number') {
                    for (i = 0; i < space; i += 1) {
                        indent += ' ';
                    }
                } else if (typeof space === 'string') {
                    indent = space;
                }
                rep = replacer;
                if (replacer && typeof replacer !== 'function' &&
                        (typeof replacer !== 'object' ||
                         typeof replacer.length !== 'number')) {
                    throw new Error('JSON.stringify');
                }
                return str('', {'': value});
            },


            parse: function (text, reviver) {
                var j;

                function walk(holder, key) {
                    var k, v, value = holder[key];
                    if (value && typeof value === 'object') {
                        for (k in value) {
                            if (Object.hasOwnProperty.call(value, k)) {
                                v = walk(value, k);
                                if (v !== undefined) {
                                    value[k] = v;
                                } else {
                                    delete value[k];
                                }
                            }
                        }
                    }
                    return reviver.call(holder, key, value);
                }
                cx.lastIndex = 0;
                if (cx.test(text)) {
                    text = text.replace(cx, function (a) {
                        return '\\u' + ('0000' +
                                (+(a.charCodeAt(0))).toString(16)).slice(-4);
                    });
                }
                if (/^[\],:{}\s]*$/.
test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@').
replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {

                    j = eval('(' + text + ')');

                    return typeof reviver === 'function' ?
                        walk({'': j}, '') : j;
                }
                throw new SyntaxError('JSON.parse');
            }
        };
    }();
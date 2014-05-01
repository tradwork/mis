baidu.debug ={
	LOADED:true,
	_tracer:null,
	_dumper:null,
	_traceStage:null,
	_enabled:false,
	dump:function(data,msg){
		if(!this._enabled){
			return;
		}
		this.getDumper().dump(data,msg);
	},
	getDumper:function(){
		if(!this._dumper){
			this._dumper=new baidu.debug.Dumper(this.getTracer());
		}
		return this._dumper;
	},
	trace:function(msg,msgOnly){
		if(!this._enabled){
			return;
		}
		this.getTracer().trace(msg,msgOnly);
	},
	getTracer:function(){
		if(!this._tracer){
			this._tracer = new baidu.debug.Tracer(baidu.debug.NewWindowTraceBox.getInstance());
		}
		return this._tracer;
	},
	enable:function(){
		this.setEnabled(true);
		return this;
	},
	disable:function(){
		this.setEnabled(false);
	},
	setEnabled:function(enabled){
		this._enabled = enabled;
	}
};


baidu.debug.Tracer = baidu.createClass();
baidu.debug.Tracer.prototype = {
	_stage:null,
	_msgOnly:false,
	_enabled:true,
	prefixColor:'#666',
	initialize:function(stage,msgOnly){
		this._stage = stage;
		this._msgOnly = msgOnly;
	},
	trace:function(msg,msgOnly){
		if(!this._enabled){
			return ;
		}
		this._stage.getElement().appendChild(this._packMsg(msg,msgOnly));
	},
	clear:function(){
		this._stage.getElement().innerHTML='';
	},
	_packMsg:function(msg,msgOnly){
		var o = (msgOnly || !msgOnly && this._msgOnly);
		if(!o){
			msg = '<span style="color:'+this.prefixColor+'">#'+new Date()+'</span>' +' '+ msg;
		}
		var div =this._stage.getDocument().createElement('div');
		div.innerHTML=(msg);
		return div;
	},
	setEnabled:function(enabled){
		this._enabled =enabled;
	}
};

baidu.debug.Dumper = baidu.createClass();
baidu.debug.Dumper.prototype ={
    maxLevel : 10,
    maxCount : 1000,
    skipElement : true,
    tracer:null,
    initialize:function(tracer){
		this.tracer = tracer;
	},
    _trace:function (msg){
		this.tracer.trace('&nbsp;&nbsp;'+msg,true);
    },
	_traceWithPrefix:function (msg){
		this.tracer.trace(msg);
    },
    dump :function(obj,msg) {
    	try{
	    	msg = msg ? msg : 'VarDump';
			this._traceWithPrefix('');
	        this._trace('+--------<strong>' + msg + '</strong>--------+');
	        this._trace('| ' + String(obj));
	        this._dumpLevel(obj, 1, 0);
	        this._trace('');
    	}catch(e){
    		this._trace(e);
    	}
    },
    _dumpLevel:function(data, level, count) {
        count++;
        if (count > this.maxCount) {
        	this._trace(this._space(level) + '[MAX COUNT...]');
        	return count;
        }
        if (level >= this.maxLevel) {
            this._trace(this._space(level) + '[MAX LEVEL...]');
            return count;
        }
        
        if( baidu.isUndefined(data)||baidu.isNumber(data) || baidu.isString(data) ){
            return count;
        }
        if(!(baidu.isElement(data)&&this.skipElement)){
        	for (var q in data) {
        		if(baidu.isArray(data[q])){
        			ds = 'Array ('+data[q].length+' elements)';
	        	}else if(baidu.isString(data[q])||baidu.isNumber(data[q])||baidu.isBoolean(data[q])){
	        		ds = data[q];
	        	}else{
	        		ds = typeof(data[q]);
	        	}
	            this._trace(this._space(level) + '<strong>'+q+'</strong>' + ':' + ds);
	            if (data[q]) {  
					if(q=='parentNode'){
						continue;
					}
	                count = this._dumpLevel(data[q], level + 1, count);
	                if (count > this.maxCount) {
	                    return count;
	                }
	            }
        	}
        }
        return count;
    },
    _space:function(t) {
        var a = new Array();
        a.push('');
        for (var i = 0; i < t - 1; i++) {
            a.push('&nbsp;&nbsp;&nbsp;');
        }
        a.push('--');
        var s=a.join('|');
        return s;
    }
};

baidu.debug.NewWindowTraceBox = baidu.createClass();
baidu.debug.NewWindowTraceBox._inst = null;
baidu.debug.NewWindowTraceBox.getInstance = function(){
	if(!baidu.debug.NewWindowTraceBox._inst){
		baidu.debug.NewWindowTraceBox._inst = new baidu.debug.NewWindowTraceBox();
	}
	return baidu.debug.NewWindowTraceBox._inst;
};
baidu.debug.NewWindowTraceBox.prototype = {
	_id : 'baiduTraceBox',
	_win: null,
	initialize:function(){
		var name = this._id;
		this._win = window.open("",name,"height=500, width=660, scrollbars=yes, toolbar =no, menubar=no, location=no, status=no");
		this._win.document.write("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">\n<head>\n    <title>baidu Debug Console<\/title>\n\n<body><div id='"+this._id+"'><\/div><\/body><\/html>");
		this._win.document.close();
		var s =this.getElement();
		s.style.fontSize='12px';
	},
	getElement:function(){
		return this._win.document.getElementById(this._id);
	},
	getDocument:function(){
		return this._win.document;
	},
	_getId:function(){
		return this._id;
	}
};

baidu.debug.TimeMeter = baidu.createClass();
baidu.debug.TimeMeter._inst = null;
baidu.debug.TimeMeter.getInstance = function(){
	if(!baidu.debug.TimeMeter._inst){
		baidu.debug.TimeMeter._inst = new baidu.debug.TimeMeter();
	}
	return baidu.debug.TimeMeter._inst;
};
baidu.debug.TimeMeter.prototype = {
	_runtimeTrace:false,
	_data:null,
	_lastTime:null,
	_count:null,
	initialize:function(){
		this.reset();
	},
	reset:function(){
		this._data = [];
		this._lastTime = new Date().getTime();
		this._count = 0;
	},
	dot:function(msg){
		if(baidu.isUndefined(msg)){
			msg = ' ';
		}
		this._count++;
		var now = new Date();
		var passed = now.getTime()-this._lastTime;
		this._data.push(
			{
				time:now,
				passed:passed,
				msg:msg
			}
		);
		if(this._runtimeTrace){
			baidu.debug.trace('baidu.debug.TimeMeter:'+msg+'('+this._count+'), Time Passed:'+ passed);
		}
	},
	end:function(){
		this.dot('END');
	},
	enableRuntimeTrace:function(){
		this._runtimeTrace = true;
	},
	disableRuntimeTrace:function(){
		this._runtimeTrace = false;
	},
	report:function(){
		var html = [];
		html.push("<table border=1>");
		html.push("<tr><th>SEQ</th><th>Time</th><th>Passed(ms)</th><th>Interval(ms)</th><th>Message</th></tr>");
		
		var lastPassed = 0;
		for(var i = 0;i<this._data.length;i++){
			var r = this._data[i];
			html.push("<tr>");
			html.push("<td>"+(i+1)+"</td>");
			html.push("<td>"+this._formatDate(r.time)+"</td>");
			html.push("<td>"+r.passed+"</td>");
			html.push("<td>"+(r.passed-lastPassed));
			html.push("<td>"+r.msg+"</td>");
			html.push("</tr>");
			lastPassed = r.passed;
		}
		html.push("<tr><td colspan='5'>Total Passed:"+this._getTotalPassed()/1000+"s</td></tr>");
		html.push("</table>");
		baidu.debug.trace(html.join(''));
	},
	_getTotalPassed:function(){
		var totalPassed = 0;
		if(this._data.length>1){
			totalPassed = this._data[this._data.length-1].time-this._data[0].time;
		}
		return totalPassed;
	},
	_formatDate:function(date){
		return date.getFullYear()+"-"+date.getMonth()+"-"+date.getDate()+" "
			+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds()+":"+date.getMilliseconds();
	}
};
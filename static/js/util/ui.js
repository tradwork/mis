var quku_v = window.quku_v || {} ;
(function($,window){
	var count = 0, toString = Object.prototype.toString, FROMSRC = 1,  FROMDEST = 2;

	$.extend(quku_v,{ FormArray : {},
   debug: false	});

	window.log = function(str){
	    if( !quku_v.debug ) return;
	   if(window.console){
		   console.log(str);
	   }else{
		   alert(str);
	   }
	};
	var  _id = function(){
	   return count++;
	},
	 /**
	 * 将id中的_和第一个字母转换为第一个字母的大写，拼成name
	 * @method _getName
	 * @param {id} 本dom对象的id，由_和小写字面组成
	 * @return {Function} 已确定 this 引用指向的新函数
	 */
	_getName = function(id){
	   if(typeof(id) == 'undefined'){
		  log('error:_getName need input a id');
		  return ;
	   }
	   id = toString.call(id);
	   var name = id.replace(/(_[a-z 0-9]{1})/g, function(matchedStr, exactStr, index, srcStr){
		   var destChar = String.toUpperCase(exactStr[1]);
		   return destChar ;
	   });
	   return name.toString()+'Name';
	},
	/**
	 * 字符串格式化
	 * @method format
	 * @param {Object} conf 字符串的内容匹配项
	 * @return {String} 格式化后的字符串
	 */
	_format = function(str,conf){
		if(typeof(str)!='string'){
			log('error: only can format a string!!');
			return ;
		}
		$.each(conf,function(key,item){
			  str=str.replace(RegExp('#{('+key+')}','g'),function(matchStr,exactStr,index,wholeStr){
				return item;
			  });
		});
		return str;
	},
	/**
	 * value 是否是store中的值
	 * @method _isInStore
	 * @param {value} 查找的值
	 * @param {array} 被查找目标数组
	 * @return {array}
	 */
	_isInStore = function(store,value){
	     var isExist = false, temp;
		 if($.trim(value) ==='' )
			return true;
	     for(var i = 0, len = store.length; i < len; i++){
		       temp = store[i].value;
		       if( !isNaN(temp) && parseInt(temp, 10) === parseInt(value, 10) ){
			       isExist = true;
			   }else if(temp === value){
			        isExist = true;
			   }
		 }
		 return isExist ;
	},
	/**
	 * 如果value出现在引用类型array中，则删除array中对应的对象
	 * @method _delArrayItem
	 * @param {value} 查找的值
	 * @param {array} 被查找目标数组
	 * @return {array}
	 */
	_delArrayItem = function(value, array){
	   if(toString.call(array)!='[object Array]'){
		   log('error:second arguments need be an array of json obj');
		   return ;
	   }

	   for(var i = 0, len = array.length; i < len; i++){
		  if( value === array[i].value ){
			  array.splice(i, 1);
			  break;
		  }
	   }
	   return array;
	},
	 /**
	 * 查找dataItem所在的父级数组
	 * 注意： del是data中获取的一个引用
	 * @method _delArrayItem
	 * @param {value} 查找的对象
	 * @param {array} 被查找目标数组
	 * @return {array}
	 */
	_findDataArray = function(dataItem, data){
	   var del=null, isFind=false,i;
	   if( dataItem.parentLabel ){
			for(i = 0, len = data.length;i < len; i += 1)
			{
				for( var key in data[i] ){
				   if(key == dataItem.parentLabel){
					  del = data[i][key];
					  isFind = true;
					  break;
				   }
				}
			}
			if( !isFind ){
				data[len] = {}, del = [];
				data[len][dataItem.parentLabel] = del;
			}
		}else{
		   del = data;
		}
		return del;
	},
	/**
	*   转换实体字符为普通字符
	*   @function	_htmlEntityReverse
	*
	*/
	_htmlEntityReverse = function(str){
	   // var cha = ['&amp;', '&quot;', '&#039;', '&lt;', '&gt;'] ;

		str = str+'';
		str = str.replace(/(&amp;|&quot;|&#039;|&lt;|&gt;)/g,
		         function(matchedStr,exactStr){

						switch (exactStr){
							 case '&amp;':
								 return "&";
								 break;
							 case '&quot;':
								 return "\"";
								 break;
							 case '&#039;':
								 return "'";
								 break;
							 case '&lt;':
								 return "<";
								 break;
							 case '&gt;':
								 return ">";
								 break;
							 defalt:
								 break; } //switch
				}) ;
		 return str;
	};

	/**
	*   mutiselector组件 数据适配器
	*   @class	DataAdapter
	*
	*/
	var DataAdapter = (function() {

		var fn = function(src, dest) {
			this._srcSelectItem = src || null;
			this._destSelectItem = dest || null;
		};
		fn.prototype = {
			setSrcSelectItem : function(el){
				this._srcSelectItem = el;
		   },
		   setDestSelectItem : function(el){
				this._destSelectItem = el;
		   },
		   /**
			 * 通知事件触发到数据适配器
			 * @method notify
			 * @param {dataItem} 事件触发的对象
			 * @param {index} 本次数据变更操作的源select对象
			 * @param {isDisplay} 是否显示数据
			 * @return {}
			 */
		   notify : function(dataItem, index, isDisplay){
				if(typeof(dataItem) == 'undefined'){
					log("warning: select data notify type is wrong");
					return ;
				}

				this.toggleItem( dataItem, index );
				if(isDisplay){
				   this.loadData(this._srcSelectItem, this._srcSelectItem.store);
				   this.loadData(this._destSelectItem, this._destSelectItem.store);
				}
		   },
		   /**
			 * 查找select中是否包含 value 的options
			 * 当value包含中文和 / 字符时 ,jq 的find方法报正则错误
			 * @method $findExtend
			 * @param {el} select
			 * @param {value} 此次操作对象的value
			 * @return {boolean} 包含返回true，否则返回false
			 */
		   $findExtend: function(el,value){
		      var options = el.find('option'), ret = false;
			  for(var i = 0 ,len = options.length; i < len; i++){
			      if(value === options[i].value){
				      ret = true;
					  break;
				  }
			  }
			  return ret;
		   },
			/**
			 * 修改select对象的数据对象
			 * @method toggleItem
			 * @param {dataItem} 事件触发的对象
			 * @param {index} 本次数据变更操作的源select对象
			 * @return {}
			 */
		   toggleItem : function(dataItem, index){
				var delItem=null, addItem=null, del = null, add = null;
					if(index == FROMSRC){
					   delItem = this._srcSelectItem;
					   addItem = this._destSelectItem;
					}else{
						delItem = this._destSelectItem;
						addItem = this._srcSelectItem;
					}

					del = _findDataArray(dataItem, delItem.store);

					if(index == FROMDEST){
						del = _delArrayItem(dataItem.value, del);
					}

					add = _findDataArray(dataItem, addItem.store);
					if( ! this.$findExtend(addItem.el, dataItem.value) ){
						add.push({'display':dataItem.display.toString(),
									 'value':dataItem.value.toString()
								 });
					}


		   },
			/**
			 * 加载select中的数据
			 * @method loadData
			 * @param {selectItem} 需要显示数据的select对象
			 * @param {data} 被显示的数据
			 * @return {}
			 */
		   loadData : function(selectItem, data){
				if(toString.call(data) != "[object Array]"){
					 log('warning:select data need be an array !');
					 data = null;
				 }
				//selectItem.store的修改对selectItem引用型对象会产生作用，所以这个修改是有必要的
				var len = 0,  s = selectItem.store = data || selectItem.store, e = selectItem.el, key = '',
				str = [],item=null;

				 e.html('');
				 s.sort();
				 for(var i = 0, len = s.length; i<len; i++){
					item=s[i];
					 //如果没有在分组里
					if(typeof(item.display) != 'undefined'){
						str.push('<option class="indent" value="'+item.value+'">'+item.display+'</option>');
					}else{

					   for(key in item){
							str.push('<optgroup label="'+key+'">');
							item[key].sort();
							for(var j = 0, len2 = item[key].length; j<len2; j++){
								str.push('<option class="indent" value="' + _htmlEntityReverse( item[key][j].value ) + '">' + _htmlEntityReverse( item[key][j].display ) +'</option>');
							}
							str.push('</optgroup>');

						}//for item
					}//if  item.display

				 }//for data
				 e.append($(str.join("")));
			 }

		};

		return fn;
	})();
	/**
	*   定义组件公共部分；label
	*   @constructor	components
	*
	*/
	$.widget('ui.components', {
	   options : {
			tpl:'<div class="x-component-label #{labelClass}"><span class="red label-blank">#{isBlank}</span><span class="label-text">#{labelText}</span>' +
				 '<a class="more-link" href="#">#{moreLink}</a></div><div id="#{itemsId}" class="x-component-items"></div><span id="nt_#{itemId}">#{noteText}</span><span id="nb_#{itemId}"></span>',
			labelText:'',
			labelClass:'',
			isBlank:true, //是否允许为空
			displayMore:false,//是否显示more
			moreHandler:null,
			//number
			validateType:'',
			name:'',
			note:'',
			readOnly: false,
			style:'display:block;',
			seprator:': ',
			classText:'',
			items:[]
	   },
	   _create : function(){
	       this._createLabel();
	   },
	    /**
		 * 修改函数体中 this 引用指向
		 * @method _createLabel
		 * @param {}
		 * @return {}
		 */
	   _createLabel : function(){
			var o = this.options;
			this.id = o.id = this.element[0].id;
			o.name = o.id ;
			var str  =  _format(o.tpl, {
							isBlank: o.isBlank?'':'*',
							labelText: o.labelText + o.seprator,
							moreLink: o.displayMore?'more>>':'',
							labelClass: o.labelClass,
							itemsId: o.id + '_items',
							noteText: o.note,
							itemId: o.id }
						);

			this.element.append(this.label = $(str));
			this.items = $( '#' + o.id + '_items' );

			this._initEvents();
	   },
	   /**
		 * 给组件绑定事件
		 * @method _bindEvents
		 * @param {}
		 * @return {}
		 */
	   _initEvents:function(){
	        var o = this.options;
			if(this.validateType && this.validateType==='number')
			{
			   $('#' + o.id + '_items input').blur=function(){
					this.validatorNum();
			   }
			}


	   },
	    /**
		 * 数字校验
		 * @method validatorNum
		 * @param {}
		 * @return {}
		 */
	   validatorNum:function(){
		   var num_exp = /^\d+$/g, num_exp1 =/^\d+[\.]{1}\d{1}$/g,value = this.getValue();
		   if(num_exp.test(value)){
		        this.setValue(value + '.00');
			}else if(num_exp1.test(value)){
				this.setValue(value + '0');
			}
	   },
	   /**
		 * 绑定suggestion
		 * @method addSuggestion
		 * @param {conf} 配置suggestion ajax请求的内容
		 * @return {}
		 */
	   addSuggestion:function(conf){
	      var o = this.options;
		  var inputEl = $('#' + o.id + '_items input');
		  inputEl.suggest({
			  ajaxSettings : {
				  type: conf.type,
				  url: conf.url,
                  //jquery 默认检索词是 keyword ，曲库为与数据库字段统一，改为 	od_spell_code
				  data: conf.data,
				  success: conf.success,
				  dataType: conf.dataType
				}
		   })
	   },
	   distroy: function(){
	        $.Widget.prototype.destroy();
			delete this.label;
			delete this.items;
	   }
	})
	/**
	*定义多选组件
	*@constructor	multiselector
	*
	*/
	$.widget('ui.multiselector',$.ui.components, {
	   options:{
			id:'',
			name:'',
			size:10,
			width:300,
			height:300,
			mutiple:true,
			style:'',
			store:[],
			classText:''
		},
		init: function(conf){
				this._selectItem = function(item){ return {el : item.el, store : item.store} };

				this.id = conf.id || 'mp3_quku_'+_id();
				this.name = conf.name  ||  _getName(this.id);
				this.dataAdapter = {};
				this.destSelectItem = {};
		},
		/**
		 * 创建并渲染dom元素
		 * @method _create
		 * @param {conf}
		 * @return {}
		 */
		_create:function(){
			this._createLabel.call(this);

			var o = this.options;
			this.init(o);

			var width = (o.width-50)/2, height = o.height, input = "";

				  this.srcSelectEl = $("<select multiple=true></select>").attr("id", o.id + '_src')
					  .attr("name", o.name+'Src')
					  .attr("size", o.size)
					  .css("width", width+"px")
					  .css("height", height+"px")
					  .addClass("x-select-item x-select-src");
				  this.destSelectEl = $("<select multiple=true></select>").attr("id", o.id + '_dest')
					  .attr("name", o.name+'Dest')
					  .attr("size", o.size)
					  .css("width", width+"px")
					  .css("height", height+"px")
					  .addClass("x-select-item x-select-dest");
				  this.toolSelectEl = $('<div><a class="x-select-tool-add" style="margin-top:' + Math.floor((width-56)/2) + 'px">&gt;&gt;</a><a class="x-select-tool-del">&lt;&lt;</a></div>').attr("id", this.id+"_tool")
					  .addClass("x-select-item x-select-tool")
					  .css("width", 50+"px");


					this.selectEl = $( '#'+o.id+'_items' );
					this.selectEl.addClass('x-select')
									.addClass('clearfix')
					              .css("width", o.width+"px");


					this.selectEl.append(this.srcSelectEl);
					this.selectEl.append(this.toolSelectEl);
					this.selectEl.append(this.destSelectEl);
					this.srcSelectItem = new this._selectItem({'el' : this.srcSelectEl, 'store' : o.store});
					this.destSelectItem = new this._selectItem({'el' : this.destSelectEl, 'store' : []});

					return this;
		},
		/**
		 * 数据转移触发事件绑定
		 * @method _create
		 * @param {conf}
		 * @return {}
		 */
		_bindEvents:function(){
			 var _this = this;
			 this.srcSelectItem.el.bind('dblclick', function(event) {
					   _this.clickHandler.apply(this, [event, _this, FROMSRC])
					  });
			   this.destSelectItem.el.bind('dblclick', function(event) {
					   _this.clickHandler.apply(this, [event, _this, FROMDEST])
					 });
			 $(".x-select .x-select-tool-add").bind('click', function(event){
						_this.btnClickHandler.apply(this, [event, _this, FROMSRC]);
					 });
			$(".x-select .x-select-tool-del").bind('click', function(event){
						_this.btnClickHandler.apply(this, [event, _this, FROMDEST]);
					  });

		},
		 /**
		 * 得到被选中的option，并通知到dataadapter进行显示
		 * @method clickHandler
		 * @param {event} 需要显示数据的select对象
		 * @param {obj}  selector组件对象
		 * @param {index} 被操作的源select id
		 * @return {}
		 */
		   clickHandler : function(event, obj, index){
				var event = event || window.event, selected = {}, target = event.target || event.srcElement;

				if(!isNaN(this.selectedIndex)&&this.selectedIndex > -1){
					selected.value = this.options[this.selectedIndex].value;
					selected.display = this.options[this.selectedIndex].text;
					selected.parentLabel = target.parentNode.tagName.toLowerCase() == 'optgroup' ? target.parentNode.label : '';

					obj.dataAdapter.notify(selected, index, true);
				}
		   },
		   /**
			 * 得到被选中的多条option，并通知到dataadapter进行显示
			 * @method btnClickHandler
			 * @param {event} 事件对象
			 * @param {obj}  selector组件对象
			 * @param {index} 被操作的源select id
			 * @return {}
			 */
		   btnClickHandler : function(event, obj, index){
				var event = event || window.event, selected = {}, selectedEl = null, selected = {}, delData = [],
				op = null;
				if(index == FROMSRC){
				   selectedEl = obj.srcSelectEl[0];
				}else{
					selectedEl = obj.destSelectEl[0];
				}
				for(var i = 0, len = selectedEl.options.length;i<len;i++){
						op = selectedEl.options[i];
					if(op.selected){
						selected.value = op.value;
						selected.display = op.text;
						selected.parentLabel = op.parentNode.tagName.toLowerCase() == 'optgroup'?op.parentNode.label:'';

						obj.dataAdapter.notify(selected, index, false);
					}
				}
				obj.loadData(obj.srcSelectItem.store);
				obj.loadData(obj.destSelectItem.store, FROMDEST);

		},
		/**
		 * 创建适配器，绑定事件，加载数据等初始化工作
		 * @method _init
		 * @param {}
		 * @return {object} this
		 */
		_init:function(){
			this.dataAdapter = new DataAdapter( this.srcSelectItem, this.destSelectItem );
			this._bindEvents();
			var o = this.options;
			if(o.store.length > 0)
			{
			    this.loadData( o.store );
			}

			return this;
		},
		distroy:function(){
			$.ui.components.prototype.destroy.call( this );
			delete  this.dataAdapter;
			delete  this.destSelectItem;
			delete  this.srcSelectItem;
			delete this.srcSelectEl;
			delete this.toolSelectEl;
			delete this.destSelectEl;
			this.element.remove();
		},
		loadData : function(data, index){
			 if( index == FROMDEST )
			 {  this.dataAdapter.loadData(this.destSelectItem, data); }
			 else{
				this.dataAdapter.loadData(this.srcSelectItem, data);
			 }
	   },
		/**
		 * 返回右侧已选数据
		 * @method _init
		 * @param {}
		 * @return {array} 已选数据值数组
		 */
	   getSelectedData : function(){
			 var result = [], el = this.destSelectItem.el;
			 this.destSelectItem.el.find('option').each(function(i){
				 result.push(this.value);
			 })

			 return result;
	   },
	   getValue: function(){
			 return this.getSelectedData().join();
	   },
	    /**
		 * 设置已选数据
		 * @method setValue
		 * @param {selectItem} 需要显示数据的select对象
		 * @param {data} 被显示的数据
		 * @return {}
		 */
		 setValue: function(data){
		     if( typeof data === 'undefined' || $.trim(data) === '')
			 {
			    log('error_setValue: please set a mutilselect a value');
				return ;
			 }
			 if( !$.isArray(data) ){
			     data = data.toString().split(',');
			 }

			 var  item=null, destStore = this.destSelectItem.store;
			 $.each(data, function(key, value){
			        //如果value是中文，则无法使用selector查找，暂时忽略key值
					//if (  ( item = $('#ab_career_src option[text=' + value + ']') ).length > 0 )
					//{
					    destStore.push({'display': _htmlEntityReverse( value ) , 'value': _htmlEntityReverse( value) });
					//}
			 })


			 this.loadData(destStore, FROMDEST );
		 }
	});

	/*
	*定义文本组件
	*@constructor	textfield
	*
	*/

	$.widget('ui.textfield', $.ui.components, {
	   options: {
		   itemTpl: '<input class="x-component-input" type="text" id="#{inputId}" name="#{inputName}" style="#{inputCss}"></input>',
		   cssStyle: ''
	   },
	   _create:function(){
		   this._createLabel.call(this, arguments);
		   var o = this.options;
		   var str = _format(o.itemTpl, {
					  inputId: o.id + '_input',
					  inputName: o.name,
					  inputCss: o.cssStyle
				  });

		  this.items.append( $(str) );
		  this._bindEvents();
		  if(o.value){
		      $('#'+o.id + '_input').val( _htmlEntityReverse(o.value) );
		  }
		  if(o.readOnly){
			    $('#' +o.id + '_input').attr('readOnly',true);
			}
		  if(o.disabled){
		      this.disabled(true);
		  }
		  return this;
	   },
	   disabled: function(bool){
	            var o = this.options;
			   if(bool === true){
				   $('#' +o.id + ' input').attr('disabled',true)
			 //如果无参数，则返回当前dom disable状态
			   }else if ( typeof bool === 'undefined'){
				   return $('#' +o.id + ' input').attr('disabled') ? 'true' :'false' ;
			   }else if (bool === false){
				   $('#' +o.id + ' input').attr('disabled',false)
			   }
	   },
	   getValue: function(){
		  return this.items.find('input').val();
	   },
	   setValue: function(value){
		  if(typeof(value) === 'undefined'){
				 log('error:textfield value can not be undefined!!');
				 return ;
			  }
		  this.items.find('input').val( _htmlEntityReverse(value) );
	   },
	   _bindEvents:function(){
	        var o = this.options;
			if(o.events && o.events.length > 0){

			    for(var i = 0; i < o.events.length; i++){
					$.each(o.events[i], function(name, handler){

						$('#' + o.id + '_items input').bind(name,handler);
					})
				}
			}
	   },
	   distroy: function(){
			$.ui.components.prototype.destroy();
			this.element.remove();
	   }
	})

	/**
	* 定义多行文本输入框
	*@constructor	textarea
	*
	*/
	 $.widget('ui.textarea', $.ui.components, {
			options: {
			    itemTpl: ' <textarea class="x-component-textarea" name="#{itemName}" '+
				   'key="true"></textarea>',
				 store: [],
				 width: '200px'

			},
			_create: function(){
			    var o = this.options, str='' ;
				this._createLabel.call(this, arguments);
				str += _format(o.itemTpl, {
					itemName: o.id
				});
				this.items.append( $(str) ) ;
				this.items.css('width',o.width);

			},
			disabled: function(bool){
			   var o = this.options;
			   if(bool === true){
				   $('#' +o.id + ' textarea').attr('disabled',true)
			   }else if ( typeof bool === 'undefined'){
				   return $('#' +o.id + ' textarea').attr('disabled') ? 'true' :'false' ;
			   }else if (bool === false){
				   $('#' +o.id + ' textarea').attr('disabled',false)
			   }
		    },
			getValue: function(){
			    return this.items.find('textarea').val();
			},
			setValue: function(str){
			     this.items.find('textarea').val( _htmlEntityReverse(str) );
			},
		  distroy: function(){
				$.ui.components.prototype.destroy();
				this.element.remove();
		   }
	   })
	/*
	*定义单选组件
	*@constructor	radiofield
	*
	*/
	$.widget('ui.radiofield', $.ui.components, {
	   options: {
		  itemTpl:'<input type="radio" value="#{value}" name="#{name}" class="x-component-input">#{display}</input>',
		  store: []
	   },
	   _create: function(){
			this._createLabel.call(this, arguments);

			this.items.css('margin-left','-12px');

			this.loadData(undefined, true);
			if(typeof this.options.value != 'undefined')
			{
			    this.setValue(this.options.value);
			}
			var o = this.options;
			if(o.disabled){
				$('[name="'+o.id+'[]"]').attr('disabled',true);
			}

		   return this;
	   },
	   loadData: function(store,display){

		   if( typeof store != 'undefined' && !$.isArray(store) )
		   {
		       log('error: store should be an array;like ["display":"mp3","value":"1"]');
			   return ;
		   }
		    var o = this.options, str="";
		   o.store = store || o.store;
		   if( !display ){
		       return ;
		   }

		   $.each( o.store, function(key, item) {
			str += _format( o.itemTpl, {'value': _htmlEntityReverse( item.value ),
										'display': _htmlEntityReverse( item.display ),
										'name': o.name+'[]'
										});

		  });

		   this.items.html('');
		   this.items.append( $(str) );
	   },
		setValue:function(value){
		   var store = this.options.store,isExist = true;
		   if(typeof value === 'undefined' ){
				log('error: radio value should not be undefined');
				return false;
		   }

		   //如果设置不存在值
		   isExist = _isInStore(store, value);
		   if( !isExist ){
				store.push({'display':_htmlEntityReverse(value) ,'value': _htmlEntityReverse( value ) });
				this.loadData(store,true);
			}

		   var radios=$('#' + this.id + '_items' + ' input');
		   radios.each(function(key){
				if(this.value == value)
					this.checked = true;
				else{
					this.checked = false;
				}
		   });
	  },
	  getValue:function(){
		  var radios=$('#' + this.id + '_items' + ' input') , result='';
		  radios.each( function(key){
			  if(this.checked){
				   result = this.value;
			   }
		  });

		   return result;
	  },
	  distroy: function(){
			$.ui.components.prototype.destroy();
			this.element.remove();
	   }
	})
	/**
	* 定义checkbox 多选 组件
	*@constructor	checkboxfield
	*
	*/
     $.widget('ui.checkbox', $.ui.components, {
	     options: {
		     itemTpl: '<input class="x-component-input" #{checked} name="#{itemName}" type="checkbox" value=#{value}>#{display}</input>',
		     checked : [],
		 noLabel:false
		 },
		 _create: function(){
			this._createLabel.call(this, arguments);
			this.loadData(undefined, true);
		     var o = this.options;
		     if(o.noLabel){
			   $('#'+o.id+' .x-component-label').remove();
			}
		    return this;
	   },
	    loadData: function(store, display){
		   if( typeof store != 'undefined' && !$.isArray(o.store) )
		   {
		       log('error: store should be an array;like ["display":"mp3","value":"2"]');
			   return ;
		   }
		    var o = this.options, str="";
		   o.store = store || o.store;
		   if( !display ){
		       return ;
		   }

		   $.each( o.store, function(key, item) {

		   	// console.log( o.checked[key] == item.value );
			str += _format( o.itemTpl, {'value': _htmlEntityReverse( item.value ) ,
										'display': _htmlEntityReverse( item.display ),
										'itemName': o.name+'[]',
										"checked" : ( o.checked[key] == item.value ) ? "checked" : ""
										});

		  });

		   this.items.html('');
		   this.items.append( $(str) );

		},
		/*
		*   @param {value} 为数组或 逗号分隔的字符串
		*/
		setValue:function(value){

		   if( typeof value === undefined )
		   {
		        log('error: value can not be undefined');
		   }
		   if( !$.isArray(value) ){
		       value = value.split(',');
		   }
		   var checkboxs=$('#' + this.id + '_items' + ' input');
		   checkboxs.each( function(key){
				if( this.value == value[key] )
					this.checked = true;
				else{
					this.checked = false;
				}
		   } );
		   return this;
	  },
	  getValue:function(){
		  var checkboxs=$('#' + this.id + '_items' + ' input'), result=[];
		  checkboxs.each( function(key){
			  if( this.checked ){
				   result.push(this.value) ;
			   }
		  });

		   return result.join(",");
	  },
	  distroy: function(){
			$.ui.components.prototype.destroy();
			this.element.remove();
	   }
	 })

	 /**
	* 定义select 单选 组件
	*@constructor	selectfield
	*
	*/
     $.widget('ui.selectfield', $.ui.components, {
	     options: {
		 containTpl: '<select class="x-component-input" name="#{itemName}" ></select>',
		 itemTpl:'<option value="#{value}">#{display}</option>',
		 store:[],
		 noWrite: false,
		 blankValue:false,
		 noLabel:false
		 },
		 _create: function(){
			this._createLabel.call(this, arguments);
			var o = this.options;

			this.selectEl = $( _format(o.containTpl,{
			                            itemName : o.id
			                        })
			                  )
			this.items.append(this.selectEl);
			this.loadData(undefined, true);

			if(typeof o.value != 'undefined')
			{
			   this.setValue(o.value);
			}
			if(o.readOnly || o.disabled){
			    this.disabled(true);
			}
			if(o.noLabel){
			   $('#'+o.id+' .x-component-label').remove();
			}
		    return this;
	   },
	   disabled: function(bool){
	       var o  = this.options;
	       if(bool === true){
		       $('#' +o.id + ' select').attr('disabled',true)
		   }else if ( typeof bool === 'undefined'){
		       return $('#' +o.id + ' select').attr('disabled') ? 'true' :'false' ;
		   }else if (bool === false){
		       $('#' +o.id + ' select').attr('disabled',false)
		   }
	   },
	    loadData: function(store, display){
		   if( typeof store != 'undefined' && !$.isArray(store) )
		   {
		       log('error: store should be an array;like [{"display":"mp3","value":"2"}]');
			   return ;
		   }

		   var o = this.options, str = "", a = null;
		   o.store = store || o.store;

		  //select组件第一个元素为空
		  if( o.blankValue ){
		    a = o.store.length > 0 ? o.store.shift() : null;
		  }
		   if(a && $.trim(a.display) != ''){
		      o.store.unshift(a);
			  o.store.unshift({'display':'','value':''});
		   }

		   if( !display ){
		       return ;
		   }

		   $.each( o.store, function(key, item) {
			str += _format( o.itemTpl, {'value': _htmlEntityReverse( item.value ),
										'display': _htmlEntityReverse( item.display )
										});
		   });

		   this.selectEl.html('');
		   this.selectEl.append( $(str) );
		},
		setValue:function(value){
		    var store = this.options.store,isExist = true;
		   if( typeof value === undefined )
		   {
		        log('error: value should  not be undefined');
		   }
		   //如果设置不存在值
		   isExist = _isInStore(store, value);
		   if( !isExist ){
				store.push({'display':value,'value':value});
				this.loadData(store,true);
			}
		   this.selectEl.val(value);
		   return this;
	  },
	  getValue:function(){

		   return this.selectEl.val();
	  },
	  isNoWrite: function(){
	      return this.options.noWrite;
	  },
	  distroy: function(){
			$.ui.components.prototype.destroy();
			this.element.remove();
	   }
	 })

	  /**
	* 定义form lieb
	*  type : operation	 [input type: text、 file ]   label
	   fields: [{name:'composite'},{name:'company'},{name:'percent'}]
	   columns: [{
				text:' 操作',
				type:'operation' ,
				width: 80
			 },
			 {
				text:' 链接标题',
				dataIndex: 'ui_Relativeurl_title',
				type:'text',
				width: 70
			 }]
	*@constructor	editgrid
	*
	*/
     $.widget('ui.editgrid', $.ui.components, {
	     options: {
		         count: 0,
			 currentIndex: 0,
			 store:[],
			 fields:[],
			 defalutOperation: [{
						   text:'[添加]',
						   id:'addRow'
					   },{
					        text:'[删除]',
							id:'delRow'
					   }
					],
			 columns:[],
			 enableIndex: []

		 },
		 _create: function(){
			this._createLabel.call(this, arguments), o = this.options, me = this;

			var tableTpl = ['<table>'] ;

			tableTpl.push(this._addTh());
			tableTpl.push('</table>') ;
			this.items.append( $(tableTpl.join('')) );

			this.addRow({data:{ obj:me }});

			if(o.store && o.store.length > 1){
				this.loadData(o.store);
			}


		    return this;

	   },
	   _addTh: function(){
	       var thTpl = ['<tr>'] , temp ={};
		   for( var i = 0; i < o.columns.length; i++){
		        var temp = o.columns[i];
			    if(temp.type != 'hidden'){
					thTpl.push('<td style="text-align:left;width:' + temp.width + 'px;">' + temp.text + '</td>');
				}
			}
			thTpl.push('</tr>');

			return thTpl.join('');
	   },
	   _addTr: function(index){
	       var trTpl = ['<tr>'],i = 0, j = 0, temp ={}, o = this.options, tempId = '', tempName ='' ;
	       for( i = 0; i < o.columns.length; i++){
		   temp = o.columns[i];
		   tempId = o.id + '_' + temp.dataIndex + '_' + index;
		   tempName = temp.dataIndex + '[]' ;
		   switch (temp.type){
		   case 'operation':
		       trTpl.push('<td><div class="x-editgrid-operation">');
		       if(!temp.items || temp.items.length < 1){
			   temp.items = o.defalutOperation;
		       }
		       for( j = 0; j< temp.items.length; j++ )
		       {
			   tempId =  o.id+ '_' + temp.items[j].id + '_' + index;
			   tempName = o.id+ '_' + temp.items[j].id ;
			   trTpl.push('<a  href="javascript:void(0)" id="' +tempId + '" name="' + tempName + '">' + temp.items[j].text + '</a>');
		       }
		       trTpl.push('</div></td>');
		       break;

		   case 'text':
		       if(temp.defaultValue){
			   def = "value = '"+temp.defaultValue+"'"
		       }else{
			   def = ""
		       }
		       trTpl.push('<td><input type="text" '+def+' value="" class="editgrid_' + temp.dataIndex + '" id="' + tempId + '" name="' + tempName +'" ></input></td>')
		       break;
		   case 'file':
		       trTpl.push('<td><input type="file" value="" id="' + tempId + '" name="' + tempName + '" ></input></td>')

		       break;
		   case 'label':
		       trTpl.push('<td><span id="' + tempId + '" ></span></td>')
		       break;
		   case 'selectfield':
		       trTpl.push('<td><div id="'+ tempId +'" class="x-eidtgrid-selectfield x-editgrid-'+temp.dataIndex+'" name="' + tempName + '"></div></td>');
		       break;
		   case 'checkbox':
		       trTpl.push('<td><div id="'+ tempId +'" class="x-eidtgrid-checked x-editgrid-'+temp.dataIndex+'" name="' + tempName + '"></div></td>');
		       break;
		   case 'hidden':
		       if(temp.defaultValue){
			   def = "value = '"+temp.defaultValue+"'"
		       }else{
			   def = ""
		       }

		       trTpl.push('<td><input type="hidden" '+def+' id="' + tempId + '" name="' + tempName + '" ></input></td>')

		       break;
		   default:

		       trTpl.push('<td><span id="' + tempId + '" ></span></td>')

		       break;
		   }
	       }
	       trTpl.push('</tr>');
	       return trTpl.join('');
	   },
	  /**
	  *  @param  event: 添加按钮 点击事件
	  *  @paran  obj:  editgrid 对象
	  */
	   addRow: function(event){
	       var obj = event.data.obj, o = obj.options, item = null;


		   o.currentIndex = obj.getEnableIndex() ;

		   item = obj._addTr.call(obj , o.currentIndex);

	       $('#'+obj.id).find('table').append( item );
		   o.enableIndex.push( o.currentIndex );

		   //只对当前对象绑定事件
		   $('#' + o.id + '_' + 'addRow' + '_' + o.currentIndex).bind('click',{obj: obj},obj.addRow);
		   $('#' + o.id + '_' + 'delRow' + '_' + o.currentIndex ).bind('click',{obj: obj},obj.delRow);

		   if(o.initNewRow){
		      o.initNewRow();
		   }
		    return false;
	   },
	    /**
	   *  截取id中的序号
	   *  @return {Number}  序号
	   */
	   getItemIndex: function(id){
	        var index = id.lastIndexOf('_');
			index = id.substr(index+1,id.length);
		    return index;
	   },
	    /**
	   *  存放现有元素中的可用序号
	   */
	 //  enableIndex: [],
	    /**
	   *  返回可用序号
	   *  @return {Number}  可用序号
	   */
	   getEnableIndex: function(){
	        var ei = this.options.enableIndex , len = ei.length , i = 0;
			if(len == 0){
				return 0;
			}
			//按升序排序
	        ei = ei.sort(function(p,n){
		       return p - n;
		    });

		    //按序取最小可用序号
			for(; i < len - 1 ; i++){
			    if( ei[i+1] - ei[i] > 1 ){
				    return ei[i]+1 ;
				}
			}
			return ei[len-1] + 1 ;
	   },
	   /**
	   *  删除可用序号
	   *  @param {Number} value 需要删除的序号
	   *  @paran {Array} array  被操作的数组
	   *  @return {Array} array 被删除后的数组
	   */
	   removeEnableIndex: function(value,array){
	       var index = $.inArray( parseInt(value, 10), array );
		   if( ! (index < 0))
		   {
				 array.splice(index,1);
		   }
			return array
	   },
	   delRow: function(event){
	        var obj = event.data.obj, o = obj.options, event = event||window.event, target = event.srcElement || event.target ;
			if( $('#'+o.id +' table tr').length > 2 )
			{
				$(target).parents('tr').remove();
				o.enableIndex = obj.removeEnableIndex( obj.getItemIndex( target.id ) , o.enableIndex) ;
			}
		   return false;
	   },
	 _setData:function(data){
	     var obj = data.data.obj,row=data.data.i,col=data.data.j,o=this.options,store=data.data.store;
	     rows = this.options.columns[col]
	     if(rows.type == "checkbox"){
		 return trs.join("")
	     }else{
		 return _htmlEntityReverse(store[row][col]);
	     }
	 },
	   loadData: function(store, display){
	        var o = this.options , i = 0 ,j = 0, item = null, len=0 ,len2=0, tempId='';
	       if( !$.isArray( store ) || store.length < 1){
		       log('error: editgrid data should be an array and can not be empty');
			   return ;
		   }
		 //清除所有表格内容
		   $('#' + o.id + ' table tr:not(:first)').remove();
		   o.enableIndex = [];
		  //清除行计数器
		   o.currentIndex = 0 ;
		   // store 值与 fileds 值顺序一致
		   // [['song_tilte1','song_company1','song_desc1'],
		   //          ['song_tilte2','song_company2','song_desc2']]
		   //store 是一个二维数组
		   for( i = 0, len = store.length; i < len; i++ ){
		       item = store[i];
			   if( item && item.length > 0 ){
			       this.addRow( {data: {obj: this}} );
					for( j = 0, len2 = item.length; j < len2 ; j++){
					    tempId = o.id + '_' + o.fields[j].name + '_' + o.currentIndex;
					    if($('#'+tempId).find("input:checkbox").attr("type") == "checkbox"){
						$('#'+tempId)["checkbox"]("setValue",item[j])
					    }
					    else if($('#'+tempId+" select").is("select")){
					    	$('#'+tempId)["selectfield"]("setValue",item[j])
					    }
					    else{
						$('#'+tempId).val(_htmlEntityReverse(item[j]));
						$('#'+tempId).text(_htmlEntityReverse(item[j]));
					    }
					}
			   }
		   }
	   },
	   setValue:function(store){
		  this.loadData(store);
	  },
	  /*
	  *
	  *  转换 json对象 为 php json_decode 可以处理的字符串
	  [{"sc_artist_name":"compose1","sc_company":"emi1","sc_percent":"10%"},
	    {"sc_artist_name":"compose2","sc_company":"emil2","sc_percent":"30%"} ]
	  */
	  jsonTostr: function(str, json){
	       str.push('{') ;
		   for(var i in json){
		         if( typeof json[i] == 'object' && json[i].length === undefined )
				 {
				      str.push( this.jsonTostr(str,json[i]) );
					  str.push( ',' );
				 }else{
					 str.push('"'+ i + '":"' + json[i] + '"' );
					 str.push(',');
				 }
		   }
		     //弹出最后一个逗号
		  if(str.length > 1){
			str.pop();
		  }
		  str.push('}') ;
		  return str ;
	  },
	  isEmptyTr : function(data){
	      var isEmpty = true;
		  for(var i in data){
			 if( $.trim(data[i]) != '' ){
				 isEmpty = false;
				 break;
			 }
		  }
		  return isEmpty;
	  },
	  getValue:function(){
		  var ret = {}, dataJson = {}, i = 0 ,j = 0, len = 0, tempId = '',str=[], o = this.options;
		  var name='', type='';
		  if( typeof o.getValue === 'function')
		  {
		      return o.getValue();
		  }

		  for(i = 0; i < o.enableIndex.length ; i++){
		      for( j = 0, len = o.fields.length ; j < len ; j++){
			        if(o.fields[j].noReturn){
					   continue;
					}
					//name即dataIndex  字段标识
					name = o.fields[j].name;
			  if(o.fields.length == o.columns.length){
			      type = o.columns[j].type;
			  }else{
			      type = o.columns[j+1].type;
			  }
					tempId = o.id + '_' + name + '_' + o.enableIndex[i];
					//dataJson[o.fields[j].name] = $('#' + tempId).val();

					// o.columns[j].type 表格字段类型 如  textfield selectfield
					if(type === 'selectfield'){
					    // dataJson[name] =  $('#' + tempId)[o.columns[j].type]('getValue') ;
					    dataJson[name] =  $('#' + tempId)[type]('getValue') ;
					}else if(type == "checkbox"){
					    dataJson[name] =  $('#' + tempId)[type]("getValue");
					}else if(tempId.indexOf("conditions")>=0){
						//$('#' + tempId).val()引号冲突问题，encodeURI不处理单引号
					    dataJson[o.fields[j].name] = encodeURI($.trim($('#' + tempId).val()));
					}
					else{
						dataJson[o.fields[j].name] = $('#' + tempId).val();
					}

			  }

			  this.isEmptyTr(dataJson) ? '' : (function(){ ret[i] = dataJson; })() ;

			  dataJson = {};
		  }
		  str = this.jsonTostr(str, ret);
		  //同级json对象使用 [ ] 包含，分别替换 { }
		  str.splice(0,1,'[');
		  str.splice(str.length-1,1,']');
		  return str.join('') ;
	  },
	  distroy: function(){
			$.ui.components.prototype.destroy();
			this.element.remove();
	  }
	 })

	 	/**
	* 定义图片展示如： 授权书
	*@constructor	textarea
	*
	*/
	 $.widget('ui.imglink', $.ui.components, {
			options: {
			    itemTpl: ' <a class="x-component-img" target="_blank" href="#{imgUrl}"><img width="50" height="50" src="#{imgUrl}"></a>',
				store: [],
				width: '50px',
				height: '50px'
			},
			_create: function(){
			    var o = this.options, str='' ;
				this._createLabel.call(this, arguments);
				str += _format(o.itemTpl, {
					imgUrl: o.imgUrl
				});
				this.items.append( $(str) ) ;
				this.items.css({ 'width':o.width,'height':o.height });

			},

			getValue: function(){
			    return this.items.find('img').attr('src');
			},
			setValue: function(str){
			     var url = _htmlEntityReverse(str);
			     this.items.find('a').attr('href',url);
			     this.items.find('img').attr('src',url);
			},
		  distroy: function(){
				$.ui.components.prototype.destroy();
				this.element.remove();
		   }
	   })
	 /*
	 *  页面输入元素组合对象，批量获取元素值和设置元素值
	 */
	 quku_v.FormArray =  (function(){
	     var fn = function(){
		    this._store = [];
		 }
		 fn.prototype = {
		    push : function(item){
			    this._store.push(item);
			},
			 /**
			 * 设置组合对象中元素的值
			 * @method setValue
			 * @param {Json}  后端返回的页面元素的值组成的json对象
			 * @return {}
			 */
			setValue: function(data){
			    $.each(this._store,function(key,value){
					 $.each(value,function(index,componentType){
						$('#'+index)[componentType]('setValue',data[index]);
					 })

				 })
			},
			/**
			 * 获取组合对象中元素的值
			 * @method getValue
			 * @param {Any}
			 * @return {Json} 以id为key的各元素的键值对数据
			 */
			getValue: function(){
			    var result = {};
				$.each( this._store, function(key, value){
					 $.each(value, function(index, item){
					        if( $('#' + index) && $('#' + index).length > 0 )
							{
							    result[index] = $('#'+index)[item]('getValue') ;
							}
					 })

				 } )
				 return result;
			}
		 }
		 return fn ;

	 })();
	 quku_v.format  = function (source, opts) {
				source = String(source);
				var data = Array.prototype.slice.call(arguments,1), toString = Object.prototype.toString;
				if(data.length){
					data = data.length == 1 ?
						/* ie 下 Object.prototype.toString.call(null) == '[object Object]' */
						(opts !== null && (/\[object Array\]|\[object Object\]/.test(toString.call(opts))) ? opts : data)
						: data;
					return source.replace(/#\{(.+?)\}/g, function (match, key){
						var replacer = data[key];
						// chrome 下 typeof /a/ == 'function'
						if('[object Function]' == toString.call(replacer)){
							replacer = replacer(key);
						}
						return ('undefined' == typeof replacer ? '' : replacer);
					});
				}
				return source;
	  };


})(jQuery,window)




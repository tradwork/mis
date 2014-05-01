(function($, undefined) {
	var ie6 = $.browser.msie && ($.browser.version == "6.0");
	$.widget('openuser.dialog', {
		options: {
			// 自动打开弹窗
			autoOpen : false,
			//dialog宽度
			width: 300,
			//背景遮罩层透明度
			opacity: 0.5,
			//窗口关闭按钮
			close: {
				"btn" : ".btn-close",
				callback :function(){}
			},
			// 窗口
			confirm: {
				// 确认按钮
				"btn": ".btn-confirm",
				//点击确认按钮时候关闭窗口
				"close": true,
				callback: function() {} //点击确认按钮回调函数
			},
			cancel: {
				//取消按钮
				"btn": ".btn-cancel",
				//点击取消按钮时候关闭窗口
				"close": true,
				callback: function() {} //点击取消按钮回调函数
			},
			// ie6 表单需要iframe遮挡，若当前页面有表单需要设置
			bgiframe : false,
			// 弹窗弹出，推出的动画速度
			fadeSpeed : 250


		},

		_create: function() {},

		_init: function() {
			var me = this,
				options = me.options;
			me._createDialog();
			me._initEvent();
			options.autoOpen && me.show();

		},
		_createDialog: function() {
			var me = this,
				options = me.options;
			me.overlay = $("<div id='dialogBg' class='dialog-bg'></div>");
			
			me.dialogHead = '<div class="head"><span class="btn btn-close" title="关闭">关闭</span></div>';
			me.dialogBtn = '<div class="operator"><a href="#" class="btn btn-confirm">确定</a><a href="#" class="btn btn-cancel">取消</a></div>';
			me.dialogBox = me.element.parent('.dialog-box').length ?
				 me.element.parent('.dialog-box') : 
				 me.element.addClass('body').show()
				.wrap("<div/>").parent()
				.prepend(me.dialogHead)
				.append(me.dialogBtn);

			!$("#dialogBg").length && $("body").append(me.overlay);
			me.dialogBg = $("#dialogBg");


		},
		show : function() {
			var me = this,
				options = me.options;
				
			var modal_height = me.dialogBox.outerHeight();
				

				/*由于IE6诡异的bug 在此设置为appendN次 */
			if( options.bgiframe  && ie6 ){
				/*由于ie6有诡异的bug，即使设置iframe，也会出现select框，所以i6增加滚动*/
				$(document).scrollTop( $(document).scrollTop() + 1 );
				$(document).scrollTop( $(document).scrollTop() + -1 );
				if(  !me.dialogBox.find("iframe").length ){
					var iframe = $("<iframe frameborder=0>");
					iframe.css( "height" ,  modal_height );
					me.dialogBox.append(iframe);
				}
			}
			if(ie6){
				me.dialogBg.css({
					"display" : "block",
					"height": Math.max($(document).height(), $(window).height()) + "px"
				});
				me.dialogBg.find("iframe").css({
					"height": Math.max($(document).height(), $(window).height()) + "px"
				});
			}

			me.dialogBg.fadeTo(options.fadeSpeed, options.opacity);

			if(!me.dialogBox.hasClass("dialog-box")){
				me.dialogBox.addClass("dialog-box");
			}
			me.dialogBox.css({
				"display": "block",
				"width": options.width,
				"margin-left": -(options.width / 2) + "px",
				"margin-top": -(modal_height / 2)  +  (ie6 ? ($(document).scrollTop()) : 0) + "px"
			});
			me.dialogBox.fadeTo(options.fadeSpeed, 1);
			ie6 && $("select").css("visibility" , "hidden");


		},
		hide : function(){
			var me = this;
			me._closeDialogbox();
		},
		_initEvent: function() {
			var me = this,
				options = me.options;

			/*me.dialogBg.click(function() {
				me._closeDialogbox();
			});*/

			me.dialogBox.find(options.close.btn).click(function() {
				me._closeDialogbox();
				options.close.callback();
			});

			options.confirm.btn && me.dialogBox.find(options.confirm.btn).bind("click", function() {
				// var  isClose = options.confirm.close;
				options.confirm.callback();
				options.confirm.close && me._closeDialogbox();
				return false;
			});



			options.cancel.btn && me.dialogBox.find(options.cancel.btn).bind("click", function() {
				options.cancel.callback();
				options.cancel.close && me._closeDialogbox();
				return false;
			});

		},

		_closeDialogbox: function() {
			var me = this,
				options = me.options;
			ie6 && $("select").css("visibility" , "visible");
			me.dialogBg.fadeOut(options.fadeSpeed);
			me.dialogBox.fadeOut(options.fadeSpeed);
			
		},
		destroy: function() {
			
		}

	});
}(jQuery));
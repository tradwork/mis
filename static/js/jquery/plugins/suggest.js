/*
 *   jQuery Suggest Plugin 
 *   rewrite by liuzhaodong 
 *   Data 2011-01-11 17:31   
 *   
 */
(function($) {
	$.suggest = function(elem, options) {
		var $results = $(document.createElement("ul")).appendTo('body');	
		init();
		elem.keyup(processKey);
		
		elem.blur(function() {
			setTimeout(function() { $results.hide() }, 200);
		});
		$(window).load(init).resize(init);
		function init() {	
			$results.addClass(options.resultsClass);
			$results.width(elem[0].offsetWidth);
			var offset = elem.offset();
			$results.css({
				top: (offset.top + elem[0].offsetHeight-1) + 'px',
				left: offset.left + 'px'
			});
		}
		function processKey(e) {
			var offset = $(e.target).offset();
			$results.css({
				top: (offset.top + e.target.offsetHeight-1) + 'px',
				left: offset.left +'px'
			});
			if ((/27$|38$|40$/.test(e.keyCode) && $results.is(':visible')) ||
				(/^13$|^9$/.test(e.keyCode) && getCurrentResult())) {
                e.preventDefault();
                e.stopPropagation();
				switch(e.keyCode) {
					case 38: // up
						prevResult();
						break;
					case 40: // down
						nextResult();
						break;
					case 13: // return
						selectCurrentResult();
						break;
					case 27: //	escape
						$results.hide();
						break;
				}
			} else {
				suggest();
			}			
		}
		function stripX(str){
			return str.replace(/\&amp;/g,'&').replace(/\&lt;/g,'<').replace(/\&gt;/g,'>').replace(/\&quot;/g,'"').replace(/\&#039;/g,'\'');
		};
		function suggest() {
			var word = $.trim(elem.val());
			if(!word){
				$results.hide();
				return;
			}
			//modify for quku   suggestion   2012/2/2
			
			//old:   options.ajaxSettings.data.keyword = word;
			options.ajaxSettings.data.od_spell_code =word;
			
			jQuery.ajax({
	            type: options.ajaxSettings.type,
	            url: options.ajaxSettings.url,
	            data: options.ajaxSettings.data,
	            success: function(data){
	            	if(options.isObject){
		            	if(!data || Object.prototype.toString.call(data) !== "[object Object]") return;
						var html = '',suggest_tip="";
		            	if(!data) return;
		            	for(var key in data){
			            	for(var i=0;i<data[key].length;i++){
			            		html += '<li><a href="#">' + data[key][i] + '</a><input type="hidden" value="'+key+'"></li>';
			            	}
		            	}
		            	if (html == '') {
		            		html = '<li class="gray">对不起，找不到：' + word + '</li>';
						}
						html += '<s><b></b><em><i></i></em></s>';
						$results.html(html).show();
						$results.children('li:first-child').addClass(options.selectClass);
						$results.children('li').mouseover(function() {
								$results.children('li').removeClass(options.selectClass);
								$(this).addClass(options.selectClass);
							}).click(function(e) {
								e.preventDefault(); 
								e.stopPropagation();
								selectCurrentResult();
							});
						return ;
	            	}
	            	if(!data || Object.prototype.toString.call(data) !== "[object Array]") return;
					var html = '',suggest_tip="";
	            	if(!data) return;
	            	for(var i=0;i<data.length;i++){
						html += '<li ><a href="#">' + data[i] + '</a></li>';
	            	}
	            	if (html == '') {
	            		html = '<li class="gray">对不起，找不到：' + word + '</li>';
					}
					html += '<s><b></b><em><i></i></em></s>';
					$results.html(html).show();
					$results.children('li:first-child').addClass(options.selectClass);
					$results.children('li').mouseover(function() {
							$results.children('li').removeClass(options.selectClass);
							$(this).addClass(options.selectClass);
						}).click(function(e) {
							e.preventDefault(); 
							e.stopPropagation();
							selectCurrentResult();
						});
	            },
	            dataType: options.ajaxSettings.dataType
	        });
		}
		function getCurrentResult() {
			if (!$results.is(':visible'))
				return false;
			var $currentResult = $results.children('li.' + options.selectClass);
			if (!$currentResult.length)
				$currentResult = false;
			return $currentResult;
		}
		function selectCurrentResult() {
			var $currentResult = getCurrentResult();
			if ($currentResult) {
				elem.val(stripX($currentResult.children('a').html()));
				if(options.isObject&&options.callBackID){
					$("#"+options.callBackID).val(stripX($currentResult.children('input').val()))
				}
				$results.hide();
			}
		}
		function nextResult() {
			var $currentResult = getCurrentResult();
			if ($currentResult)
				$currentResult
					.removeClass(options.selectClass)
					.next()
						.addClass(options.selectClass);
			else
				$results.children('li:first-child').addClass(options.selectClass);
		}
		function prevResult() {
			var $currentResult = getCurrentResult();
			if ($currentResult)
				$currentResult
					.removeClass(options.selectClass)
					.prev()
						.addClass(options.selectClass);
			else
				$results.children('li:last-child').addClass(options.selectClass);
		}
	}
	$.fn.suggest = function(ops) {
		var options = {
				resultsClass : "ac_results",
				selectClass : "ac_over",
				matchClass : "ac_match",
				isObject : false,
				callBackID : "",
				ajaxSettings : {
		            type: "POST",   				       
		            url: "index.php?c=pinyin&m=searchOptions",						
		            data: {category:"music_publish_company"},  				       
		            success: null, 	        
		            dataType: "json"       
		        } 
		}
		this.extend(options,ops);
		this.each(function() {
			new $.suggest($(this), options);
		});
	};
})(jQuery);
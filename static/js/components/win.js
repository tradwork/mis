function stripX(str){
		return str.replace(/\&amp;/g,'&').replace(/\&lt;/g,'<').replace(/\&gt;/g,'>').replace(/\&quot;/g,'"').replace(/\&#039;/g,'\'');
};
var win = {
        show:function(title,data,callback){
            var tpl,DH = $(window).height(),DW = $(window).width(),ST =$(window).scrollTop() ;
            if(this.el){return;}
            this.el = document.createElement("div");this.el.className = "win";
            this.cl = document.getElementById(callback);
            if(!data){return}
            this.el.style.top =(DH-330)/2 + ST + "px";
            this.el.style.left = (DW -500)/2 + "px";
            tpl = "<div class='win-header'> 请选择"+title +"<a href='javascript:void(0)' class='win-btn-close' onclick='win.close()'></a></div><div class='win-body'><div class='win-content'>";
            for(var i=0;i<data.length;i++){
                if(this.cl.value == stripX(data[i])){
                        tpl += "<input type='radio' name='ooooo'  value='" + data[i] + "' checked='true'/><span>" +data[i]+"</span>"
                        if((i+1)%4 ==0){tpl+="<br>"}
						continue;
                }
                tpl += "<input type='radio' name='ooooo'  value='" + data[i] + "' /><span>" +data[i]+"</span>";
				if((i+1)%4 ==0){tpl+="<br>"}
            }
            tpl += "<input type='radio' name='ooooo'  value='' /><span>无</span></div><div class='win-footer'><button type='button' class='button01' onclick='win.submit()'>确定</button></div></div></div>";
            this.el.innerHTML = tpl;
            document.body.appendChild(this.el);
        },
        submit:function(){
            var DD = this.el.getElementsByTagName("input"),isCheck = false;
            for (var i=0;i<DD.length;i++){
                if(DD[i].checked){
                    this.cl.value = DD[i].value;
                    isCheck = true;
                }
            }
            if(isCheck){
                win.close();
            }else{
                alert("请选择唱片公司")
            }
        },
        close:function(){
            if(this.el)
            document.body.removeChild(this.el);
            try{
            	delete this.el;
            }catch(e){alert("error !")};
        }
};

//明星待同步的修改类型弹出层11.22
var artistModifyType = {
	show : function(cache_data, data,  audit_data){
	    
		cache_jsonPic = eval(cache_data.quku_pic_info);
		jsonPic = eval(data.quku_pic_info);
		var area = [],areaOption = data.option.ab_area;
		for(var key in areaOption){
		    area.push( {'display':areaOption[key],'value':key} );
		}
	
		var tpl="",DH = $(window).height(),DW = $(window).width(),ST =$(window).scrollTop() ;
		if(this.el){return;}
		this.el = document.createElement("div");this.el.className = "win";
		//if(!data){return}
		this.el.style.top =(DH-400)/2 + ST + "px";
		this.el.style.left = (DW -1024)/2 + "px";
		this.el.style.width = "auto";
		this.el.style.height = "auto";
		tpl += "<div class='win-header'>明星同步审核<a href='javascript:void(0)' class='win-btn-close' onclick='artistModifyType.close()'></a></div><div class='win-body'><div class='win-content' style='height:auto;'>";
		tpl += "<table class='tb_preview' width='100%'>";
		tpl += "<tr>";
		tpl += "<td width='50%'>";
		//修改前
		tpl += "<fieldset><legend><label>修改前</label></legend>";
		tpl += "<table class='tb_preview'>";
		//姓名
		tpl += "<tr><td class='fieldName'><span class='red'>*</span><span>姓名：</span></td><td><input  id='ab_name' maxLen='100' value='" + data.quku_artists_base.ab_name + "' /><div id='nb_ab_name'></div></td></tr>";
		//图片预览获取最大的预览图
		tpl += "<tr>" + 
			'<td class="fieldName"><span>明星图片：</span></td>';
			tpl += '<td colspan="3">';
				tpl += '<table id="tablePic">' +
						'<tr>' +
							'<td class="fieldName" style="text-align:left;width:80px!important;">预览</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">宽度</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">高度</td>' +
						'</tr>';
				if(jsonPic.length != 0){
					for(var i = 0; i < jsonPic.length; i++){
						tpl += '<tr>';
						tpl += '<td class="fieldName" style="text-align:left;width:80px!important;">';
						tpl += '<a href="' + jsonPic[i].pi_link + '" target="_blank"><img src=\'' + jsonPic[i].pi_link + '\' width="60" height="60" /></a>';
						tpl += '</td>' +
								'<td class="fieldName" style="text-align:left;width:45px!important;">' + jsonPic[i].pi_pic_width + '</td>' +
								'<td class="fieldName" style="text-align:left;width:45px!important;">' + jsonPic[i].pi_pic_height + '</td>' +
							'</tr>';
					}
				}
				tpl += '<div id="tablePicHidden"></div>' +
					'</table>' +
					'<div id="nb_quku_pic_info"></div>';
		tpl += "</td>"
		tpl += "</tr>";
		//生日
		tpl += "<tr>" + 
			"<td class='fieldName'><span>生日：</span></td><td><input style='width:152px'  name='ab_birthday' id='ab_birthday' class='datePicker' value='" + data.quku_artists_base.ab_birthday + "' /><div id='nb_ab_birthday'></div></td>"
			+ "</tr>";
		//地区
		tpl += "<tr>" +
			"<td class='fieldName'><span class='red'>*</span><span>地区：</span></td><td><div id='ab_area_before'></div>" + "<div id='nb_ab_area'></div></td>"
			+ "</tr>";
		//明星介绍
		tpl += "<tr>" + 
			"<td class='fieldName'><span>明星介绍：</span></td><td colspan='3'><textarea id='ab_info' name='ab_info' caption='明星介绍' key='true' cols='35' rows='15'>" + data.quku_artists_base.ab_info + "</textarea><div id='nb_ab_info'></div></td>"
			+ "</tr>";
		tpl += "</table>";
		tpl += "</fieldset>";
		tpl += "</td>";
		tpl += "<td width='50%'>";
		//修改后
		tpl += "<fieldset><legend><label>修改后</label></legend>";
		tpl += "<table class='tb_preview' id='tb_preview_later'>";
		//姓名
		tpl += "<tr><td class='fieldName'><span class='red'>*</span><span>姓名：</span></td><td><input  id='ab_name' maxLen='100' value='" + cache_data.quku_artists_base.ab_name + "' /><div id='nb_ab_aname'></div></td>";
		tpl += "<td>";
		tpl += "<input type='checkbox' class='audio_data_check' id='ab_name_check' />";
		tpl += "</td></tr>";
		//图片预览
		tpl += "<tr>" + 
			'<td class="fieldName"><span>明星图片：</span></td>' +
			'<td colspan="3">' +
				'<table id="tablePic">' +
					'<tr>' +
						'<td class="fieldName" style="text-align:left;width:80px!important;">预览</td>' +
						'<td class="fieldName" style="text-align:left;width:45px!important;">宽度</td>' +
						'<td class="fieldName" style="text-align:left;width:45px!important;">高度</td>' +
					'</tr>';
				if(cache_jsonPic.length != 0){
					for(var i = 0; i < cache_jsonPic.length; i++){
						tpl += '<tr>';
						tpl += '<td class="fieldName" style="text-align:left;width:80px!important;">';
						tpl += '<a href="' + cache_jsonPic[i].pi_link + '" target="_blank"><img src=\'' + cache_jsonPic[i].pi_link + '\' width="60" height="60" /></a>';
						tpl += '</td>' +
								'<td class="fieldName" style="text-align:left;width:45px!important;">' + cache_jsonPic[i].pi_pic_width + '</td>' +
								'<td class="fieldName" style="text-align:left;width:45px!important;">' + cache_jsonPic[i].pi_pic_height + '</td>' +
							'</tr>';
					}
				}
				tpl += '<div id="tablePicHidden"></div>' +
				'</table>' +
				'<div id="nb_quku_pic_info"></div>' +
			"</td>" +
			"<td><input type='checkbox' class='audio_data_check' id='quku_pic_info_check' /></td>"
			+ "</tr>";
		//生日
		tpl += "<tr>" + 
			"<td class='fieldName'><span>生日：</span></td><td><input style='width:152px'  name='ab_birthday' id='ab_birthday' class='datePicker' value='" + cache_data.quku_artists_base.ab_birthday + "' /><div id='nb_ab_birthday'></div></td>" +
			"<td><input type='checkbox' class='audio_data_check' id='ab_birthday_check' /></td>"
			+ "</tr>";
		//地区
		tpl += "<tr>" +
			"<td class='fieldName'><span class='red'>*</span><span>地区：</span></td><td><div id='ab_area_after'></div>" + "<div id='nb_ab_area'></div></td>" +
			"<td><input type='checkbox' class='audio_data_check' id='ab_area_check' /></td>"
			+ "</tr>";
		//明星介绍
		tpl += "<tr>" + 
			"<td class='fieldName'><span>明星介绍：</span></td><td colspan='3'><textarea id='ab_info' name='ab_info' caption='明星介绍' key='true' cols='35' rows='15'>" + cache_data.quku_artists_base.ab_info + "</textarea><div id='nb_ab_info'></div></td>" +
			"<td><input type='checkbox' class='audio_data_check' id='ab_info_check' /></td>"
			+ "</tr>";
		tpl += "</table>";
		tpl += "</fieldset>";
		tpl += "</td>";
		tpl += "</tr>";
		tpl += "<tr>";
		tpl += "<td>";
		tpl += "</td>";
		tpl += "<td>";
		tpl += "<button type='button' class='button01' id='synBtn'>同步" +"</button> <button type='button' class='button01' onclick='artistModifyType.close();'>取消</button>";
		tpl += "</td>";
		tpl += "</tr>";
		tpl += "</table>";
		tpl += "</div></div>";
		this.el.innerHTML = tpl;
        document.body.appendChild(this.el);
		
		$('#synBtn').click(function( audit_data, data){
			return function(){
				synchronous.show("artist",  audit_data, data);
			}		
		}( audit_data, data));
		//判断某一行数据出现复选框并选中
		$('.audio_data_check').each(function(i){
			$('.audio_data_check').eq(i).css('display', 'none');
		});
		if(audit_data){
			for(var i = 0; i < audit_data.length; i++){
				var checkName = "#" + audit_data[i] + "_check";
				$(checkName).css('display', 'block');
				$(checkName).attr('checked', 'true');
				$(checkName).attr('title', audit_data[i]);
			}
		}
		$('#ab_area_before').selectfield({
		    noLabel:true,
			store: area,
			value: data.quku_artists_base.ab_area
		});
		$('#ab_area_after').selectfield({
		    noLabel:true,
			store: area,
			value: cache_data.quku_artists_base.ab_area
		});
		
	},
	close : function(){
		if(this.el){
			document.body.removeChild(this.el);
		}
		try{
			delete this.el;
		}catch(e){alert("error !");};
	}
};
//专辑待同步的修改类型弹出层11.22
var albumModifyType = {
	show : function(cache_data, data,  audit_data){
	
		cache_jsonPic = eval(cache_data.quku_pic_info);
		jsonPic = eval(data.quku_pic_info);
		var tpl="",DH = $(window).height(),DW = $(window).width(),ST =$(window).scrollTop() ;
		if(this.el){return;}
		this.el = document.createElement("div");this.el.className = "win";
		//if(!data){return}
		this.el.style.top =(DH-400)/2 + ST + "px";
		this.el.style.left = (DW -1024)/2 + "px";
		this.el.style.width = "auto";
		this.el.style.height = "auto";
		tpl += "<div class='win-header'>专辑同步审核<a href='javascript:void(0)' class='win-btn-close' onclick='albumModifyType.close()'></a></div><div class='win-body'><div class='win-content' style='height:auto;'>";
		tpl += "<table class='tb_preview' width='100%'>";
		tpl += "<tr>";
		tpl += "<td width='50%'>";
		//修改前
		tpl += "<fieldset><legend><label>修改前</label></legend>";
		tpl += "<table class='tb_preview'>";
		//专辑名
		tpl += "<tr><td class='fieldName'><span class='red'>*</span><span>专辑名：</span></td><td><input  id='ai_album' maxLen='100' value='" + data.quku_albums_info.ai_album + "'  /><div id='nb_ai_album'></div></td></tr>";
		//歌手名
		tpl += "<tr>" + 
			'<td class="fieldName"><span>歌手(多歌手用,分割)：</span></td><td><input style="width:280px;" id="quku_artist_works_ref" name="quku_artist_works_ref" caption="演员" isNum="false" maxLen="200" key="true" charTrans="true" value="' + data.quku_artist_works_ref + '" /></td>';
		tpl += "</tr>";
		//图片
		tpl += "<tr>" + 
			'<td class="fieldName"><span class="red">*</span><span>专辑海报：</span></td>';
			tpl += '<td colspan="3">';
				tpl += '<table id="tablePic">' +
						'<tr>' +
							'<td class="fieldName" style="text-align:left;width:80px!important;">预览</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">宽度</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">高度</td>' +
						'</tr>';
                        if(jsonPic.length != 0){
							for(var i = 0; i < jsonPic.length; i++){
								tpl += '<tr>';
								tpl += '<td class="fieldName" style="text-align:left;width:80px!important;">';
								tpl += '<a href="' + jsonPic[i].pi_link + '" target="_blank"><img src=\'' + jsonPic[i].pi_link + '\' width="60" height="60" /></a>';
								tpl += '</td>' +
										'<td class="fieldName" style="text-align:left;width:45px!important;">' + jsonPic[i].pi_pic_width + '</td>' +
										'<td class="fieldName" style="text-align:left;width:45px!important;">' + jsonPic[i].pi_pic_height + '</td>' +
									'</tr>';
							}
						}
				tpl += '<div id="tablePicHidden"></div>' +
					'</table>' +
					'<div id="nb_quku_pic_info"></div>';
		tpl += "</td>"
		tpl += "</tr>";
		//发行时间
		tpl += "<tr>" +
			"<td class='fieldName'><span>发行时间：</span></td><td>" + data.quku_albums_info.ai_publishtime + "<div id='nb_ai_publishtime'></div></td>"
			+ "</tr>";
		//流派
		tpl += "<tr>" + 
		"<td class='fieldName'><span>风格：</span></td><td>" + data.quku_albums_info.ai_styles + "<div id='nb_ai_styles'></div></td>"
			+ "</tr>";
		//简介
		tpl += "<tr>";
		tpl += '<td class="fieldName">';
		tpl += '<span>专辑介绍：</span>';
		tpl += '</td>';
		tpl += '<td colspan="3">';
		tpl += '<textarea id="ai_info" name="ai_info" caption="专辑介绍" key="true" cols="35" rows="15">' + data.quku_albums_info.ai_info + '</textarea>';
		tpl += '<div id="nb_ai_info"></div>';
		tpl += "</td>";
			+ "</tr>";
		tpl += "</table>";
		tpl += "</fieldset>";
		tpl += "</td>";
		tpl += "<td width='50%'>";
		//修改后
		tpl += "<fieldset><legend><label>修改后</label></legend>";
		tpl += "<table class='tb_preview'>";
		//专辑名
		tpl += "<tr><td class='fieldName'><span class='red'>*</span><span>专辑名：</span></td><td><input  id='ai_album' maxLen='100' value='" + cache_data.quku_albums_info.ai_album + "' /><div id='nb_ai_album'></div></td><td><input type='checkbox' class='audio_data_check' id='ai_album_check' /></td></tr>";
		//歌手名
		tpl += "<tr>" + 
			'<td class="fieldName"><span>歌手(多歌手用,分割)：</span></td><td><input style="width:280px;" id="quku_artist_works_ref" name="quku_artist_works_ref" caption="演员" isNum="false" maxLen="200" key="true" charTrans="true" value="' + cache_data.quku_artist_works_ref + '" /></td><td><input type="checkbox" class="audio_data_check" id="quku_artist_works_ref_check" /></td>';
		tpl += "</tr>";
		//图片
		tpl += "<tr>" + 
			'<td class="fieldName"><span class="red">*</span><span>专辑海报：</span></td>';
			tpl += '<td colspan="3">';
				tpl += '<table id="tablePic">' +
						'<tr>' +
							'<td class="fieldName" style="text-align:left;width:80px!important;">预览</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">宽度</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">高度</td>' +
						'</tr>';
						if(cache_jsonPic.length != 0){
							for(var i = 0; i < cache_jsonPic.length; i++){
								tpl += '<tr>';
								tpl += '<td class="fieldName" style="text-align:left;width:80px!important;">';
								tpl += '<a href="' + cache_jsonPic[i].pi_link + '" target="_blank"><img src=\'' + cache_jsonPic[i].pi_link + '\' width="60" height="60" /></a>';
								tpl += '</td>' +
										'<td class="fieldName" style="text-align:left;width:45px!important;">' + cache_jsonPic[i].pi_pic_width + '</td>' +
										'<td class="fieldName" style="text-align:left;width:45px!important;">' + cache_jsonPic[i].pi_pic_height + '</td>' +
									'</tr>';
							}
						}
				tpl += '<div id="tablePicHidden"></div>' +
					'</table>';
		tpl += "</td>"
		tpl += "<td><input type='checkbox' class='audio_data_check' id='quku_pic_info_check' /></td>";
		tpl += "</tr>";
		//发行时间
		tpl += "<tr>" +
			"<td class='fieldName'><span>发行时间：</span></td><td>" + cache_data.quku_albums_info.ai_publishtime + "<div id='nb_ai_publishtime'></div></td><td><input type='checkbox' class='audio_data_check' id='ai_publishtime_check' /></td>"
			+ "</tr>";
		//流派
		tpl += "<tr>" + 
			"<td class='fieldName'><span>风格：</span></td><td>" + cache_data.quku_albums_info.ai_styles + "<div id='nb_ai_styles'></div></td><td><input type='checkbox' class='audio_data_check' id='ai_styles_check' /></td>"
			+ "</tr>";
		//简介
		tpl += "<tr>";
		tpl += '<td class="fieldName">';
		tpl += '<span>专辑介绍：</span>';
		tpl += '</td>';
		tpl += '<td colspan="3">';
		tpl += '<textarea id="ai_info" name="ai_info" caption="专辑介绍" key="true" cols="35" rows="15">' + cache_data.quku_albums_info.ai_info + '</textarea>';
		tpl += '<div id="nb_ai_info"></div>';
		tpl += "</td>";
		tpl += "<td><input type='checkbox' class='audio_data_check' id='ai_info_check' /></td>";
			+ "</tr>";
		tpl += "</table>";
		tpl += "</fieldset>";
		tpl += "</td>";
		tpl += "</tr>";
		tpl += "<tr>";
		tpl += "<td>";
		tpl += "</td>";
		tpl += "<td>";
		tpl += "<button type='button' class='button01' id='synBtn'>同步" +"</button> <button type='button' class='button01' onclick='albumModifyType.close();'>取消</button>";
		tpl += "</td>";
		tpl += "</tr>";
		tpl += "</table>";
		tpl += "</div></div>";
		this.el.innerHTML = tpl;
        document.body.appendChild(this.el);
		$('#synBtn').click(function( audit_data, data){
			return function(){
				synchronous.show("album",  audit_data, data);
			}		
		}( audit_data, data));
		//判断某一行数据出现复选框并选中
		$('.audio_data_check').each(function(i){
			$('.audio_data_check').eq(i).css('display', 'none');
		});
		if(audit_data){
			for(var i = 0; i < audit_data.length; i++){
				var checkName = "#" + audit_data[i] + "_check";
				$(checkName).css('display', 'block');
				$(checkName).attr('checked', 'true');
				$(checkName).attr('title', audit_data[i]);
			}
		}
	},
	close : function(){
		if(this.el){
			document.body.removeChild(this.el);
		}
		try{
			delete this.el;
		}catch(e){alert("error !");};
	}
};
//单曲待同步的修改类型弹出层11.22
var songModifyType = {
	show : function(cache_data, data, audit_data){
	   
		var jsonAudio = eval(data.quku_songs_files);
		var cache_jsonAudio = eval(cache_data.quku_songs_files);
		var jsonLrc = eval(data.quku_songs_lrcs), cache_jsonLrc = eval(cache_data.quku_songs_lrcs), lrcWord, cache_lrcWord
		var lrcWord = {};
		
		if(jsonLrc && jsonLrc.length > 0){		
			lrcWord = jsonLrc[0].sl_lyrics;
		}else{
			lrcWord = '';
		}
		
		var cache_lrcWord = {};
		if(cache_jsonLrc && cache_jsonLrc.length > 0){
			cache_lrcWord = cache_jsonLrc[0].sl_lyrics;
		}else{
			cache_lrcWord = '';
		}
		
		var tpl="",DH = $(window).height(),DW = $(window).width(),ST =$(window).scrollTop() ;
		if(this.el){return;}
		this.el = document.createElement("div");this.el.className = "win";
		//if(!data){return}
		this.el.style.top =(DH-400)/2 + ST + "px";
		this.el.style.left = (DW -1024)/2 + "px";
		this.el.style.width = "auto";
		this.el.style.height = "auto";
		tpl += "<div class='win-header'>单曲同步审核<a href='javascript:void(0)' class='win-btn-close' onclick='songModifyType.close()'></a></div><div class='win-body'><div class='win-content' style='height:auto;'>";
		tpl += "<table class='tb_preview' width='100%'>";
		tpl += "<tr>";
		tpl += "<td width='50%' valign='top'>";
		//修改前
		tpl += "<fieldset><legend><label>修改前</label></legend>";
		tpl += "<table class='tb_preview'>";
		//单曲名
		tpl += "<tr><td class='fieldName'><span class='red'>*</span><span>单曲名称：</span></td><td><input id='si_title' maxLen='100' value='" + data.quku_songs_info.si_title + "' onchange='Quku.registerUniqurlFiller(\'ab_aname\',\'ab_aliasname\',\'ab_translatename\')' /><div id='nb_si_title'></div></td></tr>";
		//歌手名
		tpl += "<tr>" + 
			'<td class="fieldName"><span class="red">*</span><span>歌手(多歌手用,分割)：</span></td><td><input style="width:280px;" id="quku_artist_works_ref" name="quku_artist_works_ref" caption="演员" isNum="false" maxLen="200" key="true" charTrans="true" value="' + data.quku_artist_works_ref + '" /></td>';
		tpl += "</tr>";
		//音频
		tpl += "<tr>" + 
			'<td class="fieldName"><span>音频：</span></td>';
			tpl += '<td colspan="3">';
				tpl += '<table id="tablePic">' +
						'<tr>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">格式</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">大小</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">码率</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">资源操作</td>' +
						'</tr>';
					for(var i = 0; i < jsonAudio.length; i++){
						tpl += '<tr>' +
							'<td class="fieldName" style="text-align:left;width:80px!important;">' + jsonAudio[i].sf_file_extension +'</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">' + jsonAudio[i].sf_file_size + '</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">' + jsonAudio[i].sf_file_bitrate +'</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">' + '<a href="' + jsonAudio[i].sf_file_link.replace("'", "") + '" target="_blank">试听</a>' + '</td>' +
						'</tr>'
					}
		tpl += '</table>';
		tpl += "</td>"
		tpl += "</tr>";
		//歌词
		tpl += "<tr>" +
			"<td class='fieldName'><span>歌词：</span></td><td><textarea id='lrcContent' rows='13' cols='35'>" + lrcWord + "</textarea></td>"
			+ "</tr>";
		//版本
		tpl += "<tr>" + 
			"<td class='fieldName'><span>版本：</span></td><td>" + data.quku_songs_info.si_versions + "</td>"
			+ "</tr>";
		//语言
		tpl += "<tr>";
		tpl += '<td class="fieldName">';
		tpl += '<span>语言：</span>';
		tpl += '</td>';
		tpl += '<td>' + data.quku_songs_info.si_language + '</td>';
			+ "</tr>";
		tpl += "</table>";
		tpl += "</fieldset>";
		tpl += "</td>";
		tpl += "<td width='50%' valign='top'>";
		//修改后
		tpl += "<fieldset><legend><label>修改后</label></legend>";
		tpl += "<table class='tb_preview'>";
		//单曲名
		tpl += "<tr><td class='fieldName'><span class='red'>*</span><span>单曲名称：</span></td><td><input id='si_title' maxLen='100' value='" + cache_data.quku_songs_info.si_title + "' /><div id='nb_si_title'></div></td><td><input type='checkbox' class='audio_data_check' id='si_title_check' /></td></tr>";
		//歌手名
		tpl += "<tr>" + 
			'<td class="fieldName"><span class="red">*</span><span>歌手(多歌手用,分割)：</span></td><td><input style="width:280px;" id="quku_artist_works_ref" name="quku_artist_works_ref" caption="演员" isNum="false" maxLen="200" key="true" charTrans="true" value="' + cache_data.quku_artist_works_ref + '" /></td><td><input type="checkbox" class="audio_data_check" id="quku_artist_works_ref_check" /></td>';
		tpl += "</tr>";
		//音频
		tpl += "<tr>" + 
			'<td class="fieldName"><span>音频：</span></td>';
			tpl += '<td colspan="3">';
				tpl += '<table id="tablePic">' +
						'<tr>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">格式</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">大小</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">码率</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">资源操作</td>' +
						'</tr>';
					for(var i = 0; i < cache_jsonAudio.length; i++){
						tpl += '<tr>' +
							'<td class="fieldName" style="text-align:left;width:80px!important;">' + cache_jsonAudio[i].sf_file_extension +'</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">' + cache_jsonAudio[i].sf_file_size + '</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">' + cache_jsonAudio[i].sf_file_bitrate +'</td>' +
							'<td class="fieldName" style="text-align:left;width:45px!important;">' + '<a href="' + cache_jsonAudio[i].sf_file_link+ '" target="_blank">试听</a>' + '</td>' +
						'</tr>'
					}
		tpl += '</table>';
		tpl += "</td>";
		tpl += "<td><input type='checkbox' class='audio_data_check' id='quku_songs_files_check' /></td>";
		tpl += "</tr>";
		//歌词
		tpl += "<tr>" +
			"<td class='fieldName'><span>歌词：</span></td><td><textarea id='lrcContent' rows='13' cols='35'>" + cache_lrcWord + "</textarea></td><td><input type='checkbox' class='audio_data_check' id='quku_songs_lrcs_check' /></td>"
			+ "</tr>";
		//版本
		tpl += "<tr>" + 
			"<td class='fieldName'><span>版本：</span></td><td>" + cache_data.quku_songs_info.si_versions + "</td><td><input type='checkbox' class='audio_data_check' id='si_versions_check' /></td>"
			+ "</tr>";
		//语言
		tpl += "<tr>";
		tpl += '<td class="fieldName">';
		tpl += '<span>语言：</span>';
		tpl += '</td>';
		tpl += '<td>' + cache_data.quku_songs_info.si_language + '</td>';
		tpl += "<td><input type='checkbox' class='audio_data_check' id='si_language_check' /></td>";
			+ "</tr>";
		tpl += "<tr>";
		tpl += "<td colspan='5'>";
		tpl += "<button type='button' class='button01' id='synBtn'>同步" +"</button> <button type='button' class='button01' onclick='songModifyType.close();'>取消</button>";
		tpl += "</td>";
		tpl += "</tr>";
		tpl += "</table>";
		tpl += "</fieldset>";
		tpl += "</td>";
		tpl += "</tr>";
		tpl += "<tr>";
		tpl += "<td>";
		tpl += "</td>";
		tpl += "</tr>";
		tpl += "</table>";
		tpl += "</div></div>";
		this.el.innerHTML = tpl;
        document.body.appendChild(this.el);
		$('#synBtn').click(function(audit_data, data){
			return function(){
				synchronous.show("song",  audit_data, data);
			}		
		}( audit_data, data));
		//判断某一行数据出现复选框并选中
		$('.audio_data_check').each(function(i){
			$('.audio_data_check').eq(i).css('display', 'none');
		});
		if(audit_data){
			for(var i = 0; i < audit_data.length; i++){
				var checkName = "#" + audit_data[i] + "_check";
				$(checkName).css('display', 'block');
				$(checkName).attr('checked', 'true');
				$(checkName).attr('title', audit_data[i]);
			}
		}
	},
	close : function(){
		if(this.el){
			document.body.removeChild(this.el);
		}
		try{
			delete this.el;
		}catch(e){alert("error !");};
	}
};

//确认同步弹出层
var synchronous = {
	show : function(flag,  audit_data, data){
		//将json转成对象，采用通用方法处理
		var update_filed = [];
		$('.audio_data_check:checked').each(function(){
			update_filed.push($(this).attr('title'));		
		});
		if(!audit_data){
			audit_data = [];
		}
		switch(flag){
			case 'artist': 
				$.ajax({
					url : '?c=artist&m=synchronize',
					type : 'post',
					dataType : 'json',
					data : {
						'update_filed' : update_filed.join(','),
						'audit_filed' : audit_data.join(','),
						'status' : data.quku_artists_base.ab_status,
						'or_id':data.or_id
						
					},
					success : function(sData){
						if(sData.error_code == 0){
							window.location.href='?c=operate&m=search&tn=synchronized_artistList&search_type=3&search_audit_flag=1';
						}else{
							alert('同步失败');
							return;
						}
					}
				});
				break;
			case 'album':
				$.ajax({
					url : '?c=album&m=synchronize',
					type : 'post',
					dataType : 'json',
					data : {
						'update_filed' : update_filed.join(','),
						'audit_filed' : audit_data.join(','),
						'status' : data.quku_albums_info.ai_status,
						'or_id':data.or_id
					},
					success : function(sData){
						if(sData.error_code == 0){
							window.location.href='?c=operate&m=search&tn=synchronized_albumList&search_type=2&search_audit_flag=1';
						}else{
							alert('同步失败');
							return;
						}
					}
				});
				break;
			case 'song':
				$.ajax({
					url : '?c=song&m=synchronize',
					type : 'post',
					dataType : 'json',
					data : {
						'update_filed' : update_filed.join(','),
						'audit_filed' : audit_data.join(','),
						'status' : data.quku_songs_info.si_status,
						'or_id':data.or_id
					},
					success : function(sData){
						if(sData.error_code == 0){
							window.location.href='?c=operate&m=search&tn=synchronized_songList&search_type=1&search_audit_flag=1';
						}else{
							alert('同步失败');
							return;
						}
					}
				});
				break;
		}
		/*
		var tpl="",DH = $(window).height(),DW = $(window).width(),ST =$(window).scrollTop() ;
            if(this.el){return;}
            this.el = document.createElement("div");this.el.className = "win";
            //if(!data){return}
            this.el.style.top =(DH-330)/2 + ST + "px";
            this.el.style.left = (DW -600)/2 + "px";
            this.el.style.width = "600px";
			tpl += "<div class='win-header'>确定同步？<a href='javascript:void(0)' class='win-btn-close' onclick='synchronous.close()'></a></div><div class='win-body'><div class='win-content' style='height:100px;font-size:18px;line-height:100px;text-algin:center;'>";
			tpl += "确定同步？";
			tpl += "</div><div class='win-footer'><button type='button' class='button01' onclick=''>确定</button><button type='button' class='button01' onclick='synchronous.close();'>取消</button></div></div></div>";
			this.el.innerHTML = tpl;
            document.body.appendChild(this.el);*/
	},
	close:function(){
		if(this.el)
		document.body.removeChild(this.el);
		try{
			delete this.el;
		}catch(e){alert("error !")};
    }
};

var checkWin = {
        show:function(data){
            var tpl="",DH = $(window).height(),DW = $(window).width(),ST =$(window).scrollTop() ;
            if(this.el){return;}
            this.el = document.createElement("div");this.el.className = "win";
            if(!data){return}
            this.el.style.top =(DH-330)/2 + ST + "px";
            this.el.style.left = (DW -600)/2 + "px";
            this.el.style.width = "600px";
            tpl += "<div class='win-header'> 同名未关联歌曲列表<a href='javascript:void(0)' class='win-btn-close' onclick='checkWin.close()'></a></div><div class='win-body'><div class='win-content'>";
            tpl +="<table class='tb_preview' width='100%'><th>歌曲名</th><th>歌手名</th><th>版本</th><th>歌曲ID</th><th>音频数</th>"
            for(var i=0;i<data.length;i++){
                tpl += "<tr><td>" + data[i].si_title+"</td><td>"+ data[i].si_author+"</td><td>"+ data[i].si_versions+"</td><td>"+ data[i].si_globalid+"</td><td>"+ data[i].audio_num+"</td><tr>";
            }
            tpl += "</table></div></div>";
            this.el.innerHTML = tpl;
            document.body.appendChild(this.el);
        },
        close:function(){
            if(this.el)
            document.body.removeChild(this.el);
            try{
            	delete this.el;
            }catch(e){alert("error !")};
        }
};
var componyWin = {
        show:function(title,data,subCompony,superCompony){
            var tpl='',DH = $(window).height(),DW = $(window).width(),ST =$(window).scrollTop() ;
            if(this.el){componyWin.close();}
            this.el = document.createElement("div");this.el.className = "win";
            this.subCompony = document.getElementById(subCompony);
            this.superCompony = document.getElementById(superCompony);
            if(!data){return}
            this.el.style.top =(DH-330)/2 + ST + "px";
            this.el.style.left = (DW -500)/2 + "px";
            tpl += "<div class='win-header'> 请选择"+title +"<a href='javascript:void(0)' class='win-btn-close' onclick='componyWin.close()'></a></div><div class='win-body'><div class='win-content'>";
            for(var key in data){
            	tpl += '<fieldset><legend><label>'+key+'</label></legend>';
                for(var i=0;i<data[key].length;i++){
                    if(this.subCompony.value == stripX(data[key][i])){
                            tpl += "<input type='radio' name='ooooo'  value='" + data[key][i] + "' title='"+key+"' checked='true'/><span>" +data[key][i]+"</span>"
                            if((i+1)%4 ==0){tpl+="<br>"}
    						continue;
                    }
                    tpl += "<input type='radio' name='ooooo'  value='" + data[key][i] + "'  title='"+key+"' /><span>" +data[key][i]+"</span>";
    				if((i+1)%4 ==0){tpl+="<br>"}
                }
                tpl += '</fieldset>'
            }
            tpl += "<input type='radio' name='ooooo'  value='' /><span>无</span></div><div class='win-footer'><button type='button' class='button01' onclick='componyWin.submit()'>确定</button></div></div></div>";
            this.el.innerHTML = tpl;
            document.body.appendChild(this.el);
        },
        submit:function(){
            var DD = this.el.getElementsByTagName("input"),isCheck = false;
            for (var i=0;i<DD.length;i++){
                if(DD[i].checked){
                    this.subCompony.value = DD[i].value;
                    this.superCompony.value = DD[i].title;
                    isCheck = true;
                }
            }
            if(isCheck){
            	componyWin.close();
            }else{
                alert("请选择唱片公司")
            }
        },
        close:function(){
            if(this.el)
            document.body.removeChild(this.el);
            try{
            	delete this.el;
            }catch(e){alert("error !")};
        }
};
var updatePicWin = {
	 show:function(src, uploadBtnId){
		var maskdiv = $( '<div>' );
		var doc = document.documentElement || document.body;
		var W_doc = $( doc ).width()+'px';
		var H_doc = $( doc ).height()+'px';

		maskdiv.addClass( 'maskdiv' );
		maskdiv.css({
			'position': 'absolute',
			'background': '#000',
			'width': W_doc,
			'height': H_doc,
			'left': 0,
			'top': 0,
			'z-index': '1001',
			'opacity': '0.5'
		});

		updatePicWin.uploadBtnId = uploadBtnId;
		updatePicWin.src = src;
		 var tpl='',DH = $(window).height(),DW = $(window).width(),ST =$(window).scrollTop();
            if(this.el){LrcWin.close();}
            this.el = document.createElement("div");
			this.el.className = "wins";
			this.el.style.zIndex = '1002';
            this.el.style.top =(DH-530)/2 + ST + "px";
            this.el.style.left = (DW -930)/2 + "px";
            tpl += "<div class='win-header' style=''> 在线裁剪图片<a href='javascript:void(0)' class='win-btn-close' onclick='updatePicWin.close()'></a></div><div class='win-body' style='background:#fff;'><div class='win-content' style='height:auto!important;'>" +
				"<div id='outer'><div class='jcExample'><div class='article'><table><tr><td>" +
				"<img src='" + src + "' id='target' /></td>" + 
				"<td>" +
				"<div style='width:100px;height:100px;overflow:hidden;'>" +
				"<img src='" + src + "' id='preview' />" +
				"</div></td></tr></table>" + 
				"<form id='coords' class='coords' action='http://www.baidu.com' onsubmit='reutrn checkCoords();'>" + 
				"<div>" + 
				"<label>x坐标<input type='text' size='4' id='x1' name='x1' readOnly='readOnly' /></label>" +
				"<label>y坐标<input type='text' size='4' id='y1' name='y1' readOnly='readOnly' /></label>" +
				"<label>x2坐标<input type='text' size='4' id='x2' name='x2' readOnly='readOnly' /></label>" +
				"<label>y2坐标<input type='text' size='4' id='y2' name='y2' readOnly='readOnly' /></label>" +
				"<label>宽度<input type='text' size='4' id='w' name='w' readOnly='readOnly' /></label>" +
				"<label>高度<input type='text' size='4' id='h' name='h' readOnly='readOnly' /></label>" +
				"</div></form></div></div></div>"
				+ "</div>"
					tpl += "<div class='win-footer'><button type='button' class='button01' onclick='updatePicWin.submit()'>保存" +"</button> <button type='button' class='button01' onclick='updatePicWin.close()'>取消</button></div>"
			tpl += "</div></div>";
            this.el.innerHTML = tpl;
            $( document.body ).append( maskdiv );
            $( document.body ).append( this.el );
			updatepics();
	},
	submit : function(src){
		jQuery.get(
			'?c=pic&m=cutImage',
			{
				'type' : $("#channel").val(),
				'pi_link' : updatePicWin.src,
				//'ab_globalid' : $("#ab_globalid").val()?$("#ab_globalid").val():'' , /*明星ID*/
				//'ai_globalid' : $("#ai_globalid").val()?$("#ai_globalid").val():'', /*专辑ID*/
				'x1' : $("#x1").val(),
				'y1' : $("#y1").val(),
				'x2' : $("#x2").val(),
				'y2' : $("#y2").val(),
			},
			function(response){
					var firPicInfo = response.data;
								if(response.data.length > 0){
									initPicValue(response.data);
								};
			},'json'
		);
		updatePicWin.close();
	},
	close:function(){
            if(this.el)
			$( '.maskdiv' ).remove();
            document.body.removeChild(this.el);
            try{
            	delete this.el;
            }catch(e){alert("error !")};
        }
};
var LrcWin = {
		link : '',
        show:function(data,readonly, link){
			LrcWin.link = link;
            var tpl='',DH = $(window).height(),DW = $(window).width(),ST =$(window).scrollTop();
            if(this.el){LrcWin.close();}
            this.el = document.createElement("div");this.el.className = "win";
            this.el.style.top =(DH-330)/2 + ST + "px";
            this.el.style.left = (DW -500)/2 + "px";
            tpl += "<div class='win-header'> 添加歌词<a href='javascript:void(0)' class='win-btn-close' onclick='LrcWin.close()'></a></div><div class='win-body'><div class='win-content' style='height:auto!important;'><textarea  cols='57' rows='13' id='lrcContent' ";
			if(readonly) tpl += " "
			tpl += ">";
			if(data) tpl +=data;
            tpl += "</textarea></div>"
			if(!readonly){
					tpl += "<div class='win-footer'><button type='button' class='button01' onclick='LrcWin.submit()'>添加" +"</button> <button type='button' class='button01' onclick='LrcWin.close()'>取消</button></div>"
			}else{
				tpl += "<div class='win-footer'><button type='button' class='button01' onclick='LrcWin.update()'>保存" +"</button> <button type='button' class='button01' onclick='LrcWin.close()'>取消</button></div>"
			}
			tpl += "</div></div>";
            this.el.innerHTML = tpl;
            document.body.appendChild(this.el);
        },
		update:function(){
			var content =$.trim($("#lrcContent").val());
			if(!content){
				alert('歌词不能为空!');
			}
			var sl_lrclink = LrcWin.link;
			var lrcSerialized = $.trim($("#lrcSerialized").val());
			if(lrcSerialized){
				if(typeof lrcSerialized != 'object'){
				    lrcSerialized = eval("(" + lrcSerialized + ")");
			    }
				var sl_globalid = lrcSerialized.sl_globalid;
				var sl_title = lrcSerialized.sl_title;
			}else{
				var sl_globalid = "";
				var sl_title = "";
			}
			var sl_artist = $.trim($("#sl_artist").val());
			var sl_album = $.trim($("#sl_album").val());
		
			jQuery.post(
				'?c=lrc&m=saveWritingContent',
				{
				'content' : content, 
				'sl_lrclink' : sl_lrclink,
				'sl_globalid' : sl_globalid,
				'sl_title' : sl_title
				},
				function(response){
					if(response.error_code == 0){
					 if(!Lrc.oldInnerHTML) 
						        Lrc.oldInnerHTML = $('#tableLrc').html();
						$('#lrcOperation').html('<a href="javascript:void(0)" onclick=Lrc.showLrcDetail(\"' + response.data[0].sl_lrclink + '\")>查看</a>|&nbsp;'+'<a href='+response.data[0].sl_lrclink +' target="_blank">下载</a>|&nbsp;'
	        			+'<a href="javascript:void(0);" onclick="Lrc.deleteLrcEntity()">删除</a>');
						$('#lrcSerialized').val(response.data[0].json);
						$('#lrcSerialized').removeAttr("title");
						$("#avatarLrc").attr("disabled","true");
	        			$('#lrcStatus').html('<span class="red">上传成功</span>');
						$("#lrc_btn_span").hide();
						LrcWin.close();
					}else{
						alert("添加失败！");
					}
				},'json'
			);
		},	   

        submit:function(){
			var content =$.trim($("#lrcContent").val()),self = this;
			if(!content) alert("歌词不能为空！")
			jQuery.post(
			'?c=lrc&m=saveWritingContent',
			{'content':content},	function(response){
					if(response.error_code == 0){
					     if(!Lrc.oldInnerHTML) 
						        Lrc.oldInnerHTML = $('#tableLrc').html();
						$('#lrcOperation').html('<a href="javascript:void(0)" onclick=Lrc.showLrcDetail(\"'+response.data[0].sl_lrclink+'\")>查看</a>|&nbsp;'+'<a href='+response.data[0].sl_lrclink +' target="_blank">下载</a>|&nbsp;'
								+'<a href="javascript:void(0);" onclick="Lrc.deleteLrcEntity()">删除</a>');
						$('#lrcSerialized').val(response.data[0].json);
						$('#lrcSerialized').removeAttr("title"); 
						$("#avatarLrc").attr("disabled","true");
	        			$('#lrcStatus').html('<span class="red">上传成功</span>');
						$("#lrc_btn_span").hide();
						LrcWin.close();
					}else{
						alert("添加失败！")
					}
			},'json');
        },
        close:function(){
            if(this.el)
            document.body.removeChild(this.el);
            try{
            	delete this.el;
            }catch(e){alert("error !")};
        }
};
var RepeatSongWin = {
        show:function(data,isSource){
        	if(!data) return;
            var tpl='',DH = $(window).height(),DW = $(window).width(),ST =$(window).scrollTop();
            if(this.el){RepeatSongWin.close();}
//            this.$el =  $('<div/>').appendTo(document.body).addClass('ui-dialog-overlay');
//            $('.ui-dialog-overlay')
//			.css('background','gray')
//			.css('filter','alpha(opacity=40)')
//			.css('-moz-opacity','0.4')
//			.css('opacity','0.4').css({
//				borderWidth: 0, margin: 0, padding: 0,
//				position: 'absolute', top: 0, left: 0,
//				width: $(document).width(),
//				height: $(document).height(),
//				zIndex : 999
//			});
//			if(!$.browser.msie || $.browser.version!='6.0') {
//				$('.ui-dialog-overlay').css('position','fixed').css('top','0px');
//			};
            this.el = document.createElement("div");this.el.className = "win";
            this.el.style.top =(DH-100)/2 + ST + "px";
            this.el.style.left = (DW -500)/2 + "px";
//            this.el.style.zIndex = 1000;
            tpl += "<div class='win-header'>重复单曲列表<a href='javascript:void(0)' class='win-btn-close' onclick='RepeatSongWin.close()'></a></div>";
            tpl += isSource ? "<table  width='100%' border='1' class='qukuDataGrid' >" :
            	"<table  width='100%' border='1' class='qukuDataGrid' ><tr><td>本专辑歌曲</td><td>重复歌曲</td><td>修改重复歌曲</td></tr>";
            if(isSource){
            	for(var i=0;i<data.data.length;i++){
               	 tpl += "<tr><td>"+data.data[i].si_title+"</td><td><a href='?c=song&m=edit&si_globalid="+data.data[i].duplicate_id+"&tn=song_edit' target='_blank'>修改</a></td>";
               };
            }else{
                for(var i=0;i<data.repeat.length;i++){
               	 tpl += "<tr><td>"+data.source[i].si_title+"</td><td>"+data.repeat[i].si_title+"</td><td><a href='?c=song&m=edit&si_globalid="+data.repeat[i].si_globalid+"&tn=song_edit' target='_blank'>修改</a></td>";
               };
            };
			tpl += "</table>";
            this.el.innerHTML = tpl;
            document.body.appendChild(this.el);
        },
        close:function(){
            if(this.el){
            	document.body.removeChild(this.el);
            };
//            if(this.$el){
//            	document.body.removeChild(this.$el);
//            }
            try{
            	delete this.el;
//            	delete this.$el;
            }catch(e){alert("error !")};
        }
};

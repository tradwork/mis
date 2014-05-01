<?php /* Smarty version Smarty3rc4, created on 2014-03-14 16:00:43
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/song/add.html" */ ?>
<?php /*%%SmartyHeaderCode:7368978905322b72bcb9f12-50738961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a742cb255b01bbb30e75f740d6ab3808a7b09ee' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/song/add.html',
      1 => 1382339745,
    ),
    '08f6f12994073cb243d99e484fc9901dd0ec7ff2' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/song/abstract.form.inc.html',
      1 => 1388985857,
    ),
    '4a840d2d4a3305a8343b4ec800e8256517ab14d9' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/header.inc.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '7368978905322b72bcb9f12-50738961',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/mp3/yujiao/guodong/mis/mis/libraries/smarty/plugins/modifier.escape.php';
?>

<?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"单曲管理 &gt; 添加单曲");$_template->properties['nocache_hash']  = '7368978905322b72bcb9f12-50738961';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty3rc4, created on 2014-03-14 16:00:43
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/header.inc.html" */ ?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<title>百度基础曲库</title>
<link href="<?php echo @STATIC_DIR;?>
/css/quku.css" rel="stylesheet" type="text/css">
<link href="<?php echo @STATIC_DIR;?>
/css/ui_base.css" rel="stylesheet" type="text/css">

<link href="<?php echo @STATIC_DIR;?>
/js/jquery/ui/themes/jquery.ui.all.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/jquery-1.6.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/ui/ui.widget.js"></script>

<!-- 全局自定义 UI组件 -->
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/util/ui.js"></script>
<!-- 全局配置变量 -->
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/common/globalConst.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/common/common.js"></script>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/jquery.datepicker.js"></script>
<!-- src: http://trentrichardson.com/examples/timepicker/  -->
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/jquery.timepicker.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/ajaxUpload.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/suggest.js"></script>

<!-- 图片裁剪插件 -->
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/jquery.Jcrop.js"></script>


<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/quku.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/baidu/baidu.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/baidu/ui/crossFrameDialog.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/baidu/debug.js"></script>
<script type="text/javascript">
<?php if ($_GET['debug']){?>
baidu.debug.enable();
<?php }?>
baidu.loader.setJsRoot('<?php echo @STATIC_DIR;?>
/js');
</script>
</head>
<body style="overflow-x:hidden;padding:0;">
<div class="topBar">
	<h1><?php if ($_smarty_tpl->getVariable('topTitle')->value){?><?php echo $_smarty_tpl->getVariable('topTitle')->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('title')->value;?>
<?php }?></h1>
</div>
<div style="height:30px;clear:both"></div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/header.inc.html" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>






<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("添加单曲", null, null);?>
<?php $_smarty_tpl->tpl_vars['formAction'] = new Smarty_variable("doCreate", null, null);?>


<style type="text/css">
	.language{width:100px;height:95px;}
	.fl{float:left;}
	.tb_form { border:none; }
	 #tablePicHidden{
       display:inline-block;
   }
   
 
</style>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/song/song.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/song/songForm.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/mediaCheckStatus.js"></script>



<script type="text/javascript">

//模版变量转换为js变量，统一管理模版变量， 并便于其他js中引用
<?php $_template = new Smarty_Internal_Template("song/convertData.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

var jsonAidio = <?php if ($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_globalid']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_songs_files'];?>
<?php }else{ ?>[]<?php }?>;
var jsonPic = <?php if ($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_globalid']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_pic_info'];?>
<?php }else{ ?>[]<?php }?> ;
var jsonLrc = <?php if ($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_globalid']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_songs_lrcs'];?>
<?php }else{ ?>[]<?php }?> ;
$(document).ready(function(){
	var T = quku_v.songForm, data = quku_v.song.data;
	T.displayPanel(data);


	<?php if ($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_globalid']){?> quku_v.songForm.initLrcInfo(jsonLrc); <?php }?>


	
	quku_v.songForm.formArray.setValue(quku_v.song.data);

})
</script>

<body>
<!--
<div style="display:none;"><?php echo var_dump($_smarty_tpl->getVariable('data')->value);?>
</div>
<div style="display:none;"><?php echo var_dump($_smarty_tpl->getVariable('user')->value);?>
</div>
-->

<?php if ($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_globalid']){?>
	<input type="hidden" id = "si_globalid" name="si_globalid" value="<?php echo $_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_globalid'];?>
" />
	<?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']==1){?>
	<input type="hidden" id ="action" value="saveInCache" />
	<?php }else{ ?>
	<input type="hidden" id ="action" value="doEdit" />
	<?php }?>
<?php }else{ ?>
	<input type="hidden" id ="action" value="doCreate" />
<?php }?>




<!-- for dialog creater -->
<input type="hidden" id ="songId" value="" />
<!--歌词数据-->

<input type="hidden" id = "sl_globalid" value=''  />
<input type="hidden" id = "sl_title" value='' />
<input type="hidden" id ="channel" value="2" />



<div id="contentBase">
<fieldset class="x-layout-base">
  <legend><label>必填信息</label></legend>
 <!-- 单曲名称 -->
	<div id="si_title" class="x-layout-item"></div>

	 <!-- 单曲ID -->
	<div id="si_title_id" class="x-layout-item"></div>
	<!-- 蔟ID -->
	<div id="si_cluster_id" class="x-layout-item"></div>
	<!-- 主歌曲ID -->
	<div id="ci_primary_songid" class="x-layout-item"></div>
	<!-- 歌手 -->
	<div id="quku_artist_works_ref" class="x-layout-item"></div>
	<!-- 发行时间 -->
	<div id="si_publishtime" class="x-layout-item"></div>

	<!-- 专辑名称 -->
		<div id="si_album" class="x-layout-item"></div>
	<!--专辑ID -->
		<div id="si_album_id" class="x-layout-item"></div>
	<!-- 语言 -->
	<div id="si_language" class="x-layout-item"></div>
	<div id="si_more" class="x-layout-item x-layout-merge">
		<!--发行地区 -->
		<div id="si_area" class="x-layout-block x-item-inner"></div>
		<!-- 别名 -->
		<div id="si_aliastitle" class="x-layout-block x-item-inner"></div>
		<!-- 译名 -->
		<div id="si_translatename" class="x-layout-block x-item-inner"></div>
		<!-- 描述 -->
	<div id="si_info" class="x-layout-block x-item-inner"></div>
	</div>
	<!-- 风格 -->
	<div id="si_styles" class="x-layout-item"></div>

	<div id="si_ext_more" class="x-layout-item x-layout-merge" >
		<!-- 批准文号 -->
		<div id="si_license_number" class="x-layout-block x-item-inner"></div>
		<!-- 歌曲专辑编号 -->
		<div id="si_album_no" class="x-layout-block x-item-inner"></div>
		<!-- 光盘序号 -->
		<div id="si_cd_no" class="x-layout-block x-item-inner"></div>
	</div>

	<!-- 版本 -->
	<div id="si_versions" class="x-layout-item"></div>
	<div id="si_ext2_more" class="x-layout-item x-layout-merge">
		<!-- 音乐人社区歌曲ID -->
		<div id="si_yyr_id" class="x-layout-block x-item-inner"></div>
		<!-- 时长 -->
		<div id="si_duration" class="x-layout-block x-item-inner"></div>
		<!-- 同义词 -->
	    <div id="si_synonym" class="x-layout-block x-item-inner"></div>
	</div>
	<!--  定时发布时间  -->
	<div id="si_pre_pubtime" class="x-layout-item si_pre_pubtime"></div>
	<!--  关联歌曲  -->
	<div id="si_relate_ids" class="x-layout-item si_relate_ids"></div>
	<!--  锁定人  -->
	<?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']==3){?>
	<div id="si_editusernow" class="x-layout-item"></div>
	<?php }?>
	<!-- 授权书 -->
	<div class="x-component-items" id="si_authorisation_url_items" style="width: 50px; height: 50px; float: left">
        <div class="x-component-label " style="float:left">
             <span class="label-text">授权书: </span>
        </div>
		<a href="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_authorisation_url']);?>
" target="_blank" class="x-component-img" style="position:absolute">
			<img width="50" height="50" src="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_authorisation_url']);?>
">
		</a>
	</div>

</fieldset>
</div>

<div id="contentCopyright">
	<fieldset  class="x-layout-base">
		<legend><label>版权信息</label></legend>
			<!--发行公司-->
		<div id="si_publishcompany" class="x-layout-item"></div>


		<!--录音版权类型-->
		<div id="si_recording_type" class="x-layout-item"></div>


		<!--付费公司-->
		<div id="si_proxycompany" class="x-layout-item"></div>
		<!-- 屏蔽类型 -->
		<div id="si_prohibit_type" class="x-layout-item"></div>
		<!--厂牌公司-->
		<div id="si_sub_publishcompany" class="x-layout-item"></div>

		<!-- ISRC来源 -->
		<div id="si_isrc_flag" class="x-layout-item"></div>

		<!-- ISRC -->
		<div id="si_isrc" class="x-layout-item"></div>

		<!-- 唱片公司trackid号 -->
		<div id="si_trackid" class="x-layout-item"></div>

		<!-- 多端分发数据 -->
		<div id="si_distribution" class="x-layout-block tb_form">

		</div>

		<!--词信息-->
		<div id="quku_songs_copyright_writing" class="x-layout-block tb_form">
		</div>

		<!--曲信息-->
		<div id="quku_songs_copyright_compose" class="x-layout-block tb_form">
		</div>

			<!--标签管理信息-->
		<div id="quku_tag_info_rel" class="x-layout-block tb_form"></div>

			<!--曲风管理信息-->
		<div id="quku_tag_info_rel1" class="x-layout-block tb_form"></div>


	</fieldset>
</div>

<div id="contentResource">
	<fieldset  class="x-layout-base">
		<legend><label>资源信息</label></legend>
		<!--音频-->
		<div id="tableAudio_div" class="x-layout-block tb_form">
			<span id="tableAudio_label"></span>
			<table id="tableAudio">
				<tr>
					<td class="fieldName" style="text-align:left;width:80px!important;">行操作</td>
					<td class="fieldName" style="text-align:left;">上传文件</td>
					<td class="fieldName" style="text-align:left;width:45px!important;">格式</td>
					<td class="fieldName" style="text-align:left;width:45px!important;">大小</td>
					<td class="fieldName" style="text-align:left;width:45px!important;">码率</td>
					<td class="fieldName" style="text-align:left;width:100px!important;">指纹ID</td>
					<td class="fieldName" style="text-align:left;width:100px!important;">展现链接</td>
					<td class="fieldName" style="text-align:left;width:100px!important;">来源</td>
					<td class="fieldName" style="text-align:left;width:100px!important;">质检</td>
					<td class="fieldName" style="text-align:left;width:100px!important;">资源操作</td>
					<td class="fieldName" style="text-align:left;">上传状态</td>
				</tr>
			</table>
		</div>
		<!--歌词-->
		<div id="sl_lyrics" class="x-layout-block tb_form">
			<span id="sl_lyrics_label"></span>
		    <table id="tableLrc">
						<tr>
							<td class="fieldName fnbr" style="text-align:left;">上传文件</td>
							<td class="fieldName" style="text-align:left;width:100px!important;">资源操作</td>
							<td class="fieldName" style="text-align:left;">上传状态</td>
						</tr>
						<tr>
							<td class="fnbr"><input type="file" class="lrcFile" name="lrcFile[]" style="width: 220px;" id="avatarLrc">&nbsp&nbsp<span id="lrc_btn_span"><a href="javaScript:void(0)" onClick="Lrc.getLrcList()">从千千获取>></a> | <a href="javaScript:void(0)" onClick="LrcWin.show()"  id="lrc_win_btn">手动添加歌词>></a></span></td>
							<td class="opCell fnbr"><span id="lrcOperation"></span></td>
							<td><span id="lrcStatus"></span></td>
						</tr>
						<input type="hidden" id="lrcSerialized" value="" />

					</table>
		</div>
		<!--图片-->
		<div id="tableSongPic_div" class="x-layout-block tb_form">
		     <span id="tableSongPic_label"></span>
			<table id="tablePic">
				<tr>
					<td class="fieldName" style="text-align:left;width:80px!important;">预览</td>
					<td class="fieldName" style="text-align:left;width:80px!important;">操作</td>
					<td class="fieldName" style="text-align:left;width:45px!important;">宽度</td>
					<td class="fieldName" style="text-align:left;width:45px!important;">高度</td>
					<td class="fieldName" style="text-align:left;">上传文件</td>
					<td class="fieldName" style="text-align:left;">描述信息<span style="color:pink">[为图片检索提供素材]</span></td>
					<td class="filedName" style="text-align:left;">图片信息</td>
				</tr>
				<div id=tablePicHidden></div>
			</table>
		</div>

	</fieldset>
</div>

<fieldset>
<div id="si_audit">
	<div id="si_audit_status" style="float:left;width:350px;"></div>
	<div id="si_audit_info" style="float:left;width:350px;"></div>
	<div id="si_audit_reason">其他：<input type="text" value="" name="si_audit_info[]" /></div>
</div>
</fieldset>

<div class="space10"></div>
<div id="operation">
	<!--<input type="checkbox" id="si_audit_status" <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_audit_status'])>0&&$_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_audit_status']==0){?>checked<?php }?> >审核</input>-->

	<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_status'])>0&&$_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_status']==0){?>
		<input type="button" value="保存" class="button01" onclick="Song.saveAndPub();"></input>
		<?php if ($_smarty_tpl->getVariable('formAction')->value!="doEditInDialog"){?>
			<input type="button" value="下线" class="button01" onclick="Song.offline()"></input>
		<?php }?>
	<?php }else{ ?>
		<input type="button" value="保存" class="button01" onclick="Song.save();"></input>
		<input type="button" value="保存并发布" class="button01" onclick="Song.saveAndPub();"></input>
	<?php }?>
</div>


<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/duplicateName.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/lrc.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/lrcUpload.js"></script>

<script type="text/javascript" src="/static/js/jquery/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="/static/js/jquery/ui/jquery.ui.slider.js"></script>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/picUpload.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/picRowController.js"></script>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/mediaUpload.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/mediaRowController.js"></script>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/win.js"></script>
<?php $_template = new Smarty_Internal_Template("common/footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>




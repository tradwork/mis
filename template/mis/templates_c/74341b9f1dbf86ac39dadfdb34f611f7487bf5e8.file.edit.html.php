<?php /* Smarty version Smarty3rc4, created on 2014-03-14 18:58:53
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/mv/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:14119139685322e0ed041c71-17096493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74341b9f1dbf86ac39dadfdb34f611f7487bf5e8' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/mv/edit.html',
      1 => 1382339746,
    ),
    '02da8a33b2f0fde338f330a3823eba924153c959' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/mv/abstract.form.inc.html',
      1 => 1385015902,
    ),
    '4a840d2d4a3305a8343b4ec800e8256517ab14d9' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/header.inc.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '14119139685322e0ed041c71-17096493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


<?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"MV管理 &gt; 添加MV");$_template->properties['nocache_hash']  = '14119139685322e0ed041c71-17096493';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty3rc4, created on 2014-03-14 18:58:53
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






<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("修改单曲", null, null);?>
<?php $_smarty_tpl->tpl_vars['formAction'] = new Smarty_variable("doEdit", null, null);?>


<style type="text/css">
	.language{width:100px;height:95px;}
	.fl{float:left;}
	.tb_form { border:none; }
	 #tablePicHidden{
       display:inline-block;
   }
   
 
</style>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/mv/mv.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/mv/mvForm.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/mediaCheckStatus.js"></script>



<script type="text/javascript">

		//模版变量转换为js变量，统一管理模版变量， 并便于其他js中引用
		<?php $_template = new Smarty_Internal_Template("mv/convertData.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		var jsonAidio = <?php if ($_smarty_tpl->getVariable('data')->value['quku_mvs_info']['mi_globalid']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_mvs_files'];?>
<?php }else{ ?>[]<?php }?>;
		var jsonVideosInfo = <?php if ($_smarty_tpl->getVariable('data')->value['quku_video_info']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_video_info'];?>
<?php }else{ ?>[]<?php }?>;
		var jsonPic = <?php if ($_smarty_tpl->getVariable('data')->value['quku_video_info']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_video_info'];?>
<?php }else{ ?>[]<?php }?>;	
		$(document).ready(function(){
		    var T = quku_v.mvForm, data = quku_v.mv.data;
			T.displayPanel(data);
			
	quku_v.mvForm.formArray.setValue(quku_v.mv.data);

		})
</script>

<body>
<!--
<div style="display:none;"><?php echo var_dump($_smarty_tpl->getVariable('data')->value);?>
</div>
<div style="display:none;"><?php echo var_dump($_smarty_tpl->getVariable('user')->value);?>
</div>
-->

<?php if ($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_globalid']){?>
	<input type="hidden" id ="mi_globalid" name="mi_globalid" value="<?php echo $_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_globalid'];?>
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
<input type="hidden" id ="mvId" value="" />
<!--歌词数据-->

<input type="hidden" id = "sl_globalid" value=''  />
<input type="hidden" id = "sl_title" value='' />
<input type="hidden" id ="channel" value="5" />



<div id="contentBase">
<fieldset class="x-layout-base">
  <legend><label>必填信息</label></legend>
	    
	    <!-- 标题 -->
		<div id="mi_title" class="x-layout-item"></div>
	    
	    <!-- 副标题 -->
		<div id="mi_subtitle" class="x-layout-item"></div>

		<!-- 歌手 -->
		<div id="quku_artist_works_ref" class="x-layout-item"></div>

		<!--歌手ID -->
		<div id="mi_artist_id"  class="x-layout-item"></div>

	 	<!-- 发行时间 -->
		<div id="mi_publishtime" class="x-layout-item"></div>

		<!-- 定时发布时间  -->
		<div id="mi_pre_pubtime" class="x-layout-item mi_pre_pubtime"></div>		
		
		<!-- 描述 -->
		<div id="mi_info" class="x-layout-item"></div>
		
		<!--MVID -->
		<div id="mi_mv_id"  class="x-layout-item"></div>

		
		<!--标签管理信息-->
		<div id="mi_label"  class="x-layout-item"></div>
		
		<!-- 版本 -->
		<div id="mi_versions" class="x-layout-item"></div>
		
		<div id="mi_ext2_more" class="x-layout-item">
			<!--地区 -->
			<div id="mi_area" class="x-item-inner"></div>
		</div>

		<div id="mi_ext2_more" class="x-layout-item">
			<!--关联歌曲和匹配度 -->
			<div id="quku_mv_ref" class="x-layout-block tb_form">
			</div>
		</div>
</fieldset>
</div>

<div id="contentCopyright">
	<fieldset  class="x-layout-base">
		<legend><label>版权信息</label></legend>
			<!--发行公司-->
		<div id="mi_publishcompany" class="x-layout-item"></div>

		<!--付费公司-->
		<div id="mi_proxycompany" class="x-layout-item"></div>

		<!-- 版权类型 -->
		<div id="mi_prohibit_type" class="x-layout-item"></div>


	</fieldset>
</div>

<div id="contentResource">
	<fieldset  class="x-layout-base">
		<legend><label>资源信息</label></legend>
		<div><button class="addVideoSource">增加资源信息</button></div>
		</div>
	</fieldset>
</div>

<div class="space10"></div>
<div id="operation">
	<input type="checkbox" id="mi_audit_status" <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_audit_status'])>0&&$_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_audit_status']==0){?>checked<?php }?> >审核</input>

	<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_status'])>0&&$_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_status']==0){?>
		<input type="button" value="保存" class="button01" onclick="Mv.saveAndPub();"></input>
		<?php if ($_smarty_tpl->getVariable('formAction')->value!="doEditInDialog"){?>
			<input type="button" value="下线" class="button01" onclick="Mv.offline()"></input>
		<?php }?>
	<?php }else{ ?>
		<input type="button" value="保存" class="button01" onclick="Mv.save();"></input>
		<input type="button" value="保存并发布" class="button01" onclick="Mv.saveAndPub();"></input>
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
/js/components/picRowControllerMv.js"></script>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/mediaUpload.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/mediaRowController.js"></script>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/win.js"></script>
<?php $_template = new Smarty_Internal_Template("common/footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>




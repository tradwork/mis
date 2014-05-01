<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:33:56
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/yingshi/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:13348439605322e9244fa7d2-69885906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4d1274fa71b2f13eda8668a15609e631180915f' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/yingshi/edit.html',
      1 => 1382339746,
    ),
    '60e15b94a07a45cefbb403abba0398be70689071' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/yingshi/abstract.form.inc.html',
      1 => 1383196864,
    ),
    '4a840d2d4a3305a8343b4ec800e8256517ab14d9' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/header.inc.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '13348439605322e9244fa7d2-69885906',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


<?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"影视歌曲管理 &gt; 添加影视歌曲");$_template->properties['nocache_hash']  = '13348439605322e9244fa7d2-69885906';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:33:56
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






<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("修改影视歌曲", null, null);?>
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
/js/yingshi/yingshi.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/yingshi/yingshiForm.js"></script>



<script type="text/javascript">

		//模版变量转换为js变量，统一管理模版变量， 并便于其他js中引用
		<?php $_template = new Smarty_Internal_Template("yingshi/convertData.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>;
		var jsonPic = <?php if ($_smarty_tpl->getVariable('data')->value['quku_pic_info']['yi_globalid']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_pic_info'];?>
<?php }else{ ?>[]<?php }?>;

		$(document).ready(function(){
		    var T = quku_v.yingshiForm, data = quku_v.yingshi.data;
			T.displayPanel(data);
			
	quku_v.yingshiForm.formArray.setValue(quku_v.yingshi.data);

		})
</script>

<body>
<!--
<div style="display:none;"><?php echo var_dump($_smarty_tpl->getVariable('data')->value);?>
</div>
<div style="display:none;"><?php echo var_dump($_smarty_tpl->getVariable('user')->value);?>
</div>
-->

<?php if ($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_globalid']){?>
	<input type="hidden" id = "yi_globalid" name="yi_globalid" value="<?php echo $_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_globalid'];?>
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
<input type="hidden" id ="yingshiId" value="" />
<!--歌词数据-->

<input type="hidden" id = "sl_globalid" value=''  />
<input type="hidden" id = "sl_title" value='' />
<input type="hidden" id ="channel" value="2" />



<div id="contentBase">
<fieldset class="x-layout-base">
  <legend><label>必填信息</label></legend>
	<!-- 影视ID -->
	<div id="yi_title_id" class="x-layout-item"></div>

 	<!-- 影视名称 -->
	<div id="yi_title" class="x-layout-item"></div>

	<!-- 别名 -->
	<div id="yi_aliastitle" class="x-layout-item"></div>

	<!-- 译名 -->
	<div id="yi_translatename" class="x-layout-item"></div>
	
	<!-- 影视剧简介 -->
	<div id="yi_info" class="x-layout-item"></div>
	
	<!-- 主演/主持 -->
	<div id="yi_main" class="x-layout-item"></div>
	
	<!-- 客串/嘉宾 -->
	<div id="yi_guest" class="x-layout-item"></div>
	
	<!-- 导演 -->
	<div id="yi_director" class="x-layout-item"></div>
	
	<!-- 标签 -->
	<div id="yi_label" class="x-layout-item"></div>	
	<!-- ISRC -->
	<div id="yi_isrc" class="x-layout-item"></div>
	<!-- 版本 -->
	<div id="yi_versions" class="x-layout-item"></div>
 	<!-- 类型 -->
	<div id="yi_type" class="x-layout-item"></div>	
	<!-- 场次 -->
	<div id="yi_session" class="x-layout-item"></div>
	<!-- 语言 -->
	<div id="yi_language" class="x-layout-item"></div>
	<div id="si_ext_more" class="x-layout-item x-layout-merge">

		<!-- 发行时间 -->
		<div id="yi_publishtime" class="x-layout-block x-item-inner"></div>
		<!-- 版本 -->
		<div id="yi_versions" class="x-layout-block x-item-inner"></div>	
		<!--发行地区 -->
		<div id="yi_area" class="x-layout-block x-item-inner"></div>	
	</div>
	<!--关联信息-->
	<div id="quku_yingshi_ref" class="x-layout-block tb_form">
	</div>
</fieldset>
</div>

<div id="contentResource">
	<fieldset  class="x-layout-base">
		<legend><label>资源信息</label></legend>

		<!--图片-->
		<div id="quku_pic" class="x-layout-block tb_form">		  
              <span id="quku_pic_label"></span>			  
			  <table id="tablePic">
				<tr>
					<td class="fieldName" style="text-align:left;width:80px!important;">预览</td>
					<td class="fieldName" style="text-align:left;width:80px!important;">操作</td>
					<td class="fieldName" style="text-align:left;width:45px!important;">宽度</td>
					<td class="fieldName" style="text-align:left;width:45px!important;">高度</td>
					<td class="fieldName" style="text-align:left;">上传文件</td>
					<td class="fieldName" style="text-align:left;">描述信息<span style="color:pink">[为图片检索提供素材]</span></td>
				</tr>
				<div id=tablePicHidden></div>
			</table>
		</div>	 

	</fieldset>
</div>
<div class="space10"></div>
<div id="operation">
	<input type="checkbox" id="si_audit_status" <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_audit_status'])>0&&$_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_audit_status']==0){?>checked<?php }?> >审核</input>

	<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_status'])>0&&$_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_status']==0){?>
		<input type="button" value="保存" class="button01" onclick="Yingshi.saveAndPub();"></input>
		<?php if ($_smarty_tpl->getVariable('formAction')->value!="doEditInDialog"){?>
			<input type="button" value="下线" class="button01" onclick="Yingshi.offline()"></input>
		<?php }?>
	<?php }else{ ?>
		<input type="button" value="保存" class="button01" onclick="Yingshi.save();"></input>
		<input type="button" value="保存并发布" class="button01" onclick="Yingshi.saveAndPub();"></input>
	<?php }?>
</div>


<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/duplicateName.js"></script>

<script type="text/javascript" src="/static/js/jquery/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="/static/js/jquery/ui/jquery.ui.slider.js"></script>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/picUpload.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/picRowController.js"></script>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/win.js"></script>
<?php $_template = new Smarty_Internal_Template("common/footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>




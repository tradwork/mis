<?php /* Smarty version Smarty3rc4, created on 2012-09-10 10:59:51
         compiled from "/home/yule/samba/pengjuxiang/workspace2/system/../template/mis/templates/common/header.inc.html" */ ?>
<?php /*%%SmartyHeaderCode:2058163115504d57a775e5c2-07857260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '820403791c9c7d130ec2ecb9c1135a40ce39525b' => 
    array (
      0 => '/home/yule/samba/pengjuxiang/workspace2/system/../template/mis/templates/common/header.inc.html',
      1 => 1329723570,
    ),
  ),
  'nocache_hash' => '2058163115504d57a775e5c2-07857260',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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

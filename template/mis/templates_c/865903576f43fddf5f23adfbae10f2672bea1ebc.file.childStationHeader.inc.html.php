<?php /* Smarty version Smarty3rc4, created on 2014-03-17 15:00:42
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/childStationHeader.inc.html" */ ?>
<?php /*%%SmartyHeaderCode:206625061953269d9a85d1d3-57384694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '865903576f43fddf5f23adfbae10f2672bea1ebc' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/childStationHeader.inc.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '206625061953269d9a85d1d3-57384694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<title>百度娱乐频道产品库管理系统</title>
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
$(document).ready(function(){
	baidu.loader.loadPackage('baidu.ui.crossFrameDialog');
	var station =new  baidu.ui.crossFrameDialog.ChildStation();
	$('#buttonCancel').click(baidu.delegate(station,station.cancel));
	$('#buttonClose').click(baidu.delegate(station,station.cancel));
	if(jQuery.browser.msie && parseInt(jQuery.browser.version) == 6){
		$('.icmsHeaderBar').css('position','absolute');
	}
});
</script>
</head>
<body style="margin:0px;padding:28px 3px 0px 3px">
<div class="headerBar"><h2><?php echo $_smarty_tpl->getVariable('title')->value;?>
</h2>
<div class="icon_close" id='buttonCancel'> 
<a href="#"><span><img src="<?php echo @STATIC_DIR;?>
/img/close_w_over.gif"  alt="关闭"/></span><img src="<?php echo @STATIC_DIR;?>
/img/close_w.gif" /></a> 
</div> </div><div class="clear"></div>

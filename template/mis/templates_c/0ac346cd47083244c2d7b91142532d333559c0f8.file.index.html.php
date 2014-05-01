<?php /* Smarty version Smarty3rc4, created on 2014-02-27 14:00:34
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1389783304530ed4823b7386-87028032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ac346cd47083244c2d7b91142532d333559c0f8' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/index/index.html',
      1 => 1388974605,
    ),
  ),
  'nocache_hash' => '1389783304530ed4823b7386-87028032',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>百度基础曲库 - <?php echo @QUKU_VERSION;?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo @STATIC_DIR;?>
/css/quku.css"/>
</head>
<script type="text/javascript">
		var Sys = {}; 
		var ua = navigator.userAgent.toLowerCase(); 
		var s; 
		(s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] : 
		(s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] : 
		(s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] : 
		(s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] : 
		(s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0; 
		// //以下进行测试 
		if(!Sys.firefox){
			//
			alert("对不起，目前该MIS平台只支持firefox(火狐)系列浏览器");
			window.location.href='/index.html'
		}
</script>

<frameset rows="30,*" cols="*" frameborder="no" border="0" scrolling="No" framespacing="0">
 
  <frame src="index.php?c=index&m=topmenu" scrolling="no" name="topFrame" noresize="noresize" id="topFrame" />
  <frameset rows="*"  cols="215,9,*" frameborder="no" border="0" id="homeFrame">
    <frame src="?c=index&m=menu" name="leftFrame" scrolling="no" noresize="noresize" id="leftFrame" />
    <frame src="?c=index&m=bar" name="barFrame" scrolling="no" noresize="noresize" />
    <frame src="?c=index&m=welcome" name="mainFrame" id="mainFrame" scrolling="auto" />
  </frameset>
</frameset>

<noframes>
<body>
</body>
</noframes>

</html>
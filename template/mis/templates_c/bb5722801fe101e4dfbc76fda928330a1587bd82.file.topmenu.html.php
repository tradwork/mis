<?php /* Smarty version Smarty3rc4, created on 2014-02-27 14:00:34
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/index/topmenu.html" */ ?>
<?php /*%%SmartyHeaderCode:1002115646530ed482d8cbb8-47669537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb5722801fe101e4dfbc76fda928330a1587bd82' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/index/topmenu.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '1002115646530ed482d8cbb8-47669537',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo @STATIC_DIR;?>
/css/quku.css"/>
<style>
/*topFrameSet*/
#topframeset{padding:0;margin:0;}
#topframeset a{color:#f0f0f0;text-decoration:none;}
#topframeset a.tit{padding-rght:50px;}
#topframeset a.tit:hover{color:#fff;text-decoration:underline;}
#topframeset .topwarper{background:url(/static/img/bg_top_left.jpg) no-repeat;}
#topframeset .topcon{background:url(/static/img/bg_top_right.jpg) right 0 no-repeat;font-size:77%;}
#topframeset .usrbar{background:url(/static/img/bg_top_x.jpg) repeat-x;color:#FFF;line-height:30px;height:30px;text-align:right;}
</style>
</head>
<body id="topframeset">
<div class="usrbar">
  <div class="topwarper">
    <div class="topcon">
    欢迎您，<b><?php echo $_smarty_tpl->getVariable('global_username')->value;?>
</b>&nbsp;| <a href="/index.php" target="_parent">平台首页</a> |&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('global_logout')->value;?>
" class="tit" target="_top">退出</a>&nbsp;&nbsp;&nbsp;
    </div>
  </div>
</div>
</body>
</html>
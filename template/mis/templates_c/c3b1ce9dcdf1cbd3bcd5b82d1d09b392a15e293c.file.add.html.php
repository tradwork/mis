<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:33:43
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/tag/add.html" */ ?>
<?php /*%%SmartyHeaderCode:8047321325322e917eb23d2-24351946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3b1ce9dcdf1cbd3bcd5b82d1d09b392a15e293c' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/tag/add.html',
      1 => 1382339746,
    ),
    '6e9fa7fa0b4f5d76d416485ec1d7df5c187db8ac' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/tag/abstract.form.html',
      1 => 1388481806,
    ),
    '4a840d2d4a3305a8343b4ec800e8256517ab14d9' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/header.inc.html',
      1 => 1382339745,
    ),
    'f3723e04a71d85e5d592c33b7fad95971f3f4904' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/tag/convertData.html',
      1 => 1388481866,
    ),
    '900d3ef71bf130c7f9427fa053f0e727f32a1a15' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/footer.inc.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '8047321325322e917eb23d2-24351946',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>




<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("添加标签", null, null);?>

<?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '8047321325322e917eb23d2-24351946';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:33:43
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






<style type="text/css">
   
     #tablePicHidden{
       display:inline-block;
   }
   .tb_form { border: none; width:90%;    }
   #contentDetail {
       margin-top : 20px;
   }
  
   #operation{
      line-height:22px;
   }
   #operation input[type=checkbox]{
       width:20px;	   
   }
   
   
</style>

<!-- 工具类方法 -->


<!-- 图片操作公共方法 -->

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/win.js"></script>

<!-- 歌手公共方法文件 -->
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/tag/tag.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/tag/tagForm.js"></script>


<script type="text/javascript">
	
        //模版变量转换为js变量，统一管理模版变量， 并便于其他js中引用
		<?php $_template = new Smarty_Internal_Template("tag/convertData.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('data',$_smarty_tpl->getVariable('data')->value);$_template->properties['nocache_hash']  = '8047321325322e917eb23d2-24351946';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:33:44
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/tag/convertData.html" */ ?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/mp3/yujiao/guodong/mis/mis/libraries/smarty/plugins/modifier.escape.php';
?>/**
*
*      translate smarty variable to js variable
*/
quku_v=window.quku_v || {} ;

if( typeof quku_v.tag==='undefined' ) 
{ 
    quku_v.tag = {};
}
/*
*  json key is id of element
*/
quku_v.tag.data={

	td_tagid: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_tagid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_tagid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	td_level: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_level'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_level'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	td_parentid: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_parentid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_parentid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	td_name: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_name'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_name'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	td_category: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_category'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_category'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	
	quku_tag_syn: <?php if (sizeof($_smarty_tpl->getVariable('data')->value['quku_tag_syn'])>0){?>[
							 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['quku_tag_syn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['qukuTagSyn']['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['qukuTagSyn']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?> 
								["<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ts_word'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ts_id'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ts_tagid'],'javascript');?>
"]
								<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['qukuTagSyn']['last']){?>	,<?php }?>
							 <?php }} ?> 
						]<?php }else{ ?>[]<?php }?>,	 
	

    td_levelOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['td_level']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['td_level']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	td_categoryOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['td_category']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['td_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>
}
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/tag/convertData.html" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

	


		$(document).ready(function(){
			var T = quku_v.tag;
			
			T.displayPanel(T.data);
			
			
			
			
			
		})

	
</script> 
<body>


<div style="display:none;"> <?php echo var_dump($_smarty_tpl->getVariable('data')->value);?>
 </div>

<?php if ($_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_tagid']){?>
	<input type="hidden" id = "td_tagid" name="td_tagid" value="<?php echo $_smarty_tpl->getVariable('data')->value['quku_tag_dict']['td_tagid'];?>
" />
	<!-- 如果是外包编辑 -->
	<?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']==1){?>
	<input type="hidden" id ="action" value="saveInCache" />
	<?php }else{ ?>
	<input type="hidden" id ="action" value="doEdit" />
	<?php }?>
<?php }else{ ?>
	<input type="hidden" id ="action" value="doCreate" />
<?php }?>

<input type="hidden" id ="channel" value="5" />

<div id="contentBase"> 
<fieldset class="x-layout-base">
  <legend><label>必填信息</label></legend>
		<!-- 标签名 -->
		<div id="td_name" class="x-layout-item"></div>
		<!-- 标签id -->
		<div id="td_tagid" class="x-layout-item"></div>
		<!-- 标签级别 -->
		<div id="td_level" class="x-layout-item"></div>
		<!-- 标签类别 -->
		<div id="td_parentid" class="x-layout-item"></div>
		<!-- 标签类别 -->
		<div id="td_category" class="x-layout-item"></div>
		
		<!-- 相关同义词 -->
	    <div id="quku_tag_syn" class="x-layout-block tb_form">
	  
</fieldset>
</div>
<div class="space10"></div>
<div id="operation">
	
	<input type="button" value="保存" class="button01" onclick="tag.save();"></input>
</div>


</body>


<?php $_template = new Smarty_Internal_Template("common/footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '8047321325322e917eb23d2-24351946';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:33:44
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/footer.inc.html" */ ?>
<div class="ft">&nbsp;</div>
</div>
<div id="ft">&copy;2010 Baidu</div>
</body>
</html><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/footer.inc.html" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

</html>

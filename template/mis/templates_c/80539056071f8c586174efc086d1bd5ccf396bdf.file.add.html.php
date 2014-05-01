<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:35:32
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/artist/add.html" */ ?>
<?php /*%%SmartyHeaderCode:8797143805322e984cb0135-86747571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80539056071f8c586174efc086d1bd5ccf396bdf' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/artist/add.html',
      1 => 1382339745,
    ),
    '178c70e290d2b9c2ed6312d9a6aafa0cd4e37419' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/artist/abstract.form.html',
      1 => 1387261458,
    ),
    '4a840d2d4a3305a8343b4ec800e8256517ab14d9' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/header.inc.html',
      1 => 1382339745,
    ),
    'dd6fd6aaee34b7311879914a53cf64e0ae19ba7b' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/artist/convertData.html',
      1 => 1387261326,
    ),
    '900d3ef71bf130c7f9427fa053f0e727f32a1a15' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/footer.inc.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '8797143805322e984cb0135-86747571',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>




<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("添加明星", null, null);?>

<?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '8797143805322e984cb0135-86747571';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:35:32
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
/js/components/picUpload.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/win.js"></script>

<!-- 歌手公共方法文件 -->
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/artist/artist.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/artist/artistForm.js"></script>


<script type="text/javascript">
	
        //模版变量转换为js变量，统一管理模版变量， 并便于其他js中引用
		<?php $_template = new Smarty_Internal_Template("artist/convertData.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('data',$_smarty_tpl->getVariable('data')->value);$_template->properties['nocache_hash']  = '8797143805322e984cb0135-86747571';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:35:32
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/artist/convertData.html" */ ?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/mp3/yujiao/guodong/mis/mis/libraries/smarty/plugins/modifier.escape.php';
?>/**
*
*      translate smarty variable to js variable
*/
quku_v=window.quku_v || {} ;

if( typeof quku_v.artist==='undefined' ) 
{ 
    quku_v.artist = {};
}
/*
*  json key is id of element
*/
quku_v.artist.data={

	ab_globalid: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	ab_name: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_name'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_name'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_name_id:  <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	ab_unique_name: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_unique_name'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_unique_name'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	ab_gender: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_gender'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_gender'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_career: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_career'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_career'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_info: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_info'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_info'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	ab_aliasname: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_aliasname'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_aliasname'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_birthday: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_birthday'])>0){?> "<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_birthday'],'javascript');?>
" <?php }else{ ?>''<?php }?>,
	ab_translatename: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_translatename'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_translatename'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	ab_constellation: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_constellation'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_constellation'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_stature: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_stature'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_stature'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_weight: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_weight'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_weight'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_bloodtype: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_bloodtype'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_bloodtype'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_relatestars: <?php if ($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_relatestars']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_relatestars'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_yyr_id :  <?php if ($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_yyr_id']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_yyr_id'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_company: <?php if ($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_company']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_company'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_area: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_area'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_area'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_country: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_country'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_country'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	
	ab_editusernow:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_editusernow'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_editusernow'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	
	
	ab_synonym: <?php if ($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_synonym']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_synonym'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ab_status: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_status'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_status'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
    
    quku_relatively_links: <?php if (sizeof($_smarty_tpl->getVariable('data')->value['quku_relatively_links'])>0){?>[
	                             <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['quku_relatively_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['relatively_links']['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['relatively_links']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?> 
									["<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['rl_keyword'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['rl_urllink'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['rl_id'],'javascript');?>
"]
									<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['relatively_links']['last']){?>	,<?php }?>
								 <?php }} ?> 
	                        ]<?php }else{ ?>[]<?php }?>,	
							
	quku_tag_info_rel: <?php if (sizeof($_smarty_tpl->getVariable('data')->value['quku_tag_info_rel'])>0){?>[
	                             <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['quku_tag_info_rel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['relatively_links']['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['relatively_links']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?> 
									["<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['td_name'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_weight'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_tagid'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_id'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_infoid'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_infotype'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_lastupdatetime'],'javascript');?>
"]
									<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['relatively_links']['last']){?>	,<?php }?>
								 <?php }} ?> 
	                        ]<?php }else{ ?>[]<?php }?>,	
							
	ab_genderOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['ab_gender']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ab_gender']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	ab_careerOption:  <?php if ($_smarty_tpl->getVariable('data')->value['option']['ab_career']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ab_career']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	ab_constellationOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['ab_constellation']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ab_constellation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	ab_bloodtypeOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['ab_bloodtype']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ab_bloodtype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	ab_forbidflagOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['ab_forbidflag']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ab_forbidflag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	ab_aareaOption:<?php if ($_smarty_tpl->getVariable('data')->value['option']['ab_area']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ab_area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
}
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/artist/convertData.html" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

		var jsonPic = <?php if ($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_globalid']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_pic_info'];?>
<?php }else{ ?>[]<?php }?> ;


		$(document).ready(function(){
			var T = quku_v.artist;
			
			T.displayPanel(T.data);
			
			
			
			
			
		})

	
</script> 
<body>


<?php if ($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_globalid']){?>
	<input type="hidden" id = "ab_globalid" name="ab_globalid" value="<?php echo $_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_globalid'];?>
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

<input type="hidden" id ="channel" value="3" />

<div id="contentBase"> 
<fieldset class="x-layout-base">
  <legend><label>必填信息</label></legend>
		<!-- 姓名 -->
		<div id="ab_name" class="x-layout-item"></div>
		<!-- 明星id -->
		<div id="ab_name_id" class="x-layout-item"></div>
		
		
		<div id="ab_more" class="x-layout-item">	
            <!-- 性别 -->
			<div id="ab_gender" class="x-layout-block x-item-inner"></div>		
			<!-- 唯一名 -->
			<div id="ab_unique_name" class="x-layout-block x-item-inner"></div>
			<!-- 国家 -->			
			<div id="ab_country" class="x-layout-block x-item-inner"></div>
			
		</div>
		<!-- 职业 -->
		<div id="ab_career" class="x-layout-item"></div>
		<!-- 地区 -->
		<div id="ab_area" class="x-layout-item"></div>
		<!--  锁定人  -->
		<?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']==3){?>
		<div id="ab_editusernow" class="x-layout-item"></div>
		<?php }?>
		<!-- 音乐人社区歌手id -->
		<div id="ab_yyr_id" class="x-layout-item"></div>

		<!-- 明星图片 -->
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
		<!-- 明星介绍 -->
		<div id="ab_info" class="x-layout-block"></div>		
</fieldset>
</div>
 <div id="contentDetail">
	<fieldset  class="x-layout-base">
		<legend><label>详细信息</label></legend>
		<!--别名-->
		<div id="ab_aliasname" class="x-layout-item"></div>
		<!--译名-->
		<div id="ab_translatename" class="x-layout-item"></div>
		<!--生日-->
		<div id="ab_birthday" class="x-layout-item"></div>
		<!--星座-->
		<div id="ab_constellation" class="x-layout-item"></div>	
		<!--身高-->
		<div id="ab_stature" class="x-layout-item"></div>
		<!--体重-->
		<div id="ab_weight" class="x-layout-item"></div>
		<!--相关明星-->
		<div id="ab_relatestars" class="x-layout-item"></div>
		<!--血型-->
		<div id="ab_bloodtype" class="x-layout-item"></div>			
		<!--所属企业-->
		<div id="ab_company" class="x-layout-item"></div>
		<!--同义词-->
		<div id="ab_synonym" class="x-layout-item"></div>	
		<div id="quku_relatively_links" class="x-layout-block tb_form"></div>
		<!--标签管理信息-->
		<div id="quku_tag_info_rel" class="x-layout-block tb_form"></div>
	</fieldset>
</div>
<div class="space10"></div>
<div id="operation">
	<input type="checkbox" id="ab_audit_status" <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_audit_status'])>0&&$_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_audit_status']==0){?>checked<?php }?> >审核</input>
	
	<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_status'])>0&&$_smarty_tpl->getVariable('data')->value['quku_artists_base']['ab_status']==0){?>		
		<input type="button" value="保存" class="button01" onclick="artist.saveAndPub();"></input>		
		<input type="button" value="下线" class="button01" onclick="artist.offline(event,this);"></input>
	<?php }else{ ?>
		<input type="button" value="保存" class="button01" onclick="artist.save();"></input>
		<input type="button" value="保存并发布" class="button01" onclick="artist.saveAndPub();"></input>
	<?php }?>
</div>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/picRowController.js"></script>

</body>


<?php $_template = new Smarty_Internal_Template("common/footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '8797143805322e984cb0135-86747571';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:35:33
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/footer.inc.html" */ ?>
<div class="ft">&nbsp;</div>
</div>
<div id="ft">&copy;2010 Baidu</div>
</body>
</html><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/common/footer.inc.html" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

</html>
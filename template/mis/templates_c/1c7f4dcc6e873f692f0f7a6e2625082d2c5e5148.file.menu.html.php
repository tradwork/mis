<?php /* Smarty version Smarty3rc4, created on 2014-02-27 14:00:34
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/index/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:1072884412530ed482eccdb1-31549770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c7f4dcc6e873f692f0f7a6e2625082d2c5e5148' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/index/menu.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '1072884412530ed482eccdb1-31549770',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/mp3/yujiao/guodong/mis/mis/libraries/smarty/plugins/modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"菜单项"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" href="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/accordion.res/accordion.css" />
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/jquery.dimensions.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/jquery.accordion.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// second simple accordion with special markup
		jQuery('#navigation').accordion(
		{
			header: '.head',
			fillSpace: true
		});
	});
</script>
<div  style="height:360px;">
	<ul id="navigation">
		<?php  $_smarty_tpl->tpl_vars['menuItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menuList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->key => $_smarty_tpl->tpl_vars['menuItem']->value){
?>
		<?php if (($_smarty_tpl->getVariable('user')->value['ub_groupid']==0||$_smarty_tpl->getVariable('user')->value['ub_groupid']==1)&&($_smarty_tpl->tpl_vars['menuItem']->value['prefix']=="user"||$_smarty_tpl->tpl_vars['menuItem']->value['prefix']=="dictionary"||$_smarty_tpl->tpl_vars['menuItem']->value['prefix']=="copyright")){?>
			
		<?php }elseif(($_smarty_tpl->tpl_vars['menuItem']->value['prefix']=="user"&&$_smarty_tpl->getVariable('user')->value['ub_groupid']==2)||($_smarty_tpl->tpl_vars['menuItem']->value['prefix']=="copyright"&&$_smarty_tpl->getVariable('user')->value['ub_groupid']==2)){?>	
				
		<?php }else{ ?>
				<li>
					<?php if ($_smarty_tpl->tpl_vars['menuItem']->value['sublist']){?>
						<a class="head"><?php echo $_smarty_tpl->tpl_vars['menuItem']->value['title'];?>
</a>
						<ul>
							<?php  $_smarty_tpl->tpl_vars['subItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menuItem']->value['sublist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subItem']->key => $_smarty_tpl->tpl_vars['subItem']->value){
?>
							<li><a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['subItem']->value['url']);?>
" target = "<?php if ($_smarty_tpl->tpl_vars['subItem']->value['target']){?> <?php echo $_smarty_tpl->tpl_vars['subItem']->value['target'];?>
 <?php }else{ ?>mainFrame<?php }?>"><?php echo $_smarty_tpl->tpl_vars['subItem']->value['title'];?>
</a></li>
							<?php }} ?>
						</ul> 
					<?php }else{ ?>
						<a class="head" href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['menuItem']->value['url']);?>
" target = "<?php if ($_smarty_tpl->getVariable('subItem')->value['target']){?> <?php echo $_smarty_tpl->getVariable('subItem')->value['target'];?>
 <?php }else{ ?>mainFrame<?php }?>"><?php echo $_smarty_tpl->tpl_vars['menuItem']->value['title'];?>
</a>
					<?php }?>
				</li>
			<?php }?>
		<?php }} ?>
	</ul>
</div>

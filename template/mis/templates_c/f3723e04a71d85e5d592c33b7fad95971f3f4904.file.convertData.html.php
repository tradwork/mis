<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:33:44
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/tag/convertData.html" */ ?>
<?php /*%%SmartyHeaderCode:1676540465322e918117cf8-61399500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3723e04a71d85e5d592c33b7fad95971f3f4904' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/tag/convertData.html',
      1 => 1388481866,
    ),
  ),
  'nocache_hash' => '1676540465322e918117cf8-61399500',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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

<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:33:40
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/option/convertData.html" */ ?>
<?php /*%%SmartyHeaderCode:20124981255322e914725de2-50634569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bd5eec7be5f3d63b09c1a36ab947cac63daac04' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/option/convertData.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '20124981255322e914725de2-50634569',
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

if( typeof quku_v.option==='undefined' ) 
{ 
    quku_v.option = {};
}
/*
*  json key is id of element
*/
quku_v.option.data={

	od_id: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_id'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_id'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	od_spell_code: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_spell_code'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_spell_code'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	od_category: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_category'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_category'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	od_type: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_type'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_type'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	od_word: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_word'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_word'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	od_remark: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_remark'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_remark'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	
	od_typeOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['od_type']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['od_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	od_categoryOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['od_category']){?>[ 
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['od_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

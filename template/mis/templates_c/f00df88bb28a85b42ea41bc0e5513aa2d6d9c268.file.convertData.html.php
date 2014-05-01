<?php /* Smarty version Smarty3rc4, created on 2014-03-10 16:12:50
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/batchoperation/convertData.html" */ ?>
<?php /*%%SmartyHeaderCode:554338806531d7402633139-27129598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f00df88bb28a85b42ea41bc0e5513aa2d6d9c268' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/batchoperation/convertData.html',
      1 => 1382339746,
    ),
  ),
  'nocache_hash' => '554338806531d7402633139-27129598',
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

if( typeof quku_v.batchoperation==='undefined' ) 
{ 
    quku_v.batchoperation = {};
}
/*
*  json key is id of element
*/
quku_v.batchoperation.data={
						
    /**
	*  tables
	*/
	st_tablesOption:<?php if ($_smarty_tpl->getVariable('data')->value['option']['st_tables']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
   /**
   *  display fields!
   */
	st_fieldAlubmsInfoOption:<?php if ($_smarty_tpl->getVariable('data')->value['option']['st_field']['quku_albums_info']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_field']['quku_albums_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
   	st_fieldSongsInfoOption:<?php if ($_smarty_tpl->getVariable('data')->value['option']['st_field']['quku_songs_info']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_field']['quku_songs_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	st_replace_fieldAlubmsInfoOption:<?php if ($_smarty_tpl->getVariable('data')->value['option']['st_replace_field']['quku_albums_info']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_replace_field']['quku_albums_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
   	st_replace_fieldSongsInfoOption:<?php if ($_smarty_tpl->getVariable('data')->value['option']['st_replace_field']['quku_songs_info']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_replace_field']['quku_songs_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,

	st_taskOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['st_task']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_task']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
   st_symbolsOption: [ 
						 
							{'display':"=",'value':"="},
						 
							{'display':">",'value':">"},
						 
							{'display':">=",'value':">="},
						 
							{'display':"<",'value':"<"},
						 
							{'display':"<=",'value':"<="},
						 
							{'display':"!=",'value':"!="},
						 
							{'display':"LIKE",'value':"LIKE"},
						 
							{'display':"LIKE%...%",'value':"LIKE%...%"},
						 
		           ],
   st_url : "<?php echo $_smarty_tpl->getVariable('data')->value['option']['st_url'];?>
",
   user : "<?php echo $_smarty_tpl->getVariable('user')->value['ub_username'];?>
" 
		   
};
<?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['tables'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_field']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value){
 $_smarty_tpl->tpl_vars['tables']->value = $_smarty_tpl->tpl_vars['fields']->key;
?>
      quku_v.batchoperation.data['<?php echo $_smarty_tpl->tpl_vars['tables']->value;?>
'] =[<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"}, <?php }} ?>]
<?php }} ?> 
<?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['tables'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_replace_field']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value){
 $_smarty_tpl->tpl_vars['tables']->value = $_smarty_tpl->tpl_vars['fields']->key;
?>
      quku_v.batchoperation.data['replace_<?php echo $_smarty_tpl->tpl_vars['tables']->value;?>
'] =[<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"}, <?php }} ?>]
<?php }} ?> 

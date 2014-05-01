<?php /* Smarty version Smarty3rc4, created on 2014-03-10 10:14:21
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/statistic/convertData.html" */ ?>
<?php /*%%SmartyHeaderCode:280923475531d1ffd2a5bf0-15476193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13378927ff82b5986375592b2f7f7c2132bafc5c' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/statistic/convertData.html',
      1 => 1389858794,
    ),
  ),
  'nocache_hash' => '280923475531d1ffd2a5bf0-15476193',
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

if( typeof quku_v.statistic==='undefined' ) 
{ 
    quku_v.statistic = {};
}
/*
*  json key is id of element
*/
quku_v.statistic.data={
						


   /**
   *  display fields!
   */
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
	st_fieldOption:<?php if ($_smarty_tpl->getVariable('data')->value['option']['st_field']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_field']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	st_symbolsOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['st_symbol']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_symbol']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,

	main_tablesOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['main_tables']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['name'],'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,

	st_needpvOption: 	 <?php if ($_smarty_tpl->getVariable('data')->value['option']['st_needpv']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['st_needpv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,

	/*
		关系表、副表、子表
	*/
	/*关系表总对象*/
	relations_table : {
				<?php  $_smarty_tpl->tpl_vars['table'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['table']->key => $_smarty_tpl->tpl_vars['table']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['table']->key;
?>
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['i']->value,'javascript');?>
:[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value['relations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['name'],'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['value'],'javascript');?>
"},
						<?php }} ?> 
				],
				<?php }} ?>
	},
	main_tables : {
				<?php  $_smarty_tpl->tpl_vars['table'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['table']->key => $_smarty_tpl->tpl_vars['table']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['table']->key;
?>
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['i']->value,'javascript');?>
:[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('value')->value,'javascript');?>
"},
						<?php }} ?> 
				],
				<?php }} ?>		
	},

	quku_albums_info_Option:<?php if ($_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_albums_info']['relations']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_albums_info']['relations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['name'],'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['value'],'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,

   	quku_songs_info_Option:<?php if ($_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_songs_info']['relations']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_songs_info']['relations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['name'],'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['value'],'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,

  	quku_artists_base_Option:<?php if ($_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_artists_base']['relations']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_artists_base']['relations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['name'],'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['value'],'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,

	/*子表字段 field*/
	
   	quku_songs_infoOption :<?php if ($_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_songs_info']['fields']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_songs_info']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
   	quku_albums_infoOption :<?php if ($_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_albums_info']['fields']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_albums_info']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
   	quku_artists_baseOption :<?php if ($_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_artists_base']['fields']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_artists_base']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]<?php }else{ ?> [] <?php }?>,		           
    st_url : "<?php echo $_smarty_tpl->getVariable('data')->value['option']['st_url'];?>
",
    user : "<?php echo $_smarty_tpl->getVariable('user')->value['ub_username'];?>
",   
    
    quku_songs_info :<?php if ($_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_songs_info']['relations']){?>{<?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['tables'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_songs_info']['relations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['fields']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['fields']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fields']['total'] = $_smarty_tpl->tpl_vars['fields']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value){
 $_smarty_tpl->tpl_vars['tables']->value = $_smarty_tpl->tpl_vars['fields']->key;
 $_smarty_tpl->tpl_vars['fields']->iteration++;
 $_smarty_tpl->tpl_vars['fields']->last = $_smarty_tpl->tpl_vars['fields']->iteration === $_smarty_tpl->tpl_vars['fields']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fields']['last'] = $_smarty_tpl->tpl_vars['fields']->last;
?><?php echo $_smarty_tpl->tpl_vars['tables']->value;?>
:[<?php  $_smarty_tpl->tpl_vars['subfields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['subfields']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['subfields']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["subfields"]['total'] = $_smarty_tpl->tpl_vars['subfields']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subfields']->key => $_smarty_tpl->tpl_vars['subfields']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['subfields']->key;
 $_smarty_tpl->tpl_vars['subfields']->iteration++;
 $_smarty_tpl->tpl_vars['subfields']->last = $_smarty_tpl->tpl_vars['subfields']->iteration === $_smarty_tpl->tpl_vars['subfields']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["subfields"]['last'] = $_smarty_tpl->tpl_vars['subfields']->last;
?>{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['subfields']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['subfields']['last']){?>,<?php }?><?php }} ?>]<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['fields']['last']){?>,<?php }?><?php }} ?>}<?php }else{ ?> [] <?php }?>,
    
    quku_albums_info :<?php if ($_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_albums_info']['relations']){?>{<?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['tables'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_albums_info']['relations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['fields']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['fields']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fields']['total'] = $_smarty_tpl->tpl_vars['fields']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value){
 $_smarty_tpl->tpl_vars['tables']->value = $_smarty_tpl->tpl_vars['fields']->key;
 $_smarty_tpl->tpl_vars['fields']->iteration++;
 $_smarty_tpl->tpl_vars['fields']->last = $_smarty_tpl->tpl_vars['fields']->iteration === $_smarty_tpl->tpl_vars['fields']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fields']['last'] = $_smarty_tpl->tpl_vars['fields']->last;
?><?php echo $_smarty_tpl->tpl_vars['tables']->value;?>
:[<?php  $_smarty_tpl->tpl_vars['subfields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['subfields']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['subfields']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["subfields"]['total'] = $_smarty_tpl->tpl_vars['subfields']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subfields']->key => $_smarty_tpl->tpl_vars['subfields']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['subfields']->key;
 $_smarty_tpl->tpl_vars['subfields']->iteration++;
 $_smarty_tpl->tpl_vars['subfields']->last = $_smarty_tpl->tpl_vars['subfields']->iteration === $_smarty_tpl->tpl_vars['subfields']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["subfields"]['last'] = $_smarty_tpl->tpl_vars['subfields']->last;
?>{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['subfields']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['subfields']['last']){?>,<?php }?><?php }} ?>]<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['fields']['last']){?>,<?php }?><?php }} ?>}<?php }else{ ?> [] <?php }?>,

  	quku_artists_base :<?php if ($_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_artists_base']['relations']){?>{<?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['tables'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']['quku_artists_base']['relations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['fields']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['fields']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fields']['total'] = $_smarty_tpl->tpl_vars['fields']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value){
 $_smarty_tpl->tpl_vars['tables']->value = $_smarty_tpl->tpl_vars['fields']->key;
 $_smarty_tpl->tpl_vars['fields']->iteration++;
 $_smarty_tpl->tpl_vars['fields']->last = $_smarty_tpl->tpl_vars['fields']->iteration === $_smarty_tpl->tpl_vars['fields']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fields']['last'] = $_smarty_tpl->tpl_vars['fields']->last;
?><?php echo $_smarty_tpl->tpl_vars['tables']->value;?>
:[<?php  $_smarty_tpl->tpl_vars['subfields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['subfields']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['subfields']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["subfields"]['total'] = $_smarty_tpl->tpl_vars['subfields']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subfields']->key => $_smarty_tpl->tpl_vars['subfields']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['subfields']->key;
 $_smarty_tpl->tpl_vars['subfields']->iteration++;
 $_smarty_tpl->tpl_vars['subfields']->last = $_smarty_tpl->tpl_vars['subfields']->iteration === $_smarty_tpl->tpl_vars['subfields']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["subfields"]['last'] = $_smarty_tpl->tpl_vars['subfields']->last;
?>{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['subfields']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['subfields']['last']){?>,<?php }?><?php }} ?>]<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['fields']['last']){?>,<?php }?><?php }} ?>}<?php }else{ ?> [] <?php }?>,
  	
};
/*字段*/

<?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['tables'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value){
 $_smarty_tpl->tpl_vars['tables']->value = $_smarty_tpl->tpl_vars['fields']->key;
?>
      quku_v.statistic.data['<?php echo $_smarty_tpl->tpl_vars['tables']->value;?>
'] =[<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"}, <?php }} ?>]
<?php }} ?>

	<?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['tables'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['main_tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value){
 $_smarty_tpl->tpl_vars['tables']->value = $_smarty_tpl->tpl_vars['fields']->key;
?>
		<?php  $_smarty_tpl->tpl_vars['subfield'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['subtables'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['relations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subfield']->key => $_smarty_tpl->tpl_vars['subfield']->value){
 $_smarty_tpl->tpl_vars['subtables']->value = $_smarty_tpl->tpl_vars['subfield']->key;
?>quku_v.statistic.data['<?php echo $_smarty_tpl->tpl_vars['tables']->value;?>
']['<?php echo $_smarty_tpl->tpl_vars['subtables']->value;?>
']=[<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['subfield']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['value']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["subfield"]['total'] = $_smarty_tpl->tpl_vars['value']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
 $_smarty_tpl->tpl_vars['value']->iteration++;
 $_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration === $_smarty_tpl->tpl_vars['value']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["subfield"]['last'] = $_smarty_tpl->tpl_vars['value']->last;
?>{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['subfield']['last']){?>,<?php }?> <?php }} ?>];
		<?php }} ?>
	<?php }} ?>
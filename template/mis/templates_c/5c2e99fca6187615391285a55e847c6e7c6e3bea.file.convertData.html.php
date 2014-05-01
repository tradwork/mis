<?php /* Smarty version Smarty3rc4, created on 2014-03-16 16:34:49
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/show/convertData.html" */ ?>
<?php /*%%SmartyHeaderCode:2009463096532562294fe490-14932467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c2e99fca6187615391285a55e847c6e7c6e3bea' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/show/convertData.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '2009463096532562294fe490-14932467',
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

if( typeof quku_v.show==='undefined' ) 
{ 
    quku_v.show = {};
}
/*
*  json key is id of element
*/
quku_v.show.data={

	sn_globalid: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	sn_title: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_title'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_title'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	quku_artist_works_ref: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artist_works_ref'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artist_works_ref'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	sn_city: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_city'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_city'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	sn_venue: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_venue'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_venue'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	sn_detailtime: <?php if (sizeof($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_detailtime'])>0){?>[
	                             <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_detailtime']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['sn_detailtime']['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['sn_detailtime']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?> 
									["<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
"]
									<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['sn_detailtime']['last']){?>	,<?php }?>
								 <?php }} ?> 
	                        ]<?php }else{ ?>[]<?php }?>,
	sn_category: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_category'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_category'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	sn_info: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_info'])>0){?> "<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_info'],'javascript');?>
" <?php }else{ ?>''<?php }?>,
	sn_price: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_price'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_price'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	sn_editusernow:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_editusernow'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_editusernow'],'javascript');?>
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
	   
	sn_categoryOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['sn_category']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['sn_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	sn_cityOption:	<?php if ($_smarty_tpl->getVariable('data')->value['option']['sn_city']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['sn_city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

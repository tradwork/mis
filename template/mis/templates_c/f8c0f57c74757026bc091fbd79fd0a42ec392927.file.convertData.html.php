<?php /* Smarty version Smarty3rc4, created on 2014-03-06 15:26:40
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/album/convertData.html" */ ?>
<?php /*%%SmartyHeaderCode:1754236569531823306eddf4-25015137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8c0f57c74757026bc091fbd79fd0a42ec392927' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/album/convertData.html',
      1 => 1393405520,
    ),
  ),
  'nocache_hash' => '1754236569531823306eddf4-25015137',
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

if( typeof quku_v.album==='undefined' ) 
{ 
    quku_v.album = {};
}
/*
*  json key is id of element
*/
quku_v.album.data={

	ai_globalid: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	ai_album: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_album'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_album'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_album_id: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	quku_artist_works_ref: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artist_works_ref'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artist_works_ref'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	ai_aliasalbum: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_aliasalbum'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_aliasalbum'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_translatename: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_translatename'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_translatename'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_info: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_info'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_info'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	ai_language: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_language'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_language'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_area: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_area'])>0){?> "<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_area'],'javascript');?>
" <?php }else{ ?>''<?php }?>,
	ai_audit_status: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_audit_status'])>0){?> "<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_audit_status'],'javascript');?>
" <?php }else{ ?>''<?php }?>,
	ai_audit_info: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_audit_info'])>0){?> "<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_audit_info'],'javascript');?>
" <?php }else{ ?>''<?php }?>,
	
	ai_duration: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_duration'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_duration'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	ai_version: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_version'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_version'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_publishcompany: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_publishcompany'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_publishcompany'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_sub_publishcompany: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_sub_publishcompany'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_sub_publishcompany'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_publishtime: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_publishtime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_publishtime'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_songs_total: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_songs_total'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_songs_total'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_styles: <?php if ($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_styles']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_styles'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	ai_productid: <?php if ($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_productid']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_productid'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_productid_flag: <?php if ($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_productid_flag']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_productid_flag'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_synonym: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_synonym'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_synonym'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_source: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_source'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_source'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_editusernow:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_editusernow'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_editusernow'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	ai_authorisation_url:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_authorisation_url'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_authorisation_url']);?>
"<?php }else{ ?>''<?php }?>,
		                                                                                                                                                            ai_brief_info: <?php if ($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_brief_info']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_brief_info'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
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
	 
	ai_versionOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['ai_version']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ai_version']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	ai_stylesOption:  <?php if ($_smarty_tpl->getVariable('data')->value['option']['ai_styles']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ai_styles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	ai_areaOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['ai_area']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ai_area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
	ai_languageOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['ai_language']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ai_language']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
    ai_sourceOption:  <?php if ($_smarty_tpl->getVariable('data')->value['option']['ai_source']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ai_source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
    ai_productid_flagOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['ai_productid_flag']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ai_productid_flag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,
    ai_audit_statusOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['ai_audit_status']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ai_audit_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,

    ai_audit_infoOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['ai_audit_info']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['ai_audit_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

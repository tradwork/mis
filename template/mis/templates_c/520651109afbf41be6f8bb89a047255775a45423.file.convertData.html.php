<?php /* Smarty version Smarty3rc4, created on 2012-08-03 12:02:22
         compiled from "/home/yule/samba/pengjuxiang/workspace2/system/../template/mis/templates/artist/convertData.html" */ ?>
<?php /*%%SmartyHeaderCode:33983543501b4d4e48cc47-21854280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '520651109afbf41be6f8bb89a047255775a45423' => 
    array (
      0 => '/home/yule/samba/pengjuxiang/workspace2/system/../template/mis/templates/artist/convertData.html',
      1 => 1339396407,
    ),
  ),
  'nocache_hash' => '33983543501b4d4e48cc47-21854280',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/yule/samba/pengjuxiang/workspace2/mis/libraries/smarty/plugins/modifier.escape.php';
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

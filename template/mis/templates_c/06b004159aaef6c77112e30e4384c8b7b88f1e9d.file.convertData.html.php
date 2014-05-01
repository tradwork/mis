<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:33:56
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/yingshi/convertData.html" */ ?>
<?php /*%%SmartyHeaderCode:3259372185322e92474b0c8-62269764%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06b004159aaef6c77112e30e4384c8b7b88f1e9d' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/yingshi/convertData.html',
      1 => 1382339746,
    ),
  ),
  'nocache_hash' => '3259372185322e92474b0c8-62269764',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/mp3/yujiao/guodong/mis/mis/libraries/smarty/plugins/modifier.escape.php';
?>/*
=========================================
|translate smarty variable to js variable
|json key is id of element
=========================================
*/
quku_v = window.quku_v || {};
if(typeof quku_v.yingshi === "undefined"){
	quku_v.yingshi = {};
}
quku_v.yingshi.data = {
   
	yi_globalid: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_globalid'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_title:    <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_title'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_title'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_title_id: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_globalid'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_aliastitle: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_aliastitle'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_aliastitle'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_translatename: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_translatename'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_translatename'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_info: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_info'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_info'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_main: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_main'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_main'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_guest: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_guest'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_guest'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_director: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_director'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_director'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_versions: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_versions'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_versions'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_session: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_session'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_session'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_area: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_area'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_area'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_language:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_language'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_language'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_type:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_type'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_type'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_publishtime: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_publishtime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_publishtime'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_label: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_label'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_label'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
	yi_pid: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_pid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_pid'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_isrc: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_isrc'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_isrc'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_source_path: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_source_path'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_source_path'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_joinuser: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_joinuser'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_joinuser'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_editusernow: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_editusernow'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_editusernow'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_edituidnowtime: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_edituidnowtime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_edituidnowtime'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_edittime: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_edittime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_edittime'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_edituser: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_edituser'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_edituser'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_status: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_status'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_status'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_delflag: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_delflag'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_delflag'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_priority: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_priority'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_priority'],'javascript');?>
"<?php }else{ ?>""<?php }?>,
    yi_priority_settime: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_priority_settime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_yingshi_info']['yi_priority_settime'],'javascript');?>
"<?php }else{ ?>""<?php }?>,

    quku_yingshi_ref:<?php if (sizeof($_smarty_tpl->getVariable('data')->value['quku_yingshi_ref'])>0){?>[
                                 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['quku_yingshi_ref']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['songs_writing']['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['songs_writing']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
                                    ["<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['yr_itemid'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['yr_order'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['yr_ref_type'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['yr_content_type'],'javascript');?>
"]
                                    <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['songs_writing']['last']){?>  ,<?php }?>
                                 <?php }} ?>
                            ]<?php }else{ ?>[]<?php }?>,
    
    yr_ref_typeOption :<?php if ($_smarty_tpl->getVariable('data')->value['option']['yr_ref_type']){?>[
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['yr_ref_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            {'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
                        <?php }} ?>    
                    ]<?php }else{ ?>[]><?php }?>,
    yr_content_type_1Option :<?php if ($_smarty_tpl->getVariable('data')->value['option']['yr_content_type_1']){?>[
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['yr_content_type_1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            {'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
                        <?php }} ?>    
                    ]<?php }else{ ?>[]><?php }?>,
    yi_areaOption :<?php if ($_smarty_tpl->getVariable('data')->value['option']['yi_area']){?>[
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['yi_area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            {'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
                        <?php }} ?>    
                    ]<?php }else{ ?>[]><?php }?>,
    yi_typeOption :<?php if ($_smarty_tpl->getVariable('data')->value['option']['yi_type']){?>[
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['yi_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            {'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
                        <?php }} ?>    
                    ]<?php }else{ ?>[]><?php }?>,

    yi_languageOption :<?php if ($_smarty_tpl->getVariable('data')->value['option']['yi_language']){?>[
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['yi_language']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            {'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
                        <?php }} ?>    
                    ]<?php }else{ ?>[]><?php }?>,
    tag_1 :<?php if ($_smarty_tpl->getVariable('data')->value['option']['yr_content_type_1']){?>[
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['yr_content_type_1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            {'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
                        <?php }} ?>    
                    ]<?php }else{ ?>[]><?php }?>,                  
    tag_2 :<?php if ($_smarty_tpl->getVariable('data')->value['option']['yr_content_type_2']){?>[
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['yr_content_type_2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            {'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
                        <?php }} ?>    
                    ]<?php }else{ ?>[]><?php }?>,
    tag_101 :<?php if ($_smarty_tpl->getVariable('data')->value['option']['yr_content_type_1']){?>[
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['yr_content_type_1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            {'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
                        <?php }} ?>    
                    ]<?php }else{ ?>[]><?php }?>,                  
    tag_102 :<?php if ($_smarty_tpl->getVariable('data')->value['option']['yr_content_type_2']){?>[
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['yr_content_type_2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            {'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
                        <?php }} ?>    
                    ]<?php }else{ ?>[]><?php }?>
}
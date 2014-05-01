<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:52:42
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/song/convertData.html" */ ?>
<?php /*%%SmartyHeaderCode:4420009985322ed8a4e7260-97073823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3876ae763f5f6bbf5983a9cc635b78f381df0c2a' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/song/convertData.html',
      1 => 1394797955,
    ),
  ),
  'nocache_hash' => '4420009985322ed8a4e7260-97073823',
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

if( typeof quku_v.song==='undefined' )
{
    quku_v.song = {};
}
/*
*  json key is id of element
*/
quku_v.song.data={

	si_globalid: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	si_title: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_title'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_title'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_title_id: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	si_cluster_id: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_cluster_id'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_cluster_id'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	quku_artist_works_ref: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artist_works_ref'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artist_works_ref'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	si_publishtime: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_publishtime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_publishtime'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_info: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_info'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_info'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_album: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_album'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_album'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_audit_status: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_audit_status'])>0){?> "<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_audit_status'],'javascript');?>
" <?php }else{ ?>''<?php }?>,
	si_audit_info: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_audit_info'])>0){?> "<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_audit_info'],'javascript');?>
" <?php }else{ ?>''<?php }?>,

	si_album_id: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_album_id'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_album_id'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_area: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_area'])>0){?> "<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_area'],'javascript');?>
" <?php }else{ ?>''<?php }?>,
	si_language: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_language'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_language'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	si_translatename: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_translatename'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_translatename'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_album_no: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_album_no'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_album_no'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_cd_no: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_cd_no'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_cd_no'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_versions: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_versions'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_versions'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_license_number: <?php if ($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_license_number']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_license_number'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
    si_recordingcopyright_type: <?php if ($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_recordingcopyright_type']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_recordingcopyright_type'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
    ci_primary_songid : <?php if ($_smarty_tpl->getVariable('data')->value['quku_cluster_info']['ci_primary_songid']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_cluster_info']['ci_primary_songid'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

    si_recording_type: <?php if ($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_recording_type']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_recording_type'],'javascript');?>
"<?php }else{ ?>'1110,1101,1011,0111'<?php }?>,
	si_styles: <?php if ($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_styles']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_styles'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_duration: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_duration'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_duration'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_yyr_id :<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_yyr_id'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_yyr_id'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_synonym: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_synonym'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_synonym'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_proxycompany: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_proxycompany'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_proxycompany'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_publishcompany: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_publishcompany'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_publishcompany'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_sub_publishcompany: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_sub_publishcompany'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_sub_publishcompany'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_trackid:  <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_trackid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_trackid'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_isrc_flag: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_isrc_flag'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_isrc_flag'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_isrc:  <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_isrc'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_isrc'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_aliastitle: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_aliastitle'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_aliastitle'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_prohibit_type :  <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_prohibit_type'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_prohibit_type'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_pre_pubtime:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_pre_pubtime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_pre_pubtime'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_relate_ids:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_relate_ids'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_relate_ids'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_editusernow:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_editusernow'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_editusernow'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	si_distribution:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_distribution'])>0){?>[<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = json_decode(html_entity_decode($_smarty_tpl->getVariable('data')->value['quku_songs_info']['si_distribution']),'true'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["songs_dis"]['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["songs_dis"]['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>[quku_v.global.DIS[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
],<?php  $_smarty_tpl->tpl_vars['leixing'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['weizhi'] = new Smarty_Variable;
 $_from = str_split($_smarty_tpl->tpl_vars['item']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['leixing']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['leixing']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['songs_leixing']['total'] = $_smarty_tpl->tpl_vars['leixing']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['leixing']->key => $_smarty_tpl->tpl_vars['leixing']->value){
 $_smarty_tpl->tpl_vars['weizhi']->value = $_smarty_tpl->tpl_vars['leixing']->key;
 $_smarty_tpl->tpl_vars['leixing']->iteration++;
 $_smarty_tpl->tpl_vars['leixing']->last = $_smarty_tpl->tpl_vars['leixing']->iteration === $_smarty_tpl->tpl_vars['leixing']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['songs_leixing']['last'] = $_smarty_tpl->tpl_vars['leixing']->last;
?>"<?php echo $_smarty_tpl->tpl_vars['leixing']->value;?>
"<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['songs_leixing']['last']){?>,<?php }?><?php }} ?>]<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['songs_dis']['last']){?> ,<?php }?><?php }} ?>]<?php }else{ ?>[<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['name'] = "default_dis";
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['loop'] = is_array($_loop=10) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]['total']);
?>[quku_v.global.DIS[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['default_dis']['index'];?>
],"0","0","0","0","0","0","0","0","0","0"]<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['default_dis']['last']){?> ,<?php }?><?php endfor; endif; ?>]<?php }?>,
																																	
	quku_songs_copyright_compose: <?php if (sizeof($_smarty_tpl->getVariable('data')->value['quku_songs_copyright_compose'])>0){?>[
	                             <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['quku_songs_copyright_compose']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['songs_compose']['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['songs_compose']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
									["<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['sc_artist_name'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['sc_company'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['sc_percent'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['sc_id'],'javascript');?>
"]
									<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['songs_compose']['last']){?>	,<?php }?>
								 <?php }} ?>
	                        ]<?php }else{ ?>[]<?php }?>,
    quku_songs_copyright_writing:<?php if (sizeof($_smarty_tpl->getVariable('data')->value['quku_songs_copyright_writing'])>0){?>[
	                             <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['quku_songs_copyright_writing']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
									["<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['sc_artist_name'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['sc_company'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['sc_percent'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['sc_id'],'javascript');?>
"]
									<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['songs_writing']['last']){?>	,<?php }?>
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
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_rawweight'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_editflag'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_weight'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_infotype'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_tagid'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_id'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_infoid'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_lastupdatetime'],'javascript');?>
"]
								<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['relatively_links']['last']){?>	,<?php }?>
							 <?php }} ?>
						]<?php }else{ ?>[]<?php }?>,

	quku_tag_info_rel1: <?php if (sizeof($_smarty_tpl->getVariable('data')->value['quku_tag_info_rel1'])>0){?>[
							 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['quku_tag_info_rel1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
								["<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_tagid'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_rawweight'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_tagid_1'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_rawweight_1'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_editflag_1'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_weight'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ti_weight_1'],'javascript');?>
"]
								<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['relatively_links']['last']){?>	,<?php }?>
							 <?php }} ?>
						]<?php }else{ ?>[]<?php }?>,


	si_versionsOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_versions']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_versions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	sf_usage_flagOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['sf_usage_flag']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['sf_usage_flag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,

	si_stylesOption:  <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_styles']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_styles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	si_areaOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_area']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	si_recordingcopyright_typeOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_recordingcopyright_type']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_recordingcopyright_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	si_recording_typeOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_recording_type']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_recording_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	si_languageOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_language']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_language']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
    si_isrc_flagOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_isrc_flag']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_isrc_flag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
    si_tag_relOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_tag_rel']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_tag_rel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
<?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['tag_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_tag_rel1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value){
 $_smarty_tpl->tpl_vars['tag_id']->value = $_smarty_tpl->tpl_vars['fields']->key;
?>
      'tag_<?php echo $_smarty_tpl->tpl_vars['tag_id']->value;?>
':[<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"}, <?php }} ?>],
<?php }} ?>

	si_prohibit_typeOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_prohibit_type']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_prohibit_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
    si_audit_statusOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_audit_status']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_audit_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,

    si_audit_infoOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['si_audit_info']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['si_audit_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,		

    quku_cluster_infoOption: <?php if ($_smarty_tpl->getVariable('data')->value['quku_cluster_info']){?>[ 
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['quku_cluster_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
"},
						<?php }} ?> 
		           ]  <?php }else{ ?> [] <?php }?>,	
}

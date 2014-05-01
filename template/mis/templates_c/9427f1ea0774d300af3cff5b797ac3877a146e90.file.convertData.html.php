<?php /* Smarty version Smarty3rc4, created on 2014-03-14 18:58:53
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/mv/convertData.html" */ ?>
<?php /*%%SmartyHeaderCode:19408526535322e0ed2c2028-89992290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9427f1ea0774d300af3cff5b797ac3877a146e90' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/mv/convertData.html',
      1 => 1382339746,
    ),
  ),
  'nocache_hash' => '19408526535322e0ed2c2028-89992290',
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

if( typeof quku_v.mv==='undefined' )
{
    quku_v.mv = {};
}
/*
*  json key is id of element
*/
quku_v.mv.data={

	mi_globalid: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	mi_title: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_title'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_title'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_title_id: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	mi_artist_id:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_artist_id'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_artist_id'],'javascript');?>
"<?php }else{ ?>''<?php }?> ,
	mi_label:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_label'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_label'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_pre_pubtime:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_pre_pubtime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_pre_pubtime'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_audit_status:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_audit_status'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_audit_status'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_subtitle:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_subtitle'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_subtitle'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_mv_id:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	
	vf_aspect_ratio:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_aspect_ratio'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_aspect_ratio'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vi_globalid:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vi_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vi_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_globalid:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_globalid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_globalid'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_definition:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_definition'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_definition'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_file_extension:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_extension'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_extension'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_file_link:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_link'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_link'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_md5:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_md5'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_md5'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_file_size:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_size'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_size'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_file_format:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_format'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_format'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_file_duration:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_duration'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_duration'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_size_player:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_size_player'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_size_player'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vi_source_path:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vi_source_path'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vi_source_path'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_aspect_ratio:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_aspect_ratio'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_aspect_ratio'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_player_param:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_player_param'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_player_param'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_source_path:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_source_path'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_source_path'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_showurl:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_showurl'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_showurl'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_file_name:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_name'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_file_name'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_p2p_hash:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_p2p_hash'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_p2p_hash'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_check_status:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['f_check_status'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['f_check_status'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_last_up_time:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_last_up_time'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_last_up_time'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vf_jointime:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_jointime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vf_jointime'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	vi_provider:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vi_provider'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vi_provider'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	
	vi_showtime:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vi_showtime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vi_showtime'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	
	vi_tvid:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vi_tvid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['quku_video_info']['vi_tvid'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	
	quku_artist_works_ref: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_artist_works_ref'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_artist_works_ref'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	mi_publishtime: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_publishtime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_publishtime'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_info: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_info'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_info'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_album: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_album'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_album'],'javascript');?>
"<?php }else{ ?>''<?php }?>,

	mi_album_id: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_album_id'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_album_id'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_area: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_area'])>0){?> "<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_area'],'javascript');?>
" <?php }else{ ?>''<?php }?>,
	mi_language: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_language'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_language'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_translatename: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_translatename'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_translatename'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_album_no: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_album_no'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_album_no'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_cd_no: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_cd_no'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_cd_no'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_versions: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_versions'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_versions'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
    mi_recordingcopyright_type: <?php if ($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_recordingcopyright_type']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_recordingcopyright_type'],'javascript');?>
"<?php }else{ ?>'1'<?php }?>,
    mi_recording_type: <?php if ($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_recording_type']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_recording_type'],'javascript');?>
"<?php }else{ ?>'1110,1101,1011,0111'<?php }?>,
	mi_styles: <?php if ($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_styles']){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_styles'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_duration: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_duration'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_duration'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_synonym: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_synonym'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_synonym'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_proxycompany: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_proxycompany'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_proxycompany'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_publishcompany: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_publishcompany'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_publishcompany'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_sub_publishcompany: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_sub_publishcompany'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_sub_publishcompany'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_trackid:  <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_trackid'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_trackid'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_isrc_flag: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_isrc_flag'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_isrc_flag'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_isrc:  <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_isrc'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_isrc'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_aliastitle: <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_aliastitle'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_aliastitle'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_prohibit_type :  <?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_prohibit_type'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_prohibit_type'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_pre_pubtime:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_pre_pubtime'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_pre_pubtime'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_relate_ids:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_relate_ids'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_relate_ids'],'javascript');?>
"<?php }else{ ?>''<?php }?>,
	mi_editusernow:<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_editusernow'])>0){?>"<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_editusernow'],'javascript');?>
"<?php }else{ ?>''<?php }?>,


	mi_distribution:
		<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_distribution'])>0){?>[<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = json_decode(html_entity_decode($_smarty_tpl->getVariable('data')->value['quku_mv_info']['mi_distribution']),'true'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["mvs_dis"]['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["mvs_dis"]['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>[quku_v.global.DIS[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
],<?php  $_smarty_tpl->tpl_vars['leixing'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['weizhi'] = new Smarty_Variable;
 $_from = str_split($_smarty_tpl->tpl_vars['item']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['leixing']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['leixing']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mvs_leixing']['total'] = $_smarty_tpl->tpl_vars['leixing']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['leixing']->key => $_smarty_tpl->tpl_vars['leixing']->value){
 $_smarty_tpl->tpl_vars['weizhi']->value = $_smarty_tpl->tpl_vars['leixing']->key;
 $_smarty_tpl->tpl_vars['leixing']->iteration++;
 $_smarty_tpl->tpl_vars['leixing']->last = $_smarty_tpl->tpl_vars['leixing']->iteration === $_smarty_tpl->tpl_vars['leixing']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mvs_leixing']['last'] = $_smarty_tpl->tpl_vars['leixing']->last;
?>"<?php echo $_smarty_tpl->tpl_vars['leixing']->value;?>
"<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['mvs_leixing']['last']){?>,<?php }?><?php }} ?>]<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['mvs_dis']['last']){?> ,<?php }?><?php }} ?>]<?php }else{ ?>[<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["default_dis"]);
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
																																	
    quku_mv_ref:<?php if (sizeof($_smarty_tpl->getVariable('data')->value['quku_mv_ref'])>0){?>[
	                             <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['quku_mv_ref']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mvs_writing']['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mvs_writing']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
									["<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['mr_itemid'],'javascript');?>
","<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['mr_order'],'javascript');?>
"]
									<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['mvs_writing']['last']){?>,<?php }?>
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

	mi_versionsOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['mi_versions']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['mi_versions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	mi_stylesOption:  <?php if ($_smarty_tpl->getVariable('data')->value['option']['mi_styles']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['mi_styles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	mi_areaOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['mi_area']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['mi_area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	vi_providerOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['vi_provider']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['vi_provider']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	vf_definitionOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['vf_definition']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['vf_definition']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,

	vi_providerOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['vi_provider']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['vi_provider']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	mi_recordingcopyright_typeOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['mi_recordingcopyright_type']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['mi_recordingcopyright_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	mi_recording_typeOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['mi_recording_type']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['mi_recording_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
	mi_languageOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['mi_language']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['mi_language']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
    mi_isrc_flagOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['mi_isrc_flag']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['mi_isrc_flag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							{'display':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value,'javascript');?>
",'value':"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value,'javascript');?>
"},
						<?php }} ?>
		           ]  <?php }else{ ?> [] <?php }?>,
    mi_tag_relOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['mi_tag_rel']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['mi_tag_rel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
 $_from = $_smarty_tpl->getVariable('data')->value['option']['mi_tag_rel1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

	mi_prohibit_typeOption: <?php if ($_smarty_tpl->getVariable('data')->value['option']['mi_prohibit_type']){?>[
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['option']['mi_prohibit_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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




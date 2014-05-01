<?php /* Smarty version Smarty3rc4, created on 2014-02-27 14:00:41
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/song/list.html" */ ?>
<?php /*%%SmartyHeaderCode:1751025852530ed4896a0671-21312005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '110c765f2d67a7ec6af0d0a4994f421782231a77' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/song/list.html',
      1 => 1387792506,
    ),
  ),
  'nocache_hash' => '1751025852530ed4896a0671-21312005',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/mp3/yujiao/guodong/mis/mis/libraries/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/mp3/yujiao/guodong/mis/mis/libraries/smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<style type="text/css">
	.black{color:#000000;}
</style>

 <script type="text/javascript" src="static/js/song/songList.js" ></script>

<?php if ($_smarty_tpl->getVariable('not_pub_singer')->value){?>
<script>

var not_pub_singer = '<table class="qukuDataGrid" width="100%" cellpadding="3">'
	+ '<tr>'
	+ '    <th style="font-size:12px;">状态</th>'
	+ '    <th style="font-size:12px;">明星</th>'
	+ '</tr>';

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('not_pub_singer')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
	not_pub_singer += ''
	+ '<tr>'
	+ '   <td height="20"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>'
	+ '   <td><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>'
	+ '</tr>'
<?php }} ?>
not_pub_singer += '</table>';

widget.mask.show();
widget.simple_dialog.create(
	"未创建或未审核明星",
	not_pub_singer,
	"400",
	{
		hide: function() {
			widget.mask.hide();
		}
	}
);
</script>
<?php }?>

<?php if ($_GET['search_delflag']==1){?>
	<?php $_smarty_tpl->tpl_vars["delflag"] = new Smarty_variable("si_delflag", null, null);?>
<?php }else{ ?>
	<?php $_smarty_tpl->tpl_vars["delflag"] = new Smarty_variable('', null, null);?>

<?php }?>
<?php $_smarty_tpl->tpl_vars["o"] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['search_option'], null, null);?>

<div style="display:none;"></div>

<?php $_template = new Smarty_Internal_Template("listSearch/songSearchBar.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"song");$_template->assign('option',$_smarty_tpl->getVariable('data')->value['search_option']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div style="margin:10px 0">每页显示：<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('o')->value['search_page_size']['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['page_option']['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['page_option']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?><a href="?search_page_size=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"  class="page_option"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['page_option']['last']){?> | <?php }?><?php }} ?> 条</div>
<div style="width:100%">

<table width="100%" class="qukuDataGrid" border="1" style="border-collapse:collapse;">
	<tr>
		<th width="6%"><input type="checkbox" name="batchCheckbox">全选</th>
		<th width="10%">单曲名</th>
		<th width="10%">明星</th>
		<th width="10%">专辑</th>
		<th width="6%">音频数</th>
		<th width="10%">屏蔽类型</th>
		<th width="12%">操作</th>
		<th width="6%">创建人</th>
		<th width="10%">创建时间</th>
		<th width="8%">最后修改人</th>
		<th width="10%">最后修改时间</th>
		<th width="6%">ID</th>
	</tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['list_rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
	<tr>
		<td class="txt_center"><input type="checkbox" name="songCheckbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['si_globalid'];?>
"></td>
		<td title="<?php echo addslashes(smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['si_title']));?>
">
			<?php if ($_smarty_tpl->tpl_vars['item']->value['si_delflag']==0){?>
				<a href="?c=song&m=edit&si_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['si_globalid'];?>
&tn=song_edit"  class="showedit"><?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['si_title'],0,50,'...','utf-8'));?>
</a>
			<?php }else{ ?>
			<?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['si_title'],0,50,'...','utf-8'));?>

			<?php }?>
		</td>
    <td class="author">
	<?php $_smarty_tpl->tpl_vars["quku_artist_works_ref"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['quku_artist_works_ref'], null, null);?>
	
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('quku_artist_works_ref')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['i']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['i']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['author_list']['total'] = $_smarty_tpl->tpl_vars['i']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
 $_smarty_tpl->tpl_vars['i']->iteration++;
 $_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['author_list']['last'] = $_smarty_tpl->tpl_vars['i']->last;
?>
	<?php if (!$_smarty_tpl->tpl_vars['i']->value['awr_artist_id']){?>
		<?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['i']->value['awr_artist_name'],0,50,'...','utf-8'));?>

	<?php }else{ ?>
		<?php if ($_GET['search_delflag']==1){?>
			<?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['i']->value['awr_artist_name'],0,50,'...','utf-8'));?>

		<?php }else{ ?>
			<a href="?c=artist&m=edit&ab_globalid=<?php echo $_smarty_tpl->tpl_vars['i']->value['awr_artist_id'];?>
&tn=artist_edit"  class="showedit"> <?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['i']->value['awr_artist_name'],0,50,'...','utf-8'));?>
 </a>
		<?php }?>
	<?php }?>
	<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['author_list']['last']){?>	,<?php }?>
	<?php }} ?>
	</td>
    <td>
	<?php if ($_smarty_tpl->tpl_vars['item']->value['si_album_id']==0){?>
	<?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['si_album'],0,50,'...','utf-8'));?>

	<?php }else{ ?>
		<?php if ($_GET['search_delflag']==1){?>
			<?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['si_album'],0,50,'...','utf-8'));?>

		<?php }else{ ?>
			<a href="?c=album&m=edit&ai_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['si_album_id'];?>
&tn=album_edit"  class="showedit"> <?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['si_album'],0,50,'...','utf-8'));?>
</a>
		<?php }?>
	<?php }?>
	</td>
	<td><?php if ($_smarty_tpl->tpl_vars['item']->value['media_num']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['media_num'];?>
<?php }else{ ?>0<?php }?></td>
	<td><?php if ($_smarty_tpl->tpl_vars['item']->value['si_prohibit_type']){?><?php echo $_smarty_tpl->getVariable('data')->value['form_option']['si_prohibit_type'][$_smarty_tpl->tpl_vars['item']->value['si_prohibit_type']];?>
<?php }?></td>
		<td align="center">
			<?php if ($_GET['search_delflag']==1||(strlen($_smarty_tpl->tpl_vars['item']->value['si_delflag'])>0&&$_smarty_tpl->tpl_vars['item']->value['si_delflag']==1)){?>
				<a class="x-song-recovery" href="?c=song&m=disDelete&search_status=1&si_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['si_globalid'];?>
" target="_blank" > 恢复 </a>
			<?php }else{ ?>
			   	<?php if (strlen($_smarty_tpl->tpl_vars['item']->value['si_status'])>0&&$_smarty_tpl->tpl_vars['item']->value['si_status']==0){?>
				      <?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']!=0){?> <a class="x-song-offline" href="?c=song&m=disPub&search_status=1&si_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['si_globalid'];?>
" >下线</a><?php }?>
				<?php }else{ ?>   
					 <?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']!=0){?><a class="x-song-pub" href="?c=song&m=pub&search_status=0&si_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['si_globalid'];?>
">发布</a> <?php }?>
				    | <a class="x-song-del" href="?c=song&m=delete&search_status=1&si_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['si_globalid'];?>
">删除</a>
			
				<?php }?> 
				<?php if (strlen($_smarty_tpl->tpl_vars['item']->value['si_prohibit_type'])>0&&$_smarty_tpl->tpl_vars['item']->value['si_prohibit_type']==4){?><?php }else{ ?> | <a href="?c=song&m=prohibit&si_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['si_globalid'];?>
" class="x-song-prohibit" status =<?php echo $_smarty_tpl->tpl_vars['item']->value['si_status'];?>
 >屏蔽</a><?php }?>
			<?php }?>
			</td>
     
		<td align="center"><?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['si_joinuser'],0,50,'...','utf-8'));?>
</td>
    <td align="center"><?php if (strlen($_smarty_tpl->tpl_vars['item']->value['si_jointime'])>0&&$_smarty_tpl->tpl_vars['item']->value['si_jointime']!=0){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['si_jointime'],"%Y-%m-%d %H:%M");?>
<?php }?></td>
		<td align="center"><?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['si_edituser'],0,50,'...','utf-8'));?>
</td>
		<td align="center"><?php if (strlen($_smarty_tpl->tpl_vars['item']->value['si_edittime'])>0&&$_smarty_tpl->tpl_vars['item']->value['si_edittime']!=0){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['si_edittime'],"%Y-%m-%d %H:%M");?>
<?php }?></td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['si_globalid'];?>
</td>
	</tr>
<?php }} ?>
</table>


<div style="margin:10px 0 0 0 ">
    <span><input type="checkbox" name="batchCheckbox"> 全选</span>
	<?php if (!($_GET['search_delflag']==1)){?>
		 
		 <?php if ($_GET['search_status']==1){?>
		    <a href="?c=song&m=batchDelete" class="batchDelete">批量删除</a>
		 
			<a href="?c=song&m=batchPub" class="publishAll">批量发布</a>
		 <?php }?>
	<?php }else{ ?>
		<a href="?c=song&m=batchDisDelete" class="batchDisDelete">批量恢复</a>
	 <?php }?>
	 <span class="x-page-count">总记录数：<?php echo $_smarty_tpl->getVariable('data')->value['count'];?>
</span>
</div>


<div style="margin:10px 0">每页显示：<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('o')->value['search_page_size']['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['page_option']['total'] = $_smarty_tpl->tpl_vars['item']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['page_option']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?><a href="?search_page_size=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"  class="page_option"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['page_option']['last']){?> | <?php }?><?php }} ?> 条</div>
<?php echo $_smarty_tpl->getVariable('data')->value['list_page_code'];?>

</div>  
</div>
<include file="common/footer.inc.html">


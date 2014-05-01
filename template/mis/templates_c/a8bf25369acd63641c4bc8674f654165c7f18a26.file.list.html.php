<?php /* Smarty version Smarty3rc4, created on 2012-06-11 14:23:39
         compiled from "/home/yule/samba/pengjuxiang/workspace2/system/../template/mis/templates/artist/list.html" */ ?>
<?php /*%%SmartyHeaderCode:19160144674fd58eeb1524a2-80437079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8bf25369acd63641c4bc8674f654165c7f18a26' => 
    array (
      0 => '/home/yule/samba/pengjuxiang/workspace2/system/../template/mis/templates/artist/list.html',
      1 => 1339395813,
    ),
  ),
  'nocache_hash' => '19160144674fd58eeb1524a2-80437079',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/yule/samba/pengjuxiang/workspace2/mis/libraries/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/yule/samba/pengjuxiang/workspace2/mis/libraries/smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

 <script type="text/javascript" src="static/js/artist/artistList.js" ></script>
 <script type="text/javascript">
     var alist = quku_v.artistList;
 </script>
<?php if ($_GET['search_delflag']==1){?>
	<?php $_smarty_tpl->tpl_vars["delflag"] = new Smarty_variable("ab_delflag", null, null);?>
<?php }else{ ?>
	<?php $_smarty_tpl->tpl_vars["delflag"] = new Smarty_variable('', null, null);?>
<?php }?>
<?php $_smarty_tpl->tpl_vars["o"] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['search_option'], null, null);?>
<!-- 搜索栏显示和提交 -->
<?php $_template = new Smarty_Internal_Template("listSearch/artistSearchBar.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"artist");$_template->assign('option',$_smarty_tpl->getVariable('data')->value['search_option']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div style="display:none"><?php echo var_dump($_smarty_tpl->getVariable('data')->value);?>
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
"   class="page_option"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['page_option']['last']){?> | <?php }?><?php }} ?> 条</div>
<div style="width:100%">

<table width="100%" class="qukuDataGrid">
	<tr>
		<th width="60"><input type="checkbox" name="batchCheckbox">全选</th>
		<th>明星名</th>
		<th>操作</th>
		<th>创建人</th>
    　　<th>创建时间</th>
		<th>最后修改人</th>
		<th>最后修改时间</th>
		<th>ID</th>
	</tr>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['list_rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
	<tr>
		<td class="txt_center"><input type="checkbox" name="artistCheckbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['ab_globalid'];?>
"></td>
		<td>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['ab_delflag']==0){?>
			<a href="?c=artist&m=edit&ab_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['ab_globalid'];?>
&tn=artist_edit"  class="showedit"><?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['ab_name'],0,50,'...','utf-8'));?>
</a>
			<?php }else{ ?>
			<?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['ab_name'],0,50,'...','utf-8'));?>

			<?php }?>
		</td>
		<td>
			<?php if ($_GET['search_delflag']==1){?>
				<a href="?c=artist&m=disDelete&ab_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['ab_globalid'];?>
" target="_blank" class="x-art-recovery"> 恢复 </a>
			<?php }else{ ?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['ab_status']==0){?>
					<a href="?c=artist&m=disPub&ab_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['ab_globalid'];?>
"  class="x-art-offline" > 下线 </a>
				<?php }elseif($_smarty_tpl->tpl_vars['item']->value['ab_status']==1){?>
					<a href="?c=artist&m=pub&ab_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['ab_globalid'];?>
" class="x-art-pub"> 发布 </a>
				    |<a href="?c=artist&m=delete&ab_globalid=<?php echo $_smarty_tpl->tpl_vars['item']->value['ab_globalid'];?>
" class="x-art-del"> 删除 </a>
				<?php }?>
			<?php }?>
		</td>
  
		<td><?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['ab_joinuser'],0,50,'...','utf-8'));?>
</td>
		<td><?php if (strlen($_smarty_tpl->tpl_vars['item']->value['ab_jointime'])>0&&$_smarty_tpl->tpl_vars['item']->value['ab_jointime']!=0){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['ab_jointime'],"%Y-%m-%d %H:%M");?>
<?php }?></td>
    <td><?php echo smarty_modifier_escape(mb_strimwidth($_smarty_tpl->tpl_vars['item']->value['ab_edituser'],0,50,'...','utf-8'));?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['ab_edittime'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['ab_globalid'];?>
</td>
	</tr>
<?php }} ?>
</table>

<div style="margin:10px 0 0 0 ">
    <span><input type="checkbox" name="batchCheckbox"> 全选</span>
	<?php if (!($_GET['search_delflag']==1)){?>
		  <?php if ($_GET['search_status']==1){?>
		    <a href="?c=artist&m=batchDelete" class="batchDelete">批量删除</a>
	 		<a href="?c=artist&m=batchPub" class="publishAll">批量发布</a>
		   <?php }?>
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
" class="page_option"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['page_option']['last']){?> | <?php }?><?php }} ?> 条</div>
<?php echo $_smarty_tpl->getVariable('data')->value['list_page_code'];?>

</div>
<include file="common/footer.inc.html">


<?php /* Smarty version Smarty3rc4, created on 2014-02-28 16:37:33
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/openuser/wait.html" */ ?>
<?php /*%%SmartyHeaderCode:137750282853104acd963a60-92281706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c52951654058747cebfae5dc7c71332f1a6c0dd' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/openuser/wait.html',
      1 => 1382339746,
    ),
  ),
  'nocache_hash' => '137750282853104acd963a60-92281706',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/mp3/yujiao/guodong/mis/mis/libraries/smarty/plugins/modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("openuser/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<?php $_smarty_tpl->tpl_vars['order_ou_complete'] = new Smarty_variable(0, null, null);?>
<?php $_smarty_tpl->tpl_vars['order_ou_jointime'] = new Smarty_variable(0, null, null);?>
<?php $_smarty_tpl->tpl_vars['arrOrder'] = new Smarty_variable(json_decode($_GET['order'],true), null, null);?>
<?php if ($_smarty_tpl->getVariable('arrOrder')->value['ou_complete']){?>
	<?php $_smarty_tpl->tpl_vars['order_ou_complete'] = new Smarty_variable($_smarty_tpl->getVariable('arrOrder')->value['ou_complete'], null, null);?>
<?php }?>
<?php if ($_smarty_tpl->getVariable('arrOrder')->value['ou_jointime']){?>
	<?php $_smarty_tpl->tpl_vars['order_ou_jointime'] = new Smarty_variable($_smarty_tpl->getVariable('arrOrder')->value['ou_jointime'], null, null);?>
<?php }?>
<div class="openuser-page">
	<div class="openuser-search">
		<form method="post" accept-charset="utf-8" id="form_wait">
			<p>
				<label for="ou_user_type">认证类型：</label>
				<select name="ou_user_type" id="ou_user_type">
					<option <?php if ($_GET['ou_user_type']=='1'){?>selected<?php }?> value="1">公司</option>
					<option <?php if ($_GET['ou_user_type']=='2'){?>selected<?php }?> value="2">个人</option>
					<option <?php if ($_GET['ou_user_type']!='0'&&!$_GET['ou_user_type']){?>selected<?php }?> value="">全部</option>
				</select>
			</p>
			<p>
				<label for="ou_jointime">申请时间：</label>
				<select name="ou_jointime" id="ou_jointime">
					<option <?php if ($_GET['ou_jointime']!='0'&&!$_GET['ou_jointime']){?>selected<?php }?> value="">全部</option>
					<option <?php if ($_GET['ou_jointime']=='0'){?>selected<?php }?> value="0">今天</option>
					<option <?php if ($_GET['ou_jointime']=='1'){?>selected<?php }?> value="1">此前7天</option>
				</select>
			</p>			
			<p>
				
				<label for="ou_complete">优先：</label>
				<select name="ou_complete" id="ou_complete">
					<option <?php if ($_smarty_tpl->getVariable('order_ou_complete')->value=='0'){?>selected<?php }?> value="0">无</option>
					<option <?php if ($_smarty_tpl->getVariable('order_ou_complete')->value=='1'){?>selected<?php }?> value="1">资料完整</option>
				</select>
			</p>	
		</form>
	</div>
	<table width="100%" class="qukuDataGrid openuser-table">
		<tr>
			<th>申请ID</th>
		    <th>公司名称</th>
		    <th>法人代表</th>
			<th>联系人</th>
			<th>联系人手机</th>
		    <th>申请时间<b class="sort-time <?php if ($_smarty_tpl->getVariable('order_ou_jointime')->value==1){?>sort-down<?php }else{ ?>sort-up<?php }?>" data-sort="<?php echo $_smarty_tpl->getVariable('order_ou_jointime')->value;?>
" id="sort_jointime"></b></th>
			<th>认证材料</th>
		</tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['list_rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['item']->index++;
?>
		<tr <?php if ($_smarty_tpl->tpl_vars['item']->index%2==0){?>class="item-odd"<?php }?>>
			<td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ou_id']);?>
</td>
			<td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ou_company']);?>
</td>
		    <td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ou_legal_rep']);?>
</td>
		    <td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ou_contact_name']);?>
</td>
			<td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ou_telephone']);?>
</td>
		    <td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ou_jointime']);?>
</td>
		    <td>
		    	<a href="/index.php?c=openuser&m=edit&ou_id=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['ou_id']);?>
&tn=openuser_detail&ou_status=0" target="mainFrame">审核</a>
		    </td>
		</tr>
	<?php }} ?>
	</table>

	<a class="down-list" href="/index.php?c=openuser&m=dumpData&ou_status=0">下载完整列表</a>

	<div class="openuser-page-navigator">
		<?php echo $_smarty_tpl->getVariable('data')->value['list_page_code'];?>

	</div>

	
</div>

<?php $_template = new Smarty_Internal_Template("common/footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<?php /* Smarty version Smarty3rc4, created on 2012-02-22 10:29:13
         compiled from "/home/yule/samba/pengjuxiang/workspace2/system/../template/mis/templates/common/searchBar.html" */ ?>
<?php /*%%SmartyHeaderCode:17576051314f2a75567c0454-55607142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6701b917e44b43ef08564fdff05c89c23f3b57aa' => 
    array (
      0 => '/home/yule/samba/pengjuxiang/workspace2/system/../template/mis/templates/common/searchBar.html',
      1 => 1328257569,
    ),
  ),
  'nocache_hash' => '17576051314f2a75567c0454-55607142',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<link href="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/datePicker.res/datePicker.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/datePicker.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/plugins/date.js"></script>
<div class="qukuSearchBar" style="color:#000;font-weight:normal">
<form id='formSearch' action="/qmis/index.php?" method="get">
<input type="hidden" name="c" value="<?php echo $_smarty_tpl->getVariable('title')->value;?>
"/>
<input type="hidden" name="m" value="search"/>
<input type="hidden" name="tn" value="<?php echo $_smarty_tpl->getVariable('title')->value;?>
_list"/>
<script type="text/javascript">
$( function() {
	var search_status = $('select[name=search_status]'),
		 search_audit_status_holder = $('#search_audit_status_holder'),
		 search_copyrignt_delete_holder = $('#search_copyrignt_delete_holder'),
		 search_prohibit_type = $('#search_prohibit_type'),
		 search_prohibit_type_select = $('#search_prohibit_type_select');

	function switch_optins() {
		if( search_status.val() == '0' ) {
			search_audit_status_holder.show();

			search_copyrignt_delete_holder
				&& search_copyrignt_delete_holder.show()
				&& search_prohibit_type.show();
				
		} else {
			search_audit_status_holder.hide();

			search_copyrignt_delete_holder
				&& search_copyrignt_delete_holder.hide()
				&& search_prohibit_type.hide();
		}
	}

	switch_optins();

	search_status.change( function() {
		switch_optins();
	} );
} );
</script>
<?php if ($_smarty_tpl->getVariable('delflag')->value){?><input type="hidden" name="<?php echo $_smarty_tpl->getVariable('delflag')->value;?>
" value="1"/><?php }?>
搜索类型&nbsp;&nbsp;<select name="search_option" >
				<?php  $_smarty_tpl->tpl_vars['rt'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('searchOption')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rt']->key => $_smarty_tpl->tpl_vars['rt']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['rt']->key;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('current_option')->value['search_option']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['rt']->value;?>
</option>
				<?php }} ?>
				</select>
&nbsp;&nbsp;发布状态&nbsp;&nbsp;<select name="search_status" >
				<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('statusOption')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ac']->key;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('current_option')->value['search_status']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
</option>
				<?php }} ?>
				</select>
				<!--
                <span id="search_prohibit_type" style="display:none;">屏蔽类型：
                <select name="search_prohibit_type">
                <?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('si_search_prohibit_typeOption')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ac']->key;
?>
                  <?php echo $_smarty_tpl->getVariable('current_option')->value['search_prohibit_status'];?>

						<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->getVariable('current_option')->value['search_prohibit_type']!=''&&$_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('current_option')->value['search_prohibit_type']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
</option>
						<?php }} ?>
                </select>
				</span>
				-->
				<span id="search_audit_status_holder" style="display:none">
					&nbsp;&nbsp;审核状态
					<select name="search_audit_status">
						<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('auditstatusOption')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ac']->key;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->getVariable('current_option')->value['search_audit_status']!=''&&$_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('current_option')->value['search_audit_status']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
</option>
						<?php }} ?>
					</select>
				</span>
				<?php if ($_smarty_tpl->getVariable('copyrightdeleteOption')->value){?>
				<span id="search_copyrignt_delete_holder" style="display:none">
					&nbsp;&nbsp;版权删除状态
					<select name="search_copyrignt_delete">
						<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('copyrightdeleteOption')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ac']->key;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->getVariable('current_option')->value['search_copyrignt_delete']!=''&&$_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('current_option')->value['search_copyrignt_delete']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
</option>
						<?php }} ?>
					</select>
				</span>
				<?php }?>

&nbsp;&nbsp;封面/图片&nbsp;&nbsp;<select name="search_pic" >
				<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('picOption')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ac']->key;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('current_option')->value['search_pic']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
</option>
				<?php }} ?>
			</select>
&nbsp;&nbsp;排序字段&nbsp;&nbsp;<select  name="search_order"  >
				<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('orderOption')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ac']->key;
?>
				<option   value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('current_option')->value['search_order']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
</option>
				<?php }} ?>
			</select>
&nbsp;&nbsp;排序&nbsp;&nbsp;<select  name="search_scend"  >
				<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('scendOption')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ac']->key;
?>
				<option   value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('current_option')->value['search_scend']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
</option>
				<?php }} ?>
			</select>
<span style="display:none">
&nbsp;&nbsp;时间字段&nbsp;&nbsp;<select  name="search_timefield"  >
				<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('searchtime')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ac']->key;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('current_option')->value['search_timefield']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
</option>
				<?php }} ?>
			</select>
</span>
&nbsp;&nbsp;开始时间&nbsp;&nbsp;<input name="search_starttime" id="search_starttime" value="<?php echo $_smarty_tpl->getVariable('current_option')->value['search_starttime'];?>
" style="width:80px;float:none"/>
&nbsp;&nbsp;结束时间&nbsp;&nbsp;<input name="search_endtime" id="search_endtime" value="<?php echo $_smarty_tpl->getVariable('current_option')->value['search_endtime'];?>
" style="width:80px;float:none"/>
&nbsp;&nbsp;关键字&nbsp;&nbsp;<input style="width:80px;" name="search_content" id="search_content" value="<?php echo $_smarty_tpl->getVariable('current_option')->value['search_content'];?>
" />
<button type="submit" class="button01">搜索</button>&nbsp;&nbsp;
<select name="search_match">
	<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ab_matchOption')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ac']->key;
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('current_option')->value['search_match']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
</option>
	<?php }} ?>
</select>
</form>
</div>
<script>
$(document).ready( function () {
	$('#search_starttime').datePicker({startDate:'1900-01-01',createButton:false,clickInput:true});
	$('#search_endtime').datePicker({startDate:'1900-01-01',createButton:false,clickInput:true});
})
</script>

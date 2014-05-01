<?php /* Smarty version Smarty3rc4, created on 2014-02-28 16:37:36
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/openuser/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:162772796553104ad0041d45-66870732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '578ce6200fdabce6daa45be7c52596a94b86650e' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/openuser/detail.html',
      1 => 1385015902,
    ),
  ),
  'nocache_hash' => '162772796553104ad0041d45-66870732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/mp3/yujiao/guodong/mis/mis/libraries/smarty/plugins/modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("openuser/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script src="<?php echo @STATIC_DIR;?>
/js/openuser/openuser.detail.js" type="text/javascript"></script>

<?php $_smarty_tpl->tpl_vars['ou_status'] = new Smarty_variable($_GET['ou_status'], null, null);?>
<?php if ($_smarty_tpl->getVariable('ou_status')->value==0){?>
	<?php $_smarty_tpl->tpl_vars['source_title'] = new Smarty_variable('待认证列表', null, null);?>
<?php }elseif($_smarty_tpl->getVariable('ou_status')->value==1){?>
	<?php $_smarty_tpl->tpl_vars['source_title'] = new Smarty_variable('认证通过列表', null, null);?>
<?php }elseif($_smarty_tpl->getVariable('ou_status')->value==3){?>
	<?php $_smarty_tpl->tpl_vars['source_title'] = new Smarty_variable('封禁账号列表', null, null);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars['materialTitle'] = new Smarty_variable(array("oum_business_license"=>"营业执照","oum_organization_certificate"=>"组织机构代码证","oum_undertaking_certificate"=>"承诺书","oum_tax_certificate"=>"税务登记证","oum_corporate_identity"=>"法人身份证","oum_copyright_proof"=>"版权证明"), null, null);?>

<?php $_smarty_tpl->tpl_vars['openuser'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['quku_open_user'], null, null);?>
<?php $_smarty_tpl->tpl_vars['material'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['quku_open_user_material'], null, null);?>
<div class="openuser-page">
	<p class="detail-path"><b class="fr"><?php echo $_smarty_tpl->getVariable('source_title')->value;?>
</b> <b class="path">></b>  认证详情</p>

	<div class="base-info detail-module">
		<h4><i> * </i>基本信息</h4>
		<p>
			<label>联系人姓名：</label>
			<span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_contact_name']);?>
</span>
		</p>
		<p>
			<label>法人姓名：</label>
			<span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_legal_rep']);?>
</span>
		</p>
		<p>
			<label>公司名称：</label>
			<span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_company']);?>
</span>
		</p>	
		<p>
			<label>联系人手机：</label>
			<span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_cellphone']);?>
</span>
		</p>
		<p>
			<label>邮箱地址：</label>
			<span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_email']);?>
</span>
		</p>
		<p>
			<label>申请日期：</label>
			<span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_jointime']);?>
</span>
		</p>		
		<?php if ($_smarty_tpl->getVariable('ou_status')->value==1){?>
			<p>	
				<label>认证通过日期：</label>
				<span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_approve_time']);?>
</span>
			</p>
		<?php }elseif($_smarty_tpl->getVariable('ou_status')->value==3){?>
			<p class="p-forbid-time">
				<label>封禁日期：</label>
				<span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_forbid_time']);?>
</span>
			</p>
		<?php }?>
	</div>
	<div class="detail-module required-material clearfix">
		<h4><i> * </i>必选附件</h4>
		<ul id="img_required_thumbs" class="ul_img_thumbs">
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('material')->value['required']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->index++;
?>
				<li>
					<?php if (strpos($_smarty_tpl->tpl_vars['item']->value,"rar")!==false){?>
						<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value);?>
" style="line-height:100px;">压缩包下载</a>
					<?php }else{ ?>
						<?php if ($_smarty_tpl->tpl_vars['item']->value!=''){?><img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value);?>
" /><span><?php echo $_smarty_tpl->getVariable('materialTitle')->value[$_smarty_tpl->tpl_vars['key']->value];?>
</span><?php }?>
					<?php }?>
				</li>
			<?php }} ?>
		</ul>
	</div>
	<div class="detail-module optional-material clearfix">
		<h4>选填附件</h4>        
		<ul id="img_optional_thumbs" class="ul_img_thumbs">
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('material')->value['optional']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->index++;
?>
				<li>
					<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value);?>
" />
					<span><?php echo $_smarty_tpl->getVariable('materialTitle')->value[$_smarty_tpl->tpl_vars['key']->value];?>
</span>
				</li>
			<?php }} ?>
		</ul>
	</div>

	<div class="img-container" data-show="">
		<div class="img-info">
			<ul id="img_required"  class="ul_img_info" data-cur-index="">
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('material')->value['required']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->index++;
?>
					<?php if (strpos($_smarty_tpl->tpl_vars['item']->value,"rar")==false){?>
					<li>
						<div>						
							<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value);?>
" />
							<p><?php echo $_smarty_tpl->getVariable('materialTitle')->value[$_smarty_tpl->tpl_vars['key']->value];?>
<span>(第<?php echo $_smarty_tpl->tpl_vars['item']->index+1;?>
张/共<?php echo count($_smarty_tpl->getVariable('material')->value['required']);?>
张)</span></p>	
						</div>
					</li>
					<?php }?>
				<?php }} ?>
			</ul>
			<ul id="img_optional" class="ul_img_info" data-cur-index="">
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('material')->value['optional']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->index++;
?>
					<li>
						<div>
							<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value);?>
" />
							<p><?php echo $_smarty_tpl->getVariable('materialTitle')->value[$_smarty_tpl->tpl_vars['key']->value];?>
<span>(第<?php echo $_smarty_tpl->tpl_vars['item']->index+1;?>
张/共<?php echo count($_smarty_tpl->getVariable('material')->value['optional']);?>
张)</span></p>

						</div>
					</li>
				<?php }} ?>
			</ul>
		</div>
		<a href="#" class="btn-prev">《 </a>
		<a href="#" class="btn-next"> 》</a>
	</div>

	<?php if ($_smarty_tpl->getVariable('ou_status')->value==0){?>
	<div class="btn-opperate detail-module">
		<a href="#" data-id="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_id']);?>
" id="btn_pass">确认通过</a>

		<a href="#" data-id="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_id']);?>
" id="btn_refuse"><span class="inner">驳回申请</span></a>

	</div>

	<div id="dialog_pass" style="display:none;">
		<p>
			您确认<b><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_company']);?>
</b>通过审核？ 
		</p>
		<span>确认后系统会自动发送邮件通知给用户</span>
	</div>
	
	<div id="dialog_refuse" style="display:none;">
		<p>
			您驳回<b><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('openuser')->value['ou_company']);?>
</b>的审核，理由是：
		</p>
		<p>
			<input type="radio" checked name="ou_fail_reason" id="fail_reason_0" value="1">
			<textarea name="reason" class="fail_reason_text1"></textarea>
		</p>
		<p>
			<input type="radio" name="ou_fail_reason" id="fail_reason_1" value="2">
			<label for="fail_reason_1" class="fail_reason_text2">很抱歉，我们无法认证您的资质，无法开放合作权限，请勿重复申请，谢谢配合。</label>
		</p>
		<span>确认后系统会自动发送邮件（包含您所选择的理由）通知给用户</span>
	</div>

	<?php }?>

	<?php $_template = new Smarty_Internal_Template("common/footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<div class="mask-bg"></div>
</div>


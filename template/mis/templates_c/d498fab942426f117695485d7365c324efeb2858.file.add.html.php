<?php /* Smarty version Smarty3rc4, created on 2014-03-14 19:33:40
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/option/add.html" */ ?>
<?php /*%%SmartyHeaderCode:2858149695322e91466bcf5-23707141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd498fab942426f117695485d7365c324efeb2858' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/option/add.html',
      1 => 1382339745,
    ),
    '58b45448334ee7c8ec61d623d425af7390a9313d' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/option/abstract.form.inc.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '2858149695322e91466bcf5-23707141',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"字典管理 &gt; 创建字典"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>



<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("创建单词", null, null);?>
<?php $_smarty_tpl->tpl_vars['formAction'] = new Smarty_variable("doCreate", null, null);?>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/option/option.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/option/optionForm.js"></script>

<script type="text/javascript">

//模版变量转换为js变量，统一管理模版变量， 并便于其他js中引用
		<?php $_template = new Smarty_Internal_Template("option/convertData.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
$(document).ready( function () {
    var T = quku_v.optionForm;
	T.displayPanel(quku_v.option.data);
    
	
});
</script>
<body>
<div style="display:none;"><?php echo var_dump($_smarty_tpl->getVariable('data')->value);?>
</div>
<input type="hidden" id ="od_id" name="od_id " value="<?php echo $_smarty_tpl->getVariable('data')->value['quku_options_dic']['od_id'];?>
" />
<input type="hidden" id ="action" value="<?php echo $_smarty_tpl->getVariable('formAction')->value;?>
" />
<!-- for dialog creater -->
<input type="hidden" id ="odId" value="" />
<div id="contentBase"> 
	<fieldset>
		<legend><label class="fieldName">基本信息</label></legend>
	 <!-- 单词 -->
	<div id="od_word" class="x-layout-item"></div>
	
		<!-- 拼音码 -->
	<div id="od_spell_code" class="x-layout-item"></div>
	
		<!-- 配置类型 -->
	<div id="od_category" class="x-layout-item"></div>
	
		<!-- 信息类型 -->
	<div id="od_type" class="x-layout-item"></div>
	
		<!-- 备注字段 -->
	<div id="od_remark" class="x-layout-item"></div>
	
	</fieldset>
</div>
<div class="space10"></div>
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>&nbsp;</td>
		<td  colspan="3" style="algin:center;">
		        &nbsp;&nbsp;<input class="button01" id = "save" name="button" type="button" value="保存" onclick="Option.save();">
		</td>
	</tr>
</table>
<?php /* Smarty version Smarty3rc4, created on 2012-02-07 20:06:42
         compiled from "/home/yule/samba/pengjuxiang/workspace2/system/../template/mis/templates/artist/searchBar.html" */ ?>
<?php /*%%SmartyHeaderCode:452340294f3113d21fd7c4-25319500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35cc5c6342b8681fa67123b825cb86276b81327a' => 
    array (
      0 => '/home/yule/samba/pengjuxiang/workspace2/system/../template/mis/templates/artist/searchBar.html',
      1 => 1328616161,
    ),
  ),
  'nocache_hash' => '452340294f3113d21fd7c4-25319500',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style type="text/css">
    .x-layout-search-item{
	    width: 200px;
		height: 20px;
		display: inline-block;
	}
	.x-component-items .x-component-input{
	   width: 100px;
	}
	.qukuSearchBar .x-component-label{
	   width: 80px;
	   margin-right: 0px;
	}
</style>

<div class="qukuSearchBar" style="color:#000;font-weight:normal">
<form id='formSearch' action="/index.php?" method="get">
<input type="hidden" name="c" value="<?php echo $_smarty_tpl->getVariable('title')->value;?>
"/>
<input type="hidden" name="m" value="search"/>
<input type="hidden" name="tn" value="<?php echo $_smarty_tpl->getVariable('title')->value;?>
_list"/>
<script type="text/javascript">
var quku_v = window.quku_v || {};
quku_v.searchOption={} ;


//模版option数据提取
$.extend(quku_v.searchOption,{
     option: {
	    search_field: <?php if ($_smarty_tpl->getVariable('option')->value['search_field']['option']){?>[ 
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('option')->value['search_field']['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
									{'display':"<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
",'value':"<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"},
								<?php }} ?> 
						    ]  <?php }else{ ?> [] <?php }?> ,
		search_status: <?php if ($_smarty_tpl->getVariable('option')->value['search_status']['option']){?>[ 
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('option')->value['search_status']['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
									{'display':"<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
",'value':"<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"},
								<?php }} ?> 
						    ]  <?php }else{ ?> [] <?php }?> ,
		search_audit_status:  <?php if ($_smarty_tpl->getVariable('option')->value['search_audit_status']['option']){?>[ 
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('option')->value['search_audit_status']['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
									{'display':"<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
",'value':"<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"},
								<?php }} ?> 
						    ]  <?php }else{ ?> [] <?php }?> ,
		search_order: <?php if ($_smarty_tpl->getVariable('option')->value['search_order']['option']){?>[ 
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('option')->value['search_order']['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
									{'display':"<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
",'value':"<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"},
								<?php }} ?> 
						    ]  <?php }else{ ?> [] <?php }?> ,
		search_scend:  <?php if ($_smarty_tpl->getVariable('option')->value['search_scend']['option']){?>[ 
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('option')->value['search_scend']['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
									{'display':"<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
",'value':"<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"},
								<?php }} ?> 
						    ]  <?php }else{ ?> [] <?php }?> ,
		search_match: <?php if ($_smarty_tpl->getVariable('option')->value['search_match']['option']){?>[ 
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('option')->value['search_match']['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
									{'display':"<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
",'value':"<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"},
								<?php }} ?> 
						    ]  <?php }else{ ?> [] <?php }?>  ,
		search_count:<?php if ($_smarty_tpl->getVariable('option')->value['search_count']['option']){?>[ 
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('option')->value['search_count']['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
									{'display':"<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
",'value':"<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"},
								<?php }} ?> 
						    ]  <?php }else{ ?> [] <?php }?>  ,
		search_delflag:<?php if ($_smarty_tpl->getVariable('option')->value['search_delflag']['option']){?>[ 
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('option')->value['search_delflag']['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
									{'display':"<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
",'value':"<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"},
								<?php }} ?> 
						    ]  <?php }else{ ?> [] <?php }?>  
							
	    }
});
 

$(document).ready(function(){
    var Toption =quku_v.searchOption.option ;
    $('#search_field').selectfield({
		 labelText: '搜索类型',
		 store: Toption.search_field,
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_field'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_field'];?>
'<?php }else{ ?>''<?php }?> ? 
		                  '<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_field'];?>
' : 'ab_edittime'
	});
	 $('#search_status').selectfield({
		 labelText: '发布状态',
		 store: Toption.search_status,
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_status'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_status'];?>
'<?php }else{ ?>''<?php }?> ? 
		                  '<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_status'];?>
' : 2
	});
	 $('#search_audit_status').selectfield({
		 labelText: '审核状态',
		 store: Toption.search_audit_status,
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_audit_status'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_audit_status'];?>
'<?php }else{ ?>''<?php }?> ? 
		                  '<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_audit_status'];?>
' : 2
	});
	 $('#search_order').selectfield({
		 labelText: '排序字段',
		 store: Toption.search_order,
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_order'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_order'];?>
'<?php }else{ ?>''<?php }?> ? 
		                  '<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_order'];?>
' : 'ab_edittime'
	});
	 $('#search_scend').selectfield({
		 labelText: '排序',
		 store: Toption.search_scend,
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_scend'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_scend'];?>
'<?php }else{ ?>''<?php }?> ? 
		                  '<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_scend'];?>
' : 1
	});
	
	 $('#search_starttime').textfield({
		 labelText: '开始时间',
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_starttime'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_starttime'];?>
'<?php }else{ ?>''<?php }?>
	});
	 $('#search_endtime').textfield({
		 labelText: '结束时间',
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_endtime'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_endtime'];?>
'<?php }else{ ?>''<?php }?>
	});
	
	 $('#search_content').textfield({
		 labelText: '关键字',
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_content'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_content'];?>
'<?php }else{ ?>''<?php }?> ? 
		                  '<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_content'];?>
' : ''
	});
	
	 $('#search_match').selectfield({
		 labelText: '匹配类型',
		 store: Toption.search_match,
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_match'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_match'];?>
'<?php }else{ ?>''<?php }?>
	});
	
	$('#search_count').selectfield({
		 labelText: '统计总数',
		 store: Toption.search_count,
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_count'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_count'];?>
'<?php }else{ ?>''<?php }?> 
	});
	$('#search_delflag').selectfield({
		 labelText: '删除状态',
		 store: Toption.search_delflag,
		 value: <?php if (strlen($_smarty_tpl->getVariable('data')->value['current_option']['search_delflag'])>0){?>'<?php echo $_smarty_tpl->getVariable('data')->value['current_option']['search_delflag'];?>
'<?php }else{ ?>''<?php }?> 
	});
	
}); 


</script>
<!-- 搜索类型 -->
	<div id="search_field" class="x-layout-search-item"> </div>
	<!-- 关键字 -->
	<div id="search_content" class="x-layout-search-item"></div>
	
	<!-- 发布状态 -->
	<div id="search_status" class="x-layout-search-item"> </div>
	<!-- 排序字段 -->
	<div id="search_order" class="x-layout-search-item"> </div>
	<!-- 排序 -->
	<div id="search_scend" class="x-layout-search-item"> </div>
	
	<!-- 开始时间 -->
	<div id="search_starttime" class="x-layout-search-item"></div>
	<!-- 结束时间 -->
	<div id="search_endtime" class="x-layout-search-item"></div>
	
	<!-- 审核状态 -->
	<div id="search_audit_status" class="x-layout-search-item"> </div>

	<!-- 统计总数 -->
	<div id="search_count" class="x-layout-search-item"></div>
	<!-- 删除状态 -->
	<div id="search_delflag" class="x-layout-search-item"></div>
	
	
	
	<!-- 匹配类型 -->
	<div id="search_match" class="x-layout-search-item"></div>
	
	<button type="submit" class="button01">搜索</button>
	
</form>
</div>
<script>
$(document).ready( function () {
	$('#search_starttime_items input').datepicker({ changeMonth: true, changeYear: true , dateFormat:'yy-mm-dd'});
    $('#search_endtime_items input').datepicker({ changeMonth: true, changeYear: true , dateFormat:'yy-mm-dd'});
})
</script>

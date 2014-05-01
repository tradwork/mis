<?php /* Smarty version Smarty3rc4, created on 2014-03-10 10:14:21
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/statistic/form.html" */ ?>
<?php /*%%SmartyHeaderCode:161833326531d1ffd18d2a4-52759763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bda72d64b2a2fa7cdb853432bcdcb96d67ce8e5d' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/statistic/form.html',
      1 => 1387250508,
    ),
  ),
  'nocache_hash' => '161833326531d1ffd18d2a4-52759763',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>



<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/statistic/statisticForm.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/statistic/statistic.js"></script>

<script type="text/javascript">



		//模版变量转换为js变量，统一管理模版变量， 并便于其他js中引用
		<?php $_template = new Smarty_Internal_Template("statistic/convertData.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		
		$(document).ready(function(){
				var T = quku_v.statisticForm, data = quku_v.statistic.data;
				quku_v.statisticForm.displayPanel(data);
			});

	</script>
	
<style>
	.fl{float:left;}
	.tb_form { border:none; margin-bottom: 10px;}

	
	.x-eidtgrid-selectfield {
	   width: 100px;
	}
	.x-editgrid-symbol{
	   width: 80px !important;
	}
	.x-editgrid-symbol .x-component-items .x-component-input {
	    width: 80px !important;
	}
	.tb_form .x-component-items .x-component-input {
	     width: 100px;
	}
	.hide{
	   display:none;
	}
	.show{
	   display:block;
	}
	.btn{display:block;}
	.btn input{ float:left;margin-left:20px;  }
</style>
<body>


<div id="contentBase">

	
	<fieldset>
		<legend><label>必填信息</label></legend>
		<!-- 任务类型 -->
		<div id="tasktype" class="x-layout-item" style="width:100%"></div>
		<!-- 统计结果接收邮箱 -->
		<div id="maillist_v" class="x-layout-item"></div>
			
		<div class="updateData">
			<form name="statisticForm" id="statisticForm" target="self" method="post" enctype="multipart/form-data" onsubmit="Statistic.submit(this);">
					<div id="needpv_v" class="x-layout-item"></div>
					<!-- 歌手、专辑、歌曲 -->
					<div id="main_tables" class="x-layout-item"></div>
					<!-- 关系副表 -->
					<div id="relation_table" class="x-layout-block"></div>
					 <!-- 统计字段 -->
					<div id="fields_v" class="x-layout-block"></div>	    
					 <!-- 统计条件 -->
					<div id="conditions_v_1" class="x-layout-block tb_form conditions show"></div>	  
					<!--<div id="conditions_v_2" class="x-layout-block tb_form conditions hide" ></div>	
					<div id="conditions_v_3" class="x-layout-block tb_form conditions  hide" ></div>	
					<div id="conditions_v_4" class="x-layout-block tb_form conditions hide" ></div>	
					<div id="conditions_v_5" class="x-layout-block tb_form conditions hide"></div>
					<div id="conditions_v_6" class="x-layout-block tb_form conditions hide" ></div>	
					<div id="conditions_v_7" class="x-layout-block tb_form conditions hide" ></div>	
					<div id="conditions_v_8" class="x-layout-block tb_form conditions hide" ></div>	
					<div id="conditions_v_9" class="x-layout-block tb_form conditions hide" ></div>	
					<div id="conditions_v_10" class="x-layout-block tb_form conditions hide" ></div>	 -->
					
					<div class="btn clearfix"> 
						<!-- <input type="button" value="添加条件" class="add-condition" size=7/>
						<input class="del-condition" type="button" value="删除条件" size=7/>  -->
					</div>
					<!-- end spider -->
					<div class="space10"></div>
					<div id="operation">
						<input type="submit"  class="button01" onclick="Statistic.submit('db')"></input>
						<input name="user" value="" type="text" style="display:none;"/>
						<input name="tasktype" value="" type="text" style="display:none;"/>
						<input name="maillist" value="" type="text" style="display:none;"/>
						<input name="needpv" value="" type="text" style="display:none;"/>
						<input name="conditions" value="" type="text" style="display:none;"/>
						<input name="main_table" value="" type="text" style="display:none;"/>
						<input name="fields" value="" type="text" style="display:none;"/>
						<input name="relations" value="" type="text" style="display:none;"/>
						<input type="hidden" name="source" value="mis">
					</div>
			</form>
	</div>
	<div class="prohibitContent hide">
	    <form name="prohibitForm" method="post" target="self" enctype="multipart/form-data"  id="prohibitForm">
			<div id="updateProhibitDataId1" class="x-layout-block">
			  <div class="x-component-label "><span class="red label-blank">*</span>
			    <span class="label-text">相似度: </span><a class="more-link" href="#"></a></div>
			    <div id="updateProhibitDataId_items" class="x-component-items"><input type="text" value="" id="updateProhibitDataId_userfile_1"></div>
			</div>	
			<div id="updateProhibitDataId" class="x-layout-block">
			  <div class="x-component-label "><span class="red label-blank">*</span>
			    <span class="label-text">上传数据id文件: </span><a class="more-link" href="#"></a></div>
			    <div id="updateProhibitDataId_items" class="x-component-items"><input type="file" value="" id="updateProhibitDataId_userfile_0" name="id"></div>
			</div>	
			<div class="space10"></div>
			<div id="operation">
			  <!-- <input type="hidden" name="rollbackid"> -->
			  
			  <input type="hidden" name="maillist">
			  <input type="hidden" name="sim">
			  <input type="hidden" name="tasktype" value=""  style="display:none;"/>
			  <input type="hidden" name="user">
			  <input type="hidden" name="source" value="mis">
			  <input type="submit"  class="button01" onclick="Statistic.submit('title');" style="float:left" />
			</div>
	  </form>
	</div>

    <div class="autoContent hide">
        <form name="autoForm" id="autoForm" method="post" target="self" enctype="multipart/form-data">
			<div id="autoDataId" class="x-layout-block">
			  <div class="x-component-label "><span class="red label-blank">*</span>
			    <span class="label-text">上传数据id文件: </span><a class="more-link" href="#"></a></div>
			  <div id="autoDataId_items" class="x-component-items"><input type="file" value="" id="autoDataId_userfile_0" name="id"></div>
			</div>
			<div class="space10"></div>
			<div id="operation">
			  <!-- <input type="hidden" name="rollbackid"> -->
			  <input type="hidden" name="maillist" />
			  <input type="hidden" name="tasktype" />
			  <input type="hidden" name="user" />
			  <input type="hidden" name="source" value="mis" />
			  <input type="submit" class="button01" onclick="Statistic.submit('fpid');" style="float:left"></input>
			</div>
        </form>
    </div>
</fieldset>
<iframe name="self"  style="display:none;"></iframe>
<?php $_template = new Smarty_Internal_Template("common/footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
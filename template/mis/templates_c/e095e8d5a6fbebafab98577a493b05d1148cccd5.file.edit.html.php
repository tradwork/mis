<?php /* Smarty version Smarty3rc4, created on 2014-03-16 16:34:49
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/show/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:76945907253256229397b64-04837212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e095e8d5a6fbebafab98577a493b05d1148cccd5' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/show/edit.html',
      1 => 1382339745,
    ),
    '570cb3620424833662ea9ed20832116f32fd096a' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/show/abstract.form.inc.html',
      1 => 1382339745,
    ),
  ),
  'nocache_hash' => '76945907253256229397b64-04837212',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>



<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("编辑演出", null, null);?>




<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/show/show.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/show/showForm.js"></script>
<style type="text/css">
    .language{width:100px;height:95px;}
	.fl{float:left;}
	.tb_form { border:none; }
	 #tablePicHidden{
       display:inline-block;
   }
   #tableSongPic_div {
       margin-left: -12px;
   }
</style>
</style>
<script type="text/javascript">

		//模版变量转换为js变量，统一管理模版变量， 并便于其他js中引用
		<?php $_template = new Smarty_Internal_Template("show/convertData.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

jsonPic = <?php if ($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_globalid']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_pic_info'];?>
<?php }else{ ?>[]<?php }?>;
$(document).ready(function(){
   
		  window.origid_g=[];
		  window.origid_g['sn_author'] = $('#sn_author').textfield('getValue');
	  
			var T = quku_v.showForm, data = quku_v.show.data;
			T.displayPanel(data);  
           
	quku_v.showForm.formArray.setValue(quku_v.show.data);
		   
  
  });
</script>
<body>
<?php if ($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_globalid']){?>
	<input type="hidden" id = "sn_globalid" name="sn_globalid" value="<?php echo $_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_globalid'];?>
" />
	<input type="hidden" id ="action" value="doEdit" />
<?php }else{ ?>
	<input type="hidden" id ="action" value="doCreate" />
<?php }?>
<input type="hidden" id ="channel" value="4" />
<div style="display:none"><?php echo var_dump($_smarty_tpl->getVariable('data')->value);?>
</div>
<div id="contentBase"> 
	<fieldset>
		<legend><label>必填信息</label></legend>
	
	<!-- 主题 -->
	<div id="sn_title" class="x-layout-block"></div>
	<!-- 城市 -->
	<div id="sn_city" class="x-layout-item"></div>
	<!-- 明星 -->
	<div id="quku_artist_works_ref" class="x-layout-item"></div>
	<!-- 场馆 -->
	<div id="sn_venue" class="x-layout-item"></div>
	<!-- 类别 -->
	<div id="sn_category" class="x-layout-item"></div>
	<!--  锁定人  -->
	<?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']==3){?>
	<div id="si_editusernow" class="x-layout-item" style="display:none;"></div>
	<?php }?>
	
	<!-- 演出时间 -->
	<div id="sn_detailtime" class="x-layout-block tb_form" ></div>
	
	<!-- 演出海报 -->	
	<div id="tableSongPic_div" class="x-layout-block tb_form">
		 <span id="tableSongPic_label"></span>			
		<table id="tablePic">
			<tr>
				<td class="fieldName" style="text-align:left;width:80px!important;">预览</td>
				<td class="fieldName" style="text-align:left;width:80px!important;">操作</td>
				<td class="fieldName" style="text-align:left;width:45px!important;">宽度</td>
				<td class="fieldName" style="text-align:left;width:45px!important;">高度</td>
				<td class="fieldName" style="text-align:left;">上传文件</td>
				<td class="fieldName" style="text-align:left;">描述信息<span style="color:pink">[为图片检索提供素材]</span></td>
			</tr>
			<div id=tablePicHidden></div>
		</table>
	</div>
	
	<!-- 演出介绍 -->
	<div id="sn_info" class="x-layout-block"></div>
	
	
	
		
	</fieldset>
</div>

 <div id="contentDetail">
	<fieldset>
		<legend><label>详细信息</label></legend>
		
	<!-- 票价 -->
	<div id="sn_price" class="x-layout-item"></div>
	
	<!-- 相关链接 -->
	<div id="quku_relatively_links" class="x-layout-block tb_form">
	   
	</div>
	
	</fieldset>
</div>
<div class="space10"></div>

<div id="operation">
	
	<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_status'])>0&&$_smarty_tpl->getVariable('data')->value['quku_shows_news']['sn_status']==0){?>
		<?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']!=0){?>&nbsp;&nbsp;<input class="button01" name="button" type="button" value="保存" onclick="Show.saveAndPub();"><?php }?>
		<?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']!=0){?>&nbsp;&nbsp;<input class="button01" name="button" type="button" value="下线" onclick="Show.offline();"><?php }?>
	<?php }else{ ?>
		&nbsp;&nbsp;<input class="button01" name="button" type="button" value="保存" onclick="Show.save();">
		<?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']!=0){?>&nbsp;&nbsp;<input class="button01" name="button" type="button" value="保存并发布" onclick="Show.saveAndPub();"><?php }?>
	<?php }?>
</div>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/duplicateName.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/jquery/ui/jquery.ui.slider.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/picUpload.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/picRowController.js"></script>

<?php /* Smarty version Smarty3rc4, created on 2014-03-14 18:58:37
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/album/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:9657804315322e0ddb05d76-78262337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e3ab0a14869cf627dc1c4299bbfb073d3903e97' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/album/edit.html',
      1 => 1394785553,
    ),
    'fab836c5037cf7056f92b2cbbb029f65b0aeabe5' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/album/abstract.form.inc.html',
      1 => 1393405783,
    ),
  ),
  'nocache_hash' => '9657804315322e0ddb05d76-78262337',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/mp3/yujiao/guodong/mis/mis/libraries/smarty/plugins/modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>




<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("编辑专辑", null, null);?>
<?php $_smarty_tpl->tpl_vars['formAction'] = new Smarty_variable("doEdit", null, null);?>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/album/album.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/album/albumForm.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/song/song.js"></script>

<script type="text/javascript">

/*
		<?php echo var_dump($_smarty_tpl->getVariable('data')->value['quku_pic_info']);?>

		*/
var jsonPic = <?php if ($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_globalid']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_pic_info'];?>
<?php }else{ ?>[]<?php }?>;


var jsonSong = <?php if ($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_globalid']){?><?php echo $_smarty_tpl->getVariable('data')->value['quku_songs_list'];?>
<?php }else{ ?>[]<?php }?>;

		//模版变量转换为js变量，统一管理模版变量， 并便于其他js中引用
		<?php $_template = new Smarty_Internal_Template("album/convertData.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		
$(document).ready(function(){
	var T = quku_v.albumForm, data = quku_v.album.data;
	quku_v.albumForm.displayPanel(data);
  
 
  window.origid_g=[];
  window.origid_g['quku_artist_works_ref'] = $('#quku_artist_works_ref').val(); 
  
	quku_v.albumForm.formArray.setValue(quku_v.album.data);

 
});
/*
  $(".spiderOpen").click(function(){
	  var target = $(this).parent().next(".spiderList");
	  if($(this).text() == "\u5C55\u5F00"){
		  $(this).text("最小化");
		  target.show();
	  }else{
		  $(this).text("展开");
		  target.hide();
	  } 
	});
   
});
function changeSongShowStatus() {
	$('#tableSong').toggle('slow');
};
*/

	</script>
	
<style>
	.spiderHead{background:blue;line-height:24px;color:#fff;padding:0 10px;overflow:hidden;margin-top:2px}
	.spiderOpen{float:right;font-weight:bold;cursor:pointer}
	.spiderList{display:none}
	.spiderTit{color: #3F84C7;font-weight: bold;}
	.alignCenterTr td{text-align:left}
	
	
	 #tablePicHidden{
       display:inline-block;
    }
	.language{width:100px;height:95px;}
	.fl{float:left;}
	.tb_form { border:none; }
	#contentSongs input[type="checkbox"] {
		margin-top: 5px;
	}
</style>
<body>
<?php if ($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_globalid']){?>
	<input type="hidden" id = "ai_globalid" name="ai_globalid" value="<?php echo $_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_globalid'];?>
" />
	<?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']==1){?>
	<input type="hidden" id ="action" value="saveInCache" />
	<?php }else{ ?>
	<input type="hidden" id ="action" value="doEdit" />
	<?php }?>
<?php }else{ ?>
	<input type="hidden" id ="action" value="doCreate" />
<?php }?>

<input type="hidden" id="languageValues" value="" />
<input type="hidden" id ="channel" value="2" />
<div id="contentBase"> 
	<fieldset>
		<legend><label>必填信息</label></legend>
        <!-- 专辑名 -->
		<div id="ai_album" class="x-layout-item"></div>	    
		
		 <!-- 专辑ID -->
		<div id="ai_album_id" class="x-layout-item"></div>	    
		
		 <!-- 发行时间 -->
		<div id="ai_publishtime" class="x-layout-item"></div>	 
		
		 <!-- 歌手 -->
		<div id="quku_artist_works_ref" class="x-layout-item"></div>	 
		
		 <!-- 发行公司 -->
		<div id="ai_publishcompany" class="x-layout-item"></div>	 
		
		 <!-- 厂牌公司 -->
		<div id="ai_sub_publishcompany" class="x-layout-item"></div>	 
		
		 <!-- 来源 -->
		<div id="ai_source" class="x-layout-item"></div>	 
		
		 <!-- 版本 -->
		<div id="ai_version" class="x-layout-item"></div>	 
		
		 <!-- 发行地区 -->
		<div id="ai_area" class="x-layout-item"></div>	 

		 <!-- 短简介-->
		<div id="ai_brief_info" class="x-layout-item"></div>	 
		
		<!--  锁定人  -->
		<?php if ($_smarty_tpl->getVariable('user')->value['ub_groupid']==3){?>
		<div id="ai_editusernow" class="x-layout-item"></div>
		<?php }?>
		
		 <!-- 专辑海报 -->
		<div id="quku_pic" class="x-layout-block tb_form">		  
              <span id="quku_pic_label"></span>			  
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
		
		
	</fieldset>
</div>
 <div id="contentDetail">
	<fieldset>
		<legend><label>详细信息</label></legend>
	     <!-- 风格 -->
		<div id="ai_styles" class="x-layout-item"></div>	 
		
		 <!-- 语言 -->
		<div id="ai_language" class="x-layout-item"></div>	 
		
		 <!-- 专辑别名 -->
		<div id="ai_aliasalbum" class="x-layout-item"></div>	 
		
		 <!-- 专辑译名 -->
		<div id="ai_translatename" class="x-layout-item"></div>	 
		
		 <!-- 同义词 -->
		<div id="ai_synonym" class="x-layout-item"></div>	 
		
		 <!-- 专辑单曲总数 -->
		<div id="ai_songs_total" class="x-layout-item"></div>	

		 <!-- 专辑产品号来源 -->
		<div id="ai_productid_flag" class="x-layout-item"></div>	 
		
		<!-- 专辑产品号 -->
		<div id="ai_productid" class="x-layout-item"></div>	 
		
		<!-- 专辑时长 -->
		<div id="ai_duration" class="x-layout-item"></div>	
		
		<!-- 授权书 -->
		<div id="ai_authorisation_url" class="x-layout-item"></div>
			<!-- 授权书：		
			<?php if (!isset($_smarty_tpl->tpl_vars['data']) || !is_array($_smarty_tpl->tpl_vars['data']->value)) $_smarty_tpl->createLocalArrayVariable('data', null, null);
$_smarty_tpl->tpl_vars['data']->value['quku_albums_info']['ai_authorisation_url'] = 'http://img3.douban.com/view/site/large/public/b4fcd9e7374fd1b.jpg';?>
			<a href="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_authorisation_url']);?>
" title="" target="_blank">	
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_authorisation_url']);?>
" alt="" />
			</a>
		</div> -->

		<!-- 专辑介绍 -->
		<div id="ai_info" class="x-layout-block"></div>	 
		
		<!--标签管理信息-->
		<div id="quku_tag_info_rel" class="x-layout-block tb_form"></div>

	</fieldset>
</div>
<div id="contentSongs"> 
	<fieldset>
		<legend><label onclick="changeSongShowStatus();">歌曲列表</label></legend>
		
	  	
		<table id="tableSong"  width="100%" class="tb_preview tb_form" >
		<tr>
		        <td  class="spiderTit" ><input  type="checkbox" id="si_selectAll"/></td>
		        <td  class="spiderTit" >发布状态</td>
				<td  class="spiderTit" >光盘序号</td>
				<td  class="spiderTit" >排序<div id="nb_ai_album_items_sort"></div></td>
				<td  class="spiderTit" >歌曲ID</td>
				<td  class="spiderTit" >歌曲名</td>
				<td  class="spiderTit" >歌手名</td>
				<td  class="spiderTit" >语言<span id="nb_ai_album_items_language"></span></td>
				
				<td  class="spiderTit" >音频</td>
				<td  class="spiderTit" >操作</td>
				<td  class="spiderTit" >上传状态</td>
			</tr>
			<div id=tableSongHidden></div>
		</table>
		<input class="button01"  name="button" type="button" value="增加行" onclick="newAddSongRow(1, null , null , $('.si_album_no'))">
		<div id="nb_quku_song_info"></div>
	
	</fieldset>
</div>
<!-- start spider -->
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('spider_songlist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['spider']['iteration']=0;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['spider']['iteration']++;
?>
<div class="spiderHead">
来源： <b><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</b><span  class="spiderOpen" >展开</span>
</div>
<div class="spiderList">
	<fieldset>
		<legend><label > 歌曲列表</label></legend>
		<table  class="tb_preview"  width="100%">
				<tr>
						<td class="spiderTit"  width="40">全选</td>
						<td class="spiderTit" >光盘序号</td>
						<td class="spiderTit" >排序</td>
						<td class="spiderTit" >歌曲名</td>
						<td class="spiderTit" >歌手名</td>
						<td class="spiderTit" >语言</td>
						
						<td class="spiderTit" >音频</td>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['subItem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['subKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subItem']->key => $_smarty_tpl->tpl_vars['subItem']->value){
 $_smarty_tpl->tpl_vars['subKey']->value = $_smarty_tpl->tpl_vars['subItem']->key;
?>
				<tr>
					<td><input type="checkbox" name="chk_single_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['spider']['iteration'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['subItem']->value['si_id'];?>
" /></td>
					<td><?php echo $_smarty_tpl->tpl_vars['subItem']->value['si_cd_no'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['subItem']->value['si_album_no'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['subItem']->value['si_title'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['subItem']->value['si_author'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['subItem']->value['si_language'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['subItem']->value['si_songwritingcopyright'];?>
</td>

					<td>
						<?php  $_smarty_tpl->tpl_vars['songFileItem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['songFileKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['subItem']->value['quku_songs_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['songFileItem']->key => $_smarty_tpl->tpl_vars['songFileItem']->value){
 $_smarty_tpl->tpl_vars['songFileKey']->value = $_smarty_tpl->tpl_vars['songFileItem']->key;
?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['songFileItem']->value['sf_file_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['songFileItem']->value['sf_file_bitrate'];?>
</a>
						<?php }} ?>
					</td>
				</tr>
				<?php }} ?>
		</table>
		<br>
		<a href="javascript:void(0)"  onclick="$('input[name=\'chk_single_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['spider']['iteration'];?>
\']').attr('checked',true);">全选</a>/<a href="javascript:void(0)" onclick="$('input[name=\'chk_single_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['spider']['iteration'];?>
\']').attr('checked',false);">取消</a> 
		<input class="button01"   type="button" value="添加所选"  onclick="insertSpider('chk_single_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['spider']['iteration'];?>
')"> 
		<input class="button01"   type="button" value="应用此来源歌曲列表"  onclick="insertSpider('chk_single_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['spider']['iteration'];?>
',true)">
	</fieldset>
</div>
<?php }} ?>
	<fieldset>
	<div id="ai_audit">
		<div id="ai_audit_status" style="float:left;width:350px;"></div>
		<div id="ai_audit_info" style="float:left;width:350px;"></div>
		<div id="ai_audit_reason">其他：<input type="text" value="" name="ai_audit_info[]" /></div>
	</div>
	</fieldset>
<!-- end spider -->
<div class="space10"></div>
<div id="operation">
	<?php if (strlen($_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_status'])>0&&$_smarty_tpl->getVariable('data')->value['quku_albums_info']['ai_status']==0){?>		
		<input type="button" value="保存" class="button01" onclick="Album.saveAndPub();" style="float:left;margin-right:15px;"></input>		
		<input type="button" value="下线" class="button01" onclick="Album.offline();" style="float:left"></input>
		
	<?php }else{ ?>
		<input type="button" value="保存" class="button01" onclick="Album.save();" style="float:left"></input>
		<input type="button" value="保存并发布" class="button01" onclick="Album.saveAndPub();" style="float:left"></input>
	<?php }?>

</div>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/duplicateName.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/picUpload.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/picRowController.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/songRowController.js"></script>

<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/components/win.js"></script>
<?php $_template = new Smarty_Internal_Template("common/footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

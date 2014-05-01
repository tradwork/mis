<?php /* Smarty version Smarty3rc4, created on 2014-03-10 16:53:29
         compiled from "/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/batchoperation/form.html" */ ?>
<?php /*%%SmartyHeaderCode:82515568531d7d89aca575-33475461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0c72904b41c215b3355ac9c79d5ef10a9fd4630' => 
    array (
      0 => '/home/mp3/yujiao/guodong/mis/system/../template/mis/templates/batchoperation/form.html',
      1 => 1394441606,
    ),
  ),
  'nocache_hash' => '82515568531d7d89aca575-33475461',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("common/header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>



<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/batchoperation/batchoperationForm.js"></script>
<script type="text/javascript" src="<?php echo @STATIC_DIR;?>
/js/batchoperation/batchoperation.js"></script>

<script type="text/javascript">



		//模版变量转换为js变量，统一管理模版变量， 并便于其他js中引用
		<?php $_template = new Smarty_Internal_Template("batchoperation/convertData.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		$(document).ready(function(){
				var T = quku_v.batchoperationForm, data = quku_v.batchoperation.data;
				quku_v.batchoperationForm.displayPanel(data);



			});

	</script>

<style>
	.fl{float:left;}
	.x-layout-item{ float: none;}
	.x-component-items{ height: auto;}
	.x-component-label{ width: 200px;}
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
	.x-editgrid-symbol{ display: none;}

	/*.update-value{padding-top: 20px;}*/
</style>
<body>


<div id="contentBase">
  <fieldset>
    <legend><label>必填信息</label></legend>
    <div id="tasktype" class="x-layout-item" style="width:100%"></div>
    <div id="maillist" class="x-layout-block"></div>


    <div class="updateData">
      <!-- 统计结果接收邮箱 -->
      <div id="table" class="x-layout-block"></div>

      <form name="batchoperationDbForm" target="self" method="post" enctype="multipart/form-data"  id="batchoperationDbForm" >
		<div id="updateDataId" class="x-layout-block">
		  <div class="x-component-label "><span class="red label-blank">*</span><span class="label-text">上传数据id文件: </span><a class="more-link" href="#"></a></div>
		  <div id="updateDataId_items" class="x-component-items"><input type="file" value="" id="updateDataId_userfile_0" name="id"></div>
		</div>
		<input type="hidden" name="maillist">
		<input type="hidden" name="tasktype">
		<input type="hidden" name="user">
		<input type="hidden" name="source">

		<input type="hidden" name="table">
		<input type="hidden" name="fields">
        <!-- 多端分发 -->
        <input type="hidden" value="[{'0':'0','1':'0','2':'0','3':'0','4':'0','5':'0','6':'0','7':'0','8':'0','9':'0','duan':'pc-web'},{'0':'0','1':'0','2':'0','3':'0','4':'0','5':'0','6':'0','7':'0','8':'0','9':'0','duan':'qianqian'},{'0':'0','1':'0','2':'0','3':'0','4':'0','5':'0','6':'0','7':'0','8':'0','9':'0','duan':'android-app'},{'0':'0','1':'0','2':'0','3':'0','4':'0','5':'0','6':'0','7':'0','8':'0','9':'0','duan':'ios-app'},{'0':'0','1':'0','2':'0','3':'0','4':'0','5':'0','6':'0','7':'0','8':'0','9':'0','duan':'windows-app'},{'0':'0','1':'0','2':'0','3':'0','4':'0','5':'0','6':'0','7':'0','8':'0','9':'0','duan':'ios-webapp'},{'0':'0','1':'0','2':'0','3':'0','4':'0','5':'0','6':'0','7':'0','8':'0','9':'0','duan':'android-webapp'},{'0':'0','1':'0','2':'0','3':'0','4':'0','5':'0','6':'0','7':'0','8':'0','9':'0','duan':'厂商'},{'0':'0','1':'0','2':'0','3':'0','4':'0','5':'0','6':'0','7':'0','8':'0','9':'0','duan':'占位'},{'0':'0','1':'0','2':'0','3':'0','4':'0','5':'0','6':'0','7':'0','8':'0','9':'0','duan':'占位'}]" name= "si_distribution" id="si_distribution_value_0" />
      </form>

      <div class="btn clearfix"> <input type="button" value="添加条件" class="add-condition" size=7/><input class="del-condition" type="button" value="删除条件" size=7/> </div>
      <!-- 统计条件 -->
      <div id="fields_v_1" class="tb_form conditions update-value show"></div>
      <div id="fields_v_2" class="tb_form conditions update-value hide"></div>
      <div id="fields_v_3" class="tb_form conditions update-value hide"></div>
      <div id="fields_v_4" class="tb_form conditions update-value hide"></div>
      <div id="fields_v_5" class="tb_form conditions update-value hide"></div>
      <div id="fields_v_6" class="tb_form conditions update-value hide"></div>
      <div id="fields_v_7" class="tb_form conditions update-value hide"></div>
      <div id="fields_v_8" class="tb_form conditions update-value hide"></div>
      <div id="fields_v_9" class="tb_form conditions update-value hide"></div>
      <div id="fields_v_10" class="tb_form conditions update-value hide"></div>

      <div class="space10"></div>
      <div id="operation">
	    <input type="submit" class="dbsubmit" onclick="Batchoperation.submit('db');" value="提交"    class="button01" />
      </div>
    </div>


    <div class="replaceContent hide">
      <!-- 统计结果接收邮箱 -->
      <div id="replace_table" class="x-layout-block"></div>

      <form name="replaceForm" target="self" method="post" enctype="multipart/form-data"  id="replaceForm" >
		<div id="replaceId" class="x-layout-block">
		  <div class="x-component-label "><span class="red label-blank">*</span><span class="label-text">上传数据id文件: </span><a class="more-link" href="#"></a></div>
		  <div id="replaceId_items" class="x-component-items"><input type="file" value="" id="replaceId_userfile_0" name="id"></div>
		</div>
		<input type="hidden" name="maillist">
		<input type="hidden" name="tasktype">
		<input type="hidden" name="user">
		<input type="hidden" name="table">
		<input type="hidden" name="replace_fields">
		<input type="hidden" name="fields">
		<input type="hidden" name="source">
      </form>

      <div class="btn clearfix"> <input type="button" value="添加条件" class="add-condition" size=7/><input class="del-condition" type="button" value="删除条件" size=7/> </div>
      <!-- 统计条件 -->
      <div id="fields_replace_v_1" class="tb_form conditions update-value show"></div>
      <div id="fields_replace_v_2" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_3" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_4" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_5" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_6" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_7" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_8" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_9" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_10" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_11" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_12" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_13" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_14" class="tb_form conditions update-value hide"></div>
      <div id="fields_replace_v_15" class="tb_form conditions update-value hide"></div>

      <div class="space10"></div>
      <div id="operation">

	<input type="submit" class="replacesubmit" onclick="Batchoperation.submit('replace');" value="提交"    class="button01"></input>

      </div>
    </div>



    <div class="revocationContent hide">
      <form name="revocationForm" method="post" target="self" enctype="multipart/form-data"  id="revocationForm" >
	<div id="rollbackid" class="x-layout-item" ></div>
	<div class="space10"></div>
	<div id="operation">
	  <!-- <input type="hidden" name="rollbackid"> -->
	  <input type="hidden" name="maillist">
	  <input type="hidden" name="tasktype">
	  <input type="hidden" name="user">
	  <input type="hidden" name="source">
	  <input type="submit" value="提交"  onclick="Batchoperation.submit('revocation');"   class="button01"></input>
	</div>
      </form>
    </div>


    <div class="prohibitContent hide">
      <form name="prohibitForm" method="post" target="self" enctype="multipart/form-data"  id="prohibitForm" >
	<div id="updateProhibitDataId" class="x-layout-block">
	  <div class="x-component-label "><span class="red label-blank">*</span>
	    <span class="label-text">上传数据id文件: </span><a class="more-link" href="#"></a></div>
	  <div id="updateProhibitDataId_items" class="x-component-items"><input type="file" value="" id="updateProhibitDataId_userfile_0" name="id"></div>
	</div>
	<div class="space10"></div>
	<div id="operation">
	  <!-- <input type="hidden" name="rollbackid"> -->
	  <input type="hidden" name="maillist">
	  <input type="hidden" name="tasktype">
	  <input type="hidden" name="user">
	  <input type="hidden" name="source">

	  <input type="submit" value="提交"  onclick="Batchoperation.submit('prohibit');"   class="button01"></input>
	</div>
      </form>
    </div>


    <div class="autoContent hide">
      <form name="autoForm" method="post" target="self" enctype="multipart/form-data"  id="autoForm" >
	<div id="autoDataId" class="x-layout-block">
	  <div class="x-component-label "><span class="red label-blank">*</span>
	    <span class="label-text">上传数据id文件: </span><a class="more-link" href="#"></a></div>
	  <div id="autoDataId_items" class="x-component-items"><input type="file" value="" id="autoDataId_userfile_0" name="id"></div>
	</div>
	<div class="space10"></div>
	<div id="operation">
	  <!-- <input type="hidden" name="rollbackid"> -->
	  <input type="hidden" name="maillist">
	  <input type="hidden" name="tasktype">
	  <input type="hidden" name="user">
	  <input type="hidden" name="source">
	  <input type="submit" value="提交"  onclick="Batchoperation.submit('auto');"   class="button01"></input>
	</div>
      </form>
    </div>

    <div class="autoAlbumContent hide">
      <form name="autoAlbumForm" method="post" target="self" enctype="multipart/form-data"  id="autoAlbumForm" >
	<div id="autoAlbumDataId" class="x-layout-block">
	  <div class="x-component-label "><span class="red label-blank">*</span>
	    <span class="label-text">上传数据id文件: </span><a class="more-link" href="#"></a></div>
	  <div id="autoDataId_items" class="x-component-items"><input type="file" value="" id="autoDataId_userfile_0" name="id"></div>
	</div>
	<div class="space10"></div>
	<div id="operation">
	  <!-- <input type="hidden" name="rollbackid"> -->
	  <input type="hidden" name="maillist">
	  <input type="hidden" name="tasktype">
	  <input type="hidden" name="user">
	  <input type="hidden" name="source">
	  <input type="submit" value="提交"  onclick="Batchoperation.submit('auto_album');"   class="button01"></input>
	</div>
      </form>
    </div>



  </fieldset>
</div>

<iframe name="self"  style="display:none;"></iframe>
<!-- end spider -->

<?php $_template = new Smarty_Internal_Template("common/footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

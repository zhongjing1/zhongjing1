<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-06 10:28:55
         compiled from "/www/web/ten/public_html/views/activity/aoziweituan/chicheng/company.html" */ ?>
<?php /*%%SmartyHeaderCode:382760546568b9b2d691420-86445095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e866e26d5ad9d08a6d6fa72cc5b55c2dc7edc59f' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/aoziweituan/chicheng/company.html',
      1 => 1451993364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '382760546568b9b2d691420-86445095',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568b9b2d713d69_07983987',
  'variables' => 
  array (
    'tmp_dir' => 0,
    'index_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568b9b2d713d69_07983987')) {function content_568b9b2d713d69_07983987($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>炽橙</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" >
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/jquery-2.1.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/iscroll.js"><?php echo '</script'; ?>
> 
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/css/public.css" />
	<?php echo load_js('validform');?>

	<?php echo load_js('layer/layer');?>

</head>
<?php echo '<script'; ?>
>
	$(function(){
		var doc_H=window.innerHeight;	
			$('.wrap').height(doc_H);	
	});

	var myScroll;
    function loaded() {
        myScroll = new IScroll('.wrap',{click: true });
    }
<?php echo '</script'; ?>
>
<body onload="loaded()">
<div class="wrap" style="background:#bdbdbd;">
	<div id="scroller">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/logo.jpg" class="logo">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/detailbanner.png" class="bannerbox">
		<form class="signcon" name="add_company" id="add_company" method="post" action="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/save_company");?>
">
			<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/label.png" class="label">
			<h1>企业报名</h1>
			<h2>1、公司简介</h2>
			<div class="enterbox">
				<textarea name="companyintro" id="companyintro" class="textstyle" placeholder="杭州炽橙文化创意有限公司。。。" datatype="*" nullmsg="请输入公司简介！"></textarea>
			</div>
			<h2>2、项目简介</h2>
			<div class="enterbox">
				<textarea name="projectintro" id="projectintro" class="textstyle" datatype="*" nullmsg="请输入项目简介！"></textarea>
			</div>
			<h2>3、岗位需求</h2>
			<div class="enterbox">
				<input type="text" name="jobneed" id="jobneed" class="inputstyle" datatype="*" nullmsg="请输入岗位需求！">
			</div>
			<div class="enterwrap">
				<div class="enterleft">
					4、项目负责人
				</div>
				<div class="enterright">
					<div class="enterbox">
						<input type="text" name="person" id="person" class="inputstyle" datatype="*" nullmsg="请输入项目负责人！">
					</div>
				</div>
			</div>
			<div class="enterwrap">
				<div class="enterleft">
					5、联 系 电 话
				</div>
				<div class="enterright">
					<div class="enterbox">
						<input type="tel" name="telphone" id="telphone" class="inputstyle" datatype="m" nullmsg="请输入联系电话！" errormsg="电话号码格式错误！">
					</div>
				</div>
			</div>
			<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/submitbtn.png" class="nextbtn" onclick="$('#add_company').submit()">
		</form>
		</div>	
	</div>
</div>
<div id="mask">
	<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/success.png">
</div>
<?php echo '<script'; ?>
 type="text/javascript" >
	$(function(){
		$.Tipmsg.r=null;
		$("#add_company").Validform({
			tiptype:function(msg){
				layer.msg(msg);
			},
			tipSweep:true,
			ajaxPost:true,
			callback:function(data) {
				if (data.status == "y") {
					layer.msg("提交成功!");
					//window.location.reload();
				}
			}
		});
	})
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("activity/share.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>

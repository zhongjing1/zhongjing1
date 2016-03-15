<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-06 10:15:51
         compiled from "/www/web/ten/public_html/views/activity/aoziweituan/chicheng/student.html" */ ?>
<?php /*%%SmartyHeaderCode:714044910568b9b530c7ca9-49685413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40e3be4bfcc638ea603e079344f3165e6808003c' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/aoziweituan/chicheng/student.html',
      1 => 1451993364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '714044910568b9b530c7ca9-49685413',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568b9b5316ca34_65768565',
  'variables' => 
  array (
    'tmp_dir' => 0,
    'index_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568b9b5316ca34_65768565')) {function content_568b9b5316ca34_65768565($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>大学生报名-炽橙</title>
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
<link href="/public/css/admin.css" type="text/css" rel="stylesheet">
<link href="/public/css/validform.css" type="text/css" rel="stylesheet">
	<?php echo load_js('validform');?>

	<?php echo load_js('layer/layer');?>

	<?php echo load_js('global');?>

	<?php echo load_js('laydate/laydate');?>

	<?php echo load_js('ajaxfileupload');?>

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
<body>
<div class="wrap" style="background:#bdbdbd;">
	<div id="scroller">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/logo.jpg" class="logo">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/detailbanner.png" class="bannerbox">
		<div class="signcon">
			<form id="add_student" name="add_student" method="post" action="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/save_student");?>
" onsubmit="return false;">
				<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/label.png" class="label">
				<div class="enterwrap">
					<div class="enterleft">
						<span class="word-space">姓 名</span>
					</div>
					<div class="enterright">
						<div class="enterbox">
							<input type="text" name="username" id="username" class="inputstyle" datatype="*" nullmsg="请输入姓名！">
						</div>
					</div>
				</div>
				<div class="enterwrap">
					<div class="enterleft">
						联系电话
					</div>
					<div class="enterright">
						<div class="enterbox">
							<input type="tel" name="telphone" id="telphone" class="inputstyle" datatype="m" nullmsg="请输入联系电话！" errormsg="电话号码格式错误！">
						</div>
					</div>
				</div>
				<h2>创意名称</h2>
				<div class="enterbox">
					<input type="text" name="jobneed" id="jobneed" class="inputstyle" datatype="*" nullmsg="请输入创意名称！">
				</div>
				<h2>创意概述</h2>
				<div class="enterbox">
					<textarea name="projectintro" id="projectintro" class="textstyle" datatype="*" nullmsg="请输入创意概述！"></textarea>
				</div>
				<h2>个人/团队照片：<span onclick="image_up.click()">点击上传</span></h2>
				<div class="uploadbox flexStyle">
					<input name="image_up" id="image_up" type="file" onchange="upload_image('image_up');" style="display: none"/>
					<img src="" class="open_litpic" id="pic">
					<input name="image" type="hidden" value=""/>
				</div>
				<p>如是团队完成请填写</p>
				<div class="enterwrap">
					<div class="enterleft">
						1、团队人员姓名
					</div>
					<div class="enterright">
						<div class="enterbox">
							<input type="text" name="teamname1" class="inputstyle">
						</div>
					</div>
				</div>
				<div class="enterwrap">
					<div class="enterleft">
						团队人员角色
					</div>
					<div class="enterright">
						<div class="enterbox">
							<input type="text" name="teamrole1" class="inputstyle">
						</div>
					</div>
				</div>
				<div class="enterwrap">
					<div class="enterleft">
						2、团队人员姓名
					</div>
					<div class="enterright">
						<div class="enterbox">
							<input type="text" name="teamname2" class="inputstyle">
						</div>
					</div>
				</div>
				<div class="enterwrap">
					<div class="enterleft">
						团队人员角色
					</div>
					<div class="enterright">
						<div class="enterbox">
							<input type="text" name="teamrole2" class="inputstyle">
						</div>
					</div>
				</div>
				<div class="enterwrap">
					<div class="enterleft">
						3、团队人员姓名
					</div>
					<div class="enterright">
						<div class="enterbox">
							<input type="text" name="teamname3" class="inputstyle">
						</div>
					</div>
				</div>
				<div class="enterwrap">
					<div class="enterleft">
						团队人员角色
					</div>
					<div class="enterright">
						<div class="enterbox">
							<input type="text" name="teamrole3" class="inputstyle">
						</div>
					</div>
				</div>
				<div class="enterwrap">
					<div class="enterleft">
						4、团队人员姓名
					</div>
					<div class="enterright">
						<div class="enterbox">
							<input type="text" name="teamname4" class="inputstyle">
						</div>
					</div>
				</div>
				<div class="enterwrap">
					<div class="enterleft">
						团队人员角色
					</div>
					<div class="enterright">
						<div class="enterbox">
							<input type="text" name="teamrole4" class="inputstyle">
						</div>
					</div>
				</div>
				<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/submitbtn.png" class="nextbtn" onclick="$('#add_student').submit()">
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
		$("#add_student").Validform({
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
	//上传缩略图
	function upload_image(upfile_name){
		var loadi = layer.load('照片分析中...');
		$.ajaxFileUpload({
					url:'<?php echo site_url('activity/upload/upload');?>
?width=&height=&file_name='+upfile_name,
				secureuri:false,
				fileElementId:upfile_name,
				dataType: 'json',
				success: function (data) {
			if(data.state == 'SUCCESS') {
				layer.close(loadi)
				$('[name="'+upfile_name+'"]').parent().find('.open_litpic').attr('src', data.url).show();
				$('[name="'+upfile_name+'"]').parent().find('.open_bigpic').attr('src', data.url)
				$('[name="'+upfile_name+'"]').parent().find('[type="hidden"]').val(data.url);
			} else {
				layer.msg(data.state, 2, -1);//错误提示
				return false;
			}
		}
	});
	}
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("activity/share.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>

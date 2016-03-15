<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-08 14:43:06
         compiled from "/www/web/ten/public_html/views/activity/zhongjingHK/share/add_tel.html" */ ?>
<?php /*%%SmartyHeaderCode:139741323568f588dc1bc64-44086234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1acf63c6cb07f9cb992f60eee807632e04399f87' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/zhongjingHK/share/add_tel.html',
      1 => 1452235138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139741323568f588dc1bc64-44086234',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568f588dc8ddf5_75987320',
  'variables' => 
  array (
    'tmp_dir' => 0,
    'user_data' => 0,
    'prize_list' => 0,
    'index_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568f588dc8ddf5_75987320')) {function content_568f588dc8ddf5_75987320($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<meta content="email=no" name="format-detection">
<title>中精新年抽奖活动</title>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/css/style.css" type="text/css">
	<?php echo load_js('jquery');?>

	<?php echo load_js('validform');?>

	<?php echo load_js('layer1.8/layer');?>

</head>
<body class="bgimg">
	<div class="gx">
		<p>恭喜你获得<strong style="font-size: 22px; color: #ffea00;"><?php echo $_smarty_tpl->tpl_vars['prize_list']->value[$_smarty_tpl->tpl_vars['user_data']->value['prize']];?>
</strong><br>填写你的信息领奖吧</p>
	</div>
	<div class="add_tel">
		<form name="add_tel" id="add_tel" method="post" action="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/save_add_tel");?>
">
		<div class="name">
			<label><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/name.png" width="90%"></label>
			<input type="text" name="username" datatype="*" nullmsg="请输入姓名！"/>
		</div>
		<div class="tel">
			<label><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/tel.png" width="90%"></label>
			<input type="tel" name="tel" datatype="*" nullmsg="请输入手机！" errormsg="请输入手机"/>
		</div>
		<div class="tel">
			<label><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/address.png" width="90%"></label>
			<input type="text" name="address" datatype="*" nullmsg="请输入地址！"/>
		</div>
		<div class="submit">
			<input type="submit" value="" />
		</div>
		</form>
	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("activity/share.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php echo '<script'; ?>
 type="text/javascript" >
		$(function(){
			$.Tipmsg.r=null;
			$("#add_tel").Validform({
				tiptype:function(msg){
					layer.msg(msg, 2, -1);//错误提示
				},
				tipSweep:true,
				ajaxPost:true,
				callback:function(data){
					if(data.status=='y')
					{
						window.location.reload();
					}
					else
					{
						layer.msg(data.info, 2, -1);//错误提示
					}
				}
			});
		})
	<?php echo '</script'; ?>
>
</body>
</html>
 


<?php }} ?>

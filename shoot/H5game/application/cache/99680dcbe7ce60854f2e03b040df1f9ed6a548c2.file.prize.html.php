<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-06 11:25:51
         compiled from "/www/web/ten/public_html/views/activity/aoziweituan/share/prize.html" */ ?>
<?php /*%%SmartyHeaderCode:259968764567b9530bc0992-04080944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99680dcbe7ce60854f2e03b040df1f9ed6a548c2' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/aoziweituan/share/prize.html',
      1 => 1451993364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '259968764567b9530bc0992-04080944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567b9530c14808_00667132',
  'variables' => 
  array (
    'tmp_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567b9530c14808_00667132')) {function content_567b9530c14808_00667132($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<meta content="email=no" name="format-detection">
<title>亿滋新年抽奖活动</title>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/css/style.css" type="text/css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/jquery-1.11.0.js" ><?php echo '</script'; ?>
>
</head>
<body class="bgimg">
	<div class="prize">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/p1.png" width="80%">
	</div>
	<div class="g_sc1">
		<a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx55f5e0036ae8d7e5&redirect_uri=http%3A%2F%2Fw.nadmarketing.com%2Findex.php%3Fg%3DWap%26m%3DStore%26a%3Dcats%26token%3Dxgymxe1434354261%26diymenu%3D1%26twid%3D&response_type=code&scope=snsapi_userinfo&state=#wechat_redirect">
			<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/btn3.png" width="40%">
		</a>
	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("activity/share.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>
 


<?php }} ?>

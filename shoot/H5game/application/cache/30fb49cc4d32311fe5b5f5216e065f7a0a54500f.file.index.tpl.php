<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-23 21:04:31
         compiled from "/Users/Guest/web/yii/weixin/views/manager/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1751390105567a9bdfc2daa9-01186847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30fb49cc4d32311fe5b5f5216e065f7a0a54500f' => 
    array (
      0 => '/Users/Guest/web/yii/weixin/views/manager/index.tpl',
      1 => 1449724484,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1751390105567a9bdfc2daa9-01186847',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567a9bdfcce3d9_58756523',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567a9bdfcce3d9_58756523')) {function content_567a9bdfcce3d9_58756523($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo config_item('manager_title');?>
</title>
</head>
<frameset rows="40,*" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo site_url("manager/welcome/header");?>
" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*,30" cols="*" frameborder="no" border="0" framespacing="0">
		<frameset cols="230,*" frameborder="no" border="0" framespacing="0">
			<frame src="<?php echo site_url("manager/welcome/menu");?>
" name="leftFrame" scrolling="yes" id="leftFrame" title="leftFrame"/>
			<frame src="<?php echo site_url("manager/welcome/main");?>
" name="main" id="main" title="main" scrolling="yes"/>
		</frameset>
		<frame src="<?php echo site_url("manager/welcome/footer");?>
" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" title="bottomFrame" />
  </frameset>
</frameset>
<noframes><body>
</body>
</noframes>
</html>
<?php }} ?>

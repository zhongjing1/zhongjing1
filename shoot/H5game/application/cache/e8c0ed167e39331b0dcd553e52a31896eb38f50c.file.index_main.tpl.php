<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-07 15:15:20
         compiled from "/www/web/ten/public_html/views/manager/index_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46140783568e1088f04c61-89388258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8c0ed167e39331b0dcd553e52a31896eb38f50c' => 
    array (
      0 => '/www/web/ten/public_html/views/manager/index_main.tpl',
      1 => 1451993363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46140783568e1088f04c61-89388258',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_data' => 0,
    'http_host' => 0,
    'server_soft' => 0,
    'php_version' => 0,
    'php_path' => 0,
    'file_size' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568e1089030657_85538138',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568e1089030657_85538138')) {function content_568e1089030657_85538138($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo config_item('manager_title');?>
</title>
    <?php echo load_css('admin');?>

</head>
<body>
<div class="content_title">系统首页</div>
<table class="tablebg">
    <tr>
        <td width="150" height="30" align="right">登陆用户：</td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['admin_data']->value['username'];?>
</td>
    </tr>
    <tr>
        <td align="right" height="30">程序版本：</td>
        <td align="left">V1.0</td>
    </tr>
    <tr>
        <td align="right" height="30">操作系统：</td>
        <td align="left"><?php echo php_uname();?>
</td>
    </tr>
    <tr>
        <td align="right" height="30">网站域名：</td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['http_host']->value;?>
</td>
    </tr>
    <tr>
        <td align="right" height="30">服务器时间：</td>
        <td align="left"><?php echo date('Y-m-d H:i:s',time());?>
</td>
    </tr>
    <tr>
        <td align="right" height="30">服务器解析引擎：</td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['server_soft']->value;?>
</td>
    </tr>
    <tr>
        <td align="right" height="30">PHP版本：</td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['php_version']->value;?>
</td>
    </tr>
    <tr>
        <td align="right" height="30">PHP安装路径：</td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['php_path']->value;?>
</td>
    </tr>
    <tr>
        <td align="right" height="30">上传文件限制：</td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['file_size']->value;?>
</td>
    </tr>
    <tr>
        <td align="right" height="30">WEB运行用户名：</td>
        <td align="left"><?php echo Get_Current_User();?>
</td>
    </tr>
</table>
</body>
</html>
<?php }} ?>

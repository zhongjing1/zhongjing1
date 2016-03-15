<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-07 15:15:20
         compiled from "/www/web/ten/public_html/views/manager/index_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:253054191568e1088bb96c1-65075873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6303e6ddcd6ea223bb8e958971d906d63b02a3d4' => 
    array (
      0 => '/www/web/ten/public_html/views/manager/index_footer.tpl',
      1 => 1451993363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253054191568e1088bb96c1-65075873',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568e1088c20a95_72232632',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568e1088c20a95_72232632')) {function content_568e1088c20a95_72232632($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo config_item('manager_title');?>
</title>
    <?php echo load_css('admin');?>

</head>
<body>
    <div class="clear"></div>
    <div class="footer_bg">版本1.0<?php if ($_smarty_tpl->tpl_vars['admin_user_data']->value['uid']==1) {?>&nbsp;<a target="main" style="color: #FFFFFF;" href="<?php echo site_url("manager/admin_menu");?>
">菜单管理</a><?php }?></div>
</body>
</html><?php }} ?>

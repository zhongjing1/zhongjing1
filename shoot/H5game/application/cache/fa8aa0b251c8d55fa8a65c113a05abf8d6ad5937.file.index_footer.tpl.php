<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-23 19:33:05
         compiled from "/Users/Guest/web/yii/views/manager/index_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2082700106567a86710728e3-62282151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa8aa0b251c8d55fa8a65c113a05abf8d6ad5937' => 
    array (
      0 => '/Users/Guest/web/yii/views/manager/index_footer.tpl',
      1 => 1449724484,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2082700106567a86710728e3-62282151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567a86710ee874_17760306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567a86710ee874_17760306')) {function content_567a86710ee874_17760306($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-23 19:33:05
         compiled from "/Users/Guest/web/yii/views/manager/index_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1345995686567a8671142825-86134130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c49281ec141a5869d9767c2bdcf82731f4210cd9' => 
    array (
      0 => '/Users/Guest/web/yii/views/manager/index_header.tpl',
      1 => 1449724485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1345995686567a8671142825-86134130',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567a8671235304_73609332',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567a8671235304_73609332')) {function content_567a8671235304_73609332($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo config_item('manager_title');?>
</title>
    <?php echo load_css('admin');?>

</head>
<body>
    <div class="top_header">
        <div class="top_left">
            <?php echo config_item('manager_title');?>

        </div>
        <div class="top_right">欢迎<?php echo $_smarty_tpl->tpl_vars['admin_data']->value['username'];?>
 <a href="<?php echo site_url('manager/welcome/loginout');?>
">退出</a></div>
        <div class="clear"></div>
    </div>
</body>
</html><?php }} ?>

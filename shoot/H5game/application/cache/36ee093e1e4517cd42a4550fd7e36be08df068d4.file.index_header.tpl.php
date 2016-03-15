<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-07 15:15:20
         compiled from "/www/web/ten/public_html/views/manager/index_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:821913818568e1088e0cd85-91681196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36ee093e1e4517cd42a4550fd7e36be08df068d4' => 
    array (
      0 => '/www/web/ten/public_html/views/manager/index_header.tpl',
      1 => 1451993363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '821913818568e1088e0cd85-91681196',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568e1088ecf833_31883918',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568e1088ecf833_31883918')) {function content_568e1088ecf833_31883918($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

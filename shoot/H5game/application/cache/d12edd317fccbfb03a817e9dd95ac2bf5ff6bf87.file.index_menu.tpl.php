<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-07 15:15:20
         compiled from "/www/web/ten/public_html/views/manager/index_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1365482224568e1088cf1b11-91089463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd12edd317fccbfb03a817e9dd95ac2bf5ff6bf87' => 
    array (
      0 => '/www/web/ten/public_html/views/manager/index_menu.tpl',
      1 => 1451993363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1365482224568e1088cf1b11-91089463',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu_list' => 0,
    'key' => 0,
    'val' => 0,
    'keys' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568e1088dceed8_57229461',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568e1088dceed8_57229461')) {function content_568e1088dceed8_57229461($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo config_item('manager_title');?>
</title>
    <?php echo load_css('admin');?>

    <?php echo load_js('jquery');?>

    <?php echo '<script'; ?>
 type="application/javascript">
        $(function() {
            //左侧菜单收缩展开
            $(".left_menu_parent").click(
                function () {
                    $(this).parent().find('.left_menu_down').toggle();
                }
            );
            //左侧菜单全部收缩展开
            $("#all").click(
                function () {
                    $('.left_menu_down').toggle();
                }
            );
        });
    <?php echo '</script'; ?>
>
    <style type="text/css">
        #add{ margin-left: 0px;}
    </style>
</head>
<body>
    <div class="left_menu">
        <div class="left_menu_parent" id="all"><a>展开/收缩全部</a></div>
    </div>
    <!--后台添加菜单-->
    <?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value) {
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
    <div class="left_menu">
        <div class="left_menu_parent"><a><?php echo $_smarty_tpl->tpl_vars['key']->value['title'];?>
</a></div>
        <div class="left_menu_down">
            <?php  $_smarty_tpl->tpl_vars['keys'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keys']->_loop = false;
 $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['key']->value['down']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['keys']->key => $_smarty_tpl->tpl_vars['keys']->value) {
$_smarty_tpl->tpl_vars['keys']->_loop = true;
 $_smarty_tpl->tpl_vars['val']->value = $_smarty_tpl->tpl_vars['keys']->key;
?>
                <li class="<?php if ($_smarty_tpl->tpl_vars['val']->value==0) {?> no_border_top<?php }?>">
                <a target="main" href="<?php echo site_url("manager/".((string)$_smarty_tpl->tpl_vars['keys']->value['model'])."/".((string)$_smarty_tpl->tpl_vars['keys']->value['action']));
if ($_smarty_tpl->tpl_vars['keys']->value['string']!='') {?>?<?php echo $_smarty_tpl->tpl_vars['keys']->value['string'];
}?>">-<?php echo $_smarty_tpl->tpl_vars['keys']->value['title'];?>
</a>
                </li>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</body>
</html><?php }} ?>
